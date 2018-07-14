<?php get_header(); ?>

	<div class="page-404">
	
		<h2><?php esc_html_e( 'Page not found!', 'bard' ); ?></h2>

		<p>
			<?php esc_html_e( 'It seems we can\'t find what you\'re looking for. Perhaps searching can help or go back to ', 'bard' ); ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Homepage', 'bard' ); ?></a>
		</p>

	</div>

<?php get_footer(); ?>