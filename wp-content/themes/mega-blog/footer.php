<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

/**
 * mega_blog_footer_primary_content hook
 *
 * @hooked mega_blog_add_contact_section -  10
 *
 */
do_action( 'mega_blog_footer_primary_content' );

/**
 * mega_blog_content_end_action hook
 *
 * @hooked mega_blog_content_end -  10
 *
 */
do_action( 'mega_blog_content_end_action' );

/**
 * mega_blog_content_end_action hook
 *
 * @hooked mega_blog_footer_start -  10
 * @hooked Mega_Blog_Footer_Widgets->add_footer_widgets -  20
 * @hooked mega_blog_footer_site_info -  40
 * @hooked mega_blog_footer_end -  100
 *
 */
do_action( 'mega_blog_footer' );

/**
 * mega_blog_page_end_action hook
 *
 * @hooked mega_blog_page_end -  10
 *
 */
do_action( 'mega_blog_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
