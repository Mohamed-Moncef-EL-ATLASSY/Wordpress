<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'checkbox' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'cf_checkbox_switcher' => array(
				'label'        => esc_html__( 'Show the Checkbox', 'leven-shortcodes' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'on',
					'label' => esc_html__( 'on', 'leven-shortcodes' )
				),
				'left-choice'  => array(
					'value' => 'off',
					'label' => esc_html__( 'off', 'leven-shortcodes' )
				),
				'value'        => 'off',
			)
		),
		'choices'      => array(
			'on' => array(
				'checkbox_text'	    => array(
					'label' => esc_html__( 'Checkbox Text', 'leven-shortcodes' ),
					'desc'  => esc_html__( 'Checkbox text. In this field you can use HTML tags, for example, you can add a link to any page.', 'leven-shortcodes' ),
					'type'  => 'text',
					'value' => '',
				),
				'checkbox_error'	=> array(
					'label' => esc_html__( 'Checkbox Error Text', 'leven-shortcodes' ),
					'desc'  => esc_html__( 'Checkbox error text.', 'leven-shortcodes' ),
					'type'  => 'text',
					'value' => '',
				),
				'checkbox_required' => array(
				    'type'  => 'switch',
				    'value' => 'on',
				    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
				    'label' => __('Mandatory', 'leven-shortcodes'),
				    'left-choice' => array(
				        'value' => 'off',
				        'label' => __('No', 'leven-shortcodes'),
				    ),
				    'right-choice' => array(
				        'value' => 'on',
				        'label' => __('Yes', 'leven-shortcodes'),
				    ),
				)
			),
		),
		'show_borders' => false,
	),
);