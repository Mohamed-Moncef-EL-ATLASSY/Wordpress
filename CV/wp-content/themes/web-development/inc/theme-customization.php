<?php
/**
* Customization options
**/
function web_development_post_category(){
  $cats = array();
  $cats['']=esc_html__( 'Select Category', 'web-development' );
  foreach ( get_categories() as $categories => $category ){
      $cats[$category->term_id] = $category->name;
  }
  return $cats;
}

//checkbox sanitization function
function web_development_sanitize_checkbox( $checked ) {
  return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

//select sanitization function
function web_development_sanitize_select( $input, $setting ){         
  //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
  $input = sanitize_key($input); 
  //get the list of possible select options 
  $choices = $setting->manager->get_control( $setting->id )->choices;                            
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
}

//URL sanitization function
function web_development_sanitize_url( $url ) {
  return esc_url_raw( $url );
}

//customize register sanitization function
function web_development_customize_register( $wp_customize ) {
  $wp_customize->add_setting(
    'web_development_theme_color',
    array(
      'default'           => '#30bced',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control( $wp_customize,
    'web_development_theme_color',
    array(
      'label'   => esc_html__( 'Theme Color', 'web-development' ),
      'section' => 'colors',
    )
  ) ); 
  $wp_customize->add_setting(
    'web_development_secondary_color',
    array(
      'default'           => '#2f3d44',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control( $wp_customize,
    'web_development_secondary_color',
    array(
      'label'   => esc_html__( 'Secondary Color', 'web-development' ), 
      'section' => 'colors',
    )
  ) );
  $wp_customize->add_panel(
  'general',
    array(
      'title' => __( 'General Settings', 'web-development' ),
      'description' => __('General Settings','web-development'),
      'priority' => 20, 
  ));
  $wp_customize->get_section('title_tagline')->panel = 'general';
  $wp_customize->get_section('header_image')->panel = 'general';
  $wp_customize->get_section('static_front_page')->panel = 'general';   
  $wp_customize->get_section('title_tagline')->title = esc_html__( 'Header & Logo', 'web-development'); 
  /* --------------------------- Start Front Page Panel -------------------- */
   $wp_customize->add_panel(
    'homepage_setting',
    array(
    'title' => __( 'Front Page Settings', 'web-development' ),
    'description' => __('Front Page Settings','web-development'),
    'priority' => 20, 
    )
  );
  // Start Slider Section 
  $wp_customize->add_section( 'slider_setting', array(
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__('Slider Section', 'web-development'),
    'panel'          => 'homepage_setting'
  ) );
  // Checkbox
  $wp_customize->add_setting( 'hide_slider_section', array(
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'web_development_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_slider_section', array(
    'type' => 'checkbox',
    'section' => 'slider_setting', // Add a default or your own section
    'label' => esc_html__( 'Please check this box, if you want to hide this section.', 'web-development' ),
  ) );
  // Image
  for($i=1;$i<=2;$i++)
  {
    $wp_customize->add_setting( 'slider_image_'.$i, array(
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control(
      new WP_Customize_Cropped_Image_Control(
      $wp_customize,
      'slider_image_'.$i,
      array(
      'label' => esc_html( 'Slide '.$i ),
      'section' => 'slider_setting',
      'settings' => 'slider_image_'.$i,
      'description' => esc_html__('Upload Image Size : 1280 x 620', 'web-development'),
      'height' => 620,
      'width' => 1280,
      'flex_width ' => false,
      'flex_height ' => false,
      )
    ) ); 
    // Slide Title
    $wp_customize->add_setting( 'slide_title_'.$i.'', array(
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'slide_title_'.$i.'', array(
      'type' => 'text',
      'priority' => 10,
      'section' => 'slider_setting',
      'input_attrs' => array(
            'placeholder' => esc_html__( 'Title', 'web-development' ),
      )
    ) );
    // Slide Description
    $wp_customize->add_setting( 'slide_description_'.$i.'', array(
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'slide_description_'.$i.'', array(
        'type' => 'text',
        'priority' => 10,
        'section' => 'slider_setting',
        'input_attrs' => array(
              'placeholder' => esc_html__( 'Description', 'web-development' ),
        )
    ) );
    // Slide Button Title
    $wp_customize->add_setting( 'slide_button_title_'.$i.'', array(
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'slide_button_title_'.$i.'', array(
      'type' => 'text',
      'priority' => 10,
      'section' => 'slider_setting',
      'input_attrs' => array(
            'placeholder' => esc_html__( 'Button Title', 'web-development' ),
      )
    ) );
    // Butoon Link 
    $wp_customize->add_setting( 'slide_link_'.$i, array(    
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'web_development_sanitize_url',
    ) );
    $wp_customize->add_control( 'slide_link_'.$i, array(
      'type' => 'url',
      'priority' => 10,
      'section' => 'slider_setting',      
      'input_attrs' => array(
            'placeholder' => esc_html__( 'Button Link', 'web-development' ),
      )
    ) );
  }
  // End Slider Section 
  // Start Services Section
  $wp_customize->add_section( 'our_services', array(
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__('Services Section', 'web-development'),
    'panel'          => 'homepage_setting'
  ) );
  // Checkbox
  $wp_customize->add_setting( 'hide_services_section', array(
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'web_development_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_services_section', array(
    'type' => 'checkbox',
    'section' => 'our_services', // Add a default or your own section
    'label' => esc_html__( 'Please check this box, if you want to hide this section.', 'web-development' ),
    'description' => '',
  ) );
  // Title
  $wp_customize->add_setting( 'services_title', array(
    'default' => esc_html__( 'Our Services', 'web-development' ),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'services_title', array(
    'type' => 'text',
    'priority' => 10,
    'section' => 'our_services',
    'label' => esc_html__( 'Title', 'web-development' ),
  ) );
  // Description 
  $wp_customize->add_setting( 'services_description', array(
    'default' => esc_html__( 'Our Services description', 'web-development' ),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'wp_kses_post',
  ) );
  $wp_customize->add_control( 'services_description', array(
    'type' => 'textarea',
    'priority' => 10,
    'section' => 'our_services',
    'label' => esc_html__( 'Description', 'web-development' ),
  ) );
  // Services - sub section 1,2,3,4,5,6 - title, icon and description 
  for($i=1;$i<=3;$i++)
  {
    $wp_customize->add_setting( 'secrvices_box_title'.$i, array(      
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'secrvices_box_title'.$i, array(
      'type' => 'text',
      'priority' => 10,
      'section' => 'our_services',
      'label' => esc_html__( 'Box ', 'web-development' ).$i,
      'input_attrs' => array(
          'placeholder' => esc_html__( 'Title', 'web-development' ),
      )
    ) );
    // Section Icon
    $wp_customize->add_setting( 'secrvices_box_icon'.$i, array(
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'secrvices_box_icon'.$i, array(
      'type' => 'text',
      'priority' => 10,
      'section' => 'our_services',        
      'input_attrs' => array(
          'placeholder' => esc_html__( 'Icon ', 'web-development' ),
      )
    ) );
    // Section Description
    $wp_customize->add_setting( 'secrvices_box_desc'.$i, array(      
      'type' => 'theme_mod',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'secrvices_box_desc'.$i, array(
      'type' => 'text',
      'priority' => 10,
      'section' => 'our_services',
      'input_attrs' => array(
          'placeholder' => esc_html__( 'Description ', 'web-development' ),
      )
    ) );
  }
  // End Services Section 
  // Start Portfoli Section
  $wp_customize->add_section( 'our_portfolio', array(
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__('Portfolio Section', 'web-development'),
    'panel'          => 'homepage_setting'
  ) );
  // Checkbox Field 
  $wp_customize->add_setting( 'hide_portfolio_section', array(
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'web_development_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_portfolio_section', array(
    'type' => 'checkbox',
    'section' => 'our_portfolio', // Add a default or your own section
    'label' => esc_html__( 'Please check this box, if you want to hide this section.', 'web-development' ),
  ) );
  // Title
  $wp_customize->add_setting( 'portfolio_section_title', array(
    'default' => esc_html__('Portfolio','web-development'),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'portfolio_section_title', array(
    'type' => 'text',
    'section' => 'our_portfolio',
    'label'   => __('Title','web-development'),
  ) );
  // Description
  $wp_customize->add_setting( 'portfolio_description', array(
    'default' => __('Portfolio Description','web-development'),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'wp_kses_post',
  ) );
  $wp_customize->add_control( 'portfolio_description', array(
    'type' => 'textarea',
    'priority' => 10,
    'label' => esc_html__( 'Description', 'web-development' ),
    'section' => 'our_portfolio',
  ) );
  // Post Category select box
  
  $wp_customize->add_setting( 'portfolio_section_category', array(
    'sanitize_callback' => 'web_development_sanitize_select',
  ) );
  $wp_customize->add_control( 'portfolio_section_category', array(
    'type' => 'select',
    'choices' => web_development_post_category(),
    'section' => 'our_portfolio',
    'label' => esc_html__( 'Category', 'web-development' ),
  ) );
  // Button Title
  $wp_customize->add_setting( 'portfolio_button_title', array(
    'default' => esc_html__( 'View More', 'web-development' ),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'portfolio_button_title', array(
    'type' => 'text',
    'section' => 'our_portfolio',
    'label'   => __('Button Title','web-development'),
  ) );
  // End Portfolio Section
  // Start Team Section
  $wp_customize->add_section( 'our_team', array(
    'capability'     => 'edit_theme_options',    
    'title'          => esc_html__('Team Section', 'web-development'),
    'panel'          => 'homepage_setting'
  ) );
  // Checkbox Field
  $wp_customize->add_setting( 'hide_ourteam_section', array(
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'web_development_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_ourteam_section', array(
    'type' => 'checkbox',
    'section' => 'our_team', // Add a default or your own section
    'label' => esc_html__( 'Please check this box, if you want to hide this section.', 'web-development' ),
  ) );
  // Title
  $wp_customize->add_setting( 'ourteam_section_title', array(
    'default' => esc_html__('Our Team', 'web-development'),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'ourteam_section_title', array(
    'type' => 'text',
    'section' => 'our_team',
    'label'   => __('Title','web-development'),
  ) );
  // Post Category select box  
  $wp_customize->add_setting( 'ourteam_section_category', array(
    'sanitize_callback' => 'web_development_sanitize_select',
  ) );
  $wp_customize->add_control( 'ourteam_section_category', array(
    'type' => 'select',
    'choices' => web_development_post_category(),
    'section' => 'our_team',
    'label' => esc_html__( 'Category', 'web-development' ),
  ) );
  // End Team Section
  // Start Testimonials Section
  $wp_customize->add_section( 'testimonials', array(
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__('Testimonials Section', 'web-development'),
    'panel'          => 'homepage_setting'
  ) );
  // Checkbox
  $wp_customize->add_setting( 'hide_testimonials_section', array(
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'web_development_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_testimonials_section', array(
    'type' => 'checkbox',
    'section' => 'testimonials', // Add a default or your own section
    'label' => esc_html__( 'Please check this box, if you want to hide this section.', 'web-development' ),
  ) );
  // Section Title
  $wp_customize->add_setting( 'testimonials_section_title', array(
    'default' => esc_html__( 'Testimonials', 'web-development' ),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'testimonials_section_title', array(
    'type' => 'text',
    'section' => 'testimonials',
    'label'   => __('Title','web-development'),
  ) );
  // Post Category select box  
  $wp_customize->add_setting( 'testimonials_section_category', array(
    'sanitize_callback' => 'web_development_sanitize_select',
  ) );
  $wp_customize->add_control( 'testimonials_section_category', array(
    'type' => 'select',
    'choices' => web_development_post_category(),
    'section' => 'testimonials',
    'label' => esc_html__( 'Category', 'web-development' ),
  ) );
  // Display Number of post
  $wp_customize->add_setting( 'testimonials_display_post', array(
    'default' => 2,
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'absint',
  ) );
  $wp_customize->add_control( 'testimonials_display_post', array(
    'type' => 'text',
    'section' => 'testimonials',
    'label'   => __('Display Number of Post','web-development'),
  ) );
  $wp_customize->add_setting('testimonials_background_image', array(
    'default' => esc_url(get_template_directory_uri().'/assets/images/testiminial-bg.jpg'),
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'absint',
    ));
  $wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control(
    $wp_customize,
    'testimonials_background_image',
    array(
    'label' => esc_html__( 'Section Background Image', 'web-development' ),
    'section' => 'testimonials',
    'settings' => 'testimonials_background_image',
    'description' => esc_html__('Upload Image Size : 1280 x 310', 'web-development'),
    'height' => 310,
    'width' => 1280,
    'flex_width ' => false,
    'flex_height ' => false,
    )
  ) ); 
  // End Testimonial Section
  // Start Blog Listing Section 
  $wp_customize->add_section( 'blog_page_section', array(
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__('Blog(Archive) Page', 'web-development'),
    'panel'          => 'general'
  ) );
  // Meta Tag Checkbox
  $wp_customize->add_setting( 'meta_tag', array(
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'web_development_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'meta_tag', array(
    'type' => 'checkbox',
    'section' => 'blog_page_section', // Add a default or your own section
    'label' => esc_html__( 'Please check this box, if you want to hide meta tag', 'web-development' ),
  ) );
  // Blog Image Checkbox
  $wp_customize->add_setting( 'post_image', array(
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'web_development_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'post_image', array(
    'type' => 'checkbox',
    'section' => 'blog_page_section', // Add a default or your own section
    'label' => esc_html__( 'Please check this box, if you want to hide post image', 'web-development' ),
  ) );
  // Read More Link
  $wp_customize->add_setting( 'post_readmore', array(
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'web_development_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'post_readmore', array(
    'type' => 'checkbox',
    'section' => 'blog_page_section', // Add a default or your own section
    'label' => esc_html__( 'Please check this box, if you want to hide read more link', 'web-development' ),
  ) );
  // Post Content Limit
  $wp_customize->add_setting( 'post_content_limit', array(
    'default' => 40,
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'absint',
  ) );
  $wp_customize->add_control( 'post_content_limit', array(
    'type' => 'text',
    'priority' => 10,
    'section' => 'blog_page_section',
    'label' => esc_html__( 'Post Content Limit', 'web-development' ),
  ) );
  // Blog sidebar setting 
  $wp_customize->add_setting( 'sidebar_layout', array(
    'default' => 'right',
    'sanitize_callback' => 'web_development_sanitize_select',
  ) );
  $wp_customize->add_control( 'sidebar_layout', array(
    'type' => 'select',
    'section' => 'blog_page_section',
    'label' => esc_html__( 'Display Sidebar', 'web-development' ),
    'choices' => array(
      'right' => esc_html__( 'Right Sidebar', 'web-development' ),
      'left' => esc_html__( 'Left Sidebar', 'web-development' ),
      'full' => esc_html__( 'No Sidebar', 'web-development' ),
      )
  ) );
  // End Blog Listing Section
  // Start Single Post Page Section
  $wp_customize->add_section( 'single_page_section', array(
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__('Single Post Page', 'web-development'),
    'panel'          => 'general'
  ) );
  // Single Post Meta Tag Checkbox 
  $wp_customize->add_setting( 'single_post_meta_tag', array(
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'web_development_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'single_post_meta_tag', array(
    'type' => 'checkbox',
    'section' => 'single_page_section', // Add a default or your own section
    'label' => esc_html__( 'Please check this box, if you want to hide meta tag', 'web-development' ),      
  ) );
  // Comment Form 
  $wp_customize->add_setting( 'single_post_comment_form', array(
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'web_development_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'single_post_comment_form', array(
    'type' => 'checkbox',
    'section' => 'single_page_section', // Add a default or your own section
    'label' => esc_html__( 'Please check this box, if you want to hide comment form', 'web-development' ),
  ) );
  // Single Post Image Checkbox 
  $wp_customize->add_setting( 'single_post_image', array(
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'web_development_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'single_post_image', array(
    'type' => 'checkbox',
    'section' => 'single_page_section', // Add a default or your own section
    'label' => esc_html__( 'Please check this box, if you want to hide post image', 'web-development' ),
  ) );
  // Single Post Page Sidebar
  $wp_customize->add_setting( 'sidebar_single', array(
    'default' => 'right',
    'sanitize_callback' => 'web_development_sanitize_select',
  ) );
  $wp_customize->add_control( 'sidebar_single', array(
    'type' => 'select',
    'section' => 'single_page_section',
    'label' => esc_html__( 'Display Sidebar', 'web-development' ),
    'choices' => array(
      'right' => esc_html__( 'Right Sidebar', 'web-development' ),
      'left' => esc_html__( 'Left Sidebar', 'web-development' ),
      'full' => esc_html__( 'No Sidebar', 'web-development' ),
      )
  ) );
  // End Blog Page Section
  /* --------------------------- End Front Page Panel -------------------- */
  /* --------------------------- Start Footer Settings Panel ------------- */
  $wp_customize->add_section( 'footer_setting', array(
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__('Footer Settings', 'web-development'),
  ) );
  $wp_customize->add_setting( 'footerCopyright', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'wp_kses_post',
  ) );
  $wp_customize->add_control( 'footerCopyright', array(
      'type' => 'textarea',
      'section' => 'footer_setting',
      'label'   => __('Copyright Text','web-development'),
      'description' => esc_html__('Some text regarding copyright of your site, you would like to display in the footer.', 'web-development'),
  ) );
  /* --------------------------- End Footer Settings Panel ------------------ */
}
add_action( 'customize_register', 'web_development_customize_register' );

//custom css function add inline style and script
function web_development_custom_css(){ 

  $custom_css=''; 

  if(get_theme_mod('testimonials_background_image') != "") {
      $testimonial_image_url=wp_get_attachment_url(get_theme_mod('testimonials_background_image'));
   } else {
      $testimonial_image_url=get_template_directory_uri().'/assets/images/testiminial-bg.jpg';
   }
  $custom_css .=' *::selection{
    background: '.esc_attr(get_theme_mod('web_development_theme_color','#30bced')).';
  }
  .sidebar .widget ul li:hover>a, .sidebar .widget ul li:hover{color: '.esc_attr(get_theme_mod('web_development_theme_color','#30bced')).';}
  .brand_text .site-title h4, .brand_text .site-title small, .brand_text .site-title{
   color: #'.esc_attr(get_header_textcolor()).' ;
  }
  .sidebar .widget h3:before,.blog_text h3.post_title:after,.sidebar .widget_tag_cloud .tagcloud a:hover,.footer-list .tagcloud a:hover,footer .footer-list .footer-title:after,#cssmenu > ul > li:hover, #cssmenu ul li.current_page_item:hover, #cssmenu ul li.current_page_item, #cssmenu ul li.has-sub.current_page_item:hover,.blog_details a.read-more:hover,#cssmenu ul ul li.has-sub:hover, #cssmenu ul li.has-sub ul li.has-sub ul li:hover,.page-numbers li:hover,#cssmenu ul.first_menu ul.sub-menu li:hover>a,.comment_title h3:after,p.form-submit input[type=submit],a.read_more:hover,#home-slider .owl-dots .owl-dot.active span, #home-slider .owl-dots .owl-dot:hover span,section.our_overview::before,.more a:hover,footer h4::after,.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span, #cssmenu > ul > li:hover > a, #cssmenu > ul > li.current-menu-item a, #cssmenu > ul > li.current-menu-parent > a, footer h4::after, footer p.widget-title::after{background-color: '.esc_attr(get_theme_mod('web_development_theme_color','#30bced')).';}  
  .cats.mb span>i,.scroll_top,.banner_text ul li>a,a,.banner_text ul li a:hover,.icon-box i,a:hover, .first_footer .footer-list ul li a:hover, .first_footer .footer-list ul li a:hover{color: '.esc_attr(get_theme_mod('web_development_theme_color','#30bced')).';}
  p.form-submit input[type=submit]{border-color: '.esc_attr(get_theme_mod('web_development_theme_color','#30bced')).';}
  
  section.testimonial_bg{background-image: url('.esc_url($testimonial_image_url).' );}

  .blog_details a.read-more,.footer-list .tagcloud a:hover,a.read_more:hover,.more a:hover{border-color: '.esc_attr(get_theme_mod('web_development_theme_color','#30bced')).';}

  #cssmenu ul ul li, section.tab_main, .site-info, .scroll_top, footer{background-color: '.esc_attr(get_theme_mod('web_development_secondary_color','#2f3d44')).';}

  @media (max-width:1024px){
        #cssmenu ul li a,#cssmenu ul ul li a{background-color: '.esc_attr(get_theme_mod('web_development_secondary_color','#2f3d44')).';}
    }';  

 
  if(display_header_text()){ 
  $custom_css .='

    @media only screen and ( max-width: 599px ) {    .banner { margin-top: 0px; }    }';
     } 

$custom_js ='';     
$custom_js .= 'jQuery(window).scroll(function(){
var scroll = jQuery(window).scrollTop();
  if (scroll >= 290) {
        jQuery(".main_header_bg").addClass("fixed-header");
      }
      else {
          jQuery(".main_header_bg").removeClass("fixed-header");
      }
});';

  wp_add_inline_style('web-development-default',$custom_css);
  wp_add_inline_script('web-development-default',$custom_js);
}