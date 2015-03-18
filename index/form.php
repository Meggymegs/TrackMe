<html>
<head>
<title>Form</title>
</head>
<body>
<form name="form" action="bodyvital.php" method="post">
<font size=6><b>Body Measurements</b></font><br>
Gender: <input type="radio" name="gender" value=1>Male <input type="radio" name="gender" value=2>Female<br>
Input height: <input type="text" name="height" size=4 placeholder="height"> <input type="radio" name="a" value="1">Meter <input type="radio" name="a" value="0.01">Centimeters <input type="radio" name="a" value="0.0254">Inches<br>
Input weight: <input type="text" name="weight" size=4 placeholder="weight"> <input type="radio" name="b" value="1">Kilograms <input type="radio" name="b" value="0.453592">Pounds<br>
Input waist measurement: <input type="text" name="waist" size=4 placeholder="waist"> <input type="radio" name="c" value="1">Inches <input type="radio" name="c" value="0.393701">Centimeters<br>
Input wrist measurement: <input type="text" name="wrist" size=4 placeholder="wrist"> <input type="radio" name="d" value="1">Inches <input type="radio" name="d" value="0.393701">Centimeters<br>
Input hip measurement: <input type="text" name="hips" size=4 placeholder="hip"> <input type="radio" name="e" value="1">Inches <input type="radio" name="e" value="0.393701">Centimeters<br>
Input forearm measurement: <input type="text" name="forearm" size=4 placeholder="forearm"> <input type="radio" name="f" value="1">Inches <input type="radio" name="f" value="0.393701">Centimeters<br><br>
<font size=6><b>Vital Measurements</b></font><br>
Heart Rate (in beats/minute): <input type="text" name="heart" size=4 placeholder="heart"><br>
Respiratory Rate (in breathes/minute): <input type="text" name="resp" size=4 placeholder="resp"><br>
Blood Pressure (both in mmHg): <input type="text" name="systolic" size=4 placeholder="systolic"> / <input type="text" name="diastolic" size=4 placeholder="diastolic"><br><br>
<input type="submit" value="Submit" onclick="compute()">
</form>
</body>
</html>