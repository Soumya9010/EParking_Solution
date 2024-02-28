<?php
//SELECT `owner_id`, `owner_name`, `owner_email`, `owner_phone`, `owner_pass` FROM `table_owners` WHERE 1
include 'config.php';
$email=$_GET["email"];
$phone=$_GET["phone"];
$pass=md5($_GET["pass"]);
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");


$query_dis="update table_owners set owner_pass='$pass' where owner_email='$email' and owner_phone='$phone'";
//echo $query_dis; 

if (mysqli_query($con, $query_dis)) {
 
echo '{"message":"Updated successfully.","status":"true"}';
} else {
  
echo '{"message":"Invalid  Details.","status":"false"}';
}


?>