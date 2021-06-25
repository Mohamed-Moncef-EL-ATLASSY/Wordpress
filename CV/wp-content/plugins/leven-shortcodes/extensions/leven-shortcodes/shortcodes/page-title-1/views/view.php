<?php if (!defined('FW')) die('Forbidden');

/**
 * @var $atts The shortcode attributes
 */

$title = $atts['title'];
$subtitle = $atts['subtitle'];
$text = $atts['text'];
$id = $atts['id'];
?>

<div id="page_title_custom_<?php echo esc_attr($id); ?>" class="page-title-custom">
    <div class="row flex-v-align">
        <div class="col-sm-12 col-md-12 col-lg-12">
            
                <h1><?php echo esc_html($title); ?></h1>
                <h4><?php echo esc_html($subtitle); ?></h4>
                <p><?php echo wp_kses_post($text); ?></p>
                <?php $hp_buttons = $atts['buttons'];
                if ( !empty($hp_buttons)) : ?>
                   <div class="pt-buttons">
                    <?php
                    foreach ($hp_buttons as $hp_buttons):
                        if( !empty( $hp_buttons['link'] ) ) :
                        $target = (!isset($hp_buttons['target'])) ? '_blank' : $hp_buttons['target'];
                        $type = (!isset($hp_buttons['type'])) ? 'primary' : $hp_buttons['type'];
                    ?>
                        <a href="<?php echo esc_url($hp_buttons['link']); ?>" target="<?php echo esc_attr($target) ?>" class="btn btn-<?php echo esc_attr($type) ?>"><?php echo esc_attr($hp_buttons['title']); ?></a>
                    <?php endif;
                    endforeach;
                    ?>
                    </div>
                    <?php
                endif;
                ?>

        </div>
    </div>
</div>
