<?php

add_action('init', 'custom_mce_button');
function custom_mce_button(){
   if (current_user_can('edit_posts') &&  current_user_can('edit_pages')){
     add_filter('mce_buttons_3', 'add_button');/////add button in line 3
	  add_filter('mce_buttons_4', 'add_button2');/////add button in line 4
     add_filter('mce_external_plugins', 'add_plugin');
   }
}
function add_button($buttons){
	array_push($buttons,"toggle1","toggle2","tabs","collapses","slider","leftquote","rightquote","contactform","reservationform","googlemap");
	return $buttons;
}
function add_button2($buttons){
	array_push($buttons,"divider","columns","buttons","list","boxstyle");
	return $buttons;
}
function add_plugin($plugin_array){
   $plugin_array['toggle1'] = _JS . 'at_shortcodes.js';
   $plugin_array['toggle2'] = _JS . 'at_shortcodes.js';
   $plugin_array['tabs'] = _JS . 'at_shortcodes.js';
   $plugin_array['slider'] = _JS . 'at_shortcodes.js';
   $plugin_array['columns'] = _JS . 'at_shortcodes.js';
   $plugin_array['buttons'] = _JS . 'at_shortcodes.js';
   $plugin_array['list'] = _JS . 'at_shortcodes.js';
   $plugin_array['boxstyle'] = _JS . 'at_shortcodes.js';
   $plugin_array['divider'] = _JS . 'at_shortcodes.js';
   $plugin_array['leftquote'] = _JS . 'at_shortcodes.js';
   $plugin_array['rightquote'] = _JS . 'at_shortcodes.js';
   $plugin_array['contactform'] = _JS . 'at_shortcodes.js';
   $plugin_array['collapses'] = _JS . 'at_shortcodes.js';
   $plugin_array['googlemap'] = _JS . 'at_shortcodes.js';
   $plugin_array['reservationform'] = _JS . 'at_shortcodes.js';
   return $plugin_array;
}

function at_one_third($atts, $content = null){
   return '<div class="one_third">'.do_shortcode($content).'</div>';
}
add_shortcode('one_third', 'at_one_third');

function at_one_third_last($atts, $content = null){
   return '<div class="one_third last">'.do_shortcode($content).'</div><div class="clearboth"></div>';
}
add_shortcode('one_third_last', 'at_one_third_last');

function at_two_third($atts, $content = null){
   return '<div class="two_third">'.do_shortcode($content).'</div>';
}
add_shortcode('two_third', 'at_two_third');

function at_two_third_last($atts, $content = null){
   return '<div class="two_third last">'.do_shortcode($content).'</div><div class="clearboth"></div>';
}
add_shortcode('two_third_last', 'at_two_third_last');

function at_one_half($atts, $content = null){
   return '<div class="one_half">'.do_shortcode($content).'</div>';
}
add_shortcode('one_half', 'at_one_half');

function at_one_half_last($atts, $content = null){
   return '<div class="one_half last">'.do_shortcode($content).'</div><div class="clearboth"></div>';
}
add_shortcode('one_half_last', 'at_one_half_last');

function at_one_fourth($atts, $content = null){
   return '<div class="one_fourth">'.do_shortcode($content).'</div>';
}
add_shortcode('one_fourth', 'at_one_fourth');

function at_one_fourth_last($atts, $content = null){
   return '<div class="one_fourth last">'.do_shortcode($content).'</div><div class="clearboth"></div>';
}
add_shortcode('one_fourth_last', 'at_one_fourth_last');

function at_three_fourth($atts, $content = null){
   return '<div class="three_fourth">'.do_shortcode($content).'</div>';
}
add_shortcode('three_fourth', 'at_three_fourth');

function at_three_fourth_last($atts, $content = null){
   return '<div class="three_fourth last">'.do_shortcode($content).'</div><div class="clearboth"></div>';
}
add_shortcode('three_fourth_last', 'at_three_fourth_last');

function at_one_fifth($atts, $content = null){
   return '<div class="one_fifth">'.do_shortcode($content).'</div>';
}
add_shortcode('one_fifth', 'at_one_fifth');

