<?php

/*
Plugin Name: Prémium WordPress
Plugin URI: http://premiumwp.hu/wordpress-bovitmenyek/
Description: Prémium WordPress bővítmények
Version: 0.5
Author: Surbma
Author URI: http://surbma.hu/
License: GPL2
*/

$pwp_version = '120614';
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

function pwp_github_plugin_updater_init() {

	include_once('updater.php');

	define('WP_GITHUB_FORCE_UPDATE', true);

	if ( is_admin() ) { // note the use of is_admin() to double check that this is happening in the admin

		$config = array(
			'slug' => plugin_basename(__FILE__),
			'proper_folder_name' => 'premiumwp',
			'api_url' => 'https://api.github.com/repos/Surbma/premiumwp',
			'raw_url' => 'https://raw.github.com/Surbma/premiumwp/master',
			'github_url' => 'https://github.com/Surbma/premiumwp.git',
			'zip_url' => 'https://github.com/Surbma/premiumwp/zipball/master',
			'sslverify' => true,
			'requires' => '3.0',
			'tested' => '3.4',
			'readme' => 'readme.txt'
		);

		new WPGitHubUpdater($config);

	}

}
add_action('init', 'pwp_github_plugin_updater_init');

