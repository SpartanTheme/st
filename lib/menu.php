<?php
/*********************
MENUS & NAVIGATION
*********************/

// the main menu
function spartan_top_nav() {
  // display the wp3 menu if available
    wp_nav_menu(array(
      'container' => '',                            // remove nav container
      'container_class' => '',                      // class of container (should you choose to use it)
      'menu' => __( 'Top Nav', 'spartantheme' ),    // nav name
      'menu_class' => 'nav top-nav right',          // adding custom nav class
      'theme_location' => 'main-nav',               // where it's located in the theme
      'before' => '',                               // before the menu
      'after' => '',                                // after the menu
      'link_before' => '',                          // before each link
      'link_after' => '',                           // after each link
      'depth' => 0,                                 // limit the depth of the nav
      'fallback_cb' => 'spartan_nav_fallback'   // fallback function
  ));
} /* end spartan main nav */

// the footer menu (should you choose to use one)
function spartan_footer_nav() {
  // display the wp3 menu if available
    wp_nav_menu(array(
      'container' => '',                                // remove nav container
      'container_class' => '',                          // class of container (should you choose to use it)
      'menu' => __( 'Footer Nav', 'spartantheme' ),     // nav name
      'menu_class' => 'nav',                            // adding custom nav class
      'theme_location' => 'footer-nav',                 // where it's located in the theme
      'before' => '',                                   // before the menu
      'after' => '',                                    // after the menu
      'link_before' => '',                              // before each link
      'link_after' => '',                               // after each link
      'depth' => 0,                                     // limit the depth of the nav
      'fallback_cb' => 'spartan_nav_fallback'    // fallback function
  ));
} /* end spartan footer link */

// the footer menu (should you choose to use one)
function spartan_footer2_nav() {
  // display the wp3 menu if available
    wp_nav_menu(array(
      'container' => '',                                // remove nav container
      'container_class' => '',                          // class of container (should you choose to use it)
      'menu' => __( 'Footer2 Nav', 'spartantheme' ),     // nav name
      'menu_class' => 'nav',                            // adding custom nav class
      'theme_location' => 'footer2-nav',                 // where it's located in the theme
      'before' => '',                                   // before the menu
      'after' => '',                                    // after the menu
      'link_before' => '',                              // before each link
      'link_after' => '',                               // after each link
      'depth' => 0,                                     // limit the depth of the nav
      'fallback_cb' => 'spartan_nav_fallback'    // fallback function
  ));
} /* end spartan footer link */

// the mobile menu (should you choose to use one)
function spartan_mobile_nav() {
  // display the wp3 menu if available
    wp_nav_menu(array(
      'container' => '',                                  // remove nav container
      'container_class' => 'menu',               // class of container (should you choose to use it)
      'menu' => __( 'Mobile Nav', 'spartantheme' ),  // nav name
      'menu_class' => 'nav mob',                          // adding custom nav class
      'theme_location' => 'mobile-nav',                   // where it's located in the theme
      'before' => '',                                     // before the menu
      'after' => '',                                      // after the menu
      'link_before' => '',                                // before each link
      'link_after' => '',                                 // after each link
      'depth' => 0,                                       // limit the depth of the nav
      'fallback_cb' => 'spartan_nav_fallback'      // fallback function
  ));
} /* end spartan mobile nav */

// the mobile menu (should you choose to use one)
function spartan_day_nav() {
  // display the wp3 menu if available
    wp_nav_menu(array(
      'container' => '',                                  // remove nav container
      'container_class' => 'menu',               // class of container (should you choose to use it)
      'menu' => __( 'Day Nav', 'spartantheme' ),  // nav name
      'menu_class' => 'nav mob',                          // adding custom nav class
      'theme_location' => 'day-nav',                   // where it's located in the theme
      'before' => '',                                     // before the menu
      'after' => '',                                      // after the menu
      'link_before' => '',                                // before each link
      'link_after' => '',                                 // after each link
      'depth' => 0,                                       // limit the depth of the nav
      'fallback_cb' => 'spartan_nav_fallback'      // fallback function
  ));
} /* end spartan mobile nav */

// the mobile menu (should you choose to use one)
function spartan_night_nav() {
  // display the wp3 menu if available
    wp_nav_menu(array(
      'container' => '',                                  // remove nav container
      'container_class' => 'menu',               // class of container (should you choose to use it)
      'menu' => __( 'Night Nav', 'spartantheme' ),  // nav name
      'menu_class' => 'nav mob',                          // adding custom nav class
      'theme_location' => 'night-nav',                   // where it's located in the theme
      'before' => '',                                     // before the menu
      'after' => '',                                      // after the menu
      'link_before' => '',                                // before each link
      'link_after' => '',                                 // after each link
      'depth' => 0,                                       // limit the depth of the nav
      'fallback_cb' => 'spartan_nav_fallback'      // fallback function
  ));
} /* end spartan mobile nav */

// this is the fallback for header menu
function spartan_nav_fallback() {
  wp_page_menu( array(
    'show_home' => true,
    'menu_class' => 'nav top-nav fallback',      // adding custom nav class
    'include'     => '',
    'exclude'     => '',
    'echo'        => true,
    'link_before' => '',                            // before each link
    'link_after' => ''                             // after each link
  ) );
}

