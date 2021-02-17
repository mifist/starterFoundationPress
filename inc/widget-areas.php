<?php
/**
 * Register widget areas
 *
 */

if ( ! function_exists( 'fp_sidebar_widgets' ) ) :
	function fp_sidebar_widgets() {
		register_sidebar(
			[
				'id'            => 'sidebar-widgets',
				'name'          => __( 'Sidebar widgets', FP_TEXTDOMAIN ),
				'description'   => __( 'Drag widgets to this sidebar container.', FP_TEXTDOMAIN ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h6>',
				'after_title'   => '</h6>',
			]
		);

		register_sidebar(
			[
				'id'            => 'footer-widgets',
				'name'          => __( 'Footer widgets', FP_TEXTDOMAIN ),
				'description'   => __( 'Drag widgets to this footer container', FP_TEXTDOMAIN ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h6>',
				'after_title'   => '</h6>',
			]
		);
	}

	add_action( 'widgets_init', 'fp_sidebar_widgets' );
endif;
