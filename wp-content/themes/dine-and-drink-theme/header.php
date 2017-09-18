<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" dir="ltr" lang="en-US"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" dir="ltr" lang="en-US"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" dir="ltr" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes('html'); ?>> <!--<![endif]-->
<head>
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<title>
<?php wp_title('|', true, 'right'); ?>
<?php bloginfo('name'); ?>
</title>
<link rel="shortcut icon" href="<?php echo get_option('at01_favicon_url');?>" />
<link rel="stylesheet" href="<?php echo bloginfo('stylesheet_url').'?'.filemtime(get_stylesheet_directory().'/style.css'); ?>" type="text/css" />
<?php
if (have_posts()){
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id);
	$image_url = $image_url[0];
	?>
<meta property="og:image" content="<?php echo $image_url;?>" />
<?php }?>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<?php echo get_option('at01_tracking'); ?>
<?php wp_head(); ?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		//jQuery(".main_container").find("img").css({opacity: 0, display: "none"});
		jQuery(".main_container").find("img").before('<i class="at-loading icon-spinner icon-spin"></i>');
		jQuery(".main_container").krioImageLoader();
		
		//jQuery(".home_slider_container").find("img").css({opacity: 0, display: "none"});
		jQuery(".home_slider_container").find("img").before('<i class="at-loading icon-spinner icon-spin"></i>');
		jQuery(".home_slider_container").krioImageLoader();
		
	
	});
</script>
</head>
<body <?php body_class(); ?>>
<div class="wrapper">
  <div class="header_mainmenu clearfix<?php if(get_option("at01_logo_position") == 1){?> logo_above_menu<?php }else if(get_option("at01_logo_position") == 2){ if(get_option("at01_logo_position_overlap") == 1){?> logo_overlap_menu_left<?php }else if(get_option("at01_logo_position_overlap") == 2){?> logo_overlap_menu_center<?php }else if(get_option("at01_logo_position_overlap") == 3){?> logo_overlap_menu_right<?php } }?>">
    <header class="header">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="header_logo">
              <?php if(get_option('at01_logo_url') != ''){?>
              <a href="<?php echo home_url(); ?>"><img src="<?php echo get_option('at01_logo_url'); ?>" alt="logo" /></a>
              <?php }?>
            </div>
            <!--header_logo-->
            <?php if(get_option('at01_reservation_text') != ""){?>
            <div class="header_reservation"> 
            	<a href="<?php echo get_option('at01_reservation_url');?>"><?php echo get_option('at01_reservation_text');?> </a>
                <div class="header_reservation_triangle"></div>
            </div>
            <?php }?>
            <div class="header_social <?php if(get_option('at01_reservation_text') == ""){?>no_header_reservation<?php } ?>">
              <ul class="header_social_icon_list">
                <?php if(get_option('at01_sociallink_fb') != ""){?>
                <li class="header_social_facebook header_social_icon"><a href="<?php echo get_option('at01_sociallink_fb');?>" target="_blank"><i class="icon-facebook"></i></a></li>
                <?php }?>
                <?php if(get_option('at01_sociallink_tw') != ""){?>
                <li class="header_social_twitter header_social_icon"><a href="<?php echo get_option('at01_sociallink_tw');?>" target="_blank"><i class="icon-twitter"></i></a></li>
                <?php }?>
                <?php if(get_option('at01_sociallink_gplus') != ""){?>
                <li class="header_social_google_plus header_social_icon"><a href="<?php echo get_option('at01_sociallink_gplus');?>" target="_blank"><i class="icon-google-plus"></i></a></li>
                <?php }?>
                <?php if(get_option('at01_sociallink_linkedin') != ""){?>
                <li class="header_social_linkedin header_social_icon"><a href="<?php echo get_option('at01_sociallink_linkedin');?>" target="_blank"><i class="icon-linkedin"></i></a></li>
                <?php }?>
                <?php if(get_option('at01_sociallink_pinterest') != ""){?>
                <li class="header_social_pinterest header_social_icon"><a href="<?php echo get_option('at01_sociallink_pinterest');?>" target="_blank"><i class="icon-pinterest"></i></a></li>
                <?php }?>
                <?php if(get_option('at01_sociallink_dribbble') != ""){?>
                <li class="header_social_dribbble header_social_icon"><a href="<?php echo get_option('at01_sociallink_dribbble');?>" target="_blank"><i class="icon-dribbble"></i></a></li>
                <?php }?>
                <?php if(get_option('at01_sociallink_tumblr') != ""){?>
                <li class="header_social_tumblr header_social_icon"><a href="<?php echo get_option('at01_sociallink_tumblr');?>" target="_blank"><i class="icon-tumblr"></i></a></li>
                <?php }?>
                <?php if(get_option('at01_sociallink_youtube') != ""){?>
                <li class="header_social_youtube header_social_icon"><a href="<?php echo get_option('at01_sociallink_youtube');?>" target="_blank"><i class="icon-youtube"></i></a></li>
                <?php }?>
                <?php if(get_option('at01_sociallink_instagram') != ""){?>
                <li class="header_social_instagram header_social_icon"><a href="<?php echo get_option('at01_sociallink_instagram');?>" target="_blank"><i class="icon-instagram"></i></a></li>
                <?php }?>
                <?php if(get_option('at01_sociallink_flickr') != ""){?>
                <li class="header_social_flickr header_social_icon"><a href="<?php echo get_option('at01_sociallink_flickr');?>" target="_blank"><i class="icon-flickr"></i></a></li>
                <?php }?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!--header-->
    <?php 
					if(has_nav_menu('header-menu')){
						?>
    <div class="main_menu">
      <div class="container">
        <div class="row">
          <div class="span12">
                <?php
				if(get_option("at01_logo_position") == 2 && get_option("at01_logo_position_overlap") == 2){ /// logo at center
					$menu_name = 'header-menu';
					$locations = get_nav_menu_locations();
					$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
					$menu_item = wp_get_nav_menu_items($menu->term_id);
					$menu_count = 0;
					foreach($menu_item as $val){
						if($val->menu_item_parent == 0){
							//echo $val->title;
							$menu_count++;
						}
					}
					$menu_center_item = ceil($menu_count/2);
					wp_nav_menu(array(
								  'theme_location' => 'header-menu', // your theme location here
								  'walker'         => new Walker_Nav_Menu_Split(),
								  'items_wrap'     => '<ul class="nav sf-menu sf-js-enabled sf-shadow menu_left">%3$s</ul>',
								  'itemcount'	=> 0,
								  'itemcenter' => $menu_center_item
								));
				}else{
					wp_nav_menu(array('theme_location' => 'header-menu', 'depth' => 3,'menu_class'=>'nav sf-menu sf-js-enabled sf-shadow'));	
				}
				?>
          </div>
        </div>
      </div>
      <!--main_menu container-->
    </div>

    <div class="main_menu_dropdown">
  
 	<a id="touch-menu" class="mobile-menu" href="#"><i class="icon-reorder"></i></a>
    <nav>
    <?php wp_nav_menu(array('theme_location' => 'header-menu', 'depth' => 3,'menu_class'=>'responsive_menu')); ?>
    <?php /*?><ul class="menu">
   <li><a href="#"><i class="icon-home"></i>HOME</a>
   <ul class="sub-menu">
   <li><a href="#">Sub-Menu 1</a></li>
   <li><a href="#">Sub-Menu 2</a></li>
   <li><a href="#">Sub-Menu 3</a></li>
   </ul>
   </li>
  <li><a  href="#"><i class="icon-user"></i>ABOUT</a></li>
  <li><a  href="#"><i class="icon-camera"></i>PORTFOLIO</a>
  <ul class="sub-menu">
   <li><a href="#">Sub-Menu 1</a></li>
   <li><a href="#">Level 3 Menu</a>
    <ul>
    <li><a href="#">Sub-Menu 4</a></li>
   	<li><a href="#">Sub-Menu 5</a></li>
	<li><a href="#">Sub-Menu 6</a></li>
    </ul>
   </li>
   </ul>
  </li>
  <li><a  href="#"><i class="icon-bullhorn"></i>BLOG</a></li>
  <li><a  href="#"><i class="icon-envelope-alt"></i>CONTACT</a></li>
  </ul><?php */?>
  </nav>
      
    </div>
    <?php
					}//end if has_nav_menu('header-menu')
					?>
  </div><!--header_mainmenu-->

