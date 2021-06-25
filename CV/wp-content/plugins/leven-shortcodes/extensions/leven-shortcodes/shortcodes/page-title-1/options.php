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
    'text' => array(
        'label'   => esc_html__('Text', 'leven-shortcodes'),
        'desc'    => esc_html__('Write some text', 'leven-shortcodes'),
        'type'    => 'text',
    ),
    'buttons' => array(
        'type' => 'addable-popup',
        'label' => __('Buttons', 'leven-shortcodes'),
        'template' => '{{- title }}',
        'popup-title' => null,
        'size' => 'small',
        'limit' => 0,
        'add-button-text' => __('Add', 'leven-shortcodes'),
        'sortable' => true,
        'popup-options' => array(
            'title' => array(
                'label' => __('Title', 'leven-shortcodes'),
                'type' => 'text',
                'value' => '',
            ),
            'link' => array(
                'label' => __('URL', 'leven-shortcodes'),
                'type' => 'text',
                'value' => '',
            ),
            'target' => array(
                'type'  => 'switch',
                'label'   => esc_html__( 'Open Link in New Tab', 'leven-shortcodes' ),
                'desc'    => esc_html__( 'Select here if you want to open the linked page in a new tab', 'leven-shortcodes' ),
                'value'   => '_blank',
                'right-choice' => array(
                    'value' => '_blank',
                    'label' => esc_html__('Yes', 'leven-shortcodes'),
                ),
                'left-choice' => array(
                    'value' => '_self',
                    'label' => esc_html__('No', 'leven-shortcodes'),
                ),
            ),
            'type' => array(
                'type'  => 'switch',
                'label'   => esc_html__( 'Button Type', 'leven-shortcodes' ),
                'desc'    => esc_html__( 'Select a button type', 'leven-shortcodes' ),
                'value'   => 'primary',
                'right-choice' => array(
                    'value' => 'primary',
                    'label' => esc_html__('Primary', 'leven-shortcodes'),
                ),
                'left-choice' => array(
                    'value' => 'secondary',
                    'label' => esc_html__('Secondary', 'leven-shortcodes'),
                ),
            ),
        ),
    ),
    'image' => array(
        'label' => esc_html__( 'Image', 'leven-shortcodes' ),
        'desc'  => esc_html__( 'Upload an image.', 'leven-shortcodes' ),
        'type'  => 'upload',
    ),
);