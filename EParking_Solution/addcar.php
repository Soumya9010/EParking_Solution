<?php
if (!is_dir('images/')) {
    mkdir('images/', 0777, true);
}

include 'config.php';
 
$name=$_POST["cname"];
$color=$_POST["color"];
$cplate=$_POST["cplate"];
$email=$_POST["email"];

 
$result = array("success" => $_FILES["file"]["name"]);
$file_path = basename( $_FILES['file']['name']);
$picimg_url='images/'.$file_path;
if(move_uploaded_file($_FILES['file']['tmp_name'], 'images/'.$file_path)) {
    $result = array("success" => "File successfully uploaded");
} else{
    $result = array("success" => "error uploading file");
}
$con=mysqli_connect($hostname, $username, $password, $dbname);
mysqli_query ($con,"set character_set_results='utf8'");
$query_json = "SELECT * from table_car where cplate='$cplate';";
            $result = mysqli_query($con,$query_json);
            $row = mysqli_fetch_array($result);
            if(!$row)
            {
$query_dis="insert into table_car(cname,color,cplate,email,photo) values($name,$color,$cplate,$email,'$picimg_url');";
//echo $query_dis; 

$retval_dis = mysqli_query($con,$query_dis);

mysqli_close($con);

echo '{"message":"Car Added successfully.","status":"true"}';
}else{
   echo '{"message":"You already added car.","status":"false"}'; 
}
?>