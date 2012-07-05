<?php

function pwp_twitter_bootstrap_fields_init() {
	register_setting( 'pwp_twitter_bootstrap_options', 'pwp_twitter_bootstrap', 'pwp_twitter_bootstrap_fields_validate' );
}
add_action( 'admin_init', 'pwp_twitter_bootstrap_fields_init' );

function pwp_twitter_bootstrap_page() {
	if ( !current_user_can( 'manage_options' ) ) {
		wp_die( PWP_NO_PERMISSION_TEXT );
	}

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">

		<img class="icon" alt="icon" src="<?php echo PWP_SOCIAL_ICON; ?>" />
		<h2>Prémium WordPress bővítmény: Twitter Bootstrap extra funkciók</h2>

		<p>Az oldalon bármelyik "Módosítások mentése" gombra lehet kattintani, az az összes módosítást menti.</p>

		<?php if ( $_REQUEST['settings-updated'] == true ) : ?>
		<div class="updated fade"><p><strong>Adatok mentése sikerült</strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'pwp_twitter_bootstrap_options' ); ?>
			<?php $options = get_option( 'pwp_twitter_bootstrap' ); ?>

		<div class="clearline"></div>

			<div class="section-block">

			<h2>Twitter Bootstrap extra funkciók</h2>

			<table class="form-table">

				<tr valign="top"><th scope="row">Twitter Bootstrap aktiválása</th>
					<td>
						<input id="pwp_twitter_bootstrap[activate_bootstrap]" name="pwp_twitter_bootstrap[activate_bootstrap]" type="checkbox" value="1" <?php checked( '1', $options['activate_bootstrap'] ); ?> />
						<label class="description" for="pwp_twitter_bootstrap[activate_bootstrap]">Igen, akarom használni a Twitter Bootstrap extra funkciókat</label>
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
function pwp_twitter_bootstrap_fields_validate( $input ) {

	// Our checkbox value is either 0 or 1
	if ( ! isset( $input['activate_bootstrap'] ) )
		$input['activate_bootstrap'] = null;
	$input['activate_bootstrap'] = ( $input['activate_bootstrap'] == 1 ? 1 : 0 );

	return $input;
}

