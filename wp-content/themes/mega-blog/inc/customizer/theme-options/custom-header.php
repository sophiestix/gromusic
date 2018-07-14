<?php
/**
 * Custom Header options
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

// Custom Header setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[custom_header_blog]', array(
	'default'           => $options['custom_header_blog'],
	'sanitize_callback' => 'mega_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[custom_header_blog]', array(
	'label'             => esc_html__( 'Enable Header Image in Blog/Archive/Search Page', 'mega-blog' ),
	'section'           => 'header_image',
	'on_off_label' 		=> mega_blog_switch_options(),
) ) );

// Custom Header Title
$wp_customize->add_setting( 'mega_blog_theme_options[custom_header_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['custom_header_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'mega_blog_theme_options[custom_header_title]', array(
	'label'      		=> esc_html__( 'Front Page Header Title', 'mega-blog' ),
	'section'     		=> 'header_image',
	'type'        		=> 'text',
	'active_callback'	=> 'mega_blog_is_frontpage',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_blog_theme_options[custom_header_title]', array(
		'selector'            => '#custom-header .custom-header-content h2.banner-title',
		'settings'            => 'mega_blog_theme_options[custom_header_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'mega_blog_custom_header_title_partial',
    ) );
}

// Custom Header Sub Title
$wp_customize->add_setting( 'mega_blog_theme_options[custom_header_sub_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['custom_header_sub_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'mega_blog_theme_options[custom_header_sub_title]', array(
	'label'       		=> esc_html__( 'Front Page Header Sub Title', 'mega-blog' ),
	'section'     		=> 'header_image',
	'type'        		=> 'text',
	'active_callback'	=> 'mega_blog_is_frontpage',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_blog_theme_options[custom_header_sub_title]', array(
		'selector'            => '#custom-header .custom-header-content span.banner-sub-title',
		'settings'            => 'mega_blog_theme_options[custom_header_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'mega_blog_custom_header_sub_title_partial',
    ) );
}