<!-- Footer start -->
<footer>
<?php if(is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) { ?>
    <div class="first_footer layout-set">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"><?php dynamic_sidebar( 'footer-1' ); ?></div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"><?php dynamic_sidebar( 'footer-2' ); ?></div>
                <div class="col-lg-4 col-sm-6 col-xs-12 col-md-12"><?php dynamic_sidebar( 'footer-3' ); ?></div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="site-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 text-center">
                    <?php if(get_theme_mod('footerCopyright') != ""){ ?>
                    <p><?php echo wp_kses_post(get_theme_mod('footerCopyright')); ?></p>
                    <?php }
                    esc_html_e('Theme : ','web-development'); ?><a href="<?php echo esc_url('https://voilathemes.com/wordpress-themes/web-development/'); ?>"><?php esc_html_e(' Web development WordPress Theme','web-development'); ?></a>
                </div>
            </div>
        </div>
        <div class="scroll_top"><span class="fa fa-arrow-up"></span></div>
    </div>
</footer>
<!-- Footer End -->
</body>
</html>
<?php wp_footer(); ?>