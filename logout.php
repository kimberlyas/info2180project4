<?php
	//Make sure it's the same session
	session_start(); 
	//Unset session variables
	session_destroy(); 
	// Redirect to login page
	header("location: login.php"); 
?>
