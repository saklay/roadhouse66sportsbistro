jQuery(document).ready(function(){
	function at_reponse(){
		//alert(data);
		jQuery('#at_save_div').slideDown().delay(2000).fadeOut();
	}
	
	function at_reponse2(){
		jQuery('#at_google_font_div').slideDown().delay(5000).fadeOut();
	}
	
	jQuery('#at_option_form').submit(function(){
		var form_values = jQuery("#at_option_form").serialize();
		
		jQuery.post(ajaxurl, form_values, function(response) {
			at_reponse();
			//jQuery(this).html(response);
		});
		
		return false; //Stop regular form submission

	});
	
	jQuery('#at_option_form').ready(function(){
						
		var form_values = jQuery("#at_option_form").serialize();
		jQuery.post(ajaxurl, form_values, function(response) {
			//jQuery(this).html(response);
		});
	});
	
	///////imageupload
	//var i = jQuery('li.field').size() + 1;
	
	
	jQuery('#add_remove_add').live('click', function() { 
			var subid = 0;
			var tmp = 0;
			var lastId = 0;
			jQuery(".add_remove_inputs").children().each(function(n, i) {
			  var id = this.id;
			  subid = id.substr(20);
			  
			   if(parseInt(subid) > tmp){
				  tmp = parseInt(subid);
				  lastId = parseInt(subid);
			  }
			});
			
			//var i = parseInt(subid)+1;
			var i = lastId+1;
			//alert(i);
			var addcontent = '<li class="field li_food_badge_list clearfix" id="fieldat01_badge_name'+i+'"><div class="accordion" id="accordionat01_badge_name'+i+'"><div class="accordion-group"><div class="food_badge_meta_info_set"><div class="accordion-heading clearfix"><div class="food_badge_div_delete"><a href="#"  class="add_remove_delete at_delete food_badge_delete" id="at01_badge_name'+i+'">x</a></div> <div class="food_badge_name">Name</div> <input name="at01_badge_name'+i+'" id="at01_badge_name'+i+'" value="" type="text" class="input_food_badge_name" size=""></a> </div><div id="collapseat01_badge_name'+i+'" class="accordion-body"><div class="accordion-inner">';
			
			addcontent += '<div class="food_badge_icon_url"> Icon URL <img src="" id="image_id_at01_badge_icon'+i+'" alt="image_id_at01_badge_icon'+i+'"></div> <input name="at01_badge_icon'+i+'" id="file_input_at01_badge_icon'+i+'" value="" type="text" class="food_badge_icon_url_input" size=""><div class="at_image_upload at_admin_white_button" id="at01_badge_icon'+i+'" style="display:inline">Upload Icon</div><span id="mestatus_at01_badge_icon'+i+'"></span> </div></div></div></div></div></li>';
			
			jQuery(addcontent).fadeIn('slow').appendTo('.add_remove_inputs');
			i++;
		jQuery('.at_image_upload').each(function(){
				//alert(jQuery(this).attr('id'));							 
			jQuery('input[id="'+jQuery(this).attr('id')+'"]').remove();
			
			var btnUpload = jQuery(this).attr('id');
			var mestatus = jQuery('#mestatus_'+btnUpload);
			var fileInput = jQuery('#file_input_'+btnUpload);
			var imageID = jQuery('#image_id_'+btnUpload);
			
			new AjaxUpload(btnUpload, {
				action: ajaxurl,
				name: btnUpload,
				data: {
					action: 'at_save_images',
					id: btnUpload
				  },
				onSubmit: function(file, ext){
					 if (! (ext && /^(jpg|png|jpeg|gif|ico)$/.test(ext))){ 
						// extension is not allowed 
						mestatus.text('Only JPG, PNG, GIF or ICO files are allowed');
						return false;
					}
					//mestatus.html('<img src="ajax-loader.gif" height="16" width="16">');
				},
				onComplete: function(file, response){
					
					fileInput.val(response);
					
					if(response==="error"){
						mestatus.text('Upload Failed!!');
					} else{
						mestatus.text('Image Uploaded Sucessfully!');
						imageID.attr("src", response);
						imageID.fadeIn();
					}
				}
			});
		});
		return false;
		
	});
	jQuery('.at_image_upload').each(function(){
		var btnUpload = jQuery(this).attr('id');
		var mestatus = jQuery('#mestatus_'+btnUpload);
		var fileInput = jQuery('#file_input_'+btnUpload);
		var imageID = jQuery('#image_id_'+btnUpload);
		
		new AjaxUpload(btnUpload, {
			action: ajaxurl,
			name: btnUpload,
			data: {
				action: 'at_save_images',
				id: btnUpload
			  },
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif|ico)$/.test(ext))){ 
                    // extension is not allowed 
					mestatus.text('Only JPG, PNG, GIF or ICO files are allowed');
					return false;
				}
				//mestatus.html('<img src="ajax-loader.gif" height="16" width="16">');
			},
			onComplete: function(file, response){
				
				fileInput.val(response);
				
				if(response==="error"){
					mestatus.text('Upload Failed!!');
				} else{
					mestatus.text('Image Uploaded Sucessfully!');
					imageID.attr("src", response);
					imageID.fadeIn();
				}
			}
		});
		
	});
	
	jQuery('#at01_load_theme1').click(function(){ ///spaketti
		//var form_values = jQuery("#at_default_theme_options").serialize();
		if(confirm('Are you sure you want to load the default theme options? All theme options will be reset to default.')){
			jQuery.post( ajaxurl ,  { action:"at_set_theme_options1",c:"True" } ,function(data){ 
				at_reponse();   
				location.reload();
				       
			});
		}
		
		return false;

	});
	jQuery('#at01_load_theme2').click(function(){ /// luxury
		//var form_values = jQuery("#at_default_theme_options").serialize();
		if(confirm('Are you sure you want to load the default theme options? All theme options will be reset to default.')){
			jQuery.post( ajaxurl ,  { action:"at_set_theme_options2",c:"True" } ,function(data){ 
				at_reponse();   
				location.reload();
				       
			});
		}
		
		return false;

	});
	jQuery('#at01_load_theme3').click(function(){ //cake
		//var form_values = jQuery("#at_default_theme_options").serialize();
		if(confirm('Are you sure you want to load the default theme options? All theme options will be reset to default.')){
			jQuery.post( ajaxurl ,  { action:"at_set_theme_options3",c:"True" } ,function(data){ 
				at_reponse();   
				location.reload();
				       
			});
		}
		
		return false;

	});
	jQuery('#at01_load_theme4').click(function(){ //coffee
		//var form_values = jQuery("#at_default_theme_options").serialize();
		if(confirm('Are you sure you want to load the default theme options? All theme options will be reset to default.')){
			jQuery.post( ajaxurl ,  { action:"at_set_theme_options4",c:"True" } ,function(data){ 
				at_reponse();   
				location.reload();
				       
			});
		}
		
		return false;

	});
	
	
	jQuery('#at01_load_theme5').click(function(){ //salad
		//var form_values = jQuery("#at_default_theme_options").serialize();
		if(confirm('Are you sure you want to load the default theme options? All theme options will be reset to default.')){
			jQuery.post( ajaxurl ,  { action:"at_set_theme_options5",c:"True" } ,function(data){ 
				at_reponse();   
				location.reload();
				       
			});
		}
		
		return false;

	});
	
	jQuery('.formbutton_loadcolor').click(function(){ 
		//alert(jQuery(this).attr('name'));
		var thisname = jQuery(this).attr('name').replace(/\s+/g, " ").trim();
		//var form_values = jQuery("#at_default_theme_options").serialize();
		if(confirm('Are you sure you want to load the '+thisname+' color scheme? All color will be reset.')){
			jQuery.post( ajaxurl ,  { action: 'at_color_scheme' ,c:"True",name:thisname  } ,function(data){ 
				at_reponse();   
				location.reload();
				       
			});
		}
		
		return false;

	});
	
	jQuery('#at01_load_widget').click(function(){
		//var form_values = jQuery("#at_default_theme_options").serialize();
		if(confirm('Are you sure you want to load the default widget settings? All widget settings will be reset to default.')){
			jQuery.post( ajaxurl ,  { action:"at_set_widgets",c:"True" } ,function(data){
				//location.reload();
				at_reponse();          
			});
		}
		
		return false;

	});
	
	jQuery('#at01_load_google_font').click(function(){
		//var form_values = jQuery("#at_default_theme_options").serialize();
		if(confirm('Are you sure you want to add all google fonts to your font list?')){
			jQuery.post( ajaxurl ,  { action:"at_set_google_font",c:"True" } ,function(data){
				//location.reload();
				at_reponse2();          
			});
		}
		
		return false;

	});
	
	//////color picker
	//jQuery('#colorpicker').farbtastic('#at01_theme_color');  
	
	
	////tab
	jQuery('#tabnav a').click(function (e) {
	  e.preventDefault();
	  jQuery(this).tab('show');
	});
	
	
	
	/////sort
	jQuery(function() {
		jQuery("#add_remove ul").sortable({ opacity: 0.8, cursor: 'move', update: function() {
			
			//var order = jQuery(this).sortable("serialize") + '&update=update'; 
			
			var order = jQuery(this).sortable("serialize");
			/*$.post("updateList.php", order, function(theResponse){
				jQuery("#response").html(theResponse);
				jQuery("#response").slideDown('slow');
				slideout();
				//alert(order);
			}); 	*/														 
		}								  
		});
	});
	
	////center on screen
		jQuery('#at_save_div').css("position","fixed");
		jQuery('#at_save_div').css("top", Math.max(0, ((jQuery(window).height() - jQuery('#at_save_div').outerHeight()) / 2) + 
													jQuery(window).scrollTop()) + "px");
		jQuery('#at_save_div').css("left", Math.max(0, ((jQuery(window).width() - jQuery('#at_save_div').outerWidth()) / 2) + 
													jQuery(window).scrollLeft()) + "px");
		
		jQuery('#at_google_font_div').css("position","fixed");
		jQuery('#at_google_font_div').css("top", Math.max(0, ((jQuery(window).height() - jQuery('#at_google_font_div').outerHeight()) / 2) + 
													jQuery(window).scrollTop()) + "px");
		jQuery('#at_google_font_div').css("left", Math.max(0, ((jQuery(window).width() - jQuery('#at_google_font_div').outerWidth()) / 2) + 
													jQuery(window).scrollLeft()) + "px");
	

	////add/remove dynamic
			
			jQuery('.add_remove_delete').live('click', function() { 
			//jQuery('.add_remove_delete').click(function() {
				jQuery('#field'+this.id).fadeOut(300, function() { jQuery(this).remove(); });
				//i--;
				return false;
			});
			 
			jQuery('#add_remove_reset').click(function() {
			while(i > 2) {
				jQuery('.field:last').remove();
				i--;
			}
			});
			
			
	//// add dynamic only text
	//var i = jQuery('li.field2').size() + 1;
	jQuery('#add_text_add').live('click', function() { 
			var subid = 0;
			var tmp = 0;
			var lastId = 0;
			jQuery(".add_text_inputs").children().each(function(n, i) {
			  var id = this.id;
			  subid = id.substr(22);
			  if(parseInt(subid) > tmp){
				  tmp = parseInt(subid);
			  	lastId = parseInt(subid);
				
			  }
			  
			});
			
			//var i = parseInt(subid)+1;
			var i = lastId+1;
			var addcontent = '<li class="field2 li_food_price_list" id="fieldat01_pricing_name'+i+'"><div class="portfolio_meta_info_set foodmenu_price_info_set clearfix"><a href="#" class="add_text_delete at_delete food_price_delete" id="at01_pricing_name'+i+'">x</a><div class="food_price_name">Name</div><input name="at01_pricing_name'+i+'" id="at01_pricing_name'+i+'" value="" type="text" class="price_input" size=""></div></li>';
			
			jQuery(addcontent).fadeIn('slow').appendTo('.add_text_inputs');
			i++;
			return false;
	  });
	jQuery('.add_text_delete').live('click', function() { 
	//jQuery('.add_text_delete').click(function() {
		//alert(this.id);
		jQuery('#field'+this.id).fadeOut(300, function() { jQuery(this).remove(); });
		//i--;
		return false;
	});
	
	
	jQuery('#at01_food_style2').click(function(){
		jQuery('.label_food_cat_side').slideDown();
	});
	
	jQuery('#at01_food_style1').click(function(){
		jQuery('.label_food_cat_side').slideUp();
	});
	
	jQuery('#at01_food_style3').click(function(){
		jQuery('.label_food_cat_side').slideUp();
	});
	
	if(jQuery('input[name=at01_food_style]:checked').val() == 2){
		jQuery('.label_food_cat_side').slideDown();
	}else{
		jQuery('.label_food_cat_side').slideUp();
	}
	
	jQuery('.above_menu').hide();
	jQuery('.overlap_menu').hide();
	jQuery('#at01_logo_position1').click(function(){
		jQuery('.above_menu').slideDown();
		jQuery('.overlap_menu').slideUp();
	});
	jQuery('#at01_logo_position2').click(function(){
		jQuery('.above_menu').slideUp();
		jQuery('.overlap_menu').slideDown();
	});
	
	if(jQuery('input[name=at01_logo_position]:checked').val() == 1){
		jQuery('.above_menu').slideDown();
	}else{
		jQuery('.overlap_menu').slideDown();
	}
	
});
