<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'mega_blog_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','mega-blog' ),
	'description'       => esc_html__( 'Excerpt section options.', 'mega-blog' ),
	'panel'             => 'mega_blog_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'mega_blog_sanitize_number_range',
	'validate_callback' => 'mega_blog_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'mega_blog_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'mega-blog' ),
	'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'mega-blog' ),
	'section'     		=> 'mega_blog_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );

// Excerpt text setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[excerpt_text]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['excerpt_text'],
) );

$wp_customize->add_control( 'mega_blog_theme_options[excerpt_text]', array(
	'label'       		=> esc_html__( 'Excerpt Text', 'mega-blog' ),
	'section'     		=> 'mega_blog_excerpt_section',
) );
