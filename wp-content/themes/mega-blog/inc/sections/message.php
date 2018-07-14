<?php
/**
 * Message section
 *
 * This is the template for the content of message section
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */
if ( ! function_exists( 'mega_blog_add_message_section' ) ) :
    /**
    * Add message section
    *
    *@since Mega Blog 1.0.0
    */
    function mega_blog_add_message_section() {
    	$options = mega_blog_get_theme_options();
        // Check if message is enabled on frontpage
        $message_enable = apply_filters( 'mega_blog_section_status', true, 'message_section_enable' );

        if ( true !== $message_enable ) {
            return false;
        }
        // Get message section details
        $section_details = array();
        $section_details = apply_filters( 'mega_blog_filter_message_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render message section now.
        mega_blog_render_message_section( $section_details );
    }
endif;
add_action( 'mega_blog_primary_content', 'mega_blog_add_message_section', 10 );

if ( ! function_exists( 'mega_blog_get_message_section_details' ) ) :
    /**
    * message section details.
    *
    * @since Mega Blog 1.0.0
    * @param array $input message section details.
    */
    function mega_blog_get_message_section_details( $input ) {
        $options = mega_blog_get_theme_options();

        $content = array();
        $page_id = ! empty( $options['message_content_page'] ) ? $options['message_content_page'] : '';
        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => 1,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['excerpt']   = mega_blog_trim_content( 40 );
                $page_post['url']       = get_the_permalink();
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'thumbnail' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// message section content details.
add_filter( 'mega_blog_filter_message_section_details', 'mega_blog_get_message_section_details' );


if ( ! function_exists( 'mega_blog_render_message_section' ) ) :
  /**
   * Start message section
   *
   * @return string message content
   * @since Mega Blog 1.0.0
   *
   */
   function mega_blog_render_message_section( $content_details = array() ) {
        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : ?>
        	<div id="message-from-author" class="page-section relative">
                <div class="wrapper">
                    <div class="section-content">
                    	<?php if ( ! empty( $content['image'] ) ) : ?>
	                        <div class="author-thumbnail">
	                            <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
	                        </div><!-- .author-thumbnail -->
	                    <?php endif; 

	                    if ( ! empty( $content['title'] ) ) : ?>
	                        <header class="entry-header">
	                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2> 
	                        </header>
	                    <?php endif; 

	                    if ( ! empty( $content['excerpt'] ) ) : ?>
	                        <div class="entry-content">
	                            <?php echo esc_html( $content['excerpt'] ); ?>
	                        </div><!-- .entry-content -->
	                    <?php endif; ?>

                        <div class="separator"></div>
                    </div><!-- .section-content -->
                </div><!-- .wrapper -->
            </div><!-- #message-from-author -->
        <?php endforeach;
    }
endif;