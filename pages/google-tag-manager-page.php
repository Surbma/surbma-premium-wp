<?php

function surbma_premium_wp_google_tag_manager_page() {
	if ( !isset( $_GET['settings-updated'] ) )
		$_GET['settings-updated'] = false;
?>
	<div class="wrap premium-wp uk-grid uk-margin-top">
		<div class="uk-width-9-10">
			<h1 class="dashicons-before dashicons-tag"><?php _e( 'Premium WP', 'surbma-premium-wp' ); ?>: <?php _e( 'Google Tag Manager', 'surbma-premium-wp' ); ?></h1>
			<p></p>

			<?php if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true ) : ?>
				<div class="updated notice is-dismissible"><p><strong><?php _e( 'Settings saved.' ); ?></strong></p></div>
			<?php endif; ?>

			<div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-header">
				<h3 class="uk-panel-title"><?php _e( 'Google Tag Manager Settings', 'surbma-premium-wp' ); ?></h3>
				<p><strong>FIGYELEM!</strong> Csak a tároló azonosítóját kell megadni! Pl.: GTM-A0BC0D</p>
				<p><strong>FONTOS!</strong> Amennyiben a Google Címkekezelőben lesz a Google Analytics kód is kezelve, akkor a Google Analytics kódokat mindenképpen törölni kell innen: <a href="/wp-admin/admin.php?page=pwp-google-analytics">Prémium WP → Google Analytics</a></p>				<form method="post" action="options.php">
					<?php settings_fields( 'surbma_premium_wp_google_tag_manager_options' ); ?>
					<?php do_settings_sections( 'surbma-premium-wp-google-tag-manager' ); ?>

					<p><input name="Submit" type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" /></p>
				</form>
			</div>
		</div>
	</div>
<?php
}

function surbma_premium_wp_google_tag_manager_init() {
	register_setting(
		'surbma_premium_wp_google_tag_manager_options',
		'surbma_premium_wp_google_tag_manager_fields',
		'surbma_premium_wp_google_tag_manager_validate'
	);
	add_settings_section(
		'surbma_premium_wp_google_tag_manager',
		null,
		null,
		'surbma-premium-wp-google-tag-manager'
	);
	add_settings_field(
		'surbma_premium_wp_google_tag_manager_id',
		'Tároló azonosító',
		'surbma_premium_wp_google_tag_manager_id_string',
		'surbma-premium-wp-google-tag-manager',
		'surbma_premium_wp_google_tag_manager'
	);
}
add_action( 'admin_init', 'surbma_premium_wp_google_tag_manager_init', 50 );

function surbma_premium_wp_google_tag_manager_id_string() {
	$options = get_option('surbma_premium_wp_google_tag_manager_fields');
	echo "<input id='surbma_premium_wp_google_tag_manager_fields[containerid]' name='surbma_premium_wp_google_tag_manager_fields[containerid]' type='text' value='{$options['containerid']}' placeholder='GTM-X0XX0X' maxlength='14' size='14' />";
}

function surbma_premium_wp_google_tag_manager_validate( $input ) {
	// Our text option must be safe text with no HTML tags
	$input['containerid'] = wp_filter_nohtml_kses( $input['containerid'] );
	return $input;
}
