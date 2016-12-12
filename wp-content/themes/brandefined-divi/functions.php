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

