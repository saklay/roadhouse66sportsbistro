<?php
class AT_recent_post_widget extends WP_Widget{
	// Constructor //
	public function __construct() {
		
		parent::__construct(
	 		'AT_recent_post_widget', // Base ID
			'AT - Recent Posts', // Name
			array('description' => __('Your Recent posts with thumbnail on Sidebar or Footer', 'default'),
					'classname' => 'AT_recent_post_widget') // Args
		);
	}
	
	// Extract Args //

	public function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		
		echo $before_widget;
		?>
       	<div class="widget_title at_widget_title">
            <div class="widget_title_ribbon"><i class="icon-bullhorn"></i></div>
            <h3 class="widget_title_text"><?php echo $instance['title'];?></h3>
        </div><!--widget_title-->
                
                 
		<?php 
							global $query_string;
							parse_str($query_string, $args);
							$args = array('posts_per_page' => $instance['number'], 'orderby' => 'date', 'order' => 'DESC');
							query_posts($args);
							$cnt = 0;
							if (have_posts()) : while (have_posts()) : the_post();?>
                            <div class="recent-post clearfix">
                            	<?php if(has_post_thumbnail()){?>
                    			<div class="recent-post-thumbnail">
                                	<a href="<?php the_permalink();?>"><?php the_post_thumbnail('blog-thumb-1');?></a>
                                </div><!--recent-post-thumbnail-->
                                <?php }?>
                    			<div class="recent-post-title<?php if(!has_post_thumbnail()){?> no-thumbnail<?php }?>"><a href="<?php the_permalink();?>"><?php the_title();?></a>
                                	<div class="recent-post-published">
										<?php echo get_the_date(); ?>
                                	</div><!--recent-post-published-->
                    			</div><!--recent-post-title-->
                          	</div><!--recent-post-->
                            
                       	<?php $cnt++; endwhile; endif;?>
                        
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
		
		if (isset($instance['number'])) {
			$number = $instance['number'];
		}
		else {
			$number = 5;
		}
		
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title :', 'default'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
        <p>
		<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show :', 'default'); ?></label> 
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
		</p>
		<?php 
	}

	public function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = array();
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = strip_tags($new_instance['number']);

		return $instance;
	}
}
?>