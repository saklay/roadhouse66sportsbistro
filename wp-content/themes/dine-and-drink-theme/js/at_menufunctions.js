jQuery(document).ready(function(){
	var priceselect = jQuery('input[name=at_price]:checked').val();
	
	if(priceselect == 2){
		showmulti();
	}else if(priceselect == 1){
		showsingle();
	}else{
		jQuery('.div_multiprice').slideUp();
		jQuery('.div_singleprice').slideUp();
	}
	
	jQuery('#singleprice').click(function(){
		showsingle();
	});
	jQuery('#multiprice').click(function(){
		showmulti();
	});
	
	function showsingle(){
		jQuery('.div_singleprice').slideDown();
		jQuery('.div_multiprice').slideUp();
	}
	function showmulti(){
		jQuery('.div_multiprice').slideDown();
		jQuery('.div_singleprice').slideUp();
	}
								
});