<?php

////for shortcode.php
$GLOBALS['tab_container_count'] = 0;
$GLOBALS['collapse_container_count'] = 0;	
//////

if ( ! isset( $content_width ) )
	$content_width = 620;
	
add_theme_support('automatic-feed-links');
//add_theme_support('custom-background');
//add_theme_support('custom-header');
add_theme_support('editor_style');
add_editor_style('custom-editor-style.css');

function at_admin_scripts(){
	
	wp_enqueue_script('jquery');
	wp_register_script('at_widget', _JS . 'at_widget.js', array(), '1.0', false);
	wp_enqueue_script('at_widget');
	
	if(isset($_GET['page']) && ($_GET['page']=='options-page.php')){
		wp_register_script('jquery-ui', _JS . 'jquery-ui.js', array(), '', true);
		wp_enqueue_script('jquery-ui');
		wp_register_script('bootstrap', _TEMPLATE_URL. '/bootstrap/js/bootstrap.js', array(), '', true);
		wp_enqueue_script('bootstrap');
		wp_register_script('ajaxupload.3.5', _JS . 'ajaxupload.3.5.js', array(), '3.5', true);
		wp_enqueue_script('ajaxupload.3.5');
		
		wp_register_script('colorpicker.min', _JS . 'colorpicker.min.js', array(), '', true);///color picker
		wp_enqueue_script('colorpicker.min');
		
		wp_register_script('jquery.lightbox-0.5', _JS . 'jquery.lightbox-0.5.js', array(), '0.5', false);
		wp_enqueue_script('jquery.lightbox-0.5');
		
		wp_register_script('at_functions', _JS . 'at_functions.js', array(), '1.0', true);
		wp_enqueue_script('at_functions');
	}
	
	if((isset($_GET['post_type']) && ($_GET['post_type']=='menu')) || (isset($_GET['post']))){
		wp_register_script('at_menufunctions', _JS. 'at_menufunctions.js', array(), '1.0', true);
		wp_enqueue_script('at_menufunctions');
	}
	
}
function at_admin_css(){
	if(isset($_GET['page']) && ($_GET['page']=='options-page.php')){
		wp_register_style('at_admin', _CSS .'at_admin.css');
		wp_enqueue_style('at_admin');
		wp_register_style('colorpicker', _CSS .'colorpicker.css');///color picker
		wp_enqueue_style('colorpicker');
		
		wp_register_style('bootstrap', _TEMPLATE_URL. '/bootstrap/css/bootstrap.css', array());
		wp_enqueue_style('bootstrap');
	}
}

function at_theme_script(){
	if(!is_admin()){
		if(is_singular() && get_option('thread_comments'))
			wp_enqueue_script('comment-reply');
				
		wp_enqueue_script('jquery');
		
		//wp_register_script('jquery-tabs', _JS . 'jquery-1.7.2.js', array('jquery'), '1.7.2');
		//wp_enqueue_script('jquery-tabs');
		
		//wp_register_script('fading-tabs', _JS . 'fading-tabs.js', array());
		//wp_enqueue_script('fading-tabs');
		
		wp_register_script('bootstrap', _TEMPLATE_URL. '/bootstrap/js/bootstrap.js', array(), '3.5.1', true);
		wp_enqueue_script('bootstrap');
		
		wp_register_script('at_toggle', _JS . 'at_toggle.js', array(), '1.0', true);
		wp_enqueue_script('at_toggle');
		wp_register_script('contact', _JS . 'at_contact.js', array('jquery'), '1.0', true);
		wp_enqueue_script('contact');
		wp_register_script('fluidwidthvideo', _JS . 'at_fluidwidthvideo.js', array('jquery'), '1.0', false);
		wp_enqueue_script('fluidwidthvideo');
		
		////testimonails
		wp_register_script('jquery.easing.1.3', _JS . 'jquery.easing.1.3.js', array(), '1.3', true);
		wp_enqueue_script('jquery.easing.1.3');
		
		////menu
		wp_register_script('superfish', _JS . 'superfish.js', array(), false, true);
		wp_enqueue_script('superfish');
		wp_register_script('hoverIntent', _JS . 'hoverIntent.js', array(), false, true);
		wp_enqueue_script('hoverIntent');
		wp_register_script('at_menu', _JS . 'at_menu.js', array(), '1.0', true);
		wp_enqueue_script('at_menu');
		
		wp_register_script('at_dropdown_responsive_menu', _JS . 'at_dropdown_responsive_menu.js', array(), '1.0', true);
		wp_enqueue_script('at_dropdown_responsive_menu');
		
		wp_register_script('jquery.flexslider', _JS . 'slider/jquery.flexslider.js', array(), false, true);
		wp_enqueue_script('jquery.flexslider');
		
		wp_register_script('jquery.lightbox-0.5', _JS . 'jquery.lightbox-0.5.js', array(), '0.5', true);
		wp_enqueue_script('jquery.lightbox-0.5');
		
		wp_register_script('jquery.krioImageLoader', _JS . 'jquery.krioImageLoader.js', array(), false, true);
		wp_enqueue_script('jquery.krioImageLoader');
		
		wp_register_script('jquery-ui', _JS . 'jquery-ui.js', array(), false, true);
		wp_enqueue_script('jquery-ui');
		
		if(get_option('at01_food_style') == 1){///text+image
		
			wp_register_script('jquery.scrollTo', _JS . 'jquery.scrollTo-1.4.3.1-min.js', array(), '1.4.3.1', true);
			wp_enqueue_script('jquery.scrollTo');
			wp_register_script('waypoints', _JS . 'waypoints.min.js', array(), false, true);
			wp_enqueue_script('waypoints');
			wp_register_script('navbar2', _JS . 'navbar2.js', array(), '2.0', true);
			wp_enqueue_script('navbar2');
			
		}else if(get_option('at01_food_style') == 3){ /// isotope
			wp_register_script('jquery.isotope.min', _JS . 'jquery.isotope.min.js', array(), false, true);
			wp_enqueue_script('jquery.isotope.min');
		}
		
		
		//////single portfolio
		if(is_single() || is_home() || is_front_page()){
		}
		
		if(is_single() || is_page() || is_category()){
			
		}
		if(is_tax()){
			
		}
	}
}

