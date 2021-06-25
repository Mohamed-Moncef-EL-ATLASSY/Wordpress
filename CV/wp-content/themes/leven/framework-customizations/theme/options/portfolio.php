<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'portfolio' => array(
		'title'   => esc_html__( 'Portfolio', 'leven' ),
		'type'    => 'tab',
		'options' => array(
			'portfolio_settings' => array(
				'title'   => esc_html__( 'Portfolio Settings', 'leven' ),
				'type'    => 'box',
				'options' => array(
					'portfolio_titles' => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'portfolio_titles_switcher' => array(
								'label'        => esc_html__( 'Custom Portfolio Titles', 'leven' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'on', 'leven' )
								),
								'left-choice'  => array(
									'value' => 'off',
									'label' => esc_html__( 'Off', 'leven' )
								),
								'value'        => 'on',
							)
						),
						'choices'      => array(
							'on' => array(
								'description_title'	=> array(
									'label' => esc_html__( 'Description Title', 'leven' ),
									'desc'  => esc_html__( 'Description title.', 'leven' ),
									'type'  => 'text',
									'value' => esc_html__( 'Description', 'leven' ),
								),
								'technology_title'	=> array(
									'label' => esc_html__( 'Technology Title', 'leven' ),
									'desc'  => esc_html__( 'Technology title.', 'leven' ),
									'type'  => 'text',
									'value' => esc_html__( 'Technology', 'leven' ),
								),
								'share_title'	=> array(
									'label' => esc_html__( 'Share Title', 'leven' ),
									'desc'  => esc_html__( 'Share title.', 'leven' ),
									'type'  => 'text',
									'value' => esc_html__( 'Share', 'leven' ),
								),
							),
						),
						'show_borders' => false,
					),
					'portfolio_desc_sidebar' => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'portfolio_sidebar_switcher' => array(
								'label'        => esc_html__( 'Display a Sidebar with a Description, Tags and Share Links.', 'leven' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'on', 'leven' )
								),
								'left-choice'  => array(
									'value' => 'off',
									'label' => esc_html__( 'Off', 'leven' )
								),
								'value'        => 'on',
							)
						),
						'choices'      => array(
							'on' => array(
								'portfolio_desc_fields' => array(
								    'type'  => 'checkboxes',
								    'value' => array(
								        'client' => true,
								        'site' => true,
								        'date' => true,
								        'tags' => true,
								        'share' => true,
								    ),
								    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
								    'label' => esc_html__('Display Fields and Blocks in the Description Block', 'leven'),
								    'desc'  => esc_html__('These settings apply only to the standard project type.', 'leven'),
								    'choices' => array(
								        'client' => esc_html__('Client', 'leven'),
								        'site' => esc_html__('Site', 'leven'),
								        'date' => esc_html__('Date', 'leven'),
								        'tags' => esc_html__('Tags', 'leven'),
								        'share' => esc_html__('Share Buttons', 'leven'),
								    ),
								    'inline' => false,
								),
								'portfolio_sidebar_position' => array(
									'label'        => esc_html__( 'Display Sidebar on the Left or Right Side', 'leven' ),
									'type'         => 'switch',
									'right-choice' => array(
										'value' => 'right',
										'label' => esc_html__( 'Right', 'leven' )
									),
									'left-choice'  => array(
										'value' => 'left',
										'label' => esc_html__( 'Left', 'leven' )
									),
									'value'        => 'right',
								)
							),
						),
						'show_borders' => false,
					),
					'portfolio_load_more' => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'portfolio_load_more_switcher' => array(
								'label'        => esc_html__( 'Load More Feature', 'leven' ),
								'type'         => 'switch',
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'on', 'leven' )
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
								'projects_number'	=> array(
									'label' => esc_html__( 'Number of Projects Displayed by Default', 'leven' ),
									'type'  => 'text',
									'value' => '9',
								),
								'button_text'	=> array(
									'label' => esc_html__( 'Load More Button Text', 'leven' ),
									'type'  => 'text',
									'value' => esc_html__( 'Load More', 'leven' ),
								),
								'button_text_loading'	=> array(
									'label' => esc_html__( 'Load More Button Text on Loading', 'leven' ),
									'type'  => 'text',
									'value' => esc_html__( 'Loading...', 'leven' ),
								),

							),
						),
						'show_borders' => false,
					)
				)
			),
		)
	)
);
