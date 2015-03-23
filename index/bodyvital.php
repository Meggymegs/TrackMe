<html>
<head>
</head>
<body>
<?php
$user = 1; //user_id
$a = $_POST["height"]*$_POST["a"];
$b = $_POST["weight"]*$_POST["b"];
$c = $_POST["waist"]*$_POST["c"];
$d = $_POST["wrist"]*$_POST["d"];
$e = $_POST["hips"]*$_POST["e"];
$f = $_POST["forearm"]*$_POST["f"];
$g = $_POST["heart"];
$h = $_POST["resp"];
$i = $_POST["systolic"];
$j = $_POST["diastolic"];
$bmi = round($b/($a*$a),2);
if ($_POST["gender"] == 1) {
$fat = (415*$c-8.2*2.20462*$b-9442)/(2.20462*$b);
} else if ($_POST["gender"] == 2) {
$fat = (26.8*2.20462*$b-$d*31.8+$c*15.7+$e*24.9-$f*43.4-898.7)/(2.20462*$b);
}
$fat = round($fat,2);
$date = date("Y-m-d");
mysql_connect("localhost", "root", "1234") or die (mysql_error());
mysql_select_db("trackme") or die (mysql_error());
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user . "','1','" . $a . "','" . $date . "')";
mysql_query($strSQL) or die (mysql_error());
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user . "','2','" . $b . "','" . $date . "')";
mysql_query($strSQL) or die (mysql_error());
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user . "','3','" . $c . "','" . $date . "')";
mysql_query($strSQL) or die (mysql_error());
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user . "','4','" . $d . "','" . $date . "')";
mysql_query($strSQL) or die (mysql_error());
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user . "','5','" . $e . "','" . $date . "')";
mysql_query($strSQL) or die (mysql_error());
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user . "','6','" . $f . "','" . $date . "')";
mysql_query($strSQL) or die (mysql_error());
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user . "','7','" . $bmi . "','" . $date . "')";
mysql_query($strSQL) or die (mysql_error());
$strSQL = "INSERT INTO body_measurement_table(user_id,body_measurement_type_id,body_measurement_value,date_created) VALUES('" . $user . "','8','" . $fat . "','" . $date . "')";
mysql_query($strSQL) or die (mysql_error());
$strSQL = "INSERT INTO vital_signs_table(user_id,vital_signs_type_id,vital_signs_value,date_created) VALUES('" . $user . "','1','" . $g . "','" . $date . "')";
mysql_query($strSQL) or die (mysql_error());
$strSQL = "INSERT INTO vital_signs_table(user_id,vital_signs_type_id,vital_signs_value,date_created) VALUES('" . $user . "','2','" . $h . "','" . $date . "')";
mysql_query($strSQL) or die (mysql_error());
$strSQL = "INSERT INTO vital_signs_table(user_id,vital_signs_type_id,vital_signs_value,date_created) VALUES('" . $user . "','3','" . $i . "','" . $date . "')";
mysql_query($strSQL) or die (mysql_error());
$strSQL = "INSERT INTO vital_signs_table(user_id,vital_signs_type_id,vital_signs_value,date_created) VALUES('" . $user . "','4','" . $j . "','" . $date . "')";
mysql_query($strSQL) or die (mysql_error());
mysql_close();
echo "\n";
?>
</body>
</html>