#!/usr/bin/env bash

HEADER=$'/**\n * Generated stub declarations for Contact Form 7.\n * @see https://wordpress.org/plugins/contact-form-7/\n * @see https://github.com/miguelcolmenares/contact-form-7-stubs\n */'

FILE="contact-form-7-stubs.php"

set -e

# Download dependencies
if [ ! -d vendor ]; then
    composer install
fi

# Download Contact Form 7 source if not present
if [ ! -d source/contact-form-7 ]; then
    echo "Downloading Contact Form 7 source..."
    (cd source && composer install)
fi

test -d "source/contact-form-7"

# A source folder left from another release would generate stubs for that release.
if [ -f source/contact-form-7/readme.txt ]; then
    pinned="$(sed -n 's/^ *"contact-form-7\/contact-form-7": *"\([^"]*\)".*/\1/p' source/composer.json | head -n 1)"
    have="$(sed -n 's/^Stable tag: *//p' source/contact-form-7/readme.txt | head -n 1 | tr -d '[:space:]')"
    if [ "$pinned" != "$have" ]; then
        echo "source/contact-form-7 is version $have but source/composer.json pins $pinned." >&2
        echo "Delete source/contact-form-7 and run: cd source && composer install" >&2
        exit 1
    fi
fi

# Exclude globals.
"$(dirname "$0")/vendor/bin/generate-stubs" \
    --force \
    --finder=finder.php \
    --header="$HEADER" \
    --functions \
    --classes \
    --interfaces \
    --traits \
    --out="$FILE"

echo "Stubs generated successfully in $FILE"
