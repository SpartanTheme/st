<?php
/*
Author: Renzo Johnson
URL: http://spartantheme.com
URL: http://renzojohnson.com/spartan
*/

require_once( 'wp-sass/wp-sass.php' );

// enqueue a .less style sheet
if ( ! is_admin() )
    wp_enqueue_style( 'spartan', get_stylesheet_directory_uri() . '/assets/sass/app.scss' );
else
    wp_enqueue_style( 'admin', get_stylesheet_directory_uri() . '/admin.sass.php' );


add_filter( 'wp_sass_cache_path', 'custom_sass_cache_path' );
add_filter( 'wp_sass_cache_url', 'custom_sass_cache_url' );

function custom_sass_cache_path( $path )
{
    return get_stylesheet_directory().'/assets/css';
}

function custom_sass_cache_url( $url )
{
    return get_stylesheet_directory_uri().'/assets/css';
}
