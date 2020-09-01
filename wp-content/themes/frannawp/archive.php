<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package frannawp
 */

get_header();
?>

<div class="content-wrapper">

	<?php 
		/**
		 * Hook: frannawp_before_main_content
		 * 
		 * @hooked frannawp_wrapper_before - 10
		 */
		do_action( 'frannawp_before_main_content' ); 
	?>

		<div class="archive-container">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php 
					/**
					 * Hook: frannawp_main_content_display
					 * 
					 * @hooked frannawp_display_content - 10
					 */
					do_action( 'frannawp_main_content_display' ); 
				?>
			
			<?php 
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

		</div><!-- .archive-container -->

		<div class="paginate-links">
			<?php echo wp_kses_post( paginate_links() ); ?>
		</div><!-- .paginate-links -->

	<?php 
		/**
		 * Hook: frannawp_after_main_content
		 * 
		 * @hooked frannawp_wrapper_after - 10
		 */
		do_action( 'frannawp_after_main_content' ); 
	?>

	<?php get_sidebar(); ?>

</div><!-- .content-wrapper -->

<?php
get_footer();
