<?php
$istiqbal_id    = ( isset( $post ) ) ? $post->ID : 0;
$istiqbal_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $istiqbal_id;
$istiqbal_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $istiqbal_id;
$istiqbal_meta  = get_post_meta( $istiqbal_id, 'page_type_metabox', true);

// Header Style
if ( $istiqbal_meta ) {
  $istiqbal_header_design  = $istiqbal_meta['select_header_design'];
} else {
  $istiqbal_header_design  = cs_get_option( 'select_header_design' );
}

if ( $istiqbal_header_design === 'default' ) {
  $istiqbal_header_design_actual  = cs_get_option( 'select_header_design' );
} else {
  $istiqbal_header_design_actual = ( $istiqbal_header_design ) ? $istiqbal_header_design : cs_get_option('select_header_design');
}
$istiqbal_header_design_actual = $istiqbal_header_design_actual ? $istiqbal_header_design_actual : 'style_two';

$istiqbal_cart_widget  = cs_get_option( 'istiqbal_cart_widget' );
$istiqbal_search  = cs_get_option( 'istiqbal_header_search' );

$istiqbal_menu_cta  = cs_get_option( 'istiqbal_menu_cta' );
$header_cta_text  = cs_get_option( 'header_cta_text' );
$header_cta_link  = cs_get_option( 'header_cta_link' );

?>
<div class="col-lg-2 col-md-2 col-2">
  <div class="header-search-form-wrapper header-right">
      <?php if ( $istiqbal_menu_cta ) { ?>
        <div class="close-form">
            <a class="theme-btn" href="<?php echo esc_url( $header_cta_link ); ?>">
              <?php echo esc_html( $header_cta_text ) ?>
            </a>
        </div>
      <?php }
      if ( $istiqbal_cart_widget && class_exists( 'WooCommerce' ) ) {
        get_template_part( 'theme-layouts/header/top','cart' );
      }
      if ( !$istiqbal_search ) { ?>
      <div class="cart-search-contact">
          <button class="search-toggle-btn"><i class="fi ti-search"></i></button>
          <div class="header-search-form">
              <form method="get" action="<?php echo esc_url( home_url('/') ); ?>" class="form" >
                  <div>
                      <input type="text" name="s" class="form-control" placeholder="<?php echo esc_attr__( 'Search here','istiqbal' ); ?>">
                      <button type="submit"><i class="fi ti-search"></i></button>
                  </div>
              </form>
          </div>
      </div>
    <?php } ?>
  </div>
</div>
