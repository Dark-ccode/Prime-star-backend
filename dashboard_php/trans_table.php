
<?php
//$success = false;

include_once "connection.php";

$email = $_GET['email'];
$feedback = array();

$sql = " SELECT * FROM transaction where email='$email'";

$output =$connect->query($sql);
if($output->num_rows>0){

while($row=$output->fetch_assoc()){   
  $feedback[] = $row;
};

Echo json_encode($feedback) ;

};

?>