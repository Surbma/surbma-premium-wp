<?php

function surbma_premium_wp_br_function() {
	return '<br />';
}
add_shortcode( 'br', 'surbma_premium_wp_br_function' );

function surbma_premium_wp_hr_function() {
	return '<hr class="clear clearfix" />';
}
add_shortcode( 'hr', 'surbma_premium_wp_hr_function' );

function surbma_premium_wp_clear_function() {
	return '<div class="clear clear-line clearfix"></div>';
}
add_shortcode( 'clear', 'surbma_premium_wp_clear_function' );

function surbma_premium_wp_hide_function( $content = null ) {
	return '<div style="display:none;">'.do_shortcode( $content ).'</div>';
}
add_shortcode( 'elrejt', 'surbma_premium_wp_hide_function' );

function surbma_premium_wp_div_function( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id' => '',
		'class' => '',
		'style' => ''
	), $atts ) );

	return '<div id="'.$id.'" class="'.$class.'" style="'.$style.'">'.do_shortcode( $content ).'</div>';
}
add_shortcode( 'div', 'surbma_premium_wp_div_function' );

function surbma_premium_wp_mailto_function( $atts, $content = null ) {
	$encodedmail = '';
	for ( $i = 0; $i <strlen( $content ); $i++ ) $encodedmail .= "&#" . ord( $content[$i] ) . ';';
	return '<a href="mailto:'.$encodedmail.'">'.$encodedmail.'</a>';
}
add_shortcode( 'mailto', 'surbma_premium_wp_mailto_function' );

function surbma_premium_wp_show_content_for_vendeg( $atts, $content = null ) {
	if ( ( !is_user_logged_in() && !is_null( $content ) ) || is_feed() )
		return do_shortcode( $content );
	return '';
}
add_shortcode( 'vendeg', 'surbma_premium_wp_show_content_for_vendeg' );

function surbma_premium_wp_show_content_for_tag( $atts, $content = null ) {
	if ( is_user_logged_in() && !is_null( $content ) && !is_feed() )
		return do_shortcode( $content );
	return '';
}
add_shortcode( 'tag', 'surbma_premium_wp_show_content_for_tag' );

function surbma_premium_wp_fblike_button( $atts ) {
	extract( shortcode_atts( array(
		"url" => get_permalink()
	), $atts ) );
	return '<div style="float:left;margin:0 .5em .5em 0;"><div class="fb-like" data-href="'.$url.'" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div></div>';
}
add_shortcode( 'facebook-like-gomb', 'surbma_premium_wp_fblike_button' );
add_shortcode( 'facebook-tetszik-gomb', 'surbma_premium_wp_fblike_button' );

function surbma_premium_wp_name_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['name'];
}
function surbma_premium_wp_company_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['company'];
}
function surbma_premium_wp_address_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['address'];
}
function surbma_premium_wp_vat_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['vat'];
}
function surbma_premium_wp_companyid_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['companyid'];
}
function surbma_premium_wp_bankid_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['bankid'];
}
function surbma_premium_wp_email_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	$email = $options['email'];
	$mailto = '[mailto]'.$email.'[/mailto]';
	return do_shortcode( $mailto );
}
function surbma_premium_wp_mobilephone_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['mobilephone'];
}
function surbma_premium_wp_phone_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['phone'];
}
function surbma_premium_wp_fax_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['fax'];
}
function surbma_premium_wp_skype_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return '<a class="pwp-skype" href="skype:'.$options['skype'].'?call">'.$options['skype'].'</a>';
}
function surbma_premium_wp_companyinfo_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['companyinfo'];
}

add_shortcode( 'nev', 'surbma_premium_wp_name_function' );
add_shortcode( 'ceg', 'surbma_premium_wp_company_function' );
add_shortcode( 'cim', 'surbma_premium_wp_address_function' );
add_shortcode( 'adoszam', 'surbma_premium_wp_vat_function' );
add_shortcode( 'cegjegyzekszam', 'surbma_premium_wp_companyid_function' );
add_shortcode( 'bankszamlaszam', 'surbma_premium_wp_bankid_function' );
add_shortcode( 'email', 'surbma_premium_wp_email_function' );
add_shortcode( 'mobiltelefon', 'surbma_premium_wp_mobilephone_function' );
add_shortcode( 'telefon', 'surbma_premium_wp_phone_function' );
add_shortcode( 'fax', 'surbma_premium_wp_fax_function' );
add_shortcode( 'skype', 'surbma_premium_wp_skype_function' );
add_shortcode( 'ceginfo', 'surbma_premium_wp_companyinfo_function' );

function surbma_premium_wp_google_calendar_shortcode( $atts ) {
     extract( shortcode_atts( array(
          'src' => '',
          'scrolling' => 'auto',
          'width' => '400',
          'height' => '300'
     ), $atts ) );
     return '<iframe src="https://www.google.com/calendar/embed?'.$src.'" width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="'.$scrolling.'"></iframe>';
}
add_shortcode( 'google-calendar', 'surbma_premium_wp_google_calendar_shortcode' );

function surbma_premium_wp_google_presentation_shortcode( $atts ) {
     extract( shortcode_atts( array(
          'src' => '',
          'start' => 'false',
          'loop' => 'false',
          'delayms' => '3000',
          'width' => '400',
          'height' => '300'
     ), $atts ) );
     return '<iframe src="https://docs.google.com/presentation/d/'.$src.'/embed?start='.$start.'&loop='.$loop.'&delayms='.$delayms.'" frameborder="0" width="'.$width.'" height="'.$height.'" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>';
}
add_shortcode( 'google-presentation', 'surbma_premium_wp_google_presentation_shortcode' );