<?php if(is_home() || is_front_page()){?>
<?php if(get_option('at01_slider') == 'true'){
					$autoplay = get_option('at01_slider_auto_play');
					$speed = get_option('at01_slider_auto_play_ms') != '' && get_option('at01_slider_auto_play_ms') != 0 ? get_option('at01_slider_auto_play_ms') : 4000;
			?>
<div class="home_slider_container<?php if(get_option("at01_slider_overlapse") == "true"){?> home_move_up<?php }?>">
<div class="flexslider">
  <ul class="slides">
  <?php query_posts(array('post_type' => 'slider','posts_per_page' => -1, 'paged' => get_query_var('paged')));?>
  <?php if (have_posts()) : while (have_posts()) : the_post();?>
    <li> 
	<?php $at_slider_buttonlink = get_post_meta(get_the_ID(), 'at_slider_buttonlink',true); ?>
    <?php if($at_slider_buttonlink != ""){?>
    	<a href="<?php echo $at_slider_buttonlink; ?>">
    <?php } ?>
    	<?php the_post_thumbnail();?>
    <?php if($at_slider_buttonlink != ""){?>
    	</a>
    <?php }?>
    <?php if(get_the_title() != "" or get_the_content() != ""){?>
      <div class="flex-caption-wrap">
        <div class="flex-caption">
          <div class="flex-title">
          <?php if($at_slider_buttonlink != ""){?>
        <a href="<?php echo $at_slider_buttonlink; ?>">
        <?php }?>
        <?php the_title();?>
        <?php if($at_slider_buttonlink != ""){?>
        </a>
        <?php }?>
          </div>
          <div class="flex-desc">
            <?php the_content();?>
          </div>
        </div>
      </div>
     <?php }?>
    </li>
     <?php	endwhile; endif; ?>
  </ul>
  
  <?php 
  $auto_port = get_option("at01_slider_auto_play");
  $speed = get_option('at01_slider_auto_play_ms') != '' && get_option('at01_slider_auto_play_ms') != 0 ? get_option('at01_slider_auto_play_ms') : 4000;?>
<script type="text/javascript">
jQuery(window).load(function() {
	 jQuery('body').addClass('loading');
	 jQuery('.flexslider').flexslider({
		  animation: "fade",
		  slideshowSpeed: <?php echo $speed;?>,
		  slideshow: <?php echo $autoplay;?>,
		  easing: "swing", 
		  pauseOnHover: true,
		  start: function(slider){
			jQuery('body').removeClass('loading');
		  }
	});
});
</script>
</div>
</div>
<?php }?>
<?php }?>
<!-- end header -->