function at_one_fifth_last($atts, $content = null){
   return '<div class="one_fifth last">'.do_shortcode($content).'</div><div class="clearboth"></div>';
}
add_shortcode('one_fifth_last', 'at_one_fifth_last');

function at_two_fifth($atts, $content = null){
   return '<div class="two_fifth">'.do_shortcode($content).'</div>';
}
add_shortcode('two_fifth', 'at_two_fifth');

function at_two_fifth_last($atts, $content = null){
   return '<div class="two_fifth last">'.do_shortcode($content).'</div><div class="clearboth"></div>';
}
add_shortcode('two_fifth_last', 'at_two_fifth_last');

function at_three_fifth($atts, $content = null){
   return '<div class="three_fifth">'.do_shortcode($content).'</div>';
}
add_shortcode('three_fifth', 'at_three_fifth');

function at_three_fifth_last($atts, $content = null){
   return '<div class="three_fifth last">'.do_shortcode($content).'</div><div class="clearboth"></div>';
}
add_shortcode('three_fifth_last', 'at_three_fifth_last');

function at_four_fifth($atts, $content = null){
   return '<div class="four_fifth">'.do_shortcode($content).'</div>';
}
add_shortcode('four_fifth', 'at_four_fifth');

function at_four_fifth_last($atts, $content = null){
   return '<div class="four_fifth last">'.do_shortcode($content).'</div><div class="clearboth"></div>';
}
add_shortcode('four_fifth_last', 'at_four_fifth_last');

function at_one_sixth($atts, $content = null){
   return '<div class="one_sixth">'.do_shortcode($content).'</div>';
}
add_shortcode('one_sixth', 'at_one_sixth');

function at_one_sixth_last($atts, $content = null){
   return '<div class="one_sixth last">'.do_shortcode($content).'</div><div class="clearboth"></div>';
}
add_shortcode('one_sixth_last', 'at_one_sixth_last');

function at_five_sixth($atts, $content = null){
   return '<div class="five_sixth">'.do_shortcode($content).'</div>';
}
add_shortcode('five_sixth', 'at_five_sixth');

function at_five_sixth_last($atts, $content = null){
   return '<div class="five_sixth last">'.do_shortcode($content).'</div><div class="clearboth"></div>';
}
add_shortcode('five_sixth_last', 'at_five_sixth_last');

/////toggle
function at_toggle($atts, $content){
	extract(shortcode_atts(array(
	'style' => 'style1'
	), $atts));
	do_shortcode($content);
	$return = '<div class="toggle_wrapper '.$style.'"><h4 class="toggle"><a href="#"><i class="icon-plus-sign"></i>'.$GLOBALS['toggle_title'].'</a></h4><div class="toggle_container" style="display:none">'.$GLOBALS['toggle_content'].'</div></div>';
	
	return $return;
}
add_shortcode('toggle', 'at_toggle');

function at_toggle_title($atts, $content){
	
	$GLOBALS['toggle_title'] = $content;
	
}
add_shortcode('toggle_title', 'at_toggle_title');

function at_toggle_content($atts, $content){
	
	$GLOBALS['toggle_content'] = $content;
	
}
add_shortcode('toggle_content', 'at_toggle_content');

