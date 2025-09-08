<?php
/*
 * The main template file.
 * Author & Copyright: wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */
get_header();
	// Metabox
	$istiqbal_id    = ( isset( $post ) ) ? $post->ID : 0;
	$istiqbal_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $istiqbal_id;
	$istiqbal_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $istiqbal_id;
	$istiqbal_meta  = get_post_meta( $istiqbal_id, 'page_type_metabox', true );
	if ( $istiqbal_meta ) {
		$istiqbal_content_padding = isset( $istiqbal_meta['content_spacings'] ) ? $istiqbal_meta['content_spacings'] : '';
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
	// Theme Options
	$istiqbal_sidebar_position = cs_get_option( 'blog_sidebar_position' );
	$istiqbal_sidebar_position = $istiqbal_sidebar_position ?$istiqbal_sidebar_position : 'sidebar-right';
	$istiqbal_blog_widget = cs_get_option( 'blog_widget' );
	$istiqbal_blog_widget = $istiqbal_blog_widget ? $istiqbal_blog_widget : 'sidebar-1';

	if (isset($_GET['sidebar'])) {
	  $istiqbal_sidebar_position = $_GET['sidebar'];
	}

	$istiqbal_sidebar_position = $istiqbal_sidebar_position ? $istiqbal_sidebar_position : 'sidebar-right';

	// Sidebar Position
	if ( $istiqbal_sidebar_position === 'sidebar-hide' ) {
		$layout_class = 'col col col-md-10 col-md-offset-1';
		$istiqbal_sidebar_class = 'hide-sidebar';
	} elseif ( $istiqbal_sidebar_position === 'sidebar-left' && is_active_sidebar( $istiqbal_blog_widget ) ) {
		$layout_class = 'col col-md-8 col-md-push-4';
		$istiqbal_sidebar_class = 'left-sidebar';
	} elseif( is_active_sidebar( $istiqbal_blog_widget ) ) {
		$layout_class = 'col col-md-8';
		$istiqbal_sidebar_class = 'right-sidebar';
	} else {
		$layout_class = 'col col-md-12';
		$istiqbal_sidebar_class = 'hide-sidebar';
	}

	?>
<div class="wpo-blog-pg-section section-padding">
	<div class="container <?php echo esc_attr( $istiqbal_content_padding .' '. $istiqbal_sidebar_class ); ?>" style="<?php echo esc_attr( $istiqbal_custom_padding ); ?>">
		<div class="row">
			<div class="<?php echo esc_attr( $layout_class ); ?>">
				<div class="blog-content">
				<?php
				if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'theme-layouts/post/content' );
					endwhile;
				else :
					get_template_part( 'theme-layouts/post/content', 'none' );
				endif;
				istiqbal_posts_navigation();
		    wp_reset_postdata(); ?>
		    </div>
			</div><!-- Content Area -->
			<?php
			if ( $istiqbal_sidebar_position !== 'sidebar-hide' && is_active_sidebar( $istiqbal_blog_widget ) ) {
				get_sidebar(); // Sidebar
			} ?>
		</div>
	</div>
</div>
<?php
get_footer();