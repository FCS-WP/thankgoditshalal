<?php
/**
 * Single Event.
 */
$istiqbal_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$istiqbal_large_image = $istiqbal_large_image ? $istiqbal_large_image[0] : '';
$image_alt = get_post_meta( $istiqbal_large_image, '_wp_attachment_image_alt', true);
$event_options = get_post_meta( get_the_ID(), 'event_options', true );
$event_page_options = get_post_meta( get_the_ID(), 'event_page_options', true );

$istiqbal_prev_pro = cs_get_option('prev_service');
$istiqbal_next_pro = cs_get_option('next_servic');
$istiqbal_prev_pro = ($istiqbal_prev_pro) ? $istiqbal_prev_pro : esc_html__('Previous event', 'istiqbal');
$istiqbal_next_pro = ($istiqbal_next_pro) ? $istiqbal_next_pro : esc_html__('Next event', 'istiqbal');
$istiqbal_prev_post = get_previous_post( '', false);
$istiqbal_next_post = get_next_post( '', false);

?>        
<div class="content-area">
			<div class="event-article">
     		<?php the_content(); ?>
     </div>
</div> 

 