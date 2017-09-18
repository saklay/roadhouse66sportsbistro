<?php get_header(); ?>
<?php 

//$related_args = array('portfolio_cat' => 'portfolio2' ,'post_type' => 'portfolio','post__not_in' => array(get_the_ID()), 'category__in' => $post_cate, 'posts_per_page'=> 6, 'orderby' => 'rand', 'order' => 'DESC');
if (have_posts()) : while (have_posts()) : the_post();
	$terms = wp_get_post_terms($post->ID,'menu_cat');  
foreach ($terms as $term) {  
    	$cate_list[] = $term->slug;  
}
$attachments = array();
?>
<div class="main_container single_food_menu_container">
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
        			<div class="span12 content">
                    	<div class="single-food-menu-wrapper">
                            <div class="single-food-menu-media">
        <?php if (get_post_meta($post->ID, 'at_videourl', true)) : ?>
       		<?php echo get_post_meta($post->ID, 'at_videourl', true);?>
        <?php else :?>
        <?php  //$attachments = get_children( array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' =>'image', 'menu_order'=> 'DESC', 'orderby' => 'menu_order ID'));
		
		$attachments = get_children( array(
				'post_parent' => $post->ID,
				'numberposts' => '-1',
				'post_status' => 'inherit',
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'orderby' => 'menu_order ID',
				'order' => 'DESC'
			) );
		
		?>
<?php /*?>        
        <div class="preload" id="preload">
          <?php
				$i = 0;
				if(count($attachments) > 0){
					foreach ( $attachments as $attachment_id => $attachment) {
						if($i == 0){
							
								echo wp_get_attachment_image( $attachment_id, 'pic-fullwidth'); 
				  		$i++;
						}
					}
				}else{
					 the_post_thumbnail();
				}
			?>
        </div><?php */?>
        <!--preload-->
        <?php if(count($attachments) > 0){?>
        <div class="slider_z-index">
          <div class="flexslider slider_wrapper single_portfolio_slider_wrapper clearfix">
            <ul class="slides">
              <?php
                    foreach ( $attachments as $attachment_id => $attachment) {
						?>
              <li>
			  <?php 
							 echo wp_get_attachment_image( $attachment_id, 'pic-fullwidth');
			  ?>

              </li>
              <?php } ?>
            </ul>
          </div>
          <!-- slider_wrapper-->
        </div>
        <!--////end slider_z-index-->
        <?php }///end if count?>
        
        <?php endif;?>
        </div><!--single-food-menu-media-->
        
        
        <div class="single-food-menu-content clearfix">
                            
                            <?php 
								if(get_post_meta($post->ID, 'at_price', TRUE) == 1){///single price
									$showprice = get_post_meta($post->ID, 'at_sprice', TRUE);
								}else{
									 $all_options = wp_load_alloptions();
									  ksort($all_options);
									  $price_array = array();
									  foreach( $all_options as $name => $value ) {
										if (strpos($name, 'at01_pricing_name') === 0) {
											if(get_post_meta($post->ID, 'at_mprice'.$name, TRUE) != ""){
											
											array_push($price_array,get_option($name)." ".get_post_meta($post->ID, 'at_mprice'.$name, TRUE));
											}
									  }
									}
									
									$showprice = implode(" | ",$price_array);
								}
								?>
                                <?php if($showprice != ""){?>
                              <div class="single-food-menu-price clearfix">
                                 	<div class="single-food-menu-money">
                                     	<i class="icon-money"></i>
                                    </div>    
                                    <h3 class="single-food-menu-price-text">
                                    	<?php echo $showprice;?>
                                    </h3>
                                 </div><!--single-food-menu-price-->
                                 <?php }?>
                                 <?php if(get_post_meta($post->ID, 'at_recommend', TRUE) == 'true'){?>
                                 <div class="single-food-menu-badge clearfix">
                                	 <div class="single-food-menu-badge-icon">
                                     	<i class="icon-thumbs-up"></i>
                                     </div>
                                     <h3 class="single-food-menu-badge-text">Chef Recommended</h3>
                                </div><!--single-food-menu-badge-->
                                <?php }?>
                            	<h2 class="single-food-menu-title">
                                	<?php the_title();?>
                                </h2>
                                <div class="single-food-menu-detail">
                               <?php the_content();?>
                                </div>
                            	<?php if(is_single()){ ?>
									<?php if(get_option('at01_menu_widget') == 'true'){?>
                                    	  <div class="single_food_social clearfix">
                                            <ul class="single_social_icon_list">
                                            <?php 
                                                if(get_option('at01_menu_widget_fb') == 'true'){?>
                                                <li class="single_social_icon facebook">
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink($post -> ID);?>" target="_blank">
                                                        <i class="icon-facebook"></i>
                                                    </a>
                                                </li>
                                                <?php }
                                    
                                                if(get_option('at01_menu_widget_tw') == 'true'){?>
                                                <li class="single_social_icon twitter">
                                                    <a href="http://twitter.com/home?status=<?php the_title();?> - <?php the_permalink($post -> ID);?>" target="_blank">
                                                        <i class="icon-twitter"></i>
                                                    </a>
                                               </li>
                                                <?php }
                                                
                                                if(get_option('at01_menu_widget_google') == 'true'){?>
                                                <li class="single_social_icon google-plus">
                                                    <a href="https://plus.google.com/share?url=<?php the_permalink($post -> ID);?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                                        <i class="icon-google-plus"></i>
                                                    </a>
                                                </li>
                                            <?php }
                                            
                                                if(get_option('at01_menu_widget_linkedin') == 'true'){?>
                                                <li class="single_social_icon linkedin">
                                                    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink($post -> ID);?>&amp;title=<?php the_title();?>" target="_blank">
                                                        <i class=" icon-linkedin"></i>
                                                    </a>
                                                </li>
                                
                                            <?php }?>
                                            </ul><!--single_social_icon_list-->
                                        </div><!--single_food_social-->
                                    <?php }?>
                                  <?php }?><!--end social share-->
                            </div><!--single-food-menu-content-->
                        </div><!--single-food-menu-wrapper-->
                    </div>

                </div>
            </div>
             </div><!--main_container_inner-->
        </div><!--main_container-->

<?php endwhile; endif;?>

<?php
if(count($attachments) > 0){
	$auto_port = get_option("at01_menu_auto_play");
	$speed = get_option('at01_menu_auto_play_ms') != '' && get_option('at01_menu_auto_play_ms') != 0 ? get_option('at01_menu_auto_play_ms') : 4000;
	?>
	<script type="text/javascript">
		jQuery(window).load(function() {
			 jQuery('.slider_wrapper').flexslider({
				  animation: "fade",
				  slideshowSpeed: <?php echo $speed;?>, //Integer: Set the speed of the slideshow cycling, in milliseconds
				  //animationSpeed: 200,   //Integer: Set the speed of animations, in milliseconds
				  slideshow: <?php echo $auto_port; ?>, //Boolean: Animate slider automatically
				  smoothHeight:true,
				  pauseOnHover: true
			});
			//document.getElementById('preload').style.position = 'absolute'; 
			//setTimeout("document.getElementById('preload').style.display = 'none';",1000);
			
		});
		
	</script>
<?php }?>
<?php get_footer(); ?>
