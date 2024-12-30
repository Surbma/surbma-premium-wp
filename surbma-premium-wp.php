<?php

/*
Plugin Name: Surbma | Premium WP
Plugin URI: https://surbma.com/wordpress-plugins/
Description: Useful extensions for your WordPress website.

Version: 10.0

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

function surbma_premium_wp_google_analytics_display() {
	$options = get_option( 'surbma_premium_wp_google_analytics_fields' );
	if ( is_array( $options ) && isset( $options['universalid'] ) && $options['universalid'] ) {
?>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo rawurlencode( $options['universalid'] ); ?>"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', '<?php echo esc_attr( $options['universalid'] ); ?>');
<?php if ( isset( $options['anonymizeip'] ) && $options['anonymizeip'] == '1' ) { ?>
	gtag('set', {'anonymize_ip': true});
<?php } ?>
<?php do_action( 'surbma_premium_wp_gtag_settings' ); ?>
</script>
<?php }
}
add_action( 'wp_head', 'surbma_premium_wp_google_analytics_display', 0 );
add_action( 'admin_head', 'surbma_premium_wp_google_analytics_display', 0 );
add_action( 'login_head', 'surbma_premium_wp_google_analytics_display', 0 );
