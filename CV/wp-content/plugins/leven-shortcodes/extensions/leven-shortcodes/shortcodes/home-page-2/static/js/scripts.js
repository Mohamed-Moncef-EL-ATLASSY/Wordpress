(function($) { 
"use strict";
    $(document).ready(function ($) {
        var mpLink = $('.home-bgvideo').attr('data-videomp'),
            webmLink = $('.home-bgvideo').attr('data-videowebm'),
            imgLink = $('.home-bgvideo').attr('data-img'),
            videoBackground = new vidbg('.home-bgvideo', {
                mp4: mpLink,
                webm: webmLink,
                poster: imgLink,
            })
    });
})(jQuery);