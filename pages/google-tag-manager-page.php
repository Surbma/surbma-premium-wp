<?php

function surbma_premium_wp_google_tag_manager_page() {
	if ( !isset( $_GET['settings-updated'] ) )
		$_GET['settings-updated'] = false;
?>
<div class="wrap">
	<div class="premium-wp uk-width-5-6@m">
		<h1 class="dashicons-before dashicons-tag"><?php esc_html_e( 'Premium WP', 'surbma-premium-wp' ); ?>: <?php esc_html_e( 'Google Tag Manager', 'surbma-premium-wp' ); ?></h1>

		<?php if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true ) : ?>
			<div class="updated notice is-dismissible"><p><strong><?php esc_html_e( 'Settings saved.', 'surbma-premium-wp' ); ?></strong></p></div>
		<?php endif; ?>

		<div class="uk-card uk-card-default uk-card-hover uk-card-body uk-margin-top">
			<h3 class="uk-card-title"><?php esc_html_e( 'Google Tag Manager Settings', 'surbma-premium-wp' ); ?></h3>
			<form method="post" action="options.php">
				<?php settings_fields( 'surbma_premium_wp_google_tag_manager_options' ); ?>
				<?php do_settings_sections( 'surbma-premium-wp-google-tag-manager' ); ?>

				<p><input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'surbma-premium-wp' ); ?>" /></p>
			</form>
		</div>

		<div class="uk-card uk-card-default uk-card-hover uk-card-body uk-margin-top">
			<h3 class="uk-card-title">Google Címkekezelő súgó</h3>
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

add_action( 'admin_init', function() {
	register_setting( 'surbma_premium_wp_google_tag_manager_options', 'surbma_premium_wp_google_tag_manager_fields', 'surbma_premium_wp_google_tag_manager_validate' );
	add_settings_section( 'surbma_premium_wp_google_tag_manager', null, null, 'surbma-premium-wp-google-tag-manager' );
	add_settings_field( 'surbma_premium_wp_google_tag_manager_id', 'Tároló azonosító', 'surbma_premium_wp_google_tag_manager_id_string', 'surbma-premium-wp-google-tag-manager', 'surbma_premium_wp_google_tag_manager' );
}, 50 );

function surbma_premium_wp_google_tag_manager_id_string() {
	$options = get_option('surbma_premium_wp_google_tag_manager_fields');
	$containerid = is_array( $options ) && isset( $options['containerid'] ) && $options['containerid'] ? $options['containerid'] : '';
	echo '<input id="surbma_premium_wp_google_tag_manager_fields[containerid]" name="surbma_premium_wp_google_tag_manager_fields[containerid]" type="text" value="' . esc_attr( $containerid ) . '" placeholder="GTM-X0XX0X" maxlength="14" />';
	echo '<p><em>Csak a tároló azonosítóját kell megadni! Pl.: GTM-A0BC0D<em></p>';
}

function surbma_premium_wp_google_tag_manager_validate( $input ) {
	// Our text option must be safe text with no HTML tags
	$input['containerid'] = wp_filter_nohtml_kses( $input['containerid'] );
	return $input;
}
