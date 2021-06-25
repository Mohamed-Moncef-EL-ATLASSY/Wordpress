<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/**
 * Theme Includes
 */
require_once get_template_directory() .'/inc/init.php';



/**
 * TGM Plugin Activation
 */
{
	require_once  get_template_directory() . '/TGM-Plugin-Activation/class-tgm-plugin-activation.php';

	add_action( 'tgmpa_register', 'leven_register_required_plugins' );

	/** @internal */
	function leven_register_required_plugins() {
		tgmpa( array(
			array(
				'name'      => 'Unyson',
				'slug'      => 'unyson',
				'required'  => true,
			),
			array(
				'name'               => 'Leven Shortcodes', // The plugin name.
				'slug'               => 'leven-shortcodes', // The plugin slug (typically the folder name).
				'source'             => get_template_directory_uri() . '/plugins/leven-shortcodes.zip', // The plugin source.
				'required'           => true,
				'version'            => '1.5.1',
			),
			array(
				'name'               => 'Leven Portfolio', // The plugin name.
				'slug'               => 'leven-portfolio', // The plugin slug (typically the folder name).
				'source'             => get_template_directory_uri() . '/plugins/leven-portfolio.zip', // The plugin source.
				'required'           => true,
				'version'            => '1.0.0',
			),
			array(
				'name'               => 'Leven Share Buttons', // The plugin name.
				'slug'               => 'leven-share-buttons', // The plugin slug (typically the folder name).
				'source'             => get_template_directory_uri() . '/plugins/leven-share-buttons.zip', // The plugin source.
				'required'           => true,
				'version'            => '1.1.0',
			),
			array(
				'name'               => 'Leven Tracking, External CSS and JS', // The plugin name.
				'slug'               => 'leven-tracking-and-external-css', // The plugin slug (typically the folder name).
				'source'             => get_template_directory_uri() . '/plugins/leven-tracking-and-external-css.zip', // The plugin source.
				'required'           => true,
				'version'            => '1.0.0',
			),
			array(
				'name'               => 'Leven Contact Form', // The plugin name.
				'slug'               => 'leven-contact-form', // The plugin slug (typically the folder name).
				'source'             => get_template_directory_uri() . '/plugins/leven-contact-form.zip', // The plugin source.
				'required'           => true,
				'version'            => '1.1.0',
			),
			array(
				'name'               => 'Envato Market', // The plugin name.
				'slug'               => 'envato-market', // The plugin slug (typically the folder name).
				'source'             => get_template_directory_uri() . '/plugins/envato-market.zip', // The plugin source.
				'required'           => false,
				'version'            => '2.0.3',
			),
		) );

	}
}

/* ================================================================================================ */



/**
 * LMPixels ajax url
 */

if( ! function_exists( 'leven_ajaxurl' ) ){
  function leven_ajaxurl() {
  	$inline_ajax_script = 'var ajaxurl = ' . '"' . admin_url('admin-ajax.php') . '"' . ';';
  	wp_add_inline_script( 'leven-jquery-main', $inline_ajax_script);
  }
}
add_action('wp_head','leven_ajaxurl');

/* ================================================================================================ */



/**
 * Content Width
 */
if ( ! isset( $content_width ) ) $content_width = 1320;
/* ================================================================================================ */

function leven_add_post_class_to_single_post( $classes ) {
	if ( is_single() ) {
		array_push( $classes, 'single-post' );
	}
	return $classes;
}
add_filter( 'body_class', 'leven_add_post_class_to_single_post' );


function leven_setup_theme_supported_features() {
    $google_fonts_link = get_option('leven_theme_google_fonts_link', '');
    $theme_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('theme_style_picker') :  'light';

    add_theme_support( 'editor-styles');
    add_theme_support( 'responsive-embeds' );
    add_editor_style( 'css/style-editor.css' );
    add_editor_style( $google_fonts_link );

    if( $theme_style == 'dark' ) {
        add_theme_support( 'dark-editor-style' );
    }

    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'Cornflower Blue', 'leven' ),
            'slug' => 'cornflower-blue',
            'color' => '#7066ff',
        ),
        array(
            'name' => esc_html__( 'Emerald', 'leven' ),
            'slug' => 'emerald',
            'color' => '#54ca95',
        ),
        array(
            'name' => esc_html__( 'Shakespeare', 'leven' ),
            'slug' => 'shakespeare',
            'color' => '#55c0ce',
        ),
        array(
            'name' => esc_html__( 'Persimmon', 'leven' ),
            'slug' => 'persimmon',
            'color' => '#fc6158',
        ),
        array(
            'name' => esc_html__( 'Azure Radiance', 'leven' ),
            'slug' => 'azure-radiance',
            'color' => '#007ced',
        ),
        array(
            'name' => esc_html__( 'Neon Carrot', 'leven' ),
            'slug' => 'neon-carrot',
            'color' => '#ff9638',
        ),
        array(
            'name' => esc_html__( 'Burnt Sienna', 'leven' ),
            'slug' => 'burnt-sienna',
            'color' => '#ef5555',
        ),
        array(
            'name' => esc_html__( 'Blue Bayoux', 'leven' ),
            'slug' => 'blue-bayoux',
            'color' => '#4a6583',
        ),
        array(
            'name' => esc_html__( 'Cerulean', 'leven' ),
            'slug' => 'cerulean',
            'color' => '#0099e5',
        ),
        array(
            'name' => esc_html__( 'Saffron', 'leven' ),
            'slug' => 'saffron',
            'color' => '#f8b732',
        ),
        array(
            'name' => esc_html__( 'Java', 'leven' ),
            'slug' => 'java',
            'color' => '#10b9b2',
        ),
        array(
            'name' => esc_html__( 'Carnation', 'leven' ),
            'slug' => 'carnation',
            'color' => '#ef5565',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'leven' ),
            'slug' => 'very-light-gray',
            'color' => '#f5f5f5',
        ),
        array(
            'name' => esc_html__( 'light gray', 'leven' ),
            'slug' => 'light-gray',
            'color' => '#e5e5e5',
        ),
        array(
            'name' => esc_html__( 'dark gray', 'leven' ),
            'slug' => 'dark-gray',
            'color' => '#555',
        ),
        array(
            'name' => esc_html__( 'very dark gray', 'leven' ),
            'slug' => 'very-dark-gray',
            'color' => '#333',
        ),
    ) );

    add_theme_support( 'disable-custom-colors' );
    add_theme_support( 'align-wide' );
}

add_action( 'after_setup_theme', 'leven_setup_theme_supported_features' );

/**
 * Enqueue supplemental block editor styles.
 */

if ( function_exists( 'register_block_type' ) && is_admin() ) {
    function leven_theme_settings_styles() {
        wp_enqueue_style( 'leven-editor-theme-settings-styles', get_theme_file_uri( '/css/style-editor-dynamic.css' ), false, '2.2', 'all' );
        require_once get_parent_theme_file_path( '/inc/dynamic-styles.php' );
        wp_add_inline_style( 'leven-editor-theme-settings-styles', leven_theme_settings_css() );
    }
    add_action( 'enqueue_block_editor_assets', 'leven_theme_settings_styles' );
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function leven_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'leven_pingback_header' );


if (!function_exists('_disable_fw_use_sessions')) { add_filter('fw_use_sessions','_disable_fw_use_sessions'); function _disable_fw_use_sessions(){ return false; } }