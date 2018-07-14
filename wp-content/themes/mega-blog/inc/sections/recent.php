<?php
/**
 * Recent section
 *
 * This is the template for the content of recent section
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */
if ( ! function_exists( 'mega_blog_add_recent_section' ) ) :
    /**
    * Add recent section
    *
    *@since Mega Blog 1.0.0
    */
    function mega_blog_add_recent_section() {
    	$options = mega_blog_get_theme_options();
        // Check if recent is enabled on frontpage
        $recent_enable = apply_filters( 'mega_blog_section_status', true, 'recent_section_enable' );

        if ( true !== $recent_enable ) {
            return false;
        }
        // Get recent section details
        $section_details = array();
        $section_details = apply_filters( 'mega_blog_filter_recent_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render recent section now.
        mega_blog_render_recent_section( $section_details );
    }
endif;
add_action( 'mega_blog_primary_content', 'mega_blog_add_recent_section', 30 );

if ( ! function_exists( 'mega_blog_get_recent_section_details' ) ) :
    /**
    * recent section details.
    *
    * @since Mega Blog 1.0.0
    * @param array $input recent section details.
    */
    function mega_blog_get_recent_section_details( $input ) {
        $options = mega_blog_get_theme_options();
        $content = array();
        $cat_id = ! empty( $options['recent_content_category'] ) ? $options['recent_content_category'] : '';
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => 4,
            'cat'               => absint( $cat_id ),
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
// recent section content details.
add_filter( 'mega_blog_filter_recent_section_details', 'mega_blog_get_recent_section_details' );


if ( ! function_exists( 'mega_blog_render_recent_section' ) ) :
  /**
   * Start recent section
   *
   * @return string recent content
   * @since Mega Blog 1.0.0
   *
   */
   function mega_blog_render_recent_section( $content_details = array() ) {
        $options = mega_blog_get_theme_options();
        $class = ! is_active_sidebar( 'recent-sidebar' ) ? 'recent-no-sidebar' : '';
        if ( empty( $content_details ) ) {
            return;
        } ?>
            <div id="recent-posts" class="page-section relative <?php echo esc_attr( $class ); ?>">
                <div class="wrapper">
                    <div class="section-content col-2">
                         <div id="primary" class="content-area">
                            <main id="main" class="site-main" role="main">
                                <?php if ( ! empty( $options['recent_title'] ) ) : ?>
                                    <div class="section-header align-left">
                                        <h2 class="section-title"><?php echo esc_html( $options['recent_title'] ); ?></h2>
                                    </div><!-- .section-header -->
                                <?php endif; 

                                foreach ( $content_details as $content ) : ?>
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

                            </main>
                        </div><!-- #primary -->

                        <?php if ( is_active_sidebar( 'recent-sidebar' ) ) : ?>
                            <aside id="secondary" class="widget-area" role="complementary">
                                <?php dynamic_sidebar( 'recent-sidebar' ) ?>
                            </aside><!-- #secondary -->
                        <?php endif; ?>

                    </div><!-- .section-content -->
                </div><!-- .wrapper -->
            </div><!-- #recent-posts -->
    <?php }
endif;