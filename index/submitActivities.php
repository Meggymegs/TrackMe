<?php
	include '../mysqli_connect.php';
	session_start();
	$user_id = 0;	
	$tbl_user = "users_table";
	$tbl_phy_dist = "physical_activities_dist_type_table";
	$tbl_phy_rep = "physical_activities_rep_type_table";
	$tbl_food = "food_table";
	$myusername = $_SESSION['myusername'];
	$userID = mysqli_query($dbc, "SELECT user_id FROM $tbl_user WHERE user_email like '$myusername'");
	while ($row = mysqli_fetch_assoc($userID)) {
				//to get the integer value of the $userID
				echo $row['user_id'];//debugging
				$user_id = $user_id + $row['user_id'];
	}
	
	////////////////////START OF TIME/DISTANCE BASED PHYSICAL ACTIVITIES INSERTION////////////////////
	if(isset($_POST['running']) && $_POST['running']==='running'){ 
		echo 'check running <br>';//debugging
		if(isset($_POST['run_hrs'],$_POST['run_mins'],$_POST['run_dist'])){
			
			
			$hours = trim($_POST['run_hrs']);
			$mins = trim($_POST['run_mins']);
			$dist = trim($_POST['run_dist']);
			$userID = mysqli_query($dbc, "SELECT user_id FROM $tbl_user WHERE user_email like '$myusername'");
			$phyID = mysqli_query($dbc,"SELECT physical_activity_dist_id FROM $tbl_phy_dist WHERE physical_activity_dist_type = 'Running'");
			$user_id = 0;
			$phy_id = 0;
			
			echo '<br>now im here<br>';//debugging
			while ($row = mysqli_fetch_assoc($userID)) {
				//to get the integer value of the $userID
				echo $row['user_id'];//debugging
				$user_id = $user_id + $row['user_id'];
			}
			
			while ($row = mysqli_fetch_assoc($phyID)) {
				//to get the integer value of the $phyID
				echo $row['physical_activity_dist_id'];//debugging
				$phy_id = $phy_id + $row['physical_activity_dist_id'];
			}
			
			
			$query = "INSERT INTO physical_activities_dist_table (user_id, physical_activity_dist_id, distance, time, date_created) 
										VALUES (?, ?, ?, ?, NOW())";
		
			$stmt = mysqli_prepare($dbc, $query);
			
			mysqli_stmt_bind_param($stmt, "iiii", $user_id, $phy_id, $dist, 
										$hours);
			
			//mysqli_stmt_execute($stmt);
			
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			
			if($affected_rows == 1) {
				echo 'Successful!<br>';
				mysqli_stmt_close($stmt);
				//header('location:profile.php');
			} else {
				echo '<br>Error occurred <br />';
				echo mysqli_error($dbc);
				//header('location:profile.php');
			}
			
		}//end of if post
	}//end of if running
	
	if(isset($_POST['walking']) && $_POST['walking']==='walking'){ 
		echo 'check walking <br>';//debugging
		if(isset($_POST['walk_hrs'],$_POST['walk_mins'],$_POST['walk_dist'])){
			
			
			$hours = trim($_POST['walk_hrs']);
			$mins = trim($_POST['walk_mins']);
			$dist = trim($_POST['walk_dist']);
			$userID = mysqli_query($dbc, "SELECT user_id FROM $tbl_user WHERE user_email like '$myusername'");
			$phyID = mysqli_query($dbc,"SELECT physical_activity_dist_id FROM $tbl_phy_dist WHERE physical_activity_dist_type = 'Walking'");
			$user_id = 0;
			$phy_id = 0;
			
			echo '<br>now im here<br>';//debugging
			while ($row = mysqli_fetch_assoc($userID)) {
				//to get the integer value of the $userID
				echo $row['user_id'];//debugging
				$user_id = $user_id + $row['user_id'];
			}
			
			while ($row = mysqli_fetch_assoc($phyID)) {
				//to get the integer value of the $phyID
				echo $row['physical_activity_dist_id'];//debugging
				$phy_id = $phy_id + $row['physical_activity_dist_id'];
			}
			
			
			$query = "INSERT INTO physical_activities_dist_table (user_id, physical_activity_dist_id, distance, time, date_created) 
										VALUES (?, ?, ?, ?, NOW())";
		
			$stmt = mysqli_prepare($dbc, $query);
			
			mysqli_stmt_bind_param($stmt, "iiii", $user_id, $phy_id, $dist, 
										$hours);
			
			//mysqli_stmt_execute($stmt);
			
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			
			if($affected_rows == 1) {
				echo 'Successful!<br>';
				mysqli_stmt_close($stmt);
				//header('location:profile.php');
			} else {
				echo '<br>Error occurred <br />';
				echo mysqli_error($dbc);
				//header('location:profile.php');
			}
			
		}//end of if post
	}//end of if walking
	
	if(isset($_POST['jogging']) && $_POST['jogging']==='jogging'){ 
		echo 'check jogging <br>';//debugging
		if(isset($_POST['jog_hrs'],$_POST['jog_mins'],$_POST['jog_dist'])){
			
			
			$hours = trim($_POST['jog_hrs']);
			$mins = trim($_POST['jog_mins']);
			$dist = trim($_POST['jog_dist']);
			$userID = mysqli_query($dbc, "SELECT user_id FROM $tbl_user WHERE user_email like '$myusername'");
			$phyID = mysqli_query($dbc,"SELECT physical_activity_dist_id FROM $tbl_phy_dist WHERE physical_activity_dist_type = 'Jogging'");
			$user_id = 0;
			$phy_id = 0;
			
			echo '<br>now im here<br>';//debugging
			while ($row = mysqli_fetch_assoc($userID)) {
				//to get the integer value of the $userID
				echo $row['user_id'];//debugging
				$user_id = $user_id + $row['user_id'];
			}
			
			while ($row = mysqli_fetch_assoc($phyID)) {
				//to get the integer value of the $phyID
				echo $row['physical_activity_dist_id'];//debugging
				$phy_id = $phy_id + $row['physical_activity_dist_id'];
			}
			
			
			$query = "INSERT INTO physical_activities_dist_table (user_id, physical_activity_dist_id, distance, time, date_created) 
										VALUES (?, ?, ?, ?, NOW())";
		
			$stmt = mysqli_prepare($dbc, $query);
			
			mysqli_stmt_bind_param($stmt, "iiii", $user_id, $phy_id, $dist, 
										$hours);
			
			mysqli_stmt_execute($stmt);
			
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			
			if($affected_rows == 1) {
				echo 'Successful!<br>';
				mysqli_stmt_close($stmt);
				//header('location:profile.php');
			} else {
				echo '<br>Error occurred <br />';
				echo mysqli_error($dbc);
				//header('location:profile.php');
			}
			
		}//end of if post
	}//end of if jogging
	
	////////////////////END OF TIME/DISTANCE BASED PHYSICAL ACTIVITIES INSERTION////////////////////
	////////////////////START OF REP/SET BASED PHYSICAL ACTIVITIES INSERTION////////////////////
	
	if(isset($_POST['pushUp']) && $_POST['pushUp']==='pushUp'){ 
		echo 'check push up <br>';//debugging
		if(isset($_POST['pushReps'],$_POST['pushSets'])){
			
			$reps = trim($_POST['pushReps']);
			$sets = trim($_POST['pushSets']);
			$userID = mysqli_query($dbc, "SELECT user_id FROM $tbl_user WHERE user_email like '$myusername'");
			$phyID = mysqli_query($dbc,"SELECT physical_activity_rep_id FROM $tbl_phy_rep WHERE physical_activity_rep_type = 'Push Up'");
			$user_id = 0;
			$phy_id = 0;
			
			echo '<br>now im here<br>';//debugging
			while ($row = mysqli_fetch_assoc($userID)) {
				//to get the integer value of the $userID
				echo $row['user_id'];//debugging
				$user_id = $user_id + $row['user_id'];
			}
			
			while ($row = mysqli_fetch_assoc($phyID)) {
				//to get the integer value of the $phyID
				echo $row['physical_activity_rep_id'];//debugging
				$phy_id = $phy_id + $row['physical_activity_rep_id'];
			}
	
			$query = "INSERT INTO physical_activities_rep_table (user_id, physical_activity_rep_id, number_of_reps, number_of_sets, date_created) 
										VALUES (?, ?, ?, ?, NOW())";
		
			$stmt = mysqli_prepare($dbc, $query);
			
			mysqli_stmt_bind_param($stmt, "iiii", $user_id, $phy_id, $reps, 
										$sets);
			
			mysqli_stmt_execute($stmt);
			
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			
			if($affected_rows == 1) {
				echo 'Successful!<br>';
				mysqli_stmt_close($stmt);
				//header('location:profile.php');
			} else {
				echo '<br>Error occurred <br />';
				echo mysqli_error($dbc);
				//header('location:profile.php');
			}
			
		}//end of if post
	}//end of if push up
	
	if(isset($_POST['pullUp']) && $_POST['pullUp']==='pullUp'){ 
		echo 'check pull up <br>';//debugging
		if(isset($_POST['pullReps'],$_POST['pullSets'])){
			
			$reps = trim($_POST['pullReps']);
			$sets = trim($_POST['pullSets']);
			$userID = mysqli_query($dbc, "SELECT user_id FROM $tbl_user WHERE user_email like '$myusername'");
			$phyID = mysqli_query($dbc,"SELECT physical_activity_rep_id FROM $tbl_phy_rep WHERE physical_activity_rep_type = 'Pull Up'");
			$user_id = 0;
			$phy_id = 0;
			
			echo '<br>now im here<br>';//debugging
			while ($row = mysqli_fetch_assoc($userID)) {
				//to get the integer value of the $userID
				echo $row['user_id'];//debugging
				$user_id = $user_id + $row['user_id'];
			}
			
			while ($row = mysqli_fetch_assoc($phyID)) {
				//to get the integer value of the $phyID
				echo $row['physical_activity_rep_id'];//debugging
				$phy_id = $phy_id + $row['physical_activity_rep_id'];
			}
	
			$query = "INSERT INTO physical_activities_rep_table (user_id, physical_activity_rep_id, number_of_reps, number_of_sets, date_created) 
										VALUES (?, ?, ?, ?, NOW())";
		
			$stmt = mysqli_prepare($dbc, $query);
			
			mysqli_stmt_bind_param($stmt, "iiii", $user_id, $phy_id, $reps, 
										$sets);
			
			mysqli_stmt_execute($stmt);
			
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			
			if($affected_rows == 1) {
				echo 'Successful!<br>';
				mysqli_stmt_close($stmt);
				//header('location:profile.php');
			} else {
				echo '<br>Error occurred <br />';
				echo mysqli_error($dbc);
				//header('location:profile.php');
			}
			
		}//end of if post
	}//end of if pull up
	
	if(isset($_POST['benchPress']) && $_POST['benchPress']==='benchPress'){ 
		echo 'check push up <br>';//debugging
		if(isset($_POST['benchReps'],$_POST['benchSets'])){
			
			$reps = trim($_POST['benchReps']);
			$sets = trim($_POST['benchSets']);
			$userID = mysqli_query($dbc, "SELECT user_id FROM $tbl_user WHERE user_email like '$myusername'");
			$phyID = mysqli_query($dbc,"SELECT physical_activity_rep_id FROM $tbl_phy_rep WHERE physical_activity_rep_type = 'Bench Press'");
			$user_id = 0;
			$phy_id = 0;
			
			echo '<br>now im here<br>';//debugging
			while ($row = mysqli_fetch_assoc($userID)) {
				//to get the integer value of the $userID
				echo $row['user_id'];//debugging
				$user_id = $user_id + $row['user_id'];
			}
			
			while ($row = mysqli_fetch_assoc($phyID)) {
				//to get the integer value of the $phyID
				echo $row['physical_activity_rep_id'];//debugging
				$phy_id = $phy_id + $row['physical_activity_rep_id'];
			}
	
			$query = "INSERT INTO physical_activities_rep_table (user_id, physical_activity_rep_id, number_of_reps, number_of_sets, date_created) 
										VALUES (?, ?, ?, ?, NOW())";
		
			$stmt = mysqli_prepare($dbc, $query);
			
			mysqli_stmt_bind_param($stmt, "iiii", $user_id, $phy_id, $reps, 
										$sets);
			
			mysqli_stmt_execute($stmt);
			
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			
			if($affected_rows == 1) {
				echo 'Successful!<br>';
				mysqli_stmt_close($stmt);
				//header('location:profile.php');
			} else {
				echo '<br>Error occurred <br />';
				echo mysqli_error($dbc);
				//header('location:profile.php');
			}
			
		}//end of if post
	}//end of if bench press
	
	////////////////////END OF REP/SET BASED PHYSICAL ACTIVITIES INSERTION////////////////////
	////////////////////START OF FOOD INTAKE INSERTION////////////////////
	
	if(isset($_POST['food']) && $_POST['food']==='egg'){ 
		echo 'check egg <br>';//debugging
		if(isset($_POST['egg_srvng1'],$_POST['egg_srvng2'])){
			
			$srvng1 = trim($_POST['egg_srvng1']);
			$srvng2 = trim($_POST['egg_srvng2']);
			$food_srvngs = $srvng1 + $srvng2;
			$userID = mysqli_query($dbc, "SELECT user_id FROM $tbl_user WHERE user_email like '$myusername'");
			$foodID = mysqli_query($dbc,"SELECT food_id FROM $tbl_food WHERE food_name = 'Fried Eggs'");
			$user_id = 0;
			$food_id = 0;
			
			echo '<br>now im here<br>';//debugging
			while ($row = mysqli_fetch_assoc($userID)) {
				//to get the integer value of the $userID
				echo $row['user_id'];//debugging
				$user_id = $user_id + $row['user_id'];
			}
			
			while ($row = mysqli_fetch_assoc($foodID)) {
				//to get the integer value of the $phyID
				echo $row['food_id'];//debugging
				$food_id = $food_id + $row['food_id'];
			}
			
			$query = "INSERT INTO food_served_table (user_id, food_id, food_serving, date_created) 
										VALUES (?, ?, ?, NOW())";
		
			$stmt = mysqli_prepare($dbc, $query);
			
			mysqli_stmt_bind_param($stmt, "iid", $user_id, $food_id, $food_srvngs);
			
			mysqli_stmt_execute($stmt);
			
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			
			if($affected_rows == 1) {
				echo 'Successful!<br>';
				mysqli_stmt_close($stmt);
				//header('location:profile.php');
			} else {
				echo '<br>Error occurred <br />';
				echo mysqli_error($dbc);
				//header('location:profile.php');
			}
			
		}//end of if post
	}//end of if egg
	
	if(isset($_POST['food']) && $_POST['food']==='beef'){ 
		echo 'check beef <br>';//debugging
		if(isset($_POST['beef_srvng1'],$_POST['beef_srvng2'])){
			
			$srvng1 = trim($_POST['beef_srvng1']);
			$srvng2 = trim($_POST['beef_srvng2']);
			$food_srvngs = $srvng1 + $srvng2;
			$userID = mysqli_query($dbc, "SELECT user_id FROM $tbl_user WHERE user_email like '$myusername'");
			$foodID = mysqli_query($dbc,"SELECT food_id FROM $tbl_food WHERE food_name = 'Beef'");
			$user_id = 0;
			$food_id = 0;
			
			echo '<br>now im here<br>';//debugging
			while ($row = mysqli_fetch_assoc($userID)) {
				//to get the integer value of the $userID
				echo $row['user_id'];//debugging
				$user_id = $user_id + $row['user_id'];
			}
			
			while ($row = mysqli_fetch_assoc($foodID)) {
				//to get the integer value of the $phyID
				echo $row['food_id'];//debugging
				$food_id = $food_id + $row['food_id'];
			}
			
			$query = "INSERT INTO food_served_table (user_id, food_id, food_serving, date_created) 
										VALUES (?, ?, ?, NOW())";
		
			$stmt = mysqli_prepare($dbc, $query);
			
			mysqli_stmt_bind_param($stmt, "iid", $user_id, $food_id, $food_srvngs);
			
			mysqli_stmt_execute($stmt);
			
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			
			if($affected_rows == 1) {
				echo 'Successful!<br>';
				mysqli_stmt_close($stmt);
				//header('location:profile.php');
			} else {
				echo '<br>Error occurred <br />';
				echo mysqli_error($dbc);
				//header('location:profile.php');
			}
			
		}//end of if post
	}//end of if beef
	
	////////////////////END OF FOOD INTAKE INSERTION////////////////////
        ////////////////////START OF BODY MEASUREMENTS////////////////////


	$a = $_POST["height1"];
	$b = $_POST["weight1"];
	$c = $_POST["waist1"];
	$d = $_POST["wrist1"];
	$e = $_POST["hip1"];
	$f = $_POST["forearm1"];
	$bmi = round($b/($a*$a),2);
	$fat = (415*$c-8.2*2.20462*$b-9442)/(2.20462*$b); //male fat
	$fat = (26.8*2.20462*$b-$d*31.8+$c*15.7+$e*24.9-$f*43.4-898.7)/(2.20462*$b); //female fat
	$date = date("Y-m-d");
	$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','1','" . $a . "','" . $date . "')";
	mysqli_query($dbc,$strSQL) or die (mysql_error());
	$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','2','" . $b . "','" . $date . "')";
	mysqli_query($dbc,$strSQL) or die (mysql_error());
	$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','3','" . $c . "','" . $date . "')";
	mysqli_query($dbc,$strSQL) or die (mysql_error());
	$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','4','" . $d . "','" . $date . "')";
	mysqli_query($dbc,$strSQL) or die (mysql_error());
	$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','5','" . $e . "','" . $date . "')";
	mysqli_query($dbc,$strSQL) or die (mysql_error());
	$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','6','" . $f . "','" . $date . "')";
	mysqli_query($dbc,$strSQL) or die (mysql_error());
	$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','7','" . $bmi . "','" . $date . "')";
	mysqli_query($dbc,$strSQL) or die (mysql_error());
	$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','8','" . $fat . "','" . $date . "')";
	mysqli_query($dbc,$strSQL) or die (mysql_error());
	

        ////////////////////END OF BODY MEASUREMENTS////////////////////
        ////////////////////START OF VITAL SIGNS////////////////////

	$g = $_POST["hrate1"];
	$h = $_POST["rrate1"];
	$i = $_POST["systolic"];
	$j = $_POST["diastolic"];
	$date = date("Y-m-d");
	$strSQL = "INSERT INTO vital_signs_table(user_id,vital_signs_type_id,vital_signs_value,date_created) VALUES('" . $user_id . "','1','" . $g . "','" . $date . "')";
	mysqli_query($dbc,$strSQL) or die (mysql_error());
	$strSQL = "INSERT INTO vital_signs_table(user_id,vital_signs_type_id,vital_signs_value,date_created) VALUES('" . $user_id . "','2','" . $h . "','" . $date . "')";
	mysqli_query($dbc,$strSQL) or die (mysql_error());
	$strSQL = "INSERT INTO vital_signs_table(user_id,vital_signs_type_id,vital_signs_value,date_created) VALUES('" . $user_id . "','3','" . $i . "','" . $date . "')";
	mysqli_query($dbc,$strSQL) or die (mysql_error());
	$strSQL = "INSERT INTO vital_signs_table(user_id,vital_signs_type_id,vital_signs_value,date_created) VALUES('" . $user_id . "','4','" . $j . "','" . $date . "')";
	mysqli_query($dbc,$strSQL) or die (mysql_error());

        ////////////////////END OF VITAL SIGNS////////////////////
	
	header('location:profile.php');
	mysqli_close($dbc);
	
	/*
	//debugging
	$phyID = mysqli_query($dbc,"SELECT physical_activity_dist_id FROM $tbl_phy_dist WHERE physical_activity_dist_type = 'Jogging'");
	
	while ($row = mysqli_fetch_assoc($phyID)) {
		echo $row['physical_activity_dist_id'];
	}
	//debugging
	*/
?>



