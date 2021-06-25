<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'         => array(
		'label' => esc_html__( 'Title', 'leven-shortcodes' ),
		'desc'  => esc_html__( 'Option Contact Form 2 Title', 'leven-shortcodes' ),
		'type'  => 'text',
	),
	'contact_form_pro' => array(
		'label'         => esc_html__( 'Contact Form Elements', 'leven-shortcodes' ),
		'popup-title'   => esc_html__( 'Add/Edit Contact Form Elements', 'leven-shortcodes' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Contact Form 2 elements.', 'leven-shortcodes' ),
		'type'          => 'addable-popup',
		'template'      => '{{=title}}',
		'popup-options' => array(
			'element_type'    => array(
			    'type'  => 'radio',
			    'value' => 'text',
			    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
			    'label' => __('Element Type', 'leven-shortcodes'),
			    'desc'  => __('The type of the form element.', 'leven-shortcodes'),
			    'choices' => array(
			        'text' => __('Text Input', 'leven-shortcodes'),
			        'textarea' => __('Textarea', 'leven-shortcodes'),
			        'email' => __('E-Mail', 'leven-shortcodes'),
			        'phone' => __('Phone', 'leven-shortcodes'),
			        'checkbox' => __('Checkbox', 'leven-shortcodes'),
			    ),
			    'inline' => false,
			),
			'title'       => array(
				'label' => esc_html__( 'Title', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Enter the title', 'leven-shortcodes' ),
				'type'  => 'text',
			),
			'icon'    => array(
				'type'  => 'icon-v2',
				'label' => esc_html__('Choose an Icon', 'leven-shortcodes'),
			),
			'error_message'       => array(
				'label' => esc_html__( 'Error Message', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Enter the error message', 'leven-shortcodes' ),
				'type'  => 'text',
			),
			'required'       => array(
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
		)
	),
	'submit_btn_text'         => array(
		'label' => esc_html__( 'Submit Button Text', 'leven-shortcodes' ),
		'type'  => 'text',
		'value' => esc_html__( 'Submit', 'leven-shortcodes' ),
	),
);