<?php if (!defined('FW')) die('Forbidden');

/**
 * @var $atts The shortcode attributes
 */

$title = $atts['title'];
$text = $atts['text'];
$id = $atts['id'];
$reverse = $atts['position'];
$disable_move_effect = $atts['img_move_effect'];
?>

<div id="home_content_<?php echo esc_attr($id); ?>" class="home-content">
    <div class="row flex-v-align<?php if($reverse == "left") { ?> flex-direction-reverse<?php } ?>">
        <div class="col-sm-12 <?php if($reverse == "left") { ?>col-md-6 col-lg-6<?php } else { ?>col-md-5 col-lg-5<?php } ?>">
            <div class="home-photo">
                <div class="hp-inner<?php if ($disable_move_effect == 'yes') { ?> without-move<?php } ?>"></div>
            </div>
        </div>

        <div class="col-sm-12 <?php if($reverse == "left") { ?>col-md-6 col-lg-6<?php } else { ?>col-md-7 col-lg-7<?php } ?>">
            <div class="home-text<?php if($reverse == "right") { ?> hp-left<?php } ?>">
                <?php if ( !empty($atts['subtitles']) ): ?>
                <div class="owl-carousel text-rotation">                                    
                    <?php foreach ($atts['subtitles'] as $hp_subtitles): ?>
                        <div class="item">
                            <h4><?php echo esc_html($hp_subtitles); ?></h4>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <h1><?php echo esc_html($title); ?></h1>
                <p><?php echo wp_kses_post($text); ?></p>
                <?php $hp_buttons = $atts['buttons'];
                if ( !empty($hp_buttons)) : ?>
                   <div class="home-buttons">
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
</div>
