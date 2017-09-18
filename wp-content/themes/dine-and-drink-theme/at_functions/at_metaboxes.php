<?php
add_action('add_meta_boxes', 'at_add_menu_custombox');
add_action('add_meta_boxes', 'at_add_slider_custombox');
add_action('add_meta_boxes', 'at_add_testimonials_custombox');
add_action('save_post', 'at_save_postdata');



///////menu custom box
function at_add_menu_custombox() {
    add_meta_box(
        'at_options',
        'Menu Options',
        'at_inner_menu_custombox',
        'menu',
		'normal',
		'high'
  );
}

function at_inner_menu_custombox($post) {
	
  // Use nonce for verification
  wp_nonce_field(plugin_basename(__FILE__), 'at_noncename');

  $at_videourl = get_post_meta($post->ID, 'at_videourl', TRUE);
  $at_imageurl = get_post_meta($post->ID, 'at_imageurl', TRUE);

  // The actual fields for data entry
  echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" >';
  echo '<tr>';
  echo '<th width="25%" style="text-align:left; vertical-align:top; padding:10px;">';
  echo '<label for="at_videourl">';
  echo __( 'HTML Video Embed Code', 'default');
  echo ' : </label></th>';
  echo '<td width="75%" style="text-align:left; vertical-align:top; padding:10px;">
  <textarea name="at_videourl" cols="50" rows="5" style="width:100%">'.$at_videourl.'</textarea>
  <br />';
  echo '<p class="howto">';
  echo __( 'Enter the HTML Video Embed Code of the video, youtube or vimeo, etc.', 'default');
  echo '</td>';
  echo '</tr>';
  echo '</table>';
  
  /*echo '<p><strong>IMAGE</strong></p>';
  echo '<label for="at_imageurl">';
  echo 'Cover image:';
  echo '</label> ';
  echo '<input id="post_id" type="hidden" name="post_id" value="'.$post->ID.'" />';
  if($at_imageurl != ''){
  	echo '<img src="'.$at_imageurl.'" width="150"/>';
  }
  echo '<input id="upload_image" type="text" size="36" name="at_imageurl" value="'.$at_imageurl.'"/>';
  echo '<input id="upload_image_button" type="button" value="Upload Image" />';*/
  
 	 echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" >';
  echo '<tr>';
  echo '<th width="25%"  style="text-align:left; vertical-align:top; padding:10px;">';
  echo '<label for="at_recommend">';
  echo __( 'Chef Recommended', 'default');
  echo ' : </label></th>';
  echo '<td width="75%"  style="text-align:left; vertical-align:central; padding:10px;">
  <input name="at_recommend" id="at_recommend"  type="checkbox" style="vertical-align:auto;" ';
  if(get_post_meta($post->ID, 'at_recommend', TRUE) == 'true'){
		echo ' checked="checked" ';
	}
  echo '/>  ';
  echo '<span style="font-family: sans-serif; font-style: italic; padding-left:5px; color:#666666; ">';
  echo '</td>';
  echo '</tr>';
  echo '</table>';
 
  echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
  echo '<tr>';
  echo '<th width="25%"  style="text-align:left; vertical-align:top; padding:10px;">';
  echo '<label for="at_videourl">';
  echo __( 'Pricing (s)', 'default');
  echo ' : </label></th>';
  echo '<td width="75%"  style="text-align:left; vertical-align:top; padding:10px;">
  <input name="at_price" id="singleprice" type="radio" value="1" ';
  if(get_post_meta($post->ID, 'at_price', TRUE) == 1){
		echo ' checked="checked" ';
	}
  echo '/> <label for="singleprice" style="padding-left:5px;">Single Price</label>
  <br />';
  echo '<div class="div_singleprice"><input name="at_sprice" type="text" size="20" style="margin:5px 10px 10px 22px"; value="'.get_post_meta($post->ID, 'at_sprice', TRUE).'" />
  <br /></div>';
  echo '<input name="at_price" id="multiprice" type="radio" value="2" ';
  if(get_post_meta($post->ID, 'at_price', TRUE) == 2){
		echo ' checked="checked" ';
	}
  echo '/> <label for="multiprice"  style="padding-left:5px;">Additional pricing</label>
  <br />';
  $all_options = wp_load_alloptions();
  ksort($all_options);
  foreach( $all_options as $name => $value ) {
	if (strpos($name, 'at01_pricing_name') === 0) {
	
  echo '<div class="div_multiprice">
  <div style="margin:5px 10px 10px 22px;">
  '.get_option($name).' : <input name="at_mprice'.$name.'" type="text" size="20" value="'.get_post_meta($post->ID, 'at_mprice'.$name, TRUE).'" />
  </div>
  </div>';
  }
}

  echo '</td>';
  echo '</tr>';
  echo '</table>';
  
  
  
  echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
  echo '<tr>';
  echo '<td width="25%" style="text-align:left; vertical-align:top; padding:10px;">';
  echo '<label for="at_menu_meta_info">';
  echo __( '<b>Badges, Signs or logos :</b>', 'default');
  echo '</label></td>';
  echo '<td width="75%" style="text-align:left; vertical-align:top; padding:10px;">';
  
  echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
  echo '<tr><td><input name="at_badge" id="at_badge-1" type="radio" value="-1" checked="checked/><td><label for="at_badge-1"><span style="padding-left:10px;">No Badge</span></label></td></tr>';
  foreach( $all_options as $name => $value ) {
	if (strpos($name, 'at01_badge_name') === 0) {
		$i = intval(substr($name, 15));
		echo '<tr><td>
		<input name="at_badge" id="at_badge'.$i.'" type="radio" value="at_badge_'.$i.'" ';
		if(get_post_meta($post->ID, 'at_badge', TRUE) == 'at_badge_'.$i){
			echo ' checked="checked" ';
		}
		echo '/> 
		<label for="at_badge'.$i.'"><span style="padding-left:5px;"><img src="'.get_option('at01_badge_icon'.$i).'" alt="at01_badge_name'.$i.'"> '.get_option('at01_badge_name'.$i)."</span></label></td></tr>";
		//echo '<td><textarea id="at_badge_'.$i.'" name="at_badge_'.$i.'" cols="50" rows="1" style="width:100%; height:40px">'.get_post_meta($post->ID, 'at_badge_'.$op, TRUE).'</textarea>';
	}
  }
  echo '</table>';
  
 
  echo '</td>';
  echo '</tr>';
  echo '</table>';
  
  ////enable link
  echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
  echo '<tr>';
  echo '<th width="25%" style="text-align:left; vertical-align:top; padding:10px;">';
  echo '<label for="at_foodlink">';
  echo __( 'Enable Food Menu Link', 'default');
  echo ' : </label></th>';
  echo '<td width="75%" style="text-align:left; vertical-align:top; padding:10px;">
  <input name="at_foodlink" id="at_foodlink"  type="checkbox" ';
  if(get_post_meta($post->ID, 'at_foodlink', TRUE) == 'false'){
		
	}else{
	echo ' checked="checked" ';
	}
  echo '/> ';
  echo '</td>';
  echo '</tr>';
  echo '</table>';
}


