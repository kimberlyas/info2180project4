<?php

	include "cheapoDBConfig.php";

	session_start(); // Start Session

	// Message read

	// if unread message is clicked
	// create a record for this now read message

	$messageID = $_POST['id'];

	// Get session's timezone
	$timezone = date_default_timezone_get();
	date_default_timezone_set($timezone);

	// Get current date
	$date = date('Y-m-d H:i:s');

	$sql = "INSERT INTO Message_read (message_id, reader_id, date) VALUES ('$messageID','{$_SESSION['userID']}', '$date')";
	$query = mysql_query($sql);

?>
