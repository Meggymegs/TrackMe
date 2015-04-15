<?php
include '../mysqli_connect.php';
session_start();
mysql_connect("localhost", "root", "1234") or die (mysql_error());
mysql_select_db("trackme") or die (mysql_error());
$tbl_user = "users_table";
$myusername = $_SESSION['myusername'];
$user_id = 0;
$userID = mysqli_query($dbc, "SELECT user_id FROM $tbl_user WHERE user_email like '$myusername'");
while ($row = mysqli_fetch_assoc($userID)) {
	$user_id = $user_id + $row['user_id'];
}
$a = $_POST["height"];
$b = $_POST["weight"];
$c = $_POST["waist"];
$d = $_POST["wrist"];
$e = $_POST["hip"];
$f = $_POST["forearm"];
$g = $_POST["hrate"];
$h = $_POST["rrate"];
$i = $_POST["systolic"];
$j = $_POST["diastolic"];
$bmi = round($b/($a*$a),2);
$fat = (415*$c-8.2*2.20462*$b-9442)/(2.20462*$b);
$date = date("Y-m-d");

if (isset($_POST['body1'])) {
$strSQL = "SELECT COUNT(*) FROM body_measurement_table WHERE user_id = '" . $user_id . "' AND body_measurement_type_id = '1'";
$rs = mysql_query($strSQL);
$row = mysql_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','1','" . $a . "','" . $date . "')";
} else {
$strSQL = "UPDATE body_measurement_table SET body_measurement_value = '" . $a . "', date_created = '" . $date . "' WHERE body_measurement_type_id = '1' AND user_id = '" . $user_id . "'";
}
mysql_query($strSQL) or die (mysql_error());
}

if (isset($_POST['body2'])) {
$strSQL = "SELECT COUNT(*) FROM body_measurement_table WHERE user_id = '" . $user_id . "' AND body_measurement_type_id = '2'";
$rs = mysql_query($strSQL);
$row = mysql_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','2','" . $b . "','" . $date . "')";
} else {
$strSQL = "UPDATE body_measurement_table SET body_measurement_value = '" . $b . "', date_created = '" . $date . "' WHERE body_measurement_type_id = '2' AND user_id = '" . $user_id . "'";
}
mysql_query($strSQL) or die (mysql_error());
}

if (isset($_POST['body3'])) {
$strSQL = "SELECT COUNT(*) FROM body_measurement_table WHERE user_id = '" . $user_id . "' AND body_measurement_type_id = '3'";
$rs = mysql_query($strSQL);
$row = mysql_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','3','" . $c . "','" . $date . "')";
} else {
$strSQL = "UPDATE body_measurement_table SET body_measurement_value = '" . $c . "', date_created = '" . $date . "' WHERE body_measurement_type_id = '3' AND user_id = '" . $user_id . "'";
}
mysql_query($strSQL) or die (mysql_error());
}

if (isset($_POST['body4'])) {
$strSQL = "SELECT COUNT(*) FROM body_measurement_table WHERE user_id = '" . $user_id . "' AND body_measurement_type_id = '4'";
$rs = mysql_query($strSQL);
$row = mysql_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','4','" . $d . "','" . $date . "')";
} else {
$strSQL = "UPDATE body_measurement_table SET body_measurement_value = '" . $d . "', date_created = '" . $date . "' WHERE body_measurement_type_id = '4' AND user_id = '" . $user_id . "'";
}
mysql_query($strSQL) or die (mysql_error());
}

if (isset($_POST['body5'])) {
$strSQL = "SELECT COUNT(*) FROM body_measurement_table WHERE user_id = '" . $user_id . "' AND body_measurement_type_id = '5'";
$rs = mysql_query($strSQL);
$row = mysql_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','5','" . $e . "','" . $date . "')";
} else {
$strSQL = "UPDATE body_measurement_table SET body_measurement_value = '" . $e . "', date_created = '" . $date . "' WHERE body_measurement_type_id = '5' AND user_id = '" . $user_id . "'";
}
mysql_query($strSQL) or die (mysql_error());
}

if (isset($_POST['body6'])) {
$strSQL = "SELECT COUNT(*) FROM body_measurement_table WHERE user_id = '" . $user_id . "' AND body_measurement_type_id = '6'";
$rs = mysql_query($strSQL);
$row = mysql_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','6','" . $f . "','" . $date . "')";
} else {
$strSQL = "UPDATE body_measurement_table SET body_measurement_value = '" . $f . "', date_created = '" . $date . "' WHERE body_measurement_type_id = '6' AND user_id = '" . $user_id . "'";
}
mysql_query($strSQL) or die (mysql_error());
}

