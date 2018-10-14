<?php

	// $_GET["firstName"]
	//$firstName = $_REQUEST["firstName"];
	//$lastName = $_REQUEST["lastName"];
	
	
	// Not passed
	if(!isset($_REQUEST["firstName"]))
	{
		die("first name is required!");
	}
	
	$firstName = $_REQUEST["firstName"];
	
	// minimum of 4 characters long
	if(strlen($firstName) < 4)
	{
		die("first name need to be at least 4 character long!");
	}
	
	
	if(!isset($_REQUEST["lastName"]))
	{
		die("last name is required!");
	}
	
	
	
	echo($firstName . " " . $lastName);
	
	
	

?>