<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'testimonials-' );

?>

<?php if (!empty($atts['title'])): ?>
<div class="block-title">
	<h2 class="testimonials-slider-title"><?php echo esc_html($atts['title']); ?></h2>
</div>
<?php endif; ?>

<div id="testimonials_<?php echo esc_attr($atts['id']); ?>" class="testimonials owl-carousel" data-mobile-items="<?php echo esc_attr($atts['items_mobile']) ?>" data-tablet-items="<?php echo esc_attr($atts['items_tablet']) ?>" data-items="<?php echo esc_attr($atts['items']) ?>">

	<?php foreach ($atts['testimonials_slider'] as $testimonial): ?>
		<!-- Testimonial <?php echo esc_attr($id); ?> -->

		<div class="testimonial-item testimonial-<?php echo esc_attr($id); ?>">

            <!-- Testimonial Content -->
            <div class="testimonial-content">
                <!-- Picture -->
                <div class="testimonial-picture">
                    <?php
					$author_image_url = !empty($testimonial['author_avatar']['url'])
										? $testimonial['author_avatar']['url']
										: fw_get_framework_directory_uri('/static/img/no-image.png');
					?>
					<img src="<?php echo esc_attr($author_image_url); ?>" alt="<?php echo esc_attr($testimonial['author_name']); ?>"/>
                </div>              
                <!-- /Picture -->

                <!-- Testimonial Text -->
                <div class="testimonial-text">
                    <?php if (!empty($testimonial['content'])): ?>
					   <p><?php echo esc_html($testimonial['content']); ?></p>
                    <?php endif; ?>
                </div>
                <!-- /Testimonial Text -->

                <!-- Testimonial author information -->
                <div class="testimonial-author-info">
                    <h5 class="testimonial-author"><?php echo esc_html($testimonial['author_name']); ?></h5>
                    <?php if (!empty($testimonial['author_company'])): ?>
						<?php if (!empty($testimonial['site_url'])): ?>
							<p class="testimonial-firm"><a href="<?php echo esc_url($testimonial['site_url']); ?>" target="_blank"><?php echo esc_html($testimonial['author_company']); ?></a></p>
						<?php else: ?>
							<p class="testimonial-firm"><?php echo esc_html($testimonial['author_company']); ?></p>
						<?php endif; ?>
					<?php endif; ?>
                </div>
                <!-- /Testimonial author information -->

                <div class="testimonial-icon">
                    <i class="fa fa-quote-left"></i>
                </div>

                 <div class="testimonial-icon-big">
                    <i class="fa fa-quote-right"></i>
                </div>
            </div>
            <!-- /Testimonial Content -->

        </div>
		<!-- End of Testimonial <?php echo esc_attr($id); ?> -->
	<?php endforeach; ?>
</div>
