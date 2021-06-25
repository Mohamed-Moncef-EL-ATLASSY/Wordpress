<?php
/*
Plugin Name: Leven Shortcodes
Plugin URI: http://lmpixels.com
Description: Leven Theme Shortcodes
Author: LMPixels
Version: 1.5.1
*/

add_action( 'plugins_loaded', 'leven_shortcodes_textdomain' );

function leven_shortcodes_textdomain() {
    load_plugin_textdomain( 'leven-shortcodes', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}

function leven_filter_plugin_shortcodes($locations) {
	$locations[
		dirname(__FILE__) . '/extensions'
	] = plugin_dir_url( __FILE__ ) . 'extensions';

	return $locations;
}

add_filter('fw_extensions_locations', 'leven_filter_plugin_shortcodes');
