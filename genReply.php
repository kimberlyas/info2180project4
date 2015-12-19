<?php

	include "cheapoDBConfig.php";

	session_start(); // Start Session

	$to = $_GET["to"]; // recipient_id
	$subject = $_GET["subject"]; // RE:

	// REPLY MESSAGE POP UP 

	
		echo "<div id='popup-wrapper2'>";
			echo "<div id='popup-container2'>";
				echo "<div class='model-header'>";
					?><button data-dismiss="modal" aria-hidden="true" class="close"><a href="javascript:void(0)" onclick="toggle_visibility('popup-box2');" class="link">x</a></button><?php
					echo "<h4 class='h4'>Reply</h4>"; 
				echo "</div>";
				echo "<div class='model-body'>";
					echo "<form class='form-horizonal' id='replyTo' action='' method= 'post'>";
						?><div class="form-group"><input type="text" id="receiver" class="form-control2" value="<?php echo $to; ?>"
							placeholder="
							<?php 
								// Get corresponding username to recipient id
								$mysql = "SELECT username FROM User WHERE id = '$to";
                    			$querry = mysql_query($mysql);

                    			if ($querry === false) {
                        			echo "Could not successfully run query ($sql) from DB: " . mysql_error();
                        			exit;
                     			}
                    			else if (mysql_num_rows($querry) > 0) {
                    				
                    				$data = mysql_fetch_array($querry);
                        			// print corresponding username
                        			echo "To: ".$data["username"];
						                    
                    			}
                    			else { echo "User not found";}
							?>" readonly></div> 
						<div class="form-group"><input type="text" class="form-control2" id="msgSubject" value="<?php echo $subject; ?>" placeholder="<?php echo "RE:".$subject; ?>" readonly></div>
						<div class="form-group">
						<div class="form-m-group"><span id="h4">Message</span></div>
						<textarea class="form-control" rows="18" id="message"></textarea>
						</div>
						<div class="model-footer">
						<div class="pull-right send-button animated"><input type = "button" onclick="replyTo()" id= "reply" value= "Reply"></div>
						<div class="pull-right-cancel cancel-button animated"><a href="javascript:void(0)" onclick="toggle_visibility('popup-box2');" class="link">Cancel</a></div>
					</div>
					</form>
				</div>
			</div>
		</div>
		</div>
	<?php

	
	
?>
