<?php
/**
 * Web Development functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Web Development
 */
function web_development_setup() {
	load_theme_textdomain( 'web-development',get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'web-development-blog-image', 750, 500, true );
	add_image_size( 'web-development-portfolio-img', 254, 160, true );
	add_image_size( 'web-development-team-img', 262, 262, true );
	add_image_size( 'web-development-testimonial-img', 58,58, true );
	register_nav_menus( array(
		'primary'    => esc_html__( 'Top Menu', 'web-development' ),
	) );
	add_theme_support( 'html5', array(		
		'gallery',
		'caption',
	) );
	// Add theme support for Custom Logo.
	add_theme_support('custom-header', apply_filters('web_development_custom_header_args', array(
		'default-image'    => get_template_directory_uri().'/assets/images/banner-img.jpeg',
        'default-text-color' => 'fff',
        'width' => 1260,
        'height' => 240,
        'flex-height' => true,
        'header_text' =>true,       
    )));
	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,	
		'header-text' => array( 'site-title', 'site-description' ),
	) );
}
add_action( 'after_setup_theme', 'web_development_setup' );

//
function web_development_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'web_development_set_content_width', 640 );	
}
add_action( 'after_setup_theme', 'web_development_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function web_development_widgets_init() {
	register_sidebar( array(
		'name'          		=> esc_html__( 'Sidebar', 'web-development' ),
		'id'            		=> 'sidebar-1',
		'romana_description'   	=> esc_html__( 'Add widgets here to appear in your sidebar.', 'web-development' ),
		'before_widget' 		=> '<aside id="%1$s" class="widget %2$s" data-aos="fade-up">',
		'after_widget'  		=> '</aside>',
		'before_title'  		=> '<h3 class="widget-title">',
		'after_title'   		=> '</h3>',
	) );
	register_sidebar( array(
		'name'          		=> __( 'Footer 1', 'web-development' ),
		'id'            		=> 'footer-1',
		'romana_description'	=> esc_html__( 'Add widgets here to appear in your footer.', 'web-development' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s footer-list">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<p class="widget-title">',
		'after_title'   		=> '</p>',
	) );
	register_sidebar( array(
		'name'          		=> esc_html__( 'Footer 2', 'web-development' ),
		'id'            		=> 'footer-2',
		'romana_description'   	=> esc_html__( 'Add widgets here to appear in your footer.', 'web-development' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s footer-list">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<p class="footer-title">',
		'after_title'   		=> '</p>',
	) );
	register_sidebar( array(
		'name'          		=> esc_html__( 'Footer 3', 'web-development' ),
		'id'            		=> 'footer-3',
		'romana_description'   	=> esc_html__( 'Add widgets here to appear in your footer.', 'web-development' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s footer-list">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<p class="footer-title">',
		'after_title'   		=> '</p>',
	) );	
}
add_action( 'widgets_init', 'web_development_widgets_init' );
/*
* Theme Breadcrumbs layout set here.
*/
function web_development_breadcrumbs() {
    $web_development_showonhome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $web_development_showcurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    global $post;
    if (is_home() || is_front_page()) {

        if ($web_development_showonhome == 1)
            echo '<ul id="breadcrumbs" class="breadcrumb-menubar"><li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'web-development') . '</a></li></ul>';
    } else {

        echo '<ul id="breadcrumbs" class="breadcrumb-menubar"><li><a href="' . esc_url(home_url('/')). '">' . esc_html__('Home', 'web-development') . '</a> ';
        if (is_category()) {
            $web_development_thisCat = get_category(get_query_var('cat'), false);
            if ($web_development_thisCat->parent != 0)
                echo get_category_parents($web_development_thisCat->parent, TRUE, ' ');
            echo  esc_html__('Archive by category', 'web-development') . ' " ' . single_cat_title('', false) . ' "';
        } elseif (is_search()) {
            echo  esc_html__('Search Results For ', 'web-development') . ' " ' . get_search_query() . ' "';
        } elseif (is_day()) {
            echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ';
            echo '<a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '">' . esc_html(get_the_time('F') ). '</a> ';
            echo  esc_html(get_the_time('d'));
        } elseif (is_month()) {
            echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ';
            echo  esc_html(get_the_time('F')) ;
        } elseif (is_year()) {
            echo esc_html(get_the_time('Y')) ;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $web_development_post_type = get_post_type_object(get_post_type());
                $web_development_slug = $web_development_post_type->rewrite;
                echo '<a href="' . esc_url(home_url('/'. $web_development_slug['slug'] . '/')) .'">' . esc_html($web_development_post_type->labels->singular_name) . '</a>';
                if ($web_development_showcurrent == 1)
                    echo  esc_html(get_the_title()) ;
            } else {
                $web_development_cat = get_the_category();
                $web_development_cat = $web_development_cat[0];
                $web_development_cats = get_category_parents($web_development_cat, TRUE, ' ');
                if ($web_development_showcurrent == 0)
                    $web_development_cats =
                            preg_replace("#^(.+)\s\s$#", "$1", $web_development_cats);
                echo $web_development_cats;
                if ($web_development_showcurrent == 1)
                    echo  esc_html(get_the_title());
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $web_development_post_type = get_post_type_object(get_post_type());
            echo esc_html($web_development_post_type->labels->singular_name );
        } elseif (is_attachment()) {
            $web_development_parent = get_post($post->post_parent);
            $web_development_cat = get_the_category($web_development_parent->ID);
            $web_development_cat = $web_development_cat[0];
            echo get_category_parents($web_development_cat, TRUE, '  ');
            echo '<a href="' . esc_url(get_permalink($web_development_parent)) . '">' . esc_html($web_development_parent->post_title) . '</a>';
            if ($web_development_showcurrent == 1)
                echo   esc_html(get_the_title());
        } elseif (is_page() && !$post->post_parent) {
            if ($web_development_showcurrent == 1)
                echo esc_html(get_the_title());
        } elseif (is_page() && $post->post_parent) {
            $web_development_parent_id = $post->post_parent;
            $web_development_breadcrumbs = array();
            while ($web_development_parent_id) {
                $web_development_page = get_page($web_development_parent_id);
                $web_development_breadcrumbs[] = '<a href="' . esc_url(get_permalink($web_development_page->ID)) . '">' . esc_html(get_the_title($web_development_page->ID)) . '</a>';
                $web_development_parent_id = $web_development_page->post_parent;
            }
            $web_development_breadcrumbs = array_reverse($web_development_breadcrumbs);
            for ($web_development_i = 0; $web_development_i < count($web_development_breadcrumbs); $web_development_i++) {
                echo $web_development_breadcrumbs[$web_development_i];
                if ($web_development_i != count($web_development_breadcrumbs) - 1)
                    echo ' ';
            }
            if ($web_development_showcurrent == 1)
                echo esc_html(get_the_title());
        } elseif (is_tag()) {
            echo  esc_html__('Posts tagged', 'web-development') . ' " ' . esc_html(single_tag_title('', false)) . ' "';
        } elseif (is_author()) {
            global $author;
            $web_development_userdata = get_userdata($author);
            echo  esc_html__('Articles Published by', 'web-development') . ' " ' . esc_html($web_development_userdata->display_name ). ' "';
        } elseif (is_404()) {
            echo esc_html__('Error 404', 'web-development') ;
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            printf( /* translators: %s is search query variable*/ esc_html__(' ( Page %s )', 'web-development'),esc_html(get_query_var('paged')) );
        }
        echo '</li></ul>';
    }
}
if ( ! function_exists( 'web_development_entry_meta' ) ) :

// Post meta descirption get from here.
function web_development_entry_meta() {

	$web_development_tag_list = get_the_tag_list('', ', ');

	$web_development_date = sprintf( '<span><i class="mrd fa fa-clock-o"></i> <a href="%1$s" title="%2$s" ><time datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date() ),
		esc_html( get_the_date() )
	);
	/* translators: 1: author post url, 2: Author name, 3:author name */
	$web_development_author = sprintf( '<span><i class="mrd fa fa-user"></i> <a href="%1$s" title="%2$s" >%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		/* translators: 1: author name,*/
		esc_attr( sprintf( esc_html__( 'View all posts by %s', 'web-development' ), get_the_author() ) ),
		get_the_author()
	);
	if ( $web_development_tag_list ) {
		/* translators: 1: category name, 2: date time, 3: post author */
		$web_development_utility_text = esc_html__( 'Posted  on %2$s by : %3$s  Tags: %1$s', 'web-development' );
	} else {
		/* translators: 1: date time, 2: author name */
		$web_development_utility_text = esc_html__( 'Posted on : %2$s by : %3$s ', 'web-development' );
	}		
	
	printf(
		$web_development_utility_text,
		$web_development_tag_list,
		$web_development_date,
		$web_development_author
	);  
   }

endif;
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function web_development_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo( 'pingback_url' )) );
	}
}
add_action( 'wp_head', 'web_development_pingback_header' );

