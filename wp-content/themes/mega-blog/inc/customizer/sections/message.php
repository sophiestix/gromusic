<?php
/**
 * Message Section options
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

// Add Message section
$wp_customize->add_section( 'mega_blog_message_section', array(
	'title'             => esc_html__( 'Author&#39;s Message','mega-blog' ),
	'description'       => esc_html__( 'Message Section options.', 'mega-blog' ),
	'panel'             => 'mega_blog_front_page_panel',
) );

// Message content enable control and setting
$wp_customize->add_setting( 'mega_blog_theme_options[message_section_enable]', array(
	'default'			=> 	$options['message_section_enable'],
	'sanitize_callback' => 'mega_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[message_section_enable]', array(
	'label'             => esc_html__( 'Message Section Enable', 'mega-blog' ),
	'section'           => 'mega_blog_message_section',
	'on_off_label' 		=> mega_blog_switch_options(),
) ) );

// message pages drop down chooser control and setting
$wp_customize->add_setting( 'mega_blog_theme_options[message_content_page]', array(
	'sanitize_callback' => 'mega_blog_sanitize_page',
) );

$wp_customize->add_control( new Mega_Blog_Dropdown_Chooser( $wp_customize, 'mega_blog_theme_options[message_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'mega-blog' ),
	'section'           => 'mega_blog_message_section',
	'choices'			=> mega_blog_page_choices(),
	'active_callback'	=> 'mega_blog_is_message_section_enable',
) ) );
