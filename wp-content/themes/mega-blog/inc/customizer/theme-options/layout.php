<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'mega_blog_layout', array(
	'title'               => esc_html__('Layout','mega-blog'),
	'description'         => esc_html__( 'Layout section options.', 'mega-blog' ),
	'panel'               => 'mega_blog_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[site_layout]', array(
	'sanitize_callback'   => 'mega_blog_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Mega_Blog_Custom_Radio_Image_Control ( $wp_customize, 'mega_blog_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'mega-blog' ),
	'section'             => 'mega_blog_layout',
	'choices'			  => mega_blog_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'mega_blog_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Mega_Blog_Custom_Radio_Image_Control ( $wp_customize, 'mega_blog_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'mega-blog' ),
	'section'             => 'mega_blog_layout',
	'choices'			  => mega_blog_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'mega_blog_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Mega_Blog_Custom_Radio_Image_Control ( $wp_customize, 'mega_blog_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'mega-blog' ),
	'section'             => 'mega_blog_layout',
	'choices'			  => mega_blog_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'mega_blog_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Mega_Blog_Custom_Radio_Image_Control( $wp_customize, 'mega_blog_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'mega-blog' ),
	'section'             => 'mega_blog_layout',
	'choices'			  => mega_blog_sidebar_position(),
) ) );