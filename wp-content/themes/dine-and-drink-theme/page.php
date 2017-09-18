<?php get_header(); ?>
<div class="main_container <?php if(get_option('at01_blog_style') == 1) { ?>left-sidebar<?php }else if(get_option('at01_blog_style') == 3) {?>no-slidebar<?php }?>">
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
        			<div class="span9 content page-content">
        <?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
                    <div class="entry-content">
                    	<div class="entry-content-inner clearfix">
							<?php the_content();?>
                        </div>
                    </div><!--entry-content -->
        		 <?php comments_template(); ?>
                 
         	<?php endwhile; ?>
            
		<?php endif; ?>
        
       </div>
                    <div class="span3 sidebar" >
            <?php dynamic_sidebar('sidebar-2');?>
        </div><!--span3 sidebar -->
                </div>
            </div>
           	</div><!--main_container_inner-->
        </div>
<script type="text/javascript">
    $(function() {
        $(".page-content a[href$='.jpg']").lightBox({
			imageLoading:			'<?php echo _IMG; ?>lightbox-ico-loading.gif',		// (string) Path and the name of the loading icon
			imageBtnPrev:			'<?php echo _IMG; ?>lightbox-btn-prev.gif',			// (string) Path and the name of the prev button image
			imageBtnNext:			'<?php echo _IMG; ?>lightbox-btn-next.gif',			// (string) Path and the name of the next button image
			imageBtnClose:		'<?php echo _IMG; ?>lightbox-btn-close.gif',		// (string) Path and the name of the close btn
			imageBlank:				'<?php echo _IMG; ?>lightbox-blank.gif',	
		});
		
    });
    </script>
<?php get_footer(); ?>
