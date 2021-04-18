</div>
<footer id="footer">
  <div class="background"></div>
  <div id="copyright">
  &copy; <?php echo esc_html( date_i18n( __( 'Y', 'assomast' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
  </div>
  <?php wp_nav_menu(array('theme_location' => 'footer-menu')); ?>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>