
<?php

include_once "connection.php";



$nosql = "SELECT * from users";
$nooutput =$connect->query($nosql);
$usersno =$nooutput->num_rows;

$get_deposit = "SELECT SUM(amount) as total FROM deposit where status='Approved'";
$output =$connect->query($get_deposit);
// $depno = $output->num_rows;
while($row=$output->fetch_assoc()){ 
 $tdeposit= $row['total'];
}

$w_wallet = "SELECT SUM(amount) as wtotal FROM  widrawal where status='Approved'";
$woutput =$connect->query($w_wallet);
$wno = $woutput->num_rows;
while($row=$woutput->fetch_assoc()){ 
$twidrawal = $row['wtotal'];
}

$feedback=array(0=>$usersno,1=>$tdeposit,2=>$twidrawal);
 Echo json_encode($feedback) ;


?>