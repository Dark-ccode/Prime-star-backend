
<?php

include_once "connection.php";

$id =$_GET['id'];

$sql = "UPDATE deposit SET status='Declined' WHERE id='$id'";
if($connect->query($sql)){
$success = true;
}




?>