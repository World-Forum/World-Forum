<?php get_header();

/* Template Name: w/ Sidebar */

if (have_posts()) :
	while (have_posts()) : the_post(); ?>
<?php endwhile; endif; ?>

<div class="page-container background-white ">
	<div class="sidebar-container">
		<?php $children = '';
		$children = get_pages('child_of='.get_post_top_ancestor_id()); ?>
		<?php if( count( $children ) != 0 ) { ?>
			<ul class="sidebar-nav">
				<li class="sidebar-nav-title" ><strong>
					<?php wp_list_pages( array('title_li'=>'','include'=>get_post_top_ancestor_id()) ); ?>
				</strong></li>
				<?php wp_list_pages( array('title_li'=>'','depth'=>1,'child_of'=>get_post_top_ancestor_id()) ); ?>
			</ul>
			<?php } ?>
		</div>
		<div class="content-container">
			<h1>
				<?php the_title(); ?>
			</h1>
			<hr />
			<?php the_content(); ?>

		</div>

	</div>
<?php dynamic_sidebar( 'sotm_widget' ); ?>
	<?php get_footer(); ?>
