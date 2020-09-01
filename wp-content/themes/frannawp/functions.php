<?php
/**
 * frannawp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package frannawp
 */

if ( ! defined( 'frannawp_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'frannawp_VERSION', '1.0.4' );
}

/**
 * Theme Setup
 */
require_once get_template_directory() . '/inc/setup.php';

/**
 * Load Widgets
 */
require_once get_template_directory() . '/inc/widgets/widgets.php';

/**
 * Load CSS and JS Files
 */
require_once get_template_directory() . '/inc/enqueue.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Theme Custom Functions
 */
require get_template_directory() . '/inc/functions/theme-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load Custom Filters
 */
require get_template_directory() . '/inc/filters/custom-excerpt.php';
require get_template_directory() . '/inc/filters/custom-logo-class.php';
require get_template_directory() . '/inc/filters/excerpt-more.php';

/**
 * Bootstrap Nav Walker
 */
if ( ! file_exists( get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'frannawp' ) );
} else {
    // File exists... require it.
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}

/**
 * Load Recommended Plugins File
 */
require get_template_directory() . '/inc/plugins/include-plugins.php';

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}