<?php
/**
 * Functionality to improve privacy of users.
 *
 */

/**
 * Replaces normal YouTube embeds with nocookie embeds
 * in the_content to improve privacy of users.
 *
 * @param string $content the content.
 */
function fp_replace_youtube_nocookie( $content ) {
	return str_replace( 'youtube.com/embed', 'youtube-nocookie.com/embed', $content );
}
add_filter( 'the_content', 'fp_replace_youtube_nocookie', 99999 );


/**
 * Remove IPs from comments.
 *
 * @param string $comment_author_ip the ip of the comment author.
 */
function fp_remove_commentsip( $comment_author_ip ) {
	return '';
}
add_filter( 'pre_comment_user_ip', 'fp_remove_commentsip' );
