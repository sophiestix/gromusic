<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

if ( ! function_exists( 'mega_blog_is_loader_enable' ) ) :
	/**
	 * Check if loader is enabled.
	 *
	 * @since Mega Blog 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function mega_blog_is_loader_enable( $control ) {
		return $control->manager->get_setting( 'mega_blog_theme_options[loader_enable]' )->value();
	}
endif;

if ( ! function_exists( 'mega_blog_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Mega Blog 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function mega_blog_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'mega_blog_theme_options[pagination_enable]' )->value();
	}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if topbar section is enabled.
 *
 * @since Mega Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function mega_blog_is_topbar_section_enable( $control ) {
	return ( $control->manager->get_setting( 'mega_blog_theme_options[topbar_section_enable]' )->value() );
}

/**
 * Check if message section is enabled.
 *
 * @since Mega Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function mega_blog_is_message_section_enable( $control ) {
	return ( $control->manager->get_setting( 'mega_blog_theme_options[message_section_enable]' )->value() );
}

/**
 * Check if featured section is enabled.
 *
 * @since Mega Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function mega_blog_is_featured_section_enable( $control ) {
	return ( $control->manager->get_setting( 'mega_blog_theme_options[featured_section_enable]' )->value() );
}

/**
 * Check if recent section is enabled.
 *
 * @since Mega Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function mega_blog_is_recent_section_enable( $control ) {
	return ( $control->manager->get_setting( 'mega_blog_theme_options[recent_section_enable]' )->value() );
}

/**
 * Check if popular section is enabled.
 *
 * @since Mega Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function mega_blog_is_popular_section_enable( $control ) {
	return ( $control->manager->get_setting( 'mega_blog_theme_options[popular_section_enable]' )->value() );
}

/**
 * Check if popular section content type is category.
 *
 * @since Mega Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function mega_blog_is_popular_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'mega_blog_theme_options[popular_content_type]' )->value();
	return mega_blog_is_popular_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if popular section content type is recent.
 *
 * @since Mega Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function mega_blog_is_popular_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'mega_blog_theme_options[popular_content_type]' )->value();
	return mega_blog_is_popular_section_enable( $control ) && ( 'recent' == $content_type );
}

/**
 * Check if contact section is enabled.
 *
 * @since Mega Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function mega_blog_is_contact_section_enable( $control ) {
	return ( $control->manager->get_setting( 'mega_blog_theme_options[contact_section_enable]' )->value() );
}