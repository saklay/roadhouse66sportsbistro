<?php
/*class Walker_Nav_Menu_Dropdown extends Walker_Nav_Menu{
    function start_lvl(&$output, $depth){
      $indent = str_repeat("\t", $depth); // don't output children opening tag (`<ul>`)
    }

    function end_lvl(&$output, $depth){
      $indent = str_repeat("\t", $depth); // don't output children closing tag
    }

    function start_el(&$output, $item, $depth, $args){
      // add spacing to the title based on the depth
      $item->title = str_repeat("&nbsp;", $depth * 4).$item->title;

      parent::start_el(&$output, $item, $depth, $args);

      // no point redefining this method too, we just replace the li tag...
	  $selected = "";
	  if($item->url == 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']){
	  	$selected = 'selected = "selected"';
	  }
      $output = str_replace('<li', '<option value="'.$item->url.'" '.$selected.'', $output);
    }

    function end_el(&$output, $item, $depth){
      $output .= "</option>\n"; // replace closing </li> with the option tag
	  $output = strip_tags($output, '<option>');
    }
	
	
}*/
class Walker_Nav_Menu_Dropdown extends Walker_Nav_Menu{
	var $to_depth = -1;
    function start_lvl(&$output, $depth){
      $output .= '</option>';
    }

    function end_lvl(&$output, $depth){
      $indent = str_repeat("\t", $depth); // don't output children closing tag
    }

    function start_el(&$output, $item, $depth, $args){

		$indent = ( $depth ) ? str_repeat( "&nbsp;", $depth * 4 ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$classes[] = 'menu-item-' . $item->ID;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

		$class_names = ' class="' . esc_attr( $class_names ) . '"';
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );

		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		$value = ' value="'. $item->url .'"';
		$output .= '<option'.$id.$value.$class_names.'>';
		$item_output = $args->before;
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$output .= $indent.$item_output;

    }

    function end_el(&$output, $item, $depth){
		if(substr($output, -9) != '</option>')

      		$output .= "</option>"; // replace closing </li> with the option tag
    }
}


class Walker_Nav_Menu_Split extends Walker_Nav_Menu{
	var $to_depth = -1;
    function start_lvl(&$output, $depth){
		if($depth == 1){
			$output .= '<ul>';
		}else{
			$output .= '<ul class="sub-menu">';
		}
    }

    function end_lvl(&$output, $depth){
		$output .= '</ul>';
		
      //$indent = str_repeat("\t", $depth); // don't output children closing tag
    }

    function start_el(&$output, $item, $depth, $args){

		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$classes[] = 'menu-item-' . $item->ID;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

		$class_names = ' class="' . esc_attr( $class_names ) . '"';
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );

		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		$value = ' href="'. $item->url .'"';
		
		//echo $item->title."-".$item->menu_item_parent."-".$item->menu_order.' + ';
		if($item->menu_item_parent == 0){
			if($args->itemcenter == $args->itemcount){
				$output .= "</ul><ul class='nav sf-menu sf-js-enabled sf-shadow menu_right'>";
			}
			$args->itemcount++;
		}
		
		$output .= '<li'.$id.$class_names.'>';
		$item_output = apply_filters( 'the_title', $item->title, $item->ID );
		$output .= '<a'.$value.'>'.$item_output.'</a>';

    }

    function end_el(&$output, $item, $depth){
		if(substr($output, -9) != '</li>')

      		$output .= "</li>"; // replace closing </li> with the option tag
    }
}
?>