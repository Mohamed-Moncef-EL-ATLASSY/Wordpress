<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Filters and Actions
 */

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 * @internal
 */
function leven_action_theme_admin_fonts() {
	wp_enqueue_style( 'fw-theme-lato', leven_theme_font_url(), array(), '1.0' );
}

add_action( 'admin_print_scripts-appearance_page_custom-header', 'leven_action_theme_admin_fonts' );

add_action( 'admin_enqueue_scripts', 'leven_load_admin_styles' );
function leven_load_admin_styles() {
    wp_enqueue_style( 'admin_css_foo', get_template_directory_uri() . '/css/admin-style.css', false, '1.0' );
}

if ( ! function_exists( 'leven_action_theme_setup' ) ) : /**
 * Theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 * @internal
 */ {
	function leven_action_theme_setup() {

		/*
		 * Make Theme available for translation.
		 */
		load_theme_textdomain( 'leven', get_template_directory() . '/languages' );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'custom-background');
        add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 811, 372, true );
		add_image_size( 'leven-theme-full-width', 1240, 576, true );

        add_theme_support( 'admin-bar', array( 'callback'=>'__return_false' ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );
	}
}
endif;
add_action( 'init', 'leven_action_theme_setup' );

/**
 * Adjust content_width value for image attachment template.
 * @internal
 */
function leven_action_theme_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}

add_action( 'template_redirect', 'leven_action_theme_content_width' );

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 *
 * @param array $classes A list of existing body class values.
 *
 * @return array The filtered body class list.
 * @internal
 */
function leven_filter_theme_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} else {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( function_exists('fw_ext_sidebars_get_current_position') ) {
		$current_position = fw_ext_sidebars_get_current_position();
		if ( in_array( $current_position, array( 'full', 'left' ) )
		     || empty($current_position)
		     || is_attachment()
		) {
			$classes[] = 'full-width';
		}
	} else {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}

	return $classes;
}

add_filter( 'body_class', 'leven_filter_theme_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @param array $classes A list of existing post class values.
 *
 * @return array The filtered post class list.
 * @internal
 */
function leven_filter_theme_post_classes( $classes ) {
	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}

add_filter( 'post_class', 'leven_filter_theme_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 *
 * @return string The filtered title.
 * @internal
 */
function leven_filter_theme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'leven' ), max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', 'leven_filter_theme_wp_title', 10, 2 );


/**
 * Flush out the transients used in fw_theme_categorized_blog.
 * @internal
 */
function leven_action_theme_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'fw_theme_category_count' );
}

add_action( 'edit_category', 'leven_action_theme_category_transient_flusher' );
add_action( 'save_post', 'leven_action_theme_category_transient_flusher' );

/**
 * Theme Customizer support
 */
{
	/**
	 * Implement Theme Customizer additions and adjustments.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 *
	 * @internal
	 */
	function leven_action_theme_customize_register( $wp_customize ) {
        $wp_customize->remove_section("colors");
		// Add postMessage support for site title and description.
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		// Rename the label to "Site Title Color" because this only affects the site title in this theme.
		$wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Site Title Color', 'leven' );

		// Rename the label to "Display Site Title & Tagline" in order to make this option extra clear.
		$wp_customize->get_control( 'display_header_text' )->label = esc_html__( 'Display Site Title &amp; Tagline', 'leven' );
	}

	add_action( 'customize_register', 'leven_action_theme_customize_register' );

	/**
	 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
	 * @internal
	 */
	function leven_action_theme_customize_preview_js() {
		wp_enqueue_script(
			'fw-theme-customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'1.0',
			true
		);
	}

	add_action( 'customize_preview_init', 'leven_action_theme_customize_preview_js' );
}

/**
 * Register widget areas.
 * @internal
 */
function leven_action_theme_widgets_init() {
    register_sidebar(
        array(
            'name' => esc_html__('Blog Page Sidebar','leven'),
            'id'   => 'leven-blog-sidebar',
            'description'   => esc_html__('Leven Theme Blog Page Sidebar','leven'),
            'before_widget' => '<div class="sidebar-item">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="sidebar-title"><h4>',
            'after_title'   => '</h4></div>'
        )
    );
}

add_action( 'widgets_init', 'leven_action_theme_widgets_init' );

if ( defined( 'FW' ) ):
	/**
	 * Display current submitted FW_Form errors
	 * @return array
	 */
	if ( ! function_exists( '_action_theme_display_form_errors' ) ):
		function leven_action_theme_display_form_errors() {
			$form = FW_Form::get_submitted();

			if ( ! $form || $form->is_valid() ) {
				return;
			}

			wp_enqueue_script(
				'fw-theme-show-form-errors',
				get_template_directory_uri() . '/js/form-errors.js',
				array( 'jquery' ),
				'1.0',
				true
			);

			wp_localize_script( 'fw-theme-show-form-errors', '_localized_form_errors', array(
				'errors'  => $form->get_errors(),
				'form_id' => $form->get_id()
			) );
		}
	endif;
	add_action('wp_enqueue_scripts', 'leven_action_theme_display_form_errors');
