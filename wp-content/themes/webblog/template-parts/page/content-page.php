<?php
/**
 * Template part for displaying page content in page.php
 * @package Webblog
 * Version: 1.0.4
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="page-inner-wrap">
    	<?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
		<?php endif; ?>
        <div class="entry-content">
            <?php
                the_content();
    
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'webblog' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
        <div class="entry-footer">
            <?php webblog_edit_link( get_the_ID() ); ?>
        </div>
	</div>
</article><!-- #post-## -->
