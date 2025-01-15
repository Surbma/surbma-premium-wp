<?php

/*
Plugin Name: Surbma | Premium WP
Plugin URI: https://surbma.com/wordpress-plugins/
Description: Useful extensions for your WordPress website.

Version: 11.0

Author: Surbma
Author URI: https://surbma.com/

License: GPLv2

Text Domain: surbma-premium-wp
Domain Path: /languages/
*/

// Prevent direct access to the plugin
defined( 'ABSPATH' ) || exit;

define( 'SURBMA_PREMIUM_WP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'SURBMA_PREMIUM_WP_PLUGIN_URL', plugins_url( '', __FILE__ ) );

// Localization
add_action( 'init', function() {
	load_plugin_textdomain( 'surbma-premium-wp', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
} );

/* Include files */
if ( is_admin() ) {
	include_once( SURBMA_PREMIUM_WP_PLUGIN_DIR . '/lib/admin.php' );
}
else {
	include_once( SURBMA_PREMIUM_WP_PLUGIN_DIR . '/lib/shortcodes.php' );
	include_once( SURBMA_PREMIUM_WP_PLUGIN_DIR . '/lib/frontend.php' );
}
