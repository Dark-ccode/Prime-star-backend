<?php if($_GET['recover']!="") :?>
<?php 


include_once "connection.php";
//data to be saved in db
$success=false;

$recover_email = $_GET['recover'];
$string = `ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890`;
$len1 = 8;
$newpassword =substr(md5(microtime()),0,$len1);

$msg = "<html><body>"; 
//for email 
$msg .= '<div style="background-color: black;color:white">
<div style="height:100px;">
<img src="https://starassets.ltd/php/logo.png" alt="" style="width: 140px;height: 100%;margin-top: 0px;">
</div>
<div style="background-color: black;padding: 15px;color:white;padding-bottom: 10px;">

<br><br>
Hi There,
<br>
<br>
Your new password is:<br><br>
<div style="font-size: 24px;text-align: center;color: #f4672b;width: 60%;margin-left: 20%;padding: 10px;">'.$newpassword.'</div><br>
<div stylestyle="color:white">
    This message confirms that your password has been changed as requested by you.<br><br>
    Please if you did not initiate this process,kindly contact our customer care.
</div>
<br>

<a href="https://www.starassets.ltd/Contact" style="text-decoration: none;"> <div style="width: 60%;padding: 10px;height: auto;margin-left:20%;
    background-color: #f4672b;color: white; text-align: center;font-size: 19px;border-radius: 20px;">
   Customer care
</div></a>
<br>
<br>
<div style="color: #f4672b;font-size: 19px;">Thank you.</div>
<br>

<div style="text-align: center;">Star Assets 2023.</div>
</div>
</div>';
$msg .= "</body></html>";
$subject = "Password Reset" ;
//$header = "no_reply@phoenixglobal.uk";
$email_address = $recover_email;
$fromName = 'phoenixglobal';
$from = 'no_reply@phoenixglobal.uk';
////////////////////////////////////end

// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: admin@phoenixglobal.uk' . "\r\n"; 
$headers .= 'Bcc: admin@phoenixglobal.uk' . "\r\n"; 



$sql = "SELECT * FROM users where email = '$recover_email'";
$output =$connect->query($sql);
if($output->num_rows>0){
  $sql2 = "UPDATE users
  SET password='$newpassword'
  WHERE email='$recover_email'";
$output =$connect->query($sql2);
$success=true;
$feedback=array(0=>$success);
Echo json_encode($feedback) ;
mail($email_address,$subject,$msg,$headers);
}
else{
$success=false;
$feedback=array(0=>$success);
Echo json_encode($feedback) ;;}

?>

<?php else: echo "email not sent";?>
<?php endif;?>