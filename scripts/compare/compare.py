#!/usr/bin/env python3
"""Compares what Contact Form 7 declares with what the stubs file declares.

    compare.py source.json stubs.json [--check]

The two JSON files come from extract.php. The Markdown report goes to stdout, and a line
`structure=N review=N undocumented=N` goes to stderr.

The report has three kinds of section:

* Structure: a function, class, method, property, class constant or top-level constant that
  exists on one side only, a kind, parent, interface list or modifier that differs, a by-reference
  return, a property with another native type, a parameter with another name, order, default,
  by-reference flag, variadic flag or native type (when the plugin declares one). A person does
  not need to read the plugin to decide these. With `--check` the exit code is 1 when any of
  them is not empty.
* Review: return types that differ (native, or the docblock of the plugin against the stubs),
  stub bodies that contradict their type, and parameter types that the stubs add where the
  plugin has only a docblock that does not fit. They are leads for a person who reads the plugin
  code, not verdicts, so they never change the exit code.
* Undocumented: types that the stubs add where the plugin declares and documents none. Only the
  plugin code can confirm them, so they are leads too and never change the exit code.

A method or property that the stubs do not declare in a class but declare in an ancestor
(`extends`, inside the stubs) is not missing.
"""
import json
import re
import sys


def load(path):
    d = json.load(open(path))
    # PHP encodes an empty array as [], so an empty map arrives as a list.
    for k in ('functions', 'classes', 'consts'):
        if d.get(k) == []:
            d[k] = {}
    for c in d['classes'].values():
        for k in ('consts', 'props', 'methods'):
            if c[k] == []:
                c[k] = {}
    return d


def norm(t):
    """The same type written two ways: ?T and T|null, any order, any leading backslash."""
    t = t.lstrip('\\').lower()
    if t.startswith('?'):
        t = t[1:] + '|null'
    return '|'.join(sorted({p.lstrip('\\') for p in t.split('|')}))


def tset(t):
    t = re.sub(r'<[^<>]*(<[^<>]*>[^<>]*)*>', '', t)
    t = t.replace('[]', '')
    if t.startswith('?'):
        t = t[1:] + '|null'
    return {x.split('\\')[-1].lower() for x in re.split(r'[|&]', t) if x}


def compat(stub, doc):
    """True when the native type of the stubs accepts everything that the plugin documents."""
    if not doc or stub.lower() == 'mixed':
        return True
    a = {'array' if x == 'iterable' else x for x in tset(doc)}
    b = tset(stub)
    return a <= b or ({'bool'} >= a and 'bool' in b)


