</div>
<footer id="footer">
  <div class="round-background"></div>
  <div class="footer__wrapper">
    <a class="footer__logo" href="/"><?php print_asset('/assets/logo.svg'); ?></a>
    <div class="footer__content">
      <div class="footer__menu">
        <?php wp_nav_menu(array('theme_location' => 'footer-menu')); ?>
      </div>
      <div class="footer__copyright">
        &copy; <?php echo esc_html( date_i18n( __( 'Y', 'assomast' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
      </div>
    </div>
  </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>