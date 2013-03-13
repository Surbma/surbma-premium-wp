<?php

function pwp_extra_fields_init() {
	register_setting( 'pwp_options', 'pwp_extra_fields', 'pwp_extra_fields_validate' );
}
add_action( 'admin_init', 'pwp_extra_fields_init', 50 );

function pwp_extra_fields_page() {

	global $sharebuttonsplace_options;
	
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
	
	?>
	<div class="pwp wrap">

		<img class="icon" alt="icon" src="<?php echo PWP_PLUGIN_URL . '/images/extrafields32.png'; ?>" />
  	<h2>Prémium WordPress bővítmény: Extra tartalmak megjelenítése</h2>
  
		<p>Ezen az oldalon megadhatók olyan adatok, amelyek felhasználhatók a weboldal könnyebb kezeléséhez.</p>
	
		<?php if ( $_REQUEST['settings-updated'] == true ) : ?>
			<div class="updated fade"><p><strong>Adatok mentése sikerült</strong></p></div>
		<?php endif; ?>
	
		<form method="post" action="options.php">
			<?php settings_fields( 'pwp_options' ); ?>
			<?php $options = get_option( 'pwp_extra_fields' ); ?>
			
		<div class="clearline"></div>
		
	  	<div class="section-block">

			<h2>Alapadatok</h2>
	
			<table class="form-table">
	
				<tr valign="top"><th scope="row"><label class="description" for="pwp_extra_fields[name]">Név</label></th>
					<td>
						<input id="pwp_extra_fields[name]" class="regular-text" type="text" name="pwp_extra_fields[name]" value="<?php esc_attr_e( $options['name'] ); ?>" />
						<span class="description">Rövidkód:</span> <code>[nev]</code>
					</td>
				</tr>
	
				<tr valign="top"><th scope="row"><label class="description" for="pwp_extra_fields[company]">Cégnév</label></th>
					<td>
						<input id="pwp_extra_fields[company]" class="regular-text" type="text" name="pwp_extra_fields[company]" value="<?php esc_attr_e( $options['company'] ); ?>" />
						<span class="description">Rövidkód:</span> <code>[ceg]</code>
					</td>
				</tr>
	
				<tr valign="top"><th scope="row"><label class="description" for="pwp_extra_fields[address]">Cím</label></th>
					<td>
						<input id="pwp_extra_fields[address]" class="regular-text" type="text" name="pwp_extra_fields[address]" value="<?php esc_attr_e( $options['address'] ); ?>" />
						<span class="description">Rövidkód:</span> <code>[cim]</code>
					</td>
				</tr>
	
				<tr valign="top"><th scope="row"><label class="description" for="pwp_extra_fields[vat]">Adószám</label></th>
					<td>
						<input id="pwp_extra_fields[vat]" class="regular-text" type="text" name="pwp_extra_fields[vat]" value="<?php esc_attr_e( $options['vat'] ); ?>" />
						<span class="description">Rövidkód:</span> <code>[adoszam]</code>
					</td>
				</tr>
	
				<tr valign="top"><th scope="row"><label class="description" for="pwp_extra_fields[companyid]">Cégjegyzékszám</label></th>
					<td>
						<input id="pwp_extra_fields[companyid]" class="regular-text" type="text" name="pwp_extra_fields[companyid]" value="<?php esc_attr_e( $options['companyid'] ); ?>" />
						<span class="description">Rövidkód:</span> <code>[cegjegyzekszam]</code>
					</td>
				</tr>
	
				<tr valign="top"><th scope="row"><label class="description" for="pwp_extra_fields[bankid]">Bankszámlaszám</label></th>
					<td>
						<input id="pwp_extra_fields[bankid]" class="regular-text" type="text" name="pwp_extra_fields[bankid]" value="<?php esc_attr_e( $options['bankid'] ); ?>" />
						<span class="description">Rövidkód:</span> <code>[bankszamlaszam]</code>
					</td>
				</tr>
	
				<tr valign="top"><th scope="row"><label class="description" for="pwp_extra_fields[mobilephone]">Mobiltelefon</label></th>
					<td>
						<input id="pwp_extra_fields[mobilephone]" class="regular-text" type="text" name="pwp_extra_fields[mobilephone]" value="<?php esc_attr_e( $options['mobilephone'] ); ?>" />
						<span class="description">Rövidkód:</span> <code>[mobiltelefon]</code>
					</td>
				</tr>
	
				<tr valign="top"><th scope="row"><label class="description" for="pwp_extra_fields[phone]">Telefonszám</label></th>
					<td>
						<input id="pwp_extra_fields[phone]" class="regular-text" type="text" name="pwp_extra_fields[phone]" value="<?php esc_attr_e( $options['phone'] ); ?>" />
						<span class="description">Rövidkód:</span> <code>[telefon]</code>
					</td>
				</tr>
	
				<tr valign="top"><th scope="row"><label class="description" for="pwp_extra_fields[fax]">Fax</label></th>
					<td>
						<input id="pwp_extra_fields[fax]" class="regular-text" type="text" name="pwp_extra_fields[fax]" value="<?php esc_attr_e( $options['fax'] ); ?>" />
						<span class="description">Rövidkód:</span> <code>[fax]</code>
					</td>
				</tr>
	
				<tr valign="top"><th scope="row"><label class="description" for="pwp_extra_fields[email]">Email cím</label></th>
					<td>
						<input id="pwp_extra_fields[email]" class="regular-text" type="text" name="pwp_extra_fields[email]" value="<?php esc_attr_e( $options['email'] ); ?>" />
						<span class="description">Rövidkód:</span> <code>[email]</code>
					</td>
				</tr>
	
				<tr valign="top"><th scope="row"><label class="description" for="pwp_extra_fields[skype]">Skype cím</label></th>
					<td>
						<input id="pwp_extra_fields[skype]" class="regular-text" type="text" name="pwp_extra_fields[skype]" value="<?php esc_attr_e( $options['skype'] ); ?>" />
						<span class="description">Rövidkód:</span> <code>[skype]</code>
					</td>
				</tr>
	
				<tr valign="top"><th scope="row"><label class="description" for="pwp_extra_fields[companyinfo]">Cég rövid leírása</label></th>
					<td>
						<textarea id="pwp_extra_fields[companyinfo]" class="large-text" cols="50" rows="10" name="pwp_extra_fields[companyinfo]"><?php echo stripslashes( $options['companyinfo'] ); ?></textarea>
						<span class="description">Rövidkód:</span> <code>[ceginfo]</code>
						<p>Mutasd be röviden a céged. A következő html kódokat használhatod a formázáshoz:<br /><code><?php echo allowed_tags(); ?></code></p>
					</td>
				</tr>
	
			</table>
	
			<p><input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" /></p>
	
	  	</div>

		<div class="clearline"></div>
		
	  	<div class="section-block">

			<h2>Rövidkódok használata</h2>
	
			<p>A fent megadott adatok könnyen megjeleníthetők a weboldalon. Akár oldalba, akár bejegyzésbe, sőt a widgeteknél is beírhatók a mezők után megadott rövidkódok, amik megjelenítik a megadott adatokat. Így, amikor adatváltozás történik, pl. megváltozik a telefonszám, akkor elég csak itt megváltoztatni az adatot és mindenhol az aktuális információ jelenik meg.</p>

			<p>Itt találhatók a rövidkódok leírásai: <a href="/wp-admin/admin.php?page=pwp-shortcodes">Extra rövidkódok »</a></p>
			
	  	</div>

		</form>

	</div>
<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function pwp_extra_fields_validate( $input ) {
	global $sharebuttonsplace_options;

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

