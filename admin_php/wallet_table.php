
<?php
//$success = false;

include_once "connection.php";
$feedback = array();
$feedback2= '';
$email = $_GET['email'];

$sql = " SELECT * FROM wallet where  email = '$email'";

$output =$connect->query($sql);
if($output->num_rows>0){

while($row=$output->fetch_object()){   
  $feedback1 = $row;
};
};

$sql1 = " SELECT * FROM user_update where  email = '$email'";

$output1 =$connect->query($sql1);
if($output1->num_rows>0){
while($row=$output1->fetch_object()){   
  $feedback2 = $row;
};

};
$feedback=array(0=>$feedback1,1=>$feedback2);
Echo json_encode($feedback) ;


?>