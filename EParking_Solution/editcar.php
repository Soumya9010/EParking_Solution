<?php

include 'config.php';
$cid=$_GET["cid"];
$brand=$_GET["brand"];
$color=$_GET["color"];
$cnumber=$_GET["cnumber"];
//$email=$_GET["email"];


//SELECT `cid`, `cname`, `color`, `cplate`, `email`, `photo` FROM `table_car` WHERE 1


$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");

//SELECT `cid`, `email`, `brand`, `color`, `cnumber` FROM `car` WHERE 1
$query_dis="update table_car set cname='$brand',color='$color',cplate='$cnumber' where cid='$cid' ";
//echo $query_dis; 

$retval_dis = mysqli_query($con,$query_dis);

mysqli_close($con);

echo '{"message":"Updated successfully.","status":"true"}';



?>