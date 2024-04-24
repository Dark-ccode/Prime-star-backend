
<?php

include_once "connection.php";

$id = $_GET['id'];

$sql = "UPDATE widrawal SET status='Approved' WHERE id='$id'";
if($connect->query($sql)){
$success = true;
}




?>