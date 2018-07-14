<?php // About Bard

// Add About Bard Page
function bard_about_page() {
	add_theme_page( esc_html__( 'About Bard', 'bard' ), esc_html__( 'About Bard', 'bard' ), 'edit_theme_options', 'about-bard', 'bard_about_page_output' );
}
add_action( 'admin_menu', 'bard_about_page' );

// Render About Bard HTML
function bard_about_page_output() {
?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Welcome to Bard!', 'bard' ); ?></h1>
		<p class="welcome-text">
			<?php esc_html_e( 'At first, thanks for the interest! Bard theme is one of the most Popular Free WordPress theme of 2017-2018 years. To understand better what Bard theme can offer, please click on the button below.', 'bard' ); ?>
			<br><br><a href="<?php echo esc_url('http://wp-royal.com/themes/bard-free/demo/?ref=bard-free-backend-about-theme-prev-btn'); ?>" class="button button-primary button-hero" target="_blank"><?php esc_html_e( 'Theme Demo Preview', 'bard' ); ?></a>
		</p><br>

		<?php

		// Get Active Tab
		if ( isset($_GET[ 'tab' ]) ) {
			$active_tab = sanitize_key($_GET[ 'tab' ]);
		} else {
			$active_tab = 'bard_tab_1';
		}


		?>

		<!-- Tabs -->
		<div class="nav-tab-wrapper">
			<a href="?page=about-bard&tab=bard_tab_1" class="nav-tab <?php echo $active_tab == 'bard_tab_1' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Getting Started', 'bard' ); ?>
			</a>
			<a href="?page=about-bard&tab=bard_tab_2" class="nav-tab <?php echo $active_tab == 'bard_tab_2' ? 'nav-tab-active' : ''; ?>">
				<span class="dashicons dashicons-video-alt3"></span><?php esc_html_e( 'Video Tutorials', 'bard' ); ?>
			</a>
			<a href="?page=about-bard&tab=bard_tab_3" class="nav-tab <?php echo $active_tab == 'bard_tab_3' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Recommended Plugins', 'bard' ); ?>
			</a>
			<a href="?page=about-bard&tab=bard_tab_4" class="nav-tab <?php echo $active_tab == 'bard_tab_4' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Support', 'bard' ); ?>
			</a>
			<a href="?page=about-bard&tab=bard_tab_5" class="nav-tab <?php echo $active_tab == 'bard_tab_5' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Free vs Pro', 'bard' ); ?>
			</a>
		</div>

		<!-- Tab Content -->
		<?php if ( $active_tab == 'bard_tab_1' ) : ?>

			<div class="three-columns-wrap">

				<br>

				<div class="column-width-3">
					<h3><?php esc_html_e( 'Theme Documentation', 'bard' ); ?></h3>
					<p>
						<?php esc_html_e( 'Highly recommended to begin with this, read the full theme documentation to understand the basics and even more details about how to use Bard. It is worth to spend 10 minutes and know almost everything about the theme.', 'bard' ); ?>
					</p>
					<a target="_blank" href="<?php echo esc_url('https://wp-royal.com/themes/bard/docs/?ref=bard-free-backend-about-docs/'); ?>" class="button button-primary"><?php esc_html_e( 'Read Documentation', 'bard' ); ?></a>
				</div>

				<div class="column-width-3">
					<h3><?php esc_html_e( 'Demo Content', 'bard' ); ?></h3>
					<p>
						<?php esc_html_e( 'If you are a WordPress beginner it\'s highly recomended to install the Demo Content, this could be done in 2 clicks. Just click the button below to install demo import plugin and wait a bit to be redirected to the demo import page.', 'bard' ); ?>
					</p>

					<?php if ( is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) ) : ?>
						<a href="<?php echo admin_url( '/themes.php?page=pt-one-click-demo-import' ); ?>" class="button button-primary demo-import"><?php esc_html_e( 'Go to Import page', 'bard' ); ?></a>
					<?php elseif ( bard_check_installed_plugin( 'one-click-demo-import', 'one-click-demo-import' ) ) : ?>
						<button class="button button-primary demo-import" id="bard-demo-content-act"><?php esc_html_e( 'Activate Demo Import Plugin', 'bard' ); ?></button>
					<?php else: ?>
						<button class="button button-primary demo-import" id="bard-demo-content-inst"><?php esc_html_e( 'Install Demo Import Plugin', 'bard' ); ?></button>
					<?php endif; ?>
					<a href="<?php echo esc_url('https://www.youtube.com/watch?v=LoiJzc2deeI') ?>" target="_blank" class="button button-primary import-video"><span class="dashicons dashicons-video-alt3"></span><?php esc_html_e( 'Video Tutorial', 'bard' ); ?></a>
				</div>

				<div class="column-width-3">
					<h3><?php esc_html_e( 'Theme Customizer', 'bard' ); ?></h3>
					<p>
					<?php esc_html_e( 'All theme options are located here. After reading the Theme Documentation we recommend you to open the Theme Customizer and play with some options. You will enjoy it.', 'bard' ); ?>
					</p>
					<a target="_blank" href="<?php echo esc_url( wp_customize_url() );?>" class="button button-primary"><?php esc_html_e( 'Customize Your Site', 'bard' ); ?></a>
				</div>

			</div>

			<!-- Predefined Styles -->
			<div class="four-columns-wrap">
			
				<h2><?php esc_html_e( 'Bard Pro - Predefined Styles', 'bard' ); ?></h2>
				<p>
					<?php esc_html_e( 'Just activate any of these styles and you will get the same design(layouts, fonts, colors, etc..) as shown on our demo website.', 'bard' ); ?>
					<?php esc_html_e( 'More details in the ', 'bard' ); ?>
					<a target="_blank" href="http://wp-royal.com/themes/bard/docs/?ref=bard-free-backend-about-predefined-styles#predefined"><?php esc_html_e( 'Theme Documentation.', 'bard' ); ?></a>
				</p>

				<div class="column-width-4">
					<div class="active-style"><?php esc_html_e( 'Active', 'bard' ); ?></div>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/main.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Main', 'bard' ); ?></h2>
						<a href="<?php echo esc_url('https://wp-royal.com/themes/bard-pro/demo/?ref=bard-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'bard' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/food.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Food', 'bard' ); ?></h2>
						<a href="<?php echo esc_url('https://wp-royal.com/themes/bard-pro/food/?ref=bard-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'bard' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/lifestyle.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Lifestyle', 'bard' ); ?></h2>
						<a href="<?php echo esc_url('https://wp-royal.com/themes/bard-pro/lifestyle/?ref=bard-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'bard' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/dark.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Dark', 'bard' ); ?></h2>
						<a href="<?php echo esc_url('http://wp-royal.com/themes/bard-pro/color-black/?ref=bard-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'bard' ); ?></a>
					</div>
				</div>	
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img1.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 1', 'bard' ); ?></h2>
						<a href="<?php echo esc_url('https://wp-royal.com/themes/bard-pro/typography-v1/?ref=bard-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'bard' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img2.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 2', 'bard' ); ?></h2>
						<a href="<?php echo esc_url('https://wp-royal.com/themes/bard-pro/sample-v3/?ref=bard-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'bard' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img3.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 3', 'bard' ); ?></h2>
						<a href="<?php echo esc_url('https://wp-royal.com/themes/bard-pro/columns2-sidebar/?ref=bard-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'bard' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img4.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 4', 'bard' ); ?></h2>
						<a href="<?php echo esc_url('https://wp-royal.com/themes/bard-pro/sample-v5/?ref=bard-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'bard' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img5.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 5', 'bard' ); ?></h2>
						<a href="<?php echo esc_url('https://wp-royal.com/themes/bard-pro/color-colorful/?ref=bard-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'bard' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img6.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 6', 'bard' ); ?></h2>
						<a href="<?php echo esc_url('https://wp-royal.com/themes/bard-pro/columns4/?ref=bard-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'bard' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img7.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 7', 'bard' ); ?></h2>
						<a href="<?php echo esc_url('https://wp-royal.com/themes/bard-pro/columns3-sidebar/?ref=bard-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'bard' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img8.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 8', 'bard' ); ?></h2>
						<a href="<?php echo esc_url('https://wp-royal.com/themes/bard-pro/color-black-white/?ref=bard-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'bard' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img9.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 9', 'bard' ); ?></h2>
						<a href="<?php echo esc_url('https://wp-royal.com/themes/bard-pro/columns3-nsidebar/?ref=bard-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'bard' ); ?></a>
					</div>
				</div>
				<div class="column-width-4">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/img10.jpg'; ?>" alt="">
					<div>
						<h2><?php esc_html_e( 'Style 10', 'bard' ); ?></h2>
						<a href="<?php echo esc_url('https://wp-royal.com/themes/bard-pro/columns2-nsidebar/?ref=bard-free-backend-about-predefined-styles'); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Preview', 'bard' ); ?></a>
					</div>
				</div>

			</div>
		
		<?php elseif ( $active_tab == 'bard_tab_2' ) : ?>

			<div class="four-columns-wrap video-tutorials">

				<div class="column-width-4">
					<h3><?php esc_html_e( 'Demo Import', 'bard' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=LoiJzc2deeI"><?php esc_html_e( 'Watch Video', 'bard' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('themes.php?page=about-bard&tab=bard_tab_1')); ?>"></span><?php esc_html_e( 'Get Started', 'bard' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Setup Menu', 'bard' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=9M38Z2CLKOg"><?php esc_html_e( 'Watch Video', 'bard' ); ?></a>
					<a class="button button-secondary" target="_blank" href="<?php echo esc_url(admin_url('nav-menus.php')); ?>"></span><?php esc_html_e( 'Customize', 'bard' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Setup Logo Image', 'bard' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=BxHuvY5JF0o"><?php esc_html_e( 'Watch Video', 'bard' ); ?></a>
					<a class="button button-secondary" target="_blank" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=title_tagline')); ?>"></span><?php esc_html_e( 'Customize', 'bard' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Setup Social Media', 'bard' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=sdqxPuVJyrk"><?php esc_html_e( 'Watch Video', 'bard' ); ?></a>
					<a class="button button-secondary" target="_blank" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=bard_social_media')); ?>"></span><?php esc_html_e( 'Customize', 'bard' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Setup Copyright', 'bard' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=trgc2BnKuZI"><?php esc_html_e( 'Watch Video', 'bard' ); ?></a>
					<a class="button button-secondary" target="_blank" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=bard_page_footer')); ?>"></span><?php esc_html_e( 'Customize', 'bard' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Setup Colors', 'bard' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=IIq2RwzUJA0"><?php esc_html_e( 'Watch Video', 'bard' ); ?></a>
					<a class="button button-secondary" target="_blank" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=bard_colors')); ?>"></span><?php esc_html_e( 'Customize', 'bard' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Setup Header Image', 'bard' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=9K27xZgVaVo"><?php esc_html_e( 'Watch Video', 'bard' ); ?></a>
					<a class="button button-secondary" target="_blank" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=header_image')); ?>"></span><?php esc_html_e( 'Customize', 'bard' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Setup Featured Slider', 'bard' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=KAQYPbs9yn0"><?php esc_html_e( 'Watch Video', 'bard' ); ?></a>
					<a class="button button-secondary" target="_blank" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=bard_featured_slider')); ?>"></span><?php esc_html_e( 'Customize', 'bard' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Setup Featured Links', 'bard' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=WN-6fG7_IXg"><?php esc_html_e( 'Watch Video', 'bard' ); ?></a>
					<a class="button button-secondary" target="_blank" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=bard_featured_links')); ?>"></span><?php esc_html_e( 'Customize', 'bard' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Setup Instagram Widget', 'bard' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=hjZxBacICSg"><?php esc_html_e( 'Watch Video', 'bard' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Create Blog Post', 'bard' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=gvW0FhT-cSQ"><?php esc_html_e( 'Watch Video', 'bard' ); ?></a>
				</div>
				<div class="column-width-4">
					<h3><?php esc_html_e( 'Translate The Theme', 'bard' ); ?></h3>
					<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=7LtyVjw46r8"><?php esc_html_e( 'Watch Video', 'bard' ); ?></a>
				</div>

			</div>

		<?php elseif ( $active_tab == 'bard_tab_3' ) : ?>
			
			<div class="three-columns-wrap">
				
				<br>
				<p><?php esc_html_e( 'Recommended Plugins are fully supported by Bard theme, they are styled to fit the theme design and performing well. Not mandatory, but may be usefl.', 'bard' ); ?></p>
				<br>

				<?php

				// WooCommerce
				bard_recommended_plugin( 'woocommerce', 'woocommerce', esc_html__( 'WooCommerce', 'bard' ), esc_html__( 'WooCommerce is a powerful, extendable eCommerce plugin that helps you sell anything. Beautifully.', 'bard' ) );

				// MailPoet 2
				bard_recommended_plugin( 'wysija-newsletters', 'index', esc_html__( 'MailPoet 2', 'bard' ), esc_html__( 'Create and send newsletters or automated emails. Capture subscribers with a widget. Import and manage your lists. MailPoet is made with love.', 'bard' ) );

				// Contact Form 7
				bard_recommended_plugin( 'contact-form-7', 'wp-contact-form-7', esc_html__( 'Contact Form 7', 'bard' ), esc_html__( 'Just another contact form plugin. Simple but flexible.', 'bard' ) );

				// Recent Posts Widget
				bard_recommended_plugin( 'recent-posts-widget-with-thumbnails', 'recent-posts-widget-with-thumbnails', esc_html__( 'Recent Posts Widget With Thumbnails', 'bard' ), esc_html__( 'Small and fast plugin to display in the sidebar a list of linked titles and thumbnails of the most recent postings.', 'bard' ) );

				// Instagram Slider
				bard_recommended_plugin( 'instagram-slider-widget', 'instaram_slider', esc_html__( 'Instagram Slider Widget', 'bard' ), esc_html__( 'Instagram Widget is a responsive slider widget that shows up to 18 images latest images from a public instagram user hashtag.', 'bard' ) );

				// Instagram Widget
				bard_recommended_plugin( 'wp-instagram-widget', 'wp-instagram-widget', esc_html__( 'WP Instagram Widget', 'bard' ), esc_html__( 'A WordPress widget for showing your latest Instagram photos.', 'bard' ) );

				// Ajax Thumbnail Rebuild
				bard_recommended_plugin( 'ajax-thumbnail-rebuild', 'ajax-thumbnail-rebuild', esc_html__( 'Ajax Thumbnail Rebuild', 'bard' ), esc_html__( 'AJAX Thumbnail Rebuild allows you to rebuild all thumbnails at once without script timeouts on your server.', 'bard' ) );

				// Facebook Widget
				bard_recommended_plugin( 'facebook-pagelike-widget', 'facebook_widget', esc_html__( 'Facebook Widget', 'bard' ), esc_html__( 'This widget adds a Simple Facebook Page Like Widget into your WordPress website sidebar within few minutes.', 'bard' ) );

				// Simple Social Icons
				bard_recommended_plugin( 'simple-social-icons', 'simple-social-icons', esc_html__( 'Simple Social Icons', 'bard' ), esc_html__( 'This plugin allows you to insert social icons in any widget area.', 'bard' ) );

				?>


			</div>

		<?php elseif ( $active_tab == 'bard_tab_4' ) : ?>

			<div class="three-columns-wrap">

				<br>

				<div class="column-width-3">
					<h3>
						<span class="dashicons dashicons-sos"></span>
						<?php esc_html_e( 'Forums', 'bard' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Before asking a questions it\'s highly recommended to search on forums, but if you can\'t find the solution feel free to create a new topic.', 'bard' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('https://wp-royal.com/support-bard-free/?ref=bard-free-backend-about-support-forum/'); ?>"><?php esc_html_e( 'Go to Support Forums', 'bard' ); ?></a>
					</p>
				</div>

				<div class="column-width-3">
					<h3>
						<span class="dashicons dashicons-book"></span>
						<?php esc_html_e( 'Documentation', 'bard' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Need more details? Please check out Bard Theme Documentation for detailed information.', 'bard' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('https://wp-royal.com/themes/bard/docs/?ref=bard-free-backend-about-docs/'); ?>"><?php esc_html_e( 'Read Full Documentation', 'bard' ); ?></a>
					</p>
				</div>

				<div class="column-width-3">
					<h3>
						<span class="dashicons dashicons-admin-tools"></span>
						<?php esc_html_e( 'Changelog', 'bard' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Stay always up to date, check for fixes, updates and some new feauters you should not miss.', 'bard' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('https://wp-royal.com/bard-free-changelog/?ref=bard-free-backend-about-changelog/'); ?>"><?php esc_html_e( 'See Changelog', 'bard' ); ?></a>
					</p>
				</div>

			</div>

		<?php elseif ( $active_tab == 'bard_tab_5' ) : ?>

			<br><br>

			<table class="free-vs-pro form-table">
				<thead>
					<tr>
						<th>
							<a href="<?php echo esc_url('https://wp-royal.com/themes/item-bard-pro/?ref=bard-free-backend-about-section-getpro-btn'); ?>" target="_blank" class="button button-primary button-hero">
								<?php esc_html_e( 'Get Bard Pro', 'bard' ); ?>
							</a>
						</th>
						<th><?php esc_html_e( 'Bard', 'bard' ); ?></th>
						<th><?php esc_html_e( 'Bard Pro', 'bard' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<h3><?php esc_html_e( '100% Responsive and Retina Ready', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Theme adapts to any kind of device screen, from mobile phones to high resolution Retina displays.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Translation Ready', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Each hard-coded string is ready for translation, means you can translate everything. Language "bard.pot" file included.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'RTL Support', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'RTL stylesheet for languages that are read from right to left like Arabic, Hebrew, etc... Your content will adapt to RTL direction.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'WooCommerce Integration', 'bard' ); ?></h3>
							<p>
								<?php esc_html_e( 'The best eCommerce solution for WordPress websites. Add your own Shop and sell anything from digital Goods to Coconuts.', 'bard' ); ?>
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'bard' ); ?></strong> <?php esc_html_e( 'Left &amp; Right WooCommerce widgetised areas. Perfectly styled to fit the theme design.', 'bard' ); ?>
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Contact Form 7 Support', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'The most popular contact form plugin. You can build almost any kind of contact form. Very simple but super flexible.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Image &amp; Text Logos', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Upload your logo image(set the size) or simply type your text logo.', 'bard' ); ?><br><strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'bard' ); ?></strong> <?php esc_html_e( 'Adjust Logo position to fit your custom header design.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Featured Posts Slider', 'bard' ); ?></h3>
							<p>
								<?php esc_html_e( 'Showcase up to 5 most recent Blog Posts in header area.', 'bard' ); ?>
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'bard' ); ?></strong> <?php esc_html_e( 'Unlimited number of Slides. Feature specific(custom) posts and order them by date, comments or even random. Change Slider columns from 1 up to 4, set Autoplay and enable/disable any element.', 'bard' ); ?>  
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Featured Links (Promo Boxes)', 'bard' ); ?></h3>
							<p>
								<?php esc_html_e( 'Display up to 3 eye-catching linked images under header area, which could be a Custom Page Links or Banners(ads).', 'bard' ); ?> 
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'bard' ); ?></strong> <?php esc_html_e( 'You can have 5 Featured Links.', 'bard' ); ?>
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Background Image/Color', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Set the custom body Background image or Color.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Header Background Image/Color', 'bard' ); ?></h3>
							<p>
								<?php esc_html_e( 'Set the custom header Background image or Color.', 'bard' ); ?>
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'bard' ); ?></strong> <?php esc_html_e( 'Adjust Header size &amp; enable ', 'bard' ); ?><strong><?php esc_html_e( 'Parallax Scrolling', 'bard' ); ?></strong> <?php esc_html_e( 'to fit your custom website design.', 'bard' ); ?>
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Classic Layout', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Standard one column Blog Feed layout.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Multi-level Sub Menu Support', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Unlimited level of sub menus. Add as much as you need.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Left &amp; Right Sidebars', 'bard' ); ?></h3>
							<p>
								<?php esc_html_e( 'Left and Right Widgetised areas. Could be globally Enabled/Disabled.', 'bard' ); ?>
								<br>
								<strong class="only-pro"><?php esc_html_e( 'Pro Version:', 'bard' ); ?></strong> <?php esc_html_e( 'Full controll - Enable/Disable on specific Posts &amp; Pages.', 'bard' ); ?>
							</p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Alternative Sidebar', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Stylish and modern Alternative Widgetised area, which is hidden by default and pops up on click.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					
					<!-- Only Pro -->
					<tr>
						<td>
							<h3><?php esc_html_e( 'One Click Demo Import', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Just a Single Click and you will get the same content as shown on our Demo website. Menus, Posts, Pages, Widgets, etc... will be imported.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Unlimited Colors', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Tons of color options. You can customize your Header, Content and Footer separately as much as possible.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( '800+ Google Fonts', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Rich Typography options. Choose from more than 800 Google Fonts, adjust Size, Line Height, Font Weight, etc...', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Advanced WooCommerce Support', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Set 2, 3 or 4 Columns on WooCommerce Product Grid. Enable/Disable Left & Right WooCommerce widgetized areas.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Grid Layout', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Choose from 1 up to 4 columns grid layout for your Blog Feed.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Post Formats Support', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Create Audio, Video, Gallery, Link &amp; Quote Blog Posts with unique, modern and minimal styling. Full control over your Blog Posts.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Post Sharing Icons', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Ability to share your Blog Posts on the most popular social media: Facebook, Twitter, Pinterest, Google Plus, Linkedin, Reddit, Tumblr.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Advanced Post Options', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Custom Post Header image upload, Full-width Post option, ability to display current post in the Featured Slider.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Advanced Page Options', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Custom Page Header image, Full-width page option, enable/disable Featured Slider & Featured Links on current page, Show/hide page Title & Featured Image.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Different Blog Feed Pagination', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Choose from 4 Diffenet pagination styles: Default, Numeric, Load More Button and Infinite Page Scrolling.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Sticky Navigation', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Fix the main navigation to the page, it will be always visible at the top.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Instagram Widget Area', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Showcase your Instagram photos on your website footer area.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Integration with MailChimp', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'This plugin helps you add more subscribers to your MailChimp lists using various methods.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Integration with JetPack', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Jetpack is the ultimate toolkit for WordPress. It gives you everything you need to design, secure, and grow your site in one bundle.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>
					<tr>
						<td>
							<h3><?php esc_html_e( 'Bard Pro Widgets', 'bard' ); ?></h3>
							<p><?php esc_html_e( 'Bard Author, Ads &amp; Social Icons widgets included.', 'bard' ); ?></p>
						</td>
						<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
						<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
					</tr>


					<tr>
						<td></td>
						<td colspan="2">
							<a href="<?php echo esc_url('https://wp-royal.com/themes/item-bard-pro/?ref=bard-free-backend-about-section-getpro-btn'); ?>" target="_blank" class="button button-primary button-hero">
								<?php esc_html_e( 'Get Bard Pro', 'bard' ); ?>
							</a>
							<br><br>
						</td>
					</tr>
				</tbody>
			</table>

	    <?php endif; ?>

	</div><!-- /.wrap -->
<?php
} // end bard_about_page_output

