<?php
/**
 * The template for displaying single posts
 * @package Web-development
 */
get_header(); ?>
<!-- Banner -->
    <div class="banner">
        <img alt="" src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>">
        <div class="banner_text">
             <h1><?php the_title();?></h1>
            <?php web_development_breadcrumbs(); ?>
        </div>
    </div>
    <!-- Banner End -->
    <section class="blog_main_detail layout-set">
        <div class="container">
            <div class="row">
            <?php 
            $custom_class = (get_theme_mod('sidebar_single', 'right') == 'left') ? "9" : ((get_theme_mod('sidebar_single', 'right') == 'right') ? "9" : "12");             
            if ( get_theme_mod( 'sidebar_single','right'  ) == "left" ) { ?>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">                
                  <!-- Sidebar start -->
                  <?php get_sidebar(); ?>
                    <!-- Sidebar end -->
                </div><?php } ?>
                <div class="col-lg-<?php echo esc_attr($custom_class); ?> col-md-<?php echo esc_attr($custom_class); ?> col-sm-12 col-xs-12 ">
                <?php if(have_posts()):?>
                <?php while(have_posts()): the_post();?>
                  <!-- Blog Start -->
                  <div id="post-<?php  the_ID(); ?>" <?php post_class(); ?>>
                    <div class="blog_sec">
                    <?php if ( get_theme_mod( 'single_post_image' ) == "" ) {  ?>
                        <div class="blog_image">
                           <?php if(has_post_thumbnail()):
                                the_post_thumbnail('full'); 
                            endif; ?>
                        </div>
                        <?php } ?>
                        <div class="blog_text">                            
                            <h3 class="post_title"><?php the_title(); ?></h3>
                            <?php if ( get_theme_mod( 'single_post_meta_tag' ) == "" ) {  ?>
                            <div class="cats mb">
                               <?php web_development_entry_meta(); ?>
                            </div>
                            <?php } ?>
                            <div class="blog_details">
                                <p><?php the_content(); ?></p>
                            </div>
                            <?php  wp_link_pages(); ?>
                        </div>
                    </div>
                   </div>
                  <?php endwhile;
                       else : ?>
                  <p> <?php esc_html_e('No posts found','web-development') ?> </p>
                  <?php  endif;
                  /*<!-- Pagignation Start -->*/
                            the_post_navigation( array(
                            'type'  => 'list',
                            'prev_text' =>sprintf('<i class="fa fa-arrow-left" aria-hidden="true"></i> %s',esc_html__( 'Previous', 'web-development' )),
                            'next_text' => sprintf('%s <i class="fa fa-arrow-right" aria-hidden="true"></i>',esc_html__( 'Next', 'web-development' )),
                            'screen_reader_text' => ' ',                         
                            ) ); 
                           
                            ?>
                    <!-- Pagignation End -->
                    <?php if (comments_open() || get_comments_number()) : if ( get_theme_mod( 'single_post_comment_form' ) == "" ) :  ?>
                        <!-- Comment Start -->
                        <div class="comments">
                            <div class="comment_title">
                                <h3 class="title_line"><?php esc_html_e('Company Reviews','web-development'); ?></h3>
                            </div>
                            <?php comments_template(); ?>
                        </div>
                        <div class="comment_main"> </div>
                        <!-- Comment form End -->
                    <?php endif; endif;?>
                </div>
                <?php if ( get_theme_mod( 'sidebar_single','right' ) == "right" ) { ?>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"><!-- Sidebar start -->
                      <?php get_sidebar(); ?>                    
                    </div><!-- Sidebar end -->
                <?php } ?>
            </div>
        </div>
    </section>
<?php get_footer();