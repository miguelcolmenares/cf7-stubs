#!/usr/bin/env bash
# Tests scripts/update-source.sh in scratch copies, with fixtures instead of WordPress.org and
# with a fake generator, so the merge path runs too. No network.
# Run: bash tests/update-source.sh
set -uo pipefail

REPO="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
fail=0
pass=0
BASE="$(mktemp -d)"
trap 'rm -rf "$BASE"' EXIT

check() { # description, command...
    local d="$1"; shift
    if "$@" >/dev/null 2>&1; then pass=$((pass + 1)); printf 'ok   %s\n' "$d"
    else fail=$((fail + 1)); printf 'FAIL %s\n' "$d"; fi
}

tmpdir() { mktemp -d "$BASE/t.XXXXXX"; }

scratch() { # a copy with the files the script edits, and prints its path
    local d; d="$(tmpdir)"
    mkdir -p "$d/scripts" "$d/source" "$d/zips" "$d/tags" "$d/raw"
    cp "$REPO/scripts/update-source.sh" "$d/scripts/"
    cp "$REPO/composer.json" "$d/composer.json"
    cp "$REPO/source/composer.json" "$d/source/composer.json"
    cp "$REPO/CHANGELOG.md" "$d/CHANGELOG.md"
    cp "$REPO/README.md" "$d/README.md"
    cp "$REPO/contact-form-7-types.php" "$d/contact-form-7-types.php"
    cp "$REPO/phpstan.neon.dist" "$d/phpstan.neon.dist"
    printf '<?php\n' > "$d/contact-form-7-stubs.php"
    printf '%s' "$d"
}

fixture() { # version php -> path of a JSON file like the plugin API answer
    local f; f="$(tmpdir)/info.json"
    printf '{"version":"%s","requires_php":"%s"}' "$1" "$2" > "$f"
    printf '%s' "$f"
}

# Runs the script without the generator: dir fixture [args]
run() {
    local d="$1" f="$2"; shift 2
    (cd "$d" && CF7_INFO_URL="file://$f" NO_GENERATE=1 GITHUB_OUTPUT="$d/out" bash scripts/update-source.sh "$@")
}

# Runs the script with the fake generator: dir fixture [args]. raw/<version>.php is what the
# generator writes for a pinned version, and the zips and the tags are files.
run_full() {
    local d="$1" f="$2"; shift 2
    (cd "$d" && CF7_INFO_URL="file://$f" CF7_ZIP_BASE="file://$d/zips" CF7_TAGS_URL="file://$d/tags" \
        SOURCE_CMD=true \
        GENERATE_CMD='cp raw/$(jq -r ".require[\"contact-form-7/contact-form-7\"]" source/composer.json).php contact-form-7-stubs.php' \
        GITHUB_OUTPUT="$d/out" bash scripts/update-source.sh "$@")
}

# Succeeds only when the script fails and says `message` on stderr: dir fixture message [args]
refuses() {
    local d="$1" f="$2" message="$3" err; shift 3
    err="$(run "$d" "$f" "$@" 2>&1 >/dev/null)" && return 1
    grep -qF -- "$message" <<<"$err"
}

pinned() { jq -r '.require["contact-form-7/contact-form-7"]' "$1/source/composer.json"; }
edited_files() { (cd "$1" && cat composer.json source/composer.json CHANGELOG.md contact-form-7-stubs.php README.md contact-form-7-types.php phpstan.neon.dist | cksum); }  # the seven edited files

cur="$(pinned "$REPO")"

# 1. A newer release moves every place that holds the version.
d="$(scratch)"; f="$(fixture 9.9.9 8.5)"
run "$d" "$f" >/dev/null 2>&1
check "a newer release is pinned" test "$(pinned "$d")" = 9.9.9
check "the package version and the download URL follow" \
    test "$(jq -r '.repositories[0].package.version, .repositories[0].package.dist.url' "$d/source/composer.json" | tr '\n' ' ')" \
         = "9.9.9 https://downloads.wordpress.org/plugin/contact-form-7.9.9.9.zip "
check "the PHP floor follows Requires PHP" test "$(jq -r '.require.php' "$d/composer.json")" = ">=8.5"
check "the CHANGELOG gets one line under Changed" \
    grep -q 'follow Contact Form 7 9.9.9, up from' "$d/CHANGELOG.md"
check "the CHANGELOG line is inside [Unreleased]" \
    test "$(awk '/^## \[Unreleased\]/{u=1;next} /^## \[/{u=0} u&&/Contact Form 7 9.9.9/{c++} END{print c+0}' "$d/CHANGELOG.md")" = 1
