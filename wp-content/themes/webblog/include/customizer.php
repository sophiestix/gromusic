<?php
/**
 * Webblog: Customizer
 *
 * @package Webblog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 

function webblog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_image'  )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'webblog_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'webblog_customize_partial_blogdescription',
	) );
	
	
	/**
	 * Theme options.
	 */
	 $default = webblog_default_theme_options();
	 
	 $wp_customize->add_panel( 'theme_option_panel',
		array(
			'title'      => esc_html__( 'Theme Options', 'webblog' ),
			'priority'   => 200,
			'capability' => 'edit_theme_options',
		)
	);
	
	// Header Section.
	$wp_customize->add_section( 'webblog_header_section',
		array(
			'title'      => esc_html__( 'Header Options', 'webblog' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting sticky header.
	$wp_customize->add_setting( 'webblog_sticky_header_status',
		array(
			'default'           => $default['webblog_sticky_header_status'],
			'sanitize_callback' => 'webblog_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'webblog_sticky_header_status',
		array(
			'label'    			=> esc_html__( 'Sticky Header', 'webblog' ),
			'section'  			=> 'webblog_header_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);
	
	// Breadcrumb Section.
	$wp_customize->add_section( 'section_breadcrumb',
		array(
			'title'      => esc_html__( 'Breadcrumb Options', 'webblog' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting breadcrumb_type.
	$wp_customize->add_setting( 'breadcrumb_type',
		array(
			'default'           => $default['breadcrumb_type'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'webblog_sanitize_select',
		)
	);
	
	$wp_customize->add_control( 'breadcrumb_type',
		array(
			'label'       => esc_html__( 'Breadcrumb Type', 'webblog' ),
			'section'     => 'section_breadcrumb',
			'type'        => 'radio',
			'priority'    => 100,
			'choices'     => array(
				'disable' => esc_html__( 'Disable', 'webblog' ),
				'normal'  => esc_html__( 'Normal', 'webblog' ),
			),
		)
	);

	
	// Footer Section.
	$wp_customize->add_section( 'section_footer',
		array(
			'title'      => esc_html__( 'Footer Options', 'webblog' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting copyright_text.
	$wp_customize->add_setting( 'copyright_text',
		array(
			'default'           => $default['copyright_text'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 'copyright_text',
		array(
			'label'    => esc_html__( 'Copyright Text', 'webblog' ),
			'section'  => 'section_footer',
			'type'     => 'text',
			'priority' => 100,
		)
	);
	
	
	// Back To Top Section.
	$wp_customize->add_section( 'section_back_to_top',
		array(
			'title'      => esc_html__( 'Back To Top Options', 'webblog' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting breadcrumb_type.
	$wp_customize->add_setting( 'back_to_top_type',
		array(
			'default'           => $default['back_to_top'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'webblog_sanitize_select',
		)
	);
	
	$wp_customize->add_control( 'back_to_top_type',
		array(
			'label'       => esc_html__( 'Active?', 'webblog' ),
			'section'     => 'section_back_to_top',
			'type'        => 'radio',
			'priority'    => 100,
			'choices'     => array(
				'disable' => esc_html__( 'Disable', 'webblog' ),
				'enable'  => esc_html__( 'Enable', 'webblog' ),
			),
		)
	);
	
	// Slider Section.
	$wp_customize->add_section( 'featured_slider',
		array(
			'title'      => esc_html__( 'Slider Option', 'webblog' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting slider.
	$wp_customize->add_setting( 'slider_status',
		array(
			'default'           => $default['slider_status'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'webblog_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'slider_status',
		array(
			'label'       => esc_html__( 'Post Slider', 'webblog' ),
			'description' => esc_html__('Note: Hide Header Image If you Want Post Slider.', 'webblog' ),
			'section'     => 'featured_slider',
			'type'        => 'checkbox',
			'priority'    => 100		
		)
	);
	
	
	//post count
	$wp_customize->add_setting( 'slider_count',
		array(
			'default'           => absint( $default['slider_count'] ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'webblog_sanitize_select',
		)
	);
	
	$wp_customize->add_control( 'slider_count',
		array(
			'label'       => esc_html__( 'Number Of Slider', 'webblog' ),
			'section'     => 'featured_slider',
			'type'        => 'select',
			'priority'    => 100,
			'choices'     => array(
				'2' => esc_html__( '2', 'webblog' ),
				'3'  => esc_html__( '3', 'webblog' ),
				'4'  => esc_html__( '4', 'webblog' ),
				'5'  => esc_html__( '5', 'webblog' )
			),
		)
	);
	
	
	//post navigation
	$wp_customize->add_setting( 'slider_navigation',
		array(
			'default'           => $default['slider_navigation'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'webblog_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'slider_navigation',
		array(
			'label'       => esc_html__( 'Post Navigation', 'webblog' ),
			'section'     => 'featured_slider',
			'type'        => 'checkbox',
			'priority'    => 100
		)
	);
	
	//post pagination
	$wp_customize->add_setting( 'slider_pagination',
		array(
			'default'           => $default['slider_pagination'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'webblog_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'slider_pagination',
		array(
			'label'       => esc_html__( 'Post Pagination', 'webblog' ),
			'section'     => 'featured_slider',
			'type'        => 'checkbox',
			'priority'    => 100
		)
	);
	
	//post excerpt section
	$wp_customize->add_section( 'webblog_post_excerpt_section',
		array(
			'title'      => esc_html__( 'Post Excerpt', 'webblog' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);
	
	// Setting slider.
	$wp_customize->add_setting( 'webblog_post_excerpt_status',
		array(
			'default'           => $default['webblog_post_excerpt_status'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'webblog_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'webblog_post_excerpt_status',
		array(
			'label'       => esc_html__( 'Post Excerpt', 'webblog' ),
			'section'     => 'webblog_post_excerpt_section',
			'type'        => 'checkbox',
			'priority'    => 100		
		)
	);
	//excerpt length
	$wp_customize->add_setting( 'webblog_post_excerpt_length',
		array(
			'default'           => $default['webblog_post_excerpt_length'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'webblog_sanitize_number_absint',
		)
	);
	
	$wp_customize->add_control( 'webblog_post_excerpt_length',
		array(
			'label'       => esc_html__( 'Excerpt Length', 'webblog' ),
			'section'     => 'webblog_post_excerpt_section',
			'type'        => 'number',
			'input_attrs' => array(
								'min' => '1', 'step' => '1', 'max' => '50',
							  ),
			'priority'    => 100		
		)
	);
	
}
add_action( 'customize_register', 'webblog_customize_register' );


// Saniize the integer
if( !function_exists( 'webblog_sanitize_number_absint' ) ){
	
	function webblog_sanitize_number_absint( $number, $setting ){
		// Ensure $number is an absolute integer (whole number, zero or greater).
	  $number = absint( $number );
	
	  // If the input is an absolute integer, return it; otherwise, return the default
	  return ( $number ? $number : $setting->default );
	}
}
/**
 * Sanitize the colorscheme.
 *
 * @param string $input Color scheme.
 */
function webblog_sanitize_colorscheme( $input ) {
	$valid = array( 'light', 'dark', 'custom' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'light';
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Webblog 1.0
 * @see webblog_customize_register()
 *
 * @return void
 */
function webblog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Webblog 1.0
 * @see webblog_customize_register()
 *
 * @return void
 */
function webblog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function webblog_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function webblog_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

if ( ! function_exists( 'webblog_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 *
	 * @since 1.0.0
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function webblog_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true === $checked ) ? true : false );

	}

endif;

if ( ! function_exists( 'webblog_sanitize_select' ) ) :

	/**
	 * Sanitize select.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed                $input The value to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return mixed Sanitized value.
	 */
	function webblog_sanitize_select( $input, $setting ) {

		// Ensure input is clean.
		$input = sanitize_text_field( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

endif;


if ( ! function_exists( 'webblog_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function webblog_default_theme_options() {

		$defaults = array();

		//sticky
		$defaults['webblog_sticky_header_status'] = false;
		
		//Back To Top
		$defaults['back_to_top']  	= 'disable';

		// Footer.
		$defaults['copyright_text'] 	= esc_html__( 'Copyright &copy; All rights reserved.', 'webblog' );

		// Breadcrumb.
		$defaults['breadcrumb_type'] 	= 'disable';
		
		//slider active
		$defaults['slider_status'] = false;
		
		//slider count
		$defaults['slider_count'] = 2 ;
		
		//featured slider navigation
		$defaults['slider_navigation'] = true;
		
		//featured slider pagination
		$defaults['slider_pagination'] = true;
		
		$defaults['webblog_post_excerpt_status'] = false;
		
		//post excerpt length
		$defaults['webblog_post_excerpt_length'] = 20;
		
		return $defaults;
	}

endif;

if ( ! function_exists( 'webblog_get_option' ) ) :

	/**
	 * Get theme option.
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function webblog_get_option( $key ) {

		if ( empty( $key ) ) {

			return;

		}

		$value 			= '';

		$default 		= webblog_default_theme_options();

		$default_value 	= null;

		if ( is_array( $default ) && isset( $default[ $key ] ) ) {

			$default_value = $default[ $key ];

		}

		if ( null !== $default_value ) {

			$value = get_theme_mod( $key, $default_value );

		}else {

			$value = get_theme_mod( $key );

		}

		return $value;

	}

endif;
if ( ! function_exists( 'webblog_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see webblog_custom_header_setup().
 */
function webblog_header_style() { 

$header_text_color = get_header_textcolor();
	if( !empty( $header_text_color ) ): ?>
		<style type="text/css">
			   .site-header a,
			   .site-header p{
					color: #<?php echo esc_attr( $header_text_color ); ?>;
			   }
		</style>
			
		<?php
	endif;
}

endif;

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function webblog_customize_preview_js() {
	wp_enqueue_script( 'webblog-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'webblog_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function webblog_panels_js() {
	wp_enqueue_script( 'webblog-customize-controls', get_theme_file_uri( '/assets/js/customize-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'webblog_panels_js' );
