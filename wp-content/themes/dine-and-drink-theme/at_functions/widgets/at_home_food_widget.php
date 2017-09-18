<?php
class AT_home_food_widget extends WP_Widget{
	// Constructor //
	public function __construct() {
		
		parent::__construct(
	 		'AT_home_food_widget', // Base ID
			'AT - Home Food Menu', // Name
			array('description' => __('Display your Food Menu. (this widget use only on Home Area)', 'default'),
					'classname' => 'AT_home_food_widget') // Args
		);
	}
	
	// Extract Args //

	public function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		
		echo $before_widget;
		?>
        	<?php global $query_string;
						parse_str($query_string, $args);
						if($instance['tag_cate'] == 1){
							$args = array('post_type' => 'menu', 'menu_tags' => $instance['tag'], 'posts_per_page' => 1, 'orderby' => 'date', 'order' => 'DESC');
						}else if($instance['tag_cate'] == 2){
							$args = array('post_type' => 'menu', 'menu_cat' => $instance['cate'], 'posts_per_page' => 1, 'orderby' => 'date', 'order' => 'DESC');
						}
						query_posts($args);
						$cnt = 0;
						if (have_posts()) : while (have_posts()) : the_post();
							
						?>
					<div class="home-food-wrap">
                         		<div class="row-fluid">
                                    <div class="span6 home-food-media">
                                    	<?php if(get_post_meta(get_the_ID(),'at_videourl',true) != ''){?>
                                        <div class="video-container">
                                            <?php echo get_post_meta(get_the_ID(),'at_videourl',true); ?>
                                         </div>
                                         <?php }else{ ?>
										 <?php	 $attachments = get_children( array(
													'post_parent' => get_the_ID(),
													'numberposts' => '-1',
													'post_status' => 'inherit',
													'post_type' => 'attachment',
													'post_mime_type' => 'image',
													'orderby' => 'menu_order ID',
													'order' => 'DESC'
												) );?>
											<?php if(!empty($attachments)){?>
                                                     <div class="flex_home_food flexslider">
                                                    	<ul class="slides">
                                                        
												<?php foreach ( $attachments as $attachment_id => $attachment) {?>
                                                        <li>
                                                        <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                                            <a href="<?php the_permalink(); ?>">
                                                        <?php }?>
                                                        <?php echo wp_get_attachment_image($attachment_id, 'menu-thumb-1'); ?>
														<?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                                            </a>
                                                        <?php }?>
                                                        </li>
												<?php  }?>
                                                		</ul>
                                                    </div>
											<?php }else{ the_post_thumbnail('menu-thumb-1'); } ?>
										  <?php }?>
                                    </div><!--span6 home-food-media -->
                               		<div class="span6">
                                	<div class="widget_title_ribbon">
                                    <?php if(get_post_meta(get_the_ID(),'at_videourl',true) != ''){?>
                                    	<i class="icon-facetime-video"></i>
                                    <?php }else{ ?>
                                    	<i class="icon-food"></i>
                                    <?php }?>
                                    </div>
                                    <h3 class="home-food-title">
                                         <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                        	<a href="<?php the_permalink(); ?>">
                                        <?php }?>
										<?php the_title();?>
                                        <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                            				</a>
                                        <?php }?>
                                    </h3>
                                    <div class="home-food-excerpt">
                                    	<?php the_excerpt();?>
                                    </div><!--home-food-excerpt-->
                                    <?php if(get_post_meta(get_the_ID(),'at_recommend',true) == 'true'){?>
                                  	<div class="home-food-badge clearfix">
                                         <div class="home-food-badge-icon food-menu-widget-badge-icon">
                                            <i class="icon-thumbs-up"></i>
                                         </div>
                                         <div class="home-food-badge-text food-menu-widget-title-text">Chef Recommended</div>
                                	</div><!--home-food-badge-->
                                    <?php }?>
                                
                                <?php 
									$showprice = "";
									if(get_post_meta(get_the_ID(),'at_price',true) == '1'){ ////single price
										$showprice =  get_post_meta(get_the_ID(), 'at_sprice', true);
									}else if(get_post_meta(get_the_ID(),'at_price',true) == '2'){
										$mprice =  get_post_meta(get_the_ID());
										foreach($mprice as $key => $val){
											if(substr($key,0,26) == 'at_mpriceat01_pricing_name' && get_post_meta(get_the_ID(), $key, true) != ""){
												$showprice =  get_post_meta(get_the_ID(), $key, true);
												break;
											}
										}
									}
								?>
                                <?php if($showprice != ""){?>
                                 <div class="home-food-price food-menu-widget-price clearfix">
                                 	<div class="food-menu-widget-money">
                                     	<i class="icon-money"></i>
                                    </div>    
                                    <div class="home-food-price-price food-menu-widget-price-text">
									 	<?php echo $showprice;?>
                                 	</div>
                                 </div><!--home-food-price-->
                              	<?php }?>
                                 
                                </div><!--span6 -->
                            	</div><!--row-fluid-->
                            </div><!--home-food-wrap-->
                            <?php endwhile; endif;?>
                            <script type="text/javascript">
								jQuery(window).load(function() {
									 jQuery('.flex_home_food').flexslider({
										  animation: "fade",
										  slideshowSpeed: 4000,
										  slideshow: true
									});
								});
								</script>
                        
        <?php echo $after_widget; ?>
		<?php
	}
	
	public function form($instance) {
		
		// outputs the options form on admin
		if (isset($instance['title'])) {
			$title = $instance['title'];
		}
		else {
			$title = __('New title', 'default');
		}
		
		if (isset($instance['tag_cate'])) {
			$tag_cate = $instance['tag_cate'];
		}
		else {
			$tag_cate = "";
		}
		
		if (isset($instance['tag'])) {
			$tag_instance = $instance['tag'];
		}
		else {
			$tag_instance = "";
		}
		
		if (isset($instance['cate'])) {
			$cate_instance = $instance['cate'];
		}
		else {
			$cate_instance = "";
		}
		
		
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title :', 'default'); ?></label> 
        </p>
        <p>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
        <p><input name="<?php echo $this->get_field_name('tag_cate'); ?>" id="<?php echo $this->get_field_id('tag_cate'); ?>" type="radio" value="1" onclick="boxradio(this);" <?php checked($tag_cate, 1); ?>> <?php _e('Select food menu by tags :', 'default'); ?>
        <div id="div_radio_<?php echo $this->get_field_id('tag_cate'); ?>1" style="display:none;">
				<?php 
                        $taxonomy_terms = get_terms('menu_tags', array(
                            'hide_empty' => 0
                        ));
                            ?>
                <select name="<?php echo $this->get_field_name('tag'); ?>">
                   <option value="-1">All tags</option>
                    <?php foreach($taxonomy_terms as $tag){?>
                    <option value="<?php echo $tag->slug;?>"  <?php selected($tag_instance, $tag->slug); ?>><?php echo $tag->name;?></option>
                    <?php }?>
                  
                </select>
        </div>
        </p>
        <p><input name="<?php echo $this->get_field_name('tag_cate'); ?>" id="<?php echo $this->get_field_id('tag_cate'); ?>" type="radio" value="2" onclick="boxradio(this);"  <?php checked($tag_cate, 2); ?>> <?php _e('Select food menu by categories :', 'default'); ?>
        <div id="div_radio_<?php echo $this->get_field_id('tag_cate'); ?>2" style="display:none;">
        <?php 
				$taxonomy_terms = get_terms('menu_cat', array(
					'hide_empty' => 0
				));
					?>
		<select name="<?php echo $this->get_field_name('cate'); ?>">
        	<option value="-1">All categories</option>
        	<?php foreach($taxonomy_terms as $cate){?>
		  	<option value="<?php echo $cate->slug;?>"  <?php selected($cate_instance, $cate->slug); ?>><?php echo $cate->name;?></option>
            <?php }?>
          
        </select>
		</div>
        </p>
        <script>
			boxradio(document.getElementById('<?php echo $this->get_field_id('tag_cate'); ?>'));
		</script>
		<?php 
	}

	public function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = array();
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['tag_cate'] = strip_tags($new_instance['tag_cate']);
		$instance['tag'] = strip_tags($new_instance['tag']);
		$instance['cate'] = strip_tags($new_instance['cate']);


		return $instance;
	}
}
?>