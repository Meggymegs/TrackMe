<?php
	session_start();

	require_once 'sql_login.inc';
	include 'class_food.php';


	$db_server = new mysqli($db_hostname, $db_username, $db_password);

    if(!$db_server)
        die("Unable to connect to MySQL: " . mysql_error());

    $db_server->select_db($db_database)
        or die("Unable to select database: " . mysql_error()); 

	$required = array('caption');

	$tbl_name = "photos";
	$image = $_FILES['image'];
	// Sanitize our inputs
	$image['name'] = mysql_real_escape_string($image['name']);
	// Loop over field names, make sure each one exists and is not empty
	$error = false;
	$isSpecial = false;
	foreach($required as $field) {
		if (empty($_POST[$field]) || ctype_space($_POST[$field]) || $image['name'] == "") {
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
		//A LITTLE OBJECT ORIENTED PROGRAMMING HERE
		$card = new Card(trim($_POST['caption']));
		
		$name = $card->getCardName();
		// This variable is the path to the image folder where all the images are going to be stored
		$TARGET_PATH = "images/";
 
		// Build our target path full string.  This is where the file will be moved do
		$TARGET_PATH .= $image['name'];
		
		// Check to make sure that our file is actually an image
		if (!is_valid_type($image)){
			$_SESSION['error'] = "You must upload a jpeg, png, or bmp";
			header("Location: add_cards.php");
			exit;
		}
		 
		// Here we check to see if a file with that name already exists
		if (file_exists($TARGET_PATH)){
			$_SESSION['error'] = "A file with that name already exists";
			header("Location: add_cards.php");
			exit;
		}
		
			$myusername = $_SESSION['myusername'];
			include '../mysqli_connect.php';
			$result = mysqli_query($dbc, "SELECT * FROM `users_table` WHERE user_email like '$myusername'"); 
			$row = mysqli_fetch_assoc($result);
		
		if (move_uploaded_file($image['tmp_name'], $TARGET_PATH)){
			$query = "INSERT INTO $tbl_name ( user_id, photo, caption) VALUES( '" .$row['user_id'] . "', '" . $image['name'] . "' , '$name')";
		}
		
		$result = mysqli_query($db_server, $query);
		echo mysql_error();
		header("location:upload.php?msg=success");
	}
	
	// Check to see if the type of file uploaded is a valid image type
function is_valid_type($file)
{
    // This is an array that holds all the valid image MIME types
    $valid_types = array("image/jpg", "image/jpeg", "image/bmp", "image/png");
 
    if (in_array($file['type'], $valid_types))
        return 1;
    return 0;
}
 
function showContents($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

?>