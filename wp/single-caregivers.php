<?php get_header(); ?>
    
    <section class="section">
        <div class="wrapper">
            <div class="container">
                <?php if ( function_exists('yoast_breadcrumb') ) { lsx_breadcrumbs(); } ?> 
            </div>
        </div>
    </section>

    <section class="section">
        <div class="wrapper">
            <div class="container nurse">
                <?php $img = get_field('foto'); ?>
                <div class="nurse__image-wrapper">
                    <img class="nurse__image" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                </div>
                <div class="nurse__inner">
                    <div class="nurse__wrapper">
                        <div class="nurse__name"><?php the_title(); ?></div>
                        <?php if(get_field('opisnaie')) { ?>
                        <div class="nurse__info"><?php echo get_field('opisnaie'); ?></div>
                        <?php } ?>
                        <div class="nurse__desc">
                            <?php if(get_field('vozrast')) { ?>
                            <div class="nurse__age"><?php echo get_field('vozrast'); ?></div>
                            <?php } if(get_field('cena')) { ?>
                            <div class="nurse__price"><?php echo get_field('cena'); ?></div>
                            <?php } if(get_field('grazhdanstvo')) { ?>
                            <div class="nurse__citizenship nurse__citizenship--<?php echo get_field('grazhdanstvo'); ?>"></div>
                            <?php } if(get_field('obrazovanie')) { ?>
                            <div class="nurse__education"><?php echo get_field('obrazovanie'); ?></div>
                            <?php } if(get_field('prozhivanie')) { ?>
                            <div class="nurse__for-accommodation"><?php echo get_field('prozhivanie'); ?></div>
                            <?php } if(get_field('otzyvy')) { ?>
                            <div class="nurse__reviews"><?php echo get_field('otzyvy'); ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php if(have_rows('spisok')): ?>
                    <div class="nurse__responsibilities"> 
                        <div class="nurse__responsibilities-items">
                            <?php while(have_rows('spisok')): the_row(); ?>
                            <div class="nurse__responsibilities-item"><?php echo get_sub_field('tekst'); ?></div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="nurse__about"><?php echo get_field('tekst'); ?></div>
                    <button class="button button--discover popup-opener" data-popup="caregivers">Выбрать эту сиделку</button>
                </div>
            </div>
        </div>
    </section>
    
    <?php if(have_rows('rekomendacii','ts')): ?>
    <section class="section section--nurses">
        <div class="wrapper">
            <div class="container nurses">
                <?php if(get_field('zagolovokr','ts')) { ?>
                <div class="title title--recommended"><?php echo get_field('zagolovokr','ts'); ?></div>
                <?php } ?>
                <div class="slider slider--nurses">
                    <div class="slider__prev"></div>
                    <div class="nurses__items">
                        <?php while(have_rows('rekomendacii','ts')): the_row(); $idp = get_sub_field('sidelka'); ?>
                        <div class="nurses__item">
                            <div class="nurses__image-wrapper">
                                <?php $img = get_field('foto',$idp); ?>
                                <img class="nurses__image" src="<?php echo $img['url']; ?>" alt="<?php echo get_the_title($idp); ?>">
                            </div>
                            <div class="nurses__wrapper">
                                <div class="nurses__name"><?php echo get_the_title($idp); ?></div>
                                <?php if(get_field('vozrast',$idp)) { ?>
                                <div class="nurses__age"><?php echo get_field('vozrast',$idp); ?></div>
                                <?php } if(get_field('obrazovanie',$idp)) { ?>
                                <div class="nurses__education"><?php echo get_field('obrazovanie',$idp); ?></div>
                                <?php } if(get_field('otzyvy',$idp)) { ?>
                                <div class="nurses__reviews"><?php echo get_field('otzyvy',$idp); ?></div>
                                <?php } if(get_field('grazhdanstvo',$idp)) { ?>
                                <div class="nurses__citizenship nurses__citizenship--<?php echo get_field('grazhdanstvo',$idp); ?>"></div>
                                <?php } ?>
                            </div>
                            <a href="<?php the_permalink($idp); ?>" class="nurses__button">Подробнее</a>
                        </div>
                        <?php endwhile; ?>  
                    </div>
                    <div class="slider__next"></div>    
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    
    <?php if(get_field('formas','ts')) { ?>
    <section class="section section--request-form-nurse">
        <div class="wrapper--request-form-nurse">
            <div class="container">
                <div class="request-form-nurse">
                    <?php if(get_field('zagolovokf','ts')) { ?>
                    <div class="title"><?php echo get_field('zagolovokf','ts'); ?></div>
                    <?php } ?>
                    <div class="request-form-nurse__wrapper">
                        <div class="form">
                            <?php echo do_shortcode(get_field('formas','ts')); ?>
                        </div>
                    </div>
                </div>    
                <div class="dots dots--left-top hide-on-mobile"></div>
                <div class="dots dots--right-top hide-on-mobile"></div>
            </div>
        </div>
    </section>
    <?php } ?>

<?php get_footer(); ?>