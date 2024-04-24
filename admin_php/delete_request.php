<?php
include_once "connection.php";
//data to be saved in db

$delete_email = $_GET['delete_email'];
$sql = "DELETE  FROM deposit_request  where  email = '$delete_email'";
if($connect->query($sql)){

$success = true;

$feedback=array(0=>$success);
Echo json_encode($feedback) ;
}
?>