// Check if plugin is installed
function bard_check_installed_plugin( $slug, $filename ) {
	return file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php' ) ? true : false;
}

// Generate Recommended Plugin HTML
function bard_recommended_plugin( $slug, $filename, $name, $description) {

	if ( $slug === 'facebook-pagelike-widget' ) {
		$size = '128x128';
	} else {
		$size = '256x256';
	}

?>

	<div class="plugin-card">
		<div class="name column-name">
			<h3>
				<?php echo esc_html( $name ); ?>

				<?php if ( $slug === 'ajax-thumbnail-rebuild' ) : ?>
					<img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/ajax-thumbnail-rebuild.jpeg'; ?>" class="plugin-icon" alt="">
				<?php else: ?>
					<img src="<?php echo esc_url('https://ps.w.org/'. $slug .'/assets/icon-'. $size .'.png') ?>" class="plugin-icon" alt="">
				<?php endif; ?>
			</h3>
		</div>
		<div class="action-links">
			<?php if ( bard_check_installed_plugin( $slug, $filename ) ) : ?>
			<button type="button" class="button button-disabled" disabled="disabled"><?php esc_html_e( 'Installed', 'bard' ); ?></button>
			<?php else : ?>
			<a class="install-now button-primary" href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='. $slug ), 'install-plugin_'. $slug ) ); ?>" >
				<?php esc_html_e( 'Install Now', 'bard' ); ?>
			</a>							
			<?php endif; ?>
		</div>
		<div class="desc column-description">
			<p><?php echo esc_html( $description ); ?></p>
		</div>
	</div>

<?php
}

