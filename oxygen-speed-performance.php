<?php

namespace OSP;


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*
Plugin Name: Oxygen Speed Performance
Plugin URI: https://webwolf.dev/
Description: Speed up your website with a simple script.
Version: 1.0
Author: Web Wolf [ Kamil Łazarz ]
Author URI: https://webwolf.dev/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Requires PHP: 7.4
*/


define( 'OSP_PLUGIN_PATH', plugin_dir_path(__FILE__) );
define( 'OSP_PLUGIN_URL', plugin_dir_url(__FILE__) );

require_once "App/boostrap.php";

App::instance();
