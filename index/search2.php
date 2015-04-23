<?php
	include '../mysqli_connect.php';

    $key=$_GET['key'];
    $array = array();
    $query=mysqli_query($dbc, "select * from physical_activities_dist_type_table where physical_activity_dist_type LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['physical_activity_dist_type'];
    }
    echo json_encode($array);
?>
