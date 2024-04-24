
<?php
//$success = false;

include_once "connection.php";
$feedback = array();

$sql = " SELECT * FROM users";

$output =$connect->query($sql);
if($output->num_rows>0){

while($row=$output->fetch_assoc()){   
  $feedback[] = $row;
};

$array=array(0=>$feedback);
Echo json_encode($array) ;

};

?>