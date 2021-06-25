<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'id'     => array( 'type' => 'unique' ),
	'label'  => array(
		'label' => esc_html__( 'Button Label', 'leven' ),
		'desc'  => esc_html__( 'This is the text that appears on your button', 'leven' ),
		'type'  => 'text',
		'value' => 'Submit'
	),
	'link'   => array(
		'label' => esc_html__( 'Button Link', 'leven' ),
		'desc'  => esc_html__( 'Where should your button link to', 'leven' ),
		'type'  => 'text',
		'value' => '#'
	),
	'target' => array(
		'type'  => 'switch',
		'label'   => esc_html__( 'Open Link in New Window', 'leven' ),
		'desc'    => esc_html__( 'Select here if you want to open the linked page in a new window', 'leven' ),
		'right-choice' => array(
			'value' => '_blank',
			'label' => esc_html__('Yes', 'leven'),
		),
		'left-choice' => array(
			'value' => '_self',
			'label' => esc_html__('No', 'leven'),
		),
	),
	'btn_type'  => array(
		'label' => esc_html__( 'Button Type', 'leven' ),
		'desc'  => esc_html__( 'Select the button type', 'leven' ),
		'type'  => 'select',
		'value' => 'primary',
		'choices' => array(
            'primary'  => esc_html__( 'Primary Button', 'leven' ),
            'secondary'  => esc_html__( 'Secondary Button', 'leven' ),
		)
	),
	'margin_top'  => array(
		'label' => esc_html__( 'Margin Top', 'leven' ),
		'desc'  => esc_html__( 'Margin top in pixels. Example: 10', 'leven' ),
		'type'  => 'short-text',
		'value' => '0'
	),
	'margin_bottom'  => array(
		'label' => esc_html__( 'Margin Bottom', 'leven' ),
		'desc'  => esc_html__( 'Margin bottom in pixels. Example: 10', 'leven' ),
		'type'  => 'short-text',
		'value' => '0'
	),
);