endif;


add_filter('fw:option_type:icon-v2:packs', 'leven_add_peicon_pack');
function leven_add_peicon_pack($default_packs) {
    /**
     * No fear. Defaults packs will be merged in back. You can't remove them.
     * Changing some flags for them is allowed.
     */
    return array(
      'my_pack' => array(
        'name' => 'my_pack',
        'title' => 'Pe icon 7 stroke',
        'css_class_prefix' => '',
        'css_file' => get_template_directory() . ('/css/pe-icon-7-stroke/css/pe-icon-7-stroke.css'),
        'css_file_uri' => get_template_directory_uri() . ('/css/pe-icon-7-stroke/css/pe-icon-7-stroke.css'),
      )
    );
}

function unique_filter_theme_new_icon_set($sets) {
    $sets['icon-7-stroke'] = array(
        'font-style-src' => get_template_directory_uri() . ('/css/pe-icon-7-stroke/css/pe-icon-7-stroke.css'),
        'container-class' => '', // some fonts need special wrapper class to display properly
        'groups' => array(
            'pe-icon-7-stroke' => esc_html__('Pe icon 7 stroke', 'leven'),
        ),
        'icons' => array(
            'pe-7s-album' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-arc' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-back-2' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-bandaid' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-car' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-diamond' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-door-lock' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-eyedropper' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-female' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-gym' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-hammer' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-headphones' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-helm' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-hourglass' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-leaf' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-magic-wand' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-male' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-map-2' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-next-2' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-paint-bucket' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-pendrive' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-photo' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-piggy' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-plugin' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-refresh-2' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-rocket' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-settings' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-shield' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-smile' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-usb' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-vector' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-wine' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-cloud-upload' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-cash' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-close' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-bluetooth' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-cloud-download' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-way' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-close-circle' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-id' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-angle-up' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-wristwatch' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-angle-up-circle' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-world' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-angle-right' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-volume' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-angle-right-circle' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-users' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-angle-left' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-user-female' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-angle-left-circle' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-up-arrow' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-angle-down' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-switch' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-angle-down-circle' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-scissors' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-wallet' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-safe' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-volume2' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-volume1' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-voicemail' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-video' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-user' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-upload' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-unlock' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-umbrella' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-trash' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-tools' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-timer' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-ticket' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-target' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-sun' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-study' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-stopwatch' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-star' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-speaker' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-signal' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-shuffle' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-shopbag' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-share' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-server' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-search' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-film' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-science' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-disk' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-ribbon' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-repeat' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-refresh' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-add-user' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-refresh-cloud' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-paperclip' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-radio' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-note2' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-print' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-network' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-prev' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-mute' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-power' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-medal' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-portfolio' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-like2' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-plus' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-left-arrow' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-play' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-key' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-plane' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-joy' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-photo-gallery' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-pin' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-phone' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-plug' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-pen' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-right-arrow' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-paper-plane' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-delete-user' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-paint' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-bottom-arrow' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-notebook' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-note' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-next' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-news-paper' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-musiclist' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-music' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-mouse' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-more' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-moon' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-monitor' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-micro' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-menu' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-map' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-map-marker' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-mail' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-mail-open' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-mail-open-file' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-magnet' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-loop' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-look' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-lock' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-lintern' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-link' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-like' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-light' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-less' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-keypad' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-junk' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-info' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-home' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-help2' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-help1' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-graph3' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-graph2' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-graph1' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-graph' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-global' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-gleam' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-glasses' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-gift' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-folder' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-flag' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-filter' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-file' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-expand1' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-exapnd2' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-edit' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-drop' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-drawer' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-download' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-display2' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-display1' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-diskette' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-date' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-cup' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-culture' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-crop' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-credit' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-copy-file' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-config' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-compass' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-comment' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-coffee' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-cloud' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-clock' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-check' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-chat' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-cart' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-camera' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-call' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-calculator' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-browser' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-box2' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-box1' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-bookmarks' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-bicycle' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-bell' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-battery' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-ball' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-back' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-attention' => array('group' => 'pe-icon-7-stroke'),

            'pe-7s-anchor' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-albums' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-alarm' => array('group' => 'pe-icon-7-stroke'),
            'pe-7s-airplay' => array('group' => 'pe-icon-7-stroke'),
        ),
    );

    return $sets;
}
add_filter('fw_option_type_icon_sets', 'unique_filter_theme_new_icon_set');



/**
 * Megamenu icons set
 */
function unique_filter_mega_menu_icon_customizations($option) {
    $option['type'] = 'icon-v2';

    return $option;
}
add_filter( 'fw:ext:megamenu:icon-option', 'unique_filter_mega_menu_icon_customizations' );



/**
 * Enqueue Google fonts style to frontend.
 */

