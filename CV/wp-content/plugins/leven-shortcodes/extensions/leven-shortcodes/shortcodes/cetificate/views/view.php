<?php if (!defined('FW')) die('Forbidden');

/**
 * @var $atts The shortcode attributes
 */

$title = $atts['title'];
$membership = $atts['membership'];
$date = $atts['date'];
$logo = $atts['logo'];
$img = $atts['image'];
?>

<?php if( !empty( $img ) ) : ?>
<a href="<?php echo esc_url($img['url']); ?>" class="lightbox">
<?php endif; ?>
<div class="certificate-item clearfix">
    <div class="certi-logo">
        <?php if( !empty( $logo ) ) : ?>
        <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php esc_attr_e('logo', 'leven-shortcodes'); ?>">
        <?php endif; ?>
    </div>
    <div class="certi-content">
        <div class="certi-title">
            <h4><?php echo esc_html($title); ?></h4>
        </div>
        <div class="certi-id">
            <span><?php echo esc_html($membership); ?></span>
        </div>
        <div class="certi-date">
            <span><?php echo esc_html($date); ?></span>
        </div>
        <div class="certi-company">
            <span></span>
        </div>
    </div>
</div>
<?php if( !empty( $img ) ) : ?>
</a>
<?php endif; ?>