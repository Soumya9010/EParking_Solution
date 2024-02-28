<?php
//SELECT `bid`, `pid`, `tim`, `dat`, `email`, `city`, `location`, `carbrand`, `cnumber`, `status` FROM `booking` WHERE 1
include 'config.php';
$email=$_GET["email"];
// connection 
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
// executing query
$query_json ="SELECT * FROM `table_bookings` JOIN table_park on table_bookings.parking_id=table_park.parking_id JOIN table_location on table_location.location_id=table_park.location_id WHERE table_bookings.booking_email='$email'";
$retval_json = mysqli_query($con,$query_json);
$rows = array();
while($row = mysqli_fetch_assoc($retval_json)) {
$rows[] = array('booking_id' => $row['booking_id'],'parking_id' => $row['parking_id'],'booking_time' => $row['booking_time'],'booking_date' => $row['booking_date'],
'booking_email' => $row['booking_email'],'location_cityname' => $row['location_cityname']
,'location_name' => $row['location_name']
,'booking_car' => $row['booking_car']
,'booking_status' => $row['booking_status']
,'payment_id' => $row['payment_id'],'booking_hours' => $row['booking_hours'],'booking_amount' => $row['booking_amount'],'booking_name' => $row['booking_name'],'parking_name' => $row['parking_name'],'owner' => $row['owner']);
}

echo json_encode($rows);
//Json End
mysqli_close($con);
?>