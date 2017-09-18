<?php force_more(); ?>
<?php get_header(); ?>
<div class="main_container <?php if(get_option('at01_blog_style') == 1) { ?>left-sidebar<?php }else if(get_option('at01_blog_style') == 3) {?>no-sidebar<?php }?>">
<div class="page_title_container">
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="page_title">
          <div class="page_title_ribbon"><i class="icon-food"></i></div>
          <div class="page_title_ribbon_shadow"></div>
          <h1 class="page_title_text">
            <?php if (is_category() && is_archive()) {?>
            <?php single_cat_title();?>
            <?php }else if(is_search()){?>
            search result for '<?php echo $_GET['s'];?>'
            <?php }else if(is_author()){?>
            Articles posted by '
            <?php the_post(); the_author();?>
            '
            <?php }else if(is_tag()){?>
            Tag : <?php echo get_query_var('tag')?>
            <?php }else if(is_home()){?>
            <?php }else if(get_query_var('monthnum') || get_query_var('year')){?>
            <?php echo date("F", mktime(0, 0, 0, get_query_var('monthnum'), date('y'))).' '.get_query_var('year');?>
            <?php }else if(isset($_GET['m'])){?>
            <?php 
				$thismonth = substr($_GET['m'],-2);
				$thisyear = substr($_GET['m'],0,4);
				echo date("F", mktime(0, 0, 0, $thismonth, 1)).' '.$thisyear;?>
            <?php }else{?>
            <?php the_title();?>
            <?php }?>
          </h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!--page_title_container-->
