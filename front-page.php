<?php
get_header();
$wff_options = get_option( 'wff_theme_options' );
?>
<main id="front-page">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php if ( get_the_excerpt())  { ?> 
      <div id="homepage-excerpt-bg" class="primary-color-bg"></div>
      <div id="homepage-excerpt" >
        <?php the_excerpt(); ?>
      </div>
      <div id="homepage-header-text" class="50-margin-top">
        <!-- Add margin if excerpt exists -->
        <?php } else { ?>  <div id="homepage-header-text"> <?php } ?>

          <?php echo $wff_options['homepage_header_text'];  ?>
        </div>
        <div id="homepage-section-bucket-container">
          <div id="homepage-left-bucket" class="homepage-section-bucket">
            <?php echo $wff_options['homepage_left_bucket'];  ?>
          </div>
          <div id="homepage-middle-bucket" class="homepage-section-bucket">
            <?php echo $wff_options['homepage_middle_bucket'];  ?>
          </div>
          <div id="homepage-right-bucket" class="homepage-section-bucket">
            <?php echo $wff_options['homepage_right_bucket'];  ?>
          </div>
        </div>
        <?php the_content();
      endwhile; endif; ?>
    </main>
    <?php get_footer(); ?>
