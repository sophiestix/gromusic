<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'mega_blog_pagination', array(
	'title'               => esc_html__('Pagination','mega-blog'),
	'description'         => esc_html__( 'Pagination section options.', 'mega-blog' ),
	'panel'               => 'mega_blog_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'mega_blog_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'mega-blog' ),
	'section'             => 'mega_blog_pagination',
	'on_off_label' 		=> mega_blog_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'mega_blog_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'mega_blog_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'mega-blog' ),
	'section'             => 'mega_blog_pagination',
	'type'                => 'select',
	'choices'			  => mega_blog_pagination_options(),
	'active_callback'	  => 'mega_blog_is_pagination_enable',
) );
