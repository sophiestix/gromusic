<?php
/**
 * Recent Section options
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

// Add Recent section
$wp_customize->add_section( 'mega_blog_recent_section', array(
	'title'             => esc_html__( 'Recent Posts','mega-blog' ),
	'description'       => esc_html__( 'Recent Section options.', 'mega-blog' ),
	'panel'             => 'mega_blog_front_page_panel',
) );

// Recent content enable control and setting
$wp_customize->add_setting( 'mega_blog_theme_options[recent_section_enable]', array(
	'default'			=> 	$options['recent_section_enable'],
	'sanitize_callback' => 'mega_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[recent_section_enable]', array(
	'label'             => esc_html__( 'Recent Section Enable', 'mega-blog' ),
	'section'           => 'mega_blog_recent_section',
	'on_off_label' 		=> mega_blog_switch_options(),
) ) );

// Recent us title setting and control
$wp_customize->add_setting( 'mega_blog_theme_options[recent_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'          	=> $options['recent_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'mega_blog_theme_options[recent_title]', array(
	'label'           	=> esc_html__( 'Title', 'mega-blog' ),
	'section'        	=> 'mega_blog_recent_section',
	'active_callback' 	=> 'mega_blog_is_recent_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_blog_theme_options[recent_title]', array(
		'selector'            => '#recent-posts .wrapper .site-main .section-header h2.section-title',
		'settings'            => 'mega_blog_theme_options[recent_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'mega_blog_recent_title_partial',
    ) );
}

// Add dropdown category setting and control.
$wp_customize->add_setting(  'mega_blog_theme_options[recent_content_category]', array(
	'sanitize_callback' => 'mega_blog_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Mega_Blog_Dropdown_Taxonomies_Control( $wp_customize,'mega_blog_theme_options[recent_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'mega-blog' ),
	'description'      	=> esc_html__( 'Note: Latest four posts will be shown from selected category', 'mega-blog' ),
	'section'           => 'mega_blog_recent_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'mega_blog_is_recent_section_enable'
) ) );
