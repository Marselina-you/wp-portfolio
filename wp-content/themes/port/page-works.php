<?php /*Template Name: works */

get_header(); ?>

<main>

<section class="works">
  <div class="container works__container">
  
  <?php
$args = array(
	'show_option_all'    => '',
	'show_option_none'   => __('No categories'),
	'orderby'            => 'name',
	'order'              => 'ASC',
	'style'              => '',
	'show_count'         => 0,
	'hide_empty'         => 1,
	'use_desc_for_title' => 0,
	'child_of'           => 0,
	'feed'               => '',
	'feed_type'          => '',
	'feed_image'         => '',
	'exclude'            => '',
	'exclude_tree'       => '',
	'include'            => '',
	'hierarchical'       => true,
	//'title_li'           => __( 'Categories' ),
	'number'             => NULL,
	'echo'               => 1,
	'depth'              => 0,
	'current_category'   => 0,
	'pad_counts'         => 0,
	'taxonomy'           => 'category',
	'walker'             => 'Walker_Category',
	'hide_title_if_empty' => false,
	'separator'          => '',
);

echo '<ul class="hero__block works__block list-reset">
<div class="hero__stick"></div>';
	wp_list_categories( $args );
echo '</ul>';?>


   
      
    
    <ul class="examples__list list-reset">
    <?php
// Запрос. $args - параметры запроса
query_posts( $args );

// Цикл WordPress
if( have_posts() ){
	  while( have_posts() ){
		   the_post();?>
           <li>
           <article class="examples-item">
             <a href="<?php the_permalink(); ?>" class="examples-item__link">
               <div class="examples-item__bg" style="background-image: url(<?php if ( has_post_thumbnail()) { $full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); echo ''.$full_image_url[0] . ''; } ?>);"></div>
               <div class="container examples-item__container">
                 <span class="examples-item__theme">лендинг ресторана </span>
                 <h3 class="examples-item__title"><?php the_title(); ?></h3>
   
               </div>
   
             </a>
           </article>
         </li>
	 <?php }
	  wp_reset_query();
} else {
   echo 'kuku';
}
?> 
    
     

    </ul>
  </div>
</section>

</main>
<?php 
get_footer();
?>