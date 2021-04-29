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
        $('nav.menu').toggleClass('menu--open');
        $('.mobile-menu__button').toggleClass('mobile-menu__button--close');
    }
)

$('.menu__item--dropdown').click(
    function (e) {
        e.preventDefault();
        $(this).find('.menu__link--dropdown').toggleClass('menu__link--dropdown-open');
        $(this).find('.submenu__items').toggleClass('submenu__items--open');
    }

)

