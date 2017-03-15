<?php get_header();

/* Template Name: BB Interior */

if (have_posts()) :
	while (have_posts()) : the_post(); ?>
<?php endwhile; endif; ?>
<a id="top"></a>
<div class="page-container background-white">
	<div class="sidebar-container fixed-sidebar ">
		<?php dynamic_sidebar( 'cafe_widget_logo' ); ?>
		<div class="global-cafe-sidebar">
			<?php dynamic_sidebar( 'cafe_widget' ); ?>
		</div>
	</div>
	<div class="content-container global-cafe ">
		<h1>
			<?php the_title(); ?>
		</h1>
		<?php the_content(); ?>
	</div>
</div>
<?php dynamic_sidebar( 'sotm_widget' ); ?>

<?php get_footer(); ?>
