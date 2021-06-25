<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$template_directory = get_template_directory_uri();
$options = array(
	'text_align' => array(
		'label' => esc_html__( 'Text Alignment', 'leven-shortcodes' ),
		'desc'  => esc_html__( 'Select the prefered text alignment', 'leven-shortcodes' ),
		'type'  => 'image-picker',
		'value' => '',
		'choices' => array(
			'fw-quote-left' => array(
				'small' => array(
					'height' => 50,
					'src' => $template_directory .'/images/image-picker/left-position.jpg',
					'title' => esc_html__('Left', 'leven-shortcodes')
				),
			),
			'fw-quote-center' => array(
				'small' => array(
					'height' => 50,
					'src' => $template_directory .'/images/image-picker/center-position.jpg',
					'title' => esc_html__('Center', 'leven-shortcodes')
				),
			),
			'fw-quote-right' => array(
				'small' => array(
					'height' => 50,
					'src' => $template_directory .'/images/image-picker/right-position.jpg',
					'title' => esc_html__('Right', 'leven-shortcodes')
				),
			),
		),
	),
	'text'  => array(
		'label'   => esc_html__( 'Text', 'leven-shortcodes' ),
		'desc'    => esc_html__( 'Enter quote text', 'leven-shortcodes' ),
		'value'   => '',
		'type'    => 'wp-editor',
	),
    'text_group' => array(
        'type' => 'group',
        'options' => array(
            'author'  => array(
                'label' => esc_html__( 'Author', 'leven-shortcodes' ),
                'desc'  => esc_html__( 'Enter the quote author', 'leven-shortcodes' ),
                'type'  => 'text',
                'value' => ''
            ),
            'author_link'   => array(
                'label' => esc_html__( 'Link', 'leven-shortcodes' ),
                'desc'  => esc_html__( 'Enter the author link', 'leven-shortcodes' ),
                'type'  => 'text',
                'value' => ''
            ),
        )
    ),
	'font_size' => array(
		'label' => esc_html__( 'Font Size', 'leven-shortcodes' ),
		'desc'  => esc_html__( 'Select font size', 'leven-shortcodes' ),
		'attr'  => array( 'class' => 'fw-checkbox-float-left' ),
		'type'  => 'radio',
		'value' => 'fw-quote-md',
		'choices' => array(
			'fw-quote-sm' => esc_html__( 'Small', 'leven-shortcodes' ),
			'fw-quote-md' => esc_html__( 'Medium', 'leven-shortcodes' ),
			'fw-quote-lg' => esc_html__( 'Large', 'leven-shortcodes' ),
		),
	),
	'class'  => array(
		'label' => esc_html__( 'Custom Class', 'leven-shortcodes' ),
		'desc'  => esc_html__( 'Enter custom CSS class', 'leven-shortcodes' ),
		'type'  => 'text',
		'value' => '',
		'help'  => esc_html__( 'You can use this class to further style this shortcode by adding your custom CSS.', 'leven-shortcodes' ),
	),
);