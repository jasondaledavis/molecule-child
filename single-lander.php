<?php
/**
 * The template for displaying all single landing pages and attachments
 *
 * @package WordPress
 * @subpackage Molecule
 * @since Molecule 1.0
 */
?>
<?php get_template_part( 'template-parts/head', 'meta' ); ?>

 <body <?php body_class(); ?> >
    <?php if ( function_exists( 'wp_body_open' ) ) wp_body_open(); ?>
    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'molecule' ); ?></a>
  
  <main class="page-content">

    <div class="grid">

        <div class="row">

                <div class="c12">

                <?php
                // Start the loop.
                while ( have_posts() ) : the_post();

                    // Include the single post content template.
                    // get_template_part( 'template-parts/content', 'single' );
                    the_content();

                    if ( is_singular( 'attachment' ) ) {
                        // Parent post navigation.
                        the_post_navigation( array(
                            'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'molecule' ),
                        ) );
                    } elseif ( is_singular( 'lander' ) ) {
                        // Previous/next post navigation.
                        the_post_navigation( array(
                            'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Offer', 'molecule' ) . '</span> ' .
                                '<span class="screen-reader-text">' . __( 'Previous Offer:', 'molecule' ) . '</span> ' .
                                '<span class="post-title">%title</span>',
                            'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Offer', 'molecule' ) . '</span> ' .
                                '<span class="screen-reader-text">' . __( 'Next Offer:', 'molecule' ) . '</span> ' .
                                '<span class="post-title">%title</span>',
                        ) );
                    }

                    // End of the loop.
                endwhile;
                ?>  

            </div><!-- end .c12 -->
            
        </div><!-- end .row -->

    </div><!-- end .grid -->

    </main><!-- end .page-content -->

 <footer class="footer-global">

        <div class="grid">

            <div class="row">

                <div class="footer-credits">

                    <div class="c12">

                        <div class="copyright-info">
                            
                            <?php bloginfo( 'name' ); ?> | <?php echo date( 'Y' ) ?>

                        </div>

                    </div><!-- end .c12 -->

                </div>

            </div><!-- end .row -->

        </div><!-- end .grid -->

    </footer><!-- end .footer-global -->

    <?php wp_footer(); ?>

    </body>

</html>