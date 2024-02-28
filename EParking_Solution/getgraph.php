<?php
//SELECT `bid`, `pid`, `tim`, `dat`, `email`, `city`, `location`, `carbrand`, `cnumber`, `status` FROM `booking` WHERE 1
include 'config.php';
$email=$_GET["email"];
// connection 
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
// executing query
$query_json ="SELECT COUNT(*) as total,table_bookings.parking_id,table_park.owner,table_park.location_name FROM `table_bookings` JOIN table_park on table_bookings.parking_id=table_park.parking_id WHERE table_park.owner='$email' GROUP BY parking_id";
$retval_json = mysqli_query($con,$query_json);
$rows = array();
while($row = mysqli_fetch_assoc($retval_json)) {
$rows[] = array('total' => $row['total'],'parking_id' => $row['parking_id'],'owner' => $row['owner'],'location_name' => $row['location_name']);
}

echo json_encode($rows);
//Json End
mysqli_close($con);
?>