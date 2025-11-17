# Contact Form 7 Stubs

[![Packagist](https://img.shields.io/packagist/v/miguelcolmenares/cf7-stubs.svg?color=4CC61E&style=popout)](https://packagist.org/packages/miguelcolmenares/cf7-stubs)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

Provides stub declarations for [Contact Form 7](https://wordpress.org/plugins/contact-form-7/) functions, classes, interfaces, and traits. These stubs can help plugin and theme developers leverage static analysis tools like [PHPStan](https://github.com/phpstan/phpstan) and [Psalm](https://psalm.dev/).

The package includes two files:

- `contact-form-7-stubs.php` - Auto-generated stubs from Contact Form 7 source code
- `contact-form-7-types.php` - Additional constants and type definitions

> **Note:** The auto-generated stubs may have some PHPStan errors due to missing type hints in the original CF7 code. Including `contact-form-7-types.php` helps reduce these errors by providing essential constants like `MB_IN_BYTES`.

**Current version:** Contact Form 7 6.1.3

**Stubs include:**

- 308 functions
- 66 classes
- 8 traits
- 0 interfaces

The stubs are generated directly from the Contact Form 7 plugin source code using [php-stubs/generator](https://github.com/php-stubs/generator).

## Requirements

- PHP 7.4 or 8.0+

## Installation

Require this package as a development dependency with [Composer](https://getcomposer.org).

```bash
composer require --dev miguelcolmenares/cf7-stubs
```

Alternatively you may download `contact-form-7-stubs.php` directly.

## Usage with PHPStan

```bash
composer require --dev szepeviktor/phpstan-wordpress
```

The package [`szepeviktor/phpstan-wordpress`](https://github.com/szepeviktor/phpstan-wordpress) depends on [`phpstan/phpstan`](http://github.com/phpstan/phpstan) and WordPress stubs. Then include the Contact Form 7 stubs in your PHPStan configuration:

```neon
# phpstan.neon.dist
parameters:
    bootstrapFiles:
        - vendor/miguelcolmenares/cf7-stubs/contact-form-7-stubs.php
        - vendor/miguelcolmenares/cf7-stubs/contact-form-7-types.php
```

**Note:** Make sure WordPress stubs are loaded before Contact Form 7 stubs, as CF7 depends on WordPress classes. The `contact-form-7-types.php` file provides additional type annotations that improve static analysis accuracy.

## Usage with Psalm

Update your Psalm config to include this section:

```xml
<stubs>
    <file name="vendor/miguelcolmenares/cf7-stubs/contact-form-7-stubs.php" />
</stubs>
```

Furthermore, ensure Contact Form 7 plugin files are _not_ included in `<projectFiles>`.

## Usage in Intellisense

If your IDE has trouble parsing Contact Form 7, you may find the stubs useful for enabling code completion and related features. For example, there are [instructions](https://github.com/bmewburn/vscode-intelephense/issues/113) for usage with VSCode's [Intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client) extension.

## Versioning

This package is versioned to match the Contact Form 7 version from which the stubs are generated.

## Generating stubs for a different Contact Form 7 version

1. Run a modern PHP version (7.4+)
2. Clone this repository and `cd` into it
3. Update the version in `source/composer.json`:

   ```json
   "contact-form-7/contact-form-7": "x.x.x"
   ```

   And update the download URL:

   ```json
   "url": "https://downloads.wordpress.org/plugin/contact-form-7.x.x.x.zip"
   ```

4. Run `composer update` in the `source` directory (or delete `source/contact-form-7` to force re-download)
5. Run `./generate.sh` from the root directory

The `contact-form-7-stubs.php` file should now be updated.

## Trademark Notice

"Contact Form 7" is a trademark of Rock Lobster, LLC. This project is not affiliated with, endorsed by, or sponsored by Rock Lobster, LLC or the Contact Form 7 project. This is an independent tool created to provide static analysis support for developers using the Contact Form 7 plugin.

For more information, see the [Contact Form 7 Trademark Policy](https://contactform7.com/trademark-policy/).

## License

MIT
