<?php
// Enqueue Custom Scripts and Styles 

function custom_style_scripts(){
    // Styles
    wp_enqueue_style('plugins-css',ONPOINT_THEME_URI . '/assets/css/plugins.css',array(),'1.0','all');
    wp_enqueue_style('style-css',ONPOINT_THEME_URI . '/assets/css/style.css',array(),'1.0','all');
    wp_enqueue_style('responsive',ONPOINT_THEME_URI . '/assets/css/responsive.css',array(),'1.0','all');

    // Scripts
    wp_enqueue_script('plugins-js',ONPOINT_THEME_URI . '/assets/js/plugins.js',array('jquery'),'1.0',true);
    wp_enqueue_script('main-js',ONPOINT_THEME_URI . '/assets/js/main.js',array('jquery'),'1.0',true);
}

add_action('wp_enqueue_scripts','custom_style_scripts');