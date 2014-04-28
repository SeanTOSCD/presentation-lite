<?php
/**
 * Theme Customizer
 */
function presentation_lite_customize_register( $wp_customize ) {
	
	/** ===============
	 * Extends CONTROLS class to add textarea
	 */
	class presentation_lite_customize_textarea_control extends WP_Customize_Control {
		public $type = 'textarea';
		public function render_content() { ?>
	
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea rows="5" style="width:98%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
		</label>
	
		<?php }
	}
	

	/** ===============
	 * Site Title (Logo) & Tagline
	 */
	// section adjustments
	$wp_customize->get_section( 'title_tagline' )->title = __( 'Site Title (Logo) & Tagline', 'presentation_lite' );
	$wp_customize->get_section( 'title_tagline' )->priority = 10;
	
	//site title
	$wp_customize->get_control( 'blogname' )->priority = 10;
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	
	// tagline
	$wp_customize->get_control( 'blogdescription' )->priority = 30;
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	
	// logo uploader
	$wp_customize->add_setting( 'presentation_lite_logo', array( 'default' => null ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'presentation_lite_logo', array(
		'label'		=> __( 'Custom Site Logo (replaces title)', 'presentation_lite' ),
		'section'	=> 'title_tagline',
		'settings'	=> 'presentation_lite_logo',
		'priority'	=> 20
	) ) );


	/** ===============
	 * Presentation Lite Design Options
	 */
	$wp_customize->add_section( 'presentation_lite_style_section', array(
    	'title'       	=> __( 'Design Options', 'presentation_lite' ),
		'description' 	=> __( 'Choose a color scheme for Presentation Lite. Individual styles can be overwritten in your child theme stylesheet.', 'presentation_lite' ),
		'priority'   	=> 25,
	) );
	$wp_customize->add_setting( 'presentation_lite_stylesheet', array( 
		'default' => 'blue', 
		'sanitize_callback' => 'presentation_lite_sanitize_stylesheet' 
	) );
	$wp_customize->add_control( 'presentation_lite_stylesheet', array(
		'type' => 'select',
		'label' => __( 'Choose a color scheme:', 'presentation_lite' ),
		'section' => 'presentation_lite_style_section',
		'choices' => array(
			'blue'		=> 'Blue',
			'purple'	=> 'Purple',
			'red'		=> 'Red',
			'gray'		=> 'Gray'
	) ) );	


	/** ===============
	 * Content Options
	 */
	$wp_customize->add_section( 'presentation_lite_content_section', array(
    	'title'       	=> __( 'Content Options', 'presentation_lite' ),
		'description' 	=> __( 'Adjust the display of content on your website. All options have a default value that can be left as-is but you are free to customize.', 'presentation_lite' ),
		'priority'   	=> 20,
	) );
	// post content
	$wp_customize->add_setting( 'presentation_lite_post_content', array( 
		'default' => 'full_content',
		'sanitize_callback' => 'presentation_lite_sanitize_radio'  
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'presentation_lite_post_content', array(
		'label'		=> __( 'Post Feed Content', 'presentation_lite' ),
		'section'	=> 'presentation_lite_content_section',
		'settings'	=> 'presentation_lite_post_content',
		'priority'	=> 10,
		'type'      => 'radio',
		'choices'   => array(
			'excerpt'		=> 'Excerpt',
			'full_content'	=> 'Full Content'
		),
	) ) );
	// show single post footer?
	$wp_customize->add_setting( 'presentation_lite_post_footer', array( 
		'default' => 1,
		'sanitize_callback' => 'presentation_lite_sanitize_checkbox'  
	) );
	$wp_customize->add_control( 'presentation_lite_post_footer', array(
		'label'		=> __( 'Show Post Footer on Single Posts?', 'presentation_lite' ),
		'section'	=> 'presentation_lite_content_section',
		'priority'	=> 50,
		'type'      => 'checkbox',
	) );
	// twitter url
	$wp_customize->add_setting( 'presentation_lite_twitter', array( 
		'default' => null,
		'sanitize_callback' => 'presentation_lite_sanitize_text'
	) );
	$wp_customize->add_control( 'presentation_lite_twitter', array(
		'label'		=> __( 'Twitter Profile URL', 'presentation_lite' ),
		'section'	=> 'presentation_lite_content_section',
		'settings'	=> 'presentation_lite_twitter',
		'priority'	=> 80,
	) );
	// facebook url
	$wp_customize->add_setting( 'presentation_lite_facebook', array( 
		'default' => null,
		'sanitize_callback' => 'presentation_lite_sanitize_text'
	) );
	$wp_customize->add_control( 'presentation_lite_facebook', array(
		'label'		=> __( 'Facebook Profile URL', 'presentation_lite' ),
		'section'	=> 'presentation_lite_content_section',
		'settings'	=> 'presentation_lite_facebook',
		'priority'	=> 90,
	) );
	// google plus url
	$wp_customize->add_setting( 'presentation_lite_gplus', array( 
		'default' => null,
		'sanitize_callback' => 'presentation_lite_sanitize_text'
	) );
	$wp_customize->add_control( 'presentation_lite_gplus', array(
		'label'		=> __( 'Google Plus Profile URL', 'presentation_lite' ),
		'section'	=> 'presentation_lite_content_section',
		'settings'	=> 'presentation_lite_gplus',
		'priority'	=> 100,
	) );
	// linkedin url
	$wp_customize->add_setting( 'presentation_lite_linkedin', array( 
		'default' => null,
		'sanitize_callback' => 'presentation_lite_sanitize_text'
	) );
	$wp_customize->add_control( 'presentation_lite_linkedin', array(
		'label'		=> __( 'LinkedIn Profile URL', 'presentation_lite' ),
		'section'	=> 'presentation_lite_content_section',
		'settings'	=> 'presentation_lite_linkedin',
		'priority'	=> 110,
	) );
	

	/** ===============
	 * Navigation Menu(s)
	 */
	// section adjustments
	$wp_customize->get_section( 'nav' )->title = __( 'Navigation Menu(s)', 'presentation_lite' );
	$wp_customize->get_section( 'nav' )->priority = 40;
	
	

	/** ===============
	 * Static Front Page
	 */
	// section adjustments
	$wp_customize->get_section( 'static_front_page' )->priority = 50;
}
add_action( 'customize_register', 'presentation_lite_customize_register' );


