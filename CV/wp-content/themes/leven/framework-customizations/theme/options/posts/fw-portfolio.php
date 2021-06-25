<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$template_directory = get_template_directory_uri();
$settings_page_link = is_admin() ? menu_page_url( fw()->backend->_get_settings_page_slug(), false ) : '#';
$options            = array(
	'main' => array(
		'title'   => esc_html__( 'Project Options', 'leven' ),
		'type'    => 'box',
		'options' => array(
			'portfolio_type'   => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'value'        => array(
				'portfolio_type_picker' => 'standard',
				),
				'picker'       => array(
					'portfolio_type_picker' => array(
						'label'   => esc_html__( 'Portfolio Type', 'leven' ),
						'type'    => 'radio',
						'choices' => array(
							'standard' => esc_html__( 'Standard', 'leven' ),
							'lbimage'  => esc_html__( 'Lightbox Featured Image', 'leven' ),
							'lbvideo'  => esc_html__( 'Lightbox Video', 'leven' ),
							'lbaudio'  => esc_html__( 'Lightbox Audio', 'leven' ),
							'direct'   => esc_html__( 'Direct URL', 'leven' ),
						),
					)
				),
				'choices'      => array(
					'standard'  => array(
						'pf_client'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Client', 'leven' ),
						),
						'pf_site_text'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Site URL Text', 'leven' ),
						),
						'pf_site_url'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Site URL', 'leven' ),
						),
						'pf_site_text_second'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Site URL Text 2', 'leven' ),
						),
						'pf_site_url_second'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Site URL 2', 'leven' ),
						),
						'pf_site_text_third'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Site URL Text 3', 'leven' ),
						),
						'pf_site_url_third'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Site URL 3', 'leven' ),
						),
						'pf_date'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Date', 'leven' ),
						),
						'pf_description' => array(
							'label' => esc_html__( 'Short Description', 'leven' ),
							'type'  => 'wp-editor',
							'value' => '',
							'desc'  => false,
							'help'  => false,
							'reinit' => true,
						),
						'pf_tags'            => array(
							'label'  => esc_html__( 'Project Tags', 'leven' ),
							'type'   => 'addable-option',
							'option' => array(
								'type' => 'text',
							),
							'value'  => array(),
							'desc'   => false
						),
						'pf_gallery_grid' => array(
							'type'         => 'multi-picker',
							'label'        => false,
							'desc'         => false,
							'picker'       => array(
								'pf_gallery_grid_picker' => array(
									'label'        => esc_html__( 'Show Gallery as Grid', 'leven' ),
									'type'         => 'switch',
									'right-choice' => array(
										'value' => 'on',
										'label' => esc_html__( 'On', 'leven' )
									),
									'left-choice'  => array(
										'value' => 'off',
										'label' => esc_html__( 'Off', 'leven' )
									),
									'value'        => 'off',
								)
							),
							'choices'      => array(
								'on' => array(
									'pf_gallery_grid_columns'	=> array(
										'label'   => esc_html__( 'Gallery Grid', 'leven' ),
										'type'    => 'radio',
										'value'   => 'two-columns',
										'desc'    => false,
										'choices' => array(
											'one-column' => esc_html__( '1 Column', 'leven' ),
											'two-columns' => esc_html__( '2 Columns', 'leven' ),
											'three-columns' => esc_html__( '3 Columns', 'leven' ),
										),
									),
								),
							),
							'show_borders' => false,
						),
						'pf_use_ajax' => array(
							'label'        => esc_html__( 'Use Ajax to load the project', 'leven' ),
							'type'         => 'switch',
							'right-choice' => array(
								'value' => 'yes',
								'label' => esc_html__( 'Yes', 'leven' )
							),
							'left-choice'  => array(
								'value' => 'no',
								'label' => esc_html__( 'No', 'leven' )
							),
							'value'        => 'yes',
							'desc'         => esc_html__( 'If you disable this option, the project will open as a separate page. If this option is enabled, the project will be loaded in the form of an animated window, above the main content.', 'leven' ),
							'help'         => false,
						),
					),
					'lbvideo'  => array(
						'videourl'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Video URL', 'leven' ),
						)
					),
					'lbaudio'  => array(
						'audiourl'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Audio URL', 'leven' ),
						)
					),
					'direct'  => array(
						'directurl'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Direct URL', 'leven' ),
						)
					),
				),
				'show_borders' => false,
			),
		),
	),
);
