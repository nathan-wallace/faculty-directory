<?php
/**
 * Template part for displaying directory
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="entry-content">
		<?php
				if( get_field('thumbnail_photo') ): ?>

					<img src="<?php the_field('thumbnail_photo'); ?>" />

				<?php endif; ?>
					<h4><?php the_field('first_name'); ?> <?php the_field('last_name'); ?></h4>
					<h5><?php the_field('academic_title'); ?></h5>
				<?php if( get_field('fd_email') ): ?>
					<small><span class="dashicons dashicons-email-alt"></span> <?php the_field('fd_email'); ?></small>
				<?php endif; ?>
					<?php if( get_field('fd_phone_number') ): ?>
					<small><span class="dashicons dashicons-phone"></span> <?php the_field('fd_phone_number'); ?></small>
				<?php endif; ?>
				<?php if( get_field('fd_bio') ): ?>
					<p><?php the_field('fd_bio'); ?></p>
				<?php endif; ?>
		<?php the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentynineteen' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentynineteen' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php twentynineteen_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
