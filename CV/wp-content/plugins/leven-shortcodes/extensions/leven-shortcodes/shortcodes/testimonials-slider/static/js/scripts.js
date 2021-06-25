(function($) { 
"use strict";
    $(document).ready(function ($) {
        var mobile_mode_items = "",
            tablet_mode_items = "",
            items = "";
        
        $( '.testimonials' ).each( function() {
            var mobile_mode_items = $(this).attr('data-mobile-items'),
                tablet_mode_items = $(this).attr('data-tablet-items'),
                items = $(this).attr('data-items'),
                id = $(this).attr('id');

            $("#" + id + ".testimonials.owl-carousel").owlCarousel({
                nav: false,
                dots: true,
                items: 1,
                loop: true,
                navText: false,
                autoHeight: true,
                margin: 10,
                responsive : {
                    0 : {
                        items: mobile_mode_items,
                    },
                    768 : {
                        items: tablet_mode_items,
                    },
                    1200 : {
                        items: items,
                    }
                }
            });
        });
    });
})(jQuery);