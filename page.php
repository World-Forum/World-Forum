<?php get_header(); 



if (have_posts()) :
	while (have_posts()) : the_post(); ?>
<?php endwhile; endif; ?>



  <div id="full-page-content">
    <?php if (get_post_type() == 'forum') { ?>
	  <?php if (get_the_title() == 'Conversations') { ?>
        <h1>Conversations</h1>
        <hr />
        <p>Conversations through Connection Center Forums engage and inspire a worldwide discussion on early care and education issues that individuals are most passionate about.</p>
        <p>To join the conversation, simply select a forum and a topic of interest. Then add your voice by replying to the thread, or create a new topic of discussion within the forum by filling out the form at the bottom of the page.</p>
        <p>If you have a suggestion of a NEW forum question, please email us at <a href="mailto:info@worldforumfoundation.org">info@worldforumfoundation.org</a>.</p>
        <p>Get started today, and join the conversation!</p>
      <?php } else { ?>
      <h1>
        <?php the_title(); ?>
      </h1>
      <?php } ?>
    <?php } else { ?>
    <h1>
      <?php the_title(); ?>
    </h1>
    <?php } ?>
    <hr />
    <?php the_content(); ?>
  </div>
<?php dynamic_sidebar( 'sotm_widget' ); ?>

<?php get_footer(); ?>
