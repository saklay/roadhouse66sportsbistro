jQuery(document).ready(function($) {
	$(".contacterror").hide();
	jQuery("#contact_me").submit(function() {
		
		var hasError = false;
		var emailReg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		var emailVal = $("#contact_email").val();
		if(emailVal == '') {
			$(".email-error").show();
			$(".email-valid").hide();
			hasError = true;
		} else if(!emailReg.test(emailVal)) {
			$(".email-error").hide();
			$(".email-valid").show();
			hasError = true;
		}else{
			$(".email-error").hide();
			$(".email-valid").hide();
		}

		
		var nameVal = $("#contact_name").val();
		if(nameVal == "") {
			$(".name-error").show();
			hasError = true;
		}else{
			$(".name-error").hide();
		}
		
		var messageVal = $("#contact_message").val();
		if(messageVal == "") {
			$(".message-error").show();
			hasError = true;
		}else{
			$(".message-error").hide();
		}
		//alert(ajaxurl);
		if(hasError == false) {
			//$(this).hide();
			//$(".name-error").show();
			$("#sendEmail li.buttons").append('<img src="/wp-content/themes/default/images/template/loading.gif" alt="Loading" id="loading" />');
		
			var str = jQuery("#contact_form").serialize();
			//alert(str);
		
		
			data = { action: 'contact_form','name': nameVal, 'email': emailVal, 'message': messageVal,'emailto': $("#contact_emailto").val()};
			//jQuery.post(ajaxurl, data, function(response){
			jQuery.ajax({
				type: "POST",
				url: ajaxurl,
				data: data,
				success: function(response) {
					//alert(response);
					if(response == 'sent') {
						jQuery(".contact #node").hide();
						jQuery(".contact #contact_success").fadeIn("slow");
						
						document.getElementById('contact_name').value = "";
						document.getElementById('contact_email').value = "";
						document.getElementById('contact_message').value = "";
					}
					else {
						result = msg;
						jQuery(".contact #node").html(result);
						jQuery(".contact #node").fadeIn("slow");
					}
				}
			});
		}
		return false;
	});
			
	jQuery("#reservation_date").datepicker();
	jQuery("#reservation_me").submit(function() {
		
		var hasError = false;
		var emailReg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		var emailVal = $("#reservation_email").val();
		if(emailVal == '') {
			$(".email-error").show();
			$(".email-valid").hide();
			hasError = true;
		} else if(!emailReg.test(emailVal)) {
			$(".email-error").hide();
			$(".email-valid").show();
			hasError = true;
		}else{
			$(".email-error").hide();
			$(".email-valid").hide();
		}

		
		var nameVal = $("#reservation_name").val();
		if(nameVal == "") {
			$(".name-error").show();
			hasError = true;
		}else{
			$(".name-error").hide();
		}
		
		var phoneVal = $("#reservation_phone").val();
		if(phoneVal == "") {
			$(".phone-error").show();
			hasError = true;
		}else{
			$(".phone-error").hide();
		}
		
		var dateVal = $("#reservation_date").val();
		if(dateVal == "") {
			$(".date-error").show();
			hasError = true;
		}else{
			$(".date-error").hide();
		}
		
		var timeVal = $("#reservation_time").val();
		if(timeVal == "") {
			$(".time-error").show();
			hasError = true;
		}else{
			$(".time-error").hide();
		}
		
		var guestVal = $("#reservation_guest").val();
		if(guestVal == "") {
			$(".guest-error").show();
			hasError = true;
		}else{
			$(".guest-error").hide();
		}
		
		var messageVal = $("#reservation_message").val();
		
		
		//alert(ajaxurl);
		if(hasError == false) {
			//$(this).hide();
			//$(".name-error").show();
			$("#reservation_me li.buttons").append('<div class="reservation_loading"><i class="icon-spinner icon-spin icon-2x"></i></div>');
		
			var str = jQuery("#reservation_form").serialize();
			//alert(str);
		
		
			data = { action: 'reservation_form', 'name': nameVal, 'email': emailVal, 'phone': phoneVal, 'date': dateVal, 'time': timeVal, 'guest': guestVal, 'message': messageVal,'emailto': $("#reservation_emailto").val()};
			//jQuery.post(ajaxurl, data, function(response){
			jQuery.ajax({
				type: "POST",
				url: ajaxurl,
				data: data,
				success: function(response) {
					//alert(response);
					if(response == 'sent') {
						jQuery(".reservationfrom #node").hide();
						jQuery(".reservationfrom #reservation_success").fadeIn("slow");
						jQuery(".reservation_loading").hide();
						
						document.getElementById('reservation_name').value = "";
						document.getElementById('reservation_phone').value = "";
						document.getElementById('reservation_email').value = "";
						document.getElementById('reservation_date').value = "";
						document.getElementById('reservation_time').value = "";
						document.getElementById('reservation_guest').value = "";
						document.getElementById('reservation_message').value = "";
					}
					else {
						result = msg;
						jQuery(".reservationfrom #node").html(result);
						jQuery(".reservationfrom #node").fadeIn("slow");
					}
				}
			});
		}
		return false;
	});
});