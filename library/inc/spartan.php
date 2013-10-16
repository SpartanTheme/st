<?php
/* Spartan Theme
Developed by: Renzo Johnson
URL: http://spartantheme.com/
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function spartan_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __('Sidebar 1', 'spartantheme'),
		'description' => __('The first (primary) sidebar.', 'spartantheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function spartan_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<!-- end custom gravatar call -->
				<?php printf(__('<cite class="fn">%s</cite>', 'spartantheme'), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__('F jS, Y', 'spartantheme')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'spartantheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e('Your comment is awaiting moderation.', 'spartantheme') ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function spartan_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __('Search for:', 'spartantheme') . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search the Site...','spartantheme').'" />
	<input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
	</form>';
	return $form;
} // don't remove this bracket!



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

/*********************
WP_HEAD GOODNESS
The default wordpress head is
a mess. Let's clean it up by
removing all the junk we don't
need.
*********************/

function spartan_head_cleanup() {
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// index link
	remove_action( 'wp_head', 'index_rel_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
  // remove WP version from css
  add_filter( 'style_loader_src', 'spartan_remove_wp_ver_css_js', 9999 );
  // remove Wp version from scripts
  add_filter( 'script_loader_src', 'spartan_remove_wp_ver_css_js', 9999 );

} /* end spartan head cleanup */

// remove WP version from RSS
function spartan_rss_version() { return ''; }

// remove WP version from scripts
function spartan_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

// remove injected CSS for recent comments widget
function spartan_remove_wp_widget_recent_comments_style() {
   if ( has_filter('wp_head', 'wp_widget_recent_comments_style') ) {
      remove_filter('wp_head', 'wp_widget_recent_comments_style' );
   }
}

// remove injected CSS from recent comments widget
function spartan_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
  }
}

// remove injected CSS from gallery
function spartan_gallery_style($css) {
  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}
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
	echo '<meta name="msapplication-TileImage" content="' . get_template_directory_uri() . '/library/images/win8-tile-icon.png">';
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
	echo '<link rel="apple-touch-icon" href="' . get_template_directory_uri() . '/library/images/apple-icon-touch.png">';
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

		wp_register_style( 'normalize', get_stylesheet_directory_uri() . '/library/css/normalize.css', array(), '', 'all' );
		wp_register_style( 'fonts', get_stylesheet_directory_uri() . '/library/css/fonts.css', array(), '', 'all' );
		wp_register_style( 'global', get_stylesheet_directory_uri() . '/library/css/global.css', array(), '', 'all' );
		wp_register_style( 'ie', get_stylesheet_directory_uri() . '/library/css/ie.css', array(), '' );

    // modernizr (without media query polyfill)
    wp_register_script( 'modernizr', get_stylesheet_directory_uri() . '/library/js/libs/modernizr.custom.min.js', array(), '2.5.3', false );

    // jquery file in the footer
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js', false, null, true);
    add_filter('script_loader_src', 'spartan_jquery_local_fallback', 10, 2);

		//adding scripts file in the footer
		wp_register_script( 'scripts', get_stylesheet_directory_uri() . '/library/js/scripts.js', array( 'jquery' ), '', true );

    // comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }

    // enqueue styles and scripts
    wp_enqueue_style( 'normalize' );
		wp_enqueue_style( 'fonts' );
		wp_enqueue_style( 'global' );
    wp_enqueue_style('ie');

    $wp_styles->add_data( 'ie', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet

    wp_enqueue_script( 'modernizr' );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'scripts' );

  }
}

// http://wordpress.stackexchange.com/a/12450
function spartan_jquery_local_fallback($src, $handle) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/library/js/libs/jquery-1.8.2.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}


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
			'main-nav' => __( 'The Main Menu', 'spartantheme' ),   // main nav in header
			'footer-links' => __( 'Footer Links', 'spartantheme' ) // secondary nav in footer
		)
	);
} /* end spartan theme support */


/*********************
MENUS & NAVIGATION
*********************/

