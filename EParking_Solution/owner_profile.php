<?php

include 'config.php';
$email=$_GET["email"];

//SELECT `owner_id`, `owner_name`, `owner_email`, `owner_phone`, `owner_pass` FROM `table_owners` WHERE 1
// connection 
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
// executing query
$query_json ="SELECT * from table_owners where owner_email='$email'" ;
$retval_json = mysqli_query($con,$query_json);
$rows = array();
while($row = mysqli_fetch_assoc($retval_json)) {
$rows[] = array('owner_id' => $row['owner_id'],'owner_name' => $row['owner_name'],'owner_email' => $row['owner_email'],'owner_phone' => $row['owner_phone'],'owner_pass' => $row['owner_pass']);
}

echo json_encode($rows);
//Json End
mysqli_close($con);
?>