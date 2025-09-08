<?php
/*
 * The template for displaying the footer.
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

$istiqbal_id    = ( isset( $post ) ) ? $post->ID : 0;
$istiqbal_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $istiqbal_id;
$istiqbal_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $istiqbal_id;
$istiqbal_meta  = get_post_meta( $istiqbal_id, 'page_type_metabox', true );
$istiqbal_ft_bg = cs_get_option('istiqbal_ft_bg');
$istiqbal_attachment = wp_get_attachment_image_src( $istiqbal_ft_bg , 'full' );
$istiqbal_attachment = $istiqbal_attachment ? $istiqbal_attachment[0] : '';
if ( $istiqbal_meta ) {
	$istiqbal_footer_design  = $istiqbal_meta['select_footer_design'];
	if ($istiqbal_footer_design != 'theme') {
	  $istiqbal_footer_design = $istiqbal_footer_design;
	} else {
	  $istiqbal_footer_design = cs_get_option( 'select_footer_design' );
	}
} else {
	$istiqbal_footer_design  = cs_get_option( 'select_footer_design' );
}

if (is_numeric($istiqbal_footer_design)) {
	$footer_class = 'footer-builder';
} else {
	$footer_class = 'wpo-site-footer clearfix';
}

if ( $istiqbal_attachment && !is_numeric($istiqbal_footer_design) ) {
	$bg_url = ' style="';
	$bg_url .= ( $istiqbal_attachment ) ? 'background-image: url( '. esc_url( $istiqbal_attachment ) .' );' : '';
	$bg_url .= '"';
} else {
	$bg_url = '';
}

if ( $istiqbal_meta ) {
	$istiqbal_hide_footer  = $istiqbal_meta['hide_footer'];
} else { $istiqbal_hide_footer = ''; }
if ( !$istiqbal_hide_footer ) { // Hide Footer Metabox
	$hide_copyright = cs_get_option('hide_copyright');
	
?>
	<!-- Footer -->
	<footer class="<?php echo esc_attr($footer_class); ?>"  <?php echo wp_kses( $bg_url, array('img' => array('src' => array(), 'alt' => array()),) ); ?>>
      <?php  if (is_numeric($istiqbal_footer_design)) {
        $footer_builder = new WP_Query(
          array(
            'post_type' => 'footerbuilder',
            'posts_per_page' => 1,
            'p' => $istiqbal_footer_design,
            'orderby' => 'none',
            'order' => 'DESC'
          )
        );

        if ($footer_builder->have_posts()) {
          while ($footer_builder->have_posts()) {
            $footer_builder->the_post();
            the_content();
          }
        }
        wp_reset_postdata();
      } else { 
		$footer_widget_block = cs_get_option( 'footer_widget_block' );
		if ( $footer_widget_block ) {
	      	get_template_part( 'theme-layouts/footer/footer', 'widgets' );
	    }
		if ( !$hide_copyright ) {
      		get_template_part( 'theme-layouts/footer/footer', 'copyright' );
	    }
      } ?>
	</footer>
	<!-- Footer -->
<?php } // Hide Footer Metabox ?>
</div><!--istiqbal-theme-wrapper -->
<?php wp_footer(); ?>
</body>
</html>
