<?php
function ngq_query($gallery_id){
  global $nggdb;
  $images = $nggdb->get_gallery($gallery_id, 'pid', 'ASC', true, 0, 0);
  usort($images, 'compareOrder');
  return $images;
}
function ngq_query_singlepic($image_id){
  global $nggdb;
  $images = $nggdb->find_image($image_id);
  return $images;
}
function compareOrder($a, $b) {
  return $a->sortorder - $b->sortorder;
}
?>
