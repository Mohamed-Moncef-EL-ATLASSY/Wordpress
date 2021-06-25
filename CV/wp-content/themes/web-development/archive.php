<?php
/**
 * The template for displaying archive pages like categories, tags, authors, months
 * @package Web-development
 */
get_header(); ?>
<!-- Start banner -->
<div class="banner">
        <!-- Header Background Image -->
        <?php  web_development_header_image(); ?>
        <div class="banner_text">
        <h1> <?php if ( is_day() ) :            
                printf( /* translators: %s is date*/ esc_html__( 'Daily Archives: %s','web-development' ), get_the_date() );
            elseif ( is_month() ) :
                printf( /* translators: %s is month and year*/ esc_html__( 'Monthly Archives: %s','web-development' ), get_the_date('F Y') );
            elseif ( is_year() ) :
                printf( /* translators: %s is year*/ esc_html__( 'Yearly Archives: %s','web-development' ), get_the_date('Y') );
            else :                
                esc_html_e( 'Archives', 'web-development' );
            endif;  ?> 
        </h1>
    <?php  web_development_breadcrumbs(); ?>
    </div>
</div>
<!-- End banner -->
<section class="blog_main layout-set">
    <div class="container">
        <div class="row">
            <?php 
            $custom_class = (get_theme_mod('sidebar_layout', 'right') == 'left') ? "9" : ((get_theme_mod('sidebar_layout', 'right') == 'right') ? "9" : "12");  
            if ( get_theme_mod( 'sidebar_layout','right'  ) == "left" ) { ?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">                
              <!-- Sidebar start -->
              <?php get_sidebar(); ?>
              <!-- Sidebar end -->
          </div><?php } ?>
          <div class="col-lg-<?php echo esc_attr($custom_class); ?> col-md-<?php echo esc_attr($custom_class); ?> col-sm-12 col-xs-12 ">
             <?php if ( have_posts() ) :
             $wd_post_count=1;
             while ( have_posts() ) : the_post(); 
                get_template_part( 'template-parts/post/content', get_post_format() );
                $wd_post_count++; 
              endwhile;
                the_posts_pagination( array(
                    'type'  => 'list',
                    'screen_reader_text' => ' ',
                    'prev_text'          => esc_html__( 'Previous', 'web-development' ),
                    'next_text'          => esc_html__('Next','web-development'),
                    ) );
              endif; ?>
          </div>
        <?php 
        if ( get_theme_mod( 'sidebar_layout','right' ) == "right" ) { ?>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">                
          <!-- Sidebar start -->
          <?php get_sidebar(); ?>
          <!-- Sidebar end -->
      </div><?php } ?>
  </div>
</div>
</section>
<?php get_footer();