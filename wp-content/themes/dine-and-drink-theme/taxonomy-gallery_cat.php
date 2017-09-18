<?php get_header(); ?>
<?php  

$term_id = get_query_var('term');			
$cate = get_term_by('slug', $term_id, 'gallery_cat');
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
	'taxonomy'		=> 'gallery_cat',
	'hierarchical'	=> 1,
	'show_option_none' => '',
	'title_li' 			=> ''
);
$categories =  get_categories($args_list);

$cate_slug = get_term_by('id', $cate_id, 'gallery_cat');

?>

<div class="main_container">
<div class="page_title_container">
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="page_title">
          <div class="page_title_ribbon"><i class="icon-food"></i></div>
          <div class="page_title_ribbon_shadow"></div>
          <h1 class="page_title_text"><?php echo single_cat_title();?></h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!--page_title_container-->
<div class="main_container_inner">
<div class="container">
  <div class="row">
    <?php
						global $query_string;
						parse_str($query_string, $args);
						
						$args = array('post_type' => 'gallery',
											'tax_query' => array(
												array(
													'taxonomy' => 'gallery_cat',
													'field' => 'slug',
													'terms' => $cate_slug->slug,
												),
											),
											'posts_per_page' => -1
										 );
						query_posts($args);
						$cnt = 0;
						if (have_posts()) : while (have_posts()) : the_post();
					   ?>
    <div class="span12 page-fullwidth-gallery">
      <h2 class="gallery-title"> <a href="<?php the_permalink();?>">
        <?php  the_title();?>
        </a> </h2>
      <div class="gallery-excerpt">
        <?php  the_excerpt();?>
      </div>
      <div class="gallery_wrap">
        <div class="gallery_row clearfix">
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
          <?php 
									if(!empty($attachments)){
								  		foreach ( $attachments as $attachment_id => $attachment) {?>
          <div class="gallery_box">
            <div class="gallery_image"><a href="<?php  echo wp_get_attachment_url( $attachment_id); ?>"><?php echo wp_get_attachment_image($attachment_id, 'gallery-thumb-1');  ?></a> </div>
            <h5 class="gallery_image_title"> <?php echo apply_filters( 'the_title', $attachment->post_title );?> </h5>
          </div>
          <!--gallery_box-->
          <?php  }
										 }?>
        </div>
        </div>
        <a href="<?php the_permalink();?>" class="readmore">VIEW ALL</a> 
      </div><!--span12 page-fullwidth-gallery-->
      <div class="gallery-divider divider"></div>
      <?php $cnt++; endwhile; endif;?>
    </div>
  </div>
        </div><!--main_container_inner-->
</div><!--main_container-->
<?php get_footer(); ?>
