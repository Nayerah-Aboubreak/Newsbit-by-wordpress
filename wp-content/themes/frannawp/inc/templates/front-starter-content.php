<?php
/**
 * The template to display Starter content on frontpage
 *
 *
 * @package frannawp
 */

if( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

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

        <?php do_action( 'frannawp_before_main_content' ); ?>
        
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

            <?php do_action( 'frannawp_main_content_display' ); ?>

            <div class="paginate-links">
                <?php echo wp_kses_post( paginate_links() ); ?>
            </div><!-- .paginate-links -->

        <?php do_action( 'frannawp_after_main_content' ); ?>

        <?php get_sidebar(); ?>

    </div><!-- .content-wrapper -->

<?php
get_footer();
