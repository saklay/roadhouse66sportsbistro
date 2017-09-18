<?php 

function create_custom_css(){
	/////create customize.css
	$importfont = array();
	if(substr(get_option('at01_font_content'), 0, 1) == "_"){ $font1_content = substr(get_option('at01_font_content'), 1); 
		array_push($importfont,$font1_content);
	}else{ $font1_content = get_option('at01_font_content'); }
	$font2_content = str_replace('+',' ',$font1_content);
	
	if(substr(get_option('at01_font_head'), 0, 1) == "_"){ $font1_head = substr(get_option('at01_font_head'),1);
		array_push($importfont,$font1_head);
	}else{ $font1_head = get_option('at01_font_head'); }
	$font2_head = str_replace('+',' ',$font1_head);
	
	if(substr(get_option('at01_font_navi'), 0, 1) == "_"){ $font1_navi = substr(get_option('at01_font_navi'), 1);
		array_push($importfont,$font1_navi);
	}else{ $font1_navi = get_option('at01_font_navi'); }
	$font2_navi = str_replace('+',' ',$font1_navi);
		
		$p = "";
		if(!empty($importfont)){
			$p .= "@import url(http://fonts.googleapis.com/css?family=".implode('|',$importfont).");\n";
		}
		$p .= ".main_font,h1,h2,h3,h4,h5,h6,.header_reservation,.page_title_text,.widget_title,.post-meta-published,a.readmore,.wp-pagenavi,.food-menu-widget-title-text,.food-menu-widget-price-text,.food_menu_sticky nav li a, #isotope-filter ul li a, .flex-title ,ul.nav-tabs.nav li a, .accordion-heading, .pullquote, blockquote p, .ui-datepicker .ui-datepicker-title { font-family: '".$font2_head."'; font-weight:normal; }\n";
		
		$content_size = (get_option('at01_font_content_size') == -1)? 13 : get_option('at01_font_content_size');
		$p .= "body{ font-family: '".$font2_content."'; font-size:".$content_size."px; } \n";
		
		$fontsize_minus_two = $content_size -2;
		$fontsize_minus_one = $content_size - 1;
		$fontsize_plus_one  = $content_size +1;
		$fontsize_plus_two  = $content_size + 2;
		$fontsize_plus_three = $content_size + 3;
		
		$p .= ".sidebar .AT_opening_hours_widget ul.opening_hours_list, #respond p.form-allowed-tags{ font-size:".$fontsize_minus_two."px; } \n";
		$p .= ".widget_search #s, .recent-post-title, .comment-edit-link, .comment-reply-link, .tagcloud a, #reservation_me ol.forms li label, #contact_me ol.forms li label,  span.reservationerror, .tweet-time{  font-size:".$fontsize_minus_one."px !important; } \n";
		$p .= "table#wp-calendar caption {  font-size:".$fontsize_plus_one."px; } \n";
		$p .= ".single-post-date-text, .single-post-comment-text, .post-meta-month{  font-size:".$fontsize_plus_two."px; } \n";
		$p .= ".AT_stunning_text_widget .home-stunning-text-button , .food_menu_text_price.single_price, .food_menu_price_number, .food_menu_small_image_name, .food_menu_small_image_price.single_price, .food_menu_text_name{ font-size:".$fontsize_plus_three."px; } \n";
		
		
		
		$p .= ".main_menu .nav li a{ font-family: '".$font2_navi."'; font-size:".get_option('at01_font_navi_size')."px; }\n";
		$font_nav_size_minus_two = get_option('at01_font_navi_size') - 2;
		if(get_option('at01_resposive') == 'true'){
			$p .= "@media (min-width: 768px) and (max-width: 979px){";
			$p .= ".main_menu .nav li a{ font-size:".$font_nav_size_minus_two."px; }\n";
			$p .= "}";
		}
		
		
		$p .= ".header_logo{ top:".get_option('at01_logo_pos_top')."px; }\n";
		$p .= ".header_mainmenu.logo_above_menu .header_logo{ left:".get_option('at01_logo_pos_left')."px; }\n";
		$p .= ".header{ height:".get_option('at01_top_height')."px; }\n";
		
		
		
		if((get_option('at01_resposive') == 'true') & (get_option('at01_logo_pos_top') > 0)){
			$p .= "@media (max-width: 767px) {";
			$p .= ".header_logo{ margin:20px auto; }\n";
			$p .= "}";
			$p .= "@media (max-width: 480px) {";
			$p .= ".header_logo{ margin:15px auto; }\n";
			$p .= "}";
		}
		
		
		if(has_nav_menu('header-menu')){
			if(get_option("at01_logo_position") == 2 && get_option("at01_logo_position_overlap") == 2){ /// logo at center
				////find center item
				$menu_name = 'header-menu';
				$locations = get_nav_menu_locations();
				$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
				$menu_item = wp_get_nav_menu_items($menu->term_id);
				$menu_count = 0;
				foreach($menu_item as $val){
					if($val->menu_item_parent == 0){
						//echo $val->title;
						$menu_count++;
					}
				}
				$menu_center_item = ceil($menu_count/2);
			}
		}
		
		$logo_space_divine_by_two = get_option('at01_logo_space')/2;
		$menu_right_width = 470 - $logo_space_divine_by_two;
		$logo_space_divine_by_two_ipad = $logo_space_divine_by_two * 0.76;
		$menu_right_width_ipad = $menu_right_width * 0.76;
		
		list($logowidth, $logoheight) = getimagesize(get_option('at01_logo_url'));
		$logo_width_ipad = $logowidth * 0.72;
		
		$p .= ".header_mainmenu.logo_overlap_menu_center .sf-menu.menu_left{ margin-right:".$logo_space_divine_by_two."px; }\n";	
		$p .= ".header_mainmenu.logo_overlap_menu_center .sf-menu.menu_right{ margin-left:".$logo_space_divine_by_two."px; }\n";	
		$p .= ".header_mainmenu.logo_overlap_menu_center .sf-menu.menu_right{ width:".$menu_right_width."px; }\n";	
		
		if(get_option('at01_resposive') == 'true'){
			
			$p .= "@media (min-width: 768px) and (max-width: 979px){";
			$p .= ".header_mainmenu.logo_overlap_menu_center .sf-menu.menu_left{ margin-right:".$logo_space_divine_by_two_ipad."px; }\n";	
			$p .= ".header_mainmenu.logo_overlap_menu_center .sf-menu.menu_right{ margin-left:".$logo_space_divine_by_two_ipad."px; }\n";	
			$p .= ".header_mainmenu.logo_overlap_menu_center .sf-menu.menu_right{ width:".$menu_right_width_ipad."px; }\n";	
			$p .= ".header_mainmenu.logo_overlap_menu_center .header_logo img{ width:".$logo_width_ipad."px; }\n";
			$p .= "}";
		}
		
		
		if(get_option('at01_header_bg_color')==""){
		}else{
			$p .= ".header_mainmenu{ background-color:".get_option('at01_header_bg_color').";}\n";
		}
		if(get_option('at01_header_bg_img')==""){
			$p .= ".header_mainmenu{ background-image:none;}\n";
		}else{
			$p .= ".header_mainmenu{ background-image:url(".get_option('at01_header_bg_img').");}\n";
		}
		
		
		if(get_option('at01_header_bg_img_x')== -1){
			$at01_header_bg_img_x_value = "left";
		}
		else{
			$at01_header_bg_img_x_value = get_option('at01_header_bg_img_x');
		}
		if(get_option('at01_header_bg_img_y')== -1 ){
			$at01_header_bg_img_y_value = "top";
		}
		else{
			$at01_header_bg_img_y_value = get_option('at01_header_bg_img_y');
		}
		
		$p .= ".header_mainmenu{ background-position:".$at01_header_bg_img_x_value." ".$at01_header_bg_img_y_value."; }\n";	
		
		if(get_option('at01_header_bg_img_repeat')== -1 ){
			
		}else{
			$p .= ".header_mainmenu{ background-repeat:".get_option('at01_header_bg_img_repeat')."; }\n";	
		}
		
		$p .= ".header_social_icon{ background-color:".get_option('at01_header_social')."; }\n";
		$p .= ".header_social_icon i{ color:".get_option('at01_header_social_text')."; }\n";
		if(get_option('at01_header_dotline')==""){
			$p .= ".main_menu{ border-top:none;}\n";
		}else{
			$p .= ".main_menu{ border-top-color:".get_option('at01_header_dotline').";}\n";
		}
		
		//  Level 1 : Background color */
		if(get_option('at01_lv1_bg')==""){  
			$p .= ".main_menu{ background-color:none;}\n";
		}else{
			$p .= ".main_menu{ background-color:".get_option('at01_lv1_bg').";}\n"; 
		}
		$p .= ".sf-menu a{ color:".get_option('at01_lv1_link')."; }\n";
		$p .= ".sf-menu a:hover, .sf-menu li.current-menu-item a{ color:".get_option('at01_lv1_hover')." }\n";
	
		
		//  Level 2 : Background color */
		$p .= ".sf-menu li ul.sub-menu li a,
			#touch-menu,
			.main_menu_dropdown ul.responsive_menu li a,
			.main_menu_dropdown ul.sub-menu li a
			{ color:".get_option('at01_lv2_link')." !important; }\n";
			
		$p .= ".sf-menu li ul.sub-menu li:hover a, .sf-menu li ul.sub-menu li a:hover, .sf-menu li ul.sub-menu li.current-menu-item a,
		#touch-menu:hover,
		.main_menu_dropdown ul.responsive_menu li a:hover,
		.main_menu_dropdown ul.responsive_menu li:hover > a,
		.main_menu_dropdown ul.sub-menu li a:hover,
		.main_menu_dropdown ul.sub-menu li:hover > a
		{ color:".get_option('at01_lv2_hover')." !important; }\n";
		
		$p .= ".sf-menu li ul.sub-menu li:hover , .sf-menu li ul.sub-menu li.current-menu-item,
		.main_menu_dropdown ul.responsive_menu li a:hover,
		.main_menu_dropdown ul.responsive_menu li:hover > a,
		.main_menu_dropdown ul.sub-menu li a:hover,
		.main_menu_dropdown ul.sub-menu li:hover > a
		{ border-left-color:".get_option('at01_lv2_hover')."; }\n";
		
		
		//  Level 3 : Background color */
		$p .= ".sf-menu li ul.sub-menu li ul.sub-menu li a{ color:".get_option('at01_lv2_link')." !important; }\n";
		$p .= ".sf-menu li ul.sub-menu li ul.sub-menu li:hover a, .sf-menu li ul.sub-menu li ul.sub-menu li a:hover,
		.sf-menu li ul.sub-menu li ul.sub-menu li.current-menu-item a
		{ color:".get_option('at01_lv2_hover')." !important; }\n";
		$p .= ".sf-menu li li li:hover , .sf-menu li.current-menu-item {border-left-color:".get_option('at01_lv2_hover')."; }\n";
		
		
		$main_menu_lv2_background = hex2rgb(get_option('at01_lv2_bg'));
		$p .= ".sf-menu li li{ background-color:rgba(".$main_menu_lv2_background[0].",".$main_menu_lv2_background[1].",".$main_menu_lv2_background[2].",".get_option('at01_bg_opacity')."); }\n";
		
		$p .= ".main_menu_dropdown .mobile-menu, 
		.main_menu_dropdown .mobile-menu:hover,
		.main_menu_dropdown .responsive_menu li a,
		.main_menu_dropdown .responsive_menu li a:hover,
		.main_menu_dropdown .sub-menu li a,
		.main_menu_dropdown .sub-menu li a:hover
		{ background-color:".get_option('at01_lv2_bg')."; }\n";
		
		$p .=".main_menu_dropdown ul.responsive_menu li a,
		.main_menu_dropdown ul.sub-menu li a{ border-left-color:".get_option('at01_lv2_bg')."; }\n";
		
		
		///OOOO Body */
		
		if(get_option('at01_body_bg_color')==""){
			$p .= "body, .home_slider_container{ background-color:none;}\n";
		}else{
			$p .= "body, .home_slider_container{ background-color:".get_option('at01_body_bg_color').";}\n";
		}
		
		$p .= ".sf-menu li.current-menu-item a:after, .main_menu_dropdown:after{ border-bottom-color:".get_option('at01_body_bg_color').";}\n";
		
		
		if(get_option('at01_body_bg_img')==""){
			$p .= "body{ background-image:none;}\n";
		}else{
			$p .= "body{ background-image:url(".get_option('at01_body_bg_img').");}\n";
		}
		if(get_option('at01_body_bg_img_x')== -1){
			$at01_body_bg_img_x_value = "left";
		}else{
			$at01_body_bg_img_x_value = get_option('at01_body_bg_img_x');
		}
		if(get_option('at01_body_bg_img_y')== -1 ){
			$at01_body_bg_img_y_value = "top";
		}else{
			$at01_body_bg_img_y_value = get_option('at01_body_bg_img_y');
		}
		$p .= "body{ background-position:".$at01_body_bg_img_x_value." ".$at01_body_bg_img_y_value."; }\n";	

		if(get_option('at01_body_bg_img_repeat')== -1 ){
		}
		else{
			$p .= "body{ background-repeat:".get_option('at01_body_bg_img_repeat')."; }\n";	
		}
		
		$p .= ".page_title_ribbon{ background-color:".get_option('at01_body_color_ribbon').";  } \n";
		$p .= ".page_title_ribbon:after { border-left-color: ".get_option('at01_body_color_ribbon')."; border-right-color: ".get_option('at01_body_color_ribbon')."; }\n";
		$p .= ".page_title_ribbon i{ color:".get_option('at01_body_color_ribbon_icon')."; }\n";
		$p .= "h1.page_title_text, .comments_wrap h3.widget_title_text, .respond_wrap h3.widget_title_text, .home_widgets h3.widget_title_text, #reply-title .widget_title_text
		{ color:".get_option('at01_body_color_title')."; }\n";
		$p .= ".page_title_container, .sidebar .widget_title, .food_menu_recommended, .widget_title, .home_widgets .widget, .wp-pagenavi a, .wp-pagenavi span, .divider.gallery-divider{ 
		border-color:".get_option('at01_body_color_dotline')." !important; }\n";
		$p .= ".wp-pagenavi a, .wp-pagenavi span{ 
		color:".get_option('at01_body_color_pagenavi_text')."; }\n";
		$p .= ".wp-pagenavi a:hover, .wp-pagenavi span:hover, .wp-pagenavi span.current{ 
		color:".get_option('at01_body_color_pagenavi_text_hover')."; }\n";
		
		$p .= ".wp-pagenavi a, .wp-pagenavi span{ background-color:".get_option('at01_body_color_pagenavi_bg')."; } .wp-pagenavi a:first-child:before, .wp-pagenavi span:first-child:before{ border-right-color: ".get_option('at01_body_color_pagenavi_bg').";  } .wp-pagenavi a:last-child:after, .wp-pagenavi span:last-child:after{  border-left-color: ".get_option('at01_body_color_pagenavi_bg').";  }\n";
		
		$p .= ".wp-pagenavi a:hover, .wp-pagenavi span:hover, .wp-pagenavi span.current { 
		background-color:".get_option('at01_body_color_pagenavi_bg_hover')."; } 
		.wp-pagenavi a:first-child:hover:before, .wp-pagenavi span:first-child:hover:before, span:first-child:before, span.current:before, span.current:after, span.current:first-child:before{   
		border-right-color: ".get_option('at01_body_color_pagenavi_bg_hover').";  } 
		.wp-pagenavi a:last-child:hover:after, .wp-pagenavi a.current:last-child:after, .wp-pagenavi span.current:last-child:after{  
		border-left-color: ".get_option('at01_body_color_pagenavi_bg_hover').";  } \n";
	
		
		///OO Sidebar */
		$p .= ".sidebar .widget_title_ribbon, .sidebar .food-menu-widget-badge-icon, .sidebar .widget_search .input-append .add-on, .sidebar .food-menu-widget-money, .sidebar .teaser_icon_title{ background-color: ".get_option('at01_sidebar_color_ribbon')."; } .sidebar .widget_title_ribbon:after, .sidebar .food-menu-widget-badge-icon:before{     border-left-color: ".get_option('at01_sidebar_color_ribbon')."; border-right-color: ".get_option('at01_sidebar_color_ribbon')."; } .sidebar .food-menu-widget-money:after {  border-left-color: ".get_option('at01_sidebar_color_ribbon')."; } .sidebar .widget_search .input-append .add-on:before{  border-right-color: ".get_option('at01_sidebar_color_ribbon')."; }\n";
		
		$p .= ".sidebar i{ color:".get_option('at01_sidebar_color_ribbon_icon')."; }\n";
		$p .= ".sidebar .widget_title_text{ color:".get_option('at01_sidebar_color_title')."; }\n";
		
		///OOOOOOO Content */
		$p .= ".post, .type-menu, .type-gallery, .type-attachment, .entry-content-inner, .home_widgets .widget ul, .sidebar .widget ul, .tagcloud a, .home-special-boxes, .home-stunning-text-area, .AT_home_food_widget .home-food-wrap, .home-gallery-wrap, .home_widgets .food-menu-widget, .sidebar .food-menu-widget, .food-menu-widget, .home_widgets .recent-post, .sidebar .recent-post, .comment-box, #commentform, .home_widgets .textwidget, .sidebar .textwidget, .AT_fourboxes_widget .teaser_box, .home_widgets table#wp-calendar td, .sidebar table#wp-calendar td, .home_widgets table#wp-calendar tfoot tr td, .sidebar table#wp-calendar tfoot tr td, .food_menu_small_image_wrap, .food_menu_text_wrap,  .single-food-menu-wrapper, .page-fullwidth .entry-content-inner, .food_menu_sticky nav, .food_menu_recommended .food-menu-widget-title, .widget_search #s, .flex-caption, .span12.page-fullwidth-gallery, .isotope-food .food-menu-title-and-price, #isotope-filter, .food-menu-widget-price, .food-menu-widget-overlay, .no_comments_wrap, .home_widgets .twitter-wrap, .sidebar .twitter-wrap
		{ background-color:".get_option('at01_content_color_bg')."; } \n";
		
		$content_background = hex2rgb(get_option('at01_content_color_bg'));
		$p .= ".flex-caption{ background-color:rgba(".$content_background[0].",".$content_background[1].",".$content_background[2].",0.8); }\n";
		
		$p .= ".post-media:after, .single-food-menu-content:before, .food-menu-widget-thumbnail:after, .gallery_image:after{ 
		border-top-color:".get_option('at01_content_color_bg')."; 
		border-bottom-color:".get_option('at01_content_color_bg')."; }\n";
		$p .= ".tagcloud a:hover, .comment-edit-link, .comment-reply-link, .comment-edit-link:hover, .comment-reply-link:hover, .home_widgets table#wp-calendar caption, .sidebar table#wp-calendar caption, .home_widgets table#wp-calendar thead tr th, .sidebar table#wp-calendar thead tr th, .header_reservation a, .header_reservation:hover a, a.home-stunning-text-button.button, a.home-stunning-text-button.button:hover, .nav-tabs > .active > a, .nav-tabs > .active > a:hover, .nav-tabs > .active > a:focus,  #respond .form-submit #submit, .contact-submit ,input[type='submit'], table th, .ui-datepicker-title , .ui-datepicker td span, .ui-datepicker td a,   .ui-datepicker-next:hover , .ui-datepicker-prev:hover , .ui-datepicker-next , .ui-datepicker-prev { 	
		color:".get_option('at01_content_color_bg')."; } \n";
		$p .= ".tagcloud a:after { 
		border-left-color: ".get_option('at01_content_color_bg').";  }\n";
		$p .= ".home_widgets .recent-post-thumbnail:after, .sidebar .recent-post-thumbnail:after, .comment-content:before, .food_menu_small_image_thumbnail:after{ 	border-right-color:".get_option('at01_content_color_bg')."; 	 }\n";
		$p .= ".food_menu_sticky nav li a, .food_menu_sticky nav li a:hover, #isotope-filter ul li a, .home_widgets .twitter-wrap:after, .sidebar .twitter-wrap:after { 	border-top-color: ".get_option('at01_content_color_bg').";  }\n";
		$p .= ".isotope-food .food-menu-widget-title:before, .food-menu-widget-recommended .food-menu-widget-title:before{ 	border-bottom-color: ".get_option('at01_content_color_bg').";  }\n";
		
		$p .= ".ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active { 	border-color: ".get_option('at01_content_color_bg').";  }\n";
		
		
		
		
		
		///  Content Box Shadow Color */
		if(get_option('at01_content_color_box_shadow')==""){
			$p .= ".post, .home_widgets .food-menu-widget, .sidebar .food-menu-widget, .home_widgets .recent-post, .sidebar .recent-post, .sidebar .widget ul, .home_widgets .textwidget, .sidebar .textwidget, .home_widgets #calendar_wrap, .sidebar .#calendar_wrap, .home-special-boxes, .home-stunning-text-area, .home-food-wrap, .home-gallery-wrap, .home_widgets .widget ul, .sidebar .widget ul, .home_widgets .AT_fourboxes_widget .teaser_box, .sidebar .AT_fourboxes_widget .teaser_box, .comment-box, #commentform, .food-menu-widget-recommended, .food_menu_text_wrap, .food_menu_small_image_wrap, .single-food-menu-wrapper, .span12.page-fullwidth-gallery,  textarea:focus, input[type='text']:focus, input[type='password']:focus, input[type='datetime']:focus, input[type='datetime-local']:focus, input[type='date']:focus, input[type='month']:focus, input[type='time']:focus, input[type='week']:focus, input[type='number']:focus, input[type='email']:focus, input[type='url']:focus, input[type='search']:focus, input[type='tel']:focus, input[type='color']:focus, .uneditable-input:focus, .no_comments_wrap, .food_menu_sticky, .isotope-food,  .entry-content-inner,
			.home_widgets .twitter-wrap, .sidebar .twitter-wrap{ 	
		-webkit-box-shadow:none; 
		-moz-box-shadow:none; 
		-ms-box-shadow:none; 	
		-o-box-shadow:none; 
		box-shadow:none; }\n";
		}else{
			$p .= ".post, .home_widgets .food-menu-widget, .sidebar .food-menu-widget, .home_widgets .recent-post, .sidebar .recent-post, .sidebar .widget ul, .home_widgets .textwidget, .sidebar .textwidget, .home_widgets #calendar_wrap, .sidebar #calendar_wrap, .home-special-boxes, .home-stunning-text-area, .home-food-wrap, .home-gallery-wrap, .home_widgets .widget ul, .sidebar .widget ul, .home_widgets .AT_fourboxes_widget .teaser_box, .sidebar .AT_fourboxes_widget .teaser_box, .comment-box, #commentform, .food-menu-widget-recommended, .food_menu_text_wrap, .food_menu_small_image_wrap, .single-food-menu-wrapper, .span12.page-fullwidth-gallery, textarea:focus, input[type='text']:focus, input[type='password']:focus, input[type='datetime']:focus, input[type='datetime-local']:focus, input[type='date']:focus, input[type='month']:focus, input[type='time']:focus, input[type='week']:focus, input[type='number']:focus, input[type='email']:focus, input[type='url']:focus, input[type='search']:focus, input[type='tel']:focus, input[type='color']:focus, .uneditable-input:focus, .no_comments_wrap, .food_menu_sticky, .isotope-food  ,.entry-content-inner,
			.home_widgets .twitter-wrap, .sidebar .twitter-wrap{ 	
		-webkit-box-shadow:0 2px 16px -6px ".get_option('at01_content_color_box_shadow')."; 
		-moz-box-shadow: 0 2px 16px -6px ".get_option('at01_content_color_box_shadow')."; 
		-ms-box-shadow:0 2px 16px -6px ".get_option('at01_content_color_box_shadow')."; 
		-o-box-shadow:0 2px 16px -6px ".get_option('at01_content_color_box_shadow')."; 	
		box-shadow:0 2px 16px -6px ".get_option('at01_content_color_box_shadow')."; }\n";
		}
	
			/////  Ribbon Color */
		$p .= ".post-meta-published, h1, h2, h3, h4, h5, h6, h3.food_menu_catagory_name, .food_menu_text_price, .food_menu_small_image_price, .single-food-menu-excerpt, .single-post-date-text, h3.widget_title_text, .food-menu-widget-price-text, .teaser_icon_title, #respond code, .food-menu-widget-title-text, .pullquote_wrapper, blockquote , .home_widgets .AT_boxes_widget h3.widget_title_text, .home-food-badge-text.food-menu-widget-title-text { 	color:".get_option('at01_content_color_ribbon')."; }\n";
		$p .= "h3.food_menu_catagory_name, .post-meta-published,  h2.single-food-menu-title, h2.post-content-title, .AT_home_food_widget h3.home-food-title, .sticky .post-media, .sticky{ 	border-color:".get_option('at01_content_color_ribbon')."; }
