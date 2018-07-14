<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */

$options = mega_blog_get_theme_options();


if ( ! function_exists( 'mega_blog_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Mega Blog 1.0.0
	 */
	function mega_blog_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'mega_blog_doctype', 'mega_blog_doctype', 10 );


if ( ! function_exists( 'mega_blog_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Mega Blog 1.0.0
	 *
	 */
	function mega_blog_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
	}
endif;
add_action( 'mega_blog_before_wp_head', 'mega_blog_head', 10 );

if ( ! function_exists( 'mega_blog_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Mega Blog 1.0.0
	 *
	 */
	function mega_blog_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mega-blog' ); ?></a>

		<?php
	}
endif;
add_action( 'mega_blog_page_start_action', 'mega_blog_page_start', 10 );

if ( ! function_exists( 'mega_blog_topbar' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Mega Blog 1.0.0
	 *
	 */
	function mega_blog_topbar() {
		$options = mega_blog_get_theme_options();
		if ( false === $options['topbar_section_enable'] || ( false === $options['topbar_menu_enable'] && false === $options['topbar_social_enable'] ) ) {
			return;
		}
		?>
		<div id="top-menu">
			<?php 
				echo mega_blog_get_svg( array( 'icon' => 'up', 'class' => 'dropdown-icon' ) );
				echo mega_blog_get_svg( array( 'icon' => 'down', 'class' => 'dropdown-icon' ) ); 
			?>
            
            <div class="wrapper">
            	<?php if ( true === $options['topbar_menu_enable'] ) : ?>
	                <div class="secondary-menu">
	                	<?php  
	                		$defaults = array(
	                			'theme_location' => 'topbar',
	                			'container' => false,
	                			'menu_class' => 'menu',
	                			'echo' => true,
	                			'fallback_cb' => 'mega_blog_menu_fallback_cb',
	                			'depth' => 1,
	                		);
	                	
	                		wp_nav_menu( $defaults );
	                	?>
	                </div><!-- .secondary-menu -->
                <?php endif; 

                if ( true === $options['topbar_social_enable'] ) : ?>
	                <div class="social-menu">
	                	<?php  
	                		$defaults = array(
	                			'theme_location' => 'social',
	                			'container' => false,
	                			'menu_class' => 'menu',
	                			'echo' => true,
	                			'fallback_cb' => 'mega_blog_menu_fallback_cb',
	                			'depth' => 1,
	                			'link_before' => '<span class="screen-reader-text">',
								'link_after' => '</span>',
	                		);
	                	
	                		wp_nav_menu( $defaults );
	                	?>
	                </div><!-- .social-menu -->
                <?php endif; ?>
            </div><!-- .wrapper -->
        </div><!-- #top-menu -->

		<?php
	}
endif;

add_action( 'mega_blog_page_start_action', 'mega_blog_topbar', 20 );

if ( ! function_exists( 'mega_blog_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since Mega Blog 1.0.0
	 *
	 */
	function mega_blog_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'mega_blog_page_end_action', 'mega_blog_page_end', 10 );

if ( ! function_exists( 'mega_blog_header_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Mega Blog 1.0.0
	 *
	 */
	function mega_blog_header_start() {
		$options = mega_blog_get_theme_options();
		$sticky = ( true === $options['menu_sticky'] ) ? 'sticky-header' : '';
		?>
		<header id="masthead" class="site-header <?php echo esc_attr( $sticky ); ?>" role="banner">
			<div class="wrapper">
		<?php
	}
endif;
add_action( 'mega_blog_header_action', 'mega_blog_header_start', 10 );

if ( ! function_exists( 'mega_blog_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since Mega Blog 1.0.0
	 *
	 */
	function mega_blog_site_branding() {
		$options  = mega_blog_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];		
		?>
		<div class="site-branding">
			<?php 
			if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) )  ) {
				the_custom_logo();
			} 
			if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
				<div id="site-details">
					<?php
					if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
						if ( mega_blog_is_latest_posts() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;
					} 
					if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
						<?php
						endif; 
					}?>
				</div>
			<?php endif; ?>
		</div><!-- .site-branding -->
		<?php
	}
endif;
add_action( 'mega_blog_header_action', 'mega_blog_site_branding', 20 );

if ( ! function_exists( 'mega_blog_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since Mega Blog 1.0.0
	 *
	 */
	function mega_blog_site_navigation() {
		?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<?php
				echo mega_blog_get_svg( array( 'icon' => 'menu' ) );
				echo mega_blog_get_svg( array( 'icon' => 'close' ) );
				?>					
			</button>

			<?php  
				$search = '<li><a href="#" class="search">';
				$search .= mega_blog_get_svg( array( 'icon' => 'search' ) );
				$search .= '</a><div id="search">';
				$search .= get_search_form( $echo = false );
                $search .= '</div><!-- #search --></li>';

        		$defaults = array(
        			'theme_location' => 'primary',
        			'container' => false,
        			'menu_class' => 'menu nav-menu',
        			'menu_id' => 'primary-menu',
        			'echo' => true,
        			'fallback_cb' => 'mega_blog_menu_fallback_cb',
        			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $search . '</ul>',
        		);
        	
        		wp_nav_menu( $defaults );
        	?>
		</nav><!-- #site-navigation -->
		<?php
	}
endif;
add_action( 'mega_blog_header_action', 'mega_blog_site_navigation', 30 );


if ( ! function_exists( 'mega_blog_header_end' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since Mega Blog 1.0.0
	 *
	 */
	function mega_blog_header_end() {
		?>
			</div><!-- .wrapper -->
		</header><!-- #masthead -->
		<?php
	}
endif;

add_action( 'mega_blog_header_action', 'mega_blog_header_end', 50 );

if ( ! function_exists( 'mega_blog_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Mega Blog 1.0.0
	 *
	 */
	function mega_blog_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'mega_blog_content_start_action', 'mega_blog_content_start', 10 );

if ( ! function_exists( 'mega_blog_custom_header' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Mega Blog 1.0.0
	 *
	 */
	function mega_blog_custom_header() {
		if ( is_single() ) {
			return;
		}

		$options = mega_blog_get_theme_options();
		$opacity = $options['header_text_background_opacity'];
		$dot = ( 100 === $options['header_text_background_opacity'] ) ? '' : '0.';
		?>
		<div id="custom-header" <?php echo ( false === mega_blog_custom_header_image() ) ? 'class="no-header-image"' : ''; ?>>
            <div class="wrapper">
                <div class="custom-header-content-wrapper" style="">
                	<?php if ( mega_blog_custom_header_image() ) : 
                		if ( is_page() && ! mega_blog_is_frontpage() ) : ?>
                			<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_id(), 'full' ) ); ?>" alt="<?php single_post_title(); ?>">
            			<?php else : ?>
	                    	<img src="<?php echo esc_url( get_header_image() ); ?>" alt="<?php esc_attr_e( 'custom-header', 'mega-blog' ); ?>">
	                	<?php endif; 
	                endif; 

	                if ( mega_blog_latest_post_title_check() ) : ?>
	                    <div class="custom-header-content" style="background-color: rgba(255,255,255,<?php echo esc_attr( $dot ) . absint( $opacity ); ?>);">
	                        <?php echo mega_blog_custom_header_banner_title(); ?>
	                        <div class="separator"></div>
	                    </div><!-- .custom-header-content -->
	                <?php endif; ?>
                </div><!-- .custom-header-content-wrapper -->
            </div><!-- .wrapper -->
        </div><!-- #custom-header -->
		<?php
	}
endif;
add_action( 'mega_blog_content_start_action', 'mega_blog_custom_header', 20 );

if ( ! function_exists( 'mega_blog_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Mega Blog 1.0.0
	 *
	 */
	function mega_blog_content_end() {
		?>
		</div><!-- #content -->
		<?php
	}
endif;
add_action( 'mega_blog_content_end_action', 'mega_blog_content_end', 10 );

if ( ! function_exists( 'mega_blog_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Mega Blog 1.0.0
	 *
	 */
	function mega_blog_footer_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
	}
endif;
add_action( 'mega_blog_footer', 'mega_blog_footer_start', 10 );

if ( ! function_exists( 'mega_blog_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Mega Blog 1.0.0
	 *
	 */
	function mega_blog_footer_site_info() {
		$theme_data = wp_get_theme();
		$options = mega_blog_get_theme_options();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text = $options['copyright_text']; 
		$powered_by_text = esc_html__( 'All Rights Reserved | ', 'mega-blog' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'mega-blog' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>';

		?>
		<div class="site-info">
                <div class="wrapper">
                    <div class="copyright">
                        <p><?php echo mega_blog_santize_allow_tag( $copyright_text ); 
                        if ( function_exists( 'the_privacy_policy_link' ) ) {
							the_privacy_policy_link( '<span> | </span>' );
						}?></p>
                    </div><!-- .copyright -->

                    <div class="powered-by">
                        <p><?php echo mega_blog_santize_allow_tag( $powered_by_text ); ?></p>
                    </div><!-- .powered-by -->
                </div><!-- .wrapper -->    
            </div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'mega_blog_footer', 'mega_blog_footer_site_info', 40 );

if ( ! function_exists( 'mega_blog_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Mega Blog 1.0.0
	 *
	 */
	function mega_blog_footer_scroll_to_top() {
		$options  = mega_blog_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo mega_blog_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'mega_blog_footer', 'mega_blog_footer_scroll_to_top', 40 );

if ( ! function_exists( 'mega_blog_footer_end' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Mega Blog 1.0.0
	 *
	 */
	function mega_blog_footer_end() {
		?>
		</footer>
		<div class="popup-overlay"></div>
		<?php
	}
endif;
add_action( 'mega_blog_footer', 'mega_blog_footer_end', 100 );

if ( ! function_exists( 'mega_blog_loader' ) ) :
	/**
	 * Start div id #loader
	 *
	 * @since Mega Blog 1.0.0
	 *
	 */
	function mega_blog_loader() {
		$options = mega_blog_get_theme_options();
		if ( $options['loader_enable'] ) { ?>

			<div id="loader">
            <div class="loader-container">
            	<?php if ( 'default' == $options['loader_icon'] ) : ?>
	                <div id="preloader">
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                </div>
	            <?php else :
	            	echo mega_blog_get_svg( array( 'icon' => esc_attr( $options['loader_icon'] ) ) );
	            endif; ?>
            </div>
        </div><!-- #loader -->
		<?php }
	}
endif;
add_action( 'mega_blog_before_header', 'mega_blog_loader', 10 );
