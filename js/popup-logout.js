jQuery(document).ready(function($){
	$('.popup-confirm-logout').on('click', function(event){
		event.preventDefault();
		$('.cd-popup').addClass('is-visible');
	});
	
	$('.cd-popup').on('click', function(event){
		if( $(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup') || $(event.target).is('.no-toggle-popup') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
		}
	});
	$(document).keyup(function(event){
		if(event.which=='27'){
			$('.cd-popup').removeClass('is-visible');
		}
	});
    $(document).keypress(function(e) {
    	if (e.which == 13) {
    		$('.yes-toggle-popup').trigger('click');
    	}
    });

});

