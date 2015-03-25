<?php
	ini_set('display_errors', 1);
	require_once('../mysqli_connect.php');
	require_once('User.php');
	//comment

	$first_name = $last_name = $email = $password = $birthdate = "";

	if(isset($_POST['submit'])) {
		$first_name = test_input($_POST["first_name"]);
		$last_name = test_input($_POST["last_name"]);
		$email = test_input($_POST["email"]);
		$password = test_input($_POST["password"]);
		$birthdate = test_input($_POST["year"]) . test_input($_POST["month"]) . test_input($_POST["day"]);
	}

	$salt = sha1(md5($password));
	$password = md5($password.$salt);

	$birthdate = date('Y-m-d', strtotime($birthdate));

	$user = new User($first_name, $last_name, $email, $password, $birthdate);

	$query = "INSERT INTO users_table VALUES (NULL, ?, ?, ?, ?, ?, 'assets/images/placeholder.png')";

	$stmt = mysqli_prepare($dbc, $query);

	mysqli_stmt_bind_param($stmt, "sssss", $user->getFirstName(), $user->getLastName(), $user->getUserEmail(), 
		$user->getPassword(), $user->getBirthdate());

	mysqli_stmt_execute($stmt);

	$affected_rows = mysqli_stmt_affected_rows($stmt);

	if($affected_rows == 1) {
		echo 'Sign Up successful!';

		mysqli_stmt_close($stmt);
		mysqli_close($dbc);
		session_start();
		$_SERVER('myusername') = $user->getUserEmail();
		header('location:profile.php');
	} else {
		echo 'Error occured <br />';
		echo mysqli_error($dbc);
		mysqli_close($dbc);

	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>