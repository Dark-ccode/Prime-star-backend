
<?php

include_once "connection.php";

$old_password = $_GET['old_password'];
$email = $_GET['email'];
$new_password = $_GET['new_password'];

$sql = "UPDATE users SET password='$new_password' WHERE email='$email'";
//$output =$connect->query($sql);
if($connect->query($sql)){
$success = true;
$feedback=array(0=>$success);
Echo json_encode($feedback) ;
}






?>