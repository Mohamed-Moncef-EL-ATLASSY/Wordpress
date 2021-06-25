<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'image_slider' => array(
		'label'         => esc_html__( 'Image Slider', 'leven-shortcodes' ),
		'popup-title'   => esc_html__( 'Add/Edit Image Slider Item', 'leven-shortcodes' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Image Slider.', 'leven-shortcodes' ),
		'type'          => 'addable-popup',
		'template'      => '{{=title}}',
		'popup-options' => array(
			'id' => array( 'type' => 'unique' ),
			'img'    => array(
				'type'  => 'upload',
			    'value' => array(),
			    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
			    'label' => __('Add Image', 'leven-shortcodes'),
			    'images_only' => true,
			),
			'title'       => array(
				'label' => esc_html__( 'Title', 'leven-shortcodes' ),
				'type'  => 'text',
			)
		)
	)
);