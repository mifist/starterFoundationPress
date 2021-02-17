<?php
/**
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 */

// DEFINES
define('FP_THEME_VERSION', '1.10.7');
define('FP_THEME_DIR', get_template_directory());
define('FP_CHILD_THEME_DIR', get_stylesheet_directory());
define('FP_THEME_URL', get_template_directory_uri());
define('FP_CHILD_THEME_URL', get_stylesheet_directory_uri());

define('FP_TEXTDOMAIN', 'fp_theme');
define('FP_TEXTDOMAIN_FRONT', 'fp_theme_front');
define('FP_OPTIONS', FP_TEXTDOMAIN . '_option');

// composer autoload.
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Requires all files recursively within given directory
 *
 * @param array $path path to directory which should be required recursively.
 */
function fp_recursive_require_dir_autoload( $path ) {
	foreach ( $path as $path_item ) {
		$dir      = new RecursiveDirectoryIterator( $path_item );
		$iterator = new RecursiveIteratorIterator( $dir );
		foreach ( $iterator as $file ) {
			$fname = $file->getFilename();
			if ( preg_match( '%\.php$%', $fname ) ) {
				require_once $file->getPathname();
			}
		}
	}
}

$path = array(
	FP_THEME_DIR . '/inc'
);
fp_recursive_require_dir_autoload( $path );

