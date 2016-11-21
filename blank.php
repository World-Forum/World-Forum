<?php get_header(); 
/* Template Name: Empty Page */


if (have_posts()) :
	while (have_posts()) : the_post(); ?>
<?php endwhile; endif; ?>


<div class="page-container background-white">
	<div class="full-page-content">

		<?php the_content(); ?>
	</div>
</div>
<?php get_footer(); ?>
