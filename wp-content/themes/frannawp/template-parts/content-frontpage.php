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

<div class="frontpage-featured-posts">

<!-- Featured Post Left -->
<?php
	if( is_active_sidebar( 'frontpage-left-featured-posts' ) ) {
		dynamic_sidebar( 'frontpage-left-featured-posts' );
	}
?>

<!-- Featured Posts Right -->
<?php
	if( is_active_sidebar( 'frontpage-right-featured-posts' ) ) {
		dynamic_sidebar( 'frontpage-right-featured-posts' );
	}
?>

</div><!-- .frontpage-featured-posts -->

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
		if( is_active_sidebar( 'frontpage-category-one' ) ) {
			dynamic_sidebar( 'frontpage-category-one' );
		}
	?>

	<?php
		if( is_active_sidebar( 'frontpage-category-two' ) ) {
			dynamic_sidebar( 'frontpage-category-two' );
		}
	?>

	<div class="category-three-posts">

		<?php
			if( is_active_sidebar( 'frontpage-category-three-left' ) ) {
				dynamic_sidebar( 'frontpage-category-three-left' );
			}
		?>

		<?php
			if( is_active_sidebar( 'frontpage-category-three-right' ) ) {
				dynamic_sidebar( 'frontpage-category-three-right' );
			}
		?>

	</div><!-- .category-three-posts -->
		
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
	
</article><!-- #post-<?php the_ID(); ?> -->
