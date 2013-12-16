<?php
/* Spartan Theme
Developed by: Renzo Johnson
URL: http://spartantheme.com/
*/


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

add_action( 'init', 'excerpts_to_pages' );
function excerpts_to_pages() {
   add_post_type_support( 'page', 'excerpt' );
}

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

function my_deregister_javascript() {
    wp_deregister_script( 'contact-form-7' );
}
add_action( 'wp_print_scripts', 'my_deregister_javascript', 100 );

function deregister_ct7_styles() {
	wp_deregister_style( 'contact-form-7' );
}
add_action( 'wp_print_styles', 'deregister_ct7_styles', 100 );