if (isset($_POST['body1']) && isset($_POST['body2'])) {
$strSQL = "SELECT COUNT(*) FROM body_measurement_table WHERE user_id = '" . $user_id . "' AND body_measurement_type_id = '7'";
$rs = mysql_query($strSQL);
$row = mysql_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','7','" . $bmi . "','" . $date . "')";
} else {
$strSQL = "UPDATE body_measurement_table SET body_measurement_value = '" . $bmi . "', date_created = '" . $date . "' WHERE body_measurement_type_id = '7' AND user_id = '" . $user_id . "'";
}
mysql_query($strSQL) or die (mysql_error());
}

if (isset($_POST['body3']) && isset($_POST['body2'])) {
$strSQL = "SELECT COUNT(*) FROM body_measurement_table WHERE user_id = '" . $user_id . "' AND body_measurement_type_id = '8'";
$rs = mysql_query($strSQL);
$row = mysql_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','8','" . $fat . "','" . $date . "')";
} else {
$strSQL = "UPDATE body_measurement_table SET body_measurement_value = '" . $fat . "', date_created = '" . $date . "' WHERE body_measurement_type_id = '8' AND user_id = '" . $user_id . "'";
}
mysql_query($strSQL) or die (mysql_error());
}

if (isset($_POST['vital1'])) {
$strSQL = "SELECT COUNT(*) FROM vital_signs_table WHERE user_id = '" . $user_id . "' AND vital_signs_type_id = '1'";
$rs = mysql_query($strSQL);
$row = mysql_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO vital_signs_table(user_id,vital_signs_type_id,vital_signs_value,date_created) VALUES('" . $user_id . "','1','" . $g . "','" . $date . "')";
} else {
$strSQL = "UPDATE vital_signs_table SET vital_signs_value = '" . $g . "', date_created = '" . $date . "' WHERE vital_signs_type_id = '1' AND user_id = '" . $user_id . "'";
}
mysql_query($strSQL) or die (mysql_error());
}

if (isset($_POST['vital2'])) {
$strSQL = "SELECT COUNT(*) FROM vital_signs_table WHERE user_id = '" . $user_id . "' AND vital_signs_type_id = '2'";
$rs = mysql_query($strSQL);
$row = mysql_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO vital_signs_table(user_id,vital_signs_type_id,vital_signs_value,date_created) VALUES('" . $user_id . "','2','" . $h . "','" . $date . "')";
} else {
$strSQL = "UPDATE vital_signs_table SET vital_signs_value = '" . $h . "', date_created = '" . $date . "' WHERE vital_signs_type_id = '2' AND user_id = '" . $user_id . "'";
}
mysql_query($strSQL) or die (mysql_error());
}

if (isset($_POST['vital3'])) {
$strSQL = "SELECT COUNT(*) FROM vital_signs_table WHERE user_id = '" . $user_id . "' AND vital_signs_type_id = '3'";
$rs = mysql_query($strSQL);
$row = mysql_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO vital_signs_table(user_id,vital_signs_type_id,vital_signs_value,date_created) VALUES('" . $user_id . "','3','" . $i . "','" . $date . "')";
} else {
$strSQL = "UPDATE vital_signs_table SET vital_signs_value = '" . $i . "', date_created = '" . $date . "' WHERE vital_signs_type_id = '3' AND user_id = '" . $user_id . "'";
}
mysql_query($strSQL) or die (mysql_error());

$strSQL = "SELECT COUNT(*) FROM vital_signs_table WHERE user_id = '" . $user_id . "' AND vital_signs_type_id = '4'";
$rs = mysql_query($strSQL);
$row = mysql_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO vital_signs_table(user_id,vital_signs_type_id,vital_signs_value,date_created) VALUES('" . $user_id . "','4','" . $j . "','" . $date . "')";
} else {
$strSQL = "UPDATE vital_signs_table SET vital_signs_value = '" . $j . "', date_created = '" . $date . "' WHERE vital_signs_type_id = '4' AND user_id = '" . $user_id . "'";
}
mysql_query($strSQL) or die (mysql_error());
}

mysql_close();
header('location:profile.php');
?>