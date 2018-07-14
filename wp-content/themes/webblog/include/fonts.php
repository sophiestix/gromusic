<?php
/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
function webblog_fonts_url() {
	
    $fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Playfair Display:400,700,900&subset=latin,latin-ext|Lato:300,400,700&subset=latin,latin-ext');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return esc_url_raw($fonts_url);
}
function webblog_scripts_styles() {
    wp_enqueue_style( 'google-fonts', webblog_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'webblog_scripts_styles' );
?>