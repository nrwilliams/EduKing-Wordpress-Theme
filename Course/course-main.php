<?php 
add_action( 'init', 'register_taxonomy_courses_category' );

function register_taxonomy_courses_category() {

    $labels = array( 
        'name' => _x( 'Courses Category', 'courses_category' ),
        'singular_name' => _x( 'Course Category', 'courses_category' ),
        'search_items' => _x( 'Search Courses Category', 'courses_category' ),
        'popular_items' => _x( 'Popular Courses Category', 'courses_category' ),
        'all_items' => _x( 'All Courses Category', 'courses_category' ),
        'parent_item' => _x( 'Parent Course Category', 'courses_category' ),
        'parent_item_colon' => _x( 'Parent Course Category:', 'courses_category' ),
        'edit_item' => _x( 'Edit Course Category', 'courses_category' ),
        'update_item' => _x( 'Update Course Category', 'courses_category' ),
        'add_new_item' => _x( 'Add New Course Category', 'courses_category' ),
        'new_item_name' => _x( 'New Course Category', 'courses_category' ),
        'separate_items_with_commas' => _x( 'Separate courses category with commas', 'courses_category' ),
        'add_or_remove_items' => _x( 'Add or remove courses category', 'courses_category' ),
        'choose_from_most_used' => _x( 'Most used categories (click here)', 'courses_category' ),
        'menu_name' => _x( 'Categories', 'courses_category' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'query_var' => true,
        'capabilities' => array(
			'manage_terms' => 'manage_options',
			'edit_terms'   => 'manage_options',
			'delete_terms' => 'manage_options',
			'assign_terms' => 'edit_posts',
		),
        'rewrite' => true,

    );

    register_taxonomy( 'courses_category', array('course'), $args );
}
?>
<?php
add_action( 'init', 'register_cpt_course' );

function register_cpt_course() {

    $labels = array( 
        'name' => __( 'Courses', 'course' ),
        'singular_name' => __( 'Course', 'course' ),
        'add_new' => __( 'Add New', 'course' ),
        'add_new_item' => __( 'Add New Course', 'course' ),
        'edit_item' => __( 'Edit Course', 'course' ),
        'new_item' => __( 'New Course', 'course' ),
        'view_item' => __( 'View Course', 'course' ),
        'search_items' => __( 'Search Courses', 'course' ),
        'not_found' => __( 'No courses found', 'course' ),
        'not_found_in_trash' => __( 'No courses found in Trash', 'course' ),
        'parent_item_colon' => __( 'Parent Course:', 'course' ),
        'menu_name' => __( 'Courses', 'course' ),
    );

    $args = array( 
        'labels' => $labels,
        'menu_icon' => '',
        'hierarchical' => false,
        'description' => 'Adds a list of courses',
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'comments', 'revisions', 'thumbnail' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'taxonomies' => array('courses_category')

    );

    register_post_type( 'course', $args );
}


// Little function to return a custom field value
function wpshed_get_custom_field( $value ) {
	global $post;

    $custom_field = get_post_meta( $post->ID, $value, true );
    if ( !empty( $custom_field ) )
	    return is_array( $custom_field ) ? stripslashes_deep( $custom_field ) : stripslashes( wp_kses_decode_entities( $custom_field ) );

    return false;
}

function wpshed_add_custom_meta_box() {
    add_meta_box( 'wpshed-meta-box', __( 'Course Information', 'textdomain' ), 'wpshed_meta_box_output', 'course', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'wpshed_add_custom_meta_box' );

// Output the Metabox
function wpshed_meta_box_output( $post ) {
	// create a nonce field
	wp_nonce_field( 'my_wpshed_meta_box_nonce', 'wpshed_meta_box_nonce' ); ?>
	
	<p>
		<label for="wpshed_course_id" style="margin-right: 20px;"><?php _e( 'Class ID', 'textdomain' ); ?>: </label>
		<input type="text" name="wpshed_course_id" id="wpshed_course_id" value="<?php echo wpshed_get_custom_field( 'wpshed_course_id' ); ?>" size="5" />
    </p>

	<p>
		<label for="wpshed_professor" style="margin-right: 20px;"><?php _e( 'Professor', 'textdomain' ); ?>: </label>
		<input type="text" name="wpshed_professor" id="wpshed_professor" value="<?php echo wpshed_get_custom_field( 'wpshed_professor' ); ?>" size="30" />
    </p>

	<p>
		<label for="wpshed_time_first" style="margin-right: 20px;"><?php _e( 'Class Time', 'textdomain' ); ?>: </label>
		<input type="text" name="wpshed_time_first" id="wpshed_time_first" value="<?php echo wpshed_get_custom_field( 'wpshed_time_first' ); ?>" size="10" /> to 
		<input type="text" name="wpshed_time_second" id="wpshed_time_second" value="<?php echo wpshed_get_custom_field( 'wpshed_time_second' ); ?>" size="10" />
    </p>

	<p>
		<label for="wpshed_location" style="margin-right: 20px;"><?php _e( 'Location', 'textdomain' ); ?>: </label>
		<input type="text" name="wpshed_location" id="wpshed_location" value="<?php echo wpshed_get_custom_field( 'wpshed_location' ); ?>" size="30" />
    </p>
    
	<?php
}

// Save the Metabox values
function wpshed_meta_box_save( $post_id ) {
	// Stop the script when doing autosave
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// Verify the nonce. If insn't there, stop the script
	if( !isset( $_POST['wpshed_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['wpshed_meta_box_nonce'], 'my_wpshed_meta_box_nonce' ) ) return;

	// Stop the script if the user does not have edit permissions
	if( !current_user_can( 'edit_post' ) ) return;

    // Save the textfield
	if( isset( $_POST['wpshed_course_id'] ) )
		update_post_meta( $post_id, 'wpshed_course_id', esc_attr( $_POST['wpshed_course_id'] ) );


    // Save the textfield
	if( isset( $_POST['wpshed_professor'] ) )
		update_post_meta( $post_id, 'wpshed_professor', esc_attr( $_POST['wpshed_professor'] ) );
 
   // Save the textfield
	if( isset( $_POST['wpshed_time_first'] ) )
		update_post_meta( $post_id, 'wpshed_time_first', esc_attr( $_POST['wpshed_time_first'] ) );

   // Save the textfield
	if( isset( $_POST['wpshed_time_second'] ) )
		update_post_meta( $post_id, 'wpshed_time_second', esc_attr( $_POST['wpshed_time_second'] ) );

   // Save the textfield
	if( isset( $_POST['wpshed_location'] ) )
		update_post_meta( $post_id, 'wpshed_location', esc_attr( $_POST['wpshed_location'] ) );


}
add_action( 'save_post', 'wpshed_meta_box_save' );
?>