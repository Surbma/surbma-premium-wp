<?php

function surbma_premium_wp_multi_live_chat_page() {
?>
	<div class="wrap premium-wp uk-grid">
		<div class="uk-width-9-10">
			<h2 class="dashicons-before dashicons-admin-comments"><?php _e( 'Premium WP', 'surbma-premium-wp' ); ?>: <?php _e( 'Multi Live Chat', 'surbma-premium-wp' ); ?></h2>

			<?php if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true ) { ?>
				<div class="updated notice is-dismissible"><p><strong><?php _e( 'Settings saved.' ); ?></strong></p></div>
			<?php } ?>

			<div class="uk-panel uk-panel-box">
				<h3 class="uk-panel-title"><?php _e( 'Live Chat Settings', 'surbma-premium-wp' ); ?></h3>
				<form method="post" action="options.php">
					<?php settings_fields( 'surbma_premium_wp_multi_live_chat_options' ); ?>
					<?php do_settings_sections( 'surbma-premium-wp-multi-live-chat' ); ?>

					<p><input name="Submit" type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" /></p>
				</form>
			</div>

			<div class="uk-panel uk-panel-box">
				<h3 class="uk-panel-title"><?php _e( 'Multi Live Chat Help', 'surbma-premium-wp' ); ?></h3>
				<p><strong>Live Chat Services:</strong></p>
				<ol>
					<li><a href="http://bit.ly/Z85Xvx" target="_blank">Zopim.com →</a></li>
					<li><a href="http://bit.ly/Z85Xvx" target="_blank">Zopim.com →</a></li>
					<li><a href="http://bit.ly/Z85Xvx" target="_blank">Zopim.com →</a></li>
					<li><a href="http://bit.ly/Z85Xvx" target="_blank">Zopim.com →</a></li>
					<li><a href="http://bit.ly/Z85Xvx" target="_blank">Zopim.com →</a></li>
				</ol>
			</div>
		</div>
	</div>
<?php
}

function surbma_premium_wp_multi_live_chat_init() {
	register_setting(
		'surbma_premium_wp_multi_live_chat_options',
		'surbma_premium_wp_multi_live_chat_fields',
		'surbma_premium_wp_multi_live_chat_validate'
	);
	add_settings_section(
		'surbma_premium_wp_multi_live_chat',
		null,
		null,
		'surbma-premium-wp-multi-live-chat'
	);
	add_settings_field(
		'surbma_premium_wp_multi_live_chat_zopim',
		'<label for="surbma_premium_wp_multi_live_chat_fields[zopim]">Zopim</label>',
		'surbma_premium_wp_multi_live_chat_zopim_string',
		'surbma-premium-wp-multi-live-chat',
		'surbma_premium_wp_multi_live_chat'
	);
	add_settings_field(
		'surbma_premium_wp_multi_live_chat_clickdesk',
		'<label for="surbma_premium_wp_multi_live_chat_fields[clickdesk]">ClickDesk</label>',
		'surbma_premium_wp_multi_live_chat_clickdesk_string',
		'surbma-premium-wp-multi-live-chat',
		'surbma_premium_wp_multi_live_chat'
	);
	add_settings_field(
		'surbma_premium_wp_multi_live_chat_olark',
		'<label for="surbma_premium_wp_multi_live_chat_fields[olark]">Olark</label>',
		'surbma_premium_wp_multi_live_chat_olark_string',
		'surbma-premium-wp-multi-live-chat',
		'surbma_premium_wp_multi_live_chat'
	);
	add_settings_field(
		'surbma_premium_wp_multi_live_chat_snapengage',
		'<label for="surbma_premium_wp_multi_live_chat_fields[snapengage]">SnapEngage</label>',
		'surbma_premium_wp_multi_live_chat_snapengage_string',
		'surbma-premium-wp-multi-live-chat',
		'surbma_premium_wp_multi_live_chat'
	);
	add_settings_field(
		'surbma_premium_wp_multi_live_chat_smartsupp',
		'<label for="surbma_premium_wp_multi_live_chat_fields[smartsupp]">Smartsupp</label>',
		'surbma_premium_wp_multi_live_chat_smartsupp_string',
		'surbma-premium-wp-multi-live-chat',
		'surbma_premium_wp_multi_live_chat'
	);
}
add_action( 'admin_init', 'surbma_premium_wp_multi_live_chat_init', 50 );

