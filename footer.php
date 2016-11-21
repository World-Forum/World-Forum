<?php $blog_id = get_current_blog_id() ?>

<?php if ( $blog_id != 1 ) { ?>

<footer class="site-footer wfcc-footer">
<?php } else { ?>
<footer class="site-footer wff-footer">
  <?php } ?>

  <?php wp_nav_menu( array( 
  'menu' => 'Footer Nav',
  'container_id' => 'footer-nav-container',
  'menu_class' => 'footer-nav-menu',
  'theme_location' => 'footer-nav',
  'items_wrap' => '<ul class="footer-nav-item-list">%3$s</ul>',
  'depth' => 2) ); ?>
  <div class="translate">Translate this Site<br />
    <?php echo do_shortcode('[google-translator]'); ?></div>
</footer>

<?php wp_footer(); ?>
</div>
<div class="copyright">
  <p> &copy;<?php echo date('Y'); ?> World Forum Foundation.  All rights reserved. The World Forum Foundation is a nonprofit, 501(c)3 organization. </p>
</div>
</body>
</html>