if (!defined('FW')) {
    function leven_action_theme_process_google_fonts_default()
    {
        // this array contain default theme fonts
        $include_from_google = array(
            'Poppins' => array(
                'family' => 'Poppins',
                'variants' => array(
                    '0' => '300',
                    '1' => 'regular',
                    '2' => '500',
                    '3' => '600',
                    '4' => '700',
                    '5' => '800'
                ),
                'position' => 11278
            )
        );

        $google_fonts_links = leven_theme_get_remote_fonts($include_from_google);
        // set an array of google fonts in db
        if($google_fonts_links == ''){
            update_option( 'leven_theme_google_fonts_link', $google_fonts_links );
        }
    }

    add_action('after_setup_theme', 'leven_action_theme_process_google_fonts_default', 999, 2);
}


if(!function_exists('leven_action_theme_process_google_fonts')) {
    function leven_action_theme_process_google_fonts()
    {
        $include_from_google = array();
        $google_fonts = fw_get_google_fonts();

        $body_typography = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('body_typography') :  'Poppins';
        $headings_typography = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('headings') :  'Poppins';

        $main_menu_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('main_menu_font') :  'Poppins';
        $cp_title_general_title_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_title_font') :  'Poppins';
        $cp_title_general_subtitle_font = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('cp_title_general_subtitle_font') : 'Poppins';

        // if is google font
        if( isset($google_fonts[$body_typography['family']]) ){
            $include_from_google[$body_typography['family']] =   $google_fonts[$body_typography['family']];
        }

        if( isset($google_fonts[$headings_typography['family']]) ){
            $include_from_google[$headings_typography['family']] =   $google_fonts[$headings_typography['family']];
        }

        if( isset($google_fonts[$main_menu_font['family']]) ){
            $include_from_google[$main_menu_font['family']] =   $google_fonts[$main_menu_font['family']];
        }

        if( isset($google_fonts[$cp_title_general_title_font['family']]) ){
            $include_from_google[$cp_title_general_title_font['family']] =   $google_fonts[$cp_title_general_title_font['family']];
        }

        if( isset($google_fonts[$cp_title_general_subtitle_font['family']]) ){
            $include_from_google[$cp_title_general_subtitle_font['family']] =   $google_fonts[$cp_title_general_subtitle_font['family']];
        }

        $google_fonts_links = leven_theme_get_remote_fonts($include_from_google);
        // set a option in db for save google fonts link
        update_option( 'leven_theme_google_fonts_link', $google_fonts_links );
    }
    add_action('fw_settings_form_saved', 'leven_action_theme_process_google_fonts', 999, 2);
}

if (!function_exists('leven_theme_get_remote_fonts')) :
    function leven_theme_get_remote_fonts($include_from_google) {
        /**
         * Get remote fonts
         * @param array $include_from_google
         */
        if ( ! sizeof( $include_from_google ) ) {
            return '';
        }

        $protocol  = is_ssl() ? 'https' : 'http';

        $html = "{$protocol}://fonts.googleapis.com/css?family=";

        foreach ( $include_from_google as $font => $styles ) {
            $html .= str_replace( ' ', '+', $font ) . ':' . implode( ',', $styles['variants'] ) . '%7C';
        }

        $html = substr( $html, 0, - 3 );

        return $html;
    }
endif;

if (!function_exists('leven_action_theme_enqueue_google_fonts_styles')) :
    function leven_action_theme_enqueue_google_fonts_styles() {
        /**
         * Enqueue google fonts styles
         */
        $google_fonts_link = get_option('leven_theme_google_fonts_link', '');
        if($google_fonts_link != ''){
            wp_enqueue_style( 'leven-google-fonts', $google_fonts_link, array(), null);
        }
    }
    add_action('wp_head', 'leven_action_theme_enqueue_google_fonts_styles', 1);
endif;




/**
 * Porfolio detailed page Ajax query.
 */

function leven_ajax_query() {
    // Return normally if the ajax query isn't set
    if ( ! isset( $_GET['ajax'] ) ) {
        return;
    }

    set_query_var( 'ajax', 'true' );
}

add_filter( 'template_redirect', 'leven_ajax_query' );

function leven_add_anchor( $atts, $item, $args ) {

    $atts['href'] .= ( !empty( $item->xfn ) ? '#' . $item->xfn : '' );
    $atts['data-hover'] = '1';

    return $atts;

}

add_filter( 'nav_menu_link_attributes', 'leven_add_anchor', 10, 3 );


function leven_excerpt_more( $more ) {
    if ( ! is_single() ) {
        $more = sprintf( '...<p><a class="read-more" href="%1$s">%2$s</a></p>',
            get_permalink( get_the_ID() ),
            esc_html__( 'Read More', 'leven' )
        );
    }
 
    return $more;
}
add_filter( 'excerpt_more', 'leven_excerpt_more' );


function leven_filter_theme_fw_ext_backups_demo_dirs($dirs) {
    $dirs[get_template_directory() .'/framework-customizations/demo-content']
    = get_template_directory_uri() .'/framework-customizations/demo-content';

    return $dirs;
}
add_filter('fw_ext_backups_demo_dirs', 'leven_filter_theme_fw_ext_backups_demo_dirs');