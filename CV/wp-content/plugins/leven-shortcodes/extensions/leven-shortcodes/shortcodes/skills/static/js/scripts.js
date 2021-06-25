(function($) { 
"use strict";
	$(document).ready(function ($) {
		var custom_styles = "",
			color = "";
		
		function skillsStyles() {
			$( '.skill-container' ).each( function() {
				var value = $(this).attr('data-value'),
					color_value = $(this).attr('data-color');

				if( value >= 101) {
					value = '100';
				}

				if( typeof value != 'undefined' ) {
					var id = $(this).attr('id'),
					$custom_style = '#' + id + ' .skill-percentage { width: ' + value + '%; } ' + '#' + id + ' > div.skill-percentage { background-color: ' + color_value + '; } ';
					custom_styles += $custom_style;
				}
			});
			$('head').append('<style data-styles="leven-theme-skills-css" type="text/css">' + custom_styles + color + '</style>');
		}

		skillsStyles();

		$(this).ajaxComplete(function() {
			$('style[data-styles="leven-theme-skills-css"]').remove().detach();
			skillsStyles();
		});
	});
})(jQuery);
