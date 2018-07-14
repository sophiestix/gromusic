<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Mega Blog
* @since Mega Blog 1.0.0
*/

if ( ! function_exists( 'mega_blog_custom_header_title_partial' ) ) :
    // custom header title
    function mega_blog_custom_header_title_partial() {
        $options = mega_blog_get_theme_options();
        return esc_html( $options['custom_header_title'] );
    }
endif;

if ( ! function_exists( 'mega_blog_custom_header_sub_title_partial' ) ) :
    // custom header sub title
    function mega_blog_custom_header_sub_title_partial() {
        $options = mega_blog_get_theme_options();
        return esc_html( $options['custom_header_sub_title'] );
    }
endif;

if ( ! function_exists( 'mega_blog_featured_title_partial' ) ) :
    // featured title
    function mega_blog_featured_title_partial() {
        $options = mega_blog_get_theme_options();
        return esc_html( $options['featured_title'] );
    }
endif;

if ( ! function_exists( 'mega_blog_recent_title_partial' ) ) :
    // recent title
    function mega_blog_recent_title_partial() {
        $options = mega_blog_get_theme_options();
        return esc_html( $options['recent_title'] );
    }
endif;

if ( ! function_exists( 'mega_blog_popular_title_partial' ) ) :
    // popular title
    function mega_blog_popular_title_partial() {
        $options = mega_blog_get_theme_options();
        return esc_html( $options['popular_title'] );
    }
endif;

if ( ! function_exists( 'mega_blog_contact_title_partial' ) ) :
    // contact title
    function mega_blog_contact_title_partial() {
        $options = mega_blog_get_theme_options();
        return esc_html( $options['contact_title'] );
    }
endif;

if ( ! function_exists( 'mega_blog_contact_address_partial' ) ) :
    // contact address
    function mega_blog_contact_address_partial() {
        $options = mega_blog_get_theme_options();
        return esc_html( $options['contact_address'] );
    }
endif;

if ( ! function_exists( 'mega_blog_copyright_text_partial' ) ) :
    // copyright text
    function mega_blog_copyright_text_partial() {
        $options = mega_blog_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;
