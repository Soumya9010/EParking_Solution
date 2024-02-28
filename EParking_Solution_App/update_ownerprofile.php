<?php

include 'config.php';
$name=$_GET["name"];
$email=$_GET["email"];
$phone=$_GET["phone"];
$pass=md5($_GET["pass"]);
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");

////SELECT `owner_id`, `owner_name`, `owner_email`, `owner_phone`, `owner_pass` FROM `table_owners` WHERE 1
$query_dis="update table_owners set owner_name='$name',owner_phone='$phone',owner_pass='$pass' where owner_email='$email' ";
//echo $query_dis; 

$retval_dis = mysqli_query($con,$query_dis);

mysqli_close($con);

echo '{"message":"Updated successfully.","status":"true"}';



?>