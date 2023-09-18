<?php /*Template Name: about */

get_header(); ?>

<main>
<section class="hero-about">
  <div class="container hero-about__container">
    <div class="hero-about__txt">
     <h1 class="hero-about__title"> Меня зовут Марина.</h1>
     <span class="hero-about__subtitle"> Я фрилансер, занимаюсь веб-разработкой.</span>
       <p class="hero-about__descr">   Основное направление -
        верстка различной сложности
        (HTML, CSS, JS).</p>
      </div>
    <div class="hero-about__img">
<img src="<?php the_field('photo'); ?>" alt="photo">
    </div>
  </div>
</section>
<?php 
get_template_part( 'skills' );
get_template_part( 'contacts' );
?>
</main>
<?php 
get_footer();
?>