<script type="text/javascript"> //contact form
	var ajaxurl='<?php echo admin_url('admin-ajax.php'); ?>';
</script>

		<footer class="footer_widgets<?php  if (!is_active_sidebar('sidebar-3') && !is_active_sidebar('sidebar-4') && !is_active_sidebar('sidebar-5')) { echo ' no_footer_widgets';} ?>">
        	<div class="footer_widgets_before"></div>
            	<div class="container">
                   <div class="row">
                        <?php if(get_option('at01_footer_style') == 1 || get_option('at01_footer_style') == 3 ){ /// 1-1-1 , 1-2 ?>
                        <div class="span4">
                        	<div class="footer_widget_col">
                        <?php }else if(get_option('at01_footer_style') == 2){ // 2-1?>
                        <div class="span8">
                        	<div class="footer_widget_col">
                        <?php }else if(get_option('at01_footer_style') == 4){ // 1-1?>
                        <div class="span6">
                        	<div class="footer_widget_col">
                        <?php }else{ // full width?>
                        <div class="span12">
                        	<div class="footer_widget_col">
                        <?php }?>
                    	<?php 
							if (is_active_sidebar('sidebar-3')) {
								dynamic_sidebar('sidebar-3');
							}else{
								//echo '<p></p>';
							} 
						?>
                        	</div><!--footer_widget_col-->
                   	 	</div><!--span-->
                        
                        <?php if(get_option('at01_footer_style') == 1){ /// 1-1-1 , 1-2 ?>
                        <div class="span4">
                        	<div class="footer_widget_col">
                        <?php }else if(get_option('at01_footer_style') == 2){ // 2-1?>
                        <div class="span4 last">
                        	<div class="footer_widget_col">
						<?php }else if(get_option('at01_footer_style') == 3){ // 1-2?>
                        <div class="span8 last">
                        	<div class="footer_widget_col">
                        <?php }else if(get_option('at01_footer_style') == 4){ // 1-1?>
                        <div class="span6 last">
                        	<div class="footer_widget_col">
                        <?php }?>
                    <?php
                    	if (is_active_sidebar('sidebar-4')) {
							dynamic_sidebar('sidebar-4');
						}else{
							//echo '<p></p>';
						} 
					?>
                    	</div><!--footer_widget_col-->
                    </div><!--span-->
                    
                    <?php if(get_option('at01_footer_style') == 1){ /// 1-1-1 ?>
                        <div class="span4 last">
                        	<div class="footer_widget_col">
                        
                    <?php
                    	if (is_active_sidebar('sidebar-5')) {
							dynamic_sidebar('sidebar-5');
						}else{
							//echo '<p></p>';
						} 
					?>
                    	</div><!--footer_widget_col-->
                    </div><!--span-->
                    <?php }?>
                    </div>
              	</div>
            </footer><!--footer_widgets-->
            <?php if(get_option('at01_footer_text') != ""){?>
           <footer class="footer_copyright ">
           <div class="footer_copyright_before"></div>
        	<div class="container">
                <div class="row">
                    <div class="span12">
            				<?php echo get_option('at01_footer_text');?>
                        </div>
            	</div>
            </div><!--container-->
       </footer><!--footer-copyright-->
       <?php }?>
   	</div><!--wrapper-->
    <?php wp_footer(); ?>
    <script>
   jQuery(function() {
					////page changer
		jQuery("#page-changer select").change(function() {
			window.location = jQuery("#page-changer select option:selected").val();
		});
		
		///lightbox
		jQuery(".post-content a[href$='.jpg'], .post-content a[href$='.png']").lightBox({
			imageLoading:			'<?php echo _IMG; ?>lightbox-ico-loading.gif',		// (string) Path and the name of the loading icon
			imageBtnPrev:			'<?php echo _IMG; ?>lightbox-btn-prev.gif',			// (string) Path and the name of the prev button image
			imageBtnNext:			'<?php echo _IMG; ?>lightbox-btn-next.gif',			// (string) Path and the name of the next button image
			imageBtnClose:		'<?php echo _IMG; ?>lightbox-btn-close.gif',		// (string) Path and the name of the close btn
			imageBlank:				'<?php echo _IMG; ?>lightbox-blank.gif',	
		});
		
		jQuery(".page-fullwidth-gallery a[href$='.jpg'], .page-fullwidth-gallery a[href$='.png']").lightBox({
				imageLoading:			'<?php echo _IMG; ?>lightbox-ico-loading.gif',		// (string) Path and the name of the loading icon
				imageBtnPrev:			'<?php echo _IMG; ?>lightbox-btn-prev.gif',			// (string) Path and the name of the prev button image
				imageBtnNext:			'<?php echo _IMG; ?>lightbox-btn-next.gif',			// (string) Path and the name of the next button image
				imageBtnClose:		'<?php echo _IMG; ?>lightbox-btn-close.gif',		// (string) Path and the name of the close btn
				imageBlank:				'<?php echo _IMG; ?>lightbox-blank.gif',	
		});
		
		jQuery(".gallery-detail a[href$='.jpg'], .gallery-detail a[href$='.png']").lightBox({
			imageLoading:			'<?php echo _IMG; ?>lightbox-ico-loading.gif',		// (string) Path and the name of the loading icon
			imageBtnPrev:			'<?php echo _IMG; ?>lightbox-btn-prev.gif',			// (string) Path and the name of the prev button image
			imageBtnNext:			'<?php echo _IMG; ?>lightbox-btn-next.gif',			// (string) Path and the name of the next button image
			imageBtnClose:		'<?php echo _IMG; ?>lightbox-btn-close.gif',		// (string) Path and the name of the close btn
			imageBlank:				'<?php echo _IMG; ?>lightbox-blank.gif',	
		});
	});
	</script>
  </body>
</html>