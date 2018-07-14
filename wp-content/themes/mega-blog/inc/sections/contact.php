<?php
/**
 * Contact section
 *
 * This is the template for the content of contact section
 *
 * @package Theme Palace
 * @subpackage Mega Blog
 * @since Mega Blog 1.0.0
 */
if ( ! function_exists( 'mega_blog_add_contact_section' ) ) :
    /**
    * Add contact section
    *
    *@since Mega Blog 1.0.0
    */
    function mega_blog_add_contact_section() {
    	$options = mega_blog_get_theme_options();
        // Check if contact is enabled on frontpage
        $contact_enable = apply_filters( 'mega_blog_section_status', true, 'contact_section_enable' );

        if ( true !== $contact_enable ) {
            return false;
        }

        // Render contact section now.
        mega_blog_render_contact_section();
    }
endif;
add_action( 'mega_blog_footer_primary_content', 'mega_blog_add_contact_section', 10 );

if ( ! function_exists( 'mega_blog_render_contact_section' ) ) :
  /**
   * Start contact section
   *
   * @return string contact content
   * @since Mega Blog 1.0.0
   *
   */
   function mega_blog_render_contact_section() {
        $options = mega_blog_get_theme_options();
        $contact_phone = ! empty( $options['contact_phone'] ) ? explode( '|', $options['contact_phone'] ) : array();
        $contact_email = ! empty( $options['contact_email'] ) ? explode( '|', $options['contact_email'] ) : array();
        ?>
        <div id="contact-us" class="page-section relative">
            <div class="wrapper">
                <?php if ( ! empty( $options['contact_title'] ) ) : ?>
                    <div class="section-header align-center add-separator">
                        <h2 class="section-title"><?php echo esc_html( $options['contact_title'] ); ?></h2>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div class="section-content col-2">
                    <div class="contact-address">
                        <div class="widget widget_contact_info">
                            <ul>
                                <?php if ( ! empty( $options['contact_address'] ) ) : ?>
                                    <li>
                                        <label class="address-title"><?php esc_html_e( 'Address:', 'mega-blog' ); ?></label>
                                        <span class="address"><?php echo esc_html( $options['contact_address'] ); ?></span>
                                    </li>
                                <?php endif; 

                                if ( ! empty( $contact_phone ) ) : ?>
                                    <li>
                                        <label class="phone-title"><?php esc_html_e( 'Call Us:', 'mega-blog' ); ?></label>
                                        <span class="phone">
                                            <?php foreach ( $contact_phone as $phone ) : ?>
                                                <a href="tel:<?php echo esc_attr( $phone ); ?>"><?php echo esc_html( $phone ); ?></a>
                                            <?php endforeach; ?>
                                        </span>
                                    </li>
                                <?php endif; 

                                if ( ! empty( $contact_email ) ) : ?>
                                    <li>
                                        <label class="email-title"><?php esc_html_e( 'Email:', 'mega-blog' ); ?></label>
                                        <span class="email">
                                            <?php foreach ( $contact_email as $email ) : ?>
                                                <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
                                            <?php endforeach; ?>
                                        </span>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div><!-- .widget -->
                    </div><!-- .contact-address -->

                    <?php if ( ! empty( $options['contact_form'] ) ) : ?>
                        <div class="contact-form">
                                    <?php echo do_shortcode( wp_kses_post( $options['contact_form'] ) ); ?>
                        </div><!-- .contact-form -->
                    <?php endif; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #contact-us -->
    <?php }
endif;