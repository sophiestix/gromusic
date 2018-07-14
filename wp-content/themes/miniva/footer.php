<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Miniva
 */

?>

		<?php do_action( 'miniva_content_end' ); ?>

	</div><!-- #content -->

	<?php do_action( 'miniva_content_after' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php do_action( 'miniva_footer_start' ); ?>

		<div class="site-info">
			<?php echo esc_html__( 'Powered by', 'miniva' ); ?>
			<a href="<?php echo esc_url( __( 'https://tajam.id/miniva/', 'miniva' ) ); ?>">
				<?php esc_html_e( 'Miniva WordPress Theme', 'miniva' ); ?>
			</a>
		</div><!-- .site-info -->

		<?php do_action( 'miniva_footer_end' ); ?>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
