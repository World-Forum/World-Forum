<?php get_header();
?>

<div class="page-container">
	<div class="full-page-content">
		<h1><?php the_tags(); ?>
			<?php if (have_posts()) :
				while (have_posts()) : the_post(); ?>
				<hr />
				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				<p> <?php the_excerpt(); ?></p>
				<p><i><a href="<?php the_permalink(); ?>">Read more</a></i></p>
			<?php endwhile; endif; ?>
		</div>

	</div>
	<?php get_footer(); ?>
