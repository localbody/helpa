const swiper = new Swiper('.slider--cooperation', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: 5,
    spaceBetween: 30,
    cssMode: true,
    uniqueNavElements: false,
    setWrapperSize: true,
    width: 1010,

    // Navigation arrows
    navigation: {
      nextEl: '.slider__next',
      prevEl: '.slider__prev',
    },
});

const swiper2 = new Swiper('.slider--articles', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: 3,
    spaceBetween: 50,
    cssMode: true,
    uniqueNavElements: false,
    setWrapperSize: true,
    width: 1000,
  
    // Navigation arrows
    navigation: {
      nextEl: '.slider__next',
      prevEl: '.slider__prev',
    },
});

$('.filters__item').click(
    function () {
        if ($(this).hasClass('filters__item--open')) {
            $(this).removeClass('fi5ters__item--open')
        } else {
           $('.filters__item.filters__item--open').removeClass('filters__item--open');
           $(this).addClass('filters__item--open');
        }

        $(this).find('.filters__item-input').attr('value', $(this).find('.filters__item-value').html());
        
    }
)

$('.filters__item-option').click(
    function() {
        $(this).parents('.filters__item-wrapper').find('.filters__item-value').html($(this).html());
    }
)

$('.archive__item').click(
    function (e) {

        if ( $(this).hasClass('archive__item--active') ) {
            $(this).removeClass('archive__item--active');
        } else {
            $('.archive__item.archive__item--active').removeClass('archive__item--active');
            $(this).addClass('archive__item--active');
        }
    }
)


$('.archive__sub-item').click(
    function (e) {
        
        e.stopPropagation();

        if ( $(this).hasClass('archive__sub-item--active') ) {
            $(this).removeClass('archive__sub-item--active');
        } else {
            $('.archive__sub-item.archive__sub-item--active').removeClass('archive__sub-item--active');
            $(this).addClass('archive__sub-item--active');
        }

    }
)

$('.service__show-more').click(
    function () {
        $('.service__items-wrapper').toggleClass('service__items-wrapper--open');
    }
)

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
        // e.preventDefault();
        $(this).find('.menu__link--dropdown').toggleClass('menu__link--dropdown-open');
        $(this).find('.submenu__items').toggleClass('submenu__items--open');
    }
)



