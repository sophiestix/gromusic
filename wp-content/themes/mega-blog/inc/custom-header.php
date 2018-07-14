<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses mega_blog_header_style()
 */
function mega_blog_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'mega_blog_custom_header_args', array(
		'default-image'          => '%s/assets/uploads/custom-header-image.jpg',
		'default-text-color'     => '000000',
		'width'                  => 1200,
		'height'                 => 528,
		'flex-height'            => true,
		'wp-head-callback'       => 'mega_blog_header_style',
	) ) );

	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/assets/uploads/custom-header-image.jpg',
			'thumbnail_url' => '%s/assets/uploads/custom-header-image.jpg',
			'description'   => esc_html__( 'Default Header Image', 'mega-blog' ),
		),
	) );
}
add_action( 'after_setup_theme', 'mega_blog_custom_header_setup' );

if ( ! function_exists( 'mega_blog_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see mega_blog_custom_header_setup().
	 */
	function mega_blog_header_style() {
		$options = mega_blog_get_theme_options();
		$css = '';

		$header_title_color = $options['header_title_color'];
		$header_tagline_color = $options['header_tagline_color'];


		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
		 */
		if ( $header_title_color && $header_tagline_color ) {

			// If we get this far, we have custom styles. Let's do this.
			// Has the text been hidden?
			if ( ! display_header_text() ) :
			$css .='
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}';

			// If the user has set a custom color for the text use that.
			else :
			$css .='
			.site-title a,
			#site-header .site-title a {
				color: '.esc_attr( $header_title_color ).';
			}
			.site-description {
				color: '.esc_attr( $header_tagline_color ).';
			}';
			endif;
		}
		
		wp_add_inline_style( 'mega-blog-style', $css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'mega_blog_header_style', 10 );