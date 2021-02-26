<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Molecule
 * @since Molecule 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="grid">

		<div class="row">

			<div class="c12">

			<?php molecule_post_thumbnail(); ?>

				<header class="entry-header">

					<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
						<span class="sticky-post"><?php _e( 'Featured', 'molecule' ); ?></span>
					<?php endif; ?>

					<?php the_title( sprintf( '<h2><span class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></span></h2>' ); ?>

					<div class="meta-details">

                    <div class="author-avatar">
				        <?php
				        /**
				         * Filter the Molecule author bio avatar size.
				         *
				         * @since Molecule 1.0
				         *
				         * @param int $size The avatar height and width size in pixels.
				         */
				        $author_bio_avatar_size = apply_filters( 'molecule_author_bio_avatar_size', 80 );

				        echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
				        ?>
				    </div><!-- .author-avatar -->

                    <?php molecule_entry_meta(); ?>

                </div><!-- .meta-details -->

				</header><!-- .entry-header -->
			
			</div><!-- .c6 -->

		</div><!-- .row -->

	</div><!-- .grid -->

	<div class="grid">

		<div class="row">

			<div class="c12">

				<div class="entry-content">

					<?php the_excerpt ( sprintf(
							/* translators: %s: Name of current post */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'molecule' ),
							get_the_title()
						) ); ?>

					<?php
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'molecule' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'molecule' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) ); ?>

				</div><!-- .entry-content -->

				<footer class="entry-footer">
					
					<?php
						edit_post_link(
							sprintf(
								/* translators: %s: Name of current post */
								__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'molecule' ),
								get_the_title()
							),
							'<span class="edit-link">',
							'</span>'
						);
					?>
				</footer><!-- .entry-footer -->

			</div><!-- .c12 -->

		</div><!-- .row -->

	</div><!-- .grid -->

</article><!-- #post-<?php the_ID(); ?> -->