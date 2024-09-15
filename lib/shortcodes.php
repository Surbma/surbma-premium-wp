<?php

add_shortcode( 'pwp-oldal', function( $atts ) {
	extract( shortcode_atts( array(
		'id' => ''
	), $atts ) );

	$thispage = get_page( $id );
	return do_shortcode( $thispage->post_content );
} );

add_shortcode( 'pwp-bejegyzes', function( $atts ) {
	extract( shortcode_atts( array(
		'id' => ''
	), $atts ) );

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
	return '<div style="display:none;">'.do_shortcode( $content ).'</div>';
} );

add_shortcode( 'div', function( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id' => '',
		'class' => '',
		'style' => ''
	), $atts ) );

	return '<div id="'.$id.'" class="'.$class.'" style="'.$style.'">'.do_shortcode( $content ).'</div>';
} );

add_shortcode( 'mailto', function( $atts, $content = null ) {
	$encodedmail = '';
	for ( $i = 0; $i <strlen( $content ); $i++ ) $encodedmail .= "&#" . ord( $content[$i] ) . ';';
	return '<a href="mailto:'.$encodedmail.'">'.$encodedmail.'</a>';
} );

add_shortcode( 'tel', function( $atts, $content = null ) {
	return '<a href="tel:+' . preg_replace('/\D/', '', $content) . '">' . $content . '</a>';
} );

add_shortcode( 'vendeg', function( $atts, $content = null ) {
	if ( ( !is_user_logged_in() && !is_null( $content ) ) || is_feed() ) :
		return do_shortcode( $content );
	endif;
	return '';
} );

add_shortcode( 'tag', function( $atts, $content = null ) {
	if ( is_user_logged_in() && !is_null( $content ) && !is_feed() ) :
		return do_shortcode( $content );
	endif;
	return '';
} );

add_shortcode( 'nev', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['name'];
} );

add_shortcode( 'ceg', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['company'];
} );

add_shortcode( 'cim', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['address'];
} );

add_shortcode( 'adoszam', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['vat'];
} );

add_shortcode( 'cegjegyzekszam', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['companyid'];
} );

add_shortcode( 'bankszamlaszam', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['bankid'];
} );

add_shortcode( 'email', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	$email = $options['email'];
	$mailto = '[mailto]'.$email.'[/mailto]';
	return do_shortcode( $mailto );
} );

add_shortcode( 'mobiltelefon', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return '<a href="tel:+' . preg_replace('/\D/', '', $options['mobilephone']) . '">' . $options['mobilephone'] . '</a>';
} );

add_shortcode( 'telefon', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return '<a href="tel:+' . preg_replace('/\D/', '', $options['phone']) . '">' . $options['phone'] . '</a>';
} );

add_shortcode( 'fax', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['fax'];
} );

add_shortcode( 'skype', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return '<a class="pwp-skype" href="skype:'.$options['skype'].'?call">'.$options['skype'].'</a>';
} );

add_shortcode( 'ceginfo', function() {
	$options = get_option( 'surbma_premium_wp_extra_fields' );
	return $options['companyinfo'];
} );

add_shortcode( 'pwp-ev', function() {
	return date( 'Y' );
} );

function surbma_premium_wp_facebook_script() {
	echo '<div id="fb-root"></div>';
	echo '<script async defer crossorigin="anonymous" src="https://connect.facebook.net/' . get_locale() . '/sdk.js#xfbml=1&version=v17.0&appId=256155317784646&autoLogAppEvents=1" nonce="U27L1WCv"></script>';
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

	return '<div class="fb-like" data-href="'.$url.'" data-width="'.$width.'" data-layout="'.$layout.'" data-action="'.$action.'" data-size="'.$size.'" data-show-faces="'.$show_faces.'" data-share="'.$share.'"></div>';
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

	return '<div class="fb-like" data-href="'.$url.'" data-width="'.$width.'" data-layout="'.$layout.'" data-action="'.$action.'" data-size="'.$size.'" data-show-faces="'.$show_faces.'" data-share="'.$share.'"></div>';
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

	return '<div class="fb-share-button" data-href="'.$url.'" data-layout="'.$layout.'" data-size="'.$size.'"></div>';
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
		return '<div class="fb-page" data-href="'.$url.'" data-width="'.$width.'" data-height="'.$height.'" data-tabs="'.$tabs.'" data-small-header="'.$small_header.'" data-adapt-container-width="'.$adapt_container_width.'" data-hide-cover="'.$hide_cover.'" data-show-facepile="'.$show_facepile.'"><blockquote cite="'.$url.'" class="fb-xfbml-parse-ignore"><a href="'.$url.'">'.$url.'</a></blockquote></div>';
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

	return '<a href="'.$href.'" class="'.$class.'" id="'.$id.'" style="'.$style.'" title="'.$title.'" target="'.$target.'" onClick="'.$onclick.'">'.do_shortcode( $content ).'</a>';
} );

