<?php

declare(strict_types=1);

use StubsGenerator\Finder;

return Finder::create()
    ->in('source/contact-form-7')
    // Exclude assets (CSS, JS, images)
    ->notPath('admin/includes/css')
    ->notPath('admin/includes/js')
    ->notPath('includes/css')
    ->notPath('includes/js')
    ->notPath('includes/block-editor/index.js')
    ->notPath('includes/swv/js')
    ->notPath('modules/recaptcha/index.js')
    ->notPath('modules/stripe/index.js')
    ->notPath('assets')
    ->notPath('languages')
    // Exclude non-PHP files
    ->notName('*.json')
    ->notName('*.txt')
    ->notName('*.css')
    ->notName('*.js')
    ->notName('*.asset.php')
    // Only include PHP files
    ->name('*.php')
    ->sortByName();
