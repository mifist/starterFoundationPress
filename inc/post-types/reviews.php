<?php
// Register post type point
//add_action( 'init', 'ic_register_reviews', 100 );
function ic_register_reviews() {
	register_post_type(
		'reviews',
		[
			'label'               => null,
			'labels'              => [
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
			],
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
			// 'capabilities'      => 'post',
			// 'map_meta_cap'      => null,
			'map_meta_cap'        => true,
			'hierarchical'        => false,
			'supports'            => ['title', 'editor', 'thumbnail', 'revisions'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'taxonomies'          => [],
			'has_archive'         => true,
			'rewrite'             => true,
			'query_var'           => true,
		]
	);
}
