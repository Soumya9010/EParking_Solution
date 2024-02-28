<?php
include 'config.php';
//SELECT `complaints_id`, `complaints_name`, `complaints_email`, `complaints_refid`, `complaints_msg` FROM `table_complaints` WHERE 1
$name=$_GET["name"];
$email=$_GET["email"];
$bid=$_GET["bid"];
$msg=$_GET["msg"];

$con=mysqli_connect($hostname, $username, $password, $dbname);
mysqli_query ($con,"set character_set_results='utf8'");
$query_json = "SELECT * from table_complaints where complaints_refid='$bid';";
            $result = mysqli_query($con,$query_json);
            $row = mysqli_fetch_array($result);
            if(!$row)
            {
$query_dis="insert into table_complaints(complaints_name,complaints_email,complaints_refid,complaints_msg,status) values('$name','$email','$bid','$msg','In Process');";
//echo $query_dis; 

$retval_dis = mysqli_query($con,$query_dis);

mysqli_close($con);

echo '{"message":"Complaint Registered successfully.","status":"true"}';
}else{
   echo '{"message":"Complaint already Submited.","status":"false"}'; 
}
?>