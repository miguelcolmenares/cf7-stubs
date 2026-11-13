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
of `phpstan.neon.dist` to the `Requires PHP` that Contact Form 7 declares for that release (it refuses a
release below PHP 8.0, and when there is no new release it only checks that the floor of `composer.json`
is not lower), prints the version in the README and in `contact-form-7-types.php`, adds a line under
`[Unreleased]` in the CHANGELOG, and applies the change of the plugin between the pinned release and the new one to
`contact-form-7-stubs.php` with a three-way merge. A line that was curated by hand and that the new
release also changed is a conflict, marked with `<<<<<<< curated`. Resolve each one, then run
PHPStan. The script prints how many conflicts there are.

The workflow `.github/workflows/cf7-release-watch.yml` runs the script every day and opens a draft
pull request when there is a new release. Run it by hand from the Actions tab to follow a given
version. It never tags or releases.

`bash tests/update-source.sh` tests the script with a fixture and no network.

## Testing

Before submitting a pull request:

1. Ensure stubs generate without errors
2. Run PHPStan: `vendor/bin/phpstan analyse`
3. Validate composer.json: `composer validate --strict`

`composer.lock` is not tracked, so `composer install` takes the newest PHPStan that
`composer.json` allows (`^2.1.46`). A new PHPStan release can therefore make this check fail
with no change in the repository. `phpstan.neon.dist` sets `phpVersion` to the id of the PHP floor
of the package (80300 for 8.3), and `scripts/update-source.sh` keeps the two together. If PHPStan fails on a clean branch, run
it again with the previous minor version before you change the stubs.

## Pull Request Process

1. Update the README.md with details of changes if needed
2. Update the version numbers following [Semantic Versioning](http://semver.org/)
3. The PR will be merged once you have approval from a maintainer
