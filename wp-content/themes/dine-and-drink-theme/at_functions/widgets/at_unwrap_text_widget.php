<?php
class AT_unwrap_text_widget extends WP_Widget{
	// Constructor //
	public function __construct() {
		
		parent::__construct(
	 		'AT_unwrap_text_widget', // Base ID
			'AT - Unwrap Text', // Name
			array('description' => __('text or HTML with no widget title', 'default'),
					'classname' => 'AT_unwrap_text_widget'), // Args
			array('width' => 350)
		);
	}
	
	// Extract Args //

	public function widget($args, $instance) {
		extract($args);
		//$title = apply_filters('widget_title', $instance['title']);
		
		echo $before_widget;
		?>
       <?php echo $instance['text']?>
                        
        <?php echo $after_widget; ?>
		<?php
	}
	
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array('text' => '' ) );
		$text = esc_textarea($instance['text']);
?>

		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>

		<?php /*?><p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs'); ?></label></p><?php */?>
<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		//$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}
}
?>