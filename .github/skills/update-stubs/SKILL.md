---
name: update-stubs
description: "Update CF7 stubs to a new Contact Form 7 plugin version. Use when: upgrading stubs, bumping CF7 version, new CF7 release, regenerating stubs, updating source version. Covers the full workflow: changelog analysis, backup, regeneration, diff comparison, annotation restoration, and validation."
---

# Update CF7 Stubs to a New Version

This skill covers the complete workflow for updating the Contact Form 7 stubs when a new CF7 plugin version is released.

## When to Use

- A new Contact Form 7 version has been released
- You need to bump the CF7 source version in this project
- Stubs need to be regenerated after a CF7 update

## Prerequisites

- `composer install` completed in the project root
- PHP 8.2+ available
- The new CF7 version number (e.g., `6.1.5`)
- The current CF7 version from `source/composer.json`

---

## Workflow Overview

```
1. Analyze Changelog  →  Understand what changed
2. Backup Stubs       →  Preserve manual annotations
3. Update Source       →  Point to new CF7 version
4. Regenerate Stubs   →  Run generate.sh (overwrites annotations!)
5. Diff Comparison     →  Find new/changed/removed declarations
6. Restore & Merge    →  Bring back annotations + add new declarations
7. Validate            →  PHPStan must pass with 0 errors
8. Commit              →  Commit all changes
```

---

## Step 1: Analyze Changelog

Before touching any code, understand what changed between versions.

### 1a. Check the CF7 Release Notes

```bash
# Visit release pages
# https://contactform7.com/category/releases/
```

### 1b. Compare Versions on GitHub

Use the GitHub compare view to see exact file changes:

```
https://github.com/rocklobster-in/contact-form-7/compare/vOLD_VERSION...vNEW_VERSION
```

Example:
```
https://github.com/rocklobster-in/contact-form-7/compare/v6.1.3...v6.1.5
```

### 1c. Classify Changes

Look for these categories in the diff:

| Category | Impact on Stubs | Action Required |
|----------|----------------|-----------------|
| New public functions | HIGH | Add to stubs with type annotations |
| New public classes/methods | HIGH | Add to stubs with type annotations |
| Changed function signatures | HIGH | Update signatures in stubs |
| New private/protected methods | NONE | Private methods don't appear in stubs |
| Internal logic changes | NONE | No stub changes needed |
| Version bumps (package.json, etc.) | NONE | Only update source/composer.json |
| I18n/translation changes | NONE | No stub changes needed |

---

## Step 2: Backup Annotated Stubs

**CRITICAL:** `generate.sh` overwrites ALL manual type annotations. Always backup first.

```bash
cp contact-form-7-stubs.php contact-form-7-stubs.php.annotated
```

---

## Step 3: Update Source Version

Edit `source/composer.json` to point to the new CF7 version. Three values must change:

```json
{
    "repositories": [{
        "package": {
            "version": "NEW_VERSION",
            "dist": {
                "url": "https://downloads.wordpress.org/plugin/contact-form-7.NEW_VERSION.zip"
            }
        }
    }],
    "require": {
        "contact-form-7/contact-form-7": "NEW_VERSION"
    }
}
```

Then download the new source:

```bash
rm -rf source/contact-form-7 source/composer.lock
cd source && composer install --no-interaction
cd ..
```

### Verify the version:

```bash
grep "WPCF7_VERSION" source/contact-form-7/wp-contact-form-7.php
# Should output: define( 'WPCF7_VERSION', 'NEW_VERSION' );
```

---

## Step 4: Regenerate Stubs

```bash
./generate.sh
```

Expected output:
```
PHP Stubs Generator
===================
 [OK] Stubs written to contact-form-7-stubs.php

 ----------- --------- ------------ -------- ----------- ---------
  functions   classes   interfaces   traits   constants   globals
 ----------- --------- ------------ -------- ----------- ---------
  308         66        0            8        0           0
 ----------- --------- ------------ -------- ----------- ---------
```

**Note the counts.** Compare with previous version to spot additions/removals.

---

## Step 5: Diff Comparison

### 5a. Compare Function Names

```bash
diff \
  <(grep -oE 'function [a-zA-Z_]+' contact-form-7-stubs.php.annotated | sort) \
  <(grep -oE 'function [a-zA-Z_]+' contact-form-7-stubs.php | sort)
```

### 5b. Compare Class Names

```bash
diff \
  <(grep -oE 'class [a-zA-Z_]+' contact-form-7-stubs.php.annotated | sort) \
  <(grep -oE 'class [a-zA-Z_]+' contact-form-7-stubs.php | sort)
```

### 5c. Interpret Results

- **No output** = identical declarations, no public API changes
- **Lines with `>`** = new declarations in the new version
- **Lines with `<`** = removed declarations (verify intentional)

If there are NO new declarations, skip to Step 6 (restore).

### 5d. If New Declarations Exist

