<?php

//register our widget
function pwp_social_register_widgets() {
	$options = get_option( 'pwp_social_fields' );
	if ( $options['fbpageurl'] != '' )
		register_widget( 'pwp_social_fb_like_box' );
	if ( $options['plusone_id'] != '' )
		register_widget( 'pwp_social_plusone_badge' );
	if ( $options['twittername'] != '' )
		register_widget( 'pwp_social_twitter_follow' );
}
add_action( 'widgets_init', 'pwp_social_register_widgets' );

class pwp_social_fb_like_box extends WP_Widget {

	//process the new widget
	function pwp_social_fb_like_box() {
		$widget_ops = array(
			'classname' => 'pwp_social_fb_like_box',
			'description' => 'Facebook like doboz megjelenítése'
		);

		$this->WP_Widget( 'pwp_social_fb_like_box', 'PWP Facebook like doboz', $widget_ops );
	}

	//build the widget settings form
	function form($instance) {
		$defaults = array(
			'title' => 'Keress minket a Facebookon',
			'fb_page_width' => '270',
			'fb_page_theme' => 'light',
			'fb_page_show_faces' => 'true'
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$title = $instance['title'];
		$fb_page_width = $instance['fb_page_width'];
		$fb_page_height = $instance['fb_page_height'];
		$fb_page_border_color = $instance['fb_page_border_color'];
		$fb_page_background_color = $instance['fb_page_background_color'];
		$fb_page_theme = $instance['fb_page_theme'];
		$fb_page_show_header = $instance['fb_page_show_header'];
		$fb_page_show_stream = $instance['fb_page_show_stream'];
		$fb_page_show_faces = $instance['fb_page_show_faces'];
		?>
		<p><label class="description" for="<?php echo $this->get_field_name( 'title' ); ?>">Cím</label><input class="widefat" id="<?php echo $this->get_field_name( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>"	 type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
		<p><label class="description" for="<?php echo $this->get_field_name( 'fb_page_width' ); ?>">Szélesség</label> <input class="" size="1" maxlength="3" id="<?php echo $this->get_field_name( 'fb_page_width' ); ?>" name="<?php echo $this->get_field_name( 'fb_page_width' ); ?>" type="text" value="<?php echo esc_attr( $fb_page_width ); ?>" /> px</p>
		<p><label class="description" for="<?php echo $this->get_field_name( 'fb_page_height' ); ?>">Magasság</label> <input class="" size="1" maxlength="3" id="<?php echo $this->get_field_name( 'fb_page_height' ); ?>" name="<?php echo $this->get_field_name( 'fb_page_height' ); ?>" type="text" value="<?php echo esc_attr( $fb_page_height ); ?>" /> px - Opcionális</p>
		<p><label class="description" for="<?php echo $this->get_field_name( 'fb_page_border_color' ); ?>">Keret szín</label> <input class="" size="4" id="<?php echo $this->get_field_name( 'fb_page_border_color' ); ?>" name="<?php echo $this->get_field_name( 'fb_page_border_color' ); ?>" type="text" value="<?php echo esc_attr( $fb_page_border_color ); ?>" /><br /><span class="description">Hexadecimális színkódot kell megadni.<br />A kódnak # jellel kell kezdődnie!</span></p>
		<p><label class="description" for="<?php echo $this->get_field_name( 'fb_page_background_color' ); ?>">Háttér szín</label> <input class="" size="4" id="<?php echo $this->get_field_name( 'fb_page_background_color' ); ?>" name="<?php echo $this->get_field_name( 'fb_page_background_color' ); ?>" type="text" value="<?php echo esc_attr( $fb_page_background_color ); ?>" /><br /><span class="description">Hexadecimális színkódot kell megadni.<br />A kódnak # jellel kell kezdődnie!</span></p>
		<p>Szín sablon:
			<select name="<?php echo $this->get_field_name( 'fb_page_theme' ); ?>">
				<option value="light" <?php selected( $fb_page_theme, light ); ?>>Világos</option>
				<option value="dark" <?php selected( $fb_page_theme, dark ); ?>>Sötét</option>
			</select>
		</p>
		<p><input id="<?php echo $this->get_field_name( 'fb_page_show_header' ); ?>" name="<?php echo $this->get_field_name( 'fb_page_show_header' ); ?>" type="checkbox" <?php checked( $fb_page_show_header, 'true' ); ?> /> <label class="description" for="<?php echo $this->get_field_name( 'fb_page_show_header' ); ?>">Fejléc megjelenítése</label></p>
		<p><input id="<?php echo $this->get_field_name( 'fb_page_show_stream' ); ?>" name="<?php echo $this->get_field_name( 'fb_page_show_stream' ); ?>" type="checkbox" <?php checked( $fb_page_show_stream, 'true' ); ?> /> <label class="description" for="<?php echo $this->get_field_name( 'fb_page_show_stream' ); ?>">Hírek megjelenítése</label></p>
		<p><input id="<?php echo $this->get_field_name( 'fb_page_show_faces' ); ?>" name="<?php echo $this->get_field_name( 'fb_page_show_faces' ); ?>" type="checkbox" <?php checked( $fb_page_show_faces, 'true' ); ?> /> <label class="description" for="<?php echo $this->get_field_name( 'fb_page_show_faces' ); ?>">Tagok megjelenítése</label></p>
		<?php
	}

	//save the widget settings
	function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['title'] = wp_filter_nohtml_kses( $new_instance['title'] );
		$instance['fb_page_theme'] = wp_filter_nohtml_kses( $new_instance['fb_page_theme'] );

		$instance['fb_page_show_header'] = ( isset( $new_instance['fb_page_show_header'] ) ? 'true' : 'false' );
		$instance['fb_page_show_stream'] = ( isset( $new_instance['fb_page_show_stream'] ) ? 'true' : 'false' );
		$instance['fb_page_show_faces'] = ( isset( $new_instance['fb_page_show_faces'] ) ? 'true' : 'false' );

		// Our value must be positive integer
		$instance['fb_page_width'] = absint( $new_instance['fb_page_width'] );
		$instance['fb_page_height'] = absint( $new_instance['fb_page_height'] );

		// Must be a hexadecimal color code
		if( preg_match( '/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/i', $new_instance['fb_page_border_color'] ) ) {
			$instance['fb_page_border_color'] = strtolower( $new_instance['fb_page_border_color'] );
		} else {
			$instance['fb_page_border_color'] = null;
		}

		if( preg_match( '/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/i', $new_instance['fb_page_background_color'] ) ) {
			$instance['fb_page_background_color'] = strtolower( $new_instance['fb_page_background_color'] );
		} else {
			$instance['fb_page_background_color'] = null;
		}

		// Default value
		if ( $instance['fb_page_width'] == '' )
			$instance['fb_page_width'] = '270';

		if ( $instance['fb_page_height'] == '' )
			$instance['fb_page_height'] = null;

		return $instance;
	}

