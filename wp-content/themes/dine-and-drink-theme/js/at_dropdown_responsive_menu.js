jQuery(document).ready(function(){ 
	var touch 	= jQuery('#touch-menu');
	var menu 	= jQuery('.responsive_menu');

	jQuery(touch).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});
	
	jQuery(window).resize(function(){
		var w = jQuery(window).width();
		if(w > 767 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}
	});
	
});