#!/usr/bin/env bash
# Compares the curated stubs file with the real Contact Form 7 plugin that it follows.
#
#   bash scripts/compare-stubs.sh [--check] [--report FILE] [--source DIR] [--stubs FILE] [--types FILE]
#
# It lists every function, class, method, property and constant of the plugin and of the stubs
# (scripts/compare/extract.php) and compares them (scripts/compare/compare.py). The Markdown report
# has three kinds of section:
#
#   structure     Something exists on one side only (function, class, method, property, class constant,
#                 top-level constant), or a kind, a parent, an interface list or a modifier differs, or a
#                 parameter differs (name, order, default, by-reference flag, variadic flag, or a native
#                 type that the plugin declares). A by-reference return and a native type of a property
#                 count too. These are facts. With --check the exit code is 1 when there is one.
#   review        Return types that differ (native, or the docblock of the plugin against the stubs),
#                 stub bodies that contradict their type, and parameter types that the stubs add where
#                 the plugin has only a docblock that does not fit. These are leads for a person who reads the
#                 plugin code. They never fail --check, because a return type is a judgement and the
#                 curated file is meant to differ.
#   undocumented  Types that the stubs add where the plugin declares and documents none. The plugin
#                 code is the only evidence, so read it. They never fail --check either.
#
# It reads source/contact-form-7, so run `cd source && composer install` first. It refuses to compare
# when that folder is not the release the stubs follow (WPCF7_VERSION in contact-form-7-types.php).
#
# Options (a relative path is read from the repository root, not from the folder you run the script in):
#   --check        exit 1 when a structure section is not empty
#   --report FILE  write the report to FILE (default: standard output)
#   --source DIR   the plugin folder (default: source/contact-form-7)
#   --stubs FILE   the stubs file (default: contact-form-7-stubs.php)
#   --types FILE   the file that defines WPCF7_VERSION (default: contact-form-7-types.php)
#
# Exit codes: 0 compared (and, with --check, nothing in the structure), 1 --check found a structure
# difference, 2 the script could not run or compare (usage, missing tool, versions differ, a file that
# does not parse, a comparison that failed).
#
# Environment: AUTOLOAD is the Composer autoloader that holds nikic/php-parser (default: vendor/autoload.php).
# When GITHUB_OUTPUT is set, "structure", "review" and "undocumented" are appended to it.
set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]:-$0}")/.." && pwd)"
cd "$ROOT"

SOURCE=source/contact-form-7
STUBS=contact-form-7-stubs.php
TYPES=contact-form-7-types.php
REPORT=""
CHECK=0
AUTOLOAD="${AUTOLOAD:-vendor/autoload.php}"

die() { printf 'compare-stubs: %s\n' "$*" >&2; exit 2; }

while [ $# -gt 0 ]; do
    case "$1" in
        --check) CHECK=1 ;;
        --report) [ $# -ge 2 ] || die "--report needs a file"; REPORT="$2"; shift ;;
        --source) [ $# -ge 2 ] || die "--source needs a folder"; SOURCE="$2"; shift ;;
        --stubs) [ $# -ge 2 ] || die "--stubs needs a file"; STUBS="$2"; shift ;;
        --types) [ $# -ge 2 ] || die "--types needs a file"; TYPES="$2"; shift ;;
        -h|--help) sed -n '2,/^set -euo/p' "$ROOT/scripts/compare-stubs.sh" | sed '$d;s/^# \{0,1\}//'; exit 0 ;;
        *) die "unknown argument: $1" ;;
    esac
    shift
done

command -v php >/dev/null 2>&1 || die "php is required"
command -v python3 >/dev/null 2>&1 || die "python3 is required"
[ -f "$AUTOLOAD" ] || die "$AUTOLOAD not found, run: composer install"
[ -d "$SOURCE" ] || die "$SOURCE not found, run: cd source && composer install"
[ -f "$STUBS" ] || die "$STUBS not found"

have="$(sed -n 's/^ *\* *Version: *//p' "$SOURCE/wp-contact-form-7.php" 2>/dev/null | head -n 1 | tr -d '[:space:]' || true)"
follows="$(sed -n "s/.*define('WPCF7_VERSION', *'\([^']*\)').*/\1/p" "$TYPES" 2>/dev/null | head -n 1 || true)"
[ -n "$have" ] || die "could not read the version of the plugin in $SOURCE/wp-contact-form-7.php"
[ -n "$follows" ] || die "could not read WPCF7_VERSION in $TYPES"
if [ "$have" != "$follows" ]; then
    die "$SOURCE is Contact Form 7 $have but the stubs follow $follows. Delete $SOURCE and run: cd source && composer install"
fi

work="$(mktemp -d)"
trap 'rm -rf "$work"' EXIT

run_php() { php -d memory_limit=2G "$ROOT/scripts/compare/extract.php" "$AUTOLOAD" "$@"; }
run_php "$SOURCE" "$work/source.json" --source 2>"$work/source.err" || { cat "$work/source.err" >&2; die "could not read $SOURCE"; }
run_php "$STUBS" "$work/stubs.json" 2>"$work/stubs.err" || { cat "$work/stubs.err" >&2; die "could not read $STUBS (conflict markers left in it?)"; }

compare_args=("$work/source.json" "$work/stubs.json")
[ "$CHECK" = 1 ] && compare_args+=(--check)
status=0
python3 -I "$ROOT/scripts/compare/compare.py" "${compare_args[@]}" >"$work/report.md" 2>"$work/summary.txt" || status=$?

summary="$(tail -n 1 "$work/summary.txt")"
# compare.py ends its standard error with the counts. Anything else is a crash, and its traceback is not
# something to write in GITHUB_OUTPUT.
if ! [[ "$summary" =~ ^structure=[0-9]+\ review=[0-9]+\ undocumented=[0-9]+$ ]]; then
    cat "$work/summary.txt" >&2
    die "the comparison failed"
fi
if [ -n "$REPORT" ]; then cp "$work/report.md" "$REPORT"; else cat "$work/report.md"; fi
printf 'compare-stubs: Contact Form 7 %s, %s\n' "$have" "$summary" >&2
if [ -n "${GITHUB_OUTPUT:-}" ]; then
    tr ' ' '\n' <<<"$summary" >> "$GITHUB_OUTPUT"
fi
exit "$status"
