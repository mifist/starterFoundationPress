<?php
/**
 * Change the class for sticky posts to .wp-sticky to avoid conflicts with Foundation's Sticky plugin
 *
 */

if ( ! function_exists( 'fp_sticky_posts' ) ) :
	function fp_sticky_posts( $classes ) {
		if ( in_array( 'sticky', $classes, true ) ) {
			$classes   = array_diff( $classes, [ 'sticky' ] );
			$classes[] = 'wp-sticky';
		}
		return $classes;
	}
	add_filter( 'post_class', 'fp_sticky_posts' );

endif;
