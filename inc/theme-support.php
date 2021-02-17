<?php
/**
 * Register theme support for languages, menus, post-thumbnails, post-formats etc.
 *
 */

if ( ! function_exists( 'fp_theme_support' ) ) :
	add_action( 'after_setup_theme', 'fp_theme_support' );
	function fp_theme_support() {
		// Add language support
		load_theme_textdomain( FP_TEXTDOMAIN, FP_THEME_DIR . '/languages' );

		// Switch default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support(
			'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			]
		);

		// Add menu support
		add_theme_support( 'menus' );

		// Let WordPress manage the document title
		add_theme_support( 'title-tag' );

		// Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
		add_theme_support( 'post-thumbnails' );

		// RSS thingy
		add_theme_support( 'automatic-feed-links' );

		// Add post formats support: http://codex.wordpress.org/Post_Formats
		//add_theme_support( 'post-formats', [ 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video',
		// 'audio', 'chat' ] );

		// Additional theme support for woocommerce 3.0.+
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		add_theme_support( 'editor-styles' );

		add_editor_style( 'dist/assets/css/editor.css' );
		
		$defaults = [
			'height'      => 100,
			'width'       => 212,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => [ 'site-title', 'site-description' ],
		];
		add_theme_support( 'custom-logo', $defaults );
		
	}
endif;


if ( ! function_exists( 'fp_custom_login_logo' ) ) :
	add_action( 'login_head', 'fp_custom_login_logo' );
	function fp_custom_login_logo(){
		echo '<style type="text/css">
		.login h1 a {
			background-image:url("'. FP_THEME_URL .'/dist/assets/images/logo.png") !important;
			width: 320px;
			min-height: 160px;
			background-size: contain;
			height: auto;
		 }
		</style>';
	}
endif;

