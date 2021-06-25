<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'timeline-' );
?>

<?php if (!empty($atts['title'])): ?>
	<div class="block-title fw-timeline-title">
		<h3><?php echo esc_html($atts['title']); ?></h3>
	</div>
<?php endif; ?>

<div id="<?php echo esc_attr($id); ?>" class="timeline clearfix">
	<?php foreach ($atts['timeline'] as $timeline):

	$title = $timeline['title'];
	$period = $timeline['period'];
	$company = $timeline['subtitle'];
	$text = $timeline['text'];
	$logo = $timeline['logo'];
	$current = $timeline['current'];
	?>
	<div class="timeline-item clearfix">
        <h5 class="item-period <?php if( $current == 'yes' ) : ?>current<?php endif; ?>"><?php echo wp_kses_post($period); ?></h5>
        <span class="item-company"><?php echo esc_html($company); ?></span>
        <h4 class="item-title"><?php echo wp_kses_post($title); ?></h4>
        <p><?php echo wp_kses_post($text); ?></p>
        <?php if( !empty( $logo ) ) : ?>
		<span class="item-logo"><img src="<?php echo esc_url($logo['url']); ?>" alt="<?php esc_attr_e('image', 'leven-shortcodes'); ?>" /></span>
		<?php endif; ?>
    </div>
	<?php endforeach; ?>
</div>
