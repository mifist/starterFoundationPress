<?php
// Register custom taxonomy point
if ( !function_exists( 'fp_posts_taxonomy' ) ) :
	//add_action( 'init', 'fp_posts_taxonomy' );
	function fp_posts_taxonomy() {
		register_taxonomy(
			'tabs_categories',
			['post'],
			[
				'label'                 => '', // определяется параметром $labels->name
				'labels'                => [
					'name'              => 'Tabs',
					'singular_name'     => 'Tab',
					'search_items'      => 'Search Tabs',
					'all_items'         => 'All Tabs',
					'view_item '        => 'View Tab',
					'parent_item'       => 'Parent Tab',
					'parent_item_colon' => 'Parent Tab:',
					'edit_item'         => 'Edit Tab',
					'update_item'       => 'Update Tab',
					'add_new_item'      => 'Add New Tab',
					'new_item_name'     => 'New Tab Name',
					'menu_name'         => 'Tabs for Categories',
				],
				'description'           => '', // описание таксономии
				'public'                => true,
				'publicly_queryable'    => null, // равен аргументу public
				'show_in_nav_menus'     => true, // равен аргументу public
				'show_ui'               => true, // равен аргументу public
				'show_in_menu'          => true, // равен аргументу show_ui
				'show_tagcloud'         => false, // равен аргументу show_ui
				'show_in_rest'          => true, // добавить в REST API
				'rest_base'             => null, // $taxonomy
				'hierarchical'          => true,
				'update_count_callback' => '',
				'rewrite'               => true,
				// 'query_var'             => $taxonomy, // название параметра запроса
				'capabilities'          => [],
				'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
				'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
				'_builtin'              => false,
				'show_in_quick_edit'    => true, // по умолчанию значение show_ui
			]
		);
		
		
	}
endif;




