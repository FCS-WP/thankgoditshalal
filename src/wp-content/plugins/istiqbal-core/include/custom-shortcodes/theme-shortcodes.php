<?php
/*
 * All Custom Shortcode for [theme_name] theme.
 * Author & Copyright: wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

if( ! function_exists( 'istiqbal_shortcodes' ) ) {
  function istiqbal_shortcodes( $options ) {

    $options       = array();

    /* Topbar Shortcodes */
    $options[]     = array(
      'title'      => esc_html__('Topbar Shortcodes', 'istiqbal'),
      'shortcodes' => array(

        // Topbar item
        array(
          'name'          => 'istiqbal_widget_topbars',
          'title'         => esc_html__('Topbar info', 'istiqbal'),
          'view'          => 'clone',
          'clone_id'      => 'istiqbal_widget_topbar',
          'clone_title'   => esc_html__('Add New', 'istiqbal'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'istiqbal'),
            ),
            
          ),
          'clone_fields'  => array(

            array(
              'id'        => 'info_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Icon', 'istiqbal'),
            ),
            array(
              'id'        => 'subtitle',
              'type'      => 'text',
              'title'     => esc_html__('Sub Title', 'istiqbal'),
            ),
            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => esc_html__('Title', 'istiqbal'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => esc_html__('Link', 'istiqbal'),
            ),
            array(
              'id'        => 'open_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'istiqbal'),
              'yes'     => esc_html__('Yes', 'istiqbal'),
              'no'     => esc_html__('No', 'istiqbal'),
            ),

          ),

        ),
       

      ),
    );

    /* Header Shortcodes */
    $options[]     = array(
      'title'      => esc_html__('Header Shortcodes', 'istiqbal'),
      'shortcodes' => array(

        // header Social
        array(
          'name'          => 'istiqbal_header_socials',
          'title'         => esc_html__('Header Social', 'istiqbal'),
          'view'          => 'clone',
          'clone_id'      => 'istiqbal_header_social',
          'clone_title'   => esc_html__('Add New Social', 'istiqbal'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'istiqbal'),
            ),
            array(
              'id'        => 'custom_text',
              'type'      => 'text',
              'title'     => esc_html__('Custom Title', 'istiqbal'),
            ),

          ),
          'clone_fields'  => array(
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Social Icon', 'istiqbal')
            ),
            array(
              'id'        => 'social_icon_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Icon Color', 'istiqbal'),
            ),
            array(
              'id'        => 'social_link',
              'type'      => 'text',
              'title'     => esc_html__('Social Link', 'istiqbal')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'istiqbal'),
              'yes'     => esc_html__('Yes', 'istiqbal'),
              'no'     => esc_html__('No', 'istiqbal'),
            ),

          ),

        ),
        // header Social End

        // header Middle Infos
        array(
          'name'          => 'istiqbal_header_middle_infos',
          'title'         => esc_html__('Header Middle Info', 'istiqbal'),
          'view'          => 'clone',
          'clone_id'      => 'istiqbal_header_middle_info',
          'clone_title'   => esc_html__('Add New Info', 'istiqbal'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'istiqbal'),
            ),

          ),
          'clone_fields'  => array(
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Social Icon', 'istiqbal')
            ),
            array(
              'id'        => 'social_icon_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Icon Color', 'istiqbal'),
            ),
            array(
              'id'        => 'address_text',
              'type'      => 'text',
              'title'     => esc_html__('Address Text', 'istiqbal')
            ),
            array(
              'id'        => 'address_desc',
              'type'      => 'text',
              'title'     => esc_html__('Address Details', 'istiqbal')
            ),
          ),

        ),
        // header Middle Infos End



      ),
    );

    /* Content Shortcodes */
    $options[]     = array(
      'title'      => esc_html__('Content Shortcodes', 'istiqbal'),
      'shortcodes' => array(

        // Spacer
        array(
          'name'          => 'vc_empty_space',
          'title'         => esc_html__('Spacer', 'istiqbal'),
          'fields'        => array(

            array(
              'id'        => 'height',
              'type'      => 'text',
              'title'     => esc_html__('Height', 'istiqbal'),
              'attributes' => array(
                'placeholder'     => '20px',
              ),
            ),

          ),
        ),
        // Spacer

        // Social Icons
        array(
          'name'          => 'istiqbal_socials',
          'title'         => esc_html__('Social Icons', 'istiqbal'),
          'view'          => 'clone',
          'clone_id'      => 'istiqbal_social',
          'clone_title'   => esc_html__('Add New', 'istiqbal'),
          'fields'        => array(
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'istiqbal'),
            ),  
            array(
              'id'        => 'section_title',
              'type'      => 'text',
              'title'     => esc_html__('Title', 'istiqbal'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => esc_html__('Colors', 'istiqbal')
            ),
            array(
              'id'        => 'icon_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Icon Color', 'istiqbal'),
              'wrap_class' => 'column_third',
            ),
            array(
              'id'        => 'icon_hover_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Icon Hover Color', 'istiqbal'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '!=', 'style-three'),
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Backrgound Color', 'istiqbal'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '!=', 'style-one'),
            ),
            array(
              'id'        => 'bg_hover_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Backrgound Hover Color', 'istiqbal'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '==', 'style-two'),
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Border Color', 'istiqbal'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '==', 'style-three'),
            ),

            // Icon Size
            array(
              'id'        => 'icon_size',
              'type'      => 'text',
              'title'     => esc_html__('Icon Size', 'istiqbal'),
              'wrap_class' => 'column_full',
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'social_link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => esc_html__('Link', 'istiqbal')
            ),
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Social Icon', 'istiqbal')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'istiqbal'),
              'on_text'     => esc_html__('Yes', 'istiqbal'),
              'off_text'     => esc_html__('No', 'istiqbal'),
            ),

          ),

        ),
        // Social Icons

        // Useful Links
        array(
          'name'          => 'istiqbal_useful_links',
          'title'         => esc_html__('Useful Links', 'istiqbal'),
          'view'          => 'clone',
          'clone_id'      => 'istiqbal_useful_link',
          'clone_title'   => esc_html__('Add New', 'istiqbal'),
          'fields'        => array(

            array(
              'id'        => 'column_width',
              'type'      => 'select',
              'title'     => esc_html__('Column Width', 'istiqbal'),
              'options'        => array(
                'full-width' => esc_html__('One Column', 'istiqbal'),
                'half-width' => esc_html__('Two Column', 'istiqbal'),
                'third-width' => esc_html__('Three Column', 'istiqbal'),
              ),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'istiqbal'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'title_link',
              'type'      => 'text',
              'title'     => esc_html__('Link', 'istiqbal')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'istiqbal'),
              'on_text'     => esc_html__('Yes', 'istiqbal'),
              'off_text'     => esc_html__('No', 'istiqbal'),
            ),
            array(
              'id'        => 'link_title',
              'type'      => 'text',
              'title'     => esc_html__('Title', 'istiqbal')
            ),

          ),

        ),
        // Useful Links

        // Simple Image List
        array(
          'name'          => 'istiqbal_image_lists',
          'title'         => esc_html__('Simple Image List', 'istiqbal'),
          'view'          => 'clone',
          'clone_id'      => 'istiqbal_image_list',
          'clone_title'   => esc_html__('Add New', 'istiqbal'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'istiqbal'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'get_image',
              'type'      => 'upload',
              'title'     => esc_html__('Image', 'istiqbal')
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => esc_html__('Link', 'istiqbal')
            ),
            array(
              'id'    => 'open_tab',
              'type'  => 'switcher',
              'std'   => false,
              'title' => esc_html__('Open link to new tab?', 'istiqbal')
            ),

          ),

        ),
        // Simple Image List

        // Simple Link
        array(
          'name'          => 'istiqbal_simple_link',
          'title'         => esc_html__('Simple Link', 'istiqbal'),
          'fields'        => array(

            array(
              'id'        => 'link_style',
              'type'      => 'select',
              'title'     => esc_html__('Link Style', 'istiqbal'),
              'options'        => array(
                'link-underline' => esc_html__('Link Underline', 'istiqbal'),
                'link-arrow-right' => esc_html__('Link Arrow (Right)', 'istiqbal'),
                'link-arrow-left' => esc_html__('Link Arrow (Left)', 'istiqbal'),
              ),
            ),
            array(
              'id'        => 'link_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Icon', 'istiqbal'),
              'value'      => 'fa fa-caret-right',
              'dependency'  => array('link_style', '!=', 'link-underline'),
            ),
            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => esc_html__('Link Text', 'istiqbal'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => esc_html__('Link', 'istiqbal'),
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'istiqbal'),
              'on_text'     => esc_html__('Yes', 'istiqbal'),
              'off_text'     => esc_html__('No', 'istiqbal'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'istiqbal'),
            ),

            // Normal Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => esc_html__('Normal Mode', 'istiqbal')
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Text Color', 'istiqbal'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Border Color', 'istiqbal'),
              'wrap_class' => 'column_half el-hav-border',
              'dependency'  => array('link_style', '==', 'link-underline'),
            ),
            // Hover Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => esc_html__('Hover Mode', 'istiqbal')
            ),
            array(
              'id'        => 'text_hover_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Text Hover Color', 'istiqbal'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'border_hover_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Border Hover Color', 'istiqbal'),
              'wrap_class' => 'column_half el-hav-border',
              'dependency'  => array('link_style', '==', 'link-underline'),
            ),

            // Size
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => esc_html__('Font Sizes', 'istiqbal')
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => esc_html__('Text Size', 'istiqbal'),
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
            ),

          ),
        ),
        // Simple Link

        // Blockquotes
        array(
          'name'          => 'istiqbal_blockquote',
          'title'         => esc_html__('Blockquote', 'istiqbal'),
          'fields'        => array(

            array(
              'id'        => 'blockquote_style',
              'type'      => 'select',
              'title'     => esc_html__('Blockquote Style', 'istiqbal'),
              'options'        => array(
                '' => esc_html__('Select Blockquote Style', 'istiqbal'),
                'style-one' => esc_html__('Style One', 'istiqbal'),
                'style-two' => esc_html__('Style Two', 'istiqbal'),
              ),
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => esc_html__('Text Size', 'istiqbal'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'istiqbal'),
            ),
            array(
              'id'        => 'content_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Content Color', 'istiqbal'),
            ),
            array(
              'id'        => 'left_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Left Border Color', 'istiqbal'),
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Border Color', 'istiqbal'),
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Background Color', 'istiqbal'),
            ),
            // Content
            array(
              'id'        => 'content',
              'type'      => 'textarea',
              'title'     => esc_html__('Content', 'istiqbal'),
            ),

          ),

        ),
        // Blockquotes

      ),
    );

    /* Widget Shortcodes */
    $options[]     = array(
      'title'      => esc_html__('Widget Shortcodes', 'istiqbal'),
      'shortcodes' => array(

        // widget Contact info
        array(
          'name'          => 'istiqbal_widget_contact_info',
          'title'         => esc_html__('Service CTA', 'istiqbal'),
          'fields'        => array(
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'istiqbal'),
            ),
             array(
              'id'        => 'image_url',
              'type'      => 'image',
              'title'     => esc_html__('Image background', 'istiqbal'),
            ),
            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => esc_html__('Title', 'istiqbal'),
            ),
            array(
              'id'        => 'desc',
              'type'      => 'text',
              'title'     => esc_html__('SubTitle', 'istiqbal'),
            ),
            array(
              'id'        => 'number',
              'type'      => 'text',
              'title'     => esc_html__('Number', 'istiqbal'),
            ),
            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => esc_html__('Link text', 'istiqbal'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => esc_html__('Link', 'istiqbal'),
            ),

          ),
        ),

        // widget Testimonials
        array(
          'name'          => 'istiqbal_widget_testimonial',
          'title'         => esc_html__('Testimonial', 'istiqbal'),
          'fields'        => array(
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'istiqbal'),
            ),
             array(
              'id'        => 'image_url',
              'type'      => 'image',
              'title'     => esc_html__('Image background', 'istiqbal'),
            ),
            array(
              'id'        => 'subtitle',
              'type'      => 'text',
              'title'     => esc_html__('Sub Title', 'istiqbal'),
            ),
            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => esc_html__('Title', 'istiqbal'),
            ),
            array(
              'id'        => 'desc',
              'type'      => 'textarea',
              'title'     => esc_html__('Description', 'istiqbal'),
            ),

          ),
        ),

       // About widget Block
        array(
          'name'          => 'istiqbal_about_widget',
          'title'         => esc_html__('About Widget Block', 'istiqbal'),
          'fields'        => array(
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'istiqbal'),
            ),
            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => esc_html__('Title', 'istiqbal'),
            ),
            array(
              'id'        => 'image_url',
              'type'      => 'image',
              'title'     => esc_html__('About Block Image', 'istiqbal'),
            ),
            array(
              'id'        => 'desc',
              'type'      => 'textarea',
              'title'     => esc_html__('Description', 'istiqbal'),
            ),
            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => esc_html__('Link text', 'istiqbal'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => esc_html__('Link', 'istiqbal'),
            ),

          ),
        ),


      // Service Contact Widget
        array(
          'name'          => 'istiqbal_service_widget_contacts',
          'title'         => esc_html__('Service Feature Widget', 'istiqbal'),
          'view'          => 'clone',
          'clone_id'      => 'istiqbal_service_widget_contact',
          'clone_title'   => esc_html__('Add New', 'istiqbal'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'istiqbal'),
            ),
            array(
              'id'        => 'contact_title',
              'type'      => 'text',
              'title'     => esc_html__('Title', 'istiqbal')
            ),
          ),
          'clone_fields'  => array(
           
             array(
              'id'        => 'info',
              'type'      => 'text',
              'title'     => esc_html__('Contact Info', 'istiqbal')
            ),

          ),

        ),
      // Service Contact Widget End
        // widget download-widget
        array(
          'name'          => 'istiqbal_download_widgets',
          'title'         => esc_html__('Download Widget', 'istiqbal'),
          'view'          => 'clone',
          'clone_id'      => 'istiqbal_download_widget',
          'clone_title'   => esc_html__('Add New', 'istiqbal'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'istiqbal'),
            ),
          ),
          'clone_fields'  => array(

            array(
              'id'        => 'download_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Download Icon', 'istiqbal')
            ),
            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => esc_html__('Download Title', 'istiqbal')
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => esc_html__('Download Link', 'istiqbal')
            ),

          ),

        ),

      ),
    );

    /* Footer Shortcodes */
    $options[]     = array(
      'title'      => esc_html__('Footer Shortcodes', 'istiqbal'),
      'shortcodes' => array(

        // Footer Menus
        array(
          'name'          => 'istiqbal_footer_menus',
          'title'         => esc_html__('Footer Menu Links', 'istiqbal'),
          'view'          => 'clone',
          'clone_id'      => 'istiqbal_footer_menu',
          'clone_title'   => esc_html__('Add New', 'istiqbal'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'istiqbal'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'menu_title',
              'type'      => 'text',
              'title'     => esc_html__('Menu Title', 'istiqbal')
            ),
            array(
              'id'        => 'menu_link',
              'type'      => 'text',
              'title'     => esc_html__('Menu Link', 'istiqbal')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'istiqbal'),
              'on_text'     => esc_html__('Yes', 'istiqbal'),
              'off_text'     => esc_html__('No', 'istiqbal'),
            ),

          ),

        ),
        // Footer Menus
        array(
          'name'          => 'footer_infos',
          'title'         => esc_html__('footer logo and Text', 'istiqbal'),
          'view'          => 'clone',
          'clone_id'      => 'footer_info',
          'clone_title'   => esc_html__('Add New', 'istiqbal'),
          'fields'        => array(
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'istiqbal'),
            ),
            array(
              'id'        => 'footer_logo',
              'type'      => 'image',
              'title'     => esc_html__('Footer logo', 'istiqbal'),
            ),
            array(
              'id'        => 'desc',
              'type'      => 'textarea',
              'title'     => esc_html__('Description', 'istiqbal'),
            ),
            
          ),
          'clone_fields'  => array(
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Social Icon', 'istiqbal')
            ),
            array(
              'id'        => 'social_link',
              'type'      => 'text',
              'title'     => esc_html__('Social Link', 'istiqbal')
            ),
          ),

        ),

      // footer contact info
      array(
        'name'          => 'istiqbal_footer_contact_infos',
        'title'         => esc_html__('Contact info', 'istiqbal'),
        'view'          => 'clone',
        'clone_id'      => 'istiqbal_footer_contact_info',
        'clone_title'   => esc_html__('Add New', 'istiqbal'),
        'fields'        => array(

          array(
            'id'        => 'custom_class',
            'type'      => 'text',
            'title'     => esc_html__('Custom Class', 'istiqbal'),
          ),
          array(
            'id'        => 'contact_title',
            'type'      => 'textarea',
            'title'     => esc_html__('Contact info title', 'istiqbal')
          ),
        ),
        'clone_fields'  => array(

          array(
            'id'        => 'Icon',
            'type'      => 'icon',
            'title'     => esc_html__('Contact info icon', 'istiqbal')
          ),
          array(
            'id'        => 'item_title',
            'type'      => 'text',
            'title'     => esc_html__('Contact info title', 'istiqbal')
          ),
        ),

      ),

      // footer Address
       array(
          'name'          => 'istiqbal_footer_address_item',
          'title'         => esc_html__('Address', 'istiqbal'),
          'view'          => 'clone',
          'clone_id'      => 'istiqbal_footer_address_items',
          'clone_title'   => esc_html__('Add New', 'istiqbal'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'istiqbal'),
            ),

          ),
          'clone_fields'  => array(
            array(
              'id'        => 'item',
              'type'      => 'text',
              'title'     => esc_html__('Address item', 'istiqbal')
            ),
          ),
        ),

      ),
    );

  return $options;

  }
  add_filter( 'cs_shortcode_options', 'istiqbal_shortcodes' );
}