<?php
//SELECT `user_id`, `user_name`, `user_email`, `user_phone`, `user_pass` FROM `table_users` WHERE 1
include 'config.php';
$email=$_GET["email"];
// connection 
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
// executing query
$query_json ="SELECT * from table_users where user_email='$email'" ;
$retval_json = mysqli_query($con,$query_json);
$rows = array();
while($row = mysqli_fetch_assoc($retval_json)) {
$rows[] = array('user_id' => $row['user_id'],'user_name' => $row['user_name'],'user_email' => $row['user_email'],'user_phone' => $row['user_phone'],'user_pass' => $row['user_pass']);
}

echo json_encode($rows);
//Json End
mysqli_close($con);
?>