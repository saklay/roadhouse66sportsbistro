<?php get_header(); ?>
<?php  

$term_id = get_query_var('term');			
$cate = get_term_by('slug', $term_id, 'menu_cat');
if($cate->parent == 0){
	$cate_id =  $cate->term_id;
}else{
	$cate_id = $cate->parent;
}
$cate_name =  $cate->name;

$args_list = array(
	'child_of'     	=> $cate_id,
	'hide_empty'	=> 0,
	'depth' 			=> 1,
	'taxonomy'		=> 'menu_cat',
	'hierarchical'	=> 1,
	'show_option_none' => '',
	'title_li' 			=> ''
);
$categories =  get_categories($args_list);
$catelist = array();
foreach($categories as $category){
	array_push($catelist,$category->term_id);
}
$cate_slug = get_term_by('id', $cate_id, 'menu_cat');


?>



<?php //
//echo single_cat_title();
?>
<div class="main_container food_menu_container">
    <div class="page_title_container">
		<div class="container">
        <div class="row">
            <div class="span12">
                <div class="page_title">
                    <div class="page_title_ribbon"><i class="icon-food"></i></div>
                    <div class="page_title_ribbon_shadow"></div>
                    <h1 class="page_title_text">
                <?php echo single_cat_title();?></h1>
                </div>
             </div>
         </div>
    </div>
	</div><!--page_title_container-->
    <div class="main_container_inner">
    	<div class="container">
        	<div class="row">
            <div class="span12 content">
            <?php
                    global $query_string;
                    parse_str($query_string, $args);
                    
                    $args = array('post_type' => 'menu',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'menu_cat',
                                                'field' => 'id',
                                                'terms' => $catelist
                                            ),
                                        ),
                                        'posts_per_page' => -1
                                     );
                    query_posts($args);
                    $cnt = 0;
                if (	have_posts()) : while (have_posts()) : the_post();
                    if(get_post_meta(get_the_ID(), 'at_recommend', true) == 'true'){
						$cnt++;
					}
				endwhile; endif;
			?>
            <?php if((get_option('at01_food_style') == 1 || get_option('at01_food_style') == 2) && get_option('at01_recommendmenu') == 'true' && $cnt > 0){?>
            <div class="food_menu_recommended clearfix">
                    <div class="row-fluid">
                    <?php
                    $cnt = 0;
                if (	have_posts()) : while (have_posts()) : the_post();
                    if(get_post_meta(get_the_ID(), 'at_recommend', true) == 'true'){
                    ?>
                        <div class="span3">
                        
                        <?php 
                            $showprice = "";
                            if(get_post_meta(get_the_ID(),'at_price',true) == '1'){ ////single price
                                $showprice =  get_post_meta(get_the_ID(), 'at_sprice', true);
                            }else if(get_post_meta(get_the_ID(),'at_price',true) == '2'){
                                $mprice =  get_post_meta(get_the_ID());
								ksort($mprice);
                                foreach($mprice as $key => $val){
                                    if(substr($key,0,26) == 'at_mpriceat01_pricing_name' && get_post_meta(get_the_ID(), $key, true) != ""){
                                        $showprice =  get_post_meta(get_the_ID(), $key, true);
                                        break;
                                    }
                                }
                            }
                        ?>
                            <div class="food-menu-widget food-menu-widget-recommended<?php if($showprice == ""){?> no-price<?php }?>">
                            <div class="food-menu-widget-media">
                                <div class="food-menu-widget-overlay">
                                <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                    <a href="<?php the_permalink(); ?>">
                                <?php }?>
                                    <span class="food-menu-widget-bghover"></span>
                                <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                    </a>
                                <?php }?>
                                </div>
                                <?php the_post_thumbnail('menu-thumb-3'); ?>
                            </div><!--food-menu-widget-media-->
                            <div class="food-menu-title-and-price clearfix">
                            <div class="food-menu-widget-title clearfix">
                                 <div class="food-menu-widget-badge-icon">
                                    <i class="icon-thumbs-up"></i>
                                 </div>
                                 <div class="food-menu-widget-title-text">
                                 <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                    <a href="<?php the_permalink(); ?>">
                                <?php }?>
                                    <?php the_title();?>
                                <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                    </a>
                                <?php }?>
                                </div>
                            </div><!--food-menu-widget-title-->
                            <div class="food-menu-widget-price clearfix">
                                <div class="food-menu-widget-money">
                                    <i class="icon-money"></i>
                                </div>    
                                <div class="food-menu-widget-price-text">
                                <?php echo $showprice;?>
                                </div>
                             </div><!--food-menu-widget-price-->
                        </div><!--food-menu-title-and-price-->
                            </div>
                        </div><!--span3-->
                        <?php if($cnt%4 == 3 && $cnt > 0){?>
                        </div><div class="row-fluid">
                        <?php }?>
                    <?php $cnt++; }?>    
            <?php  endwhile; endif;?>
                    </div><!--row-fluid-->
                </div><!--recommended-->
                <?php }?>
                
                
                <?php 
                
                $taxonomy_terms = get_terms('menu_cat', array(
                    'orderby'    		=> 'name',
                    'hide_empty' 	=> 0,
                    'parent'    		=> $cate_id,
            ));
                $i = 0;
                $foodcatelist = array();
                foreach($taxonomy_terms as $cate){  
                //echo $cate->slug;
                    $foodcatelist[$i] =  $cate->term_id;
                    $i++;
                }
                
                $textfoodcate1 = array();
                $textfoodcate = explode(',', get_option('at01_all_food_cate'.$cate_id));
                $count = count($textfoodcate);
                
                foreach($foodcatelist as $val){
                    $inarray = array_search($val,$textfoodcate);
                    if ($inarray !== FALSE){
                        $textfoodcate1[$inarray] =  $val;
                    }else{
                        $textfoodcate1[$count] =  $val;
                        $count++;
                    }
                }
                ksort($textfoodcate1);
                //print_r($textfoodcate1);
                
                //$textfoodcate1 = array_unique(array_merge($textfoodcate,$foodcatelist));
                ?>
                 <?php if(get_option('at01_food_style') == 2){ ///text list?>
                 <?php
                            
                            
                            $textleft = array();
                            $textright = array();
                            foreach($textfoodcate1 as $cateid){
                                if(get_option('at01_food_menu_side'.$cateid) == 2){////right
                                    array_push($textright,$cateid);
                                }else{ /// left default
                                    array_push($textleft,$cateid);
                                }
                            }
                 ?>
                <div class="food_menu_text_wrap">
                    <div class="row-fluid">
                    	<div class="food_menu_text_table">
                        	<div class="food_menu_text_row">
                    <?php for($i=0;$i<=1;$i++){
                                if($i == 0){
                                    $textarr = $textleft;
                                    $text = 'left';
                                }else if($i == 1){
                                    $textarr = $textright;
                                    $text = 'right';
                                }
                        ?>
                        
                        <div class="span6 food_menu_text_<?php echo $text;?>">
                        <?php
                        foreach($textarr as $textcateid){
                            global $query_string;
                            parse_str($query_string, $args);
                            
                            $args = array('post_type' => 'menu',
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'menu_cat',
                                                        'field' => 'id',
                                                        'terms' => $textcateid
                                                    ),
                                                ),
                                                'posts_per_page' => -1
                                             );
                            //print_r($args);
                            query_posts($args);
                            $cnt = 0;
                            ?>
                            <div class="food_menu_text_category_wrap">
                                <h3 class="food_menu_catagory_name">
                                <?php $textcate = get_term_by('id', $textcateid, 'menu_cat');
                                            echo $textcate->name;
                                ?>
                                </h3>
                                
                            <?php if (have_posts()) : while (have_posts()) : the_post();?>
                                <div class="food_menu_text clearfix">
                                    <?php 
                                    $badge = get_post_meta(get_the_ID(), 'at_badge', true);
                                    $badge_id = substr($badge,9,strlen($badge));
                                    
                                    if(get_post_meta($post->ID, 'at_recommend', TRUE) == 'true' || get_option('at01_badge_icon'.$badge_id) != ""){?>
                                    <div class="food_menu_text_badge">
                                        <?php if(get_post_meta($post->ID, 'at_recommend', TRUE) == 'true'){ ?>
                                        <div class="food-menu-widget-badge-icon">
                                        <i class="icon-thumbs-up"></i>
                                        </div>
                                        <?php }?>
                                       <?php if(get_option('at01_badge_icon'.$badge_id) != ""){?>
                                            <div class="food-menu-widget-badge-icon-image">
                                                <img src="<?php echo get_option('at01_badge_icon'.$badge_id);?>" alt="<?php echo $badge_id;?>" />
                                            </div>
                                        <?php }?>
                                    </div>
                                    <?php }?>
                                    <div class="food_menu_text_name_desc
                                    <?php  if(get_post_meta(get_the_ID(),'at_price',true) == '1'){ ////single price ?> single_price<?php } ?> 
                                    <?php  if(get_post_meta(get_the_ID(),'at_price',true) == '2'){ ////single price ?> multi_price<?php } ?> 
                                     <?php if(get_the_excerpt() == ""){?> no_desc<?php } ?>
                                    ">
                                        <div class="food_menu_text_name">
                                            
                                         <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                            <a href="<?php the_permalink(); ?>">
                                        <?php }?>
                                            <?php the_title();?>
                                        <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                            </a>
                                        <?php }?>
                                        </div>
                                        <?php if(get_the_excerpt() != ""){?>
                                            <div class="food_menu_text_desc">
                                               <?php the_excerpt();?>
                                            </div>
                                        <?php }?>
                                    </div>
                                    
                                    <?php 
                                        if(get_post_meta(get_the_ID(),'at_price',true) == '1'){ ////single price ?>
                                    <div class="food_menu_text_price single_price">
                                        <?php echo get_post_meta(get_the_ID(), 'at_sprice', true);?>
                                        <br />
                                    </div>
                                    <?php	}else if(get_post_meta(get_the_ID(),'at_price',true) == '2'){ ?>
                                    <div class="food_menu_text_price multi_price">
                                        <?php 
                                        $all_options = wp_load_alloptions();
                                          ksort($all_options);
                                          foreach( $all_options as $name => $value ) {
                                            if (strpos($name, 'at01_pricing_name') === 0) {
                                                $mprice_option = get_post_meta(get_the_ID(), 'at_mpriceat01_pricing_name'.substr($name,17,strlen($name)-17), true);
                                                if($mprice_option != ""){
                                                    echo '<span class="food_menu_price_name">'.get_option($name).'
                                                    </span><span class="food_menu_price_number">'.$mprice_option.'</span><br />';
                                                }
                                            }
                                        }
                                        ?>
                                        
                                    </div>
                                    <?php } ?>
                                </div><!--food_menu_text-->
                                <?php endwhile; endif;?>
                            </div><!--food_menu_text_category_wrap-->
                         <?php }?>
                        </div><!--span6-->
                        <?php } ///end for($i?>
                        	</div>
                    	</div>
                    </div>
                </div>
                <?php }else if(get_option('at01_food_style') == 1){ /// image+test list?>
                <div class="food_menu_sticky">
                    <div class="nav-container">
                            <nav>
                                <ul>
                                <?php 
                                    foreach($textfoodcate1 as $cateid){
                                        $textcate = get_term_by('id', $cateid, 'menu_cat');
                                        ?>
                                    <li><a href="#chapter-<?php echo $cateid;?>"><?php echo $textcate->name;?></a></li>
                                 <?php }?>
                                </ul>
                            </nav>
                        </div>
                </div><!--food_menu_sticky-->
                <?php
                        foreach($textfoodcate1 as $textcateid){
                            global $query_string;
                            parse_str($query_string, $args);
                            
                            $args = array('post_type' => 'menu',
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'menu_cat',
                                                        'field' => 'id',
                                                        'terms' => $textcateid
                                                    ),
                                                ),
                                                'posts_per_page' => -1
                                             );
                            //print_r($args);
                            query_posts($args);
                            $cnt = 0;
                            $textcate = get_term_by('id', $textcateid, 'menu_cat');
                            ?>
                <section id="chapter-<?php echo $textcateid;?>">
                         <div class="food_menu_small_image_wrap">
                        <div class="food_menu_small_image_category_wrap">
                        <h3 class="food_menu_catagory_name">
                            <?php echo $textcate->name;?>
                        </h3>
                        <?php if (have_posts()) : while (have_posts()) : the_post();?>
                        <div class="food_menu_small_image clearfix">
                            <div class="row-fluid">
                            <?php if(has_post_thumbnail()){?>
                               <div class="food_menu_small_image_thumbnail">
                                    <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                        <a href="<?php the_permalink(); ?>">
                                    <?php }?>
                                        <?php the_post_thumbnail('menu-thumb-4'); ?>
                                    <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                        </a>
                                    <?php }?>
                                </div>
                             <?php }?>
                                
                                <?php 
                                    $badge = get_post_meta(get_the_ID(), 'at_badge', true);
                                    $badge_id = substr($badge,9,strlen($badge));
                                    
                                    if(get_post_meta($post->ID, 'at_recommend', TRUE) == 'true' || get_option('at01_badge_icon'.$badge_id) != ""){?>
                                    <div class="food_menu_small_image_badge">
                                        <?php if(get_post_meta($post->ID, 'at_recommend', TRUE) == 'true'){ ?>
                                        <div class="food-menu-widget-badge-icon
                                        <?php if(get_option('at01_badge_icon'.$badge_id) == ""){?> no-image-icon<?php } ?>
                                        ">
                                        	<i class="icon-thumbs-up"></i>
                                        </div>
                                        <?php }?>
                                       <?php if(get_option('at01_badge_icon'.$badge_id) != ""){?>
                                            <div class="food-menu-widget-badge-icon-image">
                                                <img src="<?php echo get_option('at01_badge_icon'.$badge_id);?>"  alt="<?php echo $badge_id;?>"/>
                                            </div>
                                        <?php }?>
                                    </div>
                                    <?php }?>
                             
                                <div class="food_menu_small_image_name_desc
                                 <?php  if(get_post_meta(get_the_ID(),'at_price',true) == '1'){ ////single price ?> single_price<?php } ?> 
								<?php  if(get_post_meta(get_the_ID(),'at_price',true) == '2'){ ////single price ?> multi_price<?php } ?> 
                                <?php if(!has_post_thumbnail()){?>no_thumbnail<?php }?>
                                <?php if(get_the_excerpt() == ""){?> no_desc<?php } ?>
                                <?php if(get_post_meta($post->ID, 'at_recommend', TRUE) == 'false' & get_option('at01_badge_icon'.$badge_id) == ""){?> no_icon<?php } ?>
                                ">
                                   
                                    <div class="food_menu_small_image_name">
                                        <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                            <a href="<?php the_permalink(); ?>">
                                        <?php }?>
                                            <?php the_title();?>
                                         <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                            </a>
                                        <?php }?>
                                    </div>
                                    <?php if(get_the_excerpt() != ""){?>
                                        <div class="food_menu_small_image_desc">
                                             <?php the_excerpt();?>
                                        </div>
                                    <?php } ?>
                                </div><!--food_menu_small_image_name_desc-->
                                <?php 
                                        if(get_post_meta(get_the_ID(),'at_price',true) == '1'){ ////single price ?>
                                    <div class="food_menu_small_image_price single_price" >
                                        <?php echo get_post_meta(get_the_ID(), 'at_sprice', true);?>
                                        <br />
                                    </div><!--food_menu_small_image_price-->
                                    <?php	}else if(get_post_meta(get_the_ID(),'at_price',true) == '2'){ ?>
                                   <div class="food_menu_small_image_price multi_price">
                                        <?php 
                                        $all_options = wp_load_alloptions();
                                          ksort($all_options);
                                          foreach( $all_options as $name => $value ) {
                                            if (strpos($name, 'at01_pricing_name') === 0) {
                                                $mprice_option = get_post_meta(get_the_ID(), 'at_mpriceat01_pricing_name'.substr($name,17,strlen($name)-17), true);
                                                if($mprice_option != ""){
                                                    echo '<span class="food_menu_price_name">'.get_option($name).'
                                                    </span><span class="food_menu_price_number">'.$mprice_option.'</span><br />';
                                                }
                                            }
                                        }
                                        ?>
                                        
                                    </div><!--food_menu_small_image_price-->
                                    <?php } ?>
                            </div><!--row-fluid-->
                        </div><!--food_menu_small_image-->
                        <?php endwhile; endif;?>
                                
                    </div><!--food_menu_small_image_category_wrap-->
                        </div>
                    </section>
                    <?php }?>
                <?php }else if(get_option('at01_food_style') == 3){ /// image list?>
                <div id="isotope-filter">
                    <ul id="filters" class="option-set"  data-option-key="filter">
                    <li><a href="#filter" data-option-value=".recommend">Recommend</a></li>
                        <?php 
                        $count = 1;
                            foreach($textfoodcate1 as $cateid){
                                $textcate = get_term_by('id', $cateid, 'menu_cat');
                                if($count == 1) $first = $textcate->slug;
                                
                        ?>
                        <li><a href="#filter" data-option-value=".<?php echo $textcate->slug; ?>" <?php if($count == 1){?> class="active"<?php }?>><?php echo $textcate->name; ?></a></li>
                        <?php $count++; }?>
                    </ul>
                </div>
                <div class="row isotope_container" id="isotope">
                <?php
                        foreach($textfoodcate1 as $textcateid){
                            global $query_string;
                            parse_str($query_string, $args);
                            
                            $args = array('post_type' => 'menu',
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'menu_cat',
                                                        'field' => 'id',
                                                        'terms' => $textcateid
                                                    ),
                                                ),
                                                'posts_per_page' => -1
                                             );
                            //print_r($args);
                            query_posts($args);
                            $cnt = 0;
                            $textcate = get_term_by('id', $textcateid, 'menu_cat');
                            ?>
                  <?php if (have_posts()) : while (have_posts()) : the_post();
                  ?>    
                 <div class="<?php if(get_post_meta(get_the_ID(), 'at_recommend', true) == 'true'){?>span4 recommend<?php }else{?>span2<?php }?> <?php echo $textcate->slug; ?> isotope-item">
                 
                 
                    <?php 
                        $showprice = "";
                        if(get_post_meta(get_the_ID(),'at_price',true) == '1'){ ////single price
                            $showprice =  get_post_meta(get_the_ID(), 'at_sprice', true);
                        }else if(get_post_meta(get_the_ID(),'at_price',true) == '2'){
                            $mprice =  get_post_meta(get_the_ID());
                            foreach($mprice as $key => $val){
                                if(substr($key,0,26) == 'at_mpriceat01_pricing_name' && get_post_meta(get_the_ID(), $key, true) != ""){
                                    $showprice =  get_post_meta(get_the_ID(), $key, true);
                                    break;
                                }
                            }
                        }
                    ?>
                    <div class="isotope-food food-menu-widget<?php if($showprice == ""){?> no-price<?php }?>">
                        <div class="food-menu-widget-media">
                            <div class="food-menu-widget-overlay">
                            <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                <a href="<?php the_permalink(); ?>">
                            <?php }?>
                                <span class="food-menu-widget-bghover"></span>
                             <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                </a>
                            <?php }?>
                            </div>
                            <?php the_post_thumbnail('menu-thumb-3'); ?>
                        </div><!--food-menu-widget-media-->
                        <div class="food-menu-title-and-price clearfix">
                                <div class="food-menu-widget-title clearfix">
                                     <div class="food-menu-widget-badge-icon">
                                        <i class="icon-thumbs-up"></i>
                                     </div>
                                     <div class="food-menu-widget-title-text">
                                      <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                            <a href="<?php the_permalink(); ?>">
                                    <?php }?>
                                        <?php the_title();?>
                                    <?php if(get_post_meta(get_the_ID(), 'at_foodlink', TRUE) != 'false'){?>
                                            </a>
                                        <?php }?>
                                    </div>
                                </div><!--food-menu-widget-title-->
                                <div class="food-menu-widget-price clearfix">
                                    <div class="food-menu-widget-money">
                                        <i class="icon-money"></i>
                                    </div>    
                                    <div class="food-menu-widget-price-text"><?php echo $showprice;?></div>
                                 </div><!--food-menu-widget-price-->
                              </div><!--food-menu-title-and-price-->
                    </div><!--isotope-food food-menu-widget-->
                </div><!--isotope-item--> 
                

                <?php endwhile; endif;?>
                <?php }?>       
                        
            </div><!--row-->
            <script>
                jQuery(function($){
                  
                  var $container = $('#isotope');
            
                  $container.isotope({
                    //itemSelector : '.cate-4'
                    filter: '.<?php echo $first;?>',
                    masonry: {
                      }
                  });
                  
                  
                  var $optionSets = $('#isotope-filter .option-set'),
                      $optionLinks = $optionSets.find('a');
            
                  $optionLinks.click(function(){
                    var $this = $(this);
                    // don't proceed if already selected
                    if ( $this.hasClass('active') ) {
                      return false;
                    }
                    var $optionSet = $this.parents('.option-set');
                    $optionSet.find('.active').removeClass('active');
                    $this.addClass('active');
              
                    // make option object dynamically, i.e. { filter: '.my-filter-class' }
                    var options = {},
                        key = $optionSet.attr('data-option-key'),
                        value = $this.attr('data-option-value');
                    // parse 'false' as false boolean
                    value = value === 'false' ? false : value;
                    options[ key ] = value;
                    if ( key === 'layoutMode' && typeof changeLayoutMode == 'function' ) {
                      // changes in layout modes need extra logic
                      changeLayoutMode( $this, options )
                    } else {
                      // otherwise, apply new options
                      $container.isotope( options );
                    }
                    
                    return false;
                  });
            
                  
                });
                  
              </script>
            

                <?php }?>
                
        </div>
        </div><!--row-->
    	</div><!--container-->
    </div><!--main_container_inner-->
</div><!--main_container-->
<?php get_footer(); ?>
