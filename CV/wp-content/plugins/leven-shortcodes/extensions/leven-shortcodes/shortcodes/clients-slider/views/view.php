<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

?>

<div id="clients_<?php echo esc_attr($atts['id']); ?>" class="clients owl-carousel" data-mobile-items="<?php echo esc_attr($atts['items_mobile']) ?>" data-tablet-items="<?php echo esc_attr($atts['items_tablet']) ?>" data-items="<?php echo esc_attr($atts['items']) ?>">

	<?php foreach ($atts['clients_slider'] as $client): ?>
		<div class="client-block">
			<?php if (!empty($client['site_url'])): ?>
			<a href="<?php echo esc_url($client['site_url']); ?>" target="_blank" title="<?php echo esc_html($client['client_title']); ?>">
			<?php endif; ?>

				<?php
					$client_logo_url = !empty($client['client_logo']['url'])
					? $client['client_logo']['url']
					: fw_get_framework_directory_uri('/static/img/no-image.png');
				?>
				<img src="<?php echo esc_url($client_logo_url); ?>" alt="<?php echo esc_html($client['client_title']); ?>">

			<?php if (!empty($client['site_url'])): ?>
			</a>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>

</div>
