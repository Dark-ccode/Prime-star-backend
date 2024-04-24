
<?php

include_once "connection.php";

$email  = strtolower($_GET["email"]);

$success = false;


$sql = "SELECT * from wallet where email = '$email'";
$output =$connect->query($sql);

if($output->num_rows>0){
while($row=$output->fetch_assoc()){ 

////another acton
$sql1 = "SELECT * from users where email = '$email'";
$output1 =$connect->query($sql1);
while($row1=$output1->fetch_assoc()){ 
$rcode =$row1['rcode'];
$phone =$row1['phone'];
}
////another acton

////another acton
$sql0 = "SELECT * from deposit where email = '$email'";
$output0 =$connect->query($sql0);
while($row0=$output0->fetch_assoc()){ 
$depno = $output0->num_rows;
$package =$row0['package'];
}
////another acton

///another acton
$sql00 = "SELECT * from widrawal where email = '$email'";
$output00 =$connect->query($sql00);
while($row00=$output00->fetch_assoc()){ 
$wno = $output00->num_rows;
}
////another acton


###########################################
$pending = "pending";
$success = "success";
$declined = "declined";

$nosql = "SELECT * from transaction where email = '$email' and status = '$pending'";
$nooutput =$connect->query($nosql);
$pend =$nooutput->num_rows;

$ssql = "SELECT * from transaction where email = '$email' and status = '$success'";
$soutput =$connect->query($ssql);
$succ =$soutput->num_rows;


$dsql = "SELECT * from transaction where email = '$email' and status = '$declined'";
$doutput =$connect->query($dsql);
$de =$doutput->num_rows;

###########################################################




$balance = $row['balance'];
$tdeposit =$row['Tdeposit'];
$twidrawal =$row['Twidrawal'];
$success = true;
$feedback=array(0=>$success,1=>$balance,2=>$tdeposit,3=>$twidrawal,4=>$package,5=>$rcode,6=>$pend,7=>$succ,8=>$de,9=>$phone,10=>$depno,11=>$wno);
 Echo json_encode($feedback) ;



}


}
else{
 $success = false;
$feedback=array(0=>$success);
 Echo json_encode($feedback) ;
}
?>