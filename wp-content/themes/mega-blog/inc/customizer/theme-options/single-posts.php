<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'mega_blog_single_post_section', array(
	'title'             => esc_html__( 'Single Post','mega-blog' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'mega-blog' ),
	'panel'             => 'mega_blog_theme_options_panel',
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'mega_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'mega-blog' ),
	'section'           => 'mega_blog_single_post_section',
	'on_off_label' 		=> mega_blog_hide_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'mega_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'mega-blog' ),
	'section'           => 'mega_blog_single_post_section',
	'on_off_label' 		=> mega_blog_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'mega_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'mega-blog' ),
	'section'           => 'mega_blog_single_post_section',
	'on_off_label' 		=> mega_blog_hide_options(),
) ) );

// Archive tag category setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'mega_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'mega-blog' ),
	'section'           => 'mega_blog_single_post_section',
	'on_off_label' 		=> mega_blog_hide_options(),
) ) );
