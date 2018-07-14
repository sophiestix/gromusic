<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'mega_blog_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','mega-blog' ),
	'description'       => esc_html__( 'Archive section options.', 'mega-blog' ),
	'panel'             => 'mega_blog_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'mega_blog_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'mega-blog' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'mega-blog' ),
	'section'           => 'mega_blog_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'mega_blog_is_latest_posts'
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'mega_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'mega-blog' ),
	'section'           => 'mega_blog_archive_section',
	'on_off_label' 		=> mega_blog_hide_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[hide_author]', array(
	'default'           => $options['hide_author'],
	'sanitize_callback' => 'mega_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'mega-blog' ),
	'section'           => 'mega_blog_archive_section',
	'on_off_label' 		=> mega_blog_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[hide_category]', array(
	'default'           => $options['hide_category'],
	'sanitize_callback' => 'mega_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'mega-blog' ),
	'section'           => 'mega_blog_archive_section',
	'on_off_label' 		=> mega_blog_hide_options(),
) ) );

// Archive tag category setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[hide_comments]', array(
	'default'           => $options['hide_comments'],
	'sanitize_callback' => 'mega_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[hide_comments]', array(
	'label'             => esc_html__( 'Hide Comments', 'mega-blog' ),
	'section'           => 'mega_blog_archive_section',
	'on_off_label' 		=> mega_blog_hide_options(),
) ) );

// Header Image Text Background Opacity
$wp_customize->add_setting( 'mega_blog_theme_options[header_text_background_opacity]' , array(
	'default'    => $options['header_text_background_opacity'],
	'sanitize_callback' => 'absint',
));

$wp_customize->add_control( new Mega_Blog_Range_Value_Control( $wp_customize, 'mega_blog_theme_options[header_text_background_opacity]', array(
	'type'     => 'range-value',
	'section'  => 'mega_blog_archive_section',
	'label'    => esc_html__( 'Header Image Text Background Opacity', 'mega-blog' ),
	'input_attrs' => array(
		'min'    => 0,
		'max'    => 100,
		'step'   => 10,
  	),
) ) );