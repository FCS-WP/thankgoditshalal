<?php
/*
 * The search template file.
 * Author & Copyright: wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */
get_header();
?>
<div class="wpo-blog-pg-section">
	<?php
		if ( 'post' === get_query_var('post_type') || 'post' === get_post_type() ) {
			//Load template search Posts
			echo do_shortcode('[elementor-template id="161"]');
		} else {
			//Load template search Products
			echo do_shortcode('[elementor-template id="162"]');
		}
	?>
</div>
<?php
get_footer();