// the main menu
function spartan_main_nav() {
	// display the wp3 menu if available
    wp_nav_menu(array(
			'container' => false,                           // remove nav container
			'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
			'menu' => __( 'The Main Menu', 'spartantheme' ),  // nav name
			'menu_class' => 'nav top-nav clearfix',         // adding custom nav class
			'theme_location' => 'main-nav',                 // where it's located in the theme
			'before' => '',                                 // before the menu
			'after' => '',                                  // after the menu
			'link_before' => '',                            // before each link
			'link_after' => '',                             // after each link
			'depth' => 0,                                   // limit the depth of the nav
			'fallback_cb' => 'spartan_main_nav_fallback'      // fallback function
	));
} /* end spartan main nav */

// the footer menu (should you choose to use one)
function spartan_footer_links() {
	// display the wp3 menu if available
    wp_nav_menu(array(
			'container' => '',                              // remove nav container
			'container_class' => 'footer-links clearfix',   // class of container (should you choose to use it)
			'menu' => __( 'Footer Links', 'spartantheme' ),   // nav name
			'menu_class' => 'nav footer-nav clearfix',      // adding custom nav class
			'theme_location' => 'footer-links',             // where it's located in the theme
			'before' => '',                                 // before the menu
			'after' => '',                                  // after the menu
			'link_before' => '',                            // before each link
			'link_after' => '',                             // after each link
			'depth' => 0,                                   // limit the depth of the nav
			'fallback_cb' => 'spartan_footer_links_fallback'  // fallback function
	));
} /* end spartan footer link */

// this is the fallback for header menu
function spartan_main_nav_fallback() {
	wp_page_menu( array(
		'show_home' => true,
		'menu_class' => 'nav top-nav clearfix',      // adding custom nav class
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
		'link_before' => '',                            // before each link
		'link_after' => ''                             // after each link
	) );
}

// this is the fallback for footer menu
function spartan_footer_links_fallback() {
	/* you can put a default here if you like */
}

/*********************
RELATED POSTS FUNCTION
*********************/

// Related Posts Function (call using spartan_related_posts(); )
function spartan_related_posts() {
	echo '<ul id="spartan-related-posts">';
	global $post;
	$tags = wp_get_post_tags($post->ID);
	if($tags) {
		foreach($tags as $tag) { $tag_arr .= $tag->slug . ','; }
        $args = array(
        	'tag' => $tag_arr,
        	'numberposts' => 5, /* you can change this to show more */
        	'post__not_in' => array($post->ID)
     	);
        $related_posts = get_posts($args);
        if($related_posts) {
        	foreach ($related_posts as $post) : setup_postdata($post); ?>
	           	<li class="related_post"><a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
	        <?php endforeach; }
	    else { ?>
            <?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'spartantheme' ) . '</li>'; ?>
		<?php }
	}
	wp_reset_query();
	echo '</ul>';
} /* end spartan related posts function */

/*********************
PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
function spartan_page_navi($before = '', $after = '') {
	global $wpdb, $wp_query;
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if ( $numposts <= $posts_per_page ) { return; }
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}
	echo $before.'<nav class="page-navigation"><ol class="spartan_page_navi clearfix">'."";
	if ($start_page >= 2 && $pages_to_show < $max_page) {
		$first_page_text = __( "First", 'spartantheme' );
		echo '<li class="bpn-first-page-link"><a href="'.get_pagenum_link().'" title="'.$first_page_text.'">'.$first_page_text.'</a></li>';
	}
	echo '<li class="bpn-prev-link">';
	previous_posts_link('<<');
	echo '</li>';
	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li class="bpn-current">'.$i.'</li>';
		} else {
			echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	echo '<li class="bpn-next-link">';
	next_posts_link('>>');
	echo '</li>';
	if ($end_page < $max_page) {
		$last_page_text = __( "Last", 'spartantheme' );
		echo '<li class="bpn-last-page-link"><a href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'">'.$last_page_text.'</a></li>';
	}
	echo '</ol></nav>'.$after."";
} /* end page navi */

/*********************
RANDOM CLEANUP ITEMS
*********************/

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function spartan_filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// This removes the annoying […] to a Read More link
function spartan_excerpt_more($more) {
	global $post;
	// edit here if you like
return '...  <a class="excerpt-read-more" href="'. get_permalink($post->ID) . '" title="'. __('Read', 'spartantheme') . get_the_title($post->ID).'">'. __('Read more &raquo;', 'spartantheme') .'</a>';
}

/*
 * This is a modified the_author_posts_link() which just returns the link.
 *
 * This is necessary to allow usage of the usual l10n process with printf().
 */
