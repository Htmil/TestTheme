<?php

function htmil_theme_support() {
    // Adds dynamic title tag support.
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'htmil_theme_support');

function htmil_menus(){

    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Items"
    );

    register_nav_menus($locations);
}

add_action('init',"htmil_menus");


function htmil_register_styles() {

    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('parent-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('parent-fontAwsome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
    wp_enqueue_style('parent-style', get_stylesheet_directory_uri().'/style.css', array('parent-bootstrap'), $version, 'all');
    
}
add_action('wp_enqueue_scripts', 'htmil_register_styles');



function htmil_enqueue_scripts() {

    wp_enqueue_script('parent-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
    wp_enqueue_script('parent-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', true);
    wp_enqueue_script('parent-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '4.4.1', true);
    wp_enqueue_script('parent-main', get_template_directory_uri()."/assets/js/main.js", array('parent-jquery'), '1.0', true);

}
add_action('wp_enqueue_scripts', 'htmil_enqueue_scripts');


function htmil_widget_areas(){


    register_sidebar(
        array(
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area',
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => ''
        )
    );

    register_sidebar(
        array(
            'name' => 'Footer Area',
            'id' => 'footer-1',
            'description' => 'Footer Widget Area',
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => ''
        )
    );
}

add_action('widgets_init', 'htmil_widget_areas');
?>
