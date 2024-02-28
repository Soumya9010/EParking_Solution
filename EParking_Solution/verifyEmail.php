<?php
include 'config.php';

$email=$_GET["email"];

$securityotp=rand(100001,999999);
//SELECT `id`, `email`, `security` FROM `verification` WHERE 1

$con=mysqli_connect($hostname, $username, $password, $dbname);
mysqli_query ($con,"set character_set_results='utf8'");
$query_json = "SELECT * from verification where email='$email';";
            $result = mysqli_query($con,$query_json);
            $row = mysqli_fetch_array($result);
            if(!$row)
            {
$query_dis="insert into verification(email,security) values('$email','$securityotp');";
//echo $query_dis; 

$retval_dis = mysqli_query($con,$query_dis);


                             
                              $to = $email;
                               $subject = "Greeting From E Parking App";
                                 $txt = "Your Email Verification OTP is  : $securityotp ";
                                $headers = "From: gentesoumya@gmail.com" . "\r\n" .
                                "CC: gentesoumya@gmail.com";
                                
                                mail($to,$subject,$txt,$headers);
                             

mysqli_close($con);

echo '{"message":"OTP Send  to email successfully.","status":"true"}';
}else{
   echo '{"message":"Email Id is already exist.","status":"false"}'; 
}
?>