<?php
//SELECT `uid`, `name`, `email`, `phone`, `pass` FROM `user` WHERE 1
include 'config.php';
// connection 
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
// executing query
$query_json ="SELECT * from user" ;
$retval_json = mysqli_query($con,$query_json);
$rows = array();
while($row = mysqli_fetch_assoc($retval_json)) {
$rows[] = array('uid' => $row['uid'],'email' => $row['email'],'name' => $row['name'],'phone' => $row['phone'],'pass' => $row['pass']);
}

echo json_encode($rows);
//Json End
mysqli_close($con);
?>