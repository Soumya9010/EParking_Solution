<?php
include 'config.php';
$name=$_GET["name"];
$email=$_GET["email"];
$acno=$_GET["acno"];
$sort=$_GET["sort"];

//SELECT `bank_id`, `bank_name`, `bank_acno`, `bank_sortcode`, `owner` FROM `table_bank` WHERE 1

$con=mysqli_connect($hostname, $username, $password, $dbname);
mysqli_query ($con,"set character_set_results='utf8'");



                    $query_json = "SELECT * from table_bank where bank_acno='$acno' or owner='$email';";
                                $result = mysqli_query($con,$query_json);
                                $row = mysqli_fetch_array($result);
                                if(!$row)
                                {
                                                        $query_dis="insert into table_bank(bank_name,bank_acno,bank_sortcode,owner) values('$name','$acno','$sort','$email')";
                                                        //echo $query_dis; 
                                                        
                                                        $retval_dis = mysqli_query($con,$query_dis);
                    
                                                         $to = $email;
                                                         $subject = "Greeting From E Parking App";
                                                         $txt = "Your Bank Account Registration with E Parking is successfull.";
                                                            $headers = "From: gentesoumya@gmail.com" . "\r\n" .
                                                            "CC: gentesoumya@gmail.com";
                                                    
                                                            mail($to,$subject,$txt,$headers);
                                                 
                    
                                                        mysqli_close($con);
                    
                    echo '{"message":"Bank Account Added Registered successfully.","status":"true"}';
                    }else{
                      echo '{"message":"Bank Account is already exist.","status":"false"}'; 
                    }
                    // echo '{"message":"OTP Verified","status":"true"}';

?>