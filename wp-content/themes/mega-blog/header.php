<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Mega Blog
	 * @since Mega Blog 1.0.0
	 */

	/**
	 * mega_blog_doctype hook
	 *
	 * @hooked mega_blog_doctype -  10
	 *
	 */
	do_action( 'mega_blog_doctype' );

?>
<head>
<?php
	/**
	 * mega_blog_before_wp_head hook
	 *
	 * @hooked mega_blog_head -  10
	 *
	 */
	do_action( 'mega_blog_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php
	/**
	 * mega_blog_page_start_action hook
	 *
	 * @hooked mega_blog_page_start -  10
	 * @hooked mega_blog_topbar -  20
	 *
	 */
	do_action( 'mega_blog_page_start_action' ); 

	/**
	 * mega_blog_loader_action hook
	 *
	 * @hooked mega_blog_loader -  10
	 *
	 */
	do_action( 'mega_blog_before_header' );

	/**
	 * mega_blog_header_action hook
	 *
	 * @hooked mega_blog_header_start -  10
	 * @hooked mega_blog_site_branding -  20
	 * @hooked mega_blog_site_navigation -  30
	 * @hooked mega_blog_header_end -  50
	 *
	 */
	do_action( 'mega_blog_header_action' );

	/**
	 * mega_blog_content_start_action hook
	 *
	 * @hooked mega_blog_content_start -  10
	 *
	 */
	do_action( 'mega_blog_content_start_action' );

	/**
	* mega_blog_primary_content hook
	*
	* @hooked mega_blog_add_message_section - 10
	* @hooked mega_blog_add_featured_section - 20
	* @hooked mega_blog_add_recent_section - 30
	* @hooked mega_blog_add_gallery_section - 40
	* @hooked mega_blog_add_popular_section - 50
	*
	*/
    if ( mega_blog_is_frontpage() ) {
		do_action( 'mega_blog_primary_content' );
	}