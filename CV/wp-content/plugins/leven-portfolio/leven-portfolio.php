<?php
/*
Plugin Name: Leven Portfolio
Plugin URI: http://lmpixels.com
Description: Leven Theme Portfolio
Author: LMPixels
Version: 1.0.0
*/

add_action( 'plugins_loaded', 'leven_portfolio_textdomain' );

function leven_portfolio_textdomain() {
    load_plugin_textdomain( 'leven-portfolio', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}

if( ! function_exists( 'leven_filter_portfolio_extension' ) ){
    function leven_filter_portfolio_extension($locations) {
    	$locations[
    		dirname(__FILE__) . '/extensions'
    	] = plugin_dir_url( __FILE__ ) . 'extensions';

    	return $locations;
    }
}
add_filter('fw_extensions_locations', 'leven_filter_portfolio_extension');