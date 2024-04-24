<?php
session_start()

?>

<?php 
//verifying and getting 

if($_POST['name']!=""  && $_POST['email']!=""  && $_POST['msg']!="") :?>
<?php 


include_once "connection.php";
//data to be saved in db

$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['msg'];

$sql2 = "INSERT INTO messages(name,email,msg)
        VALUES('$name','$email','$msg')";
      if($connect->query($sql2)===true){
        header("Location:../contactt.html");
      }   
      ?>

<?php else: header("Location:../contact.html");?>
  <?php endif;?>