<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package frannawp
 */

get_header();
?>

	<?php 
		/**
		 * Hook: frannawp_before_main_content
		 * 
		 * @hooked frannawp_wrapper_before - 10
		 */
		do_action( 'frannawp_before_main_content' ); 
	?>

		<section class="error-404 not-found">

			<div class="page-content">
				<div class="not-found-msg">
					<h1 class="entry-title"><?php esc_html_e( '404', 'frannawp' ); ?></h1>
					<p class="sub-text-1"><?php esc_html_e( 'Sorry! The page you requested could not be found', 'frannawp' ); ?></p>
					<p class="sub-text-2"><?php esc_html_e( 'Maybe try some search below', 'frannawp' ); ?></p>
				</div>

				<div class="not-found-search">
					<?php get_search_form(); ?>
				</div>

				<div class="or">
					<?php esc_html_e( 'Or', 'frannawp' ); ?>
				</div>

				<div class="go-home-button">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="home-btn btn read-more-btn btn-2"><?php esc_html_e( 'Go to Homepage', 'frannawp' ); ?></a>
				</div>

			</div><!-- .page-content -->
			
		</section><!-- .error-404 -->

	<?php 
		/**
		 * Hook: frannawp_after_main_content
		 * 
		 * @hooked frannawp_wrapper_after - 10
		 */
		do_action( 'frannawp_after_main_content' ); 
	?>

<?php
get_footer();
