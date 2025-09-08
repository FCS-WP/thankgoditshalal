<?php
  // Metabox
  $istiqbal_id    = ( isset( $post ) ) ? $post->ID : 0;
  $istiqbal_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $istiqbal_id;
  $istiqbal_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $istiqbal_id;
  $istiqbal_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $istiqbal_id : false;
  $istiqbal_meta  = get_post_meta( $istiqbal_id, 'page_type_metabox', true );

  // Header Style
  if ( $istiqbal_meta ) {
    $istiqbal_header_design  = $istiqbal_meta['select_header_design'];
    $istiqbal_sticky_header = isset( $istiqbal_meta['sticky_header'] ) ? $istiqbal_meta['sticky_header'] : '' ;
    $istiqbal_search = isset( $istiqbal_meta['istiqbal_search'] ) ? $istiqbal_meta['istiqbal_search'] : '';
  } else {
    $istiqbal_header_design  = cs_get_option( 'select_header_design' );
    $istiqbal_sticky_header  = cs_get_option( 'sticky_header' );
    $istiqbal_search  = cs_get_option( 'istiqbal_search' );
  }

  $istiqbal_cart_widget  = cs_get_option( 'istiqbal_cart_widget' );

  if ( $istiqbal_header_design === 'default' ) {
    $istiqbal_header_design_actual  = cs_get_option( 'select_header_design' );
  } else {
    $istiqbal_header_design_actual = ( $istiqbal_header_design ) ? $istiqbal_header_design : cs_get_option('select_header_design');
  }
  $istiqbal_header_design_actual = $istiqbal_header_design_actual ? $istiqbal_header_design_actual : 'style_two';

  if ( $istiqbal_meta && $istiqbal_header_design !== 'default') {
   $istiqbal_search = isset( $istiqbal_meta['istiqbal_search'] ) ? $istiqbal_meta['istiqbal_search'] : '';
  } else {
    $istiqbal_search  = cs_get_option( 'istiqbal_search' );
  }

  if ( $istiqbal_header_design_actual == 'style_two' ) { 
    $menu_container = 'container-fluid';
  } else {
    $menu_container = 'container-fluid';
  }

  if ( $istiqbal_cart_widget ) {
    $cart_class = 'has-cart ';
  } else {
    $cart_class = 'not-has-cart ';
  }
  if ( $istiqbal_search ) {
   $search_class = 'not-has-search ';
  } else {
    $search_class = 'has-search ';
  }
  if ( has_nav_menu( 'primary' ) ) {
     $menu_padding = ' has-menu ';
  } else {
     $menu_padding = ' dont-has-menu ';
  }
  if ($istiqbal_meta) {
    $istiqbal_choose_menu = isset( $istiqbal_meta['choose_menu'] ) ? $istiqbal_meta['choose_menu'] : '' ;
  } else { $istiqbal_choose_menu = ''; }
  $istiqbal_choose_menu = $istiqbal_choose_menu ? $istiqbal_choose_menu : '';

?>
<!-- Navigation & Search -->
 <div class="<?php echo esc_attr( $menu_container ); ?>">
    <div class="row align-items-center">
      <div class="col-lg-3 col-md-3 col-3 d-lg-none dl-block">
          <div class="mobail-menu">
              <button type="button" class="navbar-toggler open-btn">
                  <span class="sr-only"><?php echo esc_html__( 'Toggle navigation','istiqbal' ) ?></span>
                  <span class="icon-bar first-angle"></span>
                  <span class="icon-bar middle-angle"></span>
                  <span class="icon-bar last-angle"></span>
              </button>
          </div>
      </div>
      <div class="col-lg-2 col-md-6 col-6"><!-- Start of Logo -->
          <div class="navbar-header">
            <?php get_template_part( 'theme-layouts/header/logo' ); ?>
          </div>
      </div>
      <div class="col-lg-8 col-md-1 col-1"><!-- Start of nav-collapse -->
        <div id="navbar" class="collapse navbar-collapse navigation-holder <?php echo esc_attr( $menu_padding.$cart_class.$search_class ); ?>">
            <button class="menu-close"><i class="ti-close"></i></button>
            <?php
              wp_nav_menu(
                array(
                  'menu'              => 'primary',
                  'theme_location'    => 'primary',
                  'container'         => '',
                  'container_class'   => '',
                  'container_id'      => '',
                  'menu_class'        => 'nav navbar-nav menu nav-menu mb-2 mb-lg-0',
                  'fallback_cb'       => '__return_false',
                )
              );
            ?>
        </div><!-- end of nav-collapse -->
      </div>
      <?php get_template_part( 'theme-layouts/header/search','bar' ); ?>
    </div><!-- end of row -->
  </div><!-- end of container -->


