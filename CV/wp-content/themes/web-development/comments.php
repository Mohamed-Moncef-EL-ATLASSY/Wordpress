<?php
/**
 * The template for displaying comments
 * @package Web-development
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
if ( comments_open()) : ?>
<div class="clearfix"></div>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : 	?>
		<h2 class="comments-title">
			<?php
			/* translators: 1: comment count number, 2: post title */
			printf( esc_html(_n( '%1$s thought on %2$s', '%1$s thoughts on %2$s', get_comments_number(), 'web-development' )),esc_attr(number_format_i18n(get_comments_number())), get_the_title() ); ?>
		</h2>
		<ul class="">
			<?php wp_list_comments( array( 'callback' => 'web_development_comment', 'style' => 'ul','short_ping' => true) ); ?>
		</ul>
		<?php paginate_comments_links();
		if ( ! comments_open() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'web-development' ); ?></p>
	<?php endif;
	endif; ?>
	<!-- #comments .comments-area -->
	<?php comment_form(); ?>
</div>
<?php endif;