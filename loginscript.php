
<?php


/*
$sql0 = "SELECT * from users";
$output0 =$connect->query($sql0);
$no_of_user =$output0->num_rows;
*/
?>


<?php if($_GET['name']!=""  && $_GET['password']!="") :?>

<?php

include_once "connection.php";

$name  = strtolower($_GET["name"]);
$password  = $_GET["password"];

$success = false;


$sql = "SELECT * from users where name = '$name' or email = '$name' and password = '$password'";
$output =$connect->query($sql);

if($output->num_rows>0){
while($row=$output->fetch_assoc()){ 
$dname = $row['name'];
$pass =$row['password'];
$demail =$row['email'];
$phone =$row['phone'];
//$drefno =$row['refcode'];
//if($name == $dname || $name == $demail && $password==$dpass){

$success = true;
$n = ucwords($name);



$feedback=array(0=>$success,1=>$n,2=>$demail,3=>$pass,4=>$phone);
Echo json_encode($feedback) ;
    
}}
else{
    $success = false;
$feedback=array(0=>$success);
    Echo json_encode($feedback) ;
    
}
?>

<?php else: echo "inputs cannot be empty";?>
 <?php endif;?>


