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
<?php get_template_part( 'partials/head', 'meta' ); ?>

 <body <?php body_class(); ?> >

  <main class="page-content">

    <div class="grid wfull">

        <div class="row">

            <div class="c12">

                <?php
                    // Start the loop.
                    while ( have_posts() ) : the_post();

                    // Include the single post content template.
                    get_template_part( 'page-templates/content', 'single' );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }

                    if ( is_singular( 'attachment' ) ) {
                        // Parent post navigation.
                        the_post_navigation( array(
                            'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'molecule' ),
                        ) );
                    } elseif ( is_singular( 'post' ) ) {
                        // Previous/next post navigation.
                        the_post_navigation( array(
                            'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'molecule' ) . '</span> ' .
                                '<span class="screen-reader-text">' . __( 'Next post:', 'molecule' ) . '</span> ' .
                                '<span class="post-title">%title</span>',
                            'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'molecule' ) . '</span> ' .
                                '<span class="screen-reader-text">' . __( 'Previous post:', 'molecule' ) . '</span> ' .
                                '<span class="post-title">%title</span>',
                        ) );
                    }

                    // End of the loop.
                endwhile;
                ?>

            </div><!-- end .c12 -->

        </div><!-- end .row -->

    </div><!-- end .grid .wfull -->

<?php get_footer(); ?>