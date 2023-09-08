<?php
 function blog_assets() {
    wp_enqueue_style('vendor', get_template_directory_uri() .'/assets/css/vendor.css');
    
    wp_enqueue_style('style', get_template_directory_uri() .'/assets/css/style.css');

    wp_enqueue_script('main', get_template_directory_uri() .'/assets/js/main.js', array(), '20151215', true);
}
add_action('wp_enqueue_scripts', 'blog_assets');
register_nav_menu('main', 'Main Menu');

//add_filter( 'wp_nav_menu', 'change_wp_nav_menu', 10, 2 );

//function change_wp_nav_menu( $nav_menu, $args ) {
	//return '<nav class="nav header__nav wow animate__fadeInDown">' . $nav_menu . '</nav>';
//}
$walker = new Walker_Nav_Menu;
$args = array(
	'walker' => $walker,
	// ... другие параметры меню
);
class True_Walker_Nav_Menu extends Walker_Nav_Menu {
	/*
	 * Позволяет перезаписать <ul class="sub-menu">
	 */
	function start_lvl(&$output, $depth=0, $args = array()) {
	// для WordPress 5.3+
	// function start_lvl( &$output, $depth = 0, $args = NULL ) {
		/*
		 * $depth – уровень вложенности, например 2,3 и т д
		 */ 
		$output .= '<ul class="menu_sublist">';
	}
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output
	 * @param object $item Объект элемента меню, подробнее ниже.
	 * @param int $depth Уровень вложенности элемента меню.
	 * @param object $args Параметры функции wp_nav_menu
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	// для WordPress 5.3+
	// function start_el( &$output, $item, $depth = 0, $args = NULL, $id = 0 ) {
		global $wp_query;           
		/*
		 * Некоторые из параметров объекта $item
		 * ID - ID самого элемента меню, а не объекта на который он ссылается
		 * menu_item_parent - ID родительского элемента меню
		 * classes - массив классов элемента меню
		 * post_date - дата добавления
		 * post_modified - дата последнего изменения
		 * post_author - ID пользователя, добавившего этот элемент меню
		 * title - заголовок элемента меню
		 * url - ссылка
		 * attr_title - HTML-атрибут title ссылки
		 * xfn - атрибут rel
		 * target - атрибут target
		 * current - равен 1, если является текущим элементом
		 * current_item_ancestor - равен 1, если текущим (открытым на сайте) является вложенный элемент данного
		 * current_item_parent - равен 1, если текущим (открытым на сайте) является родительский элемент данного
		 * menu_order - порядок в меню
		 * object_id - ID объекта меню
		 * type - тип объекта меню (таксономия, пост, произвольно)
		 * object - какая это таксономия / какой тип поста (page /category / post_tag и т д)
		 * type_label - название данного типа с локализацией (Рубрика, Страница)
		 * post_parent - ID родительского поста / категории
		 * post_title - заголовок, который был у поста, когда он был добавлен в меню
		 * post_name - ярлык, который был у поста при его добавлении в меню
		 */
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
		/*
		 * Генерируем строку с CSS-классами элемента меню
		 */
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'nav__item';
 
		// функция join превращает массив в строку
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
 
		/*
		 * Генерируем ID элемента
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
 
		/*
		 * Генерируем элемент меню
		 */
		$output .= $indent . '<li' . $id . $value . $class_names .'>';
 
		// атрибуты элемента, title="", rel="", target="" и href=""
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
 
		// ссылка и околоссылочный текст
		$item_output = $args->before;
		$item_output .= '<a class="nav__link"'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
 
 		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-logo');

add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}
add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}

	}

	return $data;
}

add_action( 'show_product_short_description', 'show_product_short_description' );

function show_product_short_description() {

	global $product;
	
	if ( $tmp_desc = $product->get_short_description() ) {
		$str = $tmp_desc;
		$str = wp_strip_all_tags( $str, 0 );//убираем лишние теги
		echo    $str ;
	}
	

}
//remove_filter( 'do_action', 'wpautop' );

add_action('display_custom_product_attributes_on_loop', 'display_custom_product_attributes_on_loop' );
function display_custom_product_attributes_on_loop() {
    global $product;

    $value1 = $product->get_attribute('calories');
	if ( ! empty($value1) ) {
		
       $attributes = array(); // Initializing

        if ( ! empty($value1) ) {
            $attributes[] =    $value1 .' ' . __("Kk") ;
        }
echo implode(  $attributes )  ;
//echo  $attributes ;
    }
}
function blog_theme_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__('phone', 'my_word'),
		'id' => 'sidebar-1',
		'description' => esc_html__('add widget here', 'my_word'),
		'before_widget' => null,
		'after_widget' => null,

	) );
}
add_action( 'widgets_init', 'blog_theme_widgets_init' );
remove_filter('widget_text_content', 'wpautop');
//add_action('widgets_init', 'steam_widgets_init');  

add_filter ( 'wp_list_categories', 'span_before_link_list_categories' );

function span_before_link_list_categories( $list ) {
$list = str_replace('href=', 'class="nav__link" href=',$list);
return $list;
}

add_filter ( 'wp_list_categories', 'li_before_link_list_categories' );

function li_before_link_list_categories( $list ) {
$list = str_replace('<a class=', '<li class="header-menu-nav__item"><a class=',$list);
return $list;
}





//define( 'WPCF7_AUTOP', false );
add_filter('wpcf7_autop_or_not', '__return_false');

