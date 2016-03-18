<?php get_header();
/* Template Name: Sidebar - No Hero */ ?>

<div class="display-inline-block">
  <div class="sidebar-container">
    <div class="sidebar-fixed">
      <?php $children = get_pages('child_of='.get_post_top_ancestor_id()); ?>
      <?php if( count( $children ) != 0 ) { ?>
        <ul class="sidebar-nav">
          <span class="sidebar-nav-title" >
            <?php wp_list_pages( array('title_li'=>'','include'=>get_post_top_ancestor_id()) ); ?>
          </span>
          <?php wp_list_pages( array('title_li'=>'','depth'=>1,'child_of'=>get_post_top_ancestor_id()) ); ?>
        </ul>
        <?php } ?>
      </div>
    </div>
    <div class="content-container">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h1>
          <?php the_title(); ?>
        </h1>
        <p>
          <?php the_content(); ?>
        </p>
      <?php endwhile; else : ?>
        <p>
          <?php _e( 'Sorry, There is nothing to display. '); ?>
        </p>
      <?php endif; ?>
    </div>
  </div>
  <?php get_footer(); ?>
