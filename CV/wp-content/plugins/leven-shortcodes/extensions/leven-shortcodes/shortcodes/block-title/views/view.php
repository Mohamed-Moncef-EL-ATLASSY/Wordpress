<?php if (!defined('FW')) die('Forbidden');

/**
 * @var $atts The shortcode attributes
 */

$title = $atts['title'];
$id = $atts['block_id'];
?>

<div class="block-title">
    <h2<?php if(!empty($id)): ?> id="<?php echo esc_attr($id); ?>"<?php endif; ?>><?php echo esc_html($title); ?></h2>
</div>
