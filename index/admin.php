<?php
	error_reporting(0);
	session_start();
	if(!isset($_SESSION['myusername'])){ //if login in session is not set
    header("Location:adminSignIn.php");
	
}
	include '../mysqli_connect.php';
	
	if(isset($_GET['food_id'])){
		$foodId = $_GET['food_id'];
        $query="DELETE FROM food_table WHERE food_id like '$foodId'";$result=mysqli_query($dbc, $query);
		mysqli_close();
	}
	
	if(isset($_GET['dist_id'])){
		$distId = $_GET['dist_id'];
        $query="DELETE FROM physical_activities_dist_type_table WHERE physical_activity_dist_id like '$distId'";$result=mysqli_query($dbc, $query);
		mysqli_close();
	}
	
	if(isset($_GET['msg'])){	
		$msg = $_GET['msg'];
		if ($msg == "success"){
			?> <script> alert("Added Successfully"); </script> <?php
		} else if ($msg ==  "fail"){
			?> <script> alert("Please fill up all fields!"); </script> <?php
		} else if ($msg ==  "special"){
			?> <script> alert("Special Characters ()!@#$%^&* are not allowed!"); </script> <?php
		}
	}
?>
<html>
  <head>
    <title>Admin</title>
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/typeahead.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.theme.min.css">
	<link rel="stylesheet" href="css/admin.css">
    <script>
    $(document).ready(function(){

		$('input.typeahead').typeahead({
			name: 'typeahead',
			remote:'search.php?key=%QUERY',
			limit : 10
		});
	});
    </script>
	
	<script>
    $(document).ready(function(){

		$('input.typeahead2').typeahead({
			name: 'typeahead2',
			remote:'search2.php?key=%QUERY',
			limit : 10
		});
	});
    </script>
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
			
			<div class="col-md-3" id="addFood"><!--form for physical act and food intake-->
				
				<form action="createFood.php" method="post">
					
					<span class="thumb"><h3>Add Food</h3></span>
					
						<span><p>Add new food item</p></span>
						
						  <div class="list1" style="border:1px solid #E0E0E0; width: 260px; padding-top:5px; padding-left:5px;">
							<ul style="margin-left:-40px;">
								<strong>Food Name</strong><span style="margin-left:50px;"><strong>Calories</strong><span style="margin-left:20px;"><br>
								<input name="foodName" type="text" style="margin-left:0px;width:95px; height:22px; margin-bottom:3px;"></input>
								<input name="calories" type="number" min="0" max="500" style="margin-left:30px;width:55px; height:22px; margin-bottom:3px;"></input>
								
								
							</ul>
						  </div><!--end of list-->
						
				
					<input type="submit" name="submit" value="Submit" style="position: absolute; top: 110px; width:30%; margin-left:80px; margin-top:50px; margin-bottom:8px; border-radius:4px; background-color:#AA3939; color:white;"/>
				</form>	
			</div>
			
			<div class="col-md-3" id="addDist"><!--form for physical act and food intake-->
				
				<form action="createDist.php" method="post">
					
					<span class="thumb"><h3>Add Activity (Distance Type)</h3></span>
					
						<span><p>Add new activity</p></span>
						
						  <div class="list1" style="border:1px solid #E0E0E0; width: 260px; padding-top:5px; padding-left:5px;">
							<ul style="margin-left:-40px;">
								<strong>Activity Name</strong><span style="margin-left:50px;"><br>
								<input name="distName" type="text" style="margin-left:0px;width:95px; height:22px; margin-bottom:3px;"></input>
								
								
							</ul>
						  </div><!--end of list-->
						
				
					<input type="submit" name="submit" value="Submit" style="position: absolute; top: 110px; width:30%; margin-left:80px; margin-top:50px; margin-bottom:8px; border-radius:4px; background-color:#AA3939; color:white;"/>
				</form>	
			</div>

			<div class="col-md-3" id="food">
			<div class="panel panel-default" style="margin-left: -15px; width: 334px; height: 350px; overflow-y: scroll;">
			<div class="bs-example">
				<h3>Food</h3>
				<input type="text" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Search">
				<?php
					$query="SELECT * FROM food_table ORDER BY food_name ASC";
					$result=mysqli_query($dbc, $query);
					echo "<p></p>";
					echo "<div style='width:100%; margin-left:auto; margin-right:auto; margin-top:30px;'><center><table class='rockwell' style='border-radius:10px;'>";
					

					while($row = mysqli_fetch_array($result)){
						echo
						"<table border='0' cellpadding='0px' cellspacing='1px' style='font-family:Verdana, Geneva, sans-serif; color:black; font-size:13px;' width='80%'>"
						."<tr><td width = '60%' style='vertical-align: middle;'>"
						."<div style='padding: 0px;'>" . "<br><span class='caption'>" . $row['food_name'] . "</span></div>"
						. "</td>"
						
						."<td align='left'>
							<a href='admin.php?food_id=".$row['food_id']."'" ?> onclick="return confirm('Are you sure you want to delete this food?')";<?php echo "><button class='btn' type='button' style='background-color: #AA3939;'><strong><center><font size='1'>Delete</font></center></strong></button></a>
						</td>"	
							
						."</table>";
					}
					echo '</table>';
				?>
			</div>
			</div>
			</div>
			
		</div>  
		
		<div id="dist">
			<div class="panel panel-default" style="margin-left: -15px; width: 334px; height: 350px; overflow-y: scroll;">
			<div class="bs-example">
				<h3>Activity (Distance)</h3>
				<input type="text" name="typeahead2" class="typeahead2 tt-query" autocomplete="off" spellcheck="false" placeholder="Search">
				<?php
					$query="SELECT * FROM physical_activities_dist_type_table ORDER BY physical_activity_dist_type ASC";
					$result=mysqli_query($dbc, $query);
					echo "<p></p>";
					echo "<div style='width:100%; margin-left:auto; margin-right:auto; margin-top:30px;'><center><table class='rockwell' style='border-radius:10px;'>";
					

					while($row = mysqli_fetch_array($result)){
						echo
						"<table border='0' cellpadding='0px' cellspacing='1px' style='font-family:Verdana, Geneva, sans-serif; color:black; font-size:13px;' width='80%'>"
						."<tr><td width = '60%' style='vertical-align: middle;'>"
						."<div style='padding: 0px;'>" . "<br><span class='caption'>" . $row['physical_activity_dist_type'] . "</span></div>"
						. "</td>"
						
						."<td align='left'>
							<a href='admin.php?dist_id=".$row['physical_activity_dist_id']."'" ?> onclick="return confirm('Are you sure you want to delete this activity?')";<?php echo "><button class='btn' type='button' style='background-color: #AA3939;'><strong><center><font size='1'>Delete</font></center></strong></button></a>
						</td>"
							
						."</table>";
					}
					echo '</table>';
				?>
			</div>
			</div>
			</div>
			
		</div>

  </body>
</html>
