<?php
/*
* Template Name: Front Page
*/
get_header(); ?>
<!-- Start Slider -->
<?php if(get_theme_mod('hide_slider_section') == ""){ ?>
<div class="slider">
    <div id="home-slider" class="owl-carousel owl-theme">
        <?php for($web_development=1;$web_development<=2;$web_development++){ 
            $url = wp_get_attachment_url(get_theme_mod('slider_image_'.$web_development)); 
            if($url != ""){ ?>
            <div class="item">
                <div class="custom_overlay_wrapper">
                    <img src="<?php echo esc_url($url); ?>">
                    <?php if(get_theme_mod('slide_title_'.$web_development) != "" || get_theme_mod('slide_description_'.$web_development) != ""){ ?>
                    <div class="custom_overlay">
                        <span class="custom_overlay_inner">
                            <h4><?php echo esc_html(get_theme_mod('slide_title_'.$web_development)); ?></h4>
                            <p><?php echo esc_html(get_theme_mod('slide_description_'.$web_development)); ?></p>
                            <?php if(get_theme_mod('slide_button_title_'.$web_development) != ""){ ?>
                            <a href="<?php echo esc_url(get_theme_mod('slide_link_'.$web_development)); ?>" class="read_more"><?php echo esc_html(get_theme_mod('slide_button_title_'.$web_development)); ?>
                            </a><?php } ?>
                        </span>
                    </div>
                    <?php } ?>
                </div>
            </div>
        <?php } } ?>
    </div>
</div>
<!-- End Slider -->
<?php } if(get_theme_mod('hide_services_section') == ""){ ?>
<!-- Our Services  -->
<section class="our_Service">
    <div class="container">
        <div class="text-center section-heading">
            <h3><?php echo esc_html(get_theme_mod('services_title',esc_html__( 'Our Services','web-development'))); ?></h3>
                <p><?php echo wp_kses_post(get_theme_mod('services_description', esc_html__('Services description','web-development') )); ?></p>
        </div>
        <div class="row">
        <?php for($web_development=1;$web_development<=3;$web_development++){
            if(get_theme_mod('secrvices_box_title'.$web_development,'')!=''){ ?>
             <div class="services-block-two col-lg-4 col-md-6">
                <div class="inner-box">
                    <div class="icon-box"><i class="fa <?php echo esc_attr(get_theme_mod('secrvices_box_icon'.$web_development)); ?>"></i>
                    </div>
                    <h4><?php echo esc_html(get_theme_mod('secrvices_box_title'.$web_development)); ?></h4>
                    <p><?php echo esc_html(get_theme_mod('secrvices_box_desc'.$web_development)); ?></p>
                </div>
            </div>
        <?php } } ?>
        </div>
    </div>
</section>
<!-- End Our Services -->
<?php }
if(get_theme_mod('hide_portfolio_section') == ""){ ?>
<!-- Our Portfolio Section -->
<section class="tab_main">
    <div class="container">
        <div class="text-center section-heading">
            <h3 class="white"><?php echo esc_html(get_theme_mod('portfolio_section_title', esc_html__( 'Portfolio','web-development'))); ?></h3>
            <p class="white"><?php echo wp_kses_post(get_theme_mod('portfolio_description',esc_html__(  'Portfolio description','web-development'))); ?></p>
        </div>
        <div id="tabs">
            <div id="tabs-1">
                <div class="row">
                    <?php             
                    $args = array('cat' => get_theme_mod('portfolio_section_category'), 'order' => 'DESC', 'posts_per_page' => 8,'post_status' => 'publish');
                    $web_development_portfolio_post = new WP_Query( $args);
                    if ($web_development_portfolio_post->have_posts()) :
                     while ( $web_development_portfolio_post->have_posts() ) : $web_development_portfolio_post->the_post();
                    if(has_post_thumbnail()): ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="imghvr-push-up">
                            <?php the_post_thumbnail('web-development-portfolio-img',array('class' => 'img-responsive responsive--full')); ?>
                            <div class="imghvr-push-up-text">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div>
                        </div>
                    </div>
                    <?php endif; endwhile; wp_reset_postdata(); endif; ?>
                </div>
            </div>
        </div>
    <div class="more">
    <?php $portfolio_link=(get_theme_mod('portfolio_section_category') == "") ? get_permalink(get_option( 'page_for_posts' )) : get_category_link(get_theme_mod('portfolio_section_category')); ?>
    <a href="<?php echo esc_url($portfolio_link); ?>"><?php echo esc_html(get_theme_mod('portfolio_button_title', esc_html__('View More','web-development') )); ?></a></div>
</div>
</section>
<!-- END Our Portfolio Section -->
<?php }
if(get_theme_mod('hide_ourteam_section') == ""){ ?>
<!-- Our Team Section Start -->
<section class="our_team">
    <div class="container">
        <div class="text-center section-heading">
            <h3><?php echo esc_html(get_theme_mod('ourteam_section_title',esc_html__( 'Our Team','web-development') )); ?></h3>
        </div>
        <div class="row">
            <?php             
            $args = array('cat' => get_theme_mod('ourteam_section_category'), 'order' => 'DESC', 'posts_per_page' => 4,'post_status' => 'publish');
            $web_development_ourteam_post = new WP_Query( $args);         
            if ($web_development_ourteam_post->have_posts()) :
             while ( $web_development_ourteam_post->have_posts() ) : $web_development_ourteam_post->the_post(); ?>
            <div class="col-lg-3 col-md-6">
                <div class="team_block">
                    <?php the_post_thumbnail('web-development-team-img',array('class' => 'img-responsive responsive--full')); ?>
                </div>
                <div class="team_block_text">
                    <label><?php the_title(); ?></label>
                    <span><?php $posttags = get_the_tags();
                        if ($posttags) {
                            foreach($posttags as $tag) {
                                echo esc_html($tag->name . ' ') ;
                        } } ?>
                    </span>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
            <!-- end -->
        </div>
    </div>
</section>
<!-- End Our Team Section-->
<?php } 
if(get_theme_mod('hide_testimonials_section') == ""){ ?>
<!-- Testimonial start -->
<section class="testimonial_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-12 col-sm-12 col-xs-12 text-center">
                <h3 class="white"><?php echo esc_html(get_theme_mod('testimonials_section_title', esc_html__( 'Testimonials','web-development'))); ?></h3>
                <div id="test-slider" class="owl-carousel owl-theme">
                    <?php             
                    $args = array('cat' => get_theme_mod('testimonials_section_category'), 'order' => 'DESC', 'posts_per_page' => get_theme_mod('testimonials_display_post',2),'post_status' => 'publish');
                    $web_development_testimonials_post = new WP_Query( $args);         
                    if ($web_development_testimonials_post->have_posts()) :
                     while ( $web_development_testimonials_post->have_posts() ) : $web_development_testimonials_post->the_post(); 
                    if(has_post_thumbnail()): ?>
                    <div class="item">
                        <div class="testi_text">
                            <p><?php $content=substr( get_the_excerpt(), 0, get_theme_mod('post_content_limit', 40));
                            echo esc_html($content); ?></p>
                            <div class="test_img">
                             <?php the_post_thumbnail('web-development-testimonial-img',array('class' => 'img-responsive responsive--full')); ?>
                            </div>
                            <span><?php the_title(); ?></span>
                        </div>
                    </div>
             <?php endif; endwhile; wp_reset_postdata();  endif; ?>
             </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial End -->
<?php } 
get_footer();
