<?php
include 'config.php';
$cname=$_GET["cname"];

//SELECT `location_id`, `location_cityname` FROM `table_location` WHERE 1

$con=mysqli_connect($hostname, $username, $password, $dbname);
mysqli_query ($con,"set character_set_results='utf8'");
$query_json = "SELECT * from table_location where location_cityname='$cname' ";
            $result = mysqli_query($con,$query_json);
            $row = mysqli_fetch_array($result);
            if(!$row)
            {
$query_dis="insert into table_location(location_cityname) values('$cname');";
//echo $query_dis; 

$retval_dis = mysqli_query($con,$query_dis);

mysqli_close($con);

echo '{"message":"City Added successfully.","status":"true"}';
}else{
   echo '{"message":"City Name already exist.","status":"false"}'; 
}
?>