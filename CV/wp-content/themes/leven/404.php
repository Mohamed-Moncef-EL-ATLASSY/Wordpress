<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>

<div id="main" class="site-main">
    <div id="main-content" class="single-page-content nothing-found">
        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">
				<div class="page-content">
					<h1 class="nf-page-title"><?php esc_html_e( '404', 'leven' ); ?></h1>
					<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'leven' ); ?></p>
				</div><!-- .page-content -->
            </div><!-- #content -->
	    </div>
	</div>
</div>

<?php
get_footer();
