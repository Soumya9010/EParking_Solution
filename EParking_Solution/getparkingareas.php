<?php

include 'config.php';

$id=$_GET["id"];
//SELECT `parking_id`, `location_id`, `parking_name`, `parking_amount`, `parking_status`, `owner` FROM `table_parkingarea` WHERE 1
// connection 
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
// executing query
$query_json ="SELECT * from table_parkingarea where location_id='$id'" ;
$retval_json = mysqli_query($con,$query_json);
$rows = array();
while($row = mysqli_fetch_assoc($retval_json)) {
$rows[] = array('parking_id' => $row['parking_id'],'location_id' => $row['location_id'],'parking_name' => $row['parking_name'],'parking_amount' => $row['parking_amount'],'parking_status' => $row['parking_status']);
}

echo json_encode($rows);
//Json End
mysqli_close($con);
?>