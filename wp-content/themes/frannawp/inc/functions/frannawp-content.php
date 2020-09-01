<?php 
/**
 * Display content between wrapper
 */
if( ! function_exists( 'frannawp_display_content' ) ) :
    function frannawp_display_content() {

        if( is_singular() ) :

            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', get_post_type() );

                the_post_navigation();

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) : ?>

                    <div class="comments-container">
                        <?php comments_template();?>
                    </div>
                <?php endif;

            endwhile; // End of the loop.

        elseif ( is_page() || is_page_template( 'fullwidth.php' ) ) :

            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', 'page' );

            endwhile; // End of the loop.

        elseif ( is_search() ) :
            /* Start the Loop */
            while ( have_posts() ) :
                the_post();

                /**
                 * Run the loop for the search to output the results.
                 * If you want to overload this in a child theme then include a file
                 * called content-search.php and that will be used instead.
                 */
                get_template_part( 'template-parts/content', 'search' );

            endwhile;
        
        elseif ( is_home() ) :

            /* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

        else:
            if( is_archive() ):
                while ( have_posts() ) :
                    the_post();

                    /*
                    * Include the Post-Type-specific template for the content.
                    * If you want to override this in a child theme, then include a file
                    * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                    */
                    get_template_part( 'template-parts/content', get_post_type() );

                endwhile;
            endif;
        endif;
    }
endif;
add_action( 'frannawp_main_content_display', 'frannawp_display_content' );