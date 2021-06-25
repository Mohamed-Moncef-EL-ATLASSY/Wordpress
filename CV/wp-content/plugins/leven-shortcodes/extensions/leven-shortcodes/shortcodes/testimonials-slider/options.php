<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'id' => array( 'type' => 'unique' ),
	'title'         => array(
		'label' => esc_html__( 'Title', 'leven-shortcodes' ),
		'desc'  => esc_html__( 'Option Testimonials Title', 'leven-shortcodes' ),
		'type'  => 'text',
	),
	'testimonials_style' => array(
	    'type'  => 'select',
	    'value' => 'second-style',
	    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
	    'label' => __('Testimonials Style', 'leven'),
	    'choices' => array(
	        'first-style' => __('Style 1', 'leven'),
	        'second-style' => __('Style 2', 'leven'),
	    ),
	    'no-validate' => false,
	),
	'testimonials_slider' => array(
		'label'         => esc_html__( 'Testimonials', 'leven-shortcodes' ),
		'popup-title'   => esc_html__( 'Add/Edit Testimonial', 'leven-shortcodes' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Testimonials.', 'leven-shortcodes' ),
		'type'          => 'addable-popup',
		'template'      => '{{=author_name}}',
		'popup-options' => array(
			'content'       => array(
				'label' => esc_html__( 'Quote', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Enter the testimonial here', 'leven-shortcodes' ),
				'type'  => 'textarea',
			),
			'author_avatar' => array(
				'label' => esc_html__( 'Image', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'leven-shortcodes' ),
				'type'  => 'upload',
			),
			'author_name'   => array(
				'label' => esc_html__( 'Name', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Enter the Name of the Person to quote', 'leven-shortcodes' ),
				'type'  => 'text'
			),
			'author_company'   => array(
				'label' => esc_html__( 'Company', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Enter the Company Name', 'leven-shortcodes' ),
				'type'  => 'text'
			),
			'site_url'      => array(
				'label' => esc_html__( 'Website Link', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Link to the Persons website', 'leven-shortcodes' ),
				'type'  => 'text'
			)
		)
	),
	'items'         => array(
		'label' => esc_html__( 'Items on the front: Desktop', 'leven-shortcodes' ),
		'desc'  => esc_html__( 'Example: 2', 'leven-shortcodes' ),
		'type'  => 'text',
		'value' => '3'
	),
	'items_tablet'         => array(
		'label' => esc_html__( 'Items on the front: Tablet', 'leven-shortcodes' ),
		'desc'  => esc_html__( 'Example: 2', 'leven-shortcodes' ),
		'type'  => 'text',
		'value' => '2'
	),
	'items_mobile'         => array(
		'label' => esc_html__( 'Items on the front: Mobile', 'leven-shortcodes' ),
		'desc'  => esc_html__( 'Example: 2', 'leven-shortcodes' ),
		'type'  => 'text',
		'value' => '1'
	)
);