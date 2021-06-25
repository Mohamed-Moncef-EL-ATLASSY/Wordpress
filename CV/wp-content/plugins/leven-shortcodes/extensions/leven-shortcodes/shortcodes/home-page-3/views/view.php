<?php if (!defined('FW')) die('Forbidden');

/**
 * @var $atts The shortcode attributes
 */

$id = $atts['id'];
$start_page_text = $atts['hp_text'];
$start_page_bg = $atts['hp_background'];
$offset = $atts['offset'];
$position = $atts['position'];

if (!empty($atts['video_mp_upload'])) {
    $video_mp = $atts['video_mp_upload']['url'];
}
if (!empty($atts['video_webm_upload'])) {
    $video_webm = $atts['video_webm_upload']['url'];
}
if (!empty($atts['hp_background'])) {
    $video_img = $atts['hp_background']['url'];
}
$video_width = $atts['video_width'];

if ($video_width == 'half') {
    $video_container = '.start-page-full-width .inner-content .fill-block';
} else {
    $video_container = '.start-page-full-width';
}
?>

<div id="home_content_<?php echo esc_attr($id); ?>" class="home-content third-style">
    <div class="start-page-full-width">
        <div class="row<?php if($position == "yes") { ?> flex-direction-reverse<?php } ?>">
            <?php if (!empty($start_page_bg['url'])) { ?>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="inner-content">
                    <div class="fill-block" data-container="<?php echo esc_attr($video_container); ?>" <?php if (!empty($atts['video_mp_upload'])) { ?>data-videomp="<?php echo esc_url($video_mp); ?>"<?php } ?> <?php if (!empty($atts['video_webm_upload'])) { ?>data-videowebm="<?php echo esc_url($video_webm); ?>"<?php } ?> <?php if (!empty($atts['hp_background'])) { ?>data-img="<?php echo esc_url($video_img); ?>"<?php } ?>></div>
                </div>
            </div>
            <?php } ?>
            <?php if (!empty($start_page_bg['url'])) { ?>
            <div class="col-sm-12 col-md-6 col-lg-6">
            <?php } else { 
                $offset = 'off';
            ?>
            <div class="col-sm-12 col-md-12 col-lg-12">
            <?php } ?>
                <div class="inner-content<?php if($offset == 'on') { ?> inner-text-block<?php } ?><?php if($position == "yes") { ?> text-reverse<?php } ?>">
                    <div class="hp-text-block">
                        <?php if ( function_exists('fw_get_db_settings_option') ): ?>
                        <div class="owl-carousel text-rotation">                                    
                            <?php foreach ($atts['hp_subtitles'] as $hp_subtitle): ?>
                                <div class="item">
                                    <div class="sp-subtitle"><?php echo esc_html($hp_subtitle); ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        <?php
                        $main_title = $atts['hp_main_title'];
                        if( !empty( $main_title ) ) :
                        ?>
                        <h2 class="hp-main-title"><?php echo esc_html($main_title); ?></h2>
                        <?php endif; ?>

                        <?php echo wp_kses_post($start_page_text); ?>


                        <?php $hp_buttons = $atts['hp_buttons'];
                        if ( !empty($hp_buttons)) : ?>
                            <div class="hp-buttons">
                            <?php
                            foreach ($hp_buttons as $hp_buttons):
                                if( !empty( $hp_buttons['link'] ) ) :
                                $target = (!isset($hp_buttons['target'])) ? '_blank' : $hp_buttons['target'];
                            ?>
                                    <a href="<?php echo esc_url($hp_buttons['link']); ?>" target="<?php echo esc_attr($target) ?>" class="btn btn-primary"><?php echo esc_attr($hp_buttons['title']); ?></a>
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
    </div>
</div>
