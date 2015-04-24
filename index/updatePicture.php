<?php
	session_start();
	include '../mysqli_connect.php';
	
	$myusername = $_SESSION['myusername'];
	$result = mysqli_query($dbc, "SELECT * FROM `users_table` WHERE user_email like '$myusername'"); 
	$row = mysqli_fetch_assoc($result);
	$tempId = $row['user_id'];
?>


<?php
			
	$servername = "localhost";
	$username = "root";
	$password = "1234";
	$dbname = "trackme";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$user_id = isset($_GET['user_id']) ? $_GET['user_id']: '';
	
	$required = array('fileToUpload');
	$error = false;
	foreach($required as $field) {
		if (empty($_GET[$field])) {
			$error = true;
		}
	}
	
	if ($error) {
	    header("location:accountPicture.php?msg=fail&user_id=$tempId");
	} else {
		
	if (!is_valid_type($image)){
			$_SESSION['error'] = "You must upload a jpeg, png, or bmp";
			header("Location: accountPicture.php");
			exit;
	}
		
	$sql = "UPDATE users_table ".
		   "SET user_profile_pic = '$displayPicture'".
		   "WHERE user_id = '$tempId'" ;
   
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}
	header("location:accountPicture.php?msg=success&user_id=$tempId");
	
	$conn->close();
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
?>