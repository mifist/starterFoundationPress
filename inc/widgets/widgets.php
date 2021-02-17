<?php
// Register custom widgets point
if ( !function_exists( 'fp_register_widget' ) ) :
	//add_action( 'widgets_init', 'fp_register_widget' );
	function fp_register_widget() {
		register_widget( 'ICReviewsSliderWidget' );
	}
endif;



