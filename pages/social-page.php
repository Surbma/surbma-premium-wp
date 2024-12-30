<?php

add_action( 'admin_init', function() {
	register_setting( 'surbma_premium_wp_social_options', 'surbma_premium_wp_social_fields', 'surbma_premium_wp_social_fields_validate' );
} );

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

	if ( ! isset( $_REQUEST['settings-updated'] ) ) {
		$_REQUEST['settings-updated'] = false;
	}

?>
<div class="wrap">
	<div class="premium-wp uk-width-5-6@m">
		<h1 class="dashicons-before dashicons-share"><?php esc_html_e( 'Premium WP', 'surbma-premium-wp' ); ?>: Közösségi oldalak integrálása</h1>

		<?php if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true ) { ?>
			<div class="updated notice is-dismissible"><p><strong><?php esc_html_e( 'Settings saved.', 'surbma-premium-wp' ); ?></strong></p></div>
		<?php } ?>

		<form class="uk-form" method="post" action="options.php">
			<?php settings_fields( 'surbma_premium_wp_social_options' ); ?>
			<?php $options = get_option( 'surbma_premium_wp_social_fields' ); ?>
			<?php
				$fblikeposts = is_array( $options ) && isset( $options['fblikeposts'] ) && $options['fblikeposts'] === 1 ? 1 : 0;
				$tweetposts = is_array( $options ) && isset( $options['tweetposts'] ) && $options['tweetposts'] === 1 ? 1 : 0;
				$linkedinposts = is_array( $options ) && isset( $options['linkedinposts'] ) && $options['linkedinposts'] === 1 ? 1 : 0;
				$pinitposts = is_array( $options ) && isset( $options['pinitposts'] ) && $options['pinitposts'] === 1 ? 1 : 0;
				$emailposts = is_array( $options ) && isset( $options['emailposts'] ) && $options['emailposts'] === 1 ? 1 : 0;
				$socialposts = is_array( $options ) && isset( $options['socialposts'] ) && $options['socialposts'] === 1 ? 1 : 0;
				$socialpages = is_array( $options ) && isset( $options['socialpages'] ) && $options['socialpages'] === 1 ? 1 : 0;
				$socialcpts = is_array( $options ) && isset( $options['socialcpts'] ) && $options['socialcpts'] ? $options['socialcpts'] : '';
				$selected_sharebuttonsplace = is_array( $options ) && isset( $options['sharebuttonsplace'] ) && $options['sharebuttonsplace'] ? $options['sharebuttonsplace'] : 'before';
				$selected_sharebuttonsstyle = is_array( $options ) && isset( $options['sharebuttonsstyle'] ) && $options['sharebuttonsstyle'] ? $options['sharebuttonsstyle'] : 'simple-mono';
			?>

			<div class="uk-grid">
				<div class="uk-width-1-1">
					<div class="uk-card uk-card-default uk-card-hover uk-card-body uk-margin-top">
						<h3 class="uk-card-title">Megosztási gombok beállításai</h3>

						<table class="form-table">
							<tr valign="top">
								<th scope="row">Megosztási lehetőségek</th>
								<td>
									<p><input id="surbma_premium_wp_social_fields[fblikeposts]" name="surbma_premium_wp_social_fields[fblikeposts]" type="checkbox" value="1" <?php checked( '1', $fblikeposts ); ?> />
									<label class="description" for="surbma_premium_wp_social_fields[fblikeposts]">Facebook tetszik gomb</label></p>
									<p><input id="surbma_premium_wp_social_fields[tweetposts]" name="surbma_premium_wp_social_fields[tweetposts]" type="checkbox" value="1" <?php checked( '1', $tweetposts ); ?> />
									<label class="description" for="surbma_premium_wp_social_fields[tweetposts]">Twitter megosztás gomb</label></p>
									<p><input id="surbma_premium_wp_social_fields[linkedinposts]" name="surbma_premium_wp_social_fields[linkedinposts]" type="checkbox" value="1" <?php checked( '1', $linkedinposts ); ?> />
									<label class="description" for="surbma_premium_wp_social_fields[linkedinposts]">LinkedIn megosztás gomb</label></p>
									<p><input id="surbma_premium_wp_social_fields[pinitposts]" name="surbma_premium_wp_social_fields[pinitposts]" type="checkbox" value="1" <?php checked( '1', $pinitposts ); ?> />
									<label class="description" for="surbma_premium_wp_social_fields[pinitposts]">Pinterest megosztás gomb</label></p>
									<p><input id="surbma_premium_wp_social_fields[emailposts]" name="surbma_premium_wp_social_fields[emailposts]" type="checkbox" value="1" <?php checked( '1', $emailposts ); ?> />
									<label class="description" for="surbma_premium_wp_social_fields[emailposts]">Email megosztás gomb</label></p>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row"><?php esc_html_e( 'Hol jelenjenek meg a gombok?', 'surbma-premium-wp' ); ?></th>
								<td>
									<p><input id="surbma_premium_wp_social_fields[socialposts]" name="surbma_premium_wp_social_fields[socialposts]" type="checkbox" value="1" <?php checked( '1', $socialposts ); ?> />
									<label class="description" for="surbma_premium_wp_social_fields[socialposts]"><?php esc_html_e( 'Minden bejegyzésnél', 'surbma-premium-wp' ); ?></label></p>
									<p><input id="surbma_premium_wp_social_fields[socialpages]" name="surbma_premium_wp_social_fields[socialpages]" type="checkbox" value="1" <?php checked( '1', $socialpages ); ?> />
									<label class="description" for="surbma_premium_wp_social_fields[socialpages]"><?php esc_html_e( 'Minden oldalnál', 'surbma-premium-wp' ); ?></label></p>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label class="description" for="surbma_premium_wp_social_fields[socialcpts]"><?php esc_html_e( 'On these Custom Post Types:', 'surbma-premium-wp' ); ?></label>
								</th>
								<td>
									<input id="surbma_premium_wp_social_fields[socialcpts]" class="regular-text" type="text" name="surbma_premium_wp_social_fields[socialcpts]" value="<?php esc_attr( $socialcpts ); ?>" placeholder="CPT slugs in apostrophes, comma separated" />
									<p class="description"><?php esc_html_e( 'This will enable Social Buttons on CPT single pages.', 'surbma-premium-wp' ); ?></p>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label class="description" for="surbma_premium_wp_social_fields[sharebuttonsplace]">Gombok elhelyezkedése</label>
								</th>
								<td>
									<select name="surbma_premium_wp_social_fields[sharebuttonsplace]">
										<?php
											$p = '';
											$r = '';

											foreach ( $sharebuttonsplace_options as $option ) {
												$label = $option['label'];
												if ( $selected_sharebuttonsplace == $option['value'] ) // Make default first in list
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
									<label class="description" for="surbma_premium_wp_social_fields[sharebuttonsstyle]"><?php esc_html_e( 'Style of share buttons', 'surbma-premium-wp' ); ?></label>
								</th>
								<td>
									<select name="surbma_premium_wp_social_fields[sharebuttonsstyle]">
										<?php
											$p = '';
											$r = '';

											foreach ( $sharebuttonsstyle_options as $option ) {
												$label = $option['label'];
												if ( $selected_sharebuttonsstyle == $option['value'] ) // Make default first in list
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

						<p><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'surbma-premium-wp' ); ?>" /></p>

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

	$input['fblikeposts'] = isset( $input['fblikeposts'] ) && $input['fblikeposts'] == 1 ? 1 : 0;
	$input['tweetposts'] = isset( $input['tweetposts'] ) && $input['tweetposts'] == 1 ? 1 : 0;
	$input['linkedinposts'] = isset( $input['linkedinposts'] ) && $input['linkedinposts'] == 1 ? 1 : 0;
	$input['pinitposts'] = isset( $input['pinitposts'] ) && $input['pinitposts'] == 1 ? 1 : 0;
	$input['emailposts'] = isset( $input['emailposts'] ) && $input['emailposts'] == 1 ? 1 : 0;
	$input['socialposts'] = isset( $input['socialposts'] ) && $input['socialposts'] == 1 ? 1 : 0;
	$input['socialpages'] = isset( $input['socialpages'] ) && $input['socialpages'] == 1 ? 1 : 0;

	// Our select option must actually be in our array of select options
	$input['sharebuttonsplace'] = array_key_exists( $input['sharebuttonsplace'], $sharebuttonsplace_options ) ? $input['sharebuttonsplace'] : 'before';
	$input['sharebuttonsstyle'] = array_key_exists( $input['sharebuttonsstyle'], $sharebuttonsstyle_options ) ? $input['sharebuttonsstyle'] : 'simple-mono';

	return $input;
}
