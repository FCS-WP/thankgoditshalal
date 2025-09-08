<?php
/*
 * All Metabox related options for Istiqbal theme.
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

function istiqbal_metabox_options( $options ) {


  $header = get_posts( 'post_type="headerbuilder"&numberposts=-1' );
  $headers = array( 'theme' => esc_html__( 'Default', 'istiqbal' ) );
  if ( $header ) {
    foreach ( $header as $head ) {
      $headers[ $head->ID ] = $head->post_title;
    }
  }
  $footer = get_posts( 'post_type="footerbuilder"&numberposts=-1' );
  $footers = array( 'theme' => esc_html__( 'Default', 'istiqbal' ));
  if ( $footer ) {
    foreach ( $footer as $foot ) {
      $footers[ $foot->ID ] = $foot->post_title;
    }
  }


  $options      = array();

  // -----------------------------------------
  // Post Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'post_type_metabox',
    'title'     => esc_html__('Post Options', 'istiqbal'),
    'post_type' => 'post',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'section_post_formats',
        'fields' => array(

          // Standard, Image
          array(
            'title' => 'Standard Image',
            'type'  => 'subheading',
            'content' => esc_html__('There is no Extra Option for this Post Format!', 'istiqbal'),
            'wrap_class' => 'istiqbal-minimal-heading hide-title',
          ),
          // Standard, Image

          // Gallery
          array(
            'type'    => 'notice',
            'title'   => 'Gallery Format',
            'wrap_class' => 'hide-title',
            'class'   => 'info cs-istiqbal-heading',
            'content' => esc_html__('Gallery Format', 'istiqbal')
          ),
          array(
            'id'          => 'gallery_post_format',
            'type'        => 'gallery',
            'title'       => esc_html__('Add Gallery', 'istiqbal'),
            'add_title'   => esc_html__('Add Image(s)', 'istiqbal'),
            'edit_title'  => esc_html__('Edit Image(s)', 'istiqbal'),
            'clear_title' => esc_html__('Clear Image(s)', 'istiqbal'),
          ),
          array(
            'type'    => 'text',
            'title'   => esc_html__('Add Video URL', 'istiqbal' ),
            'id'   => 'video_post_format',
            'desc' => esc_html__('Add youtube or vimeo video link', 'istiqbal' ),
            'wrap_class' => 'video_post_format',
          ),
          array(
            'type'    => 'icon',
            'title'   => esc_html__('Add Quote Icon', 'istiqbal' ),
            'id'   => 'quote_post_format',
            'desc' => esc_html__('Add Quote Icon here', 'istiqbal' ),
            'wrap_class' => 'quote_post_format',
          ),
          // Gallery

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Page Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_type_metabox',
    'title'     => esc_html__('Page Custom Options', 'istiqbal'),
    'post_type' => array('post', 'page'),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // Title Section
      array(
        'name'  => 'page_topbar_section',
        'title' => esc_html__('Top Bar', 'istiqbal'),
        'icon'  => 'fa fa-minus',

        // Fields Start
        'fields' => array(

          array(
            'id'           => 'topbar_options',
            'type'         => 'image_select',
            'title'        => esc_html__('Topbar', 'istiqbal'),
            'options'      => array(
              'default'     => ISTIQBAL_CS_IMAGES .'/topbar-default.png',
              'custom'      => ISTIQBAL_CS_IMAGES .'/topbar-custom.png',
              'hide_topbar' => ISTIQBAL_CS_IMAGES .'/topbar-hide.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'hide_topbar_select',
            ),
            'radio'     => true,
            'default'   => 'default',
          ),
          array(
            'id'          => 'top_left',
            'type'        => 'textarea',
            'title'       => esc_html__('Top Left', 'istiqbal'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
            'shortcode'       => true,
          ),
          array(
            'id'          => 'top_right',
            'type'        => 'textarea',
            'title'       => esc_html__('Top Right', 'istiqbal'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
            'shortcode'       => true,
          ),
          array(
            'id'    => 'topbar_bg',
            'type'  => 'color_picker',
            'title' => esc_html__('Topbar Background Color', 'istiqbal'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
          ),
          array(
            'id'    => 'topbar_border',
            'type'  => 'color_picker',
            'title' => esc_html__('Topbar Border Color', 'istiqbal'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
          ),

        ), // End : Fields

      ), // Title Section

      // Header
      array(
        'name'  => 'header_section',
        'title' => esc_html__('Header & Footer', 'istiqbal'),
        'icon'  => 'fa fa-bars',
        'fields' => array(
          array(
            'id'           => 'select_header_design',
            'type'         => 'select',
            'title'        => esc_html__('Select Header Design', 'istiqbal'),
            'options'      => $headers,
            'attributes' => array(
              'data-depend-id' => 'header_design',
            ),
            'radio'     => true,
            'default'   => 'default',
            'info'      => esc_html__('Select your header design, following options will may differ based on your selection of header design.', 'istiqbal'),
          ),
          array(
            'id'           => 'select_footer_design',
            'type'         => 'select',
            'title'        => esc_html__('Select Footer Design', 'istiqbal'),
            'options'      => $footers,
            'attributes' => array(
              'data-depend-id' => 'footer_design',
            ),
            'radio'     => true,
            'default'   => 'default',
            'info'      => esc_html__('Select your footer design, following options will may differ based on your selection of footer design.', 'istiqbal'),
          ),
        ),
      ),
      // Header

      // Banner & Title Area
      array(
        'name'  => 'banner_title_section',
        'title' => esc_html__('Banner & Title Area', 'istiqbal'),
        'icon'  => 'fa fa-bullhorn',
        'fields' => array(

          array(
            'id'        => 'banner_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Banner Type', 'istiqbal'),
            'options'   => array(
              'default-title'    => 'Default Title',
              'revolution-slider' => 'Shortcode [Rev Slider]',
              'hide-title-area'   => 'Hide Title/Banner Area',
            ),
          ),
          array(
            'id'    => 'page_revslider',
            'type'  => 'textarea',
            'title' => esc_html__('Revolution Slider or Any Shortcodes', 'istiqbal'),
            'desc' => __('Enter any shortcodes that you want to show in this page title area. <br />Eg : Revolution Slider shortcode.', 'istiqbal'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your shortcode...', 'istiqbal'),
            ),
            'dependency'   => array('banner_type', '==', 'revolution-slider'),
          ),
          array(
            'id'    => 'page_custom_title',
            'type'  => 'text',
            'title' => esc_html__('Custom Title', 'istiqbal'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your custom title...', 'istiqbal'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'        => 'title_area_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Title Area Spacings', 'istiqbal'),
            'options'   => array(
              'padding-default' => esc_html__('Default Spacing', 'istiqbal'),
              'padding-custom' => esc_html__('Custom Padding', 'istiqbal'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'istiqbal'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'istiqbal'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_area_bg',
            'type'  => 'background',
            'title' => esc_html__('Background', 'istiqbal'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'titlebar_bg_overlay_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Overlay Color', 'istiqbal'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Title Color', 'istiqbal'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),

        ),
      ),
      // Banner & Title Area

      // Content Section
      array(
        'name'  => 'page_content_options',
        'title' => esc_html__('Content Options', 'istiqbal'),
        'icon'  => 'fa fa-file',

        'fields' => array(

          array(
            'id'        => 'content_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Content Spacings', 'istiqbal'),
            'options'   => array(
              'padding-default' => esc_html__('Default Spacing', 'istiqbal'),
              'padding-custom' => esc_html__('Custom Padding', 'istiqbal'),
            ),
            'desc' => esc_html__('Content area top and bottom spacings.', 'istiqbal'),
          ),
          array(
            'id'    => 'content_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'istiqbal'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),
          array(
            'id'    => 'content_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'istiqbal'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),
        ), // End Fields
      ), // Content Section

      // Enable & Disable
      array(
        'name'  => 'hide_show_section',
        'title' => esc_html__('Enable & Disable', 'istiqbal'),
        'icon'  => 'fa fa-toggle-on',
        'fields' => array(

          array(
            'id'    => 'hide_header',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Header', 'istiqbal'),
            'label' => esc_html__('Yes, Please do it.', 'istiqbal'),
          ),
          array(
            'id'    => 'hide_breadcrumbs',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Breadcrumbs', 'istiqbal'),
            'label' => esc_html__('Yes, Please do it.', 'istiqbal'),
          ),
          array(
            'id'    => 'hide_footer',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Footer', 'istiqbal'),
            'label' => esc_html__('Yes, Please do it.', 'istiqbal'),
          ),
       
        ),
      ),
      // Enable & Disable

    ),
  );

  // -----------------------------------------
  // Page Layout
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_layout_options',
    'title'     => esc_html__('Page Layout', 'istiqbal'),
    'post_type' => 'page',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'page_layout_section',
        'fields' => array(

          array(
            'id'        => 'page_layout',
            'type'      => 'image_select',
            'options'   => array(
              'full-width'    => ISTIQBAL_CS_IMAGES . '/page-1.png',
              'extra-width'   => ISTIQBAL_CS_IMAGES . '/page-2.png',
              'left-sidebar'  => ISTIQBAL_CS_IMAGES . '/page-3.png',
              'right-sidebar' => ISTIQBAL_CS_IMAGES . '/page-4.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'page_layout',
            ),
            'default'    => 'full-width',
            'radio'      => true,
            'wrap_class' => 'text-center',
          ),
          array(
            'id'            => 'page_sidebar_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'istiqbal'),
            'options'        => istiqbal_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'istiqbal'),
            'dependency'   => array('page_layout', 'any', 'left-sidebar,right-sidebar'),
          ),

        ),
      ),

    ),
  );


// -----------------------------------------
  // Project
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'event_options',
    'title'     => esc_html__('Project Extra Options', 'istiqbal'),
    'post_type' => 'event',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'event_option_section',
        'fields' => array(
          array(
            'id'           => 'event_title',
            'type'         => 'text',
            'title'        => esc_html__('Event title', 'istiqbal'),
            'add_title' => esc_html__('Add Event title', 'istiqbal'),
            'attributes' => array(
              'placeholder' => esc_html__('Event Title', 'istiqbal'),
            ),
            'info'    => esc_html__('Write Event Title.', 'istiqbal'),
          ),   
          array(
            'id'           => 'event_image',
            'type'         => 'image',
            'title'        => esc_html__('Event Image', 'istiqbal'),
            'add_title' => esc_html__('Add Event Image', 'istiqbal'),
          ),
           // Start fields
        ),
      ),

    ),
  );



 // -----------------------------------------
  // Service
  // -----------------------------------------

  $options[]    = array(
    'id'        => 'service_options',
    'title'     => esc_html__('Service Meta', 'istiqbal'),
    'post_type' => 'service',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(
      array(
        'name'   => 'service_infos',
        'fields' => array(
         array(
            'id'           => 'service_icon',
            'type'         => 'image',
            'title'        => esc_html__('Service Icon', 'istiqbal'),
            'add_title' => esc_html__('Service Icon', 'istiqbal'),
            'info'    => esc_html__('Attached Icon.', 'istiqbal'),
          ), 
         array(
            'id'           => 'service_image',
            'type'         => 'image',
            'title'        => esc_html__('Service Image', 'istiqbal'),
            'add_title' => esc_html__('Service Image', 'istiqbal'),
            'info'    => esc_html__('Attached Image.', 'istiqbal'),
          ),

        ),
      ),
    ),
  );

// -----------------------------------------
  // Events
  // -----------------------------------------

  $options[]    = array(
    'id'        => 'event_options',
    'title'     => esc_html__('Event Meta', 'istiqbal'),
    'post_type' => 'event',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(
      array(
        'name'   => 'event_infos',
        'fields' => array(
      
         array(
            'id'           => 'event_time',
            'type'         => 'text',
            'title'        => esc_html__('Event Time', 'istiqbal'),
            'add_title' => esc_html__('9:00 am', 'istiqbal'),
            'info'    => esc_html__('Add Time.', 'istiqbal'),
          ),
         array(
            'id'           => 'event_date',
            'type'         => 'text',
            'title'        => esc_html__('Event Date', 'istiqbal'),
            'add_title' => esc_html__('June 1, 2024 00:00:00', 'istiqbal'),
            'attributes' => array(
              'placeholder' => esc_html__('June 1, 2024 00:00:00', 'istiqbal'),
            ),
            'info'    => esc_html__('Add Event Date.', 'istiqbal'),
          ),
         array(
            'id'           => 'location_address',
            'type'         => 'text',
            'title'        => esc_html__('Event Location', 'istiqbal'),
            'add_title' => esc_html__('New York', 'istiqbal'),
            'info'    => esc_html__('Add Location.', 'istiqbal'),
          ),
         array(
            'id'           => 'button_text',
            'type'         => 'text',
            'title'        => esc_html__('Button Text', 'istiqbal'),
            'add_title' => esc_html__('Join Now', 'istiqbal'),
            'info'    => esc_html__('Add Button.', 'istiqbal'),
          ),
         array(
            'id'           => 'button_link',
            'type'         => 'text',
            'title'        => esc_html__('Button Link', 'istiqbal'),
            'add_title' => esc_html__('#', 'istiqbal'),
            'info'    => esc_html__('Add link here.', 'istiqbal'),
          ),
          array(
            'id'           => 'event_image',
            'type'         => 'image',
            'title'        => esc_html__('Event Image', 'istiqbal'),
            'add_title' => esc_html__('Add Event Image', 'istiqbal'),
          ),
          array(
            'id'           => 'event_image2',
            'type'         => 'image',
            'title'        => esc_html__('Event Image 2', 'istiqbal'),
            'add_title' => esc_html__('Add Event Image', 'istiqbal'),
          ),

        ),
      ),
    ),
  );


if (class_exists( 'WooCommerce' )){ 
   // -----------------------------------------
    // Product
    // -----------------------------------------
    $options[]    = array(
      'id'        => 'istiqbal_woocommerce_section',
      'title'     => esc_html__('Product Title', 'istiqbal'),
      'post_type' => 'product',
      'context'   => 'normal',
      'priority'  => 'high',
      'sections'  => array(

        // All Post Formats
        array(
          'name'   => 'istiqbal_single_title',
          'fields' => array(
            array(
              'id'          => 'istiqbal_product_title',
              'type'        => 'text',
              'title'       => esc_html__('Single Title', 'istiqbal'),
              'attributes' => array(
                'placeholder' => 'The Title Gose Here'
              ),
            ),

          ),
        ),

      ),
    );
}
// -----------------------------------------
  // Donation Forms
  // -----------------------------------------
  $options[]    = array(
    'id'        => '_donation_form_metabox',
    'title'     => esc_html__('Donation Deadline', 'istiqbal'),
    'post_type' => 'give_forms',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'section_deadline',
        'fields' => array(
          array(
            'id'          => 'donation_deadline',
            'type'        => 'text',
            'title'       => esc_html__('Deadline Date', 'istiqbal'),
            'attributes' => array(
              'placeholder' => 'DD/MM/YYYY'
            ),
          ),
          // Gallery

        ),
      ),

    ),
  );
  

   // -----------------------------------------
  // Team
  // -----------------------------------------

  $options[]    = array(
    'id'        => 'team_options',
    'title'     => esc_html__('Team Meta', 'istiqbal'),
    'post_type' => 'team',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(
      array(
        'name'   => 'team_infos',
        'fields' => array(
          array(
            'title'   => esc_html__('Team Sub Title', 'istiqbal'),
            'id'      => 'team_subtitle',
            'type'    => 'text',
            'attributes' => array(
              'placeholder' => esc_html__('Volunteer', 'istiqbal'),
            ),
            'info'    => esc_html__('Write Team Subtitle.', 'istiqbal'),
          ),
          // Start fields
          array(
            'id'                  => 'team_socials',
            'title'   => esc_html__('Team Social', 'istiqbal'),
            'type'                => 'group',
            'fields'              => array(
              array(
                'id'              => 'social_icon',
                'type'            => 'icon',
                'attributes' => array(
                    'placeholder' => esc_html__('Facebook', 'istiqbal'),
                  ),
                'title'           => esc_html__('Social Icon', 'istiqbal'),
              ),
              array(
                'id'              => 'social_link',
                'type'            => 'text',
                'attributes' => array(
                    'placeholder' => esc_html__('#', 'istiqbal'),
                  ),
                'title'           => esc_html__('Socail Link', 'istiqbal'),
              ),
            ),
            'button_title'        => esc_html__('Add Social', 'istiqbal'),
            'accordion_title'     => esc_html__('Team Social ', 'istiqbal'),
          ),
         array(
            'id'           => 'team_image',
            'type'         => 'image',
            'title'        => esc_html__('Team Grid', 'istiqbal'),
            'add_title' => esc_html__('Team Image', 'istiqbal'),
            'info'    => esc_html__('Attached Team Grid Image.', 'istiqbal'),
          ),

        ),
      ),
    ),
  );


  // -----------------------------------------
  // Causes
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'causes_options',
    'title'     => esc_html__('Causes Extra Options', 'istiqbal'),
    'post_type' => 'give_forms',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'causes_option_section',
        'fields' => array(
         array(
            'id'           => 'causes_image',
            'type'         => 'image',
            'title'        => esc_html__('Causes Image', 'istiqbal'),
            'add_title' => esc_html__('Add Causes Image', 'istiqbal'),
          ),
         array(
            'id'           => 'causes_slide_image',
            'type'         => 'image',
            'title'        => esc_html__('Grid Image', 'istiqbal'),
            'add_title' => esc_html__('Add Carousel Image', 'istiqbal'),
          ),
        ),
      ),

    ),
  );

  // -----------------------------------------
  // post options
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'post_options',
    'title'     => esc_html__('Grid Image', 'istiqbal'),
    'post_type' => 'post',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(
      array(
        'name'   => 'post_option_section',
        'fields' => array(
          array(
            'id'           => 'grid_image',
            'type'         => 'image',
            'title'        => esc_html__('Grid Image', 'istiqbal'),
            'add_title' => esc_html__('Add Grid Image', 'istiqbal'),
          ),
          array(
            'id'           => 'widget_post_title',
            'type'         => 'text',
            'title'        => esc_html__('Widget Post Title', 'istiqbal'),
            'add_title' => esc_html__('Add Widget Post Title here', 'istiqbal'),
          ),
        ),
      ),

    ),
  );


  return $options;

}
add_filter( 'cs_metabox_options', 'istiqbal_metabox_options' );