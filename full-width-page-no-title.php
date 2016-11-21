<?php get_header(); 

/* Template Name: Full Width Page no Title */

if (have_posts()) :
	while (have_posts()) : the_post(); ?>
<?php endwhile; endif; ?>
<div class="page-container background-white">

  <div class="full-page-content">
  <p><br /></p>

    <?php the_content(); ?>
      
  </div>
<?php dynamic_sidebar( 'sotm_widget' ); ?>
</div>
<?php get_footer(); ?>
