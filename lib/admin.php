<?php

include_once( SURBMA_PREMIUM_WP_PLUGIN_DIR . '/pages/start-page.php');
include_once( SURBMA_PREMIUM_WP_PLUGIN_DIR . '/pages/google-analytics-page.php' );
include_once( SURBMA_PREMIUM_WP_PLUGIN_DIR . '/pages/google-tag-manager-page.php' );
include_once( SURBMA_PREMIUM_WP_PLUGIN_DIR . '/pages/social-page.php');
include_once( SURBMA_PREMIUM_WP_PLUGIN_DIR . '/pages/extra-fields-page.php' );
include_once( SURBMA_PREMIUM_WP_PLUGIN_DIR . '/pages/shortcodes-page.php' );

/* Admin options menu */
function surbma_premium_wp_add_menus() {
	add_menu_page(
		__( 'Premium WordPress', 'surbma-premium-wp' ),
		__( 'Premium WP', 'surbma-premium-wp' ),
		'read',
		'surbma-premium-wp-menu',
		'surbma_premium_wp_start_page',
		'dashicons-star-filled',
		989374658
	);
	add_submenu_page(
		'surbma-premium-wp-menu',
		__( 'Premium WordPress', 'surbma-premium-wp' ),
		__( 'Premium WP', 'surbma-premium-wp' ),
		'read',
		'surbma-premium-wp-menu',
		'surbma_premium_wp_start_page'
	);
	add_submenu_page(
		'surbma-premium-wp-menu',
		__( 'Google Analytics', 'surbma-premium-wp' ),
		__( 'Google Analytics', 'surbma-premium-wp' ),
		'manage_options',
		'surbma-premium-wp-google-analytics',
		'surbma_premium_wp_google_analytics_page'
	);
	add_submenu_page(
		'surbma-premium-wp-menu',
		__( 'Google Tag Manager', 'surbma-premium-wp' ),
		__( 'Google Tag Manager', 'surbma-premium-wp' ),
		'manage_options',
		'surbma-premium-wp-google-tag-manager',
		'surbma_premium_wp_google_tag_manager_page'
	);
	add_submenu_page(
		'surbma-premium-wp-menu',
		__( 'Social Integration', 'surbma-premium-wp' ),
		__( 'Social Integration', 'surbma-premium-wp' ),
		'manage_options',
		'surbma-premium-wp-social',
		'surbma_premium_wp_social_page'
	);
	add_submenu_page(
		'surbma-premium-wp-menu',
		__( 'Extra Content', 'surbma-premium-wp' ),
		__( 'Extra Content', 'surbma-premium-wp' ),
		'manage_options',
		'surbma-premium-wp-extra-fields',
		'surbma_premium_wp_extra_fields_page'
	);
	add_submenu_page(
		'surbma-premium-wp-menu',
		__( 'Extra Shortcodes', 'surbma-premium-wp' ),
		__( 'Extra Shortcodes', 'surbma-premium-wp' ),
		'publish_posts',
		'surbma-premium-wp-shortcodes',
		'surbma_premium_wp_shortcodes_page'
	);
}
add_action( 'admin_menu', 'surbma_premium_wp_add_menus' );

// Custom styles and scripts for admin pages
function surbma_premium_wp_admin_scripts( $hook ) {
    wp_enqueue_style( 'surbma-premium-wp', plugins_url( '', dirname(__FILE__) ) . '/css/admin.css' );

    if ( $hook == 'toplevel_page_surbma-premium-wp-menu' ||
    $hook == 'premium-wp_page_surbma-premium-wp-google-analytics' ||
    $hook == 'premium-wp_page_surbma-premium-wp-google-tag-manager' ||
    $hook == 'premium-wp_page_surbma-premium-wp-multi-live-chat' ||
    $hook == 'premium-wp_page_surbma-premium-wp-social' ||
    $hook == 'premium-wp_page_surbma-premium-wp-extra-fields' ||
    $hook == 'premium-wp_page_surbma-premium-wp-shortcodes' ||
    $hook == 'premium-wp_page_surbma-wp-control' ) {
    	wp_enqueue_style( 'uikit-css', 'https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.2/css/uikit.gradient.min.css' );
    }
}
add_action( 'admin_enqueue_scripts', 'surbma_premium_wp_admin_scripts' );

function surbma_premium_wp_admin_notices() {
	$options = get_option( 'pwp_google_analytics_fields' );
	if ( $options['trackingid'] == '' ) {
    echo '<div class="error"><p><strong>Figyelem!</strong> A Google Analytics követő kód még nincs megadva. Kattints a <a href="/wp-admin/admin.php?page=pwp-google-analytics">Prémium WP → Google Analytics</a> menüpontra, hogy megadd a követő kódot.</p></div>';
   }
}
/* add_action( 'admin_notices', 'surbma_premium_wp_admin_notices' ); */
