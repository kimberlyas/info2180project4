<?php

	include "cheapoDBConfig.php";

	session_start(); // Start Session

	$id = $_GET["id"];
    $sql = "SELECT * FROM Message WHERE id = '$id'";
    $query = mysql_query($sql);

    if ($query === false) {
        echo "Could not successfully run query ($sql) from DB: " . mysql_error();
        exit;
    }
        

    if (mysql_num_rows($query) > 0) { //If they match

    	//$rows = mysql_fetch_array($query);
    	// Message header
    	echo "<div class='mail-box-header'>";
		
            while($row = mysql_fetch_array($query))
            {
            	echo "<div class='pull-right animated'>";
				?> 
					<a href="javascript:void(0)" onclick="toggle_visibility('popup-box2');" class="link color-link reply">Reply</a> 
				<?php // Reply button
				echo "</div>"; 
				echo "<h2 class='h2'>Message</h2>";
				echo "<div class='mail-address'>";
                // Print message format
                 echo "<h3 class='h3'><span class='font-normal'>Subject: </span> $row[subject]</h3>"; // message subject

                    // I have the userid need to now search user table for a matching username
                    $mysql = "SELECT username FROM User WHERE id = '{$row['user_id']}'";
                    $querry = mysql_query($mysql);

                    if ($querry === false) {
                        echo "Could not successfully run query ($sql) from DB: " . mysql_error();
                        exit;
                     }
                    else if (mysql_num_rows($querry) > 0) {
                    	$data = mysql_fetch_array($querry);
                        // print corresponding username
						echo "<h5 class='h5'><span class='font-normal'>From: </span> $data[username]</h5>"; // Sender                    
                    }
                    else { echo "User not found";}


                
                echo "</div>";
				echo "</div>";
				
				//End of header

				// Message body
				echo "<div class='mail-box'>";
				echo "<div class='mail-body'>";
				echo "<p>$row[body]</p>";
				echo "</div>";
				echo "</div>";
				echo "</div>";

            }
    }	

			

?>

  
                        
                        
                        
