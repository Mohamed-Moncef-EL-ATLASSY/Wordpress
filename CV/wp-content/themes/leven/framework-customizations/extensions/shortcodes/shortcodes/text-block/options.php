<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'text' => array(
		'type'   => 'wp-editor',
		'label'  => esc_html__( 'Content', 'leven' ),
		'desc'   => esc_html__( 'Enter some content for this texblock', 'leven' ),
	),
    'description'    => array(
        'label' => esc_html__( 'Short Description', 'leven' ),
        'desc'  => esc_html__( 'Optional field. Add a brief description of the block.', 'leven' ),
        'type'  => 'text',
        'value' => '',
    ),
);
