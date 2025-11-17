# Usage Examples

## Basic Usage with PHPStan

After installing the stubs, you can use them in your PHPStan configuration:

```neon
# phpstan.neon.dist
parameters:
    level: 8
    paths:
        - src
    bootstrapFiles:
        - vendor/miguelcolmenares/contact-form-7-stubs/contact-form-7-stubs.php
```

## Example Code with Type Hints

```php
<?php

use WPCF7_ContactForm;
use WPCF7_Submission;

/**
 * Get a contact form by ID
 *
 * @param int $id
 * @return WPCF7_ContactForm|null
 */
function get_contact_form(int $id): ?WPCF7_ContactForm {
    return wpcf7_contact_form($id);
}

/**
 * Get current submission
 *
 * @return WPCF7_Submission|null
 */
function get_current_submission(): ?WPCF7_Submission {
    return WPCF7_Submission::get_instance();
}

/**
 * Check if a form tag exists in a contact form
 *
 * @param WPCF7_ContactForm $contact_form
 * @param string $tag_type
 * @return bool
 */
function has_form_tag(WPCF7_ContactForm $contact_form, string $tag_type): bool {
    $manager = WPCF7_FormTagsManager::get_instance();
    return $manager->tag_type_supports($tag_type);
}
```

## Integration Services

```php
<?php

/**
 * Example of working with Contact Form 7 integrations
 */
function setup_integration(): void {
    $service = WPCF7_Integration::get_instance();
    
    if ($service) {
        // Work with integration service
        $categories = $service->list_categories();
    }
}
```

## Validation

```php
<?php

use WPCF7_Validation;

/**
 * Add custom validation
 *
 * @param WPCF7_Validation $result
 * @param string $name
 * @return WPCF7_Validation
 */
function custom_validation(WPCF7_Validation $result, string $name): WPCF7_Validation {
    if (empty($_POST[$name])) {
        $result->invalidate($name, 'This field is required');
    }
    
    return $result;
}
```

## With PHPStan Assertions

```php
<?php

use WPCF7_ContactForm;

function process_form(int $form_id): void {
    $form = wpcf7_contact_form($form_id);
    
    // PHPStan will understand this assertion
    assert($form instanceof WPCF7_ContactForm);
    
    $title = $form->title();
    $form_id = $form->id();
}
```

## Using with WordPress Hooks

```php
<?php

use WPCF7_ContactForm;
use WPCF7_Submission;

/**
 * Hook into form submission
 */
add_action('wpcf7_before_send_mail', function(WPCF7_ContactForm $contact_form) {
    $submission = WPCF7_Submission::get_instance();
    
    if ($submission) {
        $posted_data = $submission->get_posted_data();
        // Process posted data
    }
}, 10, 1);

/**
 * Hook into form validation
 */
add_filter('wpcf7_validate', function($result, $tags) {
    // Custom validation logic
    return $result;
}, 10, 2);
```
