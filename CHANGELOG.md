# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

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
