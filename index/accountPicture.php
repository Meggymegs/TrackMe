<?php
	session_start();
	include '../mysqli_connect.php';
?>

<!doctype html>
<html>
	<head>
		<title>Account Settings</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap.theme.min.css">
		<link rel="stylesheet" href="css/settings.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<head>
	<body>
		<nav class="navbar navbar-inverse navbar-static-top">
		  <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="profile.php">
				<img class="logo" src="assets/images/trackmelogo.png">
			  </a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				  
						<img src="
							<?php
							$myusername = $_SESSION['myusername'];
							$result = mysqli_query($dbc, "SELECT * FROM `users_table` WHERE user_email like '$myusername'"); 
							while ($row = mysqli_fetch_assoc($result)) {
								echo $row['user_profile_pic'];
							}
							?>
						" class="navbar-pic" height="20" width="20"><font color = "white">
						
					<?php
					$result = mysqli_query($dbc, "SELECT * FROM `users_table` WHERE user_email like '$myusername'"); 
					while ($row = mysqli_fetch_assoc($result)) {
						echo $row['first_name']. " " . $row['last_name'];
					}
					?>
				  </font><span class="caret"></span></a>
				  
				  <ul class="dropdown-menu" role="menu">
					<li><a href="accountSettings.php">Account Settings</a></li>
					<li><a href="profile.php">Profile</a></li>
					<li><a href="calendar.html">Calendar</a></li>
					<li><a href="index.html">Log Out</a></li>
					<li class="divider"></li>
					<li><a href="#">Help</a></li>
					<li><a href="#">Report a problem</a></li>
				  </ul>
				</li>
			  </ul>
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

		<div class="acctSettings">
		
		<div class="btn-group-vertical" role="group" aria-label="...">
			<div class="btn-group" id="account" role="group">
				<a class="btn btn-default" href="accountSettings.php">Account >></a>
			</div>
			<div class="btn-group" role="group">
				<a class="btn btn-default" href="#">Profile Picture >></a>
			</div>
			<div class="btn-group" role="group">
				<a class="btn btn-default" href="accountPassword.php">Password >></a>
			</div>
		</div>
		
		<div class="panel panel-default">
			 <div class="panel-heading">
				<h3 class="panel-title">Change Profile Picture</h3>
			 </div>
			 <div class="panel-body">
				<form id="formPos" action="updatePicture.php" method="get">
					Select image to upload: <input type="file" name="displayPicture" id="displayPicture" required><br><br>
					<button type="submit" class="btn btn-submit">Upload Image</button>
				</form>
			 </div>
		</div>
		
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</head>