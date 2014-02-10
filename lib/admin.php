<?php

include_once( PWP_PLUGIN_DIR . '/pages/start-page.php');
include_once( PWP_PLUGIN_DIR . '/pages/google-analytics-page.php' );
include_once( PWP_PLUGIN_DIR . '/pages/social-page.php');
include_once( PWP_PLUGIN_DIR . '/pages/extra-fields-page.php' );
include_once( PWP_PLUGIN_DIR . '/pages/shortcodes-page.php' );

/* Admin options menu */
function surbma_add_menus() {
	add_menu_page( 'Prémium WordPress', 'Prémium WP', 'edit_posts', 'pwp-plugins', 'pwp_plugins_start_page', PWP_CONTROL_PLUGIN_URL . '/images/star16.png', 3 );
	add_submenu_page( 'pwp-plugins', 'Prémium WordPress', 'Információk', 'edit_posts', 'pwp-plugins', 'pwp_plugins_start_page' );
	add_submenu_page( 'pwp-plugins', 'Google Analytics', 'Google Analytics', 'manage_options', 'pwp-google-analytics', 'pwp_google_analytics_page' );
	add_submenu_page( 'pwp-plugins', 'Közösségi integráció', 'Közösségi integráció', 'manage_options', 'pwp-social', 'pwp_social_page' );
	add_submenu_page( 'pwp-plugins', 'Extra tartalmak megjelenítése', 'Extra tartalmak', 'publish_pages', 'pwp-extra-fields', 'pwp_extra_fields_page' );
	add_submenu_page( 'pwp-plugins', 'Extra rövidkódok', 'Extra rövidkódok', 'publish_posts', 'pwp-shortcodes', 'pwp_shortcodes_page' );
}
add_action( 'admin_menu', 'surbma_add_menus' );

function pwp_admin_notices() {
	$options = get_option( 'pwp_google_analytics_fields' );
	if ( $options['trackingid'] == '' ) {
    echo '<div class="error"><p><strong>Figyelem!</strong> A Google Analytics követő kód még nincs megadva. Kattints a <a href="/wp-admin/admin.php?page=pwp-google-analytics">Prémium WP → Google Analytics</a> menüpontra, hogy megadd a követő kódot.</p></div>';
   }
}
/* add_action( 'admin_notices', 'pwp_admin_notices' ); */

