<?php
////SELECT `user_id`, `user_name`, `user_email`, `user_phone`, `user_pass` FROM `table_users` WHERE 1
include 'config.php';
$name=$_GET["name"];
$email=$_GET["email"];
$phone=$_GET["phone"];
$pass = md5($_GET["password"]);
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");


$query_dis="update table_users set user_name='$name',user_phone='$phone',user_pass='$pass' where user_email='$email' ";
//echo $query_dis; 

$retval_dis = mysqli_query($con,$query_dis);

mysqli_close($con);

echo '{"message":"Updated successfully.","status":"true"}';



?>