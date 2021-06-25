<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Text Block', 'leven' ),
	'description' => esc_html__( 'Add a Text Block', 'leven' ),
	'tab'         => esc_html__( 'Content Elements', 'leven' ),
    'title_template' => '{{- title }}: {{- o.description }}',
);
