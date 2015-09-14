<?php

function surbma_premium_wp_google_analytics_page() {
?>
	<div class="wrap premium-wp uk-grid">
		<div class="uk-width-9-10">
			<h2 class="dashicons-before dashicons-chart-bar"><?php _e( 'Premium WP', 'surbma-premium-wp' ); ?>: <?php _e( 'Google Analytics', 'surbma-premium-wp' ); ?></h2>

			<?php if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true ) { ?>
				<div class="updated notice is-dismissible"><p><strong><?php _e( 'Settings saved.' ); ?></strong></p></div>
			<?php } ?>

			<div class="uk-panel uk-panel-box">
				<h3 class="uk-panel-title"><?php _e( 'Google Analytics Settings', 'surbma-premium-wp' ); ?></h3>
				<p><strong>FIGYELEM!</strong> Csak az UA kódot kell megadni! Pl.: UA-12345678-90</p>
				<form method="post" action="options.php">
					<?php settings_fields( 'surbma_premium_wp_google_analytics_options' ); ?>
					<?php do_settings_sections( 'surbma-premium-wp-google-analytics' ); ?>

					<p><input name="Submit" type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" /></p>
				</form>
			</div>

			<div class="uk-panel uk-panel-box">
				<h3 class="uk-panel-title">Google Analytics súgó</h3>
				<p>Google Analytics beállítása a Prémium WordPress honlapokhoz. A bővítmény használata nagyon egyszerű. Itt csak a követő kódot kell megadni és már kész is. A követő kód csak a nem bejelentkezett felhasználókat méri, a weboldal forráskódjában is csak akkor jelenik meg a kód.</p>
				<ol>
					<li>Ha még nincs Google Analytics fiókod: <a href="http://www.google.hu/analytics" target="_blank">Google Analytics weboldal →</a></li>
					<li>Ha további segítségre van szükséged: <a href="http://support.google.com/analytics/bin/answer.py?hl=hu&answer=1008015&topic=1727146&ctx=topic" target="_blank">Google Analytics súgó →</a></li>
					<li>A Universal Analytics bemutatása: <a href='https://support.google.com/analytics/answer/2790010?hl=hu&ref_topic=2790009' target='_blank'>Universal Analytics →</a></li>
				</ol>
			</div>
		</div>
	</div>
<?php
}

function surbma_premium_wp_google_analytics_init() {
	register_setting(
		'surbma_premium_wp_google_analytics_options',
		'surbma_premium_wp_google_analytics_fields',
		'surbma_premium_wp_google_analytics_validate'
	);
	add_settings_section(
		'surbma_premium_wp_google_analytics',
		null,
		null,
		'surbma-premium-wp-google-analytics'
	);
	add_settings_field(
		'surbma_premium_wp_google_analytics_trackingid',
		'Hagyományos Analytics kód',
		'surbma_premium_wp_google_analytics_trackingid_string',
		'surbma-premium-wp-google-analytics',
		'surbma_premium_wp_google_analytics'
	);
	add_settings_field(
		'surbma_premium_wp_google_universal_analytics',
		'Universal Analytics kód',
		'surbma_premium_wp_google_universal_analytics_string',
		'surbma-premium-wp-google-analytics',
		'surbma_premium_wp_google_analytics'
	);
	add_settings_field(
		'surbma_premium_wp_google_universal_analytics_displayfeatures',
		'Vizuális hirdetési szolgáltatások',
		'surbma_premium_wp_google_universal_analytics_displayfeatures_string',
		'surbma-premium-wp-google-analytics',
		'surbma_premium_wp_google_analytics'
	);
}
add_action( 'admin_init', 'surbma_premium_wp_google_analytics_init', 50 );

function surbma_premium_wp_google_analytics_trackingid_string() {
	$options = get_option('surbma_premium_wp_google_analytics_fields');
	echo "<input id='surbma_premium_wp_google_analytics_fields[trackingid]' name='surbma_premium_wp_google_analytics_fields[trackingid]' type='text' value='{$options['trackingid']}' placeholder='UA-XXXXXXXX-YY' maxlength='14' size='14' />";
}

function surbma_premium_wp_google_universal_analytics_string() {
	$options = get_option('surbma_premium_wp_google_analytics_fields');
	echo "<input id='surbma_premium_wp_google_analytics_fields[universalid]' name='surbma_premium_wp_google_analytics_fields[universalid]' type='text' value='{$options['universalid']}' placeholder='UA-XXXXXXXX-YY' maxlength='14' size='14' />";
}

function surbma_premium_wp_google_universal_analytics_displayfeatures_string() {
	$options = get_option('surbma_premium_wp_google_analytics_fields');
	$html = '<input type="checkbox" id="surbma_premium_wp_google_analytics_fields[displayfeatures]" name="surbma_premium_wp_google_analytics_fields[displayfeatures]" value="1"' . checked( 1, $options['displayfeatures'], false ) . '/>';
    $html .= '<label class="description" for="surbma_premium_wp_google_analytics_fields[displayfeatures]">Vizuális hirdetési szolgáltatások engedélyezése (CSAK Universal Analytics esetén)</label>';
    $html .= '<p><em>FONTOS: <a href="https://support.google.com/analytics/answer/2700409" target="_blank">A vizuális hirdetésekre vonatkozó irányelvi előírások →</a></em></p>';
    echo $html;
}

function surbma_premium_wp_google_analytics_validate( $input ) {
	// Our text option must be safe text with no HTML tags
	$input['trackingid'] = wp_filter_nohtml_kses( $input['trackingid'] );
	$input['universalid'] = wp_filter_nohtml_kses( $input['universalid'] );
	return $input;
}
