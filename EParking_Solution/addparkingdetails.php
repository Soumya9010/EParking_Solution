<?php
include 'config.php';
$lid=$_GET["lid"];
$pname=$_GET["pname"];
$amount=$_GET["amount"];
$status=$_GET["status"];


//SELECT `parking_id`, `location_id`, `parking_name`, `parking_amount`, `parking_status` FROM `table_parkingarea` WHERE 1

$con=mysqli_connect($hostname, $username, $password, $dbname);
mysqli_query ($con,"set character_set_results='utf8'");
$query_json = "SELECT * from table_parkingarea where parking_name='$pname' and location_id='$lid';";
            $result = mysqli_query($con,$query_json);
            $row = mysqli_fetch_array($result);
            if(!$row)
            {
$query_dis="insert into table_parkingarea(location_id,parking_name,parking_amount,parking_status,owner) values('$lid','$pname','$amount','$status','admin');";
//echo $query_dis; 

$retval_dis = mysqli_query($con,$query_dis);

mysqli_close($con);

echo '{"message":"Parking Area added successfully.","status":"true"}';
}else{
   echo '{"message":"Parking Area Name already exist.","status":"false"}'; 
}
?>