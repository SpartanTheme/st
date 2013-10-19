<?php
/*
Author: Renzo Johnson
URL: http://spartantheme.com
URL: http://renzojohnson.com/spartan
*/

require_once locate_template('/lib/wp-less/wp-less.php' );

if ( ! is_admin() )
    wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/assets/less/app.less' );


    add_filter( 'wp_less_cache_path', 'custom_less_cache_path' );
    add_filter( 'wp_less_cache_url', 'custom_less_cache_url' );

    function custom_less_cache_path( $path )
    {
        return get_stylesheet_directory().'/assets/css';
    }

    function custom_less_cache_url( $url )
    {
        return get_stylesheet_directory_uri().'/assets/css';
    }