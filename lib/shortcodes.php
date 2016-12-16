<?php

add_shortcode( 'br', 'surbma_premium_wp_br_function' );
function surbma_premium_wp_br_function() {
	return '<br />';
}

add_shortcode( 'hr', 'surbma_premium_wp_hr_function' );
function surbma_premium_wp_hr_function() {
	return '<hr class="clear clearfix" />';
}

add_shortcode( 'clear', 'surbma_premium_wp_clear_function' );
function surbma_premium_wp_clear_function() {
	return '<div class="clear clear-line clearfix"></div>';
}

add_shortcode( 'elrejt', 'surbma_premium_wp_hide_function' );
function surbma_premium_wp_hide_function( $content = null ) {
	return '<div style="display:none;">'.do_shortcode( $content ).'</div>';
}

add_shortcode( 'div', 'surbma_premium_wp_div_function' );
function surbma_premium_wp_div_function( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id' => '',
		'class' => '',
		'style' => ''
	), $atts ) );

	return '<div id="'.$id.'" class="'.$class.'" style="'.$style.'">'.do_shortcode( $content ).'</div>';
}

add_shortcode( 'ga-link', 'surbma_premium_wp_ga_link_function' );
function surbma_premium_wp_ga_link_function( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'href' => '',
		'class' => '',
		'id' => '',
		'style' => '',
		'title' => '',
		'target' => '_blank',
		'eventCategory' => 'outbound',
		'eventAction' => 'link',
		'eventLabel' => ''
	), $atts ) );

	if ( $eventLabel == '' ) $eventLabel = $href;
	$onClick = "ga( 'send', 'event', '" . $eventCategory . "', '" . $eventAction . "', '" . $eventLabel . "' );";

	return '<a href="'.$href.'" class="'.$class.'" id="'.$id.'" style="'.$style.'" title="'.$title.'" target="'.$target.'" onClick="'.$onClick.'">'.do_shortcode( $content ).'</a>';
}

add_shortcode( 'mailto', 'surbma_premium_wp_mailto_function' );
function surbma_premium_wp_mailto_function( $atts, $content = null ) {
	$encodedmail = '';
	for ( $i = 0; $i <strlen( $content ); $i++ ) $encodedmail .= "&#" . ord( $content[$i] ) . ';';
	return '<a href="mailto:'.$encodedmail.'">'.$encodedmail.'</a>';
}

add_shortcode( 'vendeg', 'surbma_premium_wp_show_content_for_vendeg' );
function surbma_premium_wp_show_content_for_vendeg( $atts, $content = null ) {
	if ( ( !is_user_logged_in() && !is_null( $content ) ) || is_feed() )
		return do_shortcode( $content );
	return '';
}

add_shortcode( 'tag', 'surbma_premium_wp_show_content_for_tag' );
function surbma_premium_wp_show_content_for_tag( $atts, $content = null ) {
	if ( is_user_logged_in() && !is_null( $content ) && !is_feed() )
		return do_shortcode( $content );
	return '';
}

function surbma_premium_wp_facebook_script() {
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/<?php echo get_locale(); ?>/sdk.js#xfbml=1&version=v2.8&appId=256155317784646";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php
}

add_shortcode( 'facebook-like-gomb', 'surbma_premium_wp_fblike_button' );
add_shortcode( 'facebook-tetszik-gomb', 'surbma_premium_wp_fblike_button' );
function surbma_premium_wp_fblike_button( $atts ) {
	if ( function_exists( 'surbma_premium_wp_facebook_script' ) )
		add_action( 'wp_footer', 'surbma_premium_wp_facebook_script' );
	extract( shortcode_atts( array(
		"url" => get_permalink(),
		"width" => '',
		"layout" => 'button',
		"action" => 'like',
		"size" => 'large',
		"show_faces" => false,
		"share" => false
	), $atts ) );
	return '<div class="fb-like" data-href="'.$url.'" data-width="'.$width.'" data-layout="'.$layout.'" data-action="'.$action.'" data-size="'.$size.'" data-show-faces="'.$show_faces.'" data-share="'.$share.'"></div>';
}

add_shortcode( 'facebook-oldal', 'surbma_premium_wp_facebook_page' );
function surbma_premium_wp_facebook_page( $atts ) {
	if ( function_exists( 'surbma_premium_wp_facebook_script' ) )
		add_action( 'wp_footer', 'surbma_premium_wp_facebook_script' );
	extract( shortcode_atts( array(
		"url" => '',
		"width" => '',
		"height" => '',
		"small_header" => false,
		"adapt_container_width" => true,
		"hide_cover" => false,
		"show_facepile" => true,
		"tabs" => ''
	), $atts ) );
	if ( $url != '' ) {
		return '<div class="fb-page" data-href="'.$url.'" data-width="'.$width.'" data-height="'.$height.'" data-tabs="'.$tabs.'" data-small-header="'.$small_header.'" data-adapt-container-width="'.$adapt_container_width.'" data-hide-cover="'.$hide_cover.'" data-show-facepile="'.$show_facepile.'"><blockquote cite="'.$url.'" class="fb-xfbml-parse-ignore"><a href="'.$url.'">'.$url.'</a></blockquote></div>';
	}
}

