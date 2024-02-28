<?php
//SELECT `bank_id`, `bank_name`, `bank_acno`, `bank_sortcode`, `owner` FROM `table_bank` WHERE 1
include 'config.php';
$email=$_GET["email"];
// connection 
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
// executing query
$query_json ="SELECT * from table_bank where owner='$email'" ;
$retval_json = mysqli_query($con,$query_json);
$rows = array();
while($row = mysqli_fetch_assoc($retval_json)) {
$rows[] = array('bank_id' => $row['bank_id'],'bank_name' => $row['bank_name'],'bank_acno' => $row['bank_acno'],'bank_sortcode' => $row['bank_sortcode'],'owner' => $row['owner']);
}

echo json_encode($rows);
//Json End
mysqli_close($con);
?>