Extract the new function/class declarations from the regenerated file:

```bash
# Find the new function in the regenerated stubs
grep -n "function NEW_FUNCTION_NAME" contact-form-7-stubs.php
```

Read the source implementation to determine correct types:

```bash
grep -r "function NEW_FUNCTION_NAME" source/contact-form-7/
```

Save the new declarations with their line numbers for later merging.

---

## Step 6: Restore & Merge Annotations

### 6a. If No New Declarations

Simply restore the backup:

```bash
cp contact-form-7-stubs.php.annotated contact-form-7-stubs.php
```

### 6b. If New Declarations Exist

1. Restore the annotated backup:
   ```bash
   cp contact-form-7-stubs.php.annotated contact-form-7-stubs.php
   ```

2. Add new declarations manually with proper type annotations:
   - Find where the new function belongs (functions are grouped by source file)
   - Add PHPDoc `@param` and `@return` annotations
   - Add native PHP type hints
   - Cross-reference the source implementation for accurate types

3. If function signatures changed:
   - Update the signature in the annotated file
   - Verify PHPDoc matches the new signature

### Type Enhancement Pattern

For each new function, follow this pattern:

```php
/**
 * Brief description from source PHPDoc.
 *
 * @param string $param1 Description.
 * @param array<string, mixed> $param2 Description.
 * @return string|false Description.
 */
function wpcf7_new_function(string $param1, array $param2 = array()): string|false
{
    return false;
}
```

**Rules:**
- Add BOTH PHPDoc AND native type hints
- Use `array<key, value>` syntax, not generic `array`
- Check actual return statements in source for accurate return types
- Stub bodies must be empty or return a default value — NO implementations

---

## Step 7: Validate

### 7a. Run PHPStan

```bash
vendor/bin/phpstan analyse --no-progress --memory-limit=512M
```

**Must show `[OK] No errors`.**

### 7b. If Errors Appear

Common error types and fixes:

| Error | Cause | Fix |
|-------|-------|-----|
| `return.phpDocType` | PHPDoc doesn't match native type | Align PHPDoc with native hint |
| `return.unusedType` | Stub body only returns one type | Add to baseline (expected for stubs) |
| `parameter.phpDocType` | PHPDoc param doesn't match native | Align PHPDoc with native hint |
| `missingType.iterableValue` | Array without value type | Add `array<key, value>` in PHPDoc |

### 7c. Regenerate Baseline if Needed

If new `return.unusedType` errors appear (inherent to stubs):

```bash
vendor/bin/phpstan analyse --generate-baseline --memory-limit=512M
```

Then verify:

```bash
vendor/bin/phpstan analyse --no-progress --memory-limit=512M
# Must show: [OK] No errors
```

---

## Step 8: Commit

```bash
# Clean up backup
rm -f contact-form-7-stubs.php.annotated

# Stage changes
git add contact-form-7-stubs.php phpstan-baseline.neon source/composer.json

# Commit with descriptive message
git commit -m "chore: Bump CF7 source version to X.Y.Z

- Update source/composer.json to download CF7 X.Y.Z
- [List any new functions/classes added]
- [List any signature changes]
- [Summary of CF7 changelog highlights]"
```

---

## Quick Reference

| Task | Command |
|------|---------|
| Current CF7 version | `grep version source/composer.json` |
| Backup stubs | `cp contact-form-7-stubs.php contact-form-7-stubs.php.annotated` |
| Download new source | `rm -rf source/contact-form-7 source/composer.lock && cd source && composer install` |
| Verify source version | `grep WPCF7_VERSION source/contact-form-7/wp-contact-form-7.php` |
| Regenerate stubs | `./generate.sh` |
| Compare functions | `diff <(grep -oE 'function [a-zA-Z_]+' *.annotated \| sort) <(grep -oE 'function [a-zA-Z_]+' contact-form-7-stubs.php \| sort)` |
| Restore backup | `cp contact-form-7-stubs.php.annotated contact-form-7-stubs.php` |
| Run PHPStan | `vendor/bin/phpstan analyse --no-progress --memory-limit=512M` |
| Regenerate baseline | `vendor/bin/phpstan analyse --generate-baseline --memory-limit=512M` |

## Common Pitfalls

### ❌ Forgetting to Backup Before Regenerating
`generate.sh` **overwrites all manual annotations**. Always backup first.

### ❌ Not Checking for Signature Changes
Even if function counts match, signatures may have changed (new parameters, different defaults). Always review the GitHub compare diff.

### ❌ Adding Implementations to Stubs
Stubs have **empty method bodies**. Never add real logic:
```php
// ✅ CORRECT
function wpcf7_foo(): string { return ''; }

// ❌ WRONG
function wpcf7_foo(): string { return get_option('wpcf7_foo'); }
```

### ❌ Committing Without PHPStan Validation
Always run PHPStan before committing. CI will catch errors, but it's faster to fix locally.
