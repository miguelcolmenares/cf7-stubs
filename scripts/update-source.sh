#!/usr/bin/env bash
# Moves the Contact Form 7 source that the stubs are generated from to a newer release.
#
#   bash scripts/update-source.sh [version]     (bash only)
#
# Without an argument it reads the latest release from the WordPress.org plugin API. It does
# nothing when the pinned version is already that one, and it refuses to go to an older one.
# Otherwise it edits source/composer.json, sets the PHP floor of composer.json to the
# "Requires PHP" that CF7 declares for that release (with no argument, the floor of the latest
# release, but never below 8.0; when it does not move, it only checks that the floor is not lower than that), sets the
# `phpVersion` of phpstan.neon.dist to the same floor, prints the version in the README and in
# contact-form-7-types.php, and adds a line under [Unreleased] in CHANGELOG.md. A release that
# declares less than 8.0 (6.1 declares 7.4) gets the floor 8.0, because the stubs file uses union
# types and `mixed`, and the CHANGELOG line says so.
#
# The stubs file is curated by hand (docblocks, return types, bodies), so it is never overwritten
# by the generator. The script generates the raw stubs of the pinned release and of the new one,
# and applies the difference between the two to the committed file with a three-way merge
# (git merge-file). A change that touches a line that was curated by hand is a conflict, and the
# file keeps the conflict markers for a person to resolve. The number of conflicts is an output.
# If the script fails after it started to edit, it puts the edited files back. It does not restore
# source/contact-form-7, and generate.sh refuses a folder of another release than the pin.
#
# It does not commit, tag or release anything.
#
# Environment (the tests use the overrides, the defaults are the real thing):
#   CF7_INFO_URL    the plugin info endpoint (a file:// URL is accepted)
#   CF7_TAGS_URL    the folder with one readme.txt per release, for "Requires PHP" of a release
#                   that is not the latest (default: the WordPress.org plugin tags)
#   CF7_ZIP_BASE    where the release zips are (default: https://downloads.wordpress.org/plugin)
#   SOURCE_CMD      downloads the pinned release into source/ (default: composer install there)
#   GENERATE_CMD    writes the raw stubs file (default: bash generate.sh)
#   NO_GENERATE=1   edit the files but skip the download and the generation
#   GITHUB_OUTPUT   when set, "changed", "version", "php" and "conflicts" are appended to it
set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]:-$0}")/.." && pwd)"
cd "$ROOT"

INFO_URL="${CF7_INFO_URL:-https://api.wordpress.org/plugins/info/1.0/contact-form-7.json}"
TAGS_URL="${CF7_TAGS_URL:-https://plugins.svn.wordpress.org/contact-form-7/tags}"
ZIP_BASE="${CF7_ZIP_BASE:-https://downloads.wordpress.org/plugin}"
SOURCE_CMD="${SOURCE_CMD:-cd source && composer install --no-interaction --prefer-dist --no-progress}"
GENERATE_CMD="${GENERATE_CMD:-bash generate.sh}"
STUBS=contact-form-7-stubs.php

die() { printf 'update-source: %s\n' "$*" >&2; exit 1; }
out() { [ -z "${GITHUB_OUTPUT:-}" ] || printf '%s=%s\n' "$1" "$2" >> "$GITHUB_OUTPUT"; }

command -v jq >/dev/null 2>&1 || die "jq is required"

EDITED=(composer.json source/composer.json README.md contact-form-7-types.php phpstan.neon.dist CHANGELOG.md "$STUBS")

work="$(mktemp -d)"
restore=0
cleanup() {
    # A run that fails after it started to edit leaves every edited file as it was.
    local f
    if [ "$restore" = 1 ]; then
        for f in "${EDITED[@]}"; do
            [ ! -f "$work/snapshot/$f" ] || cp "$work/snapshot/$f" "$f"
        done
    fi
    rm -rf "$work"
}
trap cleanup EXIT

