<?php
class AT_weekly_menu_widget extends WP_Widget{
	// Constructor //
	public function __construct() {
		
		parent::__construct(
	 		'AT_weekly_menu_widget', // Base ID
			'AT - Weekly Menu', // Name
			array('description' => __('Your Recent posts with thumbnail on Sidebar or Footer', 'default'),
					'classname' => 'AT_weekly_menu_widget') // Args
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
							$args = array('post_type' => 'menu',  'posts_per_page' => 1, 'orderby' => 'date', 'order' => 'DESC');
							if($instance['tag'] != -1){
								$args['menu_tags'] = $instance['tag'];
							}
						}else if($instance['tag_cate'] == 2){
							$args = array('post_type' => 'menu', 'posts_per_page' => 1, 'orderby' => 'date', 'order' => 'DESC');
							if($instance['cate'] != -1){
								$args['menu_cat'] = $instance['cate'];
							}
						}else{
							$args = array('post_type' => 'menu',  'posts_per_page' => 1, 'orderby' => 'date', 'order' => 'DESC');
						}
						query_posts($args);
						$cnt = 0;
						if (have_posts()) : while (have_posts()) : the_post();
							
						?>
       	<div class="widget_title at_widget_title">
            <div class="widget_title_ribbon"><i class="icon-star"></i></div>
            <h3 class="widget_title_text"><?php echo $instance['title']; ?></h3>
        </div><!--widget_title-->
        <div class="food-menu-widget clearfix">
            <div class="food-menu-widget-thumbnail">
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail('menu-thumb-2');?></a>
            </div><!--food-menu-widget-thumbnail-->
            
            <div class="food-menu-title-and-price clearfix">
                <div class="food-menu-widget-title clearfix">
                     <div class="food-menu-widget-badge-icon">
                        <i class="icon-thumbs-up"></i>
                     </div>
                     <div class="food-menu-widget-title-text"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
                </div><!--food-menu-widget-title-->
                
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
                <div class="food-menu-widget-price clearfix">
                    <div class="food-menu-widget-money">
                        <i class="icon-money"></i>
                    </div>    
                    <div class="food-menu-widget-price-text">
                     <?php echo $showprice;?>
                    </div>
                 </div><!--food-menu-widget-price-->
                 <?php }?>
            </div><!--food-menu-title-and-price-->
        </div><!--food-menu-widget-->
        <?php endwhile; endif;?>
                        
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
        <p><input name="<?php echo $this->get_field_name('tag_cate'); ?>" id="<?php echo $this->get_field_id('tag_cate'); ?>" type="radio" value="1" onclick="boxradio_weekly(this);" <?php checked($tag_cate, 1); ?>> <?php _e('Select food menu by tags :', 'default'); ?>
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
        <p><input name="<?php echo $this->get_field_name('tag_cate'); ?>" id="<?php echo $this->get_field_id('tag_cate'); ?>" type="radio" value="2" onclick="boxradio_weekly(this);"  <?php checked($tag_cate, 2); ?>> <?php _e('Select food menu by categories :', 'default'); ?>
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
			boxradio_weekly(document.getElementById('<?php echo $this->get_field_id('tag_cate'); ?>'));
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