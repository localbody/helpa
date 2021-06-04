<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
    <?php if(is_singular('post') or is_category() or is_tag()) { ?>
    <style type="text/css"> .header .blog { background-color: #FCB721 !important; } </style>
    <?php } elseif(is_singular('caregivers')) { ?>
    <style type="text/css"> .header .caregivers { background-color: #FCB721 !important; } </style>
    <?php } ?>
</head>
<body>
    
    <section class="header header--shadow">
        <div class="wrapper">
            <div class="container">
                <div class="header__inner">
                    <div class="logo"></div>
                    <div class="header__wrapper">
                        <?php if(get_field('telefon','ts')) { ?>
                        <a class="header__phone" href="tel:<?php echo esc_html(str_replace(array(' ','(',')','-'),'',get_field('telefon','ts'))); ?>"><?php echo get_field('telefon','ts'); ?></a>
                        <?php } if(get_field('vremya','ts')) { ?>
                        <div class="header__worktime">
                            <span class="line-one"><?php echo get_field('vremya','ts'); ?></span>
                            <span class="line-two"><?php echo get_field('primechanie','ts'); ?></span>
                        </div>
                        <?php } if(get_field('dogovor','ts')) { ?>
                        <a download href="<?php echo get_field('dogovor','ts'); ?>" class="menu__etc-link menu__etc-link--doc">
                            <span>Типовой договор</span>
                        </a>
                        <?php } if(get_field('whatsapp','ts')) { ?>
                        <a href="https://api.whatsapp.com/send?phone=<?php echo get_field('whatsapp','ts'); ?>" class="menu__etc-link menu__etc-link--whatsapp">
                            Написать в WhatsApp
                        </a>
                        <?php } ?>
                    </div>
                    <button class="mobile-menu__button"></button>
                </div>
            </div>
        </div>
        <div class="wrapper wrapper--menu">
            <div class="container container--menu">
                <nav class="menu">
                    <ul class="menu__items">
                        <?php wp_nav_menu(array('theme_location'=>'primary', 'items_wrap'=>'%3$s', 'container'=>false, 'depth'=>2, 'walker'=>new True_Walker_Nav_Menu())); ?>
                    </ul>
                    <div class="menu__etc container">
                        <div class="menu__etc-items">
                            <?php if(get_field('dogovor','ts')) { ?>
                            <div class="menu__etc-item">
                                <a download href="<?php echo get_field('dogovor','ts'); ?>" class="menu__etc-link menu__etc-link--doc">
                                    <span>Типовой договор</span>
                                </a>
                            </div>
                            <?php } if(get_field('whatsapp','ts')) { ?>
                            <div class="menu__etc-item">
                                <a href="https://api.whatsapp.com/send?phone=<?php echo get_field('whatsapp','ts'); ?>" class="menu__etc-link menu__etc-link--whatsapp">Написать в WhatsApp</a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </nav>
            </div>            
        </div>        
    </section>
