<?php

include 'config.php';
$email=$_GET["email"];
// connection 
//SELECT `cid`, `cname`, `color`, `cplate`, `email`, `photo` FROM `table_car` WHERE 1
$con=mysqli_connect($hostname, $username, $password,$dbname);
mysqli_query ($con,"set character_set_results='utf8'");
// executing query
$query_json ="SELECT * from table_car where email='$email'" ;
$retval_json = mysqli_query($con,$query_json);
$rows = array();
while($row = mysqli_fetch_assoc($retval_json)) {
$rows[] = array('cid' => $row['cid'],'email' => $row['email'],'cname' => $row['cname'],'color' => $row['color'],'cplate' => $row['cplate'],'photo' => $row['photo']);
}

echo json_encode($rows);
//Json End
mysqli_close($con);
?>