///////slider custom box
function at_add_slider_custombox() {
    add_meta_box(
        'at_options',
        'Slider Options',
        'at_inner_slider_custombox',
        'slider',
		'normal',
		'high'
  );
}

function at_inner_slider_custombox($post) {
	
  wp_nonce_field(plugin_basename(__FILE__), 'at_noncename');

  $at_slider_buttonlink = get_post_meta($post->ID, 'at_slider_buttonlink', TRUE);
  //$at_slider_buttontext = get_post_meta($post->ID, 'at_slider_buttontext', TRUE);

  //echo __( '<p><strong>Button Text</strong></p>' );
  //echo '<label for="at_slider_buttontext">';
  //echo '</label> ';
  //echo '<input type="text" id="at_slider_buttontext" name="at_slider_buttontext" value="'.$at_slider_buttontext.'" size="70" /><br />';
  
  echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-food-table" >';
  echo '<tr>';
  echo '<td width="20%" style="padding:3px 10px;>';
  echo '<label for="at_slider_buttonlink"><b>';
  echo __( 'URL Link', 'default');
  echo ' :</b></label></td>';
  echo '<td width="80%">
  <input type="text" id="at_slider_buttonlink" name="at_slider_buttonlink" value="'.$at_slider_buttonlink.'" style="width:100%;" />
  <br />';
   echo '</td>';
  echo '</tr>';
  echo '</table>';

  
}

