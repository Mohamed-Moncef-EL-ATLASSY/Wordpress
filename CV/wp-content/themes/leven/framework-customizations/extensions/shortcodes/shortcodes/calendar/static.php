<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$shortcodes_extension = fw_ext( 'shortcodes' );

wp_enqueue_style(
	'fw-shortcode-calendar-bootstrap3',
	$shortcodes_extension->get_declared_URI( '/shortcodes/calendar/static/libs/bootstrap3/css/bootstrap-grid.css' )
);
wp_enqueue_style(
	'fw-shortcode-calendar-calendar',
	fw_get_template_customizations_directory_uri(
        '/extensions/shortcodes/shortcodes/calendar/static/css/calendar.css'
    )
);

$theme_style = ( function_exists('fw_get_db_settings_option') ) ? fw_get_db_settings_option('theme_style_picker') :  'light';

if ($theme_style == 'dark'){
	wp_enqueue_style(
		'fw-shortcode-calendar-calendar-dark',
		fw_get_template_customizations_directory_uri(
	        '/extensions/shortcodes/shortcodes/calendar/static/css/calendar-dark.css'
	    )
	);
}

wp_enqueue_style(
	'fw-shortcode-calendar',
	fw_get_template_customizations_directory_uri(
        '/extensions/shortcodes/shortcodes/calendar/static/css/styles.css'
    )
);


wp_enqueue_script(
	'fw-shortcode-calendar-bootstrap3',
	$shortcodes_extension->get_declared_URI( '/shortcodes/calendar/static/libs/bootstrap3/js/bootstrap.min.js' ),
	array( 'jquery', 'underscore' ),
	fw()->manifest->get_version(),
	true
);
wp_enqueue_script(
	'fw-shortcode-calendar-timezone',
	$shortcodes_extension->get_declared_URI( '/shortcodes/calendar/static/libs/jstimezonedetect/jstz.min.js' ),
	array( 'jquery', 'underscore' ),
	fw()->manifest->get_version(),
	true
);
wp_enqueue_script(
	'fw-shortcode-calendar-calendar',
	$shortcodes_extension->get_declared_URI( '/shortcodes/calendar/static/js/calendar.js' ),
	array( 'jquery', 'underscore', 'fw-shortcode-calendar-bootstrap3', 'fw-shortcode-calendar-timezone' ),
	fw()->manifest->get_version(),
	true
);
wp_enqueue_script(
	'fw-shortcode-calendar',
	$shortcodes_extension->get_declared_URI( '/shortcodes/calendar/static/js/scripts.js' ),
	array( 'jquery', 'underscore', 'fw-shortcode-calendar-calendar' ),
	fw()->manifest->get_version(),
	true
);

$locale = get_locale();
wp_localize_script(
	'fw-shortcode-calendar',
	'fwShortcodeCalendarLocalize',
	array(
		'event'  => esc_html__( 'Event', 'leven' ),
		'events' => esc_html__( 'Events', 'leven' ),
		'today'  => esc_html__( 'Today', 'leven' ),
		'locale' => $locale
	)
);
wp_localize_script(
	'fw-shortcode-calendar',
	'calendar_languages',
	array(
		$locale => array(
			'error_noview'     => sprintf( esc_html__( 'Calendar: View %s not found', 'leven' ), '{0}' ),
			'error_dateformat' => sprintf( esc_html__( 'Calendar: Wrong date format %s. Should be either "now" or "yyyy-mm-dd"',
					'leven' ), '{0}' ),
			'error_loadurl'    => esc_html__( 'Calendar: Event URL is not set', 'leven' ),
			'error_where'      => sprintf( esc_html__( 'Calendar: Wrong navigation direction %s. Can be only "next" or "prev" or "today"',
					'leven' ), '{0}' ),
			'error_timedevide' => esc_html__( 'Calendar: Time split parameter should divide 60 without decimals. Something like 10, 15, 30',
				'leven' ),
			'no_events_in_day' => esc_html__( 'No events in this day.', 'leven' ),
			'title_year'       => '{0}',
			'title_month'      => '{0} {1}',
			'title_week'       => sprintf( esc_html__( 'week %s of %s', 'leven' ), '{0}', '{1}' ),
			'title_day'        => '{0} {1} {2}, {3}',
			'week'             => esc_html__( 'Week ', 'leven' ) . '{0}',
			'all_day'          => esc_html__( 'All day', 'leven' ),
			'time'             => esc_html__( 'Time', 'leven' ),
			'events'           => esc_html__( 'Events', 'leven' ),
			'before_time'      => esc_html__( 'Ends before timeline', 'leven' ),
			'after_time'       => esc_html__( 'Starts after timeline', 'leven' ),
			'm0'               => esc_html__( 'January', 'leven' ),
			'm1'               => esc_html__( 'February', 'leven' ),
			'm2'               => esc_html__( 'March', 'leven' ),
			'm3'               => esc_html__( 'April', 'leven' ),
			'm4'               => esc_html__( 'May', 'leven' ),
			'm5'               => esc_html__( 'June', 'leven' ),
			'm6'               => esc_html__( 'July', 'leven' ),
			'm7'               => esc_html__( 'August', 'leven' ),
			'm8'               => esc_html__( 'September', 'leven' ),
			'm9'               => esc_html__( 'October', 'leven' ),
			'm10'              => esc_html__( 'November', 'leven' ),
			'm11'              => esc_html__( 'December', 'leven' ),
			'ms0'              => esc_html__( 'Jan', 'leven' ),
			'ms1'              => esc_html__( 'Feb', 'leven' ),
			'ms2'              => esc_html__( 'Mar', 'leven' ),
			'ms3'              => esc_html__( 'Apr', 'leven' ),
			'ms4'              => esc_html__( 'May', 'leven' ),
			'ms5'              => esc_html__( 'Jun', 'leven' ),
			'ms6'              => esc_html__( 'Jul', 'leven' ),
			'ms7'              => esc_html__( 'Aug', 'leven' ),
			'ms8'              => esc_html__( 'Sep', 'leven' ),
			'ms9'              => esc_html__( 'Oct', 'leven' ),
			'ms10'             => esc_html__( 'Nov', 'leven' ),
			'ms11'             => esc_html__( 'Dec', 'leven' ),
			'd0'               => esc_html__( 'Sunday', 'leven' ),
			'd1'               => esc_html__( 'Monday', 'leven' ),
			'd2'               => esc_html__( 'Tuesday', 'leven' ),
			'd3'               => esc_html__( 'Wednesday', 'leven' ),
			'd4'               => esc_html__( 'Thursday', 'leven' ),
			'd5'               => esc_html__( 'Friday', 'leven' ),
			'd6'               => esc_html__( 'Saturday', 'leven' ),
		)
	)
);
