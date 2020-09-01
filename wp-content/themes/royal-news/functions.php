<?php
/*
 * Royal News functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Royal News
*/

// Loads parent theme stylesheet
// Do not delete this
function royal_news_scripts()
{
    wp_enqueue_style('royal-magazine', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'royal_news_scripts', 20);

// Loads custom stylesheet and js for child. 
// This could override all stylesheets of parent theme and custom js functions
function royal_news_custom_scripts()
{
    wp_enqueue_style('royal-news', get_stylesheet_directory_uri() . '/custom.css');
    wp_enqueue_script('royal-news-script', get_stylesheet_directory_uri().'/assets/twp/js/child-script.js', array('jquery'), '', true);

}

add_action('wp_enqueue_scripts', 'royal_news_custom_scripts', 60);

require_once( get_stylesheet_directory(). '/inc/hooks/slider.php' );
