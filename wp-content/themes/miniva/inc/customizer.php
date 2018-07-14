<?php
/**
 * Miniva Theme Customizer
 *
 * @package Miniva
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function miniva_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'miniva_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'miniva_customize_partial_blogdescription',
		) );
	}

	$section_priority = 160;
	foreach ( miniva_get_customizer_data() as $section_name => $section_data ) {
		/**
		 * Section
		 */
		$defaults = array(
			'priority' => $section_priority++,
		);

		$section_args = wp_parse_args( $section_data, $defaults );
		$wp_customize->add_section( $section_name, $section_args );

		$control_priority = 1;
		foreach ( (array) $section_data['fields'] as $field_name => $field_data ) {
			/**
			 * Setting
			 */
			$wp_customize->add_setting(
				$field_name, array(
					'default'           => isset( $field_data['default'] ) ? $field_data['default'] : '',
					'sanitize_callback' => isset( $field_data['sanitize_callback'] ) ? $field_data['sanitize_callback'] : miniva_get_sanitize_callback( $field_data['type'] ),
				)
			);

			/**
			 * Control
			 */
			$defaults = array(
				'priority' => $control_priority++,
				'section'  => $section_name,
			);

			$control_args = wp_parse_args( $field_data, $defaults );
			switch ( $control_args['type'] ) {
				case 'image':
					$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $field_name, $control_args ) );
					break;
				case 'color':
					$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $field_name, $control_args ) );
					break;
				default:
					$wp_customize->add_control( $field_name, $control_args );
					break;
			}
		}
	} // End foreach().
}
add_action( 'customize_register', 'miniva_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function miniva_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function miniva_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function miniva_customize_preview_js() {
	wp_enqueue_script( 'miniva-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'miniva_customize_preview_js' );

/**
 * Sanitization callback for 'select' and 'radio' type controls. This callback sanitizes `$input`
 * as a slug, and then validates `$input` against the choices defined for the control.
 *
 * @param  string               $input   Slug to sanitize.
 * @param  WP_Customize_Setting $setting Setting instance.
 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
 *
 * @link https://github.com/WPTRT/code-examples
 */
function miniva_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param  bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 *
 * @link https://github.com/WPTRT/code-examples
 */
function miniva_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

/**
 * Get sanitize callback based on the field type
 *
 * @param  string $type Field type.
 * @return callback
 */
function miniva_get_sanitize_callback( $type ) {
	switch ( $type ) {
		case 'text':
			return 'sanitize_text_field';
		case 'textarea':
			return 'sanitize_textarea_field';
		case 'select':
			return 'miniva_sanitize_select';
		case 'checkbox':
			return 'miniva_sanitize_checkbox';
		default:
			return 'sanitize_text_field';
	}
}

/**
 * Header layout callback
 *
 * @param  object $control Control.
 * @return boolean
 */
function miniva_header_default_callback( $control ) {
	$option = $control->manager->get_setting( 'header_layout' );
	return 'top' === $option->value() ? true : false;
}

/**
 * Get customizer data
 *
 * @return array
 */
function miniva_get_customizer_data() {
	$data['header']['title'] = esc_html__( 'Header', 'miniva' );

	$data['header']['fields']['header_layout'] = array(
		'type'    => 'select',
		'label'   => esc_html__( 'Logo Position', 'miniva' ),
		'choices' => miniva_get_header_layouts(),
		'default' => 'top',
	);

	$data['header']['fields']['logo_centered'] = array(
		'type'            => 'checkbox',
		'label'           => esc_html__( 'Centered Logo', 'miniva' ),
		'default'         => true,
		'active_callback' => 'miniva_header_default_callback',
	);

	$data['header']['fields']['menu_centered'] = array(
		'type'            => 'checkbox',
		'label'           => esc_html__( 'Centered Menu', 'miniva' ),
		'default'         => true,
		'active_callback' => 'miniva_header_default_callback',
	);

	$data['header']['fields']['header_search'] = array(
		'type'    => 'checkbox',
		'label'   => esc_html__( 'Show Search Button', 'miniva' ),
		'default' => false,
	);

	$data['content']['title'] = esc_html( 'Content', 'miniva' );

	$data['content']['fields']['posts_layout'] = array(
		'type'    => 'select',
		'label'   => esc_html__( 'Posts Layout', 'miniva' ),
		'choices' => miniva_get_posts_layouts(),
		'default' => 'large',
	);

	$data['content']['fields']['sidebar_layout'] = array(
		'type'    => 'select',
		'label'   => esc_html__( 'Sidebar Layout', 'miniva' ),
		'choices' => miniva_get_sidebar_layouts(),
		'default' => 'right',
	);

	$data['content']['fields']['excerpt_length'] = array(
		'type'    => 'text',
		'label'   => esc_html__( 'Excerpt Length', 'miniva' ),
		'default' => 20,
	);

	$data['content']['fields']['welcome_text'] = array(
		'type'        => 'textarea',
		'label'       => esc_html__( 'Welcome Text', 'miniva' ),
		'description' => esc_html__( 'A short text dislayed on front page.', 'miniva' ),
		'default'     => '',
	);

	return apply_filters( 'miniva_customizer_data', $data );
}
