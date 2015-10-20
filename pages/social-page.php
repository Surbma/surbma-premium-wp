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
	),
	'before-and-after' => array(
		'value' => 'before-and-after',
		'label' => __( 'Bejegyzés szövege előtt és után' )
	)
);

function surbma_premium_wp_social_page() {

	global $sharebuttonsplace_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

?>
	<div class="wrap premium-wp uk-grid uk-margin-top">
		<div class="uk-width-9-10">
			<h1 class="dashicons-before dashicons-share"><?php _e( 'Premium WP', 'surbma-premium-wp' ); ?>: Közösségi oldalak integrálása</h1>
			<p></p>

			<?php if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true ) { ?>
				<div class="updated notice is-dismissible"><p><strong><?php _e( 'Settings saved.' ); ?></strong></p></div>
			<?php } ?>

			<form class="uk-form" method="post" action="options.php">
				<?php settings_fields( 'surbma_premium_wp_social_options' ); ?>
				<?php $options = get_option( 'surbma_premium_wp_social_fields' ); ?>

				<div class="uk-grid">
					<div class="uk-width-1-1">
						<?php if ( is_super_admin() ) { ?>
						<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
							<table class="form-table">
								<tr valign="top">
									<th scope="row">
										<label class="description" for="surbma_premium_wp_social_fields[fbpageurl]">Facebook oldal url címe</label>
									</th>
									<td>
										<input id="surbma_premium_wp_social_fields[fbpageurl]" class="regular-text" type="text" name="surbma_premium_wp_social_fields[fbpageurl]" value="<?php esc_attr_e( $options['fbpageurl'] ); ?>" />
									</td>
								</tr>
							</table>
						</div>
						<?php } ?>
						<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
							<h3 class="uk-panel-title">Megosztás gombok</h3>

							<table class="form-table">
								<tr valign="top">
									<th scope="row">Facebook</th>
									<td>
										<input id="surbma_premium_wp_social_fields[fblikeposts]" name="surbma_premium_wp_social_fields[fblikeposts]" type="checkbox" value="1" <?php checked( '1', $options['fblikeposts'] ); ?> />
										<label class="description" for="surbma_premium_wp_social_fields[fblikeposts]">Jelenjen meg a Facebook tetszik gomb a bejegyzéseknél</label>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Google +1</th>
									<td>
										<input id="surbma_premium_wp_social_fields[plusoneposts]" name="surbma_premium_wp_social_fields[plusoneposts]" type="checkbox" value="1" <?php checked( '1', $options['plusoneposts'] ); ?> />
										<label class="description" for="surbma_premium_wp_social_fields[plusoneposts]">Jelenjen meg a Google +1 gomb a bejegyzéseknél</label>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Twitter</th>
									<td>
										<input id="surbma_premium_wp_social_fields[tweetposts]" name="surbma_premium_wp_social_fields[tweetposts]" type="checkbox" value="1" <?php checked( '1', $options['tweetposts'] ); ?> />
										<label class="description" for="surbma_premium_wp_social_fields[tweetposts]">Jelenjen meg a Twitter megosztás gomb a bejegyzéseknél</label>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">LinkedIn</th>
									<td>
										<input id="surbma_premium_wp_social_fields[linkedinposts]" name="surbma_premium_wp_social_fields[linkedinposts]" type="checkbox" value="1" <?php checked( '1', $options['linkedinposts'] ); ?> />
										<label class="description" for="surbma_premium_wp_social_fields[linkedinposts]">Jelenjen meg a LinkedIn megosztás gomb a bejegyzéseknél</label>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Pinterest</th>
									<td>
										<input id="surbma_premium_wp_social_fields[pinitposts]" name="surbma_premium_wp_social_fields[pinitposts]" type="checkbox" value="1" <?php checked( '1', $options['pinitposts'] ); ?> />
										<label class="description" for="surbma_premium_wp_social_fields[pinitposts]">Jelenjen meg a Pinterest megosztás gomb a bejegyzéseknél</label>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Email</th>
									<td>
										<input id="surbma_premium_wp_social_fields[emailposts]" name="surbma_premium_wp_social_fields[emailposts]" type="checkbox" value="1" <?php checked( '1', $options['emailposts'] ); ?> />
										<label class="description" for="surbma_premium_wp_social_fields[emailposts]">Jelenjen meg az Email megosztás gomb a bejegyzéseknél</label>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Nyomtatás</th>
									<td>
										<input id="surbma_premium_wp_social_fields[printposts]" name="surbma_premium_wp_social_fields[printposts]" type="checkbox" value="1" <?php checked( '1', $options['printposts'] ); ?> />
										<label class="description" for="surbma_premium_wp_social_fields[printposts]">Jelenjen meg a Nyomtatás (PrintFriendly) gomb a bejegyzéseknél</label>
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
					</div>
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
	$input['fbpageurl'] = esc_url_raw( $input['fbpageurl'] );

	if ( ! isset( $input['fblikeposts'] ) )
		$input['fblikeposts'] = null;
	$input['fblikeposts'] = ( $input['fblikeposts'] == 1 ? 1 : 0 );

	if ( ! isset( $input['plusoneposts'] ) )
		$input['plusoneposts'] = null;
	$input['plusoneposts'] = ( $input['plusoneposts'] == 1 ? 1 : 0 );

	if ( ! isset( $input['tweetposts'] ) )
		$input['tweetposts'] = null;
	$input['tweetposts'] = ( $input['tweetposts'] == 1 ? 1 : 0 );

	if ( ! isset( $input['linkedinposts'] ) )
		$input['linkedinposts'] = null;
	$input['linkedinposts'] = ( $input['linkedinposts'] == 1 ? 1 : 0 );

	if ( ! isset( $input['pinitposts'] ) )
		$input['pinitposts'] = null;
	$input['pinitposts'] = ( $input['pinitposts'] == 1 ? 1 : 0 );

	if ( ! isset( $input['emailposts'] ) )
		$input['emailposts'] = null;
	$input['emailposts'] = ( $input['emailposts'] == 1 ? 1 : 0 );

	if ( ! isset( $input['printposts'] ) )
		$input['printposts'] = null;
	$input['printposts'] = ( $input['printposts'] == 1 ? 1 : 0 );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['sharebuttonsplace'], $sharebuttonsplace_options ) )
		$input['sharebuttonsplace'] = null;

	return $input;
}
