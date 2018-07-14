<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function mega_blog_page_choices() {
    $pages = get_pages();
    $choices = array();
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function mega_blog_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'mega_blog_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function mega_blog_site_layout() {
        $mega_blog_site_layout = array(
            'wide'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed' => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'mega_blog_site_layout', $mega_blog_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'mega_blog_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function mega_blog_selected_sidebar() {
        $mega_blog_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'mega-blog' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'mega-blog' ),
        );

        $output = apply_filters( 'mega_blog_selected_sidebar', $mega_blog_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'mega_blog_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function mega_blog_sidebar_position() {
        $mega_blog_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'left-sidebar'  => get_template_directory_uri() . '/assets/images/left.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
            'no-sidebar-content'   => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'mega_blog_sidebar_position', $mega_blog_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'mega_blog_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function mega_blog_pagination_options() {
        $mega_blog_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'mega-blog' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'mega-blog' ),
        );

        $output = apply_filters( 'mega_blog_pagination_options', $mega_blog_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'mega_blog_get_spinner_list' ) ) :
    /**
     * List of spinner icons options.
     * @return array List of all spinner icon options.
     */
    function mega_blog_get_spinner_list() {
        $arr = array(
            'default'               => esc_html__( 'Default', 'mega-blog' ),
            'spinner-wheel'         => esc_html__( 'Wheel', 'mega-blog' ),
        );
        return apply_filters( 'mega_blog_spinner_list', $arr );
    }
endif;

if ( ! function_exists( 'mega_blog_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function mega_blog_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'mega-blog' ),
            'off'       => esc_html__( 'Disable', 'mega-blog' )
        );
        return apply_filters( 'mega_blog_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'mega_blog_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function mega_blog_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'mega-blog' ),
            'off'       => esc_html__( 'No', 'mega-blog' )
        );
        return apply_filters( 'mega_blog_hide_options', $arr );
    }
endif;