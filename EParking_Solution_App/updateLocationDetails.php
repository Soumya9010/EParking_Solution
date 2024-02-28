<?php

include 'config.php';
////SELECT `location_id`, `location_cityname`, `location_name`, `location_postcode` FROM `table_location` WHERE 1
$lid=$_GET["lid"];
$cname=$_GET["cname"];

$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");

//SELECT `lid`, `cityname`, `locationname`, `postcode` FROM `location` WHERE 1
$query_dis="update table_location set location_cityname='$cname' where location_id='$lid' ";
//echo $query_dis; 

$retval_dis = mysqli_query($con,$query_dis);

mysqli_close($con);

echo '{"message":"Updated successfully.","status":"true"}';



?>