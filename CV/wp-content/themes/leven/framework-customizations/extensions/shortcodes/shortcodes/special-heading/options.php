<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'    => array(
		'type'  => 'text',
		'label' => esc_html__( 'Heading Title', 'leven' ),
		'desc'  => esc_html__( 'Write the heading title content', 'leven' ),
	),
	'subtitle' => array(
		'type'  => 'text',
		'label' => esc_html__( 'Heading Subtitle', 'leven' ),
		'desc'  => esc_html__( 'Write the heading subtitle content', 'leven' ),
	),
	'heading' => array(
		'type'    => 'select',
		'label'   => esc_html__('Heading Size', 'leven'),
		'choices' => array(
			'h1' => 'H1',
			'h2' => 'H2',
			'h3' => 'H3',
			'h4' => 'H4',
			'h5' => 'H5',
			'h6' => 'H6',
		)
	),
	'centered' => array(
		'type'    => 'switch',
		'label'   => esc_html__('Centered', 'leven'),
	),
	'description'    => array(
        'label' => esc_html__( 'Short Description', 'leven' ),
        'desc'  => esc_html__( 'Optional field. Add a brief description of the block.', 'leven' ),
        'type'  => 'text',
        'value' => '',
    ),
);