function spartan_get_the_author_posts_link() {
	global $authordata;
	if ( !is_object( $authordata ) )
		return false;
	$link = sprintf(
		'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
		get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
		esc_attr( sprintf( __( 'Posts by %s' ), get_the_author() ) ), // No further l10n needed, core will take care of this one
		get_the_author()
	);
	return $link;
}

function spartan_page_title() {
		global $page, $paged;
		wp_title( '&middot;', true, 'right' );
		bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " &middot; $site_description";
		if ( $paged >= 2 || $page >= 2 )
			echo ' &middot; ' . sprintf( __( 'Page %s', 'spartan' ), max( $paged, $page ) );
}

function spartan_domain() {
		$domain = get_option('siteurl'); //or home
		$domain = str_replace('http://', '', $domain);
		$domain = str_replace('www', '', $domain); //add the . after the www if you don't want it

		echo $domain;
}

function spartan_tpl() {
		global $template; print_r($template);
}

function spartan_socs() {
		include('soc.php');
}

function spartan_socs_meta() {
		include('soc-meta.php');
}

function spartan_rich_snnipets() {
		include('rich-snnipets.php');
}

add_action( 'init', 'excerpts_to_pages' );
function excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

// Disable post revision
define('WP_POST_REVISIONS', false);
define('WP_POST_REVISIONS', 0);
// Empty trash
define('EMPTY_TRASH_DAYS', 0 );

//Change location of the Plugins & WordPress Themes folder
//define(‘WP_CONTENT_DIR’, ‘http://www.labnol.org/assets/wp-content’);

//Disallow direct file edition
define('DISALLOW_FILE_EDIT', TRUE);

// auto-insert content to post editor
function my_editor_content($content) {
	$content = "<h5>Thank you for developing with Spartan Theme.</h5>.";
	return $content;
}
add_filter('default_content', 'my_editor_content');

//Hide  display of unnecessary information on failed login attempts
function wrong_login() {
return 'Wrong username or password.';
}
add_filter('login_errors', 'wrong_login');

// Add the browser name and version to the body class
function browser_class( $class ) {
		$arr = array(
		'msie',
		'firefox',
		'webkit',
		'opera'
		);
		$agent = strtolower( $_SERVER['HTTP_USER_AGENT'] );

		foreach( $arr as $name ) {
		if( strpos( $agent, $name ) > -1 ) {
			$class[] = $name;

			preg_match( '/' . $name . '[\/|\s](\d)/i', $agent, $matches );
			if ( $matches[1] )
			$class[] = $name . '-' . $matches[1];

			return $class;
			}
		}

		return $class;
}
add_filter( 'body_class', 'browser_class' );

//Browser detection and OS detection with body_class
function browser_os_class($classes) {

      global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
      if($is_lynx) $classes[] = 'lynx';
      elseif($is_gecko) $classes[] = 'gecko';
      elseif($is_opera) $classes[] = 'opera';
      elseif($is_NS4) $classes[] = 'ns4';
      elseif($is_safari) $classes[] = 'safari';
      elseif($is_chrome) $classes[] = 'chrome';
      elseif($is_IE) {
              $classes[] = 'ie';
              if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
              $classes[] = 'ie'.$browser_version[1];
      } else $classes[] = 'unknown';
      if($is_iphone) $classes[] = 'iphone';
      if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
               $classes[] = 'osx';
         } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
               $classes[] = 'linux';
         } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
               $classes[] = 'windows';
         }
      return $classes;


}
add_filter('body_class','browser_os_class');


//function defer_parsing_of_js ( $url ) {
//    if ( FALSE === strpos( $url, '.js' ) ) return $url;
//    if ( strpos( $url, 'jquery.js' ) ) return $url;
//    return "$url' async onload='myinit()";
//}
//add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );

require_once( get_template_directory() . '/library/inc/wp-less/wp-less.php' );

if ( ! is_admin() )
    wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/library/less/styles.less' );


    add_filter( 'wp_less_cache_path', 'custom_less_cache_path' );
    add_filter( 'wp_less_cache_url', 'custom_less_cache_url' );

    function custom_less_cache_path( $path )
    {
        return get_stylesheet_directory().'/library/css';
    }

    function custom_less_cache_url( $url )
    {
        return get_stylesheet_directory_uri().'/library/css';
    }



?>