function at_theme_css(){
	
	wp_register_style('customize', _TEMPLATE_URL . '/customize.css',array(),'1.0');
    wp_enqueue_style('customize');
	
	wp_register_style('custom-editor-style', _TEMPLATE_URL . '/custom-editor-style.css',array(),'1.0');
    wp_enqueue_style('custom-editor-style');
	
	wp_register_style('font-awesome', _TEMPLATE_URL . '/font-awesome/css/font-awesome.min.css',array(),'1.0');
    wp_enqueue_style('font-awesome');
	
	 //if((is_home() || is_front_page()) && get_option('at01_slider') == 'true'){
		wp_register_style('flexslider', _CSS . 'flexslider.css',array(),'1.0');
    	wp_enqueue_style('flexslider');
	 //}
	
	if(get_option('at01_resposive') == 'true'){
		
		wp_register_style('bootstrap-responsive', _TEMPLATE_URL. '/bootstrap/css/bootstrap-responsive.css',array(),'1.0');
    	wp_enqueue_style('bootstrap-responsive');
		wp_register_style('responsive', _CSS . 'responsive.css',array(),'1.0');
    	wp_enqueue_style('responsive');
	}
	
	if(get_option('at01_food_style') == 3){//isotope
		wp_register_style('style_isotope', _CSS . 'style_isotope.css',array(),'1.0');
    	wp_enqueue_style('style_isotope');
	}
}

function force_more() {
	global $more;
	$more = FALSE;
}

function andthemes_admin_menu(){
global $themename;
 
 
add_theme_page($themename, $themename, 'administrator', 'options-page.php', 'at_setting_page');
}


function at_setting_page(){
	
?>

<div id="at_save_div" class="updated fade" style="display:none"> Settings saved. </div>
<div id="at_google_font_div" class="updated fade" style="display:none"> Google fonts has been added to your font list.<br /> Please refresh browser. </div>

<form id="at_option_form" method="post" class="at_option_form">
  <input type="hidden" name="action" value="at_save_form" />
  <div class="at_admin_wrapper clear">
    <div class="at_admin_header">
      <div class="at_logo"> <img src="<?php echo _IMG;?>at_admin_logo.png" alt="admin_logo"/> </div>
      <?php /*?><div class="at_version"> Theme Version 1.0 </div><?php */?>
    </div>
    <!--at_admin_header-->
    <div class="at_admin_inner_wrapper clear">
      <div id="tabwrap">
        <ul id="tabnav">
          <li class="active"><a href="#tab1" data-toggle="tab">
            <?php _e('General', 'default');?>
            </a></li>
          <li><a href="#tab2" data-toggle="tab">
            <?php _e('Font', 'default');?>
            </a></li>
          <li><a href="#tab3" data-toggle="tab">
            <?php _e('Overall Elements', 'default');?>
            </a></li>
          <li><a href="#tab4" data-toggle="tab">
            <?php _e('Elements Color', 'default');?>
            </a></li>
          <li><a href="#tab5" data-toggle="tab">
            <?php _e('Food Menu', 'default');?>
            </a></li>
          <li><a href="#tab6" data-toggle="tab">
            <?php _e('Blog', 'default');?>
            </a></li>
          <li><a href="#tab9" data-toggle="tab">
            <?php _e('Custom CSS', 'default');?>
            </a></li>
          <li><a href="#tab7" data-toggle="tab">
            <?php _e('Setting & Support', 'default');?>
            </a></li>
          <?php /*?><li><a href="#tab8" data-toggle="tab">
            <?php _e('Support', 'default');?>
            </a></li><?php */?>
        </ul>
        <p class="p_submit right">
          <input type="hidden" name="page" value="options-page.php">
          <input type="hidden" name="form" value="general">
          <input class="btn at_save_all_button" name="save" type="submit" value="<?php _e('Save changes', 'default'); ?>" />
        </p>
        <div class="tab-content">
          <div id="tab1" class="at_tab_content tab-pane fade active in clear">
            <div class="at_main_heaer">
              <?php _e('General', 'default');?>
            </div>
            <?php at_tab_general();?>
          </div>
          <div id="tab2" class="at_tab_content tab-pane fade">
            <div class="at_main_heaer">
              <?php _e('Font', 'default');?>
            </div>
            <?php at_tab_font();?>
          </div>
          <div id="tab3" class="at_tab_content tab-pane fade">
            <div class="at_main_heaer">
              <?php _e('Overall Elements', 'default');?>
            </div>
            <?php at_tab_overallelements();?>
          </div>
          <div id="tab4" class="at_tab_content tab-pane fade">
            <div class="at_main_heaer">
              <?php _e('Elements Color', 'default');?>
            </div>
            <?php at_tab_color();?>
          </div>
          <div id="tab5" class="at_tab_content tab-pane fade">
            <div class="at_main_heaer">
              <?php _e('Food Menu', 'default');?>
            </div>
            <?php at_tab_foodmenu();?>
          </div>
          <div id="tab6" class="at_tab_content tab-pane fade">
            <div class="at_main_heaer">
              <?php _e('Blog', 'default');?>
            </div>
            <?php at_tab_blog();?>
          </div>
           <div id="tab9" class="at_tab_content tab-pane fade">
            <div class="at_main_heaer">
              <?php _e('Custom CSS', 'default');?>
            </div>
            <?php at_tab_css();?>
          </div>
          <div id="tab7" class="at_tab_content tab-pane fade">
            <div class="at_main_heaer">
              <?php _e('Setting & Support', 'default');?>
            </div>
            <?php at_tab_setting();?>
          </div><?php /*?>
          <div id="tab8" class="at_tab_content tab-pane fade">
            <div class="at_main_heaer">
              <?php _e('Support', 'default');?>
            </div>
            <?php at_tab_support();?>
          </div><?php */?>
        </div>
      </div>
      <p class="p_submit right">
        <input type="hidden" name="page" value="<?php echo $_REQUEST['page'];?>">
        <input type="hidden" name="form" value="general">
        <input name="save" type="submit" value="<?php _e('Save changes', 'default'); ?>" class="btn at_save_all_button"  />
      </p>
      <div class="at_admin_copy"></div>
    </div>
    <!--at_admin_inner_wrapper-->
  </div>
  <!--at_admin_wrapper-->
</form>
<?php 
}?>
<?php 

