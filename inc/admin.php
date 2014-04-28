<?php
/**
 * admin page
 */
define( 'PRESENTATION_FULL_NAME', 'Presentation' );

/***********************************************
* menu item
***********************************************/

function presentation_license_menu() {
	add_theme_page( PRESENTATION_LITE_NAME, PRESENTATION_LITE_NAME, 'manage_options', 'presentation-lite', 'presentation_lite_admin' );
}
add_action('admin_menu', 'presentation_license_menu');


/***********************************************
* admin styles
***********************************************/

function presentation_lite_admin_styles() {	
	wp_enqueue_style( 'presentation-lite-admin-style', get_template_directory_uri() . '/inc/css/admin.css' );
}
add_action( 'admin_print_scripts-appearance_page_presentation-lite', 'presentation_lite_admin_styles' );


/***********************************************
* admin page output
***********************************************/

function presentation_lite_admin() { ?>
	<div class="wrap upgrade-wrap">
		<h2 class="headline"><?php echo sprintf( __( 'Upgrade to the Full-Featured Version of %1$s!', 'presentation_lite' ), PRESENTATION_FULL_NAME ); ?></h2>
		<p>
			<?php echo sprintf(__( 'You are currently using the <strong>FREE</strong> version of %1$s. Upgrade to the full-featured version of %1$s for more options, <strong>full bbPress support</strong>, more color schemes, full support for one of the best e-commerce solutions for WordPress, <strong>Easy Digital Downloads</strong>, and more!', 'presentation_lite' ), PRESENTATION_FULL_NAME	); 
			?>
		</p>
		<p><a class="cta-button" href="http://buildwpyourself.com/downloads/presentation/" target="_blank"><?php echo sprintf(__( 'View the Full Version of %1$s', 'presentation_lite' ), PRESENTATION_FULL_NAME ); ?></a></p>
		<p><?php echo PRESENTATION_LITE_NAME . __( ' users get 20% off by using Coupon Code: <strong>LITE20</strong> at checkout.', 'presentation_lite' ); ?></p>
		<div class="screenshot">
			<img class="presentation-screenshot" src="<?php echo PRESENTATION_IMG . 'presentation-full.png'; ?>" alt="Presentation">
		</div>
	</div>
	<?php
	/*
	 * only show child theme instructions if Presentation Lite is the active theme
	 */
	$presentation_lite = wp_get_theme();
	if ( $presentation_lite->get( 'Name' ) === 'Presentation Lite' ) : ?>
	
		<div class="wrap child-theme-wrap">
			<h2 class="headline"><?php echo sprintf( __( 'How to Create a Child Theme for %1$s', 'presentation_lite' ), PRESENTATION_LITE_NAME ); ?></h2>
			<ol>
				<li><?php _e( 'Through FTP, navigate to <code>your_website/wp-content/themes/</code> and in that directory, create a new folder as the name of your child theme. Something like <code>presentation-lite-child</code> is perfectly fine.', 'presentation_lite' ); ?></li>
				<li><?php _e( 'Inside of your new folder, create a file called <code>style.css</code> (the name is NOT optional).', 'presentation_lite' ); ?></li>
				<li><?php _e( 'Inside of your new <code>style.css</code> file, add the following CSS:', 'presentation_lite' ); ?>
				
<pre class="presentation-pre">
/*
	Theme Name: your_child_theme_name
	Author: your_name
	Author URI: 
	Description: Child theme for Presentation Lite
	Template: presentation-lite
*/

@import url("../presentation-lite/style.css");

/*--------------------------------------------------------------
Theme customization starts here
--------------------------------------------------------------*/
</pre>
				</li>
				<li><?php _e( 'You may edit all of what you pasted EXCEPT for the <code>Template</code> line as well as the <code>@import</code> line. Leave those two lines alone or the child theme will not work properly.', 'presentation_lite' ); ?></li>
				<li><?php _e( 'With your new child theme folder in place and the above CSS pasted inside of your <code>style.css</code> file, go back to your WordPress dashboard and navigate to "Appearance -> Themes" and locate your new theme (you\'ll see the name you chose). Activate your theme.', 'presentation_lite' ); ?></li>
				<li><?php _e( 'With your child theme activated, you can edit its stylesheet all you like. You may also create a <code>functions.php</code> file in the root of your child theme to add custom PHP.', 'presentation_lite' ); ?></li>
				<li><?php _e( 'Enjoy!', 'presentation_lite' ); ?></li>
			</ol>
		</div>
		
	<?php endif;
}