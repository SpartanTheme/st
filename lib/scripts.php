<?php

/*********************
METAS, SCRIPTS & ENQUEUEING
*********************/
add_action('wp_head', 'compatible', 1);
function compatible() {
	echo "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">";
}

add_action('wp_head', 'viewport', 1);
function viewport() {
	echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>";
}

add_action('wp_head', 'wpsym_head', 4);
function wpsym_head() {
	echo '<meta name="application-name" content="';
	echo bloginfo('name');
	echo '" />';
}

add_action('wp_head', 'wpsym_head3', 4);
function wpsym_head3() {
	echo "<meta name=\"msapplication-TileColor\" content=\"#f01d4f\">";
}

add_action('wp_head', 'win8_tile', 4);
function win8_tile() {
	echo '<meta name="msapplication-TileImage" content="' . get_template_directory_uri() . '/assets/images/win8-tile-icon.png">';
}

add_action('wp_head', 'wpsym_head4', 4);
function wpsym_head4() {
	echo "<meta http-equiv=\"imagetoolbar\" content=\"false\">";
}

add_action('wp_head', 'wpsym_head2', 4);
function wpsym_head2() {
	echo '<link rel="shortcut icon" href="' . get_template_directory_uri() .'/favicon.ico">';
}

add_action('wp_head', 'wpsym_head1', 4);
function wpsym_head1() {
	echo '<link rel="apple-touch-icon" href="' . get_template_directory_uri() . '/assets/images/apple-icon-touch.png">';
}

add_action('wp_head', 'pings', 3);
function pings() {
	echo '<link rel="pingback" href="';
	echo bloginfo('pingback_url');
	echo '" />';
}

// Clean up output of stylesheet <link> tags
function spartan_clean_style_tag($input) {
  preg_match_all("!<link rel='stylesheet'\s?(id='[^']+')?\s+href='(.*)' type='text/css' media='(.*)' />!", $input, $matches);
  // Only display media if it is meaningful
  $media = $matches[3][0] !== '' && $matches[3][0] !== 'all' ? ' media="' . $matches[3][0] . '"' : '';
  return '<link rel="stylesheet" href="' . $matches[2][0] . '"' . $media . '>' . "\n";
}

add_filter('style_loader_tag', 'spartan_clean_style_tag');

/**
 * Add and remove body_class() classes
 */
function spartan_body_class($classes) {
  // Add post/page slug
  if (is_single() || is_page() && !is_front_page()) {
    $classes[] = basename(get_permalink());
  }

  // Remove unnecessary classes
  $home_id_class = 'page-id-' . get_option('page_on_front');
  $remove_classes = array(
    'page-template-default',
    $home_id_class
  );
  $classes = array_diff($classes, $remove_classes);

  return $classes;
}
add_filter('body_class', 'spartan_body_class');

function spartan_scripts_and_styles() {
  global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
  if (!is_admin()) {

		wp_register_style( 'ie', get_stylesheet_directory_uri() . '/assets/css/ie.css', array(), '' );

    // modernizr (without media query polyfill)
    wp_register_script( 'modernizr', get_stylesheet_directory_uri() . '/assets/js/libs/modernizr.custom.min.js', array(), '2.5.3', false );

    // jquery file in the footer
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js', false, null, true);
    add_filter('script_loader_src', 'spartan_jquery_local_fallback', 10, 2);

    //adding scripts file in the footer - fundation
    wp_register_script( 'fundation', get_stylesheet_directory_uri() . '/assets/js/foundation.min.js', array( 'jquery' ), '', true );

    wp_register_script( 'plugins', get_stylesheet_directory_uri() . '/assets/js/plugins.js', array( 'jquery' ), '', true );

    // comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }

    // enqueue styles and scripts
    wp_enqueue_style('ie');

    $wp_styles->add_data( 'ie', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet

    // wp_enqueue_script( 'modernizr' );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'fundation' );
    // wp_enqueue_script( 'plugins' );

  }
}

// http://wordpress.stackexchange.com/a/12450
function spartan_jquery_local_fallback($src, $handle) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/libs/jquery-1.8.2.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
