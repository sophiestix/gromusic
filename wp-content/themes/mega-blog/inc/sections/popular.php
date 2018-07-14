<?php
/**
 * Popular section
 *
 * This is the template for the content of popular section
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */
if ( ! function_exists( 'mega_blog_add_popular_section' ) ) :
    /**
    * Add popular section
    *
    *@since Mega Blog 1.0.0
    */
    function mega_blog_add_popular_section() {
    	$options = mega_blog_get_theme_options();
        // Check if popular is enabled on frontpage
        $popular_enable = apply_filters( 'mega_blog_section_status', true, 'popular_section_enable' );

        if ( true !== $popular_enable ) {
            return false;
        }
        // Get popular section details
        $section_details = array();
        $section_details = apply_filters( 'mega_blog_filter_popular_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render popular section now.
        mega_blog_render_popular_section( $section_details );
    }
endif;
add_action( 'mega_blog_primary_content', 'mega_blog_add_popular_section', 50 );

if ( ! function_exists( 'mega_blog_get_popular_section_details' ) ) :
    /**
    * popular section details.
    *
    * @since Mega Blog 1.0.0
    * @param array $input popular section details.
    */
    function mega_blog_get_popular_section_details( $input ) {
        $options = mega_blog_get_theme_options();

        // Content type.
        $popular_content_type  = $options['popular_content_type'];
        $content = array();
        switch ( $popular_content_type ) {
        	
            case 'category':
                $cat_id = ! empty( $options['popular_content_category'] ) ? $options['popular_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => 4,
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;


            case 'recent':
                $cat_ids = ! empty( $options['popular_exclude_category'] ) ? ( array ) $options['popular_exclude_category'] : array();
                
                $args = array(
                    'post_type'             => 'post',
                    'posts_per_page'        => 4,
                    'ignore_sticky_posts'   => true,
                    'category__not_in'      => ( array ) $cat_ids,
                    );                    
            break;

            default:
            break;
        }


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
// popular section content details.
add_filter( 'mega_blog_filter_popular_section_details', 'mega_blog_get_popular_section_details' );


if ( ! function_exists( 'mega_blog_render_popular_section' ) ) :
  /**
   * Start popular section
   *
   * @return string popular content
   * @since Mega Blog 1.0.0
   *
   */
   function mega_blog_render_popular_section( $content_details = array() ) {
        $options = mega_blog_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="most-read-posts" class="page-section relative">
            <div class="wrapper">
                <?php if ( ! empty( $options['popular_title'] ) ) : ?>
                    <div class="section-header align-center add-separator">
                        <h2 class="section-title"><?php echo esc_html( $options['popular_title'] ); ?></h2>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div class="section-content col-4">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="hentry">
                            <div class="post-wrapper">
                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <div class="featured-image">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                                    </div><!-- .featured-image -->
                                <?php endif; ?>

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
                            </div><!-- .post-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #most-read-posts -->
    <?php }
endif;