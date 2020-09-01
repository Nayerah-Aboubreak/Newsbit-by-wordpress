<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package frannawp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="single-post-container">

        <div class="img-container">
            <?php frannawp_post_thumbnail(); ?>
        </div>

        <div class="text-container">

            <div class="category">
                <?php echo wp_kses_post( get_the_category_list( esc_html__( ', ', 'frannawp' ) ) ); ?>
            </div>

            <?php
                the_title( '<h1 class="entry-title">', '</h1>' );
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

            <div class="entry-content">
                <?php
                    the_content(
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
                    
                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'frannawp' ),
                            'after'  => '</div>',
                        )
                    );
                ?>
            </div><!-- .entry-summary -->

        </div>
        
    </div><!-- .single-post-container -->
	
</article><!-- #post-<?php the_ID(); ?> -->
