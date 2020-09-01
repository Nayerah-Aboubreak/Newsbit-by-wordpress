<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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

		<?php
			if ( have_posts() ) :
				if ( is_home() && !is_front_page() ) :
					?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
					<?php
				endif;
		?>
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
