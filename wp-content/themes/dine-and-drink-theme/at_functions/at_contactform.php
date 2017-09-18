<?php
/*add_action('wp_ajax_at_contact', 'at_contact');
function at_contact() {
	print_r($_POST);
    if($_POST['action'] == 'contact_me'){
		echo "action";
		$name = $_POST['name'];
		$email = $_POST['email'];
		$admin_mail = $_POST['emailto'];
		$msg = $_POST['message'];
	
        $subject = "New contact form received";
        $message = "You've received a new contact form. \n\n
            Name: ".$name."\n
            Mail: ".$email."\n
            Message: ".$msg."\n";
        $mail = mail($admin_mail, $subject, $message,
        "From: ".$name." <".$mail.">rn"
        ."Reply-To: ".$mail."rn"
        ."X-Mailer: PHP/" . phpversion());
        if($mail) {
        	echo "sent";
        }
        die();
    }
}*/

add_action('wp_ajax_contact_form', 'contact_form');
add_action('wp_ajax_nopriv_contact_form', 'contact_form');
function contact_form() {
    if(!empty($_POST)) {
		$name = $_POST['name'];
		$mail = $_POST['email'];
		$admin_mail = $_POST['emailto'];
		$msg = $_POST['message'];
		
		//echo $name ."-".$mail. "-" .$admin_mail."-".$msg;
		$subject = "New contact form received";
		$message = "You've received a new contact form. <br /><br />
			Name: ".$name."<br />
			E-Mail: ".$mail."<br />
			Message: ".$msg."<br />";
		$headers  = "MIME-Version: 1.0" . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= "X-Mailer: PHP/".phpversion() . "\r\n";
		$headers .= "From: =?UTF-8?B?".base64_encode($name)."?=<".$mail.">";
		
		$mail = mail($admin_mail, $subject, $message,$headers);
		if($mail) {
			echo "sent";
		}
		die();
    }
	die();
}


add_action('wp_ajax_reservation_form', 'reservation_form');
add_action('wp_ajax_nopriv_reservation_form', 'reservation_form');
function reservation_form() {
    if(!empty($_POST)) {
		$name = $_POST['name'];
		$mail = $_POST['email'];
		$phone = $_POST['phone'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$guest = $_POST['guest'];
		$admin_mail = $_POST['emailto'];
		$msg = $_POST['message'];
		
		//echo $name ."-".$mail. "-" .$admin_mail."-".$msg;
		
		$subject = "New reservation received";
		$message = "You've received a new reservation. <br /><br />
			Name: ".$name."<br />
			Phone: ".$phone."<br />
			E-Mail: ".$mail."<br />
			Number of Persons: ".$guest."<br />
			Date: ".$date."<br />
			Time: ".$time."<br />
			Message: ".$msg."<br />";
		$headers  = "MIME-Version: 1.0" . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= "X-Mailer: PHP/".phpversion() . "\r\n";
		$headers .= "From: =?UTF-8?B?".base64_encode($name)."?=<".$mail.">";
		
		$mail = mail($admin_mail, $subject, $message,$headers);
		if($mail) {
			echo "sent";
		}
		die();
    }
	die();
}

?>