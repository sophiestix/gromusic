<?php
/**
 * Featured section
 *
 * This is the template for the content of featured section
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */
if ( ! function_exists( 'mega_blog_add_featured_section' ) ) :
    /**
    * Add featured section
    *
    *@since Mega Blog 1.0.0
    */
    function mega_blog_add_featured_section() {
    	$options = mega_blog_get_theme_options();
        // Check if featured is enabled on frontpage
        $featured_enable = apply_filters( 'mega_blog_section_status', true, 'featured_section_enable' );

        if ( true !== $featured_enable ) {
            return false;
        }
        // Get featured section details
        $section_details = array();
        $section_details = apply_filters( 'mega_blog_filter_featured_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render featured section now.
        mega_blog_render_featured_section( $section_details );
    }
endif;
add_action( 'mega_blog_primary_content', 'mega_blog_add_featured_section', 20 );

if ( ! function_exists( 'mega_blog_get_featured_section_details' ) ) :
    /**
    * featured section details.
    *
    * @since Mega Blog 1.0.0
    * @param array $input featured section details.
    */
    function mega_blog_get_featured_section_details( $input ) {
        $options = mega_blog_get_theme_options();

        $content = array();
        $post_ids = array();

        for ( $i = 1; $i <=  3; $i++ ) {
            if ( ! empty( $options['featured_content_post_' . $i] ) )
                $post_ids[] = $options['featured_content_post_' . $i];
        }
        
        $args = array(
            'post_type'         => 'post',
            'post__in'          => ( array ) $post_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            'ignore_sticky_posts'   => true,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = get_the_excerpt();
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';
                $page_post['author']    = mega_blog_author();

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
// featured section content details.
add_filter( 'mega_blog_filter_featured_section_details', 'mega_blog_get_featured_section_details' );


if ( ! function_exists( 'mega_blog_render_featured_section' ) ) :
  /**
   * Start featured section
   *
   * @return string featured content
   * @since Mega Blog 1.0.0
   *
   */
   function mega_blog_render_featured_section( $content_details = array() ) {
        $options = mega_blog_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>
            <div id="featured-posts" class="page-section relative">
                <div class="wrapper">
                    <?php if ( ! empty( $options['featured_title'] ) ) : ?>
                        <div class="section-header align-center add-separator">
                            <h2 class="section-title"><?php echo esc_html( $options['featured_title'] ); ?></h2>
                        </div><!-- .section-header -->
                    <?php endif; ?>

                    <div class="section-content col-3">
                        <?php foreach ( $content_details as $content ) :
                            ?>
                            <article class="hentry">
                                <div class="post-wrapper">
                                    <div class="entry-container">
                                        <header class="entry-header">
                                            <?php mega_blog_posted_on( $content['id'] ); ?>
                                            
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        </header>

                                        <div class="entry-content">
                                            <?php echo wp_kses_post( $content['excerpt'] ); ?>
                                        </div><!-- .entry-content -->

                                        <div class="entry-meta">
                                            <?php echo wp_kses_post( mega_blog_article_footer_meta( $content['id'], $content['author'] ) ); ?>
                                        </div><!-- .entry-meta -->
                                    </div><!-- .entry-container -->

                                    <?php if ( ! empty( $content['image'] ) ) : ?>
                                        <div class="featured-image">
                                            <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                                        </div><!-- .featured-image -->
                                    <?php endif; ?>
                                </div><!-- .post-wrapper -->
                            </article>
                        <?php endforeach; ?>
                    </div><!-- .section-content -->

                    <div class="section-separator"></div>
                </div><!-- .wrapper -->
            </div><!-- #featured-posts -->
    <?php }
endif;