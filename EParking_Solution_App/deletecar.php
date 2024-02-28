<?php
include 'config.php';

$id=$_GET["id"];
// Create connection
//SELECT `pid`, `lid`, `parkingid`, `amount`, `status` FROM `parkingslot` WHERE 1
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
// sql to delete a record
$sql = "DELETE FROM table_car WHERE cid='$id'";

if (mysqli_query($con, $sql)) {
  echo '{"message":"Deleted successfully.","status":"true"}';
} else {
  echo '{"message":"Something went wrong","status":"false"}';
}

mysqli_close($con);
?>