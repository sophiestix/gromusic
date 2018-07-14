<?php
/**
 * The template for displaying search results pages
 * @package Webblog
 * Version: 1.0.4
 */

get_header(); ?>

<div class="row">
	<div class="col-lg-8">
		<div id="primary" class="content-area">
			<main id="main" class="site-main post-classic" role="main">
				<?php if ( have_posts() ) : ?>
						<div class="row">
			
							<?php while ( have_posts() ) : the_post(); ?>
								
							 		<div class="col-md-6">
								
										<?php get_template_part( 'template-parts/post/content'); ?>
										
									</div>
			
							<?php endwhile; ?>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<?php the_posts_pagination(); ?>
							</div>
						</div>
						<?php else : ?>
                        <div class="wrong-search-wrapper text-center">
                            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'webblog' ); ?></p>
                            <?php get_search_form(); ?>
                        </div>
            	<?php endif; ?>
			</main>
		</div>
	</div>
   <div class="col-lg-4">
        <?php get_sidebar(); ?>
   </div>
</div><!-- .row -->

<?php get_footer();
