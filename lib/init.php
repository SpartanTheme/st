<?php
/*********************
THEME SUPPORT
*********************/

// Adding WP 3+ Functions & Theme Support
function spartan_theme_support() {

	// wp thumbnails (sizes handled in functions.php)
	add_theme_support('post-thumbnails');

	// default thumb size
	set_post_thumbnail_size(125, 125, true);

	// Thumbnail sizes
	//add_image_size( 'spartan-thumb-600', 600, 150, true );
	//add_image_size( 'spartan-thumb-300', 300, 100, true );

	// wp custom background (thx to @bransonwerner for update)
	add_theme_support( 'custom-background',
	    array(
	    'default-image' => '',  // background image default
	    'default-color' => '', // background color default (dont add the #)
	    'wp-head-callback' => '_custom_background_cb',
	    'admin-head-callback' => '',
	    'admin-preview-callback' => ''
	    )
	);

	// rss thingy
	add_theme_support('automatic-feed-links');

	// adding post format support
	add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	);

	// wp menus
	add_theme_support( 'menus' );

	// registering wp3+ menus
	register_nav_menus(
		array(
			'main-nav' => __( 'Top Nav', 'spartantheme' ),   // top nav in header
			'footer-nav' => __( 'Footer Nav', 'spartantheme' ), // footer nav in footer
			'footer2-nav' => __( 'Footer2 Nav', 'spartantheme' ), // footer nav in footer
			'mobile-nav' => __( 'Mobile Nav', 'spartantheme' ), // mobile nav in footer
			'day-nav' => __( 'Day Nav', 'spartantheme' ), // food nav in footer
			'night-nav' => __( 'Night Nav', 'spartantheme' ) // food nav in footer
		)
	);
} /* end spartan theme support */