<?php if (!defined('FW')) die('Forbidden');

wp_enqueue_style(
    'fw-shortcode-home-page-first',
    plugin_dir_url( __FILE__ ) . 'static/css/styles.css'
);

if (!function_exists('_action_theme_shortcode_home_page_first_enqueue_dynamic_css')):

    function _action_theme_shortcode_home_page_first_enqueue_dynamic_css($data) {
        $shortcode = 'home-page-1';
        $atts = shortcode_parse_atts( $data['atts_string'] );
        $atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

        $id = $atts['id'];
        if (!empty($atts['image']['url'])) {
            $img = $atts['image']['url'];
        } else {
            $img = '';
        }

        $custom_css = "
            #home_content_{$id} .home-photo .hp-inner {
                background-image: url({$img});
            }";

        wp_add_inline_style(
            'fw-shortcode-home-page-first',
            $custom_css
        );
    }
    add_action(
        'fw_ext_shortcodes_enqueue_static:home_page_1',
        '_action_theme_shortcode_home_page_first_enqueue_dynamic_css'
    );

endif;