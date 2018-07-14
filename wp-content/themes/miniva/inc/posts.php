<?php
/**
 * Posts related functions
 *
 * @package Miniva
 */

/**
 * Add custom classes to the array of body classes.
 *
 * @param  array $classes Classes for the body element.
 * @return array
 */
function miniva_posts_body_classes( $classes ) {
	$layout    = get_theme_mod( 'posts_layout', 'large' );
	$classes[] = 'posts-' . esc_attr( $layout );

	return $classes;
}
add_filter( 'body_class', 'miniva_posts_body_classes' );

/**
 * Insert post thumbnails in posts
 */
function miniva_post_start() {
	if ( is_single() ) {
		return;
	}
	$layout = get_theme_mod( 'posts_layout', 'large' );
	if ( 'small' === $layout ) {
		miniva_container_open( 'entry-media' );
		miniva_post_thumbnail( 'miniva-small' );
		miniva_container_close();
		miniva_container_open( 'entry-body' );
	}
}
add_action( 'miniva_post_start', 'miniva_post_start' );

/**
 * Insert post thumbnails in posts
 */
function miniva_post_middle() {
	$layout = get_theme_mod( 'posts_layout', 'large' );
	if ( is_single() || 'large' === $layout ) {
		miniva_post_thumbnail();
	}
}
add_action( 'miniva_post_middle', 'miniva_post_middle' );

/**
 * Insert post thumbnails in pages
 */
function miniva_page_middle() {
	global $miniva_image_size;
	if ( ! empty( $miniva_image_size ) ) {
		miniva_post_thumbnail( $miniva_image_size );
	} else {
		miniva_post_thumbnail();
	}
}
add_action( 'miniva_page_middle', 'miniva_page_middle' );

/**
 * Insert container close at the end of posts
 */
function miniva_post_end() {
	if ( is_single() ) {
		return;
	}
	$layout = get_theme_mod( 'posts_layout', 'large' );
	if ( 'small' === $layout ) {
		miniva_container_close();
	}
}
add_action( 'miniva_post_end', 'miniva_post_end' );

/**
 * Add custom classes to post_class.
 *
 * @param array $classes classes for the post.
 */
function miniva_post_class( $classes ) {
	if ( is_main_query() ) {
		if ( is_singular() ) {
			$classes[] = 'post-single';
		} else {
			$classes[] = 'post-archive';
		}
	}
	return $classes;
}
add_filter( 'post_class', 'miniva_post_class' );

/**
 * Add extra information in posts
 */
function miniva_post_info() {
	if ( function_exists( 'the_views' ) ) {
		miniva_container_open( 'postviews' );
		the_views();
		miniva_container_close();
	}
}
add_action( 'miniva_post_end', 'miniva_post_info', 9 );
add_action( 'miniva_page_end', 'miniva_post_info' );
