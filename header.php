<!DOCTYPE html>
<html <?php language_attributes(); ?>>

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
          <div class="menu-content">
            <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
            <div class="spacer"></div>
          </div>
        </div>
        <a id="logo" href="/"><?php print_asset('/assets/logo.svg'); ?></a>
        <div class="spacer"></div>
        <div class="ctas">
          <button class="button--tertiary elevation--tertiary--5">
            <?php print_asset('/assets/icons/hand-heart.svg'); ?>
            Faire un don
          </button>
          <button class="button--secondary--alt elevation--secondary--alt--5">
            <?php print_asset('/assets/icons/badge-account-horizontal.svg'); ?>
            Adhérer
          </button>
        </div>
      </nav>
    </header>
    <div id="container">