<!DOCTYPE html><html <?php language_attributes();?>>
	<head>
		<meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="ie=edge"><meta name="theme-color" content="#111111">
		<title>Alferova-web - разработка сайтов, верстка сайтов HTML, CSS</title>
    <meta name="desciption" content="Адаптивная верстка сайтов по макету">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Alferova-web - разработка сайтов, верстка сайтов HTML, CSS">
    <meta property="og:site_name" content="Адаптивная верстка сайтов по макету, заказать верстку  HTML, CSS">
    <meta property="og:description" content="Адаптивная верстка сайтов по макету">
    <meta property="og:url" content="http://alferova-web.ru">
    <meta property="og:site" content="http://alferova-web.ru">
 <?php
wp_head();
    ?>
</head>

<div class="site-container">
<header class="header">
  <div class="container header__container">
    <div class="header__block">
     <?php
      the_custom_logo();
      ?>
<nav class="nav header__nav" title="Navigation">
<?php 
      $args = array(
        'theme_location' => 'main',
        'menu_class' => 'list-reset nav__list',
        'container' => '',
        
        'walker'=> new True_Walker_Nav_Menu()// этот параметр нужно добавить
       
       
      );
      wp_nav_menu( $args );
      ?>
      </nav>
    
      <div class="burger-wrap">
        <button class="burger btn-reset">
          <span class="burger__line"></span>
        </button>
      </div>
     </div>
  </div>
</header>
  

		