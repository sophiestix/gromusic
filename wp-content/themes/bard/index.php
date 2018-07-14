<?php 

get_header();

if ( is_home() ) {

	// Featured Slider, Carousel
	if ( bard_options( 'featured_slider_label' ) === true || bard_is_preview() ) {
		get_template_part( 'templates/header/featured', 'slider' );
	}

	// Featured Links, Banners
	if ( bard_options( 'featured_links_label' ) === true ) {
		get_template_part( 'templates/header/featured', 'links' ); 
	}

}

?>

<div class="main-content clear-fix<?php echo esc_attr(bard_options( 'general_content_width' )) === 'boxed' ? ' boxed-wrapper': ''; ?>" data-layout="<?php echo esc_attr( bard_options( 'general_home_layout' ) ); ?>" data-sidebar-sticky="<?php echo esc_attr( bard_options( 'general_sidebar_sticky' ) ); ?>">
	
	<?php get_template_part( 'templates/sidebars/sidebar', 'left' ); ?>

	<div class="main-container">

		<ul class="blog-grid">

		<?php

		// Loop Start
		if ( have_posts() ) : while ( have_posts() ) : the_post();

		// Grid Class
		$custom_post_class = 'blog-grid-style';

		// List Class
		if ( strpos( bard_options( 'general_home_layout' ), 'list' ) === 0 ) {
			$custom_post_class	= 'blog-list-style';
		}

		// Classic Class
		if ( is_home() && ! is_paged() && $wp_query->current_post == 0 && true && bard_full_width_post() ) {
			$custom_post_class	= 'blog-classic-style';
		}

		echo '<li class="'. esc_attr( $custom_post_class ) .'">';
		
		// Blog Feed Wrapper
		if ( is_home() && ! is_paged() && $wp_query->current_post == 0 && true && bard_full_width_post() ) {
			get_template_part( 'templates/grid/blog', 'full' );
		} else if ( strpos( bard_options( 'general_home_layout' ), 'list' ) === 0 ) {
			get_template_part( 'templates/grid/blog', 'list' );
		} else {
			get_template_part( 'templates/grid/blog', 'grid' );
		}
		
		echo '</li>';

		endwhile; // Loop End

		else:

	 	?>

		<div class="no-result-found">
			<h1><?php esc_html_e( 'Nothing Found!', 'bard' ); ?></h1>
			<p>
				<?php esc_html_e( 'It seems we can\'t find what you\'re looking for. Perhaps searching can help or go back to ', 'bard' ); ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Homepage', 'bard' ); ?></a>
			</p>
			<div class="bard-widget widget_search">
				<?php get_search_form(); ?>
			</div> 	
		</div>

		<?php endif; ?>

		</ul>

		<?php get_template_part( 'templates/grid/blog', 'pagination' ); ?>

	</div><!-- .main-container -->

	<?php get_template_part( 'templates/sidebars/sidebar', 'right' ); ?>

</div>

<?php get_footer(); ?>