<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

if ( ! function_exists( 'mega_blog_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function mega_blog_posted_on( $id = '' ) {
		if ( false === mega_blog_archive_meta_option( 'hide_date' ) ) {
			return;
		}

		$id = ! empty( $id ) ? $id : get_the_id();
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U', $id ) !== get_the_modified_time( 'U', $id ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			get_the_date( DATE_W3C, $id ),
			get_the_date( '', $id ),
			get_the_modified_date( DATE_W3C, $id ),
			get_the_modified_date( '', $id )
		);

		$year = get_the_date( 'Y' );
		$month = get_the_date( 'm' );

		// Wrap the time string in a link, and preface it with 'Posted on'.
		printf(
			/* translators: %s: post date */
			__( '<span class="posted-on"><span class="screen-reader-text">Posted on</span> %s', 'mega-blog' ),
			'<a href="' . esc_url( get_month_link( $year, $month ) ) . '" rel="bookmark">' . $time_string . '</a></span>'
		);
	}
endif;

if ( ! function_exists( 'mega_blog_author' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function mega_blog_author() {

		// Get the author name; wrap it in a link.
		$byline = sprintf(
			/* translators: %s: post author */
			__( 'by %s', 'mega-blog' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		// Finally, let's write all of this to the page.
		return '<span class="byline"> ' . $byline . '</span>';
	}
endif;

if ( ! function_exists( 'mega_blog_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function mega_blog_entry_footer() {
		$options = mega_blog_get_theme_options();
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			if ( ! $options['single_post_hide_category'] ) :
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'mega-blog' ) );
				if ( $categories_list && mega_blog_categorized_blog() ) {
					printf( '<span class="cat-links">' . esc_html__( 'Categories: %1$s', 'mega-blog' ) . '</span>', $categories_list ); // WPCS: XSS OK.
				}
			endif;

			if ( ! $options['single_post_hide_tags'] ) :
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', esc_html__( ', ', 'mega-blog' ) );
				if ( $tags_list ) {
					printf( '<span class="tags-links">' . esc_html__( 'Tags: %1$s', 'mega-blog' ) . '</span>', $tags_list ); // WPCS: XSS OK.
				}
			endif;
		}

		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'mega-blog' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * articles meta
 *  @param [id] $id post id
 *  @param [html] $authro author template
 */
function mega_blog_article_footer_meta( $id = '', $author = '' ) { 
	$id = ! empty( $id ) ? $id : get_the_id();

	if ( 'post' !== get_post_type( $id ) ) { 
		return;
	}
	$output = '';
	
	if ( true === mega_blog_archive_meta_option( 'hide_category' ) ) {
	    $categories_list = get_the_category_list( '', '', $id );
		if ( $categories_list && mega_blog_categorized_blog() ) {
			$output .= '<span class="cat-links">' . $categories_list . '</span>'; // WPCS: XSS OK.
		}
	}

	if ( true === mega_blog_archive_meta_option( 'hide_author' ) ) {
		$author = ! empty( $author ) ? $author : mega_blog_author();
	    $output .= '<span class="byline"><span class="author vcard">' . $author . '</span></span><!-- .byline -->'; 
	}

	if ( true === mega_blog_archive_meta_option( 'hide_comments' ) ) {
	    if ( ! post_password_required( $id ) ) :
			if ( get_comments_number( $id ) <= 1 )
				$comment = sprintf( esc_html__( '%d comment', 'mega-blog' ), get_comments_number( $id ) ); 
			else
				$comment = sprintf( esc_html__( '%d comments', 'mega-blog' ), get_comments_number( $id ) ); 
		endif;
	}

    if ( ! empty( $comment ) ) :
        $output .= '<span class="comments-link"><a href="' . esc_url( get_comments_link( $id ) ) . '">' . $comment . '</a></span>';
    endif; 

    return $output;
}

/**
 * Checks to see if meta option is hide enabled in archive/blog
 */
function mega_blog_archive_meta_option( $option = '' ) {
	$options = mega_blog_get_theme_options();
	if ( is_archive() || is_search() || is_home() ) :
		if ( true === $options[$option] )
			return false;
		else
			return true;
	else :
		return true;
	endif;
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function mega_blog_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'mega_blog_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'mega_blog_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so mega_blog_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so mega_blog_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in mega_blog_categorized_blog.
 */
function mega_blog_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'mega_blog_categories' );
}
add_action( 'edit_category', 'mega_blog_category_transient_flusher' );
add_action( 'save_post',     'mega_blog_category_transient_flusher' );