check "the README prints the new version" grep -qx '\*\*Current version:\*\* Contact Form 7 9.9.9' "$d/README.md"
check "phpVersion of the PHPStan config follows the floor" grep -qx '    phpVersion: 80500' "$d/phpstan.neon.dist"
check "the version constant of the types file follows" grep -q "define('WPCF7_VERSION', '9.9.9')" "$d/contact-form-7-types.php"
check "the outputs say changed, version and php" \
    bash -c 'grep -qx changed=true "$0/out" && grep -qx version=9.9.9 "$0/out" && grep -qx php=8.5 "$0/out"' "$d"

# 2. The same release changes nothing, and checks the PHP floor.
d="$(scratch)"; f="$(fixture "$cur" 8.3)"
before="$(edited_files "$d")"
run "$d" "$f" >/dev/null 2>&1
check "the pinned release is left alone" test "$(edited_files "$d")" = "$before"
check "the output says changed=false" grep -qx 'changed=false' "$d/out"
d="$(scratch)"; f="$(fixture "$cur" 8.5)"
check "a PHP floor lower than Requires PHP fails" refuses "$d" "$f" "declares Requires PHP 8.5"
d="$(scratch)"; f="$(fixture "$cur" 7.4)"
run "$d" "$f" >/dev/null 2>&1
check "a PHP floor higher than Requires PHP is accepted" grep -qx 'changed=false' "$d/out"
d="$(scratch)"; f="$(fixture "$cur" 8.3)"
jq '.require.php = "^8.3"' "$d/composer.json" > "$d/c.json" && mv "$d/c.json" "$d/composer.json"
check "a floor that is not of the form >=X.Y fails" refuses "$d" "$f" "expected the form >=8.3"

# 3. An older release is refused, and nothing changes.
d="$(scratch)"; f="$(fixture 1.0 8.3)"; before="$(edited_files "$d")"
check "an older release is refused" refuses "$d" "$f" "refusing to go back"
check "and none of the four files changed" test "$(edited_files "$d")" = "$before"

# 4. A bad answer from the API stops the run, each one with its own message.
d="$(scratch)"; f="$(fixture "" 8.3)"
check "an answer without a version is refused" refuses "$d" "$f" "not a version number"
d="$(scratch)"; f="$(fixture 9.9.9 "")"
check "an answer without Requires PHP is refused" refuses "$d" "$f" "no usable Requires PHP"

# 5. A version given by hand wins over the API, takes its own Requires PHP, and must look like a version.
d="$(scratch)"; f="$(fixture 9.9.9 8.5)"
mkdir -p "$d/tags/9.0.1"; printf '=== Contact Form 7 ===\nRequires PHP: 8.1\n' > "$d/tags/9.0.1/readme.txt"
(cd "$d" && CF7_INFO_URL="file://$f" CF7_TAGS_URL="file://$d/tags" NO_GENERATE=1 GITHUB_OUTPUT="$d/out" bash scripts/update-source.sh 9.0.1) >/dev/null 2>&1
check "a version given as argument is used" test "$(pinned "$d")" = 9.0.1
check "and its own Requires PHP, not the one of the latest release" test "$(jq -r '.require.php' "$d/composer.json")" = ">=8.1"
d="$(scratch)"; f="$(fixture 9.9.9 8.0)"
run "$d" "$f" >/dev/null 2>&1
check "a release that declares PHP 8.0 is accepted, with phpVersion 80000" grep -qx '    phpVersion: 80000' "$d/phpstan.neon.dist"
d="$(scratch)"; f="$(fixture 9.9.9 8.10)"
run "$d" "$f" >/dev/null 2>&1
check "PHP 8.10 is a later version than 8.3, with phpVersion 81000" grep -qx '    phpVersion: 81000' "$d/phpstan.neon.dist"
d="$(scratch)"; f="$(fixture 9.9.9 8.5)"
grep -v 'phpVersion' "$d/phpstan.neon.dist" > "$d/P" && mv "$d/P" "$d/phpstan.neon.dist"
before="$(edited_files "$d")"
check "a PHPStan config without phpVersion fails" refuses "$d" "$f" "has no 'phpVersion"
check "and nothing is left changed" test "$(edited_files "$d")" = "$before"
d="$(scratch)"; f="$(fixture 9.9.9 7.4)"
run "$d" "$f" >/dev/null 2>&1
check "a release that declares PHP 7.4 gets the floor 8.0" test "$(jq -r '.require.php' "$d/composer.json")" = ">=8.0"
check "and phpVersion 80000" grep -qx '    phpVersion: 80000' "$d/phpstan.neon.dist"
check "and the CHANGELOG line says why" grep -q 'least that the stubs file loads on, because that release declares "Requires PHP: 7.4"' "$d/CHANGELOG.md"
check "the output php is the floor, 8.0" grep -qx 'php=8.0' "$d/out"
d="$(scratch)"; f="$(fixture "$cur" 7.4)"
run "$d" "$f" >/dev/null 2>&1
check "the pinned release that declares 7.4 accepts the floor 8.3" grep -qx 'changed=false' "$d/out"
d="$(scratch)"; f="$(fixture 9.9.9 8.3)"
check "a version that is not a number is refused" refuses "$d" "$f" "not a version number" "6.2; rm -rf /"

