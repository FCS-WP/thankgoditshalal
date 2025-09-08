<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */
$istiqbal_id    = ( isset( $post ) ) ? $post->ID : 0;
$istiqbal_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $istiqbal_id;
$istiqbal_meta  = get_post_meta( $istiqbal_id, 'page_type_metabox', true );
if ( $istiqbal_meta ) {
	$istiqbal_content_padding = $istiqbal_meta['content_spacings'];
} else { $istiqbal_content_padding = 'section-padding'; }
// Top and Bottom Padding
if ( $istiqbal_content_padding && $istiqbal_content_padding !== 'padding-default' ) {
	$istiqbal_content_top_spacings = isset( $istiqbal_meta['content_top_spacings'] ) ? $istiqbal_meta['content_top_spacings'] : '';
	$istiqbal_content_bottom_spacings = isset( $istiqbal_meta['content_bottom_spacings'] ) ? $istiqbal_meta['content_bottom_spacings'] : '';
	if ( $istiqbal_content_padding === 'padding-custom' ) {
		$istiqbal_content_top_spacings = $istiqbal_content_top_spacings ? 'padding-top:'. istiqbal_check_px( $istiqbal_content_top_spacings ) .';' : '';
		$istiqbal_content_bottom_spacings = $istiqbal_content_bottom_spacings ? 'padding-bottom:'. istiqbal_check_px($istiqbal_content_bottom_spacings) .';' : '';
		$istiqbal_custom_padding = $istiqbal_content_top_spacings . $istiqbal_content_bottom_spacings;
	} else {
		$istiqbal_custom_padding = '';
	}
	$padding_class = '';
} else {
	$istiqbal_custom_padding = '';
	$padding_class = '';
}

// Page Layout
$page_layout_options = get_post_meta( get_the_ID(), 'page_layout_options', true );
if ( $page_layout_options ) {
	$istiqbal_page_layout = $page_layout_options['page_layout'];
	$page_sidebar_widget = $page_layout_options['page_sidebar_widget'];
} else {
	$istiqbal_page_layout = 'right-sidebar';
	$page_sidebar_widget = '';
}
$page_sidebar_widget = $page_sidebar_widget ? $page_sidebar_widget : 'sidebar-1';
if ( $istiqbal_page_layout === 'extra-width' ) {
	$istiqbal_page_column = 'extra-width';
	$istiqbal_page_container = 'container-fluid';
} elseif ( $istiqbal_page_layout === 'full-width' ) {
	$istiqbal_page_column = 'col-md-12';
	$istiqbal_page_container = 'container ';
} elseif( ( $istiqbal_page_layout === 'left-sidebar' || $istiqbal_page_layout === 'right-sidebar' ) && is_active_sidebar( $page_sidebar_widget ) ) {
	if( $istiqbal_page_layout === 'left-sidebar' ){
		$istiqbal_page_column = 'col-md-8 order-12';
	} else {
		$istiqbal_page_column = 'col-md-8';
	}
	$istiqbal_page_container = 'container ';
} else {
	$istiqbal_page_column = 'col-md-12';
	$istiqbal_page_container = 'container ';
}
$istiqbal_theme_page_comments = cs_get_option( 'theme_page_comments' );
get_header();
?>
<div class="page-wrap <?php echo esc_attr( $padding_class.''.$istiqbal_content_padding ); ?>">
	<div class="<?php echo esc_attr( $istiqbal_page_container.''.$istiqbal_page_layout ); ?>" style="<?php echo esc_attr( $istiqbal_custom_padding ); ?>">
		<div class="row">
			<div class="<?php echo esc_attr( $istiqbal_page_column ); ?>">
				<div class="page-wraper clearfix">
				<?php
				while ( have_posts() ) : the_post();
					the_content();
					if ( !$istiqbal_theme_page_comments && ( comments_open() || get_comments_number() ) ) :
						comments_template();
					endif;
				endwhile; // End of the loop.
				?>
				</div>
				<div class="page-link-wrap">
					<?php istiqbal_wp_link_pages(); ?>
				</div>
			</div>
			<?php
			// Sidebar
			if( ($istiqbal_page_layout === 'left-sidebar' || $istiqbal_page_layout === 'right-sidebar') && is_active_sidebar( $page_sidebar_widget )  ) {
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php
get_footer();