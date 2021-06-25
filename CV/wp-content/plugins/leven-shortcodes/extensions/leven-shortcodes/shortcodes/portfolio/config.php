<?php if (!defined('FW')) die('Forbidden');

if ( function_exists( 'leven_filter_portfolio_extension' ) ) {
    $cfg = array(
        'page_builder' => array(
            'title'       => esc_html__( 'Portfolio', 'leven-shortcodes' ),
            'description' => esc_html__( 'Portfolio grid', 'leven-shortcodes' ),
            'tab'         => esc_html__( 'Leven Elements', 'leven-shortcodes' ),
        )
    );
}