////tabs
function at_tab_container($atts, $content){
	$GLOBALS['tab_count'] = 0;	
	$GLOBALS['tab_title_count'] = 0;	
	//$GLOBALS['tab_container_count'] = 0;	
	
	
	$GLOBALS['tab_container_count']++;
	$x = $GLOBALS['tab_container_count'];
	do_shortcode($content);
	$tabcount=0;
	if(is_array($GLOBALS['tabs'])){		
		foreach($GLOBALS['tabs'] as $key => $tab){
			$activefade = "";
			$tabcount++;
			$tabtext = '<li ';
				if($tabcount == 1){ $tabtext .= 'class = "active"'; }
			$tabtext .= '><a href="#tab'.$tabcount.$x.'" data-toggle="tab">'.do_shortcode($GLOBALS['tab_title'][$key]['content']).'</a></li>';
			
			$tabs[] = $tabtext;
			if($tabcount == 1){ $activefade = 'in active';}
			$panes[] = '<div id="tab'.$tabcount.$x.'" class="tabs-container tab-pane fade '.$activefade.'">'.do_shortcode($tab['content']).'</div>';
		}
		$return = '<ul  id="tabwrap'.$x.'" class="nav-tabs nav">'.implode("\n", $tabs).'</ul><div class="tabs-container-wrapper tab-content">'.implode("\n", $panes).'</div>';
		$return .= '<script type="text/javascript">jQuery("#tabwrap'.$x.' a").click(function (e) { e.preventDefault(); jQuery(this).tab("show"); }); 
		if(jQuery(".nav-tabs").length > 0){
			var url =  jQuery(location).attr("href");
			var idx = url.indexOf("#");
			var hash = idx != -1 ? url.substring(idx+1) : "";
			if(hash != ""){
				jQuery(".tab-content #"+hash).siblings(".tabs-container").removeClass("in active");
				jQuery(".nav-tabs a[href=\"#"+hash+"\"]").parent().siblings("li").removeClass("active");
				
				jQuery(".tab-content #"+hash).addClass("in active");
				jQuery(".nav-tabs a[href=\"#"+hash+"\"]").parent().addClass("active");
				
			}
		}
	</script>';
	}
	
	return $return;
}
add_shortcode('tab_container', 'at_tab_container');

function at_tab($atts, $content){
	
	$x = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][$x] = array('content' =>  $content);
	$GLOBALS['tab_count']++;
	
}
add_shortcode('tabs', 'at_tab');

function at_tab_title($atts, $content){
	
	$x = $GLOBALS['tab_title_count'];
	$GLOBALS['tab_title'][$x] = array('content' =>  $content);
	$GLOBALS['tab_title_count']++;
	
}
add_shortcode('tab_title', 'at_tab_title');


////////slider
function at_slider_container($atts, $content){
	$GLOBALS['slider_count'] = 0;	
	$GLOBALS['panel'] = array();
	do_shortcode($content);
	$slidercount=0;
	$sliders = array();
	if(is_array($GLOBALS['panel'])){		
		foreach($GLOBALS['panel'] as $slider){
			$slidercount++;
			
			$sliders[] = '<li>'.do_shortcode($slider['content']).'</li>';
		}
		$return = '<div class="sc_slider_wrapper flexslider"><ul class="slides">'.implode("\n", $sliders).'</ul></div>';
		$return .= "<script type='text/javascript'>							
						jQuery(document).ready(function() {
							jQuery('.sc_slider_wrapper').flexslider({
									  animation: 'slide',
									  slideshowSpeed: 0, //Integer: Set the speed of the slideshow cycling, in milliseconds
									  animationSpeed: 200,   //Integer: Set the speed of animations, in milliseconds
									  slideshow: false, //Boolean: Animate slider automatica
									  pauseOnHover: true,
									  prevText: '<i class=\"icon-angle-left\"></i>',
									  nextText: '<i class=\"icon-angle-right\"></i>'
							});
						});
							
							</script>";
	}
	return $return;
}
add_shortcode('slider', 'at_slider_container');

function at_slider_panel($atts, $content){
	extract(shortcode_atts(array(
	'title' => '',
	'link' => '',
	), $atts));
	$x = $GLOBALS['slider_count'];
	$GLOBALS['panel'][$x] = array('title' => sprintf($title, $GLOBALS['slider_count']),'link' => sprintf($link, $GLOBALS['slider_count']), 'content' =>  $content);
	
	$GLOBALS['slider_count']++;
}
add_shortcode('panel', 'at_slider_panel');

//////buttons
function at_button($atts, $content = null){
	extract(shortcode_atts(array(
	'color' => 'black',
	'size' => 'small',
	'link' => 'The URL of the button',
	'target' => 'blank'
	), $atts));
   return '<a href="'.$link.'" target="_'.$target.'"><button class="btn btn-'.$size.' btn-at-'.$color.'" type="button">'.do_shortcode($content).'</button></a>';
}
add_shortcode('button', 'at_button');