function at_add_form($tab){ 
	
	$options = options_var($GLOBALS['shortname'],$GLOBALS['themeslugname']);
	
	$disable_arr = array();
	//print_r($options);
?>
<?php foreach($options as $optopt){
	  			foreach($optopt as $opt){
	   	if(isset($opt['default'])) $dd = $opt['default'];
		else $dd = "";
		//echo $opt['id']."-".$dd."<br />";
  ?>
<?php if($opt['tab'] == $tab){?>
<?php if($opt['type'] == 'heading'){?>
<h3><?php echo $opt['name']; ?></h3>
<div class="at_border_under_title clear"></div>
<?php } ?>
<?php 
  if(!isset($opt['open'])){?>
<div class="option option-logo clear <?php if(isset($opt["optionclass"])) echo $opt["optionclass"];?>">
  <div class="option_table">
    <div class="option_row">
      <?php } ?>
      <?php if($opt['type'] == 'text'){ 
  	$default =  get_option($opt['id']) != ""? get_option($opt['id']) : $dd;
  ?>
      <div class="option-label"><?php echo $opt['name']; ?></div>
      <div class="option-control">
        <input name="<?php echo $opt['id']; ?>" id="<?php echo $opt['id']; ?>" value='<?php echo $default; ?>' type="text" class="" size="<?php if(isset($opt['size'])) echo $opt['size']; ?>">
      </div>
      <div class="option-desc"><?php echo $opt['desc']; ?></div>
      <?php }
		  if($opt['type'] == 'upload'){
			  //$default =  get_option($opt['id']) != "" && get_option($opt['id']) != 'at_bg_salad.png' && get_option($opt['id']) != 'at_bg_spaghetti.png' && get_option($opt['id']) != 'at_bg_coffee.png' && get_option($opt['id']) != 'at_bg_cupcake.png' && get_option($opt['id']) != 'at_bg_brasserie.png' ? get_option($opt['id']) : $dd;
			  
			  switch(get_option($opt['id'])){
			  	case 'at_logo_salad.png' :
				case 'at_logo_spaghetti.png' :
				case 'at_logo_coffee.png' :
				case 'at_logo_cupcake.png' :
				case 'at_logo_brasserie.png' :
				case 'at_headerbg_salad.png' :
				case 'at_headerbg_spaghetti.png' :
				case 'at_headerbg_coffee.png' :
				case 'at_headerbg_cupcake.png' :
				case 'at_headerbg_brasserie.png' :
				case 'at_bodybg_salad.png' :
				case 'at_bodybg_spaghetti.png' :
				case 'at_bodybg_coffee.png' :
				case 'at_bodybg_cupcake.png' :
				case 'at_bodybg_brasserie.png' :
					$default = $dd;
					break;
				default :
					$default = get_option($opt['id']);
					break;
			  }
			  ?>
      <div class="option-label"><?php echo $opt['name']; ?></div>
      <div class="option-control"> <img src="<?php echo $default; ?>" id="image_id_<?php echo $opt['id']; ?>" width="<?php echo $opt['img_width']; ?>" <?php if($default == ""){ ?> style="display:none" <?php }?> alt="image_id_<?php echo $opt['id']; ?>"> <br />
        <input name="<?php echo $opt['id']; ?>" id="file_input_<?php echo $opt['id']; ?>" value="<?php echo $default; ?>" type="text">
        <div class="at_image_upload" id="<?php echo $opt['id']; ?>">
          <?php _e('Upload Image', 'default'); ?>
        </div>
        <span id="mestatus_<?php echo $opt['id']; ?>"></span> </div>
      <div class="option-desc"><?php echo $opt['desc']; ?></div>
      <?php }
		  if($opt['type'] == 'select'){
			  $default =  get_option($opt['id']) != ""? get_option($opt['id']) : $dd;
			  ?>
      <div class="option-label"><?php echo $opt['name']; ?></div>
      <div class="option-control">
        <select name="<?php echo $opt['id']; ?>">
          <option value="-1">
          <?php _e('Please Select', 'default');?>
          </option>
          <?php foreach($opt['options'] as $selectkey => $selectval){?>
          <option value="<?php echo $selectkey; ?>"  class="<?php echo $selectkey; ?>" <?php if($default == $selectkey){?> selected="selected" <?php }?>><?php echo $selectval; ?></option>
          <?php }?>
        </select>
      </div>
      <div class="option-desc">
        <?php  echo $opt['desc']; ?>
      </div>
      <?php }
		  if($opt['type'] == 'checkbox'){
			  if(get_option($opt['id'])){
				  if(get_option($opt['id']) == 'true'){
					  $checked = 'checked="checked"';
				  }else{
					$checked = '';
				  }
			  }else{
				  if($opt['default'] == 'true'){
			  			$checked = 'checked="checked"';
				  }else{
				  		$checked = '';
				  }
			  }
			  ?>
      <div class="option-label"><?php echo $opt['name']; ?></div>
      <div class="option-control">
        <input name="<?php echo $opt['id']; ?>" type="checkbox" <?php echo $checked;?>>
      </div>
      <div class="option-desc"><?php echo $opt['desc']; ?></div>
      <?php }
		  if($opt['type'] == 'radio'){
			  $default =  get_option($opt['id']) != ""? get_option($opt['id']) : $dd;
			  ?>
      <div class="option-label"><?php echo $opt['name']; ?></div>
      <div class="option-control <?php if(isset($opt["optioncontrolclass"])) echo $opt["optioncontrolclass"];?>">
        <?php foreach($opt['options'] as $key => $val){?>
        <label>
          <input name="<?php echo $opt['id'];?>" id="<?php echo $opt['id'];?><?php echo $key;?>" class="" type="radio" value="<?php echo $key;?>" <?php if($key == $default){?> checked="checked" <?php }?> <?php if(isset($opt['jsfunction'])){ if($opt['jsfunction'] == 'portfoliotype'){?> onclick="portfoliotype(<?php echo $key;?>);"<?php }}?> <?php if(isset($opt['disable'])){echo $opt['disable']; }?>>
          <?php echo $val;?></label>
        &nbsp;&nbsp;&nbsp;
        <?php }?>
      </div>
      <div class="option-desc"><?php echo $opt['desc']; ?></div>
      <?php }
		  if($opt['type'] == 'textarea'){
			  $default =  get_option($opt['id']) != ""? get_option($opt['id']) : $dd;
			  $textrow = !isset($opt['row'])? 5 : $opt['row'];
			  $textcolumn = !isset($opt['column'])? 50 : $opt['column'];
			  ?>
      <div class="option-label"><?php echo $opt['name']; ?></div>
      <div class="option-control">
        <textarea name="<?php echo $opt['id']; ?>" cols="<?php echo $textcolumn;?>" rows="<?php echo $textrow;?>"><?php echo $default; ?></textarea>
      </div>
      <div class="option-desc">
        <?php  echo $opt['desc']; ?>
      </div>
      <?php }
		  if($opt['type'] == 'formbutton'){
			   
			  $default =  get_option($opt['id']) != ""? get_option($opt['id']) : $dd;
			  ?>
      <div class="option-label"><?php echo $opt['name']; ?></div>
      <div class="option-control">
        <input name="<?php echo $opt['id']; ?>" type="button" value="<?php echo $opt['text']; ?>" class="<?php echo $opt['class']; ?>" id="<?php echo $opt['id']; ?>" />
      </div>
      <div class="option-desc"><?php echo $opt['desc']; ?></div>
      <?php }
		  if($opt['type'] == 'formbutton_picture'){
			   
			 // $default =  get_option($opt['id']) != ""? get_option($opt['id']) : $dd;
			  ?>
      <div class="option-label"><?php echo $opt['name']; ?></div>
      <div class="option-control">
      	<?php foreach($opt['id'] as $key => $val){?>
        <?php echo $val;?>
         <input name="<?php echo $key; ?>" type="button" value="<?php echo $opt['text']; ?>" class="<?php echo $opt['class']; ?>" id="<?php echo $key; ?>" /><br /><br />
        
        <?php }?>
      </div>
      <div class="option-desc"><?php echo $opt['desc']; ?></div>
       <?php }
		  if($opt['type'] == 'formbutton_loadcolor'){
			   
			 // $default =  get_option($opt['id']) != ""? get_option($opt['id']) : $dd;
			  ?>
      <div class="option-label"><?php echo $opt['name']; ?></div>
      <div class="option-control loadcolorlightbox">
      	<?php foreach($opt['id'] as $key => $val){
			$val1 = trim($val);
			?>
        <a href="http://demo.andthemes.com/dine-and-drink/load/color/colorimg/<?php echo $val1;?>.jpg"><img src="http://demo.andthemes.com/dine-and-drink/load/color/colorimg/<?php echo $val1;?>_tmb.jpg" /></a>
         <input name="<?php echo $key; ?>" type="button" value="<?php echo $opt['text']; ?>" class="<?php echo $opt['class']; ?> <?php echo $opt['type']; ?>" id="<?php echo $key; ?>" /><br /><br />
         <?php }?>
         </div>
      <div class="option-desc"><?php echo $opt['desc']; ?></div>
      <script>
      jQuery(".loadcolorlightbox a[href$='.jpg'], .loadcolorlightbox a[href$='.png']").lightBox({
			imageLoading:			'<?php echo _IMG; ?>lightbox-ico-loading.gif',		// (string) Path and the name of the loading icon
			imageBtnPrev:			'<?php echo _IMG; ?>lightbox-btn-prev.gif',			// (string) Path and the name of the prev button image
			imageBtnNext:			'<?php echo _IMG; ?>lightbox-btn-next.gif',			// (string) Path and the name of the next button image
			imageBtnClose:		'<?php echo _IMG; ?>lightbox-btn-close.gif',		// (string) Path and the name of the close btn
			imageBlank:				'<?php echo _IMG; ?>lightbox-blank.gif',	
		});
      </script>
      <?php }
		  if($opt['type'] == 'linkbutton'){?>
      <div class="option-label"><?php echo $opt['name']; ?></div>
      <div class="option-control"> <a href="<?php echo $opt['link']; ?>">
        <input name="<?php echo $opt['id']; ?>" type="button" value="<?php echo $opt['name']; ?>"/>
        </a> </div>
      <div class="option-desc"><?php echo $opt['desc']; ?></div>
      <?php }
		  if($opt['type'] == 'link'){?>
      <div class="option-label"><?php echo $opt['name']; ?></div>
      <div class="option-control"><a href="<?php echo $opt['link']; ?>" target="_blank" /><?php echo $opt['text']; ?> </a></div>
      <div class="option-desc"><?php echo $opt['desc']; ?></div>
      <?php }
		 
		   if($opt['type'] == 'checkboxgroup'){?>
      <div class="option-label"><?php echo $opt['name']; ?></div>
      <div class="option-control">
        <?php }
		   if($opt['type'] == 'checkboxgroup_sub'){
			  if(get_option($opt['id'])){
				  if(get_option($opt['id']) == 'true'){
					  $checked = 'checked="checked"';
				  }else{
					$checked = '';
				  }
			  }else{
				  if($opt['default'] == 'true'){
			  			$checked = 'checked="checked"';
				  }
			  }
			   ?>
        <input name="<?php echo $opt['id']; ?>" type="checkbox" <?php echo $checked; ?>>
        <?php echo $opt['name']; ?><br />
        <?php }
		  if($opt['type'] == 'checkboxgroup_close'){?>
      </div>
      <div class="option-desc"><?php echo $opt['desc']; ?></div>
      <?php }
		  if($opt['type'] == 'add_remove_open'){ /// badge
			 
			  //$default =  get_option($opt['id']) != ""? get_option($opt['id']) : $dd;
			  ?>
      <div class="option-label"><?php echo $opt['name']; ?></div>
      <div class="option-control add_remove">
        <ul class="add_remove_inputs ul_food_badge">
          <?php }
		   if($opt['type'] == 'add_remove_name_group'){
			  
			   $default =  get_option($opt['id']) != ""? get_option($opt['id']) : $dd;
			   ?>
          <li class="field li_food_badge_list clearfix" id="field<?php echo $opt['id']?>">
            <div class="accordion" id="accordion<?php echo $opt['id']?>">
              <div class="accordion-group">
                <div class="food_badge_meta_info_set">
                  <div class="accordion-heading clearfix">
                    <div class="food_badge_div_delete"><a href="#" class="add_remove_delete at_delete food_badge_delete" id="<?php echo $opt['id']; ?>">x</a></div>
                    <?php /*?><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?php echo $opt['id']?>" href="#collapse<?php echo $opt['id']?>"> <?php */?>
                    <div class="food_badge_name">
                    	<?php _e('Name', 'default');?>
                    </div>
                    <input name="<?php echo $opt['id']; ?>" id="<?php echo $opt['id']; ?>" value="<?php echo $default; ?>" type="text" class="<?php echo $opt['class']; ?>" size="">
                    <?php /*?></a><?php */?></div>
                  <div id="collapse<?php echo $opt['id']?>" class="accordion-body<?php /*?> collapse<?php */?>">
                    <div class="accordion-inner">
                      <?php }
			if($opt['type'] == 'add_remove_icon_group'){
				//$default =  get_option($opt['id']) != ""? get_option($opt['id']) : $dd;
				switch(get_option($opt['id'])){
			  	case 'at-badge-star.png' :
				case 'at-badge-hot.png' :
				case 'at-badge-new.png' :
				case 'at-badge-50.png' :
				case 'at-badge-veget.png' :
				case 'at-badge-chilli.png' :
					$default = _IMG."".get_option($opt['id']);
					break;
				default :
					$default = get_option($opt['id']);
					break;
			  }
				?>
                      <div class="food_badge_icon_url">
                      <?php _e('Icon URL', 'default');?>
                      
                      <img src="<?php echo $default; ?>" id="image_id_<?php echo $opt['id']; ?>" width="<?php echo $opt['img_width']?>" <?php if($default == ""){ ?> style="display:none" <?php }?> alt="image_id_<?php echo $opt['id']; ?>">
                      
                      </div>
                      <input name="<?php echo $opt['id']; ?>" class="food_badge_icon_url_input" id="file_input_<?php echo $opt['id']; ?>" value="<?php echo $default; ?>" type="text" size="">
                      <div class="at_image_upload at_admin_white_button" id="<?php echo $opt['id']; ?>" style="display:inline">
                        <?php _e('Upload Icon', 'default');?>
                      </div>
                      <span id="mestatus_<?php echo $opt['id']; ?>"></span> </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <?php }
			if($opt['type'] == 'add_remove_close'){?>
        </ul>
        <a href="#" id="add_remove_add" class="btn">Add</a>
        
      </div>
      <div class="option-desc"><?php echo $opt['desc']; ?></div>
      <?php }
		  if($opt['type'] == 'add_text_open'){ /////price
			 
			  //$default =  get_option($opt['id']) != ""? get_option($opt['id']) : $dd;
			  ?>
      <div class="option-label"><?php echo $opt['name']; ?></div>
      <div class="option-control add_remove">
        <ul class="add_text_inputs ul_food_price_list clearfix">
          <?php }
		   if($opt['type'] == 'add_text_name_group'){
			  
			   $default =  get_option($opt['id']) != ""? get_option($opt['id']) : $dd;
			   ?>
          <li class="field2 li_food_price_list" id="field<?php echo $opt['id']?>">
                <div class="portfolio_meta_info_set foodmenu_price_info_set clearfix">
                <a href="#" class="add_text_delete at_delete food_price_delete" id="<?php echo $opt['id']; ?>">x</a>
                    <div class="food_price_name"><?php _e('Name', 'default');?></div>
                    <input name="<?php echo $opt['id']; ?>" id="<?php echo $opt['id']; ?>" value="<?php echo $default; ?>" type="text" class="<?php echo $opt['class']; ?>" size="">
                    </div>
              </li>  
          <?php }
			if($opt['type'] == 'add_text_close'){?>
            
        </ul>
        <a href="#" id="add_text_add" class="btn at_add_price">Add</a>
        
      </div>
      <div class="option-desc"><?php echo $opt['desc']; ?></div>
      <?php }
			if($opt['type'] == 'special_colorpicker'){
				$default =  get_option($opt['id']) != ""? get_option($opt['id']) : $dd;
				?>
      <div class="option-label"><?php echo $opt['name']; ?></div>
      <div class="option-control">
        <?php /*?><input name="<?php echo $opt['id']; ?>" id="<?php echo $opt['id']; ?>" value="<?php echo $default; ?>" type="text" class="" size="<?php if(isset($opt['size'])) echo $opt['size']; ?>">
        <div id="colorpicker"></div><?php */?>
        <div id="colorselector<?php echo $opt['id']; ?>" class="colorSelector"><div style="background-color: <?php echo $default; ?>"></div></div>
        <input name="<?php echo $opt['id']; ?>" id="<?php echo $opt['id']; ?>" value="<?php echo $default; ?>" type="text" class="<?php echo $opt['class']; ?>" size="<?php if(isset($opt['size'])) echo $opt['size']; ?>">
      </div>
      <div class="option-desc">
        <?php  echo $opt['desc']; ?>
      </div>
      <script>
	  jQuery(document).ready(function(){
	  	/////color picker
			jQuery('#colorselector<?php echo $opt['id']; ?>').ColorPicker({
				color: '<?php echo $default; ?>',
				onShow: function (colpkr) {
					jQuery(colpkr).fadeIn(500);
					return false;
				},
				onHide: function (colpkr) {
					jQuery(colpkr).fadeOut(500);
					return false;
				},
				onChange: function (hsb, hex, rgb) {
					//alert(hex);
					jQuery('#colorselector<?php echo $opt['id']; ?> div').css('background-color', '#' + hex);
					jQuery('#<?php echo $opt['id']; ?>').val('#' + hex);
				}
			});
		});

	  </script>
      <?php }
		  if($opt['type'] == 'drag_drop_open'){ /// food menu cate reorder
			 
			  //$default =  get_option($opt['id']) != ""? get_option($opt['id']) : $dd;
			  ?>
      <div class="option-label"><?php echo $opt['name']; ?></div>
      <div class="option-control">
      <?php }
		  if($opt['type'] == 'drag_drop_open_ul'){ /// food menu cate reorder
			 
			  $default =  get_option($opt['id']) != ""? get_option($opt['id']) : $dd;
			  $open_ul_id = $opt['id'];
			  ?>
       <input name="<?php echo $opt['id']; ?>" id="hidden_sort<?php echo $opt['id']; ?>" type="hidden" value="<?php echo $opt['value']; ?>" />
		<div class="main_food_cat_name"><?php echo  $opt['parent'];?></div>
        <ul class="dragorder<?php echo $opt['id']; ?> ui-sortable ul_sub_food_cat clearfix">
          <?php }
		   if($opt['type'] == 'drag_drop_group'){
			  
			   $default =  get_option($opt['id']) != ""? get_option($opt['id']) : $dd;
			   ?>
          <li class="field li_sub_food_cat clearfix" id="<?php echo $opt['cate_id']?>">
            <div class="sub_food_cat_name"><?php echo $opt['name']; ?></div>
                    
                     <label for="<?php echo $opt['id']; ?>1" class="label_food_cat_side"><input name="<?php echo $opt['id']; ?>" id="<?php echo $opt['id']; ?>1" type="radio" value="1" <?php if($default == 1){?> checked="checked" <?php }?> class="<?php echo $opt['class']; ?>" /> Left Side</label>
                     <label for="<?php echo $opt['id']; ?>2" class="label_food_cat_side"><input name="<?php echo $opt['id']; ?>" id="<?php echo $opt['id']; ?>2" type="radio" value="2" <?php if($default == 2){?> checked="checked" <?php }?> class="<?php echo $opt['class']; ?>" /> Right Side</label>
          </li>
          <?php }
			if($opt['type'] == 'drag_drop_close_ul'){				
			?>
        </ul>
        <script>
      jQuery(document).ready(function($){
		$('.dragorder<?php echo $open_ul_id;?>').sortable({
			update: function(event, ui) {
				var order = $(this).sortable('toArray').toString();
				//console.log(order);
				document.getElementById('hidden_sort<?php echo $open_ul_id;?>').value = order;
				//$.get('update-sort.cfm', {fruitOrder:fruitOrder});
			}
		});
	});
      </script>
        <?php }
			if($opt['type'] == 'drag_drop_close'){				
			?>
      </div>
      <div class="option-desc"><?php echo $opt['desc']; ?></div>
      
      <?php }?>
      <?php 
  if(!isset($opt['close'])){?>
    </div>
    <!--option_row-->
  </div>
  <!--option_table-->
</div>
<!--option-->
<?php }?>
<?php } //end if($opt['tab'] == $tab){?>
<?php 
  if(isset($opt['disable'])){
		if($opt['disable'] == "disabled='disabled'"){
		  array_push($disable_arr,$opt['id']);
		}
  }?>
<?php  
	  if(isset($opt['id'])){
		if($opt['id'] == 'at01_port_type'){
					$default_port_type =  get_option($opt['id']) != ""? get_option($opt['id']) : $dd;
		}
	  }
  } //end foreach?>
<?php if($tab == 'portfolio'){?>
<script type="text/javascript">
  		portfoliotype(<?php echo $default_port_type;?>);
		function portfoliotype(type){
			<?php foreach($disable_arr as $val){?>
				var all_obj = document.getElementsByName('<?php echo $val;?>');
				for(var i=0;i<all_obj.length;i++){ 
					all_obj[i].setAttribute('disabled','disabled');
				}
			<?php }?>
			
			if(type == 2){
				
				var doc_obj = document.getElementsByName('at01_jquery_layout');
				for(var i=0;i<doc_obj.length;i++){ 
					doc_obj[i].removeAttribute('disabled');
				}
				
				var doc_obj = document.getElementsByName('at01_jquery_title');
				for(var i=0;i<doc_obj.length;i++){ 
					doc_obj[i].removeAttribute('disabled');
				}
				
			}else if(type == 3){
				
				var doc_obj = document.getElementsByName('at01_normal_layout');
				for(var i=0;i<doc_obj.length;i++){ 
					doc_obj[i].removeAttribute('disabled');
				}
				
				var doc_obj = document.getElementsByName('at01_normal_title');
				for(var i=0;i<doc_obj.length;i++){ 
					doc_obj[i].removeAttribute('disabled');
				}
				
				var doc_obj = document.getElementsByName('at01_normal_filter');
				for(var i=0;i<doc_obj.length;i++){ 
					doc_obj[i].removeAttribute('disabled');
				}
				
			}else if(type == 4){
				
				var doc_obj = document.getElementsByName('at01_gallery_layout');
				for(var i=0;i<doc_obj.length;i++){ 
					doc_obj[i].removeAttribute('disabled');
				}
				
				var doc_obj = document.getElementsByName('at01_gallery_filter');
				for(var i=0;i<doc_obj.length;i++){ 
					doc_obj[i].removeAttribute('disabled');
				}
				
			}else{
				
				var doc_obj = document.getElementsByName('at01_bigimg_filter');
				for(var i=0;i<doc_obj.length;i++){ 
					doc_obj[i].removeAttribute('disabled');
				}
				
			}
		}
  </script>
<?php } }?>
<?php  return $options; 
}?>
<?php
function at_tab_general(){
	
	at_add_form('general');
}
function at_tab_font(){
	
	at_add_form('font');
}
function at_tab_overallelements(){
	
	at_add_form('overallelements');
}
function at_tab_color(){
	
	at_add_form('color');
}
function at_tab_foodmenu(){
	
	at_add_form('foodmenu');
}
function at_tab_blog(){
	
	at_add_form('blog');
}
function at_tab_css(){
	
	at_add_form('css');
}
function at_tab_setting(){
	
	at_add_form('setting');
}
function at_tab_support(){
	
	at_add_form('support');
}

