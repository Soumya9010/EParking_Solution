<?php
$to = "info@myprojectwork.life";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: ravibabu89.nadakuditi@gmail.com" . "\r\n" .
"CC: somebodyelse@example.com";

mail($to,$subject,$txt,$headers);
?>