<?php

add_action('wp_enqueue_scripts', function() {
	wp_enqueue_style('vendor', get_template_directory_uri() .'/assets/css/vendor.css');
    wp_enqueue_style('style', get_template_directory_uri() .'/assets/css/main.css');
	wp_enqueue_script('script', get_template_directory_uri() .'/assets/js/main.js', array(), '20151215', true);
});
 
add_theme_support('post-thumbnails');
//add_theme_support('title-tag');
//add_theme_support('custom-logo');

