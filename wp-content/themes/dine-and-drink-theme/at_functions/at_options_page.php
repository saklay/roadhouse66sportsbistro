<?php

function options_var($shortname,$themeslugname){
	$all_font_all = array(
								'Arial' => "Arial",
								'Arial Black' => "Arial Black",
								'Arial Narrow' => "Arial Narrow",
								'Century Gothic' => "Century Gothic",
								'Comic Sans MS' => "Comic Sans MS",
								'Courier New' => "Courier New",
								'Georgia' => "Georgia",
								'Impact' => "Impact",
								'Lucida Console' => "Lucida Console",
								'Lucida Sans Unicode' => "Lucida Sans Unicode",
								'Palatino Linotype' => "Palatino Linotype",
								'Tahoma' => "Tahoma",
								'Times New Roman' => "Times New Roman",
								'Trebuchet MS' => "Trebuchet MS",
								'Verdana' => "Verdana"
								);
	if(get_option('at01_all_font') != ''){
		$all_font = explode(',',get_option('at01_all_font'));
		$all_font_all['-1'] = '----google fonts----';
		foreach($all_font as $key => $val){
			$val1 = trim($val);
			$all_font_all['_'.$val1] = $val1;
		}
	}
	
	switch(get_option('at01_logo_url')){
		case 'at_logo_salad.png' :
		case 'at_logo_spaghetti.png' :
		case 'at_logo_coffee.png' :
		case 'at_logo_cupcake.png' :
		case 'at_logo_brasserie.png' :
			$default_logo = _IMG."".get_option('at01_logo_url');
			break;
		default :
			$default_logo = get_option('at01_logo_url');
			break;
			
	  }
	  
	  switch(get_option('at01_header_bg_img')){
		case 'at_headerbg_salad.png' :
		case 'at_headerbg_spaghetti.png' :
		case 'at_headerbg_coffee.png' :
		case 'at_headerbg_cupcake.png' :
		case 'at_headerbg_brasserie.png' :
			$default_headerbg = _IMG."".get_option('at01_header_bg_img');
			break;
		default :
			$default_headerbg = get_option('at01_header_bg_img');
			break;
			
	  }
	  
	  switch(get_option('at01_body_bg_img')){
		case 'at_bodybg_salad.png' :
		case 'at_bodybg_spaghetti.png' :
		case 'at_bodybg_coffee.png' :
		case 'at_bodybg_cupcake.png' :
		case 'at_bodybg_brasserie.png' :
			$default_bodybg = _IMG."".get_option('at01_body_bg_img');
			break;
		default :
			$default_bodybg = get_option('at01_body_bg_img');
			break;
			
	  }
		
$options1 = array (
		///////tab 1 General	
		array(
				"name" => __('Header Social Network', 'default'),
				"type" => "heading",
				"tab" => "general",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Facebook", 'default'),
				"id" => $shortname."_sociallink_fb",
				"type" => "text",
				"size" => 30,
				"desc" => "Enter your Facebook URL. <br />If leave it blank, the icon will not be shown.",
				"default" => "",
				"tab" => "general"),
		array(
				"name" => __("Twitter", 'default'),
				"id" => $shortname."_sociallink_tw",
				"type" => "text",
				"size" => 30,
				"desc" => "Enter your Twitter URL. <br />If leave it blank, the icon will not be shown.",
				"default" => "",
				"tab" => "general"),
		array(
				"name" => __("Google Plus", 'default'),
				"id" => $shortname."_sociallink_gplus",
				"type" => "text",
				"size" => 30,
				"desc" => "Enter your Google plus URL. <br />If leave it blank, the icon will not be shown.",
				"default" => "",
				"tab" => "general"),
		array(
				"name" => __("Linkedin", 'default'),
				"id" => $shortname."_sociallink_linkedin",
				"type" => "text",
				"size" => 30,
				"desc" => "Enter your Linkedin URL.  <br />If leave it blank, the icon will not be shown.",
				"default" => "",
				"tab" => "general"),
		array(
				"name" => __("Pinterest", 'default'),
				"id" => $shortname."_sociallink_pinterest",
				"type" => "text",
				"size" => 30,
				"desc" => "Enter your Pinterest URL.  <br />If leave it blank, the icon will not be shown.",
				"default" => "",
				"tab" => "general"),
		/*array(
				"name" => __("StumbleUpon", 'default'),
				"id" => $shortname."_sociallink_stumbleupon",
				"type" => "text",
				"size" => 30,
				"desc" => "Enter your StumbleUpon URL.  <br />If leave it blank, the icon will not be shown.",
				"default" => "",
				"tab" => "general"),*/
		array(
				"name" => __("Dribbble", 'default'),
				"id" => $shortname."_sociallink_dribbble",
				"type" => "text",
				"size" => 30,
				"desc" => "Enter your Dribbble URL.  <br />If leave it blank, the icon will not be shown.",
				"default" => "",
				"tab" => "general"),
		array(
				"name" => __("Tumblr", 'default'),
				"id" => $shortname."_sociallink_tumblr",
				"type" => "text",
				"size" => 30,
				"desc" => "Enter your Tumblr URL.  <br />If leave it blank, the icon will not be shown.",
				"default" => "",
				"tab" => "general"),
		array(
				"name" => __("Youtube", 'default'),
				"id" => $shortname."_sociallink_youtube",
				"type" => "text",
				"size" => 30,
				"desc" => "Enter your Youtube URL.  <br />If leave it blank, the icon will not be shown.",
				"default" => "",
				"tab" => "general"),
		array(
				"name" => __("Instagram", 'default'),
				"id" => $shortname."_sociallink_instagram",
				"type" => "text",
				"size" => 30,
				"desc" => "Enter your Instagram URL.  <br />If leave it blank, the icon will not be shown.",
				"default" => "",
				"tab" => "general"),
		array(
				"name" => __("Flickr", 'default'),
				"id" => $shortname."_sociallink_flickr",
				"type" => "text",
				"size" => 30,
				"desc" => "Enter your Flickr URL.  <br />If leave it blank, the icon will not be shown.",
				"default" => "",
				"tab" => "general"),
		array(
				"name" => __("Responsive", 'default'),
				"type" => "heading",
				"tab" => "general",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Enable Responsive Design", 'default'),
				"id" => $shortname."_resposive",
				"type" => "checkbox",
				"desc" => "Check to use Responsive Design that addapts to Tablet and Mobile Devices.",
				"default" => "true",
				"tab" => "general"),
		array(
				"name" => __("Tracking Code", 'default'),
				"type" => "heading",
				"tab" => "general",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Tracking Code (Google Analytic)", 'default'),
				"desc" => "Paste your Google Analytics Tracking Code here. This will be added before the closing &lt;/head&gt; tag.",
 				"id" => $shortname."_tracking",
				"type" => "textarea",
				"default" => "",
				"tab" => "general"),
		array(
				"name" => __("Favicon", 'default'),
				"type" => "heading",
				"tab" => "general",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Favicon", 'default'),
				"desc" => "Upload a 16 x 16 px png/ico/gif image for your website's favicon.",
				"id" => $shortname."_favicon_url",
				"type" => "upload",
				"img_width" => 16,
				"default" => "",
				"class" => "btn at_admin_white_button",
				"tab" => "general"),
		
////////////font////////
		array(
				"name" => __('GoogleWebFont Directory', 'default'),
				"type" => "heading",
				"tab" => "font",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Update Font List", 'default'),
				"text" => "Update Google Fonts",
				"desc" => "Click to update your Google font list.<br />Preview the fonts at <a href='http://www.google.com/fonts' target='_blank'>GoogleFont Directory</a>",
 				"id" => $shortname."_load_google_font",
 				"class" => "at_get_google_font btn at_admin_white_button",
				"type" => "formbutton",
				"tab" => "font"),
		array(
				"name" => __('Headline Font Setting ', 'default'),
				"type" => "heading",
				"tab" => "font",
				"open" => -1,
				"close" => -1),
		array(
				"name" => "Headline Font Family",
				"desc" => "Select Headline Font Style",
				"id" => $shortname."_font_head",
				"options" => $all_font_all,
				"type" => "select",
				"tab" => "font"),
		array(
				"name" => "Headline Font Coefficient",
				"desc" => "Select Headline Font Coefficient",
				"id" => $shortname."_font_head_size",
				"options" => array(
										'0.2' => "0.2",
										'0.4' => "0.4",
										'0.6' => "0.6",
										'0.8' => "0.8",
										'1.0' => "1.0 (default)",
										'1.2' => "1.2",
										'1.4' => "1.4",
										'1.6' => "1.6",
										'1.8' => "1.8",
										'2.0' => "2.0",
										'2.2' => "2.2",
										'2.4' => "2.4",
										'2.6' => "2.6",
										'2.8' => "2.8",
										'3.0' => "3.0"
										),
				"type" => "select",
				"tab" => "font"),
		array(
				"name" => __('General Font Setting', 'default'),
				"type" => "heading",
				"tab" => "font",
				"open" => -1,
				"close" => -1),
		array(
				"name" => "General Font Family",
				"desc" => "Select General Font Family",
				"id" => $shortname."_font_content",
				"options" => $all_font_all,
				"type" => "select",
				"tab" => "font"),
		array(
				"name" => "General Font Size",
				"desc" => "Select General Font Size",
				"id" => $shortname."_font_content_size",
				"options" => array(
										'4' => "4px",
										'5' => "5px",
										'6' => "6px",
										'7' => "7px",
										'8' => "8px",
										'9' => "9px",
										'10' => "10px",
										'11' => "11px",
										'12' => "12px",
										'13' => "13px",
										'14' => "14px",
										'15' => "15px",
										'16' => "16px",
										'17' => "17px",
										'18' => "18px",
										'19' => "19px",
										'20' => "20px",
										'21' => "21px",
										'22' => "22px",
										'23' => "23px",
										'24' => "24px",
										),
				"type" => "select",
				"tab" => "font"),
		array(
				"name" => __('Top Navigation Font Setting', 'default'),
				"type" => "heading",
				"tab" => "font",
				"open" => -1,
				"close" => -1),
		array(
				"name" => "Top Navigation Font Family",
				"desc" => "Select Top Navigation Font Family",
				"id" => $shortname."_font_navi",
				"options" => $all_font_all,
				"type" => "select",
				"tab" => "font"),
		array(
				"name" => "Top Navigation Font Size",
				"desc" => "Select Top Navigation Font Size",
				"id" => $shortname."_font_navi_size",
				"options" => array(
										'4' => "4px",
										'5' => "5px",
										'6' => "6px",
										'7' => "7px",
										'8' => "8px",
										'9' => "9px",
										'10' => "10px",
										'11' => "11px",
										'12' => "12px",
										'13' => "13px",
										'14' => "14px",
										'15' => "15px",
										'16' => "16px",
										'17' => "17px",
										'18' => "18px",
										'19' => "19px",
										'20' => "20px",
										'21' => "21px",
										'22' => "22px",
										'23' => "23px",
										'24' => "24px",
										),
				"type" => "select",
				"tab" => "font"),
		
		
////////// overall elements
		
		array(
				"name" => __('Header', 'default'),
				"type" => "heading",
				"tab" => "overallelements",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Header Logo", 'default'),
				"desc" => "Upload a logo for your theme or the image address of your online logo.<br /><br />If leave it blank, logo will not shown.",
				"id" => $shortname."_logo_url",
				"type" => "upload",
				"img_width" => 150,
				"default" => $default_logo,
				"class" => "btn at_admin_white_button",
				"tab" => "overallelements"),
		array(
				"name" => __("Logo Position Style", 'default'),
				"id" => $shortname."_logo_position",
				"options" => array(1 => 'Above Menu Bar',
								   		2 => 'Overlap Menu Bar'),
				"type" => "radio",
				"desc" => "Choose your Logo Position Style.",
				"default" => 1,
				"tab" => "overallelements"),
		array(
				"name" => __("Logo Position From Top", 'default'),
				"id" => $shortname."_logo_pos_top",
				"type" => "text",
				"desc" => "Enter logo position from top in pixels",
				"default" => 0,
				"unit" => "px",
				"optionclass" => '',
				"tab" => "overallelements"),
		array(
				"name" => __("Logo Position From Left", 'default'),
				"id" => $shortname."_logo_pos_left",
				"type" => "text",
				"desc" => "Enter logo position from left in pixels.",
				"default" => 0,
				"unit" => "px",
				"optionclass" => 'above_menu',
				"tab" => "overallelements"),
		array(
				"name" => __("Top Area Height", 'default'),
				"id" => $shortname."_top_height",
				"type" => "text",
				"desc" => "Enter Top Area Height in pixels<br />
Note: Header Top Area not included main menu.<br />Default height is 120px",
				"default" => 120,
				"unit" => "px",
				"optionclass" => '',
				"tab" => "overallelements"),
		array(
				"name" => __("Logo Align", 'default'),
				"id" => $shortname."_logo_position_overlap",
				"options" => array(1 => '<img src="'._IMG.'editor-logo-position-left.png" class="at_image_style_thumbnail" alt="logo-left" />',
								   		2 => '<img src="'._IMG.'editor-logo-position-center.png" class="at_image_style_thumbnail" alt="logo-center" />',
								   		3 => '<img src="'._IMG.'editor-logo-position-right.png" class="at_image_style_thumbnail" alt="logo-right" />'),
				"type" => "radio",
				"desc" => "Choose your Logo Align.<br />
1. Logo align left, menu align right<br />
2. Logo align center, menu align center<br />
3. Logo align right, menu align left",
				"default" => 1,
				"optionclass" => 'overlap_menu',
				"tab" => "overallelements"),
		array(
				"name" => __("Logo Space", 'default'),
				"id" => $shortname."_logo_space",
				"type" => "text",
				"desc" => "Enter logo space in pixels use in Logo Position Style(Overlap Menu) Bar and Logo align center, menu align center",
				"default" => 0,
				"unit" => "px",
				"optionclass" => 'overlap_menu',
				"tab" => "overallelements"),
		
		////reservation
		array(
				"name" => __('Header Reservation', 'default'),
				"type" => "heading",
				"tab" => "overallelements",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Text", 'default'),
				"id" => $shortname."_reservation_text",
				"type" => "text",
				"desc" => "Enter Reservation Text.<br /><br />If leave it blank, it will not show. ",
				"default" => '',
				"tab" => "overallelements"),
		array(
				"name" => __("Link URL", 'default'),
				"id" => $shortname."_reservation_url",
				"type" => "text",
				"desc" => "Enter Reservation Link URL",
				"default" => '#',
				"tab" => "overallelements"),
		////slider
		array(
				"name" => __('Home Slider', 'default'),
				"type" => "heading",
				"tab" => "overallelements",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Enable Slider", 'default'),
				"id" => $shortname."_slider",
				"type" => "checkbox",
				"desc" => "Check to Enable Sllider.",
				"default" => "false",
				"tab" => "overallelements"),
		array(
				"name" => __("Enable Autoplay", 'default'),
				"id" => $shortname."_slider_auto_play",
				"type" => "checkbox",
				"desc" => "Check to Enable Autoplay.",
				"default" => "false",
				"tab" => "overallelements"),
		
		array(
				"name" => __("Slider Time Interval", 'default'),
				"id" => $shortname."_slider_auto_play_ms",
				"type" => "text",
				"desc" => "Enter Animation Speed in Milliseconds. If leave it blank, it will use default speed (4000 ms).",
				"default" => 4000,
				"tab" => "overallelements"),
		array(
				"name" => __("Enable Widget Overlap with Slider", 'default'),
				"id" => $shortname."_slider_overlapse",
				"type" => "checkbox",
				"desc" => "Check to enable first home widget overlapse 60px on home slider.",
				"default" => "false",
				"tab" => "overallelements"),
		////footer
		array(
				"name" => __('Footer', 'default'),
				"type" => "heading",
				"tab" => "overallelements",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Choose Footer style", 'default'),
				"id" => $shortname."_footer_style",
				"options" => array(1 => '<img src="'._IMG.'editor-footer_1-1-1.png" class="at_image_style_thumbnail" width="80" height="28" alt="footer_1-1-1" />',
								   		2 => '<img src="'._IMG.'editor-footer_2-1.png" class="at_image_style_thumbnail" width="80" height="28" alt="footer_2-1" />',
								   		3 => '<img src="'._IMG.'editor-footer_1-2.png" class="at_image_style_thumbnail" width="80" height="28" alt="footer_1-2" />',
								   		4 => '<img src="'._IMG.'editor-footer_1-1.png" class="at_image_style_thumbnail" width="80" height="28" alt="footer_1-1" />'),
				"type" => "radio",
				"desc" => "Choose your Footer Style.<br />- 1/3, 1/3, 1/3<br />- 2/3, 1/3<br />- 1/3, 2/3<br />- 1/2, 1/2",
				"default" => 1,
				"tab" => "overallelements"),
		array(
				"name" => __("Copyright", 'default'),
				"id" => $shortname."_footer_text",
				"type" => "textarea",
				"desc" => "Custom HTML copyright Text that will show in the Footer. <br /><br /> If leave it blank, the copyright area will not show.",
				"default" => "&copy; 2013 Andthemes All Right Reserved.",
				"tab" => "overallelements"),


////////// color
		////== 4. Elements Color == 
		////1. Top Header
		array(
				"name" => __('Header', 'default'),
				"type" => "heading",
				"tab" => "color",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __('Header Background Color', 'default'),
				"id" => $shortname."_header_bg_color",
				"type" => "special_colorpicker",
				"desc" => "Header background color included main menu area.",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __("Header Background Image", 'default'),
				"desc" => "Upload a image for your header background. (included main menu area)",
				"id" => $shortname."_header_bg_img",
				"type" => "upload",
				"img_width" => 150,
				"default" => $default_headerbg,
				"class" => "btn at_admin_white_button",
				"tab" => "color"),
		
		array(
				"name" => "Header Background Image Position X (Horizontal)",
				"desc" => "",
				"id" => $shortname."_header_bg_img_x",
				"options" => array(
										'center' => "center",
										'left' => "left",
										'right' => "right"
										),
				"default" => 1,
				"type" => "select",
				"tab" => "color"),
		array(
				"name" => "Header Background Image Position Y (Vertical)",
				"desc" => "",
				"id" => $shortname."_header_bg_img_y",
				"options" => array(
										'top' => "top",
										'center' => "center",
										'bottom' => "bottom"
										),
				"default" => 1,
				"type" => "select",
				"tab" => "color"),
		array(
				"name" => "Header Background Image Properties",
				"desc" => "",
				"id" => $shortname."_header_bg_img_repeat",
				"options" => array(
										"no-repeat" => "no repeat",
										"repeat" => "repeat both horizontaly and verticaly",
										"repeat-x" => "repeat only horizontaly",
										"repeat-y" => "repeat only verticaly"
										),
				"default" => 1,
				"type" => "select",
				"tab" => "color"),
		array(
				"name" => __('Header Social Icon Background Color ', 'default'),
				"id" => $shortname."_header_social",
				"type" => "special_colorpicker",
				"desc" => "",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Header Social Icon Color', 'default'),
				"id" => $shortname."_header_social_text",
				"type" => "special_colorpicker",
				"desc" => "",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		
		array(
				"name" => __('Header Dotted Line Color ', 'default'),
				"id" => $shortname."_header_dotline",
				"type" => "special_colorpicker",
				"desc" => "Dotted line above main menu <br />
 If leave it blank, the dotted line will not shown",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		
		///2 Main menu
		array(
				"name" => __('Main Navigation Menu', 'default'),
				"type" => "heading",
				"tab" => "color",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __('Main Navigation Bar Background color', 'default'),
				"id" => $shortname."_lv1_bg",
				"type" => "special_colorpicker",
				"desc" => "",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Main Navigation Text Color', 'default'),
				"id" => $shortname."_lv1_link",
				"type" => "special_colorpicker",
				"desc" => "This is the text color of the main navigation in normal stage",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Main Navigation Text Hover Color', 'default'),
				"id" => $shortname."_lv1_hover",
				"type" => "special_colorpicker",
				"desc" => "This is the text color of the main navigation in hover stage",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Sub Navigation Background color', 'default'),
				"id" => $shortname."_lv2_bg",
				"type" => "special_colorpicker",
				"desc" => "",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Sub Navigation Text Color', 'default'),
				"id" => $shortname."_lv2_link",
				"type" => "special_colorpicker",
				"desc" => "This is the text color of the sub navigation in normal stage",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Sub Navigation Text Hover Color', 'default'),
				"id" => $shortname."_lv2_hover",
				"type" => "special_colorpicker",
				"desc" => "This is the text color of the sub navigation in hover stage",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Sub Navigation Background Opacity' , 'default'),
				"id" => $shortname."_bg_opacity",
				"type" => "text",
				"desc" => "Enter Number from 0.0 to 1.0 for sub navigation background opacity<br /> default is 0.8 ",
				"default" => 0.8,
				"tab" => "color"),
		
		///3. Body
		array(
				"name" => __('Body', 'default'),
				"type" => "heading",
				"tab" => "color",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __('Body Background Color', 'default'),
				"id" => $shortname."_body_bg_color",
				"type" => "special_colorpicker",
				"desc" => "Body Background Color",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __("Body Background Image", 'default'),
				"desc" => "Upload a image for your body background.",
				"id" => $shortname."_body_bg_img",
				"type" => "upload",
				"img_width" => 150,
				"default" => $default_bodybg,
				"class" => "btn at_admin_white_button",
				"tab" => "color"),
		array(
				"name" => "Body Background Image Position X (Horizontal)",
				"desc" => " ",
				"id" => $shortname."_body_bg_img_x",
				"options" => array(
										'center' => "center",
										'left' => "left",
										'right' => "right"
										),
				"default" => 1,
				"type" => "select",
				"tab" => "color"),
		array(
				"name" => "Body Background Image Position Y (Vertical)",
				"desc" => " ",
				"id" => $shortname."_body_bg_img_y",
				"options" => array(
										'top' => "top",
										'center' => "center",
										'bottom' => "bottom"
										),
				"default" => 1,
				"type" => "select",
				"tab" => "color"),
		array(
				"name" => "Body Background Image Properties",
				"desc" => "",
				"id" => $shortname."_body_bg_img_repeat",
				"options" => array(
									"no-repeat" => "no repeat",
										"repeat" => "repeat both horizontaly and verticaly",
										"repeat-x" => "repeat only horizontaly",
										"repeat-y" => "repeat only verticaly"
										),
				"default" => 1,
				"type" => "select",
				"tab" => "color"),
		array(
				"name" => __('Page Title Ribbon Color', 'default'),
				"id" => $shortname."_body_color_ribbon",
				"type" => "special_colorpicker",
				"desc" => "",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Page Title Ribbon Icon Color', 'default'),
				"id" => $shortname."_body_color_ribbon_icon",
				"type" => "special_colorpicker",
				"desc" => "",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Page Title Text Color', 'default'),
				"id" => $shortname."_body_color_title",
				"type" => "special_colorpicker",
				"desc" => "",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Body Dotted Line Color', 'default'),
				"id" => $shortname."_body_color_dotline",
				"type" => "special_colorpicker",
				"desc" => "Dotted line color on body background area.",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		
		array(
				"name" => __('Page Navigation Text Color', 'default'),
				"id" => $shortname."_body_color_pagenavi_text",
				"type" => "special_colorpicker",
				"desc" => "This is the text color of the page navigation in normal stage",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Page Navigation Text Hover Color', 'default'),
				"id" => $shortname."_body_color_pagenavi_text_hover",
				"type" => "special_colorpicker",
				"desc" => "This is the text color of the page navigation in hover stage",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Page Navigation Background Color', 'default'),
				"id" => $shortname."_body_color_pagenavi_bg",
				"type" => "special_colorpicker",
				"desc" => "This is the background color of the page navigation in normal stage",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Page Navigation Background Hover Color', 'default'),
				"id" => $shortname."_body_color_pagenavi_bg_hover",
				"type" => "special_colorpicker",
				"desc" => "This is the background color of the page navigation in normal stage",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		
		///4. Sidebar
		
		array(
				"name" => __('Sidebar', 'default'),
				"type" => "heading",
				"tab" => "color",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __('Sidebar Ribbon Color', 'default'),
				"id" => $shortname."_sidebar_color_ribbon",
				"type" => "special_colorpicker",
				"desc" => "",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Sidebar Ribbon Icon Color', 'default'),
				"id" => $shortname."_sidebar_color_ribbon_icon",
				"type" => "special_colorpicker",
				"desc" => "",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Sidebar Widget Title Color', 'default'),
				"id" => $shortname."_sidebar_color_title",
				"type" => "special_colorpicker",
				"desc" => "",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		
		///4. content
		
		array(
				"name" => __('Content', 'default'),
				"type" => "heading",
				"tab" => "color",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __('Content Background Color', 'default'),
				"id" => $shortname."_content_color_bg",
				"type" => "special_colorpicker",
				"desc" => "background color of text content box",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Content Box Shadow Color', 'default'),
				"id" => $shortname."_content_color_box_shadow",
				"type" => "special_colorpicker",
				"desc" => "",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Content Ribbon And Icon Background Color', 'default'),
				"id" => $shortname."_content_color_ribbon",
				"type" => "special_colorpicker",
				"desc" => "This is a color of ribbon, icon, some main elements in content <br />Ex. h1, h2, h3, h4, h5, h6, some title text etc.",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Cotent Ribbon Icon Color', 'default'),
				"id" => $shortname."_content_color_ribbon_icon",
				"type" => "special_colorpicker",
				"desc" => "",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Content Dotted Line Color', 'default'),
				"id" => $shortname."_content_color_dotline",
				"type" => "special_colorpicker",
				"desc" => "color of line and divider on content box area.",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('General Text Color', 'default'),
				"id" => $shortname."_content_color_normal_text",
				"type" => "special_colorpicker",
				"desc" => "",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('General Link Color', 'default'),
				"id" => $shortname."_content_color_normal_text_link",
				"type" => "special_colorpicker",
				"desc" => "This is the color of text link, header reservation background, button ",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('General Link Hover Color', 'default'),
				"id" => $shortname."_content_color_normal_text_link_hover",
				"type" => "special_colorpicker",
				"desc" => "This is the color of text link hover, header reservation hover background, button hover, tag background color ",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Read more Text Color', 'default'),
				"id" => $shortname."_content_color_readmore_text",
				"type" => "special_colorpicker",
				"desc" => "This is the text color of the readmore in normal stage",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Read more Text Hover Color', 'default'),
				"id" => $shortname."_content_color_readmore_text_hover",
				"type" => "special_colorpicker",
				"desc" => "This is the text color of the readmore in hover stage",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		
		array(
				"name" => __('Read more Background Color', 'default'),
				"id" => $shortname."_content_color_readmore_bg",
				"type" => "special_colorpicker",
				"desc" => "This is the background color of the readmore in normal stage",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		
		array(
				"name" => __('Read more Background Hover Color', 'default'),
				"id" => $shortname."_content_color_readmore_bg_hover",
				"type" => "special_colorpicker",
				"desc" => "This is the background color of the readmore in hover stage",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __("Read More Text", 'default'),
				"id" => $shortname."_content_readmore_text",
				"type" => "text",
				"desc" => "Enter the text for 'read more' link for post. <br />If leave it blank, it will use 'Read More' ' ",
				"default" => "Read More",
				"tab" => "color"),
		
		///6. Footer 
		
		array(
				"name" => __('Footer Widgets Area', 'default'),
				"type" => "heading",
				"tab" => "color",
				"open" => -1,
				"close" => -1),
		
		array(
				"name" => __('Footer Background Color', 'default'),
				"id" => $shortname."_footer_color_bg",
				"type" => "special_colorpicker",
				"desc" => "",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Footer Ribbon Color', 'default'),
				"id" => $shortname."_footer_color_ribbon",
				"type" => "special_colorpicker",
				"desc" => "This is a color of ribbon, icon, some main elements in footer area <br />Ex. h1, h2, h3, h4, h5, h6, some title text etc.",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Footer Ribbon Icon Color', 'default'),
				"id" => $shortname."_footer_color_ribbon_icon",
				"type" => "special_colorpicker",
				"desc" => "",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Footer Dotted Line Color', 'default'),
				"id" => $shortname."_footer_color_dotline",
				"type" => "special_colorpicker",
				"desc" => "Dotted line color.",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Footer Widget Title Color', 'default'),
				"id" => $shortname."_footer_color_title",
				"type" => "special_colorpicker",
				"desc" => "",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Footer Normal Text Color', 'default'),
				"id" => $shortname."_footer_color_text",
				"type" => "special_colorpicker",
				"desc" => "This is the text color of the footer.",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Footer Link Color', 'default'),
				"id" => $shortname."_footer_color_link",
				"type" => "special_colorpicker",
				"desc" => "This is the link color of the footer in normal stage.",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Footer Link Hover Color', 'default'),
				"id" => $shortname."_footer_color_link_hover",
				"type" => "special_colorpicker",
				"desc" => "This is the link color of the footer in hover stage.",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		
		///7. Copyright
		
		array(
				"name" => __('Footer Copyright', 'default'),
				"type" => "heading",
				"tab" => "color",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __('Footer Copyright Background Color', 'default'),
				"id" => $shortname."_copyright_color_bg",
				"type" => "special_colorpicker",
				"desc" => "",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Footer Copyright Normal Text Color', 'default'),
				"id" => $shortname."_copyright_color_text",
				"type" => "special_colorpicker",
				"desc" => "This is the text color of the footer copyright.",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Footer Copyright Link Color', 'default'),
				"id" => $shortname."_copyright_color_link",
				"type" => "special_colorpicker",
				"desc" => "This is the link color of the footer copyright in normal stage.",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		array(
				"name" => __('Footer Copyright Link Hover Color', 'default'),
				"id" => $shortname."_copyright_color_link_hover",
				"type" => "special_colorpicker",
				"desc" => "This is the link color of the footer copyright in hover stage.",
				"default" => '',
				"class" 	=> 'input_with_color_selector',
				"tab" => "color"),
		
		
//////== 5. Food Menu ==
		////Style
		array(
				"name" => __('Style', 'default'),
				"type" => "heading",
				"tab" => "foodmenu",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Food Menu Style", 'default'),
				"id" => $shortname."_food_style",
				"options" => array(1 => '<img src="'._IMG.'editor-foodmenu_list+thumb.png" class="at_image_style_thumbnail" width="60" height="59" alt="editor-foodmenu_list+thumb" /> Thumbnail + Text list Style',
								   		2 => '<img src="'._IMG.'editor-foodmenu_list.png" class="at_image_style_thumbnail" width="60" height="59" alt="editor-foodmenu_list" /> 2 Columns Text list Style',
								   		3 => '<img src="'._IMG.'editor-foodmenu_isotope.png" class="at_image_style_thumbnail" width="60" height="59" alt="editor-foodmenu_isotope" /> jQuery Isotope Style'),
				"type" => "radio",
				"desc" => "Choose your Food Menu style.",
				"default" => 1,
				"tab" => "foodmenu"),
		
		/////5. Recommended menu (on/off) ?
		
		array(
				"name" => __("Enable Recommended Menu", 'default'),
				"id" => $shortname."_recommendmenu",
				"type" => "checkbox",
				"desc" => "Check to Show Recommended Menu.<br /> (Food Menu 'Thumbnail + Text list Style' and 2 Columns Text list Style)" ,
				"default" => "true",
				"tab" => "foodmenu"),
	/////Food Menu Categories List
		array(
				"name" => __("Food Menu Categories", 'default'),
				"type" => "heading",
				"tab" => "foodmenu",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Food Menu Categories Order", 'default'),
				"type" => "drag_drop_open",
				"tab" => "foodmenu",
				"close" => -1)
		);

	$options7 = array();

	$taxonomy_terms_parent = get_terms('menu_cat', array(
						 	'orderby'    		=> 'name',
							'hide_empty' 	=> 0,
							'parent'    		=> 0,
					));
	$i = 0;
	foreach($taxonomy_terms_parent as $cate_parent){
		$taxonomy_terms = get_terms('menu_cat', array(
						 	'orderby'    		=> 'name',
							'hide_empty' 	=> 0,
							'parent'    		=> $cate_parent->term_id,
					));
		$foodcatelist[$cate_parent->term_id] = array();
		foreach($taxonomy_terms as $cate){  
		//echo $cate->slug;
			$foodcatelist[$cate_parent->term_id][$i] =  $cate->term_id;
			$i++;
		}
	
		$allfoodcatelist = implode(',',$foodcatelist[$cate_parent->term_id]);
		
		if(get_option($shortname.'_all_food_cate'.$cate_parent->term_id) == ''){ //no data in db
			$all_food_cate = explode(',',$allfoodcatelist);
			$alldefault = implode(',',$all_food_cate);
		}else{
			
			/*$all_food = explode(',',get_option($shortname.'_all_food_cate'.$cate_parent->term_id));
			$all_food_1 = array_merge($all_food,$foodcatelist[$cate_parent->term_id]);
			$all_food_cate = array_unique($all_food_1);
			$alldefault = implode(',',$all_food_cate);*/
			$all_food = explode(',',get_option($shortname.'_all_food_cate'.$cate_parent->term_id)); ///in db
			$alldefault = implode(',',$foodcatelist[$cate_parent->term_id]); ///real cate
			//echo('real'.$alldefault." - at".get_option($shortname.'_all_food_cate'.$cate_parent->term_id));
			$count = count($all_food);
			$all_food_cate = array();
			foreach($foodcatelist[$cate_parent->term_id] as $key => $val){
				$inarray = array_search($val,$all_food);
				
				if ($inarray !== FALSE){
					$all_food_cate[$inarray] =  $val;
				}else{
					$all_food_cate[$count] = $val;
					$count++;
				}
			}
			ksort($all_food_cate);
			$alldefault = implode(',',$all_food_cate);
		}
		array_push($options7,array(
										"name" => __("", 'default'),
										"type" => "drag_drop_open_ul",
										"id" => $shortname."_all_food_cate".$cate_parent->term_id,
										"parent" => $cate_parent->name,
										//"default" => $allfoodcatelist,
										"value" => $alldefault,
										"tab" => "foodmenu",
										"open" => -1,
										"close" => -1)
				   );
		//print_r($all_food_cate);
		if(count($all_food_cate) > 0){
			foreach($all_food_cate as $order => $foodid){
				$foodcate = get_term_by('id', $foodid,'menu_cat');
				array_push($options7, array(
												"name" => $foodcate->name,
												"cate_id" => $foodid,
												"id" => $shortname."_food_menu_side".$foodid, //radio id
												"type" => "drag_drop_group",
												"tab" => "foodmenu",
												"default" => '1',
												"class" => "input_food_cat_side",
												"open" => -1,
												"close" => -1)
						   );
			}
		}
		array_push($options7,array(
						"type" => "drag_drop_close_ul",
						"tab" => "foodmenu",
						"open" => -1,
						"close" => -1)
				   );
	}
/////////here////////		
$options6 = array(		
		array(
				"type" => "drag_drop_close",
				"desc" => "<u>To Arrange Your Food Category</u> <br /> - Drag your food category up or down.<br /><br /><u>To Customize Catgory into Left or Right<br /> (only for 2 Columns Text list Style)</u><br />- Select ' 2 Columns Text list Style' in Food Menu Style. Select left or right to adjust your food menu category ",
				"tab" => "foodmenu",
				"open" => -1),
		array(
				"name" => __("Badge / Sign or Icon", 'default'),
				"type" => "heading",
				"tab" => "foodmenu",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Choose", 'default'),
				"type" => "add_remove_open",
				"tab" => "foodmenu",
				"close" => -1)
	);

$all_options = wp_load_alloptions();
$my_options = array();
$options_badge_name = array();
$options_badge_icon = array();
$count_badge_item = 0;
foreach( $all_options as $name => $value ) {
	if (strpos($name, $shortname.'_badge_name') === 0) {
		$options_badge_name[$name] = $value;
		$count_badge_item++;
	}else if (strpos($name, $shortname.'_badge_icon') === 0) {
		$options_badge_icon[$name] = $value;
	}
}

if($count_badge_item == 0){
	/////enter default data
		//$options_badge_name[$shortname.'_badge_name1'] = 'New';
		//$options_badge_icon[$shortname.'_badge_icon1'] = 'http://testsite.andthemes.com/dine-and-drink/wp-content/uploads/2013/04/Screen-shot-2013-03-29-at-1.08.37-AM3.png';
}
ksort($options_badge_name);
ksort($options_badge_icon);
$options2 = array();
foreach($options_badge_name as $okey => $oval){
	$string = $okey;
	$numbername = $string[strlen($string)-1];
	array_push($options2, array(
										"name" => "",
										"id" => $okey,
										"type" => "add_remove_name_group",
										"tab" => "foodmenu",
										"default" => $oval,
										"class" => "input_food_badge_name",
										"open" => -1,
										"close" => -1)
				   );
	array_push($options2, array(
										"name" => "",
										"id" => $shortname.'_badge_icon'.$numbername,
										"type" => "add_remove_icon_group",
										"tab" => "foodmenu",
										"img_width" => "",
										//"default" => $options_badge_icon[$shortname.'_badge_icon'.$numbername],
										"open" => -1,
										"close" => -1)
				   );
}

$options4 = array(
		 array(
				"type" => "add_remove_close",
				"desc" => "<u>To Add New Food Badge</u><br /> - Click on 'Add' Button, the blank input box will appear. type your badge/sign/icon name, upload your icon( recommend size is 20 x 20px) then Click 'Save Changes' at the top or Bottom of the page<br /><u>To Edit Food Badge</u><br />- Edit Name and/or image then Click 'Save Changes' at the top or Bottom of the page <br /><u>To Delete Food Badge</u><br />- Click on 'X' button",
				"tab" => "foodmenu",
				"open" => -1),
		
		array(
				"name" => __("Additional Pricing", 'default'),
				"type" => "heading",
				"tab" => "foodmenu",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Choose", 'default'),
				"type" => "add_text_open",
				"tab" => "foodmenu",
				"close" => -1)
	);

//$all_options = wp_load_alloptions();
$my_options = array();
$options_pricing_name = array();
$count_pricing_item = 0;
foreach( $all_options as $name => $value ) {
	if (strpos($name, $shortname.'_pricing_name') === 0) {
		$options_pricing_name[$name] = $value;
		$count_pricing_item++;
	}
}

if($count_pricing_item == 0){
	/////enter default data
		//$options_pricing_name[$shortname.'_pricing_name1'] = 'New';
}
ksort($options_pricing_name);
$options5 = array();
foreach($options_pricing_name as $okey => $oval){
	$string = $okey;
	$numbername = $string[strlen($string)-1];
	array_push($options5, array(
										"name" => "",
										"id" => $okey,
										"type" => "add_text_name_group",
										"tab" => "foodmenu",
										"default" => $oval,
										"class" => 'price_input',
										"open" => -1,
										"close" => -1)
				   );
}	
		
$options3 = array(
		array(
				"type" => "add_text_close",
				"desc" => "<u>To Add New Pricing</u><br /> - Click on 'Add' Button, the blank input box will appear. type your pricing name then Click 'Save Changes' at the top or Bottom of the page<br /><u>To Edit Pricing Name</u><br />- Edit your Pricing Name then Click 'Save Changes' at the top or Bottom of the page <br /><u>To Delete Pricing Name</u><br />- Click on 'X' button",
				"tab" => "foodmenu",
				"open" => -1),
	////Single Food Menu	
		array(
				"name" => __(" Food Menu Slider", 'default'),
				"type" => "heading",
				"tab" => "foodmenu",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Enable Food Menu Slider Autoplay?", 'default'),
				"id" => $shortname."_menu_auto_play",
				"type" => "checkbox",
				"desc" => "Check to Enable Slider Autoplay on Single Food Menu",
				"default" => "true",
				"tab" => "foodmenu"),
		
		array(
				"name" => __("Food Menu Slider Time Interval", 'default'),
				"id" => $shortname."_menu_auto_play_ms",
				"type" => "text",
				"desc" => "Enter Animation Speed in Milliseconds. If leave it blank, it will use default speed (4000 ms).",
				"default" => 4000,
				"tab" => "foodmenu"),
		array(
				"name" => __("Social Sharing", 'default'),
				"type" => "heading",
				"tab" => "foodmenu",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Enable Social Share on Food Menu", 'default'),
				"id" => $shortname."_menu_widget",
				"type" => "checkbox",
				"desc" => "Check to Enable Social Share on your Food Menus.",
				"default" => "false",
				"tab" => "foodmenu"),
		array(
				"name" => __("Social Share Button", 'default'),
				"type" => "checkboxgroup",
				"desc" => "Check to select your Social Share Button.",
				"default" => "false",
				"tab" => "foodmenu",
				"close" => -1),
		array(
				"name" => __("Facebook", 'default'),
				"id" => $shortname."_menu_widget_fb",
				"type" => "checkboxgroup_sub",
				"default" => "false",
				"tab" => "foodmenu",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Twitter", 'default'),
				"id" => $shortname."_menu_widget_tw",
				"type" => "checkboxgroup_sub",
				"default" => "false",
				"tab" => "foodmenu",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Google+", 'default'),
				"id" => $shortname."_menu_widget_google",
				"type" => "checkboxgroup_sub",
				"default" => "false",
				"tab" => "foodmenu",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Linkedin", 'default'),
				"id" => $shortname."_menu_widget_linkedin",
				"type" => "checkboxgroup_sub",
				"default" => "false",
				"tab" => "foodmenu",
				"open" => -1,
				"close" => -1),
		array(
				"type" => "checkboxgroup_close",
				"desc" => "Check to select your Social Share Button to show on Posts",
				"tab" => "foodmenu",
				"open" => -1),
		
		
		
		
		
		
//////== 6. Blog ==
		////Style
		array(
				"name" => __('Blog Style', 'default'),
				"type" => "heading",
				"tab" => "blog",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Blog Style", 'default'),
				"id" => $shortname."_blog_style",
				"options" => array(1 => '<img src="'._IMG.'editor-blogstyle_3-9.png" class="at_image_style_thumbnail" width="60" height="59" alt="blogstyle_3-9" /> Left Sidebar',
								   		2 => '<img src="'._IMG.'editor-blogstyle_9-3.png" class="at_image_style_thumbnail" width="60" height="59" alt="blogstyle_3-9" /> Right Sidebar',
								   		3 => '<img src="'._IMG.'editor-blogstyle_full.png" class="at_image_style_thumbnail" width="60" height="59" alt="blogstyle_full"/> Fulll Width'),
				"type" => "radio",
				"desc" => "Choose your Blog style.",
				"default" => 2,
				"tab" => "blog"),
		array(
				"name" => __("Display Featured Image on Post", 'default'),
				"id" => $shortname."_display_feature",
				"type" => "checkbox",
				"desc" => "Check to show Featured Image on Post.",
				"default" => "true",
				"tab" => "blog"),
		array(
				"name" => __("Social Sharing", 'default'),
				"type" => "heading",
				"tab" => "blog",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Enable Social Share on Posts", 'default'),
				"id" => $shortname."_post_widget",
				"type" => "checkbox",
				"desc" => "Check to Enable Social Share on your Posts.",
				"default" => "false",
				"tab" => "blog"),
		array(
				"name" => __("Social Share Button", 'default'),
				"type" => "checkboxgroup",
				"desc" => "Check to select your Social Share Button.",
				"default" => "false",
				"tab" => "blog",
				"close" => -1),
		array(
				"name" => __("Facebook", 'default'),
				"id" => $shortname."_post_widget_fb",
				"type" => "checkboxgroup_sub",
				"default" => "false",
				"tab" => "blog",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Twitter", 'default'),
				"id" => $shortname."_post_widget_tw",
				"type" => "checkboxgroup_sub",
				"default" => "false",
				"tab" => "blog",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Google+", 'default'),
				"id" => $shortname."_post_widget_google",
				"type" => "checkboxgroup_sub",
				"default" => "false",
				"tab" => "blog",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Linkedin", 'default'),
				"id" => $shortname."_post_widget_linkedin",
				"type" => "checkboxgroup_sub",
				"default" => "false",
				"tab" => "blog",
				"open" => -1,
				"close" => -1),
		array(
				"type" => "checkboxgroup_close",
				"desc" => "Check to select your Social Share Button to show on Posts",
				"tab" => "blog",
				"open" => -1),
		
/////==  Custom CSS ==
		
		array(
				"name" => __("Custom CSS", 'default'),
				"type" => "heading",
				"tab" => "css",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Custom CSS", 'default'),
				"desc" => "",
 				"id" => $shortname."_custom_css",
				"type" => "textarea",
				"row" => 100,
				"column" => 50,
				"default" => "",
				"tab" => "css"),
		
/////== 7. Setting ==
		
		array(
				"name" => __("Settings", 'default'),
				"type" => "heading",
				"tab" => "setting",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Theme Options", 'default'),
				"text" => "Load",
				"desc" => "Click to Load your Default Theme Options.<br /><br />
General, Font, Overall Elements, Elements Color, Food Menu, Blog",
 				"id" => array( $shortname."_load_theme1" => '<img src="'._IMG.'editor-themeoptions_salad.png" class="at_image_style_thumbnail" width="60" height="59" alt="themeoptions_salad" />',
							  $shortname."_load_theme2" => '<img src="'._IMG.'editor-themeoptions_spaghetti.png" class="at_image_style_thumbnail" width="60" height="59" alt="themeoptions_spaghetti" />',
							  $shortname."_load_theme3" => '<img src="'._IMG.'editor-themeoptions_coffee.png" class="at_image_style_thumbnail" width="60" height="59" alt="themeoptions_coffee" />',
							  $shortname."_load_theme4" => '<img src="'._IMG.'editor-themeoptions_cake.png" class="at_image_style_thumbnail" width="60" height="59" alt="themeoptions_cake" />',
							  $shortname."_load_theme5" => '<img src="'._IMG.'editor-themeoptions_luxury.png" class="at_image_style_thumbnail" width="60" height="59" alt="themeoptions_luxury" />',
							  ),
 				"class" => "at_default_theme_options btn at_admin_white_button",
				"type" => "formbutton_picture",
				"tab" => "setting")
		);

	$url = 'http://demo.andthemes.com/dine-and-drink/load/at_colorscheme.xml';
	$options9 = array();
	
	$color_arr =  array();
	
	if( function_exists('curl_init') ) { // if cURL is available, use it...
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$cache = curl_exec($ch);
		curl_close($ch);
	} else {
		$cache = file_get_contents($url); // ...if not, use the common file_get_contents()
	}
	
	if ($cache) {
		$xml = simplexml_load_string($cache);
		foreach($xml->color as $color){
			$color_arr[strtolower($color->{'colorscheme-name'})] = $color->{'colorscheme-name'};
		}
		if(count($color_arr) >0){
			array_push($options9, array(
								"name" => __("Color Scheme", 'default'),
								"text" => "Load",
								"desc" => "Click to load Color Scheme.
								<br /><br />
	Just Only Font and Elements Colors.
								
								",
								"id" => $color_arr,
								"class" => "at_default_theme_options btn at_admin_white_button",
								"type" => "formbutton_loadcolor",
								"tab" => "setting")
		   );
		}
	}
	
$options8 = array(
		array(
				"name" => __("Widgets Settings", 'default'),
				"text" => "Load Default Widgets Settings",
				"desc" => "Click to Load the Default Widgets Setting.",
 				"id" => $shortname."_load_widget",
 				"class" => "at_default_widgets btn at_admin_white_button",
				"type" => "formbutton",
				"tab" => "setting"),
		array(
				"name" => __("Import XML Content", 'default'),
				"text" => "Import XML Content",
				"link" => admin_url()."admin.php?import=wordpress",
 				"desc" => "Click to goto Tool > import to upload an XML file included in the '/".$themeslugname."/defaults/'",
				"type" => "link",
				"tab" => "setting"),
		
//////== 8. Support ==
		
		array(
				"name" => __("Support", 'default'),
				"type" => "heading",
				"tab" => "setting",
				"open" => -1,
				"close" => -1),
		array(
				"name" => __("Help Document", 'default'),
				"text" => "Help Document",
				"desc" => "",
 				"id" => $shortname."_doc_download",
				"type" => "link",
				"link" => "http://demo.andthemes.com/dine-and-drink/documentation/",
				"tab" => "setting"),
		
);
$options = array();
array_push($options,$options1,$options7,$options6,$options2,$options4,$options5,$options3,$options9,$options8);
return $options;
}

?>