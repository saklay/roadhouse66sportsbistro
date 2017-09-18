<?php
class AT_home_gallery_widget extends WP_Widget{
	// Constructor //
	public function __construct() {
		
		parent::__construct(
	 		'AT_home_gallery_widget', // Base ID
			'AT - Home Gallery', // Name
			array('description' => __('Show Photo Gallery (this widget use only on Home Area)', 'default'),
					'classname' => 'AT_home_gallery_widget') // Args
		);
	}
	
	// Extract Args //

	public function widget($args, $instance) {
		extract($args);
		//$title = apply_filters('widget_title', $instance['title']);
		
		echo $before_widget;
		?>
        
       	<div class="home-gallery-wrap">
            <div class="row-fluid">
            <?php
         	global $query_string;
			parse_str($query_string, $args);
			
			$args = array('post_type' => 'gallery', 'orderby' => 'name', 'post__in' => array($instance['post']));
			query_posts($args);
			$cnt = 0;
			if (have_posts()) : while (have_posts()) : the_post();
					   ?>
                <div class="home-gallery-content">
                    <div class="widget_title_ribbon"><i class="icon-camera-retro"></i></div>
                    <h3 class="home-gallery-title">
                       <a href="<?php the_permalink();?>"><?php  the_title();?></a>
                    </h3>
                    <div class="home-gallery-excerpt">
                       <?php  the_excerpt();?>
                    </div><!--home-gallery-excerpt-->
                </div><!--home-gallery-content-->
                
                <div class="home-gallery-image-row">
                <?php
         $attachments = get_children( array(
													'post_parent' => get_the_ID(),
													'numberposts' => '-1',
													'post_status' => 'inherit',
													'post_type' => 'attachment',
													'post_mime_type' => 'image',
													'orderby' => 'menu_order ID',
													'posts_per_page' => '4',
													'order' => 'ASC'
												) );
													 
		?>
        <?php if(!empty($attachments)){
								  foreach ( $attachments as $attachment_id => $attachment) {?>
                        <div class="home-gallery-image">
                            <a href="<?php  echo wp_get_attachment_url( $attachment_id); ?>">
                            <?php
							
									echo wp_get_attachment_image($attachment_id, 'gallery-thumb-2'); 
								 
							?>
                            </a>
                        </div>
          <?php  }
							 }?>
                    </div><!--home-gallery-image-row-->
    <?php $cnt++; endwhile; endif;?>
            </div><!--row-fluid-->
        </div><!--home-gallery-wrap-->
        
         <script type="text/javascript">
		jQuery(function() {
			jQuery(".home-gallery-wrap a[href$='.jpg']").lightBox({
				imageLoading:			'<?php echo _IMG; ?>lightbox-ico-loading.gif',		// (string) Path and the name of the loading icon
				imageBtnPrev:			'<?php echo _IMG; ?>lightbox-btn-prev.gif',			// (string) Path and the name of the prev button image
				imageBtnNext:			'<?php echo _IMG; ?>lightbox-btn-next.gif',			// (string) Path and the name of the next button image
				imageBtnClose:		'<?php echo _IMG; ?>lightbox-btn-close.gif',		// (string) Path and the name of the close btn
				imageBlank:				'<?php echo _IMG; ?>lightbox-blank.gif',	
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
		
		if (isset($instance['post'])) {
			$post = $instance['post'];
		}
		else {
			$post = "";
		}
		
		
		?>
		<?php /*?><p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title :', 'default'); ?></label> 
        </p>
        <p>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p><?php */?>
        <p>
        <?php 
			global $query_string;
			parse_str($query_string, $args);
			$args = array('post_type' => 'gallery', 'orderby' => 'name');
			query_posts($args);
					?>
		<select name="<?php echo $this->get_field_name('post'); ?>">
        	<option value="-1">Please Select</option>
        	<?php if (have_posts()) : while (have_posts()) : the_post();?>
		  	<option value="<?php the_ID()?>"  <?php selected($post, get_the_ID()); ?>><?php echo get_the_title();?></option>
            <?php endwhile; endif;?>
          
        </select>
        </p>
		<?php 
	}

	public function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = array();
		$instance['post'] = strip_tags($new_instance['post']);


		return $instance;
	}
}
?>