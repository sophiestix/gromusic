<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of Mega Blog
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

/*
 * Add social link widget
 */
require get_template_directory() . '/inc/widgets/social-link-widget.php';
/*
 * Add Latest Posts widget
 */
require get_template_directory() . '/inc/widgets/latest-posts-widget.php';

/**
 * Register widgets
 */
function mega_blog_register_widgets() {

	register_widget( 'Mega_Blog_Latest_Post' );

	register_widget( 'Mega_Blog_Social_Link' );

}
add_action( 'widgets_init', 'mega_blog_register_widgets' );