<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'advanced' => array(
		'title'   => esc_html__( 'Advanced', 'leven' ),
		'type'    => 'tab',
		'options' => array(
			'share_buttons' => array(
				'title'   => esc_html__( 'Share Buttons Settings', 'leven' ),
				'type'    => 'box',
				'options' => array(
					'share_buttons_list' => array(
					    'type'  => 'checkboxes',
					    'value' => array(
					        'facebook' => true,
					        'twitter' => true,
					        'linkedin' => true,
					        'digg' => true,
					    ),
					    'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					    'label' => esc_html__('Buttons that will be displayed on Portfolio project pages and Blog posts.', 'leven'),
					    'desc'  => '',
					    'choices' => array(
					        'facebook' => esc_html__('Facebook', 'leven'),
					        'twitter' => esc_html__('Twitter', 'leven'),
					        'linkedin' => esc_html__('LinkedIn', 'leven'),
					        'digg' => esc_html__('digg', 'leven'),
					    ),
					    'inline' => false,
					),
				)
			),
		)
	)
);
