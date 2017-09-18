//Twitter Parsers
String.prototype.parseURL = function() {
	return this.replace(/[A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&~\?\/.=]+/g, function(url) {
		return url.link(url);
	});
};
String.prototype.parseUsername = function() {
	return this.replace(/[@]+[A-Za-z0-9-_]+/g, function(u) {
		var username = u.replace("@","")
		return u.link("http://twitter.com/"+username);
	});
};
String.prototype.parseHashtag = function() {
	return this.replace(/[#]+[A-Za-z0-9-_]+/g, function(t) {
		var tag = t.replace("#","%23")
		return t.link("http://search.twitter.com/search?q="+tag);
	});
};
function parseDate(str) {
    var v=str.split(' ');
    return new Date(Date.parse(v[1]+" "+v[2]+", "+v[5]+" "+v[3]+" UTC"));
} 

function loadLatestTweet(userTweets,numTweets,widgetID){
	//var numTweets = 3;
	twitter_success = false;
	tweet = '';
    //var _url = 'https://api.twitter.com/1.1/statuses/user_timeline/'+userTweets+'.json?callback=?&count='+numTweets+'&include_rts=1';
	
    var _url = 'https://api.twitter.com/1.1/statuses/show/210462857140252672.json';
	
    jQuery.getJSON(_url,function(data){
	tweet = '<div id="twitter_t"></div><div id="twitter_m"><div id="twitter_container"><ul id="twitter_update_list">';
    for(var i = 0; i< data.length; i++){
            var tweettext = data[i].text;
            var created = parseDate(data[i].created_at);
            var createdDate = created.getDate()+'-'+(created.getMonth()+1)+'-'+created.getFullYear()+' at '+created.getHours()+':'+created.getMinutes();
           	tweet += '<li>';
            tweet += tweettext.parseURL().parseUsername().parseHashtag();
			tweet += '</li>';
			//tweet = tweet.parseURL().parseUsername().parseHashtag();
            //tweet += '<div class="tweeter-info"><div class="uppercase bold"><a href="https://twitter.com/#!/'+userTweets+'" target="_blank" class="black">@'+userTweets+'</a></div><div class="right"><a href="https://twitter.com/#!/'+userTweets+'/status/'+data[i].id_str+'">'+createdDate+'</a></div></div>'
            //$("#twitter-feed").append('<p>'+tweet+'</p>');
        }
	tweet += '</ul></div></div><div id="twitter_b"></div>';
	twitter_success = true;
	jQuery(".twitter-feed-"+widgetID).append(tweet);
    });
	
	setTimeout(function(){
		tweet = 'Loading Tweet...';
        if(!twitter_success) { jQuery(".twitter-feed-"+widgetID).append(tweet); } 
    }, 5000); // assuming 2sec is the max wait time for results
}
