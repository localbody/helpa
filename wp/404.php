<?php get_header(); ?>

    <section class="section--404">
        <div class="wrapper">
            <div class="container">
                <div class="banner banner--404">
                    <div class="banner__image-wrapper">
                        <img class="banner__image" src="<?php bloginfo('template_url'); ?>/images/banners/404.svg" alt="Ошибка 404">
                    </div>
                    <div class="banner__wrapper">
                        <div class="banner__title">
                            Ошибка <span>404</span>
                        </div>
                        <div class="banner__text">
                            Ошибка 404 означает, что страница, которую вы искали, не существует. Возможно она была удалена, возможно Вы набрали неправильный адрес.
                        </div>
                        <div class="banner__links">
                            <a href="<?php bloginfo('url'); ?>/" class="button--goto-main">Вернуться на главную</a>
                            <a href="<?php if($_SERVER['HTTP_REFERER']) { echo $_SERVER['HTTP_REFERER']; } else { echo get_bloginfo('url').'/'; } ?>" class="button--go-back">Вернуться назад</a>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </section>
					
<?php get_footer(); ?>