<?php
/**
 * Top Bar options
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'mega_blog_topbar_section', array(
	'title'             => esc_html__( 'Top Bar','mega-blog' ),
	'description'       => esc_html__( 'Top Bar options.', 'mega-blog' ),
	'panel'             => 'mega_blog_front_page_panel',
) );

// Top Bar content enable control and setting
$wp_customize->add_setting( 'mega_blog_theme_options[topbar_section_enable]', array(
	'sanitize_callback' => 'mega_blog_sanitize_switch_control',
	'default'          	=> $options['topbar_section_enable'],
) );

$wp_customize->add_control( new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[topbar_section_enable]', array(
	'label'             => esc_html__( 'Top Bar Section', 'mega-blog' ),
	'section'           => 'mega_blog_topbar_section',
	'on_off_label' 		=> mega_blog_switch_options(),
) ) );

// top bar menu visible
$wp_customize->add_setting( 'mega_blog_theme_options[topbar_menu_enable]',
	array(
		'default'       	=> $options['topbar_menu_enable'],
		'sanitize_callback' => 'mega_blog_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[topbar_menu_enable]',
    array(
		'label'      		=> esc_html__( 'Display Topbar Menu', 'mega-blog' ),
		'description'       => sprintf( '%1$s <a class="topbar-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show topbar menu.', 'mega-blog' ), esc_html__( 'Click Here', 'mega-blog' ), esc_html__( 'to create menu', 'mega-blog' ) ),
		'section'    		=> 'mega_blog_topbar_section',
		'active_callback'	=> 'mega_blog_is_topbar_section_enable',
		'on_off_label' 		=> mega_blog_switch_options(),
    )
) );

// top bar social menu visible
$wp_customize->add_setting( 'mega_blog_theme_options[topbar_social_enable]',
	array(
		'default'       	=> $options['topbar_social_enable'],
		'sanitize_callback' => 'mega_blog_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[topbar_social_enable]',
    array(
		'label'      		=> esc_html__( 'Display Social Menu', 'mega-blog' ),
		'description'       => sprintf( '%1$s <a class="topbar-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show social links.', 'mega-blog' ), esc_html__( 'Click Here', 'mega-blog' ), esc_html__( 'to create menu', 'mega-blog' ) ),
		'section'    		=> 'mega_blog_topbar_section',
		'active_callback'	=> 'mega_blog_is_topbar_section_enable',
		'on_off_label' 		=> mega_blog_switch_options(),
    )
) );