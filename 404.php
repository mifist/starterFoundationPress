<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="main-container">
	<div class="main-grid">
		<main class="main-content main-content--with-sidebar">
			<article>
				<header>
					<h1 class="entry-title"><?php esc_html_e( 'Page not found', FP_TEXTDOMAIN ); ?></h1>
				</header>

				<div class="entry-content">
					<p class="bottom">
						<?php esc_html_e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', FP_TEXTDOMAIN ); ?>
					</p>

					<a class="button" href="<?php echo esc_url( home_url() ); ?>">
						<?php esc_html_e( 'Return to the homepage', FP_TEXTDOMAIN ); ?>
					</a>
				</div>
			</article>
		</main>

		<?php get_sidebar(); ?>
	</div>
</div>

<?php
get_footer();
