<?php

include 'config.php';
$email=$_GET["email"];
//SELECT `card_id`, `card_type`, `card_name`, `card_cno`, `card_exp`, `card_cvv`, `card_email` FROM `table_card` WHERE 1
// connection 
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
// executing query
$query_json ="SELECT * from table_card where card_email='$email'" ;
$retval_json = mysqli_query($con,$query_json);
$rows = array();
while($row = mysqli_fetch_assoc($retval_json)) {
$rows[] = array('card_id' => $row['card_id'],'card_type' => $row['card_type'],'card_name' => $row['card_name'],'card_cno' => $row['card_cno'],'card_exp' => $row['card_exp'],'card_cvv' => $row['card_cvv'],'card_email' => $row['card_email']);
}

echo json_encode($rows);
//Json End
mysqli_close($con);
?>