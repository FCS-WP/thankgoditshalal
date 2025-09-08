<?php
	// Logo Image
	// Metabox - Header Transparent
	$istiqbal_id    = ( isset( $post ) ) ? $post->ID : 0;
	$istiqbal_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $istiqbal_id;
	$istiqbal_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $istiqbal_id;
	$istiqbal_meta  = get_post_meta( $istiqbal_id, 'page_type_metabox'. true );
    $istiqbal_preloader_image  = cs_get_option( 'preloader_image' );

    $istiqbal_preloader_url = wp_get_attachment_url( $istiqbal_preloader_image );
    $istiqbal_preloader_alt = get_post_meta( $istiqbal_preloader_image, '_wp_attachment_image_alt', true );

    if ( $istiqbal_preloader_url ) {
        $istiqbal_preloader_url = $istiqbal_preloader_url;
    } else {
        $istiqbal_preloader_url = ISTIQBAL_IMAGES.'/preloader.png';
    }

?>
<!-- start preloader -->
<div class="preloader">
    <div class="vertical-centered-box">
        <div class="content">
            <div class="loader-circle"></div>
            <div class="loader-line-mask">
                <div class="loader-line"></div>
            </div>
           <img src="<?php echo esc_url( $istiqbal_preloader_url ); ?>" alt="<?php echo esc_attr( $istiqbal_preloader_alt ); ?>">
        </div>
    </div>
</div>
<!-- end preloader -->