# 5b. A file that lacks the line to update is an error, and nothing is left half done.
d="$(scratch)"; f="$(fixture 9.9.9 8.5)"
grep -v '^\*\*Current version' "$d/README.md" > "$d/R" && mv "$d/R" "$d/README.md"
before="$(edited_files "$d")"
check "a README without the Current version line fails" refuses "$d" "$f" "has no line"
check "and no file changed" test "$(edited_files "$d")" = "$before"
check "the pin is the old one after that failure" test "$(pinned "$d")" = "$cur"

# 6. The merge path, with a fake generator. The curated file has a docblock that the raw file does not.
raw_old='<?php
function a() {}
function b($x) {}
'
raw_new_clean='<?php
function a() {}
function b($x) {}
function c() {}
'
raw_new_conflict='<?php
function a() {}
function b($x, $y) {}
'
curated='<?php
/** @return void */
function a() {}
function b($x) {}
'
setup_merge() { # new raw content -> prints the scratch dir
    local d; d="$(scratch)"
    printf '%s' "$curated" > "$d/contact-form-7-stubs.php"
    printf '%s' "$raw_old" > "$d/raw/$cur.php"
    printf '%s' "$1" > "$d/raw/9.9.9.php"
    : > "$d/zips/contact-form-7.9.9.9.zip"
    printf '%s' "$d"
}

d="$(setup_merge "$raw_new_clean")"; f="$(fixture 9.9.9 8.3)"
run_full "$d" "$f" >/dev/null 2>&1
check "a clean merge keeps the curated docblock" grep -q '@return void' "$d/contact-form-7-stubs.php"
check "a clean merge adds the new function" grep -q 'function c()' "$d/contact-form-7-stubs.php"
check "a clean merge says 0 conflicts" grep -qx 'conflicts=0' "$d/out"
check "a clean merge leaves no marker" bash -c '! grep -q "^<<<<<<<" "$0/contact-form-7-stubs.php"' "$d"

d="$(setup_merge "$raw_new_conflict")"; f="$(fixture 9.9.9 8.3)"
printf '<?php\n/** @return void */\nfunction a() {}\nfunction b(int $x) {}\n' > "$d/contact-form-7-stubs.php"
run_full "$d" "$f" >/dev/null 2>&1
check "a line changed on both sides is a conflict with markers" grep -q '^<<<<<<< curated$' "$d/contact-form-7-stubs.php"
check "the conflict count is the number of markers" grep -qx 'conflicts=1' "$d/out"
check "the other curated line survives next to the conflict" grep -q '@return void' "$d/contact-form-7-stubs.php"

d="$(setup_merge "$raw_new_clean")"; f="$(fixture 9.9.9 8.3)"
rm "$d/raw/9.9.9.php"   # the second generation fails
before="$(cat "$d/contact-form-7-stubs.php")"
run_full "$d" "$f" >/dev/null 2>&1; rc=$?
check "a failed generation makes the run fail" test "$rc" -ne 0
check "and the curated file is put back" test "$(cat "$d/contact-form-7-stubs.php")" = "$before"
check "and the pin is the old one, so a rerun does not skip the merge" test "$(pinned "$d")" = "$cur"

d="$(setup_merge "$raw_new_clean")"; f="$(fixture 9.9.9 8.3)"
rm "$d/zips/contact-form-7.9.9.9.zip"
before="$(edited_files "$d")"
run_full "$d" "$f" >/dev/null 2>&1; rc=$?
check "a release that has no zip makes the run fail" test "$rc" -ne 0
check "and no file changed" test "$(edited_files "$d")" = "$before"

printf '\n%d passed, %d failed\n' "$pass" "$fail"
[ "$fail" -eq 0 ]
