
<?php

include_once "connection.php";
$name = strtolower($_GET['name']);
$email = strtolower($_GET['email']);
$phone = $_GET['phone'];
$address = $_GET['address'];
$country = $_GET['country'];

$sql = "UPDATE users SET name='$name',
email='$email',
address='$address',
country='$country',
phone='$phone'

WHERE email='$email'";
//$output =$connect->query($sql);
if($connect->query($sql)){
$success = true;
$feedback=array(0=>$success);
Echo json_encode($feedback) ;


$sql1 = "UPDATE wallet SET email='$email' WHERE email='$email'";
if($connect->query($sql1)){}

$sql2 = "UPDATE widrawal SET email='$email' WHERE email='$email'";
if($connect->query($sql2)){}

$sql3 = "UPDATE deposit SET email='$email' WHERE email='$email'";
if($connect->query($sql3)){}
}




?>