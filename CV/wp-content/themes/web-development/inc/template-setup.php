<?php
/** 
 * @package Web Development
 */
// TGM plugin register filter .
add_action('tgmpa_register', 'web_development_required_plugins');

function web_development_required_plugins() {
    if (class_exists('TGM_Plugin_Activation')) {
        $plugins = array(
            array(
                'name' => __('Page Builder by SiteOrigin', 'web-development'),
                'slug' => 'siteorigin-panels',
                'required' => false,
            ),
            array(
                'name' => __('SiteOrigin Widgets Bundle', 'web-development'),
                'slug' => 'so-widgets-bundle',
                'required' => false,
            ),
            array(
                'name' => __('Contact Form 7', 'web-development'),
                'slug' => 'contact-form-7',
                'required' => false,
            ),
        );
        $config = array(
            'default_path' => '',
            'menu' => 'web-development-install-plugins',
            'has_notices' => true,
            'dismissable' => true,
            'dismiss_msg' => '',
            'is_automatic' => false,
            'message' => '',
            'strings' => array(
                'page_title' => __('Install Recommended Plugins', 'web-development'),
                'menu_title' => __('Install Plugins', 'web-development'),
                'nag_type' => 'updated'
            )
        );
        tgmpa($plugins, $config);
    }
}