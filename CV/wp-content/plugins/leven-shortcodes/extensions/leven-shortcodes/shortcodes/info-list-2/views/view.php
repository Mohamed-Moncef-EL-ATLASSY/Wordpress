<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'info-list-' );
?>

<div id="<?php echo esc_attr($id); ?>" class="info-list-w-icon">
	<?php if (!empty($atts['title'])): ?>
		<div class="block-title info-list-w-icon-title">
			<h3><?php echo esc_html($atts['title']); ?></h3>
		</div>
	<?php endif; ?>

	<?php foreach ($atts['infolist_with_icons'] as $info_list_w_icon): ?>
		<div class="info-block-w-icon">
		    <div class="ci-icon">
		        <?php
		            if (!empty($info_list_w_icon['icon']['url'])) {
		                ?>
		                    <img src="<?php echo esc_url($info_list_w_icon['icon']['url']); ?>" alt="<?php echo esc_attr($info_list_w_icon['title']); ?>">
		                <?php 
		            }
		        ?>
		        <?php
		            if (!empty($info_list_w_icon['icon']['icon-class'])) {
		                ?>
	                        <i class="<?php echo esc_attr($info_list_w_icon['icon']['icon-class']); ?>"></i>
		                <?php 
		            }
		        ?>
		    </div>
		    <div class="ci-text">
		        <h4><?php echo wp_kses_post($info_list_w_icon['title']); ?></h4>
		        <?php if (!empty($info_list_w_icon['text'])) { ?>
		        <p><?php echo wp_kses_post($info_list_w_icon['text']); ?></p>
		        <?php } ?>
		    </div>
		</div>
	<?php endforeach; ?>
</div>
