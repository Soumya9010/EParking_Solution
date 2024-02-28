<?php
            $un=$_GET["email"];
            $pass=md5($_GET["pass"]);
           
           
           ////SELECT `owner_id`, `owner_name`, `owner_email`, `owner_phone`, `owner_pass` FROM `table_owners` WHERE 1
            include 'config.php';
            $con=mysqli_connect($hostname, $username, $password,$dbname);
            mysqli_query ($con,"set character_set_results='utf8'");
             $query_json = "SELECT * from table_owners where owner_email='$un' and owner_pass='$pass' ";
            $result = mysqli_query($con,$query_json);
            $row = mysqli_fetch_array($result);
            if(!$row)
            {
                echo '{"message":"Invalid Details","status":"false"}';
            }else{
                echo '{"message":"Login successfully","status":"true"}';
            }
           
?>