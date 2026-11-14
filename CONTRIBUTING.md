# Contributing to Contact Form 7 Stubs

Thank you for considering contributing to Contact Form 7 Stubs!

## Development Setup

1. Clone the repository:

```bash
git clone https://github.com/miguelcolmenares/cf7-stubs.git
cd cf7-stubs
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

The stubs file is curated by hand (docblocks, return types and bodies that the generator does not
write), so running `./generate.sh` on its own overwrites that work. Use the script instead:

```bash
bash scripts/update-source.sh          # the latest release on WordPress.org
bash scripts/update-source.sh 6.2.5    # a given release
```

It pins the version in `source/composer.json`, sets the PHP floor of `composer.json` and the `phpVersion`
of `phpstan.neon.dist` to the `Requires PHP` that Contact Form 7 declares for that release (it never goes
below PHP 8.0, the least the stubs file loads on, and when there is no new release it only checks that the floor of `composer.json`
is not lower), prints the version in the README and in `contact-form-7-types.php`, adds a line under
`[Unreleased]` in the CHANGELOG, and applies the change of the plugin between the pinned release and the new one to
`contact-form-7-stubs.php` with a three-way merge. A line that was curated by hand and that the new
release also changed is a conflict, marked with `<<<<<<< curated`. Resolve each one, then run
PHPStan. The script prints how many conflicts there are.

The workflow `.github/workflows/cf7-release-watch.yml` runs the script every day and opens a draft
pull request when there is a new release, and requests a review from the owner of the repository so
that GitHub sends a notification. Run it by hand from the Actions tab to follow a given
version. It never tags or releases.

`bash tests/update-source.sh` tests the script with a fixture and no network.

## Comparing the stubs with the plugin

The types in the stubs file are curated by hand, so a wrong one makes PHPStan accept a bug or reject
correct code. `scripts/compare-stubs.sh` reads every declaration of `source/contact-form-7` and of
`contact-form-7-stubs.php` and writes a Markdown report:

```bash
cd source && composer install && cd ..     # the release that the stubs follow
bash scripts/compare-stubs.sh              # the report on standard output
bash scripts/compare-stubs.sh --check --report /tmp/stubs-report.md
```

The report has three kinds of section:

- **Structure** (functions, classes, methods, properties and constants on one side only, kinds, parents,
  interface lists and modifiers, by-reference returns, native types of properties, parameter names, order,
  defaults, by-reference and variadic flags, and native types that the plugin declares on a parameter). These are facts, and
  `--check` exits 1 when one is not empty. CI runs it. A method that the stubs leave out of a class but
  declare on a parent class counts as there.
- **Review** (return types that differ, native or documented, stub bodies that contradict their type, and
  parameter types that the stubs add where the plugin has only a docblock that does not fit). These are leads. Read the real function and every
  `return` of it before you change a type. Some differences are on purpose, such as `string|false` in the
  stubs where the plugin documents `string|bool`. They never fail `--check`.
- **Undocumented** (types that the stubs add where the plugin declares and documents none). Only the
  plugin code can confirm them, so they are leads too and never fail `--check`.

The script refuses to compare when `source/contact-form-7` is not the release in
`contact-form-7-types.php`. `bash tests/compare-stubs.sh` tests it with a small fixture and no network,
and needs `composer install` for `nikic/php-parser`.

## Testing

Before submitting a pull request:

1. Ensure stubs generate without errors
2. Run PHPStan: `vendor/bin/phpstan analyse`
3. Compare with the plugin: `bash scripts/compare-stubs.sh --check` (needs `cd source && composer install` first)
4. Run the script tests: `bash tests/update-source.sh` and `bash tests/compare-stubs.sh`
5. Validate composer.json: `composer validate --strict`

`composer.lock` is not tracked, so `composer install` takes the newest PHPStan that
`composer.json` allows (`^2.1.46`). A new PHPStan release can therefore make this check fail
with no change in the repository. `phpstan.neon.dist` sets `phpVersion` to the id of the PHP floor
of the package (80300 for 8.3), and `scripts/update-source.sh` keeps the two together. If PHPStan fails on a clean branch, run
it again with the previous minor version before you change the stubs.

## Pull Request Process

1. Update the README.md with details of changes if needed
2. Update the version numbers following [Semantic Versioning](http://semver.org/)
3. The PR will be merged once you have approval from a maintainer
