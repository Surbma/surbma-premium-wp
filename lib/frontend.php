<?php

add_action( 'wp_enqueue_scripts', function() {
	wp_register_style( 'surbma-premium-wp', plugins_url( '', dirname(__FILE__) ) . '/css/frontend.css', array(), '20250622f' );
	wp_register_script( 'surbma-premium-wp-social-share', plugins_url( '', dirname(__FILE__) ) . '/js/social-share.js', array(), '20250622e', true );
} );

function surbma_premium_wp_maybe_enqueue_social_share_script() {
	$options = get_option( 'surbma_premium_wp_social_fields' );
	if ( is_array( $options ) && isset( $options['copylinkposts'] ) && $options['copylinkposts'] == 1 ) {
		wp_enqueue_script( 'surbma-premium-wp-social-share' );
	}
}

// Social Share Buttons
add_action( 'wp_head', function() {
	// If current page/post is built with Divi Pagebuilder, then return
	$divi_page_builder_used = function_exists( 'et_pb_is_pagebuilder_used' ) ? et_pb_is_pagebuilder_used( get_the_ID() ) : false;
	if ( $divi_page_builder_used ) {
		return;
	}

	$options = get_option( 'surbma_premium_wp_social_fields' );

	// Show Social Buttons on Posts
	if( isset( $options['socialposts'] ) && $options['socialposts'] == 1 && is_singular( 'post' ) ) {
		wp_enqueue_style( 'surbma-premium-wp' );
		surbma_premium_wp_maybe_enqueue_social_share_script();
		add_filter( 'the_content', 'surbma_premium_wp_social_add_share_buttons', 20 );
	}

	// Show Social Buttons on Pages
	if( isset( $options['socialpages'] ) && $options['socialpages'] == 1 && is_page() && !is_page_template() ) {
		wp_enqueue_style( 'surbma-premium-wp' );
		surbma_premium_wp_maybe_enqueue_social_share_script();
		add_filter( 'the_content', 'surbma_premium_wp_social_add_share_buttons', 20 );
	}

	// Show Social Buttons on CPTs
	if( isset( $options['socialcpts'] ) && $options['socialcpts'] != '' ) {
		$includeposttypes = $options['socialcpts'] ? explode( ',', $options['socialcpts'] ) : '';
		if( is_singular( $includeposttypes ) ) {
			wp_enqueue_style( 'surbma-premium-wp' );
			surbma_premium_wp_maybe_enqueue_social_share_script();
			add_filter( 'the_content', 'surbma_premium_wp_social_add_share_buttons', 20 );
		}
	}
} );

add_shortcode( 'pwp-social-buttons', function( $atts ) {
	$atts = shortcode_atts( array( 'id' => 0 ), $atts, 'pwp-social-buttons' );
	wp_enqueue_style( 'surbma-premium-wp' );
	surbma_premium_wp_maybe_enqueue_social_share_script();
	return surbma_premium_wp_get_share_buttons_html( (int) $atts['id'] );
} );

