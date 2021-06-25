<?php
/**
 * The template for displaying a "No posts found" message
 */
?>

<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'leven' ); ?></h1>

<div class="page-content-none">
	<?php if ( is_search() ) : ?>

	<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'leven' ); ?></p>
	<?php get_search_form(); ?>

	<?php else : ?>

	<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'leven' ); ?></p>
	<?php get_search_form(); ?>

	<?php endif; ?>
</div><!-- .page-content -->
