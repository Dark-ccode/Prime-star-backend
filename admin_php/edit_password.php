
<?php

include_once "connection.php";

$email = $_GET['email'];
$password = $_GET['password'];

$sql = "UPDATE users SET password='$password' WHERE email='$email'";
//$output =$connect->query($sql);
if($connect->query($sql)){
$success = true;
$feedback=array(0=>$success);
Echo json_encode($feedback) ;
}






?>