<?php get_header();
/*
Template Name: Homepage */
if (have_posts()) :
	while (have_posts()) : the_post();
endwhile; endif;?>


<div class="page-container background-white " >
	<div class="homepage-content">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="homepage-featured-img">
			<?php	the_post_thumbnail(); ?>
			</div>
		<?php endif;?>
		<?php  the_content(); ?>
	</div>
	<?php get_footer(); ?>
