<?php
/*
 * All Theme Options for Istiqbal theme.
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

function istiqbal_settings( $settings ) {

  $settings           = array(
    'menu_title'      => ISTIQBAL_NAME . esc_html__(' Options', 'istiqbal'),
    'menu_slug'       => sanitize_title(ISTIQBAL_NAME) . '_options',
    'menu_type'       => 'theme',
    'menu_icon'       => 'dashicons-awards',
    'menu_position'   => '4',
    'ajax_save'       => false,
    'show_reset_all'  => true,
    'framework_title' => ISTIQBAL_NAME .' <small>V-'. ISTIQBAL_VERSION .' by <a href="'. ISTIQBAL_BRAND_URL .'" target="_blank">'. ISTIQBAL_BRAND_NAME .'</a></small>',
  );

  return $settings;

}
add_filter( 'cs_framework_settings', 'istiqbal_settings' );

// Theme Framework Options
function istiqbal_options( $options ) {

  $header = get_posts( 'post_type="headerbuilder"&numberposts=-1' );
  $headers = array( 'default' => esc_html__( 'Default', 'istiqbal' ) );
  if ( $header ) {
    foreach ( $header as $head ) {
      $headers[ $head->ID ] = $head->post_title;
    }
  }
  $footer = get_posts( 'post_type="footerbuilder"&numberposts=-1' );
  $footers = array( 'default' => esc_html__( 'Default', 'istiqbal' ));
  if ( $footer ) {
    foreach ( $footer as $foot ) {
      $footers[ $foot->ID ] = $foot->post_title;
    }
  }

  $options      = array(); // remove old options

  // ------------------------------
  // Branding
  // ------------------------------
  $options[]   = array(
    'name'     => 'istiqbal_theme_branding',
    'title'    => esc_html__('Site Brand', 'istiqbal'),
    'icon'     => 'fa fa-address-book-o',
    'sections' => array(

      // brand logo tab
      array(
        'name'     => 'brand_logo',
        'title'    => esc_html__('Logo', 'istiqbal'),
        'icon'     => 'fa fa-picture-o',
        'fields'   => array(

          // Site Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-istiqbal-heading',
            'content' => esc_html__('Site Logo', 'istiqbal')
          ),
          array(
            'id'    => 'istiqbal_logo',
            'type'  => 'image',
            'title' => esc_html__('Default Logo', 'istiqbal'),
            'info'  => esc_html__('Upload your default logo here. If you not upload, then site title will load in this logo location.', 'istiqbal'),
            'add_title' => esc_html__('Add Logo', 'istiqbal'),
          ),
          array(
            'id'          => 'istiqbal_logo_top',
            'type'        => 'number',
            'title'       => esc_html__('Logo Top Space', 'istiqbal'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'istiqbal_logo_bottom',
            'type'        => 'number',
            'title'       => esc_html__('Logo Bottom Space', 'istiqbal'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          // WordPress Admin Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-istiqbal-heading',
            'content' => esc_html__('WordPress Admin Logo', 'istiqbal')
          ),
          array(
            'id'    => 'brand_logo_wp',
            'type'  => 'image',
            'title' => esc_html__('Login logo', 'istiqbal'),
            'info'  => esc_html__('Upload your WordPress login page logo here.', 'istiqbal'),
            'add_title' => esc_html__('Add Login Logo', 'istiqbal'),
          ),
        ) // end: fields
      ), // end: section
    ),
  );

  // ------------------------------
  // Layout
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_layout',
    'title'  => esc_html__('Theme Layout', 'istiqbal'),
    'icon'   => 'fa fa-th-large'
  );

  $options[]      = array(
    'name'        => 'theme_general',
    'title'       => esc_html__('General Settings', 'istiqbal'),
    'icon'        => 'fa fa-cog',

    // begin: fields
    'fields'      => array(

      // -----------------------------
      // Begin: Responsive
      // -----------------------------
       array(
        'id'    => 'theme_responsive',
        'off_text'  => 'No',
        'on_text'  => 'Yes',
        'type'  => 'switcher',
        'title' => esc_html__('Responsive', 'istiqbal'),
        'info' => esc_html__('Turn on if you don\'t want your site to be responsive.', 'istiqbal'),
        'default' => false,
      ),
      array(
        'id'    => 'theme_preloder',
        'off_text'  => 'No',
        'on_text'  => 'Yes',
        'type'  => 'switcher',
        'title' => esc_html__('Preloder', 'istiqbal'),
        'info' => esc_html__('Turn off if you don\'t want your site to be Preloder.', 'istiqbal'),
        'default' => true,
      ),
       array(
        'id'    => 'preloader_image',
        'type'  => 'image',
        'title' => esc_html__('Preloader Logo', 'istiqbal'),
        'info'  => esc_html__('Upload your preoader logo here. If you not upload, then site preoader will load in this preloader location.', 'istiqbal'),
        'add_title' => esc_html__('Add Logo', 'istiqbal'),
        'dependency' => array( 'theme_preloder', '==', 'true' ),
      ),
      array(
        'id'    => 'theme_layout_width',
        'type'  => 'image_select',
        'title' => esc_html__('Full Width & Extra Width', 'istiqbal'),
        'info' => esc_html__('Boxed or Fullwidth? Choose your site layout width. Default : Full Width', 'istiqbal'),
        'options'      => array(
          'container'    => ISTIQBAL_CS_IMAGES .'/boxed-width.jpg',
          'container-fluid'    => ISTIQBAL_CS_IMAGES .'/full-width.jpg',
        ),
        'default'      => 'container-fluid',
        'radio'      => true,
      ),
       array(
        'id'    => 'theme_page_comments',
        'type'  => 'switcher',
        'title' => esc_html__('Hide Page Comments?', 'istiqbal'),
        'label' => esc_html__('Yes! Hide Page Comments.', 'istiqbal'),
        'on_text' => esc_html__('Yes', 'istiqbal'),
        'off_text' => esc_html__('No', 'istiqbal'),
        'default' => false,
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info cs-istiqbal-heading',
        'content' => esc_html__('Background Options', 'istiqbal'),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'             => 'theme_layout_bg_type',
        'type'           => 'select',
        'title'          => esc_html__('Background Type', 'istiqbal'),
        'options'        => array(
          'bg-image' => esc_html__('Image', 'istiqbal'),
          'bg-pattern' => esc_html__('Pattern', 'istiqbal'),
        ),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'    => 'theme_layout_bg_pattern',
        'type'  => 'image_select',
        'title' => esc_html__('Background Pattern', 'istiqbal'),
        'info' => esc_html__('Select background pattern', 'istiqbal'),
        'options'      => array(
          'pattern-1'    => ISTIQBAL_CS_IMAGES . '/pattern-1.png',
          'pattern-2'    => ISTIQBAL_CS_IMAGES . '/pattern-2.png',
          'pattern-3'    => ISTIQBAL_CS_IMAGES . '/pattern-3.png',
          'pattern-4'    => ISTIQBAL_CS_IMAGES . '/pattern-4.png',
          'custom-pattern'  => ISTIQBAL_CS_IMAGES . '/pattern-5.png',
        ),
        'default'      => 'pattern-1',
        'radio'      => true,
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type', '==|==', 'true|bg-pattern' ),
      ),
      array(
        'id'      => 'custom_bg_pattern',
        'type'    => 'upload',
        'title'   => esc_html__('Custom Pattern', 'istiqbal'),
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type|theme_layout_bg_pattern_custom-pattern', '==|==|==', 'true|bg-pattern|true' ),
        'info' => __('Select your custom background pattern. <br />Note, background pattern image will be repeat in all x and y axis. So, please consider all repeatable area will perfectly fit your custom patterns.', 'istiqbal'),
      ),
      array(
        'id'      => 'theme_layout_bg',
        'type'    => 'background',
        'title'   => esc_html__('Background', 'istiqbal'),
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type', '==|==', 'true|bg-image' ),
      ),

    ), // end: fields

  );

  // ------------------------------
  // Header Sections
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_header_tab',
    'title'    => esc_html__('Header Settings', 'istiqbal'),
    'icon'     => 'fa fa-header',
    'sections' => array(

      // header design tab
      array(
        'name'     => 'header_design_tab',
        'title'    => esc_html__('Design', 'istiqbal'),
        'icon'     => 'fa fa-magic',
        'fields'   => array(

          // Header Select
          array(
            'id'           => 'select_header_design',
            'type'         => 'select',
            'title'        => esc_html__('Select Header Design', 'istiqbal'),
            'options'      => $headers,
            'attributes' => array(
              'data-depend-id' => 'header_design',
            ),
            'radio'        => true,
            'default'   => 'default',
            'info' => esc_html__('Select your header design, following options will may differ based on your selection of header design.', 'istiqbal'),
          ),
          // Header Select

          // Extra's
          array(
            'type'    => 'notice',
            'class'   => 'info cs-istiqbal-heading',
            'content' => esc_html__('Extra\'s', 'istiqbal'),
          ),
          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => esc_html__('Sticky Header', 'istiqbal'),
            'info' => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'istiqbal'),
            'default' => true,
          ),
          array(
            'id'    => 'istiqbal_cart_widget',
            'type'  => 'switcher',
            'title' => esc_html__('Header Cart', 'istiqbal'),
            'info' => esc_html__('Turn On if you want to Show Header Cart .', 'istiqbal'),
            'default' => false,
          ),
          array(
            'id'    => 'istiqbal_header_search',
            'type'  => 'switcher',
            'title' => esc_html__('Header Search', 'istiqbal'),
            'info' => esc_html__('Turn On if you want to Hide Header Search .', 'istiqbal'),
            'default' => false,
          ),
          array(
            'id'    => 'istiqbal_menu_cta',
            'type'  => 'switcher',
            'title' => esc_html__('Header CTA', 'istiqbal'),
            'info' => esc_html__('Turn On if you want to Show Header CTA .', 'istiqbal'),
            'default' => false,
          ),
          array(
            'id'    => 'header_cta_text',
            'type'  => 'text',
            'title' => esc_html__('Header CTA Text', 'istiqbal'),
            'info' => esc_html__('Write Header CTA Text here.', 'istiqbal'),
            'type'        => 'text',
            'default' => 'Free Consulting',
            'dependency'  => array('istiqbal_menu_cta', '==', true),
          ),
          array(
            'id'    => 'header_cta_link',
            'type'  => 'text',
            'title' => esc_html__('Header CTA Link', 'istiqbal'),
            'info' => esc_html__('Write Header CTA Link here.', 'istiqbal'),
            'type'        => 'text',
            'default' => '#',
            'dependency'  => array('istiqbal_menu_cta', '==', true),
          ),
        )
      ),

      // header top bar
      array(
        'name'     => 'header_top_bar_tab',
        'title'    => esc_html__('Top Bar', 'istiqbal'),
        'icon'     => 'fa fa-minus',
        'fields'   => array(

          array(
            'id'          => 'top_bar',
            'type'        => 'switcher',
            'title'       => esc_html__('Hide Top Bar', 'istiqbal'),
            'on_text'     => esc_html__('Yes', 'istiqbal'),
            'off_text'    => esc_html__('No', 'istiqbal'),
            'default'     => true,
          ),
          array(
            'id'          => 'top_left',
            'title'       => esc_html__('Top left Block', 'istiqbal'),
            'desc'        => esc_html__('Top bar left block.', 'istiqbal'),
            'type'        => 'textarea',
            'shortcode'   => true,
            'dependency'  => array('top_bar', '==', false),
          ),
          array(
            'id'          => 'top_right',
            'title'       => esc_html__('Top Right Block', 'istiqbal'),
            'desc'        => esc_html__('Top bar right block.', 'istiqbal'),
            'type'        => 'textarea',
            'shortcode'   => true,
            'dependency'  => array('top_bar', '==', false),
          ),
        )
      ),

      // header banner
      array(
        'name'     => 'header_banner_tab',
        'title'    => esc_html__('Title Bar (or) Banner', 'istiqbal'),
        'icon'     => 'fa fa-bullhorn',
        'fields'   => array(

          // Title Area
          array(
            'type'    => 'notice',
            'class'   => 'info cs-istiqbal-heading',
            'content' => esc_html__('Title Area', 'istiqbal')
          ),
          array(
            'id'      => 'need_title_bar',
            'type'    => 'switcher',
            'title'   => esc_html__('Title Bar ?', 'istiqbal'),
            'label'   => esc_html__('If you want to Hide title bar in your sub-pages, please turn this ON.', 'istiqbal'),
            'default'    => false,
          ),
          array(
            'id'             => 'title_bar_padding',
            'type'           => 'select',
            'title'          => esc_html__('Padding Spaces Top & Bottom', 'istiqbal'),
            'options'        => array(
              'padding-default' => esc_html__('Default Spacing', 'istiqbal'),
              'padding-custom' => esc_html__('Custom Padding', 'istiqbal'),
            ),
            'dependency'   => array( 'need_title_bar', '==', 'false' ),
          ),
          array(
            'id'             => 'titlebar_top_padding',
            'type'           => 'text',
            'title'          => esc_html__('Padding Top', 'istiqbal'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),
          array(
            'id'             => 'titlebar_bottom_padding',
            'type'           => 'text',
            'title'          => esc_html__('Padding Bottom', 'istiqbal'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-istiqbal-heading',
            'content' => esc_html__('Background Options', 'istiqbal'),
            'dependency' => array( 'need_title_bar', '==', 'false' ),
          ),
          array(
            'id'      => 'titlebar_bg_overlay_color',
            'type'    => 'color_picker',
            'title'   => esc_html__('Overlay Color', 'istiqbal'),
            'dependency' => array( 'need_title_bar', '==', 'false' ),
          ),
          array(
            'id'    => 'title_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Title Color', 'istiqbal'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-istiqbal-heading',
            'content' => esc_html__('Breadcrumbs', 'istiqbal'),
          ),
         array(
            'id'      => 'need_breadcrumbs',
            'type'    => 'switcher',
            'title'   => esc_html__('Hide Breadcrumbs', 'istiqbal'),
            'label'   => esc_html__('If you want to hide breadcrumbs in your banner, please turn this ON.', 'istiqbal'),
            'default'    => false,
          ),
        )
      ),

    ),
  );

  // ------------------------------
  // Footer Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'footer_section',
    'title'    => esc_html__('Footer Settings', 'istiqbal'),
    'icon'     => 'fa fa-tasks',
    'sections' => array(

      // footer widgets
      array(
        'name'     => 'footer_widgets_tab',
        'title'    => esc_html__('Widget Area', 'istiqbal'),
        'icon'     => 'fa fa-th',
        'fields'   => array(
          array(
            'id'           => 'select_footer_design',
            'type'         => 'select',
            'title'        => esc_html__('Select Footer Design', 'istiqbal'),
            'options'      => $footers,
            'attributes' => array(
              'data-depend-id' => 'footer_design',
            ),
            'radio'        => true,
            'default'   => 'default',
            'info' => esc_html__('Select your footer design, following options will may differ based on your selection of footer design.', 'istiqbal'),
          ),
          // Footer Widget Block
          array(
            'type'    => 'notice',
            'class'   => 'info cs-istiqbal-heading',
            'content' => esc_html__('Footer Widget Block', 'istiqbal')
          ),
          array(
            'id'    => 'footer_widget_block',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Widget Block', 'istiqbal'),
            'info' => __('If you turn this ON, then Goto : Appearance > Widgets. There you can see <strong>Footer Widget 1,2,3 or 4</strong> Widget Area, add your widgets there.', 'istiqbal'),
            'default' => true,
          ),
          array(
            'id'    => 'footer_widget_layout',
            'type'  => 'image_select',
            'title' => esc_html__('Widget Layouts', 'istiqbal'),
            'info' => esc_html__('Choose your footer widget theme-layouts.', 'istiqbal'),
            'default' => 4,
            'options' => array(
              1   => ISTIQBAL_CS_IMAGES . '/footer/footer-1.png',
              2   => ISTIQBAL_CS_IMAGES . '/footer/footer-2.png',
              3   => ISTIQBAL_CS_IMAGES . '/footer/footer-3.png',
              4   => ISTIQBAL_CS_IMAGES . '/footer/footer-4.png',
              5   => ISTIQBAL_CS_IMAGES . '/footer/footer-5.png',
              6   => ISTIQBAL_CS_IMAGES . '/footer/footer-6.png',
              7   => ISTIQBAL_CS_IMAGES . '/footer/footer-7.png',
              8   => ISTIQBAL_CS_IMAGES . '/footer/footer-8.png',
              9   => ISTIQBAL_CS_IMAGES . '/footer/footer-9.png',
            ),
            'radio'       => true,
            'dependency'  => array('footer_widget_block', '==', true),
          ),
           array(
            'id'    => 'istiqbal_ft_bg',
            'type'  => 'image',
            'title' => esc_html__('Footer Background', 'istiqbal'),
            'info'  => esc_html__('Upload your footer background.', 'istiqbal'),
            'add_title' => esc_html__('footer background', 'istiqbal'),
            'dependency'  => array('footer_widget_block', '==', true),
          ),

        )
      ),

      // footer copyright
      array(
        'name'     => 'footer_copyright_tab',
        'title'    => esc_html__('Copyright Bar', 'istiqbal'),
        'icon'     => 'fa fa-copyright',
        'fields'   => array(

          // Copyright
          array(
            'type'    => 'notice',
            'class'   => 'info cs-istiqbal-heading',
            'content' => esc_html__('Copyright Layout', 'istiqbal'),
          ),
         array(
            'id'    => 'hide_copyright',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Copyright?', 'istiqbal'),
            'default' => false,
            'on_text' => esc_html__('Yes', 'istiqbal'),
            'off_text' => esc_html__('No', 'istiqbal'),
            'label' => esc_html__('Yes, do it!', 'istiqbal'),
          ),
          array(
            'id'    => 'footer_copyright_layout',
            'type'  => 'image_select',
            'title' => esc_html__('Select Copyright Layout', 'istiqbal'),
            'info' => esc_html__('In above image, blue box is copyright text and yellow box is secondary text.', 'istiqbal'),
            'default'      => 'copyright-3',
            'options'      => array(
              'copyright-1'    => ISTIQBAL_CS_IMAGES .'/footer/copyright-1.png',
              ),
            'radio'        => true,
            'dependency'     => array('hide_copyright', '!=', true),
          ),
          array(
            'id'    => 'copyright_text',
            'type'  => 'textarea',
            'title' => esc_html__('Copyright Text', 'istiqbal'),
            'shortcode' => true,
            'dependency' => array('hide_copyright', '!=', true),
            'after'       => 'Helpful shortcodes: [current_year] [home_url] or any shortcode.',
          ),

          // Copyright Another Text
          array(
            'type'    => 'notice',
            'class'   => 'warning cs-istiqbal-heading',
            'content' => esc_html__('Copyright Secondary Text', 'istiqbal'),
             'dependency'     => array('hide_copyright', '!=', true),
          ),
          array(
            'id'    => 'secondary_text',
            'type'  => 'textarea',
            'title' => esc_html__('Secondary Text', 'istiqbal'),
            'shortcode' => true,
            'dependency'     => array('hide_copyright', '!=', true),
          ),

        )
      ),

    ),
  );

  // ------------------------------
  // Design
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_design',
    'title'  => esc_html__('Theme Design', 'istiqbal'),
    'icon'   => 'fa fa-sliders'
  );

  // ------------------------------
  // color section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_color_section',
    'title'    => esc_html__('Colors', 'istiqbal'),
    'icon'     => 'fa fa-eyedropper',
    'fields' => array(

      array(
        'type'    => 'heading',
        'content' => esc_html__('Color Options', 'istiqbal'),
      ),
      array(
        'type'    => 'subheading',
        'wrap_class' => 'color-tab-content',
        'content' => esc_html__('All color options are available in our theme customizer. The reason of we used customizer options for color section is because, you can choose each part of color from there and see the changes instantly using customizer. Highly customizable colors are in Appearance > Customize', 'istiqbal'),
      ),

    ),
  );

  // ------------------------------
  // Typography section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_typo_section',
    'title'    => esc_html__('Typography', 'istiqbal'),
    'icon'     => 'fa fa-header',
    'fields' => array(

      // Start fields
      array(
        'id'                  => 'typography',
        'type'                => 'group',
        'fields'              => array(
          array(
            'id'              => 'title',
            'type'            => 'text',
            'title'           => esc_html__('Title', 'istiqbal'),
          ),
          array(
            'id'              => 'selector',
            'type'            => 'textarea',
            'title'           => esc_html__('Selector', 'istiqbal'),
            'info'           => wp_kses( __('Enter css selectors like : <strong>body, .custom-class</strong>', 'istiqbal'), array( 'strong' => array() ) ),
          ),
          array(
            'id'              => 'font',
            'type'            => 'typography',
            'title'           => esc_html__('Font Family', 'istiqbal'),
          ),
          array(
            'id'              => 'size',
            'type'            => 'text',
            'title'           => esc_html__('Font Size', 'istiqbal'),
          ),
          array(
            'id'              => 'line_height',
            'type'            => 'text',
            'title'           => esc_html__('Line-Height', 'istiqbal'),
          ),
          array(
            'id'              => 'css',
            'type'            => 'textarea',
            'title'           => esc_html__('Custom CSS', 'istiqbal'),
          ),
        ),
        'button_title'        => esc_html__('Add New Typography', 'istiqbal'),
        'accordion_title'     => esc_html__('New Typography', 'istiqbal'),
      ),

      // Subset
      array(
        'id'                  => 'subsets',
        'type'                => 'select',
        'title'               => esc_html__('Subsets', 'istiqbal'),
        'class'               => 'chosen',
        'options'             => array(
          'latin'             => 'latin',
          'latin-ext'         => 'latin-ext',
          'cyrillic'          => 'cyrillic',
          'cyrillic-ext'      => 'cyrillic-ext',
          'greek'             => 'greek',
          'greek-ext'         => 'greek-ext',
          'vietnamese'        => 'vietnamese',
          'devanagari'        => 'devanagari',
          'khmer'             => 'khmer',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Subsets',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( 'latin' ),
      ),

      array(
        'id'                  => 'font_weight',
        'type'                => 'select',
        'title'               => esc_html__('Font Weights', 'istiqbal'),
        'class'               => 'chosen',
        'options'             => array(
          '100'   => esc_html__('Thin 100', 'istiqbal'),
          '100i'  => esc_html__('Thin 100 Italic', 'istiqbal'),
          '200'   => esc_html__('Extra Light 200', 'istiqbal'),
          '200i'  => esc_html__('Extra Light 200 Italic', 'istiqbal'),
          '300'   => esc_html__('Light 300', 'istiqbal'),
          '300i'  => esc_html__('Light 300 Italic', 'istiqbal'),
          '400'   => esc_html__('Regular 400', 'istiqbal'),
          '400i'  => esc_html__('Regular 400 Italic', 'istiqbal'),
          '500'   => esc_html__('Medium 500', 'istiqbal'),
          '500i'  => esc_html__('Medium 500 Italic', 'istiqbal'),
          '600'   => esc_html__('Semi Bold 600', 'istiqbal'),
          '600i'  => esc_html__('Semi Bold 600 Italic', 'istiqbal'),
          '700'   => esc_html__('Bold 700', 'istiqbal'),
          '700i'  => esc_html__('Bold 700 Italic', 'istiqbal'),
          '800'   => esc_html__('Extra Bold 800', 'istiqbal'),
          '800i'  => esc_html__('Extra Bold 800 Italic', 'istiqbal'),
          '900'   => esc_html__('Black 900', 'istiqbal'),
          '900i'  => esc_html__('Black 900 Italic', 'istiqbal'),
        ),
        'attributes'         => array(
          'data-placeholder' => esc_html__('Font Weight', 'istiqbal'),
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( '400' ),
      ),

      // Custom Fonts Upload
      array(
        'id'                 => 'font_family',
        'type'               => 'group',
        'title'              => esc_html__('Upload Custom Fonts', 'istiqbal'),
        'button_title'       => esc_html__('Add New Custom Font', 'istiqbal'),
        'accordion_title'    => esc_html__('Adding New Font', 'istiqbal'),
        'accordion'          => true,
        'desc'               => esc_html__('It is simple. Only add your custom fonts and click to save. After you can check "Font Family" selector. Do not forget to Save!', 'istiqbal'),
        'fields'             => array(

          array(
            'id'             => 'name',
            'type'           => 'text',
            'title'          => esc_html__('Font-Family Name', 'istiqbal'),
            'attributes'     => array(
              'placeholder'  => esc_html__('for eg. Arial', 'istiqbal')
            ),
          ),

          array(
            'id'             => 'ttf',
            'type'           => 'upload',
            'title'          => wp_kses(__('Upload .ttf <small><i>(optional)</i></small>', 'istiqbal'), array( 'small' => array(), 'i' => array() )),
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => esc_html__('Use this Font-Format', 'istiqbal'),
              'button_title' => wp_kses(__('Upload <i>.ttf</i>', 'istiqbal'), array( 'i' => array() )),
            ),
          ),

          array(
            'id'             => 'eot',
            'type'           => 'upload',
            'title'          => wp_kses(__('Upload .eot <small><i>(optional)</i></small>', 'istiqbal'), array( 'small' => array(), 'i' => array() )),
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => esc_html__('Use this Font-Format', 'istiqbal'),
              'button_title' => wp_kses(__('Upload <i>.eot</i>', 'istiqbal'), array( 'i' => array() )),
            ),
          ),

          array(
            'id'             => 'otf',
            'type'           => 'upload',
            'title'          => wp_kses(__('Upload .otf <small><i>(optional)</i></small>', 'istiqbal'), array( 'small' => array(), 'i' => array() )),
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => esc_html__('Use this Font-Format', 'istiqbal'),
              'button_title' => wp_kses(__('Upload <i>.otf</i>', 'istiqbal'), array( 'i' => array() )),
            ),
          ),

          array(
            'id'             => 'woff',
            'type'           => 'upload',
            'title'          => wp_kses(__('Upload .woff <small><i>(optional)</i></small>', 'istiqbal'), array( 'small' => array(), 'i' => array() )),
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => esc_html__('Use this Font-Format', 'istiqbal'),
              'button_title' =>wp_kses(__('Upload <i>.woff</i>', 'istiqbal'), array( 'i' => array() )),
            ),
          ),

          array(
            'id'             => 'css',
            'type'           => 'textarea',
            'title'          => wp_kses(__('Extra CSS Style <small><i>(optional)</i></small>', 'istiqbal'), array( 'small' => array(), 'i' => array() )),
            'attributes'     => array(
              'placeholder'  => esc_html__('for eg. font-weight: normal;', 'istiqbal'),
            ),
          ),

        ),
      ),
      // End All field

    ),
  );

  // ------------------------------
  // Pages
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_pages',
    'title'  => esc_html__('Custom Pages', 'istiqbal'),
    'icon'   => 'fa fa-folder-open-o'
  );


  // ------------------------------
  // Service Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'service_section',
    'title'    => esc_html__('Service Settings', 'istiqbal'),
    'icon'     => 'fa fa-server',
    'fields' => array(

      // service name change
      array(
        'type'    => 'notice',
        'class'   => 'info cs-tmx-heading',
        'content' => esc_html__('Name Change', 'istiqbal')
      ),
      array(
        'id'      => 'theme_service_name',
        'type'    => 'text',
        'title'   => esc_html__('Service Name', 'istiqbal'),
        'attributes'     => array(
          'placeholder'  => 'Service'
        ),
      ),
      array(
        'id'      => 'theme_service_slug',
        'type'    => 'text',
        'title'   => esc_html__('Service Slug', 'istiqbal'),
        'attributes'     => array(
          'placeholder'  => 'service-item'
        ),
      ),
      array(
        'id'      => 'theme_service_cat_slug',
        'type'    => 'text',
        'title'   => esc_html__('Service Category Slug', 'istiqbal'),
        'attributes'     => array(
          'placeholder'  => 'service-category'
        ),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'danger',
        'content' => __('<strong>Important</strong>: Please do not set service slug and page slug as same. It\'ll not work.', 'istiqbal')
      ),
      // Service Start
      array(
        'type'    => 'notice',
        'class'   => 'info cs-istiqbal-heading',
        'content' => esc_html__('Service Single', 'istiqbal')
      ),
      array(
          'id'             => 'service_sidebar_position',
          'type'           => 'select',
          'title'          => esc_html__('Sidebar Position', 'istiqbal'),
          'options'        => array(
            'sidebar-right' => esc_html__('Right', 'istiqbal'),
            'sidebar-left' => esc_html__('Left', 'istiqbal'),
            'sidebar-hide' => esc_html__('Hide', 'istiqbal'),
          ),
          'default_option' => 'Select sidebar position',
          'info'          => esc_html__('Default option : Right', 'istiqbal'),
        ),
        array(
          'id'             => 'single_service_widget',
          'type'           => 'select',
          'title'          => esc_html__('Sidebar Widget', 'istiqbal'),
          'options'        => istiqbal_registered_sidebars(),
          'default_option' => esc_html__('Select Widget', 'istiqbal'),
          'dependency'     => array('service_sidebar_position', '!=', 'sidebar-hide'),
          'info'          => esc_html__('Default option : Main Widget Area', 'istiqbal'),
        ),
        array(
          'id'    => 'service_comment_form',
          'type'  => 'switcher',
          'title' => esc_html__('Comment Area/Form', 'istiqbal'),
          'info' => esc_html__('If need to hide comment area and that form on single blog page, please turn this OFF.', 'istiqbal'),
          'default' => true,
        ),
    ),
  );

  
  // ------------------------------
  // Event Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'event_section',
    'title'    => esc_html__('Event Settings', 'istiqbal'),
    'icon'     => 'fa fa-medkit',
    'fields' => array(

      // event name change
      array(
        'type'    => 'notice',
        'class'   => 'info cs-tmx-heading',
        'content' => esc_html__('Name Change', 'istiqbal')
      ),
      array(
        'id'      => 'theme_event_name',
        'type'    => 'text',
        'title'   => esc_html__('Event Name', 'istiqbal'),
        'attributes'     => array(
          'placeholder'  => 'Event'
        ),
      ),
      array(
        'id'      => 'theme_event_slug',
        'type'    => 'text',
        'title'   => esc_html__('Event Slug', 'istiqbal'),
        'attributes'     => array(
          'placeholder'  => 'event-item'
        ),
      ),
      array(
        'id'      => 'theme_event_cat_slug',
        'type'    => 'text',
        'title'   => esc_html__('Event Category Slug', 'istiqbal'),
        'attributes'     => array(
          'placeholder'  => 'event-category'
        ),
      ),
      array(
        'type'    => 'notice',
        'class'   => 'danger',
        'content' => __('<strong>Important</strong>: Please do not set event slug and page slug as same. It\'ll not work.', 'istiqbal')
      ),

      // Event Start
      array(
        'type'    => 'notice',
        'class'   => 'info cs-istiqbal-heading',
        'content' => esc_html__('Event Single', 'istiqbal')
      ),
      array(
          'id'             => 'event_sidebar_position',
          'type'           => 'select',
          'title'          => esc_html__('Sidebar Position', 'istiqbal'),
          'options'        => array(
            'sidebar-right' => esc_html__('Right', 'istiqbal'),
            'sidebar-left' => esc_html__('Left', 'istiqbal'),
            'sidebar-hide' => esc_html__('Hide', 'istiqbal'),
          ),
          'default_option' => 'Select sidebar position',
          'info'          => esc_html__('Default option : Right', 'istiqbal'),
        ),
        array(
          'id'             => 'single_event_widget',
          'type'           => 'select',
          'title'          => esc_html__('Sidebar Widget', 'istiqbal'),
          'options'        => istiqbal_registered_sidebars(),
          'default_option' => esc_html__('Select Widget', 'istiqbal'),
          'dependency'     => array('event_sidebar_position', '!=', 'sidebar-hide'),
          'info'          => esc_html__('Default option : Main Widget Area', 'istiqbal'),
        ),
        array(
          'id'    => 'event_comment_form',
          'type'  => 'switcher',
          'title' => esc_html__('Comment Area/Form', 'istiqbal'),
          'info' => esc_html__('If need to hide comment area and that form on single blog page, please turn this OFF.', 'istiqbal'),
          'default' => true,
        ),
    ),
  );

  // ------------------------------
  // Blog Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'blog_section',
    'title'    => esc_html__('Blog Settings', 'istiqbal'),
    'icon'     => 'fa fa-newspaper-o',
    'sections' => array(

      // blog general section
      array(
        'name'     => 'blog_general_tab',
        'title'    => esc_html__('General', 'istiqbal'),
        'icon'     => 'fa fa-cog',
        'fields'   => array(

          // Layout
          array(
            'type'    => 'notice',
            'class'   => 'info cs-istiqbal-heading',
            'content' => esc_html__('Layout', 'istiqbal')
          ),
          array(
            'id'             => 'blog_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'istiqbal'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'istiqbal'),
              'sidebar-left' => esc_html__('Left', 'istiqbal'),
              'sidebar-hide' => esc_html__('Hide', 'istiqbal'),
            ),
            'default_option' => 'Select sidebar position',
            'help'          => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author.', 'istiqbal'),
            'info'          => esc_html__('Default option : Right', 'istiqbal'),
          ),
          array(
            'id'             => 'blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'istiqbal'),
            'options'        => istiqbal_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'istiqbal'),
            'dependency'     => array('blog_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'istiqbal'),
          ),
          // Layout
          // Global Options
          array(
            'type'    => 'notice',
            'class'   => 'info cs-istiqbal-heading',
            'content' => esc_html__('Global Options', 'istiqbal')
          ),
          array(
            'id'         => 'theme_exclude_categories',
            'type'       => 'checkbox',
            'title'      => esc_html__('Exclude Categories', 'istiqbal'),
            'info'      => esc_html__('Select categories you want to exclude from blog page.', 'istiqbal'),
            'options'    => 'categories',
          ),
          array(
            'id'      => 'theme_blog_excerpt',
            'type'    => 'text',
            'title'   => esc_html__('Excerpt Length', 'istiqbal'),
            'info'   => esc_html__('Blog short content length, in blog listing pages.', 'istiqbal'),
            'default' => '55',
          ),
          array(
            'id'      => 'theme_metas_hide',
            'type'    => 'checkbox',
            'title'   => esc_html__('Meta\'s to hide', 'istiqbal'),
            'info'    => esc_html__('Check items you want to hide from blog/post meta field.', 'istiqbal'),
            'class'      => 'horizontal',
            'options'    => array(
              'category'   => esc_html__('Category', 'istiqbal'),
              'date'    => esc_html__('Date', 'istiqbal'),
              'author'     => esc_html__('Author', 'istiqbal'),
              'comments'      => esc_html__('Comments', 'istiqbal'),
              'Tag'      => esc_html__('Tag', 'istiqbal'),
            ),
            // 'default' => '30',
          ),
          // End fields

        )
      ),

      // blog single section
      array(
        'name'     => 'blog_single_tab',
        'title'    => esc_html__('Single', 'istiqbal'),
        'icon'     => 'fa fa-sticky-note',
        'fields'   => array(

          // Start fields
          array(
            'type'    => 'notice',
            'class'   => 'info cs-istiqbal-heading',
            'content' => esc_html__('Enable / Disable', 'istiqbal')
          ),
          array(
            'id'    => 'single_featured_image',
            'type'  => 'switcher',
            'title' => esc_html__('Featured Image', 'istiqbal'),
            'info' => esc_html__('If need to hide featured image from single blog post page, please turn this OFF.', 'istiqbal'),
            'default' => true,
          ),
           array(
            'id'    => 'single_author_info',
            'type'  => 'switcher',
            'title' => esc_html__('Author Info', 'istiqbal'),
            'info' => esc_html__('If need to hide author info on single blog page, please turn this On.', 'istiqbal'),
            'default' => false,
          ),
          array(
            'id'    => 'single_share_option',
            'type'  => 'switcher',
            'title' => esc_html__('Share Option', 'istiqbal'),
            'info' => esc_html__('If need to hide share option on single blog page, please turn this OFF.', 'istiqbal'),
            'default' => true,
          ),
          array(
            'id'    => 'single_comment_form',
            'type'  => 'switcher',
            'title' => esc_html__('Comment Area/Form ?', 'istiqbal'),
            'info' => esc_html__('If need to hide comment area and that form on single blog page, please turn this On.', 'istiqbal'),
            'default' => false,
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-istiqbal-heading',
            'content' => esc_html__('Sidebar', 'istiqbal')
          ),
          array(
            'id'             => 'single_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'istiqbal'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'istiqbal'),
              'sidebar-left' => esc_html__('Left', 'istiqbal'),
              'sidebar-hide' => esc_html__('Hide', 'istiqbal'),
            ),
            'default_option' => 'Select sidebar position',
            'info'          => esc_html__('Default option : Right', 'istiqbal'),
          ),
          array(
            'id'             => 'single_blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'istiqbal'),
            'options'        => istiqbal_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'istiqbal'),
            'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'istiqbal'),
          ),
          // End fields

        )
      ),

    ),
  );

if (class_exists( 'WooCommerce' )){
  // ------------------------------
  // WooCommerce Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'woocommerce_section',
    'title'    => esc_html__('WooCommerce', 'istiqbal'),
    'icon'     => 'fa fa-shopping-basket',
    'fields' => array(

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-istiqbal-heading',
        'content' => esc_html__('Layout', 'istiqbal')
      ),
     array(
        'id'             => 'woo_product_columns',
        'type'           => 'select',
        'title'          => esc_html__('Product Column', 'istiqbal'),
        'options'        => array(
          2 => esc_html__('Two Column', 'istiqbal'),
          3 => esc_html__('Three Column', 'istiqbal'),
          4 => esc_html__('Four Column', 'istiqbal'),
        ),
        'default_option' => esc_html__('Select Product Columns', 'istiqbal'),
        'help'          => esc_html__('This style will apply, default woocommerce shop and archive pages.', 'istiqbal'),
      ),
      array(
        'id'             => 'woo_sidebar_position',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Position', 'istiqbal'),
        'options'        => array(
          'right-sidebar' => esc_html__('Right', 'istiqbal'),
          'left-sidebar' => esc_html__('Left', 'istiqbal'),
          'sidebar-hide' => esc_html__('Hide', 'istiqbal'),
        ),
        'default_option' => esc_html__('Select sidebar position', 'istiqbal'),
        'info'          => esc_html__('Default option : Right', 'istiqbal'),
      ),
      array(
        'id'             => 'woo_widget',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Widget', 'istiqbal'),
        'options'        => istiqbal_registered_sidebars(),
        'default_option' => esc_html__('Select Widget', 'istiqbal'),
        'dependency'     => array('woo_sidebar_position', '!=', 'sidebar-hide'),
        'info'          => esc_html__('Default option : Shop Page', 'istiqbal'),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-istiqbal-heading',
        'content' => esc_html__('Listing', 'istiqbal')
      ),
      array(
        'id'      => 'theme_woo_limit',
        'type'    => 'text',
        'title'   => esc_html__('Product Limit', 'istiqbal'),
        'info'   => esc_html__('Enter the number value for per page products limit.', 'istiqbal'),
      ),
      // End fields

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-istiqbal-heading',
        'content' => esc_html__('Single Product', 'istiqbal')
      ),
      array(
        'id'             => 'woo_related_limit',
        'type'           => 'text',
        'title'          => esc_html__('Related Products Limit', 'istiqbal'),
      ),
      array(
        'id'    => 'woo_single_upsell',
        'type'  => 'switcher',
        'title' => esc_html__('You May Also Like', 'istiqbal'),
        'info' => esc_html__('If you don\'t want \'You May Also Like\' products in single product page, please turn this ON.', 'istiqbal'),
        'default' => false,
      ),
      array(
        'id'    => 'woo_single_related',
        'type'  => 'switcher',
        'title' => esc_html__('Related Products', 'istiqbal'),
        'info' => esc_html__('If you don\'t want \'Related Products\' in single product page, please turn this ON.', 'istiqbal'),
        'default' => false,
      ),
      // End fields

    ),
  );
}

  // ------------------------------
  // Extra Pages
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_extra_pages',
    'title'    => esc_html__('404 & Maintenance', 'istiqbal'),
    'icon'     => 'fa fa-cogs',
    'sections' => array(

      // error 404 page
      array(
        'name'     => 'error_page_section',
        'title'    => esc_html__('404 Page', 'istiqbal'),
        'icon'     => 'fa fa-exclamation-triangle',
        'fields'   => array(

          // Start 404 Page
          array(
            'id'    => 'error_heading',
            'type'  => 'text',
            'title' => esc_html__('404 Page Heading', 'istiqbal'),
            'info'  => esc_html__('Enter 404 page heading.', 'istiqbal'),
          ),
          array(
            'id'    => 'error_subheading',
            'type'  => 'textarea',
            'title' => esc_html__('404 Page Sub Heading', 'istiqbal'),
            'info'  => esc_html__('Enter 404 page Sub heading.', 'istiqbal'),
          ),
          array(
            'id'    => 'error_page_content',
            'type'  => 'textarea',
            'title' => esc_html__('404 Page Content', 'istiqbal'),
            'info'  => esc_html__('Enter 404 page content.', 'istiqbal'),
            'shortcode' => true,
          ),
          array(
            'id'    => 'error_btn_text',
            'type'  => 'text',
            'title' => esc_html__('Button Text', 'istiqbal'),
            'info'  => esc_html__('Enter BACK TO HOME button text. If you want to change it.', 'istiqbal'),
          ),
          // End 404 Page

        ) // end: fields
      ), // end: fields section

      // maintenance mode page
      array(
        'name'     => 'maintenance_mode_section',
        'title'    => esc_html__('Maintenance Mode', 'istiqbal'),
        'icon'     => 'fa fa-hourglass-half',
        'fields'   => array(

          // Start Maintenance Mode
          array(
            'type'    => 'notice',
            'class'   => 'info cs-istiqbal-heading',
            'content' => esc_html__('If you turn this ON : Only Logged in users will see your pages. All other visiters will see, selected page of : <strong>Maintenance Mode Page</strong>', 'istiqbal')
          ),
          array(
            'id'             => 'enable_maintenance_mode',
            'type'           => 'switcher',
            'title'          => esc_html__('Maintenance Mode', 'istiqbal'),
            'default'        => false,
          ),
          array(
            'id'             => 'maintenance_mode_page',
            'type'           => 'select',
            'title'          => esc_html__('Maintenance Mode Page', 'istiqbal'),
            'options'        => 'pages',
            'default_option' => esc_html__('Select a page', 'istiqbal'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          array(
            'id'             => 'maintenance_mode_title',
            'type'           => 'text',
            'title'          => esc_html__('Maintenance Mode Text', 'istiqbal'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          array(
            'id'             => 'maintenance_mode_text',
            'type'           => 'textarea',
            'title'          => esc_html__('Maintenance Mode Text', 'istiqbal'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          array(
            'id'             => 'maintenance_mode_bg',
            'type'           => 'background',
            'title'          => esc_html__('Page Background', 'istiqbal'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          // End Maintenance Mode

        ) // end: fields
      ), // end: fields section

    )
  );

  // ------------------------------
  // Advanced
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_advanced',
    'title'  => esc_html__('Advanced Settings', 'istiqbal'),
    'icon'   => 'fa fa-cog'
  );

  // ------------------------------
  // Misc Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'misc_section',
    'title'    => esc_html__('Extra Settings', 'istiqbal'),
    'icon'     => 'fa fa-reorder',
    'sections' => array(

      // custom sidebar section
      array(
        'name'     => 'custom_sidebar_section',
        'title'    => esc_html__('Custom Sidebar', 'istiqbal'),
        'icon'     => 'fa fa-reorder',
        'fields'   => array(

          // start fields
          array(
            'id'              => 'custom_sidebar',
            'title'           => esc_html__('Sidebars', 'istiqbal'),
            'desc'            => esc_html__('Go to Appearance -> Widgets after create sidebars', 'istiqbal'),
            'type'            => 'group',
            'fields'          => array(
              array(
                'id'          => 'sidebar_name',
                'type'        => 'text',
                'title'       => esc_html__('Sidebar Name', 'istiqbal'),
              ),
              array(
                'id'          => 'sidebar_desc',
                'type'        => 'text',
                'title'       => esc_html__('Custom Description', 'istiqbal'),
              )
            ),
            'accordion'       => true,
            'button_title'    => esc_html__('Add New Sidebar', 'istiqbal'),
            'accordion_title' => esc_html__('New Sidebar', 'istiqbal'),
          ),
          // end fields

        )
      ),
      // custom sidebar section

      // Custom CSS/JS
      array(
        'name'        => 'custom_css_js_section',
        'title'       => esc_html__('Custom Codes', 'istiqbal'),
        'icon'        => 'fa fa-code',

        // begin: fields
        'fields'      => array(
          // Start Custom CSS/JS
          array(
            'type'    => 'notice',
            'class'   => 'info cs-istiqbal-heading',
            'content' => esc_html__('Custom JS', 'istiqbal')
          ),
          array(
            'id'             => 'theme_custom_js',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__('Enter your JS code here...', 'istiqbal'),
            ),
          ),
          // End Custom CSS/JS

        ) // end: fields
      ),

      // Translation
      array(
        'name'        => 'theme_translation_section',
        'title'       => esc_html__('Translation', 'istiqbal'),
        'icon'        => 'fa fa-language',

        // begin: fields
        'fields'      => array(

          // Start Translation
          array(
            'type'    => 'notice',
            'class'   => 'info cs-istiqbal-heading',
            'content' => esc_html__('Common Texts', 'istiqbal')
          ),
          array(
            'id'          => 'read_more_text',
            'type'        => 'text',
            'title'       => esc_html__('Read More Text', 'istiqbal'),
          ),
          array(
            'id'          => 'view_more_text',
            'type'        => 'text',
            'title'       => esc_html__('View More Text', 'istiqbal'),
          ),
          array(
            'id'          => 'share_text',
            'type'        => 'text',
            'title'       => esc_html__('Share Text', 'istiqbal'),
          ),
          array(
            'id'          => 'share_on_text',
            'type'        => 'text',
            'title'       => esc_html__('Share On Tooltip Text', 'istiqbal'),
          ),
          array(
            'id'          => 'author_text',
            'type'        => 'text',
            'title'       => esc_html__('Author Text', 'istiqbal'),
          ),
          array(
            'id'          => 'post_comment_text',
            'type'        => 'text',
            'title'       => esc_html__('Post Comment Text [Submit Button]', 'istiqbal'),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-istiqbal-heading',
            'content' => esc_html__('WooCommerce', 'istiqbal')
          ),
          array(
            'id'          => 'add_to_cart_text',
            'type'        => 'text',
            'title'       => esc_html__('Add to Cart Text', 'istiqbal'),
          ),
          array(
            'id'          => 'details_text',
            'type'        => 'text',
            'title'       => esc_html__('Details Text', 'istiqbal'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-istiqbal-heading',
            'content' => esc_html__('Pagination', 'istiqbal')
          ),
          array(
            'id'          => 'older_post',
            'type'        => 'text',
            'title'       => esc_html__('Older Posts Text', 'istiqbal'),
          ),
          array(
            'id'          => 'newer_post',
            'type'        => 'text',
            'title'       => esc_html__('Newer Posts Text', 'istiqbal'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-istiqbal-heading',
            'content' => esc_html__('Single Portfolio Pagination', 'istiqbal')
          ),
          array(
            'id'          => 'prev_port',
            'type'        => 'text',
            'title'       => esc_html__('Prev Case Text', 'istiqbal'),
          ),
          array(
            'id'          => 'next_port',
            'type'        => 'text',
            'title'       => esc_html__('Next Case Text', 'istiqbal'),
          ),
          // End Translation

        ) // end: fields
      ),

    ),
  );

  
  // ------------------------------
  // backup                       -
  // ------------------------------
  $options[]   = array(
    'name'     => 'backup_section',
    'title'    => 'Backup',
    'icon'     => 'fa fa-shield',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'istiqbal'),
      ),

      array(
        'type'    => 'backup',
      ),

    )
  );

  return $options;

}
add_filter( 'cs_framework_options', 'istiqbal_options' );