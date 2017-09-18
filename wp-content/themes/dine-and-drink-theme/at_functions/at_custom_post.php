<?php 

//////Slider custom post
add_action('init', 'add_post_type',0);
function add_post_type()
{

register_post_type(
	'slider',
	array(
		'labels' => array(
			'name' => __('Slider', 'default'),
			'singular_name' => __('Slider', 'default'),
			'add_new' => __('Add New', 'default'),
			'edit_item' => __('Edit Slider', 'default'), 
			'add_new_item' => __('Add New Slider', 'default')
		),
	'supports' => array('title','editor','custom-fields','thumbnail'),
	'public' => true,
	'show_ui' => true,
	'exclude_from_search' => false, 
	'rewrite' => array('slug' => 'slider', 'with_front' => false),
    'menu_position' => 5
	) 
);


register_post_type(
	'menu',
	array(
		'labels' => array(
			'name' => __('Food Menu', 'default'),
			'singular_name' => __('Food Menu', 'default'),
			'add_new' => __('Add New', 'default'),
			'edit_item' => __('Edit Food Menu', 'default'), 
			'add_new_item' => __('Add New Food Menu', 'default')
		),
	'supports' => array('title','editor','excerpt','thumbnail','custom-fields','post-formats'),
	'public' => true,
	'exclude_from_search' => false, 
	'rewrite' => array('slug' => 'menu', 'with_front' => true),
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 7
	) 
);

register_taxonomy(
	'menu_cat', 'menu',
	array(
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'query_var' => true,
		'show_tagcloud' => true,
		'rewrite' => array('slug' => 'menu-category', 'with_front' => true),
		
		'labels' => array(
		  'name' => __('Food Menu Categories', 'default'),
		  'singular_name' => __('Food Menu Categories', 'default'),
		  'search_items' => __('Search Food Menu Categories', 'default'),
		  'popular_items' => __('Popular Food Menu Categories', 'default'),
		  'all_items' => __('All Menu', 'default'),
		  'parent_item' => __('Parent Food Menu Categories', 'default'),
		  'parent_item_colon' => __('Parent Food Menu Categories', 'default'),
		  'edit_item' => __('Edit Food Menu Category', 'default'),
		  'update_item' => __('Update Food Menu Category', 'default'),
		  'add_new_item' => __('Add New Food Menu Category', 'default'),
		  'new_item_name' => __('New Food Menu Category Name', 'default') 
		),
		
		'label' => __('Food Menu Categories', 'default')
	) 
);

register_taxonomy(
	'menu_tags', 'menu',
	array(
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'query_var' => true,
		'show_tagcloud' => true,
		'rewrite' => array('slug' => 'menu_tags', 'with_front' => false),
		
		'labels' => array(
		  'name' => __('Food Menu Tags', 'default'),
		  'singular_name' => __('Food Menu Tags', 'default'),
		  'search_items' => __('Search Food Menu Tags', 'default'),
		  'popular_items' => __('Popular Food Menu Tags', 'default'),
		  'all_items' => __('All Tags', 'default'),
		  'parent_item' => __('Parent Food Menu Tags', 'default'),
		  'parent_item_colon' => __('Parent Food Menu Tags', 'default'),
		  'edit_item' => __('Edit Food Menu Tags', 'default'),
		  'update_item' => __('Update Food Menu Tags', 'default'),
		  'add_new_item' => __('Add New Food Menu Tags', 'default'),
		  'new_item_name' => __('New Food Menu Tags Name', 'default') 
		),
		
		'label' => __('Food Menu Tags', 'default')
	) 
);  


register_post_type(
	'gallery',
	array(
		'labels' => array(
			'name' => __('Gallery', 'default'),
			'singular_name' => __('Gallery', 'default'),
			'add_new' => __('Add New', 'default'),
			'edit_item' => __('Edit Gallery', 'default'), 
			'add_new_item' => __('Add New Gallery', 'default')
		),
	'supports' => array('title','editor','excerpt','thumbnail','custom-fields','post-formats'),
	'public' => true,
	'exclude_from_search' => false, 
	'rewrite' => array('slug' => 'gallery', 'with_front' => true),
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 7
	) 
);

register_taxonomy(
	'gallery_cat', 'gallery',
	array(
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'query_var' => true,
		'show_tagcloud' => true,
		'rewrite' => array('slug' => 'gallery-category', 'with_front' => true),
		
		'labels' => array(
		  'name' => __('Gallery Categories', 'default'),
		  'singular_name' => __('Gallery Categories', 'default'),
		  'search_items' => __('Search Gallery Categories', 'default'),
		  'popular_items' => __('Popular Gallery Categories', 'default'),
		  'all_items' => __('All Gallery', 'default'),
		  'parent_item' => __('Parent Gallery Categories', 'default'),
		  'parent_item_colon' => __('Parent Gallery Categories', 'default'),
		  'edit_item' => __('Edit Gallery Category', 'default'),
		  'update_item' => __('Update Gallery Category', 'default'),
		  'add_new_item' => __('Add New Gallery Category', 'default'),
		  'new_item_name' => __('New Gallery Category Name', 'default') 
		),
		
		'label' => __('Gallery Categories', 'default')
	) 
);

}

