<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Mega Blog
* @since Mega Blog 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'mega_blog_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'mega_blog_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'mega-blog' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'mega-blog' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
) );