<?php
	error_reporting(0);
	session_start();
	if(!isset($_SESSION['myusername'])){ //if login in session is not set
    header("Location:signin.php");
	$myusername = $_SESSION['myusername'];
}
	include '../mysqli_connect.php';
	
	if(isset($_GET['msg'])){	
		$msg = $_GET['msg'];
		if ($msg == "success"){
			?> <script> alert("Food added Successfully"); </script> <?php
		} else if ($msg ==  "fail"){
			?> <script> alert("Food not found. Please select one from our suggestions."); </script> <?php
		}
	}
	
	session_start();
	$tbl_user = "users_table";
	$myusername = $_SESSION['myusername'];
	$user_id = 0;
	$userID = mysqli_query($dbc, "SELECT user_id FROM $tbl_user WHERE user_email like '$myusername'");
	while ($row = mysqli_fetch_assoc($userID)) {
		$user_id = $user_id + $row['user_id'];
	}
?>
<!doctype html>
<html>
	<head>
		<title>Profile</title>
		<link rel="shortcut icon" href="res/title bar icon.png" type="image/png"/>
		<link rel="stylesheet" href='css/fullcalendar/fullcalendar.css' />
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap.theme.min.css">
		<link rel="stylesheet" href="css/profile.css">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<script src="chartjs/Chart.js"></script>
		<script src='js/lib/jquery.min.js'></script>
		<script>
			$(document).ready(function(){

				$('input.typeahead').typeahead({
					name: 'typeahead',
					remote:'search.php?key=%QUERY',
					limit : 10
				});
			});
		</script>
	</head>
	<body style="background-color:#bdc3c7;">
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
					<li><a href="profile.php">Profile</a></li>
					<li><a href="accountSettings.php">Account Settings</a></li>
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
			<div class="col-md-2"> <!--for the user info -->
				<img src="
					<?php
					$result = mysqli_query($dbc, "SELECT * FROM `users_table` WHERE user_email like '$myusername'"); 
					while ($row = mysqli_fetch_assoc($result)) {
						echo $row['user_profile_pic'];
					}
					?>
				" class="sidebar-pic" style="border-radius:100px; height:150px; width:150px; margin-top:30px; margin-bottom:60px;">
				
				<?php
					$result = mysqli_query($dbc, "SELECT * FROM `users_table` WHERE user_email like '$myusername'"); 
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<span style='font-size:50px;'>" . $row['first_name'] . " " . $row['last_name'] . "</span>";
					}
				?>
				<div style="float:right; margin-top:35px; margin-right:40px; font-size:25px; width:10em; word-wrap: break-word;">
					<b>Age:</b>
					<?php
						$result = mysqli_query($dbc, "SELECT * FROM `users_table` WHERE user_email like '$myusername'"); 
						while ($row = mysqli_fetch_assoc($result)) {
						$birthday = $row['user_birthdate'];
						$birthday = explode("-", $birthday);
						//get age from date or birthdate
						$age = (date("md", date("U", mktime(0, 0, 0, $birthday[1], $birthday[2], $birthday[0]))) > date("md")
							? ((date("Y") - $birthday[0]) - 1)
							: (date("Y") - $birthday[0]));
						echo $age;
						}
					?><br>
					<?php
						$result = mysqli_query($dbc, "SELECT * FROM `users_table` WHERE user_email like '$myusername'"); 
						$row = mysqli_fetch_assoc($result);
						$tempId = $row['user_id'];
						$result2 = mysqli_query($dbc, "SELECT * FROM `body_measurement_table` WHERE user_id like '$tempId'"); 
						$count=mysqli_num_rows($result2);

						if($count==0){
							echo "You have not entered any information yet. Please <b>update body measurements</b>.";
						}else{
					?><br>
					<b>Weight:</b>
					<?php
						$result = mysqli_query($dbc, "SELECT t1.*
						FROM body_measurement_table t1
						WHERE body_measurement_type_id = 2 AND t1.date_created = (SELECT t2.date_created
										 FROM body_measurement_table t2
										 WHERE t2.user_id = t1.user_id 
										 ORDER BY t2.date_created DESC
										 LIMIT 1)"); 
						$row = mysqli_fetch_assoc($result);
						echo $row['body_measurement_value'] . " kg";
					?>
					<br>
					<b>Height:</b>
					<?php
						$result = mysqli_query($dbc, "SELECT t1.*
						FROM body_measurement_table t1
						WHERE body_measurement_type_id = 1 AND t1.date_created = (SELECT t2.date_created
										 FROM body_measurement_table t2
										 WHERE t2.user_id = t1.user_id 

										 ORDER BY t2.date_created DESC
										 LIMIT 1)"); 
						$row = mysqli_fetch_assoc($result);
						echo $row['body_measurement_value'] . " cm";
						}
					?>
				</div><!--end of div profile details-->
			</div><!--end of col-md-2-->
			<div class="col-md-6"> <!--for the calendar-->
				<h1 align="center"><?php
					$result = mysqli_query($dbc, "SELECT UPPER(first_name) AS first_name FROM `users_table` WHERE user_email like '$myusername'"); 
					while ($row = mysqli_fetch_assoc($result)) {
						echo $row['first_name']."'S";
					}
					?> CALENDAR</h1>
				<div id="calendar"></div>
			</div><!--end of col-md-6-->
			
			<div class="col-md-7">
				<!--<center><h1>place graph here</h1></center>-->
				<span style="text-align:center;">
					<h3 align="center"><?php
						$result = mysqli_query($dbc, "SELECT first_name AS first_name FROM `users_table` WHERE user_email like '$myusername'"); 
						while ($row = mysqli_fetch_assoc($result)) {
							echo $row['first_name']."'s";
						}
						?> Progress</h3>
				</span>
				<div style="width:65%; margin-left:auto; margin-right:auto;">
					<div>
						<canvas id="canvas" height="450" width="600"></canvas>
					</div>
				</div>
			</div><!--end of col-md-7-->
			
			<div class="col-md-5">
				<span style="text-align:center;">
				<h3 align="center"><?php
						$result = mysqli_query($dbc, "SELECT first_name AS first_name FROM `users_table` WHERE user_email like '$myusername'"); 
						while ($row = mysqli_fetch_assoc($result)) {
							echo $row['first_name']."'s";
						}
						?> History</h3>
				</span>
				<div class="history" style="overflow-y:scroll; height:400px; width: 260px; border:1px solid #E0E0E0; padding-top:5px; padding-left:5px;">
				<?php
				echo "<b>Time-based activities:</b><br>";
				$userID = mysqli_query($dbc, "SELECT * FROM physical_activities_dist_table a, physical_activities_dist_type_table b WHERE user_id = '$user_id' AND a.physical_activity_dist_id = b.physical_activity_dist_id");
				while ($row = mysqli_fetch_assoc($userID)) {
					echo "<div style='border:1px solid #E0E0E0; border-left-style:none; border-right-style:none;'>";
					echo "<b>" . $row['date_created'] . ":</b>" . "<br>";
					echo $row['physical_activity_dist_type'] . " for " . $row['time'] . " hours for " . $row['distance'] . " kilometers<br></div>";
				}
				echo "<br>";
				echo "<b>Rep/set-based activities:</b><br>";
				$userID = mysqli_query($dbc, "SELECT * FROM physical_activities_rep_table a, physical_activities_rep_type_table b WHERE user_id = 2 AND a.physical_activity_rep_id = b.physical_activity_rep_id ");
				while ($row = mysqli_fetch_assoc($userID)) {
					echo "<div style='border:1px solid #E0E0E0; border-left-style:none; border-right-style:none;'>";
					echo "<b>" . $row['date_created'] . ":</b>" . "<br>";
					echo $row['physical_activity_rep_type'] . " for " . $row['number_of_reps'] . " reps and " . $row['number_of_sets'] . " sets<br></div>";
				}
				echo "<br>";
				echo "<b>Food intake:</b><br>";
				$userID = mysqli_query($dbc, "SELECT * FROM food_served_table a, food_table b WHERE user_id = 2 AND a.food_id = b.food_id ");
				while ($row = mysqli_fetch_assoc($userID)) {
					echo "<div style='border:1px solid #E0E0E0; border-left-style:none; border-right-style:none;'>";
					echo "<b>" . $row['date_created'] . ":</b>" . "<br>";
					echo "Ate " . $row['food_serving'] . " servings of " . $row['food_name'] . "<br></div>";
				}
				echo "<br>";
				echo "<b>Body measurements:</b><br>";
				$userID = mysqli_query($dbc, "SELECT * FROM body_measurement_table a, body_measurement_type_table b WHERE user_id = '$user_id' AND a.body_measurement_type_id = b.body_measurement_type_id");
				while ($row = mysqli_fetch_assoc($userID)) {
					echo "<div style='border:1px solid #E0E0E0; border-left-style:none; border-right-style:none;'>";
					echo "<b>" . $row['date_created'] . ":</b>" . "<br>";
					echo "Updated " . $row['body_measurement_type'] . " to " . $row['body_measurement_value'] . "<br></div>";
				}
				echo "<br>";
				echo "<b>Vital measurements:</b><br>";
				$userID = mysqli_query($dbc, "SELECT * FROM vital_signs_table a, vital_signs_type_table b WHERE user_id = '$user_id' AND a.vital_signs_type_id = b.vital_signs_type_id");
				while ($row = mysqli_fetch_assoc($userID)) {
					echo "<div style='border:1px solid #E0E0E0; border-left-style:none; border-right-style:none;'>";
					echo "<b>" . $row['date_created'] . ":</b>" . "<br>";
					echo "Updated " . $row['vital_signs_type'] . " to " . $row['vital_signs_value'] . "<br></div>";
				}
				?>
				</div>
			</div><!--end of user history-->
			
			<div id='matDesPlus'>
				<a href='#' onclick='lightbox_open();'><img src='http://cliparts.co/cliparts/8cz/Kny/8czKnyREi.png' alt='upload new photo' width='50px'></a>
			</div><!--end of div matDesPlus-->
			
			<div id='light'>
				<div id="formHeader" style="margin-left:auto; margin-right:auto; background-color:#ecf0f1; width:30%; border-radius:10px;">
					<h1 style="text-align:center;">FORMS</h1>
					<span style="text-align:center;"><p>Please check the items you wish to add.</p></span>
				</div>
					<div class="col-md-3"><!--form for physical act and food intake-->
						<form action="submitActivities.php" method="post">
							<span class="thumb"><h3>Physical Activity</h3></span>
								<input id="togList1" type="checkbox">
								  <label for="togList1">
									<span><p>Add time based activities<img src="res/addButton.png" style="margin-left:28px;" width="20px" height="20px"></p></span>
									<span style="color:#AA3939;"><p>Collapse</p></span>
								  </label>
								  <div class="list1" style="border:1px solid #E0E0E0; width: 260px; padding-top:5px; padding-left:5px;">
									<ul style="margin-left:-40px;">
										<strong>Activity</strong><span style="margin-left:50px;"><strong>Hours</strong><span style="margin-left:20px;"><strong>Mins</strong><span style="margin-left:20px;"><strong>KM</strong><br>
										<input class="TimeAct" type="checkbox" name="running" value="running">Running</input> 
										<input name="run_hrs" type="number" min="0" max="24" style="margin-left:35px;width:35px; height:22px; margin-bottom:3px;"></input>
										<input name="run_mins" type="number" min="0" max="59" style="margin-left:18px;width:35px; height:22px; margin-bottom:3px;"></input>
										<input name="run_dist" type="number" min="0" max="1" style="margin-left:10px;width:35px; height:22px; margin-bottom:3px;"></input>
										<br> 
										
										<input class="TimeAct" type="checkbox" name="walking" value="walking">Walking</input> 
										<input name="walk_hrs" type="number" min="0" max="24" style="margin-left:38px;width:35px; height:22px; margin-bottom:3px;"></input>
										<input name="walk_mins" type="number" min="0" max="59" style="margin-left:18px;width:35px; height:22px; margin-bottom:3px;"></input>
										<input name="walk_dist" type="number" min="0" max="1" style="margin-left:10px;width:35px; height:22px; margin-bottom:3px;"></input>
										<br> 
										
										<input class="TimeAct" type="checkbox" name="jogging" value="jogging">Jogging</input> 
										<input name="jog_hrs" type="number" min="0" max="24" style="margin-left:38px;width:35px; height:22px; margin-bottom:3px;"></input>
										<input name="jog_mins" type="number" min="0" max="59" style="margin-left:18px;width:35px; height:22px; margin-bottom:3px;"></input>
										<input name="jog_dist" type="number" min="0" max="1" style="margin-left:10px;width:35px; height:22px; margin-bottom:3px;"></input>
										<br> 
										<!--check all-->
										<input type="checkbox" onchange="checkAllTimeAct(this)" name="chk[]" value="all" />All
									</ul>
								  </div><!--end of list-->
								<br>
								<input id="togList2" type="checkbox">
								  <label for="togList2">
									<span><p>Add rep/set based activities<img src="res/addButton.png" style="margin-left:10px;" width="20px" height="20px"></p></span>
									<span style="color:#AA3939;"><p>Collapse</p></span>
								  </label>
								  <div class="list2" style="overflow-y:scroll; height:100px; width: 260px; border:1px solid #E0E0E0; padding-top:5px; padding-left:5px;">
									<ul style="margin-left:-40px;">
										<strong>Activity</strong><span style="margin-left:55px;"><strong>Reps</strong><span style="margin-left:45px;"><strong>Sets</strong><br>
										<input class="RepSetAct" type="checkbox" name="pushUp" value="pushUp">Push up</input> 
										<input name="pushReps" type="number" min="0" style="margin-left:32.5px;width:50px; height:22px"> 
										<input name="pushSets" type="number" min="0" style="margin-left:25px;width:50px; height:22px; margin-bottom:1px;"><br> 
										
										<input class="RepSetAct" type="checkbox" name="pullUp" value="pullUp">Pull up</input> 
										<input name="pullReps" type="number" min="0" style="margin-left:41.5px;margin-top:2px;width:50px;height:22px"> 
										<input name="pullSets" min="0" type="number" style="margin-left:25px;width:50px; height:22px; margin-bottom:3px;"><br> 
										
										<input class="RepSetAct" type="checkbox" name="benchPress" value="benchPress">Bench press</input> 
										<input name="benchReps" type="number" min="0" style="margin-left:5.5px;width:50px; height:22px"> 
										<input name="benchSets" type="number" min="0" style="margin-left:25px;width:50px; height:22px; margin-bottom:1px;"><br> 
										
										<input class="RepSetAct" type="checkbox" name="curlUps" value="curlUps">Curl ups</input> 
										<input name="curlReps" type="number" min="0" style="margin-left:32px;margin-top:2px;width:50px;height:22px"> 
										<input name="curlSets" type="number" min="0" style="margin-left:25px;width:50px; height:22px; margin-bottom:1px;"><br> 
										
										<input class="RepSetAct" type="checkbox" name="legPress" value="legPress">Leg press</input> 
										<input name="legReps" type="number" min="0" style="margin-left:22px;margin-top:2px;width:50px;height:22px">
										<input name="legSets" type="number" min="0" style="margin-left:25px;width:50px; height:22px; margin-bottom:1px;"><br> 
										
										<input class="RepSetAct" type="checkbox" name="latPulldown" value="latPulldown">Lat pulldown</input>
										<input name="latReps" type="number" min="0" style="margin-left:4.5px;margin-top:2px;width:50px;height:22px"> 
										<input name="latSets" type="number" min="0" style="margin-left:25px;width:50px; height:22px; margin-bottom:1px;"><br> 
										
										<input class="RepSetAct" type="checkbox" name="lyingLegCurl" value="lyingLegCurl">Lying leg curl</input>
										<input name="lyingReps" type="number" min="0" style="margin-left:.5px;margin-top:2px;width:50px;height:22px">
										<input name="lyingSets" type="number" min="0" style="margin-left:25px;width:50px; height:22px; margin-bottom:1px;"><br> 
										<!--check all-->
										<input type="checkbox" onchange="checkAllRepSetAct(this)" name="chk[]" />All
									</ul>
								  </div><!--end of list--><br>
							
							&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot
							
							<span class="thumb"><h3>Food intake</h3></span>
						<input id="togList3" type="checkbox">
						  <label for="togList3">
							<span><p>Add food consumed<img src="res/addButton.png" style="margin-left:60px;" width="20px" height="20px"></p></span><!--<p>Click <span style="color:#AA3939;">ME</span> to add food consumed</p>-->
							<span style="color:#AA3939;"><p>Collapse</p></span>
						  </label>
						  <div class="list3" style="height:100px; width: 260px; border:1px solid #E0E0E0; padding-top:5px; padding-left:5px;">
							<ul style="margin-left:-40px;">
								<strong>Food</strong><span style="margin-left:40px;"><strong>Servings & </span><span style="margin-left:2px;">Servings</strong><br>
								<input type="text" name="typeahead" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Search">
									<select name="srvng1" value="srvng1" style="margin-left:6px; width:45px; margin-bottom:3px;">
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
									<select name="srvng2" value="srvng2" style="margin-left:20px; width:45px; margin-bottom:3px;">
										<option value="0">0</option>
										<option value=".5">1/2</option>
										<option value=".33">1/3</option>
										<option value=".25">1/4</option>
										<option value=".2">1/5</option>
										<option value=".17">1/6</option>
									</select>
									<br><!--end of choice-->
							</ul>
						  </div><!--end of list--><br>
							<input id="foodActForm" type="submit" name="submit" value="Submit"/>
						</form>
					</div><!--end of col-md-3-->
					<div class="col-md-4">
						<form action="bodyvital.php" method="post">
							<span class="thumb"><h3>Body Measurements</h3></span>
							<input id="togList4" type="checkbox">
							<label for="togList4">
									<span><p>Update body measurements<img src="res/addButton.png" style="margin-left:20px;" width="20px" height="20px"></p></span><!--<p>Click <span style="color:#AA3939;">ME</span> to add food consumed</p>-->
									<span style="color:#AA3939;"><p>Collapse</p></span>
							</label>
							<div class="list4" style="overflow-y:scroll; height:100px; width: 260px; border:1px solid #E0E0E0; padding-top:5px; padding-left:5px;">
								<ul style="margin-left:-40px;">
								<strong>Location</strong><span style="margin-left:60px;"><strong>Measurement</strong></span><br>
								<input class="body" type="checkbox" name="body1" value="height">Height (m)</input>
								<input type="text" name="height" size=1 style="margin-left:60px;"><br>
								<input class="body" type="checkbox" name="body2" value="weight">Weight (kg)</input>
								<input type="text" name="weight" size=1 style="margin-left:54px;"><br>
								<input class="body" type="checkbox" name="body3" value="waist">Waist (cm)</input>
								<input type="text" name="waist" size=1 style="margin-left:59px;"><br>
								<input class="body" type="checkbox" name="body4" value="wrist">Wrist (cm)</input>
								<input type="text" name="wrist" size=1 style="margin-left:62px;"><br>
								<input class="body" type="checkbox" name="body5" value="hip">Hip (cm)</input>
								<input type="text" name="hip" size=1 style="margin-left:73px;"><br>
								<input class="body" type="checkbox" name="body6" value="forearm">Forearm (cm)</input>
								<input type="text" name="forearm" size=1 style="margin-left:39px;"><br>
								<input type="checkbox" onchange="checkAllBM(this)" name="chk[]" />All
								</ul>
							</div><br>

							&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot&middot
							
							<span class="thumb"><h3>Vital Signs</h3></span>
							<input id="togList5" type="checkbox">
							<label for="togList5">
									<span><p>Update vital signs<img src="res/addButton.png" style="margin-left:88px;" width="20px" height="20px"></p></span><!--<p>Click <span style="color:#AA3939;">ME</span> to add food consumed</p>-->
									<span style="color:#AA3939;"><p>Collapse</p></span>
							</label>
							<div class="list5" style="overflow-y:scroll; height:100px; width: 260px; border:1px solid #E0E0E0; padding-top:5px; padding-left:5px;">
								<ul style="margin-left:-40px;">
								<strong>Location</strong><span style="margin-left:60px;"><strong>Measurement</strong></span><br>
								<input class="vital" type="checkbox" name="vital1" value="hrate">Heart Rate</input>
								<input type="text" name="hrate" size=1 style="margin-left:58px;"><br>
								<input class="vital" type="checkbox" name="vital2" value="rrate">Respiratory Rate</input>
								<input type="text" name="rrate" size=1 style="margin-left:20px;"><br>
								<input class="vital" type="checkbox" name="vital3" value="bp">Blood Pressure</input>
								<input type="text" name="systolic" size=1 style="margin-left:30px;">/<input type="text" name="diastolic" size=1><br>
								<input type="checkbox" onchange="checkAllVR(this)" name="chk[]" />All
								</ul>
							</div><br>
							<input type="submit" name="submit" value="Submit" style="width:30%; margin-left:80px; margin-top:50px; margin-bottom:8px; border-radius:4px; background-color:#AA3939; color:white;"/>
						</form>
					</div><!--end of col-md-4-->
			</div><!--end of light box-->
			
			<div id='fade' onClick='lightbox_close();'></div>
			
		</div><!--end of div container-->
	
	<!--SCRIPTS-->	
		<script src="js/bootstrap.min.js"></script>
		<script src='js/lib/jquery.min.js'></script>
		<script src="js/typeahead.min.js"></script>
		<script src='js/lib/moment.min.js'></script>
		<script src='js/fullcalendar.js'></script>
		
		<script>
		function show_popup() {
		  var p = window.createPopup()
		  var pbody = p.document.body
		  pbody.style.backgroundColor = "lime"
		  pbody.style.border = "solid black 1px"
		  pbody.innerHTML = "This is a pop-up! Click outside to close."
		  p.show(150,150,200,50,document.body)
		}
		$(document).ready(function() {
			var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();
			var calendar = $('#calendar').fullCalendar({
			  height:480,
			  header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay',
			  },
			  eventClick: function(calEvent, jsEvent, view) {			
					if(calEvent.data.belongsto === "food"){
						alert('Food Name: ' + calEvent.title + '\n' + "Number of servings: " + calEvent.data.serving);
					}
					if(calEvent.data.belongsto === "dist_type"){
						alert('Activity Name: ' + calEvent.title + '\n' +
							"Distance travelled: " + calEvent.data.distance + "KM"
							+ "\nTime: " + calEvent.data.time  + "mins");
					}
					if(calEvent.data.belongsto === "rep_type"){
						alert('Activity Name: ' + calEvent.title + '\n' + "Number of Reps: " + calEvent.data.reps
						+ "\nNumber of Sets: " + calEvent.data.sets);
					}
			  },//end of eventClick
			  editable: false,
			  eventLimit: 3, // allow "more" link when too many events
			  events: [
			  <?php
			  error_reporting(0);
					
					$events=mysqli_query($dbc,"
					SELECT food_name, fs.food_serving, fs.date_created 
					FROM food_served_table AS fs, food_table AS f, users_table AS u 
					WHERE fs.food_id = f.food_id 
					AND fs.user_id = u.user_id 
					AND u.user_email like '$myusername'
					");
				
				while($row = mysqli_fetch_assoc($events)) {
				$foodName= $row['food_name'];
				$serving= $row['food_serving'];
				list($year,$month,$day)=explode("-", $row['date_created']);
				?>
				{
				  title: '<?php echo"$foodName"?>',
				  start: new Date(<?php echo $year; ?>,<?php echo $month; ?>-1, <?php echo $day; ?>),
				  data: {
					serving: '<?php echo"$serving"?>',
					belongsto: 'food'
				  },
				  backgroundColor: '#34495e',
				  borderColor: '#34495e',
				  allDay: true
				  
				},//end of event array
				<?php
				}//end of while for food inputs
			  ?>
			  <?php
			  error_reporting(0);
					
					$events=mysqli_query($dbc,"
					SELECT ptype.physical_activity_dist_type, ptable.distance, ptable.time, ptable.date_created 
					FROM physical_activities_dist_table AS ptable, physical_activities_dist_type_table AS ptype, users_table AS u 
					WHERE ptype.physical_activity_dist_id = ptable.physical_activity_dist_id 
					AND ptable.user_id = u.user_id
					AND u.user_email like '$myusername'
					");
				
				while($row = mysqli_fetch_assoc($events)) {
				$activityName= $row['physical_activity_dist_type'];
				$distance= $row['distance'];
				$time= $row['time']; 
				list($year,$month,$day)=explode("-", $row['date_created']);
				?>
				{
				  title: '<?php echo"$activityName"?>',
				  start: new Date(<?php echo $year; ?>,<?php echo $month; ?>-1, <?php echo $day; ?>),
				  data: {
					distance: '<?php echo"$distance"?>',
					time: '<?php echo"$time"?>',
					belongsto: 'dist_type'
				  },
				  backgroundColor: '#e74c3c',
				  borderColor: '#e74c3c',
				  allDay: true
				  
				},
				<?php
				}//end of while for activities inputs - distance and time type
			  ?>
			  <?php
			  error_reporting(0);
					
					$events=mysqli_query($dbc,"
					SELECT ptype.physical_activity_rep_type, ptable.number_of_reps, ptable.number_of_sets, ptable.date_created 
					FROM physical_activities_rep_table AS ptable, physical_activities_rep_type_table AS ptype, users_table AS u 
					WHERE ptype.physical_activity_rep_id = ptable.physical_activity_rep_id 
					AND ptable.user_id = u.user_id
					AND u.user_email like '$myusername'
					");
				
				while($row = mysqli_fetch_assoc($events)) {
				$activityName= $row['physical_activity_rep_type'];
				$reps= $row['number_of_reps'];
				$sets= $row['number_of_sets'];
				list($year,$month,$day)=explode("-", $row['date_created']);
				?>
				{
				  title: '<?php echo"$activityName"?>',
				  start: new Date(<?php echo $year; ?>,<?php echo $month; ?>-1, <?php echo $day; ?>),
				  data: {
					reps: '<?php echo"$reps"?>',
					sets: '<?php echo"$sets"?>',
					belongsto: 'rep_type'
				  },
				  backgroundColor: '#e74c3c',
				  borderColor: '#e74c3c',
				  allDay: true
				},
				<?php
				}//end of while for activities inputs - reps and sets type
			  ?>
			  ],//end of eventsource
			});
				var date = $('#calendar').fullCalendar('today');
				
				$('#calendar').fullCalendar('gotoDate', date);
      });
				
				
			
		////////////////////////////////////////////////end of fullcalendar////////////////////////////////////////
		
		//responsible for checking all checkboxes with class name 'TimeAct'
		function checkAllTimeAct(ele) {
			 var checkboxes = document.getElementsByClassName("TimeAct");
			 if (ele.checked) {
				 for (var i = 0; i < checkboxes.length; i++) {
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = true;
					 }
				 }
			 } else {
				 for (var i = 0; i < checkboxes.length; i++) {
					 console.log(i)
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = false;
					 }
				 }
			 }
		 }
		 //responsible for checking all checkboxes with class name 'RepSetAct'
		 function checkAllRepSetAct(ele) {
			 var checkboxes = document.getElementsByClassName("RepSetAct");
			 if (ele.checked) {
				 for (var i = 0; i < checkboxes.length; i++) {
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = true;
					 }
				 }
			 } else {
				 for (var i = 0; i < checkboxes.length; i++) {
					 console.log(i)
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = false;
					 }
				 }
			 }
		 }
		 
		 //responsible for checking all checkboxes with class name 'food'
		 function checkAllFood(ele) {
			 var checkboxes = document.getElementsByClassName("food");
			 if (ele.checked) {
				 for (var i = 0; i < checkboxes.length; i++) {
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = true;
					 }
				 }
			 } else {
				 for (var i = 0; i < checkboxes.length; i++) {
					 console.log(i)
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = false;
					 }
				 }
			 }
		 }

		 function checkAllBM(ele) {
			 var checkboxes = document.getElementsByClassName("body");
			 if (ele.checked) {
				 for (var i = 0; i < checkboxes.length; i++) {
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = true;
					 }
				 }
			 } else {
				 for (var i = 0; i < checkboxes.length; i++) {
					 console.log(i)
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = false;
					 }
				 }
			 }
		 }

		 function checkAllVR(ele) {
			 var checkboxes = document.getElementsByClassName("vital");
			 if (ele.checked) {
				 for (var i = 0; i < checkboxes.length; i++) {
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = true;
					 }
				 }
			 } else {
				 for (var i = 0; i < checkboxes.length; i++) {
					 console.log(i)
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = false;
					 }
				 }
			 }
		 }
		 
		 ////////////////////////light box///////////////////////////////
		 window.document.onkeydown = function (e){
				if (!e){
					e = event;
				}
				if (e.keyCode == 27){
					lightbox_close();
				}
			}
			function lightbox_open(){
				window.scrollTo(0,0);
				document.getElementById('light').style.display='block';
				document.getElementById('fade').style.display='block';  
			}
			function lightbox_close(){
				document.getElementById('light').style.display='none';
				document.getElementById('fade').style.display='none';
			}
		/////////////////////////////Chart.js//////////////////////////////
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};//controls the range
		var lineChartData = {
			labels : ["January","February","March","April","May","June","July", "August", "September", "October", "November", "December"],
			datasets : [
				{
					
					label: "My Data",
					fillColor : "rgba(220,220,220,0.5)",
					strokeColor : "#3498db",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#3498db",
					pointHighlightFill : "#3498db",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [
						<?php
							$events=mysqli_query($dbc,"
							SELECT body_measurement_value, date_created 
							FROM body_measurement_table AS bmt, users_table AS u 
							WHERE bmt.user_id = u.user_id
							AND bmt.body_measurement_type_id = 2
							AND u.user_email like '$myusername'
							");
							
							while($row = mysqli_fetch_assoc($events)) {
							$data= $row['body_measurement_value'];
							echo $data . ",";
							}//end of while
						?>
					]
				}
			]

		}

		window.onload = function(){
			var ctx = document.getElementById("canvas").getContext("2d");
			window.myLine = new Chart(ctx).Line(lineChartData, {
				responsive: true
			});
		}
		
		</script>
	</body>
</html>

<!--
<?php 
					error_reporting(0);
					
					$events=mysqli_query($dbc,"
					SELECT body_measurement_value, date_created, body_measurement_type
					FROM body_measurement_table AS bmt, users_table AS u, body_measurement_type_table AS bmtt
					WHERE bmt.user_id = u.user_id
					AND u.user_email like '$myusername'
					");
							
					while($row = mysqli_fetch_assoc($events)) {
					$name= $row['body_measurement_type'];
					?>
						label: <?php echo "$name"?>,
						fillColor : "rgba(220,220,220,0.5)",
						strokeColor : "#3498db",
						pointColor : "rgba(220,220,220,1)",
						pointStrokeColor : "#3498db",
						pointHighlightFill : "#3498db",
						pointHighlightStroke : "rgba(220,220,220,1)",
						data : [
							<?php
								$events=mysqli_query($dbc,"
								SELECT body_measurement_value, date_created 
								FROM body_measurement_table AS bmt, users_table AS u 
								WHERE bmt.user_id = u.user_id
								AND bmt.body_measurement_type_id = 2
								AND u.user_email like '$myusername'
								");
								
								while($row = mysqli_fetch_assoc($events)) {
								$data= $row['body_measurement_value'];
								echo $data . ",";
								}//end of while
							?>
						],
					<?php
					}//end of while
					?>
-->