add_shortcode( 'google-maps', function( $atts ) {
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
		return '<style>.google-maps {margin: 0 0 1em;max-width: '.$width.'px;}.google-maps-wrap {position: relative;padding-bottom: '.$height.'%;height: 0;overflow: hidden;}.google-maps iframe {position: absolute;top: 0;left: 0;width: 100% !important;height: 100% !important;}</style><div class="google-maps"><div class="google-maps-wrap"><iframe width="1000" height="550" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?zoom='.$zoom.'&q=place_id:'.$place_id.'&maptype='.$maptype.'&key='.$key.'" allowfullscreen></iframe></div></div>';
	} elseif( $mode == 'view' && $lat != '' && $long != '' ) {
		return '<style>.google-maps {margin: 0 0 1em;max-width: '.$width.'px;}.google-maps-wrap {position: relative;padding-bottom: '.$height.'%;height: 0;overflow: hidden;}.google-maps iframe {position: absolute;top: 0;left: 0;width: 100% !important;height: 100% !important;}</style><div class="google-maps"><div class="google-maps-wrap"><iframe width="1000" height="550" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/view?zoom='.$zoom.'&center='.$lat.'%2C'.$long.'&maptype='.$maptype.'&key='.$key.'" allowfullscreen></iframe></div></div>';
	} else {
		return;
	}
} );

add_shortcode( 'google-docs', function( $atts ) {
	extract( shortcode_atts( array(
		'src' => '',
		'scrolling' => 'auto',
		'width' => '100%',
		'height' => 500
	), $atts ) );

	return '<iframe src="https://docs.google.com/document/d/e/'.$src.'" width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="'.$scrolling.'"></iframe>';
} );

add_shortcode( 'google-calendar', function( $atts ) {
	extract( shortcode_atts( array(
		'src' => '',
		'scrolling' => 'auto',
		'width' => 400,
		'height' => 300
	), $atts ) );

	return '<iframe src="https://www.google.com/calendar/embed?'.$src.'" width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="'.$scrolling.'"></iframe>';
} );

add_shortcode( 'google-presentation', function( $atts ) {
	extract( shortcode_atts( array(
		'id' => '',
		'start' => 'false',
		'loop' => 'false',
		'delayms' => 3000,
		'width' => 400,
		'height' => 300
	), $atts ) );

	return '<iframe src="https://docs.google.com/presentation/d/'.$id.'/embed?start='.$start.'&loop='.$loop.'&delayms='.$delayms.'" frameborder="0" width="'.$width.'" height="'.$height.'" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>';
} );

add_shortcode( 'google-form', function( $atts ) {
	extract( shortcode_atts( array(
		'id' => '',
		'width' => 760,
		'height' => 500
	), $atts ) );

	return '<iframe src="https://docs.google.com/forms/d/'.$id.'/viewform?embedded=true#start=embed" width="'.$width.'" height="'.$height.'" frameborder="0" marginheight="0" marginwidth="0"></iframe>';
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
		return '<iframe src="https://www.youtube-nocookie.com/embed/'.$id.'" width="'.$width.'" height="'.$height.'" frameborder="0" style="'.$style.'" allowfullscreen></iframe>';
	} else {
		return '<iframe src="https://www.youtube.com/embed/'.$id.'" width="'.$width.'" height="'.$height.'" frameborder="0" style="'.$style.'" allowfullscreen></iframe>';
	}
} );

add_shortcode( 'pwp-vimeo', function( $atts ) {
	extract( shortcode_atts( array(
		'id' => '',
		'width' => 640,
		'height' => 360,
		'style' => ''
	), $atts ) );

	return '<iframe src="https://player.vimeo.com/video/'.$id.'" width="'.$width.'" height="'.$height.'" frameborder="0" style="'.$style.'" allowfullscreen></iframe>';
} );

add_shortcode( 'pwp-fb-video', function( $atts ) {
	extract( shortcode_atts( array(
		'href' => '',
		'width' => 560,
		'height' => 314,
		'style' => ''
	), $atts ) );

	return '<iframe src="https://www.facebook.com/plugins/video.php?height='.$height.'&href='.esc_attr( $href ).'&show_text=false&width='.$width.'" width="'.$width.'" height="'.$height.'" style="border:none;overflow:hidden;'.$style.'" scrolling="no" frameborder="0" allowTransparency="true" allow="clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>';
} );
