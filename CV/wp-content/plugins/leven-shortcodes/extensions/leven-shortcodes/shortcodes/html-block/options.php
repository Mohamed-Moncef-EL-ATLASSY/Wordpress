<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'text' => array(
		'type'   => 'wp-editor',
		'label'  => esc_html__( 'Content', 'leven-shortcodes' ),
		'desc'   => esc_html__( 'Enter some content for this texblock', 'leven-shortcodes' ),
		'wpautop' => false,
	),
    'description'    => array(
        'label' => esc_html__( 'Short Description', 'leven-shortcodes' ),
        'desc'  => esc_html__( 'Optional field. Add a brief description of the block.', 'leven-shortcodes' ),
        'type'  => 'text',
        'value' => '',
    ),
);