//////list style

/*function at_list($atts, $content){
	extract(shortcode_atts(array(
	'type' => 'alert',
	), $atts));
	do_shortcode($content);
	$return = '<ul class="list-style-short-code">'.$GLOBALS['list_content'].'</ul>';
	
	return $return;
}
add_shortcode('list', 'at_list');*/

function at_list_content($atts, $content){
	
	$x = $GLOBALS['list_count'];
	extract(shortcode_atts(array(
	'icon' => 'icon-angle-right',
	'color' => '#ffffff',
	), $atts));
	$GLOBALS['lists'][$x] = array('content' =>  $content, 'icon' => $icon, 'color' => $color);
	$GLOBALS['list_count']++;
	
}
add_shortcode('list_item', 'at_list_content');

function at_list($atts, $content){
	$GLOBALS['list_count'] = 0;	
	//$GLOBALS['tab_container_count'] = 0;
	$GLOBALS['list_count']++;
	$x = $GLOBALS['list_count'];
	do_shortcode($content);
	$listcount=0;
	if(is_array($GLOBALS['lists'])){		
		foreach($GLOBALS['lists'] as $key => $list){
			$listcount++;
			$listtext = '<li><i class="'.$list['icon'].'" style="color: '.$list['color'].';"></i>'.do_shortcode($list['content']).'</li>';
			
			$lists[] = $listtext;
		}
		$return = '<ul class="list-style-short-code">'.implode("\n", $lists).'</ul>';
	}
	
	return $return;
}
add_shortcode('list', 'at_list');



//////message box
function at_messagebox($atts, $content = null){
	extract(shortcode_atts(array(
	'color' => 'red',
	'type' => 'exclamation',
	), $atts));
	//return '<div class="box_wrapper '.$style.'"><div class="box '.$type.'">'.do_shortcode($content).'</div></div>';
	$icon = '';
	if($type == 'no-icon'){
		$icon = ' no-icon';
	}
	return '<div class="message-box-wrapper clearfix '.$color.'"><div class="message-box-icon"><i class="'.$type.'"></i></div><div class="message-box-content'.$icon.'">'.do_shortcode($content).'</div></div>';
}
add_shortcode('messagebox', 'at_messagebox');

//////divider
function at_divider($atts, $content = null){
	extract(shortcode_atts(array(
	'style' => 'solid',
	), $atts));
   return '<div class="divider '.$style.'"></div>';
}
add_shortcode('divider', 'at_divider');

//////quote
function at_quote($atts, $content = null){
	extract(shortcode_atts(array(
	'style' => 'left',
	), $atts));
   return '<div class="pullquote_wrapper '.$style.'"><div class="pullquote">'.do_shortcode($content).'</div></div>';
}
add_shortcode('pullquote', 'at_quote');

/////contactform
function at_contactform($atts, $content = null){
	
	extract(shortcode_atts(array(
	'to' => get_bloginfo('admin_email'),
	), $atts));
   $return =  '<div class="contact"><div id="node" style="display:none"></div>
	<div id="contact_success" style="display:none">
		'.__('Your message has been sent.', 'default').'
	</div>
	<form id="contact_me" name="contact_form" method="post" class="clearfix">
		<ol class="forms">
			<li><label>'.__('Name' , 'default').' *</label>
				<input type="text" name="name" id="contact_name" class="require-field" value="">
				<div class="contacterror name-error">* Please enter your name.</span>
			</li>
			<li><label>'.__('Email' , 'default').' *</label>
				<input type="text" name="email" id="contact_email" class="require-field" value="">
				<div class="contacterror email-error">* Please enter your email.</span>
				<div class="contacterror email-valid">* Please enter a valid email address.</span>
			</li>
			<li class="textarea"><label>'.__('Message' , 'default').' *</label>
				<textarea name="message" id="contact_message" class="require-field"></textarea>
				<div class="contacterror message-error">* Please enter the message.</span>
			</li>
			<li class="buttons">
				<input type="hidden" name="emailto" id="contact_emailto" value="'.$to.'">
				<input type="hidden" name="action" value="contact_me">
				<button type="submit" class="contact-submit button" id="contactform-submit">'.__('Submit' , 'default').'</button>
				<span class="contact-loading" id="contact-loading"></span>
			</li>
		</ol>
	</form>
</div>
			';
	
	return $return;
}
add_shortcode('contactform', 'at_contactform');