def compare(src, stb):
    sections = []  # (kind, title, rows)
    undoc_params = {}
    undoc_returns = {}
    doc_params = []  # a native type that the stubs add, and that the plugin docblock does not fit

    def inherited(cls, kind, name):
        """Whether an ancestor of cls, inside the stubs, declares the method or property."""
        seen = set()
        parent = stb['classes'][cls]['extends']
        while parent and parent in stb['classes'] and parent not in seen:
            seen.add(parent)
            if name in stb['classes'][parent][kind]:
                return True
            parent = stb['classes'][parent]['extends']
        return False

    def params(name, a, b, rows, kind):
        pa, pb = a['params'], b['params']
        if len(pa) != len(pb):
            rows.append(f"- `{name}` ({kind}): parameter count source={len(pa)} stubs={len(pb)}: "
                        f"source ({', '.join(p['name'] for p in pa)}) vs stubs ({', '.join(p['name'] for p in pb)})")
        for x, y in zip(pa, pb):
            d = []
            if x['name'] != y['name']:
                d.append(f"name {x['name']}/{y['name']}")
            if x['ref'] != y['ref']:
                d.append(f"by-ref {x['ref']}/{y['ref']}")
            if x['variadic'] != y['variadic']:
                d.append(f"variadic {x['variadic']}/{y['variadic']}")
            if x['default'] != y['default']:
                d.append(f"has-default {x['default']}/{y['default']}")
            if not x['type'] and not x['docType'] and y['type']:
                undoc_params.setdefault(name, []).append(f"${x['name']}: {y['type']}")
            elif x['type'] != y['type'] and norm(x['type']) != norm(y['type']):
                if x['type']:
                    d.append(f"native type source='{x['type']}' (doc '{x['docType']}') "
                             f"stubs='{y['type']}' (doc '{y['docType']}')")
                elif not compat(y['type'], x['docType']):
                    doc_params.append(f"- `{name}` param ${x['name']}: plugin has no native type and documents "
                                      f"'{x['docType']}', stubs declare '{y['type']}' (stubs doc '{y['docType']}')")
            if d:
                rows.append(f"- `{name}` param ${x['name']}: " + '; '.join(d))
        if a['byRefReturn'] != b['byRefReturn']:
            rows.append(f"- `{name}`: return by reference source={a['byRefReturn']} stubs={b['byRefReturn']}")

    def returns(name, a, b, rows, bodies):
        sr, br = a['ret'], b['ret']
        if sr and norm(sr) != norm(br):
            rows.append(f"- `{name}`: native return source='{sr}' stubs='{br or '(none)'}' (stubs doc '{b['docRet']}')")
        elif not sr:
            # The plugin has no native type: compare its docblock with what the stubs declare.
            if br and a['docRet'] and norm(br) != norm(a['docRet']) and not compat(br, a['docRet']):
                rows.append(f"- `{name}`: source doc @return '{a['docRet']}' vs stubs native '{br}' (stubs doc '{b['docRet']}')")
            elif a['docRet'] and not br and b['docRet'] != a['docRet']:
                rows.append(f"- `{name}`: source doc @return '{a['docRet']}', stubs have no native type and doc '{b['docRet'] or '(none)'}'")
            elif not a['docRet'] and br:
                undoc_returns[name] = (a['file'], a['line'], br)
        if br and br not in ('void', 'never', 'mixed') and not br.startswith('?') and 'null' not in br.split('|'):
            if b['body'] in ('empty', 'return null', 'return;'):
                bodies.append(f"- `{name}`: native return '{br}' but the stub body is {b['body']}")
        if br == 'void' and b['body'] != 'empty':
            bodies.append(f"- `{name}`: void stub with body {b['body']}")

    def section(kind, title, rows):
        sections.append((kind, title, rows))

    section('structure', 'Functions in the plugin that the stubs lack',
            [f"- `{k}()`" for k in src['functions'] if k not in stb['functions']])
    section('structure', 'Functions in the stubs that the plugin does not have',
            [f"- `{k}()`" for k in stb['functions'] if k not in src['functions']])
    section('structure', 'Classes, interfaces and traits in the plugin that the stubs lack',
            [f"- `{k}` ({v['kind']})" for k, v in src['classes'].items() if k not in stb['classes']])
    section('structure', 'Classes, interfaces and traits in the stubs that the plugin does not have',
            [f"- `{k}` ({v['kind']})" for k, v in stb['classes'].items() if k not in src['classes']])
    section('structure', 'Top-level constants that exist on one side only',
            [f"- `{k}`: missing in stubs" for k in src['consts'] if k not in stb['consts']]
            + [f"- `{k}`: in stubs only" for k in stb['consts'] if k not in src['consts']])

    rows_sig, rows_ret, rows_body, rows_methods, rows_class = [], [], [], [], []
    for k, a in src['functions'].items():
        b = stb['functions'].get(k)
        if b:
            params(k + '()', a, b, rows_sig, 'function')
            returns(k + '()', a, b, rows_ret, rows_body)
    for k, a in src['classes'].items():
        b = stb['classes'].get(k)
        if not b:
            continue
        for f in ('kind', 'abstract', 'final', 'extends'):
            if a[f] != b[f]:
                rows_class.append(f"- `{k}`: {f} source={a[f]!r} stubs={b[f]!r}")
        if sorted(a['implements']) != sorted(b['implements']):
            rows_class.append(f"- `{k}`: implements source={a['implements']} stubs={b['implements']}")
        for c in a['consts']:
            if c not in b['consts']:
                rows_class.append(f"- `{k}::{c}`: constant missing in stubs")
        for c in b['consts']:
            if c not in a['consts']:
                rows_class.append(f"- `{k}::{c}`: constant in stubs only")
        for p, pa in a['props'].items():
            pb = b['props'].get(p)
            if not pb:
                if pa['vis'] != 'private' and not inherited(k, 'props', p):
                    rows_class.append(f"- `{k}::${p}`: property missing in stubs")
                continue
            if (pa['static'], pa['vis']) != (pb['static'], pb['vis']):
                rows_class.append(f"- `{k}::${p}`: static/visibility source={pa['static']}/{pa['vis']} stubs={pb['static']}/{pb['vis']}")
            if pa['type'] != pb['type'] and norm(pa['type']) != norm(pb['type']):
                rows_class.append(f"- `{k}::${p}`: type source='{pa['type']}' (doc '{pa['docType']}') stubs='{pb['type']}' (doc '{pb['docType']}')")
        for p in b['props']:
            if p not in a['props']:
                rows_class.append(f"- `{k}::${p}`: property in stubs only")
        for m, ma in a['methods'].items():
            mb = b['methods'].get(m)
            name = f"{k}::{m}()"
            if not mb:
                if ma['vis'] != 'private' and not inherited(k, 'methods', m):
                    rows_methods.append(f"- `{name}`: method missing in stubs")
                continue
            for f in ('static', 'abstract', 'final', 'vis'):
                if ma[f] != mb[f]:
                    rows_methods.append(f"- `{name}`: {f} source={ma[f]} stubs={mb[f]}")
            params(name, ma, mb, rows_sig, 'method')
            returns(name, ma, mb, rows_ret, rows_body)
        for m in b['methods']:
            if m not in a['methods']:
                rows_methods.append(f"- `{k}::{m}()`: method in stubs only")

    section('structure', 'Class-level differences (constants, properties, parents)', rows_class)
    section('structure', 'Methods missing, extra or with other modifiers', rows_methods)
    section('structure', 'Parameter differences (name, order, by-ref, default, variadic, native type) and by-reference returns', rows_sig)
    section('review', 'Return type differences (native, or docblock against stubs)', rows_ret)
    section('review', 'Stub bodies that contradict their native return type', rows_body)
    section('review', 'Parameter types that the stubs add and the plugin docblock does not fit', doc_params)
    undoc = []
    for name in sorted(set(undoc_params) | set(undoc_returns)):
        r = undoc_returns.get(name)
        where = f"{r[0]}:{r[1]}" if r else ''
        parts = []
        if r:
            parts.append(f"return '{r[2]}'")
        if name in undoc_params:
            parts.append(f"params {', '.join(undoc_params[name])}")
        undoc.append(f"- `{name}` {where}: stubs declare " + ', '.join(parts))
    section('undocumented', 'Undocumented in the plugin: the stubs add these types, so the plugin code must be read to confirm them', undoc)
    return sections


def main(argv):
    check = '--check' in argv
    args = [a for a in argv if not a.startswith('--')]
    if len(args) != 2:
        sys.exit(__doc__)
    src, stb = load(args[0]), load(args[1])
    sections = compare(src, stb)

    out = ['# Stubs against plugin source', '']
    out.append('The structure sections are facts. The review sections are leads: read the plugin code before you change a type.')
    for _, title, rows in sections:
        out.append(f"\n## {title} ({len(rows)})\n")
        out.extend(rows if rows else ['none'])
    out.append(f"\nTotals: source {len(src['functions'])} functions, {len(src['classes'])} classes; "
               f"stubs {len(stb['functions'])} functions, {len(stb['classes'])} classes.")
    print('\n'.join(out))

    n = {k: sum(len(r) for kind, _, r in sections if kind == k) for k in ('structure', 'review', 'undocumented')}
    print(f"structure={n['structure']} review={n['review']} undocumented={n['undocumented']}", file=sys.stderr)
    return 1 if check and n['structure'] else 0


if __name__ == '__main__':
    sys.exit(main(sys.argv[1:]))
