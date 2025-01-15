<?php

add_shortcode( 'pwp-oldal', function( $atts ) {
	extract( shortcode_atts( array(
		'id' => ''
	), $atts ) );

	if ( !is_int( $id ) ) {
		return;
	}

	$thispage = get_post( $id );
	return do_shortcode( $thispage->post_content );
} );

add_shortcode( 'pwp-bejegyzes', function( $atts ) {
	extract( shortcode_atts( array(
		'id' => ''
	), $atts ) );

	if ( !is_int( $id ) ) {
		return;
	}

	$thispost = get_post( $id );
	return do_shortcode( $thispost->post_content );
} );

add_shortcode( 'br', function() {
	return '<br>';
} );

add_shortcode( 'hr', function() {
	return '<hr class="clear clearfix" />';
} );

add_shortcode( 'clear', function() {
	return '<div class="clear clear-line clearfix"></div>';
} );

add_shortcode( 'elrejt', function( $content = null ) {
	return '<div style="display:none;">' . do_shortcode( $content ) . '</div>';
} );

add_shortcode( 'div', function( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id' => '',
		'class' => '',
		'style' => ''
	), $atts ) );

	return '<div id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" style="' . esc_attr( $style ) . '">' . do_shortcode( $content ) . '</div>';
} );

add_shortcode( 'mailto', function( $atts, $content = null ) {
	$encodedmail = '';
	for ( $i = 0; $i < strlen( $content ); $i++ ) $encodedmail .= "&#" . ord( $content[$i] ) . ';';
	return '<a href="mailto:' . esc_attr( $encodedmail ) . '">' . $encodedmail . '</a>';
} );

add_shortcode( 'tel', function( $atts, $content = null ) {
	return '<a href="tel:+' . esc_attr( preg_replace( '/\D/', '', $content ) ) . '">' . $content . '</a>';
} );

add_shortcode( 'vendeg', function( $atts, $content = null ) {
	$guestcontent = ( !is_user_logged_in() && !is_null( $content ) ) || is_feed() ? do_shortcode( $content ) : '';
	return $guestcontent;
} );

add_shortcode( 'tag', function( $atts, $content = null ) {
	$membercontent = is_user_logged_in() && !is_null( $content ) && !is_feed() ? do_shortcode( $content ) : '';
	return $membercontent;
} );

add_shortcode( 'nev', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	$name = is_array( $options ) && isset( $options['name'] ) && $options['name'] ? $options['name'] : '';
	return esc_html( $name );
} );

add_shortcode( 'ceg', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	$company = is_array( $options ) && isset( $options['company'] ) && $options['company'] ? $options['company'] : '';
	return esc_html( $company );
} );

add_shortcode( 'cim', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	$address = is_array( $options ) && isset( $options['address'] ) && $options['address'] ? $options['address'] : '';
	return esc_html( $address );
} );

add_shortcode( 'adoszam', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	$vat = is_array( $options ) && isset( $options['vat'] ) && $options['vat'] ? $options['vat'] : '';
	return esc_html( $vat );
} );

add_shortcode( 'cegjegyzekszam', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	$companyid = is_array( $options ) && isset( $options['companyid'] ) && $options['companyid'] ? $options['companyid'] : '';
	return esc_html( $companyid );
} );

add_shortcode( 'bankszamlaszam', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	$bankid = is_array( $options ) && isset( $options['bankid'] ) && $options['bankid'] ? $options['bankid'] : '';
	return esc_html( $bankid );
} );

add_shortcode( 'email', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	$email = is_array( $options ) && isset( $options['email'] ) && $options['email'] ? $options['email'] : '';
	$mailto = '[mailto]' . $email . '[/mailto]';
	return do_shortcode( $mailto );
} );

add_shortcode( 'mobiltelefon', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	$mobilephone = is_array( $options ) && isset( $options['mobilephone'] ) && $options['mobilephone'] ? $options['mobilephone'] : '';
	return '<a href="tel:+' . esc_attr( preg_replace( '/\D/', '', $mobilephone ) ) . '">' . esc_html( $mobilephone ) . '</a>';
} );

