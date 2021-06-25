<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'icon'    => array(
		'type'  => 'icon-v2',
		'label' => esc_html__('Choose an Icon', 'leven-shortcodes'),
	),
	'title'   => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title of the Service', 'leven-shortcodes' ),
	),
	'content' => array(
		'type'  => 'text',
		'label' => esc_html__( 'Content', 'leven-shortcodes' ),
		'desc'  => esc_html__( 'Enter the desired content', 'leven-shortcodes' ),
	),
);