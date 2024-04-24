
<?php

include_once "connection.php";

$email  = strtolower($_GET["email"]);

$success = false;


$sql = "SELECT * from users where email = '$email'";
$output =$connect->query($sql);

if($output->num_rows>0){
while($row=$output->fetch_assoc()){ 
	$sql0 = "SELECT wallet_address from wallet where email = '$email'";
$output0 =$connect->query($sql0);
while($row0=$output0->fetch_assoc()){ 
$wallet_address =$row0['wallet_address'];
}
$name = $row['name'];
$rcode =$row['rcode'];
$email =$row['email'];
$ccode =$row['countrycode'];
$phone =$row['phone'];
$success = true;
$feedback=array(0=>$success,1=>$name,2=>$rcode,3=>$email,4=>$ccode,5=>$phone,6=>$wallet_address);
 Echo json_encode($feedback) ;



}


}
else{
 $success = false;
$feedback=array(0=>$success);
 Echo json_encode($feedback) ;
}
?>