<?php

session_start();

/******************
 **
 ** Hey :)
 **
 ** This page is simply used
 ** to route requests and load
 ** the necassary PHP resources.
 **
 ** If you need to make changes,
 ** you can access specific pages
 ** by going to the /theme folder
 **
 ** NOTE: Content changes will
 ** most likely need to be made
 ** from the /content folder.
 **
 ******************/

use Theme\Theme;

/**
 * Set Path
 */
$path = (isset($_GET['path']) ? rtrim($_GET['path'], '/') : 'homepage');
$index = explode('/', $path);

/**
 * Include functions & classes
 */
require_once('scripts/includes.php');

/**
 * Turn on error reporting
 * if we're on localhost
 */
//if ( is_localhost() ) {
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
//}

/**
 * Instantiate theme
 */
$theme = new Theme(array('variables' => $_));

/**
 * Include theme
 */
if ($path != 'homepage') {
    $file = str_replace('/', '-', $path);
    $theme->get_template($file);
} else {
    $theme->get_template('homepage');
}

?>
