<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrapper">
        <div class="entry-container">
            <header class="entry-header">
            	<?php if ( 'post' === get_post_type() ) :
                    mega_blog_posted_on();
	            endif; ?>
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>

            <div class="entry-content">
                <?php 
                the_excerpt(); 

                wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mega-blog' ),
					'after'  => '</div>',
				) );
				?>
            </div><!-- .entry-content -->

            <div class="entry-meta">
                <?php echo wp_kses_post( mega_blog_article_footer_meta() ); ?>
            </div><!-- .entry-meta -->
        </div><!-- .entry-container -->

        <?php if ( has_post_thumbnail() ) : ?>
            <div class="featured-image">
                <a href="<?php the_permalink(); ?>">
                	<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ) ?>
                </a>
            </div><!-- .featured-image -->
        <?php endif; ?>
    </div><!-- .post-wrapper -->
</article><!-- #post-## -->