add_shortcode( 'telefon', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	$phone = is_array( $options ) && isset( $options['phone'] ) && $options['phone'] ? $options['phone'] : '';
	return '<a href="tel:+' . esc_attr( preg_replace( '/\D/', '', $phone ) ) . '">' . esc_html( $phone ) . '</a>';
} );

add_shortcode( 'fax', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	$fax = is_array( $options ) && isset( $options['fax'] ) && $options['fax'] ? $options['fax'] : '';
	return esc_html( $fax );
} );

add_shortcode( 'skype', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	$skype = is_array( $options ) && isset( $options['skype'] ) && $options['skype'] ? $options['skype'] : '';
	return '<a class="pwp-skype" href="skype:' . esc_attr( $skype ) . '?call">' . esc_html( $skype ) . '</a>';
} );

add_shortcode( 'ceginfo', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	$companyinfo = is_array( $options ) && isset( $options['companyinfo'] ) && $options['companyinfo'] ? $options['companyinfo'] : '';
	return esc_html( $companyinfo );
} );

add_shortcode( 'pwp-ev', function() {
	return gmdate( 'Y' );
} );

function surbma_premium_wp_facebook_script() {
	echo '<div id="fb-root"></div>';
	echo '<script async defer crossorigin="anonymous" src="https://connect.facebook.net/' . rawurlencode( get_locale() ) . '/sdk.js#xfbml=1&version=v17.0&appId=256155317784646&autoLogAppEvents=1" nonce="U27L1WCv"></script>';
}

add_shortcode( 'facebook-like-gomb', function( $atts ) {
	if ( function_exists( 'surbma_premium_wp_facebook_script' ) ) :
		add_action( 'wp_footer', 'surbma_premium_wp_facebook_script' );
	endif;

	extract( shortcode_atts( array(
		'url' => get_permalink(),
		'width' => '',
		'layout' => 'button',
		'action' => 'like',
		'size' => 'large',
		'show_faces' => false,
		'share' => false
	), $atts ) );

	return '<div class="fb-like" data-href="' . esc_attr( $url ) . '" data-width="' . esc_attr( $width ) . '" data-layout="' . esc_attr( $layout ) . '" data-action="' . esc_attr( $action ) . '" data-size="' . esc_attr( $size ) . '" data-show-faces="' . esc_attr( $show_faces ) . '" data-share="' . esc_attr( $share ) . '"></div>';
} );

add_shortcode( 'facebook-tetszik-gomb', function( $atts ) {
	if ( function_exists( 'surbma_premium_wp_facebook_script' ) ) :
		add_action( 'wp_footer', 'surbma_premium_wp_facebook_script' );
	endif;

	extract( shortcode_atts( array(
		'url' => get_permalink(),
		'width' => '',
		'layout' => 'button',
		'action' => 'like',
		'size' => 'large',
		'show_faces' => false,
		'share' => false
	), $atts ) );

	return '<div class="fb-like" data-href="' . esc_attr( $url ) . '" data-width="' . esc_attr( $width ) . '" data-layout="' . esc_attr( $layout ) . '" data-action="' . esc_attr( $action ) . '" data-size="' . esc_attr( $size ) . '" data-show-faces="' . esc_attr( $show_faces ) . '" data-share="' . esc_attr( $share ) . '"></div>';
} );

add_shortcode( 'facebook-megosztas-gomb', function( $atts ) {
	if ( function_exists( 'surbma_premium_wp_facebook_script' ) ) :
		add_action( 'wp_footer', 'surbma_premium_wp_facebook_script' );
	endif;

	extract( shortcode_atts( array(
		"url" => get_permalink(),
		"layout" => 'button',
		"size" => 'large'
	), $atts ) );

	return '<div class="fb-share-button" data-href="' . esc_attr( $url ) . '" data-layout="' . esc_attr( $layout ) . '" data-size="' . esc_attr( $size ) . '"></div>';
} );

