<?php
/**
 * functions and definitions
 */

/**
 * definitions
 */
define( 'PRESENTATION_LITE_NAME', 'Presentation Lite' );
define( 'PRESENTATION_IMG', get_template_directory_uri() . '/inc/images/' );


if ( ! function_exists( 'presentation_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function presentation_lite_setup() {

	/* keep the media in check */
	if ( ! isset( $content_width ) ) $content_width = 690;

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'presentation_lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails on posts and pages
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'presentation_lite' ),
		'header' => __( 'Header Menu (no drop-downs)', 'presentation_lite' )
	) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );

	// Add support for title tag
	add_theme_support( 'title-tag' );
}
endif; // presentation_lite_setup
add_action( 'after_setup_theme', 'presentation_lite_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function presentation_lite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'presentation_lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'presentation_lite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function presentation_lite_scripts() {
	// main stylesheet
	wp_enqueue_style( 'presentation-lite-style', get_stylesheet_uri() );

	// color stylesheet
	if ( get_theme_mod( 'presentation_lite_stylesheet' ) == 'blue' ) :
		wp_enqueue_style( 'presentation-lite-design', get_template_directory_uri() . '/inc/css/blue.css' );
	elseif ( get_theme_mod( 'presentation_lite_stylesheet' ) ==  'purple' ) :
		wp_enqueue_style( 'presentation-lite-design', get_template_directory_uri() . '/inc/css/purple.css' );
	elseif ( get_theme_mod( 'presentation_lite_stylesheet' ) ==  'red' ) :
		wp_enqueue_style( 'presentation-lite-design', get_template_directory_uri() . '/inc/css/red.css' );
	elseif ( get_theme_mod( 'presentation_lite_stylesheet' ) ==  'gray' ) :
		wp_enqueue_style( 'presentation-lite-design', get_template_directory_uri() . '/inc/css/gray.css' );
	else :
		wp_enqueue_style( 'presentation-lite-design', get_template_directory_uri() . '/inc/css/blue.css' );
	endif;

	// font awesome
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/inc/fonts/font-awesome/css/font-awesome.min.css' );

	// navigation toggle
	wp_enqueue_script( 'presentation-lite-navigation', get_template_directory_uri() . '/inc/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'presentation-lite-skip-link-focus-fix', get_template_directory_uri() . '/inc/js/skip-link-focus-fix.js', array(), '20130115', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'presentation_lite_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Admin page
 */
require get_template_directory() . '/inc/admin.php';


/** ===============
 * fallback for empty nav menus
 */
function presentation_lite_menu_home() { ?>
	<div class="menu-testing-menu-container">
		<ul class="menu nav-menu">
			<li class="menu-item">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_bloginfo( 'description' ); ?>"><?php _e( 'Home', 'presentation' ); ?></a>
			</li>
		</ul>
	</div>
<?php }


/** ===============
 * Adjust excerpt length
 */
function presentation_lite_custom_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'presentation_lite_custom_excerpt_length', 999 );


/** ===============
 * Replace excerpt ellipses with new ellipses and link to full article
 */
function presentation_lite_excerpt_more( $more ) {
	return '...</p> <div class="continue-reading"><a class="more-link" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'presentation_lite' ) . ' &rarr;</a></div>';
}
add_filter( 'excerpt_more', 'presentation_lite_excerpt_more' );


/** ===============
 * Add .top class to the first post in a loop
 */
function presentation_lite_first_post_class( $classes ) {
	global $wp_query;
	if ( 0 == $wp_query->current_post )
		$classes[] = 'top';
	return $classes;
}
add_filter( 'post_class', 'presentation_lite_first_post_class' );


/** ===============
 * Only show regular posts in search results
 */
function presentation_lite_search_filter( $query ) {
	if ( $query->is_search && ! is_admin() )
		$query->set( 'post_type', 'post' );
	return $query;
}
add_filter( 'pre_get_posts','presentation_lite_search_filter' );