<?php
/**
 * The template for displaying 404 pages (not found)
 * @package Web-development
 */
get_header(); ?>
<!-- Banner -->
<div class="banner">
    <img alt="" src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>">
    <div class="banner_text">
        <h1><?php esc_html_e('404','web-development'); ?></h1>
        <?php web_development_breadcrumbs(); ?>
    </div>
</div>
<!-- End banner -->
<section class="blog_main layout-set">
    <div class="container notfount-cls">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <h3><?php esc_html_e( "Oops! That page can't be found.", 'web-development' ); ?></h3>
                <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'web-development'); ?></p>
                <?php get_search_form(); ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">                
              <!-- Sidebar start -->
              <?php get_sidebar(); ?>
              <!-- Sidebar end -->
          </div>
      </div>
  </div>
</section>
<?php get_footer();