
<?php
//$success = false;

include_once "connection.php";
$feedback = array();

$sql = " SELECT * FROM deposit";

$output =$connect->query($sql);
if($output->num_rows>0){

while($row=$output->fetch_assoc()){   
  $feedback[] = $row;
};

Echo json_encode($feedback) ;

};

?>