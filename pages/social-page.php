<?php

function surbma_premium_wp_social_fields_init() {
	register_setting(
		'surbma_premium_wp_social_options',
		'surbma_premium_wp_social_fields',
		'surbma_premium_wp_social_fields_validate'
	);
}
add_action( 'admin_init', 'surbma_premium_wp_social_fields_init' );

/**
 * Create arrays for our select and radio options
 */
$sharebuttonsplace_options = array(
	'before' => array(
		'value' => 'before',
		'label' => __( 'Bejegyzés szövege előtt' )
	),
	'after' => array(
		'value' => 'after',
		'label' => __( 'Bejegyzés szövege után' )
	)
);

function surbma_premium_wp_social_page() {

	global $sharebuttonsplace_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap premium-wp uk-grid">
		<div class="uk-width-9-10">
			<h2 class="dashicons-before dashicons-share"><?php _e( 'Premium WP', 'surbma-premium-wp' ); ?>: Közösségi oldalak integrálása</h2>
			<p>Az oldalon bármelyik "Módosítások mentése" gombra lehet kattintani, az az összes módosítást menti.</p>

			<?php if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true ) { ?>
				<div class="updated notice is-dismissible"><p><strong><?php _e( 'Settings saved.' ); ?></strong></p></div>
			<?php } ?>

			<form method="post" action="options.php">
				<?php settings_fields( 'surbma_premium_wp_social_options' ); ?>
				<?php $options = get_option( 'surbma_premium_wp_social_fields' ); ?>

				<div class="uk-panel uk-panel-box">
					<h3 class="uk-panel-title">Közösségi oldalak adatai</h3>

					<table class="form-table">
						<tr valign="top">
							<th scope="row">
								<label class="description" for="surbma_premium_wp_social_fields[fbpageurl]">Facebook oldal url címe</label>
							</th>
							<td>
								<input id="surbma_premium_wp_social_fields[fbpageurl]" class="regular-text" type="text" name="surbma_premium_wp_social_fields[fbpageurl]" value="<?php esc_attr_e( $options['fbpageurl'] ); ?>" />
								<p>Ahhoz, hogy megjelenjen a Facebook like doboz widget, mindenképpen meg kell adnod előbb a Facebook oldalad url címét.</p>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row">
								<label class="description" for="surbma_premium_wp_social_fields[plusone_id]">Google+ oldal azonosítója</label>
							</th>
							<td>
								https://plus.google.com/<input id="surbma_premium_wp_social_fields[plusone_id]" class="regular-text" type="text" name="surbma_premium_wp_social_fields[plusone_id]" value="<?php esc_attr_e( $options['plusone_id'] ); ?>" />
								<a href="https://developers.google.com/+/plugins/badge/?hl=hu#faq-find-page-id" target="_blank" title="Hol találod a Google+ oldalad azonosítóját?">Google+ oldal azonosító</a>
								<p>Ahhoz, hogy megjelenjen a Google+ jelvény widget, mindenképpen meg kell adnod előbb a Google+ oldalad azonosítóját.</p>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row">
								<label class="description" for="surbma_premium_wp_social_fields[twittername]">Twitter neved</label>
							</th>
							<td>
								<input id="surbma_premium_wp_social_fields[twittername]" class="regular-text" type="text" name="surbma_premium_wp_social_fields[twittername]" value="<?php esc_attr_e( $options['twittername'] ); ?>" />
								<p>Ahhoz, hogy megjelenjen a Twitter követés widget, mindenképpen meg kell adnod előbb a Twitter neved.</p>
							</td>
						</tr>
					</table>

					<p><input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" /></p>

				</div>
				<div class="uk-panel uk-panel-box">
					<h3 class="uk-panel-title">Közösségi megosztás eszközök</h3>

					<table class="form-table">
						<tr valign="top">
							<th scope="row">Facebook tetszik gomb</th>
							<td>
								<input id="surbma_premium_wp_social_fields[fblikeposts]" name="surbma_premium_wp_social_fields[fblikeposts]" type="checkbox" value="1" <?php checked( '1', $options['fblikeposts'] ); ?> />
								<label class="description" for="surbma_premium_wp_social_fields[fblikeposts]">Jelenjen meg a Facebook tetszik gomb a bejegyzéseknél</label>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row">Google +1 gomb</th>
							<td>
								<input id="surbma_premium_wp_social_fields[plusoneposts]" name="surbma_premium_wp_social_fields[plusoneposts]" type="checkbox" value="1" <?php checked( '1', $options['plusoneposts'] ); ?> />
								<label class="description" for="surbma_premium_wp_social_fields[plusoneposts]">Jelenjen meg a Google +1 gomb a bejegyzéseknél</label>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row">Twitter megosztás gomb</th>
							<td>
								<input id="surbma_premium_wp_social_fields[tweetposts]" name="surbma_premium_wp_social_fields[tweetposts]" type="checkbox" value="1" <?php checked( '1', $options['tweetposts'] ); ?> />
								<label class="description" for="surbma_premium_wp_social_fields[tweetposts]">Jelenjen meg a Twitter megosztás gomb a bejegyzéseknél</label>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row">LinkedIn megosztás gomb</th>
							<td>
								<input id="surbma_premium_wp_social_fields[linkedinposts]" name="surbma_premium_wp_social_fields[linkedinposts]" type="checkbox" value="1" <?php checked( '1', $options['linkedinposts'] ); ?> />
								<label class="description" for="surbma_premium_wp_social_fields[linkedinposts]">Jelenjen meg a LinkedIn megosztás gomb a bejegyzéseknél</label>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row">
								<label class="description" for="surbma_premium_wp_social_fields[sharebuttonsplace]">Megosztás gombok elhelyezkedése</label>
							</th>
							<td>
								<select name="surbma_premium_wp_social_fields[sharebuttonsplace]">
									<?php
										$selected = $options['sharebuttonsplace'];
										$p = '';
										$r = '';

										foreach ( $sharebuttonsplace_options as $option ) {
											$label = $option['label'];
											if ( $selected == $option['value'] ) // Make default first in list
												$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
											else
												$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
										}
										echo $p . $r;
									?>
								</select>
							</td>
						</tr>
					</table>

					<p><input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" /></p>

				</div>
				<div class="uk-panel uk-panel-box">
					<h3 class="uk-panel-title">Beépített rövidkódok (shortcodes)</h3>

					<table class="form-table">
						<tr valign="top">
							<th scope="row">
								Facebook like gomb<br /><code>[facebook-tetszik-gomb]</code>
							</th>
							<td>
								<input id="surbma_premium_wp_social_fields[fblike]" name="surbma_premium_wp_social_fields[fblike]" type="checkbox" value="1" <?php checked( '1', $options['fblike'] ); ?> />
								<label class="description" for="surbma_premium_wp_social_fields[fblike]">Igen, szeretném használni a Facebook like gombot a shortcode használatával</label>
								<p>Facebook "tetszik" gomb beillesztése az oldalra. A kód paraméterezhető és a "küldés" gomb is engedélyezhető.</p>
								<h4>Paraméterek:</h4>
								<ul>
									<li><code>url</code> - A gomb linkje, amire "tetszik"-et nyom a látogató. Alapértelmezett érték: mindig az aktuális oldal url-je.</li>
								</ul>
								<h4>Használata:</h4>
								<ul>
									<li><code>[facebook-tetszik-gomb]</code> - Normál megjelenítés az alapértelmezett paraméterekkel</li>
									<li><code>[facebook-tetszik-gomb url="http://www.sajatdomain.hu"]</code> - Mindig a megadott domain url-jére nyomnak "tetszik"-et.</li>
								</ul>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row">
								Google +1 gomb<br /><code>[google-pluszegy-gomb]</code>
							</th>
							<td>
								<input id="surbma_premium_wp_social_fields[plusone]" name="surbma_premium_wp_social_fields[plusone]" type="checkbox" value="1" <?php checked( '1', $options['plusone'] ); ?> />
								<label class="description" for="surbma_premium_wp_social_fields[plusone]">Igen, szeretném használni a Google +1 gombot a shortcode használatával</label>
								<p>Google +1 gomb beillesztése az oldalra. A kód paraméterezhető.</p>
								<h4>Paraméterek:</h4>
								<ul>
									<li><code>url</code> - A gomb linkje, amire plusz egyet nyom a látogató. Alapértelmezett érték: mindig az aktuális oldal url-je.</li>
								</ul>
								<h4>Használata:</h4>
								<ul>
									<li><code>[google-pluszegy-gomb]</code> - Normál megjelenítés az alapértelmezett paraméterekkel</li>
									<li><code>[google-pluszegy-gomb url="http://www.sajatdomain.hu"]</code> - Mindig a megadott domain url-jére nyomnak plusz egyet.</li>
								</ul>
							</td>
						</tr>
						<tr valign="top">
							<th scope="row">
								LinkedIn megosztás gomb<br /><code>[linkedin-megosztas-gomb]</code>
							</th>
							<td>
								<input id="surbma_premium_wp_social_fields[linkedin]" name="surbma_premium_wp_social_fields[linkedin]" type="checkbox" value="1" <?php checked( '1', $options['linkedin'] ); ?> />
								<label class="description" for="surbma_premium_wp_social_fields[linkedin]">Igen, szeretném használni a LinkedIn megosztás gombot a shortcode használatával</label>
								<p>LinkedIn megosztás gomb beillesztése az oldalra. A kód paraméterezhető.</p>
								<h4>Paraméterek:</h4>
								<ul>
									<li><code>url</code> - A gomb linkje, amit megoszt a látogató. Alapértelmezett érték: mindig az aktuális oldal url-je.</li>
								</ul>
								<h4>Használata:</h4>
								<ul>
									<li><code>[linkedin-megosztas-gomb]</code> - Normál megjelenítés az alapértelmezett paraméterekkel</li>
									<li><code>[linkedin-megosztas-gomb url="http://www.sajatdomain.hu"]</code> - Mindig a megadott domain url-t osztja meg.</li>
								</ul>
							</td>
						</tr>
					</table>

					<p><input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" /></p>

				</div>
			</form>
		</div>
	</div>
