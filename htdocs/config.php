<?php

/**
 * Theme & Content
 */
define('SITE_THEME', 'default'); // For new projects, default is usually fine

/**
 * Global Theme Settings
 */
define('THEME_DIR', 'theme'); // Base directory
define('THEME_INC', 'partials'); // Theme include directory
define('THEME_ASSETS', 'assets'); // Theme assets directory
define('THEME_TPL_EXT', '.php'); // Template file extension

/**
 * Site Settings
 */
define('SITE_DOMAIN', 'http://www.domain.co.uk'); // Full domain name including http://
define('SITE_NAME', 'Website'); // Website / Company name
define('SITE_PHONE', '01234 567 890'); // Primary phone number
define('SITE_EMAIL', 'chris@galbraith.eu'); // Primary email
define('SITE_ADDRESS', ''); // Physical address, formatted: 123 Street Name, Town, County, Postcode

define('SITE_ANALYTICS', ''); // Google Analytics ID

/**
 * Contact Form Settings
 */
define('FORM_THEME', 'email');
define('FORM_VERIFY_TOKEN', 'emjd3mwZv9BC');
define('FORM_VERIFY_SERVER', 'http://www.searchitlocal.co.uk');
define('FORM_EMAIL', SITE_EMAIL);
define('FORM_SUBJECT', 'New message from your website');
define('FORM_RESPONDER', true);
define('FORM_RESPONDER_SUBJECT', 'Thanks for contacting '. SITE_NAME);
define('FORM_SUCCESS_MESSAGE', 'Thank you, your message has been sent.');
define('FORM_FAILURE_MESSAGE', 'Sorry, something went wrong.');