add_action('wp_ajax_at_save_form', 'at_save_form'); 
function at_save_form(){
	$options = options_var('at01');
	//global $options;
	//header("Location:?page=".$_REQUEST['page'] ."&saved=true");
	//print_r($_REQUEST);
	if($_POST['action'] == 'at_save_form'){
		
		foreach($options as $optopt){
	  		foreach($optopt as $opt){
			
				if($opt['type'] == 'checkbox' || $opt['type'] == 'checkboxgroup_sub'){
					if(isset($_REQUEST[$opt['id']])){ 
						update_option($opt['id'], 'true');
					}else{ 
						update_option($opt['id'], 'false');
					}
				
				}else if($opt['type'] == 'add_remove_name_group' || $opt['type'] == 'add_remove_icon_group' || $opt['type'] == 'add_text_name_group'){
					delete_option($opt['id']); 
				}else{
			
					if(isset($_REQUEST[$opt['id']])){ 
						update_option($opt['id'], stripslashes($_REQUEST[$opt['id']]));
					}else{ 
						delete_option($opt['id']); 
					} 
				}
			}
			
		}
		$countty = 1;
		$countty2 = 1;
		$countty3 = 1;
		foreach($_POST as $key => $value) {
			if (strpos($key, 'at01_badge_name') === 0) {
				if(isset($_POST[$key])){ 
					update_option($key, $value);
					$countty++;
				}
			}
			
			if (strpos($key, 'at01_badge_icon') === 0) {
				if(isset($_POST[$key])){ 
					update_option($key, $value);
					$countty2++;
				}
			}
			
			if (strpos($key, 'at01_pricing_name') === 0) {
				if(isset($_POST[$key])){ 
					update_option($key, $value);
					$countty3++;
				}
			}
		}
		
		
		/////// customize.css
		$p = create_custom_css();
		$a = fopen(get_template_directory()."/customize.css", 'w');
		fwrite($a, $p);
		fclose($a);
		chmod(get_template_directory()."/customize.css", 0644);
	
		die();
	}
}