	//display the widget
	function widget($args, $instance) {
		extract($args);

		echo $before_widget;

		//load the widget settings
		$title = apply_filters( 'widget_title', $instance['title'] );
		$options = get_option( 'pwp_social_fields' );
		$fbpageurl = $options['fbpageurl'];
		$fb_page_width = empty( $instance['fb_page_width'] ) ? '270' : $instance['fb_page_width'];
		$fb_page_height = empty( $instance['fb_page_height'] ) ? '' : $instance['fb_page_height'];
		$fb_page_border_color = empty( $instance['fb_page_border_color'] ) ? '' : $instance['fb_page_border_color'];
		$fb_page_background_color = empty( $instance['fb_page_background_color'] ) ? 'transparent' : $instance['fb_page_background_color'];
		$fb_page_theme = empty( $instance['fb_page_theme'] ) ? 'light' : $instance['fb_page_theme'];
		$fb_page_show_header = $instance['fb_page_show_header'];
		$fb_page_show_stream = $instance['fb_page_show_stream'];
		$fb_page_show_faces = $instance['fb_page_show_faces'];

		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };

		echo '<div style="background:'.$fb_page_background_color.';width:'.$fb_page_width.'px;margin:1em 0;"><div class="fb-like-box" data-href="'.$fbpageurl.'" data-width="'.$fb_page_width.'" data-height="'.$fb_page_height.'" data-colorscheme="'.$fb_page_theme.'" data-show-faces="'.$fb_page_show_faces.'" data-border-color="'.$fb_page_border_color.'" data-stream="'.$fb_page_show_stream.'" data-header="'.$fb_page_show_header.'"></div></div>';

