<?php

if ( ! function_exists( 'fp_theme_customize_settings' ) ) :
	//add_action('customize_register', 'fp_theme_customize_settings');
	function fp_theme_customize_settings( $wp_customize ) {
		$wp_customize->add_setting(
			'fp_theme_logo_white',
			array(
				'default' => '',
				'type' => 'theme_mod', // you can also use 'theme_mod', 'option'
				'capability' => 'edit_theme_options'
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'fp_theme_logo_white',
				array(
					'label' => __('White Logo', FP_TEXTDOMAIN),
					'priority'   => 10,
					'section'    => 'title_tagline',
					//	'settings' => 'fp_theme_logo_white',
				)
			)
		);
		
	}
endif;


