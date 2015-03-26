<?php
	include '../mysqli_connect.php';
	session_start();	
	$tbl_user = "users_table";
	$tbl_phy_dist = "physical_activities_dist_type_table";
	$myusername = $_SESSION['myusername'];
	//comment
	/*
	//debugging
	$phyID = mysqli_query($dbc,"SELECT physical_activity_dist_id FROM $tbl_phy_dist WHERE physical_activity_dist_type = 'Jogging'");
	
	while ($row = mysqli_fetch_assoc($phyID)) {
		echo $row['physical_activity_dist_id'];
	}
	//debugging
	*/
	
	if(isset($_POST['running']) && $_POST['running']==='running'){ 
		echo 'check running <br>';//debugging
		if(isset($_POST['run_hrs'],$_POST['run_mins'],$_POST['run_dist'])){
			
			$userID = mysqli_query($dbc, "SELECT user_id FROM $tbl_user WHERE user_email like '$myusername'");
			$phyID = mysqli_query($dbc,"SELECT physical_activity_dist_id FROM $tbl_phy_dist WHERE physical_activity_dist_type = 'Running'");
			$hours = trim($_POST['run_hrs']);
			$mins = trim($_POST['run_mins']);
			$dist = trim($_POST['run_dist']);
		
			echo 'im here';//debugging
			$insert = $dbc->prepare("INSERT INTO physical_activities_dist_table (user_id, physical_activity_dist_id, distance, time, date_created) 
										VALUES (?, ?, ?, ?, NOW())");
			$insert->bind_param('iiii', $userID,$phyID, $dist, $hours);	
				
			if($insert->execute()){
				header('Location: profile.php');
				die();
			}//end of if execute
			
		}//end of if post
	}//end of if running
	if(isset($_POST['walking']) && $_POST['walking']==='walking'){ 
		echo 'check walking<br>';//debugging
		if(isset($_POST['walk_hrs'],$_POST['walk_mins'],$_POST['walk_dist'])){
			
			$userID = mysqli_query($dbc, "SELECT user_id FROM $tbl_user WHERE user_email like '$myusername'");
			$phyID = mysqli_query($dbc,"SELECT physical_activity_dist_id FROM $tbl_phy_dist WHERE physical_activity_dist_type = 'Walking'");
			$hours = trim($_POST['walk_hrs']);
			$mins = trim($_POST['walk_mins']);
			$dist = trim($_POST['walk_dist']);
		
			echo 'im here';//debugging
			$insert = $dbc->prepare("INSERT INTO physical_activities_dist_table (user_id, physical_activity_dist_id, distance, time, date_created) 
										VALUES (?, ?, ?, ?, NOW())");
			$insert->bind_param('iiii', $userID,$phyID, $dist, $hours);	
				
			if($insert->execute()){
				header('Location: profile.php');
				die();
			}//end of if execute
			
		}//end of if post
	}//end of if walking
	if(isset($_POST['jogging']) && $_POST['jogging']==='jogging'){ 
		echo 'check jogging<br>';//debugging
		if(isset($_POST['jog_hrs'],$_POST['jog_mins'],$_POST['jog_dist'])){
			
			$userID = mysqli_query($dbc, "SELECT user_id FROM $tbl_user WHERE user_email like '$myusername'");
			$phyID = mysqli_query($dbc,"SELECT physical_activity_dist_id FROM $tbl_phy_dist WHERE physical_activity_dist_type = 'Jogging'");
			$hours = trim($_POST['jog_hrs']);
			$mins = trim($_POST['jog_mins']);
			$dist = trim($_POST['jog_dist']);
		
			echo 'im here';//debugging
			$insert = $dbc->prepare("INSERT INTO physical_activities_dist_table (user_id, physical_activity_dist_id, distance, time, date_created) 
										VALUES (?, ?, ?, ?, NOW())");
			$insert->bind_param('iiii', $userID,$phyID, $dist, $hours);	
				
			if($insert->execute()){
				header('Location: profile.php');
				die();
			}//end of if execute
			
		}//end of if post
	}//end of if jogging
	
	mysqli_close($dbc);
	
	
	/*
	
	
	if(isset($_POST['running']) && $_POST['running']==='running'){ 
		echo 'check running <br>';//debugging
		if(isset($_POST['run_hrs'],$_POST['run_mins'],$_POST['run_dist'])){
			
			$userID = mysqli_query($dbc, "SELECT user_id FROM $tbl_user WHERE user_email like '$myusername'");
			$phyID = mysqli_query($dbc,"SELECT physical_activity_dist_id FROM $tbl_phy_dist WHERE physical_activity_dist_type = 'Running'");
			$hours = trim($_POST['run_hrs']);
			$mins = trim($_POST['run_mins']);
			$dist = trim($_POST['run_dist']);
		
			echo 'im here';//debugging
			$insert = $dbc->prepare("INSERT INTO physical_activities_dist_table (user_id, physical_activity_dist_id, distance, time, date_created) 
										VALUES (?, ?, ?, ?, NOW())");
			$insert->bind_param('iiii', $userID,$phyID, $dist, $hours);	
				
			if($insert->execute()){
				header('Location: profile.php');
				die();
			}//end of if execute
			
		}//end of if post
	}//end of if running
	if(isset($_POST['walking']) && $_POST['walking']==='walking'){ 
		echo 'check walking<br>';//debugging
		if(isset($_POST['walk_hrs'],$_POST['walk_mins'],$_POST['walk_dist'])){
			
			$userID = mysqli_query($dbc, "SELECT user_id FROM $tbl_user WHERE user_email like '$myusername'");
			$phyID = mysqli_query($dbc,"SELECT physical_activity_dist_id FROM $tbl_phy_dist WHERE physical_activity_dist_type = 'Walking'");
			$hours = trim($_POST['walk_hrs']);
			$mins = trim($_POST['walk_mins']);
			$dist = trim($_POST['walk_dist']);
		
			echo 'im here';//debugging
			$insert = $dbc->prepare("INSERT INTO physical_activities_dist_table (user_id, physical_activity_dist_id, distance, time, date_created) 
										VALUES (?, ?, ?, ?, NOW())");
			$insert->bind_param('iiii', $userID,$phyID, $dist, $hours);	
				
			if($insert->execute()){
				header('Location: profile.php');
				die();
			}//end of if execute
			
		}//end of if post
	}//end of if walking
	if(isset($_POST['jogging']) && $_POST['jogging']==='jogging'){ 
		echo 'check jogging<br>';//debugging
		if(isset($_POST['jog_hrs'],$_POST['jog_mins'],$_POST['jog_dist'])){
			
			$userID = mysqli_query($dbc, "SELECT user_id FROM $tbl_user WHERE user_email like '$myusername'");
			$phyID = mysqli_query($dbc,"SELECT physical_activity_dist_id FROM $tbl_phy_dist WHERE physical_activity_dist_type = 'Jogging'");
			$hours = trim($_POST['jog_hrs']);
			$mins = trim($_POST['jog_mins']);
			$dist = trim($_POST['jog_dist']);
		
			echo 'im here';//debugging
			$insert = $dbc->prepare("INSERT INTO physical_activities_dist_table (user_id, physical_activity_dist_id, distance, time, date_created) 
										VALUES (?, ?, ?, ?, NOW())");
			$insert->bind_param('iiii', $userID,$phyID, $dist, $hours);	
				
			if($insert->execute()){
				header('Location: profile.php');
				die();
			}//end of if execute
			
		}//end of if post
	}//end of if jogging
	
	*/
?>