///collapse
function at_collapse_container($atts, $content){
	$GLOBALS['collapse_count'] = 0;	
	$GLOBALS['collapse_title_count'] = 0;	
	//$GLOBALS['collapse_container_count'] = 0;	
	
	
	$GLOBALS['collapse_container_count']++;
	$x = $GLOBALS['collapse_container_count'];
	do_shortcode($content);
	$collapsecount=0;
	if(is_array($GLOBALS['collapses'])){		
		foreach($GLOBALS['collapses'] as $key => $collapse){
			$activefade = "";
			$collapsecount++;
			$collapsetext = '<div class="accordion-group"><div class="accordion-heading"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion'.$x.'" href="#collapse'.$collapsecount.$x.'"> '.do_shortcode($GLOBALS['collapse_title'][$key]['content']).'</a></div><div id="collapse'.$collapsecount.$x.'" class="accordion-body collapse ';
	
				if($collapsecount == 1){ $collapsetext .= 'in'; }
				
			$collapsetext .= '"><div class="accordion-inner">'.do_shortcode($collapse['content']).'</div></div></div>';
			
			$collapses[] = $collapsetext;
			//if($collapsecount == 1){ $activefade = 'in active';}
			//$panes[] = '<div id="collapse'.$collapsecount.$x.'" class="collapses-container collapse-pane fade '.$activefade.'">'.do_shortcode($collapse['content']).'</div>';
		}
		$return = '<div class="accordion" id="accordion'.$x.'">'.implode("\n", $collapses).'</div>';
		
	
		$return .= '<script type="text/javascript">jQuery("#accordion'.$x.'").collapse()</script>';
	}
	
	return $return;
}
add_shortcode('collapse_container', 'at_collapse_container');

function at_collapse($atts, $content){
	
	$x = $GLOBALS['collapse_count'];
	$GLOBALS['collapses'][$x] = array('content' =>  $content);
	$GLOBALS['collapse_count']++;
	
}
add_shortcode('collapses', 'at_collapse');

function at_collapse_title($atts, $content){
	
	$x = $GLOBALS['collapse_title_count'];
	$GLOBALS['collapse_title'][$x] = array('content' =>  $content);
	$GLOBALS['collapse_title_count']++;
	
}
add_shortcode('collapse_title', 'at_collapse_title');

