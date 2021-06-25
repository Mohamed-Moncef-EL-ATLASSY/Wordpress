<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'footer' => array(
		'title'   => esc_html__( 'Footer', 'leven' ),
		'type'    => 'tab',
		'options' => array(
			'footer_settings' => array(
				'title'   => esc_html__( 'Footer Settings', 'leven' ),
				'type'    => 'box',
				'options' => array(
					'footer_copyrights'	=> array(
						'label' => esc_html__( 'Copyrights', 'leven' ),
						'desc'  => esc_html__( 'Copyrights text.', 'leven' ),
						'type'  => 'text',
						'value' => '',
					),
					'footer_social' => array(
					    'type' => 'addable-popup',
					    'label' => esc_html__('Footer Links', 'leven'),
					    'template' => '{{- title }}',
					    'popup-title' => null,
					    'size' => 'small',
					    'limit' => 0,
					    'add-button-text' => esc_html__('Add', 'leven'),
					    'sortable' => true,
					    'popup-options' => array(
					    	'title' => array(
					            'label' => esc_html__('Title', 'leven'),
					            'type' => 'text',
					            'value' => '',
					        ),
					        'link' => array(
					            'label' => esc_html__('URL', 'leven'),
					            'type' => 'text',
					            'value' => '',
					        ),
					        'target' => array(
								'type'  => 'switch',
								'label'   => esc_html__( 'Open Link in New Tab', 'leven' ),
								'desc'    => esc_html__( 'Select here if you want to open the linked page in a new tab', 'leven' ),
								'value'   => '_blank',
								'right-choice' => array(
									'value' => '_blank',
									'label' => esc_html__('Yes', 'leven'),
								),
								'left-choice' => array(
									'value' => '_self',
									'label' => esc_html__('No', 'leven'),
								),
							),
					    ),
					),
					
					
				)
			),
		)
	)
);
