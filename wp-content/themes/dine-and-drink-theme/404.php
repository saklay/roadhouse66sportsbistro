<?php force_more(); ?>
<?php get_header(); ?>
<div class="main_container">
    <div class="main_container_inner">
        <div class="container">
            <div class="row">
                <div class="span12 page-fullwidth">
                    <div class="entry-content">
                        <div class="entry-content-inner">	
           					<div style="text-align:center; margin:10px 0px 25px 0px;">
                                <img src="<?php echo _IMG; ?>error404-icon.png" alt="error404" style="margin:0 auto;" />
                                <div style="text-align:center; color:#ffca00; font-size:24px; font-weight:bold; margin-top:10px;">
                                    <?php _e('ERROR 404', 'default'); ?></div>
                                <div style="text-align:center; color:#ffca00; font-size:16px; font-weight:bold; line-height:18px;">
                                    <?php _e('Page Not Found', 'default'); ?></div>
                                
                                <div style="text-align:center; font-size:18px; margin-top:40px; font-weight:bold; line-height:20px;">
                                    <?php _e("We're sorry, but the page you were looking for doesn't exist.", 'default'); ?>
                                </div>
                                <div style="text-align:center; font-size:14px; line-height:18px; margin-top:5px;">
                                    <?php _e('You can start from the Home, Blog or see our food menu.', 'default'); ?>
                                </div>
                            </div>
        				</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	
<?php get_footer(); ?>
