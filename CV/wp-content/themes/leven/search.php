<?php
/**
 * The template for displaying Search Results pages
 */

get_header(); ?>
<div id="main" class="site-main">
	<div id="main-content" class="single-page-content">
		<div id="primary" class="content-area">
			<div id="content" class="page-content site-content" role="main">

				<?php if ( have_posts() ) : ?>

					<h2 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'leven' ), get_search_query() ); ?></h2>

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
						// Previous/next post navigation.
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
