<?php

	// Simple contact form by Todd Fisher
	
	// NOTE: Use $_POST instead of $_REQUEST in real life
	// http://csis2000.com/some-form.php?name=test&email=test@touchmd.com&message=dude
	
	if(!isset($_REQUEST['firstName']))
	{
		die("firstname is required!");
	}
	
	if(!isset($_REQUEST['email']))
	{
		die("enter you e-mail address to continue!");
	}
	
	if(!isset($_REQUEST['message']))
	{
		die("you must specify a message!");
	}
	
	
	
	// Check if too many attempts in current session
	session_start(); // Starts the session if not already started
	if( $_SESSION["some-form-submission-count"] != null)
	{
		$_SESSION["some-form-submission-count"] = ((int)$_SESSION["some-form-submission-count"]) + 1;
	}
	else
	{
		$_SESSION["some-form-submission-count"] = 1;	
	}
	
	$maxFormSubmissions = 13;
	
	if(((int)$_SESSION["some-form-submission-count"]) > $maxFormSubmissions)
	{
		die("To many form submissions, please close your browser and try again! " . $maxFormSubmissions);	
	}
	
	
	
	// Get all Vars
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$message = $name . "\r\n" . $email . "\r\n" . $_REQUEST['message'];
	$subject = "Message from CSIS2000.com";
	$from = "From: $name<$email>\r\nReturn-path: $email";
	
	
	// Loop through all variables
	/*foreach($_REQUEST as $key => $val) {
		$message .= $key.' = '.$val.'<br />';
	}*/
	
	
	
	// Validate e-mail address format
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		die("Invalid E-mail address!");	
	}
	
	
	
	// Send the Message
	if(mail("toddfisher@suu.edu", $subject, $message, $from))
	{
		echo "Message sent! " . $_SESSION["some-form-submission-count"] . " yay!";
		//. "<br />Variables<br />" . $message;
	}
	else
	{
		echo "Failed to send e-mail try again in a few months!";
	}
	
	
?>