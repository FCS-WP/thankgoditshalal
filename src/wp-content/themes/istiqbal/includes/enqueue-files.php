<?php
/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

/**
 * Enqueue Files for FrontEnd
 */
function istiqbal_google_font_url() {
    $font_url = '';
    if ( 'off' !== esc_html__( 'on', 'istiqbal' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Mulish:wght@200;300;400;500;600;700;800;900&display=swap' ), "//fonts.googleapis.com/css2" );
    }
     return str_replace( array("%3A","%40", "%3B", "%26", "%3D"), array(":", "@", ";", "&", "="), $font_url );
}

function istiqbal_heading_google_font_url() {
    $font_url = '';
    if ( 'off' !== esc_html__( 'on', 'istiqbal' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Cinzel Decorative:wght@400;700;900&display=swap' ), "//fonts.googleapis.com/css2" );
    }
     return str_replace( array("%3A","%40", "%3B", "%26", "%3D"), array(":", "@", ";", "&", "="), $font_url );
}

if ( ! function_exists( 'istiqbal_scripts_styles' ) ) {
  function istiqbal_scripts_styles() {

    // Styles
    wp_enqueue_style( 'themify-icons', ISTIQBAL_CSS .'/themify-icons.css', array(), '4.6.3', 'all' );
    wp_enqueue_style( 'flaticon', ISTIQBAL_CSS .'/flaticon.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'bootstrap', ISTIQBAL_CSS .'/bootstrap.min.css', array(), '5.0.1', 'all' );
    wp_enqueue_style( 'animate', ISTIQBAL_CSS .'/animate.css', array(), '3.5.1', 'all' );
    wp_enqueue_style( 'odometer', ISTIQBAL_CSS .'/odometer.css', array(), '0.4.8', 'all' );
    wp_enqueue_style( 'progresscircle', ISTIQBAL_CSS .'/progresscircle.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'owl-carousel', ISTIQBAL_CSS .'/owl.carousel.css', array(), '2.0.0', 'all' );
    wp_enqueue_style( 'owl-theme', ISTIQBAL_CSS .'/owl.theme.css', array(), '2.0.0', 'all' );
    wp_enqueue_style( 'slick', ISTIQBAL_CSS .'/slick.css', array(), '1.6.0', 'all' );
    wp_enqueue_style( 'swiper', ISTIQBAL_CSS .'/swiper.min.css', array(), '4.0.7', 'all' );
    wp_enqueue_style( 'slick-theme', ISTIQBAL_CSS .'/slick-theme.css', array(), '1.6.0', 'all' );
    wp_enqueue_style( 'owl-transitions', ISTIQBAL_CSS .'/owl.transitions.css', array(), '2.0.0', 'all' );
    wp_enqueue_style( 'fancybox', ISTIQBAL_CSS .'/fancybox.css', array(), '2.0.0', 'all' );
    wp_enqueue_style( 'istiqbal-style', ISTIQBAL_CSS .'/styles.css', array(), ISTIQBAL_VERSION, 'all' );
    wp_enqueue_style( 'element', ISTIQBAL_CSS .'/elements.css', array(), ISTIQBAL_VERSION, 'all' );
    if ( !function_exists('cs_framework_init') ) {
      wp_enqueue_style('istiqbal-default-style', get_template_directory_uri() . '/style.css', array(),  ISTIQBAL_VERSION, 'all' );
    }
    wp_enqueue_style( 'consoel-google-fonts', esc_url( istiqbal_google_font_url() ), array(), ISTIQBAL_VERSION, 'all' );
    wp_enqueue_style( 'consoel-heading-google-fonts', esc_url( istiqbal_heading_google_font_url() ), array(), ISTIQBAL_VERSION, 'all' );
    // Scripts
    wp_enqueue_script( 'bootstrap', ISTIQBAL_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), '5.0.1', true );
    wp_enqueue_script( 'imagesloaded');
    wp_enqueue_script( 'isotope', ISTIQBAL_SCRIPTS . '/isotope.min.js', array( 'jquery' ), '2.2.2', true );
    wp_enqueue_script( 'fancybox', ISTIQBAL_SCRIPTS . '/fancybox.min.js', array( 'jquery' ), '2.1.5', true );
    wp_enqueue_script( 'instafeed', ISTIQBAL_SCRIPTS . '/instafeed.min.js', array( 'jquery' ), '2.1.5', true );
    wp_enqueue_script( 'circle-progress', ISTIQBAL_SCRIPTS . '/progresscircle.js', array( 'jquery' ), '2.1.5', true );
    wp_enqueue_script( 'masonry');
    wp_enqueue_script( 'owl-carousel', ISTIQBAL_SCRIPTS . '/owl-carousel.js', array( 'jquery' ), '2.0.0', true );
    wp_enqueue_script( 'jquery-easing', ISTIQBAL_SCRIPTS . '/jquery-easing.js', array( 'jquery' ), '1.4.0', true );
    wp_enqueue_script( 'wow', ISTIQBAL_SCRIPTS . '/wow.min.js', array( 'jquery' ), '1.4.0', true );
    wp_enqueue_script( 'odometer', ISTIQBAL_SCRIPTS . '/odometer.min.js', array( 'jquery' ), '0.4.8', true );
    wp_enqueue_script( 'magnific-popup', ISTIQBAL_SCRIPTS . '/magnific-popup.js', array( 'jquery' ), '1.1.0', true );
    wp_enqueue_script( 'slick-slider', ISTIQBAL_SCRIPTS . '/slick-slider.js', array( 'jquery' ), '1.6.0', true );
    wp_enqueue_script( 'moving-animation', ISTIQBAL_SCRIPTS . '/moving-animation.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'swiper', ISTIQBAL_SCRIPTS . '/swiper.min.js', array( 'jquery' ), '4.0.7', true );
    wp_enqueue_script( 'wc-quantity-increment', ISTIQBAL_SCRIPTS . '/wc-quantity-increment.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'istiqbal-scripts', ISTIQBAL_SCRIPTS . '/scripts.js', array( 'jquery' ), ISTIQBAL_VERSION, true );
    // Comments
    wp_enqueue_script( 'istiqbal-inline-validate', ISTIQBAL_SCRIPTS . '/jquery.validate.min.js', array( 'jquery' ), '1.9.0', true );
    wp_add_inline_script( 'istiqbal-validate', 'jQuery(document).ready(function($) {$("#commentform").validate({rules: {author: {required: true,minlength: 2},email: {required: true,email: true},comment: {required: true,minlength: 10}}});});' );

    // Responsive Active
    $istiqbal_viewport = cs_get_option('theme_responsive');
    if( !$istiqbal_viewport ) {
      wp_enqueue_style( 'istiqbal-responsive', ISTIQBAL_CSS .'/responsive.css', array(), ISTIQBAL_VERSION, 'all' );
    }

    // Adds support for pages with threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }
  add_action( 'wp_enqueue_scripts', 'istiqbal_scripts_styles' );
}

/**
 * Enqueue Files for BackEnd
 */
if ( ! function_exists( 'istiqbal_admin_scripts_styles' ) ) {
  function istiqbal_admin_scripts_styles() {

    wp_enqueue_style( 'istiqbal-admin-main', ISTIQBAL_CSS . '/admin-styles.css', true );
    wp_enqueue_style( 'flaticon', ISTIQBAL_CSS . '/flaticon.css', true );
    wp_enqueue_style( 'themify-icons', ISTIQBAL_CSS . '/themify-icons.css', true );
    wp_enqueue_script( 'istiqbal-admin-scripts', ISTIQBAL_SCRIPTS . '/admin-scripts.js', true );

  }
  add_action( 'admin_enqueue_scripts', 'istiqbal_admin_scripts_styles' );
}
