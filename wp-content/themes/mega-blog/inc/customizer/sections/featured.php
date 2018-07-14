<?php
/**
 * Featured Section options
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

// Add Featured section
$wp_customize->add_section( 'mega_blog_featured_section', array(
	'title'             => esc_html__( 'Featured Posts','mega-blog' ),
	'description'       => esc_html__( 'Featured Section options.', 'mega-blog' ),
	'panel'             => 'mega_blog_front_page_panel',
) );

// Featured content enable control and setting
$wp_customize->add_setting( 'mega_blog_theme_options[featured_section_enable]', array(
	'default'			=> 	$options['featured_section_enable'],
	'sanitize_callback' => 'mega_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[featured_section_enable]', array(
	'label'             => esc_html__( 'Featured Section Enable', 'mega-blog' ),
	'section'           => 'mega_blog_featured_section',
	'on_off_label' 		=> mega_blog_switch_options(),
) ) );

// Featured us title setting and control
$wp_customize->add_setting( 'mega_blog_theme_options[featured_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'          	=> $options['featured_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'mega_blog_theme_options[featured_title]', array(
	'label'           	=> esc_html__( 'Title', 'mega-blog' ),
	'section'        	=> 'mega_blog_featured_section',
	'active_callback' 	=> 'mega_blog_is_featured_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_blog_theme_options[featured_title]', array(
		'selector'            => '#featured-posts .wrapper h2.section-title',
		'settings'            => 'mega_blog_theme_options[featured_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'mega_blog_featured_title_partial',
    ) );
}

for ( $i = 1; $i <= 3; $i++ ) :
	// featured posts drop down chooser control and setting
	$wp_customize->add_setting( 'mega_blog_theme_options[featured_content_post_' . $i . ']', array(
		'sanitize_callback' => 'mega_blog_sanitize_page',
	) );

	$wp_customize->add_control( new Mega_Blog_Dropdown_Chooser( $wp_customize, 'mega_blog_theme_options[featured_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'mega-blog' ), $i ),
		'section'           => 'mega_blog_featured_section',
		'choices'			=> mega_blog_post_choices(),
		'active_callback'	=> 'mega_blog_is_featured_section_enable',
	) ) );
endfor;
