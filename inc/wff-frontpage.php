<?php

/**
*  == World Forum Foundation Frontpage Custom Editor ==
* This file allows for the addtion of metaboxes for the theme frontpage. To be * used inconjunction with 'front-page.php'.
*/

function wff_add_frontpage_meta() {
  global $post;

  if(!empty($post))
  {
    $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

    if($pageTemplate == 'front-page.php' )
    {
      add_meta_box(
      'frontpage_buckets_meta', // $id
      'Front-Page Buckets', // $title
      'wff_add_frontpage_buckets_callback', // $callback
      'page', // $page
      'normal', // $context
      'high'); // $priority

      add_meta_box(
      'frontpage_colored_row_meta', // $id
      'Front-Page Colored Row', // $title
      'wff_add_frontpage_colored_row_callback', // $callback
      'page', // $page
      'normal', // $context
      'high'); // $priority

      add_meta_box(
      'frontpage_lower_meta', // $id
      'Front-Page Lower Section', // $title
      'wff_add_frontpage_lower_section_callback', // $callback
      'page', // $page
      'normal', // $context
      'high'); // $priority

    }
  }
}
add_action('add_meta_boxes', 'wff_add_frontpage_meta');


function wff_add_frontpage_buckets_callback( $post ) {
  wp_nonce_field( basename( __FILE__ ), 'wff_frontpage_nonce' );
  $wff_frontpage_meta = get_post_meta( $post->ID );
  ?>

  <div>
    <!-- Left Bucket -->
    <div class="wff-meta-row">
      <div class="wff-meta-th">
        <label for="left-bucket" class="wff-row-title">Left Bucket</label>
      </div>
      <?php
      $content = get_post_meta( $post->ID, 'left_bucket', true);
      $editor = 'left_bucket';
      $settings = array(
        'textarea_rows' => 5,
      );
      wp_editor ($content, $editor, $settings);
      ?>
    </div>
    <!-- Middle Bucket -->
    <div class="wff-meta-row">
      <div class="wff-meta-th">
        <label for="middle-bucket" class="wff-row-title">Middle Bucket</label>
      </div>
      <?php
      $content = get_post_meta( $post->ID, 'middle_bucket', true);
      $editor = 'middle_bucket';
      $settings = array(
        'textarea_rows' => 5,
      );
      wp_editor ($content, $editor, $settings);
      ?>
    </div>
    <!-- Right Bucket -->
    <div class="wff-meta-row">
      <div class="wff-meta-th">
        <label for="right-bucket" class="wff-row-title">Right Bucket</label>
      </div>
      <?php
      $content = get_post_meta( $post->ID, 'right_bucket', true);
      $editor = 'right_bucket';
      $settings = array(
        'textarea_rows' => 5,
      );
      wp_editor ($content, $editor, $settings);
      ?>
    </div>

  </div>
  <?php
}

function wff_add_frontpage_colored_row_callback( $post ) {
  wp_nonce_field( basename( __FILE__ ), 'wff_frontpage_nonce' );
  $wff_frontpage_meta = get_post_meta( $post->ID );
  ?>

  <div>
    <!-- Left Bucket -->
    <div class="wff-meta-row">
      <div class="wff-meta-th">
        <label for="colored-row" class="wff-row-title">Colored Row</label>
      </div>
      <?php
      $content = get_post_meta( $post->ID, 'colored_row', true);
      $editor = 'colored_row';
      $settings = array(
        'textarea_rows' => 8,
      );
      wp_editor ($content, $editor, $settings);
      ?>
    </div>
    </div>
  <?php
}

function wff_add_frontpage_lower_section_callback() {
  wp_nonce_field( basename( __FILE__ ), 'wff_frontpage_nonce' );
  $wff_frontpage_meta = get_post_meta( $post->ID );
  ?>

  <div>
    <!-- Left Bucket -->
    <div class="wff-meta-row">
      <div class="wff-meta-th">
        <label for="lower-section" class="wff-row-title">Colored Row</label>
      </div>
      <?php
      $content = get_post_meta( $post->ID, 'lower_section', true);
      $editor = 'lower_section';
      $settings = array(
        'textarea_rows' => 8,
      );
      wp_editor ($content, $editor, $settings);
      ?>
    </div>
    </div>
  <?php
}


/**
*  == Save Meta ==
*/

function wff_frontpage_meta_save( $post_id ) {
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = ( isset( $_POST[ 'wff_frontpage_nonce' ] ) && wp_verify_nonce( $_POST[ 'wff_frontpage_nonce'], basename( __FILE__ ) ) ) ? 'true' : 'false';


  // Exits script depending on save status
  if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
    return;
  }
  if ( isset( $_POST[ 'left_bucket' ] ) ) {
  update_post_meta( $post_id, 'left_bucket', sanitize_text_field( $_POST[ 'left_bucket'] ) );
  }
  if ( isset( $_POST[ 'middle_bucket' ] ) ) {
  update_post_meta( $post_id, 'middle_bucket', sanitize_text_field( $_POST[ 'middle_bucket'] ) );
  }
  if ( isset( $_POST[ 'right_bucket' ] ) ) {
  update_post_meta( $post_id, 'right_bucket', sanitize_text_field( $_POST[ 'right_bucket'] ) );
  }

}
add_action( 'save_post', 'wff_frontpage_meta_save'  );
