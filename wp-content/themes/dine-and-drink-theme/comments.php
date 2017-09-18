<?php if ($post->comment_status == 'open' || have_comments()) : ?>
     <div id="comments" class="comments_wrap clearfix">  
     	<div class="widget_title">
        	<div class="widget_title_ribbon"><i class="icon-comments"></i></div>
<?php endif;?>

<?php if (post_password_required()) : ?>
	<p class="nopassword">
	This post is password protected. Enter the password to view any comments.
    </p>
</div>
</div>
<?php
	return;
	endif;
	?>
    
<?php if ($post->comment_status == 'open' || have_comments()) : ?>
  			<h3 class="widget_title_text">This article has <?php comments_number(__('0 Comment', 'default'), __('1 Comment', 'default'), __('% Comments', 'default')); ?>
  			</h3>
            </div>
<?php endif;?>


<?php if (have_comments()) : ?>
  <ol class="commentlist">
    <?php wp_list_comments( array( 'callback' => 'at_comment' ) ); ?>
  </ol><!--commentlist-->
  
  <div class="comment-navigation">
	<div style="margin:0 auto; text-align:center;">
  		<div class="wp-pagenavi paginate-com">
<?php
//Create pagination links for the comments on the current post, with single arrow heads for previous/next
paginate_comments_links( array('prev_text' => '&lsaquo; Previous', 'next_text' => 'Next &rsaquo;'));
?>
		</div><!--pagenavi-->
    </div>
  </div>
<?php
	/* If there are no comments and comments are closed, let's leave a little note, shall we?
	 * But we don't want the note on pages or post types that do not support comments.
	 */
	elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<div class="no_comments_wrap">
        	<p class="nocomments">Comments are closed.</p>
        </div>
	<?php endif; ?>
<?php if ($post->comment_status == 'open' || have_comments()) : ?>
                    </div><!--comment_warp-->
<?php endif;?>

   
<?php 
$commentargs = array(
	'title_reply' => __( '<div class="widget_title"><div class="widget_title_ribbon"><i class="icon-comment"></i></div><span class="widget_title_text">Leave a Reply</span></div>' ),
	'title_reply_to' => __( '<div class="widget_title"><div class="widget_title_ribbon"><i class="icon-comment"></i></div><span class="widget_title_text">Leave a Reply to %s</span></div>' ),
	'cancel_reply_link' => __( 'Cancel Reply', 'default')
	);
comment_form($commentargs); ?>
