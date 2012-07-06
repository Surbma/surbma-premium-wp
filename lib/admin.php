<?php

include_once( PWP_PAGES_DIR . '/start-page.php' );
include_once( PWP_PAGES_DIR . '/social-page.php');
include_once( PWP_PAGES_DIR . '/extra-fields-page.php' );
/* include_once( PWP_PAGES_DIR . '/twitter-bootstrap-page.php' ); */
include_once( PWP_PAGES_DIR . '/shortcodes-page.php' );

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
function pwp_admin_print_styles() {
	$handle = 'pwp-admin';
  $StyleUrl = PWP_CSS_URL . '/admin.css';
  $StyleDir = PWP_CSS_DIR . '/admin.css';
  if ( file_exists( $StyleDir ) ) {
  	wp_register_style( $handle, $StyleUrl );
  	wp_enqueue_style( $handle );
	}
}
add_action( 'admin_print_styles', 'pwp_admin_print_styles' );

function pwp_github_plugin_updater_init() {
	include_once('updater.php');
	define( 'WP_GITHUB_FORCE_UPDATE', true );
    $config = array(
    	'slug' => plugin_basename(__FILE__),
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
add_action( 'init', 'pwp_github_plugin_updater_init' );

