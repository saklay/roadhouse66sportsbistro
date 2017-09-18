// JavaScript Document
jQuery(document).ready(function() {
 
	jQuery('#upload_image_button').click(function() {
	
		// keep copy of the original send to editor
		original_send_to_editor = window.send_to_editor;
	
	
		//new send_to_editor function
		window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		jQuery('#upload_image').val(imgurl);
		tb_remove();
		
		//////// keep the original button text
		tbframe_interval = setInterval(function() {
                jQuery('#TB_iframeContent').contents().find('.savesend .button').val('Insert into Post');
                }, 200);
            return false;
		// restore send_to_editor to post content 
		window.send_to_editor = original_send_to_editor;
	   }
		// loads thickbox
		formfield = jQuery('#upload_image').attr('name');
		var post_id = jQuery('#post_id').val();
		tb_show('', 'media-upload.php?post_id='+post_id+'&type=image&TB_iframe=true');
		 jQuery('#TB_iframeContent').contents().find('.savesend .button').val('Use This Image');
		 
		 ////set interval to change button text from insert into post to use as cover image
		 tbframe_interval = setInterval(function() {
                jQuery('#TB_iframeContent').contents().find('.savesend .button').val('Use as Cover Image');
                }, 200);
            return false;
		
		return false;
		
	  });
});

