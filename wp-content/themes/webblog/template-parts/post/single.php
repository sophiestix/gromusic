<?php
/**
 * Template part for displaying posts
 * @package Webblog
 * Version: 1.0.4
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrapper">
		<?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail( 'full' ); ?>
            </div>
		<?php endif; ?>
		
		<div class="content-wrap">
		
			<header class="entry-header">
				
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
			
				<ul class="entry-meta list-inline">
					<li class="byline list-inline-item">
						<span class="author vcard">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a>
						</span>
					</li>
					<li class="posted-on list-inline-item">
						<?php $post_time = webblog_time_link(); echo esc_html( $post_time ); ?>
					</li>
				</ul>
			
			</header><!-- .entry-header -->
        
			<div class="entry-content">
				<?php the_content(); ?>
			</div><!-- .entry-content -->
			<div class="meta-bottom post-tags">
				<?php $tag_list = get_the_tag_list('<ul class="tag-list"><li class="tag-item">','</li><li class="tag-item">','</li></ul>');
				if( $tag_list ) {
					echo wp_kses_post( $tag_list );
				}
				?>
			</div>
		</div>
	</div>
</article><!-- #post-## -->
