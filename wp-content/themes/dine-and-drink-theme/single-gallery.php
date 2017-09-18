<?php get_header(); ?>
<?php 

//$related_args = array('portfolio_cat' => 'portfolio2' ,'post_type' => 'portfolio','post__not_in' => array(get_the_ID()), 'category__in' => $post_cate, 'posts_per_page'=> 6, 'orderby' => 'rand', 'order' => 'DESC');
if (have_posts()) : while (have_posts()) : the_post();
	$terms = wp_get_post_terms($post->ID,'gallery_cat');  
foreach ($terms as $term) {  
    	$cate_list[] = $term->slug;  
}
?>
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
        			<div class="span12 page-fullwidth-gallery">
                    	
                   
                        <div class="gallery-detail">
                        <?php the_content();?>
                        </div>
                        
                        <div class="gallery_wrap">
                        	
        <?php  //$attachments = get_children( array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' =>'image', 'menu_order'=> 'DESC', 'orderby' => 'menu_order ID'));
		$attachments = get_children( array(
				'post_parent' => $post->ID,
				'numberposts' => '-1',
				'post_status' => 'inherit',
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'orderby' => 'menu_order ID',
				'order' => 'ASC'
			) );
		
		?>
        
          <?php
				$i = 0;
				$icount = count($attachments)-1;
					foreach ( $attachments as $attachment_id => $attachment) {?>
						<?php if($i%4 == 0){?>
							<div class="gallery_row clearfix">
						<?php }?>
                                <div class="gallery_box">
                                	<div class="gallery_image">
                                    	<a href="<?php  echo wp_get_attachment_url( $attachment_id); ?>"><?php echo wp_get_attachment_image( $attachment_id, 'gallery-thumb-1'); ?></a>
                                    </div>
                                    <h5 class="gallery_image_title">
                                    	<?php echo apply_filters( 'the_title', $attachment->post_title );?>
                                    </h5>
                                </div><!--gallery_box-->
						
						<?php if($i%4 == 3 || $i == $icount){?>
							</div><!--gallery_row-->
                        <?php }?>
					<?php $i++;
					}
			?>
        
        
        </div>
                    </div>
                    <!--span12 page-fullwidth-gallery-->
                </div>
            	</div>
            </div><!--main_container_inner-->
        </div>
    <?php  endwhile; endif;?>
<?php get_footer(); ?>
