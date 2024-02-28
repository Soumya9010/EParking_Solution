<?php

include 'config.php';
//////SELECT `parking_id`, `location_id`, `parking_name`, `parking_amount`, `parking_status` FROM `table_parkingarea` WHERE 1

//SELECT `parking_id`, `location_id`, `toal_parkings`, `booked`, `available`, `parking_amount`, `owner`, `parking_status` FROM `table_park` WHERE 1
//SELECT `parking_id`, `location_id`, `toal_parkings`, `booked`, `available`, `parking_amount`, `owner`, `parking_status`, `photo`, `location_name`, `location_postcode` FROM `table_park` WHERE 1
$pid=$_GET["pid"];
$lname=$_GET["lname"];
$postcode=$_GET["postcode"];
$tot=$_GET["tot"];

$booked=$_GET["booked"];
$available=$_GET["available"];
$amount=$_GET["amount"];

$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");

$query_dis="update table_park set   location_name='$lname',location_postcode='$postcode',toal_parkings='$tot',booked='$booked',available='$available',parking_amount='$amount' where parking_id='$pid' ";
//echo $query_dis; 

$retval_dis = mysqli_query($con,$query_dis);

mysqli_close($con);

echo '{"message":"Updated successfully.","status":"true"}';



?>