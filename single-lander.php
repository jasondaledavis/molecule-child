<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "page-content" div.
 *
 * @package WordPress
 * @subpackage Molecule
 * @since Molecule 1.0
 */

?>
<?php get_template_part( 'template-parts/head', 'meta' ); ?>

    <body <?php body_class(); ?> >
    
    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'molecule' ); ?></a>

        <main class="page-content">

         <div class="grid wfull">

        <div class="row">

            <div class="c12">

                <?php
                    // Start the loop.
                    while ( have_posts() ) : the_post();
                    
                    // End of the loop.
                endwhile; the_content();
                ?>

            </div><!-- end .c12 -->

        </div><!-- end .row -->

    </div><!-- end .grid .wfull -->

    </main>
    
    <footer class="footer-global">

        <div class="grid">

            <div class="row">

                <div class="footer-credits">

                    <div class="c12">

                        <div class="footer-logo">

                            <?php molecule_the_custom_logo(); ?>

                                <?php if ( display_header_text() ) {
           
                                    if ( is_front_page() && is_home() ) : ?>
                                     
                                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                    
                                    <?php else : ?>
                                       
                                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                    
                                    <?php endif; 

                                } ?>

                        </div>

                        <div class="copyright-info">

                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>. &copy; <?php echo date( 'Y' ) ?> <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'molecule' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'molecule' ), 'WordPress' ); ?></a>

                        </div>

                    </div><!-- end .c12 -->

                </div>

            </div><!-- end .row -->

        </div><!-- end .grid -->

    </footer><!-- end .footer-global -->

    <?php wp_footer(); ?>
    
    </body>

</html>