<?php

function pwp_social_fields_init() {
	register_setting( 'pwp_social_options', 'pwp_social_fields', 'pwp_social_fields_validate' );
}
add_action( 'admin_init', 'pwp_social_fields_init' );

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

function pwp_social_page() {

	global $sharebuttonsplace_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="pwp wrap">

		<img class="icon" alt="icon" src="<?php echo PWP_PLUGIN_URL . '/images/social32.png'; ?>" />
		<h2>Prémium WordPress bővítmény: Közösségi oldalak integrálása</h2>

		<p>Az oldalon bármelyik "Módosítások mentése" gombra lehet kattintani, az az összes módosítást menti.</p>

		<?php if ( $_REQUEST['settings-updated'] == true ) : ?>
		<div class="updated fade"><p><strong>Adatok mentése sikerült</strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'pwp_social_options' ); ?>
			<?php $options = get_option( 'pwp_social_fields' ); ?>

		<div class="clearline"></div>

			<div class="section-block">

			<h2>Közösségi oldalak adatai</h2>

			<table class="form-table">

				<tr valign="top"><th scope="row"><label class="description" for="pwp_social_fields[fbpageurl]">Facebook oldal url címe</label></th>
					<td>
						<input id="pwp_social_fields[fbpageurl]" class="regular-text" type="text" name="pwp_social_fields[fbpageurl]" value="<?php esc_attr_e( $options['fbpageurl'] ); ?>" />
						<p>Ahhoz, hogy megjelenjen a Facebook like doboz widget, mindenképpen meg kell adnod előbb a Facebook oldalad url címét.</p>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><label class="description" for="pwp_social_fields[plusone_id]">Google+ oldal azonosítója</label></th>
					<td>
						https://plus.google.com/<input id="pwp_social_fields[plusone_id]" class="regular-text" type="text" name="pwp_social_fields[plusone_id]" value="<?php esc_attr_e( $options['plusone_id'] ); ?>" />
						<a href="https://developers.google.com/+/plugins/badge/?hl=hu#faq-find-page-id" target="_blank" title="Hol találod a Google+ oldalad azonosítóját?">Google+ oldal azonosító</a>
						<p>Ahhoz, hogy megjelenjen a Google+ jelvény widget, mindenképpen meg kell adnod előbb a Google+ oldalad azonosítóját.</p>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><label class="description" for="pwp_social_fields[twittername]">Twitter neved</label></th>
					<td>
						<input id="pwp_social_fields[twittername]" class="regular-text" type="text" name="pwp_social_fields[twittername]" value="<?php esc_attr_e( $options['twittername'] ); ?>" />
						<p>Ahhoz, hogy megjelenjen a Twitter követés widget, mindenképpen meg kell adnod előbb a Twitter neved.</p>
					</td>
				</tr>

			</table>

			<p><input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" /></p>

			</div>

		<div class="clearline"></div>

			<div class="section-block">

			<h2>Közösségi megosztás eszközök</h2>

			<table class="form-table">

				<tr valign="top"><th scope="row">Facebook tetszik gomb</th>
					<td>
						<input id="pwp_social_fields[fblikeposts]" name="pwp_social_fields[fblikeposts]" type="checkbox" value="1" <?php checked( '1', $options['fblikeposts'] ); ?> />
						<label class="description" for="pwp_social_fields[fblikeposts]">Jelenjen meg a Facebook tetszik gomb a bejegyzéseknél</label>
					</td>
				</tr>

				<tr valign="top"><th scope="row">Facebook küldés gomb</th>
					<td>
						<input id="pwp_social_fields[fbsendposts]" name="pwp_social_fields[fbsendposts]" type="checkbox" value="true" <?php checked( 'true', $options['fbsendposts'] ); ?> />
						<label class="description" for="pwp_social_fields[fbsendposts]">Jelenjen meg a Facebook küldés gomb a bejegyzéseknél</label>
					</td>
				</tr>

				<tr valign="top"><th scope="row">Google +1 gomb</th>
					<td>
						<input id="pwp_social_fields[plusoneposts]" name="pwp_social_fields[plusoneposts]" type="checkbox" value="1" <?php checked( '1', $options['plusoneposts'] ); ?> />
						<label class="description" for="pwp_social_fields[plusoneposts]">Jelenjen meg a Google +1 gomb a bejegyzéseknél</label>
					</td>
				</tr>

				<tr valign="top"><th scope="row">Google+ megosztás gomb</th>
					<td>
						<input id="pwp_social_fields[plusoneshareposts]" name="pwp_social_fields[plusoneshareposts]" type="checkbox" value="1" <?php checked( '1', $options['plusoneshareposts'] ); ?> />
						<label class="description" for="pwp_social_fields[plusoneshareposts]">Jelenjen meg a Google+ megosztás gomb a bejegyzéseknél</label>
					</td>
				</tr>

				<tr valign="top"><th scope="row">Twitter megosztás gomb</th>
					<td>
						<input id="pwp_social_fields[tweetposts]" name="pwp_social_fields[tweetposts]" type="checkbox" value="1" <?php checked( '1', $options['tweetposts'] ); ?> />
						<label class="description" for="pwp_social_fields[tweetposts]">Jelenjen meg a Twitter megosztás gomb a bejegyzéseknél</label>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><label class="description" for="pwp_social_fields[sharebuttonsplace]">Megosztás gombok elhelyezkedése</label></th>
					<td>
						<select name="pwp_social_fields[sharebuttonsplace]">
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

		<div class="clearline"></div>

			<div class="section-block">

			<h2>Beépített rövidkódok (shortcodes)</h2>

			<table class="form-table">

				<tr valign="top"><th scope="row">Facebook like gomb<br /><code>[facebook-tetszik-gomb]</code></th>
					<td>
						<input id="pwp_social_fields[fblike]" name="pwp_social_fields[fblike]" type="checkbox" value="1" <?php checked( '1', $options['fblike'] ); ?> />
						<label class="description" for="pwp_social_fields[fblike]">Igen, szeretném használni a Facebook like gombot a shortcode használatával</label>
						<p>Facebook "tetszik" gomb beillesztése az oldalra. A kód paraméterezhető és a "küldés" gomb is engedélyezhető.</p>
						<h4>Paraméterek:</h4>
						<ul>
							<li><code>url</code> - A gomb linkje, amire "tetszik"-et nyom a látogató. Alapértelmezett érték: mindig az aktuális oldal url-je.</li>
							<li><code>send</code> - Küldés gomb megjelenítése: true vagy false értéke lehet. Alapértelmezett érték: false</li>
							<li><code>layout</code> - Gomb kinézete: standard, button_count vagy box_count értéke lehet. Alapértelmezett érték: standard</li>
							<li><code>width</code> - A block szélessége: bármilyen szám lehet. Alapértelmezett érték: 450</li>
							<li><code>show_faces</code> - Arcok megjelenítése a gomb mellett: true vagy false értéke lehet. Alapértelmezett érték: false</li>
							<li><code>colorscheme</code> - Gomb színe: light vagy dark értéke lehet. Alapértelmezett érték: light</li>
						</ul>
						<h4>Használata:</h4>
						<ul>
							<li><code>[facebook-tetszik-gomb]</code> - Normál megjelenítés az alapértelmezett paraméterekkel</li>
							<li><code>[facebook-tetszik-gomb url="http://www.sajatdomain.hu"]</code> - Mindig a saját domain url-jére nyomnak "tetszik"-et.</li>
							<li><code>[facebook-tetszik-gomb url="http://www.sajatdomain.hu" send="true"]</code> - Mindig a saját domain url-jére nyomnak "tetszik"-et, plusz megjelenik a "küldés" gomb is.</li>
						</ul>
					</td>
				</tr>

			</table>

			<p><input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" /></p>

			</div>

		<div class="clearline"></div>

		</form>

	</div>
<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function pwp_social_fields_validate( $input ) {
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

	if ( ! isset( $input['plusoneposts'] ) )
		$input['plusoneposts'] = null;
	$input['plusoneposts'] = ( $input['plusoneposts'] == 1 ? 1 : 0 );

	if ( ! isset( $input['tweetposts'] ) )
		$input['tweetposts'] = null;
	$input['tweetposts'] = ( $input['tweetposts'] == 1 ? 1 : 0 );

	// Our checkbox value is either true or false
	if ( ! isset( $input['fbsendposts'] ) )
		$input['fbsendposts'] = null;
	$input['fbsendposts'] = ( $input['fbsendposts'] == 'true' ? 'true' : 'false' );

	// Our value must be numeric
	if ( ! ctype_digit( $input['plusone_id'] ) )
		$input['plusone_id'] = null;

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['sharebuttonsplace'], $sharebuttonsplace_options ) )
		$input['sharebuttonsplace'] = null;

	return $input;
}

