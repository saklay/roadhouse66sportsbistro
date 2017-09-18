jQuery(function($) {
    $(".container iframe[src^='http://www.youtube.com']").wrap("<div class='video-container'/>");
	
	//$(".widget_text iframe[src^='http://www.youtube.com']").wrap("<div class='video-container'/>");
	
	//$(".single_portfolio_content iframe[src^='http://www.youtube.com']").wrap("<div class='video-container'/>");
	
	
	$(".container iframe[src^='http://player.vimeo.com']").wrap("<div class='video-container'/>");
	
	//$(".widget_text iframe[src^='http://player.vimeo.com']").wrap("<div class='video-container'/>");
	
	//$(".single_portfolio_content iframe[src^='http://player.vimeo.com']").wrap("<div class='video-container'/>");
	
	
});