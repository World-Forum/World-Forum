</section>

<?php
// Only display if NOT homepage
(is_front_page()) ?: dynamic_sidebar("sotm_widget") ;
?>
<footer>


  <div class="translate">Translate this Site<br />
    <?php echo do_shortcode('[google-translator]'); ?>
  </div>
</footer>
  <div id="copyright">
   &copy;<?php echo date('Y'); ?> World Forum Foundation.  All rights reserved.
      <br /> The World Forum Foundation is a nonprofit, 501(c)3 organization.
  </div>
<?php wp_footer(); ?>
</body>
</html>
