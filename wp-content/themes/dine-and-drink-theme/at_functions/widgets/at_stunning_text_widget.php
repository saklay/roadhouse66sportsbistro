<?php
class AT_stunning_text_widget extends WP_Widget{
	// Constructor //
	public function __construct() {
		
		parent::__construct(
	 		'AT_stunning_text_widget', // Base ID
			'AT - Home Stunning Text', // Name
			array('description' => __('Stunning text with title, description, link button. (this widget use only on Home Area)', 'default'),
					'classname' => 'AT_stunning_text_widget'), // Args
			array('width' => 350)
		);
	}
	
	// Extract Args //

	public function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		echo $before_widget;
		?>
        <div class="home-stunning-text-wrap">
                                <div class="widget_title_ribbon"><i class="icon-gift"></i></div>
                                <div class="home-stunning-text-area<?php if($instance['button_text'] != ''){?> button-enable<?php }?>">
                                    <h1 class="home-stunning-text-title"><?php echo $instance['title']; ?></h1><!--home-stunning-text-title--> 
                                    <div class="home-stunning-text-caption"><?php echo $instance['text']; ?></div><!--home-stunning-text-caption-->
                                    <a class="home-stunning-text-button button" href="<?php echo $instance['link']; ?>"><?php echo $instance['button_text']; ?></a><!--home-stunning-text-button button-->
                                </div><!--home-stunning-text-area button-enable-->
                            </div><!--home-stunning-text-wrap--> 
        
        <?php echo $after_widget;?>
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
		
		if (isset($instance['text'])) {
			$text = $instance['text'];
		}
		else {
			$text = 'Lorem ipsum dolor sit amet, adipiscing amet tincid ut lamet aoreet amet dolore magna aliquam erat volutpat.';
		}
		
		if (isset($instance['button_text'])) {
			$button_text = $instance['button_text'];
		}
		else {
			$button_text = 'Read More';
		}
		
		if (isset($instance['link'])) {
			$link = $instance['link'];
		}
		else {
			$link = '#';
		}
		
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title :', 'default'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
        <p>
		<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text :', 'default'); ?></label> 
		<textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
		</p>
        <p>
		<label for="<?php echo $this->get_field_id('button_text'); ?>"><?php _e('Button Text :', 'default'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('button_text'); ?>" name="<?php echo $this->get_field_name('button_text'); ?>" type="text" value="<?php echo esc_attr($button_text); ?>" />
		</p>
        <p>
		<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Button Link :', 'default'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($link); ?>" />
		</p>
        
		<?php 
	}

	public function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = array();
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['button_text'] = strip_tags($new_instance['button_text']);
		$instance['link'] = strip_tags($new_instance['link']);
		
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) );

		return $instance;
	}
}
?>