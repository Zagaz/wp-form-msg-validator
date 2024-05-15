<?php
/*
Plugin Name: Form Message Validator
Description: A custom contact form plugin for WordPress.
Version: 1.0
Author: André Ranulfo
Author URI: https://www.linkedin.com/in/andre-ranulfo/
Plugin URI: 
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! defined( 'WPINC' ) ) {
    exit;
}

define ('FMV_PLUGIN_DIR', plugin_dir_path(__FILE__));
define ('FMV_JS', plugin_dir_url(__FILE__) . 'assets/js/');
define ('FMV_CSS', plugin_dir_url(__FILE__) . 'assets/css/');

// get the page url


require (FMV_PLUGIN_DIR . 'includes/fmv_main.php');

