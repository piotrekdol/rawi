<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
  <link href="<?php bloginfo( 'template_directory' );?>/css/splide.min.css" rel="stylesheet">
  <link href="<?php bloginfo( 'stylesheet_url' );?>?v=pp0112cx" rel="default stylesheet" media="screen, print">
	
  <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory');?>/inc/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory');?>/inc/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory');?>/inc/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php bloginfo('template_directory');?>/inc/favicon/site.webmanifest">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600&family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	
  <title><?php the_title(); ?> | <?php bloginfo('description'); ?></title>
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  
  <section class="upheader">
    <a type="button" class="logoanimed" href="/"></a>
    <a href="/" class="animedlogotext fontblack">Animed</a>
    <div class="headercontacts">
      <div class="headercontactsbox"><div class="headericon teltop"></div><?php dynamic_sidebar( 'telefon' ); ?></div>
      <div class="headercontactsbox"><div class="headericon timetop"></div><?php dynamic_sidebar( 'godzinyotwarcia' ); ?></div>
      <div class="headercontactsbox"><div class="headericon placetop"></div><?php dynamic_sidebar( 'adres' ); ?></div>
    </div>
  </section>

  <header id="mainheader" role="banner">

    <div class="navitems">  
      <nav role="navigation" id="menu">
        <?php
        wp_nav_menu( array(
              'theme_location' => 'main-menu',
              'menu_class'     => 'main-menu',
              'items_wrap' => '<ul class="%2$s">%3$s</ul>'
        ) );
        ?>
      </nav>

      <div class="finder">
        <input id="search__toggle" type="checkbox" />
        <label class="search__btn" for="search__toggle">
          <span></span>
        </label>
        <ul class="search__box">
          <?php if ( function_exists( 'wpes_search_form' ) ) {
            wpes_search_form( array( 
              'wpessid' => 49,
              'submit_button_label' => 'Szukaj',
              'aria_label' => 'Szukaj',
              'input_box_placeholder' => 'Szukaj...',
              'search_button_css_class' => 'szukaj-button',
              'search_input_css_class' => 'szukaj-input',
            ) );
          }
          ?>  
        </ul>
      </div>

      <div class="logomobilebox">
        <a type="button" class="logoanimedmobile" href="/"></a>
        <a href="/" class="animedlogotextmobile fontblack">Animed</a>
      </div>

      <button type="button" id="nav-icon" class="mobile-header-opener" aria-expanded="false" aria-label="<?php esc_attr_e( 'Open the menu', 'textdomain' ); ?>">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>  

    <nav class="mobile-header-nav mobile-header-nav-initial" role="navigation" aria-label="<?php esc_attr_e( 'Custom Mobile Menu', 'textdomain' ); ?>">
      <?php wp_nav_menu( array(
        'theme_location' => 'main-menu',
        'container' => '',
        'menu_class' => '',
        'link_before' => '<span class="menu-item-text">',
        'link_after' => '</span>'
      ) ); ?>
    </nav>

  </header>

  <div id="contactbottom">
    <a class="phonebottom circle pulse" href="tel:+48426116919"></a>
  </div>