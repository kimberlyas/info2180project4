<?php

	include "cheapoDBConfig.php"; // Cheapo Mail Database Access

	session_start(); // Start Session

	$msg = ""; // Error messages
    $row = null; // Used to store data from table

	// Login button
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    	$username = $_POST["username"]; // Get entered username
    	$password = $_POST["password"]; // Get entered password

	 	if ($username == '' || $password == '') {
        	$msg = "You must enter all fields";
    	} else {
        	$sql = "SELECT * FROM  User WHERE username = '$username' AND password = '$password'";
        	$query = mysql_query($sql);

        	if ($query === false) {
            	echo "Could not successfully run query ($sql) from DB: " . mysql_error();
            	exit;
            }
        

            if (mysql_num_rows($query) > 0) { //If they match
         	
         	  // Get data from table in assoc array
              $row = mysql_fetch_assoc($query);

              // Start Session for homescreens
         	  session_start();

         	  // Link to home screen
         		$pageLink = 'home-page.php';
         
         	  // Assign session variables
         	  $_SESSION["username"] = $username;
         	  $_SESSION["userID"] = $row['id'];
              $_SESSION["loginTime"] = date("H:i:s"); //time user logged in

   			
            
                // Redirect to homescreen
                header('Location: '.$pageLink.'');
                exit;
             }
        }

        // Error
        $msg = "Username and password do not match";
    }


?>

<!DOCTYPE html>
<html>
<head>
	<title>CheapoMail Login</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="wrapper">
		<div class="container">
			<h2>Login</h2>
			<form name="userlogin" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
				<input name="username" placeholder="username" type="text">
				<input name="password" placeholder="password" type="password">
				<div class="agree"><div style="color:red;"><?php echo "<b>".$msg."</b>";?></div> <!-- Error Message --></div>
				<input type="submit" class="animated" value="Login">
				<a href="#" class="forgot">Don't have an account</a>
			</form>
		</div>
	</div>
</body>
</html>

<!-- <div class="agree">
					<input id="agree" name="agree" type="checkbox">
					<label for="agree"></label>Accept roles and conditions
				</div> -->