add_action('wp_ajax_at_save_images', 'at_save_images'); 
function at_save_images(){
	
		$file_id = $_POST['id'];
		
		$override['test_form']=false;
		$override['action']='wp_handle_upload';
		
		$uploaded_file = wp_handle_upload($_FILES[$file_id],$override);
		
		if(empty($uploaded_file['error'])){ 
			update_option($file_id, $uploaded_file['url']);
		  	echo $uploaded_file['url'];
		}else{
			echo "error";
		}
	die();
}

add_action('wp_ajax_at_set_theme_options1', 'at_set_theme_options1');
function at_set_theme_options1(){
	$defaultfile = _DEFAULTDATA . 'andthemes_default_theme_options_salad.txt';
	if(!is_file($defaultfile))
		die("File not found - ".$defaultfile);

	$at_options = file_get_contents($defaultfile);

	$at_options=base64_decode($at_options);
	$at_options=unserialize($at_options);

	foreach($at_options as $name => $value){
		update_option($name, $value);
	}
	die();
}

add_action('wp_ajax_at_set_theme_options2', 'at_set_theme_options2');
function at_set_theme_options2(){
	$defaultfile = _DEFAULTDATA . 'andthemes_default_theme_options_spaghetti.txt';
	if(!is_file($defaultfile))
		die("File not found - ".$defaultfile);

	$at_options = file_get_contents($defaultfile);

	$at_options=base64_decode($at_options);
	$at_options=unserialize($at_options);

	foreach($at_options as $name => $value){
		update_option($name, $value);
	}
	die();
}

