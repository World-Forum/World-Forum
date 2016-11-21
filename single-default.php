<?php get_header();



if (have_posts()) :
	while (have_posts()) : the_post(); ?>
<?php endwhile; endif; ?>
<div class="page-container background-white">
	<div class="full-page-content">

		<h1>
			<?php the_title(); ?>
		</h1>

		<hr />

		<?php the_content(); ?>
	</div>

</div>
<?php get_footer(); ?>
