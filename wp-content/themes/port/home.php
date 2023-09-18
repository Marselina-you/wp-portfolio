<?php
/*
Template Name: home

*/
get_header();
?>

<main class="main">




<section class="hero">
<div class="container hero__container">
  <h1 class="title title__hero">веб-разработка</h1>
  <div class="hero__logo">
    <img src="<?php bloginfo('template_url');?>/assets/img/logo.svg" alt="Logo Alf">
  </div>
    <h2 class="hero__name">
      <span class="hero__name1">алфёрова</span>
      <span class="hero__name2">марина</span>
    </h2>
    <div class="hero__block">
      <a href="category/frontend" class="hero__work">frontend</a>
      <div class="hero__stick"></div>
      <a href="category/frontend" class="hero__work">backend</a>
    </div>
    </div>
</section>
<section class="examples">
  <div class="container">
    <div class="examples__title">Примеры работ</div>
  </div>
  <div class="examples__border"></div>
  <ul class="examples__list list-reset">


<?php 

global $post;

$myposts = get_posts([
  'numberposts' => 5,
  //'offset'      => 1,
  //'category'   => 'frontend'  
]);

if( $myposts ){
  foreach( $myposts as $post) {
    setup_postdata( $post );
?>
 <li>
 <article class="examples-item">
    <a href="#" class="examples-item__link">
      <div class="examples-item__bg" style="background-image: url(<?php if ( has_post_thumbnail()) { $full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); echo ''.$full_image_url[0] . ''; } ?>)">

      </div>
        <div class="container examples-item__container">
       
            <span class="examples-item__theme"><?php the_content(); ?></span>
            <h3 class="examples-item__title"><?php the_title(); ?></h3>
      </div>
    </a>
</article>
  </li>
<?php  }
}else {
  echo "kuku";
}
wp_reset_postdata();

?>
 </ul>
</section>
<section class="communication">
  <div class="communication__container container">
<div class="communication__left">
      <form action="post" class="communication__form">
        <h2 class="communication__title">Сотрудничество</h2>
        <p class="communication__descr">Напишите мне</p>

        <?php echo do_shortcode('[contact-form-7 id="806f147" title="Контактная форма"]')?>
       
      </form>
          </div>
          <div class="communication__right">
    <a href="https://t.me/MarinaAlferova23" class="telegram-link">Телеграм: <span class="telegram-link__span">MarinaAlferova23</span></a>
    <a href="https://wa.me/79201923888" class="telegram-link">Whatsup: <span class="telegram-link__span">+7(920)192-38-88</span></a>
    <div class="communication__git">
<span>Мой профиль на GitHub:</span>
<a href="https://github.com/Marselina-you" class="communication__git-address">github.com/Marselina-you</a>
    </div>
    </div>
</div>
</section>
</main>


<?php 
get_footer();
?>
