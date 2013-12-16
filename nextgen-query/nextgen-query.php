<?php
/*
Plugin Name: NextGEN Query
Description: Adds a custom function for use with NextGEN Gallery and allows removal of NextGEN Style and Scripts.
Author: TechStudio
Author URI: http://techstudio.co/wordpress/plugins/nextgen-query
Version: 9.2.0
License: GPL2
*/

// Deactivate unless ngg is running
function ngq_deactivate() {
  if ( !class_exists('nggLoader') ) {
    deactivate_plugins(__FILE__);
  }
}
add_action('admin_init','ngq_deactivate');

require_once 'functions/cleanup.php';
require_once 'functions/functions.php';

// Menu and options page
function ngq_plugin_menu() {
	add_submenu_page('nextgen-gallery','NextGEN Query', 'Query', apply_filters('ngqOptionsPageCapability','manage_options'), __FILE__, ngq_menu);
}
function ngq_menu(){
  include 'functions/options-page.php';
}

?>