		echo $after_widget;
	}
}

class pwp_social_plusone_badge extends WP_Widget {

	//process the new widget
	function pwp_social_plusone_badge() {
		$widget_ops = array(
			'classname' => 'pwp_social_plusone_badge',
			'description' => 'Google+ jelvény megjelenítése'
		);

		$this->WP_Widget( 'pwp_social_plusone_badge', 'PWP Google+ jelvény', $widget_ops );
	}

	 //build the widget settings form
	function form($instance) {
		$defaults = array(
			'title' => 'Kövesd a Google+ oldalunkat',
			'plusone_badge_theme' => 'light',
			'plusone_badge_height' => '131',
			'plusone_badge_width' => '270'
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$title = $instance['title'];
		$plusone_badge_theme = $instance['plusone_badge_theme'];
		$plusone_badge_height = $instance['plusone_badge_height'];
		$plusone_badge_width = $instance['plusone_badge_width'];
		?>
		<p><label class="description" for="<?php echo $this->get_field_name( 'title' ); ?>">Cím</label><input class="widefat" id="<?php echo $this->get_field_name( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>"	 type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
		<p>Szín sablon:
			<select name="<?php echo $this->get_field_name( 'plusone_badge_theme' ); ?>">
				<option value="light" <?php selected( $plusone_badge_theme, light ); ?>>Világos</option>
				<option value="dark" <?php selected( $plusone_badge_theme, dark ); ?>>Sötét</option>
			</select>
		</p>
		<p>Méret:
			<select name="<?php echo $this->get_field_name( 'plusone_badge_height' ); ?>">
				<option value="131" <?php selected( $plusone_badge_height, 131 ); ?>>Normál jelvény</option>
				<option value="69" <?php selected( $plusone_badge_height, 69 ); ?>>Kis jelvény</option>
			</select>
		</p>
		<p><label class="description" for="<?php echo $this->get_field_name( 'plusone_badge_width' ); ?>">Szélesség</label> <input class="" size="1" maxlength="3" id="<?php echo $this->get_field_name( 'plusone_badge_width' ); ?>" name="<?php echo $this->get_field_name( 'plusone_badge_width' ); ?>" type="text" value="<?php echo esc_attr( $plusone_badge_width ); ?>" /> px</p>
		<?php
	}

	//save the widget settings
	function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['title'] = wp_filter_nohtml_kses( $new_instance['title'] );
		$instance['plusone_badge_theme'] = wp_filter_nohtml_kses( $new_instance['plusone_badge_theme'] );

		// Our value must be positive integer
		$instance['plusone_badge_height'] = absint( $new_instance['plusone_badge_height'] );
		$instance['plusone_badge_width'] = absint( $new_instance['plusone_badge_width'] );

		// Default value
		if ( $instance['plusone_badge_width'] == '' )
			$instance['plusone_badge_width'] = '270';

		return $instance;
	}

	//display the widget
	function widget($args, $instance) {
		extract($args);

		echo $before_widget;

		//load the widget settings
		$title = apply_filters( 'widget_title', $instance['title'] );
		$options = get_option( 'pwp_social_fields' );
		$plusone_id = $options['plusone_id'];
		$plusone_badge_width = empty( $instance['plusone_badge_width'] ) ? '270' : $instance['plusone_badge_width'];
		$plusone_badge_height = empty( $instance['plusone_badge_height'] ) ? '131' : $instance['plusone_badge_height'];
		$plusone_badge_theme = empty( $instance['plusone_badge_theme'] ) ? 'light' : $instance['plusone_badge_theme'];

		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };

