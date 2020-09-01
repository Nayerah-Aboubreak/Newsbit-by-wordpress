<?php 
/**
 * Theme Options Panel
 */

function frannawp_theme_options_panel_customizer( $wp_customize ) {

    $wp_customize->add_panel( 'frannawp_theme_options_panel', array(
        'title'				=>	esc_html__( 'Theme Options', 'frannawp' ),
        'description'		=>	'<p>' . esc_html__( 'Main options for the theme customizer', 'frannawp' ) . '</p>',
        'priority'			=>	30
    ) );

}


