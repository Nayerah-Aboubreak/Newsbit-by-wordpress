<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package frannawp
 */

?>

		</div><!-- .wrapper -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
	<?php 
		/**
		 * Hook: frannawp_theme_footer_credit
		 * 
		 * @hooked frannawp_theme_footer - 10
		 */
		do_action( 'frannawp_theme_footer_credit' ); 
	?>
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
