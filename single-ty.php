<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Molecule
 * @since Molecule 1.0
 */

get_header(); ?>

    <div class="grid wfull">

        <div class="row">

                <div class="c12">

                <h1 class="page-title post"><span class="entry-title"><?php the_title(); ?></span></h1>

                <?php
                // Start the loop.
                while ( have_posts() ) : the_post();

                    // Include the single post content template.
                    get_template_part( 'template-parts/content', 'single' );

                    if ( is_singular( 'attachment' ) ) {
                        // Parent post navigation.
                        the_post_navigation( array(
                            'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'molecule' ),
                        ) );
                    } elseif ( is_singular( 'post' ) ) {
                        // Previous/next post navigation.
                        the_post_navigation( array(
                            'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'molecule' ) . '</span> ' .
                                '<span class="screen-reader-text">' . __( 'Previous post:', 'molecule' ) . '</span> ' .
                                '<span class="post-title">%title</span>',
                            'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'molecule' ) . '</span> ' .
                                '<span class="screen-reader-text">' . __( 'Next post:', 'molecule' ) . '</span> ' .
                                '<span class="post-title">%title</span>',
                        ) );
                    }

                    // End of the loop.
                endwhile;
                ?>  

            </div><!-- end .c12 -->

        </div><!-- end .row -->

    </div><!-- end .grid -->

<?php get_footer(); ?>