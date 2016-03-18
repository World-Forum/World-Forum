<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>

<div class="page-container">
  <div class="column span-9 first" id="maincontent">
    <div class="full-page-content">

      <?php if (have_posts()) : ?>
      <h2 class="pagetitle">Search Results for "<?php echo $s ?>"</h2>
      <div class="navigation">
        <div class="alignleft">
          <?php next_posts_link('&laquo; Previous') ?>
        </div>
        <div class="alignright">
          <?php previous_posts_link('Next &raquo;') ?>
        </div>
      </div>
      <br /><br />
      <?php while (have_posts()) : the_post(); ?>
      <div class="post" id="post-<?php the_ID(); ?>">
        <p class="large nomargin"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
         <h3> <?php the_title(); ?> </h3>
          </a></p>
        <?php
				// Support for "Search Excerpt" plugin
				// http://fucoder.com/code/search-excerpt/
				if ( function_exists('the_excerpt') && is_search() ) {
					the_excerpt();
				} ?>
        <p><small>
          <i><?php the_time('F jS, Y') ?></i>
          &nbsp;|&nbsp; 
          <!-- by <?php the_author() ?> --> 
          Published in
          <?php the_category(', ');  ?>
        </small> </p>
      </div>
      <hr>
      <?php endwhile; ?>
      <div class="navigation">
        <div class="alignleft">
          <?php next_posts_link('&laquo; Previous') ?>
        </div>
        <div class="alignright">
          <?php previous_posts_link('Next &raquo;') ?>
        </div>
      </div>
      <?php else : ?>
      <h2 class="center">No posts found. Try a different search?</h2>
      <?php include (TEMPLATEPATH . '/searchform.php'); ?>
      <?php endif; ?>
    </div>
    <!-- /content --> 
  </div>
  <!-- /maincontent-->
  <?php dynamic_sidebar( 'sotm_widget' ); ?>
  </div>
<!-- /page -->

<?php get_footer(); ?>
