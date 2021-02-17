<?php
// Register post type point
if ( !function_exists( 'fp_register_reviews' ) ) :
	//add_action( 'init', 'fp_register_reviews', 100 );
	function fp_register_reviews() {
		// --------------------------------------
		$reviews_labels = array(
			'name'               => 'Reviews',
			'singular_name'      => 'Review',
			'add_new'            => 'Add new point',
			'add_new_item'       => 'Add review',
			'edit_item'          => 'Edit review',
			'new_item'           => 'New review',
			'view_item'          => 'View review',
			'search_items'       => 'Search review',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found in cart',
			'parent_item_colon'  => '',
			'menu_name'          => 'Our Reviews',
		);
		$reviews_settings = array(
			'label'               => null,
			'labels'              => $reviews_labels,
			'description'         => '',
			'public'              => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => null,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => null,
			'show_in_rest'        => null,
			'rest_base'           => null,
			'menu_position'       => null,
			'menu_icon'           => 'dashicons-format-status',
			'capability_type'     => 'post',
			//'capabilities'      => 'post',
			//'map_meta_cap'      => null,
			'map_meta_cap'        => true,
			'hierarchical'        => false,
			'supports'            => ['title', 'editor', 'thumbnail', 'revisions'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'taxonomies'          => array(),
			'has_archive'         => false,
			'rewrite'             => true,
			'query_var'           => true,
		);
		register_post_type( 'reviews', $reviews_settings );
	}
endif;

