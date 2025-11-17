<?php

/**
 * Generated stub declarations for Contact Form 7.
 * @see https://wordpress.org/plugins/contact-form-7/
 * @see https://github.com/miguelcolmenares/contact-form-7-stubs
 */

namespace {
    class WPCF7_Contact_Form_List_Table extends \WP_List_Table
    {
        /**
         * @return array<string, string>
         */
        public static function define_columns()
        {
            return array();
        }
        /**
         * @return void
         */
        public function __construct() {}
        /**
         * @return void
         */
        public function prepare_items() {}
        /**
         * @return array<string, string>
         */
        public function get_columns()
        {
            return array();
        }
        /**
         * @return array<string, string>
         */
        protected function get_sortable_columns()
        {
            return array();
        }
        /**
         * @return array<string, string>
         */
        protected function get_bulk_actions()
        {
            return array();
        }
        /**
         * @param array<string, mixed> $item
         * @param string $column_name
         * @return string
         */
        protected function column_default($item, $column_name)
        {
            return '';
        }
        /**
         * @param array<string, mixed> $item
         * @return string
         */
        public function column_cb($item)
        {
            return '';
        }
        /**
         * @param array<string, mixed> $item
         * @return string
         */
        public function column_title($item)
        {
            return '';
        }
        /**
         * @param array<string, mixed> $item
         * @param string $column_name
         * @param string $primary
         * @return string
         */
        protected function handle_row_actions($item, $column_name, $primary)
        {
            return '';
        }
        /**
         * @param array<string, mixed> $item
         * @return string
         */
        public function column_author($item)
        {
            return '';
        }
        /**
         * @param array<string, mixed> $item
         * @return string
         */
        public function column_shortcode($item)
        {
            return '';
        }
        /**
         * @param array<string, mixed> $item
         * @return string
         */
        public function column_date($item)
        {
            return '';
        }
    }
    class WPCF7_Editor
    {
        /**
         * @param-unused \WPCF7_ContactForm $contact_form
         * @return void
         */
        public function __construct(\WPCF7_ContactForm $contact_form) {
            // Suppress PHPStan unused parameter warning in stub
            unset($contact_form);
        }
        /**
         * @param string $panel_id
         * @param string $title
         * @param callable $callback
         * @return void
         */
        public function add_panel($panel_id, $title, $callback) {}
        /**
         * @return void
         */
        public function display() {}
    }
    class WPCF7_Help_Tabs
    {
        /**
         * @param-unused \WP_Screen $screen
         * @return void
         */
        public function __construct(\WP_Screen $screen) {
            // Suppress PHPStan unused parameter warning in stub
            unset($screen);
        }
        /**
         * @param string $screen_type
         * @return void
         */
        public function set_help_tabs($screen_type): void {}
        /**
         * @return string
         */
        public function sidebar(): string
        {
            return '';
        }
    }
    /**
     * The base class for form-tag generators management.
     */
    class WPCF7_TagGenerator
    {
        /**
         * Returns the singleton instance of this class.
         * @return WPCF7_TagGenerator|null
         */
        public static function get_instance(): ?WPCF7_TagGenerator
        {
            return null;
        }
        /**
         * Adds a form-tag generator instance.
         *
         * @param string $id Generator ID.
         * @param string $title Generator title.
         * @param callable $callback Generator callback function.
         * @param string|array<string, mixed> $options Generator options.
         * @return void
         */
        public function add(string $id, string $title, callable $callback, $options = ''): void {}
        /**
         * Renders form-tag generator calling buttons.
         *
         * @return void
         */
        public function print_buttons(): void {}
        /**
         * Renders form-tag generator dialog panels (hidden until called).
         *
         * @param WPCF7_ContactForm $contact_form The contact form object.
         * @return void
         */
        public function print_panels(\WPCF7_ContactForm $contact_form): void {}
    }
    /**
     * Class helps to implement a form-tag generator content.
     */
    class WPCF7_TagGeneratorGenerator
    {
        /**
         * The constructor.
         *
         * @param string $key Generator key.
         */
        public function __construct($key) {
            // Suppress PHPStan unused parameter warning in stub
            unset($key);
        }
        /**
         * Returns a unique reference ID.
         *
         * @param string $suffix Optional suffix to append.
         * @return string Unique reference ID.
         */
        public function ref($suffix = ''): string
        {
            return '';
        }
        /**
         * Calls one of the template methods.
         *
         * @param string $part Template part name.
         * @param string|array<string, mixed> $options Template options.
         * @return void
         */
        public function print($part, $options = ''): void {}
    }
    abstract class WPCF7_WelcomePanelColumn
    {
        /**
         * Returns the icon HTML.
         *
         * @return string Icon HTML.
         */
        protected abstract function icon();
        /**
         * Returns the title text.
         *
         * @return string Title text.
         */
        protected abstract function title();
        /**
         * Returns the content HTML.
         *
         * @return string Content HTML.
         */
        protected abstract function content();
        /**
         * Prints the content.
         *
         * @return void
         */
        public function print_content(): void {}
    }
    class WPCF7_WelcomePanelColumn_AntiSpam extends \WPCF7_WelcomePanelColumn
    {
        /**
         * Returns the icon HTML.
         *
         * @return string Icon HTML.
         */
        protected function icon(): string
        {
            return '';
        }
        /**
         * Returns the title text.
         *
         * @return string Title text.
         */
        protected function title(): string
        {
            return '';
        }
        /**
         * Returns the content HTML.
         *
         * @return string Content HTML.
         */
        protected function content(): string
        {
            return '';
        }
    }
    class WPCF7_WelcomePanelColumn_Donation extends \WPCF7_WelcomePanelColumn
    {
        /**
         * Returns the icon HTML.
         *
         * @return string Icon HTML.
         */
        protected function icon(): string
        {
            return '';
        }
        /**
         * Returns the title text.
         *
         * @return string Title text.
         */
        protected function title(): string
        {
            return '';
        }
        /**
         * Returns the content HTML.
         *
         * @return string Content HTML.
         */
        protected function content(): string
        {
            return '';
        }
    }
    class WPCF7_WelcomePanelColumn_Flamingo extends \WPCF7_WelcomePanelColumn
    {
        /**
         * Returns the icon HTML.
         *
         * @return string Icon HTML.
         */
        protected function icon(): string
        {
            return '';
        }
        /**
         * Returns the title text.
         *
         * @return string Title text.
         */
        protected function title(): string
        {
            return '';
        }
        /**
         * Returns the content HTML.
         *
         * @return string Content HTML.
         */
        protected function content(): string
        {
            return '';
        }
    }
    class WPCF7_WelcomePanelColumn_Integration extends \WPCF7_WelcomePanelColumn
    {
        /**
         * Returns the icon HTML.
         *
         * @return string Icon HTML.
         */
        protected function icon(): string
        {
            return '';
        }
        /**
         * Returns the title text.
         *
         * @return string Title text.
         */
        protected function title(): string
        {
            return '';
        }
        /**
         * Returns the content HTML.
         *
         * @return string Content HTML.
         */
        protected function content(): string
        {
            return '';
        }
    }
    trait WPCF7_ConfigValidator_AdditionalSettings
    {
        /**
         * Runs error detection for the additional settings section.
         *
         * @return void
         */
        public function validate_additional_settings(): void {}
    }
    trait WPCF7_ConfigValidator_Form
    {
        /**
         * Runs error detection for the form section.
         *
         * @return void
         */
        public function validate_form(): void {}
        /**
         * Detects errors of multiple form controls in a single label.
         *
         * @link https://contactform7.com/configuration-errors/multiple-controls-in-label/
         */
        public function detect_multiple_controls_in_label(string $section, string $content): bool
        {
            return false;
        }
        /**
         * Detects errors of unavailable form-tag names.
         *
         * @link https://contactform7.com/configuration-errors/unavailable-names/
         */
        public function detect_unavailable_names(string $section, string $content): bool
        {
            return false;
        }
        /**
         * Detects errors of unavailable HTML elements.
         *
         * @link https://contactform7.com/configuration-errors/unavailable-html-elements/
         */
        public function detect_unavailable_html_elements(string $section, string $content): bool
        {
            return false;
        }
        /**
         * Detects errors of dots in form-tag names.
         *
         * @link https://contactform7.com/configuration-errors/dots-in-names/
         */
        public function detect_dots_in_names(string $section, string $content): bool
        {
            return false;
        }
        /**
         * Detects errors of colons in form-tag names.
         *
         * @link https://contactform7.com/configuration-errors/colons-in-names/
         */
        public function detect_colons_in_names(string $section, string $content): bool
        {
            return false;
        }
        /**
         * Detects errors of uploadable file size overlimit.
         *
         * @link https://contactform7.com/configuration-errors/upload-filesize-overlimit
         */
        public function detect_upload_filesize_overlimit(string $section, string $content): bool
        {
            return false;
        }
    }
    trait WPCF7_ConfigValidator_Mail
    {
        /**
         * Replaces all mail-tags in the given content.
         */
        public function replace_mail_tags(string $content, mixed $options = ''): string
        {
            return '';
        }
        /**
         * Callback function for WPCF7_MailTaggedText. Replaces mail-tags with
         * the most conservative inputs.
         *
         * @param array<int, string> $matches
         */
        public function replace_mail_tags_with_minimum_input_callback(array $matches): string
        {
            return '';
        }
        /**
         * Runs error detection for the mail sections.
         */
        public function validate_mail(string $template = 'mail'): bool
        {
            return false;
        }
        /**
         * Runs error detection for the mail subject section.
         */
        public function validate_mail_subject(string $template, string $content): bool
        {
            return false;
        }
        /**
         * Runs error detection for the mail sender section.
         */
        public function validate_mail_sender(string $template, string $content): bool
        {
            return false;
        }
        /**
         * Runs error detection for the mail recipient section.
         */
        public function validate_mail_recipient(string $template, string $content): bool
        {
            return false;
        }
        /**
         * Runs error detection for the mail additional headers section.
         */
        public function validate_mail_additional_headers(string $template, string $content): bool
        {
            return false;
        }
        /**
         * Runs error detection for the mail body section.
         */
        public function validate_mail_body(string $template, string $content): bool
        {
            return false;
        }
        /**
         * Runs error detection for the mail attachments section.
         */
        public function validate_mail_attachments(string $template, string $content): bool
        {
            return false;
        }
        /**
         * Detects errors of invalid mailbox syntax.
         *
         * @link https://contactform7.com/configuration-errors/invalid-mailbox-syntax/
         */
        public function detect_invalid_mailbox_syntax(string $section, string $content): bool
        {
            return false;
        }
        /**
         * Detects errors of empty message fields.
         *
         * @link https://contactform7.com/configuration-errors/maybe-empty/
         */
        public function detect_maybe_empty(mixed $section, mixed $content) : bool {
            return false;
        }
        /**
         * Detects errors of nonexistent attachment files.
         *
         * @link https://contactform7.com/configuration-errors/file-not-found/
         */
        public function detect_file_not_found(mixed $section, mixed $content) : bool {
            return false;
        }
        /**
         * Detects errors of attachment files out of the content directory.
         *
         * @link https://contactform7.com/configuration-errors/file-not-in-content-dir/
         */
        public function detect_file_not_in_content_dir(mixed $section, mixed $content) : bool {
            return false;
        }
        /**
         * Detects errors of that unsafe email config is used without
         * sufficient protection.
         *
         * @link https://contactform7.com/configuration-errors/unsafe-email-without-protection/
         */
        public function detect_unsafe_email_without_protection(mixed $section, mixed $content) : bool {
            return false;
        }
    }
    trait WPCF7_ConfigValidator_Messages
    {
        /**
         * Runs error detection for the messages section.
         */
        public function validate_messages() : void {}
        /**
         * Detects errors of HTML uses in a message.
         *
         * @link https://contactform7.com/configuration-errors/html-in-message/
         */
        public function detect_html_in_message(mixed $section, mixed $content) : bool {
            return false;
        }
    }
    /**
     * Configuration validator.
     *
     * @link https://contactform7.com/configuration-errors/
     */
    class WPCF7_ConfigValidator
    {
        /**
         * The plugin version in which important updates happened last time.
         */
        const last_important_update = '5.8.1';
        const error_codes = array('maybe_empty', 'invalid_mailbox_syntax', 'email_not_in_site_domain', 'html_in_message', 'multiple_controls_in_label', 'file_not_found', 'unavailable_names', 'invalid_mail_header', 'deprecated_settings', 'file_not_in_content_dir', 'unavailable_html_elements', 'attachments_overweight', 'dots_in_names', 'colons_in_names', 'upload_filesize_overlimit', 'unsafe_email_without_protection');
        use \WPCF7_ConfigValidator_Form;
        use \WPCF7_ConfigValidator_Mail;
        use \WPCF7_ConfigValidator_Messages;
        use \WPCF7_ConfigValidator_AdditionalSettings;
        /**
         * Returns a URL linking to the documentation page for the error type.
         *
         * @param string $child_page
         * @return string
         */
        public static function get_doc_link($child_page = ''): string
        {
            return '';
        }
        /**
         * Constructor.
         *
         * @param \WPCF7_ContactForm $contact_form
         * @param-unused string|array<string, mixed> $options
         * @return void
         */
        public function __construct(\WPCF7_ContactForm $contact_form, mixed $options = '') {
            // Suppress PHPStan unused parameter warning in stub
            unset($contact_form, $options);
        }
        /**
         * Returns the contact form object that is tied to this validator.
         *
         * @return \WPCF7_ContactForm
         */
        public function contact_form()
        {
            return new \WPCF7_ContactForm();
        }
        /**
         * Returns true if no error has been detected.
         *
         * @return bool
         */
        public function is_valid()
        {
            return true;
        }
        /**
         * Returns true if the given error code is supported by this instance.
         *
         * @param string $error_code
         * @return bool
         */
        public function supports($error_code)
        {
            return false;
        }
        /**
         * Counts detected errors.
         *
         * @param string|array<string, mixed> $options
         * @return int
         */
        public function count_errors($options = '')
        {
            return 0;
        }
        /**
         * Collects messages for detected errors.
         *
         * @param string|array<string, mixed> $options
         * @return array<string, string>
         */
        public function collect_error_messages($options = '')
        {
            return array();
        }
        /**
         * Builds an error message by replacing placeholders.
         *
         * @param string $message
         * @param string|array<string, mixed> $params
         * @return string
         */
        public function build_message($message, $params = '')
        {
            return '';
        }
        /**
         * Returns a default message that is used when the message for the error
         * is not specified.
         *
         * @param string $code
         * @return string
         */
        public function get_default_message($code = '')
        {
            return '';
        }
        /**
         * Returns true if the specified section has the specified error.
         *
         * @param string $section The section where the error detected.
         * @param string $code The unique code of the error.
         * @return bool
         */
        public function has_error($section, $code)
        {
            return false;
        }
        /**
         * Adds a validation error.
         *
         * @param string $section The section where the error detected.
         * @param string $code The unique code of the error.
         * @param string|array<string, mixed> $args Optional options for the error.
         * @return void
         */
        public function add_error($section, $code, $args = '') {}
        /**
         * Removes an error.
         *
         * @param string $section The section where the error detected.
         * @param string $code The unique code of the error.
         * @return void
         */
        public function remove_error($section, $code) {}
        /**
         * The main validation runner.
         *
         * @return bool True if there is no error detected.
         */
        public function validate()
        {
            return true;
        }
        /**
         * Saves detected errors as a post meta data.
         *
         * @return int Post ID on success, 0 on failure.
         */
        public function save(): int {
            return 0;
        }
        /**
         * Restore errors from the database.
         *
         * @return void
         */
        public function restore() {}
    }
    class WPCF7_ContactFormTemplate
    {
        /**
         * Returns the default template value for a property.
         *
         * @param string $prop Property name (form, mail, mail_2, messages).
         * @return array<string, mixed>|string Template value.
         */
        public static function get_default($prop = 'form')
        {
            return '';
        }
        /**
         * Returns the default form template.
         *
         * @return string Form template.
         */
        public static function form()
        {
            return '';
        }
        /**
         * Returns the default mail template.
         *
         * @return array<string, mixed> Mail template.
         */
        public static function mail()
        {
            return array();
        }
        /**
         * Returns the default mail 2 template.
         *
         * @return array<string, mixed> Mail 2 template.
         */
        public static function mail_2()
        {
            return array();
        }
        /**
         * Returns the default from email.
         *
         * @return string From email address.
         */
        public static function from_email()
        {
            return '';
        }
        /**
         * Returns the default messages.
         *
         * @return array<string, mixed> Messages.
         */
        public static function messages()
        {
            return array();
        }
    }
    trait WPCF7_SWV_SchemaHolder
    {
        /**
         * @var WPCF7_SWV_Schema|null SWV schema.
         */
        protected $schema;
        /**
         * Retrieves SWV schema for this holder object (contact form).
         *
         * @return WPCF7_SWV_Schema|null The schema object.
         */
        public function get_schema()
        {
            return null;
        }
        /**
         * Validates form inputs based on the schema and given context.
         *
         * @param array<string, mixed> $context Validation context.
         * @param WPCF7_Validation $validity Validation object.
         * @return void
         */
        public function validate_schema($context, \WPCF7_Validation $validity) {}
    }
    /**
     * Trait for classes that hold cross-tag WPCF7_Pipes object.
     */
    trait WPCF7_PipesHolder
    {
        /**
         * @var WPCF7_Pipes|null Pipes object.
         */
        protected $pipes;
        /**
         * Returns the pipes for a field.
         *
         * @param string $field_name Field name.
         * @return WPCF7_Pipes|null Pipes object or null.
         */
        public function get_pipes($field_name) { return null; }
        /**
         * Scans form tags.
         *
         * @return void
         */
        public function scan_form_tags() {}
    }
    class WPCF7_ContactForm
    {
        use \WPCF7_SWV_SchemaHolder;
        use \WPCF7_PipesHolder;
        const post_type = 'wpcf7_contact_form';
        /**
         * Returns count of contact forms found by the previous retrieval.
         *
         * @return int Count of contact forms.
         */
        public static function count(): int
        {
            return 0;
        }
        /**
         * Returns the contact form that is currently processed.
         *
         * @return WPCF7_ContactForm|null Current contact form object. Null if unset.
         */
        public static function get_current(): ?WPCF7_ContactForm
        {
            return null;
        }
        /**
         * Registers the post type for contact forms.
         *
         * @return void
         */
        public static function register_post_type(): void {}
        /**
         * Retrieves contact form data that match given conditions.
         *
         * @param string|array<string, mixed> $args Optional. Arguments to be passed to WP_Query.
         * @return array<int, WPCF7_ContactForm> Array of WPCF7_ContactForm objects.
         */
        public static function find($args = ''): array
        {
            return array();
        }
        /**
         * Returns a contact form data filled by default template contents.
         *
         * @param string|array<string, mixed> $options Optional. Contact form options.
         * @return WPCF7_ContactForm A new contact form object.
         */
        public static function get_template($options = ''): WPCF7_ContactForm
        {
            return new self();
        }
        /**
         * Creates a WPCF7_ContactForm object and sets it as the current instance.
         *
         * @param WPCF7_ContactForm|\WP_Post|int $post Object or post ID.
         * @return WPCF7_ContactForm|null Contact form object. Null if unset.
         */
        public static function get_instance($post): ?WPCF7_ContactForm
        {
            return null;
        }
        /**
         * Magic method for property overloading.
         *
         * @param string $name Property name.
         * @return mixed Property value.
         */
        public function __get($name)
        {
            return null;
        }
        /**
         * Returns true if this contact form is not yet saved to the database.
         *
         * @return bool True if initial, false otherwise.
         */
        public function initial(): bool
        {
            return false;
        }
        /**
         * Returns the value for the given property name.
         *
         * @param string $name Property name.
         * @return array<int|string, mixed>|string|null Property value. Null if property does not exist.
         */
        public function prop($name)
        {
            return null;
        }
        /**
         * Returns all the properties.
         *
         * @return array<string, mixed> This contact form's properties.
         */
        public function get_properties(): array
        {
            return array();
        }
        /**
         * Updates properties.
         *
         * @param array<string, mixed> $properties New properties.
         * @return void
         */
        public function set_properties($properties): void {}
        /**
         * Returns ID of this contact form.
         *
         * @return int The ID.
         */
        public function id(): int
        {
            return 0;
        }
        /**
         * Returns unit-tag for this contact form.
         *
         * @return string Unit-tag.
         */
        public function unit_tag(): string
        {
            return '';
        }
        /**
         * Returns name (slug) of this contact form.
         *
         * @return string Name.
         */
        public function name(): string
        {
            return '';
        }
        /**
         * Returns title of this contact form.
         *
         * @return string Title.
         */
        public function title(): string
        {
            return '';
        }
        /**
         * Set a title for this contact form.
         *
         * @param string $title Title.
         * @return void
         */
        public function set_title($title): void {}
        /**
         * Returns the locale code of this contact form.
         *
         * @return string Locale code. Empty string if no valid locale is set.
         */
        public function locale(): string
        {
            return '';
        }
        /**
         * Sets a locale for this contact form.
         *
         * @param string $locale Locale code.
         * @return void
         */
        public function set_locale($locale): void {}
        /**
         * Retrieves the random hash string tied to this contact form.
         *
         * @param int $length Length of hash string.
         * @return string Hash string unique to this contact form.
         */
        public function hash($length = 7): string
        {
            return '';
        }
        /**
         * Returns the specified shortcode attribute value.
         *
         * @param string $name Shortcode attribute name.
         * @return string|null Attribute value. Null if the attribute does not exist.
         */
        public function shortcode_attr($name)
        {
            return null;
        }
        /**
         * Returns true if this contact form is identical to the submitted one.
         *
         * @return bool
         */
        public function is_posted(): bool
        {
            return false;
        }
        /**
         * Generates HTML that represents a form.
         *
         * @param string|array<string, mixed> $options Optional. Form options.
         * @return string HTML output.
         */
        public function form_html($options = ''): string
        {
            return '';
        }
        /**
         * Returns the visible response output for a form submission.
         *
         * @return string
         */
        public function form_response_output(): string
        {
            return '';
        }
        /**
         * Returns the response output that is only accessible from screen readers.
         *
         * @return string
         */
        public function screen_reader_response(): string
        {
            return '';
        }
        /**
         * Returns a validation error for the specified input field.
         *
         * @param string $name Input field name.
         * @return string
         */
        public function validation_error($name): string
        {
            return '';
        }
        /**
         * Replaces all form-tags in the form template with corresponding HTML.
         *
         * @return string Replaced form content.
         */
        public function replace_all_form_tags(): string
        {
            return '';
        }
        /**
         * Replaces all form-tags in the form template with corresponding HTML.
         *
         * @deprecated 4.6 Use replace_all_form_tags()
         *
         * @return string Replaced form content.
         */
        public function form_do_shortcode(): string
        {
            return '';
        }
        /**
         * Scans form-tags from the form template.
         *
         * @param string|array<string, mixed>|null $cond Optional. Filters. Default null.
         * @return array<int, WPCF7_FormTag> Form-tags matching the given filter conditions.
         */
        public function scan_form_tags($cond = \null): array
        {
            return array();
        }
        /**
         * Scans form-tags from the form template.
         *
         * @deprecated 4.6 Use scan_form_tags()
         *
         * @param string|array<string, mixed>|null $cond Optional. Filters. Default null.
         * @return array<int, WPCF7_FormTag> Form-tags matching the given filter conditions.
         */
        public function form_scan_shortcode($cond = \null): array
        {
            return array();
        }
        /**
         * Replaces all form-tags in the form template with corresponding HTML.
         *
         * @return string Replaced form content. wpcf7_form_elements filters applied.
         */
        public function form_elements(): string
        {
            return '';
        }
        /**
         * Collects mail-tags available for this contact form.
         *
         * @param string|array<string, mixed> $options Optional. Search options.
         * @return array<int, string> Mail-tag names.
         */
        public function collect_mail_tags($options = ''): array
        {
            return array();
        }
        /**
         * Prints a mail-tag suggestion list.
         *
         * @param string $template_name Optional. Mail template name. Default 'mail'.
         * @return void
         */
        public function suggest_mail_tags($template_name = 'mail'): void {}
        /**
         * Submits this contact form.
         *
         * @param string|array<string, mixed> $options Optional. Submission options. Default empty.
         * @return array{contact_form_id: int, status: string, message: string, posted_data_hash?: string, invalid_fields?: array<string, array{into: string, message: string, idref: string}>, demo_mode?: bool} Result of submission.
         */
        public function submit($options = ''): array
        {
            return array('contact_form_id' => 0, 'status' => '', 'message' => '');
        }
        /**
         * Returns message used for given status.
         *
         * @param string $status Status.
         * @param bool $filter Optional. Whether filters are applied. Default true.
         * @return string Message.
         */
        public function message($status, $filter = \true): string
        {
            return '';
        }
        /**
         * Filters a message.
         *
         * @param string $message Message to filter.
         * @param string $status Optional. Status. Default empty.
         * @return string Filtered message.
         */
        public function filter_message($message, $status = ''): string
        {
            return '';
        }
        /**
         * Returns the additional setting value searched by name.
         *
         * @param string $name Name of setting.
         * @return string Additional setting value.
         */
        public function pref($name): string
        {
            return '';
        }
        /**
         * Returns additional setting values searched by name.
         *
         * @param string $name Name of setting.
         * @param int $max Maximum result item count.
         * @return array<int, string> Additional setting values.
         */
        public function additional_setting($name, $max = 1): array
        {
            return array();
        }
        /**
         * Returns true if the specified setting has a truthy string value.
         *
         * @param string $name Name of setting.
         * @return bool True if the setting value is 'on', 'true', or '1'.
         */
        public function is_true($name): bool
        {
            return false;
        }
        /**
         * Returns true if this contact form is in the demo mode.
         *
         * @return bool
         */
        public function in_demo_mode(): bool
        {
            return false;
        }
        /**
         * Returns true if nonce is active for this contact form.
         *
         * @return bool
         */
        public function nonce_is_active(): bool
        {
            return false;
        }
        /**
         * Returns true if the specified setting has a falsey string value.
         *
         * @param string $name Name of setting.
         * @return bool True if the setting value is 'off', 'false', or '0'.
         */
        public function is_false($name): bool
        {
            return false;
        }
        /**
         * Stores this contact form properties to the database.
         *
         * @return int The post ID on success. The value 0 on failure.
         */
        public function save(): int
        {
            return 0;
        }
        /**
         * Makes a copy of this contact form.
         *
         * @return WPCF7_ContactForm New contact form object.
         */
        public function copy(): WPCF7_ContactForm
        {
            return new self();
        }
        /**
         * Deletes this contact form.
         *
         * @return bool True if deletion succeeded, false otherwise.
         */
        public function delete(): bool
        {
            return false;
        }
        /**
         * Returns a WordPress shortcode for this contact form.
         *
         * @param string|array<string, mixed> $options
         * @return string
         */
        public function shortcode($options = ''): string
        {
            return '';
        }
    }
    /**
     * Class for filesystem operations.
     */
    class WPCF7_Filesystem
    {
        /**
         * Retrieves the singleton instance.
         *
         * @return WPCF7_Filesystem
         */
        public static function get_instance()
        {
            return new self();
        }
        /**
         * Changes filesystem permissions.
         *
         * @param string $file Path to the file.
         * @param int|false $mode Optional. The permissions as octal number.
         * @param bool $recursive Optional. If set to true,
         *             changes file permissions recursively. Default false.
         * @return bool True on success, false on failure.
         */
        public function chmod($file, $mode = \false, $recursive = \false)
        {
            return false;
        }
        /**
         * Deletes a file or directory.
         *
         * @param string $file Path to the file or directory.
         * @param bool $recursive Optional. If set to true, deletes
         *             files and folders recursively. Default false.
         * @param string|false $type Type of resource.
         *                     'f' for file, 'd' for directory. Default false.
         * @return bool True on success, false on failure.
         */
        public function delete($file, $recursive = \false, $type = \false)
        {
            return false;
        }
        /**
         * Writes a string to a file.
         *
         * @param string $file Path to the file where to write the data.
         * @param string $contents The data to write.
         * @param int|false $mode The file permissions as octal number.
         * @return bool True on success, false on failure.
         */
        public function put_contents($file, $contents, $mode = \false)
        {
            return false;
        }
    }
    /**
     * A form-tag.
     *
     * @implements \ArrayAccess<string, mixed>
     * @link https://contactform7.com/tag-syntax/#form_tag
     */
    class WPCF7_FormTag implements \ArrayAccess
    {
        /** @var string */
        public $type;
        /** @var string */
        public $basetype;
        /** @var string */
        public $raw_name = '';
        /** @var string */
        public $name = '';
        /** @var array<int, string> */
        public $options = array();
        /** @var array<int, string> */
        public $raw_values = array();
        /** @var array<int, string> */
        public $values = array();
        /** @var WPCF7_Pipes|null */
        public $pipes;
        /** @var array<int, string> */
        public $labels = array();
        /** @var string */
        public $attr = '';
        /** @var string */
        public $content = '';
        /**
         * @param array<string, mixed>|WPCF7_FormTag $tag
         * @return void
         */
        public function __construct($tag = array()) {
            // Suppress PHPStan unused parameter warning in stub
            unset($tag);
        }
        /**
         * Returns true if the type has a trailing asterisk.
         *
         * @return bool
         */
        public function is_required(): bool
        {
            return false;
        }
        /**
         * Returns true if the form-tag has a specified option.
         *
         * @param string $option_name
         * @return bool
         */
        public function has_option(string $option_name): bool
        {
            return false;
        }
        /**
         * Retrieves option values with the specified option name.
         *
         * @param string $option_name Option name.
         * @param string $pattern Optional. A regular expression pattern or one of
         *               the keys of preset patterns. If specified, only options
         *               whose value part matches this pattern will be returned.
         * @param bool $single Optional. If true, only the first matching option
         *             will be returned. Default false.
         * @return string|array<int, string>|bool The option value or an array of option values.
         *                           False if there is no option matches the pattern.
         */
        public function get_option(string $option_name, string $pattern = '', bool $single = false): string|array|bool
        {
            return false;
        }
        /**
         * Retrieves the id option value from the form-tag.
         *
         * @return string|bool
         */
        public function get_id_option(): string|bool
        {
            return false;
        }
        /**
         * Retrieves the class option value from the form-tag.
         *
         * @param string|array<int, string> $default_classes Optional. Preset classes as an array
         *                     or a whitespace-separated list. Default empty string.
         * @return string|bool A whitespace-separated list of classes.
         *                     False if there is no class to return.
         */
        public function get_class_option($default_classes = ''): string|bool
        {
            return false;
        }
        /**
         * Retrieves the autocomplete option value from the form-tag.
         *
         * @return string|bool A whitespace-separated list of tokens.
         *                     False if there is no token to return.
         */
        public function get_autocomplete_option(): string|bool
        {
            return false;
        }
        /**
         * Retrieves the size option value from the form-tag.
         *
         * @param string|bool $default_value Optional default value.
         * @return string|bool The option value.
         */
        public function get_size_option($default_value = false): string|bool
        {
            return $default_value;
        }
        /**
         * Retrieves the maxlength option value from the form-tag.
         *
         * @param string|bool $default_value Optional default value.
         * @return string|bool The option value.
         */
        public function get_maxlength_option($default_value = false): string|bool
        {
            return $default_value;
        }
        /**
         * Retrieves the minlength option value from the form-tag.
         *
         * @param string|bool $default_value Optional default value.
         * @return string|bool The option value.
         */
        public function get_minlength_option($default_value = false): string|bool
        {
            return $default_value;
        }
        /**
         * Retrieves the cols option value from the form-tag.
         *
         * @param string|bool $default_value Optional default value.
         * @return string|bool The option value.
         */
        public function get_cols_option($default_value = false): string|bool
        {
            return $default_value;
        }
        /**
         * Retrieves the rows option value from the form-tag.
         *
         * @param string|bool $default_value Optional default value.
         * @return string|bool The option value.
         */
        public function get_rows_option($default_value = false): string|bool
        {
            return $default_value;
        }
        /**
         * Retrieves a date-type option value from the form-tag.
         *
         * @param string $option_name A date-type option name, such as 'min' or 'max'.
         * @return string|bool The option value in YYYY-MM-DD format. False if the
         *                     option does not exist or the date value is invalid.
         */
        public function get_date_option(string $option_name): string|bool
        {
            return false;
        }
        /**
         * Retrieves the default option value from the form-tag.
         *
         * @param string|array<int, string> $default_value Optional default value.
         * @param string|array<string, mixed> $args Optional options for the option value retrieval.
         * @return string|array<int, string> The option value. If the multiple option is enabled,
         *                      an array of option values.
         */
        public function get_default_option($default_value = '', $args = ''): string|array
        {
            return $default_value;
        }
        /**
         * Retrieves the data option value from the form-tag.
         *
         * @param string|array<string, mixed> $args Optional options for the option value retrieval.
         * @return mixed The option value.
         */
        public function get_data_option($args = ''): mixed
        {
            return null;
        }
        /**
         * Retrieves the limit option value from the form-tag.
         *
         * @param int $default_value Optional default value. Default 1048576.
         * @return int The option value.
         */
        public function get_limit_option(int $default_value = \MB_IN_BYTES): int
        {
            return $default_value;
        }
        /**
         * Retrieves the value of the first option matches the given
         * regular expression pattern.
         *
         * @param string $pattern Regular expression pattern.
         * @return array<int, string>|bool Option value as an array of matched strings.
         *                    False if there is no option matches the pattern.
         */
        public function get_first_match_option(string $pattern): array|bool
        {
            return false;
        }
        /**
         * Retrieves values of options that match the given
         * regular expression pattern.
         *
         * @param string $pattern Regular expression pattern.
         * @return array<int, array<int, string>> Array of arrays of strings that match the pattern.
         */
        public function get_all_match_options(string $pattern): array
        {
            return array();
        }
        /**
         * Assigns a value to the specified offset.
         *
         * @param mixed $offset Offset to assign value to.
         * @param mixed $value Value to assign.
         * @return void
         * @link https://www.php.net/manual/en/arrayaccess.offsetset.php
         */
        #[\ReturnTypeWillChange]
        public function offsetSet($offset, $value) {}
        /**
         * Returns the value at specified offset.
         *
         * @param mixed $offset Offset to retrieve.
         * @return mixed Value at offset.
         * @link https://www.php.net/manual/en/arrayaccess.offsetget.php
         */
        #[\ReturnTypeWillChange]
        public function offsetGet($offset) {}
        /**
         * Returns true if the specified offset exists.
         *
         * @param mixed $offset Offset to check.
         * @return bool True if exists, false otherwise.
         * @link https://www.php.net/manual/en/arrayaccess.offsetexists.php
         */
        #[\ReturnTypeWillChange]
        public function offsetExists($offset)
        {
            return false;
        }
        /**
         * Unsets an offset.
         *
         * @param mixed $offset Offset to unset.
         * @return void
         * @link https://www.php.net/manual/en/arrayaccess.offsetunset.php
         */
        #[\ReturnTypeWillChange]
        public function offsetUnset($offset) {}
    }
    /**
     * The singleton instance of this class manages the collection of form-tags.
     */
    class WPCF7_FormTagsManager
    {
        /**
         * Returns the singleton instance.
         *
         * @return WPCF7_FormTagsManager The singleton manager.
         */
        public static function get_instance()
        {
            return new self();
        }
        /**
         * Returns scanned form-tags.
         *
         * @return array<int, WPCF7_FormTag> Array of WPCF7_FormTag objects.
         */
        public function get_scanned_tags()
        {
            return array();
        }
        /**
         * Registers form-tag types to the manager.
         *
         * @param string|array<int, string> $tag_types The name of the form-tag type or
         *                     an array of the names.
         * @param callable $callback The callback to generates a form control HTML
         *                 for a form-tag in this type.
         * @param string|array<int, string> $features Optional. Features a form-tag
         *                     in this type supports.
         * @return void
         */
        public function add($tag_types, $callback, mixed $features = '') {}
        /**
         * Returns true if the given tag type exists.
         *
         * @param string $tag_type
         * @return bool
         */
        public function tag_type_exists($tag_type)
        {
            return false;
        }
        /**
         * Returns true if the tag type supports the features.
         *
         * @param string $tag_type The name of the form-tag type.
         * @param array<int, string>|string $features The feature to check or an array of features.
         * @return bool True if the form-tag type supports at least one of
         *              the given features, false otherwise.
         */
        public function tag_type_supports($tag_type, mixed $features)
        {
            return false;
        }
        /**
         * Returns form-tag types that support the given features.
         *
         * @param array<int, string>|string $features Optional. The feature to check or
         *                     an array of features. Default empty array.
         * @param bool $invert Optional. If this value is true, returns form-tag
         *             types that do not support the given features. Default false.
         * @return array<int, string> An array of form-tag types. If the $features param is empty,
         *               returns all form-tag types that have been registered.
         */
        public function collect_tag_types($features = array(), $invert = \false)
        {
            return array();
        }
        /**
         * Deregisters the form-tag type.
         *
         * @param string $tag_type
         * @return void
         */
        public function remove($tag_type) {}
        /**
         * Normalizes the text content that includes form-tags.
         *
         * @param string $content
         * @return string
         */
        public function normalize($content)
        {
            return '';
        }
        /**
         * Replace all form-tags in the given text with placeholders.
         *
         * @param string $content
         * @return string
         */
        public function replace_with_placeholders($content)
        {
            return '';
        }
        /**
         * Replace placeholders in the given text with original form-tags.
         *
         * @param string $content
         * @return string
         */
        public function restore_from_placeholders($content)
        {
            return '';
        }
        /**
         * Replaces all form-tags in the text content.
         *
         * @param string $content The text content including form-tags.
         * @return string The result of replacements.
         */
        public function replace_all($content)
        {
            return '';
        }
        /**
         * Scans form-tags in the text content.
         *
         * @param string $content The text content including form-tags.
         * @param bool $replace Optional. Whether scanned form-tags will be
         *             replaced. Default false.
         * @return array<int, WPCF7_FormTag>|string An array of scanned form-tags if $replace is false.
         *                      Otherwise text that scanned form-tags are replaced.
         */
        public function scan($content, $replace = \false)
        {
            return array();
        }
        /**
         * Filters form-tags based on a condition array argument.
         *
         * @param array<int, WPCF7_FormTag>|string $input The original form-tags collection.
         *                     If it is a string, scans form-tags from it.
         * @param array<string, mixed> $cond The conditions that filtering will be based on.
         * @return array<int, WPCF7_FormTag> The filtered form-tags collection.
         */
        public function filter($input, $cond)
        {
            return array();
        }
    }
    /**
     * Contact Form 7's class used for formatting HTML fragments.
     */
    class WPCF7_HTMLFormatter
    {
        // HTML component types.
        const text = 0;
        const start_tag = 1;
        const end_tag = 2;
        const comment = 3;
        /**
         * Tag name reserved for a custom HTML element used as a block placeholder.
         */
        const placeholder_block = 'placeholder:block';
        /**
         * Tag name reserved for a custom HTML element used as an inline placeholder.
         */
        const placeholder_inline = 'placeholder:inline';
        /**
         * The void elements in HTML.
         *
         * @link https://developer.mozilla.org/en-US/docs/Glossary/Void_element
         */
        const void_elements = array('area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'keygen', 'link', 'meta', 'param', 'source', 'track', 'wbr', self::placeholder_block, self::placeholder_inline);
        /**
         * HTML elements that can be a direct child of the same element.
         */
        const nestable_elements = array('article', 'aside', 'blockquote', 'div', 'fieldset', 'section', 'span');
        /**
         * HTML elements that can contain flow content.
         */
        const p_parent_elements = array('address', 'article', 'aside', 'blockquote', 'body', 'caption', 'dd', 'details', 'dialog', 'div', 'dt', 'fieldset', 'figcaption', 'figure', 'footer', 'form', 'header', 'li', 'main', 'nav', 'section', 'td', 'th');
        /**
         * HTML elements that can be neither the parent nor a child of
         * a paragraph element.
         */
        const p_nonparent_elements = array('colgroup', 'dl', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'head', 'hgroup', 'html', 'legend', 'menu', 'ol', 'pre', 'style', 'summary', 'table', 'tbody', 'template', 'tfoot', 'thead', 'title', 'tr', 'ul');
        /**
         * HTML elements in the phrasing content category, plus non-phrasing
         * content elements that can be grandchildren of a paragraph element.
         */
        const p_child_elements = array(
            'a',
            'abbr',
            'area',
            'audio',
            'b',
            'bdi',
            'bdo',
            'br',
            'button',
            'canvas',
            'cite',
            'code',
            'data',
            'datalist',
            'del',
            'dfn',
            'em',
            'embed',
            'i',
            'iframe',
            'img',
            'input',
            'ins',
            'kbd',
            'keygen',
            'label',
            'link',
            'map',
            'mark',
            'meta',
            'meter',
            'noscript',
            'object',
            'output',
            'picture',
            'progress',
            'q',
            'ruby',
            's',
            'samp',
            'script',
            'select',
            'slot',
            'small',
            'span',
            'strong',
            'sub',
            'sup',
            'textarea',
            'time',
            'u',
            'var',
            'video',
            'wbr',
            'optgroup',
            'option',
            'rp',
            'rt',
            // non-phrasing grandchildren
            self::placeholder_inline,
        );
        /**
         * HTML elements that can contain phrasing content.
         */
        const br_parent_elements = array('a', 'abbr', 'address', 'article', 'aside', 'audio', 'b', 'bdi', 'bdo', 'blockquote', 'button', 'canvas', 'caption', 'cite', 'code', 'data', 'datalist', 'dd', 'del', 'details', 'dfn', 'dialog', 'div', 'dt', 'em', 'fieldset', 'figcaption', 'figure', 'footer', 'form', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'header', 'i', 'ins', 'kbd', 'label', 'legend', 'li', 'main', 'map', 'mark', 'meter', 'nav', 'noscript', 'object', 'output', 'p', 'progress', 'q', 'rt', 'ruby', 's', 'samp', 'section', 'slot', 'small', 'span', 'strong', 'sub', 'summary', 'sup', 'td', 'th', 'time', 'u', 'var', 'video');
        /**
         * Constructor.
         *
         * @param string|array<string, mixed> $options
         * @return void
         */
        public function __construct($options = '') {
            // Suppress PHPStan unused parameter warning in stub
            unset($options);
        }
        /**
         * Separates the given text into chunks of HTML. Each chunk must be an
         * associative array that includes 'position', 'type', and 'content' keys.
         *
         * @param string $input Text to be separated into chunks.
         * @return iterable<array{position: int, type: string, content: string}> Iterable of chunks.
         */
        public function separate_into_chunks($input)
        {
            return array();
        }
        /**
         * Normalizes content in each chunk. This may change the type and position
         * of the chunk.
         *
         * @param iterable<array{position: int, type: string, content: string}> $chunks The original chunks.
         * @return iterable<array{position: int, type: string, content: string}> Normalized chunks.
         */
        public function pre_format($chunks)
        {
            return array();
        }
        /**
         * Concatenates neighboring text chunks to create a single chunk.
         *
         * @param iterable<array{position: int, type: string, content: string}> $chunks The original chunks.
         * @return iterable<array{position: int, type: string, content: string}> Processed chunks.
         */
        public function concatenate_texts($chunks)
        {
            return array();
        }
        /**
         * Outputs formatted HTML based on the given chunks.
         *
         * @param iterable<array{position: int, type: string, content: string}> $chunks The original chunks.
         * @return string Formatted HTML.
         */
        public function format($chunks)
        {
            return '';
        }
        /**
         * Appends preformatted text to the output property.
         *
         * @param string $content
         * @return void
         */
        public function append_preformatted($content) {}
        /**
         * Appends whitespace to the output property.
         *
         * @return void
         */
        public function append_whitespace() {}
        /**
         * Appends a text node content to the output property.
         *
         * @param string $content Text node content.
         * @return void
         */
        public function append_text($content) {}
        /**
         * Appends a start tag to the output property.
         *
         * @param string $tag A start tag.
         * @return void
         */
        public function start_tag($tag) {}
        /**
         * Appends a start tag to the output property.
         *
         * @param string $tag_name Tag name.
         * @param array<string, string> $atts Associative array of attribute name and value pairs.
         * @param string $tag A start tag.
         * @return void
         */
        public function append_start_tag($tag_name, $atts = array(), $tag = '') {}
        /**
         * Closes an element and its open descendants at a time.
         *
         * @param string $tag An end tag.
         * @return void
         */
        public function end_tag($tag) {}
        /**
         * Appends an end tag to the output property.
         *
         * @param string $tag_name Tag name.
         * @return void
         */
        public function append_end_tag($tag_name) {}
        /**
         * Closes all open tags.
         *
         * @return void
         */
        public function close_all_tags() {}
        /**
         * Appends an HTML comment to the output property.
         *
         * @param string $tag An HTML comment.
         * @return void
         */
        public function append_comment($tag) {}
        /**
         * Returns true if it is currently inside one of HTML elements specified
         * by tag names.
         *
         * @param string|array<int, string> $tag_names A tag name or an array of tag names.
         * @return bool
         */
        public function is_inside($tag_names)
        {
            return false;
        }
        /**
         * Returns true if the parent node is one of HTML elements specified
         * by tag names.
         *
         * @param string|array<int, string> $tag_names A tag name or an array of tag names.
         * @return bool
         */
        public function has_parent($tag_names)
        {
            return false;
        }
        /**
         * Calls the callback given by the first parameter. The buffered output
         * will be appended to the output property.
         *
         * @param callable $callback
         * @param mixed ...$args
         * @return void
         */
        public function call_user_func($callback, ...$args) {}
        /**
         * Closes all remaining tags, returns and resets the output.
         *
         * @return string
         */
        public function output()
        {
            return '';
        }
        /**
         * Prints the output. Returns false if the allowed_html option is empty.
         *
         * @return bool
         */
        public function print()
        {
            return false;
        }
        /**
         * Calculates the position of the next chunk based on the position and
         * length of the current chunk.
         *
         * @param array{position: int, type: string, content: string} $chunk An associative array of the current chunk.
         * @return int The position of the next chunk.
         */
        public static function calc_next_position($chunk)
        {
            return 0;
        }
        /**
         * Outputs a set of tabs to indent.
         *
         * @param int $level Indentation level.
         * @return string A series of tabs.
         */
        public static function indent($level)
        {
            return '';
        }
        /**
         * Normalizes a start tag.
         *
         * @param string $tag A start tag or a tag name.
         * @return array{tag: string, tag_name: string} An array includes the normalized start tag and tag name.
         */
        public static function normalize_start_tag($tag)
        {
            return array('tag' => '', 'tag_name' => '');
        }
        /**
         * Normalizes a paragraph of text.
         *
         * @param string $paragraph A paragraph of text.
         * @param bool $auto_br Optional. If true, line breaks will be replaced
         *             by a br element.
         * @return string The normalized paragraph.
         */
        public static function normalize_paragraph($paragraph, $auto_br = \false)
        {
            return '';
        }
        /**
         * Returns true if the specified tag name is valid.
         *
         * @param string $tag_name
         * @return bool
         */
        public static function validate_tag_name($tag_name)
        {
            return false;
        }
    }
    /**
     * Integration API
     *
     * @link https://contactform7.com/integration-with-external-apis/
     */
    class WPCF7_Integration
    {
        /**
         * Returns initially supported service categories.
         *
         * @return array<string, string> Service categories.
         */
        public static function get_builtin_categories(): array
        {
            return array();
        }
        /**
         * Returns the singleton instance of this class.
         *
         * @return WPCF7_Integration|null The instance.
         */
        public static function get_instance()
        {
            return null;
        }
        /**
         * Adds a service to the services list.
         *
         * @param string $name
         * @param \WPCF7_Service $service
         * @return void
         */
        public function add_service($name, \WPCF7_Service $service) {}
        /**
         * Adds a service category to the categories list.
         *
         * @param string $name
         * @param string $title
         * @return void
         */
        public function add_category($name, $title) {}
        /**
         * Returns true if a service with the name exists in the services list.
         *
         * @param string $name The name of service to search.
         * @return bool
         */
        public function service_exists($name = '')
        {
            return false;
        }
        /**
         * Returns a service object with the name.
         *
         * @param string $name The name of service.
         * @return WPCF7_Service|bool The service object if it exists,
         *                            false otherwise.
         */
        public function get_service($name)
        {
            return false;
        }
        /**
         * Prints services list.
         *
         * @param string|array<string, mixed> $args Optional arguments for listing services.
         * @return void
         */
        public function list_services($args = '') {}
    }
    /**
     * Abstract class for services.
     *
     * Only instances of this class's subclasses are allowed to be
     * listed on the Integration page.
     */
    abstract class WPCF7_Service
    {
        /**
         * Returns the service title.
         *
         * @return string Service title.
         */
        public abstract function get_title();
        /**
         * Returns whether the service is active.
         *
         * @return bool True if active, false otherwise.
         */
        public abstract function is_active();
        /**
         * Returns the service categories.
         *
         * @return array<int, string> Service categories.
         */
        public function get_categories()
        {
            return array();
        }
        /**
         * Returns the service icon HTML.
         *
         * @return string Icon HTML.
         */
        public function icon()
        {
            return '';
        }
        /**
         * Returns the service link URL.
         *
         * @return string Link URL.
         */
        public function link()
        {
            return '';
        }
        /**
         * Loads the service.
         *
         * @param string $action Optional action to perform.
         * @return void
         */
        public function load($action = '') {}
        /**
         * Displays the service.
         *
         * @param string $action Optional action to display.
         * @return void
         */
        public function display($action = '') {}
        /**
         * Displays an admin notice.
         *
         * @param string $message Notice message.
         * @return void
         */
        public function admin_notice($message = '') {}
    }
    /**
     * Class for services that use OAuth.
     *
     * While this is not an abstract class, subclassing this class for
     * your aim is advised.
     */
    class WPCF7_Service_OAuth2 extends \WPCF7_Service
    {
        /**
         * @var string OAuth client ID.
         */
        protected $client_id = '';
        /**
         * @var string OAuth client secret.
         */
        protected $client_secret = '';
        /**
         * @var string OAuth access token.
         */
        protected $access_token = '';
        /**
         * @var string OAuth refresh token.
         */
        protected $refresh_token = '';
        /**
         * @var string OAuth authorization endpoint URL.
         */
        protected $authorization_endpoint = 'https://example.com/authorization';
        /**
         * @var string OAuth token endpoint URL.
         */
        protected $token_endpoint = 'https://example.com/token';
        /**
         * Returns the service title.
         *
         * @return string Service title.
         */
        public function get_title()
        {
            return '';
        }
        /**
         * Returns whether the service is active.
         *
         * @return bool True if active, false otherwise.
         */
        public function is_active()
        {
            return false;
        }
        /**
         * Saves the service data.
         *
         * @return void
         */
        protected function save_data() {}
        /**
         * Resets the service data.
         *
         * @return void
         */
        protected function reset_data() {}
        /**
         * Returns the OAuth redirect URI.
         *
         * @return string Redirect URI.
         */
        protected function get_redirect_uri()
        {
            return '';
        }
        /**
         * Returns the menu page URL.
         *
         * @param string|array<string, mixed> $args Optional arguments to append to URL.
         * @return string Menu page URL.
         */
        protected function menu_page_url($args = '')
        {
            return '';
        }
        /**
         * Loads the service.
         *
         * @param string $action Optional action to perform.
         * @return void
         */
        public function load($action = '') {}
        /**
         * Authorizes the OAuth connection.
         *
         * @param string $scope OAuth scope.
         * @return void
         */
        protected function authorize($scope = '') {}
        /**
         * Returns the HTTP authorization header.
         *
         * @param string $scheme Authorization scheme (basic or bearer).
         * @return string Authorization header value.
         */
        protected function get_http_authorization_header($scheme = 'basic')
        {
            return '';
        }
        /**
         * Requests an access token.
         *
         * @param string $authorization_code Authorization code from OAuth provider.
         * @return bool True if successful, false otherwise.
         */
        protected function request_token($authorization_code)
        {
            return false;
        }
        /**
         * Refreshes the access token.
         *
         * @return bool True if successful, false otherwise.
         */
        protected function refresh_token()
        {
            return false;
        }
        /**
         * Makes a remote HTTP request.
         *
         * @param string $url Request URL.
         * @param array<string, mixed> $request Request arguments.
         * @return array<string, mixed> Response data or WP_Error on failure.
         */
        protected function remote_request($url, $request = array())
        {
            return array();
        }
        /**
         * Logs the request and response.
         *
         * @param string $url Request URL.
         * @param array<string, mixed> $request Request data.
         * @param array<string, mixed>|\WP_Error $response Response data or WP_Error.
         * @return void
         */
        protected function log($url, $request, $response) {}
    }
    /**
     * Class that represents a mail-tag.
     */
    /**
     * Class that represents a mail-tag.
     */
    class WPCF7_MailTag
    {
        /**
         * The constructor method.
         *
         * @param string $tag Full mail-tag string.
         * @param string $tagname Tag name.
         * @param array<int, string> $values Tag values.
         */
        public function __construct($tag, $tagname, $values) {
            // Suppress PHPStan unused parameter warning in stub
            unset($tag, $tagname, $values);
        }
        /**
         * Returns the name part of this mail-tag.
         *
         * @return string Tag name.
         */
        public function tag_name()
        {
            return '';
        }
        /**
         * Returns the form field name corresponding to this mail-tag.
         *
         * @return string Field name.
         */
        public function field_name()
        {
            return '';
        }
        /**
         * Returns the value of the specified option.
         *
         * @param string $option Option name.
         * @return string|null Option value or null if not found.
         */
        public function get_option($option)
        {
            return null;
        }
        /**
         * Returns the values part of this mail-tag.
         *
         * @return array<int, string> Tag values.
         */
        public function values()
        {
            return array();
        }
        /**
         * Retrieves the WPCF7_FormTag object that corresponds to this mail-tag.
         *
         * @return WPCF7_FormTag|null Form tag object or null if not found.
         */
        public function corresponding_form_tag()
        {
            return null;
        }
    }
    /**
     * Mail-tag output calculator.
     */
    class WPCF7_MailTag_OutputCalculator
    {
        const email = 0b100;
        const text = 0b10;
        const blank = 0b1;
        /**
         * Constructor.
         *
         * @param WPCF7_ContactForm $contact_form Contact form object.
         */
        public function __construct(\WPCF7_ContactForm $contact_form) {
            // Suppress PHPStan unused parameter warning in stub
            unset($contact_form);
        }
        /**
         * Calculates the output for a mail tag.
         *
         * @param WPCF7_MailTag $mail_tag Mail tag object.
         * @return int Output calculation result.
         */
        public function calc_output(\WPCF7_MailTag $mail_tag)
        {
            return 0;
        }
    }
    /**
     * Class that represents an attempt to compose and send email.
     */
    class WPCF7_Mail
    {
        /**
         * Returns the singleton instance of this class.
         *
         * @return WPCF7_Mail|null
         */
        public static function get_current()
        {
            return null;
        }
        /**
         * Returns the name of the email template currently processed.
         *
         * Expected output: 'mail' or 'mail_2'
         *
         * @return string
         */
        public static function get_current_template_name()
        {
            return '';
        }
        /**
         * Returns the name of the email template component currently processed.
         *
         * Expected output: 'recipient', 'sender', 'subject',
         *                  'additional_headers', 'body', or 'attachments'
         *
         * @return string
         */
        public static function get_current_component_name()
        {
            return '';
        }
        /**
         * Composes and sends email based on the specified template.
         *
         * @param array<string, string> $template Array of email template.
         * @param string $name Optional name of the template, such as
         *               'mail' or 'mail_2'. Default empty string.
         * @return bool Whether the email was sent successfully.
         */
        public static function send($template, $name = '')
        {
            return false;
        }
        /**
         * Returns the name of the email template.
         *
         * @return string
         */
        public function name()
        {
            return '';
        }
        /**
         * Returns the name of the email template. A wrapper method of name().
         *
         * @return string
         */
        public function get_template_name()
        {
            return '';
        }
        /**
         * Returns the name of the email template component currently processed.
         *
         * @return string
         */
        public function get_component_name()
        {
            return '';
        }
        /**
         * Retrieves a component from the email template.
         *
         * @param string $component The name of the component.
         * @param bool $replace_tags Whether to replace mail-tags
         *             within the component.
         * @return string The text representation of the email component.
         */
        public function get($component, $replace_tags = \false)
        {
            return '';
        }
        /**
         * Replaces mail-tags within the given text.
         *
         * @param string $content
         * @param string|array<string, mixed> $options
         * @return string
         */
        public function replace_tags($content, $options = '')
        {
            return '';
        }
    }
    /**
     * Class that represents a single-line text including mail-tags.
     */
    class WPCF7_MailTaggedText
    {
        /**
         * The constructor method.
         *
         * @param string $content
         * @param string|array<string, mixed> $options
         * @return void
         */
        public function __construct($content, $options = '') {
            // Suppress PHPStan unused parameter warning in stub
            unset($content, $options);
        }
        /**
         * Retrieves mail-tags that have been replaced by this instance.
         *
         * @return array<string, mixed> List of mail-tags replaced.
         */
        public function get_replaced_tags()
        {
            return array();
        }
        /**
         * Replaces mail-tags based on regexp.
         *
         * @return string
         */
        public function replace_tags()
        {
            return '';
        }
        /**
         * Formats string based on the formatting option in the form-tag.
         *
         * @param string $original
         * @param string $format
         * @return string
         */
        public function format($original, mixed $format)
        {
            return '';
        }
    }
    /**
     * Pipe-related classes.
     *
     * @link https://contactform7.com/selectable-recipient-with-pipes/
     */
    /**
     * Class representing a pair of pipe.
     */
    class WPCF7_Pipe
    {
        /**
         * @var string Before value.
         */
        public $before = '';
        /**
         * @var string After value.
         */
        public $after = '';
        /**
         * @param string $text
         * @return void
         */
        public function __construct($text) {
            // Suppress PHPStan unused parameter warning in stub
            unset($text);
        }
    }
    /**
     * Class representing a list of pipes.
     */
    class WPCF7_Pipes
    {
        /**
         * Constructor.
         *
         * @param array<int, string>|string|null $texts Pipe texts.
         */
        public function __construct($texts = \null) {
            // Suppress PHPStan unused parameter warning in stub
            unset($texts);
        }
        /**
         * Merges another pipes object.
         *
         * @param self $another Another pipes object.
         * @return void
         */
        public function merge(self $another): void {}
        /**
         * Performs pipe transformation.
         *
         * @param string $input Input value.
         * @return string Transformed value.
         */
        public function do_pipe($input): string
        {
            return '';
        }
        /**
         * Collects all before values.
         *
         * @return array<int, string> Before values.
         */
        public function collect_befores(): array
        {
            return array();
        }
        /**
         * Collects all after values.
         *
         * @return array<int, string> After values.
         */
        public function collect_afters(): array
        {
            return array();
        }
        /**
         * Returns the first pipe.
         *
         * @return null Always null in stubs.
         */
        public function zero(): null
        {
            return null;
        }
        /**
         * Returns a random pipe.
         *
         * @return null Always null in stubs.
         */
        public function random_pipe(): null
        {
            return null;
        }
        /**
         * Converts to array.
         *
         * @return array<int, WPCF7_Pipe> Array of pipe objects.
         */
        public function to_array(): array
        {
            return array();
        }
    }
    /**
     * Handy trait provides methods to handle dynamic properties.
     */
    trait WPCF7_PocketHolder
    {
        /**
         * @var array<string, mixed> Dynamic properties storage.
         */
        protected $pocket = array();
        /**
         * Pulls a value from the pocket.
         *
         * @param string $key Property key.
         * @return void
         */
        public function pull($key): void {}
        /**
         * Pushes a value to the pocket.
         *
         * @param string $key Property key.
         * @param mixed $value Property value.
         * @return void
         */
        public function push($key, $value): void {}
    }
    class WPCF7_REST_Controller
    {
        const route_namespace = 'contact-form-7/v1';
        /**
         * Registers REST API routes.
         *
         * @return void
         */
        public function register_routes(): void {}
        /**
         * Gets contact forms.
         *
         * @param WP_REST_Request<array<string, mixed>> $request REST request object.
         * @return \WP_REST_Response REST response or error.
         */
        public function get_contact_forms(\WP_REST_Request $request): WP_REST_Response
        {
            return new \WP_REST_Response();
        }
        /**
         * Creates a contact form.
         *
         * @param WP_REST_Request<array<string, mixed>> $request REST request object.
         * @return \WP_REST_Response REST response.
         */
        public function create_contact_form(\WP_REST_Request $request): WP_REST_Response
        {
            return new \WP_REST_Response();
        }
        /**
         * Gets a contact form.
         *
         * @param WP_REST_Request<array<string, mixed>> $request REST request object.
         * @return \WP_REST_Response REST response.
         */
        public function get_contact_form(\WP_REST_Request $request): WP_REST_Response
        {
            return new \WP_REST_Response();
        }
        /**
         * Updates a contact form.
         *
         * @param WP_REST_Request<array<string, mixed>> $request REST request object.
         * @return \WP_REST_Response REST response.
         */
        public function update_contact_form(\WP_REST_Request $request): WP_REST_Response
        {
            return new \WP_REST_Response();
        }
        /**
         * Deletes a contact form.
         *
         * @param WP_REST_Request<array<string, mixed>> $request REST request object.
         * @return \WP_REST_Response REST response.
         */
        public function delete_contact_form(\WP_REST_Request $request): WP_REST_Response
        {
            return new \WP_REST_Response();
        }
        /**
         * Creates feedback.
         *
         * @param WP_REST_Request<array<string, mixed>> $request REST request object.
         * @return \WP_REST_Response REST response.
         */
        public function create_feedback(\WP_REST_Request $request): WP_REST_Response
        {
            return new \WP_REST_Response();
        }
        /**
         * Gets schema.
         *
         * @param WP_REST_Request<array<string, mixed>> $request REST request object.
         * @return \WP_REST_Response REST response.
         */
        public function get_schema(\WP_REST_Request $request): WP_REST_Response
        {
            return new \WP_REST_Response();
        }
        /**
         * Gets refill data.
         *
         * @param WP_REST_Request<array<string, mixed>> $request REST request object.
         * @return \WP_REST_Response REST response.
         */
        public function get_refill(\WP_REST_Request $request): WP_REST_Response
        {
            return new \WP_REST_Response();
        }
    }
    class WPCF7_ShortcodeManager
    {
        /**
         * Returns the singleton instance.
         *
         * @return null Always null in stubs.
         */
        public static function get_instance(): null
        {
            return null;
        }
        /**
         * Gets scanned tags.
         *
         * @return array<string, mixed> Scanned tags.
         */
        public function get_scanned_tags(): array
        {
            return array();
        }
        /**
         * Adds a shortcode.
         *
         * @param string $tag Shortcode tag.
         * @param callable $callback Shortcode callback.
         * @param bool $has_name Whether shortcode has a name attribute.
         * @return void
         */
        public function add_shortcode($tag, $callback, $has_name = \false): void {}
        /**
         * Removes a shortcode.
         *
         * @param string $tag Shortcode tag.
         * @return void
         */
        public function remove_shortcode($tag): void {}
        /**
         * Normalizes shortcode.
         *
         * @param string $content Content to normalize.
         * @return string Normalized content.
         */
        public function normalize_shortcode($content): string
        {
            return '';
        }
        /**
         * Processes shortcodes.
         *
         * @param string $content Content to process.
         * @param bool $exec Whether to execute shortcodes.
         * @return string Processed content.
         */
        public function do_shortcode($content, $exec = \true): string
        {
            return '';
        }
        /**
         * Scans for shortcodes.
         *
         * @param string $content Content to scan.
         * @return array<int, WPCF7_FormTag> Found form tags.
         */
        public function scan_shortcode($content): array
        {
            return array();
        }
    }
    class WPCF7_Shortcode extends \WPCF7_FormTag
    {
        /**
         * Constructor.
         *
         * @param string $tag Shortcode tag.
         */
        public function __construct($tag) {
            // Suppress PHPStan unused parameter warning in stub
            unset($tag);
        }
    }
    /**
     * Class representing contact form submission.
     */
    class WPCF7_Submission
    {
        use \WPCF7_PocketHolder;
        /**
         * Returns the singleton instance of this class.
         *
         * @param WPCF7_ContactForm|null $contact_form
         * @param string|array<string, mixed> $options
         * @return null Always null in stubs.
         */
        public static function get_instance($contact_form = \null, $options = ''): null
        {
            return null;
        }
        /**
         * Returns true if this submission is created via WP REST API.
         *
         * @return bool
         */
        public static function is_restful(): bool
        {
            return false;
        }
        /**
         * Destructor.
         *
         * @return void
         */
        public function __destruct() {}
        /**
         * Returns the current status property.
         *
         * @return string
         */
        public function get_status(): string
        {
            return '';
        }
        /**
         * Sets the status property.
         *
         * @param string $status The status.
         * @return bool
         */
        public function set_status($status): bool
        {
            return false;
        }
        /**
         * Returns true if the specified status is identical to the current
         * status property.
         *
         * @param string $status The status to compare.
         * @return bool
         */
        public function is($status): bool
        {
            return false;
        }
        /**
         * Returns an associative array of submission result properties.
         *
         * @return array{status: string, message: string, posted_data_hash?: string, invalid_fields?: array<string, array{into: string, message: string, idref: string}>} Submission result properties.
         */
        public function get_result(): array
        {
            return array('status' => '', 'message' => '');
        }
        /**
         * Adds items to the array of submission result properties.
         *
         * @param string|array<string, mixed>|object $data Value to add to result properties.
         * @return array<string, mixed> Added result properties.
         */
        public function add_result_props($data = ''): array
        {
            return array();
        }
        /**
         * Retrieves the response property.
         *
         * @return string The current response property value.
         */
        public function get_response(): string
        {
            return '';
        }
        /**
         * Sets the response property.
         *
         * @param string $response New response property value.
         * @return bool
         */
        public function set_response($response): bool
        {
            return true;
        }
        /**
         * Retrieves the contact form property.
         *
         * @return WPCF7_ContactForm A contact form object.
         */
        public function get_contact_form(): WPCF7_ContactForm
        {
            return new WPCF7_ContactForm();
        }
        /**
         * Search an invalid field by field name.
         *
         * @param string $name The field name.
         * @return bool Always false in stubs.
         *                    or false when no invalid field.
         */
        public function get_invalid_field($name): bool
        {
            return false;
        }
        /**
         * Retrieves all invalid fields.
         *
         * @return array<string, array<string, string>> Invalid fields.
         */
        public function get_invalid_fields(): array
        {
            return array();
        }
        /**
         * Retrieves meta information.
         *
         * @param string $name Name of the meta information.
         * @return null Always null in stubs.
         *                     null otherwise.
         */
        public function get_meta($name): null
        {
            return null;
        }
        /**
         * Retrieves user input data through this submission.
         *
         * @param string $name Optional field name.
         * @return null Always null in stubs.
         */
        public function get_posted_data($name = ''): null
        {
            return null;
        }
        /**
         * Retrieves a user input string value through the specified field.
         *
         * @param string $name Field name.
         * @return string The user input. If the input is an array,
         *                the first item in the array.
         */
        public function get_posted_string($name): string
        {
            return '';
        }
        /**
         * Returns the hash string created for this submission.
         *
         * @return string The current hash for the submission.
         */
        public function get_posted_data_hash(): string
        {
            return '';
        }
        /**
         * Verifies nonce of the given user input hash.
         *
         * @param string $hash The user input hash.
         * @return bool Always false in stubs.
         */
        public function verify_posted_data_hash($hash = ''): bool
        {
            return false;
        }
        /**
         * Adds user consent data to this submission.
         *
         * @param string $name Field name.
         * @param string $conditions Conditions of consent.
         * @return void
         */
        public function add_consent($name, $conditions): void {}
        /**
         * Collects user consent data.
         *
         * @return array<string, string> User consent data.
         */
        public function collect_consent(): array
        {
            return array();
        }
        /**
         * Adds a spam log.
         *
         * @link https://contactform7.com/2019/05/31/why-is-this-message-marked-spam/
         * @param string|array<string, mixed> $data
         * @return void
         */
        public function add_spam_log($data = ''): void {}
        /**
         * Retrieves the spam logging data.
         *
         * @return array<string, mixed> Spam logging data.
         */
        public function get_spam_log(): array
        {
            return array();
        }
        /**
         * Retrieves files uploaded through this submission.
         *
         * @return array<string, array<string, mixed>>
         */
        public function uploaded_files(): array
        {
            return array();
        }
        /**
         * Adds extra email attachment files that are independent from form fields.
         *
         * @param string|array<int, string> $file_path A file path or an array of file paths.
         * @param string $template Optional. The name of the template to which
         *                         the files are attached.
         * @return bool True if it succeeds to attach a file at least,
         *              or false otherwise.
         */
        public function add_extra_attachments($file_path, $template = 'mail'): bool
        {
            return false;
        }
        /**
         * Returns extra email attachment files.
         *
         * @param string $template An email template name.
         * @return array<int, string> Array of file paths.
         */
        public function extra_attachments($template): array
        {
            return array();
        }
    }
}

namespace Contactable\SWV {
    /**
     * The base class of SWV rules.
     */
    abstract class Rule
    {
        /** @var array<string, mixed> */
        protected $properties = array();
        /**
         * @param array<string, mixed>|string $properties
         * @return void
         */
        public function __construct($properties = '') {
            // Suppress PHPStan unused parameter warning in stub
            unset($properties);
        }
        /**
         * Returns true if this rule matches the given context.
         *
         * @param array<string, mixed> $context Context.
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * Validates with this rule's logic.
         *
         * @param array<string, mixed> $context Context.
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
        /**
         * Converts the properties to an array.
         *
         * @return array<string, mixed> Array of properties.
         */
        public function to_array(): array
        {
            return array();
        }
        /**
         * Returns the property value specified by the given property name.
         *
         * @param string $name Property name.
         * @return mixed Property value.
         */
        public function get_property($name) {}
        /**
         * Returns the default user input value from $_POST.
         *
         * @return mixed Default user input value.
         */
        public function get_default_input() {}
        /**
         * Returns the default user upload file from $_FILES.
         *
         * @return object Default user upload file.
         */
        public function get_default_upload(): object
        {
            return (object) array();
        }
        /**
         * Creates an error object. Returns false if the error property is omitted.
         *
         * @return false
         */
        protected function create_error(): bool
        {
            return false;
        }
    }
    /**
     * The base class of SWV composite rules.
     */
    abstract class CompositeRule extends \Contactable\SWV\Rule
    {
        /** @var array<int, Rule> */
        protected $rules = array();
        /**
         * Adds a sub-rule to this composite rule.
         *
         * @param Rule $rule Sub-rule to be added.
         * @return void
         */
        public function add_rule($rule): void {}
        /**
         * Returns an iterator of sub-rules.
         *
         * @return \ArrayIterator<int, Rule>
         */
        public function rules(): \ArrayIterator
        {
            return new \ArrayIterator();
        }
        /**
         * Returns true if this rule matches the given context.
         *
         * @param array<string, mixed> $context Context.
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * Validates with this rule's logic.
         *
         * @param array<string, mixed> $context Context.
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
        /**
         * Converts the properties to an array.
         *
         * @return array<string, mixed> Array of properties.
         */
        public function to_array(): array
        {
            return array();
        }
    }
    class AllRule extends \Contactable\SWV\CompositeRule
    {
        const rule_name = 'all';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class AnyRule extends \Contactable\SWV\CompositeRule
    {
        const rule_name = 'any';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class DateRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'date';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class DayofweekRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'dayofweek';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class EmailRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'email';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class EnumRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'enum';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class FileRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'file';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class MaxDateRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'maxdate';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class MaxFileSizeRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'maxfilesize';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class MaxItemsRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'maxitems';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class MaxLengthRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'maxlength';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class MaxNumberRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'maxnumber';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class MinDateRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'mindate';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class MinFileSizeRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'minfilesize';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class MinItemsRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'minitems';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class MinLengthRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'minlength';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class MinNumberRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'minnumber';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class NumberRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'number';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class RequiredRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'required';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class RequiredFileRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'requiredfile';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class StepNumberRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'stepnumber';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class TelRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'tel';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class TimeRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'time';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    class URLRule extends \Contactable\SWV\Rule
    {
        const rule_name = 'url';
        /**
         * @param array<string, mixed> $context
         * @return bool
         */
        public function matches($context): bool
        {
            return false;
        }
        /**
         * @param array<string, mixed> $context
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
}

namespace {
    /**
     * The schema class as a composite rule.
     */
    class WPCF7_SWV_Schema extends \Contactable\SWV\CompositeRule
    {
        /**
         * The human-readable version of the schema.
         */
        const version = 'Contact Form 7 SWV Schema 2024-10';
        /**
         * Constructor.
         */
        public function __construct($properties = '') {
            // Suppress PHPStan unused parameter warning in stub
            unset($properties);
        }
        /**
         * Validates with this schema.
         *
         * @param array<string, mixed> $context Context.
         * @return array<string, mixed>
         */
        public function validate($context): array
        {
            return array();
        }
    }
    /**
     * Server-side user input validation manager.
     *
     * @implements \ArrayAccess<string, mixed>
     */
    class WPCF7_Validation implements \ArrayAccess
    {
        public function __construct() {}
        /**
         * Marks a form control as an invalid field.
         *
         * @param WPCF7_FormTag|array<string, mixed>|string $context Context representing the
         *                                   target field.
         * @param WP_Error|string $error The error of the field.
         * @return void
         */
        public function invalidate($context, $error): void {}
        /**
         * Returns true if the target field is valid.
         *
         * @param string|null $name Optional. If specified, this is the name of
         *                    the target field. Default null.
         * @return bool True if the target field has no error. If no target is
         *              specified, returns true if all fields are valid.
         *              Otherwise false.
         */
        public function is_valid($name = \null): bool
        {
            return false;
        }
        /**
         * Retrieves an associative array of invalid fields.
         *
         * @return array<string, array<string, mixed>> The associative array of invalid fields.
         */
        public function get_invalid_fields(): array
        {
            return array();
        }
        /**
         * Assigns a value to the specified offset.
         *
         * @link https://www.php.net/manual/en/arrayaccess.offsetset.php
         */
        #[\ReturnTypeWillChange]
        public function offsetSet($offset, $value): void {}
        /**
         * Returns the value at specified offset.
         *
         * @link https://www.php.net/manual/en/arrayaccess.offsetget.php
         */
        #[\ReturnTypeWillChange]
        public function offsetGet($offset): void {}
        /**
         * Returns true if the specified offset exists.
         *
         * @link https://www.php.net/manual/en/arrayaccess.offsetexists.php
         */
        #[\ReturnTypeWillChange]
        public function offsetExists($offset): bool
        {
            return false;
        }
        /**
         * Unsets an offset.
         *
         * @link https://www.php.net/manual/en/arrayaccess.offsetunset.php
         */
        #[\ReturnTypeWillChange]
        public function offsetUnset($offset): void {}
    }
    class WPCF7
    {
        /**
         * Loads modules from the modules directory.
         * @return void
         */
        public static function load_modules(): void {}
        /**
         * Loads the specified module.
         *
         * @param string $mod Name of module.
         * @return bool True on success, false on failure.
         */
        protected static function load_module($mod): bool
        {
            return false;
        }
        /**
         * Retrieves a named entry from the option array of Contact Form 7.
         *
         * @param string $name Array item key.
         * @param mixed $default_value Optional. Default value to return if the entry
         *                             does not exist. Default false.
         * @return mixed Array value tied to the $name key. If nothing found,
         *               the $default_value value will be returned.
         */
        public static function get_option($name, $default_value = \false) {}
        /**
         * Update an entry value on the option array of Contact Form 7.
         *
         * @param string $name Array item key.
         * @param mixed $value Option value.
         * @return void
         */
        public static function update_option($name, $value): void {}
    }
    class WPCF7_Akismet extends \WPCF7_Service
    {
        /**
         * Returns the singleton instance.
         *
         * @return null Always null in stubs. Singleton instance or null.
         */
        public static function get_instance(): null
        {
            return null;
        }
        /**
         * Returns the service title.
         *
         * @return string Service title.
         */
        public function get_title(): string
        {
            return '';
        }
        /**
         * Returns whether the service is active.
         *
         * @return bool True if active, false otherwise.
         */
        public function is_active(): bool
        {
            return false;
        }
        /**
         * Returns the service categories.
         *
         * @return array<int, string> Service categories.
         */
        public function get_categories(): array
        {
            return array();
        }
        /**
         * Returns the service icon HTML.
         *
         * @return string Icon HTML.
         */
        public function icon(): string
        {
            return '';
        }
        /**
         * Returns the service link URL.
         *
         * @return string Link URL.
         */
        public function link(): string
        {
            return '';
        }
        /**
         * Displays the service.
         *
         * @param string $action Optional action to display.
         * @return void
         */
        public function display($action = ''): void {}
    }
    /**
     * The WPCF7_Service subclass for Constant Contact.
     */
    class WPCF7_ConstantContact extends \WPCF7_Service
    {
        const service_name = 'constant_contact';
        /**
         * @var string OAuth client ID.
         */
        protected $client_id = '';
        /**
         * @var string OAuth client secret.
         */
        protected $client_secret = '';
        /**
         * Returns the singleton instance.
         *
         * @return null Always null in stubs. Singleton instance or null.
         */
        public static function get_instance(): null
        {
            return null;
        }
        /**
         * Resets the service data.
         *
         * @return void
         */
        protected function reset_data(): void {}
        /**
         * Returns the service title.
         *
         * @return string Service title.
         */
        public function get_title(): string
        {
            return '';
        }
        /**
         * Returns whether the service is active.
         *
         * @return bool True if active, false otherwise.
         */
        public function is_active(): bool
        {
            return false;
        }
        /**
         * Returns the service categories.
         *
         * @return array<int, string> Service categories.
         */
        public function get_categories(): array
        {
            return array();
        }
        /**
         * Returns the service icon HTML.
         *
         * @return string Icon HTML.
         */
        public function icon(): string
        {
            return '';
        }
        /**
         * Returns the service link URL.
         *
         * @return string Link URL.
         */
        public function link(): string
        {
            return '';
        }
        /**
         * Returns the menu page URL.
         *
         * @param string|array<string, mixed> $args Optional arguments to append to URL.
         * @return string Menu page URL.
         */
        protected function menu_page_url($args = ''): string
        {
            return '';
        }
        /**
         * Loads the service.
         *
         * @param string $action Optional action to perform.
         * @return void
         */
        public function load($action = ''): void {}
        /**
         * Displays an admin notice.
         *
         * @param string $message Notice message.
         * @return void
         */
        public function admin_notice($message = ''): void {}
        /**
         * Displays the service.
         *
         * @param string $action Optional action to display.
         * @return void
         */
        public function display($action = ''): void {}
    }
    class WPCF7_RECAPTCHA extends \WPCF7_Service
    {
        /**
         * Returns the singleton instance.
         *
         * @return null Always null in stubs. Singleton instance or null.
         */
        public static function get_instance(): null
        {
            return null;
        }
        /**
         * Returns the service title.
         *
         * @return string Service title.
         */
        public function get_title(): string
        {
            return '';
        }
        /**
         * Returns whether the service is active.
         *
         * @return bool True if active, false otherwise.
         */
        public function is_active(): bool
        {
            return false;
        }
        /**
         * Returns the service categories.
         *
         * @return array<int, string> Service categories.
         */
        public function get_categories(): array
        {
            return array();
        }
        /**
         * Returns the service icon HTML.
         *
         * @return string Icon HTML.
         */
        public function icon(): string
        {
            return '';
        }
        /**
         * Returns the service link URL.
         *
         * @return string Link URL.
         */
        public function link(): string
        {
            return '';
        }
        /**
         * Returns the global site key.
         *
         * @return string Global site key.
         */
        public function get_global_sitekey(): string
        {
            return '';
        }
        /**
         * Returns the global secret.
         *
         * @return string Global secret.
         */
        public function get_global_secret(): string
        {
            return '';
        }
        /**
         * Returns the site key.
         *
         * @return string Site key.
         */
        public function get_sitekey(): string
        {
            return '';
        }
        /**
         * Returns the secret for a given site key.
         *
         * @param string $sitekey Site key.
         * @return string Secret.
         */
        public function get_secret($sitekey): string
        {
            return '';
        }
        /**
         * Logs the request and response.
         *
         * @param string $url Request URL.
         * @param array<string, mixed> $request Request data.
         * @param array<string, mixed>|\WP_Error $response Response data or WP_Error.
         * @return void
         */
        protected function log($url, $request, $response): void {}
        /**
         * Verifies the reCAPTCHA token.
         *
         * @param string $token reCAPTCHA token.
         * @return bool True if verified, false otherwise.
         */
        public function verify($token): bool
        {
            return false;
        }
        /**
         * Returns the score threshold.
         *
         * @return float Score threshold.
         */
        public function get_threshold(): float
        {
            return 0.0;
        }
        /**
         * Returns the last score.
         *
         * @return float|null Last score or null.
         */
        public function get_last_score(): ?float
        {
            return null;
        }
        /**
         * Returns the menu page URL.
         *
         * @param string|array<string, mixed> $args Optional arguments to append to URL.
         * @return string Menu page URL.
         */
        protected function menu_page_url($args = ''): string
        {
            return '';
        }
        /**
         * Saves the service data.
         *
         * @return void
         */
        protected function save_data(): void {}
        /**
         * Resets the service data.
         *
         * @return void
         */
        protected function reset_data(): void {}
        /**
         * Loads the service.
         *
         * @param string $action Optional action to perform.
         * @return void
         */
        public function load($action = ''): void {}
        /**
         * Displays an admin notice.
         *
         * @param string $message Notice message.
         * @return void
         */
        public function admin_notice($message = ''): void {}
        /**
         * Displays the service.
         *
         * @param string $action Optional action to display.
         * @return void
         */
        public function display($action = ''): void {}
    }
    /**
     * Trait for the Sendinblue API (v3).
     *
     * @link https://developers.sendinblue.com/reference
     */
    trait WPCF7_Sendinblue_API
    {
        /**
         * Confirms the API key.
         *
         * @return bool True if valid, false otherwise.
         */
        public function confirm_key(): bool { return false; }
        /**
         * Gets contact lists.
         *
         * @param string|array<string, mixed> $options Optional query parameters.
         * @return array<string, mixed>|false List data or false on failure.
         */
        public function get_lists($options = '') { return array(); }
        /**
         * Gets email templates.
         *
         * @return array<string, mixed>|false Template data or false on failure.
         */
        public function get_templates() { return false; }
        /**
         * Creates a contact.
         *
         * @param array<string, mixed> $properties Contact properties.
         * @return bool True if successful, false otherwise.
         */
        public function create_contact($properties): bool { return false; }
        /**
         * Sends an email.
         *
         * @param array<string, mixed> $properties Email properties.
         * @return bool True if successful, false otherwise.
         */
        public function send_email($properties): bool { return false; }
    }
    class WPCF7_Sendinblue extends \WPCF7_Service
    {
        use \WPCF7_Sendinblue_API;
        /**
         * Returns the singleton instance.
         *
         * @return WPCF7_Sendinblue|null Singleton instance or null.
         */
        public static function get_instance()
        {
            return null;
        }
        /**
         * Returns the service title.
         *
         * @return string Service title.
         */
        public function get_title()
        {
            return '';
        }
        /**
         * Returns whether the service is active.
         *
         * @return bool True if active, false otherwise.
         */
        public function is_active()
        {
            return false;
        }
        /**
         * Returns the API key.
         *
         * @return string API key.
         */
        public function get_api_key()
        {
            return '';
        }
        /**
         * Returns the service categories.
         *
         * @return array<int, string> Service categories.
         */
        public function get_categories()
        {
            return array();
        }
        /**
         * Returns the service icon HTML.
         *
         * @return string Icon HTML.
         */
        public function icon()
        {
            return '';
        }
        /**
         * Returns the service link URL.
         *
         * @return string Link URL.
         */
        public function link()
        {
            return '';
        }
        /**
         * Logs the request and response.
         *
         * @param string $url Request URL.
         * @param array<string, mixed> $request Request data.
         * @param array<string, mixed>|\WP_Error $response Response data or WP_Error.
         * @return void
         */
        protected function log($url, $request, $response) {}
        /**
         * Returns the menu page URL.
         *
         * @param string|array<string, mixed> $args Optional arguments to append to URL.
         * @return string Menu page URL.
         */
        protected function menu_page_url($args = '')
        {
            return '';
        }
        /**
         * Saves the service data.
         *
         * @return void
         */
        protected function save_data() {}
        /**
         * Resets the service data.
         *
         * @return void
         */
        protected function reset_data() {}
        /**
         * Loads the service.
         *
         * @param string $action Optional action to perform.
         * @return void
         */
        public function load($action = '') {}
        /**
         * Displays an admin notice.
         *
         * @param string $message Notice message.
         * @return void
         */
        public function admin_notice($message = '') {}
        /**
         * Displays the service.
         *
         * @param string $action Optional action to display.
         * @return void
         */
        public function display($action = '') {}
    }
    /**
     * Class for the Stripe API.
     *
     * @link https://docs.stripe.com/api
     */
    class WPCF7_Stripe_API
    {
        const api_version = '2022-11-15';
        const partner_id = 'pp_partner_HHbvqLh1AaO7Am';
        const app_name = 'WordPress Contact Form 7';
        const app_url = 'https://contactform7.com/stripe-integration/';
        /**
         * Constructor.
         *
         * @param string $secret Secret key.
         */
        public function __construct($secret) {
            // Suppress PHPStan unused parameter warning in stub
            unset($secret);
        }
        /**
         * Creates a Payment Intent.
         *
         * @link https://docs.stripe.com/api/payment_intents/create
         *
         * @param string|array<string, mixed> $args Optional. Arguments to control behavior.
         * @return array<string, mixed>|bool An associative array if 200 OK, false otherwise.
         */
        public function create_payment_intent($args = '')
        {
            return false;
        }
        /**
         * Retrieves a Payment Intent.
         *
         * @link https://docs.stripe.com/api/payment_intents/retrieve
         *
         * @param string $id Payment Intent identifier.
         * @return array<string, mixed>|bool An associative array if 200 OK, false otherwise.
         */
        public function retrieve_payment_intent($id)
        {
            return false;
        }
        /**
         * Updates a Payment Intent.
         *
         * @link https://docs.stripe.com/api/payment_intents/update
         *
         * @param string $id Payment Intent identifier.
         * @param array<string, mixed> $parameters Parameters.
         * @return array<string, mixed>|bool An associative array if 200 OK, false otherwise.
         */
        public function update_payment_intent($id, $parameters)
        {
            return false;
        }
    }
    class WPCF7_Stripe extends \WPCF7_Service
    {
        /**
         * Returns the singleton instance.
         *
         * @return null Always null in stubs. Singleton instance or null.
         */
        public static function get_instance(): null
        {
            return null;
        }
        /**
         * Returns the service title.
         *
         * @return string Service title.
         */
        public function get_title(): string
        {
            return '';
        }
        /**
         * Returns whether the service is active.
         *
         * @return bool True if active, false otherwise.
         */
        public function is_active(): bool
        {
            return false;
        }
        /**
         * Returns the Stripe API instance.
         *
         * @return null Always null in stubs. API instance or null.
         */
        public function api(): null
        {
            return null;
        }
        /**
         * Returns the API keys.
         *
         * @return array<string, string> API keys (publishable and secret).
         */
        public function get_api_keys(): array
        {
            return array();
        }
        /**
         * Returns the service categories.
         *
         * @return array<int, string> Service categories.
         */
        public function get_categories(): array
        {
            return array();
        }
        /**
         * Returns the service icon HTML.
         *
         * @return string Icon HTML.
         */
        public function icon(): string
        {
            return '';
        }
        /**
         * Returns the service link URL.
         *
         * @return string Link URL.
         */
        public function link(): string
        {
            return '';
        }
        /**
         * Returns the menu page URL.
         *
         * @param string|array<string, mixed> $args Optional arguments to append to URL.
         * @return string Menu page URL.
         */
        protected function menu_page_url($args = ''): string
        {
            return '';
        }
        /**
         * Saves the service data.
         *
         * @return void
         */
        protected function save_data(): void {}
        /**
         * Resets the service data.
         *
         * @return void
         */
        protected function reset_data(): void {}
        /**
         * Loads the service.
         *
         * @param string $action Optional action to perform.
         * @return void
         */
        public function load($action = ''): void {}
        /**
         * Displays an admin notice.
         *
         * @param string $message Notice message.
         * @return void
         */
        public function admin_notice($message = ''): void {}
        /**
         * Displays the service.
         *
         * @param string $action Optional action to display.
         * @return void
         */
        public function display($action = ''): void {}
    }
    class WPCF7_Turnstile extends \WPCF7_Service
    {
        /**
         * Returns the singleton instance of the class.
         *
         * @return null Always null in stubs. The singleton instance or null.
         */
        public static function get_instance(): null
        {
            return null;
        }
        /**
         * Returns the service title.
         *
         * @return string Service title.
         */
        public function get_title(): string
        {
            return '';
        }
        /**
         * Returns true if the service is active.
         *
         * @return bool True if active, false otherwise.
         */
        public function is_active(): bool
        {
            return false;
        }
        /**
         * Returns an array of categories to which the service belongs to.
         *
         * @return array<int, string> Service categories.
         */
        public function get_categories(): array
        {
            return array();
        }
        /**
         * Returns the icon that represents the service.
         *
         * @return string Icon HTML.
         */
        public function icon(): string
        {
            return '';
        }
        /**
         * Returns a link to the service provider.
         *
         * @return string Service provider URL.
         */
        public function link(): string
        {
            return '';
        }
        /**
         * Returns a sitekey.
         *
         * @return string Sitekey.
         */
        public function get_sitekey(): string
        {
            return '';
        }
        /**
         * Returns the secret key that is paired with the given sitekey.
         *
         * @param string $sitekey Sitekey to get secret for.
         * @return string Secret key.
         */
        public function get_secret($sitekey): string
        {
            return '';
        }
        /**
         * Logs an API response.
         *
         * @param string $url Request URL.
         * @param array<string, mixed> $request Request data.
         * @param array<string, mixed>|\WP_Error $response Response data or WP_Error.
         * @return void
         */
        protected function log($url, $request, $response): void {}
        /**
         * Verifies a response token.
         *
         * @param string $token Response token.
         * @return bool True if verified, false otherwise.
         */
        public function verify($token): bool
        {
            return false;
        }
        /**
         * Returns the menu page URL for the service configuration.
         *
         * @param string|array<string, mixed> $args Optional arguments to append to URL.
         * @return string Menu page URL.
         */
        protected function menu_page_url($args = ''): string
        {
            return '';
        }
        /**
         * Saves the service configuration data.
         *
         * @return void
         */
        protected function save_data(): void {}
        /**
         * Resets the service configuration data.
         *
         * @return void
         */
        protected function reset_data() {}
        /**
         * The loading process of the service configuration page.
         *
         * @param string $action Optional action to perform.
         * @return void
         */
        public function load($action = ''): void {}
        /**
         * Displays a notice on the integration page.
         */
        public function admin_notice($message = ''): void {}
        /**
         * Displays the service configuration box.
         *
         * @param string $action
         * @return void
         */
        public function display($action = ''): void {}
    }
}

namespace {
    /**
     * @return void
     */
    function wpcf7_admin_menu(): void {}
    /**
     * @param string $menu_slug
     * @return string
     */
    function wpcf7_admin_menu_change_notice(string $menu_slug = ''): string
    {
        return '';
    }
    /**
     * @param string $hook_suffix
     * @return void
     */
    function wpcf7_admin_enqueue_scripts(string $hook_suffix): void {}
    /**
     * @return void
     */
    function wpcf7_load_contact_form_admin(): void {}
    /**
     * @return void
     */
    function wpcf7_admin_management_page(): void {}
    /**
     * @return void
     */
    function wpcf7_admin_add_new_page(): void {}
    /**
     * @return void
     */
    function wpcf7_load_integration_page(): void {}
    /**
     * @return void
     */
    function wpcf7_admin_integration_page(): void {}
    /**
     * @param string $page
     * @param string $action
     * @param WPCF7_ContactForm $object
     * @return void
     */
    function wpcf7_admin_updated_message(string $page, string $action, WPCF7_ContactForm $object): void {}
    /**
     * @param array<int, string> $links
     * @param string $file
     * @return array<int, string>
     */
    function wpcf7_plugin_action_links(array $links, string $file): array
    {
        return array();
    }
    /**
     * @param string $page
     * @param string $action
     * @param WPCF7_ContactForm $object
     * @return void
     */
    function wpcf7_old_wp_version_error(string $page, string $action, WPCF7_ContactForm $object): void {}
    /**
     * @param string $page
     * @param string $action
     * @param WPCF7_ContactForm $object
     * @return void
     */
    function wpcf7_not_allowed_to_edit(string $page, string $action, WPCF7_ContactForm $object): void {}
    /**
     * @param string $page
     * @param string $action
     * @param WPCF7_ContactForm $object
     * @return void
     */
    function wpcf7_ctct_deprecated_warning(string $page, string $action, WPCF7_ContactForm $object): void {}
    /**
     * @param string $page
     * @param string $action
     * @param WPCF7_ContactForm $object
     * @return void
     */
    function wpcf7_captcha_future_warning(string $page, string $action, WPCF7_ContactForm $object): void {}
    /**
     * @return string|false
     */
    function wpcf7_current_action(): bool
    {
        return false;
    }
    /**
     * @return bool
     */
    function wpcf7_admin_has_edit_cap(): bool
    {
        return false;
    }
    /**
     * @param string $name
     * @param string $title
     * @param string $elm_id
     * @param callable $callback
     * @param array<string, mixed> $options
     * @return void
     */
    function wpcf7_add_tag_generator(string $name, string $title, string $elm_id, callable $callback, array $options = array()): void {}
    /**
     * @return void
     */
    function wpcf7_admin_init_bulk_cv(): void {}
    /**
     * @param array<string, int> $counts
     * @return array<string, int>
     */
    function wpcf7_admin_menu_change_notice_bulk_cv(array $counts): array
    {
        return array();
    }
    /**
     * @param string $page
     * @param string $action
     * @param WPCF7_ContactForm $object
     * @return void
     */
    function wpcf7_admin_warnings_bulk_cv(string $page, string $action, WPCF7_ContactForm $object): void {}
    /**
     * @param string $page
     * @param string $action
     * @return void
     */
    function wpcf7_load_bulk_validate_page(string $page, string $action): void {}
    /**
     * @return void
     */
    function wpcf7_admin_bulk_validate_page(): void {}
    /**
     * @param \WP_Post $post
     * @return void
     */
    function wpcf7_editor_panel_form(\WP_Post $post): void {}
    /**
     * @param \WP_Post $post
     * @return void
     */
    function wpcf7_editor_panel_mail(\WP_Post $post): void {}
    /**
     * @param \WP_Post $post
     * @param string|array<string, mixed> $options
     * @return void
     */
    function wpcf7_editor_box_mail(\WP_Post $post, mixed $options = ''): void {}
    /**
     * @param \WP_Post $post
     * @return void
     */
    function wpcf7_editor_panel_messages(\WP_Post $post): void {}
    /**
     * @param \WP_Post $post
     * @return void
     */
    function wpcf7_editor_panel_additional_settings(\WP_Post $post): void {}
    /**
     * @return void
     */
    function wpcf7_welcome_panel(): void {}
    /**
     * @return void
     */
    function wpcf7_admin_ajax_welcome_panel(): void {}
    /**
     * @param array<string, mixed> $screen_settings
     * @param \WP_Screen $screen
     * @return array<string, mixed>
     */
    function wpcf7_welcome_panel_screen_settings(array $screen_settings, \WP_Screen $screen): array
    {
        return array();
    }
    /**
     * @return void
     */
    function wpcf7_init_block_editor_assets(): void {}
    /**
     * @param array<int, string> $caps
     * @param string $cap
     * @param int $user_id
     * @param array<int, mixed> $args
     * @return array<int, string>
     */
    function wpcf7_map_meta_cap(array $caps, string $cap, int $user_id, array $args): array
    {
        return array();
    }
    /**
     * Runs bulk validation after the reCAPTCHA integration option is updated.
     *
     * @param string $name
     * @param mixed $value
     * @param mixed $old_option
     * @return void
     */
    function wpcf7_config_validator_update_option(string $name, mixed $value, mixed $old_option): void {}
    /**
     * Wrapper function of WPCF7_ContactForm::get_instance().
     *
     * @param int|\WP_Post|null $post Object or post ID.
     * @return WPCF7_ContactForm|null Contact form object. Null if unset.
     */
    function wpcf7_contact_form(WPCF7_ContactForm|WP_Post|int $post): null { return null; }
    /**
     * Searches for a contact form by an old unit ID.
     *
     * @param int $old_id Old unit ID.
     * @return WPCF7_ContactForm|null Contact form object.
     */
    function wpcf7_get_contact_form_by_old_id(int $old_id): null
    {
        return null;
    }
    /**
     * Searches for a contact form by a hash string.
     *
     * @param string $hash Part of a hash string.
     * @return WPCF7_ContactForm|null Contact form object.
     */
    function wpcf7_get_contact_form_by_hash(string $hash): null
    {
        return null;
    }
    /**
     * Searches for a contact form by title.
     *
     * @param string $title Title of contact form.
     * @return WPCF7_ContactForm|null Contact form object if found, null otherwise.
     */
    function wpcf7_get_contact_form_by_title(string $title): null
    {
        return null;
    }
    /**
     * Wrapper function of WPCF7_ContactForm::get_current().
     *
     * @return WPCF7_ContactForm|null Contact form object.
     */
    function wpcf7_get_current_contact_form(): null
    {
        return null;
    }
    /**
     * Returns true if it is in the state that a non-Ajax submission is accepted.
     *
     * @return bool
     */
    function wpcf7_is_posted(): bool
    {
        return false;
    }
    /**
     * Retrieves the user input value through a non-Ajax submission.
     *
     * @param string $name Name of form control.
     * @param string $default_value Optional default value.
     * @return string The user input value through the form-control.
     */
    function wpcf7_get_hangover(string $name, mixed $default_value = \null): string
    {
        return '';
    }
    /**
     * Retrieves an HTML snippet of validation error on the given form control.
     *
     * @param string $name Name of form control.
     * @return string Validation error message in a form of HTML snippet.
     */
    function wpcf7_get_validation_error(string $name): string
    {
        return '';
    }
    /**
     * Returns a reference key to a validation error message.
     *
     * @param string $name Name of form control.
     * @param string $unit_tag Optional. Unit tag of the contact form.
     * @return string Reference key code.
     */
    function wpcf7_get_validation_error_reference(string $name, string $unit_tag = ''): string
    {
        return '';
    }
    /**
     * Retrieves a message for the given status.
     *
     * @param string $status
     * @return string
     */
    function wpcf7_get_message(string $status): string
    {
        return '';
    }
    /**
     * Returns a class names list for a form-tag of the specified type.
     *
     * @param string $type Form-tag type.
     * @param string $default_classes Optional default classes.
     * @return string Whitespace-separated list of class names.
     */
    function wpcf7_form_controls_class(string $type, string $default_classes = ''): string
    {
        return '';
    }
    /**
     * Callback function for the contact-form-7 shortcode.
     *
     * @param array<string, mixed>|string $atts
     * @param string|null $content
     * @param string $code
     * @return string
     */
    function wpcf7_contact_form_tag_func(mixed $atts, mixed $content = \null, string $code = ''): string
    {
        return '';
    }
    /**
     * Saves the contact form data.
     *
     * @param array<string, mixed>|string $data
     * @param string $context
     * @return WPCF7_ContactForm|null
     */
    function wpcf7_save_contact_form(mixed $data = '', string $context = 'save'): null
    {
        return null;
    }
    /**
     * Sanitizes the form property data.
     *
     * @param string $input
     * @param string $default_template
     * @return string
     */
    function wpcf7_sanitize_form(string $input, string $default_template = ''): string
    {
        return '';
    }
    /**
     * Sanitizes the mail property data.
     *
     * @param array<string, mixed> $input
     * @param array<string, mixed> $defaults
     * @return array<string, mixed>
     */
    function wpcf7_sanitize_mail(array $input, array $defaults = array()): array
    {
        return array();
    }
    /**
     * Sanitizes the messages property data.
     *
     * @param array<string, mixed> $input
     * @param array<string, mixed> $defaults
     * @return array<string, mixed>
     */
    function wpcf7_sanitize_messages(array $input, array $defaults = array()): array
    {
        return array();
    }
    /**
     * Sanitizes the additional settings property data.
     *
     * @param string $input
     * @param string $default_template
     * @return string
     */
    function wpcf7_sanitize_additional_settings(string $input, string $default_template = ''): string
    {
        return '';
    }
    /**
     * Generates a random hash string for a contact form.
     *
     * @param int $post_id Post ID.
     * @return string SHA-1 hash.
     */
    function wpcf7_generate_contact_form_hash(int $post_id): string
    {
        return '';
    }
    /**
     * @return array<string, mixed>
     */
    function wpcf7_messages(): array
    {
        return array();
    }
    /**
     * Handles a submission in non-Ajax mode.
     *
     * @return void
     */
    /**
     * @return void
     */
    function wpcf7_control_init(): void {}
    /**
     * Enqueues scripts.
     *
     * @return void
     */
    function wpcf7_enqueue_scripts(): void {}
    /**
     * Returns true if the main script is enqueued.
     *
     * @return bool
     */
    function wpcf7_script_is(): bool
    {
        return false;
    }
    /**
     * Enqueues styles.
     *
     * @return void
     */
    function wpcf7_enqueue_styles(): void {}
    /**
     * Returns true if the main stylesheet is enqueued.
     *
     * @return bool
     */
    function wpcf7_style_is(): bool
    {
        return false;
    }
    /**
     * Enqueues scripts and styles for the HTML5 fallback.
     *
     * @return void
     */
    function wpcf7_html5_fallback(): void {}
    /**
     * Validates uploaded files and moves them to the temporary directory.
     *
     * @param array<string, mixed> $file An item of `$_FILES`.
     * @param string|array<string, mixed> $options Optional. Options to control behavior.
     * @return array<string, mixed> Array of file paths, or WP_Error if validation fails.
     */
    function wpcf7_unship_uploaded_file(array $file, mixed $options = ''): array
    {
        return array();
    }
    /**
     * A wpcf7_messages filter callback that adds messages for
     * file-uploading fields.
     *
     * @param array<string, mixed> $messages
     * @return array<string, mixed>
     */
    function wpcf7_file_messages(array $messages): array
    {
        return array();
    }
    /**
     * A wpcf7_form_enctype filter callback that sets the enctype attribute
     * to multipart/form-data if the form has file-uploading fields.
     *
     * @param string $enctype
     * @return string
     */
    function wpcf7_file_form_enctype_filter(string $enctype): string
    {
        return '';
    }
    /**
     * Converts a MIME type string to an array of corresponding file extensions.
     *
     * @param string $mime MIME type.
     *                     Wildcard (*) is available for the subtype part.
     * @return array Corresponding file extensions.
     */
    function wpcf7_convert_mime_to_ext(string $mime): string
    {
        return '';
    }
    /**
     * Returns a formatted list of acceptable filetypes.
     *
     * @param string|array<int, string> $types Optional. Array of filetypes.
     * @param string $format Optional. Pre-defined format designator.
     * @return string Formatted list of acceptable filetypes.
     */
    function wpcf7_acceptable_filetypes(mixed $types = 'default', mixed $format = 'regex'): string
    {
        return '';
    }
    /**
     * Initializes the temporary directory for uploaded files.
     *
     * @return array<string, mixed>
     */
    function wpcf7_init_uploads(): array { return array(); }
    /**
     * Creates a child directory with a randomly generated name.
     *
     * @param string $dir The parent directory path.
     * @return string The child directory path if created, otherwise the parent.
     */
    function wpcf7_maybe_add_random_dir(string $dir): string
    {
        return '';
    }
    /**
     * Returns the directory path for uploaded files.
     *
     * @return string Directory path.
     */
    function wpcf7_upload_tmp_dir(): string
    {
        return '';
    }
    /**
     * Cleans up files in the temporary directory for uploaded files.
     *
     * @param int $seconds Files older than this are removed. Default 60.
     * @param int $max Maximum number of files to be removed in a function call.
     *                 Default 100.
     * @return void
     */
    function wpcf7_cleanup_upload_files(int $seconds = 60, int $max = 100): void {}
    /**
     * Displays warning messages about file-uploading fields.
     *
     * @param string $page
     * @param string $action
     * @param WPCF7_ContactForm $object
     * @return void
     */
    function wpcf7_file_display_warning_message(string $page, string $action, WPCF7_ContactForm $object): void {}
    /**
     * Wrapper function of WPCF7_FormTagsManager::add().
     *
     * @param string|array<int, string> $tag_types
     * @param callable $callback
     * @param string|array<string, bool> $features
     * @return void
     */
    function wpcf7_add_form_tag(mixed $tag_types, callable $callback, mixed $features = ''): void {}
    /**
     * Wrapper function of WPCF7_FormTagsManager::remove().
     *
     * @param string $tag_type
     * @return void
     */
    function wpcf7_remove_form_tag(string $tag_type): void {}
    /**
     * Wrapper function of WPCF7_FormTagsManager::replace_all().
     *
     * @param string $content
     * @return string
     */
    function wpcf7_replace_all_form_tags(string $content): string
    {
        return '';
    }
    /**
     * Wrapper function of WPCF7_ContactForm::scan_form_tags().
     *
     * @param array<string, mixed>|null $cond
     * @return array<int, WPCF7_FormTag>
     */
    function wpcf7_scan_form_tags(?array $cond = null): array
    {
        return array();
    }
    /**
     * Wrapper function of WPCF7_FormTagsManager::tag_type_supports().
     *
     * @param string $tag_type
     * @param string $feature
     * @return bool
     */
    function wpcf7_form_tag_supports(string $tag_type, string $feature): bool {
        return false;
    }
    /**
     * Replaces double line breaks with paragraph elements.
     *
     * @param string $input The text which has to be formatted.
     * @param bool $br Optional. If set, this will convert all remaining
     *             line breaks after paragraphing. Default true.
     * @return string Text which has been converted into correct paragraph tags.
     */
    function wpcf7_autop(string $input, bool $br = true): string
    {
        return '';
    }
    /**
     * Newline preservation help function for wpcf7_autop().
     *
     * @deprecated 5.7 Unnecessary to use any more.
     *
     * @param array<int, string> $matches preg_replace_callback() matches array.
     * @return string Text including newline placeholders.
     */
    function wpcf7_autop_preserve_newline_callback(array $matches): string
    {
        return '';
    }
    /**
     * Sanitizes the query variables.
     *
     * @param string $text Query variable.
     * @return string Text sanitized.
     */
    function wpcf7_sanitize_query_var(string $text): string
    {
        return '';
    }
    /**
     * Strips quote characters surrounding the input.
     *
     * @param string $text Input text.
     * @return string Processed output.
     */
    function wpcf7_strip_quote(string $text): string
    {
        return '';
    }
    /**
     * Navigates through an array, object, or scalar, and
     * strips quote characters surrounding the each value.
     *
     * @param mixed $input The array or string to be processed.
     * @return mixed Processed value.
     */
    function wpcf7_strip_quote_deep(mixed $input): mixed {
        return $input;
    }
    /**
     * Normalizes newline characters.
     *
     * @param string $text Input text.
     * @param string $to Optional. The newline character that is used in the output.
     * @return string Normalized text.
     */
    function wpcf7_normalize_newline(string $text, string $to = "\n"): string
    {
        return '';
    }
    /**
     * Navigates through an array, object, or scalar, and
     * normalizes newline characters in the each value.
     *
     * @param mixed $input The array or string to be processed.
     * @param string $to Optional. The newline character that is used in the output.
     * @return mixed Processed value.
     */
    function wpcf7_normalize_newline_deep(mixed $input, string $to = "\n"): mixed { return $input; }
    /**
     * Strips newline characters.
     *
     * @param string $text Input text.
     * @return string Processed one-line text.
     */
    function wpcf7_strip_newline(string $text): string
    {
        return '';
    }
    /**
     * Canonicalizes text.
     *
     * @param string $text Input text.
     * @param string|array<string, mixed>|object $options Options.
     * @return string Canonicalized text.
     */
    function wpcf7_canonicalize(string $text, mixed $options = ''): string
    {
        return '';
    }
    /**
     * Returns a canonical keyword usable for a name or an ID purposes.
     *
     * @param string $text Input text.
     * @return string Canonicalized name.
     */
    function wpcf7_canonicalize_name(string $text): string {
        return '';
    }
    /**
     * Sanitizes Contact Form 7's form unit-tag.
     *
     * @param string $tag Unit-tag.
     * @return string Sanitized unit-tag.
     */
    function wpcf7_sanitize_unit_tag(string $tag): string
    {
        return '';
    }
    /**
     * Converts a file name to one that is not executable as a script.
     *
     * @param string $filename File name.
     * @return string Converted file name.
     */
    function wpcf7_antiscript_file_name(string $filename): string
    {
        return '';
    }
    /**
     * Masks a password with asterisks (*).
     *
     * @param string $text Password text.
     * @param int $right Length of right-hand unmasked text. Default 0.
     * @param int $left Length of left-hand unmasked text. Default 0.
     * @return string Text of masked password.
     */
    function wpcf7_mask_password(string $text, int $right = 0, int $left = 0): string
    {
        return '';
    }
    /**
     * Returns an array of allowed HTML tags and attributes for a given context.
     *
     * @param string $context Context used to decide allowed tags and attributes.
     * @return array<string, mixed> Array of allowed HTML tags and their allowed attributes.
     */
    function wpcf7_kses_allowed_html(string $context = 'form'): array
    {
        return array();
    }
    /**
     * Sanitizes content for allowed HTML tags for the specified context.
     *
     * @param string $input Content to filter.
     * @param string $context Context used to decide allowed tags and attributes.
     * @return string Filtered text with allowed HTML tags and attributes intact.
     */
    function wpcf7_kses(string $input, string $context = 'form'): string
    {
        return '';
    }
    /**
     * Returns a formatted string of HTML attributes.
     *
     * @param array $atts Associative array of attribute name and value pairs.
     * @return string Formatted HTML attributes.
     */
    function wpcf7_format_atts(array $atts): string
    {
        return '';
    }
    /**
     * Returns the regular expression pattern that represents
     * whitespace characters Unicode defines.
     *
     * @link https://www.unicode.org/Public/UCD/latest/ucd/PropList.txt
     *
     * @return string Regular expression pattern.
     */
    function wpcf7_get_unicode_whitespaces(): string
    {
        return '';
    }
    /**
     * Strips surrounding whitespaces.
     *
     * @link https://contactform7.com/2024/07/13/consistent-handling-policy-of-surrounding-whitespaces/
     *
     * @param string|array<int|string, mixed> $input Input text.
     * @param string $side The side from which whitespaces are stripped.
     *               'start', 'end', or 'both' (default).
     * @return string|array<int|string, mixed> Output text.
     */
    function wpcf7_strip_whitespaces(mixed $input, string $side = 'both'): string
    {
        return '';
    }
    /**
     * Returns path to a plugin file.
     *
     * @param string $path File path relative to the plugin root directory.
     * @return string Absolute file path.
     */
    function wpcf7_plugin_path(string $path = ''): string
    {
        return '';
    }
    /**
     * Returns the URL to a plugin file.
     *
     * @param string $path File path relative to the plugin root directory.
     * @return string URL.
     */
    function wpcf7_plugin_url(string $path = ''): string
    {
        return '';
    }
    /**
     * Include a file under WPCF7_PLUGIN_MODULES_DIR.
     *
     * @param string $path File path relative to the module dir.
     * @return bool True on success, false on failure.
     */
    function wpcf7_include_module_file(string $path): bool
    {
        return false;
    }
    /**
     * Retrieves uploads directory information.
     *
     * @param string|bool $type Optional. Type of output. Default false.
     * @return array<string, mixed>|string Information about the upload directory.
     */
    function wpcf7_upload_dir(mixed $type = false): array
    {
        return array();
    }
    /**
     * Verifies that a correct security nonce was used with time limit.
     *
     * @param string $nonce Nonce value that was used for verification.
     * @param string $action Optional. Context to what is taking place.
     *                       Default 'wp_rest'.
     * @return int|bool 1 if the nonce is generated between 0-12 hours ago,
     *                  2 if the nonce is generated between 12-24 hours ago.
     *                  False if the nonce is invalid.
     */
    function wpcf7_verify_nonce(string $nonce, string $action = 'wp_rest'): bool
    {
        return false;
    }
    /**
     * Creates a cryptographic token tied to a specific action, user, user session,
     * and window of time.
     *
     * @param string $action Optional. Context to what is taking place.
     *                       Default 'wp_rest'.
     * @return string The token.
     */
    function wpcf7_create_nonce(string $action = 'wp_rest'): string
    {
        return '';
    }
    /**
     * Converts multi-dimensional array to a flat array.
     *
     * @param mixed $input Array or item of array.
     * @return array Flatten array.
     */
    function wpcf7_array_flatten(mixed $input): array
    {
        return array();
    }
    /**
     * Excludes unset or blank text values from the given array.
     *
     * @param array $input The array.
     * @return array Array without blank text values.
     */
    function wpcf7_exclude_blank(mixed $input): array
    {
        return array();
    }
    /**
     * Creates a comma-separated list from a multi-dimensional array.
     *
     * @param mixed $input Array or item of array.
     * @param string|array $options Optional. Output options.
     * @return string Comma-separated list.
     */
    function wpcf7_flat_join(mixed $input, mixed $options = ''): string
    {
        return '';
    }
    /**
     * Returns true if HTML5 is supported.
     */
    function wpcf7_support_html5(): bool {
        return false;
    }
    /**
     * Returns true if HTML5 fallback is active.
     *
     * @return bool
     */
    function wpcf7_support_html5_fallback(): bool
    {
        return false;
    }
    /**
     * Returns true if the Really Simple CAPTCHA plugin is used for contact forms.
     *
     * @return bool
     */
    function wpcf7_use_really_simple_captcha(): bool
    {
        return false;
    }
    /**
     * Returns true if config validation is active.
     *
     * @return bool
     */
    function wpcf7_validate_configuration(): bool
    {
        return false;
    }
    /**
     * Returns true if wpcf7_autop() is applied.
     *
     * @param string|array<string, mixed> $options
     * @return bool
     */
    function wpcf7_autop_or_not(mixed $options = ''): bool
    {
        return false;
    }
    /**
     * Returns true if JavaScript for this plugin is loaded.
     *
     * @return bool
     */
    function wpcf7_load_js(): bool
    {
        return false;
    }
    /**
     * Returns true if CSS for this plugin is loaded.
     *
     * @return bool
     */
    function wpcf7_load_css(): bool
    {
        return false;
    }
    /**
     * Builds an HTML anchor element.
     *
     * @param string $url Link URL.
     * @param string $anchor_text Anchor label text.
     * @param string|array<string, mixed> $atts Optional. HTML attributes.
     * @return string Formatted anchor element.
     */
    function wpcf7_link(string $url, string $anchor_text, mixed $atts = ''): string
    {
        return '';
    }
    /**
     * Returns the current request URI.
     *
     * @return string
     */
    function wpcf7_get_request_uri(): string
    {
        return '';
    }
    /**
     * Registers post types used for this plugin.
     *
     * @return void
     */
    function wpcf7_register_post_types(): void {}
    /**
     * Returns the version string of this plugin.
     *
     * @param string|array<string, mixed> $options Optional. Output options.
     * @return string Version string.
     */
    function wpcf7_version(mixed $options = ''): string
    {
        return '';
    }
    /**
     * Returns array entries that match the given version.
     *
     * @param string $version The version to search for.
     * @param array<int|string, mixed> $input Search target array.
     * @return array<int|string, mixed>|bool Array of matched entries. False on failure.
     */
    function wpcf7_version_grep(string $version, array $input): array
    {
        return array();
    }
    /**
     * Returns an enctype attribute value.
     *
     * @param string $enctype Enctype value.
     * @return string Enctype value. Empty if not a valid enctype.
     */
    function wpcf7_enctype_value(string $enctype): string
    {
        return '';
    }
    /**
     * Removes directory recursively.
     *
     * @param string $dir Directory path.
     * @return bool True on success, false on failure.
     */
    function wpcf7_rmdir_p(string $dir): bool
    {
        return false;
    }
    /**
     * Builds a URL-encoded query string.
     *
     * @link https://developer.wordpress.org/reference/functions/_http_build_query/
     *
     * @param array<int|string, mixed> $data URL query parameters.
     * @param string $key Optional. If specified, used to prefix key name.
     * @return string Query string.
     */
    function wpcf7_build_query(array $data, string $key = ''): string
    {
        return '';
    }
    /**
     * Returns the number of code units in a string.
     *
     * @link http://www.w3.org/TR/html5/infrastructure.html#code-unit-length
     *
     * @param string $text Input string.
     * @return int|false The number of code units, or false if
     *                  mb_convert_encoding is not available.
     */
    function wpcf7_count_code_units(string $text): int
    {
        return 0;
    }
    /**
     * Returns true if WordPress is running on the localhost.
     *
     * @return bool
     */
    function wpcf7_is_localhost(): bool
    {
        return false;
    }
    /**
     * Marks a function as deprecated and informs when it has been used.
     *
     * @param string $function_name The function that was called.
     * @param string $version The version of Contact Form 7 that deprecated
     *                        the function.
     * @param string $replacement The function that should have been called.
     * @return void
     */
    function wpcf7_deprecated_function(string $function_name, string $version, string $replacement): void {}
    /**
     * Fires functions attached to a deprecated filter hook.
     *
     * @param string $hook_name The name of the filter hook.
     * @param array<int, mixed> $args Array of additional function arguments to be
     *                    passed to apply_filters().
     * @param string $version The version of Contact Form 7 that deprecated
     *                        the hook.
     * @param string $replacement The hook that should have been used.
     * @return mixed
     */
    function wpcf7_apply_filters_deprecated(string $hook_name, mixed $args, string $version, mixed $replacement = '') : mixed
    {
        return null;
    }
    /**
     * Marks something as being incorrectly called.
     *
     * @param string $function_name The function that was called.
     * @param string $message A message explaining what has been done incorrectly.
     * @param string $version The version of Contact Form 7 where the message
     *                        was added.
     * @return void
     */
    function wpcf7_doing_it_wrong(string $function_name, string $message, string $version): void {}
    /**
     * Triggers an error about a remote HTTP request and response.
     *
     * @param string $url The resource URL.
     * @param array<string, mixed> $request Request arguments.
     * @param array<string, mixed>|\WP_Error $response The response or WP_Error on failure.
     * @return void
     */
    function wpcf7_log_remote_request(string $url, array $request, $response): void {}
    /**
     * Anonymizes an IP address by masking local part.
     *
     * @param string $ip_addr The original IP address.
     * @return string|bool Anonymized IP address, or false on failure.
     */
    function wpcf7_anonymize_ip_addr(string $ip_addr): string
    {
        return '';
    }
    /**
     * Retrieves a sanitized value from the $_GET superglobal.
     *
     * @param string $key Array key.
     * @param mixed $default The default value returned when
     *              the specified superglobal is not set.
     * @return mixed Sanitized value.
     */
    function wpcf7_superglobal_get(string $key, mixed $default = ''): mixed {
        return null;
    }
    /**
     * Retrieves a sanitized value from the $_POST superglobal.
     *
     * @param string $key Array key.
     * @param mixed $default The default value returned when
     *              the specified superglobal is not set.
     * @return mixed Sanitized value.
     */
    function wpcf7_superglobal_post(string $key, mixed $default = ''): mixed {
        return null;
    }
    /**
     * Retrieves a sanitized value from the $_REQUEST superglobal.
     *
     * @param string $key Array key.
     * @param mixed $default The default value returned when
     *              the specified superglobal is not set.
     * @return mixed Sanitized value.
     */
    function wpcf7_superglobal_request(string $key, $default = ''): mixed {
        return null;
    }
    /**
     * Retrieves a sanitized value from the $_SERVER superglobal.
     *
     * @param string $key Array key.
     * @param mixed $default The default value returned when
     *              the specified superglobal is not set.
     * @return mixed Sanitized value.
     */
    function wpcf7_superglobal_server(string $key, $default = ''): mixed {
        return null;
    }
    /**
     * Retrieves a sanitized value from the specified superglobal.
     *
     * @param string $superglobal A superglobal type.
     * @param string $key Array key.
     * @return string|array<int|string, mixed>|null Sanitized value.
     */
    function wpcf7_superglobal(string $superglobal, string $key): null {
        return null;
    }
    /**
     * Retrieves an associative array of languages to which
     * this plugin is translated.
     *
     * @return array Array of languages.
     */
    function wpcf7_l10n(): array
    {
        return array();
    }
    /**
     * Returns true if the given locale code looks valid.
     *
     * @param string $locale Locale code.
     */
    /**
     * @return bool
     */
    function wpcf7_is_valid_locale(string $locale): bool
    {
        return false;
    }
    /**
     * Returns true if the given locale is an RTL language.
     */
    /**
     * @param string $locale
     * @return bool
     */
    function wpcf7_is_rtl(string $locale = ''): bool
    {
        return false;
    }
    /**
     * Loads a translation file into the plugin's text domain.
     *
     * @param string $locale Locale code.
     * @return bool True on success, false on failure.
     */
    function wpcf7_load_textdomain(string $locale = ''): bool
    {
        return false;
    }
    /**
     * Unloads translations for the plugin's text domain.
     *
     * @param bool $reloadable Whether the text domain can be loaded
     *             just-in-time again.
     * @return bool True on success, false on failure.
     */
    function wpcf7_unload_textdomain(bool $reloadable = \false): bool
    {
        return false;
    }
    /**
     * Switches translation locale, calls the callback, then switches back
     * to the original locale.
     *
     * @param string $locale Locale code.
     * @param callable $callback The callable to be called.
     * @param mixed $args Parameters to be passed to the callback.
     * @return mixed The return value of the callback.
     */
    function wpcf7_switch_locale(string $locale, callable $callback, ...$args): mixed {
        return null;
    }
    /**
     * Filter callback that applies auto-p to HTML email message body.
     * @param string $body
     * @return string
     */
    function wpcf7_mail_html_body_autop(string $body): string {
        return '';
    }
    /**
     * Replaces all mail-tags within the given text content.
     *
     * @param string $content Text including mail-tags.
     * @param string|array<string, mixed> $options Optional. Output options.
     * @return string Result of replacement.
     */
    function wpcf7_mail_replace_tags(string $content, $options = ''): string
    {
        return '';
    }
    /**
     * Adds custom properties to the PHPMailer object.
     */
    function wpcf7_phpmailer_init(\PHPMailer\PHPMailer\PHPMailer $phpmailer): void {}
    /**
     * All the functions and classes in this file are deprecated.
     * You should not use them. The functions and classes will be
     * removed in a later version.
     */
    /**
     * @param string $tag
     * @param callable $callback
     * @param bool $has_name
     * @return void
     */
    function wpcf7_add_shortcode(string $tag, callable $callback, bool $has_name = \false): void {}
    /**
     * @param string $tag
     * @return void
     */
    function wpcf7_remove_shortcode(string $tag): void {}
    /**
     * @param string $content
     * @return string
     */
    function wpcf7_do_shortcode(string $content): string
    {
        return '';
    }
    /**
     * @param array<string, mixed>|null $cond
     * @return array<int, mixed>
     */
    function wpcf7_scan_shortcode(?array $cond = \null): array
    {
        return array();
    }
    /**
     * Returns output string of a special mail-tag.
     *
     * @param string $output The string to be output.
     * @param string $name The tag name of the special mail-tag.
     * @param bool $html Whether the mail-tag is used in an HTML content.
     * @param WPCF7_MailTag $mail_tag An object representation of the mail-tag.
     * @return string Output of the given special mail-tag.
     */
    function wpcf7_special_mail_tag(string $output, string $name, bool $html, ?WPCF7_MailTag $mail_tag = \null): string
    {
        return '';
    }
    /**
     * Returns output string of a special mail-tag.
     *
     * @param string $output The string to be output.
     * @param string $name The tag name of the special mail-tag.
     * @param bool $html Whether the mail-tag is used in an HTML content.
     * @param WPCF7_MailTag $mail_tag An object representation of the mail-tag.
     * @return string Output of the given special mail-tag.
     */
    function wpcf7_post_related_smt(string $output, string $name, bool $html, ?WPCF7_MailTag $mail_tag = \null): string
    {
        return '';
    }
    /**
     * Returns output string of a special mail-tag.
     *
     * @param string $output The string to be output.
     * @param string $name The tag name of the special mail-tag.
     * @param bool $html Whether the mail-tag is used in an HTML content.
     * @param WPCF7_MailTag $mail_tag An object representation of the mail-tag.
     * @return string Output of the given special mail-tag.
     */
    function wpcf7_site_related_smt(string $output, string $name, bool $html, ?WPCF7_MailTag $mail_tag = \null): string
    {
        return '';
    }
    /**
     * Returns output string of a special mail-tag.
     *
     * @param string $output The string to be output.
     * @param string $name The tag name of the special mail-tag.
     * @param bool $html Whether the mail-tag is used in an HTML content.
     * @param WPCF7_MailTag $mail_tag An object representation of the mail-tag.
     * @return string Output of the given special mail-tag.
     */
    function wpcf7_user_related_smt(string $output, string $name, bool $html, ?WPCF7_MailTag $mail_tag = \null): string
    {
        return '';
    }
    /**
     * Returns an associative array of SWV rules.
     */
    function wpcf7_swv_available_rules(): array {
        return array();
    }
    /**
     * Loads SWV rules.
     *
     * @return void
     */
    function wpcf7_swv_load_rules(): void {}
    /**
     * Creates an SWV rule object.
     *
     * @param string $rule_name Rule name.
     * @param string|array $properties Optional. Rule properties.
     * @return \Contactable\SWV\Rule|null The rule object, or null if it failed.
     */
    function wpcf7_swv_create_rule(string $rule_name, $properties = ''): void {}
    /**
     * Returns an associative array of JSON Schema for Contact Form 7 SWV.
     *
     * @return array<string, mixed>
     */
    function wpcf7_swv_get_meta_schema(): array
    {
        return array();
    }
    /**
     * Runs functions necessary when upgrading from old plugin versions before 5.8.
     *
     * @since 5.8.0 New `_config_validation` post meta is introduced.
     */
    function wpcf7_upgrade_58(string $new_ver, string $old_ver): void {}
    /**
     * Converts old data in the dedicated database table to custom posts.
     *
     * @since 3.0.0 `wpcf7_contact_form` CPT is introduced.
     */
    function wpcf7_convert_to_cpt(string $new_ver, string $old_ver): void {}
    /**
     * Prepends an underscore to post meta keys.
     */
    function wpcf7_prepend_underscore(string $new_ver, string $old_ver): void {}
    /**
     * Checks whether a string is a valid NAME token.
     *
     * ID and NAME tokens must begin with a letter ([A-Za-z])
     * and may be followed by any number of letters, digits ([0-9]),
     * hyphens ("-"), underscores ("_"), colons (":"), and periods (".").
     *
     * @link http://www.w3.org/TR/html401/types.html#h-6.2
     * @param string $text
     * @return bool True if it is a valid name, false if not.
     */
    function wpcf7_is_name(string $text): bool
    {
        return false;
    }
    /**
     * Checks whether the given text is a well-formed email address.
     */
    /**
     * @param string $text
     * @return bool
     */
    function wpcf7_is_email(string $text): bool
    {
        return false;
    }
    /**
     * Checks whether the given text is a well-formed URL.
     */
    /**
     * @param string $text
     * @return bool
     */
    function wpcf7_is_url(string $text): bool
    {
        return false;
    }
    /**
     * Checks whether the given text is a well-formed telephone number.
     */
    /**
     * @param string $text
     * @return bool
     */
    function wpcf7_is_tel(string $text): bool
    {
        return false;
    }
    /**
     * Checks whether the given text is a well-formed number.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#number-state-(type=number)
     */
    /**
     * @param string $text
     * @return bool
     */
    function wpcf7_is_number(string $text): bool
    {
        return false;
    }
    /**
     * Checks whether the given text is a valid date.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#date-state-(type=date)
     */
    /**
     * @param string $text
     * @return bool
     */
    function wpcf7_is_date(string $text): bool
    {
        return false;
    }
    /**
     * Checks whether the given text is a valid time.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#time-state-(type=time)
     */
    /**
     * @param string $text
     * @return bool
     */
    function wpcf7_is_time(string $text): bool
    {
        return false;
    }
    /**
     * Checks whether the given text is a well-formed mailbox list.
     *
     * @param string|array $mailbox_list The subject to be checked.
     *                     Comma-separated string or an array of mailboxes.
     * @return array|bool Array of email addresses if all items are well-formed
     *                    mailbox, false if not.
     */
    /**
     * @return bool
     */
    function wpcf7_is_mailbox_list(string $mailbox_list): bool
    {
        return false;
    }
    /**
     * Checks whether an email address belongs to a domain.
     *
     * @param string $email A mailbox or a comma-separated list of mailboxes.
     * @param string $domain Internet domain name.
     * @return bool True if all of the email addresses belong to the domain,
     *              false if not.
     */
    /**
     * @return bool
     */
    function wpcf7_is_email_in_domain(string $email, string $domain): bool
    {
        return false;
    }
    /**
     * Checks whether an email address belongs to the site domain.
     */
    /**
     * @return bool
     */
    function wpcf7_is_email_in_site_domain(string $email): bool
    {
        return false;
    }
    /**
     * Verifies that a given file path is under the directories that WordPress
     * manages for user contents.
     *
     * Returns false if the file at the given path does not exist yet.
     *
     * @param string $path A file path.
     * @return bool True if the path is under the content directories,
     *              false otherwise.
     */
    /**
     * @return bool
     */
    function wpcf7_is_file_path_in_content_dir(string $path): bool
    {
        return false;
    }
    /**
     * Loads modules and registers WordPress shortcodes.
     */
    function wpcf7(): void {}
    /**
     * Registers post types for contact forms.
     */
    function wpcf7_init(): void {}
    /**
     * Upgrades option data when necessary.
     */
    function wpcf7_upgrade(): void {}
    /**
     * Callback tied to plugin activation action hook. Attempts to create
     * initial user dataset.
     */
    /**
     * @return void
     */
    function wpcf7_install(): void {}
    /**
     * @return void
     */
    function wpcf7_add_form_tag_acceptance(): void {}
    /**
     * @param WPCF7_FormTag $tag
     * @return string
     */
    function wpcf7_acceptance_form_tag_handler(\WPCF7_FormTag $tag): string
    {
        return '';
    }
    /**
     * @param WPCF7_Validation $result
     * @param WPCF7_FormTag $tag
     * @return WPCF7_Validation
     */
    function wpcf7_acceptance_validation_filter(\WPCF7_Validation $result, \WPCF7_FormTag $tag): \WPCF7_Validation
    {
        return $result;
    }
    /**
     * @param bool $accepted
     * @param WPCF7_Submission $submission
     * @return bool
     */
    function wpcf7_acceptance_filter(bool $accepted, WPCF7_Submission $submission): bool
    {
        return false;
    }
    /**
     * @param string $class_attr
     * @return string
     */
    function wpcf7_acceptance_form_class_attr(string $class_attr): string
    {
        return '';
    }
    /**
     * @return bool
     */
    function wpcf7_acceptance_as_validation(): bool
    {
        return false;
    }
    /**
     * @param string $replaced
     * @param mixed $submitted
     * @param bool $html
     * @param WPCF7_MailTag $mail_tag
     * @return string
     */
    function wpcf7_acceptance_mail_tag(string $replaced, mixed $submitted, bool $html, ?WPCF7_MailTag $mail_tag): string
    {
        return '';
    }
    /**
     * @return void
     */
    function wpcf7_add_tag_generator_acceptance(): void {}
    /**
     * @param WPCF7_ContactForm $contact_form
     * @param array<string, mixed> $options
     * @return void
     */
    function wpcf7_tag_generator_acceptance(WPCF7_ContactForm $contact_form, mixed $options): void {}
    /**
     * Registers the Akismet service.
     *
     * @return void
     */
    function wpcf7_akismet_register_service(): void {}
    /**
     * @param bool $spam
     * @param WPCF7_Submission $submission
     * @return bool
     */
    function wpcf7_akismet(bool $spam, WPCF7_Submission $submission): bool
    {
        return false;
    }
    /**
     * Returns true if Akismet is active and has a valid API key.
     *
     * @return bool
     */
    function wpcf7_akismet_is_available(): bool
    {
        return false;
    }
    /**
     * Returns an array of parameters based on the current form submission.
     * Returns false if Akismet is not active on the contact form.
     *
     * @return array<string, mixed>|false
     */
    function wpcf7_akismet_submitted_params(): bool
    {
        return false;
    }
    /**
     * Sends data to Akismet.
     *
     * @param array $comment Submission and environment data.
     * @return bool True if Akismet called it spam, or false otherwise.
     */
    function wpcf7_akismet_comment_check(array $comment): bool
    {
        return false;
    }
    /**
     * Removes Akismet-related properties from the posted data.
     *
     * This does not affect the $_POST variable itself.
     *
     * @link https://plugins.trac.wordpress.org/browser/akismet/tags/5.0/_inc/akismet-frontend.js
     *
     * @param array<string, mixed> $posted_data
     * @return array<string, mixed>
     */
    function wpcf7_akismet_posted_data(array $posted_data): array
    {
        return array();
    }
    /**
     * @param string $template
     * @param string $prop
     * @return string
     */
    function wpcf7_akismet_default_template(string $template, string $prop): string
    {
        return '';
    }
    /**
     * @return void
     */
    function wpcf7_add_form_tag_checkbox(): void {}
    /**
     * @param WPCF7_FormTag $tag
     * @return string
     */
    function wpcf7_checkbox_form_tag_handler(\WPCF7_FormTag $tag): string
    {
        return '';
    }
    /**
     * @param WPCF7_SWV_Schema $schema
     * @param WPCF7_ContactForm $contact_form
     * @return void
     */
    function wpcf7_swv_add_checkbox_rules(WPCF7_SWV_Schema $schema, WPCF7_ContactForm $contact_form): void {}
    /**
     * @param WPCF7_SWV_Schema $schema
     * @param WPCF7_ContactForm $contact_form
     * @return void
     */
    function wpcf7_swv_add_checkbox_enum_rules(WPCF7_SWV_Schema $schema, WPCF7_ContactForm $contact_form): void {}
    /**
     * @param mixed $value
     * @param mixed $value_orig
     * @param WPCF7_FormTag $form_tag
     * @return mixed
     */
    function wpcf7_posted_data_checkbox(mixed $value, mixed $value_orig, WPCF7_FormTag $form_tag): mixed
    {
        return $value;
    }
    /**
     * @return void
     */
    function wpcf7_add_tag_generator_checkbox_and_radio(): void {}
    /**
     * @param WPCF7_ContactForm $contact_form
     * @param array<string, mixed> $options
     * @return void
     */
    function wpcf7_tag_generator_checkbox(WPCF7_ContactForm $contact_form, mixed $options): void {}
    /**
     * Registers the Constant Contact service.
     *
     * @return void
     */
    function wpcf7_constant_contact_register_service(): void {}
    /**
     * @return void
     */
    function wpcf7_add_form_tag_count(): void {}
    /**
     * @param WPCF7_FormTag $tag
     * @return string
     */
    function wpcf7_count_form_tag_handler(\WPCF7_FormTag $tag): string
    {
        return '';
    }
    /**
     * @return void
     */
    function wpcf7_add_form_tag_date(): void {}
    /**
     * @param WPCF7_FormTag $tag
     * @return string
     */
    function wpcf7_date_form_tag_handler(\WPCF7_FormTag $tag): string
    {
        return '';
    }
    /**
     * @param WPCF7_SWV_Schema $schema
     * @param WPCF7_ContactForm $contact_form
     * @return void
     */
    function wpcf7_swv_add_date_rules(WPCF7_SWV_Schema $schema, WPCF7_ContactForm $contact_form): void {}
    /**
     * @param array<string, mixed> $messages
     * @return array<string, mixed>
     */
    function wpcf7_date_messages(array $messages): array
    {
        return array();
    }
    /**
     * @return void
     */
    function wpcf7_add_tag_generator_date(): void {}
    /**
     * @param WPCF7_ContactForm $contact_form
     * @param array<string, mixed> $options
     * @return void
     */
    function wpcf7_tag_generator_date(WPCF7_ContactForm $contact_form, mixed $options): void {}
    /**
     * @param bool $spam
     * @param WPCF7_Submission $submission
     * @return bool
     */
    function wpcf7_disallowed_list(bool $spam, WPCF7_Submission $submission): bool
    {
        return false;
    }
    /**
     * @param string $target
     * @return bool
     */
    function wpcf7_check_disallowed_list(string $target): bool
    {
        return false;
    }
    /**
     * @param string $target
     * @return bool
     */
    function wpcf7_blacklist_check(string $target): bool
    {
        return false;
    }
    /**
     * Starts a double opt-in session.
     */
    function wpcf7_doihelper_start_session(string $agent_name, mixed $args, &$token): void {}
    /**
     * @return void
     */
    function wpcf7_add_form_tag_file(): void {}
    function wpcf7_file_form_tag_handler(\WPCF7_FormTag $tag): string {
        return '';
    }
    function wpcf7_swv_add_file_rules(WPCF7_SWV_Schema $schema, WPCF7_ContactForm $contact_form): void {}
    /**
     * @param mixed $replaced
     * @param mixed $submitted
     * @param bool $html
     * @param \WPCF7_MailTag|null $mail_tag
     * @return void
     */
    function wpcf7_file_mail_tag(string $replaced, mixed $submitted, bool $html, ?WPCF7_MailTag $mail_tag): void {}
    /**
     * @return void
     */
    function wpcf7_add_tag_generator_file(): void {}
    function wpcf7_tag_generator_file(WPCF7_ContactForm $contact_form, mixed $options): void {}
    function wpcf7_flamingo_submit(\WPCF7_ContactForm $contact_form, array $result): void {}
    function wpcf7_flamingo_get_value(string $field, WPCF7_ContactForm $contact_form): void {}
    function wpcf7_flamingo_add_channel(string $slug, string $name = ''): void {}
    function wpcf7_flamingo_update_channel(WPCF7_ContactForm $contact_form): void {}
    /**
     * Returns output string of a special mail-tag.
     *
     * @param string $output The string to be output.
     * @param string $name The tag name of the special mail-tag.
     * @param bool $html Whether the mail-tag is used in an HTML content.
     * @param WPCF7_MailTag $mail_tag An object representation of the mail-tag.
     * @return string Output of the given special mail-tag.
     */
    function wpcf7_flamingo_serial_number(string $output, string $name, $html, ?WPCF7_MailTag $mail_tag = \null): string
    {
        return '';
    }
    /**
     * @return void
     */
    function wpcf7_add_form_tag_hidden(): void {}
    function wpcf7_hidden_form_tag_handler(\WPCF7_FormTag $tag): string {
        return '';
    }
    function wpcf7_listo(mixed $data, mixed $options, mixed $args): void {}
    /**
     * @return void
     */
    function wpcf7_add_form_tag_number(): void {}
    function wpcf7_number_form_tag_handler(\WPCF7_FormTag $tag): string {
        return '';
    }
    function wpcf7_swv_add_number_rules(WPCF7_SWV_Schema $schema, WPCF7_ContactForm $contact_form): void {}
    function wpcf7_number_messages(array $messages): array {
        return array();
    }
    /**
     * @return void
     */
    function wpcf7_add_tag_generator_number(): void {}
    function wpcf7_tag_generator_number(WPCF7_ContactForm $contact_form, mixed $options): void {}
    /**
     * @return void
     */
    function wpcf7_add_form_tag_quiz(): void {}
    function wpcf7_quiz_form_tag_handler(\WPCF7_FormTag $tag): string {
        return '';
    }
    function wpcf7_quiz_validation_filter(\WPCF7_Validation $result, \WPCF7_FormTag $tag): \WPCF7_Validation { return $result; }
    function wpcf7_quiz_ajax_refill(array $items): array {
        return array();
    }
    function wpcf7_quiz_messages(array $messages): array {
        return array();
    }
    /**
     * @return void
     */
    function wpcf7_add_tag_generator_quiz(): void {}
    /**
     * @param \WPCF7_ContactForm $contact_form
     * @param array<string, mixed> $options
     * @return void
     */
    function wpcf7_tag_generator_quiz(\WPCF7_ContactForm $contact_form, array $options): void {}
    /**
     * @return void
     */
    function wpcf7_add_form_tag_captcha(): void {}
    function wpcf7_captchac_form_tag_handler(\WPCF7_FormTag $tag): string {
        return '';
    }
    function wpcf7_captchar_form_tag_handler(\WPCF7_FormTag $tag): string {
        return '';
    }
    function wpcf7_captcha_validation_filter(\WPCF7_Validation $result, \WPCF7_FormTag $tag): \WPCF7_Validation { return $result; }
    function wpcf7_captcha_ajax_refill(array $items): array {
        return array();
    }
    function wpcf7_captcha_messages(array $messages): array {
        return array();
    }
    /**
     * @param string $page
     * @param string $action
     * @param \WPCF7_ContactForm $object
     * @return void
     */
    function wpcf7_captcha_display_warning_message(string $page, string $action, \WPCF7_ContactForm $object): void {}
    /**
     * @return void
     */
    function wpcf7_init_captcha(): void {}
    /**
     * Returns the directory path for Really Simple CAPTCHA files.
     *
     * @return string Directory path.
     */
    function wpcf7_captcha_tmp_dir(): string
    {
        return '';
    }
    function wpcf7_captcha_tmp_url(): void {}
    function wpcf7_captcha_url(string $filename): string {
        return '';
    }
    function wpcf7_generate_captcha(mixed $options = \null): void {}
    function wpcf7_check_captcha(string $prefix, string $response): void {}
    function wpcf7_remove_captcha(string $prefix): void {}
    function wpcf7_cleanup_captcha_files(): void {}
    function wpcf7_captchac_options(array $options): array {
        return array();
    }
    /**
     * Registers the reCAPTCHA service.
     */
    function wpcf7_recaptcha_register_service(): void {}
    /**
     * Enqueues frontend scripts for reCAPTCHA.
     */
    function wpcf7_recaptcha_enqueue_scripts(): void {}
    /**
     * Adds hidden form field for reCAPTCHA.
     */
    function wpcf7_recaptcha_add_hidden_fields(array $fields): void {}
    /**
     * Verifies reCAPTCHA token on the server side.
     */
    function wpcf7_recaptcha_verify_response(bool $spam, WPCF7_Submission $submission): void {}
    /**
     * Registers form-tag types for reCAPTCHA.
     */
    function wpcf7_recaptcha_add_form_tag_recaptcha(): void {}
    /**
     * Adds warnings for users upgrading from reCAPTCHA v2 to v3.
     */
    function wpcf7_upgrade_recaptcha_v2_v3(string $new_ver, string $old_ver): void {}
    /**
     * Adds filters and actions for warnings.
     */
    function wpcf7_admin_init_recaptcha_v2_v3(): void {}
    /**
     * Increments the admin menu counter for the Integration page.
     */
    function wpcf7_admin_menu_change_notice_recaptcha_v2_v3(array $counts): void {}
    /**
     * Prints warnings on the admin screen.
     */
    function wpcf7_admin_warnings_recaptcha_v2_v3(string $page, string $action, WPCF7_ContactForm $object): void {}
    /**
     * Registers reflection-related form-tag types.
     */
    /**
     * @return void
     */
    function wpcf7_add_form_tag_reflection(): void {}
    /**
     * The form-tag handler for the reflection type.
     */
    function wpcf7_reflection_form_tag_handler(\WPCF7_FormTag $tag): string {
        return '';
    }
    /**
     * The form-tag handler for the output type.
     */
    function wpcf7_output_form_tag_handler(\WPCF7_FormTag $tag): string {
        return '';
    }
    /**
     * @return void
     */
    function wpcf7_add_form_tag_response(): void {}
    function wpcf7_response_form_tag_handler(\WPCF7_FormTag $tag): string {
        return '';
    }
    /**
     * @return void
     */
    function wpcf7_add_form_tag_select(): void {}
    function wpcf7_select_form_tag_handler(\WPCF7_FormTag $tag): string {
        return '';
    }
    function wpcf7_swv_add_select_rules(WPCF7_SWV_Schema $schema, WPCF7_ContactForm $contact_form): void {}
    function wpcf7_swv_add_select_enum_rules(WPCF7_SWV_Schema $schema, WPCF7_ContactForm $contact_form): void {}
    /**
     * @return void
     */
    function wpcf7_add_tag_generator_menu(): void {}
    function wpcf7_tag_generator_menu(WPCF7_ContactForm $contact_form, mixed $options): void {}
    /**
     * Registers the sendinblue contact form property.
     */
    function wpcf7_sendinblue_register_property(array $properties, \WPCF7_ContactForm $contact_form): array {
        return array();
    }
    /**
     * Saves the sendinblue property value.
     */
    function wpcf7_sendinblue_save_contact_form(WPCF7_ContactForm $contact_form, mixed $args, string $context): void {}
    /**
     * Builds the editor panel for the sendinblue property.
     */
    function wpcf7_sendinblue_editor_panels(array $panels): array {
        return array();
    }
    /**
     * Retrieves contact lists from Brevo's database.
     */
    function wpcf7_sendinblue_get_lists(): void {}
    /**
     * Registers wpcf7_sendinblue as an agent.
     * @return void
     */
    function wpcf7_sendinblue_doi_register_agent(): void {}
    /**
     * Default optin_callback function.
     * @param array<string, mixed> $properties
     * @return bool
     */
    function wpcf7_sendinblue_doi_default_optin_callback(array $properties): bool {
        return false;
    }
    /**
     * Default email_callback function.
     * @param array<string, mixed> $args
     * @return string|false
     */
    function wpcf7_sendinblue_doi_default_email_callback(array $args): string {
        return '';
    }
    /**
     * Registers the Sendinblue service.
     * @return void
     */
    function wpcf7_sendinblue_register_service(): void {}
    /**
     * Callback to the wpcf7_submit action hook. Creates a contact
     * based on the submission.
     */
    function wpcf7_sendinblue_submit(\WPCF7_ContactForm $contact_form, array $result): void {}
    /**
     * Collects parameters for Sendinblue contact data based on submission.
     *
     * @return array Sendinblue contact parameters.
     */
    function wpcf7_sendinblue_collect_parameters(): array
    {
        return array();
    }
    /**
     * Registers the Stripe service.
     */
    function wpcf7_stripe_register_service(): void {}
    /**
     * Enqueues scripts and styles for the Stripe module.
     */
    function wpcf7_stripe_enqueue_scripts(): void {}
    /**
     * Skips the spam check if it is not necessary.
     *
     * @return bool True if the spam check is not necessary.
     */
    function wpcf7_stripe_skip_spam_check(bool $skip_spam_check, \WPCF7_Submission $submission): bool
    {
        return false;
    }
    /**
     * Verifies submitted Stripe Payment Intent ID.
     */
    function wpcf7_stripe_verify_payment_intent(bool $spam, WPCF7_Submission $submission): void {}
    /**
     * Creates Stripe's Payment Intent.
     */
    function wpcf7_stripe_before_send_mail(WPCF7_ContactForm $contact_form, &$abort, $submission): void {}
    /**
     * Returns payment link URL.
     *
     * @param string $pi_id Payment Intent ID.
     * @return string The URL.
     */
    function wpcf7_stripe_get_payment_link(string $pi_id): string
    {
        return '';
    }
    /**
     * Registers the [_stripe_payment_link] special mail-tag.
     */
    function wpcf7_stripe_smt(string $output, string $tag_name, bool $html, ?WPCF7_MailTag $mail_tag = \null): void {}
    /**
     * Adds Stripe-related meta data to Flamingo Inbound Message parameters.
     */
    function wpcf7_stripe_add_flamingo_inbound_message_params(mixed $args): void {}
    /**
     * Registers the stripe form-tag handler.
     */
    /**
     * @return void
     */
    function wpcf7_add_form_tag_stripe(): void {}
    /**
     * Defines the stripe form-tag handler.
     *
     * @return string HTML content that replaces a stripe form-tag.
     */
    function wpcf7_stripe_form_tag_handler(\WPCF7_FormTag $tag): string
    {
        return '';
    }
    /**
     * @return void
     */
    function wpcf7_add_form_tag_submit(): void {}
    function wpcf7_submit_form_tag_handler(\WPCF7_FormTag $tag): string {
        return '';
    }
    /**
     * @return void
     */
    function wpcf7_add_tag_generator_submit(): void {}
    function wpcf7_tag_generator_submit(WPCF7_ContactForm $contact_form, mixed $options): void {}
    /**
     * @return void
     */
    function wpcf7_add_form_tag_text(): void {}
    function wpcf7_text_form_tag_handler(\WPCF7_FormTag $tag): string {
        return '';
    }
    function wpcf7_swv_add_text_rules(WPCF7_SWV_Schema $schema, WPCF7_ContactForm $contact_form): void {}
    function wpcf7_text_messages(array $messages): array {
        return array();
    }
    /**
     * @return void
     */
    function wpcf7_add_tag_generator_text(): void {}
    function wpcf7_tag_generator_text(WPCF7_ContactForm $contact_form, mixed $options): void {}
    /**
     * @return void
     */
    function wpcf7_add_form_tag_textarea(): void {}
    function wpcf7_textarea_form_tag_handler(\WPCF7_FormTag $tag): string {
        return '';
    }
    function wpcf7_swv_add_textarea_rules(WPCF7_SWV_Schema $schema, WPCF7_ContactForm $contact_form): void {}
    /**
     * @return void
     */
    function wpcf7_add_tag_generator_textarea(): void {}
    function wpcf7_tag_generator_textarea(WPCF7_ContactForm $contact_form, mixed $options) : void {}
    /**
     * Registers the Turnstile service.
     */
    function wpcf7_turnstile_register_service() : void {}
    /**
     * Enqueues the Turnstile script.
     */
    function wpcf7_turnstile_enqueue_scripts() : void {}
    /**
     * Registers the Turnstile form-tag type.
     */
    /**
     * @return void
     */
    function wpcf7_add_form_tag_turnstile() : void {}
    /**
     * The Turnstile form-tag handler.
     */
    function wpcf7_turnstile_form_tag_handler(\WPCF7_FormTag $tag): string {
        return '';
    }
    /**
     * Prepends a Turnstile widget to the form content if the form template
     * does not include a Turnstile form-tag.
     */
    function wpcf7_turnstile_prepend_widget(mixed $content) : string {
        return '';
    }
    /**
     * Verifies the Turnstile response token.
     *
     * @param bool $spam The spam/ham status inherited from preceding callbacks.
     * @param WPCF7_Submission $submission The submission object.
     * @return bool True if the submitter is a bot, false if a human.
     */
    function wpcf7_turnstile_verify_response(bool $spam, \WPCF7_Submission $submission) : bool
    {
        return false;
    }
    /**
     * Passes response data from Turnstile siteverify API to Flamingo.
     */
    function wpcf7_flamingo_inbound_message_parameters_turnstile(array $params) : array {
        return array();
    }
    function wpcf7_delete_plugin() : bool {
        return false;
    }
}