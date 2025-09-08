<?php

/**
 * Plugin language
 */
function istiqbal_plugin_language_setup() {
  load_plugin_textdomain( 'istiqbal-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'istiqbal_plugin_language_setup' );

/* WPAUTOP for shortcode output */
if( ! function_exists( 'istiqbal_set_wpautop' ) ) {
  function istiqbal_set_wpautop( $content, $force = true ) {
    if ( $force ) {
      $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
    }
    return do_shortcode( shortcode_unautop( $content ) );
  }
}

/* Use shortcodes in text widgets */
add_filter('widget_text', 'do_shortcode');

/* Shortcodes enable in the_excerpt */
add_filter('the_excerpt', 'do_shortcode');

/* Remove p tag and add by our self in the_excerpt */
remove_filter('the_excerpt', 'wpautop');


/* Add Extra Social Fields in Admin User Profile */
function istiqbal_add_twitter_facebook( $contactmethods ) {
  $contactmethods['twitter']    = 'Twitter';
  $contactmethods['facebook']   = 'Facebook';
  $contactmethods['instagram']  = 'Instagram';
  $contactmethods['pinterest']   = 'Pinterest';
  return $contactmethods;
}
add_filter('user_contactmethods','istiqbal_add_twitter_facebook',10,1);

/**
 *
 * Encode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_encode_string' ) ) {
  function cs_encode_string( $string ) {
    return rtrim( strtr( call_user_func( 'base'. '64' .'_encode', addslashes( gzcompress( serialize( $string ), 9 ) ) ), '+/', '-_' ), '=' );
  }
}

/**
 *
 * Decode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_decode_string' ) ) {
  function cs_decode_string( $string ) {
    return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
  }
}


/* Inline Style */
global $all_inline_styles;
$all_inline_styles = array();
if( ! function_exists( 'add_inline_style' ) ) {
  function add_inline_style( $style ) {
    global $all_inline_styles;
    array_push( $all_inline_styles, $style );
  }
}

/* Enqueue Inline Styles */
if ( ! function_exists( 'istiqbal_enqueue_inline_styles' ) ) {
  function istiqbal_enqueue_inline_styles() {

    global $all_inline_styles;

    if ( ! empty( array_filter($all_inline_styles) ) ) {
      echo '<style id="istiqbal-inline-style" type="text/css">'. istiqbal_compress_css_lines( join( '', $all_inline_styles ) ) .'</style>';
    }

  }
  add_action( 'wp_footer', 'istiqbal_enqueue_inline_styles' );
}

/* Validate px entered in field */
if( ! function_exists( 'istiqbal_core_check_px' ) ) {
  function istiqbal_core_check_px( $num ) {
    return ( is_numeric( $num ) ) ? $num . 'px' : $num;
  }
}


/* Share Options */
if ( ! function_exists( 'istiqbal_wp_share_option' ) ) {
  function istiqbal_wp_share_option() {

    global $post;
    $page_url = get_permalink($post->ID );
    $title = $post->post_title;
    $share_text = cs_get_option('share_text');
    $share_text = $share_text ? $share_text : esc_html__( 'Share', 'istiqbal' );
    $share_on_text = cs_get_option('share_on_text');
    $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'istiqbal' );
    ?>
     <div class="share tag">
      <?php  echo '<span>'.esc_html__('Share:','istiqbal').'</span>'; ?>
      <ul>
        <li>
          <a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" class="facebook" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Facebook', 'istiqbal'); ?>" target="_blank"><i class="ti-facebook"></i></a>
        </li>
        <li>
          <a href="//twitter.com/home?status=<?php print(urlencode($title)); ?>+<?php print(urlencode($page_url)); ?>" class="twitter" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Twitter', 'istiqbal'); ?>" target="_blank"><i class="ti-twitter-alt"></i></a>
        </li>
        <li>
          <a href="//linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="linkedin" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Linkedin', 'istiqbal'); ?>" target="_blank"><i class="ti-linkedin"></i></a>
        </li>
        <li>
          <a href="//pinterest.com/pin/create/button/?url=<?php print(urlencode($page_url)); ?>" class="pinterest" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Pinterest', 'istiqbal'); ?>" target="_blank"><i class="ti-pinterest"></i></a>
        </li>
      </ul>
    </div>
<?php
  }
}


/* Maintenance Mode */
if (!function_exists('istiqbal_maintenance_mode')) {
  function istiqbal_maintenance_mode()
  {
    if (function_exists('cs_get_option')) {
    $maintenance_mode_page = cs_get_option('enable_maintenance_mode');
    $maintenance_mode_page = (int) cs_get_option('maintenance_mode_page');
    global $post;
    
    if ($post !== null && !empty($maintenance_mode_page)) {
      $current_page_id = $post->ID;
      if (($maintenance_mode_page == $current_page_id) && !empty($maintenance_mode_page) && !is_user_logged_in() ) {
        wp_redirect(home_url());
      }
    }

    }
    if (!empty($maintenance_mode_page) && !is_user_logged_in()) {
      get_template_part('theme-layouts/post/content', 'maintenance');
      exit;
    }
  }
  add_action('wp', 'istiqbal_maintenance_mode', 1);
}

/* Yoast Plugin Metabox Low */
if( ! function_exists( 'istiqbal_yoast_metabox' ) ) {
  function istiqbal_yoast_metabox() {
    return 'low';
  }
  add_filter( 'wpseo_metabox_prio', 'istiqbal_yoast_metabox' );
}


/* Compress CSS */
if ( ! function_exists( 'istiqbal_compress_css_lines' ) ) {
  function istiqbal_compress_css_lines( $css ) {
    $css  = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
    $css  = str_replace( ': ', ':', $css );
    $css  = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );
    return $css;
  }
}

// get_cart_product_count

function woo_get_cart_product_count(){
  $count = 0;

  if( WC()->cart ){
    $count = WC()->cart->get_cart_contents_count();
  }

  return $count;
}

/* Maintenance Template  */

function istiqbal_maintenance_template(){
  if (function_exists('cs_get_option')) {
    $maintenance_mode_page = (int) cs_get_option('maintenance_mode_page');
    if( $maintenance_mode_page ){
      if (class_exists("\\Elementor\\Plugin")) {
        $elementor_content = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $maintenance_mode_page );
        if($elementor_content){
          $pluginElementor = \Elementor\Plugin::instance();
          $contentElementor = $pluginElementor->frontend->get_builder_content($maintenance_mode_page);
          echo $contentElementor;
        } else {
          $post_content = get_post_field('post_content', $maintenance_mode_page);
          echo wp_kses_post($post_content);
        }
      } else {
        $post_content = get_post_field('post_content', $maintenance_mode_page);
        echo wp_kses_post($post_content);
      }

    }
  }
}