<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 * @return array An array of default values
 */

function mega_blog_get_default_theme_options() {
	$mega_blog_default_options = array(
		// Color Options
		'header_title_color'			=> '#000',
		'header_tagline_color'			=> '#000',
		'header_txt_logo_extra'			=> 'show-all',
		
		// loader
		'loader_enable'         		=> false,
		'loader_icon'         			=> 'default',
		
		// layout 
		'site_layout'         			=> 'wide',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',
		'menu_sticky'					=> true,

		// excerpt options
		'long_excerpt_length'           => 25,
		'excerpt_text'					=> esc_html__( '(more...)', 'mega-blog' ),
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'mega-blog' ), '[the-year]', '[site-link]' ),
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// custom header
		'custom_header_blog' 			=> true,
		'custom_header_title' 			=> esc_html__( 'Beautiful Grey Sofa', 'mega-blog' ),
		'custom_header_sub_title' 		=> esc_html__( 'Living Room', 'mega-blog' ),

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'mega-blog' ),
		'hide_date' 					=> false,
		'hide_author'					=> false,
		'hide_category'					=> false,
		'hide_tags'						=> false,
		'hide_comments'					=> false,
		'header_text_background_opacity' => 80,

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		// Top bar
		'topbar_section_enable'			=> false,
		'topbar_social_enable'			=> false,
		'topbar_menu_enable'			=> false,

		// Message
		'message_section_enable'		=> true,

		// Featured
		'featured_section_enable'		=> true,
		'featured_title'				=> esc_html__( 'Featured Posts', 'mega-blog' ),

		// Recent
		'recent_section_enable'			=> true,
		'recent_title'					=> esc_html__( 'Recent Posts', 'mega-blog' ),

		// Popular
		'popular_section_enable'		=> true,
		'popular_title'					=> esc_html__( 'Popular Posts', 'mega-blog' ),
		'popular_content_type'			=> 'recent',

		// Contact
		'contact_section_enable'		=> true,
		'contact_title'					=> esc_html__( 'Get In Touch', 'mega-blog' ),
		'contact_address'				=> esc_html__( '265 Street, Manbhawan, Lalitpur, Nepal', 'mega-blog' ),
		'contact_phone'					=> esc_html__( '+00 0000000000', 'mega-blog' ),
		'contact_email'					=> 'info@themepalace.com',

	);

	$output = apply_filters( 'mega_blog_default_theme_options', $mega_blog_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}