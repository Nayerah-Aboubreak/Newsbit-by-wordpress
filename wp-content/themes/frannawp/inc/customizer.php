<?php
/**
 * frannawp Theme Customizer
 *
 * @package frannawp
 */

/**
 * Load Custom Options Files
 */
get_template_part( 'inc/customizer/sanitizations' );
get_template_part( 'inc/customizer/theme-options/theme-options-panel' );
get_template_part( 'inc/customizer/theme-options/header-advertisement' );
get_template_part( 'inc/customizer/theme-options/menu-cart' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function frannawp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'frannawp_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'frannawp_customize_partial_blogdescription',
			)
		);
	}

	frannawp_theme_options_panel_customizer( $wp_customize );
	frannawp_header_advertisement_728x90_options( $wp_customize );
	frannawp_menu_cart_display_options( $wp_customize );
}
add_action( 'customize_register', 'frannawp_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function frannawp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function frannawp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function frannawp_customize_preview_js() {
	wp_enqueue_script( 'frannawp-customizer', get_template_directory_uri() . '/dist/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'frannawp_customize_preview_js' );
