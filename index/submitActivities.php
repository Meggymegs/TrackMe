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
	
	if(isset($_POST['typeahead'])){ 
		echo 'check egg <br>';//debugging
		if(isset($_POST['srvng1'],$_POST['srvng2'])){
			
			$srvng1 = trim($_POST['srvng1']);
			$srvng2 = trim($_POST['srvng2']);
			$food_srvngs = $srvng1 + $srvng2;
			$fn = $_POST['typeahead'];
			$userID = mysqli_query($dbc, "SELECT user_id FROM $tbl_user WHERE user_email like '$myusername'");
			$foodID = mysqli_query($dbc,"SELECT food_id FROM $tbl_food WHERE food_name = '$fn'");
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



