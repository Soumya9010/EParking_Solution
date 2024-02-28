<?php
include 'config.php';


$pid=$_GET["pid"];



//SELECT `booking_id`, `parking_id`, `booking_time`, `booking_date`, `booking_email`, `booking_city`, `booking_location`, `booking_car`, `booking_status`, `payment_id`, `booking_hours`, `booking_amount`, `booking_name` FROM `table_bookings` WHERE 1

$con=mysqli_connect($hostname, $username, $password, $dbname);
mysqli_query ($con,"set character_set_results='utf8'");

    //SELECT `parking_id`, `location_id`, `toal_parkings`, `booked`, `available`, `parking_amount`, `owner`, `parking_status`, `photo`, `location_name`, `location_postcode` FROM `table_park` WHERE 1
   
   
     $query_dis123="update table_park set booked=booked+1,available=available-1  where parking_id='$pid' ";
    $retval_dis123 = mysqli_query($con,$query_dis123);
    
    //till here
  
   echo '{"message":"Parking  already Booked.","status":"false"}'; 

?>