info="$(curl -fsSL --retry 3 "$INFO_URL")" || die "could not read $INFO_URL"
latest="$(jq -r '.version // empty' <<<"$info")"
target="${1:-$latest}"

[[ "$target" =~ ^[0-9]+(\.[0-9]+){1,3}$ ]] || die "not a version number: '$target'"

# The "Requires PHP" of the release that is followed, not of the latest one.
if [ "$target" = "$latest" ]; then
    php_floor="$(jq -r '.requires_php // empty' <<<"$info")"
else
    readme="$(curl -fsSL --retry 3 "$TAGS_URL/$target/readme.txt")" || die "could not read the readme of $target in $TAGS_URL"
    php_floor="$(sed -n 's/^Requires PHP: *//p' <<<"$readme" | head -n 1 | tr -d '[:space:]')"
fi
[[ "$php_floor" =~ ^[0-9]+\.[0-9]+$ ]] || die "no usable Requires PHP for $target: '$php_floor'"

# The stubs file uses union types and `mixed`, so it does not load below PHP 8.0. A release that
# declares less (6.1 declares 7.4) gets the floor 8.0, and the CHANGELOG line says so.
declared_php="$php_floor"
if [ "$(printf '%s\n%s\n' "$php_floor" 8.0 | sort -V | head -n 1)" != 8.0 ]; then
    php_floor=8.0
fi

current="$(jq -r '.require["contact-form-7/contact-form-7"]' source/composer.json)"
[[ "$current" =~ ^[0-9]+(\.[0-9]+){1,3}$ ]] || die "source/composer.json has no pinned version: '$current'"

if [ "$target" = "$current" ]; then
    # The PHP floor of this package is never lower than the one that CF7 declares for this release.
    floor="$(jq -r '.require.php' composer.json)"
    floor_version="${floor#>=}"
    [[ "$floor" == '>='* && "$floor_version" =~ ^[0-9]+\.[0-9]+$ ]] || die "composer.json requires php '$floor', expected the form >=8.3"
    lowest="$(printf '%s\n%s\n' "$floor_version" "$php_floor" | sort -V | head -n 1)"
    [ "$lowest" = "$php_floor" ] || die "composer.json requires php '$floor', but Contact Form 7 $current declares Requires PHP $php_floor"
    echo "Contact Form 7 $current is already the pinned version, and the PHP floor is not lower than $php_floor."
    out changed false
    exit 0
fi

highest="$(printf '%s\n%s\n' "$current" "$target" | sort -V | tail -n 1)"
[ "$highest" = "$target" ] || die "$target is older than the pinned $current, refusing to go back"

# A version that is not on WordPress.org must stop the run before any file changes.
zip="$ZIP_BASE/contact-form-7.${target}.zip"
if [ "${NO_GENERATE:-}" != 1 ]; then
    curl -fsSI --retry 3 "$zip" >/dev/null || die "$zip does not exist"
fi

# From here on a failure puts the edited files back.
for f in "${EDITED[@]}"; do
    mkdir -p "$work/snapshot/$(dirname "$f")"
    cp "$f" "$work/snapshot/$f"
done
cp "$STUBS" "$work/curated.php"
restore=1

# The raw stubs of the pinned release, from a clean download of that release.
if [ "${NO_GENERATE:-}" != 1 ]; then
    rm -rf source/contact-form-7 source/composer.lock
    bash -c "$SOURCE_CMD"
    bash -c "$GENERATE_CMD"
    cp "$STUBS" "$work/old.php"
fi

# The pinned version, the download URL and the requirement, all from one value.
jq --indent 4 --arg v "$target" --arg url "$zip" '
    .repositories[0].package.version = $v
  | .repositories[0].package.dist.url = $url
  | .require["contact-form-7/contact-form-7"] = $v' source/composer.json > "$work/source.json"
cp "$work/source.json" source/composer.json

# When it follows a release, the PHP floor of this package is the one that CF7 declares for it.
jq --indent 4 --arg php ">=${php_floor}" '.require.php = $php' composer.json > "$work/composer.json"
cp "$work/composer.json" composer.json

