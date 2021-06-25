<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( function_exists( 'leven_tracking_wp_head' ) ) {
	$options = array(
		'seo' => array(
			'title'   => esc_html__( 'SEO', 'leven' ),
			'type'    => 'tab',
			'options' => array(
				'tracking_code' => array(
					'title'   => esc_html__( 'SEO', 'leven' ),
					'type'    => 'box',
					'options' => array(
						'head_tracking_code'	=> array(
							'label' => esc_html__( 'Tracking Code (head)', 'leven' ),
							'desc'  => esc_html__( 'Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing head tag.', 'leven' ),
							'type'  => 'textarea',
							'value' => '',
						),
						'body_tracking_code'	=> array(
							'label' => esc_html__( 'Tracking Code (body)', 'leven' ),
							'desc'  => esc_html__( 'Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing body tag.', 'leven' ),
							'type'  => 'textarea',
							'value' => '',
						),
					)
				),
			)
		)
	);
}
