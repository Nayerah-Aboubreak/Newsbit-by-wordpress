<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
		
		/**
		 * Hook: frannawp_main_content_display
		 * 
		 * @hooked frannawp_display_content - 10
		 */
		do_action( 'frannawp_main_content_display' );

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
