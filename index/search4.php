<?php
	include '../mysqli_connect.php';

    $key=$_GET['key'];
    $array = array();
    $query=mysqli_query($dbc, "select * from physical_activities_time_type_table where physical_activity_time_type LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['physical_activity_time_type'];
    }
    echo json_encode($array);
?>
