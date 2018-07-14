<?php
/**
 * The main template file
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
						<?php else :
			
							get_template_part( 'template-parts/post/content', 'none' );
			
					endif; ?>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .col-md-8 -->
    
    <div class="col-lg-4">    
		
		<?php get_sidebar(); ?>
	
    </div>

</div><!-- .row -->

<?php get_footer();
