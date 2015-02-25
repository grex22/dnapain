<?php
/*
Plugin Name: CardConnect Payment Processing
Plugin URI: http://mattkeys.me
Description: Handles card connect templates, and routing of responses after a payment is made
Author: Matt Keys
Version: 1.0
Author URI: http://mattkeys.me
*/

//Path to this file
if ( ! defined( 'CCPP_PLUGIN_FILE' ) ) {
	define( 'CCPP_PLUGIN_FILE', __FILE__ );
}

//Path to this file
if ( ! defined( 'CCPP_PLUGIN_DIR' ) ) {
	define( 'CCPP_PLUGIN_DIR', dirname( __FILE__ ) );
}

//Publicly Accessible path
if ( ! defined( 'CCPP_PUBLIC_PATH' ) ) {
	define( 'CCPP_PUBLIC_PATH', plugin_dir_url( __FILE__ ) );
}

require 'core/class-CCPP-Core.php';