\n";
		$p .= ".widget_title_ribbon, .food-menu-widget-badge-icon, .single-food-menu-badge-icon, .widget_search .input-append .add-on, .food-menu-widget-money, .single-food-menu-money, .colorbox-icon, table#wp-calendar caption, .widget_title_ribbon_twelve_point_star, .widget_title_ribbon_twelve_point_star:before, .widget_title_ribbon_twelve_point_star:after, li.single_social_icon {
			background-color:".get_option('at01_content_color_ribbon')."; }\n";
		$p .= ".widget_title_ribbon:after, .food-menu-widget-badge-icon:before, .single-food-menu-badge-icon:before {     border-left-color:".get_option('at01_content_color_ribbon')."; 	border-right-color:".get_option('at01_content_color_ribbon')."; }\n";
		$p .= ".food-menu-widget-money:after, .single-food-menu-money:after, .colorbox-icon:after, .pullquote_wrapper, blockquote{  	border-left-color: ".get_option('at01_content_color_ribbon')."; }\n";
		$p .= ".widget_search .input-append .add-on:before, .pullquote_wrapper.right { 	border-right-color:".get_option('at01_content_color_ribbon')."; }\n";
		$p .= ".AT_boxes_widget .widget_title_ribbon_style2:after{ 	border-top-color:".get_option('at01_content_color_ribbon')."; }\n";
				/////  Ribbon Icon Color */
		$p .= ".home_widgets i, .content i{ color:".get_option('at01_content_color_ribbon_icon')."; }\n";
				///// Image hover color */????????
		$p .= ".food-menu-widget-overlay .food-menu-widget-bghover, .gallery_image, .food-menu-widget-thumbnail, .recent-post-thumbnail, .post-media, .home-gallery-image, .widget_flickr .flickr_badge_image, .food_menu_small_image_thumbnail{ 	 }\n";
			////  Dotted Line Color */
		$p .= ".home-food-badge, .home_widgets .widget ul li, .sidebar .widget ul li, .food-menu-widget-title, .gallery_wrap, .gallery_row, .food_menu_sticky nav, .single-food-menu-price, .single-food-menu-badge, .single-food-menu-content, .single-post-date-comment, .post-category-and-tag, .food_menu_text_left, .comment-content, .food-menu-widget-recommended:hover, .food-menu-widget-price, .food_menu_small_image, .home-food-price, .food-menu-widget-recommended .food-menu-widget-price, table, table tr, table tr td, table tr th, .tweet-container{ 	
		border-color:".get_option('at01_content_color_dotline')."; }\n";
		$p .= ".gallery-item img{ 	
		border-color:".get_option('at01_content_color_dotline')."!important; }\n";
			///  Normal Text Color */
		$p .= "body, .widget_search #s, .required-star{ color:".get_option('at01_content_color_normal_text')."; }\n";
			////////  Text Link Color */
		$p .= "a, .home_widgets .widget ul li a i, .sidebar .widget ul li a i, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .food_menu_sticky nav li a, .food_menu_text_name, 
		i.at-loading, .flex-title, h4.toggle i.icon-plus-sign, h4.toggle i.icon-minus-sign, .food_menu_text_price, .food_menu_small_image_price, .food-menu-widget-title-text ,.home-food-title, .food_menu_small_image_name, .post-tag-list, .post-category-list, .single-post-comment-text, #reservation_me ol.forms li label, #contact_me ol.forms li label, span.reservationerror{
			color:".get_option('at01_content_color_normal_text_link')."; }\n";
		$p .= ".header_reservation a, .comment-edit-link, .comment-reply-link, .home_widgets table#wp-calendar thead tr th, .sidebar table#wp-calendar thead tr th, #respond .form-submit #submit, .contact-submit, input[type='submit'], a.button, .AT_fourboxes_widget .teaser_icon_title, .flex-control-paging a, .sc_slider_wrapper .flex-direction-nav a, table th, .ui-datepicker ,.ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active {
			 background:".get_option('at01_content_color_normal_text_link')."!important; }\n";
			 
		$p .= ".header_reservation .header_reservation_triangle{ 
		background-image: -webkit-gradient(linear, 0 0, 100% 100%, color-stop(.25, ".get_option('at01_content_color_normal_text_link')."), color-stop(.25, transparent), to(transparent)),
							  -webkit-gradient(linear, 0 100%, 100% 0, color-stop(.25, ".get_option('at01_content_color_normal_text_link')."), color-stop(.25, transparent), to(transparent)),
							  -webkit-gradient(linear, 0 0, 100% 100%, color-stop(.75, transparent), color-stop(.75, ".get_option('at01_content_color_normal_text_link').")),
			  				  -webkit-gradient(linear, 0 100%, 100% 0, color-stop(.75, transparent), color-stop(.75, ".get_option('at01_content_color_normal_text_link')."));
			background-image: -webkit-linear-gradient(45deg, ".get_option('at01_content_color_normal_text_link')." 25%, transparent 25%, transparent),
							  -webkit-linear-gradient(-45deg, ".get_option('at01_content_color_normal_text_link')." 25%, transparent 25%, transparent),
							  -webkit-linear-gradient(45deg, transparent 75%, ".get_option('at01_content_color_normal_text_link')." 75%),
			  				  -webkit-linear-gradient(-45deg, transparent 75%, ".get_option('at01_content_color_normal_text_link')." 75%);
			background-image: -moz-linear-gradient(45deg, ".get_option('at01_content_color_normal_text_link')." 25%, transparent 25%, transparent),
							  -moz-linear-gradient(-45deg, ".get_option('at01_content_color_normal_text_link')." 25%, transparent 25%, transparent),
							  -moz-linear-gradient(45deg, transparent 75%, ".get_option('at01_content_color_normal_text_link')." 75%),
			  				  -moz-linear-gradient(-45deg, transparent 75%, ".get_option('at01_content_color_normal_text_link')." 75%);
			background-image: -ms-linear-gradient(45deg, ".get_option('at01_content_color_normal_text_link')." 25%, transparent 25%, transparent),
							  -ms-linear-gradient(-45deg, ".get_option('at01_content_color_normal_text_link')." 25%, transparent 25%, transparent),
							  -ms-linear-gradient(45deg, transparent 75%, ".get_option('at01_content_color_normal_text_link')." 75%),
			  				  -ms-linear-gradient(-45deg, transparent 75%, ".get_option('at01_content_color_normal_text_link')." 75%);
			background-image: -o-linear-gradient(45deg, ".get_option('at01_content_color_normal_text_link')." 25%, transparent 25%, transparent),
							  -o-linear-gradient(-45deg, ".get_option('at01_content_color_normal_text_link')." 25%, transparent 25%, transparent),
							  -o-linear-gradient(45deg, transparent 75%, ".get_option('at01_content_color_normal_text_link')." 75%),
			  				  -o-linear-gradient(-45deg, transparent 75%, ".get_option('at01_content_color_normal_text_link')." 75%);
			background-image: linear-gradient(45deg, ".get_option('at01_content_color_normal_text_link')." 25%, transparent 25%, transparent),
							  linear-gradient(-45deg, ".get_option('at01_content_color_normal_text_link')." 25%, transparent 25%, transparent),
							  linear-gradient(45deg, transparent 75%, ".get_option('at01_content_color_normal_text_link')." 75%),
			  				  linear-gradient(-45deg, transparent 75%, ".get_option('at01_content_color_normal_text_link')." 75%);  } \n";
		
		$p .= ".home-special-boxes-post-title-text, .accordion-inner, .accordion-group, h2.gallery-title, .ui-datepicker-calendar tr th, .ui-datepicker-calendar tr td, .ui-datepicker-calendar{ 	
		border-color:".get_option('at01_content_color_normal_text_link').";	 } \n";
	
		$content_color_normal_text_link = hex2rgb(get_option('at01_content_color_normal_text_link'));
		$p .= "textarea:focus, input[type='text']:focus, input[type='password']:focus, input[type='datetime']:focus, input[type='datetime-local']:focus, input[type='date']:focus, input[type='month']:focus, input[type='time']:focus, input[type='week']:focus, input[type='number']:focus, input[type='email']:focus, input[type='url']:focus, input[type='search']:focus, input[type='tel']:focus, input[type='color']:focus, .uneditable-input:focus{ box-shadow:0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(".$content_color_normal_text_link[0].",".$content_color_normal_text_link[1].",".$content_color_normal_text_link[2].",0.5) inset; 
		border-color: rgba(".$content_color_normal_text_link[0].",".$content_color_normal_text_link[1].",".$content_color_normal_text_link[2].",0.2);
		}\n";
																																																																														
	
			/////  Text Link Hover Color */
		$p .= "a:hover, a:focus, .home_widgets .widget ul li a:hover i, .sidebar .widget ul li a:hover i, h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, .food_menu_sticky nav li a:hover, .food_menu_sticky nav li a.selected , h3.toggle:hover i.icon-plus-sign, h3.toggle:hover i.icon-minus-sign ,#isotope-filter ul li a.active, #isotope-filter ul li a.active:hover{ 	
		color:".get_option('at01_content_color_normal_text_link_hover')."; }\n";
		$p .= ".tagcloud a:hover, .header_reservation:hover a, .comment-edit-link:hover, .comment-reply-link:hover, #respond .form-submit #submit:hover, .contact-submit:hover, input[type='submit']:hover, a.button:hover, .AT_boxes_widget .teaser_icon_title:hover, .nav-tabs > .active > a, .nav-tabs > .active > a:hover, .nav-tabs > .active > a:focus, .flex-control-paging a.flex-active, .flex-control-paging a:hover, .teaser_icon_title:hover ,.sc_slider_wrapper .flex-direction-nav a:hover, .ui-state-hover, .ui-widget-content .ui-state-hover, .ui-widget-header .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus, .ui-widget-header .ui-state-focus, .ui-datepicker-header{ 	
		background-color:".get_option('at01_content_color_normal_text_link_hover')."!important; }\n";
		
		$p .= ".header_reservation:hover .header_reservation_triangle{ 
		background-image: -webkit-gradient(linear, 0 0, 100% 100%, color-stop(.25, ".get_option('at01_content_color_normal_text_link_hover')."), color-stop(.25, transparent), to(transparent)),
							  -webkit-gradient(linear, 0 100%, 100% 0, color-stop(.25, ".get_option('at01_content_color_normal_text_link_hover')."), color-stop(.25, transparent), to(transparent)),
							  -webkit-gradient(linear, 0 0, 100% 100%, color-stop(.75, transparent), color-stop(.75, ".get_option('at01_content_color_normal_text_link_hover').")),
			  				  -webkit-gradient(linear, 0 100%, 100% 0, color-stop(.75, transparent), color-stop(.75, ".get_option('at01_content_color_normal_text_link_hover')."));
			background-image: -webkit-linear-gradient(45deg, ".get_option('at01_content_color_normal_text_link_hover')." 25%, transparent 25%, transparent),
							  -webkit-linear-gradient(-45deg, ".get_option('at01_content_color_normal_text_link_hover')." 25%, transparent 25%, transparent),
							  -webkit-linear-gradient(45deg, transparent 75%, ".get_option('at01_content_color_normal_text_link_hover')." 75%),
			  				  -webkit-linear-gradient(-45deg, transparent 75%, ".get_option('at01_content_color_normal_text_link_hover')." 75%);
			background-image: -moz-linear-gradient(45deg, ".get_option('at01_content_color_normal_text_link_hover')." 25%, transparent 25%, transparent),
							  -moz-linear-gradient(-45deg, ".get_option('at01_content_color_normal_text_link_hover')." 25%, transparent 25%, transparent),
							  -moz-linear-gradient(45deg, transparent 75%, ".get_option('at01_content_color_normal_text_link_hover')." 75%),
			  				  -moz-linear-gradient(-45deg, transparent 75%, ".get_option('at01_content_color_normal_text_link_hover')." 75%);
			background-image: -ms-linear-gradient(45deg, ".get_option('at01_content_color_normal_text_link_hover')." 25%, transparent 25%, transparent),
							  -ms-linear-gradient(-45deg, ".get_option('at01_content_color_normal_text_link_hover')." 25%, transparent 25%, transparent),
							  -ms-linear-gradient(45deg, transparent 75%, ".get_option('at01_content_color_normal_text_link_hover')." 75%),
			  				  -ms-linear-gradient(-45deg, transparent 75%, ".get_option('at01_content_color_normal_text_link_hover')." 75%);
			background-image: -o-linear-gradient(45deg, ".get_option('at01_content_color_normal_text_link_hover')." 25%, transparent 25%, transparent),
							  -o-linear-gradient(-45deg, ".get_option('at01_content_color_normal_text_link_hover')." 25%, transparent 25%, transparent),
							  -o-linear-gradient(45deg, transparent 75%, ".get_option('at01_content_color_normal_text_link_hover')." 75%),
			  				  -o-linear-gradient(-45deg, transparent 75%, ".get_option('at01_content_color_normal_text_link_hover')." 75%);
			background-image: linear-gradient(45deg, ".get_option('at01_content_color_normal_text_link_hover')." 25%, transparent 25%, transparent),
							  linear-gradient(-45deg, ".get_option('at01_content_color_normal_text_link_hover')." 25%, transparent 25%, transparent),
							  linear-gradient(45deg, transparent 75%, ".get_option('at01_content_color_normal_text_link_hover')." 75%),
			  				  linear-gradient(-45deg, transparent 75%, ".get_option('at01_content_color_normal_text_link_hover')." 75%);  } \n";
	
		
		$p .= ".tagcloud a:hover:after{    border-left-color: ".get_option('at01_content_color_normal_text_link_hover')."; }\n";
		$p .= ".food_menu_sticky nav li a.selected , .toggle_wrapper.style1:hover .toggle_container, #isotope-filter ul li a.active, #isotope-filter ul li a.active:hover, .toggle_wrapper.style2, .toggle_wrapper.style1 .toggle_container, .nav-tabs , .home-special-boxes-post-title-text:hover , h2.gallery-title:hover{ 	border-color:".get_option('at01_content_color_normal_text_link_hover')."; } \n";
		
		
			///  Read more Text Color */	
		$p .= "a.readmore{ 	color:".get_option('at01_content_color_readmore_text')."; } \n";
		$p .= "a.readmore:hover{ 	color:".get_option('at01_content_color_readmore_text_hover')."; }\n";
		$p .= "a.readmore{ 	background:".get_option('at01_content_color_readmore_bg')."; } a.readmore:before {     border-top-color: ".get_option('at01_content_color_readmore_bg')."; 	border-bottom-color: ".get_option('at01_content_color_readmore_bg')."; } a.readmore:after {  	border-left-color: ".get_option('at01_content_color_readmore_bg').";  }\n";
		$p .= "a.readmore:hover{ 	background:".get_option('at01_content_color_readmore_bg_hover')."; } a.readmore:hover:before{     border-top-color: ".get_option('at01_content_color_readmore_bg_hover')."; 	border-bottom-color: ".get_option('at01_content_color_readmore_bg_hover')."; } a.readmore:hover:after {  	border-left-color: ".get_option('at01_content_color_readmore_bg_hover').";  }
