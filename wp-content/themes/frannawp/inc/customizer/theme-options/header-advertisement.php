<?php 
/**
 * Display Advertisement above Main Navigation
 */
function frannawp_header_advertisement_728x90_options( $wp_customize ) {

    $wp_customize->add_section( 'frannawp_header_advertisement_728x90_section', array(
        'title'                 =>  esc_html__( 'Header Advertisement', 'frannawp' ),
        'priority'              =>  15,
        'panel'                 =>  'frannawp_theme_options_panel'
    ) );

    // Hide / Display Ads
    $wp_customize->add_setting( 'frannawp_header_advertisement_728x90_setting', array(
        'default'               =>  false,
        'sanitize_callback'     =>  'frannawp_sanitize_checkbox'
    ) );

    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'frannawp_header_advertisement_728x90_control',
        array(
            'label'             =>  esc_html__( 'Display Advertisement above Main Menu', 'frannawp' ),
            'section'           =>  'frannawp_header_advertisement_728x90_section',
            'settings'          =>  'frannawp_header_advertisement_728x90_setting',
            'type'              =>  'checkbox'
        )
    ) );

    // Set Ad Image and URL
    $wp_customize->add_setting( 'frannawp_header_advertisement_728x90_url_setting', array(
        'default'           =>  esc_url( home_url( '/' ) ),
        'sanitize_callback' =>  'esc_url_raw'
    ) );

    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'frannawp_header_advertisement_728x90_ad_url_input',
        array(
            'label'         =>  esc_html__( 'Add URL for the Ad image', 'frannawp' ),
            'section'       =>  'frannawp_header_advertisement_728x90_section',
            'settings'      =>  'frannawp_header_advertisement_728x90_url_setting',
            'type'          =>  'url'
        )
    ) );

    $wp_customize->add_setting( 'frannawp_header_advertisement_728x90_img_setting', array(
        'default'           =>  esc_url( get_template_directory_uri() . '/dist/assets/images/sample-ads-blank.jpg' ),
        'sanitize_callback' =>  'esc_url_raw'
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize,
        'frannawp_header_advertisement_728x90_img_input',
        array(
            'label'         =>  esc_html__( 'Add your Ad image (728x90)', 'frannawp' ),
            'section'       =>  'frannawp_header_advertisement_728x90_section',
            'settings'      =>  'frannawp_header_advertisement_728x90_img_setting'
        )
    ) );

}