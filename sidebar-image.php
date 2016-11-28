<?php get_header();

/* Template Name: IoR w/ Sidebar */

if (have_posts()) :
	while (have_posts()) : the_post(); ?>
<?php endwhile; endif; ?>

<div class="page-container">
	<div class="sidebar-container">
		<?php dynamic_sidebar( 'ior_widget' ); ?>
	</div>
	<div class="content-container">
		<h1>
			<?php the_title(); ?>
		</h1>
		<hr />
		<?php the_content(); ?>

	</div>
	<?php dynamic_sidebar( 'sotm_widget' ); ?>
</div>

<?php get_footer(); ?>