add_shortcode( 'facebook-oldal', function( $atts ) {
	if ( function_exists( 'surbma_premium_wp_facebook_script' ) ) :
		add_action( 'wp_footer', 'surbma_premium_wp_facebook_script' );
	endif;

	extract( shortcode_atts( array(
		'url' => '',
		'width' => '',
		'height' => '',
		'small_header' => false,
		'adapt_container_width' => true,
		'hide_cover' => false,
		'show_facepile' => true,
		'tabs' => ''
	), $atts ) );

	if ( $url != '' ) {
		return '<div class="fb-page" data-href="' . esc_attr( $url ) . '" data-width="' . esc_attr( $width ) . '" data-height="' . esc_attr( $height ) . '" data-tabs="' . esc_attr( $tabs ) . '" data-small-header="' . esc_attr( $small_header ) . '" data-adapt-container-width="' . esc_attr( $adapt_container_width ) . '" data-hide-cover="' . esc_attr( $hide_cover ) . '" data-show-facepile="' . esc_attr( $show_facepile ) . '"><blockquote cite="' . esc_attr( $url ) . '" class="fb-xfbml-parse-ignore"><a href="' . esc_attr( $url ) . '">' . esc_url( $url ) . '</a></blockquote></div>';
	}
} );

add_shortcode( 'ga-link', function( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'universal' => false,
		'href' => '',
		'class' => '',
		'id' => '',
		'style' => '',
		'title' => '',
		'target' => '_blank',
		'eventcategory' => 'outbound',
		'eventaction' => 'link',
		'eventlabel' => ''
	), $atts ) );

	if( $eventLabel == '' ) :
		$eventLabel = $href;
	endif;

	if( $universal == false ) {
		$onclick = "gtag( 'event', '$eventaction', {'event_category': '$eventcategory',	'event_label': '$eventlabel' });";
	} else {
		$onclick = "ga('send', 'event', '$eventcategory', '$eventaction', '$eventlabel');";
	}

	return '<a href="' . esc_attr( $href ) . '" class="' . esc_attr( $class ) . '" id="' . esc_attr( $id ) . '" style="' . esc_attr( $style ) . '" title="' . esc_attr( $title ) . '" target="' . esc_attr( $target ) . '" onClick="' . esc_attr( $onclick ) . '">' . do_shortcode( $content ) . '</a>';
} );

add_shortcode( 'pwp-google-maps', function( $atts ) {
	$apikey = defined( 'SURBMA_PREMIUM_WP_GOOGLE_MAPS_API' ) ? SURBMA_PREMIUM_WP_GOOGLE_MAPS_API : '';

	extract( shortcode_atts( array(
		'key' => $apikey,
		'mode' => 'place',
		'place_id' => '',
		'lat' => '',
		'long' => '',
		'zoom' => '15',
		'maptype' => 'roadmap',
		'width' => 1000,
		'height' => 55
	), $atts ) );

	if( $mode == 'place' && $place_id != '' ) {
		return '<style>.google-maps {margin: 0 0 1em;max-width: ' . esc_attr( $width ) . 'px;}.google-maps-wrap {position: relative;padding-bottom: ' . esc_attr( $height ) . '%;height: 0;overflow: hidden;}.google-maps iframe {position: absolute;top: 0;left: 0;width: 100% !important;height: 100% !important;}</style><div class="google-maps"><div class="google-maps-wrap"><iframe width="1000" height="550" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?zoom=' . rawurlencode( $zoom ) . '&q=place_id:' . rawurlencode( $place_id ) . '&maptype=' . rawurlencode( $maptype ) . '&key=' . rawurlencode( $key ) . '" allowfullscreen></iframe></div></div>';
	} elseif( $mode == 'view' && $lat != '' && $long != '' ) {
		return '<style>.google-maps {margin: 0 0 1em;max-width: ' . esc_attr( $width ) . 'px;}.google-maps-wrap {position: relative;padding-bottom: ' . esc_attr( $height ) . '%;height: 0;overflow: hidden;}.google-maps iframe {position: absolute;top: 0;left: 0;width: 100% !important;height: 100% !important;}</style><div class="google-maps"><div class="google-maps-wrap"><iframe width="1000" height="550" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/view?zoom=' . rawurlencode( $zoom ) . '&center=' . rawurlencode( $lat ) . '%2C' . rawurlencode( $long ) . '&maptype=' . rawurlencode( $maptype ) . '&key=' . rawurlencode( $key ) . '" allowfullscreen></iframe></div></div>';
	} else {
		return;
	}
} );

