<?php
/**
 * Content, sidebar & footer layout functions
 *
 * @package Miniva
 */

/**
 * Get Posts layouts
 *
 * @return array
 */
function miniva_get_posts_layouts() {
	return apply_filters( 'miniva_posts_layouts', array(
		'large' => esc_html__( 'Large Image', 'miniva' ),
		'small' => esc_html__( 'Small Image', 'miniva' ),
	) );
}

/**
 * Get sidebar layouts
 *
 * @return array
 */
function miniva_get_sidebar_layouts() {
	return apply_filters( 'miniva_sidebar_layouts', array(
		'right' => esc_html__( 'Right Sidebar', 'miniva' ),
		'left'  => esc_html__( 'Left Sidebar', 'miniva' ),
	) );
}

/**
 * Add custom classes to the array of body classes.
 *
 * @param  array $classes Classes for the body element.
 * @return array
 */
function miniva_content_body_classes( $classes ) {
	if ( is_page_template( 'template-fullwidth.php' ) ) {
		return $classes;
	}
	$sidebar_layout = get_theme_mod( 'sidebar_layout', 'right' );
	if ( 'right' === $sidebar_layout ) {
		$classes[] = 'sidebar-right';
	} elseif ( 'left' === $sidebar_layout ) {
		$classes[] = 'sidebar-left';
	}
	return $classes;
}
add_filter( 'body_class', 'miniva_content_body_classes' );

/**
 * Insert extra class name for content section.
 */
function miniva_content_class() {
	$class = ' container';
	$class = apply_filters( 'miniva_content_class', $class );
	echo esc_attr( $class );
}

/**
 * Insert container in footer.
 */
add_action( 'miniva_footer_start', 'miniva_container_open', 8 );
add_action( 'miniva_footer_end', 'miniva_container_close' );

/**
 * Insert footer widgets
 */
function miniva_footer_widgets() {
	miniva_container_open( 'footer-widgets' );
	miniva_container_open( 'footer-widget-1' );
	if ( is_active_sidebar( 'footer-1' ) ) {
		dynamic_sidebar( 'footer-1' );
	}
	miniva_container_close();
	miniva_container_open( 'footer-widget-2' );
	if ( is_active_sidebar( 'footer-2' ) ) {
		dynamic_sidebar( 'footer-2' );
	}
	miniva_container_close();
	miniva_container_open( 'footer-widget-3' );
	if ( is_active_sidebar( 'footer-3' ) ) {
		dynamic_sidebar( 'footer-3' );
	}
	miniva_container_close();
	miniva_container_close();
}
add_action( 'miniva_footer_start', 'miniva_footer_widgets', 9 );
