
    <section class="footer">
        <div class="wrapper">
            <div class="footer__wrapper">
                <div class="footer-menu">
                    <?php if(get_field('menyu1','ts')) { $menu = wp_get_nav_menu_object(get_field('menyu1','ts')); ?>
                    <div class="footer-menu__wrapper">
                        <div class="footer-menu__title"><?php echo $menu->name; ?></div>
                        <div class="footer-menu__items">
                            <?php wp_nav_menu(array('menu'=>$menu->term_id, 'items_wrap'=>'%3$s', 'container'=>false, 'depth'=>1, 'walker'=>new True_Walker_Nav_Menu_footer())); ?>
                        </div>
                    </div>
                    <?php } if(get_field('menyu2','ts')) { $menu = wp_get_nav_menu_object(get_field('menyu2','ts')); ?>
                    <div class="footer-menu__wrapper">
                        <div class="footer-menu__title"><?php echo $menu->name; ?></div>
                        <div class="footer-menu__items">
                             <?php wp_nav_menu(array('menu'=>$menu->term_id, 'items_wrap'=>'%3$s', 'container'=>false, 'depth'=>1, 'walker'=>new True_Walker_Nav_Menu_footer())); ?>
                        </div>
                    </div>
                    <?php } if(get_field('menyu3','ts')) { $menu = wp_get_nav_menu_object(get_field('menyu3','ts')); ?>
                    <div class="footer-menu__wrapper">
                        <div class="footer-menu__title"><?php echo $menu->name; ?></div>
                        <div class="footer-menu__items">
                             <?php wp_nav_menu(array('menu'=>$menu->term_id, 'items_wrap'=>'%3$s', 'container'=>false, 'depth'=>1, 'walker'=>new True_Walker_Nav_Menu_footer())); ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="info">
                    <?php if(get_field('telefon','ts')) { ?>
                    <div class="info__item info__item--phone">
                        <a href="tel:<?php echo esc_html(str_replace(array(' ','(',')','-'),'',get_field('telefon','ts'))); ?>" class="info__item--link"><?php echo get_field('telefon','ts'); ?></a>
                    </div>
                    <?php } if(get_field('vremya','ts')) { ?>
                    <div class="info__item info__item--worktime">
                        <div class="info__item-wrapper">
                            <?php echo get_field('vremya','ts'); ?><br><span><?php echo get_field('primechanie','ts'); ?></span>
                        </div>
                    </div>
                    <?php } if(get_field('adres','ts')) { ?>
                    <div class="info__item info__item--address"><?php echo get_field('adres','ts'); ?></div>
                    <?php } if(get_field('whatsapp','ts') or get_field('telegram','ts')) { ?>
                    <div class="info__messengers">
                    	<?php if(get_field('telegram','ts')) { ?>
                        <a href="tg://resolve?domain=<?php echo get_field('telegram','ts'); ?>" class="info__telegram"></a>
                        <?php } if(get_field('whatsapp','ts')) { ?>
                        <a href="https://api.whatsapp.com/send?phone=<?php echo get_field('whatsapp','ts'); ?>" class="info__whatsapp"></a>
                        <?php } ?>
                    </div>
                    <div class="info__wtite-to">
                    	<?php if(get_field('whatsapp','ts')) { ?>
                        <a href="https://api.whatsapp.com/send?phone=<?php echo get_field('whatsapp','ts'); ?>" class="info__write-to-whatsapp">Написать в вотсап</a>
                        <?php } if(get_field('telegram','ts')) { ?>
                        <a href="tg://resolve?domain=<?php echo get_field('telegram','ts'); ?>" class="info__write-to-telegram">Написать телеграм</a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <?php if(get_field('kopirajt1','ts') or get_field('kopirajt2','ts')) { ?>
    <section class="copyright">
        <div class="wrapper">
            <div class="container">
                <div class="copyright__items">
                    <div class="copyright__item copyright__item--1"><?php echo get_field('kopirajt1','ts'); ?></div>
                    <div class="copyright__item copyright__item--2"><?php echo get_field('kopirajt2','ts'); ?></div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <div id="popup-request-ok" class="popup popup--request-ok">
        <div class="popup__body">
            <div class="popup__content">
                <button class="popup__close"></button>
                <div class="popup__title">Ваша заявка принята!</div>
                <div class="popup__description">Наши специалисты свяжутся с вами в самое ближайшее время</div>
                <hr>
            </div>
        </div>
    </div>
    
    <?php if(have_rows('formy','ts')): while(have_rows('formy','ts')): the_row(); ?>
    <div id="popup-<?php echo get_sub_field('id'); ?>" class="popup popup--<?php if(get_sub_field('tekst')) { echo 'selection'; } else { echo 'transfer'; } ?>">
        <div class="popup__body">
            <div class="popup__content">
                <button class="popup__close"></button>
                <?php if(get_sub_field('zagolovok')) { ?>
                <div class="popup__title"><?php echo get_sub_field('zagolovok'); ?></div>
                <hr>
                <?php } ?>
                <div class="popup__description">
                	<?php if(get_sub_field('tekst')) { ?><div class="popup__text"><?php echo get_sub_field('tekst'); ?></div><?php } ?>
                    <div class="form">
                    	<?php echo do_shortcode(get_sub_field('forma')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; endif; ?>

    <div id="popup-selection" class="popup popup--selection">
        <div class="popup__body">
            <div class="popup__content">
                <button class="popup__close"></button>
                <div class="popup__title">Заказать подбор сиделки</div>
                <hr>
                <div class="popup__description">
                    <div class="popup__text">Укажите свой номер телефона и вы сможете получить ответ на все интересующие вас вопросы</div> 
                    <form class="form" action="">
                        <input class="form__input" type="text" placeholder="Ваш телефон">
                        <button type="submit" class="form__button">Отправить заявку</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/swiper-bundle.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/popup.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/template.js"></script>
    <?php wp_footer(); ?>

</body>
</html>