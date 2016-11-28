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
		<div class="img-no-border">
			<div class="ior-featured-img">
				<?php the_post_thumbnail(); ?>
			</div>
			<?php the_content(); ?>
			<?php
			$back ='/images-of-rights/images-of-rights-submission-gallery';

			if( ( isset( $back ) && $back !='' ) ) echo '<strong><a href="'.$back.'">Back to Image of Rights: Gallery</a></strong>';
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