<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function surbma_premium_wp_social_fields_validate( $input ) {
	global $sharebuttonsplace_options;

	// Say our text option must be safe text with no HTML tags
	$input['fbpageurl'] = wp_filter_nohtml_kses( $input['fbpageurl'] );
	$input['twittername'] = wp_filter_nohtml_kses( $input['twittername'] );

	$input['fbpageurl'] = esc_url_raw( $input['fbpageurl'] );

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['fblike'] ) )
		$input['fblike'] = null;
	$input['fblike'] = ( $input['fblike'] == 1 ? 1 : 0 );

	if ( ! isset( $input['fblikeposts'] ) )
		$input['fblikeposts'] = null;
	$input['fblikeposts'] = ( $input['fblikeposts'] == 1 ? 1 : 0 );

	if ( ! isset( $input['plusone'] ) )
		$input['plusone'] = null;
	$input['plusone'] = ( $input['plusone'] == 1 ? 1 : 0 );

	if ( ! isset( $input['plusoneposts'] ) )
		$input['plusoneposts'] = null;
	$input['plusoneposts'] = ( $input['plusoneposts'] == 1 ? 1 : 0 );

	if ( ! isset( $input['tweetposts'] ) )
		$input['tweetposts'] = null;
	$input['tweetposts'] = ( $input['tweetposts'] == 1 ? 1 : 0 );

	if ( ! isset( $input['linkedin'] ) )
		$input['linkedin'] = null;
	$input['linkedin'] = ( $input['linkedin'] == 1 ? 1 : 0 );

	if ( ! isset( $input['linkedinposts'] ) )
		$input['linkedinposts'] = null;
	$input['linkedinposts'] = ( $input['linkedinposts'] == 1 ? 1 : 0 );

	// Our value must be numeric
	if ( ! ctype_digit( $input['plusone_id'] ) )
		$input['plusone_id'] = null;

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['sharebuttonsplace'], $sharebuttonsplace_options ) )
		$input['sharebuttonsplace'] = null;

	return $input;
}
