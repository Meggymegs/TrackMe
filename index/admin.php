<?php
	error_reporting(0);
	session_start();
	if(!isset($_SESSION['myusername'])){ //if login in session is not set
    header("Location:adminSignIn.php");
	
}
	include '../mysqli_connect.php';
?>
<!doctype html>
<html>
	<head>
		<title>Admin</title>
		<link rel="stylesheet" href='css/fullcalendar/fullcalendar.css' />
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap.theme.min.css">
		<link rel="stylesheet" href="css/admin.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<script src='js/lib/jquery.min.js'></script>
		<script src="js/bootstrap.min.js"></script>
		<script src='js/lib/moment.min.js'></script>
		<script src='js/fullcalendar.js'></script>
	</head>
	
	<body style="background-color:#2d3e50;">
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
			  <a class="navbar-brand" href="admin.php">
				<img class="logo" src="assets/images/trackmelogo.png">
			  </a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				  
					<font color = "white">	
					<?php
					$myusername = $_SESSION['myusername'];
					$result = mysqli_query($dbc, "SELECT * FROM `users_table` WHERE user_email like '$myusername'"); 
					while ($row = mysqli_fetch_assoc($result)) {
						echo $row['first_name']. " " . $row['last_name'];
					}
					?>
				  </font><span class="caret"></span></a>
				  
				  <ul class="dropdown-menu" role="menu">
					<li><a href="profile.php">Profile</a></li>
					<li><a href="accountSettings.php">Account Settings</a></li>
					<li><a href="calendar.html">Calendar</a></li>
					<li><a href="logout.php">Log Out</a></li>
					<li class="divider"></li>
					<li><a href="#">Help</a></li>
					<li><a href="#">Report a problem</a></li>
				  </ul>
				</li>
			  </ul>
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		
		<div class="container">
			
			<div class="col-md-3"><!--form for physical act and food intake-->
				
				<form action="submitActivities.php" method="post">
					
					<span class="thumb"><h3>Add Food</h3></span>
					
						<span><p>Add new food item</p></span>
						
						  <div class="list1" style="border:1px solid #E0E0E0; width: 260px; padding-top:5px; padding-left:5px;">
							<ul style="margin-left:-40px;">
								<strong>Activity</strong><span style="margin-left:50px;"><strong>Calories</strong><span style="margin-left:20px;"><br>
								Running
								<input name="run_hrs" type="number" min="0" max="500" style="margin-left:45px;width:35px; height:22px; margin-bottom:3px;"></input>
								<br> 
								
							</ul>
						  </div><!--end of list-->
						
					
					<br>
					<input type="submit" name="submit" value="Submit" style="width:30%; margin-left:80px; margin-top:50px; margin-bottom:8px; border-radius:4px; background-color:#AA3939; color:white;"/>
				</form>
				
				
				
			</div>
			
		</div>
	</body>
</html>