<?php

	include "cheapoDBConfig.php";

	session_start(); // Start Session

	$msg = "";
	$errors = array(); // list of error messages

	// Get pre-filled fields
	$subject = $_POST["msgSubject"];
	$recipient = $_POST["receiver"];

	// Get recipient's id
	$sql = "SELECT id FROM  User WHERE username = '$recipient'";
    $query = mysql_query($sql);

    if ($query === false) {
         echo "Could not successfully run query ($sql) from DB: " . mysql_error();
         exit;
     }

    if (mysql_num_rows($query) > 0) { //If they match

       // Store recipient id
       $recipient_id = mysql_fetch_array($query)["id"];
    }
    	
    	// Get entered field data
		$body = $_POST["message"];
		

		// Add new message to database
		$mysql = "INSERT INTO Message (body,subject,user_id,recipient_ids) VALUES ('$body','$subject','{$_SESSION['userID']}','$recipient_id')";
		$querry = mysql_query($mysql);

		if ($querry === false) {
        	echo "Could not successfully run query ($sql) from DB: " . mysql_error();
            exit;
        }
        else
        {
        	$msg = "Reply Message sent succesfully to recipient ".$recipient;
        	echo $msg;
        }


?>

