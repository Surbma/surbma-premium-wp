<?php

function surbma_premium_wp_extra_fields_init() {
	register_setting( 'surbma_premium_wp_options', 'surbma_premium_wp_extra_fields', 'surbma_premium_wp_extra_fields_validate' );
}
add_action( 'admin_init', 'surbma_premium_wp_extra_fields_init', 50 );

function surbma_premium_wp_extra_fields_page() {
	if ( !isset( $_GET['settings-updated'] ) ) {
		$_GET['settings-updated'] = false;
	}
?>
<div class="wrap">
	<div class="premium-wp uk-width-5-6@m">
		<h1 class="dashicons-before dashicons-book-alt"><?php esc_html_e( 'Premium WP', 'surbma-premium-wp' ); ?>: <?php esc_html_e( 'Extra Content', 'surbma-premium-wp' ); ?></h1>
		<p><?php esc_html_e( 'Extra content shortcodes can be used anywhere on your site and any modifications can be done here. This way you should be doing it only once and every content will update across your website instantly.', 'surbma-premium-wp' ); ?></p>

		<?php if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true ) { ?>
			<div class="updated notice is-dismissible"><p><strong><?php esc_html_e( 'Settings saved.', 'surbma-premium-wp' ); ?></strong></p></div>
		<?php } ?>

		<div class="uk-card uk-card-default uk-card-hover uk-card-body uk-margin-top">
			<h3 class="uk-card-title"><?php esc_html_e( 'Alapadatok', 'surbma-premium-wp' ); ?></h3>
			<form class="uk-form" method="post" action="options.php">
				<?php settings_fields( 'surbma_premium_wp_options' ); ?>
				<?php $options = get_option( 'surbma_premium_wp_extra_fields' ); ?>
				<?php
					$name = is_array( $options ) && isset( $options['name'] ) && $options['name'] ? $options['name'] : '';
					$company = is_array( $options ) && isset( $options['company'] ) && $options['company'] ? $options['company'] : '';
					$address = is_array( $options ) && isset( $options['address'] ) && $options['address'] ? $options['address'] : '';
					$vat = is_array( $options ) && isset( $options['vat'] ) && $options['vat'] ? $options['vat'] : '';
					$companyid = is_array( $options ) && isset( $options['companyid'] ) && $options['companyid'] ? $options['companyid'] : '';
					$bankid = is_array( $options ) && isset( $options['bankid'] ) && $options['bankid'] ? $options['bankid'] : '';
					$mobilephone = is_array( $options ) && isset( $options['mobilephone'] ) && $options['mobilephone'] ? $options['mobilephone'] : '';
					$phone = is_array( $options ) && isset( $options['phone'] ) && $options['phone'] ? $options['phone'] : '';
					$fax = is_array( $options ) && isset( $options['fax'] ) && $options['fax'] ? $options['fax'] : '';
					$email = is_array( $options ) && isset( $options['email'] ) && $options['email'] ? $options['email'] : '';
					$skype = is_array( $options ) && isset( $options['skype'] ) && $options['skype'] ? $options['skype'] : '';
					$companyinfo = is_array( $options ) && isset( $options['companyinfo'] ) && $options['companyinfo'] ? $options['companyinfo'] : '';
				?>

				<table class="form-table">
					<tr>
						<th scope="row">
							<label class="description" for="surbma_premium_wp_extra_fields[name]">Név</label>
						</th>
						<td>
							<input id="surbma_premium_wp_extra_fields[name]" class="regular-text" type="text" name="surbma_premium_wp_extra_fields[name]" value="<?php esc_attr( $name ); ?>" />
							<span class="description"><?php esc_html_e( 'Shortcode', 'surbma-premium-wp' ); ?>:</span> <code>[nev]</code>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label class="description" for="surbma_premium_wp_extra_fields[company]">Cégnév</label>
						</th>
						<td>
							<input id="surbma_premium_wp_extra_fields[company]" class="regular-text" type="text" name="surbma_premium_wp_extra_fields[company]" value="<?php esc_attr( $company ); ?>" />
							<span class="description"><?php esc_html_e( 'Shortcode', 'surbma-premium-wp' ); ?>:</span> <code>[ceg]</code>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label class="description" for="surbma_premium_wp_extra_fields[address]">Cím</label>
						</th>
						<td>
							<input id="surbma_premium_wp_extra_fields[address]" class="regular-text" type="text" name="surbma_premium_wp_extra_fields[address]" value="<?php esc_attr( $address ); ?>" />
							<span class="description"><?php esc_html_e( 'Shortcode', 'surbma-premium-wp' ); ?>:</span> <code>[cim]</code>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label class="description" for="surbma_premium_wp_extra_fields[vat]">Adószám</label>
						</th>
						<td>
							<input id="surbma_premium_wp_extra_fields[vat]" class="regular-text" type="text" name="surbma_premium_wp_extra_fields[vat]" value="<?php esc_attr( $vat ); ?>" />
							<span class="description"><?php esc_html_e( 'Shortcode', 'surbma-premium-wp' ); ?>:</span> <code>[adoszam]</code>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label class="description" for="surbma_premium_wp_extra_fields[companyid]">Cégjegyzékszám</label>
						</th>
						<td>
							<input id="surbma_premium_wp_extra_fields[companyid]" class="regular-text" type="text" name="surbma_premium_wp_extra_fields[companyid]" value="<?php esc_attr( $companyid ); ?>" />
							<span class="description"><?php esc_html_e( 'Shortcode', 'surbma-premium-wp' ); ?>:</span> <code>[cegjegyzekszam]</code>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label class="description" for="surbma_premium_wp_extra_fields[bankid]">Bankszámlaszám</label>
						</th>
						<td>
							<input id="surbma_premium_wp_extra_fields[bankid]" class="regular-text" type="text" name="surbma_premium_wp_extra_fields[bankid]" value="<?php esc_attr( $bankid ); ?>" />
							<span class="description"><?php esc_html_e( 'Shortcode', 'surbma-premium-wp' ); ?>:</span> <code>[bankszamlaszam]</code>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label class="description" for="surbma_premium_wp_extra_fields[mobilephone]">Mobiltelefon</label>
						</th>
						<td>
							<input id="surbma_premium_wp_extra_fields[mobilephone]" class="regular-text" type="text" name="surbma_premium_wp_extra_fields[mobilephone]" value="<?php esc_attr( $mobilephone ); ?>" />
							<span class="description"><?php esc_html_e( 'Shortcode', 'surbma-premium-wp' ); ?>:</span> <code>[mobiltelefon]</code>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label class="description" for="surbma_premium_wp_extra_fields[phone]">Telefonszám</label>
						</th>
						<td>
							<input id="surbma_premium_wp_extra_fields[phone]" class="regular-text" type="text" name="surbma_premium_wp_extra_fields[phone]" value="<?php esc_attr( $phone ); ?>" />
							<span class="description"><?php esc_html_e( 'Shortcode', 'surbma-premium-wp' ); ?>:</span> <code>[telefon]</code>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label class="description" for="surbma_premium_wp_extra_fields[fax]">Fax</label>
						</th>
						<td>
							<input id="surbma_premium_wp_extra_fields[fax]" class="regular-text" type="text" name="surbma_premium_wp_extra_fields[fax]" value="<?php esc_attr( $fax ); ?>" />
							<span class="description"><?php esc_html_e( 'Shortcode', 'surbma-premium-wp' ); ?>:</span> <code>[fax]</code>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label class="description" for="surbma_premium_wp_extra_fields[email]">Email cím</label>
						</th>
						<td>
							<input id="surbma_premium_wp_extra_fields[email]" class="regular-text" type="text" name="surbma_premium_wp_extra_fields[email]" value="<?php esc_attr( $email ); ?>" />
							<span class="description"><?php esc_html_e( 'Shortcode', 'surbma-premium-wp' ); ?>:</span> <code>[email]</code>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label class="description" for="surbma_premium_wp_extra_fields[skype]">Skype cím</label>
						</th>
						<td>
							<input id="surbma_premium_wp_extra_fields[skype]" class="regular-text" type="text" name="surbma_premium_wp_extra_fields[skype]" value="<?php esc_attr( $skype ); ?>" />
							<span class="description"><?php esc_html_e( 'Shortcode', 'surbma-premium-wp' ); ?>:</span> <code>[skype]</code>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label class="description" for="surbma_premium_wp_extra_fields[companyinfo]">Cég rövid leírása</label>
						</th>
						<td>
							<textarea id="surbma_premium_wp_extra_fields[companyinfo]" class="large-text" cols="50" rows="10" name="surbma_premium_wp_extra_fields[companyinfo]"><?php echo esc_textarea( $companyinfo ); ?></textarea>
							<span class="description"><?php esc_html_e( 'Shortcode', 'surbma-premium-wp' ); ?>:</span> <code>[ceginfo]</code>
							<p>Mutasd be röviden a céged. A következő html kódokat használhatod a formázáshoz:<br /><div class="uk-panel uk-panel-box uk-panel-box-secondary uk-text-small uk-text-muted"><?php echo allowed_tags(); ?></div></p>
						</td>
					</tr>
				</table>
				<p><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes', 'surbma-premium-wp' ); ?>" /></p>
			</form>
		</div>
		<div class="uk-card uk-card-default uk-card-hover uk-card-body uk-margin-top">
			<h3 class="uk-card-title"><?php esc_html_e( 'Rövidkódok használata', 'surbma-premium-wp' ); ?></h3>
			<p>A fent megadott adatok könnyen megjeleníthetők a weboldalon. Akár oldalba, akár bejegyzésbe, sőt a widgeteknél is beírhatók a mezők után megadott rövidkódok, amik megjelenítik a megadott adatokat. Így, amikor adatváltozás történik, pl. megváltozik a telefonszám, akkor elég csak itt megváltoztatni az adatot és mindenhol az aktuális információ jelenik meg.</p>
			<p>Itt találhatók a rövidkódok leírásai: <a href="/wp-admin/admin.php?page=pwp-shortcodes">Extra rövidkódok »</a></p>
		</div>
	</div>
</div>
<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function surbma_premium_wp_extra_fields_validate( $input ) {
	// Say our text option must be safe text with no HTML tags
	$input['name'] = wp_filter_nohtml_kses( $input['name'] );
	$input['company'] = wp_filter_nohtml_kses( $input['company'] );
	$input['address'] = wp_filter_nohtml_kses( $input['address'] );
	$input['vat'] = wp_filter_nohtml_kses( $input['vat'] );
	$input['companyid'] = wp_filter_nohtml_kses( $input['companyid'] );
	$input['bankid'] = wp_filter_nohtml_kses( $input['bankid'] );
	$input['mobilephone'] = wp_filter_nohtml_kses( $input['mobilephone'] );
	$input['phone'] = wp_filter_nohtml_kses( $input['phone'] );
	$input['fax'] = wp_filter_nohtml_kses( $input['fax'] );
	$input['email'] = wp_filter_nohtml_kses( $input['email'] );
	$input['skype'] = wp_filter_nohtml_kses( $input['skype'] );

	// Say our textarea option must be safe text with the allowed tags for posts
	$input['companyinfo'] = wp_filter_post_kses( $input['companyinfo'] );

	return $input;
}
