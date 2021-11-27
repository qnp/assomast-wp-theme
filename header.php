<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php
  define('ADHESION_URL', 'https://www.helloasso.com/associations/assomast/adhesions/formulaire-adhesion-assomast-2021');
  define('DONNATION_URL', 'https://www.helloasso.com/associations/assomast/formulaires/4');
?>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width" />
  <?php wp_head(); ?>
  <?php wp_enqueue_script('main', get_template_directory_uri() . '/scripts/main.js'); ?>
</head>

<body <?php body_class(); ?>>
  <div id="mouse">
    <div class="mouse-dot"></div>
    <div class="mouse-dot"></div>
  </div>
  <div id="wrapper" class="hfeed">
    <header id="header">
      <nav id="menu">
        <div id="burger">
          <input type="checkbox" />
          <div class="burger-background"></div>
          <span></span>
          <span></span>
          <span></span>
          <!-- <div id="search"><?php get_search_form(); ?></div> -->
          <div class="menu-wrapper">
            <a class="logo" href="/"><?php print_asset('/assets/logo.svg'); ?></a>
            <div class="menu-content">
              <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
              <div class="spacer"></div>
            </div>
          </div>
        </div>
        <!-- <a class="logo" href="/"><?php print_asset('/assets/logo.svg'); ?></a> -->
        <div class="spacer"></div>
        <div class="ctas">
          <a class="a-button" href="<?php echo DONNATION_URL; ?>">
            <button class="button--tertiary elevation--tertiary--5">
              <?php print_asset('/assets/icons/hand-heart.svg'); ?>
              Faire un don
            </button>
          </a>
          <a class="a-button" href="<?php echo ADHESION_URL; ?>">
            <button class="button--secondary--alt elevation--secondary--alt--5">
              <?php print_asset('/assets/icons/badge-account-horizontal.svg'); ?>
              Adhérer
            </button>
          </a>
        </div>
      </nav>
      <?php if (is_front_page()) { ?>
      <div class="hero" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/images/hero.jpg'; ?>)">
        <div class="hero__shade"></div>
        <div class="hero__content">
          <div class="hero__logo">
            <?php print_asset('/assets/logo.svg'); ?>
          </div>
          <p><?php echo get_bloginfo( 'description', 'display' ) ?></p>
          <div class="hero__ctas">
            <a class="a-button" href="<?php echo DONNATION_URL; ?>">
              <button class="button--large button--tertiary elevation--tertiary--5">
                <?php print_asset('/assets/icons/hand-heart.svg'); ?>
                Faire un don
              </button>
            </a>
            <a class="a-button" href="<?php echo ADHESION_URL; ?>">
              <button class="button--large button--secondary--alt elevation--secondary--alt--5">
                <?php print_asset('/assets/icons/badge-account-horizontal.svg'); ?>
                Adhérer
              </button>
            </a>
          </div>
          <div class="scroll-discover">
            <div class="scroll-discover__text">Découvrir</div>
            <div class="scroll-discover__arrow">
              <?php print_asset('/assets/icons/arrow-expand-down.svg'); ?>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      <div class="round-background white"></div>
    </header>
    <div id="container">