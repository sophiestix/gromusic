<?php
/**
 * Loader options
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

$wp_customize->add_section( 'mega_blog_loader', array(
	'title'            		=> esc_html__( 'Loader','mega-blog' ),
	'description'      		=> esc_html__( 'Loader section options.', 'mega-blog' ),
	'panel'            		=> 'mega_blog_theme_options_panel',
) );

// Loader enable setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[loader_enable]', array(
	'sanitize_callback' => 'mega_blog_sanitize_switch_control',
	'default'             	=> $options['loader_enable'],
) );

$wp_customize->add_control(  new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[loader_enable]', array(
	'label'               	=> esc_html__( 'Enable loader', 'mega-blog' ),
	'section'             	=> 'mega_blog_loader',
	'on_off_label' 		=> mega_blog_switch_options(),
) ) );

// Loader icons setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[loader_icon]', array(
	'sanitize_callback' 	=> 'mega_blog_sanitize_select',
	'default'				=> $options['loader_icon'],
) );

$wp_customize->add_control( 'mega_blog_theme_options[loader_icon]', array(
	'label'           		=> esc_html__( 'Icon', 'mega-blog' ),
	'section'         		=> 'mega_blog_loader',
	'type'					=> 'select',
	'choices'				=> mega_blog_get_spinner_list(),
	'active_callback' 		=> 'mega_blog_is_loader_enable',
) );
