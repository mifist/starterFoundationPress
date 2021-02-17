<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<header class="page-header">
	<h1 class="page-title"><?php esc_html_e( 'Nothing Found', FP_TEXTDOMAIN ); ?></h1>
</header>

<div class="page-content">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p>
		<?php
			printf(
				/* translators: %1$s: new post url */
				__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', FP_TEXTDOMAIN ),
				esc_url( admin_url( 'post-new.php' ) )
			);
		?>
	</p>

	<?php elseif ( is_search() ) : ?>

		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', FP_TEXTDOMAIN ); ?></p>
		<?php get_search_form(); ?>

	<?php else : ?>

		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', FP_TEXTDOMAIN ); ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>
</div>