add_action('wp_ajax_at_set_theme_options3', 'at_set_theme_options3');
function at_set_theme_options3(){
	$defaultfile = _DEFAULTDATA . 'andthemes_default_theme_options_coffee.txt';
	if(!is_file($defaultfile))
		die("File not found - ".$defaultfile);

	$at_options = file_get_contents($defaultfile);

	$at_options=base64_decode($at_options);
	$at_options=unserialize($at_options);

	foreach($at_options as $name => $value){
		update_option($name, $value);
	}
	die();
}

add_action('wp_ajax_at_set_theme_options4', 'at_set_theme_options4');
function at_set_theme_options4(){
	$defaultfile = _DEFAULTDATA . 'andthemes_default_theme_options_cupcake.txt';
	if(!is_file($defaultfile))
		die("File not found - ".$defaultfile);

	$at_options = file_get_contents($defaultfile);

	$at_options=base64_decode($at_options);
	$at_options=unserialize($at_options);

	foreach($at_options as $name => $value){
		update_option($name, $value);
	}
	die();
}

add_action('wp_ajax_at_set_theme_options5', 'at_set_theme_options5');
function at_set_theme_options5(){
	$defaultfile = _DEFAULTDATA . 'andthemes_default_theme_options_brasserie.txt';
	if(!is_file($defaultfile))
		die("File not found - ".$defaultfile);

	$at_options = file_get_contents($defaultfile);

	$at_options=base64_decode($at_options);
	$at_options=unserialize($at_options);

	foreach($at_options as $name => $value){
		update_option($name, $value);
	}
	die();
}
function get_content($URL){
	  $ch = curl_init();
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt($ch, CURLOPT_URL, $URL);
	  $data = curl_exec($ch);
	  curl_close($ch);
	  return $data;
  }

