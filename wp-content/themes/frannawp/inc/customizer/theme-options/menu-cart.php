<?php 

function frannawp_menu_cart_display_options( $wp_customize ) {

    $wp_customize->add_section( 'frannawp_menu_cart_display_section', array(
        'title'                 =>  esc_html__( 'Menu Cart display', 'frannawp' ),
        'priority'              =>  20,
        'panel'                 =>  'frannawp_theme_options_panel'
    ) );

    //Main Menu Cart
    $wp_customize->add_setting( 'frannawp_menu_cart_display_setting', array(
        'default'               =>  false,
        'sanitize_callback'     =>  'frannawp_sanitize_checkbox'
    ) );

    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'frannawp_menu_cart_display_control',
        array(
            'label'             =>  esc_html__( 'Display / Hide Menu Cart', 'frannawp' ),
            'description'       =>  '<p>' . esc_html__( 'WooCommerce need to be installed', 'frannawp' ) . '</p>',
            'section'           =>  'frannawp_menu_cart_display_section',
            'settings'          =>  'frannawp_menu_cart_display_setting',
            'type'              =>  'checkbox'
        )
    ) );

}