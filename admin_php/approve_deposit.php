
<?php

include_once "connection.php";

$id = strtolower($_GET['id']);

$sql = "UPDATE deposit SET status='Approved' WHERE id='$id'";
if($connect->query($sql)){
$success = true;
}




?>