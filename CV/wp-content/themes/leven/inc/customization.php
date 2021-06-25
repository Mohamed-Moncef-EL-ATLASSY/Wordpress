<?php

function leven_theme_customizations() {
    //================================================================================================================================
    // Custom styles
    //================================================================================================================================
    $custom_styles = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('custom_styles') : '';
    $pages_shadow = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_content_shadow') : 'on';
    $content_max_width = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('content_max_width') : '1320';
    $full_width_mode = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('full_width_mode') : 'no';
    $content_area_br = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('content_border_radius') : '40';
    $content_area_bs = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('content_box_shadow') : 'no';
    $move_effect = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('move_effect') :  'no'; 


    //================================================================================================================================
    // Main color
    //================================================================================================================================
    $theme_main_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_color') : '#7066ff';

    //================================================================================================================================
    // Backgrounds
    //================================================================================================================================
    $main_header_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_header_bg_color') : '#ffffff';

    $body_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_bg_color') : '#ecf1f9';
    $body_text_color  = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_text_color') : '#666666';

    $header_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('header_bg_color') : '#ffffff';

    $sidebar_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('sidebar_bg_color') : '#ffffff';

    $sp_title_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('start_page_title_color') : '#ffffff';
    $sp_subtitle_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('start_page_subtitle_color') : '#ffffff';


    //================================================================================================================================
    // Typography
    //================================================================================================================================
    $body_text_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/family') : 'Poppins';
    $body_text_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/size') : '14';
    $body_text_line_height = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/line-height') : '1.75';
    $body_text_variation = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/variation') : 'regular';
    $body_text_weight = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/weight') : '400';
    $body_text_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/style') : 'normal';
    if ( $body_text_weight == '' ) {
        $body_text_weight = intval($body_text_variation);
        $body_text_style = ( strpos( $body_text_variation, 'italic' ) ) ? 'italic' : 'normal';
        if ( $body_text_weight == 'regular' ) {
            $body_text_weight = '400';
            $body_text_style = 'normal';
        }
        if ( $body_text_variation == 'italic' ) {
            $body_text_weight = '400';
            $body_text_style = 'italic';
        }
    }
    $body_text_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography/color') : '#666666';

    $headings_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings/family') : 'Poppins';
    $headings_variation = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings/variation') : 'regular';
    $headings_weight = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings/weight') : '600';
    $headings_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings/style') : 'normal';
    if ( $headings_weight == '' ) {
        $headings_weight = intval($headings_variation);
        $headings_style = ( strpos( $headings_variation, 'italic' ) ) ? 'italic' : 'normal';
        if ( $headings_weight == 'regular' ) {
            $headings_weight = '400';
            $headings_style = 'normal';
        }
        if ( $headings_variation == 'italic' ) {
            $headings_weight = '400';
            $headings_style = 'italic';
        }
    }
    $headings_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings/color') : '#333';


    $h1_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h1/size') : '32';
    $h2_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h2/size') : '27';
    $h3_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h3/size') : '21';
    $h4_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h4/size') : '18';
    $h5_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h5/size') : '16';
    $h6_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('h6/size') : '14';

    $links_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('links_color') : '#0099CC';
    $links_hover_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('links_hover_color') : '#006699';


    /* logo vars */
    $logo_img = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('photo') : '';
    $logo_img_height = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('logo_img_height') : '';
    $logo_img_width = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('logo_img_width') : '';


    //================================================================================================================================
    // Main Menu
    //================================================================================================================================
    $main_menu_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_font/family') : 'Poppins';
    $main_menu_variation = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_font/variation') : 'regular';
    $main_menu_weight = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_font/weight') : '400';
    $main_menu_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_font/style') : 'normal';
    $main_menu_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_font/color') : '#333';
    $main_menu_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_font/size') : '14';
    $main_menu_line_height = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_font/line-height') : '3.3';
    $main_menu_spacing = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_font/letter-spacing') : '0';
    if ( $main_menu_weight == '' ) {
        $main_menu_weight = intval($main_menu_variation);
        $main_menu_style = ( strpos( $main_menu_variation, 'italic' ) ) ? 'italic' : 'normal';
        if ( $main_menu_weight == 'regular' ) {
            $main_menu_weight = '400';
            $main_menu_style = 'normal';
        }
        if ( $main_menu_variation == 'italic' ) {
            $main_menu_weight = '400';
            $main_menu_style = 'italic';
        }
    } 

    $main_menu_borders_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_borders_color') : '#f5f5f5';
    $main_menu_hover_bg = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_hover_bg') : '#fcfcfc';

    //================================================================================================================================
    // Page Titles and Page Content Area
    //================================================================================================================================
    $cp_general_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_bg_color') : '#fcfcfc';
    $cp_general_borders_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_borders_color') : '#eee';
    $cp_general_content_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_content_bg_color') : '#fff';
    $cp_general_title_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/size') : '44';
    $cp_general_title_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/color') : '#333';
    $cp_general_title_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/family') : 'Poppins';
    $cp_general_title_variation = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/variation') : 'regular';
    $cp_general_title_weight = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/weight') : '600';
    $cp_general_title_spacing = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/letter-spacing') : '0';
    $cp_general_title_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font/style') : 'normal';
    if ( $cp_general_title_weight == '' ) {
        $cp_general_title_weight = intval($cp_general_title_variation);
        $cp_general_title_style = ( strpos( $cp_general_title_variation, 'italic' ) ) ? 'italic' : 'normal';
        if ( $cp_general_title_weight == 'regular' ) {
            $cp_general_title_weight = '400';
            $cp_general_title_style = 'normal';
        }
        if ( $cp_general_title_weight == 'italic' ) {
            $cp_general_title_weight = '400';
            $cp_general_title_style = 'italic';
        }
    }

    $cp_general_subtitle_size = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_subtitle_font/size') : '14';
    $cp_general_subtitle_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_subtitle_font/color') : '#aaa';
    $cp_general_subtitle_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_subtitle_font/family') : 'Poppins';
    $cp_general_subtitle_variation = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_subtitle_font/variation') : 'regular';
    $cp_general_subtitle_weight = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_subtitle_font/weight') : '300';
    $cp_general_subtitle_spacing = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_subtitle_font/letter-spacing') : '0';
    $cp_general_subtitle_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_subtitle_font/style') : 'normal';
    if ( $cp_general_subtitle_weight == '' ) {
        $cp_general_subtitle_weight = intval($cp_general_subtitle_variation);
        $cp_general_subtitle_style = ( strpos( $cp_general_subtitle_variation, 'italic' ) ) ? 'italic' : 'normal';
        if ( $cp_general_subtitle_weight == 'regular' ) {
            $cp_general_subtitle_weight = '400';
            $cp_general_subtitle_style = 'normal';
        }
        if ( $cp_general_subtitle_weight == 'italic' ) {
            $cp_general_subtitle_weight = '400';
            $cp_general_subtitle_style = 'italic';
        }
    }

    //================================================================================================================================
    // Footer
    //================================================================================================================================
    $footer_bg_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('footer_bg_color') : '#fcfcfc';
    $footer_border_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('footer_border_color') : '#eee';
    $footer_text_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('footer_text_color') : '#aaa';
    $footer_links_color = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('footer_links_color') : '#333';

    




    $content_max_width_min = $content_max_width + 101;
    $content_max_width_max = $content_max_width + 100;
    
    if($content_area_bs == "yes") {
        $content_arex_shadow_css = '
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
        ';
    } else {
        $content_arex_shadow_css = '';
    }


    if($full_width_mode == "yes") {
        $full_width_mode_css = '
        @media only screen and (min-width: 991px){
            .page-container.full-width-container {
                max-width: 100%;
                border-radius: 0;
                margin: 0;
            }
            .site-footer {
                border-radius: 0;
            }
            .page-content.single-post {
                max-width: ' . $content_max_width . 'px;
                margin: 0 auto;
            }

            .post-content,
            .list-view .post-content,
            .list-view .post-navigation,
            .list-view .comments-area,
            .list-view .paging-navigation,
            .single-post .site-content .post-navigation,
            .single-post .site-content .comments-area {
                max-width: ' . $content_max_width . 'px;
                margin-left: auto;
                margin-right: auto;
                padding-left: 50px;
                padding-right: 50px;
            }

            .list-view article {
                max-width: ' . $content_max_width . 'px;
                margin-left: auto;
                margin-right: auto;
            }
        }
        .page-container.full-width-container {
            min-height: 100vh;
            padding-bottom: 120px;
        }
        .page-container.full-width-container .site-footer {
            position: absolute;
            margin: 60px 0 0;
            right: 0;
            left: 0;
            bottom: 0;
        }
        .lmpixels-scroll-to-top {
            bottom: 60px;
        }
        ';
    } else {
    $full_width_mode_css = '
        @media only screen and (min-width: 991px){
            .site-footer {
                border-bottom-left-radius: ' . $content_area_br . 'px;
                border-bottom-right-radius: ' . $content_area_br . 'px;
            }
        }
        ';
    }

    $cp_general_title_size_small = $cp_general_title_size*0.8;



    if( !empty( $logo_img_height ) ) {
        $logo_img_height_not_empty = '
        height: auto;
        max-height: ' . $logo_img_height . 'px;
        ';
    }

    if( !empty( $logo_img_width ) ) {
        $logo_img_width_not_empty = '
        width: auto;
        max-width: ' . $logo_img_width . 'px;
        ';
    }


    if( !empty( $logo_img ) && ($logo_img_height > 50) && !empty( $logo_img_height ) ) {
        $logo_text_css = '
        .logo-text {
            line-height: ' . $logo_img_height . 'px;
            margin-left: 10px;
        }
        ';

        $nav_height = $main_menu_size * $main_menu_line_height;
        if ( $nav_height < $logo_img_height ) {
            $nav_paddings = $logo_img_height - $nav_height;
            $nav_padding = $nav_paddings / 2;
            $nav_padding_css = '
        .site-main-menu {
            padding: ' . $nav_padding . 'px 0;
        }
        ';
        }
    } else {
        $logo_text_css = '';
        $nav_padding_css = '';
    }

    if ($move_effect == "yes") {
    $bg_wp = get_background_image();
    $move_effect_css = '
    .lm-animated-bg {
        position: absolute;
        width: auto;
        height: auto;
        top: -18px;
        left: -18px;
        right: -18px;
        bottom: -18px;
        background-image: url(' . $bg_wp . ');
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        z-index: -1;
    }
    ';
    }




    
    $customization_css = '
        @media only screen and (min-width: ' . $content_max_width_min . 'px){
            .page-container:not(.full-width-container) {
                max-width: ' . $content_max_width . 'px;
                border-radius: ' . $content_area_br . 'px;
                ' . $content_arex_shadow_css . '
            }
        }

        @media only screen and (max-width: ' . $content_max_width_max . 'px) and (min-width: 991px) {
            .page-container:not(.full-width-container) {
                max-width: 94%;
                margin-left: auto;
                margin-right: auto;
                border-radius: ' . $content_area_br . 'px;
                ' . $content_arex_shadow_css . '
            }
        }

        ' . $full_width_mode_css . '

        /* ============================================================================= 
        2. Typography
        ============================================================================= */
        body,
        p {
            font-family: "' . $body_text_font . '", Helvetica, sans-serif;
            font-size: ' . $body_text_size . 'px;
            font-weight: ' . $body_text_weight . ';
            font-style: ' . $body_text_style . ';
            line-height: ' . $body_text_line_height . 'em;
            color: ' . $body_text_color . ';
        }

        .form-control,
        .form-control:focus,
        .has-error .form-control,
        .has-error .form-control:focus {
            font-family: "' . $body_text_font . '", Helvetica, sans-serif;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: "' . $headings_font . '", Helvetica, sans-serif;
            font-weight: ' . $headings_weight . ';
            font-style: ' . $headings_style . ';
            color: ' . $headings_color . ';
        }

        .logo-text, .logo-symbol {
            font-family: "' . $headings_font . '", Helvetica, sans-serif;
        }

        h1 {
            font-size: ' . $h1_size . 'px;
            color: ' . $headings_color . ';
        }
        h2 {
            font-size: ' . $h2_size . 'px;
            color: ' . $headings_color . ';
        }
        h3 {
            font-size: ' . $h3_size . 'px;
            color: ' . $headings_color . ';
        }
        h4 {
            font-size: ' . $h4_size . 'px;
            color: ' . $headings_color . ';
        }
        h5 {
            font-size: ' . $h5_size . 'px;
            color: ' . $headings_color . ';
        }
        h6 {
            font-size: ' . $h6_size . 'px;
            color: ' . $headings_color . ';
        }

        .testimonial-author,
        .info-list li .title {
            font-family: "' . $headings_font . '", Helvetica, sans-serif;
            font-weight: ' . $headings_weight . ';
            font-style: ' . $headings_style . ';
            color: ' . $headings_color . ';
        }

        .timeline-item .item-period,
        .mobile-site-title {
            font-family: "' . $headings_font . '", Helvetica, sans-serif;
        }

        .form-control,
        .form-control:focus,
        .has-error .form-control,
        .has-error .form-control:focus,
        input[type="search"],
        input[type="password"],
        input[type="text"],
        .header-search input.form-control {
            font-family: "' . $body_text_font . '", Helvetica, sans-serif;
            font-weight: ' . $body_text_weight . ';
            font-style: ' . $body_text_style . ';
        }

        .btn-primary, .btn-secondary, button, input[type="button"], input[type="submit"] {
            font-family: "' . $body_text_font . '", Helvetica, sans-serif;
        }


        /* ============================================================================= 
        3. Logo
        ============================================================================= */
        .header-image img {
            ' . $logo_img_height_not_empty . '
            ' . $logo_img_width_not_empty . '
        }


        ' . $logo_text_css . '
        ' . $nav_padding_css . '

        @media only screen and (max-width: 992px) {
            .header-image img {
                max-height: 30px;
            }
        }


        /* ============================================================================= 
        4. Backgrounds
        ============================================================================= */
        body {
            background-color: ' . $body_bg_color . ';
        }

        ' . $move_effect_css . '

        @media only screen and (min-width: 991px) {
            .header.sticked {
                background-color: ' . $main_header_bg_color . ';
            }
        }

        .btn-primary:hover,
        .btn-primary:focus,
        button:hover,
        button:focus,
        input[type="button"]:hover,
        input[type="button"]:focus,
        input[type="submit"]:hover,
        input[type="submit"]:focus,
        .skill-percentage,
        .service-icon,
        .lm-pricing .lm-package-wrap.highlight-col .lm-heading-row span:after,
        .portfolio-page-nav > div.nav-item a:hover,
        .testimonials.owl-carousel .owl-nav .owl-prev:hover,
        .testimonials.owl-carousel .owl-nav .owl-next:hover,
        .clients.owl-carousel .owl-nav .owl-prev:hover,
        .clients.owl-carousel .owl-nav .owl-next:hover,
        .fw-pricing .fw-package-wrap.highlight-col .fw-heading-row span:after,
        .cat-links li a,
        .cat-links li a:hover,
        .calendar_wrap td#today,
        .nothing-found p,
        .blog-sidebar .sidebar-title h4:after,
        .block-title h2:after,
        h3.comment-reply-title:after,
        .portfolio-grid figure .portfolio-preview-desc h5:after,
        .preloader-spinner,
        .info-list li .title:after,
        .header .social-links a:hover,
        .clients.owl-carousel .owl-dot.active span,
        .clients.owl-carousel .owl-dot:hover span,
        .testimonials.owl-carousel .owl-dot.active span,
        .testimonials.owl-carousel .owl-dot:hover span,
        .logo-symbol {
            background-color: ' . $theme_main_color . ';
        }

        .blog-sidebar .sidebar-item {
            background-color: ' . $sidebar_bg_color . ';
        }




        /* ============================================================================= 
        5. Colors
        ============================================================================= */
        a,
        .form-group-with-icon.form-group-focus i,
        .site-title span,
        .header-search button:hover,
        .header-search button:focus,
        .block-title h3 span,
        .header-search button:hover,
        .header-search button:focus,
        .ajax-page-nav > div.nav-item a:hover,
        .project-general-info .fa,
        .comment-author a:hover,
        .comment-list .pingback a:hover,
        .comment-list .trackback a:hover,
        .comment-metadata a:hover,
        .comment-reply-title small a:hover,
        .entry-title a:hover,
        .entry-content .edit-link a:hover,
        .post-navigation a:hover,
        .image-navigation a:hover,
        .portfolio-grid figure i,
        .share-buttons a:hover,
        .info-block-w-icon i,
        .lm-info-block i {
            color: ' . $theme_main_color . ';
        }

        a,
        .entry-meta:not(.entry-tags-share) a:hover {
            color: ' . $links_color . ';
        }

        a:hover,
        .post-navigation .meta-nav:hover {
            color: ' . $links_hover_color . ';
        }

        .wp-block-pullquote.is-style-solid-color {
            background-color: ' . $theme_main_color . ';
        }

        .wp-block-button:not(.is-style-outline) .wp-block-button__link:not(.has-background),
        .wp-block-button.is-style-outline .wp-block-button__link:active,
        .wp-block-button.is-style-outline .wp-block-button__link:focus,
        .wp-block-button.is-style-outline .wp-block-button__link:hover {
            background-color: ' . $theme_main_color . ';
        }




        /* ============================================================================= 
        6. Borders
        ============================================================================= */
        .logo-symbol,
        .btn-primary,
        button,
        input[type="button"],
        input[type="submit"],
        .btn-primary:hover,
        .btn-primary:focus,
        button:hover,
        button:focus,
        input[type="button"]:hover,
        input[type="button"]:focus,
        input[type="submit"]:hover,
        input[type="submit"]:focus,
        .form-control + .form-control-border,
        .timeline-item,
        .timeline-item:before,
        .page-links a:hover,
        .paging-navigation .page-numbers.current,
        .paging-navigation .page-numbers:hover,
        .paging-navigation .page-numbers:focus,
        .portfolio-grid figure .portfolio-preview-desc h5:after,
        .paging-navigation a:hover,
        .skill-container,
        .btn-primary, button, input[type="button"], input[type="submit"],
        .blog-sidebar ul li:before,
        .share-buttons a:hover,
        .testimonials.owl-carousel .owl-nav .owl-prev:hover,
        .testimonials.owl-carousel .owl-nav .owl-next:hover,
        .clients.owl-carousel .owl-nav .owl-prev:hover,
        .clients.owl-carousel .owl-nav .owl-next:hover,
        .wp-block-pullquote,
        .wp-block-button .wp-block-button__link,
        .timeline-item h5.item-period {
            border-color: ' . $theme_main_color . ';
        }


        /* ============================================================================= 
        7. Page Titles and Page Content Area
        ============================================================================= */
        .page-title {
            background-color: ' . $cp_general_bg_color . ';
            border-top-color: ' . $cp_general_borders_color . ';
            border-bottom-color: ' . $cp_general_borders_color . ';
        }

        .page-title h1 {
            color: ' . $cp_general_title_color . ';
            font-size: ' . $cp_general_title_size . 'px;
            font-family: ' . $cp_general_title_font . ', Helvetica, sans-serif;
            font-weight: ' . $cp_general_title_weight . ';
            font-style: ' . $cp_general_title_style . ';
            letter-spacing: ' . $cp_general_title_spacing . 'px;
        }

        .page-title .page-subtitle h4 {
            color: ' . $cp_general_subtitle_color . ';
            font-size: ' . $cp_general_subtitle_size . 'px;
            font-family: ' . $cp_general_subtitle_font . ', Helvetica, sans-serif;
            font-weight: ' . $cp_general_subtitle_weight . ';
            font-style: ' . $cp_general_subtitle_style . ';
            letter-spacing: ' . $cp_general_subtitle_spacing . 'px;
        }

        @media only screen and (max-width: 991px) {
            .page-title h1 {
                font-size: ' . $cp_general_title_size_small . 'px;
            }
        }

        .page-container,
        .custom-page-content .page-content,
        .portfolio-page-content,
        .content-page-with-sidebar .page-content,
        .single-page-content.content-page-with-sidebar .content-area .page-content,
        .single-post .site-content .has-post-thumbnail .post-content {
            background-color: ' . $cp_general_content_bg_color . ';
        }

        .skills-second-style .skill-percentage,
        .skills-first-style .skill-percentage {
            border-color: ' . $cp_general_content_bg_color . ';
        }


        /* ============================================================================= 
        8. Header and Main Menu
        ============================================================================= */
        .site-main-menu li a,
        .site-main-menu li a:hover {
            font-family: "' . $main_menu_font . '", Helvetica, sans-serif;
            font-size: ' . $main_menu_size . 'px;
            font-weight: ' . $main_menu_weight . ';
            font-style: ' . $main_menu_style . ';
            color: ' . $main_menu_color . ';
            letter-spacing: ' . $main_menu_spacing . 'px;
        }

        .site-main-menu > li > a {
            line-height: ' . $main_menu_line_height . 'em;
        }

        /* ============================================================================= 
        9. Footer
        ============================================================================= */
        .site-footer {
            background-color: ' . $footer_bg_color . ';
            border-color: ' . $footer_border_color . ';
        }

        .footer-copyrights p {
            color: ' . $footer_text_color . ';
        }

        .site-footer .footer-social-links li a {
            color: ' . $footer_links_color . ';
        }

        /* ============================================================================= 
        10. Custom Styles
        ============================================================================= */
        ' .$custom_styles . '
    ';


    return apply_filters( 'leven_theme_customizations', $customization_css ); 

}