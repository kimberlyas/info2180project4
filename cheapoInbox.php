<?php
    include "cheapoDBConfig.php"; // Cheapo Mail Database Access

    session_start(); // Start Session

    // 10 most recent messages

    $row = null;
    $count = 0; 
   
    $userid = $_GET["id"];
    $sql = "SELECT * FROM Message";
    $query = mysql_query($sql);

    if ($query === false) {
        echo "Could not successfully run query ($sql) from DB: " . mysql_error();
        exit;
    }
        

    if (mysql_num_rows($query) > 0) { //If they match
            

            $num_rows = mysql_num_rows($query);
            
            // Print table
            echo "<table class='table table-mail' id='inboxMsgs'>"; 
            echo "<tbody>";
            echo "<td style= 'display: none' id= 'numRows'>$num_rows</td>"; // Number of records in table

            while($row = mysql_fetch_array($query))
            {
                // Get recipient id
                $recipients = explode(";",$row["recipient_ids"]);

                foreach ($recipients as $recipient)
                {
                    if ($recipient == $userid)
                    {
                        // Display that message details
                        $count++;
                         ?><tr class="tr  <?php //Determine record status
                                 $esqli = "SELECT date FROM message_read WHERE message_id = '$row[id]'";
                                 $results = mysql_query($esqli);
                                 if ($results === false) {
                                    echo "Could not successfully run query ($esqli) from DB: " . mysql_error();
                                    exit;
                                 }
                                else if (!mysql_num_rows($results) > 0) {
                                        // Record found therefore message has been read before
                                        echo "unread"; // Class
                                    }
                        ?>" id="msg$count"> <?php
                            echo "<td class='check-mail'>";
                                echo "<div>";
                                    echo "<input type='checkbox' id='box$count' name='check'/>";
                                    echo "<label for='box$count'></label>";
                                echo "</div>";
                            echo "</td>";
                        echo "<td style= 'display: none' id= 'idMsg$count'>$row[id]</td>"; // Message id

                        // I have the userid need to now search user table for a matching username
                        $mysql = "SELECT username FROM User WHERE id = '{$row['user_id']}'";
                        $querry = mysql_query($mysql);

                        if ($querry === false) {
                            echo "Could not successfully run query ($mysql) from DB: " . mysql_error();
                            exit;
                        }
                        else if (mysql_num_rows($querry) > 0) {

                            $data = mysql_fetch_array($querry);
                            // print corresponding username
                            echo "<td class='mail-contact' id= 'sender$count'><a href='#' onclick='readMsg($count);'>$data[username]</a></td>"; // Sender
                        }
                        else { echo "User not found";}

                        echo "<td class='mail-subject' id= 'subject$count'><a href='#' onclick='readMsg($count);'>$row[subject]</a></td>"; // Subject
                        echo "<td class style='width: 30px'></td>";
                        echo "<td class='mail-date' id= 'statusMsg$count'><a href='#' onclick='readMsg($count);'>";
                        ?><?php //Determine record status
                                 $esql = "SELECT date FROM message_read WHERE message_id = '$row[id]'";
                                 $result = mysql_query($esql);
                                 if ($result === false) {
                                    echo "Could not successfully run query ($esql) from DB: " . mysql_error();
                                    exit;
                                 }
                                else if (mysql_num_rows($result) > 0) {
                                        // Record found therefore message has been read before
                                        echo "READ";
                                    } else{ echo "UNREAD";}
                        ?><?php // Status
                        echo "</a></td>"; 
                        echo "</tr>";
                    }
                }
                
            }

            echo "</table>";
    }
    else { echo "No messages found."; }
                     
                      
?>
