<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'general' => array(
		'title'   => esc_html__( 'General', 'leven' ),
		'type'    => 'tab',
		'options' => array(
			'general-box' => array(
				'title'   => esc_html__( 'General Settings', 'leven' ),
				'type'    => 'box',
				'attr'    => array('class' => 'initialized'),
				'options' => array(
					'logo_symbol'	=> array(
						'label' => esc_html__( 'Logo Letter', 'leven' ),
						'desc'  => esc_html__( 'This letter will appear in front of the text logo.', 'leven' ),
						'type'  => 'short-text',
						'value' => esc_html(substr(get_bloginfo( 'name' ), 0, 1)),
						'help'    => esc_html__( 'If you want to use the logo as an image, you can upload it below, in which case this field can be left blank.', 'leven' ),
					),
					'logo'	=> array(
						'label' => esc_html__( 'Text Logo', 'leven' ),
						'desc'  => esc_html__( 'Write your website title', 'leven' ),
						'type'  => 'text',
						'value' => esc_html(get_bloginfo( 'name' )),
						'help'    => esc_html__( 'If you want to use the logo as an image, you can upload it below, in which case this field can be left blank.', 'leven' ),
					),
					'photo'	=> array(
						'label' => esc_html__( 'Image Logo', 'leven' ),
						'desc'  => esc_html__( 'Upload the logo.', 'leven' ),
						'type'  => 'upload',
					),
					'logo_img_height'	=> array(
						'label' => esc_html__( 'Logo Image Height', 'leven' ),
						'desc'  => esc_html__( 'Set logo image height in the pixels. Example: 50.', 'leven' ),
						'type'  => 'short-text',
						'value' => '50'
					),
					'logo_img_width'	=> array(
						'label' => esc_html__( 'Logo Image Width', 'leven' ),
						'desc'  => esc_html__( 'Set logo image width in the pixels. Example 50.', 'leven' ),
						'type'  => 'short-text',
						'value' => '50'
					),
				)
			)
		)
	)
);