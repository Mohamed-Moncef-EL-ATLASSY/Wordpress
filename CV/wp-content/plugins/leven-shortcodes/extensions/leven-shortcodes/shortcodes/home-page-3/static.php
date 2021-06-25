<?php if (!defined('FW')) die('Forbidden');

wp_enqueue_style(
    'fw-shortcode-home-page-third',
    plugin_dir_url( __FILE__ ) . 'static/css/styles.css'
);

if (!function_exists('_action_theme_shortcode_home_page_third_enqueue_dynamic_css')):
    function _action_theme_shortcode_home_page_third_enqueue_dynamic_css($data) {
        $shortcode = 'home-page-3';
        $atts = shortcode_parse_atts( $data['atts_string'] );
        $atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

        $id = $atts['id'];
        $bg_color = $atts['text_blockbg'];
        $title_color = $atts['main_title_color'];
        $subtitle_color = $atts['subtitle_color'];
        $text_color = $atts['text_color'];
        $video_width = $atts['video_width'];

        if (!empty($atts['video_mp_upload'])) {
            $video_mp = $atts['video_mp_upload']['url'];
        }
        if (!empty($atts['video_webm_upload'])) {
            $video_webm = $atts['video_webm_upload']['url'];
        }
        
        $custom_css = "
            #home_content_{$id} .start-page-full-width .hp-text-block {
                background-color: {$bg_color};
            }

            #home_content_{$id} .hp-main-title {
                color: {$title_color};
            }

            #home_content_{$id} .start-page-full-width .hp-text-block .sp-subtitle {
                color: {$subtitle_color};
            }

            #home_content_{$id} .hp-text-block p,
            #home_content_{$id} .hp-text-block span,
            #home_content_{$id} .hp-text-block li {
                color: {$text_color};
            }
        ";
        if (!empty($atts['hp_background']['url']) && ($video_width == "half")) {
            $img = $atts['hp_background']['url'];
            $custom_css .= "
                #home_content_{$id} .start-page-full-width .inner-content .fill-block {
                    background-image: url({$img});
                }
            ";
        }

        wp_add_inline_style(
            'fw-shortcode-home-page-third',
            $custom_css
        );

        if (!empty($video_mp) || !empty($video_webm)) {
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
                'leven-theme-shortcode-home-page-3',
                plugin_dir_url( __FILE__ ) . 'static/js/scripts.js',
                false,
                true,
                'in_footer'
            );
        }
    }
    add_action(
        'fw_ext_shortcodes_enqueue_static:home_page_3',
        '_action_theme_shortcode_home_page_third_enqueue_dynamic_css'
    );
endif;
