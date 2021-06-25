<?php
/**
 * The template for displaying single page
 * @package Web-development
 */
get_header(); ?>
    <div class="banner">
        <img alt="" src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>">
        <div class="banner_text">
        <h1><?php the_title();?></h1>
        <?php 
        web_development_breadcrumbs(); ?>
        </div>
    </div>
    <!-- End banner -->
    <section class="">
        <div class="container">
        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post(); ?>
            <div id="post-<?php  the_ID(); ?>" <?php post_class(); ?>>
                <div class="page-cls">
                  <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; endif; ?>
        </div>
    </div>
    </div>
    </section>
</div>
<?php get_footer();