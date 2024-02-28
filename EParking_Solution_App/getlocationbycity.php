<?php

include 'config.php';
$city=$_GET["city"];
// connection 
//SELECT `cid`, `email`, `brand`, `color`, `cnumber` FROM `car` WHERE 1
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
// executing query
$query_json ="SELECT table_park.parking_id,table_park.location_id, table_park.location_name FROM `table_park` JOIN table_location on table_park.location_id=table_location.location_id WHERE table_location.location_cityname='$city'" ;
$retval_json = mysqli_query($con,$query_json);
$rows = array();
while($row = mysqli_fetch_assoc($retval_json)) {
$rows[] = array('parking_id' => $row['parking_id'],'location_id' => $row['location_id'],'location_name' => $row['location_name']);
}

echo json_encode($rows);
//Json End
mysqli_close($con);
?>