// Remove Comment Website Field
add_filter('comment_form_default_fields', 'web_development_remove_url');
function web_development_remove_url($val) {
    $val['url'] = '';
    return $val;    
}

// Comment Form Fields Placeholder
function web_development_comment_form_fields( $fields ) {
	foreach( $fields as &$field ) {
		$field = str_replace( 'id="author"', 'id="author" placeholder="'.esc_attr__('Your Name *','web-development').'"', $field );
		$field = str_replace( 'id="email"', 'id="email" placeholder="'.esc_attr__('Your Email *','web-development').'"', $field );
	}
	return $fields;
}
add_filter( 'comment_form_default_fields', 'web_development_comment_form_fields' );

// Change comment form textarea to use placeholder
function web_development_comment_textarea_placeholder( $args ) {
	$args['comment_field']   = str_replace( 'textarea', 'textarea placeholder="'.esc_attr__('Your Message *','web-development').'"', $args['comment_field'] );
	return $args;
}
add_filter( 'comment_form_defaults', 'web_development_comment_textarea_placeholder' );

// Change comment form Submit button text
function web_development_change_comment_form_submit_label($arg) {
$arg['label_submit'] = esc_html__('Submit','web-development');
return $arg;
}
add_filter('comment_form_defaults', 'web_development_change_comment_form_submit_label');

