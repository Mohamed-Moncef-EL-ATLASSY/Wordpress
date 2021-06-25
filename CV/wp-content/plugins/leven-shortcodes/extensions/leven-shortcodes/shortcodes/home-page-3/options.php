<?php if (!defined('FW')) die('Forbidden');

$options = array(
    'id' => array( 'type' => 'unique' ),
	'hp_background'    => array(
        'label' => esc_html__( 'Start Page Background', 'leven-shortcodes' ),
        'desc'  => esc_html__( 'Upload an image. If you use a video background, this image will be used as a fallback image (in case the browser does not support video backgrounds).', 'leven-shortcodes' ),
        'type'  => 'upload',
    ),
    'video_mp_upload' => array(
        'label' => esc_html__( 'Video Background. Upload an .mp4 Video', 'leven-shortcodes' ),
        'desc'  => esc_html__( 'Optional field. Upload an .mp4 file. For browser compatability, please upload an .mp4 and .webm file for video backgrounds.', 'leven-shortcodes' ),
        'type'  => 'upload',
        'files_ext' => array( 'mp4' ),
    ),
    'video_webm_upload' => array(
        'label' => esc_html__( 'Video Background. Upload an .webm Video', 'leven-shortcodes' ),
        'desc'  => esc_html__( 'Optional field. Upload an .webm file. For browser compatability, please upload an .mp4 and .webm file for video backgrounds.', 'leven-shortcodes' ),
        'type'  => 'upload',
        'files_ext' => array( 'webm' ),
    ),
    'video_width' => array(
        'type'  => 'switch',
        'label'   => esc_html__( 'Video Background Width', 'leven-shortcodes' ),
        'desc'    => esc_html__( 'Display the video background in full width and a text block above the video or half the page.', 'leven-shortcodes' ),
        'value'   => 'half',
        'right-choice' => array(
            'value' => 'half',
            'label' => esc_html__('Half', 'leven-shortcodes'),
        ),
        'left-choice' => array(
            'value' => 'full',
            'label' => esc_html__('Full', 'leven-shortcodes'),
        ),
    ),
    'hp_main_title' => array(
        'label' => esc_html__( 'Main Title', 'leven-shortcodes' ),
        'desc'  => esc_html__( 'Write your main title', 'leven-shortcodes' ),
        'type'  => 'text',
        'value' => get_bloginfo( 'name' )
    ),
    'hp_subtitles'            => array(
        'label'  => esc_html__( 'Subtitles Carousel', 'leven-shortcodes' ),
        'type'   => 'addable-option',
        'option' => array(
            'type' => 'text',
        ),
        'value'  => array(),
        'desc'   => false
    ),
    'hp_text' => array(
        'type'  => 'wp-editor',
        'value' => '',
        'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
        'label' => __('Text', 'leven-shortcodes'),
        'size' => 'small',
        'editor_height' => 300,
        'wpautop' => true,
        'editor_type' => false,
    ),
    'hp_buttons' => array(
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
        ),
    ),
    'position' => array(
        'type'  => 'switch',
        'label'   => esc_html__( 'Display the image on the right, the block with the text on the left', 'leven-shortcodes' ),
        'desc'    => esc_html__( 'Swap the location of the blocks at the top of the start page', 'leven-shortcodes' ),
        'value'   => 'no',
        'right-choice' => array(
            'value' => 'yes',
            'label' => esc_html__('Yes', 'leven-shortcodes'),
        ),
        'left-choice' => array(
            'value' => 'no',
            'label' => esc_html__('No', 'leven-shortcodes'),
        ),
    ),
    'offset' => array(
        'type'  => 'switch',
        'label'   => esc_html__( 'Text Block Offset', 'leven-shortcodes' ),
        'desc'    => esc_html__( 'The offset of the text block relative to the block with the image.', 'leven-shortcodes' ),
        'value'   => 'on',
        'right-choice' => array(
            'value' => 'on',
            'label' => esc_html__('On', 'leven-shortcodes'),
        ),
        'left-choice' => array(
            'value' => 'off',
            'label' => esc_html__('Off', 'leven-shortcodes'),
        ),
    ),
    'text_blockbg' => array(
        'type'  => 'rgba-color-picker',
        'label' => esc_html__('Text Block Background', 'leven-shortcodes'),
        'value' => 'rgba(252,252,252,1)',
        'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
        'palettes' => array( '#fcfcfc', '#222' ),
        'desc'  => esc_html__('You can change the background color of the block with text.', 'leven-shortcodes'),
    ),
    'main_title_color' => array(
        'type'  => 'color-picker',
        'label' => __('Main Title Color', 'leven-shortcodes'),
        'value' => '#333333',
        'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
        'palettes' => array( '#333', '#f5f5f5' ),
    ),
    'subtitle_color' => array(
        'type'  => 'color-picker',
        'label' => __('Subtitles Color', 'leven-shortcodes'),
        'value' => '#888',
        'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
        'palettes' => array( '#888', '#a5a5a5' ),
    ),
    'text_color' => array(
        'type'  => 'color-picker',
        'label' => __('Text Color', 'leven-shortcodes'),
        'value' => '#666666',
        'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
        'palettes' => array( '#666', '#d5d5d5' ),
    )
);