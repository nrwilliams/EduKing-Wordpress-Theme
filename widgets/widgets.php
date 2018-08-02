<?php
/**********************
  EduKING Widgets
 **********************/



/***  EduKING Contact Info ***/


class wp_EduKING_contact_info extends WP_Widget {

	// constructor
	function wp_EduKING_contact_info() {
		parent::WP_Widget(false, $name = __('EduKING Contact Info', 'wp_widget_plugin'), array( 'description' => __( 'Add information such as phone number and email in the footer.', 'wpb_widget_domain' ),)


);
	}

// widget form creation
function form($instance) {

// Check values
if( $instance) {
     $title = esc_attr($instance['title']);
     $address = esc_attr($instance['address']);
     $phone = esc_attr($instance['phone']);
     $email = esc_attr($instance['email']);
} else {
     $title = '';
     $address = '';
     $phone = '';
     $email = '';
}
?>

<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php ( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>


<p>
<label for="<?php echo $this->get_field_id('address'); ?>"><?php __('Address', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo $address; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('phone'); ?>"><?php __('Phone', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo $phone; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('email'); ?>"><?php __('email', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
</p>


<?php
}

// update widget
function update($new_instance, $old_instance) {
      $instance = $old_instance;
      // Fields
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['address'] = strip_tags($new_instance['address']);
      $instance['phone'] = strip_tags($new_instance['phone']);
      $instance['email'] = strip_tags($new_instance['email']);
     return $instance;
}

// display widget
function widget($args, $instance) {
   extract( $args );
   // these are the widget options
   $title = $instance['title'];
   $address = $instance['address'];
   $phone = $instance['phone'];
   $email = $instance['email'];

    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;

   // Display the widget
echo '<div class="contact-info-widget">';    
echo '<i class="fa fa-home fa-lg"></i>  '.$address.'<br><br>';
echo '<i class="fa fa-phone fa-lg" style="padding-right: 4px;"></i>  '.$phone.'<br><br>';
echo '<i class="fa fa-envelope" style="padding-right: 5px;"></i>  '.$email.'';
echo '</div>';
   echo $after_widget;

}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("wp_EduKING_contact_info");'));

/*** END EduKING Contact Info ***/


/*** EduKING Featured Posts ***/

class rpwe_widget extends WP_Widget {

	/**
	 * Widget setup
	 */
	function __construct() {

		$widget_ops = array(
			'classname'   => 'rpwe_widget recent-posts-extended',
			'description' => __( 'Adds a featured posts section where you can customize many parameters and include a thumbnail.', 'rpwe' )
		);



		parent::__construct( 'rpwe_widget', __( 'EduKING Featured Posts', 'rpwe' ), $widget_ops );

	}

	/**
	 * Display widget
	 */
	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );

		$title          = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$limit          = (int)( $instance['limit'] );
		$offset         = (int)( $instance['offset'] );
		$order          = $instance['order'];
		$orderby        = $instance['orderby'];
		$excerpt        = $instance['excerpt'];
		$length         = (int)( $instance['length'] );
		$thumb          = $instance['thumb'];
		$thumb_height   = (int)( $instance['thumb_height'] );
		$thumb_width    = (int)( $instance['thumb_width'] );
		$thumb_default  = esc_url( $instance['thumb_default'] );
		$thumb_align    = sanitize_html_class( $instance['thumb_align'] );
		$cat            = $instance['cat'];
		$tag            = $instance['tag'];
		$post_type      = $instance['post_type'];
		$date           = $instance['date'];
		$date_format    = strip_tags( $instance['date_format'] );
		$readmore       = $instance['readmore'];
		$readmore_text  = strip_tags( $instance['readmore_text'] );
		$styles_default = $instance['styles_default'];
		$css            = wp_filter_nohtml_kses( $instance['css'] );

		echo $before_widget;

		/* Display the default style of the plugin. */
		if ( $styles_default == true ) {
			rpwe_custom_styles();
		}

		/* If the default style are disable then use the custom css. */
		if ( $styles_default == false && ! empty( $css ) ) {
			echo '<style>' . $css . '</style>';
		}

		/* If both title and title url not empty then display the data. */
		if ( ! empty( $title_url ) && ! empty( $title ) ) {
			echo $before_title . '<a href="' . $title_url . '" title="' . esc_attr( $title ) . '">' . $title . '</a>' . $after_title;
		/* If title not empty and title url empty then display just the title. */
		} elseif ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}

		global $post;

			/* Set up the query arguments. */
			$args = array(
				'posts_per_page'  => $limit,
				'category__in'    => $cat,
				'tag__in'         => $tag,
				'post_type'       => $post_type,
				'offset'          => $offset,
				'order'           => $order,
				'orderby'         => $orderby
			);

			/* Allow developer to filter the query. */
			$default_args = apply_filters( 'rpwe_default_query_arguments', $args );

			/**
			 * The main Query
			 * 
			 * @link http://codex.wordpress.org/Function_Reference/get_posts
			 */
			$rpwewidget = get_posts( $default_args );

		?>

		<div <?php echo( ! empty( $cssID ) ? 'id="' . $cssID . '"' : '' ); ?> class="rpwe-block">

			<ul class="rpwe-ul">

				<?php foreach ( $rpwewidget as $post ) : setup_postdata( $post ); ?>
<div style="border-bottom: 1px solid #f8f8f8;">
					<li class="eduking-featured-posts-thumb">
                          
						
						<?php if ( $thumb == true ) { // Check if the thumbnail option enable. ?>

							<?php if ( has_post_thumbnail() ) { // Check If post has post thumbnail. ?>

								<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'rpwe' ), the_title_attribute('echo=0' ) ); ?>" rel="bookmark">
									<?php the_post_thumbnail( 
										array( $thumb_height, $thumb_width, true ),
										array( 
											'class' => $thumb_align . ' rpwe-thumb the-post-thumbnail',
											'alt'   => esc_attr( get_the_title() ),
											'title' => esc_attr( get_the_title() ) 
										) 
									); ?>
								</a>

							<?php } elseif ( function_exists( 'get_the_image' ) ) { // Check if get-the-image plugin installed and active. ?>

								<?php get_the_image( array( 
									'height'        => $thumb_height,
									'width'         => $thumb_width,
									'size'          => 'rpwe-thumbnail',
									'image_class'   => $thumb_align . ' rpwe-thumb get-the-image',
									'image_scan'    => true,
									'default_image' => $thumb_default
								) ); ?>

							<?php } elseif ( $thumb_default ) { // Check if the default image not empty. ?>

								<?php 
								printf( '<a href="%1$s" rel="bookmark"><img class="%2$s rpwe-thumb rpwe-default-thumb" src="%3$s" alt="%4$s" width="%5$s" height="%6$s"></a>',
									esc_url( get_permalink() ),
									$thumb_align,
									$thumb_default,
									esc_attr( get_the_title() ),
									$thumb_width,
									$thumb_height
								);
								?>

							<?php } // endif ?>

						<?php } // endif ?>
                                        </i>        
                                        <li class="rpwe-clearfix">

