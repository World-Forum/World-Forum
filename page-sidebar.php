<?php
/* Template Name: w/ Sidebar */
get_header(); ?>
<?php get_sidebar(); ?>
<main>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1><?php  the_title(); ?></h1>
    <hr />
    <?php  the_content();
  endwhile; endif; ?>
</main>
<?php get_footer(); ?>
