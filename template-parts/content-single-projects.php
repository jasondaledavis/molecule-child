<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Molecule
 * @since Molecule 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry-content">

			<?php

				the_content();
			?>

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

	</article><!-- #post-<?php the_ID(); ?> -->