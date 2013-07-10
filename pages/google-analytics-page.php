<?php

function pwp_google_analytics_page() {
?>
	<div class="pwp wrap">

		<img class="icon" alt="icon" src="<?php echo PWP_PLUGIN_URL . '/images/chart32.png'; ?>" />
  	<h2>Prémium WordPress bővítmény: Google Analytics</h2>

		<?php if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true ) : ?>
			<div class="updated"><p><strong>Beállítások frissítve.</strong></p></div>
		<?php endif; ?>

		<div class="clearline"></div>

	  <div class="section-block">

			<form method="post" action="options.php">
				<?php settings_fields( 'pwp_google_analytics_options' ); ?>
				<?php do_settings_sections( 'pwp-google-analytics' ); ?>

				<p><input name="Submit" type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" /></p>
			</form>

	  </div>

		<div class="clearline"></div>

	  <div class="section-block">

			<h3>Google Analytics súgó</h3>

			<p>Google Analytics beállítása a Prémium WordPress honlapokhoz. A bővítmény használata nagyon egyszerű. Itt csak a követő kódot kell megadni és már kész is. A követő kód csak a nem bejelentkezett felhasználókat méri, a weboldal forráskódjában is csak akkor jelenik meg a kód.</p>

			<ol>
				<li>Ha még nincs Google Analytics fiókod: <a href="http://www.google.hu/analytics" target="_blank">Google Analytics weboldal »</a></li>
				<li>Ha további segítségre van szükséged: <a href="http://support.google.com/analytics/bin/answer.py?hl=hu&answer=1008015&topic=1727146&ctx=topic" target="_blank">Google Analytics súgó »</a></li>
			</ol>

	  </div>

	</div>
<?php
}

function pwp_google_analytics_init() {
	register_setting( 'pwp_google_analytics_options', 'pwp_google_analytics_fields', 'pwp_google_analytics_validate' );
	add_settings_section( 'pwp_google_analytics', 'Google Analytics beállítások', 'pwp_google_analytics_section_text', 'pwp-google-analytics' );
	add_settings_field( 'pwp_google_analytics_trackingid', 'Követő kód', 'pwp_google_analytics_trackingid_string', 'pwp-google-analytics', 'pwp_google_analytics' );
}
add_action( 'admin_init', 'pwp_google_analytics_init', 50 );

function pwp_google_analytics_section_text() {
	echo '<p><strong>FIGYELEM!</strong> Csak az UA kódot kell megadni! Pl.: UA-12345678-90</p>';
}

function pwp_google_analytics_trackingid_string() {
	$options = get_option('pwp_google_analytics_fields');
	echo "<input id='pwp_google_analytics_fields[trackingid]' name='pwp_google_analytics_fields[trackingid]' type='text' value='{$options['trackingid']}' placeholder='UA-XXXXXXXX-YY' maxlength='14' size='14' />";
}

function pwp_google_analytics_validate( $input ) {
	// Our text option must be safe text with no HTML tags
	$input['trackingid'] = wp_filter_nohtml_kses( $input['trackingid'] );
	return $input;
}

