<?php
include_once "connection.php";
//data to be saved in db

$delete_email = $_GET['delete_email'];
$sql = "DELETE  FROM users  where  email = '$delete_email'";
if($connect->query($sql)){
$sql1 = "DELETE  FROM widrawal  where  email = '$delete_email'";
$connect->query($sql1);
$sql2 = "DELETE  FROM deposit  where  email = '$delete_email'";
$connect->query($sql2);
$sql3 = "DELETE  FROM transaction  where  email = '$delete_email'";
$connect->query($sql3);
$sql4 = "DELETE  FROM deposit_request  where  email = '$delete_email'";
$connect->query($sql4);
$sql5 = "DELETE  FROM wallet  where  email = '$delete_email'";
$connect->query($sql5);

$success = true;

$feedback=array(0=>$success);
Echo json_encode($feedback) ;
}
?>