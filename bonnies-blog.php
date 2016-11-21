<?php get_header();

/* Template Name: BB w/ Sidebar */

if (have_posts()) :
	while (have_posts()) : the_post(); ?>
<?php endwhile; endif; ?>
<a id="top"></a>
<div class="page-container  background-white">
	<?php the_post_thumbnail(); ?>
	<div class="sidebar-container  global-cafe ">
		<?php dynamic_sidebar( 'cafe_widget' ); ?>
	</div>
	<div class="content-container global-cafe ">
		<?php the_content(); ?>

	</div>
	<?php dynamic_sidebar( 'sotm_widget' ); ?>
</div>

<?php get_footer(); ?>
