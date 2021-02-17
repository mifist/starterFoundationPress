<?php
/**
 * Defines all functions needed for Advanced Custom Fields.
 *
 * It defines the load path as well as the save path. If ACF is not installed
 * a warning will be shown.
 *
 */

/**
 * Admin notice in backend if Advanced Custom Fields Pro is not installed.
 */
function fp_acf_not_installed_error() {
	$class   = 'notice notice-error';
	$message = __( 'You need to have Advanced Custom Fields Pro installed to make the theme work properly!', FP_TEXTDOMAIN );

	printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
}

// needed for is_plugin_active function.
require_once ABSPATH . 'wp-admin/includes/plugin.php';

// Show admin notice if ACF Pro is not installed/active.
if ( ! is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
	add_action( 'admin_notices', 'fp_acf_not_installed_error' );
}


/**
 * Initializes advanced custom fields fields
 *
 * @param array $paths acf load point paths.
 */
function fp_acf_json_load_point( $paths ) {
	// append path.
	$paths[] = get_template_directory() . '/acf-fields';

	return $paths;
}
// Add ACF JSON load point to load acf groups of this theme.
add_filter( 'acf/settings/load_json', 'fp_acf_json_load_point' );


/**
 * Saves advanced custom fields json fields
 *
 * @param string $path acf save point path.
 */
function fp_acf_json_save_point( $path ) {
	// set path.
	$path = get_template_directory() . '/acf-fields';
	return $path;
}
/*
Set location for ACF to save groups as JSON files.
To enable saving them as json files set FP_ACF_SAVE_JSON to true in your wp-config.php.
*/
if ( defined( 'FP_ACF_SAVE_JSON' ) && FP_ACF_SAVE_JSON ) {
	add_filter( 'acf/settings/save_json', 'fp_acf_json_save_point' );
}

/**
 * Add ACF option pages to the backend.
 */
add_action( 'acf/init', 'fp_add_option_pages' );
function fp_add_option_pages() {
	$parent = acf_add_options_page(
		[
			'page_title' => 'Theme Settings',
			'menu_title' => 'Theme Settings',
			'menu_slug'  => 'theme-settings',
			'redirect'   => false,
			'autoload'   => true,
		]
	);
	// add sub page
	/*acf_add_options_sub_page(array(
		'page_title' 	=>  __('Blog Page', 'incassocitytheme'),
		'menu_title' 	=> __('Blog Page', 'incassocitytheme'),
		'parent_slug' 	=> $parent['menu_slug'],
	));*/
}

