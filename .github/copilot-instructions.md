# GitHub Copilot Instructions for Contact Form 7 Stubs

## Project Architecture

This project auto-generates PHPStan/Psalm type stubs from Contact Form 7 WordPress plugin source code, then enhances them with complete PHPDoc type annotations for 85% error reduction.

**Key Files:**
- `contact-form-7-stubs.php` - Auto-generated declarations (308 functions, 66 classes, 8 traits)
- `contact-form-7-types.php` - Manual constants (MB_IN_BYTES, etc.) that reduce stub errors
- `source/contact-form-7/` - Original CF7 v6.1.3 source (reference for types)
- `finder.php` - Configures which CF7 files to stub (excludes assets/languages)
- `generate.sh` - Runs `php-stubs/generator` to regenerate base stubs

**Type Enhancement Pattern:** Base stubs are auto-generated WITHOUT implementations or full types. Manual enhancement adds complete `@param`/`@return` annotations by cross-referencing source code implementations.

## Critical Workflows

### Regenerate Stubs (when CF7 updates)
```bash
# Update version in source/composer.json first
cd source && composer update
cd .. && ./generate.sh
```
**WARNING:** Regeneration **overwrites all manual type annotations**. You must re-apply them afterward (see type enhancement workflow below).

### Validate Type Annotations
```bash
vendor/bin/phpstan analyse contact-form-7-stubs.php --memory-limit=512M
```
**Config:** Uses `level: max` (most strict) as defined in `phpstan.neon.dist`. This matches php-stubs/generator standard (wordpress-stubs uses level 9).

**Current Status:** ~1185 errors (mostly missing `@param`/`@return` annotations). Target: reduce errors by adding complete PHPDoc type annotations by cross-referencing source implementations.

### Test in Downstream Projects
```neon
# phpstan.neon.dist
parameters:
    bootstrapFiles:
        - vendor/miguelcolmenares/cf7-stubs/contact-form-7-stubs.php
        - vendor/miguelcolmenares/cf7-stubs/contact-form-7-types.php
```

## Project-Specific Conventions

### PHPDoc Type Syntax (PHPStan-compatible)

**Arrays:**
```php
array<string, mixed>              // Associative with mixed values
array<int, WPCF7_FormTag>         // Indexed object array
array{status: string, code: int}  // Shaped array (exact keys)
```

**Common CF7 Patterns:**
```php
// Singleton getters always return class|null
/** @return WPCF7_ContactForm|null */
public static function get_instance() { return null; }

// Property accessors return mixed types
/** @return array<int|string, mixed>|string|null */
public function prop($name) { return null; }

// Finders return object arrays
/** @return array<int, WPCF7_ContactForm> */
public static function find($args = '') { return array(); }
```

### Stub File Structure (DO NOT MODIFY)

Stubs have **empty method bodies** - this is intentional:
```php
// ✅ CORRECT - declaration only
public function save() { return null; }

// ❌ WRONG - no implementation in stubs
public function save() {
    wp_insert_post($this->post);  // Never add this
    return $this;
}
```

## Type Enhancement Workflow

**When to use:** After regenerating stubs or when fixing PHPStan errors.

### 1. Locate Source Implementation
```bash
# Find class definition in source
grep -r "class WPCF7_ContactForm" source/contact-form-7/
# Result: source/contact-form-7/includes/contact-form.php
```

### 2. Compare Side-by-Side
- Left: `source/contact-form-7/includes/contact-form.php` (real code)
- Right: `contact-form-7-stubs.php` line 666+ (stub)

### 3. Infer Return Type from Source

**Example - Analyzing `prop()` method:**
```php
// SOURCE: contact-form.php
public function prop($name) {
    if (isset($this->properties[$name])) {
        return $this->properties[$name];  // Could be array|string
    }
    return null;
}

// STUB: Add this annotation
/**
 * @param string $name
 * @return array<int|string, mixed>|string|null
 */
public function prop($name) { return null; }
```