# The PHP version of the PHPStan analysis is the floor, written as the id that PHPStan reads (8.3 is 80300).
php_id="$(awk -F. '{ printf "%d%02d00", $1, $2 }' <<<"$php_floor")"
sed "s/^\\( *phpVersion: \\)[0-9]*/\\1${php_id}/" phpstan.neon.dist > "$work/phpstan.neon.dist"
grep -qx " *phpVersion: ${php_id}" "$work/phpstan.neon.dist" || die "phpstan.neon.dist has no 'phpVersion: <id>' line to update"
cp "$work/phpstan.neon.dist" phpstan.neon.dist

# The two places that print the version of the plugin by hand.
sed "s/^\\*\\*Current version:\\*\\* Contact Form 7 .*/**Current version:** Contact Form 7 ${target}/" README.md > "$work/README.md"
grep -qx "\*\*Current version:\*\* Contact Form 7 ${target}" "$work/README.md" || die "README.md has no line '**Current version:** Contact Form 7 ...' to update"
cp "$work/README.md" README.md
sed "s/define('WPCF7_VERSION', '[^']*')/define('WPCF7_VERSION', '${target}')/" contact-form-7-types.php > "$work/types.php"
grep -qF "define('WPCF7_VERSION', '${target}')" "$work/types.php" || die "contact-form-7-types.php has no define('WPCF7_VERSION', ...) to update"
cp "$work/types.php" contact-form-7-types.php

conflicts=0
if [ "${NO_GENERATE:-}" != 1 ]; then
    rm -rf source/contact-form-7 source/composer.lock
    bash -c "$SOURCE_CMD"
    bash -c "$GENERATE_CMD"
    cp "$STUBS" "$work/new.php"
    cp "$work/curated.php" "$STUBS"
    # The exit status is the number of conflicts, saturated at 127, and a negative value (255 in
    # a shell) is an error. The count that is reported is the one of the markers in the file.
    status=0
    git merge-file -L curated -L "cf7-$current" -L "cf7-$target" "$STUBS" "$work/old.php" "$work/new.php" || status=$?
    [ "$status" -le 127 ] || die "git merge-file failed with status $status"
    conflicts="$(grep -c '^<<<<<<< curated$' "$STUBS" || true)"
fi

python3 - "$target" "$current" "$php_floor" "$declared_php" <<'PY'
import re, sys
target, current, php, declared = sys.argv[1:5]
if php == declared:
    reason = 'the "Requires PHP" of that release'
else:
    reason = f'the least that the stubs file loads on, because that release declares "Requires PHP: {declared}"'
line = (f"- The stubs follow Contact Form 7 {target}, up from {current}. "
        f"The PHP floor of the package is {php}, {reason}\n")
text = open("CHANGELOG.md").read()
m = re.search(r"^## \[Unreleased\]\n", text, re.M)
if not m:
    sys.exit("CHANGELOG.md has no [Unreleased] section")
start = m.end()
nxt = re.search(r"^## \[", text[start:], re.M)
end = start + nxt.start() if nxt else len(text)
block = text[start:end]
ch = re.search(r"^### Changed\n\n?", block, re.M)
if ch:
    pos = ch.end()
    # Go to the end of the list that follows the heading.
    rest = block[pos:]
    stop = re.search(r"\n\n|\Z", rest)
    insert_at = pos + stop.start() + 1 if stop else len(block)
    block = block[:insert_at] + line + block[insert_at:]
else:
    block = block.rstrip("\n") + "\n\n### Changed\n\n" + line + "\n"
    if not block.startswith("\n"):
        block = "\n" + block
open("CHANGELOG.md", "w").write(text[:start] + block + text[end:])
PY

restore=0
echo "Contact Form 7 moved from $current to $target, PHP floor >=$php_floor, $conflicts conflict(s) in the stubs."
out changed true
out version "$target"
out php "$php_floor"
out conflicts "$conflicts"
