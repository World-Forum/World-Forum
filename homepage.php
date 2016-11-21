<?php get_header(); 
/*
Template Name: Homepage */
if (have_posts()) :
	while (have_posts()) : the_post(); 
	 endwhile; endif;?>


<div class="page-container" >
<?php if (home_url() == 'http://worldforumfoundation.org') { 
 wp_nav_menu( array( 
  'menu' => 'Primary Nav',
  'container_id' => 'primary-nav-container',
  'menu_class' => 'primary-nav-menu',
  'theme_location' => 'primary-nav',
  'items_wrap' => '<ul class="primary-nav-item-list homepage-nav wff-color">%3$s</ul>',
  'depth' => 2) ); 
?>
<div class="homepage-banner"> 
  <!-- Img width: 210px; height: 200px; -->
  <?php dynamic_sidebar( 'homepage_logo' ); ?>
  <?php dynamic_sidebar( 'homepage_photo_1' ); ?>
  <?php dynamic_sidebar( 'homepage_photo_2' ); ?>
  <?php dynamic_sidebar( 'homepage_photo_3' ); ?>
  <?php dynamic_sidebar( 'homepage_photo_4' ); ?>
</div>
<?php } ?>
<?php echo exec( 'user' ); ?>
<div class="homepage-content">
  <?php  the_content(); ?>
</div>
<?php get_footer(); ?>
