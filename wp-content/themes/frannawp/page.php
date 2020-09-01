<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package frannawp
 */

get_header();
?>

<?php if( is_front_page() ): ?>

	<?php get_template_part( 'template-parts/content', 'frontpage' ); ?>

<?php else: ?>
	<?php if( class_exists( 'WooCommerce' ) && (is_cart() || is_checkout() || is_account_page() ) ): ?>
		<div class="content-wrapper full">
	<?php else: ?>
		<div class="content-wrapper">
	<?php endif; ?>

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
<?php endif; ?>

<?php
get_footer();