<div class="main_container_inner">
  <div class="container">
    <div class="row">
      <div class="content blog-content clearfix<?php if(get_option('at01_blog_style') == 3) { ?> span12<?php }else{?> span9<?php }?>">
      
        <?php
		if (!is_single()) {
			wp_reset_query();
			$args = array('post_type' => array('post'), 'paged' => get_query_var('paged'));
			if (is_category() && is_archive()) {
				$args['cat'] = get_query_var('cat');
            }else if(is_search()){
            	$args['s'] =  $_GET['s'];
				array_push($args['post_type'],'menu', 'gallery');
			}else if(is_author()){
				$args['author_name'] =  get_the_author_meta('user_login');
			}else if(is_tag()){
				$args['tag'] = get_query_var('tag');
			}
			
			
			if(get_query_var('monthnum')) $args['monthnum'] = get_query_var('monthnum');
			if(get_query_var('year')) $args['year'] = get_query_var('year');
			
			if(isset($_GET['m'])){
				$thismonth = substr($_GET['m'],-2);
				$thisyear = substr($_GET['m'],0,4);
				
				$args['monthnum'] = $thismonth;
				$args['year'] = $thisyear;
			}
			
			query_posts($args);
		}?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); 
				$post_cate = array();
				$thispost_id[0] = get_the_ID();
				foreach((get_the_category()) as $category) { 
    				array_push($post_cate,$category->cat_ID); 
				} 
		?>
        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
          <?php if(get_option('at01_display_feature') == 'true'){?>
          <?php if (has_post_thumbnail() ) { ?>
          <div class="post-media">
            <?php if(!is_single()){?>
            <a href="<?php the_permalink();?>">
            <?php the_post_thumbnail('blog-no-sidebar');?>
            </a>
            <?php }else{?>
            <?php the_post_thumbnail('pic-fullwidth');?>
            <?php }?>
          </div>
          <!--post-media-->
          <?php }?>
          <?php }?>
          <?php if(!is_single()){?>
          <div class="post-content clearfix">
            <div class="post-meta-published">
              <div class="post-meta-day-month">
                <div class="post-meta-day">
                  <?php the_time('d'); ?>
                </div>
                <div class="post-meta-month">
                  <?php the_time('M'); ?>
                </div>
              </div>
            </div>
            <!--post-meta-published-->
            <div class="entry-meta-icon-group clearfix">
              <div class="post-title-excerpt">
                <h2 class="post-title">
                  <a href="<?php the_permalink();?>"><?php the_title();?></a>
                </h2>
                <div class="post-excerpt">
                  <?php if (is_category() || is_archive() || is_home() || is_author() || is_search()) {
                                    the_excerpt();
                                } else {
                                    the_content('');
                                } ?>
                </div>
                <a href="<?php the_permalink();?>" class="readmore"><?php echo get_option("at01_content_readmore_text")?></a> </div>
            </div>
            <!--post-content-->
          </div>
          <!--post-->
          </div>
          <?php }else{////single blog?>
          <div class="post-content single-post-content clearfix">
          <div class="single-post-date-comment clearfix">
            <div class="single-post-date">
              <div class="colorbox-icon colorbox-26px colorbox-calendar"><i class="icon-calendar"></i></div>
              <div class="single-post-date-text">
              <a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>">
                <?php the_time('F'); ?> <?php the_time('d'); ?>, <?php the_time('Y'); ?>
              </div>
              </a>
            </div>
            <div class="single-post-comment">
              <div class="single-post-comment-text">
                <?php comments_popup_link(__('0 Comment', 'default'), __('1 Comment', 'default'), __('% Comments', 'default')); ?>
              </div>
              <div class="colorbox-icon colorbox-26px colorbox-comment"><i class="icon-comment"></i></div>
            </div>
          </div>
          <!--post-content-date-comments-->
          <div class="post-content-title-and-detail">
            <h2 class="post-content-title">
              
              <?php the_title();?>
            </h2>
            <div class="post-content-detail">
              <?php the_content('');?>
            </div>
            <?php $args_link_page = array(
				'before'           => '<div class="post-content-page">' . __('Pages : ', 'default'),
				'after'            => '</div>',
				'link_before'      => ' ',
				'link_after'       => ' ',
				'next_or_number'   => 'number',
				'nextpagelink'     => __('Next page', 'default'),
				'previouspagelink' => __('Previous page', 'default'),
				'pagelink'         => '%',
				'echo'             => 1
			); ?>
			<?php wp_link_pages( $args_link_page ); ?> 
          </div>
          
          <!--social share-->
          <?php if(is_single()){ ?>
                    <?php if(get_option('at01_post_widget') == 'true'){?>
                    <div class="single_blog_social clearfix">
                    	<ul class="single_social_icon_list">
                    	<?php 
							if(get_option('at01_post_widget_fb') == 'true'){?>
                          	<li class="single_social_icon facebook">
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink($post -> ID);?>" target="_blank">
                                	<i class="icon-facebook"></i>
                                </a>
                           	</li>
							<?php }
				
							if(get_option('at01_post_widget_tw') == 'true'){?>
                            <li class="single_social_icon twitter">
                            	<a href="http://twitter.com/home?status=<?php the_title();?> - <?php the_permalink($post -> ID);?>" target="_blank">
                                    <i class="icon-twitter"></i>
                                </a>
                           </li>
							<?php }
							
							if(get_option('at01_post_widget_google') == 'true'){?>
                            <li class="single_social_icon google-plus">
                            <a href="https://plus.google.com/share?url=<?php the_permalink($post -> ID);?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                <i class="icon-google-plus"></i>
                            </a>
                          	</li>
						<?php }
						
							if(get_option('at01_post_widget_linkedin') == 'true'){?>
                            <li class="single_social_icon linkedin">
								<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink($post -> ID);?>&amp;title=<?php the_title();?>" target="_blank">
									<i class=" icon-linkedin"></i>
								</a>
                            </li>

						<?php }?>
                    	</ul><!--single_social_icon_list-->
                    </div><!--single_blog_social-->
                    <?php }?>
                  <?php }?><!--end social share-->
          
          
          
          <?php if (is_single()) {?>
           
          <div class="post-category-and-tag clearfix">
          	  <div class="post-category clearfix">
              <div class="colorbox-icon colorbox-26px colorbox-category"> <i class="icon-th-list"></i> </div>
                <div class="post-category-list">
                   <?php the_category(', ') ?>
                </div>
              </div><!--post-category -->
          		<?php if(has_tag()){?>
                  <div class="post-tag clearfix">
                     <div class="colorbox-icon colorbox-26px colorbox-tag"> <i class="icon-tag"></i> </div>
                     <div class="post-tag-list">
                     <?php the_tags('',', ','') ?>
                    </div>
                  </div><!--post-tag -->
        			<?php }?>
        	  </div><!--post-category-and-tag-->
            <?php }?>
            
            </div>
        <!--post-content-->
      </div>
      <!--post-->
      
      
        <?php comments_template(); ?>
        
      <?php }?>
      <?php endwhile;  ?>
      
      <div id="nav-below" class="navigation">
        <div style="margin:0 auto; text-align:center;">
            <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
		 else if(function_exists('at_pagenavi')) { at_pagenavi(); }
	else { ?>
            <div class="nav-previous">
              <?php next_posts_link(__('<span class="meta-nav">&laquo;</span> Older posts', 'default')) ?>
            </div>
            <div class="nav-next">
              <?php previous_posts_link(__('Newer posts <span class="meta-nav">&raquo;</span>', 'default')) ?>
            </div>
            <?php } ?>
          </div>
      </div>
      <!--navigation-->
      
      
      <?php else:?>
      <div class="entry-content">
      	<div class="entry-content-inner clearfix">
                <?php _e('Sorry, no posts matched your criteria.', 'default'); ?>
      	</div>
      </div>
      <?php endif; ?>
    </div>
    <!--content-->
    <div class="span3 sidebar <?php if(get_option('at01_sidebar_position') == 1) { ?>left-sidebar<?php }?>">
      <?php dynamic_sidebar('sidebar-2');?>
    </div>
    <!--sidebar-->
  </div>
            	</div>
            </div><!--main_container_inner-->
        </div><!--main_container-->
<?php get_footer(); ?>
