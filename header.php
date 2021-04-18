<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width" />
  <?php wp_head(); ?>
  <?php wp_enqueue_script('main', get_template_directory_uri() . '/scripts/main.js'); ?>
</head>

<body <?php body_class(); ?>>
  <div id="wrapper" class="hfeed">
    <header id="header">
      <nav id="menu">
        <div id="burger">
          <input type="checkbox"/>
          <div class="burger-background"></div>
          <span></span>
          <span></span>
          <span></span>
          <!-- <div id="search"><?php get_search_form(); ?></div> -->
          <div class="menu-content">
            <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
          </div>
        </div>
      </nav>
    </header>
    <div id="container">