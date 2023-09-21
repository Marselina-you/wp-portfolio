<?php
get_header(); ?><?php

gt_set_post_view();


if( have_posts() ){
	while( have_posts() ){
		the_post();
        ?> 
        <section class="example">
  <div class="container">
    <h1 class="example__subtitle">
    <?php the_content(); ?>
    </h1>
    <h2 class="example__title">
    <?php the_title(); ?>
    </h2>
    <a href="<?php the_field('href');?>" class="example__link">перейти на сайт</a>
    <div class="example__image">
      <img src="<?php echo the_post_thumbnail_url();?>" alt="">
    </div>
    <ul class="example__list list-reset">
      <li class="example-item">
        <article>
          <div class="example-item__title">Верстка макета</div>
          <div class="example-item__descr"><?php the_field('layout'); ?></div>
        </article>
      </li>
      <li class="example-item">
        <article>
          <div class="example-item__title">Интерактивность </div>
          <div class="example-item__descr"><?php the_field('interactivity'); ?></div>
        </article>
      </li>
      <li class="example-item">
        <article>
          <div class="example-item__title">Движок </div>
          <div class="example-item__descr"><?php the_field('engine'); ?></div>
        </article>
      </li>
    </ul>
    <div class="example__shift">пeрейти на <a href="<?php the_field('href');?>" class="example__link"><?php the_title(); ?></a></div>
    <!--<div class="example-block__title">cледующий проект</div>-->

    <div class="post-links">

<?php previous_post_link('%link', 'предыдущий проект', true); ?>
							<?php next_post_link('%link', 'cледующий проект', true); ?>




						</div>
    <div class="example-block">
      <div class="example-block__right">
        <div class="example__subtitle">хлебопекарня</div>
        <div class="example__title">заБатоном</div>
      </div>
      <div class="example__left">
        <img src="img/svg/next.svg" alt="">
      </div>
    </div>
  </div>
</section>
					

	<? }
} else { echo 'kuku';

}?>
<?

get_footer(); ?>

