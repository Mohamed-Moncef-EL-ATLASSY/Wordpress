<?php if (!defined('FW')) die('Forbidden');

wp_enqueue_style(
    'fw-shortcode-home-page-second',
    plugin_dir_url( __FILE__ ) . 'static/css/styles.css'
);

if (!function_exists('_action_theme_shortcode_home_page_second_enqueue_dynamic_css')):
    if (!empty($atts['image'])) {
        function _action_theme_shortcode_home_page_second_enqueue_dynamic_css($data) {
            $shortcode = 'home-page-2';
            $atts = shortcode_parse_atts( $data['atts_string'] );
            $atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

            $id = $atts['id'];
            if (!empty($atts['image']['url'])) {
                $img = $atts['image']['url'];
            } else {
                $img = '';
            }

            $custom_css = "
                #home_content_{$id} .home-video {
                    background-image: url({$img});
                }";

            wp_add_inline_style(
                'fw-shortcode-home-page-second',
                $custom_css
            );
        }
        add_action(
            'fw_ext_shortcodes_enqueue_static:home_page_2',
            '_action_theme_shortcode_home_page_second_enqueue_dynamic_css'
        );
    }

endif;

wp_enqueue_style(
    'vidbg',
    plugin_dir_url( __FILE__ ) . 'static/css/vidbg.css'
);

wp_enqueue_script(
    'vidbg',
    plugin_dir_url( __FILE__ ) . 'static/js/vidbg.js',
    false,
    true,
    'in_footer'
);

wp_enqueue_script(
    'leven-theme-shortcode-home-page-2',
    plugin_dir_url( __FILE__ ) . 'static/js/scripts.js',
    false,
    true,
    'in_footer'
);