
<?php 
//verifying and getting 

if($_GET['email']!=""  && $_GET['amount']!="") :?>
<?php 


include_once "connection.php";
//data to be saved in db

$email = $_GET['email'];
$amount = $_GET['amount'];
$action = $_GET['action'];
$success = false;

/*
$sql = " SELECT * FROM wallet";
$output =$connect->query($sql);
while($row=$output->fetch_assoc()){   
$balance = $row['balance'];

if($action=="add"){
$aamount = $amount + $balance;
}

if($action=="subtract"){
$aamount =  $balance - $amount;
}}
*/
if($action==1){
$sql2 = "UPDATE wallet
SET balance='$amount'
WHERE email='$email'";
}

if($action==2){
$sql2 = "UPDATE wallet
SET Twidrawal='$amount'
WHERE email='$email'";
}
if($action==3){
$sql2 = "UPDATE wallet
SET Tdeposit='$amount'
WHERE email='$email'";
}


if($connect->query($sql2)===true){
$success = true;
$feedback=array(0=>$success);
Echo json_encode($feedback) ;
;}
else{
$success = false;
$feedback=array(0=>$success);
Echo json_encode($feedback) ;
}


?>

<?php else: echo "operation failed!";?>
<?php endif;?>