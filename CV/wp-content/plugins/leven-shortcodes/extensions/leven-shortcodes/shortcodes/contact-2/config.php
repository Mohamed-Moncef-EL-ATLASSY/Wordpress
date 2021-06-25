<?php if (!defined('FW')) die('Forbidden');
if ( function_exists( 'leven_contact_action' ) ) {
    $cfg = array(
    	'page_builder' => array(
    		'title'       => esc_html__( 'Contact Form 2', 'leven-shortcodes' ),
    		'description' => esc_html__( 'Contact Form 2', 'leven-shortcodes' ),
    		'tab'         => esc_html__( 'Leven Elements', 'leven-shortcodes' ),
    	)
    );
}
