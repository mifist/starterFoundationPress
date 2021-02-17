<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 */

if ( ! function_exists( 'fp_enqueue_scripts' ) ) :
	function fp_enqueue_scripts() {

		// Enqueue the stylesheet.
		wp_enqueue_style(
			'main_stylesheet',
			get_template_directory_uri() . '/dist/assets/css/main.css',
			false,
			filemtime( get_template_directory() . '/dist/assets/css/main.css' )
		);

		// Enqueue the scripts.
		wp_enqueue_script(
			'main_scripts',
			get_template_directory_uri() . '/dist/assets/js/main.js',
			false,
			filemtime( get_template_directory() . '/dist/assets/js/main.js' ),
			true
		);

		// Add the comment-reply library on pages where it is necessary
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	add_action( 'wp_enqueue_scripts', 'fp_enqueue_scripts' );
endif;

function fopr_admin_enqueue_scripts() {
	// Enqueue the stylesheet.
	wp_enqueue_style(
		'fp-admin-styles',
		get_template_directory_uri() . '/dist/assets/css/admin.css',
		false,
		filemtime( get_template_directory() . '/dist/assets/css/admin.css' )
	);
}
add_action( 'admin_enqueue_scripts', 'fopr_admin_enqueue_scripts' );


// Adding defer attributes to wp scripts
//add_filter( 'script_loader_tag', 'ic_add_scripts_attribute', 10, 2 );
function ic_add_scripts_attribute( $tag, $handle ) {
	$handles = array(
		'main_scripts',
	);
	foreach( $handles as $defer_script) :
		if ( $defer_script === $handle ) {
			return str_replace( ' src', ' defer rel="preload" as="script" src', $tag );
		}
	endforeach;
	return $tag;
}

//add_filter( 'style_loader_tag', 'ic_add_style_attribute', 10, 2 );
function ic_add_style_attribute( $tag, $handle ) {
	$handles = array(
		'main_stylesheet',
	);
	foreach( $handles as $styles) :
		if ( $styles === $handle ) {
			return str_replace( ' href', ' rel="preload" as="style" href', $tag );
		}
	endforeach;
	return $tag;
}

