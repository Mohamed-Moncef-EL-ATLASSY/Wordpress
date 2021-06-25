<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'id' => array( 'type' => 'unique' ),
	'clients_slider' => array(
		'label'         => esc_html__( 'Clients', 'leven-shortcodes' ),
		'popup-title'   => esc_html__( 'Add/Edit Client Item', 'leven-shortcodes' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit Clients.', 'leven-shortcodes' ),
		'type'          => 'addable-popup',
		'template'      => '{{=client_title}}',
		'popup-options' => array(
			'client_logo' => array(
				'label' => esc_html__( 'Logo', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'leven-shortcodes' ),
				'type'  => 'upload',
			),
			'client_title'      => array(
				'label' => esc_html__( 'Title', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Link to the Clients website', 'leven-shortcodes' ),
				'type'  => 'text'
			),
			'site_url'      => array(
				'label' => esc_html__( 'Website Link', 'leven-shortcodes' ),
				'desc'  => esc_html__( 'Link to the Clients website', 'leven-shortcodes' ),
				'type'  => 'text'
			)
		)
	),
	'items'         => array(
		'label' => esc_html__( 'Items on the front: Desktop', 'leven-shortcodes' ),
		'desc'  => esc_html__( 'Example: 2', 'leven-shortcodes' ),
		'type'  => 'text',
		'value' => '3'
	),
	'items_tablet'         => array(
		'label' => esc_html__( 'Items on the front: Tablet', 'leven-shortcodes' ),
		'desc'  => esc_html__( 'Example: 2', 'leven-shortcodes' ),
		'type'  => 'text',
		'value' => '2'
	),
	'items_mobile'         => array(
		'label' => esc_html__( 'Items on the front: Mobile', 'leven-shortcodes' ),
		'desc'  => esc_html__( 'Example: 2', 'leven-shortcodes' ),
		'type'  => 'text',
		'value' => '1'
	)
);