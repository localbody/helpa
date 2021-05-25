$(document).ready(function(){

    $('body').on('click', '.popup-opener', function(e){
	   if($(this).data('title')) {
           $('.title_input').val($(this).data('title'));
	   } else {
	       $('.title_input').val('');
	   }
	});

});

if($("div").hasClass("wpcf7")) {
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        closePopups();
        openPopup($('#popup-request-ok')); 
    }, false );
    document.addEventListener( 'wpcf7mailfailed', function( event ) {
       alert('ERROR');    
    }, false );
}