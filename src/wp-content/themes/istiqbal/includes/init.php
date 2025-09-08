<?php
/*
 * All Istiqbal Theme Related Functions Files are Linked here
 * Author & Copyright:wpoceans
 * URL: http://themeforest.net/user/wpoceans
 */

/* Theme All Istiqbal Setup */
require_once( ISTIQBAL_FRAMEWORK . '/theme-support.php' );
require_once( ISTIQBAL_FRAMEWORK . '/backend-functions.php' );
require_once( ISTIQBAL_FRAMEWORK . '/frontend-functions.php' );
require_once( ISTIQBAL_FRAMEWORK . '/enqueue-files.php' );
require_once( ISTIQBAL_CS_FRAMEWORK . '/custom-style.php' );
require_once( ISTIQBAL_CS_FRAMEWORK . '/config.php' );

/* Install Plugins */
require_once( ISTIQBAL_FRAMEWORK . '/theme-options/plugins/activation.php' );

/* Breadcrumbs */
require_once( ISTIQBAL_FRAMEWORK . '/theme-options/plugins/breadcrumb-trail.php' );

/* Aqua Resizer */
require_once( ISTIQBAL_FRAMEWORK . '/theme-options/plugins/aq_resizer.php' );

/* Bootstrap Menu Walker */
require_once( ISTIQBAL_FRAMEWORK . '/core/wp_bootstrap_navwalker.php' );

/* Sidebars */
require_once( ISTIQBAL_FRAMEWORK . '/core/sidebars.php' );

if ( class_exists( 'WooCommerce' ) ) :
	require_once( ISTIQBAL_FRAMEWORK . '/woocommerce-extend.php' );
endif;