### 4. Batch Enhance with AI

**Prompt Template:**
```
Add complete PHPDoc type annotations to [CLASS_NAME] in contact-form-7-stubs.php.

Reference: source/contact-form-7/includes/[source-file].php

For each method:
1. Check actual return statements in source
2. Add @param with specific types (not just "mixed")
3. Add @return based on what source actually returns
4. Use array<key, value> syntax, not generic "array"

Start with these methods: [list from PHPStan errors]
```

### 5. Verify with PHPStan
```bash
# Check all stubs
vendor/bin/phpstan analyse contact-form-7-stubs.php --memory-limit=512M

# View specific error types
vendor/bin/phpstan analyse contact-form-7-stubs.php --memory-limit=512M 2>&1 | grep "WPCF7_ContactForm"
```
**Goal:** Reduce error count by adding complete, accurate type annotations based on source implementations.

## PHPStan Level:Max Requirements

### Native Type Hints for Stub Files

**Key Discovery:** PHPStan at `level: max` requires BOTH PHPDoc annotations AND native PHP type hints in function/method signatures.

**Why This Matters for Stubs:**
- Stub files are for static analysis only, not runtime execution
- We can safely add native type hints even if the original CF7 code lacks them
- PHPDoc provides detailed type information (e.g., array shapes)
- Native type hints satisfy PHPStan's level:max requirements

**Type Hint Requirements:**

```php
// ❌ INSUFFICIENT - PHPDoc only (PHPStan error: "parameter with no type specified")
/** @param string $menu_slug */
function wpcf7_admin_menu_change_notice($menu_slug = '') {
    return '';
}

// ✅ CORRECT - Both PHPDoc AND native type hints
/** @param string $menu_slug */
function wpcf7_admin_menu_change_notice(string $menu_slug = '') : string {
    return '';
}
```

**Implementation Patterns:**

```php
// String parameters with defaults
/** @param string $foo */
function bar(string $foo = '') : string { return ''; }

// Array parameters
/** @param array<string, mixed> $options */
function configure(array $options = []) : void {}

// Class type parameters
/** @param WPCF7_ContactForm $form */
function process(WPCF7_ContactForm $form) : bool { return false; }

// Nullable return types
/** @return WPCF7_ContactForm|null */
public static function get_instance() : ?WPCF7_ContactForm { return null; }

// Array return types
/** @return array<int, string> */
public function get_categories() : array { return array(); }

// Void returns
/** @return void */
function wpcf7_admin_menu() : void {}

// Boolean returns
/** @return bool */
function wpcf7_is_posted() : bool { return false; }

// Multiple parameters
/**
 * @param string $page
 * @param string $action
 * @param WPCF7_ContactForm $object
 * @return void
 */
function wpcf7_admin_updated_message(string $page, string $action, WPCF7_ContactForm $object) : void {}
```

**Workflow for Adding Type Hints:**

1. **Identify functions missing type hints:**
   ```bash
   vendor/bin/phpstan analyse contact-form-7-stubs.php --memory-limit=512M 2>&1 | grep "parameter.*with no type specified"
   ```

2. **Check source implementation for parameter types:**
   ```bash
   grep -A 10 "function wpcf7_function_name" source/contact-form-7/
   ```

3. **Add native type hints matching PHPDoc:**
   - Keep existing PHPDoc (provides array shapes, union types, etc.)
   - Add native type hint to function signature
   - Add return type hint

4. **Verify error reduction:**
   ```bash
   vendor/bin/phpstan analyse contact-form-7-stubs.php --memory-limit=512M 2>&1 | tail -3
   ```

**Error Categories Requiring Native Type Hints:**
- `missingType.parameter` - Function/method parameters without native type hints
- `missingType.return` - Functions/methods without return type declarations

