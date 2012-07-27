<?php

/* Social Share Buttons for Posts */
function pwp_social_add_share_buttons( $content ) {
	$options = get_option( 'pwp_social_fields' );

	$url = urlencode( get_permalink( $post->ID ) );

	$beforesharebuttons = '<div class="pwp-social-share-buttons" style="margin:1em 0 .5em;clear:both;">';
	$aftersharebuttons = '<div style="clear:both;height:0px;"></div></div>';

	$fblike_button = '';
	$fbsend_button = '';
	$plusone_button = '';
	$plusoneshare_button = '';
	$tweet_button = '';

	if ( $options['fblikeposts'] == '1' )
		$fblike_button = '<div class="pwp-fblike" style="float:left;margin:0 .5em .5em 0;"><div class="fb-like" data-href="'.$url.'" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div></div>';

	if ( $options['fbsendposts'] == 'true' )
		$fbsend_button = '<div class="pwp-fbsend" style="float:left;margin:0 .5em .5em 0;"><div class="fb-send" data-href="'.$url.'"></div></div>';

	if ( $options['plusoneposts'] == '1' )
		$plusone_button = '<div class="pwp-plusone" style="float:left;margin:0 .5em .5em 0;"><div class="g-plusone" data-size="medium"></div></div>';

	if ( $options['plusoneshareposts'] == '1' )
		$plusoneshare_button = '<div class="pwp-plusoneshare" style="float:left;margin:0 .5em .5em 0;"><div class="g-plus" data-action="share" data-annotation="bubble"></div></div>';

	if ( $options['tweetposts'] == '1' )
		$tweet_button = '<div class="pwp-tweet" style="float:left;margin:0 0 .5em 0"><a href="https://twitter.com/share" class="twitter-share-button" data-lang="hu"></a></div>';

	$social_buttons = $beforesharebuttons . $fblike_button . $fbsend_button . $plusone_button . $plusoneshare_button . $tweet_button . $aftersharebuttons;

	if ( $options['sharebuttonsplace'] == 'after' ) {
		$content = $content . $social_buttons;
	}
	else {
		$content = $social_buttons . $content;
	}

	return $content;
}

function pwp_social_share_buttons_actions() {
	$options = get_option( 'pwp_social_fields' );

	if ( $options['fblikeposts'] == '1' || $options['plusoneposts'] == '1' || $options['tweetposts'] == '1' ) {
		if ( is_single() )
			add_filter( 'the_content', 'pwp_social_add_share_buttons', 20 );
	}
}
add_action( 'wp_head', 'pwp_social_share_buttons_actions' );

function pwp_google_plus_link_website() {
	$options = get_option( 'pwp_social_fields' );

	if ( $options['plusone_id'] != '' ) {
		echo '<link href="https://plus.google.com/'.$options['plusone_id'].'" rel="publisher" />';
	}
}
add_action( 'wp_head', 'pwp_google_plus_link_website' );

/* Load scripts when needed */
function pwp_social_scripts_in_footer() {
	$options = get_option( 'pwp_social_fields' );

	/* Facebook script */
	if ( $options['fblike'] == '1' || $options['fblikeposts'] == '1' || $options['fbpageurl'] != '' ) {
		?><div id="fb-root"></div>
		<script>(function(d, s, id){var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/hu_HU/all.js#xfbml=1";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script><?php
	}

	/* Google+ badge script */
	if ( $options['plusone_id'] != '' ) {
		?><script type="text/javascript">window.___gcfg = {lang: 'hu'};(function(){var po = document.createElement("script");po.type = "text/javascript"; po.async = true;po.src = "https://apis.google.com/js/plusone.js";var s = document.getElementsByTagName("script")[0];s.parentNode.insertBefore(po, s);})();</script><?php
	}

	/* Google +1 script */
	if ( $options['plusoneposts'] == '1' ) {
		?><script type="text/javascript">window.___gcfg = {lang: 'hu', parsetags: 'onload'};(function(){var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(po, s);})();</script><?php
	}

	/* Twitter script */
	if ( $options['tweetposts'] == '1' || $options['twittername'] != '' ) {
		?><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script><?php
	}

	$options = get_option( 'pwp_twitter_bootstrap' );

	/* Twitter Bootstrap script */
	if ( $options['activate_bootstrap'] == '1' ) {
		?><script type="text/javascript">
			!function ($) {
				$(function() {
					$(".tip").tooltip()
					$(".pop").popover()
				})
			}(window.jQuery)
		</script><?php
	}

}
add_action( 'wp_footer', 'pwp_social_scripts_in_footer' );

/* Load scripts */
function pwp_load_scripts() {
	/* Twitter Bootstrap */
	$options = get_option( 'pwp_twitter_bootstrap' );
	if ( $options['activate_bootstrap'] == '1' ) {
		wp_enqueue_script( 'bootstrap-scripts', PWP_PLUGIN_URL . '/js/bootstrap.min.js', array( 'jquery' ), '2.0.3', true );
	  wp_enqueue_style( 'bootstrap-styles', PWP_PLUGIN_URL . '/css/bootstrap.min.css', false, '2.0.3' );
	}
}
/* add_action( 'wp_enqueue_scripts', 'pwp_load_scripts' ); */

