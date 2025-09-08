<?php
// Metabox
global $post;
$istiqbal_id    = ( isset( $post ) ) ? $post->ID : false;
$istiqbal_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $istiqbal_id;
$istiqbal_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $istiqbal_id;
$istiqbal_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('service') ) ? $istiqbal_id : false;
$istiqbal_meta  = get_post_meta( $istiqbal_id, 'page_type_metabox', true );
// Header Style

$istiqbal_logo = cs_get_option( 'istiqbal_logo' );

$logo_url = wp_get_attachment_url( $istiqbal_logo );
$istiqbal_logo_alt = get_post_meta( $istiqbal_logo, '_wp_attachment_image_alt', true );

if ( $logo_url ) {
  $logo_url = $logo_url;
} else {
 $logo_url = ISTIQBAL_IMAGES.'/logo.svg';
}

if ( has_nav_menu( 'primary' ) ) {
  $logo_padding = ' has_menu ';
}
else {
   $logo_padding = ' dont_has_menu ';
}


// Logo Spacings
// Logo Spacings
$istiqbal_brand_logo_top = cs_get_option( 'istiqbal_logo_top' );
$istiqbal_brand_logo_bottom = cs_get_option( 'istiqbal_logo_bottom' );
if ( $istiqbal_brand_logo_top ) {
  $istiqbal_brand_logo_top = 'padding-top:'. istiqbal_check_px( $istiqbal_brand_logo_top ) .';';
} else { $istiqbal_brand_logo_top = ''; }
if ( $istiqbal_brand_logo_bottom ) {
  $istiqbal_brand_logo_bottom = 'padding-bottom:'. istiqbal_check_px( $istiqbal_brand_logo_bottom ) .';';
} else { $istiqbal_brand_logo_bottom = ''; }
?>
<div class="site-logo <?php echo esc_attr( $logo_padding ); ?>"  style="<?php echo esc_attr( $istiqbal_brand_logo_top ); echo esc_attr( $istiqbal_brand_logo_bottom ); ?>">
   <?php if ( $istiqbal_logo ) {
    ?>
      <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
       <img src="<?php echo esc_url( $logo_url ); ?>" alt=" <?php echo esc_attr( $istiqbal_logo_alt ); ?>">
     </a>
   <?php } elseif( has_custom_logo() ) {
      the_custom_logo();
    } else {
    ?>
    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
       <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo get_bloginfo('name'); ?>">
     </a>
   <?php
  } ?>
</div>