<?php
class AT_flickr_widget extends WP_Widget{
	// Constructor //
	public function __construct() {
		
		parent::__construct(
	 		'AT_flickr_widget', // Base ID
			'AT - Flickr', // Name
			array('description' => __('Display your recent Filckr photos', 'default'),
					'classname' => 'AT_flickr_widget') // Args
		);
	}
	
	// Extract Args //

	public function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		echo $before_widget;
		?>
        <div class="widget_title at_widget_title">
                    <div class="widget_title_ribbon"><i class="icon-camera-retro"></i></div>
                    <h3 class="widget_title_text"><?php echo esc_attr($instance['title']); ?></h3>
                 </div><!--widget_title-->
                <div class="widget_flickr clearfix">
                <script type="text/javascript" src='http://www.flickr.com/badge_code_v2.gne?count=<?php echo esc_attr($instance['count']); ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo esc_attr($instance['user']); ?>'></script>
                </div><!--widget_flickr-->
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
		
		if (isset($instance['count'])) {
			$count = $instance['count'];
		}
		else {
			$count = 9;
		}
		
		if (isset($instance['user'])) {
			$user = $instance['user'];
		}
		else {
			$user = "";
		}
		
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title :', 'default'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
        <p>
		<label for="<?php echo $this->get_field_id('user'); ?>"><?php _e('Flickr ID :', 'default'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo esc_attr($user); ?>" />
		</p>
         <p>
		<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Number of photos :', 'default'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo esc_attr($count); ?>" />
		</p>
		<?php 
	}

	public function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = array();
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = strip_tags($new_instance['count']);
		$instance['user'] = strip_tags($new_instance['user']);

		return $instance;
	}
}
?>