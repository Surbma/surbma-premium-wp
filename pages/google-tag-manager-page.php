<?php

function surbma_premium_wp_google_tag_manager_page() {
	if ( !isset( $_GET['settings-updated'] ) )
		$_GET['settings-updated'] = false;
?>
<div class="premium-wp uk-grid uk-margin-top">
	<div class="wrap uk-width-9-10">
		<h1 class="dashicons-before dashicons-tag"><?php _e( 'Premium WP', 'surbma-premium-wp' ); ?>: <?php _e( 'Google Tag Manager', 'surbma-premium-wp' ); ?></h1>

		<?php if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true ) : ?>
			<div class="updated notice is-dismissible"><p><strong><?php _e( 'Settings saved.' ); ?></strong></p></div>
		<?php endif; ?>

		<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
			<h3 class="uk-panel-title"><?php _e( 'Google Tag Manager Settings', 'surbma-premium-wp' ); ?></h3>
			<p><strong>FIGYELEM!</strong> Csak a tároló azonosítóját kell megadni! Pl.: GTM-A0BC0D</p>
			<p><strong>FONTOS!</strong> A Google Analytics kódot mindenképpen a Címkekezelőtől függetlenül kell kezelni, amit itt lehet beállítani: <a href="/wp-admin/admin.php?page=pwp-google-analytics">Prémium WP → Google Analytics</a></p>
			<form method="post" action="options.php">
				<?php settings_fields( 'surbma_premium_wp_google_tag_manager_options' ); ?>
				<?php do_settings_sections( 'surbma-premium-wp-google-tag-manager' ); ?>

				<p><input name="Submit" type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" /></p>
			</form>
		</div>

		<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
			<h3 class="uk-panel-title">Google Címkekezelő súgó</h3>
			<p>Google Címkekezelő beállítása a Prémium WordPress honlapokhoz. A bővítmény használata nagyon egyszerű. Itt csak a tároló azonosítóját kell megadni és már kész is a beállítás.</p>
			<ol>
				<li>Ha még nincs Google Címkekezelő fiókod: <a href="//www.google.com/analytics/tag-manager/" target="_blank">Google Címkekezelő weboldal →</a></li>
				<li>Ha további segítségre van szükséged: <a href="//support.google.com/tagmanager" target="_blank">Google Címkekezelő súgó →</a></li>
			</ol>
		</div>
	</div>
</div>
<?php
}

function surbma_premium_wp_google_tag_manager_init() {
	register_setting(
		'surbma_premium_wp_google_tag_manager_options',
		'surbma_premium_wp_google_tag_manager_fields',
		'surbma_premium_wp_google_tag_manager_validate'
	);
	add_settings_section(
		'surbma_premium_wp_google_tag_manager',
		null,
		null,
		'surbma-premium-wp-google-tag-manager'
	);
	add_settings_field(
		'surbma_premium_wp_google_tag_manager_id',
		'Tároló azonosító',
		'surbma_premium_wp_google_tag_manager_id_string',
		'surbma-premium-wp-google-tag-manager',
		'surbma_premium_wp_google_tag_manager'
	);
}
add_action( 'admin_init', 'surbma_premium_wp_google_tag_manager_init', 50 );

function surbma_premium_wp_google_tag_manager_id_string() {
	$options = get_option('surbma_premium_wp_google_tag_manager_fields');
	echo "<input id='surbma_premium_wp_google_tag_manager_fields[containerid]' name='surbma_premium_wp_google_tag_manager_fields[containerid]' type='text' value='{$options['containerid']}' placeholder='GTM-X0XX0X' maxlength='14' size='14' />";
}

function surbma_premium_wp_google_tag_manager_validate( $input ) {
	// Our text option must be safe text with no HTML tags
	$input['containerid'] = wp_filter_nohtml_kses( $input['containerid'] );
	return $input;
}