add_shortcode( 'pwp-google-docs', function( $atts ) {
	extract( shortcode_atts( array(
		'src' => '',
		'scrolling' => 'auto',
		'width' => '100%',
		'height' => 500
	), $atts ) );

	return '<iframe src="https://docs.google.com/document/d/e/' . esc_attr( $src ) . '" width="' . esc_attr( $width ) . '" height="' . esc_attr( $height ) . '" frameborder="0" scrolling="' . esc_attr( $scrolling ) . '"></iframe>';
} );

add_shortcode( 'pwp-google-calendar', function( $atts ) {
	extract( shortcode_atts( array(
		'src' => '',
		'style' => 'border: 0',
		'width' => 800,
		'height' => 600,
		'scrolling' => 'auto'
	), $atts ) );

	return '<iframe src="https://calendar.google.com/calendar/embed?' . esc_attr( $src ) . '" style="' . esc_attr( $style ) . '" width="' . esc_attr( $width ) . '" height="' . esc_attr( $height ) . '" frameborder="0" scrolling="' . esc_attr( $scrolling ) . '"></iframe>';
} );

add_shortcode( 'pwp-google-presentation', function( $atts ) {
	extract( shortcode_atts( array(
		'id' => '',
		'start' => 'false',
		'loop' => 'false',
		'delayms' => 3000,
		'width' => 400,
		'height' => 300
	), $atts ) );

	return '<iframe src="https://docs.google.com/presentation/d/' . rawurlencode( $id ) . '/embed?start=' . rawurlencode( $start ) . '&loop=' . rawurlencode( $loop ) . '&delayms=' . rawurlencode( $delayms ) . '" frameborder="0" width="' . esc_attr( $width ) . '" height="' . esc_attr( $height ) . '" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>';
} );

add_shortcode( 'pwp-google-form', function( $atts ) {
	extract( shortcode_atts( array(
		'id' => '',
		'width' => 760,
		'height' => 500
	), $atts ) );

	return '<iframe src="https://docs.google.com/forms/d/' . rawurlencode( $id ) . '/viewform?embedded=true#start=embed" width="' . esc_attr( $width ) . '" height="' . esc_attr( $height ) . '" frameborder="0" marginheight="0" marginwidth="0"></iframe>';
} );

add_shortcode( 'pwp-youtube', function( $atts ) {
	extract( shortcode_atts( array(
		'id' => '',
		'width' => 560,
		'height' => 315,
		'style' => '',
		'nocookie' => false
	), $atts ) );

	if ( $nocookie ) {
		return '<iframe src="https://www.youtube-nocookie.com/embed/' . rawurlencode( $id ) . '" width="' . esc_attr( $width ) . '" height="' . esc_attr( $height ) . '" frameborder="0" style="' . esc_attr( $style ) . '" allowfullscreen></iframe>';
	} else {
		return '<iframe src="https://www.youtube.com/embed/' . rawurlencode( $id ) . '" width="' . esc_attr( $width ) . '" height="' . esc_attr( $height ) . '" frameborder="0" style="' . esc_attr( $style ) . '" allowfullscreen></iframe>';
	}
} );

add_shortcode( 'pwp-vimeo', function( $atts ) {
	extract( shortcode_atts( array(
		'id' => '',
		'width' => 640,
		'height' => 360,
		'style' => ''
	), $atts ) );

	return '<iframe src="https://player.vimeo.com/video/' . rawurlencode( $id ) . '" width="' . esc_attr( $width ) . '" height="' . esc_attr( $height ) . '" frameborder="0" style="' . esc_attr( $style ) . '" allowfullscreen></iframe>';
} );

add_shortcode( 'pwp-fb-video', function( $atts ) {
	extract( shortcode_atts( array(
		'href' => '',
		'width' => 560,
		'height' => 314,
		'style' => ''
	), $atts ) );

	return '<iframe src="https://www.facebook.com/plugins/video.php?height=' . rawurlencode( $height ) . '&href=' . rawurlencode( $href ) . '&show_text=false&width=' . rawurlencode( $width ) . '" width="' . esc_attr( $width ) . '" height="' . esc_attr( $height ) . '" style="border:none;overflow:hidden;'.$style . '" scrolling="no" frameborder="0" allowTransparency="true" allow="clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>';
} );
