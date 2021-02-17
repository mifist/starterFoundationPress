<?php
/**
 * Add theme support for Gutenberg editor.
 *
 */

if ( ! function_exists( 'fp_gutenberg_support' ) ) :
	function fp_gutenberg_support() {

		// Add foundation color palette to the editor
		add_theme_support(
			'editor-color-palette',
			[
				[
					'name'  => __( 'Primary Color', FP_TEXTDOMAIN ),
					'slug'  => 'primary',
					'color' => '#1779ba',
				],
				[
					'name'  => __( 'Secondary Color', FP_TEXTDOMAIN ),
					'slug'  => 'secondary',
					'color' => '#767676',
				],
				[
					'name'  => __( 'Success Color', FP_TEXTDOMAIN ),
					'slug'  => 'success',
					'color' => '#3adb76',
				],
				[
					'name'  => __( 'Warning color', FP_TEXTDOMAIN ),
					'slug'  => 'warning',
					'color' => '#ffae00',
				],
				[
					'name'  => __( 'Alert color', FP_TEXTDOMAIN ),
					'slug'  => 'alert',
					'color' => '#cc4b37',
				],
			]
		);

	}

	add_action( 'after_setup_theme', 'fp_gutenberg_support' );
endif;

function fp_block_categories( $categories, $post ) {
	return array_merge(
		$categories,
		[
			[
				'slug'  => 'fp_theme',
				'title' => 'FP Theme',
				'icon'  => 'art',
			],
		]
	);
}
add_filter( 'block_categories', 'fp_block_categories', 0, 2 );