// enqueue ui CSS/JS
function bard_enqueue_about_page_scripts($hook) {

	if ( 'appearance_page_about-bard' != $hook ) {
		return;
	}

	// enqueue CSS
	wp_enqueue_style( 'bard-about-css', get_theme_file_uri( '/inc/about/css/about-page.css' ), array(), '1.4' );

	// Demo Import
	wp_enqueue_script( 'plugin-install' );
	wp_enqueue_script( 'updates' );
	wp_enqueue_script( 'bard-about-page-css', get_theme_file_uri( '/inc/about/js/about-bard-page.js' ), array(), '1.4' );

}
add_action( 'admin_enqueue_scripts', 'bard_enqueue_about_page_scripts' );


// Install/Activate Demo Import Plugin 
function bard_plugin_auto_activation() {

	// Get the list of currently active plugins (Most likely an empty array)
	$active_plugins = (array) get_option( 'active_plugins', array() );

	array_push( $active_plugins, 'one-click-demo-import/one-click-demo-import.php' );

	// Set the new plugin list in WordPress
	update_option( 'active_plugins', $active_plugins );

}
add_action( 'wp_ajax_bard_plugin_auto_activation', 'bard_plugin_auto_activation' );

// Import Plugin Data
function bard_import_demo_files() {
	return array(
		array(
			'import_file_name'             => esc_html__( 'Import Demo Data', 'bard' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/about/import/bard-demo.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/about/import/bard-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/about/import/bard-customizer.dat'
		)
	);
}
add_filter( 'pt-ocdi/import_files', 'bard_import_demo_files' );

function bard_import_demo_files_filter( $default_text ) {

	// Activate CF7 Plugin After Import
	if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
		$cf7_plugin_link = '';
	} elseif ( bard_check_installed_plugin( 'contact-form-7', 'wp-contact-form-7' ) ) {
		$cf7_plugin_link = '<li><a href="'. esc_url( wp_nonce_url( self_admin_url( 'plugins.php?action=activate&plugin=contact-form-7/wp-contact-form-7.php' ), 'activate-plugin_contact-form-7/wp-contact-form-7.php' ) ) .'" target="_blank">'. esc_html__( 'Activate - Contact Form 7', 'bard' ) .'</a></li>';
	} else {
		$cf7_plugin_link = '<li><a href="'. esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=contact-form-7' ), 'install-plugin_contact-form-7' ) ) .'" target="_blank">'. esc_html__( 'Install/Activate - Contact Form 7', 'bard' ) .'</a></li>';
	}

	// Activate RPWWT Plugin After Import
	if ( is_plugin_active( 'recent-posts-widget-with-thumbnails/recent-posts-widget-with-thumbnails.php' ) ) {
		$rpwwt_plugin_link = '';
	} elseif ( bard_check_installed_plugin( 'recent-posts-widget-with-thumbnails', 'recent-posts-widget-with-thumbnails' ) ) {
		$rpwwt_plugin_link = '<li><a href="'. esc_url( wp_nonce_url( self_admin_url( 'plugins.php?action=activate&plugin=recent-posts-widget-with-thumbnails/recent-posts-widget-with-thumbnails.php' ), 'activate-plugin_recent-posts-widget-with-thumbnails/recent-posts-widget-with-thumbnails.php' ) ) .'" target="_blank">'. esc_html__( 'Activate - Recent Posts Widget with Thumbnails', 'bard' ) .'</a></li>';
	} else {
		$rpwwt_plugin_link = '<li><a href="'. esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=recent-posts-widget-with-thumbnails' ), 'install-plugin_recent-posts-widget-with-thumbnails' ) ) .'" target="_blank">'. esc_html__( 'Install/Activate - Recent Posts Widget with Thumbnails', 'bard' ) .'</a></li>';
	}

	// Activate ISW Plugin After Import
	if ( is_plugin_active( 'instagram-slider-widget/instaram_slider.php' ) ) {
		$isw_plugin_link = '';
	} elseif ( bard_check_installed_plugin( 'instagram-slider-widget', 'instaram_slider' ) ) {
		$isw_plugin_link = '<li><a href="'. esc_url( wp_nonce_url( self_admin_url( 'plugins.php?action=activate&plugin=instagram-slider-widget/instaram_slider.php' ), 'activate-plugin_instagram-slider-widget/instaram_slider.php' ) ) .'" target="_blank">'. esc_html__( 'Activate - Instagram Slider Widget', 'bard' ) .'</a></li>';
	} else {
		$isw_plugin_link = '<li><a href="'. esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=instagram-slider-widget' ), 'install-plugin_instagram-slider-widget' ) ) .'" target="_blank">'. esc_html__( 'Install/Activate - Instagram Slider Widget', 'bard' ) .'</a></li>';
	}

	if ( $rpwwt_plugin_link !== '' || $isw_plugin_link !== '' ) {
		$activate_plugins_notice  =  esc_html__( 'Recommended (optional): Before you Import Demo Data to get the same demo as shown on our ', 'bard' );
		$activate_plugins_notice .= '<a href="'. esc_url('http://wp-royal.com/themes/bard-free/demo/?ref=bard-free-backend-about-section-one-click-demo-import') .'" target="_blank">'. esc_html__( 'Theme Preview Page', 'bard' ) .'</a>';
		$activate_plugins_notice .=  esc_html__( ' you need to: ', 'bard' );
	} else {
		$activate_plugins_notice = '';
	}

	$default_text = substr($default_text, 159);

	$default_text .= '<div class="ocdi__intro-text">';

		if ( $isw_plugin_link !== '' || $cf7_plugin_link !== '' || $rpwwt_plugin_link !== '' ) {

			$default_text .= '<h4>'. $activate_plugins_notice .'</h4>';

			$default_text .= '<ul>';
				$default_text .= $isw_plugin_link;
				$default_text .= $cf7_plugin_link;
				$default_text .= $rpwwt_plugin_link;
			$default_text .= '</ul>';

		}

	$default_text .= '</div><hr>';

	return $default_text; 
}
add_filter( 'pt-ocdi/plugin_intro_text', 'bard_import_demo_files_filter' );

// Install Menus after Import
function bard_after_import_setup() {
	$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
	$top_menu = get_term_by( 'name', 'Top Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'main' => $main_menu->term_id,
			'top'  => $top_menu->term_id,
		)
	);
}
add_action( 'pt-ocdi/after_import', 'bard_after_import_setup' );

// Disable PT Branding after Import Notice
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );