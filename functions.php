<?php


function theme_name_scripts() {
	wp_enqueue_style( 'style-name', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );


 
function my_custom_excerpt($text, $raw_excerpt) {
    if( ! $raw_excerpt ) {
        $content = apply_filters( 'the_content', get_the_content() );
        $text = substr( $content, 0, strpos( $content, '</p>' ) + 4 );
    }
    return $text;
}

add_filter( 'wp_trim_excerpt', 'my_custom_excerpt', 10, 2 );

function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');



add_theme_support( 'post-thumbnails' );


/* ============ PROJECT POST TYPE   ============= */

function project_posttype() {

	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Projects', 'text_domain' ),
		'name_admin_bar'        => __( 'Projects', 'text_domain' ),
		'archives'              => __( 'Project Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Project:', 'text_domain' ),
		'all_items'             => __( 'All Projects', 'text_domain' ),
		'add_new_item'          => __( 'Add New Project', 'text_domain' ),
		'add_new'               => __( 'Add a Project', 'text_domain' ),
		'new_item'              => __( 'New Project', 'text_domain' ),
		'edit_item'             => __( 'Edit Project', 'text_domain' ),
		'update_item'           => __( 'Update Project', 'text_domain' ),
		'view_item'             => __( 'View Project', 'text_domain' ),
		'search_items'          => __( 'Search Project', 'text_domain' ),
		'not_found'             => __( 'Project not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Project not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Project Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set project image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove project image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as project image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into project', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this project', 'text_domain' ),
		'items_list'            => __( 'Projects list', 'text_domain' ),
		'items_list_navigation' => __( 'Projects list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter projects list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Project', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions'),
		'hierarchical'          => false,
		'has_archive'         	=> true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-customizer',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type('project', $args);
	flush_rewrite_rules();

}
add_action( 'init', 'project_posttype', 0 );


// Project Information.

function project_information_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function project_information_add_meta_box() {
	add_meta_box(
		'project_information-project-information',
		__( 'Project Information', 'project_information' ),
		'project_information_html',
		'project',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'project_information_add_meta_box' );

function project_information_html( $post) {
	wp_nonce_field( '_project_information_nonce', 'project_information_nonce' ); ?>

	<p>Add more details about your project.</p>

	<p>
		<label for="project_information_github_link"><?php _e( 'GitHub link', 'project_information' ); ?></label><br>
		<input style="width: 80%;" type="text" name="project_information_github_link" id="project_information_github_link" value="<?php echo project_information_get_meta( 'project_information_github_link' ); ?>">
	</p>	<p>
		<label for="project_information_website_link"><?php _e( 'Website link', 'project_information' ); ?></label><br>
		<input style="width: 80%;" type="text" name="project_information_website_link" id="project_information_website_link" value="<?php echo project_information_get_meta( 'project_information_website_link' ); ?>">
	</p><?php
}

function project_information_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['project_information_nonce'] ) || ! wp_verify_nonce( $_POST['project_information_nonce'], '_project_information_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['project_information_github_link'] ) )
		update_post_meta( $post_id, 'project_information_github_link', esc_attr( $_POST['project_information_github_link'] ) );
	if ( isset( $_POST['project_information_website_link'] ) )
		update_post_meta( $post_id, 'project_information_website_link', esc_attr( $_POST['project_information_website_link'] ) );
}
add_action( 'save_post', 'project_information_save' );

/*
	Usage: project_information_get_meta( 'project_information_github_link' )
	Usage: project_information_get_meta( 'project_information_website_link' )
*/


function post_information_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function post_information_add_meta_box() {
	add_meta_box(
		'post_information-post-information',
		__( 'Post Information', 'post_information' ),
		'post_information_html',
		'post',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'post_information_add_meta_box' );

function post_information_html( $post) {
	wp_nonce_field( '_post_information_nonce', 'post_information_nonce' ); ?>
	<p>Select if a post is related to a project.</p>
	<p>
		<select style="width: 100%;" name="post_information_related_project" id="post_information_related_project">
		<option <?php echo (post_information_get_meta( 'post_information_related_project' ) === 'None' ) ? 'selected' : '' ?>>None</option>
		<?php
			global $post;
            $originalpost = $post;
			$args = array( 'post_type' => 'project', 'posts_per_page' => 100000000000 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<option <?php echo (post_information_get_meta( 'post_information_related_project' ) === the_title() ) ? 'selected' : '' ?>><?php the_title(); ?></option>
			<?php endwhile;
			$wp_query = $original_query;
   			$post = $originalpost;
		?>
		</select>
	</p><?php
}

function post_information_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['post_information_nonce'] ) || ! wp_verify_nonce( $_POST['post_information_nonce'], '_post_information_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['post_information_related_project'] ) )
		update_post_meta( $post_id, 'post_information_related_project', esc_attr( $_POST['post_information_related_project'] ) );
}
add_action( 'save_post', 'post_information_save' );

/*
	Usage: post_information_get_meta( 'post_information_related_project' )
*/
