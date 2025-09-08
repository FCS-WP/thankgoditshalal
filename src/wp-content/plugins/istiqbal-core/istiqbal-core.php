<?php
/*
Plugin Name: Istiqbal Core
Plugin URI: http://themeforest.net/user/wpoceans
Description: Plugin to contain shortcodes and custom post types of the istiqbal theme.
Author: wpoceans
Author URI: http://themeforest.net/user/wpoceans/portfolio
Version: 1.0.1
Text Domain: istiqbal-core
*/

if( ! function_exists( 'istiqbal_block_direct_access' ) ) {
	function istiqbal_block_direct_access() {
		if( ! defined( 'ABSPATH' ) ) {
			exit( 'Forbidden' );
		}
	}
}

// Plugin URL
define( 'ISTIQBAL_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

// Plugin PATH
define( 'ISTIQBAL_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'ISTIQBAL_PLUGIN_ASTS', ISTIQBAL_PLUGIN_URL . 'assets' );
define( 'ISTIQBAL_PLUGIN_IMGS', ISTIQBAL_PLUGIN_ASTS . '/images' );
define( 'ISTIQBAL_PLUGIN_INC', ISTIQBAL_PLUGIN_PATH . 'include' );

// DIRECTORY SEPARATOR
define ( 'DS' , DIRECTORY_SEPARATOR );

// Istiqbal Elementor Shortcode Path
define( 'ISTIQBAL_EM_SHORTCODE_BASE_PATH', ISTIQBAL_PLUGIN_PATH . 'elementor/' );
define( 'ISTIQBAL_EM_SHORTCODE_PATH', ISTIQBAL_EM_SHORTCODE_BASE_PATH . 'widgets/' );

/**
 * Check if Codestar Framework is Active or Not!
 */
function istiqbal_framework_active() {
  return ( defined( 'CS_VERSION' ) ) ? true : false;
}

/* ISTIQBAL_THEME_NAME_PLUGIN */
define('ISTIQBAL_THEME_NAME_PLUGIN', 'Istiqbal' );

// Initial File
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('istiqbal-core/istiqbal-core.php')) {

	// Custom Post Type
  require_once( ISTIQBAL_PLUGIN_INC . '/custom-post-type.php' );

  if ( is_plugin_active('kingcomposer/kingcomposer.php') ) {

    define( 'ISTIQBAL_KC_SHORTCODE_BASE_PATH', ISTIQBAL_PLUGIN_PATH . 'kc/' );
    define( 'ISTIQBAL_KC_SHORTCODE_PATH', ISTIQBAL_KC_SHORTCODE_BASE_PATH . 'shortcodes/' );
    // Shortcodes
    require_once( ISTIQBAL_KC_SHORTCODE_BASE_PATH . '/kc-setup.php' );
    require_once( ISTIQBAL_KC_SHORTCODE_BASE_PATH . '/library.php' );
  }

  // Theme Custom Shortcode
  require_once( ISTIQBAL_PLUGIN_INC . '/custom-shortcodes/theme-shortcodes.php' );
  require_once( ISTIQBAL_PLUGIN_INC . '/custom-shortcodes/custom-shortcodes.php' );

  // Importer
  require_once( ISTIQBAL_PLUGIN_INC . '/demo/importer.php' );


  if (class_exists('WP_Widget') && is_plugin_active('codestar-framework/cs-framework.php') ) {
    // Widgets

    require_once( ISTIQBAL_PLUGIN_INC . '/widgets/nav-widget.php' );
    require_once( ISTIQBAL_PLUGIN_INC . '/widgets/recent-posts.php' );
    require_once( ISTIQBAL_PLUGIN_INC . '/widgets/recent-case.php' );
    require_once( ISTIQBAL_PLUGIN_INC . '/widgets/text-widget.php' );
    require_once( ISTIQBAL_PLUGIN_INC . '/widgets/widget-extra-fields.php' );

    // Elementor
    if(file_exists( ISTIQBAL_EM_SHORTCODE_BASE_PATH . '/em-setup.php' ) ){
      require_once( ISTIQBAL_EM_SHORTCODE_BASE_PATH . '/em-setup.php' );
      require_once( ISTIQBAL_EM_SHORTCODE_BASE_PATH . 'lib/fields/icons.php' );
      require_once( ISTIQBAL_EM_SHORTCODE_BASE_PATH . 'lib/icons-manager/icons-manager.php' );
    }
  }

  add_action('wp_enqueue_scripts', 'istiqbal_plugin_enqueue_scripts');
  function istiqbal_plugin_enqueue_scripts() {
    wp_enqueue_script('plugin-scripts', ISTIQBAL_PLUGIN_ASTS.'/plugin-scripts.js', array('jquery'), '', true);
  }

}

// Extra functions
require_once( ISTIQBAL_PLUGIN_INC . '/theme-functions.php' );