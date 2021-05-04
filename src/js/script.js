$('.nurses__show-more-button').click(
    function () {

        $('.nurses__show-more').toggleClass('nurses__show-more--open');

        if ( $('.nurses__show-more').hasClass('nurses__show-more--open')) {
            $(this).html('Скрыть')
        } else {
            $(this).html('Показать больше')

            $("html").animate(
                {
                  scrollTop: $(".nurses__show-more").offset().top
                },
                800 //speed
              );
        }

    }
)

$('.filters__button').click(
    function () {
        console.log( $(this).parent('filters') );

        $(this).parent('.filters').toggleClass('filters--open');
    }
)

$('.faq__item-question').click(
    function () {

        let faq = $(this).parent('.faq__item');

        if ( faq.hasClass('faq__item--open') ) {
            faq.removeClass('faq__item--open')
        } else {
            $('.faq__item.faq__item--open').removeClass('faq__item--open');
            faq.addClass('faq__item--open');
        }
        
    }
)

$('.footer-menu__title').click(
    function () {

        if ( $(this).hasClass('footer-menu__title--open')) {
            $(this).removeClass('footer-menu__title--open');
            $(this).parent().find('.footer-menu__items').removeClass('footer-menu__items--open');
        } else {
            // закроем открытые
            $('.footer-menu').find('.footer-menu__title').removeClass('footer-menu__title--open');
            $('.footer-menu').find('.footer-menu__items').removeClass('footer-menu__items--open');

            $(this).addClass('footer-menu__title--open');
            $(this).parent().find('.footer-menu__items').addClass('footer-menu__items--open');
        }

    }
);

$('.mobile-menu__button').click(
    function () {
        $('.mobile-menu__button').toggleClass('mobile-menu__button--close');
        $('nav.menu').toggleClass('menu--open');
    }
)

$('.menu__item--dropdown').click(
    function (e) {
        e.preventDefault();
        $(this).find('.menu__link--dropdown').toggleClass('menu__link--dropdown-open');
        $(this).find('.submenu__items').toggleClass('submenu__items--open');
    }
)



