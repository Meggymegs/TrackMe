<?php
	include '../mysqli_connect.php';

    $key=$_GET['key'];
    $array = array();
    $query=mysqli_query($dbc, "select * from food_table where food_name LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['food_name'];
    }
    echo json_encode($array);
?>
