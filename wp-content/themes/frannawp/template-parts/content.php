<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package frannawp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_archive() ) : ?>

		<div class="archive-content">

			<div class="img-container">
				<a href="<?php the_permalink(); ?>">
					<?php if( has_post_thumbnail() ): ?>
						<?php frannawp_post_thumbnail(); ?>
					<?php else: ?>
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/assets/images/bg-image-100x550.jpg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
					<?php endif; ?>
				</a>
			</div>

			<div class="text-container">

				<div class="category">
					<?php echo wp_kses_post( get_the_category_list( esc_html__( ', ', 'frannawp' ) ) ); ?>
				</div>

				<?php
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				?>

				<div class="entry-meta">
					<?php
					frannawp_posted_on();
					frannawp_posted_by();
					?>
					<span>
						<i class="fas fa-comments"></i> <a href="<?php comments_link(); ?>"><?php comments_number("0", "1", "%"); ?></a>
					</span>
				</div><!-- .entry-meta -->

				<div class="entry-summary">
					<?php
						the_excerpt(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'frannawp' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							)
						);
					?>
				</div><!-- .entry-summary -->

			</div>
			
		</div><!-- .archive-content -->

	<?php else: ?>

	<div class="img-container">
		<?php if( is_singular() ): ?>
			<?php if( has_post_thumbnail() ): ?>
				<?php frannawp_post_thumbnail(); ?>
			<?php else: ?>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/assets/images/bg-image-100x550.jpg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			<?php endif; ?>
		<?php else: ?>
			<a href="<?php the_permalink(); ?>">
				<?php if( has_post_thumbnail() ): ?>
					<?php frannawp_post_thumbnail(); ?>
				<?php else: ?>
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/assets/images/bg-image-100x550.jpg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
				<?php endif; ?>
			</a>
		<?php endif; ?>
	</div>

	<div class="text-container">

		<div class="category">
			<?php echo wp_kses_post( get_the_category_list( esc_html__( ', ', 'frannawp' ) ) ); ?>
		</div>

		<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		?>

		<div class="entry-meta">
			<?php
			frannawp_posted_on();
			frannawp_posted_by();
			?>
			<span>
				<i class="fas fa-comments"></i> <a href="<?php comments_link(); ?>"><?php comments_number("0", "1", "%"); ?></a>
			</span>
		</div><!-- .entry-meta -->

		<?php if( is_singular() ): ?>
			<div class="entry-content">
				<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'frannawp' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'frannawp' ),
							'after'  => '</div>',
						)
					);
				?>
			</div><!-- .entry-summary -->
		<?php else: ?>
			<div class="entry-summary">
				<?php
					the_excerpt(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'frannawp' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);
				?>
			</div><!-- .entry-summary -->
		<?php endif; ?>

	</div><!-- .text-container -->

	<?php if( ! is_singular() && ! is_archive() ): ?>
		<div class="read-more-btn-container">
			<a href="<?php the_permalink(); ?>" class="btn read-more-btn btn-3"><?php printf( 
				/* translators: 1: Read More Icon. */
				esc_html__( 'Read More %1$s', 'frannawp' ), '<i class="fas fa-angle-right"></i>' );?> </a>
		</div>

		<div class="line"></div>
	<?php endif; ?>

	<?php endif; ?>
	
</article><!-- #post-<?php the_ID(); ?> -->
