<?php
/**
 * Lists every declaration (functions, classes, interfaces, traits, methods, properties, constants)
 * with its native types and docblock types, so a stubs file can be compared with its source.
 *
 *   php extract.php <vendor/autoload.php> <file or folder> <out.json> [--source]
 *
 * With `--source` the argument is the plugin folder, and the files that finder.php leaves out of the
 * stubs are skipped here too. Keep the two lists the same: a folder that finder.php drops must not
 * appear as "missing in the stubs" in the report.
 *
 * It records functions, classes (kind, modifiers, parent, interfaces), constants, properties and methods.
 * It does not record `use` of a trait or the parents of an interface, because the plugin has neither today.
 *
 * It is called by scripts/compare-stubs.sh. Run that script, not this one.
 */
declare(strict_types=1);

require $argv[1];

use PhpParser\Node;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\NameResolver;
use PhpParser\NodeVisitorAbstract;
use PhpParser\ParserFactory;

$path = $argv[2];
$out = $argv[3];
$isSource = in_array('--source', $argv, true);

function typeStr(?Node $t): string
{
    if ($t === null) {
        return '';
    }
    if ($t instanceof Node\NullableType) {
        return '?' . typeStr($t->type);
    }
    if ($t instanceof Node\UnionType) {
        return implode('|', array_map('typeStr', $t->types));
    }
    if ($t instanceof Node\IntersectionType) {
        return implode('&', array_map('typeStr', $t->types));
    }
    if ($t instanceof Node\Name || $t instanceof Node\Identifier) {
        return ltrim($t->toString(), '\\');
    }
    return '?';
}

/** The type and the rest of the line of every `@tag` in a docblock. @return list<array{string, string}> */
function docTag(?string $doc, string $tag): array
{
    if (!$doc) {
        return [];
    }
    $res = [];
    foreach (preg_split('/\R/', $doc) as $line) {
        $line = trim((string) preg_replace('#^\s*(/\*\*|\*/|\*)\s?#', '', $line));
        if (strpos($line, "@$tag") !== 0) {
            continue;
        }
        $rest = ltrim(substr($line, strlen($tag) + 1));
        $depth = 0;
        $type = '';
        for ($i = 0, $n = strlen($rest); $i < $n; $i++) {
            $c = $rest[$i];
            if (in_array($c, ['<', '(', '{', '['], true)) {
                $depth++;
            }
            if (in_array($c, ['>', ')', '}', ']'], true)) {
                $depth--;
            }
            if (ctype_space($c) && $depth <= 0) {
                break;
            }
            $type .= $c;
        }
        $res[] = [$type, trim(substr($rest, strlen($type)))];
    }
    return $res;
}

/** @param Node\Param[] $params */
function paramsOf(array $params, ?string $doc): array
{
    $docP = [];
    foreach (docTag($doc, 'param') as [$t, $rest]) {
        if (preg_match('/^&?(\.\.\.)?\$(\w+)/', $rest, $m)) {
            $docP[$m[2]] = $t;
        }
    }
    $res = [];
    foreach ($params as $p) {
        $name = $p->var instanceof Node\Expr\Variable ? (string) $p->var->name : '?';
        $res[] = [
            'name' => $name,
            'type' => typeStr($p->type),
            'docType' => $docP[$name] ?? '',
            'default' => $p->default !== null,
            'ref' => $p->byRef,
            'variadic' => $p->variadic,
        ];
    }
    return $res;
}

/** What a stub body is, so the report can say that a body contradicts a type. */
function bodyKind(?array $stmts): string
{
    if ($stmts === null) {
        return 'abstract';
    }
    if (count($stmts) === 0) {
        return 'empty';
    }
    if (count($stmts) === 1 && $stmts[0] instanceof Node\Stmt\Return_) {
        $e = $stmts[0]->expr;
        if ($e === null) {
            return 'return;';
        }
        if ($e instanceof Node\Expr\ConstFetch) {
            return 'return ' . strtolower($e->name->toString());
        }
        if ($e instanceof Node\Expr\Array_) {
            return 'return array';
        }
        if ($e instanceof Node\Scalar\String_) {
            return 'return string';
        }
        if ($e instanceof Node\Scalar\LNumber) {
            return 'return int';
        }
        if ($e instanceof Node\Scalar\DNumber) {
            return 'return float';
        }
        return 'return expr';
    }
    return 'other';
}

function funcRecord(Node\FunctionLike $n, string $file): array
{
    $doc = $n->getDocComment() ? $n->getDocComment()->getText() : null;
    $dr = docTag($doc, 'return');
    return [
        'params' => paramsOf($n->getParams(), $doc),
        'ret' => typeStr($n->getReturnType()),
        'docRet' => $dr ? $dr[0][0] : '',
        'byRefReturn' => $n->returnsByRef(),
        'body' => bodyKind($n->getStmts()),
        'file' => $file,
        'line' => $n->getStartLine(),
        'deprecated' => $doc && strpos($doc, '@deprecated') !== false,
    ];
}

