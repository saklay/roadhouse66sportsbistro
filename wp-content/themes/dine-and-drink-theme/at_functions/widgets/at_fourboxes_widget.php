<?php
class AT_fourboxes_widget extends WP_Widget{
	// Constructor //
	
	public function __construct() {
		
		parent::__construct(
	 		'AT_fourboxes_widget', // Base ID
			'AT - 4 Boxes', // Name
			array('description' => __('Boxes with Image Icon, Title and Description', 'default'),
					'classname' => 'AT_fourboxes_widget') // Args
		);
	}
	
	// Extract Args //

	public function widget($args, $instance) {
		extract($args);
		//$title = apply_filters('widget_title', $instance['title']);
		echo $before_widget;
		?>
            <div class="teaser_box_wrapper clearfix">
            	<div class="row-fluid">
                    <?php for($i=1;$i<=4;$i++){
						 if($instance['box'.$i.'_enable'] == 'on'){
						?>
                        <div class="teaser_box span3">
                   
                        	<?php if($instance['box'.$i.'_icon'] != ""){?>
                            	<div class="teaser_icon_title">
                                    <a href="<?php echo $instance['box'.$i.'_link']; ?>">
                                        <img src="<?php echo $instance['box'.$i.'_icon']; ?>" alt="box<?php echo $i;?>_icon" />
                                    </a>
                                </div><!--teaser_icon_title-->
                            <?php }?>
                            <h3 class="teaser_title">
                            	<a href="<?php echo $instance['box'.$i.'_link']; ?>"><?php echo $instance['box'.$i.'_title']; ?></a>
                            </h3><!--teaser_title-->
                            
                            <div class="teaser_desc">
                                <?php echo $instance['box'.$i.'_description']; ?>
                            </div><!--teaser_desc-->
                            <?php if( $instance['box'.$i.'_linkname'] != ""){?>
                            <?php }?>
                        </div><!--teaser_box-->
                        <?php }///end if?>
                     <?php }?>
               </div><!--row-fluid-->
           </div><!--teaser_box_wrapper-->
         <?php echo $after_widget;?>
		<?php
	}
	
	public function form($instance) {
		
		?>
        
        <?php 
		$arr_title = array('','Great Wines','Fancy Food','Special Cakes','Professional Chef');
		$arr_img = array('','teaser_01.png','teaser_02.png','teaser_03.png','teaser_04.png');
		for($i=1;$i<=4;$i++){
				
				if (isset($instance['box'.$i.'_enable'])) {
					$enable[$i] = $instance['box'.$i.'_enable'];
				}
				else {
					$enable[$i] = 'on';
				}
				if (isset($instance['box'.$i.'_title'])) {
					$title[$i] = $instance['box'.$i.'_title'];
				}
				else {
					$title[$i] = $arr_title[$i];
				}
				if (isset($instance['box'.$i.'_description'])) {
					$description[$i] = $instance['box'.$i.'_description'];
				}
				else {
					$description[$i] = 'Lorem ipsum dolor sit amet, adipiscing amet tincid ut lamet aoreet amet dolore magna aliquam erat volutpat.';
				}
				if (isset($instance['box'.$i.'_icon'])) {
					$icon[$i] = $instance['box'.$i.'_icon'];
				}
				else {
					$icon[$i] = _IMG.$arr_img[$i];
				}
				if (isset($instance['box'.$i.'_linkname'])) {
					$linkname[$i] = $instance['box'.$i.'_linkname'];
				}
				else {
					$linkname[$i] = 'Readmore';
				}
				if (isset($instance['box'.$i.'_link'])) {
					$link[$i] = $instance['box'.$i.'_link'];
				}
				else {
					$link[$i] = '#';
				}
			
			?>
        	<p><strong>Box <?php echo $i;?></strong></p>
            <p>
		<label for="<?php echo $this->get_field_id('box'.$i.'_enable'); ?>">
		<input id="<?php echo $this->get_field_id('box'.$i.'_enable'); ?>" name="<?php echo $this->get_field_name('box'.$i.'_enable'); ?>" type="checkbox" <?php if(esc_attr($enable[$i]) == 'on'){?> checked="checked" <?php }?> /> <?php _e('Enable Box ', 'default'); ?><?php echo $i; ?></label> 
		</p>
        <p>
            <label for="<?php echo $this->get_field_id('box'.$i.'_title'); ?>"><?php _e('Title :', 'default'); ?></label> 
            <input id="<?php echo $this->get_field_id('box'.$i.'_title'); ?>" name="<?php echo $this->get_field_name('box'.$i.'_title'); ?>" type="text" value="<?php echo esc_attr($title[$i]); ?>" />
            </p>
         <p>
            <label for="<?php echo $this->get_field_id('box'.$i.'_icon'); ?>"><?php _e('Icon URL :', 'default'); ?></label> 
            <input id="<?php echo $this->get_field_id('box'.$i.'_icon'); ?>" name="<?php echo $this->get_field_name('box'.$i.'_icon'); ?>" type="text" value="<?php echo esc_attr($icon[$i]); ?>" />
            </p>
            
            <p>
            <label for="<?php echo $this->get_field_id('box'.$i.'_description'); ?>"><?php _e('Description :', 'default'); ?></label> 
            <textarea id="<?php echo $this->get_field_id('box'.$i.'_description'); ?>" name="<?php echo $this->get_field_name('box'.$i.'_description'); ?>" cols="30" rows="4"><?php echo esc_attr($description[$i]); ?></textarea>
            </p>
            <?php /*?><p>
            <label for="<?php echo $this->get_field_id('box'.$i.'_linkname'); ?>"><?php _e('Link Text:', 'default'); ?></label> 
            <input id="<?php echo $this->get_field_id('box'.$i.'_linkname'); ?>" name="<?php echo $this->get_field_name('box'.$i.'_linkname'); ?>" type="text" value="<?php echo esc_attr($linkname[$i]); ?>" />
            </p><?php */?>
            <p>
            <label for="<?php echo $this->get_field_id('box'.$i.'_link'); ?>"><?php _e('Link URL :', 'default'); ?></label> 
            <input id="<?php echo $this->get_field_id('box'.$i.'_link'); ?>" name="<?php echo $this->get_field_name('box'.$i.'_link'); ?>" type="text" value="<?php echo esc_attr($link[$i]); ?>" />
            </p>
            <hr />
        <?php }?>
		<?php 
	}

	public function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = array();
		for($i=1;$i<=4;$i++){
			$instance['box'.$i.'_enable'] = strip_tags($new_instance['box'.$i.'_enable']);
			$instance['box'.$i.'_title'] = strip_tags($new_instance['box'.$i.'_title']);
			$instance['box'.$i.'_icon'] = strip_tags($new_instance['box'.$i.'_icon']);
			$instance['box'.$i.'_description'] = strip_tags($new_instance['box'.$i.'_description']);
			$instance['box'.$i.'_link'] = strip_tags($new_instance['box'.$i.'_link']);
			$instance['box'.$i.'_linkname'] = strip_tags($new_instance['box'.$i.'_linkname']);
		}

		return $instance;
	}
}
?>