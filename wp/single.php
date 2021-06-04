<?php
    if($_COOKIE['prosmotry'] != $post->ID) {
    	$prosmotry = get_field('prosmotry') + 1;
        update_field("prosmotry", $prosmotry, $post->ID );
        setcookie('prosmotry', $post->ID, time() + (3600 * 24 * 30),"/");	
    }
    get_header(); 
?>

    <section class="section">
        <div class="wrapper">
            <div class="container">
            	<?php if ( function_exists('yoast_breadcrumb') ) { lsx_breadcrumbs(); } ?> 
            </div>
        </div>
    </section>

    <section class="section section--page-article">
        <div class="wrapper">
            <div class="container page-article">
                <div class="article">
                    <h1 class="title"><?php the_title(); ?></h1> 
                    <div class="article__inner">
                        <?php if(have_rows('ssylki')): ?>
                        <div class="article__links hide-on-mobile">
                            <?php while(have_rows('ssylki')): the_row(); ?>
                            <a class="article__link" href="<?php echo get_sub_field('ssylka'); ?>">
                                <span><?php echo get_sub_field('ankor'); ?></span>
                            </a>
                            <?php endwhile; ?>
                        </div>
                        <?php endif; ?>
                        <div class="article__wrapper">
                        	<?php if(get_field('izo')) { $img = get_field('izo');  ?>
                            <div class="article__image-wrapper article__image-wrapper--yellow">
                                <img class="article__image" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                            </div>
                            <?php } ?>
                            <div class="article__info">
                                <span class="article__date"><?php the_time("j F Y"); ?></span>
                                <span class="article__views">Просмотры: <?php echo get_field('prosmotry'); ?></span>
                            </div>

                            <?php if(have_rows('sekcii')): while(have_rows('sekcii')): the_row(); ?>

                            <?php if( get_row_layout() == 'b1' ): ?>

                            <div class="article__text"<?php if(get_sub_field('id')) { echo ' id="'.get_sub_field('id').'"'; } ?>><?php echo get_sub_field('tekst'); ?>
                            </div>

                            <?php elseif( get_row_layout() == 'b2' ): ?>

                            <h2 class="title"<?php if(get_sub_field('id')) { echo ' id="'.get_sub_field('id').'"'; } ?>><?php echo get_sub_field('zagolovok'); ?></h2>

                            <?php elseif( get_row_layout() == 'b3' ): ?>

                            <div class="article__section <?php echo get_sub_field('tip'); ?>"<?php if(get_sub_field('id')) { echo ' id="'.get_sub_field('id').'"'; } ?>>
                                <div class="article__section-icon"></div>
                                <?php if(get_sub_field('zagolovok')) { ?>
                                <div class="article__section-title"><?php echo get_sub_field('zagolovok'); ?></div>
                                <?php } if(get_sub_field('tekst')) { ?>
                                <div class="article__section-text"><?php echo get_sub_field('tekst'); ?></div>
                                <?php } ?>
                            </div>

                            <?php elseif( get_row_layout() == 'b4' ): ?>

                            <div class="article__features"<?php if(get_sub_field('id')) { echo ' id="'.get_sub_field('id').'"'; } ?>>
                            	<?php if(get_sub_field('zagolovok')) { ?>
                                <h3 class="article__features-title"><?php echo get_sub_field('zagolovok'); ?></h3>
                                <?php } if(get_sub_field('tip') == 1) { ?>
                                <div class="article__features-items article__features-items--stars">
                                    <?php if(have_rows('spisok')): while(have_rows('spisok')): the_row(); ?>
                                    <div class="article__features-item">
                                        <div class="article__features-wrapper"><?php echo get_sub_field('tekst'); ?></div>
                                    </div>
                                    <?php endwhile; endif; ?>
                                </div>
                                <?php } if(get_sub_field('tip') == 2) { ?>
                                <div class="article__features-items article__features-items--square">
                                    <?php if(have_rows('spisok')): while(have_rows('spisok')): the_row(); ?>
                                    <div class="article__features-item"><?php echo get_sub_field('tekst'); ?></div>
                                    <?php endwhile; endif; ?>
                                </div>
                                <?php } if(get_sub_field('tip') == 3) { ?>
                                <div class="article__features-items article__features-items--numbers">
                                    <?php if(have_rows('spisok')): while(have_rows('spisok')): the_row(); ?> 
                                    <div class="article__features-item"><?php echo get_sub_field('tekst'); ?></div>
                                    <?php endwhile; endif; ?> 
                                </div>
                                <?php } ?>
                            </div>
                            <?php elseif( get_row_layout() == 'b5' ): $img = get_sub_field('izo'); ?>

                            <div class="article__image-wrapper article__image-wrapper--accent"<?php if(get_sub_field('id')) { echo ' id="'.get_sub_field('id').'"'; } ?>>
                                <img class="article__image" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                            </div>

                            <?php endif; ?>

                            <?php endwhile; endif; ?>
                           
                           <?php
                               $result_filter = array('post__not_in'=>array($post->ID), 'post_type'=>'post', 'orderby'=>'meta_value_num', 'meta_key'=>'prosmotry', 'order'=>'DESC', 'showposts'=>4);
	                           query_posts($result_filter); if(have_posts()): 
                            ?>
                            <div class="article__benefits">
                                <div class="title">Вам может быть интересно</div>
                                <div class="article__benefits-items">
                                    <?php while(have_posts()): the_post(); ?>
                                    <a href="<?php the_permalink(); ?>" class="article__benefits-item">
                                    	<?php if(has_post_thumbnail()){ $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(),'full',true); ?>
                                        <div class="article__benefits-image-wrapper">
                                            <img class="article__benefits-image" src="<?php echo esc_url($thumb[0]); ?>" alt="<?php the_title(); ?>">
                                        </div>
                                        <?php } ?>
                                        <div class="article__benefits-signature"><?php the_title(); ?></div>
                                    </a>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                            <?php endif; wp_reset_query(); ?>

                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </section>

<?php get_footer(); ?>