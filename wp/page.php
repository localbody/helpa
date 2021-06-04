<?php get_header(); ?>
    
<?php if(!get_field('hlebnye_kroshki')) { ?>
    <section class="section">
        <div class="wrapper">
            <div class="container">
            	<?php if ( function_exists('yoast_breadcrumb') ) { lsx_breadcrumbs(); } ?> 
            </div>
        </div>
    </section>
<?php } ?>

<?php $s = 0; if(have_rows('sekcii')): while(have_rows('sekcii')): the_row(); $s++; ?>

    <?php if( get_row_layout() == 'b0' ): ?>

    <section class="section section--page-article page-default">
        <div class="wrapper">
            <div class="container page-article page-default">
                <div class="article">
                     <?php echo get_sub_field('tekst'); ?>
                </div>
            </div>        
        </div>
    </section>

    <?php elseif( get_row_layout() == 'b1' ): ?>

    <section class="section">
        <div class="wrapper">
            <div class="container contacts">
                <?php if(get_sub_field('zagolovok')) { ?>
                <div class="title"><?php echo get_sub_field('zagolovok'); ?></div>
                <?php } ?>
                <div class="contacts__items">
                    <?php if(get_sub_field('karta')) { $img = get_sub_field('karta');  ?>
                    <div class="contacts__map-wrapper">
                        <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="contacts__map-image">
                    </div>
                    <?php } if(get_sub_field('telefon1') or get_sub_field('telefon2')) { ?>
                    <div class="contacts__item contacts__item--phone">
                        <div class="contacts__title">Наши телефоны</div>
                        <div class="contacts__content contacts__content--wrap">
                            <span><?php echo get_sub_field('telefon1'); ?></span>
                            <span><?php echo get_sub_field('telefon2'); ?></span>
                        </div>
                    </div>
                    <?php } if(get_sub_field('adres1') or get_sub_field('adres2')) { ?>
                    <div class="contacts__item contacts__item--address">
                        <div class="contacts__title">Наш адрес</div>
                        <div class="contacts__content">
                            <span><?php echo get_sub_field('adres1'); ?></span>
                            <span class="nowrap"><?php echo get_sub_field('adres2E'); ?></span>
                        </div>
                    </div>
                    <?php } if(get_sub_field('vremya') and get_field('vremya','ts')) { ?>
                    <div class="contacts__item contacts__item--work-time">
                        <div class="contacts__title">Время работы</div>
                        <div class="contacts__content contacts__content--wrap">
                            <span class="nowrap"><?php echo get_field('vremya','ts'); ?></span>
                            <span><?php echo get_field('primechanie','ts'); ?></span>
                        </div>
                    </div>
                    <?php } if(get_sub_field('socseti')) { ?>
                    <div class="contacts__item contacts__item--social">
                        <div class="contacts__title">Наши соц.сети</div>
                        <ul class="contacts__content contacts__links">
                        	<?php if(get_field('telegram','ts')) { ?>
                            <li><a href="tg://resolve?domain=<?php echo get_field('telegram','ts'); ?>" class="contacts__link contacts__link--telegram"></a></li>
                            <?php } if(get_field('viber','ts')) { ?>
                            <li><a href="viber://chat?number=%2B<?php echo get_field('viber','ts'); ?>" class="contacts__link contacts__link--viber"></a></li>
                             <?php } if(get_field('whatsapp','ts')) { ?>
                            <li><a href="https://api.whatsapp.com/send?phone=<?php echo get_field('whatsapp','ts'); ?>" class="contacts__link contacts__link--whatsapp"></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } if(have_rows('rekvizity')): ?>
                    <div class="contacts__item contacts__item--entity">
                        <div class="contacts__title">Юридическое лицо</div>
                        <div class="contacts__content contacts__content--wrap">
                        	<?php while(have_rows('rekvizity')): the_row(); ?>
                            <span><?php echo get_sub_field('tekst'); ?></span>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <?php endif; if(have_rows('adres')): ?>
                    <div class="contacts__item contacts__item--address-office">
                        <div class="contacts__title">Адрес офиса</div>
                        <div class="contacts__content contacts__content--wrap">
                           <?php while(have_rows('adres')): the_row(); ?>
                           <span><?php echo get_sub_field('tekst'); ?></span>
                           <?php endwhile; ?>
                        </div>
                    </div>
                    <?php endif; if(get_sub_field('podzagolovok') or get_sub_field('VALUE')) { ?>
                    <div class="contacts__item contacts__item--how">
                    	<?php if(get_sub_field('podzagolovok')) { ?>
                        <div class="contacts__title"><?php echo get_sub_field('podzagolovok'); ?></div>
                        <?php } if(get_sub_field('tekst')) { ?>
                        <div class="contacts__content contacts__content--how">
                        	<?php echo get_sub_field('tekst'); ?>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?> 
                </div>
                <?php if(get_sub_field('forma')) { ?>
                <div class="contacts__form">
                	<?php if(get_sub_field('zagolovokf')) { ?>
                    <hr><div class="title"><?php echo get_sub_field('zagolovokf'); ?></div>
                    <?php } if(get_sub_field('forma')) { ?>
                    <div class="form">
                    	<?php echo do_shortcode(get_sub_field('forma')); ?>
                    </div>
                    <?php } ?> 
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php elseif( get_row_layout() == 'b2' ): ?>

    <section class="section section--faq">
        <div class="wrapper">
            <?php if($s==1) { echo '<div class="container faq">'; } else { echo '<div class="container"><div class="faq faq--index">'; } ?>
                <?php if(get_sub_field('zagolovok')) { ?>
                <h3 class="title"><?php echo get_sub_field('zagolovok'); ?></h3>
                <?php if($s!=1) { echo '<hr class="hr--center hide-on-mobile">'; } ?>
                <?php } if(have_rows('vaprosy')): ?>
                <div class="faq__items">
                    <?php while(have_rows('vaprosy')): the_row(); ?>
                    <div class="faq__item<?php if(get_sub_field('raskrtyj')) { echo ' faq__item--open'; } ?>">
                        <div class="faq__item-question"><?php echo get_sub_field('vapros'); ?></div>
                        <div class="faq__item-answer"><?php echo get_sub_field('otvet'); ?></div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            <?php if($s==1) { echo '</div>'; } else { echo '</div></div>'; } ?>
        </div>
    </section>

    <?php elseif( get_row_layout() == 'b3' ): ?>

    <section class="section">
        <div class="wrapper">
            <div class="container reviews">
                <?php if(get_sub_field('zagolovok')) { ?>
                <h1 class="title"><?php echo get_sub_field('zagolovok'); ?></h1>
                <?php } if(have_rows('otzyvy')): ?>
                <div class="reviews__items">
                    <?php while(have_rows('otzyvy')): the_row(); ?>
                    <div class="reviews__item">
                        <div class="reviews__item-text"><?php echo get_sub_field('otzyv'); ?></div>
                        <div class="reviews__item-author"><?php echo get_sub_field('imya'); ?></div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php elseif( get_row_layout() == 'b4' ): ?>

    <section class="section section--vacancies">
        <div class="wrapper">
            <div class="container vacancies">
                <?php if(get_sub_field('zagolovok')) { ?>
                <h1 class="title"><?php echo get_sub_field('zagolovok'); ?></h1>
                <?php } if(have_rows('vakansii')): ?>
                <div class="vacancies__items">
                    <?php while(have_rows('vakansii')): the_row(); ?>
                    <div class="vacancies__item">
                    	<?php if(get_sub_field('data')) { ?>
                        <div class="vacancies__item-date"><?php echo get_sub_field('data'); ?></div>
                        <?php } ?>
                        <div class="vacancies__item-title"><?php echo get_sub_field('nazvanie'); ?></div>
                        <?php if(get_sub_field('zarplata')) { ?>
                        <div class="vacancies__item-money"><?php echo get_sub_field('zarplata'); ?></div>
                        <?php } if(get_sub_field('mesto')) { ?>
                        <div class="vacancies__item-where"><?php echo get_sub_field('mesto'); ?></div>
                        <?php } ?>
                        <div class="vacancies__item-text"><?php echo get_sub_field('opisanie'); ?></div>
                        <button data-title="Вакансия: <?php echo get_sub_field('nazvanie'); ?>" class="vacancies__item-button popup-opener" data-popup="vacancies">Откликнуться</button>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>        
        </div>
    </section>

    <?php elseif( get_row_layout() == 'b5' ): ?>
    
    <?php if(get_sub_field('tip') == 2) { ?>
    <section class="section--features--services">
        <div class="wrapper wrapper--features--services">
            <div class="container page-services service">
                <div class="features features--services">
                	<?php if(get_sub_field('zagolovok')) { ?>
                    <h2 class="title"><?php echo get_sub_field('zagolovok'); ?></h2>
                    <?php } if(get_sub_field('podagolovok')) { ?>
                    <div class="features__subtitle"><?php echo get_sub_field('podagolovok'); ?></div>
                    <?php } if(have_rows('bloki')): ?>
                    <div class="features__items">
                    	<?php while(have_rows('bloki')): the_row(); ?>
                        <div class="features__item features__item--<?php echo get_sub_field('ikonka'); ?>">
                            <?php echo get_sub_field('tekst'); ?>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="dots dots--left-top hide-on-mobile"></div>
                <div class="dots dots--right-top hide-on-mobile"></div>
            </div>
        </div>
    </section>
    <?php } elseif(get_sub_field('tip') == 3) { ?>
    <section class="section section--features">
        <div class="wrapper wrapper--features">
            <div class="container">
                <div class="features">
                    <?php if(get_sub_field('zagolovok')) { ?>
                    <h3 class="title"><?php echo get_sub_field('zagolovok'); ?></h3>
                    <?php } if(get_sub_field('podagolovok')) { ?>
                    <div class="features__subtitle"><?php echo get_sub_field('podagolovok'); ?></div>
                    <?php } if(have_rows('bloki')): ?>
                    <div class="features__items">
                    	<?php while(have_rows('bloki')): the_row(); ?>
                        <div class="features__item features__item--<?php echo get_sub_field('ikonka'); ?>">
                            <?php echo get_sub_field('tekst'); ?>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                    <div class="dots hide-on-mobile dots--features-left"></div>
                    <div class="dots hide-on-mobile dots--features-right"></div>
                </div>
            </div>
        </div>
    </section>
    <?php } elseif(get_sub_field('tip') == 4) { ?>
    <section class="section">
        <div class="wrapper">
            <div class="container">
                <div class="nurses__about">
                    <div class="container">
                        <?php if(get_sub_field('zagolovok')) { ?>
                        <h2 class="title"><?php echo get_sub_field('zagolovok'); ?></h2>
                        <?php } if(get_sub_field('podagolovok')) { ?>
                        <div class="features__subtitle"><?php echo get_sub_field('podagolovok'); ?></div>
                        <?php } if(have_rows('bloki')): ?>
                        <div class="nurses__about-items">
                            <?php while(have_rows('bloki')): the_row(); ?>
                            <div class="nurses__about-item nurses__about-item--<?php echo get_sub_field('ikonka'); ?>">
                                <?php echo get_sub_field('tekst'); ?>
                            </div>
                            <?php endwhile; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } else { ?>
    <section class="section section--includes">
        <div class="wrapper">
            <div class="container includes">
                <?php if(get_sub_field('zagolovok')) { ?>
                <h1 class="title"><?php echo get_sub_field('zagolovok'); ?></h1>
                <?php } if(get_sub_field('podagolovok')) { ?>
                <div class="features__subtitle"><?php echo get_sub_field('podagolovok'); ?></div>
                <?php } if(have_rows('bloki')): ?>
                <div class="includes__items">
                    <?php while(have_rows('bloki')): the_row(); ?>
                    <div class="includes__item includes__item--<?php echo get_sub_field('ikonka'); ?>">
                        <div class="includes__item-wrapper"><?php echo get_sub_field('tekst'); ?></div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>  
            </div>
        </div>
    </section>
    <?php } ?>

    <?php elseif( get_row_layout() == 'b6' ): ?>

    <section class="section section--">
        <div class="wrapper">
            <div class="container prices">
            	<?php if(get_sub_field('zagolovok')) { ?>
                <h2 class="title"><?php echo get_sub_field('zagolovok'); ?></h2>
                <hr>
                <?php } if(have_rows('bloki')): ?>
                <div class="prices__items">
                    <?php while(have_rows('bloki')): the_row(); ?>
                    <div class="prices__item prices__item--<?php echo get_sub_field('ikonka'); ?>">
                        <div class="prices__item-title"><?php echo get_sub_field('zagolovok'); ?></div> 
                        <?php if(get_sub_field('cena')) { ?>
                        <div class="prices__item-value"><?php echo get_sub_field('cena'); ?></div>
                        <?php } if(get_sub_field('ssylka')) { ?>
                        <a<?php if(get_sub_field('okno')) { echo ' target="_blank"'; } ?> href="<?php echo get_sub_field('ssylka'); ?>" class="prices__item-button">Читать подробнее</a>
                        <?php } ?>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php elseif( get_row_layout() == 'b7' ): ?>
    
    <?php if(get_sub_field('tip') == 2) { ?>
    <section class="section">
        <div class="wrapper wrapper--service__info-items">
            <div class="container page-services service">
            	<?php if(get_sub_field('zagolovok')) { ?>
                <br><br>
            	<div class="prices-features__title"><?php echo get_sub_field('zagolovok'); ?></div>
                <?php } if(have_rows('spisok')): ?>
                <div class="service__info-items">
                    <?php while(have_rows('spisok')): the_row(); ?>
                    <div class="service__info-item"><?php echo get_sub_field('tekst'); ?></div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php } elseif(get_sub_field('tip') == 3) { ?>
    <section class="section">
        <div class="wrapper">
            <div class="container nurses__responsibilities"> 
                <hr class="hide-on-mobile">
                <?php if(get_sub_field('zagolovok')) { ?>
                <h2 class="title"><?php echo get_sub_field('zagolovok'); ?></h2>
                <hr class="hide-on-desktop">
                <?php } if(have_rows('spisok')): ?>
                <div class="nurses__responsibilities-items">
                	<?php while(have_rows('spisok')): the_row(); ?>
                    <div class="nurses__responsibilities-item"><?php echo get_sub_field('tekst'); ?></div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php } else { ?>
    <section class="section section--prices-features">
        <div class="wrapper wrapper--prices-features">
            <div class="container prices-features">
            	<?php if(get_sub_field('zagolovok')) { ?>
                <h2 class="prices-features__title"><?php echo get_sub_field('zagolovok'); ?></h2><hr>
                <?php } if(have_rows('spisok')): ?>
                <div class="prices-features__items">
                    <?php while(have_rows('spisok')): the_row(); ?>
                    <div class="prices-features__item"><?php echo get_sub_field('tekst'); ?></div>
                    <?php endwhile; ?>
                </div>
                <div class="dots dots--left-top hide-on-mobile"></div>
                <div class="dots dots--right-top hide-on-mobile"></div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php elseif( get_row_layout() == 'b8' ): ?>
    
    <?php if(get_sub_field('tip') == 2) { ?>
    <section class="section section--request">
        <div class="wrapper wrapper--request">
            <div class="container">
                <div class="request">
                	<?php if(get_sub_field('izo')) { $img = get_sub_field('izo'); ?>
                    <div class="request__image-wrapper">
                        <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="request__image">
                    </div>
                    <?php } if(get_sub_field('primechanie')) { ?>
                    <div class="title title--consultation"><?php echo get_sub_field('primechanie'); ?></div>
                    <?php } if(get_sub_field('forma')) { ?>
                    <div class="request__wrapper">
                        <div class="request__form form">
                            <?php echo do_shortcode(get_sub_field('forma')); ?>
                        </div>
                        <div class="dots"></div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <?php } else { ?>
    <section class="section section--request--prices">
        <div class="wrapper">
            <div class="container request request--prices">
                <?php if(get_sub_field('izo') or get_sub_field('primechanie')) { ?>
                <div class="request__inner">
                	<?php if(get_sub_field('izo')) { $img = get_sub_field('izo'); ?>
                    <div class="request__image-wrapper">
                        <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="request__image">
                    </div>
                    <?php } if(get_sub_field('primechanie')) { ?>
                    <div class="title title--consultation"><?php echo get_sub_field('primechanie'); ?></div>
                    <?php } ?>
                </div>
                <?php } if(get_sub_field('forma')) { ?>
                <div class="request__wrapper">
                    <div class="request__form form">
                    	<?php echo do_shortcode(get_sub_field('forma')); ?>
                    </div>
                    <div class="dots hide-on-mobile"></div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php elseif( get_row_layout() == 'b9' ): ?>
    
    <?php if(get_sub_field('tip') == 2) { ?>
    <section class="section">
        <div class="wrapper">
            <div class="container page-services service">
            	<?php if(get_sub_field('izo') or get_sub_field('zagolovok') or get_sub_field('knopka') and get_sub_field('id_formy')) { ?>
                <div class="final-price final-price--services">
                	<?php if(get_sub_field('izo')) { $img = get_sub_field('izo');  ?>
                    <div class="final-price__image-wrapper">
                        <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="final-price__image">
                    </div>
                    <?php } ?>
                    <div class="final-price__wrapper">
                        <hr class="hide-on-mobile">
                        <?php if(get_sub_field('zagolovok')) { ?>
                        <h2 class="final-price__slogan"><?php echo get_sub_field('zagolovok'); ?></h2>
                        <?php } ?> 
                        <hr class="hide-on-desktop">
                        <?php if(get_sub_field('knopka') and get_sub_field('id_formy')) { ?> 
                        <button class="button button--discover popup-opener" data-popup="<?php echo get_sub_field('id_formy'); ?>"><?php echo get_sub_field('knopka'); ?></button>
                        <?php } ?>
                    </div>
                </div>
                <?php } if(get_sub_field('tekst')) { ?>
                <div class="final-price__text"><?php echo get_sub_field('tekst'); ?></div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php } elseif(get_sub_field('tip') == 3) { ?>
    <section class="section section--order-transfer">
        <div class="wrapper wrapper--order-transfer">
            <div class="container">
                <div class="order-transfer">
                	<?php if(get_sub_field('zagolovok')) { ?>
                    <h2 class="title"><?php echo get_sub_field('zagolovok'); ?></h2>
                    <hr class="hide-on-desktop">
                    <?php } ?>
                    <div class="order-transfer__inner">
                        <?php if(get_sub_field('izo')) { $img = get_sub_field('izo');  ?>
                        <div class="order-transfer__image-wrapper">
                            <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="order-transfer__image">
                        </div>
                        <?php } ?> 
                        <div class="order-transfer__wrapper">
                        	<?php if(get_sub_field('tekst0')) { ?>
                            <div class="order-transfer__slogan"><?php echo get_sub_field('tekst0'); ?></div>
                            <?php } if(get_sub_field('knopka') and get_sub_field('id_formy')) { ?> 
                            <button class="button button--order popup-opener" data-popup="<?php echo get_sub_field('id_formy'); ?>"><?php echo get_sub_field('knopka'); ?><?php echo get_sub_field('knopka'); ?></button>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="dots hide-on-mobile dots--order-left-top"></div>
                    <div class="dots hide-on-mobile dots--order-left-bottom"></div>
                    <div class="dots hide-on-mobile dots--order-right-top"></div>
                </div>              
            </div>
        </div>
    </section>
    <?php } else { ?>
    <section class="section section--final-price">
        <div class="wrapper wrapper--final-price">
            <div class="container final-price">
                <?php if(get_sub_field('izo') or get_sub_field('zagolovok') or get_sub_field('knopka') and get_sub_field('id_formy')) { ?>
                <div class="final-price__inner">
                	<?php if(get_sub_field('izo')) { $img = get_sub_field('izo');  ?>
                    <div class="final-price__image-wrapper">
                        <div class="dots hide-on-mobile"></div>
                        <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="final-price__image">
                    </div>
                    <?php } ?>
                    <div class="final-price__wrapper">
                        <hr class="hide-on-mobile"> 
                        <?php if(get_sub_field('zagolovok')) { ?>
                        <h2 class="final-price__slogan"><?php echo get_sub_field('zagolovok'); ?></h2>
                        <?php } ?> 
                        <hr class="hide-on-desktop">
                        <?php if(get_sub_field('knopka') and get_sub_field('id_formy')) { ?> 
                        <button class="button button--discover popup-opener" data-popup="<?php echo get_sub_field('id_formy'); ?>"><?php echo get_sub_field('knopka'); ?></button>
                        <?php } ?>
                    </div>
                </div>
                <?php } if(get_sub_field('tekst')) { ?>
                <div class="final-price__text"><?php echo get_sub_field('tekst'); ?></div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php elseif( get_row_layout() == 'b10' ): ?>

    <section class="section">
        <div class="wrapper">
            <div class="container page-services service">
                <div class="service__inner">
                	<?php if(get_sub_field('izo')) { $img = get_sub_field('izo');  ?>
                    <div class="banner banner--page-services">
                        <div class="banner__image-wrapper">
                            <img class="banner__image" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                        </div>
                    </div>
                    <?php } ?>
                    <div class="service__wrapper">
                    	<?php if(get_sub_field('zagolovok')) { ?>
                        <h1 class="title"><?php echo get_sub_field('zagolovok'); ?></h1>
                        <?php } if(get_sub_field('cena')) { ?>
                        <div class="service__price"><?php echo get_sub_field('cena'); ?></div>
                        <?php } if(have_rows('spisok')): ?>
                        <div class="service__items">
                        	<?php while(have_rows('spisok')): the_row(); ?>
                            <div class="service__item"><?php echo get_sub_field('tekst'); ?></div>
                            <?php endwhile; ?>
                        </div>
                        <?php endif; if(have_rows('skrytyj_spisok')): ?>
                        <div class="service__items-more">
                            <div class="service__items-wrapper">
                            	<?php while(have_rows('skrytyj_spisok')): the_row(); ?>
                                <div class="service__item"><?php echo get_sub_field('tekst'); ?></div>
                                <?php endwhile; ?>
                            </div>
                            <button class="button service__show-more">смотреть все обязанности</button>
                        </div>
                        <?php endif; if(have_rows('ssylki')): ?>
                        <div class="service__links">
                        	<?php while(have_rows('ssylki')): the_row(); ?>
                            <a<?php if(get_sub_field('okno')) { echo ' target="_blank"'; } ?> href="<?php echo get_sub_field('ssylka'); ?>" class="service__link"><span><?php echo get_sub_field('ankor'); ?></span></a>
                            <?php endwhile; ?>                 
                        </div>
                        <?php endif; if(get_sub_field('knopka') and get_sub_field('id_formy')) { ?>
                        <button class="button--discover popup-opener" data-popup="<?php echo get_sub_field('id_formy'); ?>"><?php echo get_sub_field('knopka'); ?></button>
                        <?php } ?>
                    </div>
                </div>    
                <?php if(get_sub_field('tekst')) { ?>
                <div class="service__text"><?php echo get_sub_field('tekst'); ?></div>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php elseif( get_row_layout() == 'b11' ): ?>

    <section class="section">
        <div class="wrapper">
            <div class="container page-services service">
                <div class="about__inner">
                	<?php if(get_sub_field('izo')) { $img = get_sub_field('izo');  ?>
                    <div class="banner banner--page-services-about">
                        <div class="banner__image-wrapper">
                            <img class="banner__image" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                        </div>
                    </div>       
                    <?php } if(get_sub_field('zagolovok') or get_sub_field('spisok')) { ?>
                    <div class="about__wrapper">
                    	<?php if(get_sub_field('zagolovok')) { ?>
                        <hr><h2 class="title"><?php echo get_sub_field('zagolovok'); ?></h2>
                        <?php } if(have_rows('spisok')): ?>
                        <div class="service__items">
                        	<?php while(have_rows('spisok')): the_row(); ?>
                            <div class="service__item"><?php echo get_sub_field('tekst'); ?></div>
                            <?php endwhile; ?>
                        </div>     
                        <?php endif; ?>  
                    </div>
                    <?php } ?> 
                </div>
                <?php if(get_sub_field('tekst')) { ?>
                <div class="service__text"><?php echo get_sub_field('tekst'); ?></div>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php elseif( get_row_layout() == 'b12' ): ?>

    <section class="section section--cooperation">
        <div class="wrapper">
            <div class="container">
                <div class="cooperation hide-on-mobile">
                	<?php if(get_sub_field('zagolovok')) { ?>
                    <h2 class="title"><?php echo get_sub_field('zagolovok'); ?></h2>
                    <?php } if(get_sub_field('tekst')) { ?>
                    <div class="cooperation__subtitle"><?php echo get_sub_field('tekst'); ?></div>
                    <?php } if(have_rows('logotipy')): ?>
                    <div class="slider slider--cooperation">
                        <div class="slider__prev"></div>
                        <div class="swiper-wrapper">
                            <?php while(have_rows('logotipy')): the_row(); $img = get_sub_field('logotip'); ?>
                            <div class="cooperation__item swiper-slide">
                                <img class="cooperation__image" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                            </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="slider__next"></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php elseif( get_row_layout() == 'b13' ): ?>

    <section class="section">
        <div class="wrapper">
            <div class="container page-services service">
                <div class="service__articles">
                	<?php if(get_sub_field('zagolovok')) { ?>
                    <h3 class="title"><?php echo get_sub_field('zagolovok'); ?></h3>
                    <?php } if(have_rows('posty')): ?>
                    <div class="service__articles-wrapper">
                        <?php while(have_rows('posty')): the_row(); $idp = get_sub_field('post');  ?>
                        <a href="<?php the_permalink($idp); ?>" class="service__article">
                        	<?php if(has_post_thumbnail($idp)){ $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($idp),'full',true); ?>
                            <div class="service__image-wrapper">
                                <img src="<?php echo esc_url($thumb[0]); ?>" alt="<?php echo get_the_title($idp); ?>" class="service__image">
                            </div>
                            <?php } ?>
                            <div class="service__article-title"><?php echo get_the_title($idp); ?></div>
                        </a>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php elseif( get_row_layout() == 'b14' ): ?>

    <section class="section section--selection">
        <div class="wrapper wrapper--selection">
            <div class="container">
                <div class="banner banner--selection">
                	<?php if(get_sub_field('izo')) { $img = get_sub_field('izo'); ?>
                    <div class="banner__image-wrapper">
                        <img class="banner__image" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                    </div>
                    <?php } ?> 
                    <div class="banner__wrapper">
                    	<?php if(get_sub_field('zagolovok')) { ?>
                        <h1 class="banner__title"><?php echo get_sub_field('zagolovok'); ?></h1>
                        <?php } if(get_sub_field('tekst')) { ?>
                        <div class="banner__text"><?php echo get_sub_field('tekst'); ?></div>   
                        <?php } ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php elseif( get_row_layout() == 'b15' ): ?>
    
    <?php if(get_sub_field('tip') == 1) { ?>
    <section class="section section--why">
        <div class="wrapper wrapper--why">
            <div class="container">
                <div class="banner banner--why">
                    <div class="dots hide-on-mobile"></div>
                    <?php if(get_sub_field('izo')) { $img = get_sub_field('izo'); ?>
                    <div class="banner__image-wrapper">
                        <img class="banner__image" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                    </div>
                    <?php } ?>
                    <div class="banner__wrapper">
                    	<?php if(get_sub_field('zagolovok')) { ?>
                        <hr><h2 class="title"><?php echo get_sub_field('zagolovok'); ?></h2>
                        <?php } if(get_sub_field('tekst')) { ?>
                        <div class="banner__text"><?php echo get_sub_field('tekst'); ?></div>   
                        <?php } ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } elseif(get_sub_field('tip') == 3) { ?>
    <section class="section section--about">
        <div class="wrapper wrapper--about">
            <div class="container">
                <div class="banner banner--about">
                	<?php if(get_sub_field('izo')) { $img = get_sub_field('izo'); ?>
                    <div class="banner__image-wrapper">
                        <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="banner__image">
                    </div>
                    <?php } ?>
                    <div class="banner__wrapper">
                        <hr class="hide-on-mobile">
                        <?php if(get_sub_field('zagolovok')) { ?>
                        <h3 class="title"><?php echo get_sub_field('zagolovok'); ?></h3>
                        <?php } ?> 
                        <hr class="hide-on-desktop">
                        <?php if(get_sub_field('tekst')) { ?>
                        <div class="banner__text"><?php echo get_sub_field('tekst'); ?></div>   
                        <?php } ?> 
                    </div>
                </div>
                <div class="dots hide-on-mobile dots--about-right-top"></div>
            </div>
        </div>
    </section>
    <?php } else { ?>
    <section class="section section--work-with">
        <div class="wrapper">
            <div class="container">
                <div class="banner banner--work-with">
                	<?php if(get_sub_field('izo')) { $img = get_sub_field('izo'); ?>
                    <div class="banner__image-wrapper">
                        <img class="banner__image" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                        <div class="dots hide-on-mobile"></div>
                    </div>
                    <?php } ?> 
                    <div class="banner__wrapper">
                        <hr class="hide-on-mobile">
                        <?php if(get_sub_field('zagolovok')) { ?>
                        <h2 class="title"><?php echo get_sub_field('zagolovok'); ?></h2>
                        <?php } ?> 
                        <hr class="hide-on-desktop">
                        <?php if(get_sub_field('tekst')) { ?>
                        <div class="banner__text"><?php echo get_sub_field('tekst'); ?></div>
                        <?php } ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?> 

    <?php elseif( get_row_layout() == 'b16' ): ?>

    <section class="section section--services">
        <div class="wrapper">
            <div class="container">
                <div class="services">
                	<?php if(get_sub_field('zagolovok')) { ?>
                    <h3 class="title title--services"><?php echo get_sub_field('zagolovok'); ?></h3>
                    <hr class="hr--center hide-on-mobile" >
                    <?php } if(have_rows('bloki')): ?>
                    <div class="services__wrapper">
                    	<?php while(have_rows('bloki')): the_row(); ?>
                        <div class="service">
                        	<?php if(get_sub_field('nazvanie') or get_sub_field('ikonka')) { ?>
                            <div class="service__title service__title--<?php echo get_sub_field('ikonka'); ?>">
                                <?php echo get_sub_field('nazvanie'); ?>
                            </div>
                            <?php } if(get_sub_field('opisanie')) { ?>
                            <div class="service__text"><?php echo get_sub_field('opisanie'); ?></div>
                            <?php } if(get_sub_field('cena')) { ?>
                            <div class="service__price"><?php echo get_sub_field('cena'); ?></div>
                            <?php } ?>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php elseif( get_row_layout() == 'b17' ): ?>

    <section class="section section--process">
        <div class="wrapper">
            <div class="container">
                <div class="process">
                    <?php if(get_sub_field('zagolovok')) { ?> 
                    <h3 class="title"><?php echo get_sub_field('zagolovok'); ?></h3><hr>
                    <?php } if(have_rows('process')): ?>
                    <div class="process__items">
                        <?php $i = 0; while(have_rows('process')): the_row(); $i++; ?>
                        <div class="process__item">
                        	<?php $img = get_sub_field('ikonka'); ?>
                            <div class="process__item-image-wrapper">
                                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="process__item-image">
                            </div>
                            <div class="process__item-description">
                                <div class="process__item-index"><?php echo $i; ?></div>
                                <div class="process__item-text"><?php echo get_sub_field('tekst'); ?></div>    
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php elseif( get_row_layout() == 'b18' ): ?>

    <section class="section section--transfer">
        <div class="wrapper">
            <div class="container">
                <div class="transfer">
                	<?php if(get_sub_field('zagolovok')) { ?>
                    <h2 class="title"><?php echo get_sub_field('zagolovok'); ?></h2><hr>
                    <?php } if(have_rows('bloki')): ?>
                    <div class="transfer__items">
                    	<?php while(have_rows('bloki')): the_row(); ?>
                        <div class="transfer__item transfer__item--<?php echo get_sub_field('ioknka'); ?>"><?php echo get_sub_field('tekst'); ?></div>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php elseif( get_row_layout() == 'b19' ): ?>

    <section class="section section--articles">
        <div class="wrapper">
            <div class="container">
                <div class="articles hide-on-mobile articles--usefull">
                    <?php if(get_sub_field('zagolovok')) { ?>
                    <h3 class="title"><?php echo get_sub_field('zagolovok'); ?></h3>
                    <?php
                        }
                        if(get_sub_field('kolichestvo')) { $showposts = get_sub_field('kolichestvo'); } else { $showposts = 3; }
                        if(get_sub_field('kategoriya')) {
                            $result_filter = array('post_type'=>'post', 'cat'=>get_sub_field('kategoriya'), 'showposts'=>$showposts);
                        } else {
                        	$result_filter = array('post_type'=>'post', 'showposts'=>$showposts);

                        }
	                    query_posts($result_filter); if(have_posts()): ; 
                    ?> 
                    <div class="slider slider--articles">
                        <div class="slider__prev"></div>
                        <div class="swiper-wrapper">
                            <?php while(have_posts()): the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="articles__item article swiper-slide">
                            	<?php if(has_post_thumbnail()){ $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(),'full',true); ?>
                                <div class="article__image-wrapper">
                                    <img class="article__image" src="<?php echo esc_url($thumb[0]); ?>" alt="<?php the_title(); ?>" />
                                </div>
                                <?php } ?>
                                <div class="article__title"><?php the_title(); ?></div>
                                <div class="article__text"><?php echo get_the_excerpt(); ?></div>
                                <div class="article__date"><?php the_time("d.m.Y"); ?></div>
                            </a>
                            <?php endwhile;?>
                        </div>
                        <div class="slider__next"></div>
                    </div>
                    <?php endif; wp_reset_query(); ?>
                </div>                
            </div>
        </div>
    </section>

    <?php elseif( get_row_layout() == 'b20' ): ?>

    <section class="section">
        <div class="wrapper">
            <div class="container nurses">
            	<?php if(get_sub_field('zagolovok')) { ?>
                <h1 class="title title--nurses"><?php echo get_sub_field('zagolovok'); ?></h1>
                <?php } ?>
                <div class="nurses__items">
                    <?php
                        $result_filter = array('post_type'=>'caregivers', 'showposts'=>3);
	                    query_posts($result_filter); if(have_posts()): while(have_posts()): the_post(); 
	                   
                    ?>
                    <div class="nurses__item">
                        <div class="nurses__image-wrapper">
                            <?php $img = get_field('foto'); ?>
                            <img class="nurses__image" src="<?php echo $img['url']; ?>" alt="<?php the_title(); ?>">
                        </div>
                        <div class="nurses__wrapper">
                            <div class="nurses__name"><?php the_title(); ?></div>
                            <?php if(get_field('vozrast')) { ?>
                            <div class="nurses__age"><?php echo get_field('vozrast'); ?></div>
                            <?php } if(get_field('obrazovanie')) { ?>
                            <div class="nurses__education"><?php echo get_field('obrazovanie'); ?></div>
                            <?php } if(get_field('otzyvy')) { ?>
                            <div class="nurses__reviews"><?php echo get_field('otzyvy'); ?></div>
                            <?php } if(get_field('grazhdanstvo')) { ?>
                            <div class="nurses__citizenship nurses__citizenship--<?php echo get_field('grazhdanstvo'); ?>"></div>
                            <?php } ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="nurses__button">Подробнее</a>
                    </div>
                    <?php endwhile; endif; wp_reset_query(); ?>
                </div>
                <?php if(wp_count_posts('caregivers')->publish > 3) { ?>
                <div class="nurses__show-more">
                    <div class="nurses__show-more-wrapper">
                        <?php
                            $result_filter = array('post_type'=>'caregivers', 'offset'=>3, 'showposts'=>9999999999);
	                        query_posts($result_filter); if(have_posts()): while(have_posts()): the_post(); 
                        ?>
                        <div class="nurses__item">
                            <div class="nurses__image-wrapper">
                                <?php $img = get_field('foto'); ?>
                                <img class="nurses__image" src="<?php echo $img['url']; ?>" alt="<?php the_title(); ?>">
                            </div>
                            <div class="nurses__wrapper">
                                <div class="nurses__name"><?php the_title(); ?></div>
                                <?php if(get_field('vozrast')) { ?>
                                <div class="nurses__age"><?php echo get_field('vozrast'); ?></div>
                                <?php } if(get_field('obrazovanie')) { ?>
                                <div class="nurses__education"><?php echo get_field('obrazovanie'); ?></div>
                                <?php } if(get_field('otzyvy')) { ?>
                                <div class="nurses__reviews"><?php echo get_field('otzyvy'); ?></div>
                                <?php } if(get_field('grazhdanstvo')) { ?>
                                <div class="nurses__citizenship nurses__citizenship--<?php echo get_field('grazhdanstvo'); ?>"></div>
                                <?php } ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="nurses__button">Подробнее</a>
                        </div>
                        <?php endwhile; endif; wp_reset_query(); ?>
                    </div>
                    <button class="nurses__show-more-button">
                        Показать больше
                    </button>   
                </div>   
                <?php } ?>
            </div>
        </div>
    </section>

    <?php elseif( get_row_layout() == 'b21' ): ?>

    <section class="section section--request-form-nurse">
        <div class="wrapper--request-form-nurse">
            <div class="container">
                <div class="request-form-nurse">
                    <?php if(get_sub_field('zagolovok')) { ?>
                    <div class="title"><?php echo get_sub_field('zagolovok'); ?></div>
                    <?php } if(get_sub_field('forma')) { ?>
                    <div class="request-form-nurse__wrapper">
                        <div class="form">
                            <?php echo do_shortcode(get_sub_field('forma')); ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>    
                <div class="dots dots--left-top hide-on-mobile"></div>
                <div class="dots dots--right-top hide-on-mobile"></div>
            </div>
        </div>
    </section>

    <?php endif; ?>

<?php endwhile; endif; ?>          

<?php get_footer(); ?>