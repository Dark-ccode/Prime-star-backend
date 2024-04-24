<?php 
//verifying and getting 

if($_GET['amount']!="") :?>
<?php 

include_once "connection.php";
//data to be saved in db


$name = $_GET['name'];
$email = $_GET['email'];
$amount = $_GET['amount'];
$status = 'Pending';
$type = 'widrawal';
$success = false;


$sql2 = "INSERT INTO widrawal(email,amount,status,name)
VALUES('$email','$amount','$status','$name')";
if($connect->query($sql2)===true){
$success = true;
$feedback=array(0=>$success);
Echo json_encode($feedback) ;
	
$trans = "INSERT INTO transaction(email,amount,type,status)
VALUES('$email','$amount','$type','$status')";
$output =$connect->query($trans);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$msg = "<html><body>"; 
$msg .= '<div style="background-color: black;color:white">
<div style="height:100px;">
<img src="https://starassets.ltd/php/logo.png" alt="" style="width: 140px;height: 100%;margin-top: 0px;">
</div>
<div style="background-color: black;padding: 15px;color:white;padding-bottom: 10px;">
<div style="font-size: 21px;">
Hello There,
</div>
<br>

<div>
   You have requested the widrawal of '.$amount.'.<br>
   If this widrawal was not initiated by you, kindly contact our customer care service.
</div>
<br>
<br>
<a href="https://www.pheonixglobal.ltd/Contact" style="text-decoration: none;"> <div style="width: 60%;padding: 10px;height: auto;margin-left:20%;
    background-color: #f4672b;color: white; text-align: center;font-size: 19px;border-radius: 20px;">
   Customer Care
</div></a>
<br>
<div style="color:#f4672b;font-size: 19px;">Thank you.</div>
<br>
<br>

<div style="text-align: center;">Star Assets 2022.</div>
</div>
</div>';
$msg .= "</body></html>";


$subject = "Withdrawal notice" ;
$email_address = $email;
$fromName = 'primestar';
$from = 'no_reply@starassets.ltd';
////////////////////////////////////end

// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: admin@starassets.ltd' . "\r\n"; 
$headers .= 'Bcc: admin@starassets.ltd' . "\r\n"; 

mail($email_address,$subject,$msg,$headers);


} 

?>

<?php else: echo "widrawal unsuccesful";?>
<?php endif;?>