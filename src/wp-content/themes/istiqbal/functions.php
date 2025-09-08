<?php
/*
 * Istiqbal Theme's Functions
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

/**
 * Define - Folder Paths
 */

define( 'ISTIQBAL_THEMEROOT_URI', get_template_directory_uri() );
define( 'ISTIQBAL_CSS', ISTIQBAL_THEMEROOT_URI . '/assets/css' );
define( 'ISTIQBAL_IMAGES', ISTIQBAL_THEMEROOT_URI . '/assets/images' );
define( 'ISTIQBAL_SCRIPTS', ISTIQBAL_THEMEROOT_URI . '/assets/js' );
define( 'ISTIQBAL_FRAMEWORK', get_template_directory() . '/includes' );
define( 'ISTIQBAL_LAYOUT', get_template_directory() . '/theme-layouts' );
define( 'ISTIQBAL_CS_IMAGES', ISTIQBAL_THEMEROOT_URI . '/includes/theme-options/framework-extend/images' );
define( 'ISTIQBAL_CS_FRAMEWORK', get_template_directory() . '/includes/theme-options/framework-extend' ); // Called in Icons field *.json
define( 'ISTIQBAL_ADMIN_PATH', get_template_directory() . '/includes/theme-options/cs-framework' ); // Called in Icons field *.json

/**
 * Define - Global Theme Info's
 */
if (is_child_theme()) { // If Child Theme Active
	$istiqbal_theme_child = wp_get_theme();
	$istiqbal_get_parent = $istiqbal_theme_child->Template;
	$istiqbal_theme = wp_get_theme($istiqbal_get_parent);
} else { // Parent Theme Active
	$istiqbal_theme = wp_get_theme();
}
define('ISTIQBAL_NAME', $istiqbal_theme->get( 'Name' ));
define('ISTIQBAL_VERSION', $istiqbal_theme->get( 'Version' ));
define('ISTIQBAL_BRAND_URL', $istiqbal_theme->get( 'AuthorURI' ));
define('ISTIQBAL_BRAND_NAME', $istiqbal_theme->get( 'Author' ));

/**
 * All Main Files Include
 */
require_once( ISTIQBAL_FRAMEWORK . '/init.php' );

/**
 * thumbnail size
 */
add_image_size( 'istiqbal-post-image-one', 415, 450, true );