<?php
/**
 * Template part for displaying posts
 * @package Web-development
 */
global $wd_post_count;
?>
<div class="blog_sec">
    <div class="row">
     <?php if ( get_theme_mod( 'post_image' ) == "" ) { ?>
     <div class="image-cust-cls col-lg-6 col-md-6 col-sm-12 col-xs-12 <?php if($wd_post_count % 2 == 0) echo "pull-right" ?>">
        <div class="blog_image">
            <a href="<?php the_permalink(); ?>">
                <?php if(has_post_thumbnail()) 
                {
                    the_post_thumbnail( 'web-development-blog-image', array('class' => '') );
                    $content_class="6";
                }else {
                    $content_class="6";
                    echo '<div class="no-post-image"><i class="fa fa-file-image-o" aria-hidden="true"></i></div>';
                } ?>                
            </a>
        </div>
    </div>
    <?php }else { $content_class="12"; } ?>
    <div class=" col-lg-<?php echo esc_attr($content_class); ?> col-md-<?php echo esc_attr($content_class); ?> col-sm-12 col-xs-12">
        <div class="blog_text">
            <a href="<?php the_permalink(); ?>">
                <h3 class="post_title"><?php the_title(); ?>
                </h3></a>
                <?php if ( get_theme_mod( 'meta_tag' ) == "" ) {  ?>
                <div class="cats mb"><?php web_development_entry_meta(); ?></div>
                <?php } ?>
                <div class="blog_details">
                 <p><?php the_excerpt(); ?></p>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Blog End -->