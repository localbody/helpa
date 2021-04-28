function openPopup(popup) {
popup.addClass('popup--open');
$('body').addClass('lock');
}

function closePopup(popup) {
popup.removeClass('popup--open');
$('body').removeClass('lock');
}

function closePopups() {
closePopup($('.popup--open'));
$('body').removeClass('lock');
}

document.addEventListener('keydown', function (e) {
if (e.which === 27) {
    closePopups();
}
})

$('.popup-opener').click(
function (e) {
    e.preventDefault();
    closePopups();
    openPopup( $( '#popup-' + $(this).data('popup') ) );  
}
)

// для всех попапов, если кликнули по пустой области - закроем попап
$('.popup').click(
    function(e) {
       if (!e.target.closest('.popup__content') ) {
           e.preventDefault();
           closePopups();
       }
     }
)

$('.popup__close').click(
function() {
   // closePopup($(this).parents().find('.popup'));
   closePopups();
}
)  