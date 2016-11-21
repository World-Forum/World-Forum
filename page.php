<?php get_header();



if (have_posts()) :
	while (have_posts()) : the_post(); ?>
<?php endwhile; endif; ?>

<div class="page-container background-white">
  <div class="full-page-content">
    <?php if (get_post_type() == 'forum') { ?>
    <?php if (get_the_title() == 'Forums') { ?>
    <h1>Conversations</h1>
    <hr />
    <p>Conversations through Connection Center Forums inspire a worldwide discussion on topics and issues individuals are most passionate about.</p>

    <p>To join the conversation:
    <ol>
      <li>Click on a forum topic you are interested in. </li>
      <li> Write your response by scrolling to the bottom form and adding your reply.</li>
      <li>To comment on someone else's post, click on their topic and share your feedback.</li>
    </ol>
    </p>
    <p>If you have a suggestion of a NEW conversation topic, email us  at <a href="mailto:info@worldforumfoundation.org">info@worldforumfoundation.org</a>.</p>
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
    <?php dynamic_sidebar( 'sotm_widget' ); ?>
  </div>
</div>
<?php get_footer(); ?>
