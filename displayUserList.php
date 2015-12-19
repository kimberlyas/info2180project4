<?php
    include "cheapoDBConfig.php"; // Cheapo Mail Database Access

    session_start(); // Start Session

    // display user list

    $row = null;

    // Retrieve all users from database 
        $sql = "SELECT username FROM User";
        $query = mysql_query($sql);

        if ($query === false) {
            echo "Could not successfully run query ($sql) from DB: " . mysql_error();
            exit;
        }
        

        if (mysql_num_rows($query) > 0) { //If they match
            
            // Print list
            echo "<div class='aim ain'>";
            echo "<div class='aiq to nZ'>";
            echo "<div class='TN'>";
            echo "<h3 class='text'>Cheapo Users</h3>";

            while($row = mysql_fetch_array($query))
            {
                if ($row['username'] == $_SESSION["username"])
                {
                    continue; // no need to display current logged in user so skip it
                }
             
                echo "<div class='aio'><span><a href='#' class='text'><img src= 'http://emojipedia-us.s3.amazonaws.com/cache/76/71/7671e3430b399ac48c129407eb1976e6.png' alt= 'Avatar'/>$row[username]</a></span></div>"; // Cheapo usernames
            }
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        else { echo "No USERS found."; } // error message
                                                 
                                    
                        
?>
