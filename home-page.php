<?php  include "cheapoDBConfig.php";

	session_start(); // Start Session
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CheapoMail Home</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Arimo' rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="style-hp.css">
	<script type="text/javascript" src="popup.js"></script>
	<script type="text/javascript" src="cheapo.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script> $(document).ready(function(){
				setInterval(function(){
					$("#userList").load("displayUserList.php");
				}, 1000); //AUTO LOAD USER LIST every sec

				// Get userid of current logged in user
				var userID = document.getElementById("userID").value;
				
				// Get time user logged in
				//var loginTime = document.getElementById("loginTime").value;
				//var refresh = 0;

				setInterval(function(){
					/*// Get current time
					var time = new Date();
					var currentTime = time.getHours() + ":" + time.getMinutes(); + ":" + time.getSeconds();
					console.log(currentTime);
					
					console.log(refresh);
					if (refresh > 0)
					{
						// Get id of latest message --> idMsg10
						var lastID = document.getElementById("idMsg10").textContent;
					}
					else
					{
						var lastID = 2000;
					}

					// Create Datastring to be sent
					var dataString = '?id='+ userID + '&last=' + lastID + '&currentTime=' + currentTime;*/

					$("#inbox").load("cheapoInbox.php?id="+userID);

					//refresh++;
					

				}, 2000); // AUTO LoAD inbox messages



			}); 
		
	</script> 
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="topleft">
				<a href="home-page.php" class="logo">CheapoMail</a>
				<input name="search" type="text" id="search-style">
				<button id="button">Search</button>
				<div class="topright">
					<span id="username">
						<?php
							// Logged in User for home screen
 							if (isset($_SESSION["username"])) {
								echo $_SESSION["username"];
							}
						?>
					</span> <!-- UserName -->
					<!-- Hidden Fields for Session Data -->
					<input type="hidden" id="user" value="<?=$_SESSION['username'];?>"></input>
					<input type="hidden" id="userID" value="<?=$_SESSION['userID'];?>"></input>
					<input type="hidden" id="loginTime" value="<?=$_SESSION['loginTime'];?>"></input>
					<button id="logout" class="animated"><a href = "logout.php" style="color: #fff">Logout<a/></button>
				</div>
			</div>
		</div>
	</nav>
	<div class="option-bar">
		<div class="option-container">
			<button class="option-button animated btt"><a href="javascript:void(0)" onclick="toggle_visibility('popup-box');" class="link color-link">Compose</a></button>
			<button class="option-button animated btt"  style="visibility: 
						<?php if (isset($_SESSION["username"])) { 
								if($_SESSION["username"] != "Admin"){ 
									echo "hidden";}}
						?>"> <!-- Only visible for Admin user-->
			<a href="javascript:void(0)" onclick="toggle_visibility('popup-box3');" class="link color-link">Add New User</a></button>
			<!--<button class="option-button animated btt">Delete</button>-->
		</div>
	</div>
	<div class="body">
		<div class="body-left"> <!-- LIST OF USERS -->
			<div class="body-left-pos">
				<div class="oo">
					<div class="nm">
						<div class="tk" id="userList"> 
						<!-- individual Usernames displayed here using the format below -->
							<div class="aim ain">
								<div class="aiq to nZ">
									<div class="TN">
										<div class="aio"><span><a href="#" class="text"></a></span></div>
									</div>
								</div>
							</div>
							
							<div class="aim">
								<div class="aiq to nZ">
									<div class="TN">
										<div class="aio"><span><a href="#" class="text"></a></span></div>
									</div>
								</div>
							</div>
							 
							<div class="aim">
								<div class="aiq to nZ">
									<div class="TN">
										<div class="aio"><span><a href="#" class="text"></a></span></div>
									</div>
								</div>
							</div>
							
							<div class="aim">
								<div class="aiq to nZ">
									<div class="TN">
										<div class="aio"><span><a href="#" class="text"></a></span></div>
									</div>
								</div>
							</div>
							
						</div>
						<!--end of individual --> 
					</div>
				</div>
			</div>
		</div>
		<!-- end of body left -->
		<div class="body-right">
			<div id="inbox"> <!-- INBOX -->
				<table class="table table-mail"> 
					<tbody>
						<tr class="tr unread" id="msg">
							<td class="check-mail">
								<div>
									<input type="checkbox" id="box1" name="check">
									<label for="box1"></label>
								</div>
							</td>
							<td class="mail-contact">
								
							</td>
							<td class="mail-subject">
							
							</td>
							<td class style="width: 30px"></td>
							<td class="mail-date"></td>
						</tr>

						<tr class="tr unread">
							<td class="check-mail">
								<div>
									<input type="checkbox" id="box2" name="check">
									<label for="box2"></label>
								</div>
							</td>
							<td class="mail-contact">
							
							</td>
							<td class="mail-subject">
								
							</td>
							<td class style="width: 30px"></td>
							<td class="mail-date"></td>
						</tr>

						<tr class="tr unread">
							<td class="check-mail">
								<div>
									<input type="checkbox" id="box3" name="check">
									<label for="box3"></label>
								</div>
							</td>
							<td class="mail-contact">
						
							</td>
							<td class="mail-subject">
								
							</td>
							<td class style="width: 30px"></td>
							<td class="mail-date"></td>
						</tr>

						<tr class="tr unread">
							<td class="check-mail">
								<div>
									<input type="checkbox" id="box4" name="check">
									<label for="box4"></label>
								</div>
							</td>
							<td class="mail-contact">
								
							</td>
							<td class="mail-subject">
								
							</td>
							<td class style="width: 30px"></td>
							<td class="mail-date"></td>
						</tr>

						<tr class="tr unread">
							<td class="check-mail">
								<div>
									<input type="checkbox" id="box5" name="check">
									<label for="box5"></label>
								</div>
							</td>
							<td class="mail-contact">
								
							</td>
							<td class="mail-subject">
								
							</td>
							<td class style="width: 30px"></td>
							<td class="mail-date"></td>
						</tr>

						<tr class="tr unread">
							<td class="check-mail">
								<div>
									<input type="checkbox" id="box6" name="check">
									<label for="box6"></label>
								</div>
							</td>
							<td class="mail-contact">
								
							</td>
							<td class="mail-subject">
								 
							</td>
							<td class style="width: 30px"></td>
							<td class="mail-date"></td>
						</tr>

						<tr class="tr unread">
							<td class="check-mail">
								<div>
									<input type="checkbox" id="box7" name="check">
									<label for="box7"></label>
								</div>
							</td>
							<td class="mail-contact">
							
							</td>
							<td class="mail-subject">
								
							</td>
							<td class style="width: 30px"></td>
							<td class="mail-date"></td>
						</tr>

						<tr class="tr unread">
							<td class="check-mail">
								<div>
									<input type="checkbox" id="box8" name="check">
									<label for="box8"></label>
								</div>
							</td>
							<td class="mail-contact">
								
							</td>
							<td class="mail-subject">
								
							</td>
							<td class style="width: 30px"></td>
							<td class="mail-date"></td>
						</tr>

						<tr class="tr unread">
							<td class="check-mail">
								<div>
									<input type="checkbox" id="box9" name="check">
									<label for="box9"></label>
								</div>
							</td>
							<td class="mail-contact">
								
							</td>
							<td class="mail-subject">
								
							</td>
							<td class style="width: 30px"></td>
							<td class="mail-date"></td>
						</tr>

						<tr class="tr unread">
							<td class="check-mail">
								<div>
									<input type="checkbox" id="box10" name="check">
									<label for="box10"></label>
								</div>
							</td>
							<td class="mail-contact">
								
							</td>
							<td class="mail-subject">
								
							</td>
							<td class style="width: 30px"></td>
							<td class="mail-date"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!-- end of body middle -->
		<div class="body-last" id="msgView">
			<div class="mail-box-header" > <!-- VIEW MESSAGE -->
				<div class="pull-right animated">
					<a href="https://docs.google.com/document/d/1MVz2yxtQd0JtXuTJ6FFmbnyRC_gMn-dlpmsXupZMXs8/edit#" target="_blank" class="link color-link reply">Need Help?</a>
				</div>
				<h2 class="h2"></h2>
				<div class="mail-address">
					<h3 class="h3"><span class="font-normal"> </span> </h3>
					<img src= "http://cdn.shopify.com/s/files/1/0185/5092/products/nature-0024.png?v=1369543563" alt= "Front-Facing Chick" style= "display: normal" id= "inactive" />
					<h5 class="h5"><span class="font-normal"></span></h5>
				</div>
			</div> <!-- end of header -->			
			<div class="mail-box" > <!-- style="background-color:#2E3740" -->
				<div class="mail-body">
					<p align="center">NO MESSAGE SELECTED<br>
					<br></p>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- end of body -->
	<div id="popup-box" class="popup-position"> <!-- COMPOSE MESSAGE POP UP -->
		<div id="popup-wrapper">
			<div id="popup-container">
				<div class="model-header">
					<button data-dismiss="modal" aria-hidden="true" class="close"><a href="javascript:void(0)" onclick="toggle_visibility('popup-box');" class="link">x</a></button>
					<h4 class="h4">Compose Message</h4>
				</div>
				<div class="model-body">
					<form class="form-horizonal" id="composeNew" action="" method= "post">
						<div class="form-group"><input type="text" id="recipients" placeholder="To:"></div>
						<div class="form-group"><input type="text" id="subject" placeholder="Subject"></div>
						<div class="form-group">
						<div class="form-m-group"><span id="h4">Message</span></div>
						<textarea rows="18" id="body"></textarea>
						</div>
						<div class="model-footer">
						<div class="pull-right send-button animated"><input type = "button" onclick="compose()" id= "send" value= "Send"></div>
						<div class="pull-right-cancel cancel-button animated"><a href="javascript:void(0)" onclick="toggle_visibility('popup-box');" class="link" style="color:#fff">Cancel</a></div>
					</div>
					</form>
					
				</div>
				<!-- pop up body -->
			</div>
		</div>
	</div>
		<div id="popup-box2" class="popup-position"> <!-- REPLY MESSAGE POP UP -->
		<div id="popup-wrapper2">
			<div id="popup-container2">
				<div class="model-header">
					<button data-dismiss="modal" aria-hidden="true" class="close"><a href="javascript:void(0)" onclick="toggle_visibility('popup-box2');" class="link">x</a></button>
					<h4 class="h4">Reply</h4>
				</div>
				<div class="model-body">
					<form class="form-horizonal" id="replyTo" action="" method= "post">
						<div class="form-group"><input type="text" id="receiver" class="form-control2" placeholder="To:" readonly></div>
						<div class="form-group"><input type="text" class="form-control2" id="msgSubject" placeholder="Subject" readonly></div>
						<div class="form-group">
						<div class="form-m-group"><span id="h4">Message</span></div>
						<textarea class="form-control" rows="18"  id="message" required></textarea>
						</div>
						<div class="model-footer">
						<div class="pull-right send-button animated"><input type = "button" onclick="reply()" id= "reply" value= "Reply"></div>
						<div class="pull-right-cancel cancel-button animated"><a href="javascript:void(0)" onclick="toggle_visibility('popup-box2');" class="link" style="color:#fff">Cancel</a></div>
					</div>
					</form>
					
				</div>
				<!-- pop up body -->
			</div>
		</div>
	</div>
		<div id="popup-box3" class="popup-position"> <!-- ADD NEW USER POP UP -->
		<div id="popup-wrapper3">
			<div id="popup-container3">
				<div class="model-header">
					<button data-dismiss="modal" aria-hidden="true" class="close"><a href="javascript:void(0)" onclick="toggle_visibility('popup-box3');" class="link">x</a></button>
					<h4 class="h4">New User</h4>
				</div>
				<div class="model-body">
					<form class="form-horizonal" id="NewUser" action="" method= "post">
						<div class="form-group"><input type="text" class="form-control2" id="firstName" class="form-control" placeholder="First Name:" ></div>
						<div class="form-group"><input type="text" class="form-control2" id="lastName" class="form-control" placeholder="Last Name:" ></div>
						<div class="form-group"><input type="text" class="form-control2" id="username" class="form-control" placeholder="User Name:" ></div>
						<div class="form-group"><input type="password" id="password" class="form-control" placeholder="Password:" required></div>
						<div class="form-group"><input type="password" id="password2" class="form-control" placeholder="Re-type Password:" required></div>
						<div class="model-footer">
						<div class="pull-right send-button animated"><input type = "button" id= "save" onclick="addNew()" value= "Save"></div>
						<div class="pull-right-cancel cancel-button animated"><a href="javascript:void(0)" onclick="toggle_visibility('popup-box3');" class="link" style="color:#fff">Cancel</a></div>
					</div>
					</form>
				
				</div>
				<!-- pop up body -->
			</div>
		</div>
	</div>


</body>
</html>