add_action('wp_ajax_at_color_scheme', 'at_color_scheme');
function at_color_scheme(){
	$colorname = $_POST['name'];
	
	$defaultfile = 'http://demo.andthemes.com/dine-and-drink/load/color/colortxt/at_color_'.$colorname.'.txt';
	//echo $defaultfile;
	//if(!is_file($defaultfile))
		//die("File not found - ".$defaultfile);

	$at_options = get_content($defaultfile);

	$at_options=base64_decode($at_options);
	$at_options=unserialize($at_options);

	foreach($at_options as $name => $value){
		update_option($name, $value);
	}
	die();
}

add_action('wp_ajax_at_set_widgets', 'at_set_widgets'); 
function at_set_widgets(){
	$defaultfile = _DEFAULTDATA . 'andthemes_default_widgets.txt';
	if(!is_file($defaultfile))
		die("File not found");

	$at_widgets = file_get_contents($defaultfile);

	$at_widgets=base64_decode($at_widgets);
	$at_widgets = unserialize($at_widgets);
	
	foreach($at_widgets as $name => $value){
		update_option($name, $value);
	}
	die();
}

add_action('wp_ajax_at_set_google_font', 'at_set_google_font'); 
function at_set_google_font(){
  $url = 'http://demo.andthemes.com/dine-and-drink/load/at_googlefonts.xml';
  //$url = 'http://phat-reaction.com/googlefonts.php?format=xml';
  
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
		$font_arr =  array();
		  foreach($xml->font as $font){
			$font_arr[strtolower($font->{'css-name'})] = $font->{'css-name'};
		  }
		update_option('at01_all_font',implode(',', $font_arr));
  		//delete_option('at01_all_font');
	}
  
  
  //$xml = simplexml_load_file($url, null, LIBXML_NOCDATA);
  
  //echo implode(',', $font_arr);
  
  //echo implode('<br/>', $fonts);
	die();
}

function register_at_menus() {
	
  	register_nav_menus(
    	array('header-menu' => __('Header Menu', 'default'))
	);
}
add_action('init', 'register_at_menus');

