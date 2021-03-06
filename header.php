<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
wp_body_open();
$custom_logo_id = get_theme_mod( 'custom_logo' );
$custom_logo    = wp_get_attachment_image_src( $custom_logo_id, 'full' );
?>

<?php if ( get_theme_mod( 'fp_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
<?php endif; ?>

	<header class="site-header" role="banner">
		<div class="site-title-bar title-bar" <?php fp_title_bar_responsive_toggle(); ?>>
			<div class="title-bar-left">
				<button aria-label="<?php esc_html_e( 'Main Menu', FP_TEXTDOMAIN ); ?>" class="menu-icon" type="button" data-toggle="<?php fp_mobile_menu_id(); ?>"></button>

				<span class="site-mobile-title title-bar-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php if ( $custom_logo ) : ?>
							<img src="<?php echo $custom_logo[0]; ?>" alt="<?php bloginfo( 'name' ); ?>" />
						<?php else : ?>
							<?php bloginfo( 'name' ); ?>
						<?php endif; ?>
					</a>
				</span>
			</div>
		</div>

		<nav class="site-navigation top-bar" role="navigation" id="<?php fp_mobile_menu_id(); ?>">
			<div class="top-bar-left">
				<div class="site-desktop-title top-bar-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php if ( $custom_logo ) : ?>
							<img src="<?php echo $custom_logo[0]; ?>" alt="<?php bloginfo( 'name' ); ?>" />
						<?php else : ?>
							<?php bloginfo( 'name' ); ?>
						<?php endif; ?>
					</a>
				</div>
			</div>

			<div class="top-bar-right">
				<?php fp_top_bar_r(); ?>

				<?php if ( ! get_theme_mod( 'fp_mobile_menu_layout' ) || get_theme_mod( 'foundationpress_mobile_menu_layout' ) === 'topbar' ) : ?>
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>
			</div>
		</nav>
	</header>
