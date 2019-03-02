<?php
include("config.php");

if(isset($_POST["username"]))
{
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
		die();
	}

	$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	
	$statement = $db->prepare("SELECT username FROM login WHERE username=?");
	$statement->bind_param('s', $username);
	$statement->execute();
	$statement->bind_result($username);
	if($statement->fetch()){
		die('<em>Username already exists</em> <img src="images/not-available.png" />');
	}else{
		die('<em>Username is available</em> <img src="images/available.png" />');
	}
}
?>