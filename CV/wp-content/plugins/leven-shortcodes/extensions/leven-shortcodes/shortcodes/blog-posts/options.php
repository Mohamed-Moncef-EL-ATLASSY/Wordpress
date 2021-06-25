<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'id' => array( 'type' => 'unique' ),
	'layout' => array(
		'label'   => esc_html__('Layout', 'leven-shortcodes'),
		'desc'    => esc_html__('Choose the layout type', 'leven-shortcodes'),
		'type'    => 'select',
		'value'   => 'two-columns',
		'choices' => array(
			'one-column'   => esc_html__('1 Column', 'leven-shortcodes'),
			'two-columns'   => esc_html__('2 Columns', 'leven-shortcodes'),
			'three-columns' => esc_html__('3 Columns', 'leven-shortcodes'),
		)
	),
	'number_of_posts' => array(
		'label'   => esc_html__('Number of posts to show', 'leven-shortcodes'),
		'type'    => 'text',
		'value' => '8',
	),
	'featured_image' => array(
	    'type'  => 'switch',
	    'value' => 'off',
	    'label' => __('Show only posts with featured image', 'leven-shortcodes'),
	    'left-choice' => array(
	        'value' => 'off',
	        'label' => __('Off', 'leven-shortcodes'),
	    ),
	    'right-choice' => array(
	        'value' => 'on',
	        'label' => __('On', 'leven-shortcodes'),
	    ),
	),
	'custom_button' => array(
		'label'   => esc_html__('Custom link for See All Posts button', 'leven-shortcodes'),
		'desc'    => esc_html__('Optional field. You can use the link to the page that will open when you click on the See All Posts button.', 'leven-shortcodes'),
		'type'    => 'text',
		'value' => '',
	),

);