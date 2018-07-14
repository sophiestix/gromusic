<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
	
	<header class="post-header">
	
		<?php if ( bard_options( 'blog_page_show_categories' ) === true ) : ?>
		<div class="post-categories"><?php the_category( ',&nbsp;&nbsp;' ); ?></div>
		<?php endif; ?>

		<?php if ( get_the_title() ) : ?>
		<h1 class="post-title">
			<a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>
		</h1>
		<?php endif; ?>

		<span class="border-divider"></span>

		<div class="post-meta clear-fix">
			<?php if ( bard_options( 'blog_page_show_date' ) === true ) : ?>
			<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
			<?php endif; ?>
		</span>
		
	</header>

	<div class="post-media">
		<a href="<?php echo esc_url( get_permalink() ); ?>"></a>
		<?php the_post_thumbnail('bard-full-thumbnail'); ?>
	</div>

	<?php if ( bard_options( 'blog_page_post_description' ) !== 'none' ) : ?>
	<div class="post-content">
		<?php
			if ( bard_options( 'blog_page_post_description' ) === 'content' ) {
				the_content('');
			} elseif ( bard_options( 'blog_page_post_description' ) === 'excerpt' ) {

				// if is preview (boat post)
				if ( bard_is_preview() && get_the_ID() == 19 ) {
					echo '<p>';
						echo esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur laoreet cursus volutpat. Aliquam sit amet ligula et justo tincidunt laoreet non vitae lorem. Aliquam porttitor tellus enim, eget commodo augue porta ut. Maecenas lobortis ligula vel tellus sagittis ullamcorper. Vestibulum pellentesque cursus risus, in ultrices odio. Morbi dui metus, fringilla quis urna vitae, fringilla tristique nibh. Donec ultrices est ut dapibus dapibus. Nunc fermentum viverra risus, et mollis ante commodo sit amet. Vestibulum eu enim nec lectus volutpat dignissim vel sit amet dui. Maecenas sodales mi non nibh egestas gravida. In in dolor orci. Mauris viverra eu enim eu luctus. Praesent vel orci pulvinar, semper augue et, interdum sapien. Pellentesque...', 'bard' );
					echo '</p>';
				} else {
					bard_excerpt( 100 );
				}

			}
		?>
	</div>
	<?php endif; ?>

	<div class="read-more">
		<a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Continue Reading','bard' ); ?></a>
	</div>

	<footer class="post-footer">

		<span class="post-author">
			<?php

			echo '<a href="'. esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )) .'">';
				echo get_avatar( get_the_author_meta( 'ID' ), 30 );
			echo '</a>';
			the_author_posts_link();

			?>
		</span>

		<?php
		if ( bard_options( 'single_page_show_comments' ) === true ) {
			comments_popup_link( esc_html__( 'No Comments', 'bard' ), esc_html__( '1 Comment', 'bard' ), '% '. esc_html__( 'Comments', 'bard' ), 'post-comments');
		}
		?>

	</footer>

	<?php bard_related_posts( esc_html__( 'You May Also Like', 'bard' ), bard_options('blog_page_related_orderby') ); ?>

</article>