<?php

function surbma_premium_wp_scripts() {
	wp_register_style( 'surbma-premium-wp', plugins_url( '', dirname(__FILE__) ) . '/css/frontend.css' );
}
add_action( 'wp_enqueue_scripts', 'surbma_premium_wp_scripts' );

// Social Share Buttons
function surbma_premium_wp_social_buttons_show() {
	$divi_page_builder_used = wp_basename( get_bloginfo( 'template_directory' ) ) == 'Divi' ? et_pb_is_pagebuilder_used( get_the_ID() ) : false;

	$options = get_option( 'surbma_premium_wp_social_fields' );

	// Show Social Buttons on Posts
	if( isset( $options['socialposts'] ) && $options['socialposts'] == 1 && is_singular( 'post' ) && !$divi_page_builder_used ) {
		wp_enqueue_style( 'surbma-premium-wp' );
		add_filter( 'the_content', 'surbma_premium_wp_social_add_share_buttons', 20 );
	}

	// Show Social Buttons on Pages
	if( isset( $options['socialpages'] ) && $options['socialpages'] == 1 && is_page() && !is_page_template() && !$divi_page_builder_used ) {
		wp_enqueue_style( 'surbma-premium-wp' );
		add_filter( 'the_content', 'surbma_premium_wp_social_add_share_buttons', 20 );
	}

	// Show Social Buttons on CPTs
	if( isset( $options['socialcpts'] ) && $options['socialcpts'] != '' ) {
		$includeposttypes = $options['socialcpts'] ? explode( ',', $options['socialcpts'] ) : '';
		if( is_singular( $includeposttypes ) && !$divi_page_builder_used ) {
			wp_enqueue_style( 'surbma-premium-wp' );
			add_filter( 'the_content', 'surbma_premium_wp_social_add_share_buttons', 20 );
		}
	}
}
add_action( 'wp_head', 'surbma_premium_wp_social_buttons_show' );

function surbma_premium_wp_social_add_share_buttons( $content, $intheloop = true ) {
	$options = get_option( 'surbma_premium_wp_social_fields' );

	if ( $intheloop == false || ( is_main_query() && in_the_loop() ) ) {
		if ( $options['fblikeposts'] == '1' || $options['tweetposts'] == '1' || $options['linkedinposts'] == '1' || $options['pinitposts'] == '1' || $options['emailposts'] == '1' ) {

			global $post;

			$url = get_permalink();

			$fblike_button = '';
			$tweet_button = '';
			$linkedin_button = '';
			$pinterest_button = '';
			$email_button = '';

			$button_style = $options['sharebuttonsstyle'];

			if ( $options['fblikeposts'] == '1' )
				$fblike_button = '<li class="pwp-facebook"><a href="https://www.facebook.com/sharer/sharer.php?u='.$url.'" target="_blank"><span></span></a></li>';

			if ( $options['tweetposts'] == '1' )
				$tweet_button = '<li class="pwp-twitter"><a href="https://twitter.com/home?status='.$url.'" target="_blank"><span></span></a></li>';

			if ( $options['linkedinposts'] == '1' )
				$linkedin_button = '<li class="pwp-linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url='.$url.'" target="_blank"><span></span></a></li>';

			if ( $options['pinitposts'] == '1' )
				$pinterest_button = '<li class="pwp-pinterest"><a href="https://pinterest.com/pin/create/button/?url='.$url.'" target="_blank"><span></span></a></li>';

			if ( $options['emailposts'] == '1' )
				$email_button = '<li class="pwp-email"><a href="mailto:?body='.$url.'"><span></span></a></li>';

			$social_buttons = '<ul class="pwp-share-buttons pwp-' . $button_style . '">' . $fblike_button . $tweet_button . $linkedin_button . $pinterest_button . $email_button . '</ul>';

			if ( $options['sharebuttonsplace'] == 'before' ) {
				$content = $social_buttons . $content;
			}
			elseif ( $options['sharebuttonsplace'] == 'after' ) {
				$content = $content . $social_buttons;
			}
			else {
				$content = $social_buttons . $content . $social_buttons;
			}

		}
	}
	return $content;
}

function surbma_premium_wp_pwp_social_buttons_function() {
	wp_enqueue_style( 'surbma-premium-wp' );
	return surbma_premium_wp_social_add_share_buttons( $content, false );
}
add_shortcode( 'pwp-social-buttons', 'surbma_premium_wp_pwp_social_buttons_function' );

function surbma_premium_wp_google_tag_manager_script_display() {
	$options = get_option( 'surbma_premium_wp_google_tag_manager_fields' );
	if ( isset( $options['containerid'] ) && $options['containerid'] != '' ) {
?>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','<?php echo $options['containerid']; ?>');</script>
<?php }
}
add_action( 'wp_head', 'surbma_premium_wp_google_tag_manager_script_display', 0 );

function surbma_premium_wp_google_tag_manager_noscript_display() {
	$options = get_option( 'surbma_premium_wp_google_tag_manager_fields' );
	if ( isset( $options['containerid'] ) && $options['containerid'] != '' ) {
?>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $options['containerid']; ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<?php }
}
if ( wp_basename( get_bloginfo( 'template_directory' ) ) == 'genesis' ) {
	add_action( 'genesis_before', 'surbma_premium_wp_google_tag_manager_noscript_display', 0 );
}
elseif ( wp_basename( get_bloginfo( 'stylesheet_directory' ) ) == 'Divi-Plus' ) {
	add_action( 'divi_plus_body', 'surbma_premium_wp_google_tag_manager_noscript_display', 0 );
}
elseif ( wp_basename( get_bloginfo( 'stylesheet_directory' ) ) == 'Extra-Plus' ) {
	add_action( 'extra_plus_body', 'surbma_premium_wp_google_tag_manager_noscript_display', 0 );
}
else {
	add_action( 'wp_footer', 'surbma_premium_wp_google_tag_manager_noscript_display', 0 );
}