add_action('manage_slider_posts_columns', 'posts_column_slider', 10);
add_action('manage_slider_posts_custom_column', 'posts_custom_column_slider', 10, 2);
function posts_column_slider($defaults){
	
	unset($defaults);
	$defaults['cb'] = '<input type="checkbox"/>';
	$defaults['at_thumbnail'] = __('Thumbnail', 'default');
	$defaults['title'] = __('Title', 'default');
    $defaults['author'] = __('Author', 'default');
	$defaults['date'] = __('Date', 'default');
    return $defaults;
}
function posts_custom_column_slider($column_name, $post_id){
    switch($column_name) {
        case 'at_thumbnail':
            if(has_post_thumbnail($post_id)) {
				the_post_thumbnail(array(60,60));
			}
            break;
    }
}

add_action('manage_menu_posts_columns', 'posts_column_menu', 10);
add_action('manage_menu_posts_custom_column', 'posts_custom_column_menu', 10, 2);
function posts_column_menu($defaults){
	
	unset($defaults);
	$defaults['cb'] = '<input type="checkbox"/>';
	$defaults['at_thumbnail'] = __('Thumbnail', 'default');
	$defaults['title'] = __('Title', 'default');
    $defaults['author'] = __('Author', 'default');
    $defaults['at_categories'] = __('Categories', 'default');
    $defaults['at_tags'] = __('Tags', 'default');
	$defaults['date'] = __('Date', 'default');
    return $defaults;
}
function posts_custom_column_menu($column_name, $post_id){
	
    switch($column_name) {
        case 'at_thumbnail':
            if(has_post_thumbnail($post_id)) {
				the_post_thumbnail(array(60,60));
			}
            break;
		case 'at_categories':
			$customtags = wp_get_post_terms( $post_id , 'menu_cat');
			$port_cate = array();
			foreach ($customtags as $tag) 
			{
				array_push($port_cate, '<a href="edit-tags.php?action=edit&taxonomy=menu_cat&tag_ID='.$tag->term_id.'&post_type=menu">'.$tag->name.'</a>');
			}
			$print_cate = implode(', ',$port_cate);
			echo $print_cate == ''? 'Uncategorized' : $print_cate;

			break;
		case 'at_tags':
			$customtags = wp_get_post_terms( $post_id , 'menu_tags');
			$port_tag = array();
			foreach ($customtags as $tag) 
			{
				array_push($port_tag, '<a href="edit-tags.php?action=edit&taxonomy=menu_tags&tag_ID='.$tag->term_id.'&post_type=menu">'.$tag->name.'</a>');
			}
			
			$print_cate = implode(', ',$port_tag);
			echo $print_cate == ''? 'No Tags' : $print_cate;

			break;
    }
}

/*add_action('manage_testimonials_posts_columns', 'posts_column_testimonials', 10);
function posts_column_testimonials($defaults){
	
	unset($defaults);
	$defaults['cb'] = '<input type="checkbox"/>';
	$defaults['title'] = __('Title', 'default');
    $defaults['author'] = __('Author', 'default');
	$defaults['date'] = __('Date', 'default');
    return $defaults;
}
*/
?>