<?php

/**
 * Check if we're
 * viewing from
 * local machine
 */
function is_localhost() {

    $hosts = array(
        '127.0.0.1',
        '::1',
        'localhost'
    );

    if (in_array($_SERVER['REMOTE_ADDR'], $hosts)) {
        return true;
    } else {
        return false;
    }

}

/**
 * Check page
 * Returns true is
 * current page matches
 * $id
 *
 * Will check for homepage
 * if no argument
 */
function is_page($id = null) {

    $id = (is_null($id) ? 'homepage' : $id);

    if ($id == get_page()) {
        return true;
    } else {
        return false;
    }

}

/**
 * Check to see if
 * current page is
 * homepage
 */
function is_home() {
    return (is_page() ? true : false);
}

/**
 * Get Current Page
 */
function get_page() {

    // Get path
    global $path;

    // Remove slashes
    $uri = str_replace('/', '-', ltrim($path, '/'));

    // Get page URI
    if ($uri == '') {
        $page = 'index';
    } else {
        $page = $uri;
    }

    return $page;

}

/**
 * Get current year for
 * copyright notice
 */
function this_year($value = null) {

    if ($value === null) {
        echo date('Y');
    } elseif ($value === true) {
        return date('Y');
    } else {
        echo 'Invalid value argument';
    }

}

/**
 * Check to see if
 * date and time have passed
 *
 * Date format: ddmmyyyy
 * Time format: hhmm
 */
function has_expired($date, $time = null) {

    // Set time
    if (is_null($time))
        $time = '00:00';

    // Set time and date
    $exp = $date . $time;

    if (date('dmYHi') >= $exp) {
        return true;
    } else {
        return false;
    }

}

/** --------------------------------- *
 * Template Helper Functions          *
 * --------------------------------- **/

/**
 * Site Assets
 *
 * Returns assets directory
 */
function assets_dir($val = null) {

    $return = '/'. THEME_DIR .'/'. SITE_THEME .'/'. THEME_ASSETS;
    if ($val == 'value') {
        return $return;
    } else {
        echo $return;
    }

}

/**
 * Template exists
 *
 * Check to see if specified
 * template file exists in current
 * theme
 */
function template_exists($file) {

    $template = THEME_DIR .'/'. SITE_THEME .'/'. $file . THEME_TPL_EXT;
    return (file_exists($template) ? true : false);

}

/**
 * Part exists
 *
 * Check to see if specified
 * partial file exists in current
 * theme
 */
function part_exists($file) {

    $template = THEME_INC .'/'. $file;
    return ( template_exists($template) ? true : false);

}

?>
