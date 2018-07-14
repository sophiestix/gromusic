<?php
/**
 * The header for our theme
 *
 * @package Webblog
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<?php 
		// For top header
		$breadcrumb_type = webblog_get_option( 'breadcrumb_type' );
		$slider_status = webblog_get_option('slider_status');
		$header_sticky_status = webblog_get_option( 'webblog_sticky_header_status' );
		
		if( $header_sticky_status == 'enable'){ $sticky_status = ' sticky-activated'; } else{ $sticky_status = ''; }
	?>
    
	<header id="masthead" class="site-header" role="banner">
		<div class="header-wrapper">
			<div class="header-menu <?php echo esc_attr( $sticky_status ); ?>">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
							<?php if ( has_nav_menu( 'primary' ) ) : ?>
								<div class="navigation-section">
									<div class="mobile-menu-wrapper">
										<span class="mobile-menu-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
									</div>
									<nav id="site-navigation" class="main-navigation" role="navigation">
										<?php wp_nav_menu( array(
											'theme_location' => 'primary',
											'menu_id'        => 'primary-menu',
											'menu_class' 	 => 'main-menu',
										) ); 
										?>
									</nav>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
	<?php if( !is_home() && !is_front_page()):  ?>
    <section class="page-header jumbotron text-center">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-12">
					<?php if( is_page() || is_single() ){ ?>
							<h2 class="page-title"><?php echo esc_html( get_the_title() ); ?></h2>

						<?php } elseif( is_search() ){ ?>
    
                        <h2 class="page-title">
							<?php /* translators: %s: search term */ ?>
							<?php printf( esc_html__( 'Search Results for: %s', 'webblog' ), '<span>' . get_search_query() . '</span>' ); ?>
						</h2>
    
                        <?php }elseif( is_404() ){ ?>
    
                        <h2 class="page-title"><?php echo esc_html( 'Page Not Found: 404', 'webblog'); ?></h2>
    
                        <?php }elseif( is_home() ){ ?>
    
                        <h2 class="page-title"><?php single_post_title(); ?></h2>
    
                        <?php } else{
    
                            the_archive_title( '<h2 class="page-title">', '</h2>' );
                        }
					?>
                    <?php if( $breadcrumb_type == 'normal' ): ?>
                        <div class="header-breadcrumb">
                            <?php webblog_breadcrumb_trail(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
	
	<?php if( is_home() && is_front_page()):  ?>
        
    	    <?php if ( has_header_image() ) { ?>
				<div class="header-image">
					<img src="<?php esc_url( header_image() ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="<?php esc_attr_e( 'header-banner', 'webblog' );?>" />
				</div>
			<?php } elseif( $slider_status ){

				get_template_part( 'template-parts/post/slider' ); 
    	 
		 	} ?>
	
	<?php endif; ?>

    <div id="content" class="site-content">
        <div class="container">
