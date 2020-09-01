<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package frannawp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="archive-content">

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
                    <i class="fas fa-comments"></i><a href="<?php comments_link(); ?>"><?php comments_number("0", "1", "%"); ?></a>
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
	
</article><!-- #post-<?php the_ID(); ?> -->
