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

if ( !defined( 'WP_CONTENT_URL' ) )
	define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
if ( !defined( 'WP_CONTENT_DIR' ) )
	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if ( !defined( 'WP_PLUGIN_URL' ) )
	define( 'WP_PLUGIN_URL', plugins_url() );
if ( !defined( 'WP_PLUGIN_DIR' ) )
	define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );

define( 'PWP_PLUGIN_NAME', 'premiumwp' );
define( 'PWP_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . PWP_PLUGIN_NAME );
define( 'PWP_PLUGIN_URL', WP_PLUGIN_URL . '/' . PWP_PLUGIN_NAME );
define( 'PWP_LIB_DIR', PWP_PLUGIN_DIR . '/lib' );
define( 'PWP_PAGES_DIR', PWP_PLUGIN_DIR . '/pages' );
define( 'PWP_CSS_URL', PWP_PLUGIN_URL . '/css' );
define( 'PWP_CSS_DIR', PWP_PLUGIN_DIR . '/css' );
define( 'PWP_JS_URL', PWP_PLUGIN_URL . '/js' );
define( 'PWP_JS_DIR', PWP_PLUGIN_DIR . '/js' );
define( 'PWP_IMAGES_URL', PWP_PLUGIN_URL . '/images' );
define( 'PWP_ICON_SMALL', PWP_IMAGES_URL . '/star16.png' );
define( 'PWP_ICON', PWP_IMAGES_URL . '/star32.png' );
define( 'PWP_LOGO', PWP_IMAGES_URL . '/pwp-logo.png' );
define( 'PWP_LOGO_ADMIN', PWP_IMAGES_URL . '/pwp-logo.png' );
define( 'PWP_SOCIAL_ICON', PWP_IMAGES_URL . '/social32.png' );
define( 'PWP_EXTRA_FIELDS_ICON', PWP_IMAGES_URL . '/extrafields32.png' );
define( 'PWP_SHORTCODES_ICON', PWP_IMAGES_URL . '/shortcodes32.png' );

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

