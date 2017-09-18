//jQuery(function($){
//    $(document).ready(function(){ 
//		
//         //$(".toggle_container").hide();
//         $("h3.toggle").click(function(){
//			$(this).toggleClass("active").next().slideToggle("normal",'easeOutCirc');
//			return false; //Prevent the browser jump to the link anchor
//    	});
// 	});
//});
jQuery(document).ready(function() {
	jQuery('.toggle_wrapper .toggle').bind('click', function() {
		var maketoggle = jQuery(this).parent('.toggle_wrapper').find('.toggle_container');
		jQuery(maketoggle).slideToggle('normal','easeInCirc');
		jQuery(this).toggleClass('active');
		
		
		jQuery(this).find('.icon-plus-sign').toggleClass(function() {
			if (jQuery(this).is('.active')) {
				return 'icon-plus-sign';
            } else {
				return 'icon-minus-sign';
            }
		});
		
		return false;
	});
});
//jQuery(document).ready(function() {
//jQuery('h3.toggle').bind('click', function() {
//		var maketoggle = jQuery(this).parent('.toggle_wrapper').find('.toggle_container');
//		jQuery(maketoggle).slideToggle("normal",'easeOutCirc');
//		jQuery(this).toggleClass('active');
//		return false;
//	});
//								});