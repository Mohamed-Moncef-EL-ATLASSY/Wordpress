<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'         => array(
		'label' => esc_html__( 'Title', 'leven-shortcodes' ),
		'desc'  => esc_html__( 'Option Social Title', 'leven-shortcodes' ),
		'type'  => 'text',
	),
	'social' => array(
		'label'         => esc_html__( 'Social Icons', 'leven-shortcodes' ),
		'popup-title'   => esc_html__( 'Add/Edit Social Icons', 'leven-shortcodes' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Social Icons.', 'leven-shortcodes' ),
		'type'          => 'addable-popup',
		'template'      => '{{=title}}',
		'popup-options' => array(
			'icon'    => array(
				'type'  => 'icon-v2',
				'label' => esc_html__('Choose an Icon', 'leven-shortcodes'),
			),
			'title'       => array(
				'label' => esc_html__( 'Title', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Enter the title', 'leven-shortcodes' ),
				'type'  => 'text',
			),
			'link'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Link', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Where should your link to?', 'leven-shortcodes' )
			),
			'target' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Open Link in New Window', 'leven-shortcodes' ),
				'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'leven-shortcodes' ),
				'right-choice' => array(
					'value' => '_blank',
					'label' => esc_html__( 'Yes', 'leven-shortcodes' ),
				),
				'left-choice'  => array(
					'value' => '_self',
					'label' => esc_html__( 'No', 'leven-shortcodes' ),
				),
			),
		)
	)
);