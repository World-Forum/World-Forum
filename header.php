<!DOCTYPE html><!-- WFF HEADER -->
<html  <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php bloginfo('name'); ?>
  </title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div id="top_bar">
    <?php dynamic_sidebar('top_bar'); ?>
  </div>
  <header>
    <?php wp_nav_menu( array(
      'menu' => 'Primary Nav',
      'container' => 'nav',
      'container_id' => 'primary-nav-container',
      'menu_class' => 'primary-nav-menu no-padding-start',
      'theme_location' => 'primary-nav',
      'depth' => 2) ); ?>
    </header>
    <section>
