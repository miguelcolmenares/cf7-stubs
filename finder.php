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
    // Since 6.2 the plugin ships its own vendor folder. Keep the Rock Lobster packages, which hold
    // the SWV rules and the form data tree that the plugin API uses, and drop the autoloader, the
    // Symfony polyfills and every folder of tests, which are not part of the API.
    ->notPath('vendor/composer')
    ->notPath('vendor/symfony')
    ->notPath('vendor/bin')
    ->notPath('vendor/autoload.php')
    ->notPath('#(^|/)tests/#')
    // Exclude non-PHP files
    ->notName('*.json')
    ->notName('*.txt')
    ->notName('*.css')
    ->notName('*.js')
    ->notName('*.asset.php')
    // Only include PHP files
    ->name('*.php')
    ->sortByName();
