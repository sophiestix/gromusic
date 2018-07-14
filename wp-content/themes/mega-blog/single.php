<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

get_header(); 
$options = mega_blog_get_theme_options();

while ( have_posts() ) : the_post(); ?>
	<header class="page-header">
	    <div class="wrapper">
            <?php if ( ! $options['single_post_hide_date'] ) :
            	mega_blog_posted_on(); 
        	endif; ?>

	        <?php the_title( '<h2 class="entry-title">', '</h2>' ); 

	        if ( ! $options['single_post_hide_author'] ) : ?>
		        <div class="author">
		            <?php echo get_avatar( get_the_author_meta( 'ID' ), 60 );  ?>
		            <?php echo mega_blog_author(); ?>
		            <small><?php esc_html_e( 'Author', 'mega-blog' ); ?></small>
		        </div><!-- .author -->  
	        <?php endif; ?>
	    </div><!-- .wrapper -->
	</header><!-- .page-header -->
	<?php if ( has_post_thumbnail() ) : ?>
		<div id="custom-header">
	        <div class="wrapper">
	            <div class="custom-header-content-wrapper">
	               	<?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
	            </div><!-- .custom-header-content-wrapper -->
	        </div><!-- .wrapper -->
	    </div><!-- #custom-header -->
	<?php endif; 
endwhile; ?>

<div class="single-template-wrapper wrapper page-section">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'single' );

				/**
				* Hook mega_blog_action_post_pagination
				*  
				* @hooked mega_blog_post_pagination 
				*/
				do_action( 'mega_blog_action_post_pagination' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php  
	if ( mega_blog_is_sidebar_enable() ) {
		get_sidebar();
	}
	?>
</div><!-- .page-section -->
<?php
get_footer();
