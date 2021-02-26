<?php
/**
 * The template for displaying all single projects
 *
 * @package WordPress
 * @subpackage Molecule
 * @since Molecule 1.0
 */

get_header(); ?>

    <div class="grid wfull">

        <div class="row">

                <div class="c12">

                    <h1 class="page-title"><span class="entry-title"><?php the_title(); ?></span></h1>

                <?php
                // Start the loop.
                while ( have_posts() ) : the_post();

                    // Include the single post content template.
                    get_template_part( 'template-parts/content', 'single-projects' );

                    if ( is_singular( 'projects' ) ) {
                        // Previous/next post navigation.
                        the_post_navigation( array(
                            'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Project', 'molecule' ) . '</span> ' .
                                '<span class="screen-reader-text">' . __( 'Previous Project:', 'molecule' ) . '</span> ' .
                                '<span class="post-title">%title</span>',
                            'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Project', 'molecule' ) . '</span> ' .
                                '<span class="screen-reader-text">' . __( 'Next Project:', 'molecule' ) . '</span> ' .
                                '<span class="post-title">%title</span>',
                        ) );
                    }

                    // End of the loop.
                endwhile;
                ?>  

            </div><!-- end .c9 or .c12 -->

        </div><!-- end .row -->

    </div><!-- end .grid -->

<?php get_footer(); ?>