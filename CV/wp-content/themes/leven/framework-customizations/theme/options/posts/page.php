<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$template_directory = get_template_directory_uri();
$settings_page_link = is_admin() ? menu_page_url( fw()->backend->_get_settings_page_slug(), false ) : '#';
$options            = array(
	'main' => array(
		'title'   => false,
		'type'    => 'box',
		'options' => array(
			'page_settings' => array(
				'title'   => esc_html__( 'Page Settings', 'leven' ),
				'type'    => 'tab',
				'options' => array(
					'cp_hide_header' => array(
					    'type'  => 'switch',
					    'value' => 'no',
					    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					    'label' => esc_html__('Hide Page Title', 'leven'),
					    'desc'  => false,
					    'help'  => false,
					    'left-choice' => array(
					        'value' => 'no',
					        'label' => esc_html__('No', 'leven'),
					    ),
					    'right-choice' => array(
					        'value' => 'yes',
					        'label' => esc_html__('Yes', 'leven'),
					    )
					),
					'cp_page_subtitle' => array(
				        'label'   => esc_html__('Page Subtitle', 'leven'),
				        'desc'    => esc_html__('Write some text', 'leven'),
				        'type'    => 'text',
				    ),
				)
			),
		)
	)
);
