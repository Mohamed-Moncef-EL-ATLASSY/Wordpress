<?php 
$footer_crs = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option('footer_copyrights') : '';
$footer_links = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('footer_social') : '';
$show_blog_sidebar = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('blog_sidebar') :  'yes';
?>  
            <?php if ( !empty($footer_links) || !empty($footer_crs) ) { ?>
            <footer class="site-footer clearfix">
                <?php if ( !empty($footer_links)) { ?>
                <div class="footer-social">
                    <ul class="footer-social-links">
                    <?php
                    foreach ($footer_links as $footer_links):
                        if( !empty( $footer_links['link'] ) ) :
                        $target = (!isset($footer_links['target'])) ? '_blank' : $footer_links['target'];
                    ?>
                        <li>
                            <a href="<?php echo esc_url($footer_links['link']); ?>" target="<?php echo esc_attr($target) ?>"><?php echo wp_kses_post($footer_links['title']); ?></a>
                        </li>
                    <?php endif;
                    endforeach;
                    ?>
                    </ul>
                </div>
                <?php } ?>

                <?php if (!empty($footer_crs)) { ?>
                <div class="footer-copyrights">
                    <p><?php echo wp_kses_post($footer_crs); ?></p>
                </div>
                <?php } ?>
            </footer>
            <?php } ?>
        </div>
        <?php if ( $show_blog_sidebar == 'yes'):
            get_sidebar( 'content' );
        endif; ?>
    </div>
	<?php
		wp_footer();
	?>
</body>
</html>