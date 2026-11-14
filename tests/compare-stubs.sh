#!/usr/bin/env bash
# Tests scripts/compare-stubs.sh with a small plugin and a small stubs file, so no download is needed.
# It needs vendor/autoload.php (composer install), because the extractor uses nikic/php-parser.
# Run: bash tests/compare-stubs.sh
# shellcheck disable=SC2016  # single quotes keep the backticks and the dollar signs of the patterns literal
set -uo pipefail

REPO="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
SCRIPT="$REPO/scripts/compare-stubs.sh"
export AUTOLOAD="$REPO/vendor/autoload.php"
[ -f "$AUTOLOAD" ] || { echo "vendor/autoload.php not found, run: composer install" >&2; exit 2; }

BASE="$(mktemp -d)"
trap 'rm -rf "$BASE"' EXIT
fail=0
pass=0

# check DESCRIPTION EXPECTED_EXIT COMMAND...   (runs the command, compares its exit code)
check() {
    local d="$1" want="$2" got; shift 2
    "$@" >"$BASE/out" 2>"$BASE/err"; got=$?
    if [ "$got" = "$want" ]; then pass=$((pass + 1)); printf 'ok   %s\n' "$d"
    else fail=$((fail + 1)); printf 'FAIL %s (exit %s, wanted %s)\n' "$d" "$got" "$want"; sed 's/^/     /' "$BASE/err"; fi
}

# has DESCRIPTION PATTERN FILE   (the report or the error must contain the text)
has() {
    if grep -qF -- "$2" "$3"; then pass=$((pass + 1)); printf 'ok   %s\n' "$1"
    else fail=$((fail + 1)); printf 'FAIL %s (no "%s" in %s)\n' "$1" "$2" "$3"; fi
}

# A plugin of version 1.0 with two functions, and a child class that overrides a method of its parent.
mkdir -p "$BASE/plugin"
cat > "$BASE/plugin/wp-contact-form-7.php" <<'PHP'
<?php
/**
 * Plugin Name: Contact Form 7
 * Version: 1.0
 */
function wpcf7_one(string $a, $b = 1): string { return $a; }
/** @return string|bool */
function wpcf7_two($x) { return false; }
/** @param int $n */
function wpcf7_three($n) { return 1; }
class Base_Rule { public function toArray(): array { return array(); } }
class Child_Rule extends Base_Rule { public $prop = 1; public function toArray(): array { return array(1); } public function run(&$out, ...$rest) { return null; } }
PHP

cat > "$BASE/types.php" <<'PHP'
<?php
define('WPCF7_VERSION', '1.0');
PHP

cat > "$BASE/stubs.php" <<'PHP'
<?php
namespace {
    function wpcf7_one(string $a, $b = 1): string { return ''; }
    /** @return string|false */
    function wpcf7_two($x): string|false { return false; }
    function wpcf7_three(string $n) { return 1; }
    class Base_Rule { public function toArray(): array { return array(); } }
    class Child_Rule extends Base_Rule { public $prop = 1; public function run(&$out, ...$rest) { return null; } }
}
PHP

run() { bash "$SCRIPT" --source "$BASE/plugin" --stubs "$BASE/stubs.php" --types "$BASE/types.php" "$@"; }

# Same declarations, and a docblock that is wider in the plugin than in the stubs.
check 'matching stubs pass --check' 0 run --check
has 'the summary has no structure difference' 'structure=0' "$BASE/err"
check 'the report goes to a file' 0 run --check --report "$BASE/report.md"
has 'the report has the title' '# Stubs against plugin source' "$BASE/report.md"

# A function that the stubs lack.
sed '/wpcf7_two/d' "$BASE/stubs.php" > "$BASE/s1.php"
check 'a missing function fails --check' 1 run --check --stubs "$BASE/s1.php"
has 'the report names the missing function' '`wpcf7_two()`' "$BASE/out"
check 'a missing function does not fail without --check' 0 run --stubs "$BASE/s1.php"

# A function that the plugin does not have.
{ cat "$BASE/stubs.php"; printf '<?php\nnamespace { function wpcf7_extra() {} }\n' | tail -n +2; } > "$BASE/s2.php"
check 'an extra function fails --check' 1 run --check --stubs "$BASE/s2.php"