function at_googlemap($atts, $content = null){
	
	extract(shortcode_atts(array(
            'api_key' => false,
            'id' => 'map-canvas-1',
            'class' => '',
            'zoom' => '15',
            'coords' => '18.791755, 98.987331',
            'type' => 'roadmap',
            'width' => '450px',
            'height' => '450px',
			'info_text' => false
        ), $atts ) );
        
        
        $return = "";
        
        $map_type_id = "google.maps.MapTypeId.ROADMAP";
   
   switch ($type) {
            case "roadmap":
                $map_type_id = "google.maps.MapTypeId.ROADMAP";
                break;
            case "satellite":
                $map_type_id = "google.maps.MapTypeId.SATELLITE";
                break;
            case "hybrid":
                $map_type_id = "google.maps.MapTypeId.HYBRID";
                break;
            case "terrain":
                $map_type_id = "google.maps.MapTypeId.TERRAIN";
                break;
        }
        
        if($api_key) {
			$return = '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key='.$api_key.'&sensor=true"></script>';
		}else{
			$return = '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>';
		}
            $return .= '<div class="gmap_container"><div id="'.$id.'" class="map-canvas '.$class.'" style="width:'.$width.';height:'.$height.';" ></div></div>';
            
           	$return .= '<script type="text/javascript">';
            $return .= 'jQuery(document).on("ready", function(){ ';
            $return .= 'var options = { center: new google.maps.LatLng('.$coords.'), ';
			$return .= 'scrollwheel: false, ';
            $return .= 'zoom: ' . $zoom . ', mapTypeId: ' . $map_type_id . ' };';
            $return .= 'var map = new google.maps.Map(document.getElementById("'.$id.'"), options);';
            $return .= 'var marker = new google.maps.Marker({ position: new google.maps.LatLng('.$coords.'), map: map});';
			if($info_text){
				$info_text = str_replace('&gt;', '>', $info_text);
				$info_text = str_replace('&lt;', '<', $info_text);
				$return .= 'var contentString = "<div class=\"map-canvas-info\">'.$info_text.'</div>";';
    			//$return .= 'var infowindow = new google.maps.InfoWindow({ content: contentString });';
				$return .= 'var infowindow = new google.maps.InfoWindow({});';
    			$return .= 'google.maps.event.addListener(marker, "click", function() { infowindow.setContent(contentString);  infowindow.open(map,marker); });';
			}
            $return .= '});</script>';
			
			
        
        return $return;
}
add_shortcode('googlemap', 'at_googlemap');

/////reservationform
function at_reservationform($atts, $content = null){
	
	extract(shortcode_atts(array(
	'to' => get_bloginfo('admin_email'),
	), $atts));
   $return =  '<div class="reservationfrom"><div id="node" style="display:none"></div>
	<div id="reservation_success" style="display:none">
		'.__('Your reservation has been sent.', 'default').'
	</div>
	<form id="reservation_me" name="reservation_form" method="post" class="clearfix">
		<ol class="forms">
			<li>
				<label>'.__('Name' , 'default').': <span class="required-star">*</span></label>
				<input type="text" name="name" id="reservation_name" class="require-field" value="">
				<div class="reservationerror name-error">* Please enter your name.</div>
			</li>
			<li><label>'.__('Phone Number' , 'default').': <span class="required-star">*</span></label>
				<input type="text" name="phone" id="reservation_phone" class="require-field" value="">
				<div class="reservationerror phone-error">* Please enter your phone number.</div>
			</li>
			<li><label>'.__('Email Address' , 'default').': <span class="required-star">*</span></label>
				<input type="text" name="email" id="reservation_email" class="require-field" value="">
				<div class="reservationerror email-error">* Please enter your email.</div>
				<div class="reservationerror email-valid">* Please enter a valid email address.</div>
			</li>
			<li><label>'.__('Number of Persons' , 'default').': <span class="required-star">*</span></label>
				<input type="text" name="guest" id="reservation_guest" class="require-field" value="">
				<div class="reservationerror guest-error">* Please enter number of persons.</div>
			</li>
			<li><label>'.__('Date' , 'default').': <span class="required-star">*</span></label>
				<input type="text" name="date" id="reservation_date" class="require-field" value="">
				<div class="reservationerror date-error">* Please enter date.</div>
			</li>
			<li><label>'.__('Time' , 'default').': <span class="required-star">*</span></label>
				<input type="text" name="time" id="reservation_time" class="require-field" value="">
				<div class="reservationerror time-error">* Please enter time.</div>
			</li>
			<li class="textarea"><label>'.__('Message / Special Request' , 'default').'</label>
				<textarea name="message" id="reservation_message"></textarea>
			</li>
			<li class="buttons">
				<input type="hidden" name="emailto" id="reservation_emailto" value="'.$to.'">
				<input type="hidden" name="action" value="reservation_me">
				<button type="submit" class="contact-submit button" id="contactform-submit">'.__('Make a reservation' , 'default').'</button>
				<span class="contact-loading" id="contact-loading"></span>
			</li>
		</ol>
	</form>
</div>
			';
	
	return $return;
}
add_shortcode('reservationform', 'at_reservationform');

?>