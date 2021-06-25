<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'id' => array( 'type' => 'unique' ),
	'title' => array(
		'label'   => esc_html__('Title', 'leven-shortcodes'),
		'desc'    => esc_html__('Write some text', 'leven-shortcodes'),
		'type'    => 'text',
	),
	'subtitle' => array(
		'label'   => esc_html__('Subtitle', 'leven-shortcodes'),
		'desc'    => esc_html__('Write some text', 'leven-shortcodes'),
		'type'    => 'text',
	),
	'layout' => array(
		'label'   => esc_html__('Layout', 'leven-shortcodes'),
		'desc'    => esc_html__('Choose the layout type', 'leven-shortcodes'),
		'type'    => 'select',
		'value'   => 'two-columns',
		'choices' => array(
			'two-columns'   => esc_html__('2 Columns', 'leven-shortcodes'),
			'three-columns' => esc_html__('3 Columns', 'leven-shortcodes'),
			'four-columns' => esc_html__('4 Columns', 'leven-shortcodes'),
			'five-columns' => esc_html__('5 Columns', 'leven-shortcodes'),
		)
	),
	'categories' => array(
	    'type'  => 'multi-select',
	    'value' => '',
	    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
	    'label' => __('Categories', 'leven-shortcodes'),
	    'desc'  => __('Select the categories from which the projects will be displayed. If this field is empty, then projects will be displayed from all categories.', 'leven-shortcodes'),
	    'population' => 'taxonomy',
	    'source' => 'fw-portfolio-category',
	)
);