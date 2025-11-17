<?php
/**
 * Type annotations for Contact Form 7 stubs.
 * 
 * This file provides additional type information and constants for Contact Form 7
 * that are not present in the auto-generated stubs. Include this file in your PHPStan
 * configuration alongside the main stub file for better type coverage.
 * 
 * @see https://wordpress.org/plugins/contact-form-7/
 * @see https://github.com/miguelcolmenares/cf7-stubs
 */

namespace {
    
    /**
     * Contact Form 7 Constants
     */
    if (!defined('WPCF7_VERSION')) {
        define('WPCF7_VERSION', '6.1.3');
    }
    
    if (!defined('WPCF7_PLUGIN_BASENAME')) {
        define('WPCF7_PLUGIN_BASENAME', 'contact-form-7/wp-contact-form-7.php');
    }
    
    if (!defined('WPCF7_PLUGIN_NAME')) {
        define('WPCF7_PLUGIN_NAME', 'Contact Form 7');
    }
    
    if (!defined('WPCF7_PLUGIN_URL')) {
        define('WPCF7_PLUGIN_URL', 'https://contactform7.com/');
    }
    
    /**
     * File size constants used in CF7
     */
    if (!defined('KB_IN_BYTES')) {
        define('KB_IN_BYTES', 1024);
    }
    
    if (!defined('MB_IN_BYTES')) {
        define('MB_IN_BYTES', 1048576);
    }
    
    if (!defined('GB_IN_BYTES')) {
        define('GB_IN_BYTES', 1073741824);
    }
}
