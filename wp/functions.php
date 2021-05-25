<?php

register_nav_menus(array('primary'=>__('Main menu')));
add_filter( 'wpcf7_autop_or_not', '__return_false' );
add_theme_support( 'title-tag' );

if ( function_exists( 'add_image_size' ) ) {
	//add_image_size( 'team',840,840,true);
}

add_action( 'init', 'caregivers_typ' );
function caregivers_typ() {
register_post_type( 'caregivers', array(
  'labels' => array(
    'name' => 'Сиделки',
    'singular_name' => 'caregivers',
   ),
  'description' => 'Сиделки',
  'public' => true, 
  'menu_position' => 21,
  'menu_icon' => 'dashicons-groups',
  'supports' => array( 'title', ),
  'rewrite'             => array( "slug" => 'caregivers' )
));
}

if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

remove_action('wp_head','feed_links_extra', 3);
remove_action('wp_head','feed_links', 2);
remove_action('wp_head','rsd_link');
remove_action('wp_head','wlwmanifest_link');
remove_action('wp_head','wp_generator'); 
remove_action('wp_head','start_post_rel_link',10,0);
remove_action('wp_head','index_rel_link');
remove_action('wp_head','rel_canonical');
remove_action( 'wp_head','adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head','wp_shortlink_wp_head', 10, 0 );

function my_revisions_to_keep( $revisions ) { return 0; }
add_filter( 'wp_revisions_to_keep', 'my_revisions_to_keep' );

function wph_inline_css_admin() {
   echo '<style> #addtag .term-description-wrap, #edittag .term-description-wrap {  display:none !important; } </style>'; 
}
add_action('admin_head', 'wph_inline_css_admin');

function lsx_breadcrumbs($class = '') {
    if (!function_exists('yoast_breadcrumb')) { return null; }
    $crumbs = yoast_breadcrumb(null, null, false);
    $breadcrumbs = explode("||", $crumbs);
    $i = 0; foreach ($breadcrumbs as &$value) { $i++;
    	$breadcrumb .= '<div class="breadcrumbs__item">'.str_replace("<a",'<a class="breadcrumbs__link"',$value).'</div>';
    	if(is_singular('post') && $i==1 or is_category() && $i==1 or is_tag() && $i==1) {
    	    $idb = get_option('page_for_posts');
    	    $breadcrumb .= '<div class="breadcrumbs__item"><a href="'.get_permalink($idb).'" class="breadcrumbs__link">'.get_the_title($idb).'</a></div>';
    	} elseif(is_singular('caregivers') and get_field('stranica_sidelok','ts') && $i==1) {
    	    $idb = get_field('stranica_sidelok','ts');
    	    $breadcrumb .= '<div class="breadcrumbs__item"><a href="'.get_permalink($idb).'" class="breadcrumbs__link">'.get_the_title($idb).'</a></div>';
        }
    }
    $output = '<div class="breadcrumbs"><div class="breadcrumbs__items">' . $breadcrumb . '</div></div>';
    echo $output;
}


class True_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$output .= '<ul class="submenu__items">';
	}
	function end_lvl(&$output, $depth = 0, $args = array()) {
		$output .= '</ul>'; 
	}
	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
		global $wp_query;           
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		if($depth == '0' and in_array('menu-item-has-children',$classes)) {
			$class_names = ' class="menu__item menu__item--dropdown ' . esc_attr( $class_names ) . '"';
		} elseif($depth == '0') {
            $class_names = ' class="menu__item ' . esc_attr( $class_names ) . '"';
		} else {
    	    $class_names = ' class="submenu__item' . esc_attr( $class_names ) . '"';
		}
		$output .= $indent . '<li' . $value . $class_names .'>';
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : ''; 
		$item_output = $args->before;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		if($depth == '0' and in_array('menu-item-has-children',$classes)) {
            $item_output .= '<a class="menu__link menu__link--dropdown"'. $attributes .'>';
        } elseif($depth == '0') {
        	$item_output .= '<a class="menu__link"'. $attributes .'>';
		} else {
    	    $item_output .= '<a class="submenu__link"'. $attributes .'>';
		}
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
 		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

class True_Walker_Nav_Menu_footer extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
		global $wp_query;           
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    	$class_names = ' class="footer-menu__item' . esc_attr( $class_names ) . '"';
		$output .= $indent . '<div' . $value . $class_names .'>';
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : ''; 
		$item_output = $args->before;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    	$item_output .= '<a class="footer-menu__item-link"'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
 		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	function end_el(&$output, $object, $depth = 0, $args = array()) {
        $output .= '</div>';
    }
}

class True_Walker_Nav_Menu_archive extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = array()) {
		if($depth == '0') { $output .= '<ul class="archive__sub-items">'; } else { $output .= '<ul class="archive__articles">'; }
	}
	function end_lvl(&$output, $depth = 0, $args = array()) {
		$output .= '</ul>'; 
	}
	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
		global $wp_query;           
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    	if($depth == '0') {
			$class_names = ' class="archive__item ' . esc_attr( $class_names ) . '"';
		} elseif($depth == '1') {
            $class_names = ' class="archive__sub-item ' . esc_attr( $class_names ) . '"';
		} else {
    	    $class_names = ' class="archive__article ' . esc_attr( $class_names ) . '"';
		}
		$output .= $indent . '<li' . $value . $class_names .'>';
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : ''; 
		$item_output = $args->before;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		if($item->url == '#' and $depth != 2) {
		    if($depth == '0') {
                $item_output .= '<span class="archive__link">';
            } elseif($depth == '1') {
        	    $item_output .= '<span class="archive__sub-link">';
		    } 
		} else {
            if($depth == '0') {
                $item_output .= '<a class="archive__link"'. $attributes .'>';
            } elseif($depth == '1') {
        	    $item_output .= '<a class="archive__sub-link"'. $attributes .'>';
		    } else {
    	        $item_output .= '<a class="archive__link"'. $attributes .'>';
		    } 
		}
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		if($item->url == '#' and $depth != 2) { $item_output .= '</span>'; } else { $item_output .= '</a>';  }
		$item_output .= $args->after;
 		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}


