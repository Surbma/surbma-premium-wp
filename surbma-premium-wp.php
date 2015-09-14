<?php

/*
Plugin Name: Surbma - Prémium WordPress bővítmények
Plugin URI: http://surbma.hu/wordpress-bovitmenyek/
Description: Hasznos bővítmények WordPress honlapokhoz.
Version: 2.0.0
Author: Surbma
Author URI: http://surbma.hu/
License: GPL2
*/

// Prevent direct access to the plugin
if ( !defined( 'ABSPATH' ) ) {
	die( 'Good try! :)' );
}

define( 'SURBMA_PREMIUM_WP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'SURBMA_PREMIUM_WP_PLUGIN_URL', plugins_url( '', __FILE__ ) );

/* Include files */
if ( is_admin() ) {
	include_once( SURBMA_PREMIUM_WP_PLUGIN_DIR . '/lib/admin.php' );
}
else {
	include_once( SURBMA_PREMIUM_WP_PLUGIN_DIR . '/lib/shortcodes.php' );
	include_once( SURBMA_PREMIUM_WP_PLUGIN_DIR . '/lib/frontend.php' );
}
// include_once( SURBMA_PREMIUM_WP_PLUGIN_DIR . '/lib/widgets.php' );

function surbma_premium_wp_activated() {
	$newextrafields = get_option( 'surbma_premium_wp_extra_fields' );
	$oldextrafields = get_option( 'pwp_extra_fields' );
	if ( $newextrafields == false && $oldextrafields != false ) {
		update_option( 'surbma_premium_wp_extra_fields', $oldextrafields );
	}

	$newgoogleanalytics = get_option( 'surbma_premium_wp_google_analytics_fields' );
	$oldgoogleanalytics = get_option( 'pwp_google_analytics_fields' );
	if ( $newgoogleanalytics == false && $oldgoogleanalytics != false ) {
		update_option( 'surbma_premium_wp_google_analytics_fields', $oldgoogleanalytics );
	}

	$newgoogletagmanager = get_option( 'surbma_premium_wp_google_tag_manager_fields' );
	$oldgoogletagmanager = get_option( 'pwp_google_tag_manager_fields' );
	if ( $newgoogletagmanager == false && $oldgoogletagmanager != false ) {
		update_option( 'surbma_premium_wp_google_tag_manager_fields', $oldgoogletagmanager );
	}

	$newsocialfields = get_option( 'surbma_premium_wp_social_fields' );
	$oldsocialfields = get_option( 'pwp_social_fields' );
	if ( $newsocialfields == false && $oldsocialfields != false ) {
		update_option( 'surbma_premium_wp_social_fields', $oldsocialfields );
	}
}
register_activation_hook( __FILE__, 'surbma_premium_wp_activated' );

function surbma_premium_wp_google_analytics_display() {
	$options = get_option( 'surbma_premium_wp_google_analytics_fields' );
	if ( isset( $options['universalid'] ) && $options['universalid'] != '' ) {
?>
<script type="text/javascript">
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', '<?php echo $options['universalid']; ?>', 'auto');
<?php if ( isset( $options['displayfeatures'] ) && $options['displayfeatures'] == '1' ) { ?>
	ga('require', 'displayfeatures');
<?php }
	do_action( 'surbma_premium_wp_universal_analytics_objects' ); ?>
</script>
<?php }
	if ( isset( $options['trackingid'] ) && $options['trackingid'] != '' ) {
?><script type="text/javascript">
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

function surbma_premium_wp_add_universal_analytics_pageview() {
?>
	ga('send', 'pageview');
<?php
}
add_action( 'surbma_premium_wp_universal_analytics_objects', 'surbma_premium_wp_add_universal_analytics_pageview', 20 );
