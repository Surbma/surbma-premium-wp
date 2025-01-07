<?php

function surbma_premium_wp_google_analytics_page() {
	if ( !isset( $_GET['settings-updated'] ) ) {
		$_GET['settings-updated'] = false;
	}
?>
<div class="wrap">
	<h1 class="dashicons-before dashicons-chart-bar"><?php esc_html_e( 'Premium WP', 'surbma-premium-wp' ); ?>: <?php esc_html_e( 'Google Analytics', 'surbma-premium-wp' ); ?></h1>
	<div class="premium-wp uk-width-2-3@m">
		<?php if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true ) { ?>
			<div class="updated notice is-dismissible"><p><strong><?php esc_html_e( 'Settings saved.', 'surbma-premium-wp' ); ?></strong></p></div>
		<?php } ?>

		<div class="uk-card uk-card-default uk-card-hover uk-margin-top">
			<div class="uk-card-header">
				<h3 class="uk-card-title"><?php esc_html_e( 'Google Analytics Settings', 'surbma-premium-wp' ); ?></h3>
			</div>

			<div class="uk-card-body">
				<form method="post" action="options.php">
					<?php settings_fields( 'surbma_premium_wp_google_analytics_options' ); ?>
					<?php do_settings_sections( 'surbma-premium-wp-google-analytics' ); ?>
				</form>
			</div>

			<div class="uk-card-footer uk-text-right">
				<input type="submit" class="uk-button uk-button-primary uk-button-large" value="<?php esc_attr_e( 'Save Changes', 'surbma-premium-wp' ); ?>" />
			</div>
		</div>

		<div class="uk-card uk-card-default uk-card-hover uk-margin-top">
			<div class="uk-card-header">
				<h3 class="uk-card-title">Google Analytics súgó</h3>
			</div>

			<div class="uk-card-body">
				<p>Google Analytics beállítása a Prémium WordPress honlapokhoz. A bővítmény használata nagyon egyszerű. Itt csak a követő kódot kell megadni és már kész is a beállítás.</p>
				<ol>
					<li>Ha még nincs Google Analytics fiókod: <a href="//www.google.hu/analytics" target="_blank">Google Analytics weboldal →</a></li>
					<li>Ha további segítségre van szükséged: <a href="//support.google.com/analytics/bin/answer.py?hl=hu&answer=1008015&topic=1727146&ctx=topic" target="_blank">Google Analytics súgó →</a></li>
				</ol>
			</div>
		</div>
	</div>
</div>
<?php
}

add_action( 'admin_init', function() {
	register_setting( 'surbma_premium_wp_google_analytics_options', 'surbma_premium_wp_google_analytics_fields', 'surbma_premium_wp_google_analytics_validate' );
	add_settings_section( 'surbma_premium_wp_google_analytics', null, null, 'surbma-premium-wp-google-analytics' );
	add_settings_field( 'surbma_premium_wp_google_universal_analytics', 'Analytics kód', 'surbma_premium_wp_google_universal_analytics_string', 'surbma-premium-wp-google-analytics', 'surbma_premium_wp_google_analytics' );
	add_settings_field( 'surbma_premium_wp_google_analytics_options', 'További opciók', 'surbma_premium_wp_google_analytics_options_string', 'surbma-premium-wp-google-analytics', 'surbma_premium_wp_google_analytics' );
}, 50 );

function surbma_premium_wp_google_universal_analytics_string() {
	$options = get_option( 'surbma_premium_wp_google_analytics_fields' );
	$google_analytics_code = is_array( $options ) && isset( $options['universalid'] ) && $options['universalid'] ? $options['universalid'] : '';
	echo '<input id="surbma_premium_wp_google_analytics_fields[universalid]" name="surbma_premium_wp_google_analytics_fields[universalid]" type="text" value="' . esc_attr( $google_analytics_code ) . '" placeholder="G-A0B0C0D0E0" maxlength="14" size="18" />';
	echo '<p><em>Csak a mérési azonosítót kell megadni! Pl.: G-A0B0C0D0E0<em></p>';
}

function surbma_premium_wp_google_analytics_options_string() {
	$options = get_option( 'surbma_premium_wp_google_analytics_fields' );
	$google_analytics_anonymizeip = is_array( $options ) && isset( $options['anonymizeip'] ) && $options['anonymizeip'] ? $options['anonymizeip'] : 0;
	echo '<input type="checkbox" id="surbma_premium_wp_google_analytics_fields[anonymizeip]" name="surbma_premium_wp_google_analytics_fields[anonymizeip]" value="1"' . checked( 1, $google_analytics_anonymizeip, false ) . '/>';
    echo '<label class="description" for="surbma_premium_wp_google_analytics_fields[anonymizeip]">IP-névtelenítés (IP Anonymization) engedélyezése</label>';
    echo '<p><em><a href="https://support.google.com/analytics/answer/2763052?hl=hu" target="_blank">IP-névtelenítés az Analytics rendszerben →</a></em></p>';
}

function surbma_premium_wp_google_analytics_validate( $input ) {
	// Our text option must be safe text with no HTML tags
	$input['universalid'] = wp_filter_nohtml_kses( $input['universalid'] );
	return $input;
}