/** ===============
 * Sanitize the theme design select option
 */
function presentation_lite_sanitize_stylesheet( $input ) {
    $valid = array(
		'blue'		=> 'Blue',
		'purple'	=> 'Purple',
		'red'		=> 'Red',
		'gray'		=> 'Gray'
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}


/** ===============
 * Sanitize checkbox options
 */
function presentation_lite_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return 0;
    }
}


/** ===============
 * Sanitize radio options
 */
function presentation_lite_sanitize_radio( $input ) {
    $valid = array(
		'excerpt'		=> 'Excerpt',
		'full_content'	=> 'Full Content'
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}


/** ===============
 * Sanitize text input
 */
function presentation_lite_sanitize_text( $input ) {
    return strip_tags( stripslashes( $input ) );
}


/** ===============
 * Add Customizer UI styles to the <head> only on Customizer page
 */
function presentation_lite_customizer_styles() { ?>
	<style type="text/css">
		body { background: #fff; }
		#customize-controls #customize-theme-controls .description { display: block; color: #999; margin: 2px 0 15px; font-style: italic; }
		textarea, input, select, .customize-description { font-size: 12px !important; }
		.customize-control-title { font-size: 13px !important; margin: 10px 0 3px !important; }
		.customize-control label { font-size: 12px !important; }
	</style>
<?php }
add_action('customize_controls_print_styles', 'presentation_lite_customizer_styles');


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function presentation_lite_customize_preview_js() {
	wp_enqueue_script( 'presentation_lite_customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'presentation_lite_customize_preview_js' );
