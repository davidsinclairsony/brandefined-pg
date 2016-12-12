<?php

// Enqueue the child theme styles and scripts here, the WordPress way
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_script( 'divi-child-js', get_stylesheet_directory_uri() . '/js/divi-child.js', array('jquery'), '1.0.0', true );
   	wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery', 'divi-child-js'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

// Extended functionality for the base Brandefined Divi child theme can be found here
include_once("includes/divi-child.php");

// Put custom functions that will only be used on this project here

// menus using shortcodes
function print_menu_shortcode($atts, $content = null) {
    extract(shortcode_atts(array( 'name' => null, ), $atts));
    return wp_nav_menu( array( 'menu' => $name, 'echo' => false ) );
}
add_shortcode('menu', 'print_menu_shortcode');

// news section for home
function home_news($atts) {
    ob_start();
    get_template_part('news-shortcode', 'shortcode');
    $ret = ob_get_contents();
    ob_end_clean();
    return $ret;
}

add_shortcode('home_news', 'home_news');
