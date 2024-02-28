<?php
////SELECT `user_id`, `user_name`, `user_email`, `user_phone`, `user_pass` FROM `table_users` WHERE 1
include 'config.php';
$email=$_GET["email"];
$phone=$_GET["phone"];
$pass=md5($_GET["pass"]);
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");


$query_dis="update table_users set user_pass='$pass' where user_email='$email' and user_phone='$phone'";
//echo $query_dis; 


if (mysqli_query($con, $query_dis)) {
 
echo '{"message":"Updated successfully.","status":"true"}';
} else {
  
echo '{"message":"Invalid  Details.","status":"false"}';
}


?>