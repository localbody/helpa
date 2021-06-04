<?php 
    get_header();
    $idb = get_option('page_for_posts'); 
    if ( !is_front_page() && is_home() ) {
    	$term_id = 0;
    	$link = get_permalink($idb);
    } else {
        $queried_object = get_queried_object(); 
	    $term_id = $queried_object->term_id;
	    $link = get_term_link($term_id);
	}
	$pageNum = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>

    <section class="section">
        <div class="wrapper">
            <div class="container">
                <?php if ( function_exists('yoast_breadcrumb') ) { lsx_breadcrumbs(); } ?> 
            </div>
        </div>
    </section>

    <section class="section page--articles">
        <div class="wrapper">
            <div class="container articles">
                <h1 class="title"><?php echo get_the_title($idb); ?></h1>
                <div class="filters">
                    <button class="filters__button">Фильтры</button>
                    <div class="filters__items">
                        <div class="filters__item">
                            <div class="filters__item-label">Сортировать по:</div>
                            <div class="filters__item-wrapper">
                                <div class="filters__item-value"><?php if(isset($_GET['sort'])) { echo 'По популярной популярности'; } else { echo 'По дате'; } ?></div>
                                <ul class="filters__item-select">
                                	<?php if(isset($_GET['sort'])) { ?>
                                	<li class="filters__item-option"><a href="<?php echo $link; ?>">По дате</a></li>
                                    <?php } else { ?>
                                    <li class="filters__item-option"><a href="<?php echo $link.'?sort'; ?>">По популярной популярности</a></li>
                                    <?php } ?>
                                </ul>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="articles__inner">
                    <?php if(get_field('menyu',$idb) or get_field('tegi',$idb)) { ?>
                    <div class="articles__widget hide-on-mobile">
                        <?php if(get_field('menyu',$idb)) {  $menu = wp_get_nav_menu_object(get_field('menyu',$idb)); ?>
                        <div class="articles__archive archive">
                            <div class="title"><?php echo $menu->name; ?></div>
                            <ul class="archive__items">
                                <?php wp_nav_menu(array('menu'=>$menu->term_id, 'items_wrap'=>'%3$s', 'container'=>false, 'depth'=>3, 'walker'=>new True_Walker_Nav_Menu_archive())); ?>
                            </ul>
                        </div>
                        <?php } if(get_field('tegi',$idb)) { ?>
                        <div class="articles__tags">
                            <div class="title">Теги</div>
                            <div class="tags">
                                <?php if(have_rows('tegi',$idb)): while(have_rows('tegi',$idb)): the_row(); $t = get_sub_field('teg'); ?>
                                <div class="tag<?php if($t->term_id == $term_id) { echo ' active';} ?>">
                                    <a class="tag__label" href="<?php echo get_term_link($t->term_id); ?>"><?php echo $t->name; ?></a>
                                </div>
                                <?php endwhile; endif; ?> 
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>

                    <div class="articles__wrapper">
                        <div class="articles__items">
                            <?php 
                                if ( !is_front_page() && is_home() ) {
                                    $arg = array('post_type'=>'post', 'paged'=>$pageNum);
                                } elseif(is_category()) {
                                    $arg = array('cat'=>$term_id, 'paged'=>$pageNum);
                                } elseif(is_tag()) {
                                	$arg = array('tag_id'=>$term_id, 'paged'=>$pageNum);
                                }
                                if(isset($_GET['sort'])) {
                                	$arg['orderby'] = 'meta_value_num';
                                	$arg['meta_key'] = 'prosmotry';
                                	$arg['orde'] = 'DESC';
                                }
                                $Nquery = new WP_Query($arg);
                                if($Nquery->have_posts()): while($Nquery->have_posts()): $Nquery->the_post(); 
                            ?>
                            <a href="<?php the_permalink(); ?>" class="articles__item article">
                            	<?php if(has_post_thumbnail()){ $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(),'full',true); ?>
                                <div class="article__image-wrapper">
                                    <img class="article__image" src="<?php echo esc_url($thumb[0]); ?>" alt="<?php the_title(); ?>" />
                                </div>
                                <?php } ?>
                                <div class="article__title"><?php the_title(); ?></div>
                                <div class="article__text"><?php echo get_the_excerpt(); ?></div>
                                <div class="article__date"><?php the_time("d.m.Y"); ?></div>
                            </a>
                            <?php endwhile; endif; wp_reset_query(); ?>
                        </div>
                        <?php kama_pagenavi($arg, $Nquery); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
 
<?php get_footer(); ?>