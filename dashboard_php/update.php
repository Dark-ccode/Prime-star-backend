<?php 
include_once "connection.php";

$email = $_POST['email'];
$dob = $_POST['dob'];
$sex = $_POST['sex'];
$occupation = $_POST['occupation'];
// $income = $_POST['income'];
$serial_no = $_POST['serial_no'];
// $file = $_POST['file'];


$img = $_FILES['file'];
$file_extension = strtolower(pathinfo($img['name'],PATHINFO_EXTENSION));
$img_name= round(microtime(true)) . mt_rand().'.'.$file_extension;
$temp_name = $_FILES['file'] ['tmp_name'];
if(isset($img_name) && !empty($img_name)){
$location = 'imgs/';
if(move_uploaded_file($temp_name,$location.$img_name)){
$path = $location.$img_name;
}}





$sql2 = "INSERT INTO user_update(email,dob,sex,occupation,income,img,serial)
VALUES('$email','$dob','$sex','$occupation','verified','$path','$serial_no')";
if($connect->query($sql2)===true){
$success = true;
$feedback=array(0=>$success);
Echo json_encode($feedback) ;
}



  
?>