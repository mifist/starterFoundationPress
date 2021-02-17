<?php

/*
 * Get current page template
 * */
if ( ! function_exists( 'fp_get_template_name' ) ) :
	function fp_get_template_name( $page_id ) {
		$file = locate_template( get_page_template_slug( $page_id ) );
		if ( $file ) {
			$data = get_file_data( $file, [ 'Name' => 'Template Name' ] );
			return $data['Name'];
		} else {
			return false;
		}
	}
endif;

// delete/create column for post
add_filter('manage_post_posts_columns', 'ca_remove_comments_column', 4);
function ca_remove_comments_column( $columns ){
	unset($columns['comments']);
	return $columns;
}

// Add the custom columns to the page post type:
add_filter( 'manage_page_posts_columns', 'set_custom_edit_page_columns' );
function set_custom_edit_page_columns( $columns ) {
	$columns['template'] = __( 'Page Template Info', FP_TEXTDOMAIN );
	return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_page_posts_custom_column', 'custom_page_column', 10, 2 );
function custom_page_column( $column, $post_id ) {
	switch ( $column ) {
		case 'template':
			$template = function_exists('ca_get_template_name') ? ca_get_template_name( $post_id ) : '';
			if ( $template ) {
				echo '<b>Template:</b> ' . $template . ' <em style="font-size:11px; margin-left:10px;">(file: '
				     . get_page_template_slug( $post_id ) . ')</em>';
			}
			break;
	}
}