**Best Practices:**
- Always add BOTH PHPDoc and native type hints for maximum precision
- Use PHPDoc for complex types (shaped arrays, union types with null)
- Use native hints for simple types (string, int, bool, array, class names)
- Maintain consistency with existing stub conventions
- Test changes incrementally to catch errors early

## Common Pitfalls

### ❌ Default Value Mismatches
```php
// PHPStan error: "Default false incompatible with type string"
public function get_size($default = false) {}  // WRONG

// Fix: Match source code's actual default
/** @param string $default */
public function get_size($default = '') {}  // CORRECT
```

### ❌ Missing Shaped Array Types
```php
// Too generic - PHPStan can't validate array keys
/** @return array */
public function submit() {}

// Correct - documents exact structure
/** @return array{status: string, message: string, invalid_fields: array<string, mixed>} */
public function submit() {}
```

### ❌ Skipping @param Annotations
```php
// Incomplete - PHPStan doesn't know argument types
/** @return string */
public function format($input, $options) {}

// Complete
/**
 * @param string $input
 * @param array<string, mixed> $options
 * @return string
 */
public function format($input, $options) {}
```

## Maintenance Checklist

**Before committing type enhancements:**
- [ ] All methods have `@return` (even if `void`)
- [ ] All parameters have `@param` with specific types
- [ ] Arrays use `array<key, value>` or shaped syntax
- [ ] Types verified against source implementations
- [ ] PHPStan errors reduced (level: max)
- [ ] No implementations added to stub methods

**After CF7 version update:**
- [ ] Updated `source/composer.json` with new version/URL
- [ ] Ran `./generate.sh` successfully
- [ ] Re-applied type annotations (they were lost in regeneration)
- [ ] Verified error reduction maintained at level max
- [ ] Tagged release matching CF7 version

## Integration with WordPress

CF7 stubs depend on WordPress stubs. Load order matters:

```neon
# phpstan.neon.dist
parameters:
    bootstrapFiles:
        - vendor/php-stubs/wordpress-stubs/wordpress-stubs.php  # Load FIRST
        - vendor/miguelcolmenares/contact-form-7-stubs/contact-form-7-stubs.php
        - vendor/miguelcolmenares/contact-form-7-stubs/contact-form-7-types.php
```

## GitHub CLI Workflows

**IMPORTANT:** Always use `PAGER=cat gh ...` or `gh ... | cat` to prevent interactive pager issues.

### Monitor CI/CD Status
```bash
# View workflow runs
PAGER=cat gh run list
gh run list | cat

# Watch specific workflow run
PAGER=cat gh run view <run-id>
gh run view <run-id> | cat

# View workflow run logs
PAGER=cat gh run view <run-id> --log
gh run view --log | cat

# Check status of latest run
PAGER=cat gh run list --limit 1
```

### Common Workflow Tasks
```bash
# List all workflows
PAGER=cat gh workflow list

# View workflow details
PAGER=cat gh workflow view <workflow-name>

# Trigger manual workflow
gh workflow run <workflow-name>

# Re-run failed jobs
gh run rerun <run-id>

# Cancel running workflow
gh run cancel <run-id>
```

### Pull Request Commands
```bash
# View PR checks status
PAGER=cat gh pr checks
gh pr checks | cat

# View PR status
PAGER=cat gh pr status

# View PR details
PAGER=cat gh pr view <pr-number>
```

## Quick Reference

| Task | Command |
|------|---------|
| Regenerate stubs | `./generate.sh` |
| Check errors | `vendor/bin/phpstan analyse contact-form-7-stubs.php --memory-limit=512M` |
| Update CF7 version | Edit `source/composer.json`, run `cd source && composer update` |
| Find source class | `grep -r "class WPCF7_ClassName" source/contact-form-7/` |
| Validate package | `composer validate --strict` |
| View workflow runs | `PAGER=cat gh run list` or `gh run list \| cat` |
| Check workflow logs | `PAGER=cat gh run view --log` |
