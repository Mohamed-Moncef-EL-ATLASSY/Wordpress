<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'         => array(
		'label' => esc_html__( 'Title', 'leven-shortcodes' ),
		'desc'  => esc_html__( 'Option Timeline Title', 'leven-shortcodes' ),
		'type'  => 'text',
	),
	'timeline' => array(
		'label'         => esc_html__( 'Timeline', 'leven-shortcodes' ),
		'popup-title'   => esc_html__( 'Add/Edit Timeline', 'leven-shortcodes' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit timeline.', 'leven-shortcodes' ),
		'type'          => 'addable-popup',
		'template'      => '{{=period}}',
		'popup-options' => array(
			'period'       => array(
				'label' => esc_html__( 'Period', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Enter the period', 'leven-shortcodes' ),
				'type'  => 'text',
			),
			'title'       => array(
				'label' => esc_html__( 'Title', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Enter the title', 'leven-shortcodes' ),
				'type'  => 'text',
			),
			'subtitle'       => array(
				'label' => esc_html__( 'Company', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Enter the company name', 'leven-shortcodes' ),
				'type'  => 'text',
			),
			'text'       => array(
				'label' => esc_html__( 'Text', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Enter the some text', 'leven-shortcodes' ),
				'type'  => 'textarea',
			),
			'logo'	=> array(
				'label' => esc_html__( 'Logo', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Upload a logo image.', 'leven-shortcodes' ),
				'type'  => 'upload'
			),
			'current' => array(
				'type'  => 'switch',
				'label'   => esc_html__( 'Current active period', 'leven-shortcodes' ),
				'desc'    => esc_html__( 'The period of the active period will be highlighted.', 'leven-shortcodes' ),
				'value'   => 'no',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__('Yes', 'leven-shortcodes'),
				),
				'left-choice' => array(
					'value' => 'no',
					'label' => esc_html__('No', 'leven-shortcodes'),
				),
			),
		)
	)
);