//comment format set here.
if ( ! function_exists( 'web_development_comment' ) ) :
function web_development_comment( $comment, $args, $depth ) {
	switch ( $comment->comment_type ) :
	case 'pingback' :
	case 'trackback' :
		// Display trackbacks differently than normal comments.?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		  <p><?php esc_html_e( 'Pingback:', 'web-development' ); ?>
		    <?php comment_author_link(); ?>
		    <?php edit_comment_link( esc_html__( 'Edit', 'web-development' ), '<span class="edit-link">', '</span>' ); ?>
		  </p>
		</li>
		<?php
		break;
		default :
		// Proceed with normal comments.
		if($comment->comment_approved == 1)
		{
		global $post; ?>
		<div class="comments-list">
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			  <article id="comment-<?php comment_ID(); ?>" class="comment ">
			  <div class="right-img">
			    <figure class="avtar"> <a href="#"><?php echo get_avatar( get_the_author_meta(), '80'); ?></a> </figure>
			    </div>
			    <div class="txt-holder">
			    <?php
			    printf( '<b class="fn">%1$s',
			    get_comment_author_link(),
			    ( $comment->user_id === $post->post_author ) ? '<span>' . esc_html__( 'Post author ', 'web-development' ) . '</span>' : ''
			    );
				echo ' '.get_comment_date().'</b>'; ?>
					<div class="comment-content comment">
						<?php comment_text();
					  	echo '<a href="#" class="reply pull-right">'.comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<i class="fa fa-reply-all" aria-hidden="true"></i> Reply', 'web-development' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ).'</a>'; ?>
					</div>
				<!-- .comment-content --> 
				</div>
			    <!-- .txt-holder --> 
			 </article>
			</li>
		</div>
		 <!-- #comment-## -->
		<?php }
		break;
		endswitch; // end comment_type check
	}
endif;

// Replaces the excerpt "Read More" text by a link
function web_development_excerpt_more($more) {
    global $post;
    if(is_admin()){
		return $more;
	}
    if ( get_theme_mod( 'post_readmore' ) == "" ) { 
		return '<a class="read-more" href="'.esc_url(get_permalink($post->ID)). '">'.esc_html__("Read More", "web-development").'</a>';
	}
}
add_filter('excerpt_more', 'web_development_excerpt_more');

// Post Excerpt length
function web_development_excerpt_length( $length ) {
	if(is_admin()){
		return $length;
	}
	return absint(get_theme_mod('post_content_limit', 40));
}
add_filter( 'excerpt_length', 'web_development_excerpt_length', 999 );

// Header background image
if ( ! function_exists( 'web_development_header_image' ) ) :
function web_development_header_image()
{ ?>
	<img alt="" src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>">
<?php 
}
endif;
add_filter('get_custom_logo','web_development_change_logo_class');
function web_development_change_logo_class($html)
{
    $html = str_replace('class="custom-logo"', 'class="img-responsive logo-light"', $html);
    $html = str_replace('width=', 'original-width=', $html);
    $html = str_replace('height=', 'original-height=', $html);
    $html = str_replace('class="custom-logo-link"', 'class="img-responsive logo-light"', $html);
    return $html;
}
add_action( 'admin_menu', 'web_development_admin_menu');
function web_development_admin_menu( ) {
    add_theme_page( __('Pro Feature','web-development'), __('Web Development Pro','web-development'), 'manage_options', 'web-development-pro-buynow', 'web_development_pro_buy_now', 300 ); 
  
}
function web_development_pro_buy_now(){ ?>  
  <div class="web_development_pro_version">
  <a href="<?php echo esc_url('https://voilathemes.com/wordpress-themes/web-development-pro/'); ?>" target="_blank">
    <img src ="<?php echo esc_url(get_template_directory_uri().'/assets/images/web-development-pro-feature.png') ?>" width="70%" height="auto" />
  </a>
</div>
<?php }
// Customizer Options
include get_template_directory().'/inc/theme-customization.php';
include get_template_directory().'/inc/enqueues.php';
include get_template_directory().'/inc/class-tgm-plugin-activation.php';
include get_template_directory().'/inc/template-setup.php';