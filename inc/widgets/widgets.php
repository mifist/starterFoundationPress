<?php
//add_action( 'widgets_init', 'ic_register_widget' );
function ic_register_widget() {
	register_widget( 'ICBreadcrumbsWidget' );
	register_widget( 'ICReviewsSliderWidget' );
	register_widget( 'ICLatestNewsSliderWidget' );
	register_widget( 'ICCompaniesListWidget' );
	register_widget( 'ICPostsTabsWidget' );
	register_widget( 'ICBigNewsWidget' );
	register_widget( 'ICAllNewsWidget' );
	register_widget( 'ICCategoriesTabsWidget' );
	register_widget( 'ICPostActionsWidget' );
}


