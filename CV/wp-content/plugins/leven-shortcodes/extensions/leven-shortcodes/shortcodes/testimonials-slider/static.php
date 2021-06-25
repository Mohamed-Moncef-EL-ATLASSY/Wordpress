<?php if (!defined('FW')) die('Forbidden');


wp_enqueue_script(
    'leven-shortcode-testimonials-slider',
    plugin_dir_url( __FILE__ ) . 'static/js/scripts.js',
    false,
    true,
    'in_footer'
);

wp_enqueue_style(
    'fw-shortcode-testimonials-slider',
    plugin_dir_url( __FILE__ ) . 'static/css/styles.css'
);
