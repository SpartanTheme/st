<?php
/*********************
LAUNCH SPARTAN
Let's fire off all the functions
and tools. I put it up here so it's
right up top and clean.
*********************/

// we're firing all out initial functions at the start
add_action('after_setup_theme','spartan', 16);

function spartan() {

    // launching operation cleanup
    add_action('init', 'spartan_head_cleanup');
    // remove WP version from RSS
    add_filter('the_generator', 'spartan_rss_version');
    // remove pesky injected css for recent comments widget
    add_filter( 'wp_head', 'spartan_remove_wp_widget_recent_comments_style', 1 );
    // clean up comment styles in the head
    add_action('wp_head', 'spartan_remove_recent_comments_style', 1);
    // clean up gallery output in wp
    add_filter('gallery_style', 'spartan_gallery_style');
    // enqueue base scripts and styles
    add_action('wp_enqueue_scripts', 'spartan_scripts_and_styles', 999);
    // ie conditional wrapper

    // launching this stuff after theme setup
    spartan_theme_support();
    // adding sidebars to Wordpress (these are created in functions.php)
    add_action( 'widgets_init', 'spartan_register_sidebars' );
    // adding the spartan search form (created in functions.php)
    add_filter( 'get_search_form', 'spartan_wpsearch' );
    // cleaning up random code around images
    add_filter('the_content', 'spartan_filter_ptags_on_images');
    // cleaning up excerpt
    add_filter('excerpt_more', 'spartan_excerpt_more');

} /* end spartan ahoy */