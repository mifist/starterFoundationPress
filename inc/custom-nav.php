<?php
/**
 * Allow users to select Topbar or Offcanvas menu. Adds body class of offcanvas or topbar based on which they choose.
 *
 */

if ( ! function_exists( 'fp_register_theme_customizer' ) ) :
	function fp_register_theme_customizer( $wp_customize ) {

		// Create custom panels
		$wp_customize->add_panel(
			'mobile_menu_settings',
			[
				'priority'       => 1000,
				'theme_supports' => '',
				'title'          => __( 'Mobile Menu Settings', FP_TEXTDOMAIN ),
				'description'    => __( 'Controls the mobile menu', FP_TEXTDOMAIN ),
			]
		);

		// Create custom field for mobile navigation layout
		$wp_customize->add_section(
			'mobile_menu_layout',
			[
				'title'    => __( 'Mobile navigation layout', FP_TEXTDOMAIN ),
				'panel'    => 'mobile_menu_settings',
				'priority' => 1000,
			]
		);

		// Set default navigation layout
		$wp_customize->add_setting(
			'fp_mobile_menu_layout',
			[
				'default' => __( 'topbar', FP_TEXTDOMAIN ),
			]
		);

		// Add options for navigation layout
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'mobile_menu_layout',
				[
					'type'     => 'radio',
					'section'  => 'mobile_menu_layout',
					'settings' => 'fp_mobile_menu_layout',
					'choices'  => [
						'topbar'    => 'Topbar',
						'offcanvas' => 'Offcanvas',
					],
				]
			)
		);

	}
	add_action( 'customize_register', 'fp_register_theme_customizer' );
endif;

if ( ! function_exists( 'fp_mobile_nav_class' ) ) :
	// Add class to body to help w/ CSS
	add_filter( 'body_class', 'fp_mobile_nav_class' );
	function fp_mobile_nav_class( $classes ) {
		if ( ! get_theme_mod( 'fp_mobile_menu_layout' ) || get_theme_mod( 'fp_mobile_menu_layout' ) === 'topbar' ) :
			$classes[] = 'topbar';
		elseif ( get_theme_mod( 'fp_mobile_menu_layout' ) === 'offcanvas' ) :
			$classes[] = 'offcanvas';
		endif;
		return $classes;
	}
endif;
