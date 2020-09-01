<?php 

/**
 * Enqueue scripts and styles.
 */
function frannawp_scripts() {
    wp_enqueue_style( 'frannawp-style', get_stylesheet_uri(), array(), frannawp_VERSION );
    wp_enqueue_style( 'frannawp-fontawesome', get_template_directory_uri() . '/dist/assets/fontawesome/all.min.css', array(), '5.12.0', 'all' );
    wp_enqueue_style( 'frannawp-bootstrap', get_template_directory_uri() . '/dist/assets/bootstrap.css', array(), '5.12.0', 'all' );
    wp_enqueue_style( 'frannawp-bundle', get_template_directory_uri() . '/dist/assets/css/bundle.css', array(), frannawp_VERSION, 'all' );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'frannawp-bootstrap', get_template_directory_uri() . '/dist/assets/bootstrap.js', array(), frannawp_VERSION, true );
    wp_enqueue_script( 'frannawp-bundle', get_template_directory_uri() . '/dist/assets/js/bundle.js', array(), frannawp_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'frannawp_scripts' );
