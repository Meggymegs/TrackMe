<?php

	require_once 'sql_login.inc';
	include 'class_rep.php';


	$db_server = new mysqli($db_hostname, $db_username, $db_password);

    if(!$db_server)
        die("Unable to connect to MySQL: " . mysql_error());

    $db_server->select_db($db_database)
        or die("Unable to select database: " . mysql_error()); 

	$required = array('repName');

	$tbl_name = "physical_activities_rep_type_table";

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
	    header("location:admin.php?msg=fail");
	} else if ($isSpecial){
		header("location:admin.php?msg=special");
	} else {
		//Create food object
		$rep = new Rep(trim($_POST['repName']));

		$name = $rep->getRepName();

		$query = "INSERT INTO `physical_activities_rep_type_table`(`physical_activity_rep_id`, `physical_activity_rep_type`) VALUES ('DEFAULT','$name')";
		$result = mysqli_query($db_server, $query);
		//echo mysqli_error($db_server);
		header("location:admin.php?msg=success");
	}


?>
