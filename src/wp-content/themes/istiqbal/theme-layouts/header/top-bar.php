<?php
// Metabox
global $post;
$istiqbal_id    = ( isset( $post ) ) ? $post->ID : false;
$istiqbal_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $istiqbal_id;
$istiqbal_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $istiqbal_id;
$istiqbal_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $istiqbal_id : false;
$istiqbal_meta  = get_post_meta( $istiqbal_id, 'page_type_metabox', true );
  if ($istiqbal_meta) {
    $istiqbal_topbar_options = $istiqbal_meta['topbar_options'];
  } else {
    $istiqbal_topbar_options = '';
  }

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

// Define Theme Options and Metabox varials in right way!
if ($istiqbal_meta) {
  if ($istiqbal_topbar_options === 'custom' && $istiqbal_topbar_options !== 'default') {
    $istiqbal_top_left          = $istiqbal_meta['top_left'];
    $istiqbal_top_right          = $istiqbal_meta['top_right'];
    $istiqbal_hide_topbar        = $istiqbal_topbar_options;
    $istiqbal_topbar_bg          = $istiqbal_meta['topbar_bg'];
    if ($istiqbal_topbar_bg) {
      $istiqbal_topbar_bg = 'background-color: '. $istiqbal_topbar_bg .';';
    } else {$istiqbal_topbar_bg = '';}
  } else {
    $istiqbal_top_left          = cs_get_option('top_left');
    $istiqbal_top_right          = cs_get_option('top_right');
    $istiqbal_hide_topbar        = cs_get_option('top_bar');
    $istiqbal_topbar_bg          = '';
  }
} else {
  // Theme Options fields
  $istiqbal_top_left         = cs_get_option('top_left');
  $istiqbal_top_right          = cs_get_option('top_right');
  $istiqbal_hide_topbar        = cs_get_option('top_bar');
  $istiqbal_topbar_bg          = '';
}
// All options
if ( $istiqbal_meta && $istiqbal_topbar_options === 'custom' && $istiqbal_topbar_options !== 'default' ) {
  $istiqbal_top_right = ( $istiqbal_top_right ) ? $istiqbal_meta['top_right'] : cs_get_option('top_right');
  $istiqbal_top_left = ( $istiqbal_top_left ) ? $istiqbal_meta['top_left'] : cs_get_option('top_left');
} else {
  $istiqbal_top_right = cs_get_option('top_right');
  $istiqbal_top_left = cs_get_option('top_left');
}
if ( $istiqbal_meta && $istiqbal_topbar_options !== 'default' ) {
  if ( $istiqbal_topbar_options === 'hide_topbar' ) {
    $istiqbal_hide_topbar = 'hide';
  } else {
    $istiqbal_hide_topbar = 'show';
  }
} else {
  $istiqbal_hide_topbar_check = cs_get_option( 'top_bar' );
  if ( $istiqbal_hide_topbar_check === true ) {
     $istiqbal_hide_topbar = 'hide';
  } else {
     $istiqbal_hide_topbar = 'show';
  }
}
if ( $istiqbal_meta ) {
  $istiqbal_topbar_bg = ( $istiqbal_topbar_bg ) ? $istiqbal_meta['topbar_bg'] : '';
} else {
  $istiqbal_topbar_bg = '';
}
if ( $istiqbal_topbar_bg ) {
  $istiqbal_topbar_bg = 'background-color: '. $istiqbal_topbar_bg .';';
} else { $istiqbal_topbar_bg = ''; }

if( $istiqbal_hide_topbar === 'show' && ( $istiqbal_top_left || $istiqbal_top_right ) ) {
?>
 <div class="topbar" style="<?php echo esc_attr( $istiqbal_topbar_bg ); ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-7 col-sm-12 col-12">
               <?php echo do_shortcode( $istiqbal_top_left ); ?>
            </div>
            <div class="col col-md-5 col-sm-12 col-12">
                <?php echo do_shortcode( $istiqbal_top_right ); ?>
            </div>
        </div>
    </div>
</div> <!-- end topbar -->
<?php } // Hide Topbar - From Metabox