<?php
include 'config.php';

$lid=$_POST["lid"];
$lname=$_POST["lname"];
$postcode=$_POST["postcode"];
$noofparking=$_POST["noofparking"];
$amount=$_POST["amount"];
$email=$_POST["uname"];

$lat=$_POST["lat"];
$lng=$_POST["lng"];

$image = $_POST["img"];
$imgname = $_POST["imgname"];
$img_path = "images/".$imgname.".JPG";

$decodedImage = base64_decode("$image");
 
    $return = file_put_contents("images/".$imgname.".JPG", $decodedImage);
 

$con=mysqli_connect($hostname, $username, $password, $dbname);
mysqli_query ($con,"set character_set_results='utf8'");


$query_json = "SELECT * from table_park where location_id='$lid' and location_name='$lname' and owner='$email'";
            $result = mysqli_query($con,$query_json);
            $row = mysqli_fetch_array($result);
            if(!$row)
            {

$query_dis="insert into table_park(`location_id`, `toal_parkings`, `booked`, `available`, `parking_amount`, `owner`, `parking_status`, `location_name`, `location_postcode`, `lat`, `lng`, `photo`) 
values('$lid','$noofparking','0','$noofparking','$amount','$email','Not Verified','$lname','$postcode','$lat','$lng','$img_path')";
$retval_dis = mysqli_query($con,$query_dis);

mysqli_close($con);

echo '{"message":"Parking Area added successfully.","status":"true"}';
}else{
   echo '{"message":"Parking Area Name already exist.","status":"false"}'; 
}

?>