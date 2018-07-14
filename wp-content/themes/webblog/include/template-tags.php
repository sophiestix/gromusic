<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Webblog
 */

if ( ! function_exists( 'webblog_time_link' ) ) :
/**
 * Gets a nicely formatted string for the published date.
 */
function webblog_time_link() {
	
	$archive_year  = get_the_time('Y'); 
	$archive_month = get_the_time('m'); 
	$archive_day   = get_the_time('d'); 
	
	$time_link = get_day_link( $archive_year, $archive_month, $archive_day);
	/* translators: %s: post date */
	printf('<a href="%1$s">%2$s</a>', esc_url( $time_link ), esc_html( get_the_date() ));
	
}
endif;



if ( ! function_exists( 'webblog_edit_link' ) ) :
/**
 * Returns an accessibility-friendly link to edit a post or page.
 *
 * This also gives us a little context about what exactly we're editing
 * (post or page?) so that users understand a bit more where they are in terms
 * of the template hierarchy and their content. Helpful when/if the single-page
 * layout with multiple posts/pages shown gets confusing.
 */
function webblog_edit_link() {
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'webblog' ),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;