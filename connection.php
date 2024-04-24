<?php
$server = "localhost";
$username = "primngqo_user";
$pword = ";vbDr'?:=69.6QY";
$db = "primngqo_star";

// Allow from any origin
header("Access-Control-Allow-Origin:*");


$connect =@new mysqli($server,$username,$pword,$db);

if($connect->connect_error){
    die("connection failed:" . $connect->connect_error);
}


?>