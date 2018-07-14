<?php
/**
 * Contact options
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

// Add Contact section
$wp_customize->add_section( 'mega_blog_contact_section', array(
	'title'             => esc_html__( 'Contact Details','mega-blog' ),
	'description'       => esc_html__( 'Contact Section options.', 'mega-blog' ),
	'panel'             => 'mega_blog_front_page_panel',
) );

// Contact content enable control and setting
$wp_customize->add_setting( 'mega_blog_theme_options[contact_section_enable]', array(
	'default'			=> 	$options['contact_section_enable'],
	'sanitize_callback' => 'mega_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[contact_section_enable]', array(
	'label'             => esc_html__( 'Contact Section Enable', 'mega-blog' ),
	'section'           => 'mega_blog_contact_section',
	'on_off_label' 		=> mega_blog_switch_options(),
) ) );

// Contact us title setting and control
$wp_customize->add_setting( 'mega_blog_theme_options[contact_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'          	=> $options['contact_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'mega_blog_theme_options[contact_title]', array(
	'label'           	=> esc_html__( 'Title', 'mega-blog' ),
	'section'        	=> 'mega_blog_contact_section',
	'active_callback' 	=> 'mega_blog_is_contact_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_blog_theme_options[contact_title]', array(
		'selector'            => '#contact-us .wrapper h2.section-title',
		'settings'            => 'mega_blog_theme_options[contact_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'mega_blog_contact_title_partial',
    ) );
}

// Contact us address setting and control
$wp_customize->add_setting( 'mega_blog_theme_options[contact_address]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'          	=> $options['contact_address'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'mega_blog_theme_options[contact_address]', array(
	'label'           	=> esc_html__( 'Full Address', 'mega-blog' ),
	'section'        	=> 'mega_blog_contact_section',
	'active_callback' 	=> 'mega_blog_is_contact_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_blog_theme_options[contact_address]', array(
		'selector'            => '#contact-us .wrapper .section-content .contact-address ul li span.address',
		'settings'            => 'mega_blog_theme_options[contact_address]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'mega_blog_contact_address_partial',
    ) );
}

// Contact phone control and setting
$wp_customize->add_setting( 'mega_blog_theme_options[contact_phone]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['contact_phone'],
) );

$wp_customize->add_control( new Mega_Blog_Multi_Input_Custom_Control( $wp_customize, 'mega_blog_theme_options[contact_phone]', array(
	'label'             => esc_html__( 'Phone No.', 'mega-blog' ),
	'button_text'       => esc_html__( 'Add Phone No.', 'mega-blog' ),
	'section'           => 'mega_blog_contact_section',
	'active_callback' 	=> 'mega_blog_is_contact_section_enable',
) ) );

// Contact email control and setting
$wp_customize->add_setting( 'mega_blog_theme_options[contact_email]', array(
	'sanitize_callback' => 'mega_blog_sanitize_email',
	'default'			=> $options['contact_email'],
) );

$wp_customize->add_control( new Mega_Blog_Multi_Input_Custom_Control( $wp_customize, 'mega_blog_theme_options[contact_email]', array(
	'label'             => esc_html__( 'Email ID', 'mega-blog' ),
	'button_text'       => esc_html__( 'Add Email ID.', 'mega-blog' ),
	'section'           => 'mega_blog_contact_section',
	'active_callback' 	=> 'mega_blog_is_contact_section_enable',
) ) );

// Contact form setting and control
$wp_customize->add_setting( 'mega_blog_theme_options[contact_form]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'mega_blog_theme_options[contact_form]', array(
	'label'           	=> esc_html__( 'Contact Form Shortcode', 'mega-blog' ),
	'description'       => sprintf( '%1$s <a href="' . esc_url( 'https://wordpress.org/plugins/contact-form-7/' ) .'" target="_blank"> %2$s </a> %3$s', esc_html__( 'Input shortcode from Contact Form 7 Plugin', 'mega-blog' ), esc_html__( 'Click Here', 'mega-blog' ), esc_html__( 'to download plugin.', 'mega-blog' ) ),
	'section'        	=> 'mega_blog_contact_section',
	'active_callback' 	=> 'mega_blog_is_contact_section_enable',
	'type'				=> 'text',
) );