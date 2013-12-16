<?php
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