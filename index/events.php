<?php

try {
	
    // Connect to database
    include '../mysqli_connect.php';
	session_start();
	$myusername = $_SESSION['myusername'];
    // Prepare and execute query
    $query = "SELECT food_served_table.user_id, food_table.food_name,food_served_table.date_created 
						FROM food_served_table, user_table, food_table 
						WHERE user_table.user_email like '$myusername' 
						AND food_served_table.user_id = user_table-user_id
						AND food_served_table.food_id = food_table.food_id";
    $sth = $connection->prepare($query);
    $sth->execute();

    // Returning array
    $events = array();

    // Fetch results
    while ($row = $sth->fetch(PDO::FETCH_ASSOC) {

        $e = array();
        $e['id'] = $row['user_table.user_id'];
        $e['title'] = $row['food_table.food_name'];
        $e['start'] = $row['food_served_table.date_created'];
        $e['end'] = $row['food_served_table.date_created'];
        $e['allDay'] = false;

        // Merge the event array into the return array
        array_push($events, $e);

    }

    // Output json for our calendar
    echo json_encode($events);
    exit();

} catch (PDOException $e){
    echo $e->getMessage();

/*
// Create connection
include '../mysqli_connect.php';

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
session_start();

$result = mysql_query("SELECT food_served_table.user_id, food_table.food_name,food_served_table.date_created 
						FROM food_served_table, user_table, food_table 
						WHERE user_table.user_email like '$myusername' 
						AND food_served_table.user_id = user_table-user_id
						AND food_served_table.food_id = food_table.food_id");
mysql_close();
$events = array();
while ($row=mysql_fetch_array($result)){            
$id =  $row['user_table.user_id'];
$title = $row['food_table.food_name'];
$start = $row['food_served_table.date_created']; 

$events = array(
'id' =>  "$id",
'name' => "$title",
'start' => "$start"
);

}
echo json_encode($events);
*/
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
// List of events
 $json = array();

 // Query that retrieves events
 $requete = "SELECT * FROM food_table ORDER BY id";

 // connection to the database
 try {
 $bdd = new PDO('mysql:host=localhost;dbname=trackme', 'root', 'root');
 } catch(Exception $e) {
  exit('Unable to connect to database.');
 }
 // Execute the query
 $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));

 // sending the encoded result to success page
 echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));
*/
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
try {
	
    // Connect to database
    include '../mysqli_connect.php';
	session_start();
	$myusername = $_SESSION['myusername'];
    // Prepare and execute query
    $query = "SELECT * FROM food_table, user_table WHERE user_table.user_email like '$myusername' AND food_table.user_id = user_table-user_id ";
    $sth = $connection->prepare($query);
    $sth->execute();

    // Returning array
    $events = array();

    // Fetch results
    while ($row = $sth->fetch(PDO::FETCH_ASSOC) {

        $e = array();
        $e['id'] = $row['id'];
        $e['title'] = "Lorem Ipsum";
        $e['start'] = $row['start'];
        $e['end'] = $row['end'];
        $e['allDay'] = false;

        // Merge the event array into the return array
        array_push($events, $e);

    }

    // Output json for our calendar
    echo json_encode($events);
    exit();

} catch (PDOException $e){
    echo $e->getMessage();
*/
?>