						<h3 class="rpwe-title">
							<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'rpwe' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
						</h3>

						<?php if ( $date == true ) { // Check if the date option enable. ?>
							<time class="rpwe-time published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( $date_format ) ); ?></time>
						<?php } // endif ?>

						<?php if ( $excerpt == true ) { // Check if the excerpt option enable. ?>
							<div class="rpwe-summary">
								<?php echo rpwe_excerpt( $length ); ?> 
								<?php if ( $readmore == true ) { echo '<a href="' . esc_url( get_permalink() ) . '" class="more-link">' . $readmore_text . '</a>'; } ?>
							</div>
						<?php } // endif ?>

					</li>
</div>
				<?php endforeach; wp_reset_postdata(); ?>


			</ul>

		</div><!-- .rpwe-block - http://wordpress.org/plugins/recent-posts-widget-extended/ -->

		<?php

		echo $after_widget;

	}

	/**
	 * Update widget
	 */
	function update( $new_instance, $old_instance ) {

		$instance                   = $old_instance;
		$instance['title']          = strip_tags( $new_instance['title'] );
		$instance['limit']          = (int)( $new_instance['limit'] );
		$instance['offset']         = (int)( $new_instance['offset'] );
		$instance['order']          = $new_instance['order'];
		$instance['orderby']        = $new_instance['orderby'];
		$instance['excerpt']        = $new_instance['excerpt'];
		$instance['length']         = (int)( $new_instance['length'] );
		$instance['thumb']          = $new_instance['thumb'];
		$instance['thumb_height']   = (int)( $new_instance['thumb_height'] );
		$instance['thumb_width']    = (int)( $new_instance['thumb_width'] );
		$instance['thumb_default']  = esc_url_raw( $new_instance['thumb_default'] );
		$instance['thumb_align']    = $new_instance['thumb_align'];
		$instance['cat']            = $new_instance['cat'];
		$instance['tag']            = $new_instance['tag'];
		$instance['post_type']      = $new_instance['post_type'];
		$instance['date']           = $new_instance['date'];
		$instance['date_format']    = strip_tags( $new_instance['date_format'] );
		$instance['readmore']       = $new_instance['readmore'];
		$instance['readmore_text']  = strip_tags( $new_instance['readmore_text'] );
		$instance['styles_default'] = $new_instance['styles_default'];
		$instance['css']            = wp_filter_nohtml_kses( $new_instance['css'] );

		return $instance;

	}

	/**
	 * Widget setting
	 */
	function form( $instance ) {

		/* Output widget selector. */
		$css_defaults = ".rpwe-block ul{\n}\n\n.rpwe-block li{\n}\n\n.rpwe-block a{\n}\n\n.rpwe-block h3{\n}\n\n.rpwe-thumb{\n}\n\n.rpwe-summary{\n}\n\n.rpwe-time{\n}\n\n.rpwe-alignleft{\n}\n\n.rpwe-alignright{\n}\n\n.rpwe-alignnone{\n}\n\n.rpwe-clearfix:before,\n.rpwe-clearfix:after{\ncontent: \"\";\ndisplay: table;\n}\n\n.rpwe-clearfix:after{\nclear:both;\n}\n\n.rpwe-clearfix{\nzoom: 1;\n}";

		/* Set up some default widget settings. */
		$defaults = array(
			'title'          => '',
			'limit'          => 5,
			'offset'         => 0,
			'order'          => 'DESC',
			'orderby'        => 'date',
			'excerpt'        => false,
			'length'         => 10,
			'thumb'          => true,
			'thumb_height'   => 45,
			'thumb_width'    => 45,
			'thumb_default'  => 'http://placehold.it/45x45/f0f0f0/ccc',
			'thumb_align'    => 'rpwe-alignleft',
			'cat'            => '',
			'tag'            => '',
			'post_type'      => '',
			'date'           => true,
			'date_format'    => 'F j, Y',
			'readmore'       => false,
			'readmore_text'  => __( 'Read More &raquo;', 'rpwe' ),
			'styles_default' => true,
			'css'            => $css_defaults
		);

		$instance       = wp_parse_args( (array)$instance, $defaults );
		$title            = $instance['title'];
		$limit          = (int)( $instance['limit'] );
		$offset         = (int)( $instance['offset'] );
		$order          = $instance['order'];
		$orderby        = $instance['orderby'];
		$excerpt        = $instance['excerpt'];
		$length         = (int)($instance['length']);
		$thumb          = $instance['thumb'];
		$thumb_height   = (int)( $instance['thumb_height'] );
		$thumb_width    = (int)( $instance['thumb_width'] );
		$thumb_default  = $instance['thumb_default'];
		$thumb_align    = $instance['thumb_align'];
		$cat            = $instance['cat'];
		$tag            = $instance['tag'];
		$post_type      = $instance['post_type'];
		$date           = $instance['date'];
		$date_format    = strip_tags( $instance['date_format'] );
		$readmore       = $instance['readmore'];
		$readmore_text  = strip_tags( $instance['readmore_text'] );
		$styles_default = $instance['styles_default'];
		$css            = wp_filter_nohtml_kses( $instance['css'] );

		?>

		<div class="rpwe-columns-3">

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'rpwe' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo $title; ?>"/>
			</p>

		</div>
		
		<div class="rpwe-columns-3">

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>"><?php _e( 'Limit:', 'rpwe' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'limit' ) ); ?>" type="text" value="<?php echo $limit; ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php _e( 'Offset (the number of posts to skip):', 'rpwe' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="text" value="<?php echo $offset; ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>"><?php _e( 'Order:', 'rpwe' ); ?></label>
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" style="width:100%;">
					<option value="DESC" <?php selected( $order, 'DESC' ); ?>><?php _e( 'DESC', 'rpwe' ) ?></option>
					<option value="ASC" <?php selected( $order, 'ASC' ); ?>><?php _e( 'ASC', 'rpwe' ) ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>"><?php _e( 'Orderby:', 'rpwe' ); ?></label>
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" style="width:100%;">
					<option value="ID" <?php selected( $orderby, 'ID' ); ?>><?php _e( 'ID', 'rpwe' ) ?></option>
					<option value="author" <?php selected( $orderby, 'author' ); ?>><?php _e( 'Author', 'rpwe' ) ?></option>
					<option value="title" <?php selected( $orderby, 'title' ); ?>><?php _e( 'Title', 'rpwe' ) ?></option>
					<option value="date" <?php selected( $orderby, 'date' ); ?>><?php _e( 'Date', 'rpwe' ) ?></option>
					<option value="modified" <?php selected( $orderby, 'modified' ); ?>><?php _e( 'Modified', 'rpwe' ) ?></option>
					<option value="rand" <?php selected( $orderby, 'rand' ); ?>><?php _e( 'Random', 'rpwe' ) ?></option>
					<option value="comment_count" <?php selected( $orderby, 'comment_count' ); ?>><?php _e( 'Comment Count', 'rpwe' ) ?></option>
					<option value="menu_order" <?php selected( $orderby, 'menu_order' ); ?>><?php _e( 'Menu Order', 'rpwe' ) ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat' ) ); ?>"><?php _e( 'Limit to Category: ', 'rpwe' ); ?></label>
			   	<select class="widefat" multiple="multiple" id="<?php echo esc_attr( $this->get_field_id( 'cat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cat' ) ); ?>[]" style="width:100%;">
					<optgroup label="Categories">
						<?php $categories = get_terms( 'category' ); ?>
						<?php foreach( $categories as $category ) { ?>
							<option value="<?php echo $category->term_id; ?>" <?php if ( is_array( $cat ) && in_array( $category->term_id, $cat ) ) echo ' selected="selected"'; ?>><?php echo $category->name; ?></option>
						<?php } ?>
					</optgroup>
   			    </select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'tag' ) ); ?>"><?php _e( 'Limit to Tag: ', 'rpwe' ); ?></label>
			   	<select class="widefat" multiple="multiple" id="<?php echo esc_attr( $this->get_field_id( 'tag' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tag' ) ); ?>[]" style="width:100%;">
					<optgroup label="Tags">
						<?php $tags = get_terms( 'post_tag' ); ?>
						<?php foreach( $tags as $post_tag ) { ?>
							<option value="<?php echo $post_tag->term_id; ?>" <?php if ( is_array( $tag ) && in_array( $post_tag->term_id, $tag ) ) echo ' selected="selected"'; ?>><?php echo $post_tag->name; ?></option>
						<?php } ?>
					</optgroup>
   			    </select>

			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_type' ) ); ?>"><?php _e( 'Choose the Post Type: ', 'rpwe' ); ?></label>
				<?php /* pros Justin Tadlock - http://themehybrid.com/ */ ?>
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_type' ) ); ?>">
					<?php foreach ( get_post_types( array( 'public' => true ), 'objects' ) as $post_type ) { ?>
						<option value="<?php echo esc_attr( $post_type->name ); ?>" <?php selected( $instance['post_type'], $post_type->name ); ?>><?php echo esc_html( $post_type->labels->singular_name ); ?></option>
					<?php } ?>
				</select>
			</p>

		</div>

		<div class="rpwe-columns-3 rpwe-column-last">

			<?php if ( current_theme_supports( 'post-thumbnails' ) ) { ?>

				<p>
					<label class="input-checkbox" for="<?php echo esc_attr( $this->get_field_id( 'thumb' ) ); ?>"><?php _e( 'Display Thumbnail', 'rpwe' ); ?></label>
					<input id="<?php echo esc_attr( $this->get_field_id( 'thumb' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'thumb' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $thumb ); ?> />&nbsp;
				</p>
				<p>
					<label class="rpwe-block" for="<?php echo esc_attr( $this->get_field_id( 'thumb_height' ) ); ?>"><?php _e( 'Thumbnail (height, width, align):', 'rpwe' ); ?></label>
					<input class= "small-input" id="<?php echo esc_attr( $this->get_field_id( 'thumb_height' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'thumb_height' ) ); ?>" type="text" value="<?php echo $thumb_height; ?>"/>
					<input class="small-input" id="<?php echo esc_attr( $this->get_field_id( 'thumb_width' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'thumb_width' ) ); ?>" type="text" value="<?php echo $thumb_width; ?>"/>
					<select class="small-input" id="<?php echo esc_attr( $this->get_field_id( 'thumb_align' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'thumb_align' ) ); ?>">
						<option value="rpwe-alignleft" <?php selected( $thumb_align, 'rpwe-alignleft' ); ?>><?php _e( 'Left', 'rpwe' ) ?></option>
						<option value="rpwe-alignright" <?php selected( $thumb_align, 'rpwe-alignright' ); ?>><?php _e( 'Right', 'rpwe' ) ?></option>
						<option value="rpwe-alignnone" <?php selected( $thumb_align, 'rpwe-alignnone' ); ?>><?php _e( 'Center', 'rpwe' ) ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'thumb_default' ) ); ?>"><?php _e( 'Default Thumbnail:', 'rpwe' ); ?></label>
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'thumb_default' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'thumb_default' ) ); ?>" type="text" value="<?php echo $thumb_default; ?>"/>
					<small><?php _e( 'Leave it blank to disable.', 'rpwe' ); ?></small>
				</p>

			<?php } ?>

			<p>
				<label class="input-checkbox" for="<?php echo esc_attr( $this->get_field_id( 'excerpt' ) ); ?>"><?php _e( 'Display Excerpt', 'rpwe' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'excerpt' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'excerpt' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $excerpt ); ?> />&nbsp;
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'length' ) ); ?>"><?php _e( 'Excerpt Length:', 'rpwe' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'length' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'length' ) ); ?>" type="text" value="<?php echo $length; ?>"/>
			</p>
			<p>
				<label class="input-checkbox" for="<?php echo esc_attr( $this->get_field_id( 'readmore' ) ); ?>"><?php _e( 'Display Readmore', 'rpwe' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'readmore' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'readmore' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $readmore ); ?> />&nbsp;
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'readmore_text' ) ); ?>"><?php _e( 'Readmore Text:', 'rpwe' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'readmore_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'readmore_text' ) ); ?>" type="text" value="<?php echo $readmore_text; ?>"/>
			</p>
			<p>
				<label class="input-checkbox" for="<?php echo esc_attr( $this->get_field_id( 'date' ) ); ?>"><?php _e( 'Display Date', 'rpwe' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'date' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $date ); ?> />&nbsp;
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'date_format' ) ); ?>"><?php _e( 'Date Format:', 'rpwe' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'date_format' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'date_format' ) ); ?>" type="text" value="<?php echo $date_format; ?>"/>
				<small><?php _e( '<a href="http://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">Date reference</a>', 'rpwe' ) ?></small>
			</p>

		</div>

		<div class="clear"></div>

	<?php
	}

}

