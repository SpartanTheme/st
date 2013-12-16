<?php
function ngq_options() {   
  register_setting( 'ngq_options', 'remove_style');
  register_setting( 'ngq_options', 'remove_scripts');
}
add_action('admin_init', 'ngq_options');
function ngq_hide_ngg_version() {
  return false;
}
function ngq_remove_styles() {
  if ( !is_admin() ) {
    wp_deregister_style( 'NextGEN' );
    wp_deregister_style( 'thickbox');
    wp_deregister_style( 'shutter');
  }
}
$current_style = get_option('ngq_remove_style');
$current_script = get_option('ngq_remove_scripts');
if ( $current_style == 'on' ) {
  add_action('wp_print_styles', 'ngq_remove_styles', 100);
  ngq_remove_styles();
}
if ($current_script == 'on'){
  define('NGG_SKIP_LOAD_SCRIPTS', true);
  add_filter('show_nextgen_version', 'ngq_hide_ngg_version');
}
add_action('admin_menu', 'ngq_plugin_menu');
?>
