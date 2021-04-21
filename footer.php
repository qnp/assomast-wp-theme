</div>
<footer id="footer">
  <div class="round-background"></div>
  <div class="content">
    <?php wp_nav_menu(array('theme_location' => 'footer-menu')); ?>
    <div id="copyright">
    &copy; <?php echo esc_html( date_i18n( __( 'Y', 'assomast' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
    </div>
  </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>