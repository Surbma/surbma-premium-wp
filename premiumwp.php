<?php

/*
Plugin Name: Prémium WordPress
Plugin URI: http://premiumwp.hu/wordpress-bovitmenyek/
Description: Prémium WordPress bővítmények
Version: 120707
Author: Surbma
Author URI: http://surbma.hu/
License: GPL2
*/

$pwp_version = '120707';
define( 'PWP_VERSION_KEY', 'pwp_version' );
define( 'PWP_VERSION_NUM', $pwp_version );

add_option( PWP_VERSION_KEY, PWP_VERSION_NUM );

if ( get_option( PWP_VERSION_KEY ) != $pwp_version ) {
	// Execute your upgrade logic here

	// Then update the version value
	update_option( PWP_VERSION_KEY, $pwp_version );
}

define( 'PWP_PLUGIN_NAME', 'premiumwp' );
define( 'PWP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'PWP_PLUGIN_URL', plugins_url( '', __FILE__ ) );
define( 'PWP_LIB_DIR', PWP_PLUGIN_DIR . '/lib' );
define( 'PWP_PAGES_DIR', PWP_PLUGIN_DIR . '/pages' );
define( 'PWP_JS_URL', PWP_PLUGIN_URL . '/js' );
define( 'PWP_JS_DIR', PWP_PLUGIN_DIR . '/js' );
define( 'PWP_ICON_SMALL', PWP_PLUGIN_URL . '/images/star16.png' );
define( 'PWP_ICON', PWP_PLUGIN_URL . '/images/star32.png' );
define( 'PWP_LOGO', PWP_PLUGIN_URL . '/images/pwp-logo.png' );
define( 'PWP_LOGO_ADMIN', PWP_PLUGIN_URL . '/images/pwp-logo.png' );

/* Include files */
if ( is_admin() ) {
	include_once( PWP_LIB_DIR . '/admin.php' );
}
if ( !is_admin() ) {
	include_once( PWP_LIB_DIR . '/shortcodes.php' );
	include_once( PWP_LIB_DIR . '/frontend.php' );
}
include_once( PWP_LIB_DIR . '/config.php' );
include_once( PWP_LIB_DIR . '/widgets.php' );

