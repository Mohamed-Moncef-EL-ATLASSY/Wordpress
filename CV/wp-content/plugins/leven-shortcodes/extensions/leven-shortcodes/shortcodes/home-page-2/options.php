<?php if (!defined('FW')) die('Forbidden');

$options = array(
    'id' => array( 'type' => 'unique' ),
	'title' => array(
		'label'   => esc_html__('Title', 'leven-shortcodes'),
		'desc'    => esc_html__('Write some text', 'leven-shortcodes'),
		'type'    => 'text',
	),
    'subtitles'            => array(
        'label'  => esc_html__( 'Subtitles Carousel', 'leven-shortcodes' ),
        'type'   => 'addable-option',
        'option' => array(
            'type' => 'text',
        ),
        'value'  => array(),
        'desc'   => false
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
    'video_mp_upload' => array(
        'label' => esc_html__( 'Upload an .mp4 Video', 'leven-shortcodes' ),
        'desc'  => esc_html__( 'Upload an .mp4 file. For browser compatability, please upload an .mp4 and .webm file for video backgrounds.', 'leven-shortcodes' ),
        'type'  => 'upload',
        'files_ext' => array( 'mp4' ),
    ),
    'video_webm_upload' => array(
        'label' => esc_html__( 'Upload an .webm Video', 'leven-shortcodes' ),
        'desc'  => esc_html__( 'Upload an .webm file. For browser compatability, please upload an .webm and .webm file for video backgrounds.', 'leven-shortcodes' ),
        'type'  => 'upload',
        'files_ext' => array( 'webm' ),
    ),
    'image' => array(
        'label' => esc_html__( 'Fallback Image', 'leven-shortcodes' ),
        'desc'  => esc_html__( 'Upload an image in case the browser does not support video backgrounds.', 'leven-shortcodes' ),
        'type'  => 'upload',
    ),
    'position' => array(
        'type'  => 'switch',
        'label'   => esc_html__( 'Display text to the left or right of the video.', 'leven-shortcodes' ),
        'desc'    => esc_html__( 'Swap the location of the blocks', 'leven-shortcodes' ),
        'value'   => 'left',
        'right-choice' => array(
            'value' => 'left',
            'label' => esc_html__('Left', 'leven-shortcodes'),
        ),
        'left-choice' => array(
            'value' => 'right',
            'label' => esc_html__('Right', 'leven-shortcodes'),
        ),
    ),
);