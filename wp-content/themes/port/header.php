<!DOCTYPE html><html lang="ru" class="page">
	<head>
		<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="ie=edge"><meta name="theme-color" content="#111111">
		
		<title>Burrito</title>
 <?php
    wp_head();
    ?>
</head>
<body class="body">
  <div class="site-container">
    <div class="header container">
  <div class="header__container">
    <div class="header-logo wow animate__fadeInLeft">
      <h1 class="header-logo__title">burrito</h1>
      <img class="header-logo__decor" src="<?php echo get_template_directory_uri(); ?>/assets/img/decor.svg" alt="burrito">
      <span class="header-logo__subtitle">chilebar</span>
    </div>
     <div class="nav-wrap">
      <nav class="nav header__nav wow animate__fadeInDown">
    
    
      <?php 
      $args = array(
        'theme_location' => 'main',
        'menu_class' => 'list-reset nav__list',
        'container' => '',
        
        'walker'=> new True_Walker_Nav_Menu()// этот параметр нужно добавить
       
       
      );
      wp_nav_menu( $args );
      
      //wp_nav_menu ((['container' => ''])); 
      //my_nav_menu( [ 'theme_location'  => 'navigation_menu_primary' ] );
      ?> <button class="btn-reset btn-order nav__link cart__count">cart</button>
      </nav> 
  </div>
  <div class="burger-wrap">
    <button class="burger btn-reset">
      <span class="burger__line"></span>
    </button>
  </div>
  <div class="mini-cart">
    <div class="mini-cart__top">
      <ul class="list-reset mini-cart__list">
        <li class="mini-cart__item" data-id="">
          <article class="mini-cart__product mini-product">
            <div class="mini-product__image">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/tapas.png" alt="">
            </div>
            <div class="mini-product__content">
              <div class="mini-product__text">
                <h3 class="mini-product__title">Tapas with bacon</h3>
                <span class="mini-product__quant">4</span>
                <span class="mini-product__price">1450 r</span>

              </div>
              <button class="btn-reset mini-product__delete" aria-label="Удалить товар">
             
    
                <svg>
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/svg/sprite.svg#trash"></use>
                </svg>
              </button>
            </div>
          </article>
        </li>
        <li class="mini-cart__item" data-id="">
          <article class="mini-cart__product mini-product">
            <div class="mini-product__image">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/tapas.png" alt="">
            </div>
            <div class="mini-product__content">
              <div class="mini-product__text">
                <h3 class="mini-product__title">Tapas with bacon</h3>
                <span class="mini-product__quant">4</span>
                <span class="mini-product__price">1450 r</span>

              </div>
              <button class="btn-reset mini-product__delete" aria-label="Удалить товар">
                <svg>
                  <use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/sprite.svg#trash"></use>
                </svg>
              </button>
            </div>
          </article>
        </li>
      </ul>
    </div>
  <div class="mini-cart__bottom">
    <div class="mini-cart__itog">
      <span class="mini-cart__txt">In total</span>
      <span class="mini-cart__summ">1459</span>
    </div>
    <button class="btn-reset btn btn--primary mini-cart__btn" data-graph-path="cart-modal">order</button>
  </div>
  </div>
  </div>
    </div>

		