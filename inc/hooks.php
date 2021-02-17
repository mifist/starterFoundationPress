<?php
/*-----------------------================== Other ==================-----------------------*/

function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

## Embedding (oEmbed) in the “Text” widget
global $wp_embed;
add_filter( 'widget_text', array( & $wp_embed, 'run_shortcode' ), 8 );
add_filter( 'widget_text', array( & $wp_embed, 'autoembed'), 8 );
## Add all post types to the "Right Now" widget in the console
add_action( 'dashboard_glance_items' , 'add_right_now_info' );
function add_right_now_info( $items ){
	
	if( ! current_user_can('edit_posts') ) return $items; // выходим
	
	// типы записей
	$args = array( 'public' => true, '_builtin' => false );
	
	$post_types = get_post_types( $args, 'object', 'and' );
	
	foreach( $post_types as $post_type ){
		$num_posts = wp_count_posts( $post_type->name );
		$num       = number_format_i18n( $num_posts->publish );
		$text      = _n( $post_type->labels->singular_name, $post_type->labels->name, intval( $num_posts->publish ) );
		
		$items[] = "<a href=\"edit.php?post_type=$post_type->name\">$num $text</a>";
	}
	
	// таксономии
	$taxonomies = get_taxonomies( $args, 'object', 'and' );
	
	foreach( $taxonomies as $taxonomy ){
		$num_terms = wp_count_terms( $taxonomy->name );
		$num       = number_format_i18n( $num_terms );
		$text      = _n( $taxonomy->labels->singular_name, $taxonomy->labels->name , intval( $num_terms ) );
		
		$items[] = "<a href='edit-tags.php?taxonomy=$taxonomy->name'>$num $text</a>";
	}
	
	// users
	global $wpdb;
	
	$num  = $wpdb->get_var("SELECT COUNT(ID) FROM $wpdb->users");
	$text = _n( 'User', 'Users', $num );
	
	$items[] = "<a href='users.php'>$num $text</a>";
	
	return $items;
}

// Hide menu items in the admin panel
add_action( 'admin_menu', 'ca_remove_menu_items' );
function ca_remove_menu_items() {
	remove_menu_page( 'edit-comments.php' );                 // Comments
	// remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );
	// remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
}

function ca_posts_breadcrums() {
	$categories = get_the_category();
	?>
	<ul class="breadcrumb">
		<li class="breadcrumb__item">
			<a class="breadcrumb__link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php echo __( 'Home', CA_TEXTDOMAIN_FRONT ); ?>
			</a>
		</li>
		<?php if( !empty( $categories ) ) :
			$blog_link = ICL_LANGUAGE_CODE==='fr' ? '/actualites' : (ICL_LANGUAGE_CODE==='en' ? '/blog' : '/actualites'); ?>
			<li class="breadcrumb__item">
				<a class="breadcrumb__link" href="<?php echo $blog_link; ?>">
					<?php echo __( 'News', CA_TEXTDOMAIN_FRONT ); ?>
				</a>
			</li>
		<?php endif; ?>
		<li class="breadcrumb__item active">
			<?php the_title(); ?>
		</li>
	</ul>
	<?php
}

// Remove WordPress update notification for everyone except admin
add_action( 'admin_head', function () {
	if ( ! current_user_can( 'manage_options' ) ) {
		remove_action( 'admin_notices', 'update_nag', 3 );
		remove_action( 'admin_notices', 'maintenance_nag', 10 );
	}
} );

## close the ability to publish via xmlrpc.php
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Disable the emoji's
 */
//add_action( 'init', 'disable_emojis' );
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
		
		$urls = array_diff( $urls, array( $emoji_svg_url ) );
	}
	
	return $urls;
}
