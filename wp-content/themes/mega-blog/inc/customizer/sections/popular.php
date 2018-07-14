<?php
/**
 * Popular Section options
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

// Add Popular section
$wp_customize->add_section( 'mega_blog_popular_section', array(
	'title'             => esc_html__( 'Popular Posts','mega-blog' ),
	'description'       => esc_html__( 'Popular Section options.', 'mega-blog' ),
	'panel'             => 'mega_blog_front_page_panel',
) );

// Popular content enable control and setting
$wp_customize->add_setting( 'mega_blog_theme_options[popular_section_enable]', array(
	'default'			=> 	$options['popular_section_enable'],
	'sanitize_callback' => 'mega_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[popular_section_enable]', array(
	'label'             => esc_html__( 'Popular Section Enable', 'mega-blog' ),
	'section'           => 'mega_blog_popular_section',
	'on_off_label' 		=> mega_blog_switch_options(),
) ) );

// Popular us title setting and control
$wp_customize->add_setting( 'mega_blog_theme_options[popular_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'          	=> $options['popular_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'mega_blog_theme_options[popular_title]', array(
	'label'           	=> esc_html__( 'Title', 'mega-blog' ),
	'section'        	=> 'mega_blog_popular_section',
	'active_callback' 	=> 'mega_blog_is_popular_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_blog_theme_options[popular_title]', array(
		'selector'            => '#most-read-posts .wrapper h2.section-title',
		'settings'            => 'mega_blog_theme_options[popular_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'mega_blog_popular_title_partial',
    ) );
}

// Popular us content type control and setting
$wp_customize->add_setting( 'mega_blog_theme_options[popular_content_type]', array(
	'default'          	=> $options['popular_content_type'],
	'sanitize_callback' => 'mega_blog_sanitize_select',
) );

$wp_customize->add_control( 'mega_blog_theme_options[popular_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'mega-blog' ),
	'section'           => 'mega_blog_popular_section',
	'type'				=> 'select',
	'active_callback' 	=> 'mega_blog_is_popular_section_enable',
	'choices'			=> array( 
		'category' 	=> esc_html__( 'Category', 'mega-blog' ),
		'recent' 	=> esc_html__( 'Recent Posts', 'mega-blog' ),
	),
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'mega_blog_theme_options[popular_content_category]', array(
	'sanitize_callback' => 'mega_blog_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Mega_Blog_Dropdown_Taxonomies_Control( $wp_customize,'mega_blog_theme_options[popular_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'mega-blog' ),
	'description'      	=> esc_html__( 'Note: Latest four posts will be shown from selected category', 'mega-blog' ),
	'section'           => 'mega_blog_popular_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'mega_blog_is_popular_section_content_category_enable'
) ) );

// recent posts description control and setting
$wp_customize->add_setting( 'mega_blog_theme_options[popular_content_recent]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Mega_Blog_Note_Control( $wp_customize, 'mega_blog_theme_options[popular_content_recent]', array(
	'label'             => esc_html__( 'Display recent four posts.', 'mega-blog' ),
	'section'           => 'mega_blog_popular_section',
	'active_callback'	=> 'mega_blog_is_popular_section_content_recent_enable',
) ) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'mega_blog_theme_options[popular_exclude_category]', array(
	'sanitize_callback' => 'mega_blog_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Mega_Blog_Dropdown_Category_Control( $wp_customize,'mega_blog_theme_options[popular_exclude_category]', array(
	'label'             => esc_html__( 'Exclude Categories', 'mega-blog' ),
	'description'      	=> esc_html__( 'Note: Press SHIFT key and select multiple categories. Posts from selected categories will be excluded.', 'mega-blog' ),
	'section'           => 'mega_blog_popular_section',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'mega_blog_is_popular_section_content_recent_enable'
) ) );