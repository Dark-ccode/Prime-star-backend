<?php
session_start()
?>

<?php 
//verifying and getting 

if($_POST['plan']!="" && $_POST['amount']!=""):?>
<?php 

include_once "connection.php";
//$sender_name = strtolower($zz->sender_name);


$email = $_POST['email'];
$name = $_POST['name'];
$amount = $_POST['amount'];
$package = $_POST['plan'];
$hash = $_POST['hash'];
$success = false;

$status  = "Pending";
$type  = "deposit";


$img = $_FILES['file'];
$file_extension = strtolower(pathinfo($img['name'],PATHINFO_EXTENSION));
$img_name= round(microtime(true)) . mt_rand().'.'.$file_extension;
$temp_name = $_FILES['file'] ['tmp_name'];
if(isset($img_name) && !empty($img_name)){
$location = 'reciept/';
if(move_uploaded_file($temp_name,$location.$img_name)){
$path = $location.$img_name;
}}





$sql2 = "INSERT INTO deposit(email,amount,package,payment_hash,status,name,reciept)
VALUES('$email','$amount','$package','$hash','$status','$name','$path')";
if($connect->query($sql2)===true){

//for transaction table
$trans = "INSERT INTO transaction(email,amount,type,status)
VALUES('$email','$amount','$type','$status')";
$output =$connect->query($trans);


$success = true;
$feedback=array(0=>$success);
Echo json_encode($feedback) ;
} 

?>
<?php  else: echo "deposit cannot be made";?>
<?php endif;?>