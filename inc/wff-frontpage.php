<?php

/**
*  == World Forum Foundation Frontpage Custom Editor ==
* This file allows for the addtion of metaboxes for the theme frontpage. To be * used inconjunction with 'front-page.php'.
*/

global $post;
$frontpage_id = get_option('page_on_front');
// Only run this code iff this is the front page
if ( $post->ID == $frontpage_id ) {

  /**
  *  == Create Meta Boxes ==
  */
  function wff_frontpage_meta() {
    add_meta_box(
    $frontpage_id,
    'Home 3:',
    'only_home_form',
    'page',
    'normal',
    'high');
}
add_action( 'add_meta_boxes', 'wff_frontpage_meta' );

}
