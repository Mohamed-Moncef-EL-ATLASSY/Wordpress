(function($) {
$.fn.menumaker = function(options) {  
 var cssmenu = $(this), settings = $.extend({
   format: "dropdown",
   sticky: false
 }, options);
 return this.each(function() {
   $(this).find(".menu-button").on('click', function(){
     $(this).toggleClass('menu-opened');
     var mainmenu = $(this).next('ul');
     if (mainmenu.hasClass('open')) { 
       mainmenu.slideToggle().removeClass('open');
     }
     else {
       mainmenu.slideToggle().addClass('open');
       if (settings.format === "dropdown") {
         mainmenu.find('ul').show();
       }
     }
   });
   cssmenu.find('li ul').parent().addClass('has-sub');
multiTg = function() {
     cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
     cssmenu.find('.submenu-button').on('click', function() {
       $(this).toggleClass('submenu-opened');
       if ($(this).siblings('ul').hasClass('open')) {
         $(this).siblings('ul').removeClass('open').slideToggle();
       }
       else {
         $(this).siblings('ul').addClass('open').slideToggle();
       }
     });
   };
   if (settings.format === 'multitoggle') multiTg();
   else cssmenu.addClass('dropdown');
   if (settings.sticky === true) cssmenu.css('position', 'fixed');
resizeFix = function() {
  var mediasize = 1000;
     if ($( window ).width() > mediasize) {
       cssmenu.find('ul').show();
     }
     if ($(window).width() <= mediasize) {
       cssmenu.find('ul').hide().removeClass('open');
     }
   };
   resizeFix();
   return $(window).on('resize', resizeFix);
 });
  };
})(jQuery);

(function($){
$(document).ready(function(){
$("#cssmenu").menumaker({
   format: "multitoggle"
});
/** Set Position of Sub-Menu **/
        var wapoMainWindowWidth = jQuery(window).width();
        jQuery('#cssmenu ul ul li').mouseenter(function () {
            var subMenuExist = jQuery(this).find('.sub-menu').length;
            if (subMenuExist > 0) {
                var subMenuWidth = jQuery(this).find('.sub-menu').width();
                var subMenuOffset = jQuery(this).find('.sub-menu').parent().offset().left + subMenuWidth;
                if ((subMenuWidth + subMenuOffset) > wapoMainWindowWidth) {
                    jQuery(this).find('.sub-menu').removeClass('submenu-left');
                    jQuery(this).find('.sub-menu').addClass('submenu-right');
                } else {
                    jQuery(this).find('.sub-menu').removeClass('submenu-right');
                    jQuery(this).find('.sub-menu').addClass('submenu-left');
                }
            }
        });

       jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        jQuery('.scroll_top').fadeIn(200);    // Fade in the arrow
    } else {
        jQuery('.scroll_top').fadeOut(200);   // Else fade out the arrow
    }
});
jQuery('.scroll_top').click(function() {      // When arrow is clicked
    jQuery('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});

        jQuery(document).ready(function() {
        jQuery("#test-slider").owlCarousel({
          nav : false, // Show next and prev buttons
          navigationText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
          ],
          slideSpeed : 100,
          paginationSpeed : 400,
          loop : true,
          autoplay:true,
          autoplayTimeout:3000,
          autoplayHoverPause:true,
          items : 1,
          dots : true
        });
      });
    jQuery( 'p:empty' ).remove();
    jQuery(document).ready(function() {
      jQuery("#home-slider").owlCarousel({
          nav : true, // Show next and prev buttons
          navText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
          ],
          slideSpeed : 300,
          paginationSpeed : 400,
          loop : true,
          items : 1,
          autoplay:true,
          autoplayTimeout:3000,
          autoplayHoverPause:true,
          touchDrag: false,
          mouseDrag: false,
          dots : true
        });
      });
});
})(jQuery);