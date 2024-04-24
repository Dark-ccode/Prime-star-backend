
<?php if($_GET['email']!="" && $_GET['msg']!="") :?>
<?php 
include_once "connection.php";
//data to be saved in db
$success=false;
$email = $_GET['email'];
$subject = $_GET['subject'];
$mainmsg = $_GET['msg'];


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
<br>

<div>'.$mainmsg.'</div>
<br>
<div style="color: #f4672b;font-size: 19px;">Have a great day.</div>
<br>
<br>
<a href="https://starassets.ltd/php/Contact" style="text-decoration: none;"> <div style="width: 60%;padding: 10px;height: auto;margin-left:20%;
    background-color: #f4672b;color: white; text-align: center;font-size: 19px;border-radius: 20px;">
   Contact us
</div></a>
<br>
<br>

<div style="text-align: center;">Exceellent Miners 2023.</div>
</div>
</div>';
$msg .= "</body></html>";

//$header = "no_reply@phoenixglobal.uk";
$fromName = 'primestar';
$from = 'no_reply@https://starassets.ltd';
////////////////////////////////////end

// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
$headers .= 'Cc: admin@https://starassets.ltd' . "\r\n"; 
$headers .= 'Bcc: admin@https://starassets.ltd' . "\r\n"; 

$success=true;
$feedback=array(0=>$success);
Echo json_encode($feedback) ;
mail($email,$subject,$msg,$headers);


?>

<?php else:
	$success=false;
   $feedback=array(0=>$success);
    Echo json_encode($feedback);?>
<?php endif;?>