# A parameter with another name, by-reference flag or default.
sed 's/function wpcf7_one(string \$a, \$b = 1)/function wpcf7_one(string $c, $b)/' "$BASE/stubs.php" > "$BASE/s3.php"
check 'a renamed parameter fails --check' 1 run --check --stubs "$BASE/s3.php"
has 'the report names the parameter' 'name a/c' "$BASE/out"
has 'the report names the default' 'has-default True/False' "$BASE/out"
sed 's/run(&\$out/run($out/' "$BASE/stubs.php" > "$BASE/s4.php"
check 'a lost by-reference flag fails --check' 1 run --check --stubs "$BASE/s4.php"

# The plugin child overrides toArray(), and the stubs child does not: Base_Rule declares it in the stubs,
# so it is not missing (the first check above already depends on that). With no declaration anywhere in
# the chain it is missing.
sed 's/public function toArray(): array { return array(); }//' "$BASE/stubs.php" > "$BASE/s5b.php"
check 'a method declared nowhere in the chain fails --check' 1 run --check --stubs "$BASE/s5b.php"
has 'the report names the method' '`Child_Rule::toArray()`: method missing in stubs' "$BASE/out"

# A native type that the stubs add and the plugin docblock does not fit (@param int, stub string) is a lead.
check 'a stub type that the docblock does not fit does not fail --check' 0 run --check
sed 's/^    function wpcf7_three(string \$n)/    function wpcf7_three(int $n)/' "$BASE/stubs.php" > "$BASE/s8.php"
check 'a fitting stub type is not reported' 0 run --check --stubs "$BASE/s8.php"
check 'the report names the unfit parameter type' 0 grep -qF "plugin has no native type and documents 'int', stubs declare 'string'" <(run --stubs "$BASE/stubs.php" 2>/dev/null)

# A return type that differs is a lead to read, never a failure.
sed 's/function wpcf7_one(string \$a, \$b = 1): string/function wpcf7_one(string $a, $b = 1): int/' "$BASE/stubs.php" > "$BASE/s6.php"
check 'a different return type does not fail --check' 0 run --check --stubs "$BASE/s6.php"
has 'the report lists the native return' "native return source='string' stubs='int'" "$BASE/out"
sed 's/function wpcf7_one(string \$a, \$b = 1): string { return .*; }/function wpcf7_one(string $a, $b = 1): string { return null; }/' "$BASE/stubs.php" > "$BASE/s6b.php"
check 'a body that contradicts its type is reported' 0 run --check --stubs "$BASE/s6b.php"
has 'the report lists the body' 'stub body is return null' "$BASE/out"

# The plugin and the stubs must be the same release.
printf "<?php\ndefine('WPCF7_VERSION', '2.0');\n" > "$BASE/types2.php"
check 'another release is refused' 2 run --check --types "$BASE/types2.php"
has 'the message names both versions' 'Contact Form 7 1.0 but the stubs follow 2.0' "$BASE/err"

# A stubs file that does not parse (conflict markers left by update-source.sh).
printf '<?php\n<<<<<<< curated\nfunction a() {}\n=======\n>>>>>>> new\n' > "$BASE/s7.php"
check 'a file with conflict markers is refused' 2 run --check --stubs "$BASE/s7.php"

check 'an unknown option is refused' 2 run --nope
check 'a missing types file is refused with its message' 2 run --types "$BASE/none.php"
has 'the message names WPCF7_VERSION' 'could not read WPCF7_VERSION' "$BASE/err"
check 'help prints from another folder' 0 bash -c "cd / && bash '$SCRIPT' --help"
has 'help has the usage line' 'bash scripts/compare-stubs.sh' "$BASE/out"
# A top-level constant on one side only.
cp -R "$BASE/plugin" "$BASE/plugin2"
printf 'const PLUGIN_FLAG = 1;\n' >> "$BASE/plugin2/wp-contact-form-7.php"
check 'a missing top-level constant fails --check' 1 run --check --source "$BASE/plugin2"
has 'the report names the constant' '`PLUGIN_FLAG`: missing in stubs' "$BASE/out"
check 'a missing plugin folder is refused' 2 run --source "$BASE/none"

# GITHUB_OUTPUT gets the three counts.
: > "$BASE/gh_out"
check 'the counts go to GITHUB_OUTPUT' 0 env GITHUB_OUTPUT="$BASE/gh_out" bash "$SCRIPT" --source "$BASE/plugin" --stubs "$BASE/stubs.php" --types "$BASE/types.php"
for key in structure review undocumented; do
    check "GITHUB_OUTPUT has $key on a line of its own" 0 grep -qxE "$key=[0-9]+" "$BASE/gh_out"
done

printf '\n%d passed, %d failed\n' "$pass" "$fail"
[ "$fail" = 0 ]
