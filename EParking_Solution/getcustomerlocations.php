<?php

include 'config.php';
//SELECT `location_id`, `location_cityname` FROM `table_location` WHERE 1
// connection 
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
// executing query
$query_json ="SELECT * FROM `table_location`" ;
$retval_json = mysqli_query($con,$query_json);
$rows = array();
while($row = mysqli_fetch_assoc($retval_json)) {
$rows[] = array('location_id' => $row['location_id'],'location_cityname' => $row['location_cityname']);
}

echo json_encode($rows);
//Json End
mysqli_close($con);
?>