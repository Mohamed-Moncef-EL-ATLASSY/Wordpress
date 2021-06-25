<?php
/**
 * The template for displaying Post Format pages
 *
 * Used to display archive-type pages for posts with a post format.
 * If you'd like to further customize these Post Format views, you may create a
 * new template file for each specific one.
 *
 * @todo http://core.trac.wordpress.org/ticket/23257: Add plural versions of Post Format strings
 * and remove plurals below.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>
<div id="main" class="site-main">
    <div id="main-content" class="single-page-content">
        <div id="primary" class="content-area">
            <div id="content" class="page-content site-content" role="main">
				<?php if ( have_posts() ) : ?>

				<h2 class="page-title">
					<?php
						if ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'leven' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'leven' );

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'leven' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audio', 'leven' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'leven' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'leven' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'leven' );

						else :
							_e( 'Archives', 'leven' );

						endif;
					?>
				</h2>

				<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();

							/*
							 * Include the post format-specific template for the content. If you want to
							 * use this in a child theme, then include a file called called content-___.php
							 * (where ___ is the post format) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );

						endwhile;
						// Previous/next page navigation.
						leven_theme_paging_nav();

					else :
						// If no content, include the "No posts found" template.
						get_template_part( 'content', 'none' );

					endif;
				?>
			</div><!-- #content -->
		</div><!-- #primary -->
	</div><!-- #main-content -->
</div>
<?php
get_footer();
