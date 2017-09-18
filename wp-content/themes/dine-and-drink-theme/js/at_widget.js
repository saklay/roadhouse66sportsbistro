/*jQuery(document).ready(function(){
								
	alert('12');
	for(var i=1;i<=3;i++){
		jQuery('[id$="at_box'+i+'_type1"]').hide();
		jQuery('[id$="at_box'+i+'_type2"]').hide();
		jQuery('[id$="at_box'+i+'_type3"]').hide();
		jQuery('[id$="at_box'+i+'_type4"]').hide();
		
	}
});*/

function boxselect(thisid){
	///// box widget
	var selectid = thisid.id; //widget-at_boxes_widget-16-at_type_select_box1
	
	
	var wid = selectid.slice(23,-20);
	var boxid = selectid.slice(-1);
	
	
	if(wid != "__i__"){
		jQuery('#widget-at_boxes_widget-'+wid+'-at_box'+boxid+'_type4').hide(); //widget-at_boxes_widget-16-at_box1_type1
		jQuery('#widget-at_boxes_widget-'+wid+'-at_box'+boxid+'_type1').hide();
		jQuery('#widget-at_boxes_widget-'+wid+'-at_box'+boxid+'_type2').hide();
		jQuery('#widget-at_boxes_widget-'+wid+'-at_box'+boxid+'_type3').hide();
		 
		 
		
		if(thisid.value == 1){
			jQuery('#widget-at_boxes_widget-'+wid+'-at_box'+boxid+'_type1').slideDown();
			jQuery('#widget-at_boxes_widget-'+wid+'-at_box'+boxid+'_type2').hide();
			jQuery('#widget-at_boxes_widget-'+wid+'-at_box'+boxid+'_type3').hide();
			jQuery('#widget-at_boxes_widget-'+wid+'-at_box'+boxid+'_type4').hide();
			
		}else if(thisid.value == 2){
			jQuery('#widget-at_boxes_widget-'+wid+'-at_box'+boxid+'_type2').slideDown();
			jQuery('#widget-at_boxes_widget-'+wid+'-at_box'+boxid+'_type1').hide();
			jQuery('#widget-at_boxes_widget-'+wid+'-at_box'+boxid+'_type3').hide();
			jQuery('#widget-at_boxes_widget-'+wid+'-at_box'+boxid+'_type4').hide();
			
		}else if(thisid.value == 3){
			jQuery('#widget-at_boxes_widget-'+wid+'-at_box'+boxid+'_type3').slideDown();
			jQuery('#widget-at_boxes_widget-'+wid+'-at_box'+boxid+'_type1').hide();
			jQuery('#widget-at_boxes_widget-'+wid+'-at_box'+boxid+'_type2').hide();
			jQuery('#widget-at_boxes_widget-'+wid+'-at_box'+boxid+'_type4').hide();
		}else if(thisid.value == 4){
			jQuery('#widget-at_boxes_widget-'+wid+'-at_box'+boxid+'_type4').slideDown();
			jQuery('#widget-at_boxes_widget-'+wid+'-at_box'+boxid+'_type1').hide();
			jQuery('#widget-at_boxes_widget-'+wid+'-at_box'+boxid+'_type2').hide();
			jQuery('#widget-at_boxes_widget-'+wid+'-at_box'+boxid+'_type3').hide();
		}
	}
								
}
function boxradio(thisid){
	
	var selectid = thisid.id; //widget-at_home_food_widget-2-tag_cate1
	
	var wid = selectid.slice(27,-9);
	
	var boxid = jQuery('input:radio[id=widget-at_home_food_widget-'+wid+'-tag_cate]:checked').val();
	
	//var boxid = thisid.value;
	
	//alert(wid+" "+boxid);
	
	if(boxid == 1){
		
		jQuery('#div_radio_widget-at_home_food_widget-'+wid+'-tag_cate1').slideDown();//div_radio_widget-at_home_food_widget-11-tag_cate1
		jQuery('#div_radio_widget-at_home_food_widget-'+wid+'-tag_cate2').slideUp();
			
	}else if(boxid == 2){
		jQuery('#div_radio_widget-at_home_food_widget-'+wid+'-tag_cate2').slideDown();//div_radio_widget-at_home_food_widget-11-tag_cate1
		jQuery('#div_radio_widget-at_home_food_widget-'+wid+'-tag_cate1').slideUp();
		
	}

}

function boxradio_weekly(thisid){
	
	var selectid = thisid.id; //widget-at_home_food_widget-2-tag_cate1
	
	var wid = selectid.slice(29,-9);
	
	var boxid = jQuery('input:radio[id=widget-at_weekly_menu_widget-'+wid+'-tag_cate]:checked').val();//widget-at_weekly_menu_widget-2-tag_cate
	
	//var boxid = thisid.value;
	
	//alert(wid+" "+boxid);
	
	if(boxid == 1){
		jQuery('#div_radio_widget-at_weekly_menu_widget-'+wid+'-tag_cate1').slideDown();//div_radio_widget-at_home_food_widget-11-tag_cate1
		jQuery('#div_radio_widget-at_weekly_menu_widget-'+wid+'-tag_cate2').slideUp();
			
	}else if(boxid == 2){
		jQuery('#div_radio_widget-at_weekly_menu_widget-'+wid+'-tag_cate2').slideDown();//div_radio_widget-at_home_food_widget-11-tag_cate1
		jQuery('#div_radio_widget-at_weekly_menu_widget-'+wid+'-tag_cate1').slideUp();
		
	}

}