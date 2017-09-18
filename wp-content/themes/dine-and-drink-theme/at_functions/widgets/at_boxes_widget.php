<?php
class AT_boxes_widget extends WP_Widget{
	// Constructor //
	
	public function __construct() {
		
		parent::__construct(
	 		'AT_boxes_widget', // Base ID
			'AT - Home Special Boxes', // Name
			array('description' => __('3 Special Boxes - can pull content from food menu, post or custom text. (this widget use only on Home Area)', 'default'),
					'classname' => 'AT_boxes_widget'), // Args
			array('width' => 350)
		);
	}
	
	// Extract Args //

	public function widget($args, $instance) {
		extract($args);
		//$title = apply_filters('widget_title', $instance['title']);
		echo $before_widget;
		?>
        	<div class="row-fluid home-special-boxes-wrap">
            
                    <?php for($i=1;$i<=3;$i++){
						
					if($instance['box'.$i.'_type_select'] == '1'){
							 global $query_string;
							parse_str($query_string, $args);
							$args = array('post_type' => 'menu', 'menu_tags' => $instance['box'.$i.'tags_type1'], 'posts_per_page' => 1, 'orderby' => 'date', 'order' => 'DESC');
							query_posts($args);
							$cnt = 0;
							if (have_posts()) : while (have_posts()) : the_post();
						?>
                        	<div class="span4">	
                                    <div class="home-special-boxes home-special-boxes-food clearfix">
                                        <div class="widget_title at_widget_title">
                                            <div class="widget_title_ribbon"><i class="icon-star"></i></div>
                                            <h3 class="widget_title_text"><?php echo $instance['box'.$i.'_type1_title']; ?></h3>
                                        </div><!--widget_title-->
                                        <div class="food-menu-widget-thumbnail">
                                            <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                                <a href="<?php the_permalink(); ?>">
                                            <?php }?>
                                            <?php the_post_thumbnail('menu-thumb-3');?>
                                            <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                                </a>
                                            <?php }?>
                                        </div><!--food-menu-widget-thumbnail-->
                                        <div class="food-menu-title-and-price">
                                            <div class="food-menu-widget-title clearfix">
                                                 <div class="food-menu-widget-badge-icon">
                                                    <i class="icon-thumbs-up"></i>
                                                 </div>
                                                 <div class="food-menu-widget-title-text">
                                                 <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                                    <a href="<?php the_permalink(); ?>">
                                                <?php }?>
                                                <?php the_title();?>
                                                <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                                    </a>
                                                <?php }?>
                                        		</div>
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
												 <?php echo $showprice; ?>
                                                </div> 
                                             </div><!--food-menu-widget-price-->
                                           	<?php }?>
                                         </div><!--food-menu-title-and-price-->
                                	</div><!--home-special-boxes home-special-boxes-food -->
                             	</div><!--span4-->
                                <?php $cnt++; endwhile; endif;?>
                            
                 <?php }else  if($instance['box'.$i.'_type_select'] == '2'){
							 global $query_string;
							parse_str($query_string, $args);
							$args = array('post_type' => 'post', 'tag' => $instance['box'.$i.'tags_type2'], 'posts_per_page' => 1, 'orderby' => 'date', 'order' => 'DESC');
							query_posts($args);
							$cnt = 0;
							if (have_posts()) : while (have_posts()) : the_post();
						?>
                        	<div class="span4">
                                	<div class="home-special-boxes home-special-boxes-post clearfix">
                                        <div class="widget_title at_widget_title">
                                            <div class="widget_title_ribbon widget_title_ribbon_none"><i class="icon-heart"></i></div>
                                            <div class="widget_title_ribbon_twelve_point_star"></div>
                                        	<h3 class="widget_title_text"><?php echo $instance['box'.$i.'_type2_title']; ?></h3>
                        				</div><!--widget_title-->
                                        <div class="food-menu-widget-thumbnail">
                                            <a href="<?php the_permalink();?>"><?php the_post_thumbnail('menu-thumb-3');?></a>
                                        </div><!--food-menu-widget-thumbnail-->
                                        <div class="home-special-boxes-post-title-and-detail">
                                            <h4 class="home-special-boxes-post-title-text"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                                            <div class="home-special-boxes-post-detial"><?php the_excerpt();?></div>
                                        </div><!--home-special-boxes-post-title-and-detail-->
                           	 		</div><!--home-special-boxes home-special-boxes-post-->
                                </div><!--span4-->
                                <?php $cnt++; endwhile; endif;?>
                                
                      <?php }else  if($instance['box'.$i.'_type_select'] == '3'){ ?>
                        	<div class="span4">
                                	<div class="home-special-boxes home-special-boxes-html-with-title clearfix">
                                        <div class="widget_title at_widget_title">
                                            <div class="widget_title_ribbon widget_title_ribbon_style2"><i class="icon-thumbs-up"></i></div>
                                            <h3 class="widget_title_text"><?php echo $instance['box'.$i.'_type3_title']; ?></h3>
                        				</div><!--widget_title-->
                                        <div class="home-special-boxes-post-detial"><?php echo $instance['box'.$i.'_type3_text']; ?></div>
                            		</div><!--home-special-boxes home-special-boxes-html-with-title-->
                                </div><!--span4-->
                                
                      <?php }else  if($instance['box'.$i.'_type_select'] == '4'){ ?>
                        	<div class="span4">
                                	<div class="home-special-boxes home-special-boxes-html-unwrapped-text clearfix">
                                        <?php echo $instance['box'.$i.'_type4_text']; ?>
                            		</div>
                                </div><!--span4-->
                      <?php }  //endif
							} // endfor?>
                         </div>
         <?php echo $after_widget;?>
		<?php
	}
	
	public function form($instance) {
		
		?>
        
        <?php 
		for($i=1;$i<=3;$i++){
				
				if (isset($instance['box'.$i.'_type_select'])) {
					$select[$i] = $instance['box'.$i.'_type_select'];
				}else{
					$select[$i] = '';
				}
				
				if (isset($instance['box'.$i.'_type1_title'])) {
					$title1[$i] = $instance['box'.$i.'_type1_title'];
				}
				else {
					$title1[$i] = 'Recommend Menu';
				}
				if (isset($instance['box'.$i.'_type2_title'])) {
					$title2[$i] = $instance['box'.$i.'_type2_title'];
				}
				else {
					$title2[$i] = 'Promotion';
				}
				if (isset($instance['box'.$i.'_type3_title'])) {
					$title3[$i] = $instance['box'.$i.'_type3_title'];
				}
				else {
					$title3[$i] = 'Lorem ipsum dolor';
				}
				
				$type1[$i] = "";
				if (isset($instance['box'.$i.'tags_type1']) && $instance['box'.$i.'tags_type1'] != "") {
					$type1[$i] = $instance['box'.$i.'tags_type1'];
				}
				$type2[$i] = "";
				if (isset($instance['box'.$i.'tags_type2']) && $instance['box'.$i.'tags_type2'] != "") {
					$type2[$i] = $instance['box'.$i.'tags_type2'];
				}
				
				if (isset($instance['box'.$i.'_type3_text'])) {
					$text3[$i] = $instance['box'.$i.'_type3_text'];
				}
				else {
					$text3[$i] = 'Lorem ipsum dolor sit amet, adipiscing amet tincid ut lamet aoreet amet dolore magna aliquam erat volutpat.';
				}
				
				if (isset($instance['box'.$i.'_type4_text'])) {
					$text4[$i] = $instance['box'.$i.'_type4_text'];
				}
				else {
					$text4[$i] = 'Lorem ipsum dolor sit amet, adipiscing amet tincid ut lamet aoreet amet dolore magna aliquam erat volutpat.';
				}
				
			
			?>
        	<p><strong>Box <?php echo $i;?></strong></p>
            <p>
                <select name="<?php echo $this->get_field_name('box'.$i.'_type_select'); ?>" id="<?php echo $this->get_field_id('at_type_select_box'.$i); ?>" onchange="boxselect(this)">
                  <option value="-1" disabled="disabled" <?php selected($select[$i], ''); ?>>Please Select</option>
                  <option value="1" <?php selected($select[$i], 1); ?>>Box type 1 : Select from Food Menu</option>
                  <option value="2" <?php selected($select[$i], 2); ?>>Box type 2 : Select from Post</option>
                  <option value="3" <?php selected($select[$i], 3); ?>>Box type 3 : Text</option>
                  <option value="4" <?php selected($select[$i], 4); ?>>Box type 4 : Unwrap Text</option>
                </select>
                
            </p>
            
            <div id="<?php echo $this->get_field_id('at_box'.$i.'_type1');?>" style="display:none">
                <p>
                    <label for="<?php echo $this->get_field_id('box'.$i.'_type1_title'); ?>"><?php _e('Title :', 'default'); ?></label> 
                    <input id="<?php echo $this->get_field_id('box'.$i.'_type1_title'); ?>" name="<?php echo $this->get_field_name('box'.$i.'_type1_title'); ?>" type="text" value="<?php echo esc_attr($title1[$i]); ?>" class="widefat" />
                </p>
                <p>
				<?php 
                        $taxonomy_terms = get_terms('menu_tags', array(
                            'hide_empty' => 0
                        ));
                            ?>
                <label for="<?php echo $this->get_field_id('box'.$i.'tags_type1'); ?>"><?php _e('Select Tag :', 'default'); ?></label> 
                <select name="<?php echo $this->get_field_name('box'.$i.'tags_type1'); ?>">
                    <option value="-1"selected="selected" disabled="disabled">Please Select</option>
                    <?php foreach($taxonomy_terms as $tag){?>
                    <option value="<?php echo $tag->slug;?>"  <?php selected($type1[$i], $tag->slug); ?>><?php echo $tag->name;?></option>
                    <?php }?>
                  
                </select>
                </p>
            
            </div>
            <div id="<?php echo $this->get_field_id('at_box'.$i.'_type2');?>"  style="display:none">
                <p>
                    <label for="<?php echo $this->get_field_id('box'.$i.'_type2_title'); ?>"><?php _e('Title :', 'default'); ?></label> 
                    <input id="<?php echo $this->get_field_id('box'.$i.'_type2_title'); ?>" name="<?php echo $this->get_field_name('box'.$i.'_type2_title'); ?>" type="text" value="<?php echo esc_attr($title2[$i]); ?>"  class="widefat"/>
                </p>
                <p>
				<?php 
                        $taxonomy_terms = get_terms('post_tag', array(
                            'hide_empty' => 0
                        ));
                            ?>
                <label for="<?php echo $this->get_field_id('box'.$i.'tags_type2'); ?>"><?php _e('Select Tag :', 'default'); ?></label> 
                <select name="<?php echo $this->get_field_name('box'.$i.'tags_type2'); ?>">
                    <option value="-1" selected="selected" disabled="disabled">Please Select</option>
                    <?php foreach($taxonomy_terms as $tag){?>
                    <option value="<?php echo $tag->slug;?>"  <?php selected($type2[$i], $tag->slug); ?>><?php echo $tag->name." ".$type2[$i];?></option>
                    <?php }?>
                  
                </select>
                </p>
            
            </div>
            <div id="<?php echo $this->get_field_id('at_box'.$i.'_type3');?>"  style="display:none">
                <p>
                    <label for="<?php echo $this->get_field_id('box'.$i.'_type3_title'); ?>"><?php _e('Title :', 'default'); ?></label> 
                    <input id="<?php echo $this->get_field_id('box'.$i.'_type3_title'); ?>" name="<?php echo $this->get_field_name('box'.$i.'_type3_title'); ?>" type="text" value="<?php echo esc_attr($title3[$i]); ?>" class="widefat" />
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id('box'.$i.'_type3_text'); ?>"><?php _e('Text :', 'default'); ?></label> 
                    <textarea id="<?php echo $this->get_field_id('box'.$i.'_type3_text'); ?>" name="<?php echo $this->get_field_name('box'.$i.'_type3_text'); ?>" cols="45" rows="10" class="widefat"><?php echo esc_attr($text3[$i]); ?></textarea>
                </p>
            </div>
            <div id="<?php echo $this->get_field_id('at_box'.$i.'_type4');?>"  style="display:none">
                <p>
                    <label for="<?php echo $this->get_field_id('box'.$i.'_type4_text'); ?>"><?php _e('Text :', 'default'); ?></label> 
                    <textarea id="<?php echo $this->get_field_id('box'.$i.'_type4_text'); ?>" name="<?php echo $this->get_field_name('box'.$i.'_type4_text'); ?>" cols="45" rows="10" class="widefat"><?php echo esc_attr($text4[$i]); ?></textarea>
                </p>
            </div>
            <hr />
            <script>
                boxselect(document.getElementById('<?php echo $this->get_field_id('at_type_select_box'.$i); ?>'));
                </script>
        <?php }?>
		<?php 
	}

	public function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = array();
		for($i=1;$i<=3;$i++){
			$instance['box'.$i.'_type_select'] = strip_tags($new_instance['box'.$i.'_type_select']);
			$instance['box'.$i.'_type1_title'] = strip_tags($new_instance['box'.$i.'_type1_title']);
			$instance['box'.$i.'_type2_title'] = strip_tags($new_instance['box'.$i.'_type2_title']);
			$instance['box'.$i.'_type3_title'] = strip_tags($new_instance['box'.$i.'_type3_title']);
			$instance['box'.$i.'tags_type1'] = strip_tags($new_instance['box'.$i.'tags_type1']);
			$instance['box'.$i.'tags_type2'] = strip_tags($new_instance['box'.$i.'tags_type2']);
			
			if ( current_user_can('unfiltered_html') )
				$instance['box'.$i.'_type3_text'] =  $new_instance['box'.$i.'_type3_text'];
			else
				$instance['box'.$i.'_type3_text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['box'.$i.'_type3_text']) ) ); // wp_filter_post_kses() expects slashed
				
			if ( current_user_can('unfiltered_html') )
				$instance['box'.$i.'_type4_text'] =  $new_instance['box'.$i.'_type4_text'];
			else
				$instance['box'.$i.'_type4_text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['box'.$i.'_type4_text']) ) );
		}

		return $instance;
	}
}
?>