function surbma_premium_wp_multi_live_chat_zopim_string() {
	$options = get_option('surbma_premium_wp_multi_live_chat_fields');
	echo "<input class='large-text' id='surbma_premium_wp_multi_live_chat_fields[zopim]' name='surbma_premium_wp_multi_live_chat_fields[zopim]' type='text' value='{$options['zopim']}' placeholder='' />";
	echo '<p class="description">' . __( 'You need only your ID from the embed code.', 'surbma-premium-wp' ) . ' <span class="dashicons dashicons-external"></span> <a href="' . SURBMA_PREMIUM_WP_PLUGIN_URL . '/images/zopim.jpg" data-uk-lightbox>' . __( 'Screenshot', 'surbma-premium-wp' ) . '</a></p>';
}

function surbma_premium_wp_multi_live_chat_clickdesk_string() {
	$options = get_option('surbma_premium_wp_multi_live_chat_fields');
	echo "<input class='large-text' id='surbma_premium_wp_multi_live_chat_fields[clickdesk]' name='surbma_premium_wp_multi_live_chat_fields[clickdesk]' type='text' value='{$options['clickdesk']}' placeholder='' />";
	echo '<p class="description">' . __( 'You need only your ID from the embed code.', 'surbma-premium-wp' ) . ' <span class="dashicons dashicons-external"></span> <a href="' . SURBMA_PREMIUM_WP_PLUGIN_URL . '/images/clickdesk.jpg" data-uk-lightbox>' . __( 'Screenshot', 'surbma-premium-wp' ) . '</a></p>';
}

function surbma_premium_wp_multi_live_chat_olark_string() {
	$options = get_option('surbma_premium_wp_multi_live_chat_fields');
	echo "<input class='large-text' id='surbma_premium_wp_multi_live_chat_fields[olark]' name='surbma_premium_wp_multi_live_chat_fields[olark]' type='text' value='{$options['olark']}' placeholder='' />";
	echo '<p class="description">' . __( 'You need only your Site-ID.', 'surbma-premium-wp' ) . ' <span class="dashicons dashicons-external"></span> <a href="' . SURBMA_PREMIUM_WP_PLUGIN_URL . '/images/olark.jpg" data-uk-lightbox>' . __( 'Screenshot', 'surbma-premium-wp' ) . '</a></p>';
}

function surbma_premium_wp_multi_live_chat_snapengage_string() {
	$options = get_option('surbma_premium_wp_multi_live_chat_fields');
	echo "<input class='large-text' id='surbma_premium_wp_multi_live_chat_fields[snapengage]' name='surbma_premium_wp_multi_live_chat_fields[snapengage]' type='text' value='{$options['snapengage']}' placeholder='' />";
}

function surbma_premium_wp_multi_live_chat_smartsupp_string() {
	$options = get_option('surbma_premium_wp_multi_live_chat_fields');
	echo "<input class='large-text' id='surbma_premium_wp_multi_live_chat_fields[smartsupp]' name='surbma_premium_wp_multi_live_chat_fields[smartsupp]' type='text' value='{$options['smartsupp']}' placeholder='' />";
}

function surbma_premium_wp_multi_live_chat_validate( $input ) {
	// Our text option must be safe text with no HTML tags
	$input['zopim'] = wp_filter_nohtml_kses( $input['zopim'] );
	$input['clickdesk'] = wp_filter_nohtml_kses( $input['clickdesk'] );
	$input['olark'] = wp_filter_nohtml_kses( $input['olark'] );
	$input['snapengage'] = wp_filter_nohtml_kses( $input['snapengage'] );
	$input['smartsupp'] = wp_filter_nohtml_kses( $input['smartsupp'] );
	return $input;
}
