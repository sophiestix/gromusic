<?php
/**
 * Template for displaying search forms in Webblog
 *
 * @package Webblog
 * Version: 1.0.4
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $unique_id ); ?>">
		<span class="screen-reader-text"><?php echo esc_attr_x( 'Search for:', 'label', 'webblog' ); ?></span>
        <input type="search" id="<?php echo esc_attr( $unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'webblog' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit">
    	<span class="screen-reader-text">
			<?php echo esc_attr_x( 'Search', 'submit button', 'webblog' ); ?>
        </span>
        <i class="fa fa-search" aria-hidden="true"></i>
    </button>
</form>
