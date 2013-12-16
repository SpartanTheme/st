<?php
/*
This file handles the admin area and functions.

Developed by: Renzo Johnson
URL: http://spartantheme.com/

Thanks for code & inspiration to:
URL: http://themble.com/bones/

*/

/************* DASHBOARD WIDGETS *****************/

// disable default dashboard widgets
function disable_default_dashboard_widgets() {
	// remove_meta_box('dashboard_right_now', 'dashboard', 'core');    // Right Now Widget
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); // Comments Widget
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  // Incoming Links Widget
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');         // Plugins Widget
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');   // Recent Drafts Widget
	remove_meta_box('dashboard_primary', 'dashboard', 'core');         //
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');       //
	remove_meta_box('yoast_db_widget', 'dashboard', 'normal');         // Yoast's SEO Widget
}
// removing the dashboard widgets
add_action('admin_menu', 'disable_default_dashboard_widgets');


/************* CUSTOM LOGIN PAGE *****************/

// calling your own login css so you can style it

//Updated to proper 'enqueue' method
//http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function spartan_login_css() {
	wp_enqueue_style( 'spartan_login_css', get_template_directory_uri() . '/assets/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function spartan_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function spartan_login_title() { return get_option('blogname'); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'spartan_login_css', 10 );
add_filter('login_headerurl', 'spartan_login_url');
add_filter('login_headertitle', 'spartan_login_title');


/************* CUSTOMIZE ADMIN *******************/
// custom admin footer
function spartan_custom_admin_footer() {
	_e('Built using <a href="http://spartantheme.com/" target="_blank">Spartan WP</a>. Customized by <a href="http://renzojohnson.com/" target="_blank">Renzo Johnson</a>', 'spartantheme');
}
add_filter('admin_footer_text', 'spartan_custom_admin_footer');

// auto-insert content to post editor
function spartan_content($content) {
	$content = "<h5>Thank you for developing with Spartan Theme.</h5><p>Read more about <a href=\"http://spartantheme.com\" target=\"_blank\">Spartan Theme</a> <a href=\"http://spartantheme.com\" target=\"_blank\">here</a></p>";
	return $content;
}
add_filter('default_content', 'spartan_content');

//Hide  display of unnecessary information on failed login attempts
function wrong_login() {
return 'Wrong username or password.';
}
add_filter('login_errors', 'wrong_login');

# Enables updates plugins
add_filter( 'auto_update_plugin', '__return_true' );

# Enables updates themes
add_filter( 'auto_update_theme', '__return_true' );

?>
