
<?php 

include_once "connection.php";


$email = $_GET['email'];
$name = $_GET['name'];
$success = false;


$sql2 = "INSERT INTO deposit_request(name,Email)
VALUES('$name','$email')";
if($connect->query($sql2)===true){

$success = true;
$feedback=array(0=>$success);
Echo json_encode($feedback) ;
} 

?>
