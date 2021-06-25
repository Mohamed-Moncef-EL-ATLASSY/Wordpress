(function($) { 
"use strict";
    $(document).ready(function ($) {
        // Clients Slider
        var mobile_mode_items = "",
            tablet_mode_items = "",
            items = "";
        
        $( '.clients' ).each( function() {
            var mobile_mode_items = $(this).attr('data-mobile-items'),
                tablet_mode_items = $(this).attr('data-tablet-items'),
                items = $(this).attr('data-items'),
                id = $(this).attr('id');

            $("#" + id + ".clients.owl-carousel").imagesLoaded().owlCarousel({
                nav: false, // Show next/prev buttons.
                items: 2, // The number of items you want to see on the screen.
                loop: false, // Infinity loop. Duplicate last and first items to get loop illusion.
                navText: false,
                margin: 10,
                autoHeight: false,
                responsive : {
                    // breakpoint from 0 up
                    0 : {
                        items: mobile_mode_items,
                    },
                    // breakpoint from 768 up
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