<?php
$host="localhost";
$username="root";
$password="";
$database="beauty_center";
$dbConnect=@mysqli_connect($host,$username,$password,$database)or die("ERROR: Cannot connect to database sever!");
date_default_timezone_set("Asia/Bangkok");
$dbConnect ->set_charset("utf8");

?>
