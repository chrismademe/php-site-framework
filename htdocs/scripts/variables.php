<?php

// Global Variables
$_['name'] = SITE_NAME;
$_['phone'] = SITE_PHONE;
$_['email'] = SITE_EMAIL;
$_['address'] = SITE_ADDRESS;
$_['domain'] = SITE_DOMAIN;

// Useful variables
$_['path'] = $path;                     // Path as it comes (e.g. services/design)
$_['slug'] = get_page();                // Formatted page ID (e.g. services-design)

/** ----------------------------------- **
 * Default page meta is set here but     *
 * should be overridden in your          *
 * theme files. Access the array using   *
 * $this->page from your template. See   *
 * the default homepage for an example.  *
 ** ----------------------------------- **/

// Page meta data
$_['meta'] = array(

    // Default - set to whichever page we're on
    $_['slug'] => array(
        'title' => SITE_NAME,
        'description' => 'Description',
        'keywords' => 'Keywords',
        'canonical' => 'Canonical'
    )

);

// Set $this->page based on slug
$_['page'] = $_['meta'][$_['slug']];
