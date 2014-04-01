<?php

/* Custom Style for Social Share Buttons */
function pwp_social_styles() { ?>

<style type="text/css">
	.pwp-share-buttons{background:rgba(0,0,0,0.05);margin:1em 0 !important;padding:0.5em 1em;border-top:1px solid #ddd;border-bottom:1px solid #ddd;clear:both;}
	.pwp-share-buttons li{display:inline-block;margin:7px 0 0 10px;}
	.pwp-share-buttons .fb_iframe_widget span{float:left;}
	.pwp-share-buttons iframe{margin:0;padding:0;}
	.pwp-share-buttons li.pwp-share-text{margin:0;padding:0;line-height:34px;font-size:smaller;font-weight:bold;float:left;}
</style>
<?php
}
add_action( 'wp_head', 'pwp_social_styles' );

/* Social Share Buttons for Posts */
function pwp_social_add_share_buttons( $content ) {
	global $post;
	$options = get_option( 'pwp_social_fields' );

	$url = get_permalink();

	$beforesharebuttons = '<ul class="pwp-share-buttons">';
	$aftersharebuttons = '</ul>';

	$share_text = '<li class="pwp-share-text">' . __( 'Megosztás', 'surbma-premium-wordpress' ) . ':</li>';

	$fblike_button = '';
	$plusone_button = '';
	$tweet_button = '';
	$linkedin_button = '';

	if ( $options['fblikeposts'] == '1' )
		$fblike_button = '<li class="pwp-fblike"><div class="fb-like" data-href="'.$url.'" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div></li>';

	if ( $options['plusoneposts'] == '1' )
		$plusone_button = '<li class="pwp-plusone"><div class="g-plusone" data-size="medium"></div></li>';

	if ( $options['tweetposts'] == '1' )
		$tweet_button = '<li class="pwp-tweet"><a href="https://twitter.com/share" class="twitter-share-button" data-lang="'.substr( get_locale(), 0, 2 ).'"></a></li>';

	if ( $options['linkedinposts'] == '1' )
		$linkedin_button = '<li class="pwp-linkedin"><script type="IN/Share" data-counter="right"></script></li>';

	$social_buttons = $beforesharebuttons . $share_text . $fblike_button . $plusone_button . $tweet_button . $linkedin_button . $aftersharebuttons;

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

	if ( is_singular( 'post' ) ) {
		if ( $options['fblikeposts'] == '1' || $options['plusoneposts'] == '1' || $options['tweetposts'] == '1' )
			add_filter( 'the_content', 'pwp_social_add_share_buttons', 20 );
	}
}
add_action( 'wp_head', 'pwp_social_share_buttons_actions' );

/* Load scripts when needed */
function pwp_social_scripts_in_footer() {
	$options = get_option( 'pwp_social_fields' );
	$language = get_locale();

	/* Facebook script */
	if ( $options['fblike'] == '1' || $options['fblikeposts'] == '1' || $options['fbpageurl'] != '' ) {
		?><div id="fb-root"></div>
		<script>(function(d, s, id){var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/<?php echo $language; ?>/all.js#xfbml=1";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script><?php
	}

	/* Google+ badge script */
	if ( $options['plusone_id'] != '' ) {
		?><script type="text/javascript">window.___gcfg = {lang:'<?php echo substr( $language, 0, 2 ); ?>'};(function(){var po = document.createElement('script');po.type = 'text/javascript';po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(po, s);})();</script><?php
	}

	/* Google +1 script */
	if ( $options['plusone'] == '1' || $options['plusoneposts'] == '1' ) {
		?><script type="text/javascript">window.___gcfg = {lang: '<?php echo substr( $language, 0, 2 ); ?>', parsetags: 'onload'};(function(){var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(po, s);})();</script><?php
	}

	/* Twitter script */
	if ( $options['tweetposts'] == '1' || $options['twittername'] != '' ) {
		?><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script><?php
	}

	/* LinkedIn script */
	if ( $options['linkedin'] == '1' || $options['linkedinposts'] == '1' ) {
		?><script src="//platform.linkedin.com/in.js" type="text/javascript"></script><?php
	}

}
add_action( 'wp_footer', 'pwp_social_scripts_in_footer' );

