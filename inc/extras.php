<?php
/**
 * Custom functions that act independently of the theme templates
 */

/**
 * social profiles
 */
function presentation_lite_social_profiles() {
	if ( get_theme_mod( 'presentation_lite_twitter' ) || get_theme_mod( 'presentation_lite_facebook' ) || get_theme_mod( 'presentation_lite_gplus' ) || get_theme_mod( 'presentation_lite_linkedin' ) ) : ?>
		<div class="social-links">
			<?php
				$social_profiles = array(
					'twitter'	=> array(
						'icon' 		=> '<i class="fa fa-twitter-square"></i>',
						'option'	=> esc_url( get_theme_mod( 'presentation_lite_twitter' ) )
					),
					'facebook'	=> array(
						'icon' 		=> '<i class="fa fa-facebook-square"></i>',
						'option'	=> esc_url( get_theme_mod( 'presentation_lite_facebook' ) )
					),
					'gplus'	=> array(
						'icon' 		=> '<i class="fa fa-google-plus-square"></i>',
						'option'	=> esc_url( get_theme_mod( 'presentation_lite_gplus' ) )
					),
					'linkedin'	=> array(
						'icon' 		=> '<i class="fa fa-linkedin-square"></i>',
						'option'	=> esc_url( get_theme_mod( 'presentation_lite_linkedin' ) )
					),
				);
				foreach ( $social_profiles as $profile ) {
					if ( '' != $profile[ 'option' ] ) :
						echo '<a href="', $profile[ 'option' ], '">', $profile[ 'icon' ], '</a>';
					endif;
				}
			?>
		</div>
	<?php
	endif; // end check for any social profile
}
add_action( 'presentation_social_profiles', 'presentation_lite_social_profiles' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function presentation_lite_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) :
		$classes[] = 'group-blog';
	endif;

	return $classes;
}
add_filter( 'body_class', 'presentation_lite_body_classes' );

/**
 * Render document title for backwards compatibility
 *
 * @resource https://make.wordpress.org/core/2015/10/20/document-title-in-4-4/
 * @since 1.0.5
 */
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function presentation_lite_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'presentation_lite_render_title' );
}

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function presentation_lite_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'presentation_lite_setup_author' );