<?php
include 'config.php';
$cardtype=$_GET["cardtype"];
$email=$_GET["email"];
$name=$_GET["name"];
$cno=$_GET["cno"];
$exp=$_GET["exp"];
$cvv=$_GET["cvv"];

//SELECT `card_id`, `card_type`, `card_name`, `card_cno`, `card_exp`, `card_cvv`, `card_email` FROM `table_card` WHERE 1

$con=mysqli_connect($hostname, $username, $password, $dbname);
mysqli_query ($con,"set character_set_results='utf8'");
$query_json = "SELECT * from table_card where cno='$cno';";
            $result = mysqli_query($con,$query_json);
            $row = mysqli_fetch_array($result);
            if(!$row)
            {
$query_dis="insert into table_card(card_type,card_name,card_cno,card_exp,card_cvv,card_email) values('$cardtype','$name','$cno','$exp','$cvv','$email');";
//echo $query_dis; 

$retval_dis = mysqli_query($con,$query_dis);

mysqli_close($con);

echo '{"message":"Bank Card Added successfully.","status":"true"}';
}else{
   echo '{"message":"Bank Card already Exists.","status":"false"}'; 
}
?>