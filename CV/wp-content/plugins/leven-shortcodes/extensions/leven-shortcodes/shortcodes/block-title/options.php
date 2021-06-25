<?php if (!defined('FW')) die('Forbidden');

$options = array(
    'block_id' => array(
        'label'   => esc_html__('ID', 'leven-shortcodes'),
        'desc'    => esc_html__('Optional field. You can add an ID for this block, for example for the Scroll to ID functionality. There should be no spaces in this field. Example ID: test_id.', 'leven-shortcodes'),
        'type'    => 'text',
    ),
	'title' => array(
		'label'   => esc_html__('Title', 'leven-shortcodes'),
		'desc'    => esc_html__('Write some text', 'leven-shortcodes'),
		'type'    => 'text',
	),
);