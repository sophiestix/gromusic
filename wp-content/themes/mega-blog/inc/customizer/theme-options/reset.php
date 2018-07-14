<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'mega_blog_reset_section', array(
	'title'             => esc_html__('Reset all settings','mega-blog'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'mega-blog' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'mega_blog_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'mega_blog_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'mega_blog_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'mega-blog' ),
	'section'           => 'mega_blog_reset_section',
	'type'              => 'checkbox',
) );