\n";

		///OOOO Footer Widgets */
			///// Background Color */
		$p .= ".footer_widgets{ 	background:".get_option('at01_footer_color_bg')."; } \n";
		$p .= ".footer_widgets .tagcloud a, .footer_widgets .tagcloud a:hover { color:".get_option('at01_footer_color_bg')."; }\n";
		$p .= ".footer_widgets .food-menu-widget-thumbnail:after { 	border-bottom-color:".get_option('at01_footer_color_bg')."; }  \n";
	
	
	
	

		$p .= ".footer_widgets_before{ 
		
			 
		background-image: -webkit-gradient(linear, 0 0, 100% 100%, color-stop(.25, ".get_option('at01_footer_color_bg')."), color-stop(.25, transparent), to(transparent)),
							  -webkit-gradient(linear, 0 100%, 100% 0, color-stop(.25, ".get_option('at01_footer_color_bg')."), color-stop(.25, transparent), to(transparent)),
							  -webkit-gradient(linear, 0 0, 100% 100%, color-stop(.75, transparent), color-stop(.75, ".get_option('at01_footer_color_bg').")),
			  				  -webkit-gradient(linear, 0 100%, 100% 0, color-stop(.75, transparent), color-stop(.75, ".get_option('at01_footer_color_bg')."));
			background-image: -webkit-linear-gradient(45deg, ".get_option('at01_footer_color_bg')." 25%, transparent 25%, transparent),
							  -webkit-linear-gradient(-45deg, ".get_option('at01_footer_color_bg')." 25%, transparent 25%, transparent),
							  -webkit-linear-gradient(45deg, transparent 75%, ".get_option('at01_footer_color_bg')." 75%),
			  				  -webkit-linear-gradient(-45deg, transparent 75%, ".get_option('at01_footer_color_bg')." 75%);
			background-image: -moz-linear-gradient(45deg, ".get_option('at01_footer_color_bg')." 25%, transparent 25%, transparent),
							  -moz-linear-gradient(-45deg, ".get_option('at01_footer_color_bg')." 25%, transparent 25%, transparent),
							  -moz-linear-gradient(45deg, transparent 75%, ".get_option('at01_footer_color_bg')." 75%),
			  				  -moz-linear-gradient(-45deg, transparent 75%, ".get_option('at01_footer_color_bg')." 75%);
			background-image: -ms-linear-gradient(45deg, ".get_option('at01_footer_color_bg')." 25%, transparent 25%, transparent),
							  -ms-linear-gradient(-45deg, ".get_option('at01_footer_color_bg')." 25%, transparent 25%, transparent),
							  -ms-linear-gradient(45deg, transparent 75%, ".get_option('at01_footer_color_bg')." 75%),
			  				  -ms-linear-gradient(-45deg, transparent 75%, ".get_option('at01_footer_color_bg')." 75%);
			background-image: -o-linear-gradient(45deg, ".get_option('at01_footer_color_bg')." 25%, transparent 25%, transparent),
							  -o-linear-gradient(-45deg, ".get_option('at01_footer_color_bg')." 25%, transparent 25%, transparent),
							  -o-linear-gradient(45deg, transparent 75%, ".get_option('at01_footer_color_bg')." 75%),
			  				  -o-linear-gradient(-45deg, transparent 75%, ".get_option('at01_footer_color_bg')." 75%);
			background-image: linear-gradient(45deg, ".get_option('at01_footer_color_bg')." 25%, transparent 25%, transparent),
							  linear-gradient(-45deg, ".get_option('at01_footer_color_bg')." 25%, transparent 25%, transparent),
							  linear-gradient(45deg, transparent 75%, ".get_option('at01_footer_color_bg')." 75%),
			  				  linear-gradient(-45deg, transparent 75%, ".get_option('at01_footer_color_bg')." 75%);  } \n";
	
			///// Ribbon Color */
		$p .= ".footer_widgets h1, .footer_widgets h2, .footer_widgets h3, .footer_widgets h4, .footer_widgets h5, .footer_widgets h6, .footer_widgets .food-menu-widget-price-text ,.footer_widgets table#wp-calendar caption
		{ 	color:".get_option('at01_footer_color_ribbon')."; }\n";
		$p .= ".footer_widgets .widget_title_ribbon, .footer_widgets .food-menu-widget-badge-icon, .footer_widgets .widget_search .input-append .add-on, .footer_widgets .food-menu-widget-money 
		{ 	background:".get_option('at01_footer_color_ribbon')."; }\n";
		$p .= ".footer_widgets .widget_title_ribbon:after, .footer_widgets .food-menu-widget-badge-icon:before {     border-left-color:".get_option('at01_footer_color_ribbon')."; 	border-right-color:".get_option('at01_footer_color_ribbon')."; }\n";
		
		$p .= ".footer_widgets .food-menu-widget-money:after {  	border-left-color: ".get_option('at01_footer_color_ribbon')."; }\n";
		$p .= ".footer_widgets .widget_search .input-append .add-on:before { 	border-right-color:".get_option('at01_footer_color_ribbon')."; }\n";
			////  Ribbon Icon Color */
		$p .= ".footer_widgets i, .footer_widgets .AT_boxes_widget .teaser_icon_title a i { 	color:".get_option('at01_footer_color_ribbon_icon')."; }\n";
			/// Dotted Line Color */
		$p .= ".footer_widgets .footer_widget_col, .footer_widgets .home-food-badge, .footer_widgets .widget ul li, .footer_widgets .food-menu-widget-title, .footer_widgets .tweet-container { border-color:".get_option('at01_footer_color_dotline')."; }\n";
			/////  Widget Title Color */
		$p .= ".footer_widgets .widget_title_text{ 	color:".get_option('at01_footer_color_title')."; }\n";
			/////// Normal Text Color */
		$p .= ".footer_widgets, .footer_widgets p, .footer_widgets td{ 	color:".get_option('at01_footer_color_text').";	 }\n";
		
			////// Link Color */
		$p .= ".footer_widgets a, .footer_widgets .widget ul li a i , .footer_widgets table#wp-calendar thead tr th{ 	color:".get_option('at01_footer_color_link')."; } 
		.footer_widgets .tagcloud a, .footer_widgets .teaser_icon_title{ 	background:".get_option('at01_footer_color_link')." !important; } 
		.footer_widgets .tagcloud a:after{     border-left-color: ".get_option('at01_footer_color_link')."; }\n";
			////// Link Hover Color */
		$p .= ".footer_widgets a:hover, .footer_widgets .widget ul li a:hover i{ 	color:".get_option('at01_footer_color_link_hover')."; } 
		.footer_widgets .tagcloud a:hover ,.footer_widgets .teaser_icon_title:hover{ 	background:".get_option('at01_footer_color_link_hover')." !important; } 
		.footer_widgets .tagcloud a:hover:after{     border-left-color: ".get_option('at01_footer_color_link_hover')."; }\n";
		
		///OOOO Footer CopyRight */
			//// Background Color */
		$p .= ".footer_copyright{ background-color:".get_option('at01_copyright_color_bg')."; } 
		.footer_copyright_before {
			 
		background-image: -webkit-gradient(linear, 0 0, 100% 100%, color-stop(.25, ".get_option('at01_copyright_color_bg')."), color-stop(.25, transparent), to(transparent)),
							  -webkit-gradient(linear, 0 100%, 100% 0, color-stop(.25, ".get_option('at01_copyright_color_bg')."), color-stop(.25, transparent), to(transparent)),
							  -webkit-gradient(linear, 0 0, 100% 100%, color-stop(.75, transparent), color-stop(.75, ".get_option('at01_copyright_color_bg').")),
			  				  -webkit-gradient(linear, 0 100%, 100% 0, color-stop(.75, transparent), color-stop(.75, ".get_option('at01_copyright_color_bg')."));
			background-image: -webkit-linear-gradient(45deg, ".get_option('at01_copyright_color_bg')." 25%, transparent 25%, transparent),
							  -webkit-linear-gradient(-45deg, ".get_option('at01_copyright_color_bg')." 25%, transparent 25%, transparent),
							  -webkit-linear-gradient(45deg, transparent 75%, ".get_option('at01_copyright_color_bg')." 75%),
			  				  -webkit-linear-gradient(-45deg, transparent 75%, ".get_option('at01_copyright_color_bg')." 75%);
			background-image: -moz-linear-gradient(45deg, ".get_option('at01_copyright_color_bg')." 25%, transparent 25%, transparent),
							  -moz-linear-gradient(-45deg, ".get_option('at01_copyright_color_bg')." 25%, transparent 25%, transparent),
							  -moz-linear-gradient(45deg, transparent 75%, ".get_option('at01_copyright_color_bg')." 75%),
			  				  -moz-linear-gradient(-45deg, transparent 75%, ".get_option('at01_copyright_color_bg')." 75%);
			background-image: -ms-linear-gradient(45deg, ".get_option('at01_copyright_color_bg')." 25%, transparent 25%, transparent),
							  -ms-linear-gradient(-45deg, ".get_option('at01_copyright_color_bg')." 25%, transparent 25%, transparent),
							  -ms-linear-gradient(45deg, transparent 75%, ".get_option('at01_copyright_color_bg')." 75%),
			  				  -ms-linear-gradient(-45deg, transparent 75%, ".get_option('at01_copyright_color_bg')." 75%);
			background-image: -o-linear-gradient(45deg, ".get_option('at01_copyright_color_bg')." 25%, transparent 25%, transparent),
							  -o-linear-gradient(-45deg, ".get_option('at01_copyright_color_bg')." 25%, transparent 25%, transparent),
							  -o-linear-gradient(45deg, transparent 75%, ".get_option('at01_copyright_color_bg')." 75%),
			  				  -o-linear-gradient(-45deg, transparent 75%, ".get_option('at01_copyright_color_bg')." 75%);
			background-image: linear-gradient(45deg, ".get_option('at01_copyright_color_bg')." 25%, transparent 25%, transparent),
							  linear-gradient(-45deg, ".get_option('at01_copyright_color_bg')." 25%, transparent 25%, transparent),
							  linear-gradient(45deg, transparent 75%, ".get_option('at01_copyright_color_bg')." 75%),
			  				  linear-gradient(-45deg, transparent 75%, ".get_option('at01_copyright_color_bg')." 75%);  } \n";
	
			///// Normal Text Color */
		$p .= ".footer_copyright, .footer_copyright p{ 	color:".get_option('at01_copyright_color_text').";	 }\n";
			//// Link Color */
		$p .= ".footer_copyright a{ 	color:".get_option('at01_copyright_color_link').";	 }\n";
			/////////// Link Hover Color */
		$p .= ".footer_copyright a:hover{ 	color:".get_option('at01_copyright_color_link_hover').";	 }\n";
		
		
		/* em */
		$p .= "h1 { font-size: ". 2*get_option('at01_font_head_size') ."em; }\n";
		$p .= "h2 { font-size: ". 1.5*get_option('at01_font_head_size') ."em; }\n";
		$p .= "h3 { font-size: ". 1.2*get_option('at01_font_head_size') ."em ; }\n";
		$p .= "h4 { font-size: ". 1*get_option('at01_font_head_size') ."em; }\n";
		$p .= "h5 { font-size: ". 0.9*get_option('at01_font_head_size') ."em; }\n";
		$p .= "h6 { font-size: ". 0.8*get_option('at01_font_head_size') ."em; }\n";
		
		$p .= "h1.page_title_text, .post-meta-day{ font-size:". 2.6*get_option('at01_font_head_size') ."em; }\n";
		$p .= "h3.food_menu_catagory_name{ 	font-size:". 2*get_option('at01_font_head_size') ."em; }\n";
		$p .= "h2.post-content-title, .gallery-title, h2.post-title, h2.single-food-menu-title{ font-size:". 1.8*get_option('at01_font_head_size') ."em; }\n";
		
		$p .= "h3.single-food-menu-price-text, h3.single-food-menu-badge-text{ 	font-size:". 1.5*get_option('at01_font_head_size') ."em; }\n";
		$p .= ".post-meta-month, .food-menu-widget-price-text, .home_widgets h3.widget_title_text, .AT_boxes_widget h3.widget_title_text ,h3.home-food-title, .home-gallery-title
		{ 	font-size:". 1.4*get_option('at01_font_head_size') ."em; }\n";
		$p .= ".home-special-boxes-post-title-text, .AT_fourboxes_widget h3.teaser_title, .flex-title, .ui-datepicker .ui-datepicker-title 
		{ 	font-size:". 1.3*get_option('at01_font_head_size') ."em; }\n";
		$p .= ".post-meta-month, .food-menu-widget-price-text, .AT_home_food_widget .home-food-badge-text, .AT_home_food_widget .home-food-widget-price-text, h3.widget_title_text 
		{ 	font-size:". 1.2*get_option('at01_font_head_size') ."em; }\n";
		$p .= " .food-menu-widget-title-text, blockquote p, .pullquote, .blockquote, .food_menu_sticky nav li a,#isotope-filter ul li a
		{ 	font-size:". 1.1*get_option('at01_font_head_size') ."em; }\n";
		$p .= ".accordion-heading, ul.nav-tabs.nav li a
		{ 	font-size:". 1.0*get_option('at01_font_head_size') ."em; }\n";
		$p .= ".header_reservation a{ 	font-size:". 0.9*get_option('at01_font_head_size') ."em; }\n";
		$p .= ".wp-pagenavi a, .wp-pagenavi span, .food-menu-widget-recommended .food-menu-widget-title-text{ 	font-size:". 0.9*get_option('at01_font_head_size') ."em; }\n";
		$p .= "a.readmore{ 	font-size:". 0.8*get_option('at01_font_head_size') ."em; }\n";
		
		
		//////custom css
		$p .= get_option('at01_custom_css');
		return $p;
		
}
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

?>