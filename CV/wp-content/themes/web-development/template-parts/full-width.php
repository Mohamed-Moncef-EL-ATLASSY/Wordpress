<?php 
/**
 * Template Name: Full Width
 */
get_header();?>
<section>
  <div class="web-development-breadcrumb">
    <div class="container web-development-container">
      <h1><?php the_title(); ?></h1>
      <?php web_development_breadcrumbs(); ?>
    </div>
  </div>
</section>
<section class="main_section">
  <div class="container web-development-container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
      <?php if(have_posts()):
       while(have_posts()): the_post();?>
      <article id="post-<?php echo esc_attr(get_the_ID()); ?>" <?php post_class(); ?>>
        <div class="section_post border-none">
          <?php if(has_post_thumbnail()) { 
              the_post_thumbnail('web-development-blog-width'); 
            } ?>
          <h3><?php the_title(); ?></h3>
         <div class="content"><?php the_content();?></div>
        </div>
      </article>
      <!-- .nav-single -->
      <?php endwhile;?>
      <?php  if ( comments_open() || get_comments_number() ) :
          if ( get_theme_mod( 'single_post_comment_form' ) == "" ) :
						comments_template();
  				endif;
        endif;       
      endif; ?>
    </div>
  </div>
</section>
<?php get_footer();
