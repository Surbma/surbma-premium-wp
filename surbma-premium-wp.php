<?php

/*
Plugin Name: Surbma | Premium WordPress
Plugin URI: https://surbma.com/wordpress-plugins/
Description: Useful extensions for your WordPress website.

Version: 4.0

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
function surbma_premium_wp_init() {
	load_plugin_textdomain( 'surbma-premium-wp', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'surbma_premium_wp_init' );

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
	if ( isset( $options['universalid'] ) && $options['universalid'] != '' ) {
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $options['universalid']; ?>"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', '<?php echo $options['universalid']; ?>');
<?php if ( isset( $options['anonymizeip'] ) && $options['anonymizeip'] == '1' ) { ?>
	gtag('set', {'anonymize_ip': true});
<?php } ?>
<?php do_action( 'surbma_premium_wp_gtag_settings' ); ?>
</script>
<?php } ?>
<?php if ( isset( $options['trackingid'] ) && $options['trackingid'] != '' && $options['universalid'] == '' ) { ?>
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', '<?php echo $options['trackingid']; ?>']);
<?php do_action( 'surbma_premium_wp_google_analytics_before_trackpageview' ); ?>
	_gaq.push(['_trackPageview']);
<?php do_action( 'surbma_premium_wp_google_analytics_after_trackpageview' ); ?>

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
<?php }
}
add_action( 'wp_head', 'surbma_premium_wp_google_analytics_display', 999 );
add_action( 'admin_head', 'surbma_premium_wp_google_analytics_display', 999 );
add_action( 'login_head', 'surbma_premium_wp_google_analytics_display', 999 );
