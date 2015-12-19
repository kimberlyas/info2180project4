<?php

	include "cheapoDBConfig.php"; // Cheapo Mail Database Access


	session_start(); // Start Session


	$msg = ""; // confirmation messages
	$errors = array(); // stores error messages


    	
    	// Get entered field data
		$firstName = $_POST["firstName"];
		$lastName = $_POST["lastName"];
		$password = $_POST["password"];
		$password2 = $_POST["password2"];
		$username = $_POST["username"];

		//Check if passwords match
		if ($password != $password2) {
			$errors[] = "Entered passwords do not match";
		}

		// Use regular expressions to ensure that passwords have at least one number and one letter, 
		// and one capital letter and are at least 8 digits long.

		if ( !preg_match("^(?=.*[A-Za-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$^", $password) )
		{
			$errors[] = "Password invalid. Must have at least one number, one letter, one capital letter and be at least 8 digits long";
		}

		//Check to see if username has been used before
		$sql = "SELECT * FROM  User WHERE username = '$username'";
    	$query = mysql_query($sql);

        if ($query === false) {
            echo "Could not successfully run query ($sql) from DB: " . mysql_error();
            exit;
        }

        if (mysql_num_rows($query) > 0) { //If they match
         	
         	//Error
         	$errors[] = "Username taken";
            
        }
        
    	//If there are no errors, proceed with addition to database
    	if (empty($errors)) 
        {
    		// Encrypt password
    		$encPassword = md5($password);

    		// Add values
    		$mysql = "INSERT INTO User (firstName, lastName, password, username) VALUES ('$firstName','$lastName', '$encPassword','$username')"; 
    		$querry = mysql_query($mysql);

    		// Check if values were indeed added
    		if (!$querry)
         	{
         		echo "Could not successfully run query ($sql) from DB: " . mysql_error();
         	}
         	else
         	{
         		$msg = "New Cheapo user '".$username."' successfully added";
                echo $msg;
         	}

    	}
        else
        {
            foreach ($errors as $error){
                echo $error."\n";
            }
        
        }




?>
