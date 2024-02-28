<?php

include 'config.php';
//old table
////SELECT `parking_id`, `location_id`, `parking_name`, `parking_amount`, `parking_status` FROM `table_parkingarea` WHERE 1
//new table
////SELECT `parking_id`, `location_id`, `toal_parkings`, `booked`, `available`, `parking_amount`, `owner`, `parking_status` FROM `table_park` WHERE 1
// connection 
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
// executing query
$query_json ="SELECT table_location.location_cityname,table_park.location_name,table_park.location_postcode,table_park.parking_id, table_park.location_id, table_park.toal_parkings, table_park.booked, table_park.available, table_park.parking_amount, table_park.owner, table_park.parking_status FROM `table_park` JOIN table_location ON table_park.location_id=table_location.location_id" ;
$retval_json = mysqli_query($con,$query_json);
$rows = array();
while($row = mysqli_fetch_assoc($retval_json)) {
$rows[] = array('parking_id' => $row['parking_id'],'location_id' => $row['location_id'],'toal_parkings' => $row['toal_parkings'],
'parking_amount' => $row['parking_amount'],'parking_status' => $row['parking_status'],'booked' => $row['booked'],
'available' => $row['available'],'location_cityname' => $row['location_cityname'],'location_name' => $row['location_name'],'location_postcode' => $row['location_postcode']);
}

echo json_encode($rows);
//Json End
mysqli_close($con);
?>