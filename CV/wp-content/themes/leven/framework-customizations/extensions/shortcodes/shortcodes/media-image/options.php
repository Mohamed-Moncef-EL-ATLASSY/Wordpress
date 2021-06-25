<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$template_directory = get_template_directory_uri();
$options = array(
    'id' => array( 'type' => 'unique' ),
    'img_settings' => array(
        'type' => 'group',
        'options' => array(
            'img_upload' => array(
                'label' => esc_html__('Image', 'leven'),
                'desc'  => esc_html__('Upload image', 'leven'),
                'type'  => 'upload',
            ),
        )
    ),
    'open_img' => array(
        'type'  => 'multi-picker',
        'label' => false,
        'desc'  => false,
        'picker' => array(
            'icon-box-img' => array(
                'label' => esc_html__( 'On Click', 'leven' ),
                'desc'  =>  esc_html__( 'What happens when you click the image?', 'leven' ),
                'attr'  => array( 'class' => 'fw-checkbox-float-left' ),
                'type'  => 'radio',
                'value' => 'nothing',
                'choices' => array(
                    'nothing' => esc_html__( 'Nothing happens', 'leven' ),
                    'popup' => esc_html__( 'Open in pop-up', 'leven' ),
                    'link' => esc_html__( 'Open custom Link', 'leven' )
                ),
            ),
        ),
        'choices' => array(
            'popup' => array(
                'image_popup' => array(
                    'type'  => 'multi-picker',
                    'label' => false,
                    'desc'  => false,
                    'picker' => array(
                        'icon-box-img' => array(
                            'label' => '',
                            'desc'  => '',
                            'attr'  => array( 'class' => 'fw-checkbox-float-left' ),
                            'type'  => 'radio',
                            'value' => 'img',
                            'choices' => array(
                                'img' => esc_html__( 'Original image', 'leven' ),
                                'fw-single-image-icon' => esc_html__( 'Video', 'leven' )
                            ),
                        ),
                    ),
                    'choices' => array(
                        'fw-single-image-icon' => array(
                            'upload_video' => array(
                                'label' => '',
                                'desc'  => esc_html__('Enter Youtube or Vimeo video URL', 'leven'),
                                'type'  => 'text',
                            ),
                        ),
                    )
                )
            ),
            'link' => array(
                'custom_link' => array(
                    'label' => '',
                    'desc'  => esc_html__('Enter your custom URL link', 'leven'),
                    'type'  => 'text'
                ),
                'open' => array(
                    'type'  => 'switch',
                    'value' => '',
                    'label' => '',
                    'desc'  => esc_html__('Open link in new window', 'leven'),
                    'left-choice' => array(
                        'value' => 'no',
                        'label' => esc_html__('No', 'leven'),
                    ),
                    'right-choice' => array(
                        'value' => 'yes',
                        'label' => esc_html__('Yes', 'leven'),
                    )
                ),
            ),
        )
    ),

    'class'  => array(
        'attr'  => array( 'class' => 'border-bottom-none'),
        'label'   => esc_html__( 'Custom Class', 'leven' ),
        'desc'    => esc_html__( 'Enter custom CSS class', 'leven' ),
        'type'    => 'text',
        'help' => esc_html__('You can use this class to further style this shortcode by adding your custom CSS.','leven'),
        'value' => '',
    ),

);