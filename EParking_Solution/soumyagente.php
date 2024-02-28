<?php
include 'config.php';

//SELECT `booking_id`, `parking_id`, `booking_time`, `booking_date`, `booking_email`, `booking_car`, 
//`booking_status`, `payment_id`, `booking_hours`, `booking_amount`, `booking_name` FROM `table_bookings` WHERE 1

//SELECT `id`, `payment_name`, `payment_cno`, `payment_exp`, `payment_cvv`, `payment_id` FROM `table_payment` WHERE 1

$pid=$_GET["pid"];
$dat=$_GET["dat"];
$tim=$_GET["tim"];


//SELECT `booking_id`, `parking_id`, `booking_time`, `booking_date`, `booking_email`, `booking_city`, `booking_location`, `booking_car`, `booking_status`, `payment_id`, `booking_hours`, `booking_amount`, `booking_name` FROM `table_bookings` WHERE 1

// $con=mysqli_connect($hostname, $username, $password, $dbname);
// mysqli_query ($con,"set character_set_results='utf8'");
// $query_json = "SELECT * from table_bookings where parking_id='$pid' and booking_date='$dat' and booking_time='$tim' ";
//          // $result = mysqli_query($con,$query_json);
//           $resultdata = $con->query($query_json);
//          //$data=mysql_fetch_assoc($result);
//          while ($row = $resultdata->fetch_assoc()) {
//     echo $row['classtype']."<br>";
// }
//          // echo $resultdata.toString;


$con=mysqli_connect($hostname, $username, $password, $dbname);
mysqli_query ($con,"set character_set_results='utf8'");
  
 $sqlsss="SELECT COUNT(*) as total FROM `table_bookings` WHERE parking_id='$pid' AND booking_time='$tim' AND booking_date='$dat' ";

$resultdata = $con->query($sqlsss);

if ($resultdata->num_rows > 0) {
    
    $rowdata = $resultdata->fetch_assoc();
  // output data of each row
  $a= $rowdata[total];
  
//  echo $rowdata;
  //number of bookings 
  echo $a;
  
}
 $sqlquery= "SELECT toal_parkings from table_park where parking_id='$pid';";
$resultdata = $con->query($sqlquery);
if ($resultdata->num_rows > 0) {
    
    $rowdata = $resultdata->fetch_assoc();
  // output data of each row
  $a= $rowdata[toal_parkings];
  //number of totalparkings
  echo $a;
}
?>