function surbma_premium_wp_get_share_buttons_html( $post_id = 0 ) {
	$options = get_option( 'surbma_premium_wp_social_fields' );
	if ( ! is_array( $options ) ) {
		return '';
	}

	$fblikeposts   = isset( $options['fblikeposts'] ) && $options['fblikeposts'] == '1';
	$tweetposts    = isset( $options['tweetposts'] ) && $options['tweetposts'] == '1';
	$linkedinposts = isset( $options['linkedinposts'] ) && $options['linkedinposts'] == '1';
	$pinitposts    = isset( $options['pinitposts'] ) && $options['pinitposts'] == '1';
	$emailposts    = isset( $options['emailposts'] ) && $options['emailposts'] == '1';
	$copylinkposts = isset( $options['copylinkposts'] ) && $options['copylinkposts'] == '1';

	if ( ! $fblikeposts && ! $tweetposts && ! $linkedinposts && ! $pinitposts && ! $emailposts && ! $copylinkposts ) {
		return '';
	}

	$post_id = $post_id ? absint( $post_id ) : get_queried_object_id();
	if ( ! $post_id && in_the_loop() ) {
		$post_id = get_the_ID();
	}
	if ( ! $post_id ) {
		return '';
	}

	$url   = get_permalink( $post_id );
	$title = get_the_title( $post_id );
	if ( ! $url ) {
		return '';
	}

	$encoded_url   = rawurlencode( $url );
	$encoded_title = rawurlencode( $title );

	$fblike_button    = '';
	$tweet_button     = '';
	$linkedin_button  = '';
	$pinterest_button = '';
	$email_button     = '';
	$copylink_button  = '';

	$button_style = isset( $options['sharebuttonsstyle'] ) ? $options['sharebuttonsstyle'] : 'simple-mono';

	if ( $fblikeposts ) {
		$fblike_button = '<li class="pwp-facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=' . $encoded_url . '" target="_blank" rel="noopener noreferrer"><span></span></a></li>';
	}

	if ( $tweetposts ) {
		$tweet_button = '<li class="pwp-x"><a href="https://x.com/intent/tweet?text=' . $encoded_title . '&url=' . $encoded_url . '" target="_blank" rel="noopener noreferrer"><span></span></a></li>';
	}

	if ( $linkedinposts ) {
		$linkedin_button = '<li class="pwp-linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=' . $encoded_url . '&title=' . $encoded_title . '" target="_blank" rel="noopener noreferrer"><span></span></a></li>';
	}

	if ( $pinitposts ) {
		$pinterest_button = '<li class="pwp-pinterest"><a href="https://pinterest.com/pin/create/button/?url=' . $encoded_url . '&description=' . $encoded_title . '" target="_blank" rel="noopener noreferrer"><span></span></a></li>';
	}

	if ( $emailposts ) {
		$email_button = '<li class="pwp-email"><a href="mailto:?subject=' . $encoded_title . '&body=' . $encoded_url . '"><span></span></a></li>';
	}

	if ( $copylinkposts ) {
		$copylink_button = '<li class="pwp-copy-link"><button type="button" data-url="' . esc_attr( $url ) . '" aria-label="' . esc_attr__( 'Link másolása', 'surbma-premium-wp' ) . '"><span class="pwp-copy-icon"></span><span class="pwp-check-icon"></span></button></li>';
	}

	return '<ul class="pwp-share-buttons pwp-' . esc_attr( $button_style ) . '">' . $fblike_button . $tweet_button . $linkedin_button . $pinterest_button . $email_button . $copylink_button . '</ul>';
}

function surbma_premium_wp_social_add_share_buttons( $content ) {
	$options = get_option( 'surbma_premium_wp_social_fields' );
	if ( ! is_array( $options ) ) {
		return $content;
	}

	$social_buttons = surbma_premium_wp_get_share_buttons_html();
	if ( $social_buttons === '' ) {
		return $content;
	}

	if ( $content ) {
		if ( is_main_query() && in_the_loop() ) {
			$sharebuttonsplace = isset( $options['sharebuttonsplace'] ) ? $options['sharebuttonsplace'] : 'before';
			if ( $sharebuttonsplace == 'before' ) {
				$content = $social_buttons . $content;
			} elseif ( $sharebuttonsplace == 'after' ) {
				$content = $content . $social_buttons;
			} else {
				$content = $social_buttons . $content . $social_buttons;
			}
		}
		return $content;
	}

	return $social_buttons;
}

// Insert Google Analytics script
add_action( 'wp_head', function() {
	$options = get_option( 'surbma_premium_wp_google_analytics_fields' );
	if ( ! is_array( $options ) ) return;
	$universalid = $options['universalid'] ?? false;
	$anonymizeip = $options['anonymizeip'] ?? false;
	if ( $universalid ) {
?>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo rawurlencode( $universalid ); ?>"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', '<?php echo esc_attr( $universalid ); ?>');
	<?php if ( $anonymizeip == '1' ) echo "gtag('set', {'anonymize_ip': true});"; ?>
	<?php do_action( 'surbma_premium_wp_gtag_settings' ); ?>
</script>
<?php }
}, 0 );

// Insert Google Tag Manager script
add_action( 'wp_head', function() {
	$options = get_option( 'surbma_premium_wp_google_tag_manager_fields' );
	$containerid = $options['containerid'] ?? false;
	if ( $containerid ) {
		echo "<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','" . esc_attr( $options['containerid'] ) . "');</script>";
	}
}, 0 );

if ( function_exists( 'wp_body_open' ) ) {
	add_action( 'wp_body_open', function() {
		$options = get_option( 'surbma_premium_wp_google_tag_manager_fields' );
		$containerid = $options['containerid'] ?? false;
		if ( $containerid ) {
			echo '<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=' . rawurlencode( $containerid ) . '" height="0" width="0" style="display:none;visibility:hidden;"></iframe></noscript>';
		}
	}, 0 );
}
