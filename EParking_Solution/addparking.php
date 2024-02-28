<?php
include 'config.php';
$lid=$_GET["lid"];
$pname=$_GET["pname"];
$amount=$_GET["amount"];
$status=$_GET["status"];
$email=$_GET["email"];
$lname=$_GET["lname"];
$postcode=$_GET["postcode"];
$lat=$_GET["lat"];
$lng=$_GET["lng"];

//SELECT `parking_id`, `location_id`, `toal_parkings`, `booked`, `available`, `parking_amount`, `owner`, `parking_status` FROM `table_park` WHERE 1
//SELECT `parking_id`, `location_id`, `toal_parkings`, `booked`, `available`, `parking_amount`, `owner`, `parking_status`, `photo`, `location_name`, `location_postcode` FROM `table_park` WHERE 1

$con=mysqli_connect($hostname, $username, $password, $dbname);
mysqli_query ($con,"set character_set_results='utf8'");
$query_json = "SELECT * from table_park where location_id='$lid' and location_name='$lname' and owner='$email'";
            $result = mysqli_query($con,$query_json);
            $row = mysqli_fetch_array($result);
            if(!$row)
            {
$query_dis="insert into table_park(location_id,toal_parkings,booked,available,parking_amount,parking_status,owner,location_name,location_postcode,lat,lng) values('$lid','$pname','0',$pname,'$amount','$status','$email','$lname','$postcode','$lat','$lng');";
//echo $query_dis; 

$retval_dis = mysqli_query($con,$query_dis);

mysqli_close($con);

echo '{"message":"Parking Area added successfully.","status":"true"}';
}else{
   echo '{"message":"Parking Area Name already exist.","status":"false"}'; 
}
?>