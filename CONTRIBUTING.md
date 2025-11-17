# Contributing to Contact Form 7 Stubs

Thank you for considering contributing to Contact Form 7 Stubs!

## Development Setup

1. Clone the repository:

```bash
git clone https://github.com/miguelcolmenares/contact-form-7-stubs.git
cd contact-form-7-stubs
```

2. Install dependencies:

```bash
composer install
cd source && composer install
```

3. Generate stubs:

```bash
./generate.sh
```

## Updating Contact Form 7 Version

To generate stubs for a new version of Contact Form 7:

1. Update the version and URL in `source/composer.json`
2. Delete the `source/contact-form-7` directory if it exists
3. Run `cd source && composer install` to download the new version
4. Run `./generate.sh` from the root directory
5. Commit the updated `contact-form-7-stubs.php` file

## Testing

Before submitting a pull request:

1. Ensure stubs generate without errors
2. Run PHPStan: `vendor/bin/phpstan analyse`
3. Validate composer.json: `composer validate --strict`

## Pull Request Process

1. Update the README.md with details of changes if needed
2. Update the version numbers following [Semantic Versioning](http://semver.org/)
3. The PR will be merged once you have approval from a maintainer
