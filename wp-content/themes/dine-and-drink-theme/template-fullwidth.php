<?php 
/*
Template Name: Full-Width Page Template
*/
?>
<?php get_header(); ?>
 <div class="main_container">
        	<div class="page_title_container">
   		<div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="page_title">
                            <div class="page_title_ribbon"><i class="icon-food"></i></div>
                            <div class="page_title_ribbon_shadow"></div>
                            <h1 class="page_title_text">
            <?php the_title();?>
            </h1>
                        </div>
                     </div>
                 </div>
         	</div>
    	</div><!--page_title_container-->
        	<div class="main_container_inner">
        	<div class="container">
            	<div class="row">
        			<div class="span12 page-fullwidth">
        <?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
                      <div class="entry-content"><div class="entry-content-inner"><?php the_content(); ?></div></div>
         	<?php endwhile; ?>
		<?php endif; ?>
         </div>
                    <!--span12 page-fullwidth-->
                </div>
            </div>
             </div><!--main_container_inner-->
        </div><!--main_container-->
        <script type="text/javascript">
    jQuery(function($) {
        $(".page-fullwidth a[href$='.jpg']").lightBox({
			imageLoading:			'<?php echo _IMG; ?>lightbox-ico-loading.gif',		// (string) Path and the name of the loading icon
			imageBtnPrev:			'<?php echo _IMG; ?>lightbox-btn-prev.gif',			// (string) Path and the name of the prev button image
			imageBtnNext:			'<?php echo _IMG; ?>lightbox-btn-next.gif',			// (string) Path and the name of the next button image
			imageBtnClose:		'<?php echo _IMG; ?>lightbox-btn-close.gif',		// (string) Path and the name of the close btn
			imageBlank:				'<?php echo _IMG; ?>lightbox-blank.gif',	
		});
		
    });
</script>
        
<?php get_footer(); ?>
