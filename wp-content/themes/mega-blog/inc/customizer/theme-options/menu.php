<?php
/**
 * Menu options
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'mega_blog_menu', array(
	'title'             => esc_html__('Header Menu','mega-blog'),
	'description'       => esc_html__( 'Header Menu options.', 'mega-blog' ),
	'panel'             => 'nav_menus',
) );

// Menu sticky setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[menu_sticky]', array(
	'sanitize_callback' => 'mega_blog_sanitize_switch_control',
	'default'           => $options['menu_sticky'],
) );

$wp_customize->add_control( new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[menu_sticky]', array(
	'label'             => esc_html__( 'Make Menu Sticky', 'mega-blog' ),
	'section'           => 'mega_blog_menu',
	'on_off_label' 		=> mega_blog_switch_options(),
) ) );
