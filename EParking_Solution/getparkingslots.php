<?php

include 'config.php';
//SELECT `lid`, `cityname`, `locationname`, `postcode` FROM `location` WHERE 1
// connection 
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
// executing query
$query_json ="SELECT * from location" ;
$retval_json = mysqli_query($con,$query_json);
$rows = array();
while($row = mysqli_fetch_assoc($retval_json)) {
$rows[] = array('lid' => $row['lid'],'cityname' => $row['cityname'],'locationname' => $row['locationname'],'postcode' => $row['postcode']);
}

echo json_encode($rows);
//Json End
mysqli_close($con);
?>