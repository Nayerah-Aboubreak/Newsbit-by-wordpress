<?php
/**
 * Wrapper Before main Content
 */
if( ! function_exists( 'frannawp_wrapper_before' ) ) :
    /**
	 * Before Content.
	 *
	 * Wraps all content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
    function frannawp_wrapper_before() {
        ?>
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
        <?php
        }

endif;
add_action( 'frannawp_before_main_content', 'frannawp_wrapper_before' );

/**
 * Wrapper After main Content
 */
if( ! function_exists( 'frannawp_wrapper_after' ) ) :
    /**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */

    function frannawp_wrapper_after() {
        ?>
                </main><!-- #main -->
            </div><!-- #primary -->

        <?php
        }

endif;
add_action( 'frannawp_after_main_content', 'frannawp_wrapper_after' );