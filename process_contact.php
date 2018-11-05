<?php 
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$mailFrom = $_POST['email'];
		$message = $_POST['message'];
		
		$subject = "Message From Your Website!";
		$mailTo = "timetourst@yahoo.com";
		$headers = "From: " . $mailFrom;
		$txt = "You have received an e-mail from " . $name . ".\n\n" . $message;
		
		mail($mailTo, $subject, $txt, $headers);
		header("Location: contact.php?mailsent");
	}