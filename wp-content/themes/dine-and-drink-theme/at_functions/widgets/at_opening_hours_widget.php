<?php
class AT_opening_hours_widget extends WP_Widget{
	// Constructor //
	public function __construct() {
		
		parent::__construct(
	 		'AT_opening_hours_widget', // Base ID
			'AT - Opening Hours', // Name
			array('description' => __('Display your Opening Hours', 'default'),
					'classname' => 'AT_opening_hours_widget'), // Args
			array('width' => 450)
		);
	}
	
	// Extract Args //

	public function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		
		echo $before_widget;
		?>
       	<div class="widget_title at_widget_title">
                    <div class="widget_title_ribbon"><i class="icon-calendar"></i></div>
                    <h3 class="widget_title_text"><?php echo $instance['title'];?></h3>
             </div><!--widget_title-->
            <ul class="opening_hours_list">
                
                 
		<?php  for($i=1;$i<=7;$i++){
					if($instance['day'.$i] != "" and $instance['time'.$i] != ""){
			?>
                
                <li>
                    <span class="day"><?php echo $instance['day'.$i];?></span>
                    <span class="opening_hours"><?php echo $instance['time'.$i];?></span>
                </li>
                            
        <?php } }?>
        </ul>
                        
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
		
		$day_arr = array('MONDAY','TUESDAY','WEDNESDAY','THURSDAY','FRIDAY','SATURDAY','SUNDAY');
		$time_arr = array('08.00 AM - 10.00 PM','08.00 AM - 10.00 PM','08.00 AM - 10.00 PM','08.00 AM - 10.00 PM','08.00 AM - 10.00 PM','08.00 AM - 02.00 PM<br/>06.00 PM - 10.00 PM','CLOSED');
		
		for($i=1;$i<=7;$i++){
			if (isset($instance['day'.$i])) {
				$day[$i] = $instance['day'.$i];
				$time[$i] = $instance['time'.$i];
			}
			else {
				$day[$i] = $day_arr[$i-1];
				$time[$i] = $time_arr[$i-1];
			}
		}
		
		?>
        <p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title :', 'default'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
        <?php for($i=1;$i<=7;$i++){?>
		<p>
		<input id="<?php echo $this->get_field_id('day'.$i); ?>" name="<?php echo $this->get_field_name('day'.$i); ?>" type="text" value="<?php echo esc_attr($day[$i]); ?>" size="20" />
        <input id="<?php echo $this->get_field_id('time'.$i); ?>" name="<?php echo $this->get_field_name('time'.$i); ?>" type="text" value="<?php echo esc_attr($time[$i]); ?>" size="35" />
		</p>
        <?php }?>
		<?php 
	}

	public function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = array();
		$instance['title'] = strip_tags($new_instance['title']);
		for($i=1;$i<=7;$i++){
			if ( current_user_can('unfiltered_html') )
				$instance['day'.$i] =  $new_instance['day'.$i];
			else
				$instance['day'.$i] = stripslashes( wp_filter_post_kses( addslashes($new_instance['day'.$i]) ) );
			
			if ( current_user_can('unfiltered_html') )
				$instance['time'.$i] =  $new_instance['time'.$i];
			else
				$instance['time'.$i] = stripslashes( wp_filter_post_kses( addslashes($new_instance['time'.$i]) ) );
		}

		return $instance;
	}
}
?>