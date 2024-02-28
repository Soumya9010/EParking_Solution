<?php
if (!is_dir('images/')) {
    mkdir('images/', 0777, true);
}
include 'config.php';


$lid=$_POST["lid"];
$lname=$_POST["lname"];
$postcode=$_POST["postcode"];
$noofparking=$_POST["noofparking"];
$amount=$_POST["amount"];
$email=$_POST["email"];


//$query_json = "SELECT * from table_park where location_id='$lid' and owner='$email';";

//$query_dis="insert into table_park(location_id,toal_parkings,booked,available,parking_amount,parking_status,owner) values('$lid','$pname','0',$pname,'$amount','$status','$email');";
//SELECT `parking_id`, `location_id`, `toal_parkings`, `booked`, `available`, `parking_amount`, `owner`, `parking_status`, `photo`, `location_name`, `location_postcode` FROM `table_park` WHERE 1

$result = array("success" => $_FILES["file"]["name"]);
$file_path = basename( $_FILES['file']['name']);
$picimg_url='images/'.$file_path;
if(move_uploaded_file($_FILES['file']['tmp_name'], 'images/'.$file_path)) {
    $result = array("success" => "File successfully uploaded");
} else{
    $result = array("success" => "error uploading file");
}
$con=mysqli_connect($hostname, $username, $password, $dbname);
mysqli_query ($con,"set character_set_results='utf8'");
$query_json = "SELECT * from table_park where location_id='$lid' and owner='$email' and location_name='$lname'";
            $result = mysqli_query($con,$query_json);
            $row = mysqli_fetch_array($result);
            if(!$row)
            {
$query_dis="insert into table_park(`location_id`, `toal_parkings`, `booked`, `available`, `parking_amount`, `owner`, `parking_status`, `location_name`, `location_postcode`, `photo`) 
values($lid,$noofparking,'0',$noofparking,$amount,$email,'Not Verified',$lname,$postcode,'$picimg_url');";
//echo $query_dis; 

$retval_dis = mysqli_query($con,$query_dis);

mysqli_close($con);

echo '{"message":"Parking Area Added successfully.","status":"true"}';
}else{
   echo '{"message":"You already added parking area in that location.","status":"false"}'; 
}
?>