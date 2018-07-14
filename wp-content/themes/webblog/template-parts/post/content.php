<?php
/**
 * Template part for displaying posts
 * @package Webblog
 * Version: 1.0.4
 */

?>
<?php
	$webblog_post_excerpt_status = webblog_get_option('webblog_post_excerpt_status');
	$webblog_post_excerpt_length = webblog_get_option('webblog_post_excerpt_length');
	
	if( $webblog_post_excerpt_length > 0 ) { $post_length = absint( $webblog_post_excerpt_length ); }
	else{ $post_length = absint( 20 ); }
	
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrapper">
		
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			</div><!-- .post-thumbnail -->
		<?php endif; ?>
		
		<div class="post-content-wrap">
			
			<header class="entry-header">

				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
				
			</header><!-- .entry-header -->
			<?php if( $webblog_post_excerpt_status ): ?>
			<div class="entry-content">
				<p><?php echo esc_html( wp_trim_words( get_the_content(), $post_length, '') ); ?></p>
				<a href="<?php echo esc_url( get_permalink() );?>" title="<?php esc_attr_e( 'Read More', 'webblog' ); ?>" class="read-more-link">
					<p class="read-more"><?php esc_html_e('read more','webblog'); ?></p>
					<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
				</a>
			</div>
			<?php endif; ?>
			<div class="entry-footer">
				<ul class="meta-bottom">
					<li class="byline list-inline-item">
						<span class="author vcard">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a>
						</span>
					</li>
					<li class="posted-on list-inline-item">
						<?php $post_time = webblog_time_link(); echo esc_html( $post_time ); ?>
					</li>
				</ul>
			</div>
			
		</div>
		
	</div>
</article><!-- #post-## -->
