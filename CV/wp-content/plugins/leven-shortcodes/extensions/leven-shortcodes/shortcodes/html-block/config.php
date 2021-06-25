<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'HTML Block', 'leven' ),
	'description' => esc_html__( 'Add HTML or script', 'leven' ),
	'tab'         => esc_html__( 'Leven Elements', 'leven' ),
    'title_template' => '{{- title }}: {{- o.description }}',
);
