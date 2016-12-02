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
		'label' => __( 'Tartalom előtt', 'surbma-premium-wp' )
	),
	'after' => array(
		'value' => 'after',
		'label' => __( 'Tartalom után', 'surbma-premium-wp' )
	),
	'before-and-after' => array(
		'value' => 'before-and-after',
		'label' => __( 'Tartalom előtt és után', 'surbma-premium-wp' )
	)
);

$sharebuttonsstyle_options = array(
	'simple-mono' => array(
		'value' => 'simple-mono',
		'label' => __( 'Simple Mono', 'surbma-premium-wp' )
	),
	'simple-colored' => array(
		'value' => 'simple-colored',
		'label' => __( 'Simple Colored', 'surbma-premium-wp' )
	),
	'button-square' => array(
		'value' => 'button-square',
		'label' => __( 'Button Square', 'surbma-premium-wp' )
	),
	'button-rounded' => array(
		'value' => 'button-rounded',
		'label' => __( 'Button Rounded', 'surbma-premium-wp' )
	),
	'button-circle' => array(
		'value' => 'button-circle',
		'label' => __( 'Button Circle', 'surbma-premium-wp' )
	)
);

function surbma_premium_wp_social_page() {

	global $sharebuttonsplace_options;
	global $sharebuttonsstyle_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

?>
<div class="premium-wp uk-grid uk-margin-top">
	<div class="wrap uk-width-9-10">
		<h1 class="dashicons-before dashicons-share"><?php _e( 'Premium WP', 'surbma-premium-wp' ); ?>: Közösségi oldalak integrálása</h1>

		<?php if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true ) { ?>
			<div class="updated notice is-dismissible"><p><strong><?php _e( 'Settings saved.' ); ?></strong></p></div>
		<?php } ?>

		<form class="uk-form" method="post" action="options.php">
			<?php settings_fields( 'surbma_premium_wp_social_options' ); ?>
			<?php $options = get_option( 'surbma_premium_wp_social_fields' ); ?>

			<div class="uk-grid">
				<div class="uk-width-1-1">
					<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
						<h3 class="uk-panel-title">Megosztási gombok beállításai</h3>

						<table class="form-table">
							<tr valign="top">
								<th scope="row">Megosztási lehetőségek</th>
								<td>
									<p><input id="surbma_premium_wp_social_fields[fblikeposts]" name="surbma_premium_wp_social_fields[fblikeposts]" type="checkbox" value="1" <?php checked( '1', $options['fblikeposts'] ); ?> />
									<label class="description" for="surbma_premium_wp_social_fields[fblikeposts]">Facebook tetszik gomb</label></p>
									<p><input id="surbma_premium_wp_social_fields[plusoneposts]" name="surbma_premium_wp_social_fields[plusoneposts]" type="checkbox" value="1" <?php checked( '1', $options['plusoneposts'] ); ?> />
									<label class="description" for="surbma_premium_wp_social_fields[plusoneposts]">Google +1 gomb</label></p>
									<p><input id="surbma_premium_wp_social_fields[tweetposts]" name="surbma_premium_wp_social_fields[tweetposts]" type="checkbox" value="1" <?php checked( '1', $options['tweetposts'] ); ?> />
									<label class="description" for="surbma_premium_wp_social_fields[tweetposts]">Twitter megosztás gomb</label></p>
									<p><input id="surbma_premium_wp_social_fields[linkedinposts]" name="surbma_premium_wp_social_fields[linkedinposts]" type="checkbox" value="1" <?php checked( '1', $options['linkedinposts'] ); ?> />
									<label class="description" for="surbma_premium_wp_social_fields[linkedinposts]">LinkedIn megosztás gomb</label></p>
									<p><input id="surbma_premium_wp_social_fields[pinitposts]" name="surbma_premium_wp_social_fields[pinitposts]" type="checkbox" value="1" <?php checked( '1', $options['pinitposts'] ); ?> />
									<label class="description" for="surbma_premium_wp_social_fields[pinitposts]">Pinterest megosztás gomb</label></p>
									<p><input id="surbma_premium_wp_social_fields[emailposts]" name="surbma_premium_wp_social_fields[emailposts]" type="checkbox" value="1" <?php checked( '1', $options['emailposts'] ); ?> />
									<label class="description" for="surbma_premium_wp_social_fields[emailposts]">Email megosztás gomb</label></p>
									<p><input id="surbma_premium_wp_social_fields[printposts]" name="surbma_premium_wp_social_fields[printposts]" type="checkbox" value="1" <?php checked( '1', $options['printposts'] ); ?> />
									<label class="description" for="surbma_premium_wp_social_fields[printposts]">Nyomtatás (PrintFriendly) gomb</label></p>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row"><?php _e( 'Hol jelenjenek meg a gombok?', 'surbma-premium-wp' ); ?></th>
								<td>
									<p><input id="surbma_premium_wp_social_fields[socialposts]" name="surbma_premium_wp_social_fields[socialposts]" type="checkbox" value="1" <?php checked( '1', $options['socialposts'] ); ?> />
									<label class="description" for="surbma_premium_wp_social_fields[socialposts]"><?php _e( 'Minden bejegyzésnél', 'surbma-premium-wp' ); ?></label></p>
									<p><input id="surbma_premium_wp_social_fields[socialpages]" name="surbma_premium_wp_social_fields[socialpages]" type="checkbox" value="1" <?php checked( '1', $options['socialpages'] ); ?> />
									<label class="description" for="surbma_premium_wp_social_fields[socialpages]"><?php _e( 'Minden oldalnál', 'surbma-premium-wp' ); ?></label></p>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label class="description" for="surbma_premium_wp_social_fields[socialcpts]"><?php _e( 'On these Custom Post Types:', 'surbma-premium-wp' ); ?></label>
								</th>
								<td>
									<input id="surbma_premium_wp_social_fields[socialcpts]" class="regular-text" type="text" name="surbma_premium_wp_social_fields[socialcpts]" value="<?php esc_attr_e( $options['socialcpts'] ); ?>" placeholder="CPT slugs in apostrophes, comma separated" />
									<p class="description"><?php _e( 'This will enable Social Buttons on CPT single pages.', 'surbma-premium-wp' ); ?></p>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label class="description" for="surbma_premium_wp_social_fields[sharebuttonsplace]">Gombok elhelyezkedése</label>
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
							<tr valign="top">
								<th scope="row">
									<label class="description" for="surbma_premium_wp_social_fields[sharebuttonsstyle]"><?php _e( 'Style of share buttons', 'surbma-premium-wp' ); ?></label>
								</th>
								<td>
									<select name="surbma_premium_wp_social_fields[sharebuttonsstyle]">
										<?php
											$selected = $options['sharebuttonsstyle'];
											$p = '';
											$r = '';

											foreach ( $sharebuttonsstyle_options as $option ) {
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
	global $sharebuttonsstyle_options;

	// Say our text option must be safe text with no HTML tags
	$input['fbpageurl'] = wp_filter_nohtml_kses( $input['fbpageurl'] );
	$input['fbpageurl'] = esc_url_raw( $input['fbpageurl'] );
	$input['socialcpts'] = wp_filter_nohtml_kses( str_replace( ' ', '', $input['socialcpts'] ) );

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

	if ( ! isset( $input['socialposts'] ) )
		$input['socialposts'] = null;
	$input['socialposts'] = ( $input['socialposts'] == 1 ? 1 : 0 );

	if ( ! isset( $input['socialpages'] ) )
		$input['socialpages'] = null;
	$input['socialpages'] = ( $input['socialpages'] == 1 ? 1 : 0 );

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['sharebuttonsplace'], $sharebuttonsplace_options ) )
		$input['sharebuttonsplace'] = null;
	if ( ! array_key_exists( $input['sharebuttonsstyle'], $sharebuttonsstyle_options ) )
		$input['sharebuttonsstyle'] = null;

	return $input;
}
