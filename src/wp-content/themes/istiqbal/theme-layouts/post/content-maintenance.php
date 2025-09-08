<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php
$istiqbal_viewport = cs_get_option('theme_responsive');
if($istiqbal_viewport == 'on') { ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php } else { }

// if the `wp_site_icon` function does not exist (ie we're on < WP 4.3)
if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
  if (cs_get_option('brand_fav_icon')) {
    echo '<link rel="shortcut icon" href="'. esc_url(wp_get_attachment_url(cs_get_option('brand_fav_icon'))) .'" />';
  } else { ?>
    <link rel="shortcut icon" href="<?php echo esc_url(ISTIQBAL_IMAGES); ?>/favicon.png" />
  <?php }
  if (cs_get_option('iphone_icon')) {
    echo '<link rel="apple-touch-icon" sizes="57x57" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_icon'))) .'" >';
  }
  if (cs_get_option('iphone_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="114x114" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
    echo '<link name="msapplication-TileImage" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
  }
  if (cs_get_option('ipad_icon')) {
    echo '<link rel="apple-touch-icon" sizes="72x72" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_icon'))) .'" >';
  }
  if (cs_get_option('ipad_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="144x144" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_retina_icon'))) .'" >';
  }
}
$istiqbal_all_element_color  = cs_get_customize_option( 'all_element_colors' );
?>
<meta name="msapplication-TileColor" content="<?php echo esc_attr($istiqbal_all_element_color); ?>">
<meta name="theme-color" content="<?php echo esc_attr($istiqbal_all_element_color); ?>">

<link rel="profile" href="//gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
wp_head();

// Metabox
$istiqbal_id    = ( isset( $post ) ) ? $post->ID : 0;
$istiqbal_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $istiqbal_id;
$istiqbal_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $istiqbal_id;
$istiqbal_meta  = get_post_meta( $istiqbal_id, 'page_type_metabox', true );
$maintenance_title = cs_get_option('maintenance_mode_title');
$maintenance_text = cs_get_option('maintenance_mode_text');
$maintenance_mode_bg = cs_get_option('maintenance_mode_bg');
$maintenance_mode_page = (int) cs_get_option('maintenance_mode_page');

$maintenance_title = ( $maintenance_title ) ? $maintenance_title : esc_html__( 'Our Website is Under Construction', 'istiqbal' );
$maintenance_text = ( $maintenance_text ) ? $maintenance_text : esc_html__( 'Please Visit After sometime or Contact us at hello@website.com. Thanks you.', 'istiqbal' );

if ($istiqbal_meta) {
  $istiqbal_content_padding = $istiqbal_meta['content_spacings'];
} else { $istiqbal_content_padding = ''; }
// Padding - Metabox
if ($istiqbal_content_padding && $istiqbal_content_padding !== 'padding-default') {
  $istiqbal_content_top_spacings = $istiqbal_meta['content_top_spacings'];
  $istiqbal_content_bottom_spacings = $istiqbal_meta['content_bottom_spacings'];
  if ($istiqbal_content_padding === 'padding-custom') {
    $istiqbal_content_top_spacings = $istiqbal_content_top_spacings ? 'padding-top:'. istiqbal_check_px($istiqbal_content_top_spacings) .';' : '';
    $istiqbal_content_bottom_spacings = $istiqbal_content_bottom_spacings ? 'padding-bottom:'. istiqbal_check_px($istiqbal_content_bottom_spacings) .';' : '';
    $istiqbal_custom_padding = $istiqbal_content_top_spacings . $istiqbal_content_bottom_spacings;
  } else {
    $istiqbal_custom_padding = '';
  }
} else {
  $istiqbal_custom_padding = '';
}
if ($maintenance_mode_bg) {
   extract( $maintenance_mode_bg );
   $istiqbal_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
   $istiqbal_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
   $istiqbal_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
   $istiqbal_background_size    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
   $istiqbal_background_attachment    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . $attachment . ';' : '';
   $istiqbal_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . $color . ';' : '';
   $istiqbal_background_style       = ( ! empty( $image ) ) ? $istiqbal_background_image . $istiqbal_background_repeat . $istiqbal_background_position . $istiqbal_background_size . $istiqbal_background_attachment : '';
   $istiqbal_maintain_bg = ( ! empty( $istiqbal_background_style ) || ! empty( $istiqbal_background_color ) ) ? $istiqbal_background_style . $istiqbal_background_color : '';
  } else {
  $istiqbal_maintain_bg = '';
}
?>
</head>
<body <?php body_class(); ?>>
<?php if( $maintenance_mode_page && function_exists('istiqbal_maintenance_template') ){
  istiqbal_maintenance_template();
} else{ ?>
<section class="error-404-section comming-soon-section" style="<?php echo esc_attr($istiqbal_maintain_bg); ?>">
  <div class="container">
      <div class="row">
          <div class="col col-md-10 col-md-offset-1">
              <div class="content">
                  <h3><?php echo esc_html( $maintenance_title ); ?></h3>
                  <p><?php echo esc_html( $maintenance_text ); ?></p>
                  <div class="icon">
                      <i class="ti-microphone"></i>
                  </div>
              </div>
          </div>
      </div> <!-- end row -->
  </div> <!-- end container -->
</section>
<?php } ?>
  <?php wp_footer(); ?>
  </body>
</html>