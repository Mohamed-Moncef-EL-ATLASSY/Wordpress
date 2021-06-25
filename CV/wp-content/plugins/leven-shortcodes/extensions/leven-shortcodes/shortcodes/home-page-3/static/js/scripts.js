(function($) { 
"use strict";
    $(document).ready(function ($) {
        var mpLink = $('.start-page-full-width .inner-content .fill-block').attr('data-videomp'),
            webmLink = $('.start-page-full-width .inner-content .fill-block').attr('data-videowebm'),
            imgLink = $('.start-page-full-width .inner-content .fill-block').attr('data-img'),
            container = $('.start-page-full-width .inner-content .fill-block').attr('data-container'),
            videoBackground = new vidbg(container, {
                mp4: mpLink,
                webm: webmLink,
                poster: imgLink,
            })
    });
})(jQuery);