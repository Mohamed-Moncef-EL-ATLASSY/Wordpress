<?php if (!defined('FW')) die('Forbidden');

wp_enqueue_script(
    'leven-shortcode-clients-slider',
    plugin_dir_url( __FILE__ ) . 'static/js/scripts.js',
    false,
    true,
    'in_footer'
);
