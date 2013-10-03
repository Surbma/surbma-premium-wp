<?php

/*
Plugin Name: Surbma - Prémium WordPress bővítmények
Plugin URI: http://surbma.hu/wordpress-bovitmenyek/
GitHub Plugin URI: https://github.com/Surbma/surbma-premium-wordpress
Description: Hasznos bővítmények WordPress honlapokhoz.
Version: 1.7.0
Author: Surbma
Author URI: http://surbma.hu/
License: GPL2
*/

$pwp_version = '1.7.0';
define( 'PWP_VERSION_KEY', 'pwp_version' );
define( 'PWP_VERSION_NUM', $pwp_version );

add_option( PWP_VERSION_KEY, PWP_VERSION_NUM );

if ( get_option( PWP_VERSION_KEY ) != $pwp_version ) {
	// Execute your upgrade logic here

	// Then update the version value
	update_option( PWP_VERSION_KEY, $pwp_version );
}

define( 'PWP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'PWP_PLUGIN_URL', plugins_url( '', __FILE__ ) );

/* Include files */
if ( is_admin() ) {
	include_once( PWP_PLUGIN_DIR . '/lib/admin.php' );
}
if ( !is_admin() ) {
	include_once( PWP_PLUGIN_DIR . '/lib/shortcodes.php' );
	include_once( PWP_PLUGIN_DIR . '/lib/frontend.php' );
}
include_once( PWP_PLUGIN_DIR . '/lib/widgets.php' );

