<?php get_header(); 

if (have_posts()) :
	while (have_posts()) : the_post(); 
	 endwhile; endif;?>
<div class="page-container background-white" >
<?php $blog_id = get_current_blog_id(); 
if ( $blog_id == 1 ) {
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
  <?php dynamic_sidebar( 'homepage_banner' ); ?>
</div>
<?php } ?>
<?php echo exec( 'user' ); ?>
<div class="homepage-content">
  <?php  the_content(); ?>
</div>
<?php get_footer(); ?>
