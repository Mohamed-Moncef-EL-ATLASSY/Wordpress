<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'theme_customization' => array(
		'title'   => esc_html__( 'Theme Design', 'leven' ),
		'type'    => 'tab',
		'options' => array(
			'theme_style_options' => array(
				'title'   => esc_html__( 'Theme Design', 'leven' ),
				'type'    => 'box',
				'options' => array(
					'content_max_width' => array(
						'label' => esc_html__( 'Content Area Max Width', 'leven' ),
			            'type' => 'short-text',
			            'value' => '1320',
			            'desc'  => esc_html__( 'Maximum width of the area with content. In pixels.', 'leven' ),
					),
					'main_color' => array(
						'label' => esc_html__( 'Main Theme Color', 'leven' ),
						'type'  => 'color-picker',
						'value' => '#7066ff',
						'palettes' => array( '#7066ff', '#54ca95', '#55c0ce', '#fc6158', '#007ced', '#ff9638', '#ef5555', '#4a6583', '#0099e5', '#f8b732', '#10b9b2', '#ef5565' ),
						'desc'  => esc_html__( 'Select main color.', 'leven' ),
					),
					'main_bg_color' => array(
						'label' => esc_html__( 'Body Background Color', 'leven' ),
						'type'  => 'color-picker',
						'value' => '#ecf1f9',
						'palettes' => array( '#ecf1f9', '#fcfcfc', '#f5f5f5', '#000000' ),
						'desc'  => esc_html__( 'Select body background color.', 'leven' ),
					),
					'sidebar_bg_color' => array(
						'label' => esc_html__( 'Blog Sidebar Background Color', 'leven' ),
						'type'  => 'color-picker',
						'value' => '#fff',
						'palettes' => array( '#ffffff', '#333333' ),
						'desc'  => esc_html__( 'Select blog pages sidebar background color.', 'leven' ),
					),
					'links_color' => array(
						'label' => esc_html__( 'Links Color', 'leven' ),
						'type'  => 'color-picker',
						'value' => '#0099CC',
						'palettes' => array( '#0099CC', '#7066ff', '#54ca95', '#55c0ce', '#fc6158', '#007ced', '#ff9638', '#ef5555', '#4a6583', '#0099e5', '#f8b732', '#10b9b2', '#ef5565' ),
						'desc'  => esc_html__( 'Select links color.', 'leven' ),
					),
					'links_hover_color' => array(
						'label' => esc_html__( 'Links Hover Color', 'leven' ),
						'type'  => 'color-picker',
						'value' => '#006699',
						'desc'  => esc_html__( 'Select links hover color.', 'leven' ),
					),
					'blog_sidebar'                    => array(
						'label'        => esc_html__( 'Show Blog Sidebar', 'leven' ),
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
						'desc'         => false,
						'help'         => false,
					),
					'full_width_mode'                    => array(
						'label'        => esc_html__( 'Use Full Width Mode', 'leven' ),
						'type'         => 'switch',
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'leven' )
						),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'leven' )
						),
						'value'        => 'no',
						'desc'         => false,
						'help'         => false,
					),
					'theme_style_picker'                    => array(
						'label'        => esc_html__( 'Theme Style', 'leven' ),
						'type'         => 'switch',
						'right-choice' => array(
							'value' => 'light',
							'label' => esc_html__( 'Light', 'leven' )
						),
						'left-choice'  => array(
							'value' => 'dark',
							'label' => esc_html__( 'Dark', 'leven' )
						),
						'value'        => 'light',
						'desc'         => esc_html__( 'This option changes the basic styles. The styles that can be changed on that page should be changed at your discretion.', 'leven' ),
						'help'         => false,
					),
					'move_effect'      => array(
						'label'        => esc_html__( 'BG Move Effect', 'leven' ),
						'type'         => 'switch',
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'leven' )
						),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'leven' )
						),
						'value'        => 'no',
						'desc'         => esc_html__( 'Apply the effect of moving behind the mouse pointer to the main background', 'leven' ),
						'help'         => false,
					),
					'scroll_totop'      => array(
						'label'        => esc_html__( 'Scroll to Top Button', 'leven' ),
						'type'         => 'switch',
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Show', 'leven' )
						),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'Hide', 'leven' )
						),
						'value'        => 'yes',
						'desc'         => esc_html__( 'Show scroll to top button', 'leven' ),
						'help'         => false,
					),
					'transition_effect' => array(
					    'type'  => 'select',
					    'value' => 'transition-flip-in-right',
					    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					    'label' => esc_html__('Page Transition Effect', 'leven'),
					    'choices' => array(
					        'transition-flip-in-right' => esc_html__('1. Flip in right', 'leven'),
					        'transition-swap' => esc_html__('2. Swap', 'leven'),
					        'transition-vanish-in' => esc_html__('3. Vanish', 'leven'),
					        'transition-puff-in' => esc_html__('4. Transition Puff in', 'leven'),
					        'transition-space-in-right' => esc_html__('5. Space in', 'leven'),
					        'fadeInLeft' => esc_html__('6. Fade in left', 'leven'),
					        'transition-twister-in-up' => esc_html__('7. Twister in up', 'leven'),
					        'without-transition' => esc_html__('8. Disable transition effect', 'leven'),
					    ),
					    'no-validate' => false,
					),
					'content_border_radius' => array(
						'label' => esc_html__( 'Content Area Border Radius', 'leven' ),
			            'type' => 'short-text',
			            'value' => '40',
			            'desc'  => esc_html__( 'Content Area Border Radius. In pixels. The setting is not relevant for full width mode.', 'leven' ),
					),
					'content_box_shadow'      => array(
						'label'        => esc_html__( 'Disable Content Area Box Shadow', 'leven' ),
						'type'         => 'switch',
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'leven' )
						),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'leven' )
						),
						'value'        => 'no',
						'help'         => false,
						'desc'  => esc_html__( 'Disable Content Area Box Shadow. The setting is not relevant for full width mode.', 'leven' ),
					),
				)
			),
			'site_header_design' => array(
				'title'   => esc_html__( 'Design of the Main Menu', 'leven' ),
				'type'    => 'box',
				'attr'    => array('class' => 'initialized'),
				'options' => array(
					'main_menu_font' => array(
					    'type' => 'typography-v2',
					    'value' => array(
					        'family' => 'Poppins',
					        'style' => 'normal',
					        'weight' => 400,
					        'subset' => 'latin-ext',
					        'variation' => 'regular',
					        'size' => 14,
					        'line-height' => 3.3,
					        'letter-spacing' => 0,
					        'color' => '#333333'
					    ),
					    'components' => array(
					        'family'         => true,
					        'size'           => true,
					        'line-height'    => true,
					        'letter-spacing' => true
					    ),
					    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					    'label' => esc_html__('Main Menu Font', 'leven'),
					    'desc'  => false,
					    'help'  => false,
					),
				),
				
			),
			'page_titles' => array(
				'title'   => esc_html__( 'Page Titles', 'leven' ),
				'type'    => 'box',
				'attr'    => array('class' => 'initialized'),
				'options' => array(
					'cp_title_general_bg_color' => array(
						'label' => esc_html__( 'Background Color', 'leven' ),
						'type'  => 'color-picker',
						'value' => '#fcfcfc',
						'palettes' => array( '#fcfcfc', '#252525' ),
						'desc'  => esc_html__( 'Select the background color of the title.', 'leven' ),
					),
					'cp_title_general_borders_color' => array(
						'label' => esc_html__( 'Color of Top and Bottom Border', 'leven' ),
						'type'  => 'color-picker',
						'value' => '#eee',
						'palettes' => array( '#eeeeee', '#333333' ),
						'desc'  => esc_html__( 'Select the background color of the title.', 'leven' ),
					),
					'cp_title_general_title_font' => array(
					    'type' => 'typography-v2',
					    'value' => array(
					        'family' => 'Poppins',
					        'style' => 'normal',
					        'weight' => 600,
					        'subset' => 'latin-ext',
					        'variation' => '600',
					        'size' => 44,
					        'line-height' => 48,
					        'letter-spacing' => 0,
					        'color' => '#333333'
					    ),
					    'components' => array(
					        'family'         => true,
					        'size'           => true,
					        'line-height'    => false,
					        'letter-spacing' => true
					    ),
					    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					    'label' => esc_html__('Title Font', 'leven'),
					    'desc'  => false,
					    'help'  => false,
					),
					'cp_title_general_subtitle_font' => array(
					    'type' => 'typography-v2',
					    'value' => array(
					        'family' => 'Poppins',
					        'style' => 'normal',
					        'weight' => 300,
					        'subset' => 'latin-ext',
					        'variation' => '300',
					        'size' => 14,
					        'line-height' => 17,
					        'letter-spacing' => 0,
					        'color' => '#aaaaaa'
					    ),
					    'components' => array(
					        'family'         => true,
					        'size'           => true,
					        'line-height'    => false,
					        'letter-spacing' => true
					    ),
					    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					    'label' => esc_html__('Subtitle Font', 'leven'),
					    'desc'  => false,
					    'help'  => false,
					)
				)
			),
			'page_content_area' => array(
				'title'   => esc_html__( 'Page Background Color', 'leven' ),
				'type'    => 'box',
				'attr'    => array('class' => 'initialized'),
				'options' => array(
					'cp_content_bg_color' => array(
						'label' => esc_html__( 'Background Color', 'leven' ),
						'type'  => 'rgba-color-picker',
						'value' => 'rgba(255, 255, 255, 1)',
						'palettes' => array( '#ffffff', '#222222' ),
						'desc'  => esc_html__( 'Select the background color.', 'leven' ),
					),
				)
			),
			'footer_design' => array(
				'title'   => esc_html__( 'Footer Design', 'leven' ),
				'type'    => 'box',
				'attr'    => array('class' => 'initialized'),
				'options' => array(
					'footer_bg_color' => array(
						'label' => esc_html__( 'Footer Background Color', 'leven' ),
						'type'  => 'color-picker',
						'value' => '#fcfcfc',
						'palettes' => array( '#fdfdfd', '#fcfcfc', '#252525' ),
						'desc'  => esc_html__( 'Select the background color.', 'leven' ),
					),
					'footer_border_color' => array(
						'label' => esc_html__( 'Footer Top Border Color', 'leven' ),
						'type'  => 'color-picker',
						'value' => '#eee',
						'palettes' => array( '#eeeeee', '#f2f2f2', '#333' ),
						'desc'  => esc_html__( 'Select the background color.', 'leven' ),
					),
					'footer_text_color' => array(
						'label' => esc_html__( 'Footer Text Color', 'leven' ),
						'type'  => 'color-picker',
						'value' => '#aaa',
						'palettes' => array( '#aaa', '#666', '#888', '#ddd' ),
						'desc'  => esc_html__( 'Select the background color.', 'leven' ),
					),
					'footer_links_color' => array(
						'label' => esc_html__( 'Footer Links Color', 'leven' ),
						'type'  => 'color-picker',
						'value' => '#333',
						'palettes' => array( '#333', '#666', '#888', '#ddd' ),
						'desc'  => esc_html__( 'Select the background color.', 'leven' ),
					),
				)
			)
		)
	)
);