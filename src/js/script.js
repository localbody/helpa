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