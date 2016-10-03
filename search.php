<?php get_header(); ?>

<main id="full-page-container">
  <?php
  global $wp_query;
  $total_results = $wp_query->found_posts;

  ?>

  <h1>Search Results</h1>
  <p><strong>Total Results Found:</strong> <?php echo $total_results; ?> </p>
  <?php get_search_form(); ?>
  <hr />

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article class="blog-post">
      <h3 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

      <?php the_excerpt(); ?>
    </article>
    <hr />

  <?php endwhile; else : ?>

    <p>
      <?php _e( 'Sorry, There is nothing to display. '); ?>
    </p>
  <?php endif; ?>
  <?php the_posts_pagination(
  array(
    'screen_reader_text' => __( 'More Results ' ),
    )
  ); ?>


</main>

<?php get_footer(); ?>
