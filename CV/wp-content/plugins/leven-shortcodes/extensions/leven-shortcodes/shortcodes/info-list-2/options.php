<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'         => array(
		'label' => esc_html__( 'Title', 'leven-shortcodes' ),
		'desc'  => esc_html__( 'Option Info List Title', 'leven-shortcodes' ),
		'type'  => 'text',
	),
	'infolist_with_icons' => array(
		'id' => array( 'type' => 'unique' ),
		'label'         => esc_html__( 'Info List', 'leven-shortcodes' ),
		'popup-title'   => esc_html__( 'Add/Edit Info List Item', 'leven-shortcodes' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Info List.', 'leven-shortcodes' ),
		'type'          => 'addable-popup',
		'template'      => '{{=title}}',
		'popup-options' => array(
			'icon'    => array(
				'type'  => 'icon-v2',
				'label' => esc_html__('Choose an Icon', 'leven-shortcodes'),
			),
			'title'       => array(
				'label' => esc_html__( 'Title', 'leven-shortcodes' ),
				'type'  => 'text',
			),
			'text'       => array(
				'label' => esc_html__( 'Text', 'leven-shortcodes' ),
				'type'  => 'textarea',
			),
		)
	)
);