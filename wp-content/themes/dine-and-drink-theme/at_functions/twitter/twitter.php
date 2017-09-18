<?php

function at_linkify_tweet($raw_text, $tweet = NULL)
{
    // first set output to the value we received when calling this function
    $output = $raw_text;
 
    // create xhtml safe text (mostly to be safe of ampersands)
    $output = htmlentities(html_entity_decode($raw_text, ENT_NOQUOTES, 'UTF-8'), ENT_NOQUOTES, 'UTF-8');
 
    // parse urls
    if ($tweet == NULL)
    {
        // for regular strings, just create <a> tags for each url
        $pattern        = '/([A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&\?\/.=]+)/i';
        $replacement    = '<a href="${1}" rel="external">${1}</a>';
        $output         = preg_replace($pattern, $replacement, $output);
    } else {
        // for tweets, let's extract the urls from the entities object
        foreach ($tweet->entities->urls as $url)
        {
            $old_url        = $url->url;
            $expanded_url   = (empty($url->expanded_url))   ? $url->url : $url->expanded_url;
            $display_url    = (empty($url->display_url))    ? $url->url : $url->display_url;
            $replacement    = '<a href="'.$expanded_url.'" rel="external">'.$old_url.'</a>';
            $output         = str_replace($old_url, $replacement, $output);
        }
 
        // let's extract the hashtags from the entities object
        foreach ($tweet->entities->hashtags as $hashtags)
        {
            $hashtag        = '#'.$hashtags->text;
            $replacement    = '<a href="http://twitter.com/search?q=%23'.$hashtags->text.'" rel="external">'.$hashtag.'</a>';
            $output         = str_ireplace($hashtag, $replacement, $output);
        }
 
        // let's extract the usernames from the entities object
        foreach ($tweet->entities->user_mentions as $user_mentions)
        {
            $username       = '@'.$user_mentions->screen_name;
            $replacement    = '<a href="http://twitter.com/'.$user_mentions->screen_name.'" rel="external" title="'.$user_mentions->name.' on Twitter">'.$username.'</a>';
            $output         = str_ireplace($username, $replacement, $output);
        }
 
        // if we have media attached, let's extract those from the entities as well
        if (isset($tweet->entities->media))
        {
            foreach ($tweet->entities->media as $media)
            {
                $old_url        = $media->url;
                $replacement    = '<a href="'.$media->expanded_url.'" rel="external" class="twitter-media" data-media="'.$media->media_url.'">'.$media->display_url.'</a>';
                $output         = str_replace($old_url, $replacement, $output);
            }
        }
    }
 
    return $output;
}

function at_relativeTime($time)
{
    $second = 1;
    $minute = 60 * $second;
    $hour = 60 * $minute;
    $day = 24 * $hour;
    $month = 30 * $day;
 
    $delta = time() - $time;
 
    if ($delta < 1 * $minute)
    {
        return $delta == 1 ? "one second ago" : $delta . " seconds ago";
    }
    if ($delta < 2 * $minute)
    {
      return "a minute ago";
    }
    if ($delta < 45 * $minute)
    {
        return floor($delta / $minute) . " minutes ago";
    }
    if ($delta < 90 * $minute)
    {
      return "an hour ago";
    }
    if ($delta < 24 * $hour)
    {
      return floor($delta / $hour) . " hours ago";
    }
    if ($delta < 48 * $hour)
    {
      return "yesterday";
    }
    if ($delta < 30 * $day)
    {
        return floor($delta / $day) . " days ago";
    }
    if ($delta < 12 * $month)
    {
      $months = floor($delta / $day / 30);
      return $months <= 1 ? "one month ago" : $months . " months ago";
    }
    else
    {
        $years = floor($delta / $day / 365);
        return $years <= 1 ? "one year ago" : $years . " years ago";
    }
}

function at_get_tweets( $username, $count=1, $consumer_key, $consumer_secret, $user_token, $user_secret) {
 
    //if ( ! $tweets = get_transient( 'oikos_tweets' ) ) {
 
        $tmhOAuth = new tmhOAuth(array(
            'consumer_key'    => $consumer_key,
            'consumer_secret' => $consumer_secret,
            'user_token'      => $user_token,
            'user_secret'     => $user_secret,
			'curl_ssl_verifypeer'   => false
        ));
		
		
 
        /* Note that we get 20 Tweets by default here, as we don't include replies.  The way
         * that this works is Twitter gets 'count' Tweets, and then filters out replies. So if you
         * get 5 Tweets and the last 5 Tweets were all replies, then you'll get nothing.
         */
        $code = $tmhOAuth->request('GET', $tmhOAuth->url('1.1/statuses/user_timeline'), array(
            'screen_name' => $username,
            'count' => 20,
            'exclude_replies' => true));
		
        if ($code == 200) {
            $tweets = json_decode($tmhOAuth->response['response']);
            // Now we slice the required number of tweets.
            $tweets = array_slice( $tweets, 0, $count );
        } else {
            $tweets = array('error' => 'error : '.$code.'<br />');
        }
 		//var_dump($tweets);
       // set_transient('oikos_tweets', $tweets, 15 * 60);
 
    //}
 
    return $tweets;
}
?>