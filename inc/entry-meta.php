<?php
/**
 * Entry meta information for posts
 *
 */

if ( ! function_exists( 'fp_entry_meta' ) ) :
	function fp_entry_meta() {
		// phpcs:ignore Squiz.PHP.EmbeddedPhp.ContentBeforeOpen ?>
		<time class="updated" datetime="<?php the_time( 'c' ); ?>"><?php
			/* translators: %1$s: current date, %2$s: current time */
			sprintf( __( 'Posted on %1$s at %2$s.', FP_TEXTDOMAIN ), get_the_date(), get_the_time() );
		// phpcs:ignore Squiz.PHP.EmbeddedPhp.ContentAfterEnd
		?></time>
		<p class="byline author"><?php esc_html__( 'Written by', FP_TEXTDOMAIN ); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author" class="fn"><?php the_author(); ?></a></p>
		<?php
	}
endif;
