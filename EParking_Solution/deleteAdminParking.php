<?php
include 'config.php';

$id=$_GET["id"];
// Create connection
//////SELECT `parking_id`, `location_id`, `parking_name`, `parking_amount`, `parking_status` FROM `table_parkingarea` WHERE 1
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
// sql to delete a record
$sql = "DELETE FROM table_park WHERE parking_id='$id'";

if (mysqli_query($con, $sql)) {
  echo '{"message":"Deleted successfully.","status":"true"}';
} else {
  echo '{"message":"Something went wrong","status":"false"}';
}

mysqli_close($con);
?>