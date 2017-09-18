<!-- begin sidebar -->
<div id="sidebar">

<ul>
 <li id="search">
   <label for="s"><?php _e('Search:', 'default'); ?></label>
   <form id="searchform" method="get" action="<?php  echo home_url(); ?>">
	<div>
		<input type="text" name="s" id="s" size="15" /><br />
		<input type="submit" value="<?php esc_attr_e('Search', 'default'); ?>" />
	</div>
	</form>
 </li>
 <li id="archives"><?php _e('Archives:', 'default'); ?>
	<ul>
	 <?php wp_get_archives('type=monthly'); ?>
	</ul>
 </li>
 
</ul>

</div>
<!-- end sidebar -->
