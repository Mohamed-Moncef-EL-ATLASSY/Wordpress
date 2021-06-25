<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$options = array(
	'id' => array( 'type' => 'unique' ),
	'padding_group' => array(
		'type' => 'group',
		'options' => array(
			'html_label'  => array(
				'type'  => 'html',
				'value' => '',
				'label' => esc_html__('Additional Spacing', 'leven'),
				'html'  => '',
			),
			'padding_top'  => array(
				'label'   => false,
				'desc'    => esc_html__( 'padding top', 'leven' ),
				'type'  => 'short-text',
				'value' => '0',
			),
			'padding_right'  => array(
				'label'   => false,
				'desc'    => esc_html__( 'padding right', 'leven' ),
				'type'  => 'short-text',
				'value' => '0',
			),
			'padding_bottom'  => array(
				'label'   => false,
				'desc'    => esc_html__( 'padding bottom', 'leven' ),
				'type'  => 'short-text',
				'value' => '0',
			),
			'padding_left'  => array(
				'label'   => false,
				'desc'    => esc_html__( 'padding left', 'leven' ),
				'type'  => 'short-text',
				'value' => '0',
			),
		)
	),
	'tablet'  => array(
		'label' => esc_html__( 'Responsive Layout for Tablet', 'leven' ),
		'desc'  => esc_html__( 'Choose the responsive tablet display for this column', 'leven' ),
		'help'  => esc_html__( 'Use this option in order to control how this column behaves on tablets (and devices with the resoution between 768px - 990px). Note that on phones all the columns are 1/1 by default.', 'leven' ),
		'type'  => 'select',
		'value' => '',
		'choices' => array(
			''             => esc_html__( 'Automatically inherit default layout', 'leven' ),
            'fw-col-sm-2'  => esc_html__( 'Make it a 1/6 column', 'leven' ),
            'fw-col-sm-3'  => esc_html__( 'Make it a 1/4 column', 'leven' ),
            'fw-col-sm-4'  => esc_html__( 'Make it a 1/3 column', 'leven' ),
            'fw-col-sm-6'  => esc_html__( 'Make it a 1/2 column', 'leven' ),
            'fw-col-sm-8'  => esc_html__( 'Make it a 2/3 column', 'leven' ),
            'fw-col-sm-9'  => esc_html__( 'Make it a 3/4 column', 'leven' ),
            'fw-col-sm-12' => esc_html__( 'Make it a 1/1 column', 'leven' ),
		)
	),
	'class'  => array(
		'label' => esc_html__( 'Custom Class', 'leven' ),
		'desc'  => esc_html__( 'Enter custom CSS class', 'leven' ),
		'help'  => esc_html__( 'You can use this class to further style this shortcode by adding your custom CSS.', 'leven' ),
		'type'  => 'text',
		'value' => '',
	),
);