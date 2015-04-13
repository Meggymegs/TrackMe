<?php

	require_once 'sql_login.inc';
	include 'class_food.php';


	$db_server = new mysqli($db_hostname, $db_username, $db_password);

    if(!$db_server)
        die("Unable to connect to MySQL: " . mysql_error());

    $db_server->select_db($db_database)
        or die("Unable to select database: " . mysql_error()); 

	$required = array('foodName', 'calories');

	$tbl_name = "food_table";
	
	// Loop over field names, make sure each one exists and is not empty
	$error = false;
	$isSpecial = false;
	foreach($required as $field) {
		if (empty($_POST[$field]) || ctype_space($_POST[$field])) {
			$error = true;
		} else if (preg_match('/[\^£$%&*()}{@#~?><>|=_¬]/', $_POST[$field])){
			$isSpecial = true;
		}
	}

	if ($error) {
	    header("location:edit.php?msg=fail");
	} else if ($isSpecial){
		header("location:edit.php?msg=special");
	} else {
		//Create food object
		$food = new Food(trim($_POST['foodName']), trim($_POST['calories']));
		
		$name = $food->getFoodName();
		$calories = $food->getCalories();
		
		$query = "INSERT INTO `food_table`(`food_id`, `food_name`, `food_calories`) VALUES ('DEFAULT','$name',$calories)";
		$result = mysqli_query($db_server, $query);
		//echo mysqli_error($db_server);
		header("location:admin.php?msg=success");
	}
	

?>