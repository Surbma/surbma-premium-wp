<?php

/*
Plugin Name: Prémium WordPress
Plugin URI: http://premiumwp.hu/wordpress-bovitmenyek/
Description: Prémium WordPress bővítmények
Version: 120925
Author: Surbma
Author URI: http://surbma.hu/
License: GPL2
*/

$pwp_version = '120925';
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
define( 'PWP_ICON_SMALL', PWP_PLUGIN_URL . '/images/star16.png' );
define( 'PWP_ICON', PWP_PLUGIN_URL . '/images/star32.png' );
define( 'PWP_LOGO', PWP_PLUGIN_URL . '/images/pwp-logo.png' );
define( 'PWP_LOGO_ADMIN', PWP_PLUGIN_URL . '/images/pwp-logo.png' );

/* Include files */
if ( is_admin() ) {
	include_once( PWP_PLUGIN_DIR . '/lib/admin.php' );
}
if ( !is_admin() ) {
	include_once( PWP_PLUGIN_DIR . '/lib/shortcodes.php' );
	include_once( PWP_PLUGIN_DIR . '/lib/frontend.php' );
}
include_once( PWP_PLUGIN_DIR . '/lib/widgets.php' );