function at_widgets_init() {
	
	register_widget('AT_fourboxes_widget');
	register_widget('AT_recent_post_widget');
	register_widget('AT_flickr_widget');
	register_widget('AT_twitter_widget');
	register_widget('AT_stunning_text_widget');
	register_widget('AT_home_food_widget');
	register_widget('AT_home_gallery_widget');
	register_widget('AT_weekly_menu_widget');
	register_widget('AT_unwrap_text_widget');
	register_widget('AT_boxes_widget');
	register_widget('AT_opening_hours_widget');
	
	
	

	register_sidebar(array(
		'name' => __('Home Area', 'default'),
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-top-border"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
		'class' => '%1$s',
	));

	register_sidebar(array(
		'name' => __('Sidebar', 'default'),
		'id' => 'sidebar-2',
		'description' => __('The sidebar for the optional Showcase Template', 'default'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget_title"><div class="widget_title_ribbon"><i class="icon-food"></i></div><h3 class="widget_title_text">',
		'after_title' => '</h3></div>',
		'class' => '%d',
	));

	register_sidebar(array(
		'name' => __('Footer Area One', 'default'),
		'id' => 'sidebar-3',
		'description' => __('An optional widget area for your site footer', 'default'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget_title"><div class="widget_title_ribbon"><i class="icon-food"></i></div><h3 class="widget_title_text">',
		'after_title' => '</h3></div>',
		'class' => '%d',
	));

	register_sidebar(array(
		'name' => __('Footer Area Two', 'default'),
		'id' => 'sidebar-4',
		'description' => __('An optional widget area for your site footer', 'default'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<div class="widget_title"><div class="widget_title_ribbon"><i class="icon-food"></i></div><h3 class="widget_title_text">',
		'after_title' => '</h3></div>',
		'class' => '%d',
	));

	register_sidebar(array(
		'name' => __('Footer Area Three', 'default'),
		'id' => 'sidebar-5',
		'description' => __('An optional widget area for your site footer', 'default'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<div class="widget_title"><div class="widget_title_ribbon"><i class="icon-food"></i></div><h3 class="widget_title_text">',
		'after_title' => '</h3></div>',
		'class' => '%d',
	));
	/*
	register_sidebar(array(
		'name' => __('Footer Area Four', 'default'),
		'id' => 'sidebar-6',
		'description' => __('An optional widget area for your site footer', 'default'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<div class="widget_title"><div class="widget_title_ribbon"><i class="icon-food"></i></div><h3 class="widget_title_text">',
		'after_title' => '</h3></div>',
		'class' => '%d',
	));*/
}
add_action('widgets_init', 'at_widgets_init');
add_theme_support('post-thumbnails');

if(function_exists('add_image_size')) { 

	add_image_size('pic-fullwidth', 940, 9999); //300 pixels wide (and unlimited height)
	add_image_size('blog-with-sidebar', 676, 300, true); //(cropped)
	add_image_size('blog-no-sidebar', 940, 417, true); //(cropped)
	add_image_size('menu-thumb-1', 712, 448, true); 
	add_image_size('menu-thumb-2', 596, 397, true); 
	add_image_size('menu-thumb-3', 300, 200, true); 
	add_image_size('menu-thumb-4', 140, 93, true); 
	add_image_size('gallery-thumb-1', 235 , 157, true);
	add_image_size('gallery-thumb-2', 181, 181, true);
	add_image_size('blog-thumb-1', 166 , 110, true); 
}

function at_comment($comment, $args, $depth) {
	
	$GLOBALS['comment'] = $comment;
	switch ($comment->comment_type) :
		case 'pingback' :
		case 'trackback' :
	?>
<li class="post pingback">
  <p>Pingback:
    <?php comment_author_link(); ?>
    <?php edit_comment_link(__('Edit', 'default'), '<span class="edit-link">', '</span>'); ?>
  </p>
  <?php
			break;
		default :
	?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
  <div id="comment-<?php comment_ID(); ?>" class="comment-body">
    <div class="comment-avatar">
      <?php
						$avatar_size = 40;
						//if('0' != $comment->comment_parent)
							//$avatar_size = 39;
						echo get_avatar($comment, $avatar_size);
		?>
    </div>
    <div class="comment-box">
    <div class="comment-content">
        <?php if($comment->comment_approved == '0') : ?>
        <em class="comment-awaiting-moderation">Your comment is awaiting moderation.</em> <br />
        <?php endif; ?>
        <?php comment_text(); ?>
      </div>
      <div class="comment-meta">
        <div class="comment-author"> <a href="<?php echo get_comment_link($comment->comment_ID);?>"><?php echo get_comment_author_link(); ?></a> </div>
        <div class="comment-date"><span class="main-color"> | </span><?php echo get_comment_date()." at ".get_comment_time(); ?></div>
        <div class="comment-edit-reply">
		<?php comment_reply_link(array_merge($args, array('reply_text' => __('Reply', 'default'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
        <?php edit_comment_link(__('Edit', 'default'), '', ''); ?>
        </div>
      </div>
      </div><!-- comment-content-->
      </div><!-- comment-box-->
  <?php
			break;
	endswitch;
}

function at_strip_content_tags($content) {
    $content = strip_shortcodes($content);
    $content = str_replace(']]>', ']]&gt;', $content);
    //$content = preg_replace('/<img[^>]+./','',$content);
	//$content = preg_replace('%<object.+?</object>%is', '', $content);
	$content = strip_tags($content,'<p><a>');
    return $content;
}

function is_sidebar_active($index) {
	global $wp_registered_sidebars;
	$widgetcolums = wp_get_sidebars_widgets();
	if($widgetcolums[$index])
		return true;
	return false;
}
//////short code remove auto-formatting

add_filter('the_content', 'shortcode_empty_paragraph_fix');

function shortcode_empty_paragraph_fix($content)
{   
	$block = join("|",array("one_half",
							"one_half_last",
							"one_third",
							"one_third_last",
							"two_third",
							"two_third_last",
							"one_fourth",
							"one_fourth_last",
							"three_fourth",
							"three_fourth_last",
							"one_fifth",
							"one_fifth_last",
							"two_fifth",
							"two_fifth_last",
							"three_fifth",
							"three_fifth_last",
							"four_fifth",
							"four_fifth_last",
							"one_sixth",
							"one_sixth_last",
							"five_sixth",
							"five_sixth_last",
							"toggle",
							"tabs",
							"slider",
							"button",
							"list",
							"messagebox",
							"pullquote",
							"collapses"));

	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
	
	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)/","[/$2]",$rep);
	
	return $rep;
	
	
	/*$array = array (
		'<p>[' => '[', 
		']</p>' => ']', 
		']<br />' => ']'
	);

	$content = strtr($content, $array);

	return $content;*/
}
 
///////pagination////////
function at_pagenavi() {
	  global $wp_query, $wp_rewrite;
	  $pages = '';
	  $max = $wp_query->max_num_pages;
	  if(!$current = get_query_var('paged')) $current = 1;
	  $base = str_replace(999999999, '%#%', get_pagenum_link(999999999));
	 
	 $total = 1;
	 
	 $args = array(
		'base'         => $base,
		'total'        => $max,
		'current'      => $current,
		'end_size'     => 1,
		'mid_size'     => 2,
		'prev_text'    => __('PREV' , 'domain'),
		'next_text'    => __('NEXT' , 'domain')
		);
	 
	  if($max > 1) echo '<div class="wp-pagenavi">';
	 //if($total == 1 && $max > 1) $pages = '<span class="pages">Page ' . $current . ' of ' . $max . '</span>';
	 echo $pages . paginate_links($args);
	 if($max > 1) echo '</div>';
}

////comment pagination
function at_pagenavi_comment() {
	  global $wp_query, $wp_rewrite;
	  $pages = '';
	  $max = $wp_query->max_num_pages;
	  if(!$current = get_query_var('paged')) $current = 1;
	  $base = str_replace(999999999, '%#%', get_pagenum_link(999999999));
	 
	 $total = 1;
	 
	 $args = array(
		'base'         => $base,
		'total'        => $max,
		'current'      => $current,
		'end_size'     => 1,
		'mid_size'     => 2,
		'prev_text'    => __('&laquo;' , 'domain'),
		'next_text'    => __('&raquo;' , 'domain')
		);
	 
	  if($max > 1) echo '<div class="wp-pagenavi">';
	 //if($total == 1 && $max > 1) $pages = '<span class="pages">Page ' . $current . ' of ' . $max . '</span>';
	 echo $pages . paginate_links($args);
	 if($max > 1) echo '</div>';
}


if(get_option('at01_port_type') != 2){

	$option_posts_per_page = get_option( 'posts_per_page' );
	add_action( 'init', 'my_modify_posts_per_page', 0);
	function my_modify_posts_per_page() {
		add_filter( 'option_posts_per_page', 'my_option_posts_per_page' );
	}
	function my_option_posts_per_page( $value ) {
		global $option_posts_per_page;
		if ( is_tax( 'portfolio_cat') ) {
			return get_option('at01_num_port');
		} else {
			return $option_posts_per_page;
		}
	}
}

add_filter( 'the_category', 'add_nofollow_cat' ); 
function add_nofollow_cat( $text ) { 
	$text = str_replace('rel="category tag"', "", $text); return $text; 
}


/**
 * Replacing the default WordPress search form with an HTML5 version
 *
 */
 
add_filter( 'get_search_form', 'html5_search_form' );
function html5_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
<div class="input-append">
<input type="search" placeholder="'.__("Search...").'" value="' . get_search_query() . '" name="s" id="s" />
<span class="add-on">
<i class="icon-search"></i>
</span>
</div>
</form>';

    return $form;
}

?>
