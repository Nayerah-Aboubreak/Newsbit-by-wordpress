<?php
/**
 * Template Name: FullWidth Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package frannawp
 */

get_header();
?>

<div class="content-wrapper full">

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

</div><!-- .content-wrapper -->

<?php
get_footer();
