<?php get_header();

if (have_posts()) :
	while (have_posts()) : the_post(); ?>
	<div id="homepage-hero-banner">

		<?php dynamic_sidebar('homepage-banner'); ?>
	</div>

	<div id="front-page-content">
		<?php  the_content(); ?>
	</div>
<?php endwhile;
else: echo '<p>No content found</p>';
endif;
get_footer(); ?>
