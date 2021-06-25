<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'         => array(
		'label' => esc_html__( 'Title', 'leven-shortcodes' ),
		'desc'  => esc_html__( 'Option Skills Title', 'leven-shortcodes' ),
		'type'  => 'text',
	),
	'skills' => array(
		'label'         => esc_html__( 'Skill', 'leven-shortcodes' ),
		'popup-title'   => esc_html__( 'Add/Edit Skill', 'leven-shortcodes' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your skill.', 'leven-shortcodes' ),
		'type'          => 'addable-popup',
		'template'      => '{{=title}}',
		'popup-options' => array(
			'id'    => array(
				'type' => 'unique'
			),
			'title'       => array(
				'label' => esc_html__( 'Title', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Enter the title', 'leven-shortcodes' ),
				'type'  => 'text',
			),
			'value'       => array(
				'label' => esc_html__( 'Value', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Enter the value (%)', 'leven-shortcodes' ),
				'type'  => 'short-text',
			),
			'color' => array(
				'label' => esc_html__( 'Skill Color', 'leven-shortcodes' ),
				'type'  => 'color-picker',
				'value' => '#7066ff',
				'palettes' => array( '#7066ff', '#54ca95', '#55c0ce', '#fc6158', '#007ced', '#ff9638', '#ef5555', '#4a6583', '#0099e5', '#f8b732', '#10b9b2', '#ef5565' ),
				'desc'  => esc_html__( 'Select main color.', 'leven-shortcodes' ),
			),
		)
	)
);