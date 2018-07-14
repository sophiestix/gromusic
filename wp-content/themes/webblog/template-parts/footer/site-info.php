<?php
/**
 * Displays footer site info
 *
 * @package Webblog
 * Version: 1.0.4
 */

?>

<div class="site-info">
	<?php $copyright_text = webblog_get_option( 'copyright_text' ); 
    
        if ( ! empty( $copyright_text ) ) : ?>
    
            <p><?php echo wp_kses_data( $copyright_text ); ?></p> 
    
    <?php endif; ?>
        <a href="<?php echo esc_url( __( 'http://www.themeorigin.com/', 'webblog' ) ); ?>">
			<?php /* translators: %s: author name. */ ?>
			<?php printf( esc_html__( 'Designed by %s', 'webblog' ), 'ThemeOrigin' ); ?>
		</a>
</div><!-- .site-info -->
