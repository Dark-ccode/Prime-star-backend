<?php if($_GET['name']!=""  && $_GET['password']!="") :?>

<?php

include_once "connection.php";

$success = false;
$name = $_GET['name'];
$password = $_GET['password'];

$sql = "SELECT * from admin where name = '$name' and password = '$password'";
$output =$connect->query($sql);

if($output->num_rows>0){
while($row=$output->fetch_assoc()){ 
$dname = $row['name'];
$dpass =$row['password'];
if($name == $dname && $password==$dpass){
$success = true;
$n = ucwords($name);

$feedback=array(0=>$success,1=>$n);
Echo json_encode($feedback) ;
}
else{
$success = false;
$feedback=array(0=>$success);
Echo json_encode($feedback) ;
}}}
else{
$success = false;
$feedback=array(0=>$success);
Echo json_encode($feedback) ;

}
?>

<?php else: echo "inputs cannot be empty";?>
<?php endif;?>


