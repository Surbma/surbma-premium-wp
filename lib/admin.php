<?php

include_once( PWP_PLUGIN_DIR . '/pages/start-page.php' );
include_once( PWP_PLUGIN_DIR . '/pages/social-page.php');
include_once( PWP_PLUGIN_DIR . '/pages/extra-fields-page.php' );
/* include_once( PWP_PLUGIN_DIR . '/pages/twitter-bootstrap-page.php' ); */
include_once( PWP_PLUGIN_DIR . '/pages/shortcodes-page.php' );

/* Admin options menu */
function pwp_add_menus() {
	$page_title = 'Prémium WordPress bővítmények';
	$menu_title = 'Prémium WordPress';
	$cap_normal = 'publish_posts';
	$cap_options = 'manage_options';
	$menu_slug = 'pwp';
	$function = 'pwp_start_page';

	add_menu_page( $page_title, $menu_title, $cap_options, $menu_slug, $function, PWP_ICON_SMALL );
	add_submenu_page( $menu_slug, $page_title, 'Bővítmény bemutatása', $cap_options, $menu_slug, $function );
	add_submenu_page( $menu_slug, 'Közösségi integráció', 'Közösségi integráció', $cap_options, 'pwp-social', 'pwp_social_page' );
	add_submenu_page( $menu_slug, 'Extra tartalmak megjelenítése', 'Extra tartalmak', $cap_options, 'pwp-extra-fields', 'pwp_extra_fields_page' );
/* 	add_submenu_page( $menu_slug, 'Twitter Bootstrap', 'Twitter Bootstrap', $cap_options, 'pwp-twitter-bootstrap', 'pwp_twitter_bootstrap_page' ); */
	add_submenu_page( $menu_slug, 'Extra rövidkódok', 'Extra rövidkódok', $cap_normal, 'pwp-shortcodes', 'pwp_shortcodes_page' );
}
add_action( 'admin_menu', 'pwp_add_menus', 99 );

/* Custom style for admin */
function pwp_add_admin_styles() {
?>
	<style type="text/css">
		/* Options page */
		.clearline {border-bottom: 2px solid #fff;border-top: 1px solid #e6e6e6;clear: both;margin: 10px 0;}
		.section-block {background: #f6f6f6;padding: 20px;border: 1px solid #e6e6e6;-webkit-border-radius: 6px;-moz-border-radius: 6px;border-radius: 6px;}
		.section-block h3 {margin: 0 0 20px;}
		.icon {float: left;margin: 7px 7px 0 0;}
	</style>
<?php
}
add_action( 'admin_head', 'pwp_add_admin_styles' );

function pwp_github_plugin_updater_init() {
	include_once('updater.php');
	define( 'WP_GITHUB_FORCE_UPDATE', true );
    $config = array(
    	'slug' => plugin_basename( __FILE__ ),
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
	new WPGitHubUpdater( $config );
}
/* add_action( 'init', 'pwp_github_plugin_updater_init' ); */

