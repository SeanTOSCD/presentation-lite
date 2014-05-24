<?php
/**
 * the header element and the opening of the main content elements
 */
$title = get_bloginfo('name');
$tagline = get_bloginfo('description');
$char = get_bloginfo('charset');
$ping = get_bloginfo('pingback_url');
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php echo $char; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title(''); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php echo $ping; ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="top-bar-area full">
		<div class="main">
			<div id="top-bar" class="top-bar inner">
				<?php if ( get_theme_mod( 'presentation_lite_hide_tagline' ) != 1 ) : ?>
					<h1 class="site-description"><?php echo $tagline; ?></h1>
				<?php endif; ?>
				<?php do_action( 'presentation_social_profiles' ); ?>
			</div>
		</div>
	</div>
	<div class="header-area full">
		<div class="main">
			<header id="masthead" class="site-header inner">
				<div class="header-elements">
					<span class="site-title">
						<?php if ( get_theme_mod( 'presentation_lite_logo' ) ) : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img src="<?php echo get_theme_mod( 'presentation_lite_logo' ); ?>" alt="<?php echo esc_attr( $title ); ?>">
							</a>
						<?php else : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( $title ); ?>">
								<?php echo $title; ?>
							</a>
						<?php endif; ?>
					</span>
					<nav id="header-navigation" class="header-menu" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'header', 'fallback_cb' => 'presentation_lite_menu_home' ) ); ?>
					</nav>
				</div>
			</header>
			<div class="main-menu-container inner">
				<nav id="site-navigation" class="main-navigation clear" role="navigation">
					<span class="menu-toggle"><i class="fa fa-bars"></i> <?php _e( 'Menu', 'presentation_lite' ); ?></span>
					<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'presentation_lite' ); ?></a>		
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'presentation_lite_menu_home' ) ); ?>
				</nav>
			</div>
		</div>
	</div>
	<div class="main-content-area full">
		<div class="main">
			<div id="content" class="site-content inner">