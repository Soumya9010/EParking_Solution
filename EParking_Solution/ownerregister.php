<?php
include 'config.php';
$name=$_GET["name"];
$email=$_GET["email"];
$phone=$_GET["phone"];
$pass=md5($_GET["pass"]);
$otp=$_GET["otp"];

////SELECT `owner_id`, `owner_name`, `owner_email`, `owner_phone`, `owner_pass` FROM `table_owners` WHERE 1
//SELECT `id`, `email`, `security` FROM `verification` WHERE 1

$con=mysqli_connect($hostname, $username, $password, $dbname);
mysqli_query ($con,"set character_set_results='utf8'");

$verify = "SELECT * from verification where email='$email' and security='$otp'";
            $result123 = mysqli_query($con,$verify);
            $row123 = mysqli_fetch_array($result123);
            if(!$row123)
            {
 
       echo '{"message":"OTP and Email Verification failed. please try again","status":"false"}';
      
      
      
}else{

                    $query_json = "SELECT * from table_owners where owner_email='$email';";
                                $result = mysqli_query($con,$query_json);
                                $row = mysqli_fetch_array($result);
                                if(!$row)
                                {
                                                        $query_dis="insert into table_owners(owner_name,owner_email,owner_phone,owner_pass) values('$name','$email','$phone','$pass');";
                                                        //echo $query_dis; 
                                                        
                                                        $retval_dis = mysqli_query($con,$query_dis);
                    
                                                         $to = $email;
                                                         $subject = "Greeting From E Parking App";
                                                         $txt = "Your Registration with E Parking is successfull.";
                                                            $headers = "From: gentesoumya@gmail.com" . "\r\n" .
                                                            "CC: gentesoumya@gmail.com";
                                                    
                                                            mail($to,$subject,$txt,$headers);
                                                 
                    
                                                        mysqli_close($con);
                    
                    echo '{"message":"Owner Registered successfully.","status":"true"}';
                    }else{
                      echo '{"message":"Email Id is already exist.","status":"false"}'; 
                    }
                    // echo '{"message":"OTP Verified","status":"true"}';
}
?>
