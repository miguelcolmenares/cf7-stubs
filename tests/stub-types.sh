#!/usr/bin/env bash
# Checks with PHPStan what the stubs say about a Contact Form 7 object that is not complete yet,
# such as the form of the Add New screen (tests/types/*.php use assertType()).
# It needs vendor/bin/phpstan (composer install).
# Run: bash tests/stub-types.sh
set -uo pipefail

REPO="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
PHPSTAN="$REPO/vendor/bin/phpstan"
[ -x "$PHPSTAN" ] || { echo "vendor/bin/phpstan not found, run: composer install" >&2; exit 2; }

cd "$REPO" || exit 2
"$PHPSTAN" analyse --no-progress --memory-limit=512M -c phpstan.neon.dist tests/types