///////testimonial custom box
function at_add_testimonials_custombox() {
    add_meta_box(
        'at_options',
        'Testimonials Options',
        'at_inner_testimonials_custombox',
        'testimonials',
		'normal',
		'high'
  );
}

function at_inner_testimonials_custombox($post) {
  
  wp_nonce_field(plugin_basename(__FILE__), 'at_noncename');

  $at_testimonials_name = get_post_meta($post->ID, 'at_testimonials_name', TRUE);
  $at_testimonials_link = get_post_meta($post->ID, 'at_testimonials_link', TRUE);
  echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-portfolio-table" >';
  echo '<tr>';
  echo '<td width="20%" style="padding:3px 10px;>';
  echo '<label for="at_testimonials_name">';
  echo __( '<b>Name</b>', 'default');
  echo ' : </label></td>';
  echo '<td width="80%">
  <input type="text" id="at_testimonials_name" name="at_testimonials_name" value="'.$at_testimonials_name.'" style="width:100%;" />
  <br />';
  echo __('<p class="howto">Enter a Name.</p>', 'default');
  echo '</td>';
  echo '</tr>';
  
  echo '<tr>';
  echo '<td width="20%" style="padding:3px 10px;>';
  echo '<label for="at_testimonials_link">';
  echo __( '<b>Link on the Name</b>', 'default');
  echo ' : </label></td>';
  echo '<td width="80%">
  <input type="text" id="at_testimonials_link" name="at_testimonials_link" value="'.$at_testimonials_link.'" style="width:100%;" />
  <br />';
  echo __('<p class="howto">Enter URL link, It will be link on the name.</p>', 'default');
  echo '</td>';
  echo '</tr>';
  
  echo '</table>';
}

function at_save_postdata($post_id) {

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
      return;
	
  $at_noncename =  isset($_POST['at_noncename'])? $_POST['at_noncename'] : "";
	
  if (!wp_verify_nonce($at_noncename, plugin_basename(__FILE__)))
      return;

  if (!current_user_can('edit_post', $post_id))
        return;
	
  $mydata = array();
  foreach($_POST as $key => $data) {
    if($key == 'at_noncename')
      continue;
    if(preg_match('/^at/i', $key)) {
      $mydata[$key] = $data;
	  update_post_meta($post_id, $key, $data);
    }
  }
  
  if(isset($mydata['at_recommend'])){ 
		update_post_meta($post_id, 'at_recommend', 'true');
	}else{ 
		update_post_meta($post_id, 'at_recommend', 'false');
	}
	 if(isset($mydata['at_foodlink'])){ 
		update_post_meta($post_id, 'at_foodlink', 'true');
	}else{ 
		update_post_meta($post_id, 'at_foodlink', 'false');
	}
  //update_post_meta($post_id, 'at_portfolio', $mydata);
  return $mydata;
}

/*
/////// portfolio upload images
function my_admin_scripts() {
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_register_script('my-upload', _JS . 'upload-script.js', array('jquery','media-upload','thickbox'));
wp_enqueue_script('my-upload');
}
 
function my_admin_styles() {
wp_enqueue_style('thickbox');
}
 
add_action('admin_print_scripts', 'my_admin_scripts');
add_action('admin_print_styles', 'my_admin_styles');
*/
?>