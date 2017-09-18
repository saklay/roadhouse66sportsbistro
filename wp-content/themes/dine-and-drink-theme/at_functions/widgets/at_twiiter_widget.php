<?php
class AT_twitter_widget extends WP_Widget{
	// Constructor //
	public function __construct() {
		
		parent::__construct(
	 		'AT_twitter_widget', // Base ID
			'AT - Twitter', // Name
			array('description' => __('Your Recent Twitter feed', 'default'),
					'classname' => 'AT_twitter_widget'), // Args
			array('width' => 300)
		);
	}
	
	// Extract Args //

	public function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		if (isset($instance['consumer_key'])) {
			$consumer_key = $instance['consumer_key'];
		}
		else {
			$consumer_key = "";
		}
		
		if (isset($instance['consumer_secret'])) {
			$consumer_secret = $instance['consumer_secret'];
		}
		else {
			$consumer_secret = "";
		}
		
		if (isset($instance['user_token'])) {
			$user_token = $instance['user_token'];
		}
		else {
			$user_token = "";
		}
		
		if (isset($instance['user_secret'])) {
			$user_secret = $instance['user_secret'];
		}
		else {
			$user_secret = "";
		}
		
		echo $before_widget;
		?>
        <?php echo $before_title; ?><?php echo esc_attr($instance['title']); ?><?php echo $after_title; ?>
        
        <?php 
		$widget_id = explode(' ',$before_widget);
		$w_id=substr($widget_id[1],-2,1);
		?>
                
        <div class="twitter-feed-<?php echo $w_id;?>"></div>
        <div class="twitter-wrap">
        <?php 
		$tweets = at_get_tweets($instance['user'], $instance['count'], $consumer_key, $consumer_secret, $user_token, $user_secret);
        foreach ($tweets as $this_tweet) {
			if(isset($tweets['error'])){
				echo $tweets['error'];
			}else{
		?>
                <div class="tweet-container clearfix">
                        <a class="tweet-user-avatar" href="https://twitter.com/intent/user?user_id=<?php echo $this_tweet->user->id_str; ?>">
                            <img width="32" height="32" src="<?php echo $this_tweet->user->profile_image_url; ?>" />
                        </a>
                        <p class="tweet-user-names">
                            <a class="tweet-user-name-text" href="https://twitter.com/intent/user?user_id=<?php echo $this_tweet->user->id_str; ?>">
                                <?php echo $this_tweet->user->name; ?>
                            </a>
                            <a class="tweet-user-screen-name-text" href="https://twitter.com/intent/user?user_id=<?php echo $this_tweet->user->id_str; ?>">
                                @<?php echo $this_tweet->user->screen_name; ?>
                            </a>
                        </p>
                        <div class="tweet-text">
                            <?php
                                echo at_linkify_tweet( $this_tweet->text, $this_tweet );
                            ?>
                        </div>
                         <p class="tweet-time">
                            <a href="http://twitter.com/<?php echo $this_tweet->user->screen_name; ?>/status/<?php echo $this_tweet->id_str; ?>">
                                <?php echo at_relativeTime( strtotime( $this_tweet->created_at)); ?>
                            </a>
                        </p>
                        <div class="tweet-intents">
                            <a class="intent-reply" title="Reply to this Tweet" href="https://twitter.com/intent/tweet?in_reply_to=<?php echo $this_tweet->id_str; ?>">Reply</a>
                            <a class="intent-retweet" title="Retweet this Tweet" href="https://twitter.com/intent/retweet?tweet_id=<?php echo $this_tweet->id_str; ?>">Re-tweet</a>
                            <a class="intent-favorite" title="Favourite this Tweet" href="https://twitter.com/intent/favorite?tweet_id=<?php echo $this_tweet->id_str; ?>">Favourite</a>
                        </div>
                    </div>
            
            <?php
			}
        }
?>
</div><!--twitter-wrap-->
        <a href="https://twitter.com/<?php echo $instance['user']; ?>" class="twitter-follow-button" data-show-count="false" data-dnt="true">
            Follow @<?php echo $instance['user']; ?>
        </a>
        
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        
        <?php echo $after_widget;?>
		<?php
	}
	
	public function form($instance) {
		
		// outputs the options form on admin
		if (isset($instance['title'])) {
			$title = $instance['title'];
		}
		else {
			$title = __('New title', 'default');
		}
		if (isset($instance['user'])) {
			$user = $instance['user'];
		}
		else {
			$user = "";
		}
		
		if (isset($instance['count'])) {
			$count = $instance['count'];
		}
		else {
			$count = 9;
		}
		
		if (isset($instance['consumer_key'])) {
			$consumer_key = $instance['consumer_key'];
		}
		else {
			$consumer_key = "";
		}
		
		if (isset($instance['consumer_secret'])) {
			$consumer_secret = $instance['consumer_secret'];
		}
		else {
			$consumer_secret = "";
		}
		
		if (isset($instance['user_token'])) {
			$user_token = $instance['user_token'];
		}
		else {
			$user_token = "";
		}
		
		if (isset($instance['user_secret'])) {
			$user_secret = $instance['user_secret'];
		}
		else {
			$user_secret = "";
		}
		
		
		
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title :', 'default'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
        <p>
		<label for="<?php echo $this->get_field_id('user'); ?>"><?php _e('Twitter username :', 'default'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo esc_attr($user); ?>" />
		</p>
        <p>
		<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Number of feeds to show :', 'default'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo esc_attr($count); ?>" />
		</p>
        <p>
		Create a Twitter aplication on the Twitter's developer page to get Consumer key, Consumer secret, Access token and Access token secret <a href="https://dev.twitter.com/apps/new" target="_blank">here</a>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('consumer_key'); ?>"><?php _e('Consumer key :', 'default'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('consumer_key'); ?>" name="<?php echo $this->get_field_name('consumer_key'); ?>" type="text" value="<?php echo esc_attr($consumer_key); ?>" />
		</p> 
        <p>
		<label for="<?php echo $this->get_field_id('consumer_secret'); ?>"><?php _e('Consumer secret :', 'default'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('consumer_secret'); ?>" name="<?php echo $this->get_field_name('consumer_secret'); ?>" type="text" value="<?php echo esc_attr($consumer_secret); ?>" />
		</p> 
        <p>
		<label for="<?php echo $this->get_field_id('user_token'); ?>"><?php _e('Access token :', 'default'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('user_token'); ?>" name="<?php echo $this->get_field_name('user_token'); ?>" type="text" value="<?php echo esc_attr($user_token); ?>" />
		</p> 
        <p>
		<label for="<?php echo $this->get_field_id('user_secret'); ?>"><?php _e('Access token secret :', 'default'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('user_secret'); ?>" name="<?php echo $this->get_field_name('user_secret'); ?>" type="text" value="<?php echo esc_attr($user_secret); ?>" />
		</p>        
		<?php 
	}

	public function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = array();
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = strip_tags($new_instance['count']);
		$instance['user'] = strip_tags($new_instance['user']);
		$instance['consumer_key'] = strip_tags($new_instance['consumer_key']);
		$instance['consumer_secret'] = strip_tags($new_instance['consumer_secret']);
		$instance['user_token'] = strip_tags($new_instance['user_token']);
		$instance['user_secret'] = strip_tags($new_instance['user_secret']);

		return $instance;
	}
}
?>