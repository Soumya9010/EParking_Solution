<?php
include 'config.php';

$pid=$_GET["pid"];



$con=mysqli_connect($hostname, $username, $password, $dbname);
mysqli_query ($con,"set character_set_results='utf8'");
$sqlquery= "SELECT available from table_park where parking_id='$pid';";
$resultdata = $con->query($sqlquery);

if ($resultdata->num_rows > 0) {
    
    $rowdata = $resultdata->fetch_assoc();
  // output data of each row
  $a= $rowdata[available];
  
  if($a<=0)
  {
     echo "All Parkings Booked Not Avaliable please try after sometime"; 
  }
  else
  {
     echo "Slots Available"; 
  }
  
  
  
} else {
  echo "0 results";
}
$con->close();
?>