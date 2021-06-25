<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'         => array(
		'label' => esc_html__( 'Title', 'leven-shortcodes' ),
		'desc'  => esc_html__( 'Option Info List Title', 'leven-shortcodes' ),
		'type'  => 'text',
	),
	'infolist' => array(
		'label'         => esc_html__( 'Info List', 'leven-shortcodes' ),
		'popup-title'   => esc_html__( 'Add/Edit Info List Item', 'leven-shortcodes' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Info List.', 'leven-shortcodes' ),
		'type'          => 'addable-popup',
		'template'      => '{{=title}}',
		'popup-options' => array(
			'title'       => array(
				'label' => esc_html__( 'Title', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Enter the title', 'leven-shortcodes' ),
				'type'  => 'text',
			),
			'text'       => array(
				'label' => esc_html__( 'Text', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Enter the some text', 'leven-shortcodes' ),
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