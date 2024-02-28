<?php
include 'config.php';

//SELECT `booking_id`, `parking_id`, `booking_time`, `booking_date`, `booking_email`, `booking_car`, 
//`booking_status`, `payment_id`, `booking_hours`, `booking_amount`, `booking_name` FROM `table_bookings` WHERE 1

//SELECT `id`, `payment_name`, `payment_cno`, `payment_exp`, `payment_cvv`, `payment_id` FROM `table_payment` WHERE 1

$pid=$_GET["pid"];
$dat=$_GET["dat"];
$tim=$_GET["tim"];

  

$con=mysqli_connect($hostname, $username, $password, $dbname);
mysqli_query ($con,"set character_set_results='utf8'");
  
 $sqlsss="SELECT COUNT(*) as total FROM `table_bookings` WHERE parking_id='$pid' OR booking_time='$tim' OR booking_date='$dat' ";

$resultdata = $con->query($sqlsss);

if ($resultdata->num_rows > 0) {
    
    $rowdata = $resultdata->fetch_assoc();
  // output data of each row
  $a= $rowdata[total];
  
//  echo $rowdata;
  
  echo $a;
  
}
  ?>