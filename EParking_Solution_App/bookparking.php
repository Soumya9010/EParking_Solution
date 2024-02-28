<?php
include 'config.php';

//SELECT `booking_id`, `parking_id`, `booking_time`, `booking_date`, `booking_email`, `booking_car`, 
//`booking_status`, `payment_id`, `booking_hours`, `booking_amount`, `booking_name` FROM `table_bookings` WHERE 1

//SELECT `id`, `payment_name`, `payment_cno`, `payment_exp`, `payment_cvv`, `payment_id` FROM `table_payment` WHERE 1

$pid=$_GET["pid"];
$dat=$_GET["dat"];
$tim=$_GET["tim"];
$email=$_GET["email"];
$car=$_GET["car"];
$status='Booked';
$hours=$_GET["hours"];
$amount=$_GET["amount"];


$name=$_GET["name"];
$cno=$_GET["cno"];
$exp=$_GET["exp"];
$cvv=$_GET["cvv"];


$payment_id=rand(100001,999999);


//SELECT `booking_id`, `parking_id`, `booking_time`, `booking_date`, `booking_email`, `booking_city`, `booking_location`, `booking_car`, `booking_status`, `payment_id`, `booking_hours`, `booking_amount`, `booking_name` FROM `table_bookings` WHERE 1

$con=mysqli_connect($hostname, $username, $password, $dbname);
mysqli_query ($con,"set character_set_results='utf8'");








$query_json = "SELECT * from table_bookings where parking_id='$pid' and booking_date='$dat' and booking_time='$tim' ";
            $result = mysqli_query($con,$query_json);
            $row = mysqli_fetch_array($result);
            if(!$row)
            {
$query_dis="insert into table_bookings(parking_id,booking_time,booking_date,booking_email,booking_car,booking_status,payment_id,booking_hours,booking_amount,booking_name) values
('$pid','$tim','$dat','$email','$car','$status','$payment_id','$hours','$amount','$name');";


//SELECT `id`, `payment_name`, `payment_cno`, `payment_exp`, `payment_cvv`, `payment_id` FROM `table_payment` WHERE 1

    $sql="insert into table_payment(payment_id,payment_name,payment_cno,payment_exp,payment_cvv) values ('$payment_id','$name','$cno','$exp','$cvv')";
    //echo $query_dis; 
    
    
    // update parkings code here
    //SELECT `parking_id`, `location_id`, `toal_parkings`, `booked`, `available`, `parking_amount`, `owner`, `parking_status`, `photo`, `location_name`, `location_postcode` FROM `table_park` WHERE 1
   
   
    $query_dis123="update table_park set booked=booked+1,available=available-1  where parking_id='$pid' ";
    $retval_dis123 = mysqli_query($con,$query_dis123);
    
    //till here
    
    $retval_dis1 = mysqli_query($con,$sql);

$retval_dis = mysqli_query($con,$query_dis);



                     $to = $email;
                         
                             $subject = "Booking Confirmation";
              
                               $to = $email;
                               $subject = "Booking Confirmation From E Parking App";
                                $txt = "Your Parking Area for the location is on Date : $dat and Time : $tim  is Booked Successfully";
                                $headers = "From: gentesoumya@gmail.com" . "\r\n" .
                                "CC: gentesoumya@gmail.com";
                                
                                mail($to,$subject,$txt,$headers);
                             
                             
    

mysqli_close($con);

echo '{"message":"Parking  Booked successfully.","status":"true"}';

}else{
    $sqlquery= "SELECT available from table_park where parking_id='$pid';";
$resultdata = $con->query($sqlquery);

if ($resultdata->num_rows > 0) {
    
    $rowdata = $resultdata->fetch_assoc();
  // output data of each row
  $a= $rowdata[available];
  
  if($a<=0)
  {
      echo '{"message":"All Parkings Booked Not Avaliable please try after sometime","status":"false"}';
    //  echo "All Parkings Booked Not Avaliable please try after sometime"; 
  }
  else
  {
     //echo "Slots Available"; 
     
     $query_dis="insert into table_bookings(parking_id,booking_time,booking_date,booking_email,booking_car,booking_status,payment_id,booking_hours,booking_amount,booking_name) values
('$pid','$tim','$dat','$email','$car','$status','$payment_id','$hours','$amount','$name');";


//SELECT `id`, `payment_name`, `payment_cno`, `payment_exp`, `payment_cvv`, `payment_id` FROM `table_payment` WHERE 1

    $sql="insert into table_payment(payment_id,payment_name,payment_cno,payment_exp,payment_cvv) values ('$payment_id','$name','$cno','$exp','$cvv')";
    //echo $query_dis; 
    
    
    // update parkings code here
    //SELECT `parking_id`, `location_id`, `toal_parkings`, `booked`, `available`, `parking_amount`, `owner`, `parking_status`, `photo`, `location_name`, `location_postcode` FROM `table_park` WHERE 1
   
   
    $query_dis123="update table_park set booked=booked+1,available=available-1  where parking_id='$pid' ";
    $retval_dis123 = mysqli_query($con,$query_dis123);
    
    //till here
    
    $retval_dis1 = mysqli_query($con,$sql);

$retval_dis = mysqli_query($con,$query_dis);



                     $to = $email;
                         
                             $subject = "Booking Confirmation";
              
                               $to = $email;
                               $subject = "Booking Confirmation From E Parking App";
                                $txt = "Your Parking Area for the location is on Date : $dat and Time : $tim  is Booked Successfully";
                                $headers = "From: gentesoumya@gmail.com" . "\r\n" .
                                "CC: gentesoumya@gmail.com";
                                
                                mail($to,$subject,$txt,$headers);
                             
                             
    

mysqli_close($con);

echo '{"message":"Parking  Booked successfully.","status":"true"}';
  }
  
  
  
} else {
  echo "0 results";
}
mysqli_close($con);
}
?>