function kama_pagenavi( $args = array(), $wp_query = null ){
	$default = array(
		'before'          => '',   // Текст до навигации.
		'after'           => '',   // Текст после навигации.
		'echo'            => true, // Возвращать или выводить результат.
		'text_num_page'   => '',           // Текст перед пагинацией.
		'num_pages'       => 10,           // Сколько ссылок показывать.
		'step_link'       => 10,           // Ссылки с шагом (если 10, то: 1,2,3...10,20,30. Ставим 0, если такие ссылки не нужны.
		'dotright_text'   => '…',          // Промежуточный текст "до".
		'dotright_text2'  => '…',          // Промежуточный текст "после".
		'back_text'       => 0,    // Текст "перейти на предыдущую страницу". Ставим 0, если эта ссылка не нужна.
		'next_text'       => 0,   // Текст "перейти на следующую страницу".  Ставим 0, если эта ссылка не нужна.
		'first_page_text' => 0, 
		'last_page_text'  => 0,
	);
	// Cовместимость с v2.5: kama_pagenavi( $before = '', $after = '', $echo = true, $args = array() )
	if( ($fargs = func_get_args()) && is_string( $fargs[0] ) ){
		$default['before'] = isset($fargs[0]) ? $fargs[0] : '';
		$default['after']  = isset($fargs[1]) ? $fargs[1] : '';
		$default['echo']   = isset($fargs[2]) ? $fargs[2] : true;
		$args              = isset($fargs[3]) ? $fargs[3] : array();
		$wp_query = $GLOBALS['wp_query']; // после определения $default!
	}
	if( ! $wp_query ){
		wp_reset_query();
		global $wp_query;
	}
	if( ! $args ) $args = array();
	if( $args instanceof WP_Query ){
		$wp_query = $args;
		$args     = array();
	}
	$default = apply_filters( 'kama_pagenavi_args', $default ); // чтобы можно было установить свои значения по умолчанию
	$rg = (object) array_merge( $default, $args );
	//$posts_per_page = (int) $wp_query->get('posts_per_page');
	$paged          = (int) $wp_query->get('paged');
	$max_page       = $wp_query->max_num_pages;
	// проверка на надобность в навигации
	if( $max_page <= 1 )
		return false;
	if( empty( $paged ) || $paged == 0 )
		$paged = 1;
	$pages_to_show = intval( $rg->num_pages );
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor( $pages_to_show_minus_1/2 ); // сколько ссылок до текущей страницы
	$half_page_end   = ceil(  $pages_to_show_minus_1/2 ); // сколько ссылок после текущей страницы
	$start_page = $paged - $half_page_start; // первая страница
	$end_page   = $paged + $half_page_end;   // последняя страница (условно)
	if( $start_page <= 0 )
		$start_page = 1;
	if( ($end_page - $start_page) != $pages_to_show_minus_1 )
		$end_page = $start_page + $pages_to_show_minus_1;
	if( $end_page > $max_page ) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = (int) $max_page;
	}
	if( $start_page <= 0 )
		$start_page = 1;
	// создаем базу чтобы вызвать get_pagenum_link один раз
	$link_base = str_replace( 99999999, '___', get_pagenum_link( 99999999 ) );
	$first_url = get_pagenum_link( 1 );
	if( false === strpos( $first_url, '?') )
		$first_url = user_trailingslashit( $first_url );
	// собираем елементы
	$els = array();
	// пагинация
	for( $i = $start_page; $i <= $end_page; $i++ ) {
		if( $i == $paged )
			$els['current'] = '<li class="pagination__item"><a class="pagination__link pagination__link--active">'. $i .'</a></li>';
		elseif( $i == 1 )
			$els[] = '<li class="pagination__item"><a class="pagination__link" href="'. $first_url .'">1</a></li>';
		else
			$els[] = '<li class="pagination__item"><a class="pagination__link" href="'. str_replace( '___', $i, $link_base ) .'">'. $i .'</a></li>';
	}
	$dd = 0;
	if ( $rg->step_link && $end_page < $max_page ){
		for( $i = $end_page + 1; $i <= $max_page; $i++ ){
			if( $i % $rg->step_link == 0 && $i !== $rg->num_pages ) {
				if ( ++$dd == 1 )
					$els[] = '<li class="pagination__item"><span class="extend">'. $rg->dotright_text2 .'</span></li>';
				$els[] = '<li class="pagination__item"><a lass="pagination__link" href="'. str_replace( '___', $i, $link_base ) .'">'. $i .'</a></li>';
			}
		}
	}
	$els = apply_filters( 'kama_pagenavi_elements', $els );
	$out = $rg->before . '<div class="pagination"><ul class="pagination__items">'. implode( ' ', $els ) .'</ul></div>'. $rg->after;
	$out = apply_filters( 'kama_pagenavi', $out );
	if( $rg->echo ) echo $out;
	else return $out;
}

?>