# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

- A workflow, `cf7-release-watch.yml`, that looks every day for a Contact Form 7 release newer than the one the stubs follow, and opens a draft pull request when there is one. The pull request pins the new version, sets the PHP floor and the `phpVersion` of `phpstan.neon.dist` to the `Requires PHP` of that release, adds the CHANGELOG line, and applies the change of the plugin to the curated stubs file with a three-way merge, so the lines edited by hand stay. A conflict keeps its markers and the description says how many there are. It does not tag or release. It can also be started by hand for a given version
- `scripts/update-source.sh`, the script behind that workflow, and `tests/update-source.sh`, its tests. The same script fails when the PHP floor of `composer.json` (this one only, not `phpVersion`) is lower than the `Requires PHP` that Contact Form 7 declares for the followed release, so the daily run of the workflow turns red when the two drift apart. It also prints the new version in the README and in `contact-form-7-types.php`

### Changed

- `generate.sh` stops when `source/contact-form-7` is not the release that `source/composer.json` pins, so a folder left from another release cannot produce stubs for that release
- **The PHP floor is 8.3**, the `Requires PHP` that Contact Form 7 6.2 declares, and `composer.json` requires `>=8.3`, and `phpstan.neon.dist` analyses as 8.3. The stubs still follow 6.1.5, whose own `Requires PHP` is 7.4, so the floor is higher than the release that is pinned until the workflow moves it. A floor lower than the `Requires PHP` of the followed release is the error that the daily run reports. The README promised 7.4, but the stubs file does not load there: it uses native union types and `mixed`, and `php -l` fails below 8.0 (the 6.1.3.1 entry claimed 7.4 compatibility, which was wrong). The CI matrix runs PHP 8.3 and 8.4, and PHPStan runs on 8.4. `phpstan.neon.dist` analyses as PHP 8.3
- `scripts/update-source.sh` sets the PHP floor to the `Requires PHP` of the release that it follows, and never below 8.0, which is the least that the stubs file loads on. Releases of the 6.1 line declare 7.4, so they get the floor 8.0, and the CHANGELOG line it adds says so
- `finder.php` leaves out the Composer autoloader, the Symfony polyfills and every `tests/` folder of the `vendor/` directory that Contact Form 7 ships since 6.2, and keeps the Rock Lobster packages, which hold the API of the plugin
- The dev dependency `phpstan/phpstan` is now `^2.1.46`, not `^1.10 || ^2.0`. PHPStan 1.x already reported 56 errors on the stubs, and 2.1.0 to 2.1.30 report 1, so the old range promised versions that do not pass. Versions 2.1.46, 2.2.0 and 2.3.5 report none. `composer.lock` stays untracked, because this is a library
- The README badges show the Packagist version and downloads, the license, and the status of the PHPStan and Generate Stubs workflows
- The stubs follow Contact Form 7 6.1.6, up from 6.1.5. The PHP floor of the package is 8.0, the least that the stubs file loads on, because that release declares "Requires PHP: 7.4"

### Fixed

- PHPStan CI failed with PHPStan 2.3, which reads `require.php` from `composer.json` and reported native union types as unsupported. `phpstan.neon.dist` now sets `phpVersion` for the analysis of the stubs file
- Ignore `constructor.unusedParameter` for `contact-form-7-stubs.php`, since stub constructors have unused parameters by design

## [6.1.3.1] - 2025-12-15

### Fixed

- Remove standalone `null` return type declarations for PHP 7.4-8.1 compatibility
- Standalone `null` type was introduced in PHP 8.2, causing fatal errors in PHP 7.4-8.1
- Maintain PHPDoc annotations for static analysis tools (PHPStan, Psalm)
- Ensure compatibility across PHP 7.4, 8.0, 8.1, 8.2, and 8.3

### Technical Details

- Removed 19 instances of `: null` return type declarations from methods and functions
- All type information preserved in PHPDoc `@return` annotations
- Maintains Contact Form 7 6.1.3 compatibility (requires PHP 7.4+)

## [6.1.3] - 2025-11-17

### Added

- Initial release of CF7 stubs
- Support for Contact Form 7 version 6.1.3
- Complete PHPDoc type annotations and native PHP type hints
- PHPStan level:max compliance with 0 errors (using baseline for 82 known global function limitations)
- 308 function declarations with complete type hints
- 66 class declarations with return type annotations
- 8 trait declarations
- PHPStan and Psalm support

### Notes

- Stubs auto-generated from Contact Form 7 plugin source code using php-stubs/generator
- Enhanced with manual PHPDoc annotations for improved static analysis
- Compatible with PHP 7.4, 8.0, 8.1, 8.2, and 8.3
