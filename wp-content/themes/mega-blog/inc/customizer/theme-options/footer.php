<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'mega_blog_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'mega-blog' ),
		'priority'   			=> 900,
		'panel'      			=> 'mega_blog_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'mega_blog_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'mega_blog_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'mega_blog_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'mega-blog' ),
		'section'    			=> 'mega_blog_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'mega_blog_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright p',
		'settings'            => 'mega_blog_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'mega_blog_copyright_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'mega_blog_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback' => 'mega_blog_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Mega_Blog_Switch_Control( $wp_customize, 'mega_blog_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'mega-blog' ),
		'section'    			=> 'mega_blog_section_footer',
		'on_off_label' 		=> mega_blog_switch_options(),
    )
) );