<?php

include 'config.php';
//SELECT `parking_id`, `location_id`, `toal_parkings`, `booked`, `available`, `parking_amount`, `owner`, `parking_status`, `photo`, `location_name`, `location_postcode` FROM `table_park` WHERE 1
$lid=$_GET["id"];
$status=$_GET["status"];

$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");

//SELECT `lid`, `cityname`, `locationname`, `postcode` FROM `location` WHERE 1
$query_dis="update table_park set parking_status='$status' where parking_id='$lid' ";
//echo $query_dis; 

$retval_dis = mysqli_query($con,$query_dis);

mysqli_close($con);

echo '{"message":"Updated successfully.","status":"true"}';



?>