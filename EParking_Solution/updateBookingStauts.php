<?php

//SELECT `booking_id`, `parking_id`, `booking_time`, `booking_date`, `booking_email`, `booking_car`, `booking_status`, `payment_id`, `booking_hours`, `booking_amount`, `booking_name` FROM `table_bookings` WHERE 1
include 'config.php';

$id=$_GET["id"];
$pid=$_GET["pid"];


$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");

//SELECT `lid`, `cityname`, `locationname`, `postcode` FROM `location` WHERE 1
$query_dis="update table_bookings set booking_status='Cancelled' where booking_id='$id' ";
//echo $query_dis; 

$retval_dis = mysqli_query($con,$query_dis);


 $query_dis123="update table_park set booked=booked-1,available=available+1  where parking_id='$pid' ";
    $retval_dis123 = mysqli_query($con,$query_dis123);

mysqli_close($con);

echo '{"message":"Updated successfully.","status":"true"}';



?>