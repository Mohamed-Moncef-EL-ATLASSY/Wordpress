<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Table', 'leven' ),
	'description' => esc_html__( 'Add a Table', 'leven' ),
	'tab'         => esc_html__( 'Leven Elements', 'leven' ),
	'popup_size'  => 'large'
);