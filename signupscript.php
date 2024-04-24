<?php if(isset($_GET['agree']) && $_GET['name']!=""  && $_GET['email']!=""  && $_GET['password']!="") :?>
<?php 

include_once "connection.php";
//data to be saved in db

$name = strtolower($_GET['name']);
$email = strtolower($_GET['email']);
$password = $_GET['password'];
$countrycode = $_GET['countrycode'];
$phone = $_GET['phone'];
$address = $_GET['address'];
$country = $_GET['country'];
$countrycode = $_GET['countrycode'];
$postalcode = $_GET['postalcode'];
//////////////////////////////////
$name_exist="";
$email_exist="";
$success=false;

$string = `ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890`;
$len1 = 6;

$this_user_rcode =substr(md5(microtime()),0,$len1);


$sql0 = "SELECT * from  users where name = '$name'";
$output0 =$connect->query($sql0);

$sql1 = "SELECT * from  users where email = '$email'";
$output1 =$connect->query($sql1);

if($output0->num_rows>0){
//user name already exist
$name_exist="User name already exist.";
$feedback=array(0=>$name_exist,1=>$email_exist,2=>$success,3=>$this_user_rcode,4=>$email,5=>$name);
Echo json_encode($feedback) ;}

elseif($output1->num_rows>0){
//email already exist
$email_exist= "Email already exist.";
$feedback=array(0=>$name_exist,1=>$email_exist,2=>$success,3=>$this_user_rcode,4=>$email,5=>$name);
Echo json_encode($feedback);
}
 



else{
$sql2 = "INSERT INTO users(name,email,password,rcode,address,country,countrycode,postalcode,phone)
        VALUES('$name','$email','$password','$this_user_rcode','$address','$country','$countrycode','$postalcode','$phone')";
if($connect->query($sql2)===true){
$success=true;
$feedback=array(0=>$name_exist,1=>$email_exist,2=>$success,3=>$this_user_rcode,4=>$email,5=>$name);
Echo json_encode($feedback) ;
/////////////////////////////////////////wallet
$zero  = 0;
$no_address  = "No wallet address yet";
$wallet_sql= "INSERT INTO wallet(email,Twidrawal,Tdeposit,balance,wallet_address) VALUES('$email','$zero','$zero','$zero','$no_address')";
$output1 =$connect->query($wallet_sql);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$msg = "<html><body>"; 
$msg .= '<div style="background-color: black;color:white">
<div style="height:100px;">
<img src="https://starassets.ltd/php/logo.png" alt="" style="width: 140px;height: 100%;margin-top: 0px;">
</div>
<div style="background-color: black;padding: 15px;color:white;padding-bottom: 10px;">
<div style="font-size: 24px;">
 Welcome To Star Assets.
</div>
<br>
<br>

<div style="font-size: 18px;text-align: left;width: 70%;margin-left: 0%;padding: 10px;height: auto;border-radius: 15px;">
   <div style="margin-bottom: 5px;">User name :'. $name.'</div><br>
   <div style="margin-bottom: 5px;">Email : '.$email .'</div><br>
   <div style="margin-bottom: 5px;">Password : **********</div><br>
</div>
<br>
<br>

<div>
   You recieved this message because, you are now a registered memeber of Star Assets investment.<br><br>
   If this registration was not initiated by you, kindly contact our customer care.
</div>
<br>

<a href="https://www.starassets.ltd/Contact" style="text-decoration: none;"> <div style="width: 60%;padding: 10px;height: auto;margin-left:20%;
    background-color: #f4672b;color: white; text-align: center;font-size: 19px;border-radius: 20px;">
   Customer Care
</div></a>
<br>
<br>
<div style="color: #f4672b;font-size: 19px;">Thank You.</div>
<br>

<div style="text-align: center;">Star Assets 2023.</div>
</div>
</div>';
$msg .= "</body></html>";


$subject = "Welcome to Star Assets" ;
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

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 }}      
 ?>

<?php else: echo "Fill the form to register";?>
 <?php endif;?>