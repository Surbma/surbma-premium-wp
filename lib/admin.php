<?php

include_once( SURBMA_PREMIUM_WP_PLUGIN_DIR . '/pages/start-page.php');
include_once( SURBMA_PREMIUM_WP_PLUGIN_DIR . '/pages/google-analytics-page.php' );
include_once( SURBMA_PREMIUM_WP_PLUGIN_DIR . '/pages/google-tag-manager-page.php' );
include_once( SURBMA_PREMIUM_WP_PLUGIN_DIR . '/pages/social-page.php');
include_once( SURBMA_PREMIUM_WP_PLUGIN_DIR . '/pages/extra-fields-page.php' );
include_once( SURBMA_PREMIUM_WP_PLUGIN_DIR . '/pages/shortcodes-page.php' );

/* Admin options menu */
add_action( 'admin_menu', function() {
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
} );

// Custom styles and scripts for admin pages
add_action( 'admin_enqueue_scripts', function( $hook ) {
	$valid_hooks = array(
		'toplevel_page_surbma-premium-wp-menu',
		'premium-wp_page_surbma-premium-wp-google-analytics',
		'premium-wp_page_surbma-premium-wp-google-tag-manager',
		'premium-wp_page_surbma-premium-wp-multi-live-chat',
		'premium-wp_page_surbma-premium-wp-social',
		'premium-wp_page_surbma-premium-wp-extra-fields',
		'premium-wp_page_surbma-premium-wp-shortcodes',
		'premium-wp_page_surbma-wp-control'
	);

	if ( in_array( $hook, $valid_hooks ) ) {
		wp_enqueue_style( 'surbma-premium-wp', plugins_url( '', dirname(__FILE__) ) . '/css/admin.css', array(), '20190705' );
		wp_enqueue_style( 'uikit-css', plugins_url( '', dirname(__FILE__) ) . '/css/uikit.min.css', array(), '20241122' );
	}
} );

add_action( 'admin_notices', function() {
	$options = get_option( 'surbma_premium_wp_google_analytics_fields' );
	$universalidValue = isset( $options['universalid'] ) ? $options['universalid'] : '';
	$trackingidValue = isset( $options['trackingid'] ) ? $options['trackingid'] : '';
	if ( $universalidValue == '' && $trackingidValue != '' ) {
		echo '<div class="error notice"><p><strong>FIGYELEM, FRISSÍTÉS SZÜKSÉGES! Régi Google Analytics követő kód van csak megadva. Hamarosan a régi követő kód támogatása megszűnik.</strong></p><p>A Google Analytics további használatához frissíteni kell a beállításokat a <a href="/wp-admin/admin.php?page=surbma-premium-wp-google-analytics"><strong>Prémium WP -> Google Analytics</strong></a> menüpont alatt. Mentés után a régi követő kód törölve lesz és az új követő kód lesz használatban! Más teendő nincs ezzel, a kód frissítéséhez csak menteni kell a beállításokat.</p><p>Jelenleg bekötött Google Analytics tulajdon: <strong>' . wp_kses_data( $trackingidValue ) . '</strong></p></div>';
	}
} );
