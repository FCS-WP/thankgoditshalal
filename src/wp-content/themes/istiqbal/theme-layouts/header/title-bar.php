<?php
	// Metabox
	$istiqbal_id    = ( isset( $post ) ) ? $post->ID : 0;
	$istiqbal_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $istiqbal_id;
	$istiqbal_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $istiqbal_id;
	$istiqbal_meta  = get_post_meta( $istiqbal_id, 'page_type_metabox', true );
	if ($istiqbal_meta && is_page()) {
		$istiqbal_title_bar_padding = $istiqbal_meta['title_area_spacings'];
	} else { $istiqbal_title_bar_padding = ''; }
	// Padding - Theme Options
	if ($istiqbal_title_bar_padding && $istiqbal_title_bar_padding !== 'padding-default') {
		$istiqbal_title_top_spacings = $istiqbal_meta['title_top_spacings'];
		$istiqbal_title_bottom_spacings = $istiqbal_meta['title_bottom_spacings'];
		if ($istiqbal_title_bar_padding === 'padding-custom') {
			$istiqbal_title_top_spacings = $istiqbal_title_top_spacings ? 'padding-top:'. istiqbal_check_px($istiqbal_title_top_spacings) .';' : '';
			$istiqbal_title_bottom_spacings = $istiqbal_title_bottom_spacings ? 'padding-bottom:'. istiqbal_check_px($istiqbal_title_bottom_spacings) .';' : '';
			$istiqbal_custom_padding = $istiqbal_title_top_spacings . $istiqbal_title_bottom_spacings;
		} else {
			$istiqbal_custom_padding = '';
		}
	} else {
		$istiqbal_title_bar_padding = cs_get_option('title_bar_padding');
		$istiqbal_titlebar_top_padding = cs_get_option('titlebar_top_padding');
		$istiqbal_titlebar_bottom_padding = cs_get_option('titlebar_bottom_padding');
		if ($istiqbal_title_bar_padding === 'padding-custom') {
			$istiqbal_titlebar_top_padding = $istiqbal_titlebar_top_padding ? 'padding-top:'. istiqbal_check_px($istiqbal_titlebar_top_padding) .';' : '';
			$istiqbal_titlebar_bottom_padding = $istiqbal_titlebar_bottom_padding ? 'padding-bottom:'. istiqbal_check_px($istiqbal_titlebar_bottom_padding) .';' : '';
			$istiqbal_custom_padding = $istiqbal_titlebar_top_padding . $istiqbal_titlebar_bottom_padding;
		} else {
			$istiqbal_custom_padding = '';
		}
	}
	// Banner Type - Meta Box
	if ($istiqbal_meta && is_page()) {
		$istiqbal_banner_type = $istiqbal_meta['banner_type'];
	} else { $istiqbal_banner_type = ''; }
	// Header Style
	if ($istiqbal_meta) {
	  $istiqbal_header_design  = $istiqbal_meta['select_header_design'];
	  $istiqbal_hide_breadcrumbs  = $istiqbal_meta['hide_breadcrumbs'];
	} else {
	  $istiqbal_header_design  = cs_get_option('select_header_design');
	  $istiqbal_hide_breadcrumbs = cs_get_option('need_breadcrumbs');
	}
	if ( $istiqbal_header_design === 'default') {
	  $istiqbal_header_design_actual  = cs_get_option('select_header_design');
	} else {
	  $istiqbal_header_design_actual = ( $istiqbal_header_design ) ? $istiqbal_header_design : cs_get_option('select_header_design');
	}
	if ( $istiqbal_header_design_actual == 'style_two') {
		$overly_class = ' overly';
	} else {
		$overly_class = ' ';
	}
	// Overlay Color - Theme Options
		if ($istiqbal_meta && is_page()) {
			$istiqbal_bg_overlay_color = $istiqbal_meta['titlebar_bg_overlay_color'];
			$title_color = isset($istiqbal_meta['title_color']) ? $istiqbal_meta['title_color'] : '';
		} else { $istiqbal_bg_overlay_color = ''; }
		if (!empty($istiqbal_bg_overlay_color)) {
			$istiqbal_bg_overlay_color = $istiqbal_bg_overlay_color;
			$title_color = $title_color;
		} else {
			$istiqbal_bg_overlay_color = cs_get_option('titlebar_bg_overlay_color');
			$title_color = cs_get_option('title_color');
		}
		$e_uniqid        = uniqid();
		$inline_style  = '';
		if ( $istiqbal_bg_overlay_color ) {
		 $inline_style .= '.page-title-'.$e_uniqid .'.page-title {';
		 $inline_style .= ( $istiqbal_bg_overlay_color ) ? 'background-color:'. $istiqbal_bg_overlay_color.';' : '';
		 $inline_style .= '}';
		}
		if ( $title_color ) {
		 $inline_style .= '.page-title-'.$e_uniqid .'.page-title h2, .page-title-'.$e_uniqid .'.page-title .breadcrumb li, .page-title-'.$e_uniqid .'.page-title .breadcrumbs ul li a {';
		 $inline_style .= ( $title_color ) ? 'color:'. $title_color.';' : '';
		 $inline_style .= '}';
		}
		// add inline style
		add_inline_style( $inline_style );
		$styled_class  = ' page-title-'.$e_uniqid;
	// Background - Type
	if( $istiqbal_meta ) {
		$title_bar_bg = $istiqbal_meta['title_area_bg'];
	} else {
		$title_bar_bg = '';
	}
	$istiqbal_custom_header = get_custom_header();
	$header_text_color = get_theme_mod( 'header_textcolor' );
	$background_color = get_theme_mod( 'background_color' );
	if( isset( $title_bar_bg['image'] ) && ( $title_bar_bg['image'] ||  $title_bar_bg['color'] ) ) {
	  extract( $title_bar_bg );
	  $istiqbal_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . esc_url($image) . ');' : '';
	  $istiqbal_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . esc_attr( $repeat) . ';' : '';
	  $istiqbal_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . esc_attr($position) . ';' : '';
	  $istiqbal_background_size    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . esc_attr($size) . ';' : '';
	  $istiqbal_background_attachment    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . esc_attr( $attachment ) . ';' : '';
	  $istiqbal_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . esc_attr( $color ) . ';' : '';
	  $istiqbal_background_style       = ( ! empty( $image ) ) ? $istiqbal_background_image . $istiqbal_background_repeat . $istiqbal_background_position . $istiqbal_background_size . $istiqbal_background_attachment : '';
	  $istiqbal_title_bg = ( ! empty( $istiqbal_background_style ) || ! empty( $istiqbal_background_color ) ) ? $istiqbal_background_style . $istiqbal_background_color : '';
	} elseif( $istiqbal_custom_header->url ) {
		$istiqbal_title_bg = 'background-image:  url('. esc_url( $istiqbal_custom_header->url ) .');';
	} else {
		$istiqbal_title_bg = '';
	}
	if($istiqbal_banner_type === 'hide-title-area') { // Hide Title Area
	} elseif($istiqbal_meta && $istiqbal_banner_type === 'revolution-slider') { // Hide Title Area
		echo do_shortcode($istiqbal_meta['page_revslider']);
	} else {
	?>
 <!-- start page-title -->
  <section class="wpo-page-title <?php echo esc_attr( $overly_class.$styled_class.' '.$istiqbal_banner_type ); ?>" style="<?php echo esc_attr( $istiqbal_title_bg.' '.$istiqbal_custom_padding ); ?>">
	    <div class="container">
	        <div class="row">
	            <div class="col col-xs-12">
	                <div class="wpo-breadcumb-wrap">
	                    <h2><?php echo istiqbal_title_area(); ?></h2>
	                    <?php if ( !$istiqbal_hide_breadcrumbs && function_exists( 'breadcrumb_trail' )) { breadcrumb_trail();  } ?>
	                </div>
	            </div>
	        </div> <!-- end row -->
	    </div> <!-- end container -->
	</section>
  <!-- end page-title -->
<?php } ?>