$decl = ['functions' => [], 'classes' => [], 'consts' => []];
$currentFile = '';

$visitor = new class($decl, $currentFile) extends NodeVisitorAbstract {
    public array $d;
    public string $file;

    public function __construct(array &$d, string &$file)
    {
        $this->d = &$d;
        $this->file = &$file;
    }

    public function enterNode(Node $n)
    {
        if ($n instanceof Node\Stmt\Function_) {
            $this->d['functions'][ltrim($n->namespacedName->toString(), '\\')] = funcRecord($n, $this->file);
        } elseif ($n instanceof Node\Stmt\ClassLike && $n->name !== null) {
            $kind = $n instanceof Node\Stmt\Interface_ ? 'interface' : ($n instanceof Node\Stmt\Trait_ ? 'trait' : ($n instanceof Node\Stmt\Enum_ ? 'enum' : 'class'));
            $rec = [
                'kind' => $kind,
                'abstract' => $n instanceof Node\Stmt\Class_ && $n->isAbstract(),
                'final' => $n instanceof Node\Stmt\Class_ && $n->isFinal(),
                'extends' => $n instanceof Node\Stmt\Class_ ? ($n->extends ? ltrim($n->extends->toString(), '\\') : '') : '',
                'implements' => $n instanceof Node\Stmt\Class_ ? array_map(fn($x) => ltrim($x->toString(), '\\'), $n->implements) : [],
                'consts' => [], 'props' => [], 'methods' => [],
            ];
            foreach ($n->stmts as $s) {
                if ($s instanceof Node\Stmt\ClassConst) {
                    foreach ($s->consts as $c) {
                        $rec['consts'][$c->name->toString()] = true;
                    }
                } elseif ($s instanceof Node\Stmt\Property) {
                    $doc = $s->getDocComment() ? $s->getDocComment()->getText() : null;
                    $v = docTag($doc, 'var');
                    foreach ($s->props as $p) {
                        $rec['props'][$p->name->toString()] = [
                            'static' => $s->isStatic(),
                            'vis' => $s->isPrivate() ? 'private' : ($s->isProtected() ? 'protected' : 'public'),
                            'type' => typeStr($s->type),
                            'docType' => $v ? $v[0][0] : '',
                        ];
                    }
                } elseif ($s instanceof Node\Stmt\ClassMethod) {
                    $m = funcRecord($s, $this->file);
                    $m['static'] = $s->isStatic();
                    $m['abstract'] = $s->isAbstract();
                    $m['final'] = $s->isFinal();
                    $m['vis'] = $s->isPrivate() ? 'private' : ($s->isProtected() ? 'protected' : 'public');
                    $rec['methods'][$s->name->toString()] = $m;
                }
            }
            $this->d['classes'][ltrim($n->namespacedName->toString(), '\\')] = $rec;
        } elseif ($n instanceof Node\Stmt\Const_) {
            foreach ($n->consts as $c) {
                $this->d['consts'][ltrim($c->namespacedName->toString(), '\\')] = true;
            }
        }
        return null;
    }
};

$factory = new ParserFactory();
// php-parser 5 has createForNewestSupportedVersion(), php-parser 4 has create(). composer.json allows both.
$parser = method_exists($factory, 'createForNewestSupportedVersion')
    ? $factory->createForNewestSupportedVersion()
    : $factory->create(ParserFactory::PREFER_PHP7);

$files = [];
if (is_dir($path)) {
    $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS));
    foreach ($it as $f) {
        if ($f->getExtension() !== 'php') {
            continue;
        }
        $rel = substr($f->getPathname(), strlen(rtrim($path, '/')) + 1);
        if ($isSource) {
            if (preg_match('#^(admin/includes/(css|js)|includes/(css|js)|includes/swv/js|assets|languages|vendor/(composer|symfony|bin)|vendor/autoload\.php)#', $rel)) {
                continue;
            }
            if (preg_match('#(^|/)tests/#', $rel) || substr($rel, -10) === '.asset.php') {
                continue;
            }
        }
        $files[$rel] = $f->getPathname();
    }
    ksort($files);
} else {
    $files[basename($path)] = $path;
}

$errors = [];
foreach ($files as $rel => $file) {
    try {
        $currentFile = $rel;
        $ast = $parser->parse((string) file_get_contents($file));
        $ast = (new NodeTraverser(new NameResolver()))->traverse($ast ?? []);
        (new NodeTraverser($visitor))->traverse($ast);
    } catch (Throwable $e) {
        $errors[] = "$rel: " . $e->getMessage();
        fwrite(STDERR, "parse error in $rel: " . $e->getMessage() . "\n");
    }
}

$decl = $visitor->d;
$decl['parseErrors'] = $errors;
file_put_contents($out, json_encode($decl, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
fwrite(STDERR, sprintf("%d functions, %d classes, %d parse errors\n", count($decl['functions']), count($decl['classes']), count($errors)));
exit($errors ? 1 : 0);
