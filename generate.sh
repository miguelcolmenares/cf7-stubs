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
