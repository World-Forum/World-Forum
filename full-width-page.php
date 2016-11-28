<?php get_header();

/* Template Name: Full Width Page */

if (have_posts()) :
	while (have_posts()) : the_post(); ?>
<?php endwhile; endif; ?>
<div class="page-container background-white">

	<div class="full-page-content">
		<?php if (!is_front_page()) { ?>
			<h1>
				<?php the_title(); ?>
			</h1>
			<hr /> <?php } ?>
			<?php the_content(); ?>

		</div>
		<?php dynamic_sidebar( 'sotm_widget' ); ?>
	</div>
	<?php get_footer(); ?>
