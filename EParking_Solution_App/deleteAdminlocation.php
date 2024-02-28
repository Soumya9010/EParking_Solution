<?php
include 'config.php';

$id=$_GET["id"];
// Create connection
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
// sql to delete a record
$sql = "DELETE FROM table_location WHERE location_id='$id'";

if (mysqli_query($con, $sql)) {
  echo '{"message":"Deleted successfully.","status":"true"}';
} else {
  echo '{"message":"Something wrong Please try after sometime","status":"false"}';
}

mysqli_close($con);
?>