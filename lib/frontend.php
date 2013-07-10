<?php

/* Social Share Buttons for Posts */
function pwp_social_add_share_buttons( $content ) {
	global $post;
	$options = get_option( 'pwp_social_fields' );

	$url = urlencode( get_permalink( $post->ID ) );

	$beforesharebuttons = '<div class="pwp-social-share-buttons" style="margin:1em 0;padding:1em 0 .5em;border-top:1px solid #ddd;border-bottom:1px solid #ddd;clear:both;">';
	$aftersharebuttons = '<div style="clear:both;height:0px;"></div></div>';

	$fblike_button = '';
	$plusone_button = '';
	$tweet_button = '';
	$linkedin_button = '';

	if ( $options['fblikeposts'] == '1' )
		$fblike_button = '<div class="pwp-fblike" style="float:left;margin:0 .5em .5em 0;"><div class="fb-like" data-href="'.$url.'" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div></div>';

	if ( $options['plusoneposts'] == '1' )
		$plusone_button = '<div class="pwp-plusone" style="float:left;margin:0 .5em .5em 0;"><div class="g-plusone" data-size="medium"></div></div>';

	if ( $options['tweetposts'] == '1' )
		$tweet_button = '<div class="pwp-tweet" style="float:left;margin:0 .5em .5em 0;"><a href="https://twitter.com/share" class="twitter-share-button" data-lang="hu"></a></div>';

	if ( $options['linkedinposts'] == '1' )
		$linkedin_button = '<div class="pwp-linkedin" style="float:left;margin:0 0 .5em 0;"><script type="IN/Share" data-counter="right"></script></div>';

	$social_buttons = $beforesharebuttons . $fblike_button . $plusone_button . $tweet_button . $linkedin_button . $aftersharebuttons;

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

	if ( is_single() ) {
		if ( $options['fblikeposts'] == '1' || $options['plusoneposts'] == '1' || $options['tweetposts'] == '1' )
			add_filter( 'the_content', 'pwp_social_add_share_buttons', 20 );
	}
}
add_action( 'wp_head', 'pwp_social_share_buttons_actions' );

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
		?><script type="text/javascript">window.___gcfg = {lang:'<?php echo substr( get_bloginfo ( 'language' ), 0, 2 ); ?>'};(function(){var po = document.createElement('script');po.type = 'text/javascript';po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(po, s);})();</script><?php
	}

	/* Google +1 script */
	if ( $options['plusone'] == '1' || $options['plusoneposts'] == '1' ) {
		?><script type="text/javascript">window.___gcfg = {lang: '<?php echo substr( get_bloginfo ( 'language' ), 0, 2 ); ?>', parsetags: 'onload'};(function(){var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(po, s);})();</script><?php
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

function pwp_google_analytics_display() {
	$options = get_option( 'pwp_google_analytics_fields' );
	if ( $options['trackingid'] != '' && !is_user_logged_in() ) {
?>
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', '<?php echo $options['trackingid']; ?>']);
<?php do_action( 'pwp_google_analytics_before_trackpageview' ); ?>
	_gaq.push(['_trackPageview']);
<?php do_action( 'pwp_google_analytics_after_trackpageview' ); ?>

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
<?php }
}
add_action( 'wp_head', 'pwp_google_analytics_display', 999 );

