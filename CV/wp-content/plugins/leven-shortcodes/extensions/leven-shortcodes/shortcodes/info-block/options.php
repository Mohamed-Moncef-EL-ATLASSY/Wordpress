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
		'label' => esc_html__( 'Title', 'leven-shortcodes' ),
	),
	'content' => array(
		'type'  => 'textarea',
		'label' => esc_html__( 'Highlighted Content', 'leven-shortcodes' ),
	),
	'text' => array(
		'type'  => 'textarea',
		'label' => esc_html__( 'Text', 'leven-shortcodes' ),
	),
	'style'   => array(
		'type'    => 'select',
		'label'   => esc_html__('Box Style', 'leven-shortcodes'),
		'choices' => array(
			'gray-default' => esc_html__('Default Background', 'leven-shortcodes'),
			'gray-bg' => esc_html__('Gray Background', 'leven-shortcodes')
		)
	),
);