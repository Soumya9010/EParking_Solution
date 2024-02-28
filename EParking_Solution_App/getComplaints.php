<?php

include 'config.php';
//SELECT `complaints_id`, `complaints_name`, `complaints_email`, `complaints_refid`, `complaints_msg` FROM `table_complaints` WHERE 1
// connection 
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
// executing query
$query_json ="SELECT * from table_complaints" ;
$retval_json = mysqli_query($con,$query_json);
$rows = array();
while($row = mysqli_fetch_assoc($retval_json)) {
$rows[] = array('complaints_id' => $row['complaints_id'],'complaints_name' => $row['complaints_name'],'complaints_email' => $row['complaints_email'],'complaints_refid' => $row['complaints_refid'],'complaints_msg' => $row['complaints_msg'],'status' => $row['status']);
}

echo json_encode($rows);
//Json End
mysqli_close($con);
?>