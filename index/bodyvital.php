<?php
include '../mysqli_connect.php';
session_start();

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
$bmi = round($b/($a/(100)*$a/(100)),2);
$fat = (415*$c-8.2*2.20462*$b-9442)/(2.20462*$b);
$date = date("Y-m-d H:i:s");

if (isset($_POST['body1'])) {
$strSQL = "SELECT COUNT(*) FROM body_measurement_table WHERE user_id = '" . $user_id . "' AND body_measurement_type_id = '1'";
$rs = mysqli_query($dbc, $strSQL);
$row = mysqli_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','1','" . $a . "','" . $date . "')";
} else {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','1','" . $a . "','" . $date . "')";
}
mysqli_query($dbc, $strSQL) or die (mysqli_error());
}

if (isset($_POST['body2'])) {
$strSQL = "SELECT COUNT(*) FROM body_measurement_table WHERE user_id = '" . $user_id . "' AND body_measurement_type_id = '2'";
$rs = mysqli_query($dbc, $strSQL);
$row = mysqli_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','2','" . $b . "','" . $date . "')";
} else {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','2','" . $b . "','" . $date . "')";
}
mysqli_query($dbc, $strSQL) or die (mysqli_error());
}

if (isset($_POST['body3'])) {
$strSQL = "SELECT COUNT(*) FROM body_measurement_table WHERE user_id = '" . $user_id . "' AND body_measurement_type_id = '3'";
$rs = mysqli_query($dbc, $strSQL);
$row = mysqli_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','3','" . $c . "','" . $date . "')";
} else {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','3','" . $c . "','" . $date . "')";
}
mysqli_query($dbc, $strSQL) or die (mysqli_error());
}

if (isset($_POST['body4'])) {
$strSQL = "SELECT COUNT(*) FROM body_measurement_table WHERE user_id = '" . $user_id . "' AND body_measurement_type_id = '4'";
$rs = mysqli_query($dbc, $strSQL);
$row = mysqli_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','4','" . $d . "','" . $date . "')";
} else {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','4','" . $d . "','" . $date . "')";
}
mysqli_query($dbc, $strSQL) or die (mysqli_error());
}

if (isset($_POST['body5'])) {
$strSQL = "SELECT COUNT(*) FROM body_measurement_table WHERE user_id = '" . $user_id . "' AND body_measurement_type_id = '5'";
$rs = mysqli_query($dbc, $strSQL);
$row = mysqli_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','5','" . $e . "','" . $date . "')";
} else {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','5','" . $e . "','" . $date . "')";
}
mysqli_query($dbc, $strSQL) or die (mysqli_error());
}

if (isset($_POST['body6'])) {
$strSQL = "SELECT COUNT(*) FROM body_measurement_table WHERE user_id = '" . $user_id . "' AND body_measurement_type_id = '6'";
$rs = mysqli_query($dbc, $strSQL);
$row = mysqli_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','6','" . $f . "','" . $date . "')";
} else {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','6','" . $f . "','" . $date . "')";
}
mysqli_query($dbc, $strSQL) or die (mysqli_error());
}

if (isset($_POST['body1']) && isset($_POST['body2'])) {
$strSQL = "SELECT COUNT(*) FROM body_measurement_table WHERE user_id = '" . $user_id . "' AND body_measurement_type_id = '7'";
$rs = mysqli_query($dbc, $strSQL);
$row = mysqli_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','7','" . $bmi . "','" . $date . "')";
} else {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','7','" . $bmi . "','" . $date . "')";
}
mysqli_query($dbc, $strSQL) or die (mysqli_error());
}

if (isset($_POST['body3']) && isset($_POST['body2'])) {
$strSQL = "SELECT COUNT(*) FROM body_measurement_table WHERE user_id = '" . $user_id . "' AND body_measurement_type_id = '8'";
$rs = mysqli_query($dbc, $strSQL);
$row = mysqli_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','8','" . $fat . "','" . $date . "')";
} else {
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user_id . "','8','" . $fat . "','" . $date . "')";
}
mysqli_query($dbc, $strSQL) or die (mysqli_error());
}

if (isset($_POST['vital1'])) {
$strSQL = "SELECT COUNT(*) FROM vital_signs_table WHERE user_id = '" . $user_id . "' AND vital_signs_type_id = '1'";
$rs = mysqli_query($dbc, $strSQL);
$row = mysqli_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO vital_signs_table(user_id,vital_signs_type_id,vital_signs_value,date_created) VALUES('" . $user_id . "','1','" . $g . "','" . $date . "')";
} else {
$strSQL = "INSERT INTO vital_signs_table(user_id,vital_signs_type_id,vital_signs_value,date_created) VALUES('" . $user_id . "','1','" . $g . "','" . $date . "')";
}
mysqli_query($dbc, $strSQL) or die (mysqli_error());
}

if (isset($_POST['vital2'])) {
$strSQL = "SELECT COUNT(*) FROM vital_signs_table WHERE user_id = '" . $user_id . "' AND vital_signs_type_id = '2'";
$rs = mysqli_query($dbc, $strSQL);
$row = mysqli_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO vital_signs_table(user_id,vital_signs_type_id,vital_signs_value,date_created) VALUES('" . $user_id . "','2','" . $h . "','" . $date . "')";
} else {
$strSQL = "INSERT INTO vital_signs_table(user_id,vital_signs_type_id,vital_signs_value,date_created) VALUES('" . $user_id . "','2','" . $h . "','" . $date . "')";
}
mysqli_query($dbc, $strSQL) or die (mysqli_error());
}

if (isset($_POST['vital3'])) {
$strSQL = "SELECT COUNT(*) FROM vital_signs_table WHERE user_id = '" . $user_id . "' AND vital_signs_type_id = '3'";
$rs = mysqli_query($dbc, $strSQL);
$row = mysqli_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO vital_signs_table(user_id,vital_signs_type_id,vital_signs_value,date_created) VALUES('" . $user_id . "','3','" . $i . "','" . $date . "')";
} else {
$strSQL = "INSERT INTO vital_signs_table(user_id,vital_signs_type_id,vital_signs_value,date_created) VALUES('" . $user_id . "','3','" . $i . "','" . $date . "')";
}
mysqli_query($dbc, $strSQL) or die (mysqli_error());

$strSQL = "SELECT COUNT(*) FROM vital_signs_table WHERE user_id = '" . $user_id . "' AND vital_signs_type_id = '4'";
$rs = mysqli_query($dbc, $strSQL);
$row = mysqli_fetch_array($rs);
$check = $row[0];
if ($check == 0) {
$strSQL = "INSERT INTO vital_signs_table(user_id,vital_signs_type_id,vital_signs_value,date_created) VALUES('" . $user_id . "','4','" . $j . "','" . $date . "')";
} else {
$strSQL = "INSERT INTO vital_signs_table(user_id,vital_signs_type_id,vital_signs_value,date_created) VALUES('" . $user_id . "','4','" . $j . "','" . $date . "')";
}
mysqli_query($dbc, $strSQL) or die (mysqli_error());
}

mysqli_close($dbc);
header('location:profile.php');
?>