		echo '<div style="margin:1em 0;"><div class="g-plus" data-href="https://plus.google.com/'.$plusone_id.'?rel=publisher" data-width="'.$plusone_badge_width.'" data-height="'.$plusone_badge_height.'" data-theme="'.$plusone_badge_theme.'"></div></div>';

		echo $after_widget;
	}
}

class pwp_social_twitter_follow extends WP_Widget {

	//process the new widget
	function pwp_social_twitter_follow() {
		$widget_ops = array(
			'classname' => 'pwp_social_twitter_follow',
			'description' => 'Twitter követés megjelenítése'
		);

		$this->WP_Widget( 'pwp_social_twitter_follow', 'PWP Twitter követés', $widget_ops );
	}

	 //build the widget settings form
	function form($instance) {
		$defaults = array(
			'title' => 'Kövess minket a Twitteren',
			'twitter_follow_size' => 'large',
			'twitter_follow_count' => 'true',
			'twitter_follow_show_name' => 'true'
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$title = $instance['title'];
		$twitter_follow_size = $instance['twitter_follow_size'];
		$twitter_follow_count = $instance['twitter_follow_count'];
		$twitter_follow_show_name = $instance['twitter_follow_show_name'];
		?>
		<p><label class="description" for="<?php echo $this->get_field_name( 'title' ); ?>">Cím</label><input class="widefat" id="<?php echo $this->get_field_name( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
		<p>Gomb mérete:
			<select name="<?php echo $this->get_field_name( 'twitter_follow_size' ); ?>">
				<option value="large" <?php selected( $twitter_follow_size, large ); ?>>Nagy gomb</option>
				<option value="medium" <?php selected( $twitter_follow_size, medium ); ?>>Kis gomb</option>
			</select>
		</p>
		<p><input id="<?php echo $this->get_field_name( 'twitter_follow_count' ); ?>" name="<?php echo $this->get_field_name( 'twitter_follow_count' ); ?>" type="checkbox" <?php checked( $twitter_follow_count, 'true' ); ?> /> <label class="description" for="<?php echo $this->get_field_name( 'twitter_follow_count' ); ?>">Számláló mutatása</label></p>
		<p><input id="<?php echo $this->get_field_name( 'twitter_follow_show_name' ); ?>" name="<?php echo $this->get_field_name( 'twitter_follow_show_name' ); ?>" type="checkbox" <?php checked( $twitter_follow_show_name, 'true' ); ?> /> <label class="description" for="<?php echo $this->get_field_name( 'twitter_follow_show_name' ); ?>">Felhasználónév megjelenítése</label></p>
		<?php
	}

	//save the widget settings
	function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['title'] = wp_filter_nohtml_kses( $new_instance['title'] );
		$instance['twitter_follow_size'] = wp_filter_nohtml_kses( $new_instance['twitter_follow_size'] );

		$instance['twitter_follow_count'] = ( isset( $new_instance['twitter_follow_count'] ) ? 'true' : 'false' );
		$instance['twitter_follow_show_name'] = ( isset( $new_instance['twitter_follow_show_name'] ) ? 'true' : 'false' );

		return $instance;
	}

	//display the widget
	function widget($args, $instance) {
		extract($args);

		echo $before_widget;

		//load the widget settings
		$title = apply_filters( 'widget_title', $instance['title'] );
		$options = get_option( 'pwp_social_fields' );
		$twitter_name = $options['twittername'];
		$twitter_follow_size = empty( $instance['twitter_follow_size'] ) ? 'large' : $instance['twitter_follow_size'];
		$twitter_follow_count = $instance['twitter_follow_count'];
		$twitter_follow_show_name = $instance['twitter_follow_show_name'];

		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };

		echo '<div style="margin:1em 0;"><a href="https://twitter.com/'.$twitter_name.'" class="twitter-follow-button" data-show-count="'.$twitter_follow_count.'" data-lang="hu" data-size="'.$twitter_follow_size.'" data-show-screen-name="'.$twitter_follow_show_name.'">@'.$twitter_name.' követése</a></div>';

		echo $after_widget;
	}
}