add_shortcode( 'nev', 'surbma_premium_wp_name_function' );
function surbma_premium_wp_name_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['name'];
}

add_shortcode( 'ceg', 'surbma_premium_wp_company_function' );
function surbma_premium_wp_company_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['company'];
}

add_shortcode( 'cim', 'surbma_premium_wp_address_function' );
function surbma_premium_wp_address_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['address'];
}

add_shortcode( 'adoszam', 'surbma_premium_wp_vat_function' );
function surbma_premium_wp_vat_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['vat'];
}

add_shortcode( 'cegjegyzekszam', 'surbma_premium_wp_companyid_function' );
function surbma_premium_wp_companyid_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['companyid'];
}

add_shortcode( 'bankszamlaszam', 'surbma_premium_wp_bankid_function' );
function surbma_premium_wp_bankid_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['bankid'];
}

add_shortcode( 'email', 'surbma_premium_wp_email_function' );
function surbma_premium_wp_email_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	$email = $options['email'];
	$mailto = '[mailto]'.$email.'[/mailto]';
	return do_shortcode( $mailto );
}

add_shortcode( 'mobiltelefon', 'surbma_premium_wp_mobilephone_function' );
function surbma_premium_wp_mobilephone_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['mobilephone'];
}

add_shortcode( 'telefon', 'surbma_premium_wp_phone_function' );
function surbma_premium_wp_phone_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['phone'];
}

add_shortcode( 'fax', 'surbma_premium_wp_fax_function' );
function surbma_premium_wp_fax_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['fax'];
}

add_shortcode( 'skype', 'surbma_premium_wp_skype_function' );
function surbma_premium_wp_skype_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return '<a class="pwp-skype" href="skype:'.$options['skype'].'?call">'.$options['skype'].'</a>';
}

add_shortcode( 'ceginfo', 'surbma_premium_wp_companyinfo_function' );
function surbma_premium_wp_companyinfo_function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['companyinfo'];
}

add_shortcode( 'google-calendar', 'surbma_premium_wp_google_calendar_shortcode' );
function surbma_premium_wp_google_calendar_shortcode( $atts ) {
     extract( shortcode_atts( array(
          'src' => '',
          'scrolling' => 'auto',
          'width' => 400,
          'height' => 300
     ), $atts ) );
     return '<iframe src="https://www.google.com/calendar/embed?'.$src.'" width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="'.$scrolling.'"></iframe>';
}

add_shortcode( 'google-presentation', 'surbma_premium_wp_google_presentation_shortcode' );
function surbma_premium_wp_google_presentation_shortcode( $atts ) {
     extract( shortcode_atts( array(
          'id' => '',
          'start' => 'false',
          'loop' => 'false',
          'delayms' => 3000,
          'width' => 400,
          'height' => 300
     ), $atts ) );
     return '<iframe src="https://docs.google.com/presentation/d/'.$id.'/embed?start='.$start.'&loop='.$loop.'&delayms='.$delayms.'" frameborder="0" width="'.$width.'" height="'.$height.'" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>';
}

add_shortcode( 'google-form', 'surbma_premium_wp_google_form_shortcode' );
function surbma_premium_wp_google_form_shortcode( $atts ) {
     extract( shortcode_atts( array(
          'id' => '',
          'width' => 760,
          'height' => 500
     ), $atts ) );
     return '<iframe src="https://docs.google.com/forms/d/'.$id.'/viewform?embedded=true#start=embed" width="'.$width.'" height="'.$height.'" frameborder="0" marginheight="0" marginwidth="0"></iframe>';
}

add_shortcode( 'pwp-youtube', 'surbma_premium_wp_youtube_shortcode' );
function surbma_premium_wp_youtube_shortcode( $atts ) {
     extract( shortcode_atts( array(
          'id' => '',
          'width' => '',
          'height' => ''
     ), $atts ) );
     return '<iframe width="'.$width.'" height="'.$height.'" src="https://www.youtube.com/embed/'.$id.'" frameborder="0" allowfullscreen></iframe>';
}

add_shortcode( 'pwp-vimeo', 'surbma_premium_wp_vimeo_shortcode' );
function surbma_premium_wp_vimeo_shortcode( $atts ) {
     extract( shortcode_atts( array(
          'id' => '',
          'width' => '',
          'height' => ''
     ), $atts ) );
     return '<iframe src="https://player.vimeo.com/video/'.$id.'" width="'.$width.'" height="'.$height.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
}
