<?php

add_filter('single_template', 'at_single_template');

function at_single_template(){
	if(file_exists(get_template_directory() . '/single-' . get_post_type() . '.php'))
		return get_template_directory() . '/single-' . get_post_type() . '.php';
}
?>