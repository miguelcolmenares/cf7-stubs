<?php
// Type assertions for what Contact Form 7 returns for a form that has not been saved.
// Run: bash tests/stub-types.sh (PHPStan reports a wrong assertion as an error).
declare(strict_types=1);

use function PHPStan\Testing\assertType;

$unsaved = WPCF7_ContactForm::get_template();

// WPCF7_ContactForm::$id and ::$name have no default and only the constructor of a saved post or
// save() sets them, so both are null for the form of the Add New screen. ::$unit_tag is set by
// form_html(). The title and the locale are set by get_template().
assertType('int|null', $unsaved->id());
assertType('string|null', $unsaved->name());
assertType('string|null', $unsaved->unit_tag());
assertType('string', $unsaved->title());
assertType('string', $unsaved->locale());

assertType('array<string, mixed>|string|null', WPCF7_ContactFormTemplate::get_default('unknown'));
