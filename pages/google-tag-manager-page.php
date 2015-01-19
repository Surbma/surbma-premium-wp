<?php

function pwp_google_tag_manager_page() {
?>
	<div class="pwp wrap">

		<img class="icon" alt="icon" src="<?php echo PWP_PLUGIN_URL . '/images/chart32.png'; ?>" />
  	<h2>Prémium WordPress bővítmény: Google Címkekezelő</h2>

		<?php if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true ) : ?>
			<div class="updated"><p><strong>Beállítások frissítve.</strong></p></div>
		<?php endif; ?>

		<div class="clearline"></div>

	  <div class="section-block">

			<form method="post" action="options.php">
				<?php settings_fields( 'pwp_google_tag_manager_options' ); ?>
				<?php do_settings_sections( 'pwp-google-tag-manager' ); ?>

				<p><input name="Submit" type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" /></p>
			</form>

	  </div>

	</div>
<?php
}

function pwp_google_tag_manager_init() {
	register_setting( 'pwp_google_tag_manager_options', 'pwp_google_tag_manager_fields', 'pwp_google_tag_manager_validate' );
	add_settings_section( 'pwp_google_tag_manager', 'Google Címkekezelő beállítások', 'pwp_google_tag_manager_section_text', 'pwp-google-tag-manager' );
	add_settings_field( 'pwp_google_tag_manager_id', 'Tároló azonosító', 'pwp_google_tag_manager_id_string', 'pwp-google-tag-manager', 'pwp_google_tag_manager' );
}
add_action( 'admin_init', 'pwp_google_tag_manager_init', 50 );

function pwp_google_tag_manager_section_text() {
	echo '<p><strong>FIGYELEM!</strong> Csak a tároló azonosítóját kell megadni! Pl.: GTM-A0BC0D</p><p><strong>FONTOS!</strong> Amennyiben a Google Címkekezelőben lesz a Google Analytics kód is kezelve, akkor a Google Analytics kódokat mindenképpen törölni kell innen: <a href="/wp-admin/admin.php?page=pwp-google-analytics">Prémium WP → Google Analytics</a></p>';
}

function pwp_google_tag_manager_id_string() {
	$options = get_option('pwp_google_tag_manager_fields');
	echo "<input id='pwp_google_tag_manager_fields[containerid]' name='pwp_google_tag_manager_fields[containerid]' type='text' value='{$options['containerid']}' placeholder='GTM-X0XX0X' maxlength='14' size='14' />";
}

function pwp_google_tag_manager_validate( $input ) {
	// Our text option must be safe text with no HTML tags
	$input['containerid'] = wp_filter_nohtml_kses( $input['containerid'] );
	return $input;
}

