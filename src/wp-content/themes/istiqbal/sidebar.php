<?php
/*
 * The sidebar containing the main widget area.
 * Author & Copyright: wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */
$istiqbal_blog_widget = cs_get_option( 'blog_widget' );
$istiqbal_single_blog_widget = cs_get_option( 'single_blog_widget' );
$istiqbal_event_sidebar_position = cs_get_option( 'event_sidebar_position' );
$istiqbal_event_widget = cs_get_option( 'single_event_widget' );
$istiqbal_service_sidebar_position = cs_get_option( 'service_sidebar_position' );
$istiqbal_service_widget = cs_get_option( 'single_service_widget' );
$istiqbal_blog_sidebar_position = cs_get_option( 'blog_sidebar_position' );
$istiqbal_sidebar_position = cs_get_option( 'single_sidebar_position' );
$woo_widget = cs_get_option('woo_widget');
$istiqbal_page_layout_shop = cs_get_option( 'woo_sidebar_position' );
$shop_sidebar_position = ( is_woocommerce_shop() ) ? $istiqbal_page_layout_shop : '';
if ( is_home() || is_archive() || is_search() ) {
	$istiqbal_blog_sidebar_position = $istiqbal_blog_sidebar_position;
} else {
	$istiqbal_blog_sidebar_position = '';
}
if ( is_single() ) {
	$istiqbal_sidebar_position = $istiqbal_sidebar_position;
} else {
	$istiqbal_sidebar_position = '';
}

if ( is_singular( 'event' ) ) {
	$istiqbal_event_sidebar_position = $istiqbal_event_sidebar_position;
} else {
	$istiqbal_event_sidebar_position = '';
}

if ( is_singular( 'service' ) ) {
	$istiqbal_service_sidebar_position = $istiqbal_service_sidebar_position;
} else {
	$istiqbal_service_sidebar_position = '';
}

if ( is_page() ) {
	// Page Layout Options
	$istiqbal_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );
	if ( $istiqbal_page_layout ) {
		$istiqbal_page_sidebar_pos = $istiqbal_page_layout['page_layout'];
	} else {
		$istiqbal_page_sidebar_pos = '';
	}
} else {
	$istiqbal_page_sidebar_pos = '';
}
if (isset($_GET['sidebar'])) {
  $istiqbal_blog_sidebar_position = $_GET['sidebar'];
}
// sidebar class
if ( $istiqbal_sidebar_position === 'sidebar-left' || $istiqbal_page_sidebar_pos == 'left-sidebar' || $istiqbal_blog_sidebar_position === 'sidebar-left' ) {
	$col_class = ' order-lg-1 col-12';
} else {
	$col_class = '';
}

if ( $istiqbal_event_sidebar_position === 'sidebar-left' ) {
	$atn_push_class = ' order-lg-1 col-12';
} else {
	$atn_push_class = '';
}
if ( $istiqbal_service_sidebar_position === 'sidebar-left'  ) {
	$service_push_class = ' order-lg-1 col-12';
} else {
	$service_push_class = '';
}

if ( is_singular( 'event' ) ) {
	$custom_col = ' col-lg-4 col-md-8 ';
	$sidebar_class = 'event-sidebar blog-sidebar';
}	elseif ( is_singular( 'service' ) ) {
	$custom_col = ' col-lg-4 col-md-8 ';
	$sidebar_class = 'service-sidebar blog-sidebar';
} else {
	$custom_col = '';
	$sidebar_class = 'blog-sidebar';
}

if (  $shop_sidebar_position == 'left-sidebar' ) {
	$shop_push_class = ' order-lg-1 col-12';
} else {
	$shop_push_class = '';
}

if (  class_exists( 'WooCommerce' ) && is_shop() ) {
	$shop_col = ' shop-sidebar col-lg-4 col-md-8';
} else {
	$shop_col = '';
}

?>
<div class="col-lg-4 <?php echo esc_attr( $col_class.$custom_col.$atn_push_class.$shop_col.$shop_push_class.$service_push_class ); ?>">
	<div class="<?php echo esc_attr( $sidebar_class ); ?>">
		<?php
		if (is_page() && isset( $istiqbal_page_layout['page_sidebar_widget'] ) && !empty( $istiqbal_page_layout['page_sidebar_widget'] ) ) {
			if ( is_active_sidebar( $istiqbal_page_layout['page_sidebar_widget'] ) ) {
				dynamic_sidebar( $istiqbal_page_layout['page_sidebar_widget'] );
			}
		} elseif (!is_page() && $istiqbal_blog_widget && !$istiqbal_single_blog_widget) {
			if ( is_active_sidebar( $istiqbal_blog_widget ) ) {
				dynamic_sidebar( $istiqbal_blog_widget );
			}
		} elseif ( $istiqbal_event_widget && is_singular( 'event' ) ) {
			if ( is_active_sidebar( $istiqbal_event_widget ) ) {
				dynamic_sidebar( $istiqbal_event_widget );
			}
		}  elseif ( $istiqbal_service_widget && is_singular( 'service' ) ) {
			if ( is_active_sidebar( $istiqbal_service_widget ) ) {
				dynamic_sidebar( $istiqbal_service_widget );
			}
		}  elseif (is_woocommerce_shop() && $woo_widget) {
			if (is_active_sidebar($woo_widget)) {
				dynamic_sidebar($woo_widget);
			}
		} elseif ( is_single() && $istiqbal_single_blog_widget ) {
			if ( is_active_sidebar( $istiqbal_single_blog_widget ) ) {
				dynamic_sidebar( $istiqbal_single_blog_widget );
			}
		} else {
			if ( is_active_sidebar( 'sidebar-1' ) ) {
				dynamic_sidebar( 'sidebar-1' );
			}
		} ?>
	</div>
</div><!-- #secondary -->
