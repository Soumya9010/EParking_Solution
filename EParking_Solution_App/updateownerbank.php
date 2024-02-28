<?php

include 'config.php';
//SELECT `bank_id`, `bank_name`, `bank_acno`, `bank_sortcode`, `owner` FROM `table_bank` WHERE 1
$bid=$_GET["bid"];
$name=$_GET["name"];
$acno=$_GET["acno"];
$sort=$_GET["sort"];

$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");

//SELECT `lid`, `cityname`, `locationname`, `postcode` FROM `location` WHERE 1
$query_dis="update table_bank set bank_name='$name',bank_acno='$acno',bank_sortcode='$sort' where bank_id='$bid' ";
//echo $query_dis; 

$retval_dis = mysqli_query($con,$query_dis);

mysqli_close($con);

echo '{"message":"Updated successfully.","status":"true"}';



?>