/**
 * Register the widget.
 *
 * @since 0.1
 * @link  http://codex.wordpress.org/Function_Reference/register_widget
 */
function rpwe_register_widget() {
	register_widget( 'rpwe_widget' );
}
add_action( 'widgets_init', 'rpwe_register_widget' );

/**
 * Print a custom excerpt.
 * Code revision in version 0.9, uses wp_trim_words function
 *
 * @since    0.1
 * @version  0.9
 * @link     http://codex.wordpress.org/Function_Reference/wp_trim_words
 */
function rpwe_excerpt( $length ) {
	$content = get_the_excerpt();
	$excerpt = wp_trim_words( $content, $length );

	return $excerpt;
}

/**
 * Custom Styles.
 *
 * @since 0.8
 */
function rpwe_custom_styles() {
	?>
<style>
.rpwe-block ul{list-style:none!important;margin-left:0!important;padding-left:0!important;}.rpwe-block li{border-bottom:1px solid #eee;margin-bottom:10px;padding-bottom:10px;list-style-type: none;}.rpwe-block a{display:inline!important;text-decoration:none;}.rpwe-block h3{background:none!important;clear:none;margin-bottom:0;margin-top:0!important;font-weight:400;font-size:12px;line-height:1.5em;}.rpwe-thumb{border:1px solid #EEE!important;box-shadow:none!important;margin:2px 10px 2px 0;padding:3px!important;}.rpwe-summary{font-size:12px;}.rpwe-time{color:#bbb;font-size:11px;}.rpwe-alignleft{display:inline;float:left;}.rpwe-alignright{display:inline;float:right;}.rpwe-alignnone{display:block;float:none;}.rpwe-clearfix:before,.rpwe-clearfix:after{content:"";display:table !important;}.rpwe-clearfix:after{clear:both;}.rpwe-clearfix{zoom:1;}
</style>
	<?php
}

/*** END EduKING Featured Posts ***/


/***  EduKING Search ***/


class wp_EduKING_search extends WP_Widget {

	// constructor
	function wp_EduKING_search() {
		parent::WP_Widget(false, $name = __('EduKING Search', 'wp_widget_plugin'), array( 'description' => __( 'Add a search box to the site.', 'wpb_widget_domain' ),)


);
	}

// widget form creation
function form($instance) {

// Check values
if( $instance) {
     $title = esc_attr($instance['title']);
} else {
     $title = '';
}
?>

<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php ( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>


<?php
}

// update widget
function update($new_instance, $old_instance) {
      $instance = $old_instance;
      // Fields
      $instance['title'] = strip_tags($new_instance['title']);
     return $instance;
}

// display widget
function widget($args, $instance) {
   extract( $args );
   // these are the widget options
   $title = $instance['title'];

    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;

   // Display the widget
echo '<form method="get" id="searchform" action="http://www.your-url.org.uk/">
<div>
<input type="text" value="" name="s" id="s"  class="eduKING-search-box" placeholder="Search">
<input type="submit" id="searchsubmit" value="&#9906;" class="eduKING-search">
</div>
</form>';
   echo $after_widget;

}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("wp_EduKING_search");'));

/*** END EduKING Search ***/


/***  EduKING Social Icons ***/


class wp_EduKING_social extends WP_Widget {

	// constructor
	function wp_EduKING_social() {
		parent::WP_Widget(false, $name = __('EduKING Social Icons', 'wp_widget_plugin'), array( 'description' => __( 'Adds social icons that allow for links.', 'wpb_widget_domain' ),) );
	
		/** Load CSS in <head> */
		add_action( 'wp_head', array( $this, 'css' ) );
}



// widget form creation
function form($instance) {

// Check values
if( $instance) {
     $title = esc_attr($instance['title']);
     $icon_color = esc_attr($instance['icon_color']);
     $icon_color_hover = esc_attr($instance['icon_color_hover']);
     $background_color = esc_attr($instance['background_color']);
     $background_color_hover = esc_attr($instance['background_color_hover']);
     $facebook = esc_attr($instance['facebook']);
     $twitter = esc_attr($instance['twitter']);
     $google = esc_attr($instance['google']);
     $linkedin = esc_textarea($instance['linkedin']);
     $youtube = esc_textarea($instance['youtube']);
     $pinterest = esc_textarea($instance['pinterest']);
     $skype = esc_textarea($instance['skype']);
     $instagram = esc_textarea($instance['instagram']);
} else {
     $title = '';
     $icon_color = '';
     $icon_color_hover = '';
     $background_color = '';
     $background_color_hover = '';
     $facebook = '';
     $twitter = '';
     $google = '';
     $linkedin = '';
     $youtube = '';
     $pinterest = '';
     $skype = '';
     $instagram = '';
}
?>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>

<p><label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php _e( 'Icon Font Color:', 'ssiw' ); ?></label> <input id="<?php echo $this->get_field_id( 'icon_color' ); ?>" name="<?php echo $this->get_field_name( 'icon_color' ); ?>" type="text" value="<?php echo esc_attr( $instance['icon_color'] ); ?>"size="8" /></p>


<p><label for="<?php echo $this->get_field_id( 'background_color_hover' ); ?>"><?php _e( 'Icon Font Hover Color:', 'ssiw' ); ?></label> <input id="<?php echo $this->get_field_id( 'icon_color_hover' ); ?>" name="<?php echo $this->get_field_name( 'icon_color_hover' ); ?>" type="text" value="<?php echo esc_attr( $instance['icon_color_hover'] ); ?>"size="8" /></p>


<p><label for="<?php echo $this->get_field_id( 'background_color' ); ?>"><?php _e( 'Background Color:', 'ssiw' ); ?></label> <input id="<?php echo $this->get_field_id( 'background_color' ); ?>" name="<?php echo $this->get_field_name( 'background_color' ); ?>" type="text" value="<?php echo esc_attr( $instance['background_color'] ); ?>" size="8" /></p>


<p><label for="<?php echo $this->get_field_id( 'background_color_hover' ); ?>"><?php _e( 'Background Hover Color:', 'ssiw' ); ?></label> <input id="<?php echo $this->get_field_id( 'background_color_hover' ); ?>" name="<?php echo $this->get_field_name( 'background_color_hover' ); ?>" type="text" value="<?php echo esc_attr( $instance['background_color_hover'] ); ?>" size="8" /></p>



<p>
<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook URL:', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter ID:', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google+ URL:', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" type="text" value="<?php echo $google; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin:', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo $linkedin; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('Youtube:', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo $youtube; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest:', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text" value="<?php echo $pinterest; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('skype'); ?>"><?php _e('Skype:', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('skype'); ?>" name="<?php echo $this->get_field_name('skype'); ?>" type="text" value="<?php echo $skype; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram:', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo $instagram; ?>" />
</p>

<?php
}

// update widget
function update($new_instance, $old_instance) {
      $instance = $old_instance;
      // Fields
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['icon_color'] = strip_tags($new_instance['icon_color']);
      $instance['icon_color_hover'] = strip_tags($new_instance['icon_color_hover']);
      $instance['background_color'] = strip_tags($new_instance['background_color']);
      $instance['background_color_hover'] = strip_tags($new_instance['background_color_hover']);
      $instance['facebook'] = strip_tags($new_instance['facebook']);
      $instance['twitter'] = strip_tags($new_instance['twitter']);
      $instance['google'] = strip_tags($new_instance['google']);
      $instance['linkedin'] = strip_tags($new_instance['linkedin']);
      $instance['youtube'] = strip_tags($new_instance['youtube']);
      $instance['pinterest'] = strip_tags($new_instance['pinterest']);
      $instance['skype'] = strip_tags($new_instance['skype']);
      $instance['instagram'] = strip_tags($new_instance['instagram']);
     return $instance;
}

// display widget
function widget($args, $instance) {
   extract( $args );
   // these are the widget options
   $title = apply_filters('widget_title', $instance['title']);
   $icon_color = $instance['icon_color'];
   $icon_color_hover = $instance['icon_color_hover'];
   $background_color = $instance['background_color'];
   $background_color_hover = $instance['background_color_hover'];
   $facebook = $instance['facebook'];
   $twitter = $instance['twitter'];
   $google = apply_filters('widget_title', $instance['google']);
   $linkedin = $instance['linkedin'];
   $youtube = $instance['youtube'];
   $pinterest = $instance['pinterest'];
   $skype = $instance['skype'];
   $instagram = $instance['instagram'];

   echo $before_widget;

    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;

    echo '<div class="eduKING_social_icons">';

   // Check if link is set
   if ( $facebook ) {
      echo '<a href="'.$facebook.'" style="margin-right: 10px; "><i class="fa fa-facebook fa-lg icon" style=" padding: 19px 21px; height: 50px; width: 50px; margin-bottom:10px"></i></a>';
   }

   // Check if link is set
   if ( $twitter ) {
      echo '<a href="http://www.twitter.com/'.$twitter.'" style="margin-right: 10px;"><i class="fa fa-twitter fa-lg icon" style=" padding: 19px 18px; height: 50px; width: 50px; margin-bottom:10px"></i></a>';
   }

   // Check if link is set
   if ( $google ) {
      echo '<a href="'.$google.'" style="margin-right: 10px;"><i class="fa fa-google-plus fa-lg icon" style=" padding: 19px 18px; height: 50px; width: 50px; margin-bottom:10px"></i></a>';
   }

   // Check if link is set
   if ( $linkedin ) {
      echo '<a href="'.$linkedin.'" style="margin-right: 10px;"><i class="fa fa-linkedin fa-lg icon" style=" padding: 19px 18px; height: 50px; width: 50px; margin-bottom:10px"></i></a>';
   }

   // Check if link is set
   if ( $youtube ) {
      echo '<a href="'.$youtube.'" style="margin-right: 10px;"><i class="fa fa-youtube fa-lg icon" style="padding: 19px 18px; height: 50px; width: 50px; margin-bottom:10px"></i></a>';
   }

   // Check if link is set
   if ( $pinterest ) {
      echo '<a href="'.$pinterest.'" style="margin-right: 10px;"><i class="fa fa-pinterest fa-lg icon" style="padding: 19px 18px; height: 50px; width: 50px; margin-bottom:10px"></i></a>';
   }

   // Check if link is set
   if ( $skype ) {
      echo '<a href="'.$skype.'" style="margin-right: 10px;"><i class="fa fa-skype fa-lg icon" style=" padding: 19px 18px; height: 50px; width: 50px; margin-bottom:10px"></i></a>';
   }

   // Check if link is set
   if ( $instagram ) {
      echo '<a href="'.$instagram.'"><i class="fa fa-instagram fa-lg icon" style="padding: 19px 18px; height: 50px; width: 50px; margin-bottom:10px"></i></a>';
   }

   echo '</div>';

   echo $after_widget;



}
	function css() {

		/** Pull widget settings, merge with defaults */
		$all_instances = $this->get_settings();
		$instance = wp_parse_args( $all_instances[$this->number] );

		$font_size = round( (int) $instance / 2 );
		$icon_padding = round ( (int) $font_size / 2 );

		/** The CSS to output */
		$css = '

.icon {
			background-color: ' . $instance['background_color'] . ' !important;
			color: ' . $instance['icon_color'] . ' !important;
		}

		.icon:hover {
			background-color: ' . $instance['background_color_hover'] . ' !important;
			color: ' . $instance['icon_color_hover'] . ' !important;
		}';

		/** Minify a bit */
		$css = str_replace( "\t", '', $css );
		$css = str_replace( array( "\n", "\r" ), ' ', $css );

		/** Echo the CSS */
		echo '<style type="text/css" media="screen">' . $css . '</style>';

	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("wp_EduKING_social");'));

/*** END EduKING Social Icons ***/



?>