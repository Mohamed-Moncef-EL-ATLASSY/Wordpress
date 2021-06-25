<?php if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );
/**
 * Include static files: javascript and css
 */

if ( is_admin() ) {
    return;
}

wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css',array(),'4.0.0');
wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css',array(),'1.0');
wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css',array(),'2.0');
wp_enqueue_style('animate', get_template_directory_uri() .  '/css/transition-animations.css',array(),'1.0');
wp_enqueue_style('magnific-popup', get_template_directory_uri() .  '/css/magnific-popup.css',array(),'1.1.0');
wp_enqueue_style('pe-icon-7-stroke', get_template_directory_uri() .  '/css/pe-icon-7-stroke/css/pe-icon-7-stroke.css',array(),'1.0');
if ( ! defined( 'FW' ) ) {
    wp_enqueue_style('font-awesome', get_template_directory_uri() .  '/css/font-awesome/css/font-awesome.css',array(),'4.1.0');
}
if ( defined( 'FW' ) ) {
    fw()->backend->option_type('icon-v2')->packs_loader->enqueue_frontend_css();
}
wp_enqueue_style('leven-main-styles', get_template_directory_uri().'/css/main.css',array(),'1.5.3');

$theme_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('theme_style_picker') :  'light';
if( $theme_style == 'dark' ) {
    wp_enqueue_style('leven-dark-styles', get_template_directory_uri().'/css/dark-styles.css',array(),'1.5.3');
}

wp_enqueue_style('leven-customization', get_template_directory_uri().'/css/customization.css',array(),'1.5.3');
require_once get_parent_theme_file_path( '/inc/customization.php' );
wp_add_inline_style( 'leven-customization', leven_theme_customizations() );

/** Add Scripts in to the Head **/
wp_enqueue_script('jquery');
/** /Add Scripts in to the Head **/
wp_enqueue_script('modernizr', get_template_directory_uri().'/js/modernizr.custom.js',array(),'2.8.3',true);
wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js',array(),'4.0.0',true);
wp_enqueue_script('owl-carousel', get_template_directory_uri().'/js/owl.carousel.min.js',array(),'2.0',true);
wp_enqueue_script('leven-jquery-validator', get_template_directory_uri().'/js/validator.js',array(),'1.0',true);
wp_enqueue_script('imagesloaded');
wp_enqueue_script('shuffle', get_template_directory_uri().'/js/jquery.shuffle.min.js',array(),'3.1.1',true);
wp_enqueue_script('masonry');
wp_enqueue_script('magnific-popup', get_template_directory_uri().'/js/jquery.magnific-popup.min.js',array(),'1.1.0',true);
wp_enqueue_script('leven-jquery-main', get_template_directory_uri().'/js/main.js',array(),'1.5.3',true);

if ( is_singular(array('post')) && comments_open() ){
  wp_enqueue_script('comment-reply');
}
