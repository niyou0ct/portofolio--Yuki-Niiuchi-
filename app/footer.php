  <?php wp_footer(); ?>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/min/app.min.js"></script>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/min/nav.min.js"></script>
  <?php if(is_front_page()): ?>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/min/main.min.js"></script>
  <?php elseif(is_page('about')): ?>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/min/about.min.js"></script>
  <?php elseif(is_page('form')): ?>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/min/form.min.js"></script>
  <?php elseif(is_page('offer')): ?>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/min/offer.min.js"></script>
  <?php elseif(is_archive('blog')): ?>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/min/blog.min.js"></script>
  <?php elseif(is_archive('works')): ?>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/min/works.min.js"></script>
  <?php elseif(is_single('blog')): ?>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/min/blog-detail.min.js"></script>
  <?php elseif(is_single('works')): ?>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/min/works-detail.min.js"></script>
  <?php else: ?>
  <?php endif; ?>

</body>
</html>
<!-- </html> -->
