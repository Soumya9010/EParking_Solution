<?php

include 'config.php';
$city=$_GET["city"];
$lname=$_GET["lname"];
$date=$_GET["date"];
$time=$_GET["time"];
$pid=$_GET["pid"];
////SELECT `parking_id`, `location_id`, `parking_name`, `parking_amount`, `parking_status` FROM `table_parkingarea` WHERE 1
//SELECT `booking_id`, `parking_id`, `booking_time`, `booking_date`, `booking_email`, `booking_car`, `booking_status`, `payment_id`, `booking_hours`, `booking_amount`, `booking_name` FROM `table_bookings` WHERE 1
// connection 
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");




$sqlquery= "SELECT available from table_park where parking_id='$pid';";
$resultdata = $con->query($sqlquery);

if ($resultdata->num_rows > 0) {
    
    $rowdata = $resultdata->fetch_assoc();
  // output data of each row
  $a= $rowdata[available];
  
  if($a<=0)
  {
     echo "All Parkings Booked Not Avaliable please try after sometime"; 
  }
  else
  {
     // executing query
$query_json ="SELECT table_location.location_cityname,table_park.location_name,table_park.location_postcode,table_park.parking_id, table_park.location_id, table_park.toal_parkings, table_park.booked, table_park.available, table_park.parking_amount, table_park.owner, table_park.parking_status FROM `table_park` JOIN table_location ON table_park.location_id=table_location.location_id where table_location.location_cityname='$city' and table_park.location_name='$lname' and table_park.parking_status='Verified'" ;
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
  }
  
  
  
} else {
  $query_json123 = "SELECT * from table_bookings where parking_id='$pid' and booking_time='$time' and booking_date='$date'";
            $result123 = mysqli_query($con,$query_json123);
            $row123 = mysqli_fetch_array($result123);
            if ($result123->num_rows > 0) 
            {


 echo '{"message":"No Data Found.","status":"false"}'; 

}
else
{
   // executing query
$query_json ="SELECT table_location.location_cityname,table_park.location_name,table_park.location_postcode,table_park.parking_id, table_park.location_id, table_park.toal_parkings, table_park.booked, table_park.available, table_park.parking_amount, table_park.owner, table_park.parking_status FROM `table_park` JOIN table_location ON table_park.location_id=table_location.location_id where table_location.location_cityname='$city' and table_park.location_name='$lname' and table_park.parking_status='Verified'" ;
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

}
}


?>