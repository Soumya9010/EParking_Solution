<?php

include 'config.php';
$id=$_GET[id];
//SELECT `location_id`, `location_cityname`, `location_name`, `location_postcode` FROM `table_location` WHERE 1
// connection 
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
// executing query
$query_json ="SELECT * from table_location where location_id='$id'" ;
$retval_json = mysqli_query($con,$query_json);
$rows = array();
while($row = mysqli_fetch_assoc($retval_json)) {
$rows[] = array('location_id' => $row['location_id'],'location_cityname' => $row['location_cityname'],'location_name' => $row['location_name'],'location_postcode' => $row['location_postcode']);
}

echo json_encode($rows);
//Json End
mysqli_close($con);
?>