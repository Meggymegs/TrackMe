<?php
include '../mysqli_connect.php';

$tbl_name = "users_table";

// username and password sent from form 
$myusername=$_POST['myusername']; 
$salt = sha1(md5($_POST['mypassword']));
$mypassword = md5($_POST['mypassword'].$salt);

// To protect MySQL injection
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
//$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result = mysqli_query($dbc, "SELECT * FROM $tbl_name WHERE user_email='$myusername' and user_password='$mypassword'");

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
// Register $myusername, $mypassword and redirect to file "profile.php"
session_start();
$_SESSION['myusername'] = $myusername;
header("location:profile.php");
}
else {
header("location:signin.php?message=Wrong Email or Password");
}
?>	
</html>