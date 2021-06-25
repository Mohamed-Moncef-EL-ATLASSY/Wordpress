<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */

$move_effect = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('move_effect') :  'no'; 
$full_width = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('full_width_mode') :  'no';
$page_transition = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('transition_effect') :  'transition-flip-in-right';
$scroll_totop = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('scroll_totop') :  'no';
$theme_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('theme_style_picker') :  'light';
if (is_customize_preview()) {
    $move_effect = "no";
}
if ($move_effect == "yes") {
    remove_theme_support( 'custom-background' );
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="profile" href="//gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 
if ($move_effect == "yes") { ?>
<div class="lm-animated-bg"></div>
    <?php
}
?>

<!-- Loading animation -->
<div class="preloader">
  <div class="preloader-animation">
    <div class="preloader-spinner">
    </div>
  </div>
</div>
<!-- /Loading animation -->

<!-- Scroll To Top Button -->
<?php 
if ($scroll_totop == "yes") { ?>
<div class="lmpixels-scroll-to-top"><i class="lnr lnr-chevron-up"></i></div>
<?php
}
?>
<!-- /Scroll To Top Button -->

<div class="page-scroll">
    <div id="page_container" class="page-container<?php if ( $full_width == "yes" ) { ?> full-width-container<?php } ?><?php if ( $move_effect == "yes" ) { ?> bg-move-effect<?php } ?> theme-style-<?php echo esc_attr($theme_style) ?>" data-animation="<?php echo esc_attr($page_transition); ?>">

        <!-- Header -->
        <header id="site_header" class="header">
            <div class="header-content clearfix">
                <?php
                $logo_img = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('photo') : '';
                if( !empty( $logo_img ) ) :
                    $logo_img_alt = get_post_meta($logo_img['attachment_id'], '_wp_attachment_image_alt', true);
                    if (empty($logo_img_alt)) {
                        $logo_img_alt = esc_attr__('image', 'leven');
                    }
                ?>
                <div class="header-image">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url($logo_img['url']); ?>" alt="<?php echo esc_attr($logo_img_alt); ?>">
                    </a>
                </div>
                <?php endif ?>

                <?php
                $text_logo = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('logo') :  get_bloginfo( 'name' );
                $text_logo_symbol = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('logo_symbol') :  substr(get_bloginfo( 'name' ), 0, 1);

                if( !empty( $text_logo ) || !empty( $text_logo_symbol ) ) :
                ?>
                <!-- Text Logo -->
                <div class="text-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php if( !empty( $text_logo_symbol ) && empty( $logo_img ) ) : ?>
                            <div class="logo-symbol"><?php echo esc_html(substr($text_logo_symbol, 0, 1)); ?></div>
                        <?php endif; ?>
                         <?php if( !empty( $text_logo ) ) : ?>
                            <div class="logo-text"><?php echo wp_kses_post($text_logo); ?></div>
                        <?php endif; ?>
                    </a>
                </div>
                <!-- /Text Logo -->
                <?php endif ?>


                <!-- Navigation -->
                <div class="site-nav mobile-menu-hide">
                    <?php
                        if(has_nav_menu('classic-menu')){ wp_nav_menu( array( 'menu_class' => 'leven-classic-menu site-main-menu', 'theme_location' => 'classic-menu', 'container' => '', 'depth' => 2) ); }
                    ?>
                </div>

                <a class="menu-toggle mobile-visible">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </header>
        <!-- /Header -->
